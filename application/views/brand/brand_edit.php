
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Brand</h1>
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
              <a href="<?=base_url('brand')?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>  
            </div>
            <?php echo form_open_multipart('brand/update');?>
            <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
              <div class="form-group">
                <label for="name">Brand Name</label>
                <input type="hidden" class="form-control" id="id" name="id" placeholder="id" value="<?=$brand[0]->id_brand?>">
                <input type="hidden" class="form-control" id="logo" name="logo" placeholder="logo" value="<?=$brand[0]->logo?>">
                <input type="text" class="form-control" id="name" name="name" placeholder="Brand Name" value="<?=$brand[0]->brand_name?>">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="<?=$brand[0]->address?>">
              </div>
              <?php  $logo = ($brand[0]->logo==null) ? 'noimage.jpg' : $brand[0]->logo ; ?>
              <img src="<?=base_url().'assets/images/brands/'.$logo?>" alt="<?=$brand[0]->logo?>" width="200" height="200">
              <div class="form-group">
                <label for="exampleInputFile">Logo</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-warning blok">Update</button>
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