<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Monitoring</title>
</head>
<body>
    <form action="/dosen/proposal_dosen/{{$data[0]->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label for="file">File</label>
            <input type="file" id="file" name='file_dsn'">
        </div>
        <div>
            <label for="catatan_dosen">Catatan Dosen</label>
            <textarea name="catatan_dosen" id='catatan_dosen'>
            </textarea>
        </div>
        <button>update</button>
    </form>
</body>
</html>