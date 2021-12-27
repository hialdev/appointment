@extends('dashboard.layout.app')
@section('title_dashboard','CRUD Create')
@section('dashcontent')

<section class="row">
    <div class="col-12 bg-white p-5 rounded-3">
        <h3>Edit CRUD {{ ucfirst($table->table) }}</h3>
        <form action="{{ route('crud.update',$table->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12">
                <div class="card border border-light">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Table</label>
                            <h5>{{ $table->table }}</h5>
                        </div>
                        @include('forms.input',['label'=>'Icon','name'=>'icon','placeholder'=>'Ambil icon di Bootstrap Icon','type'=>'text','value'=>$menu->icon])
                        <div class="form-group">
                            <label>URL</label>
                            <h5>{{ $menu->url }}</h5>
                        </div>
                    </div>
                </div>
                @php
                    $dc = \App\Models\Crud::where('table_name',$table->table)->get();
                    $selected = '';
                @endphp
                @forelse ($mf as $mf)
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="staresd">
                                <div class="form-group">
                                    <label class="hidden-md">Attribut</label>
                                    <h5>{{ $mf->data_name }} - <span class="text-muted">{{ $mf->data_type }}</span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field" class="hidden-md">Type Data</label>
                                <select class="form-select" name="type_data[]">
                                    @php $i = $loop->index @endphp
                                    @foreach (\App\Models\FormType::all() as $ft)
                                        @if($dc[$i]->input_type == $ft->input_value)
                                            <option value="{{ $dc[$i]->input_type }}" style="text-transform: capitalize" selected>{{ ($dc[$i]->input_type == $ft->input_type)?$ft->input_type:$dc[$i]->input_type }}</option>
                                        @else
                                            <option value="{{ $ft->input_value }}" style="text-transform: capitalize">{{ $ft->input_type }}</option>
                                        @endif
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Label</label>
                                <input type="text" class="form-control" name="label[]" value="{{ $dc[$i]->input_label }}">
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">Belum ada data.</div>
                @endforelse
            </div>
            
            <button type="submit" class="btn btn-primary mt-4">Perbarui CRUD</button>
        </form>
    </div>
</section>

@endsection