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
            <?php echo form_open('quotation/add'); ?>
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>

              <div class="row " id="test2">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Customer</label>
                    <select class="form-control select2" name="name" style="width: 100%;">
                      <option value="">Select Customer..</option>
                      <?php foreach ($customer as $c) { ?>
                        <option value="<?= $c->id_customer ?>"><?= $c->customer_name ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="company" disabled>
                    <code><?php echo form_error('company'); ?></code>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email" disabled>
                    <code><?php echo form_error('email'); ?></code>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="number" class="form-control" id="nohp" name="nohp" placeholder="No Hp" disabled>
                    <code><?php echo form_error('nohp'); ?></code>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" rows="3" id="address" name="address" placeholder="Address" disabled></textarea>
                    <code><?php echo form_error('address'); ?></code>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="quotation">No Quotation</label>
                    <input type="text" class="form-control" id="quotation" name="quotation" placeholder="No Quotation" disabled>
                    <code><?php echo form_error('quotation'); ?></code>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control" id="date" name="date" placeholder="Date" value="<?=date('d-m-Y')?>" disabled>
                    <code><?php echo form_error('date'); ?></code>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="lead_time">Lead Time (Days)</label>
                    <input type="number" class="form-control" id="lead_time" name="lead_time" placeholder="Lead Time">
                    <code><?php echo form_error('lead_time'); ?></code>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="reference">Reference</label>
                    <select class="form-control select2" name="name" style="width: 100%;">
                      <option value="">Select References..</option>
                      <?php for ($i=0; $i < count($reference); $i++) { ?>
                        <option value="<?= $reference[$i]?>"><?= $reference[$i]?></option>
                      <?php } ?>
                    </select>
                    <code><?php echo form_error('reference'); ?></code>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="payment">Payment</label>
                    <input type="text" class="form-control" id="payment" name="payment" placeholder="Payment">
                    <code><?php echo form_error('payment'); ?></code>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="currency">Currency</label>
                    <input type="text" class="form-control" id="currency" name="currency" placeholder="Currency">
                    <code><?php echo form_error('currency'); ?></code>
                  </div>
                </div>
              </div>
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
                        <div class="row">
                          <div class="col-lg-4">
                            Discount (%)
                          </div>
                          <div class="col-lg-8">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <input type="checkbox" name="discount[]" id="discount" value="y" onchange="discount()">
                                </span>
                              </div>
                              <input type="number" class="form-control form-control-sm" name="value_discount[]" id="value_discount">
                            </div>
                            <!-- /input-group -->
                          </div>
                        </div>


                      </div>
                    </div>
                  </div>
                <?php  } ?>
              </div>
            </div>
            </form>
          </div>
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