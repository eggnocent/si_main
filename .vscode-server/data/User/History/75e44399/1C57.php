<!DOCTYPE html>
<html>
<head>
    <title>Show Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            max-width: 400px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .card-title {
            margin: 0;
            padding: 15px;
        }
        .card-body {
            padding: 15px;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Siswa</h3>
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" id="nis" class="form-control" value="{{ $siswa->nis }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" class="form-control" value="{{ $siswa->nama }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" class="form-control" value="{{ $siswa->gender == 'M' ? 'Laki-laki' : 'Perempuan' }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="rombel">Rombel</label>
                        <input type="text" id="rombel" class="form-control" value="{{ $siswa->rombel }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" id="kelas" class="form-control" value="{{ $siswa->kelas }}" readonly>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">FOTO</label>
                        <br>
                        <img src="{{ asset('storage/foto_siswa/'.$siswa->foto) }}" alt="Foto Siswa" style="max-width: 200px">
                    </div>

                    <div class="form-group">
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>