@extends('dashboard.layout.app')
@php
    $route = Request::url();
    $route = explode('/',$route);
    $route = $route[3];
    $menu = \App\Models\Menu::where('url','=',$route)->first();
@endphp
@section('title_dashboard',"Tambah $menu->menu")
@section('dashcontent')
<div class="d-flex align-items-center justify-content-start gap-3">
    <i class="bi bi-{{ $menu->icon }} fs-5 p-3 pb-2 bg-white rounded-3 d-inline-block" style="width: auto;height:auto"></i>
    <h3>Tambah {{ $menu->menu }}</h3>
</div>
<div class="card my-4">
    <div class="card-body">
        <form action="{{ route('database.store') }}" method="POST">
            @csrf
            <div class="row" style="align-items: center;">
                <div class="col-12">
                    @include('forms.input',['label'=>'Nama Database','name'=>'table','placeholder'=>'Nama Table','type'=>'text','value'=>''])
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="staresd">
                                <div class="form-group">
                                    <label class="hidden-md">Attribut</label>
                                    <input type="text" id="field" class="form-control" value="id" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field" class="hidden-md">Type Data</label>
                                <select class="form-select" disabled>
                                        <option value="AUTO INCREMENT" style="text-transform: capitalize">AUTO INCREMENT</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Length</label>
                                <input type="number" class="form-control" value="AUTO" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 dynamic-field border-bottom border-light my-1" id="dynamic-field-1">
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="staresd">
                                <div class="form-group">
                                    <label class="hidden-md">Attribut</label>
                                    <input type="text" id="field" class="form-control" name="property[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field" class="hidden-md">Type Data</label>
                                <select class="form-select" name="type_data[]">
                                    @foreach (\App\Models\TypeForm::all() as $td)
                                        <option value="{{ $td->type_name }}" style="text-transform: capitalize">{{ $td->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Length</label>
                                <input type="number" class="form-control" name="length[]">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mt-30 append-buttons">
                    <div class="clearfix">
                        <button type="button" id="add-button" class="btn btn-success float-left text-uppercase shadow-sm"><i class="fa fa-plus fa-fw"></i>
                        </button>
                        <button type="button" id="remove-button" class="btn btn-danger float-left text-uppercase ml-1" disabled="disabled"><i class="fa fa-minus fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Buat Database</button>
        </form>
    </div>
</div>

@endsection