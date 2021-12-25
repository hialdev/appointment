@extends('dashboard.layout.app')
@section('title_dashboard',"$route Index")
@section('dashcontent')
<section class="row">
    <div class="col-12 mb-3 mt-2">
        @php
        $menu = \App\Models\Menu::where('url',$route)->first();
        @endphp
        <div class="d-flex align-items-center justify-content-start gap-3 float-start">
            <i class="bi bi-{{ $menu->icon }} fs-5 p-3 pb-2 bg-white rounded-3 d-inline-block" style="width: auto;height:auto"></i>
            <h3>List {{ $route }}</h3>
        </div>
        <a href="{{ route('aldev'.$route.'.create') }}" class="btn btn-md btn-primary mb-3 float-end">Add {{$route}}</a>

    </div>
    <div class="col-12 p-4 bg-white rounded-3">
        <div class="table-responsive w-100">
            <table class="table table-lg">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        @php
                            $list = \Schema::getColumnListing(Str::lower(Str::plural($route)));
                        @endphp
                        @for ($i=0;$i<=count($list)-3;$i++)
                            <th scope="col">{{ $list[$i+1] }}</th>
                        @endfor
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        @for ($i=0;$i<=count($list)-3;$i++)
                            <td>{{ $data[$list[$i+1]] }}</td>
                        @endfor
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('aldev'.$route.'.destroy',$data['id']) }}" method="POST">
                                <a href="{{ route('aldev'.$route.'.show',$data['id']) }}" class="btn btn-sm btn-success">SHOW</a>
                                <a href="{{ route('aldev'.$route.'.edit',$data['id']) }}" class="btn btn-sm btn-primary">EDIT</a>
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