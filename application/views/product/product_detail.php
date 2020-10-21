
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <div class="tab-content p-0">
                <a href="<?=base_url('product')?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>  
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-5">
                      <div class="card " id="new_photos">
                        <div class="card-header text-right">
                          <a href="#" class="btn btn-sm btn-danger" onclick="btn_close()"><i class="fa fa-no"></i> Close</a>  
                        </div>
                        <?php echo form_open_multipart('product/add_image');?>
                        <div class="card-body">
                          <?php echo $this->session->flashdata('message'); ?>
                          <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="hidden" name="id" value="<?=$product[0]->id_product?>">
                                <input type="file" multiple class="custom-file-input" accept="image/*" name="files[]" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary blok">Save</button>
                        </div>
                      <?php echo form_close();?>
                        <!-- /.card-body -->
                      </div>
                      <?php if($level=='admin'){?>
                      <div class="col-sm-12 text-right" id="btn_add">
                        <button class="btn btn-sm btn-primary" onclick="add_photos()">Add Photos</button>
                      </div>
                      <?php } if ($image==null) {?>
                        <div class="col-sm-12 text-center">
                          <a href="<?=base_url('assets/images/products/noimage.jpg')?>" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="gallery">
                            <img src="<?=base_url('assets/images/products/noimage.jpg')?>" height="100px" class="img-fluid mb-2" alt="black sample"/>
                          </a>
                        </div>
                      <?php } else {?>
                        
                          <div class="row">
                            
                          
                            <div class="col-sm-12 text-center">
                              <a href="<?=base_url('assets/images/products/').$image[0]->file?>" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="gallery">
                                <img src="<?=base_url('assets/images/products/').$image[0]->file?>" height="100px" class="img-fluid mb-2" alt="black sample"/>
                              </a>
                            </div>
                            <?php $no = 1; foreach ($image as $i) {?>
                                  <div class="col-sm-4 text-center">
                                    <a href="<?=base_url('assets/images/products/').$i->file?>" data-toggle="lightbox" data-title="sample 3 - red" data-gallery="gallery">
                                      <img src="<?=base_url('assets/images/products/').$i->file?>" alt="red sample" height="100px"/>
                                    </a>
                                    <?php if($level=='admin'){?>
                                    <a href="<?=base_url('product/delete_image/'.$i->id.'/'.$product[0]->id_product) ?>" class="btn btn-sm btn-danger">Delete</a>
                                    <?php } ?>
                                  </div>
                            <?php $no++; } ?>
                            
                          </div>
                            <?php  }?>
                      <!-- /.card -->
                    </section>
                    <section class="col-lg-7">
                      
                      <!-- Custom tabs (Charts with tabs)-->
                      <div class="card border-secondary">
                        <div class="card-header"> 
                          <?php if($level=='admin'){?>
                              <a href="<?=base_url('product/edit/'.$product[0]->id_product)?>" class="float-right btn btn-sm btn-warning">Edit</a> 
                          <?php }?>
                          <h4 class="text-center">
                            <?=$product[0]->product_name?>
                            </h4>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content p-0">
                            <table>
                            <tr><td>Brand</td><td>: <?=$product[0]->brand_name?></td>   </tr>
                            <tr><td>type</td><td>: <?=$product[0]->type?></td>   </tr>
                            <tr><td>Harga Beli</td><td>: Rp <?=number_format($product[0]->purchase_price,0,',','.');?></td>   </tr>
                            <tr><td>Harga Jual</td><td>: Rp <?=number_format($product[0]->selling_price,0,',','.');?> </td>   </tr>
                            </table>
                          </div>
                        </div><!-- /.card-body -->
                      </div>
                      <div class="card ">
                        <div class="card-header">
                            Specification
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content p-0">
                            <?=$product[0]->spec?>
                          </div>
                        </div><!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    
                    <!-- right col -->
                  </div>
                </div>
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

  