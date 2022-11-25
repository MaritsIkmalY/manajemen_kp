@include('layouts_admin.head')
@include('layouts_admin.sidebar')
<section class="main-section">
    <div class="text">
        <h5>Formulir Admin</h5>
    </div>
    <div class="content">
        <form action="{{ route('admin.store') }}" method="post" class='form'>
            @csrf
            <div class='mb-3'>
                <label class='form-label' for="nama">Nama</label>
                <input class='form-control' type="text" id="nama" name="nama">
            </div>
            <div class='mb-3'>
                <label class='form-label' for="nip">NIP</label>
                <input class='form-control' type="text" id="nip" name="nip">
            </div>
            <div class='mb-3'>
                <label class='form-label' for="email">Email</label>
                <input class='form-control' type="email" id="email" name="email">
            </div>
            <div class='mb-3'>
                <label class='form-label' for="password">Password</label>
                <input class='form-control' type="password" name="password" id="password">
            </div>
            <input type="hidden" name="level" value='3'>
            <button name="submit" class='btn btn-primary'>Buat Akun</button>
        </form>
    </div>
</section>
@include('layouts_admin.foot')
