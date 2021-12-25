@php
    $route = Request::url();
    $route = explode('/',$route);
    $route = $route[3];
    $menu = \App\Models\Menu::where('url','=',$route)->first();
@endphp