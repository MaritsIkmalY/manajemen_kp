@include('layouts_admin.head')
@include('layouts_admin.sidebar')
<section class="main-section">
    <div class="text">
        <h5>
            Formulir Mahasiswa
        </h5>
    </div>
    <div class="content">
        <form action="{{ route('mahasiswa.store') }}" method="post" class='form'>
            @csrf
            <div class='mb-3'>
                <label class='form-label' for="nama">Nama</label>
                <input class='form-control' type="text" id="nama" name="nama">
            </div>
            <div class='mb-3'>
                <label class='form-label' for="nrp">NRP</label>
                <input class='form-control' type="text" id="nrp" name="nrp">
            </div>
            <div class='mb-3'>
                <label class='form-label' for="email">Email</label>
                <input class='form-control' type="email" id="email" name="email">
            </div>
            <div class='mb-3'>
                <label class='form-label' for="kelas">Kelas</label>
                <input class='form-control' type="text" id="kelas" name="kelas">
            </div>
            <div class='mb-3'>
                <label class='form-label' for="jurusan">Jurusan : </label>
                <select class='form-select' name="jurusan" id="jurusan">
                    <option value="Teknik Elektronika">Teknik Elektronika</option>
                    <option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
                    <option value="Teknik Rekayasa Internet">Teknik Rekayasa Internet</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Komputer">Teknik Komputer</option>
                    <option value="Sains Data Terapan">Sains Data Terapan</option>
                    <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                    <option value="Sistem Pembangkit Energi">Sistem Pembangkit Energi</option>
                    <option value="Teknologi Game">Teknologi Game</option>
                    <option value="Multimedia Broadcasting">Multimedia Broadcasting</option>
                    <option value="Teknologi Rekayasa Multimedia">Teknologi Rekayasa Multimedia</option>
                </select>
            </div>
            <div class='mb-3'>
                <label class='form-label' for="password">Password</label>
                <input class='form-control' type="password" name="password" id="password">
            </div>
            <input type="hidden" name="level" value='2'>
            <button name="submit" class='btn btn-primary'>Buat Akun</button>
        </form>
    </div>
</section>
@include('layouts_admin.foot')
