<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use App\Models\FormType;
use App\Models\Menu;
use App\Models\MenuForm;
use App\Models\Table;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('dashboard.crud.crud.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $table = Table::where('id',$id)->first();
        $mf = MenuForm::where('table_name',$table->table)->get();

        return view('dashboard.crud.crud.create',compact(['table','mf']));
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
        try {
            
            $menu = new Menu;
            $menu->icon = $data['icon'];
            $menu->menu = $data['name'];
            $menu->url = $data['url'];
            $menu->save();

            for ($i=0; $i < count($data['type_data']); $i++) { 
                $crud = new Crud;
                $crud->table_name = Str::plural($data['name']);
                $crud->input_label = $data['label'][$i];
                $crud->input_type = $data['type_data'][$i];
                $crud->save();
            }

    
            Artisan::call("make:view dashboard.crud.".$data['url'].".index --extends=dashboard.crud.index");
            Artisan::call("make:view dashboard.crud.".$data['url'].".create --extends=dashboard.crud.create");
            Artisan::call("make:view dashboard.crud.".$data['url'].".edit --extends=dashboard.crud.edit");
            Artisan::call("make:view dashboard.crud.".$data['url'].".show --extends=dashboard.crud.show");
            $model = Table::where('table',Str::plural($data['name']))->first();
            Artisan::call("make:model $model->model");

            return redirect()
                    ->route('crud.index')
                    ->with([
                        'success' => "Hore, CRUD Berhasil di generate! <br /> Silahkan atur ". $data['name'] ." menu anda dibagian menu.<br /> Model $model->model telah dibuat otomatis."
                    ]);
        }
        catch (Exception $e)
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Error, Gagal Generate CRUD <br>'. $e->getMessage(),
                    ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
