<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="/assets/images/face.jpg" alt="profile">
            <span class="login-status online"></span>
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2"><?php echo($_SESSION["membername"])?></span>
            <span class="text-secondary text-small">Member</span>
          </div>
        </a>
      </li>
      <li class="nav-item <?php if($_SERVER['PHP_SELF'] == '/member/home.php'){ echo 'active'; } ?>">
        <a class="nav-link" href="/member/home.php">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>

      <li class="nav-item <?php if($_SERVER['PHP_SELF'] == '/member/token.php'){ echo 'active'; } ?>">
        <a class="nav-link" href="/member/token.php">
          <span class="menu-title">Tokens</span>
          <i class="mdi mdi-cards menu-icon"></i>
        </a>
      </li>

      <li class="nav-item <?php if($_SERVER['PHP_SELF'] == '/member/ticket.php'){ echo 'active'; } ?>">
        <a class="nav-link" href="/member/ticket.php?page=1">
          <span class="menu-title">Tickets</span>
          <i class="mdi mdi-history menu-icon"></i>
        </a>
      </li>

      <li class="nav-item <?php if($_SERVER['PHP_SELF'] == '/member/report.php'){ echo 'active'; } ?>">
        <a class="nav-link" href="/member/report.php">
          <span class="menu-title">Report</span>
          <i class="mdi mdi-arrow-down-bold menu-icon"></i>
        </a>
      </li>
      
    </ul>
  </nav>