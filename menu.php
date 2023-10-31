
      <li <?php if($page == "Dashboard") echo "class='nav-item active'";
      else 
      echo "class='nav-item'";
      ?>>
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <li <?php if($page == "Buat") echo "class='nav-item active'";
      else 
      echo "class='nav-item'";
      ?>>        
      <a class="nav-link collapsed" href="create-pengaduan.php">
          <i class="far fa-fw fa-plus-square"></i>
          <span>Buat Laporan</span>
        </a>
      </li>

      <li <?php if($page == "List") echo "class='nav-item active'";
      else 
      echo "class='nav-item'";
      ?>>     
              <a class="nav-link collapsed" href="daftar-pengaduan.php">
          <i class="far fa-fw fa-window-maximize"></i>
          <span> List Progres Laporan</span>
        </a>
      </li>
      