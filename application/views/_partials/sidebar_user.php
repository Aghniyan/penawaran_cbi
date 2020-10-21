
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>" class="brand-link">
      <img src="<?=base_url().'assets/images/logo_cbi.jpg'?> " alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PT. CBInstrument</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url().'assets/images/employee/'.$photo?>" class="img-circle elevation-2" alt="<?=$photo?>">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$name?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url('dashboard')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('quotation/search')?>" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                New Quotation
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('quotation')?>" class="nav-link">
            <i class=" nav-icon fas fa-portrait"></i>
              <p>
                Quotations
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('product')?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Product
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
