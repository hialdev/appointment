@extends('dashboard.layout.app')
@section('title_dashboard','CRUD Create')
@section('dashcontent')

<section class="row">
    <div class="col-12 bg-white p-5 rounded-3">
        <h3>Generate CRUD {{ ucfirst($table->table) }}</h3>
        <form action="{{ route('crud.store') }}" method="POST">
            @csrf
            <div class="col-12">
                <div class="card border border-light">
                    <div class="card-body">
                        @include('forms.input',['label'=>'Nama CRUD','name'=>'name','placeholder'=>'Nama ini akan digunakan sebagai nama menu','type'=>'text','value'=>Str::singular($table->table)])
                        @include('forms.input',['label'=>'Icon','name'=>'icon','placeholder'=>'Ambil icon di Bootstrap Icon','type'=>'text','value'=>''])
                        @include('forms.input',['label'=>'Url','name'=>'url','placeholder'=>'Url / route','type'=>'text','value'=>Str::lower(Str::singular($table->table))])
                    </div>
                </div>
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
                                    @foreach (\App\Models\FormType::all() as $ft)
                                        <option value="{{ $ft->input_value }}" style="text-transform: capitalize">{{ $ft->input_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Label</label>
                                <input type="text" class="form-control" name="label[]">
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">Belum ada data.</div>
                @endforelse
            </div>
            
            <button type="submit" class="btn btn-primary mt-4">Generate CRUD</button>
        </form>
    </div>
</section>

@endsection