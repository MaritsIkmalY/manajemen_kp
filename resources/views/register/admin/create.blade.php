@include('layouts_admin.head')
@include('layouts_admin.sidebar')
<section class="main-section">
    <div class="text">
        <h5>Formulir Admin</h5>
    </div>
    <div class="content">
        <form action="{{route("admin.store")}}" method="post">
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
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <input type="hidden" name="level" value='3'>
            <button name="submit" class='submit'>submit</button>
        </form>
    </div>
</section>
@include('layouts_admin.foot')