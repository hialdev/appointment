@extends('dashboard.layout.app')
@php
    $route = Request::url();
    $route = explode('/',$route);
    $route = $route[3];
    $menu = \App\Models\Menu::where('url','=',$route)->first();
@endphp
@section('title_dashboard',"Edit $menu->menu")
@section('dashcontent')
<div class="d-flex align-items-center justify-content-start gap-3">
    <i class="bi bi-{{ $menu->icon }} fs-5 p-3 pb-2 bg-white rounded-3 d-inline-block" style="width: auto;height:auto"></i>
    <h3>Edit {{ $menu->menu }}</h3>
</div>
<div class="card my-4">
    <div class="card-body">
        <form action="{{ route('database.update',$table->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row" style="align-items: center;">
                <div class="col-12">
                    <div class="form-group">
                        <label>Nama Database</label>
                        <h5>{{ $table->table }}</h5>
                    </div>
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
                
                @if (isset($mf))
                    @foreach ($mf as $mf)
                        @php $i = $loop->index @endphp
                        <div class="col-md-10 dynamic-field border-bottom border-light my-1" id="dynamic-field-1">
                            <div class="row" >
                                <div class="col-md-4">
                                    <div class="staresd">
                                        <div class="form-group">
                                            <label class="hidden-md">Attribut</label>
                                            <input type="text" id="field" class="form-control" name="property[]" value="{{ old("property[$i]",$mf->data_name) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field" class="hidden-md">Type Data</label>
                                        <select class="form-select" name="type_data[]">
                                            @foreach (\App\Models\TypeForm::all() as $td)
                                                @if ($mf->data_type == $td->type_name)
                                                    <option value="{{ $mf->type_name }}" style="text-transform: capitalize" selected>{{ $td->type_name }}</option>
                                                @else
                                                    <option value="{{ $td->type_name }}" style="text-transform: capitalize">{{ $td->type_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Length</label>
                                        <input type="number" class="form-control" name="length[]" value="{{ old("length[$i]",$mf->data_length) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="text-center text-muted">Data tidak tersedia.</div>
                    </div>
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Buat Database</button>
        </form>
    </div>
</div>

@endsection