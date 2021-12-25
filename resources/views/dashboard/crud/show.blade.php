@extends('dashboard.layout.app')
@section('title_dashboard',"Detail $route menu")
@section('dashcontent')
<section class="row">
    <div class="col-12">
        @php
            $menu = \App\Models\Menu::where('url',$route)->first();
            $list = \Schema::getColumnListing(Str::lower(Str::plural($route)));
        @endphp
        <a href="{{ url()->previous() }}" class="d-block blue mb-3">Kembali</a>
        <div class="d-flex align-items-center justify-content-start gap-3">
            <i class="bi bi-{{ $menu->icon }} fs-5 p-3 pb-2 bg-white rounded-3 d-inline-block" style="width: auto;height:auto"></i>
            <h3>Detail {{ $menu->menu }}</h3>
        </div>
        <div class="col-12 bg-white p-4 rounded-3 my-4">
            @for ($i=0;$i<=count($list)-3;$i++)
                <div class="border-bottom border-light py-2">
                    <label>{{ $list[$i+1] }}</label>
                    <h5 class="my-1"><strong>{{ $data[$list[$i+1]] }}</strong></h5>
                </div>
            @endfor
        </div>
    </div>
</section>
@endsection