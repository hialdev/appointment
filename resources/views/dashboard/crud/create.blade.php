@extends('dashboard.layout.app')
@section('title_dashboard',"$route Create")
@section('dashcontent')

<section class="row">
    <div class="col-12 mb-4">
        @php
            $menu = \App\Models\Menu::where('url',$route)->first();
        @endphp
        <a href="{{ url()->previous() }}" class="d-block blue mb-3">Kembali</a>
        <div class="d-flex align-items-center justify-content-start gap-3">
            <i class="bi bi-{{ $menu->icon }} fs-5 p-3 pb-2 bg-white rounded-3 d-inline-block" style="width: auto;height:auto"></i>
            <h3>Detail {{ $route }}</h3>
        </div>
    </div>
    <div class="col-12 bg-white p-5 rounded-3">
        <form action="{{ route('aldev'.$route.'.store') }}" method="POST">
            @csrf
            @php
                $input_data = \App\Models\Crud::where('table_name','=',Str::plural($route))->get();
                $dn = \App\Models\MenuForm::where('table_name','=',Str::plural($route))->get();
            @endphp
            @for ($i=0;$i < count($dn);$i++)
                @if (in_array($input_data[$i]->input_type,['text','number','password','email']))
                    @include('forms.input',['label'=>$input_data[$i]->input_label,'name'=>$dn[$i]->data_name,'placeholder'=>$input_data[$i]->input_label,'value'=>(old($dn[$i]->data_name) !== null)?old($dn[$i]->data_name):'','type'=>$input_data[$i]->input_type])
                @elseif ($input_data[$i]->input_type == 'tiny')
                    @include('forms.tinycode',['code_name'=>$dn[$i]->data_name,'code_title'=>$input_data[$i]->input_label])
                @endif
            @endfor
            <button type="submit" class="btn btn-primary mt-4">Tambah {{ $route }}</button>
        </form>
    </div>
</section>

@endsection