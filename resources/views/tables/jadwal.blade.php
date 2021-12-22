<div class="card border-0 shadow rounded mb-5">
    <div class="card-body">
        <h3 class="float-start">Jadwal Bimbingan</h3>
        <a href="{{ route('jadwal.create') }}" class="btn btn-md btn-success mb-3 float-end">Add
            Jadwal</a>

        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Mahasiswa</th>
                    <th scope="col">Dosen</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Awal</th>
                    <th scope="col">Akhir</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->id }}</td>
                    <td>
                        @php $mhs = \App\Models\Mahasiswa::where('id',$jadwal->mahasiswa_id)->first(); @endphp
                        {{ $mhs->nama }}    
                    </td>
                    <td>
                        @php $dsn = \App\Models\Dosen::where('id',$jadwal->dosen_id)->first(); @endphp
                        {{ $dsn->nama }}    
                    </td>
                    <td>{{ $jadwal->judul }}</td>
                    <td>{{ $jadwal->deskripsi }}</td>
                    <td>{{ $jadwal->awal }}</td>
                    <td>{{ $jadwal->akhir }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-success">SHOW</a>
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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