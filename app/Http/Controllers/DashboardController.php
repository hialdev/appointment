<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function admin(){
        $menus = Menu::all();
        $dash_url = 'ceo';
        return view('dashboard.dashboard',compact(['menus','dash_url']));
    }

    public function dosen(){
        $menus = Menu::all();
        $dash_url = 'ruangdosen';
        return view('dashboard.dashboard',compact(['menus','dash_url']));
    }

    public function mahasiswa(){
        $menus = Menu::all();
        $dash_url = 'cafetaria';
        return view('dashboard.dashboard',compact(['menus','dash_url']));
    }
}
