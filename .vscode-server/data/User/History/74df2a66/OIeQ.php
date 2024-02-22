<!DOCTYPE html>
<html>
    <head>
        <title>Edit Siswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <h1>Edit Siswa</h1>
        <hr/>

        <div class="container">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nis">NIS:</label>
                    <input type="text" id="nis" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="F" {{ $siswa->gender === 'F' ? 'selected' : '' }}>Female</option>
                        <option value="M" {{ $siswa->gender === 'M' ? 'selected' : '' }}>Male</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <select id="kelas" name="kelas" class="form-control" required>
                        <option value="F" {{ $siswa->kelas === 'F' ? 'selected' : '' }}>Female</option>
                        <option value="M" {{ $siswa->kelas === 'M' ? 'selected' : '' }}>Male</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rombel">Rombel:</label>
                    <select id="rombel" name="rombel" class="form-control" required>
                        <option value="A" {{ $siswa->rombel === 'A' ? 'selected' : '' }}>Rombel A</option>
                        <option value="B" {{ $siswa->rombel === 'B' ? 'selected' : '' }}>Rombel B</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
        
    </body>
</html>