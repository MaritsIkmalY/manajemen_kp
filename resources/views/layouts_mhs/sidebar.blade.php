<body>
    <div class="sidebar">
      <div class="logo-details">
        <i class='bx bx-code-alt icon'></i>
          <div class="logo_name">Online MKP</div>
          <i class='bx bx-menu' id="btn" ></i>
      </div>
      <ul class="nav-list">
        <li>
          <a href="/mahasiswa/main_mhs">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
           <span class="tooltip">Dashboard</span>
        </li>
        <li>
         <a href='/mahasiswa/pengajuan_mahasiswa/'>
           <i class='bx bx-user' ></i>
           <span class="links_name">Pengajuan</span>
         </a>
         <span class="tooltip">Pengajuan</span>
       </li>
       <li>
         <a href="/mahasiswa/monitoring_mahasiswa/">
           <i class='bx bx-chat' ></i>
           <span class="links_name">Monitoring</span>
         </a>
         <span class="tooltip">Monitoring</span>
       </li>
       <li>
         <a href="/mahasiswa/proposal_mahasiswa/">
           <i class='bx bx-pie-chart-alt-2' ></i>
           <span class="links_name">Proposal</span>
         </a>
         <span class="tooltip">Proposal</span>
       </li>
       <li class="profile">
           <div class="profile-details">
             <!--<img src="profile.jpg" alt="profileImg">-->
             <div class="name_job">
               <div class="name">{{Auth::user()->nama}}</div>
               <div class="job">
                @php
                  // use Illuminate\Support\Facades\Auth;
                  $jurusan = App\Models\mahasiswa::where('id_user',Auth::user()->id)->get('jurusan');
                @endphp
                {{$jurusan[0]->jurusan}}
               </div>
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