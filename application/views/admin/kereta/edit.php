<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-edit"></i>&nbsp; <?php echo $title ?></h4>

<div class="col-xs-5">
  <?php echo $this->session->flashdata('message'); ?>
  <?php echo form_open('admin/kereta/update/'.$trains->id, array('role' => 'form')); ?>
    <div class="form-group">
      <label for="Kode Kereta" class="control-label">Kode Kereta</label>
      <input type="text" class="form-control" placeholder="Kode Kereta" name="kode_kereta" value="<?php echo set_value('kode_kereta', $trains->kode_kereta); ?>">
    </div>
    <div class="form-group">
      <label for="Nama Kereta" class="control-label">Nama Kereta</label>
      <input type="text" class="form-control" placeholder="Nama Kereta" name="nama_kereta" value="<?php echo set_value('nama_kereta', $trains->nama_kereta); ?>">
    </div>
    <div class="form-group">
      <label>Kelas Kereta</label>
      <?php foreach ($kls_kereta as $kls) { ?>
      <div class="checkbox">        
          <label>
              <input type="checkbox" value="<?php echo $kls->nama_kelas ?>" name="kelas_kereta_id[]"><?php echo ucwords($kls->nama_kelas) ?>
          </label>
      </div>
       <?php } ?>                
    </div>  
    <div class="form-group">
        <label>Status</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="status1" value="1" <?php echo ($trains->status) == '1' ? 'checked' : '' ?>>Activate
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="status2" value="0" <?php echo ($trains->status) == '0' ? 'checked' : '' ?>>Deactivate
            </label>
        </div>
    </div>
    <br>
    <div class="form-group">
      <p>
        <?php echo btn_submit('Update'); ?>
        <?php echo link_to_previous_page('admin/kereta', ' Back'); ?>
      </p>
    </div>
  <?php echo form_close(); ?>
</div>

<?php $this->load->view('admin/layouts/footer') ?>