
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Product</h1>
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
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
            <div class="card-header">
              <a href="<?=base_url('product')?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>  
            </div>
            <?php echo form_open('product/update');?>
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
              <div class="form-group">
                <label for="name">Product Name</label>
                  <input type="hidden" class="form-control" id="id_product" name="id_product" placeholder="product id_product" value="<?=$product[0]->id_product?>">
                  <input type="text" class="form-control" id="name" name="name" placeholder="product Name" value="<?=$product[0]->product_name?>">
                <code><?php echo form_error('name'); ?></code>
              </div>
              <div class="row">
                <div class="col-lg-4">
                <div class="form-group">
                  <label>brand</label>
                  <select class="form-control select2" name="brand" style="width: 100%;">
                  <?php foreach ($brand as $b) {?>
                    <option <?=($b->id_brand==$product[0]->brand_id)? 'selected':'';?> value="<?=$b->id_brand?>"><?=$b->brand_name?></option>
                  <?php }?>
                  </select>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label>category</label>
                  <select class="form-control select2" name="category" style="width: 100%;">
                  <?php foreach ($category as $c) {?>
                    <option <?=($c->category_id==$product[0]->category_id)? 'selected':'';?> value="<?=$c->category_id?>"><?=$c->category_name?></option>
                  <?php }?>
                  </select>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="type">Product type</label>
                  <input type="text" class="form-control" id="type" name="type" placeholder="product type" value="<?=$product[0]->type?>">
                  <code><?php echo form_error('type'); ?></code>
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="fungsi">Fungsi / Info</label>
                <input type="text" class="form-control" id="fungsi" name="fungsi" placeholder="product fungsi" value="<?=$product[0]->info?>">
                <code><?php echo form_error('fungsi'); ?></code>
              </div>
              <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="purchase">Purchase Price</label>
                  <input type="number" class="form-control" id="purchase" name="purchase" placeholder="purchase price" value="<?=$product[0]->purchase_price?>">
                  <code><?php echo form_error('purchase'); ?></code>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="selling">Selling Price</label>
                  <input type="number" class="form-control" id="selling" name="selling" placeholder="selling price" value="<?=$product[0]->selling_price?>">
                  <code><?php echo form_error('selling'); ?></code>
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Specification">Specification</label>
                <textarea name="spec" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 12px; border: 1px solid #dddddd; padding: 10px;"><?=$product[0]->spec?></textarea>
                <code><?php echo form_error('Specification'); ?></code>
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