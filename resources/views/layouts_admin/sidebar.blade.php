<body>
    <div class="sidebar">
      <div class="logo-details">
        <i class='bx bx-code-alt icon'></i>
          <div class="logo_name">Online MKP</div>
          <i class='bx bx-menu' id="btn" ></i>
      </div>
      <ul class="nav-list">
        <li>
          <a href="/admin">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
           <span class="tooltip">Dashboard</span>
        </li>
        <li>
         <a href="/register/mahasiswa/create">
           <i class='bx bx-user' ></i>
           <span class="links_name">Mahasiswa</span>
         </a>
         <span class="tooltip">Mahasiswa</span>
       </li>
       <li>
         <a href="/register/dosen/create">
           <i class='bx bx-chat' ></i>
           <span class="links_name">Dosen</span>
         </a>
         <span class="tooltip">Dosen</span>
       </li>
       <li>
         <a href="/register/admin/create">
           <i class='bx bx-pie-chart-alt-2' ></i>
           <span class="links_name">Admin</span>
         </a>
         <span class="tooltip">Admin</span>
       </li>
       <li class="profile">
           <div class="profile-details">
             <!--<img src="profile.jpg" alt="profileImg">-->
             <div class="name_job">
               <div class="name">{{Auth::user()->nama}}</div>
               <div class="job">Playing</div>
             </div>
           </div>
           <form action="{{route('loginUser.logout')}}" method="post">
            @csrf
            <button>
              <i class='bx bx-log-out' id="log_out" ></i>
            </button>
          </form>
       </li>
      </ul>
    </div>