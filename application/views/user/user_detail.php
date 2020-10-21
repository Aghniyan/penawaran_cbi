
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 ">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
            <div class="card-header">
              <a href="<?=base_url('user')?>" class="btn btn-sm btn-default">Back</a>  
            </div>
            <div class="card-body row">
              <div class="col-md-4">
              <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-secondary">
                    <div class="widget-user-image">
                      <img class="img-circle elevation-2" src="<?=base_url('assets/images/employee/').$user[0]->photo?>" alt="User Avatar" width="200px" height="200px">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><?=ucfirst($user[0]->employee_name)?></h3>
                  </div>
                  <div class="card-footer p-0">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link">
                          Phone <span class="float-right"><?=$user[0]->phone?></span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link">
                          Whatsapp <span class="float-right"><?=$user[0]->whatsapp?></span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link">
                          Email <span class="float-right"><?=$user[0]->email?></span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link">
                          Username <span class="float-right"><?=$user[0]->username?></span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              <!-- /.widget-user -->
              </div>
              <div class="col-md-8">
                <div class="card card-secondary card-outline">
                  <div class="card-body box-profile">
                    <strong><i class="fas fa-user mr-1"></i> Position</strong>

                    <p class="text-muted">
                      <?=$user[0]->position?>
                    </p>

                    <hr>
                    <strong><i class="fas fa-book mr-1"></i> NIK</strong>

                    <p class="text-muted">
                      <?=$user[0]->nik?>
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                    <p class="text-muted"><?=$user[0]->address?></p>

                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>