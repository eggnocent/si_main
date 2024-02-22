<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Delete Siswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <h1>Delete Siswa</h1>
        <hr/>

        <div class="container">
            <p>Are you sure you want to delete this student?</p>
            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
        
    </body>
</html> -->