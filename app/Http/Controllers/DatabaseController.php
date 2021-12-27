<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use App\Models\Menu;
use App\Models\MenuForm;
use App\Models\Role;
use App\Models\Table;
use Exception;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = 'database';
        $tables = Table::all();
        return view('dashboard.crud.database.index',compact(['tables','route']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.crud.database.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (!Schema::hasTable($data['table'])) {
            try {
                $table_name = Str::plural($data['table']);
                Schema::create($table_name, function (Blueprint $table) use ($data,$table_name) {
                    $table->bigIncrements('id');
                    for ($i=0; $i < count($data['property']); $i++) { 
                        if ($data['type_data'][$i] == 'string') {
                            $table->string($data['property'][$i],($data['length'][$i] !== null)?$data['length'][$i]:255);
                        }elseif ($data['type_data'][$i] == 'varchar') {
                            $table->string($data['property'][$i],($data['length'][$i] !== null)?$data['length'][$i]:255);
                        }elseif ($data['type_data'][$i] == 'integer') {
                            $table->integer($data['property'][$i]);
                        }elseif ($data['type_data'][$i] == 'text') {
                            $table->text($data['property'][$i]);
                        }

                        $mf = new MenuForm;
                        $mf->table_name = $table_name;
                        $mf->data_name = $data['property'][$i];
                        $mf->data_type = $data['type_data'][$i];
                        $mf->data_length = ($data['length'][$i] !== null)?$data['length'][$i]:'';
                        $mf->save();
                    }
                    $table->timestamps();
                });

                $db = new Table;
                $db->table = $table_name;
                $db->model = ucfirst(Str::singular($table_name));
                $db->save();


                return redirect()
                    ->route('database.index')
                    ->with([
                        'success' => 'Hore, Data berhasil ditambah!'
                    ]);
            }
            catch (Exception $e) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Error, Data gagal ditambah'. $e,
                    ]);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::where('id',$id)->first();

        return view('dashboard.crud.menu.show',compact(['menu']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::findOrFail($id);
        $menu = Menu::where('url',Str::singular($table->table));
        $mf = MenuForm::where('table_name',$table->table)->get();
        return view('dashboard.crud.database.edit',compact(['menu','mf','table']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'menu' => "required|string",
            'icon' => "required|string",
            'url' => "required",
            'menu_opt' => "required",
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update([
            'menu' => $data['menu'],
            'icon' => $data['icon'],
            'url' => $data['url'],
        ]);

        $role_new = [];
        foreach ($data['menu_opt'] as $ri) {
            $role_new[] = $ri;
        }
        $role_old = [];
        foreach ($menu->role as $ro) {
            $role_old[] = $ro->id;
        }

        if($role_new !== $role_old){
            $role = Role::find($role_old);
            $menu->role()->detach($role);
            $newrole = Role::find($role_new);
            $menu->role()->attach($newrole);
        }

        if ($menu) {
            return redirect()
                ->route('menu.index')
                ->with([
                    'success' => 'Hore, Data berhasil diperbaharui!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Harap masukan data dengan benar'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Table::findOrFail($id);
        $table_name = Str::singular($table->table);
        try {
            if (Crud::where('table_name',$table->table)->first() !== null) {
                Artisan::call("scrap:view dashboard.crud.".$table_name.".index --force");
                Artisan::call("scrap:view dashboard.crud.".$table_name.".create --force");
                Artisan::call("scrap:view dashboard.crud.".$table_name.".edit --force");
                Artisan::call("scrap:view dashboard.crud.".$table_name.".show --force");
                
                Crud::where('table_name',$table->table)->delete();
                unlink(app_path()."/Models/".$table->model.'.php');
            }
            Menu::where('url',$table_name)->delete();
            $table->delete();
            Schema::dropIfExists($table->table);
            
            return redirect()
                ->route('database.index')
                ->with([
                    'success' => 'Data berhasil dihapus!'
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with([
                    'error' => 'Error, Data gagal ditambah <br/>'. $e->getMessage(),
                ]);
        }
    }
}
