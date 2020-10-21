
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Brand</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Brand</li>
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
              <a href="<?=base_url('brand/add')?>" class="btn btn-sm btn-primary">Add New</a>  
            </div>
            <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Brand Name</th>
                  <th>Address</th>
                  <th>Logo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach ($brand as $b) { ?>
                  <tr class="text-center">
                    <td><?=$no?></td>
                    <td><?=$b->brand_name?></td>
                    <td><?=$b->address?></td>
                    <?php  $logo = ($b->logo==null) ? 'noimage.jpg' : $b->logo ; ?>
                    <td><img src="<?=base_url().'assets/images/brands/'.$logo?>" alt="<?=$b->brand_name?>" width="100" height="100"></td>
                    <td>
                      <a href="<?=base_url('brand/edit/'.$b->id_brand)?>" class="btn btn-sm btn-warning">Edit</a>  
                      <a href="<?=base_url('brand/delete/'.$b->id_brand)?>" onclick="return confirm('apakah anda yakin akan menghapus brand <?=$b->brand_name?>')" class="btn btn-sm btn-danger">Delete</a>  
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
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>