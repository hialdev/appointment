<div class="card border-0 shadow rounded mb-5">
    <div class="card-body">
        <h3 class="float-left">Dosen</h3>
        <a href="{{ route('dosen.create') }}" class="btn btn-md btn-success mb-3 float-right">Add
            Dosen</a>

        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kontak</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dosens as $dosen)
                <tr>
                    <td>{{ $dosen->id }}</td>
                    <td>{{ $dosen->nama }}</td>
                    <td>{{ $dosen->nidn }}</td>
                    <td>{{ $dosen->alamat }}</td>
                    <td>{{ $dosen->kontak }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('dosen.destroy', $dosen->id) }}" method="POST">
                            <a href="{{ route('dosen.show', $dosen->id) }}" class="btn btn-sm btn-success">SHOW</a>
                            <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>