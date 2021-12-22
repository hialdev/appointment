@extends('dashboard.layout.app')
@section('title_dashboard',"Edit $menu->menu Menu")
@section('dashcontent')

<section class="row">
    <div class="col-12 bg-white p-5 rounded-3">
        <h3>Edit Menu {{ $menu->menu }}</h3>

        <form action="{{ route('menu.update',$menu->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('forms.input',['label'=>"Nama Menu",'name'=>'menu','placeholder'=>'Masukan nama menu','type'=>'text','value'=>old('menu',$menu->menu)])
            @include('forms.input',['label'=>"Icon",'name'=>'icon','placeholder'=>'Icon untuk menu','type'=>'text','value'=>old('icon',$menu->icon)])
            @include('forms.input',['label'=>"URL",'name'=>'url','placeholder'=>'URL menu','type'=>'text','value'=>old('url',$menu->url)])
            <div class="col-4">
                <div class="form-group">
                    <label>Akses Role</label>
                    <select class="choices form-select multiple-remove" multiple="multiple" name="menu_opt[]">
                        @foreach ($roles as $role)
                            @if (in_array($role->id,$menu_role))
                                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                            @else
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Perbarui</button>
        </form>
    </div>
</section>
@endsection