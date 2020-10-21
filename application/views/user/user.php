
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
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
            <div class="card-header">
              <a href="<?=base_url('user/add')?>" class="btn btn-sm btn-primary">Add New</a>  
            </div>
            <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Foto</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach ($user as $s) {
                  // print_r($user);
                  $photo = ($s->photo==null) ? 'noimage.jpg' : $s->photo ;
                  $status = ($s->status==1) ? 'Active' : 'Non Active';
                  $btn_color = ($s->status==1) ? 'btn-danger' : 'btn-success';
                  $btn_name = ($s->status==1) ? 'Disable' : 'Activate';
                  $confirm = ($s->status==1) ? 'do you want to disable this user' : 'do you want to activate this user'?>
                  <tr class="text-center">
                    <td><?=$no?></td>
                    <td><img src="<?=base_url().'assets/images/employee/'.$s->photo?>" alt="<?=$s->photo?>" width="50" height="50"></td>
                    <td><?=$s->employee_name?></td>
                    <td><?=$s->username?></td>
                    <td><?=$s->level?></td>
                    <td><?=$s->email?></td>
                    <td><?=$status?></td>
                    <td>
                      <a href="<?=base_url('user/detail/'.$s->id_users)?>" class="btn btn-sm btn-info">Detail</a>  
                      <a href="<?=base_url('user/edit/'.$s->id_users)?>" class="btn btn-sm btn-warning">Edit</a>  
                      <a href="<?=base_url('user/change_status/'.$s->id_users)?>" onclick="return confirm(<?=$confirm.' : '.$s->employee_name?>)" class="btn btn-sm <?=$btn_color?>"><?=$btn_name?></a>  
                    </td>
                  </tr>
                <?php $no++; } ?>
                
                </tbody>
              </table>
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