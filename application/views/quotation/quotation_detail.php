
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quotation Detail</h1>
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
              <div class="card-header">
                <div class="tab-content p-0">
                  <a href="<?=base_url('quotation')?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>  
                  <a href="#" class="btn btn-sm btn-secondary"><i class="fa fa-file"></i> Download as PDF</a>  
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content p-0 row">
                  <div class="col-lg-6">
                    <table>
                      <tr>
                        <td class="align-top">Customer :</td>
                        <td>
                          <strong><?=$quotation[0]->customer_name?></strong>
                          <p><?=$quotation[0]->company.', '. $quotation[0]->address?></p>
                          <p><?=$quotation[0]->phone.' - '. $quotation[0]->email?></p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-6 float-right">
                    <p></p>
                    <table class="float-right">
                      <tr>
                        <td class="text-right">Quotation Number :</td>
                        <td><strong><?=$quotation[0]->no_quotation?></strong></td>
                      </tr>
                      <tr>
                        <td class="text-right">Date :</td>
                        <td><?=$quotation[0]->date?></td>
                      </tr>
                      <tr>
                        <td class="text-right">Referensi :</td>
                        <td><?=$quotation[0]->referensi?></td>
                      </tr>
                      <tr>
                        <td class="text-right">Payment :</td>
                        <td><?=$quotation[0]->payment?></td>
                      </tr>
                      <tr>
                        <td class="text-right">Currency :</td>
                        <td><?=$quotation[0]->currency?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <br>
                <div>
                  <table class="table table-sm text-center">
                    <thead>
                      <tr class="table-active ">
                        <th scope="col">Ship Via</th>
                        <th scope="col">Lead Times</th>
                        <th scope="col">Validity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?=$quotation[0]->ship_via?></td>
                        <td><?=$quotation[0]->leadtime?></td>
                        <td><?=$quotation[0]->validity?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div>
                  <table class="table table-border table-sm text-center">
                    <thead>
                      <tr class="table-active ">
                        <th scope="col">No</th>
                        <th scope="col">Product</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Price / Unit</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no =1;
                        $total_amount = 0;
                        foreach ($product as $p) {
                        $amount = ($p->qty * $p->price)-($p->discount/100)*($p->qty * $p->price);
                        $total_amount+=$amount;
                        $rest_pasyment= $total_amount - $quotation[0]->down_payment;
                        $ppn = 0.1*$total_amount;
                        ?>
                        <tr>
                          <td><?=$no?></td>
                          <td><?=$p->product_name?></td>
                          <td><?=$p->qty?></td>
                          <td><?=$p->unit?></td>
                          <td><?=$p->price?></td>
                          <td><?=$p->discount?> %</td>
                          <td width="200px"><?=$amount?></td>
                        </tr>
                      <?php $no++; } ?>
                        <tr>
                          <td colspan="6" class="text-right">Down Payment</td>
                          <td><?=$quotation[0]->down_payment?></td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-right">Rest Payment</td>
                          <td><?=$rest_pasyment?></td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-right">PPN 10%</td>
                          <td><?=$ppn?></td>
                        </tr>
                        <tr>
                          <th colspan="6" class="text-right">Total Payment</th>
                          <th><?=$total_amount+$ppn?></th>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <br><br>
                <hr>
                <div>
                  <table class="table table-sm text-center">
                    <thead>
                      <tr class="table-active ">
                        <th scope="col">No</th>
                        <th scope="col" width = '300px'>Description</th>
                        <th scope="col">Specification</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($product as $p) { 
                      $gambar = $this->m_product->get_data_image(['product_id'=>$p->product_id])->row();
                      // var_dump($gambar);
                      
                      ?>
                        <tr>
                          <td><?=$no?></td>
                          <td>
                            <strong><?=$p->product_name?></strong><br>
                            <strong>Rp <?=number_format($p->price,0,',','.')?></strong><br>
                            Tipe : <?=$p->type?> | Brand : <?=$p->brand_name?> <br>
                            <?php if ($gambar!=null) {?>
                              <img src="<?=base_url('assets/images/products/').$gambar->file?>" width="100px" alt="">
                            <?php }?>

                          </td>
                          <td><?=$p->spec?></td>
                        </tr>
                      <?php $no++; }?>
                      
                    </tbody>
                  </table>
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