<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Monitoring</title>
</head>
<body>
    <form action="/mahasiswa/monitoring_mahasiswa/{{$data[0]->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label for="file">File</label>
            <input type="file" id="file" name='file_mhs' value="{{$data[0]->file_mhs}}">
        </div>
        <div>
            <label for="keterangan">keterangan</label>
            <textarea name="keterangan" id='keterangan'>{{$data[0]->keterangan}}</textarea>
        </div>
        <button>update</button>
    </form>
</body>
</html>