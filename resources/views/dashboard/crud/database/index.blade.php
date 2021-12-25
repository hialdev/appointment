@extends('dashboard.layout.app')
@section('title_dashboard','Menu Create')
@section('dashcontent')
    <section class="row">
        <div class="col-12 p-4 bg-white rounded-3">
            <h3 class="float-start">Table</h3>
            <a href="{{ route($route.'.create') }}" class="btn btn-md btn-primary mb-3 float-end">Add
                Table</a>
    
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
                        @forelse ($tables as $data)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $data->table }}</td>
                            <td>{{ $data->model }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route($route.'.destroy',$data->id) }}" method="POST">
                                    <a href="{{ route($route.'.show',$data->id) }}" class="btn btn-sm btn-success">SHOW</a>
                                    <a href="{{ route($route.'.edit',$data->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
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