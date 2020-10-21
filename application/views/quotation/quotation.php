
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quotation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Quotation</li>
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
              <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Quotation Number</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Company</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  foreach ($quotation as $q) { ?>
                    <tr class="text-center">
                      <td><?=$no?></td>
                      <td><?=$q->no_quotation?></td>
                      <td><?=$q->date?></td>
                      <td><?=$q->customer_name?></td>
                      <td><?=$q->company?></td>
                      <td><?=$q->status_name?></td>
                      <td>
                        <a href="<?=base_url('quotation/detail?id='.$q->no_quotation)?>" class="btn btn-sm btn-info">Detail</a>  
                        <a href="<?=base_url('quotation/edit/'.$q->no_quotation)?>" class="btn btn-sm btn-warning">Edit</a>  
                        <a href="<?=base_url('quotation/delete/'.$q->no_quotation)?>" onclick="return confirm('are you sure want to delete <?=$q->no_quotation?>')" class="btn btn-sm btn-danger">Delete</a>  
                      </td>
                    </tr>
                  <?php $no++; } ?>
                  
                  </tbody>
                </table>
              </div><!-- /.card-body -->
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