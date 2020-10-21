<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">New Quotation</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
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
            <?php echo form_open(''); ?>
            <form action="<?=base_url('quotation/search')?>" method="get">
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
              <div class="row">
                <div class="col-lg-7">
                  <div class="form-group">
                    <label for="type">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="product name">
                    <code><?php echo form_error('type'); ?></code>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>brand</label>
                    <select class="form-control select2" name="brand" style="width: 100%;">
                      <option value="">All Brand</option>
                      <?php foreach ($brand as $b) { ?>
                        <option value="<?= $b->id_brand ?>"><?= $b->brand_name ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-1  align-bottom">
                  <div class="form-group">
                    <label for="type"></label>
                    <button type="submit" name="search" class="btn btn-primary btn-block">Search</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
          <?php if (isset($_POST['search'])) {
            if ($product == null) {
              echo "<p class='text-center'>Product <b>" . $_POST['name'] . "</b> No found </p>";
            } else { ?>
              <div class="card">
                <div class="card-body">
                  <?php echo $this->session->flashdata('result'); ?>
                  <?php echo form_open('quotation/add'); ?>
                  <div class="card-header">
                    <button type="submit" name="submit" class="btn btn-sm  btn-primary"><i class="fas fa-plus"></i> Create Quotation</button>
                    <button class="btn btn-sm btn-outline-primary">Select All</button>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <?php

                      foreach ($product as $p) {
                        $gambar = $this->m_product->get_data_image(['product_id' => $p->id_product])->row();
                      ?>
                        <div class="col-md-3">
                          <div class="card card-outline card-primary">
                            <div class="card-header">
                              <h3 class="card-title"><strong><?= $p->product_name ?></strong></h3>
                              <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <?php if ($gambar != null) { ?>
                                <p class="text-center"><img class="img-thumbnail rounded" src="<?= base_url('assets/images/products/') . $gambar->file ?>" width="200px" height="200px" alt=""></p>
                              <?php } else { ?>
                                <p class="text-center"><img style="object-fit: cover;" class="img-thumbnail rounded" src="<?= base_url('assets/images/products/noimage.jpg') ?>" width="200px" height="200px" alt=""></p>
                              <?php } ?>
                              <p><?= $p->info ?></p>
                              <p>Rp <?= number_format($p->selling_price, 0, ',', '.') ?></p>
                              <input type="checkbox"  name="produk[]" value="<?=$p->id_product?>" class="btn btn-sm btn-primary"> Pilih
                            </div>
                          </div>
                        </div>
                    <?php  }
                    } ?>
                    </div>
                  </div>
                  <?php echo form_close()?>
                </div>
              </div>
            <?php } ?>
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