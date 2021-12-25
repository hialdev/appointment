@extends('dashboard.layout.app')
@section('title_dashboard','Menu Create')
@section('dashcontent')

<section class="row">
    <div class="col-12 bg-white p-5 rounded-3">
        <h3>Tambah Menu</h3>
        <form action="{{ route('menu.store') }}" method="POST">
            @csrf
            @include('forms.input',['label'=>"Nama Menu",'name'=>'menu','placeholder'=>'Masukan nama menu','type'=>'text','value'=>''])
            @include('forms.input',['label'=>"Icon",'name'=>'icon','placeholder'=>'Icon untuk menu','type'=>'text','value'=>''])
            @include('forms.input',['label'=>"URL",'name'=>'url','placeholder'=>'URL menu','type'=>'text','value'=>''])
            <div class="col-4">
                <div class="form-group">
                    <label>Akses Role</label>
                    <select class="choices form-select multiple-remove" multiple="multiple" name="menu_opt[]">
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Tambah</button>
        </form>
    </div>
</section>

@endsection