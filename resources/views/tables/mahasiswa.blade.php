<div class="card border-0 shadow rounded mb-5">
    <div class="card-body">
        <h3 class="float-left">Mahasiswa</h3>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-md btn-success mb-3 float-right">Add
            Mahasiswa</a>

        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Tgl Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->id }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->tanggal_lahir }}</td>
                    <td>{{ $mahasiswa->alamat }}</td>
                    <td>{{ $mahasiswa->tahun_masuk }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                            <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-sm btn-success">SHOW</a>
                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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