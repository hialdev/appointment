<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('dashboard.crud.menu.index',compact(['menus']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.crud.menu.create',compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'menu' => "required|string",
            'icon' => "required|string",
            'url' => "required",
            'menu_opt' => "required",
        ]);

        $menu = new Menu;
        $menu->menu = $data['menu'];
        $menu->icon = $data['icon'];
        $menu->url = $data['url'];
        $menu->save();

        $role = Role::find($data['menu_opt']);
        $menu->role()->attach($role);

        if ($menu) {
            return redirect()
                ->route('menu.index')
                ->with([
                    'success' => 'Hore, Data berhasil ditambahkan!'
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
        $menu = Menu::findOrFail($id);
        $roles = Role::all();
        $menu_role=[];
        foreach ($menu->role as $mr) {
            $menu_role[] = $mr->id;
        }

        return view('dashboard.crud.menu.edit',compact(['menu','roles','menu_role']));
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
        $menu = menu::findOrFail($id);
        $menu->delete();

        if ($menu) {
            return redirect()
                ->route('menu.index')
                ->with([
                    'success' => 'Data berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Harap update data dengan benar'
                ]);
        }
    }
}
