@extends('layout.dashboard')

@section('content')

<body style="background-color: #f8f9fa;">
    <div class="container">
        <div class="mb-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="text-left mb-3">
                <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-lg">Tambah Siswa</a>
            </div>
            <hr>
        </div>
</div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">NIS</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Rombel</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $rowsiswa)
                        <tr>
                            <td class="text-center">{{ $rowsiswa->nis }}</td>
                            <td>{{ $rowsiswa->nama }}</td>
                            <td class="text-center">{{ $rowsiswa->gender }}</td>
                            <td class="text-center">{{ $rowsiswa->rombel }}</td>
                            <td class="text-center">
                                         <img src="{{ asset('storage/foto_siswa/'.$rowsiswa->foto) }}" class="rounded" style="width: 150px">
                            </td>

                            <td class="text-center">
                                <a href="{{ route('siswa.edit', $rowsiswa->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('siswa.show', $rowsiswa->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('siswa.destroy', $rowsiswa->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {!! $siswa->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</body>
@endsection