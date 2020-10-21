
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product</h1>
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
                <div class="tab-content p-0">
                  <a href="<?=base_url('product/add')?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
                  <a href="<?=base_url('product/category')?>" class="btn btn-sm btn-info"><i class="fa fa-info"></i> Category List</a>
                  <a href="<?=base_url('accessories')?>" class="btn btn-sm btn-info"><i class="fa fa-info"></i> Accessories List</a>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                  <?php if($product_0!=null){?>
                  <div class="card">
                    <div class="card-header">
                      <b>NEW PRODUCT ADDED</b>
                    </div>
                    <div class="card-body">
                    <?php echo $this->session->flashdata('message'); ?>
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-center">
                          <th>No</th>
                          <th>Product Name</th>
                          <th>Type</th>
                          <th>Brand</th>
                          <th>Purchase Price</th>
                          <th>Selling Price</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        foreach ($product_0 as $p) { ?>
                          <tr class="text-center">
                            <td><?=$no?></td>
                            <td><?=$p->product_name?></td>
                            <td><?=$p->type?></td>
                            <td><?=$p->brand_name?></td>
                            <td><?=$p->purchase_price?></td>
                            <td><?=$p->selling_price?></td>
                            <td>
                              <a href="<?=base_url('product/detail/'.$p->id_product)?>" class="btn btn-sm btn-info">Detail</a>  
                              <?php if($level =="admin"){?>
                                <a href="<?=base_url('product/change_status/'.$p->id_product.'/1')?>" onclick="return confirm('Do you want to accept this product ?'.<?=$p->product_name?>)" class="btn btn-sm btn-success">Accept</a>
                              <?php } else {?> 
                                <a href="<?=base_url('product/edit/'.$p->id_product)?>" class="btn btn-sm btn-warning">Edit</a> 
                                <a href="<?=base_url('product/delete/'.$p->id_product)?>" onclick="return confirm('are you sure want to delete <?=$p->category_name?>')" class="btn btn-sm btn-danger">Delete</a> 
                              <?php } ?> 
                            </td>
                          </tr>
                        <?php $no++; } ?>
                        
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                        <?php } ?>
                  <div class="card">
                    <div class="card-header">
                      <b>PRODUCT LIST</b>
                    </div>
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-center">
                          <th>No</th>
                          <th>Product Name</th>
                          <th>Type</th>
                          <th>Brand</th>
                          <th>Purchase Price</th>
                          <th>Selling Price</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        foreach ($product_1 as $p) { ?>
                          <tr class="text-center">
                            <td><?=$no?></td>
                            <td><?=$p->product_name?></td>
                            <td><?=$p->type?></td>
                            <td><?=$p->brand_name?></td>
                            <td>Rp <?=number_format($p->purchase_price,0,',','.')?></td>
                            <td>Rp <?=number_format($p->selling_price,0,',','.')?></td>
                            <td>
                              <a href="<?=base_url('product/detail/'.$p->id_product)?>" class="btn btn-sm btn-info">Detail</a>  
                              <?php if($level =="admin"){?>
                                <a href="<?=base_url('product/delete/'.$p->id_product)?>" onclick="return confirm('are you sure want to delete <?=$p->category_name?>')" class="btn btn-sm btn-danger">Delete</a>  
                              <?php }?>
                            </td>
                          </tr>
                        <?php $no++; } ?>
                        
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
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