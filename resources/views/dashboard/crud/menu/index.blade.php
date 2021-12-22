@extends('dashboard.layout.app')
@section('title_dashboard','Menu Index')
@section('dashcontent')
    {{-- Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- End Alert --}}
    <section class="row">
        <div class="col-12 p-4 bg-white rounded-3">
            <h3 class="float-start">Menu</h3>
            <a href="{{ route('menu.create') }}" class="btn btn-md btn-primary mb-3 float-end">Add
                Menu</a>
    
            <div class="mt-4 table-responsive w-100">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Icon</th>
                            <th scope="col">URL</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menus as $menu)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $menu->menu }}</td>
                            <td>{{ $menu->icon }}</td>
                            <td>{{ $menu->url }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('menu.destroy',$menu->id) }}" method="POST">
                                    <a href="{{ route('menu.show',$menu->id) }}" class="btn btn-sm btn-success">SHOW</a>
                                    <a href="{{ route('menu.edit',$menu->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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