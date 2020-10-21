
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
              <a href="<?=base_url('customer')?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>  
            </div>
            <?php echo form_open('customer/update');?>
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
              <div class="form-group">
                <label for="name">Customer</label>
                <input type="hidden" class="form-control" id="id_customer" name="id_customer" placeholder="customer Name" value="<?=$customer[0]->id_customer?>">
                <input type="text" class="form-control" id="name" name="name" placeholder="customer Name" value="<?=$customer[0]->customer_name?>">
                <code><?php echo form_error('name'); ?></code>
              </div>
              <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" id="company" name="company" placeholder="Company" value="<?=$customer[0]->company?>">
                <code><?php echo form_error('company'); ?></code>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" rows="3" id="address" name="address" placeholder="Address"><?=$customer[0]->address?></textarea>
                <code><?php echo form_error('address'); ?></code>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$customer[0]->email?>">
                <code><?php echo form_error('email'); ?></code>
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?=$customer[0]->phone?>">
                <code><?php echo form_error('phone'); ?></code>
              </div>
              <div class="form-group">
                <label for="whatsapp">Whatsapp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Whatsapp" value="<?=$customer[0]->whatsapp?>">
                <code><?php echo form_error('whatsapp'); ?></code>
              </div>
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary blok">Save</button>
            </div>
          <?php echo form_close();?>
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