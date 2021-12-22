@extends('dashboard.layout.app')
@section('title_dashboard',"Detail $menu->menu menu")
@section('dashcontent')
<section class="row">
    <div class="col-12">
        <a href="{{ route('menu.index') }}" class="d-block blue mb-3">Kembali</a>
        <div class="d-flex align-items-center justify-content-start gap-3">
            <i class="bi bi-{{ $menu->icon }} fs-5 p-3 pb-2 bg-white rounded-3 d-inline-block" style="width: auto;height:auto"></i>
            <h3>Detail {{ $menu->menu }}</h3>
        </div>
        <div class="col-12 bg-white p-4 rounded-3 my-4">
            <div class="border-bottom border-light py-2">
                <label>Nama Menu</label>
                <h5 class="my-1"><strong>{{ $menu->menu }}</strong></h5>
            </div>
            <div class="border-bottom border-light py-2">
                <label>Icon Menu</label>
                <h5 class="my-1"><strong>{{ $menu->icon }}</strong></h5>
            </div>
            <div class="border-bottom border-light py-2">
                <label>Url Menu</label>
                <h5 class="my-1"><strong>{{ $menu->url }}</strong></h5>
            </div>
            <div class="border-bottom border-light py-2">
                <label>Role yang dapat mengakses</label>
                <h5 class="my-1">
                    @foreach ($menu->role as $mr)
                        <span class="badge bg-primary">{{ $mr->name }}</span>
                    @endforeach
                </h5>
            </div>
        </div>
    </div>
</section>
@endsection