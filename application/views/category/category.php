
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                <a href="<?=base_url('product')?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back to Product List</a>  
                <?php if($level=='admin'){?>
                <a href="<?=base_url('product/category_add')?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>  
                <?php } ?>
              </div>
              <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Category Name</th>
                    <?php if($level=='admin'){?>
                    <th>Action</th>
                    <?php }?>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  foreach ($category as $c) { ?>
                    <tr class="text-center">
                      <td><?=$no?></td>
                      <td><?=$c->category_name?></td>
                      <?php if($level=='admin'){?>
                      <td>
                        <a href="<?=base_url('product/category_edit/'.$c->category_id)?>" class="btn btn-sm btn-warning">Edit</a>  
                        <a href="<?=base_url('product/category_delete/'.$c->category_id)?>" onclick="return confirm('are you sure want to delete <?=$c->category_name?>')" class="btn btn-sm btn-danger">Delete</a>  
                      </td>
                      <?php }?>
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