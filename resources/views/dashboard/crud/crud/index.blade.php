@extends('dashboard.layout.app')
@section('title_dashboard','Menu Index')
@section('dashcontent')
<section class="row">
    <div class="col-12 p-4 bg-white rounded-3">
        <h3 class="float-start">Table CRUD</h3>
        <div class="mt-4 table-responsive w-100">
            <table class="table table-lg">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Table</th>
                        <th scope="col">Model</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $check = \App\Models\Crud::all()->keyBy('table_name');
                    @endphp
                    @forelse ($tables as $data)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $data->table }}</td>
                        <td>{{ $data->model }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('crud.destroy',$data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                @if ($check->get(Str::plural($data->table)) !== null)
                                    <a href="{{ route('crud.create','id='.$data->id) }}" class="btn btn-sm btn-success disabled">Buat CRUD</a>
                                    <a href="{{ route('crud.edit',$data->id) }}" class="btn btn-sm btn-primary">Edit CRUD</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus CRUD</button>
                                @else
                                    <a href="{{ route('crud.create','id='.$data->id) }}" class="btn btn-sm btn-success">Buat CRUD</a>
                                    <a href="{{ route('crud.edit',$data->id) }}" class="btn btn-sm btn-primary disabled">Edit CRUD</a>
                                    <button type="submit" class="btn btn-sm btn-danger" disabled>Hapus CRUD</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center text-mute" colspan="9">Data tidak tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection