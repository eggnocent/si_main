<!DOCTYPE html>
<html>
    <head>
        <title>Edit Siswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <div class="mb-3 text-center">
        <h1>Edit Siswa</h1>
        <hr/>
        </div>

        <div class="card-body">
                    <form method="POST" action="{{ route('siswa.update', $siswa->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" id="nis" class="form-control" value="{{ $siswa->nis }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="M" {{ $siswa->gender == 'M' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="F" {{ $siswa->gender == 'F' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rombel">Rombel</label>
                            <select name="rombel" id="rombel" class="form-control" required>
                                <option value="A" {{ $siswa->rombel == 'A' ? 'selected' : '' }}>Rombel A</option>
                                <option value="B" {{ $siswa->rombel == 'B' ? 'selected' : '' }}>Rombel B</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control" required>
                                <option value="X" {{ $siswa->kelas == 'X' ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ $siswa->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ $siswa->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                                <option value="XIII" {{ $siswa->kelas == 'XIII' ? 'selected' : '' }}>XIII</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">FOTO</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                            
                            <!-- error message untuk foto -->
                            @error('foto')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
        
    </body>
</html>