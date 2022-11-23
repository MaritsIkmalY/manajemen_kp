<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Dosen</title>
</head>
<body>
    <form action="{{route("dosen.store")}}" method="post">
        @csrf
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama">
        </div>
        <div>
            <label for="nip">NIP</label>
            <input type="text" id="nip" name="nip">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="jurusan">Jurusan : </label>
            <select name="jurusan" id="jurusan">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
                <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                <option value="Teknik Elektronika">Teknik Elektronika</option>
            </select>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="hidden" name="level" value='1'>
        <button name="submit">submit</button>
    </form>
</body>
</html>