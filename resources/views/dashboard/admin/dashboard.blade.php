@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('dashcontent')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-sm-3">
                    @include('compontents.card-dash',['count'=>"34",'icon'=>"bi bi-basket2-fill",'color'=>"blue",'title'=>"Keranjang"])
                </div>
                <div class="col-6 col-sm-3">
                    @include('compontents.card-dash',['count'=>"45",'icon'=>"bi bi-briefcase-fill",'color'=>"green",'title'=>"Portofolio"])
                </div>
                <div class="col-6 col-sm-3">
                    @include('compontents.card-dash',['count'=>"21",'icon'=>"bi bi-calendar2-event-fill",'color'=>"violet",'title'=>"Jadwal Meeting"])
                </div>
                <div class="col-6 col-sm-3">
                    @include('compontents.card-dash',['count'=>"3",'icon'=>"bi bi-person-square",'color'=>"chocolate",'title'=>"User Terdaftar"])
                </div>
            </div>
        </div>
    </section>
@endsection