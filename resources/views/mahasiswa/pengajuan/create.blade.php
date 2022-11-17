<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pengajuan Mahasiswa</title>
</head>
<body>
    <form action="{{route("pengajuan_mahasiswa.store")}}" method="post">
        @csrf
        <div>
            <label for="Nama-Tempat">Nama Tempat</label>
            <input type="text" name="nama_tempat" id="Nama-Tempat"/>    
        </div>
        <div>
            <label for="Job">Job</label>
            <input type="text" name="job" id="Job"/>
        </div>
        <div>
            <label for="dosen">Dosen Pembimbing</label>
            <select name="id_dosen" id="dosen">
                @foreach ($dosens as $dosen)
                    <option value="{{$dosen->id}}">{{$dosen->nama_dsn}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" class="btn btn-primary" value="submit" name="submit">
        </div>
    </form>
</body>
</html>