  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-navy elevation-4" style="opacity: 3.8" >
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link ">
      <img src="logo.jpg" alt="Admin Logo" class="brand-image  elevation-3">
      <!--<span class="brand-text font-weight-light">Admin</span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"  style="opacity: .15" >
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline" >
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>


     

      <!-- Sidebar Menu -->
      <nav class="mt-2 nav-bg-dark" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>

      
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="fa fa-user-times mr-1" aria-hidden="true"></i>
              <p>
              Agent
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Agents.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agents</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="AgentSession.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Agent Session</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="TargetSetting.php" class="nav-link">
            <i class="fa fa-bullseye" aria-hidden="true"></i>
              <p>
              Store Target
                
              </p>
            </a>            
          </li>
         
              
              
            
          
         
        
          
         
         

          <li class="nav-item has-treeview">
            <a href="Sales.php" class="nav-link">
            <i class='fas fa-balance-scale'></i>
              <p>
              Sales
                
              </p>
            </a>

            <!-- <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="Sales.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="NetSales.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Net Sales</p>
                </a>
              </li>
              </ul> -->
           
          </li>

         

          <li class="nav-item ">
            <a href="Feedback.php" class="nav-link">
            <i class="fa fa-thumbs-up " aria-hidden="true"></i>
              <p>
              Feedback
              </p>
            </a>
           
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link">
            <i class="fa fa-bug" aria-hidden="true"></i>
            <p>
              Reports
              </p>
            </a>
           
          </li>
          <br>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>