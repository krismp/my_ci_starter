<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-plus-square"></i>&nbsp; <?php echo $title ?></h4>

<div class="col-xs-5">
  <?php echo $this->session->flashdata('message'); ?>
  <?php echo form_open('admin/kereta/save', array('role' => 'form')); ?>
    <div class="form-group">
      <label for="Kode Kereta" class="control-label">Kode Kereta</label>
      <input type="text" class="form-control" placeholder="Kode Kereta" name="kode_kereta" value="<?php echo set_value('kode_kereta'); ?>">
    </div>
    <div class="form-group">
      <label for="Nama Kereta" class="control-label">Nama Kereta</label>
      <input type="text" class="form-control" placeholder="Nama Kereta" name="nama_kereta" value="<?php echo set_value('nama_kereta'); ?>">
    </div>
    <div class="form-group">
      <label>Kelas Kereta</label>
      <?php foreach ($trains as $train) { ?>
      <div class="checkbox">        
          <label>
              <input type="checkbox" value="<?php echo $train->nama_kelas ?>" name="kelas_kereta_id[]"><?php echo ucwords($train->nama_kelas) ?>
          </label>
      </div>
       <?php } ?>                
    </div>
    <div class="form-group">
        <label>Status</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="status1" value="1">Aktif
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="status2" value="0" checked>Nonaktif
            </label>
        </div>
    </div>
    <br>
    <div class="form-group">
      <p>
        <?php echo btn_submit('Simpan'); ?>
        <?php echo link_to_previous_page('admin/kereta', ' Kembali'); ?>
      </p>
    </div>
  <?php echo form_close(); ?>
</div>

<?php $this->load->view('admin/layouts/footer') ?>