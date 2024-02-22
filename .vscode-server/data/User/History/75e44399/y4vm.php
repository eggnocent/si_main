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
                <div class="mb-3">
                    <label class="form-label">NIS:</label>
                    <p>{{ $siswa->nis }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama:</label>
                    <p>{{ $siswa->nama }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender:</label>
                    <p>{{ $siswa->gender === 'F' ? 'Female' : 'Male' }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas:</label>
                    <p>
                        @if ($siswa->kelas === 'X')
                            X
                        @elseif ($siswa->kelas === 'XI')
                            XI
                        @elseif ($siswa->kelas === 'XII')
                            XII
                        @else
                            XIII
                        @endif
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rombel:</label>
                    <p>{{ $siswa->rombel === 'A' ? 'Rombel A' : 'Rombel B' }}</p>
                </div>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</body>
</html>