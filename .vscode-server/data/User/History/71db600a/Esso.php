<!DOCTYPE html>
<html>
    <head>
        <title>Create Siswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <div class="mb-3 text-center">
        <h1>Tambah Siswa</h1>
        <hr/>
        </div>



        <div class="container">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nis">NIS:</label>
                    <input type="text" id="nis" name="nis" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rombel">Rombel:</label>
                    <select id="rombel" name="rombel" class="form-control" required>
                        <option value="A">Rombel A</option>
                        <option value="B">Rombel B</option>
                    </select>
                </div>
                <div>
                <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
        
    </body>
</html>

<!-- <style>
    body{
        background-color : blue;
        font-family : 'Times New Roman';
        font-size : 45px;
    }

</style> -->