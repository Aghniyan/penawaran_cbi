
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
              <a href="<?=base_url('user')?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>  
            </div>
            <?php echo form_open_multipart('user/insert');?>
            <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Employee's Data </h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Employee Name <code>*</code></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="user Name" value="<?= set_value('name') ?>">
                    <code><?php echo form_error('name'); ?></code>
                  </div>
                  <div class="form-group">
                    <label for="nik">NIK <code>*</code></label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK"  value="<?= set_value('nik') ?>">
                    <code><?php echo form_error('nik'); ?></code>
                  </div>
                  <div class="form-group">
                    <label for="address">Address <code>*</code></label>
                    <textarea class="form-control" rows="3" id="address" name="address" placeholder="Address"> <?= set_value('address') ?></textarea>
                    <code><?php echo form_error('address'); ?></code>
                  </div>
                  <div class="form-group">
                    <label for="email">Email <code>*</code></label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email"  value="<?= set_value('email') ?>">
                    <code><?php echo form_error('email'); ?></code>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone <code>*</code></label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone"  value="<?= set_value('phone') ?>">
                    <code><?php echo form_error('phone'); ?></code>
                  </div>
                  <div class="form-group">
                    <label for="whatsapp">Whatsapp</label>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="whatsapp"  value="<?= set_value('whatsapp') ?>">
                    <code><?php echo form_error('whatsapp'); ?></code>
                  </div>
                  <div class="form-group">
                    <label for="position">position <code>*</code></label>
                    <select class="form-control" id="position" name="position"  value="<?= set_value('position') ?>">
                      <option value="">Choose..</option>
                      <option <?= (set_value('position')=="accountant") ? 'selected':''?> value="accountant">Accountant</option>
                      <option <?= (set_value('position')=="marketing") ? 'selected':''?> value="marketing">Marketing</option>
                      <option <?= (set_value('position')=="software developer") ? 'selected':''?> value="software developer">Software Developer</option>
                      <option <?= (set_value('position')=="hardware engineer") ? 'selected':''?> value="hardware engineer">Hardware Engineer</option>
                      <option <?= (set_value('position')=="mechanics") ? 'selected':''?> value="mechanics">Mechanics</option>
                    </select>
                    <code><?php echo form_error('position'); ?></code>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Photo <code>*[ jpg | png | jpeg ]</code></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" accept="image/*" id="exampleInputFile" name="file" onchange="validate(this.value)">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                    <code id="check_photo"><?php echo form_error('file'); ?></code>
                  </div>
                </div>
              </div>
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">User's Data</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="username">Username <code>*</code></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="username"  value="<?= set_value('username') ?>">
                    <code><?php echo form_error('username'); ?></code>
                  </div>
                  <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" id="level" name="level">
                      <option value="">Choose..</option>
                      <option <?= (set_value('level')=="admin") ? 'selected':''?> value="admin">Admin</option>
                      <option <?= (set_value('level')=="user") ? 'selected':''?> value="user">User</option>
                    </select>
                    <code><?php echo form_error('level'); ?></code>
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