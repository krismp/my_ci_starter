<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-plus-square"></i>&nbsp; <?php echo $title ?></h4>

<div class="col-xs-5">
  <?php echo $this->session->flashdata('message'); ?>
  <?php echo form_open('admin/penumpang/save', array('role' => 'form')); ?>
    <div class="form-group">
      <label for="Kode Penumpang" class="control-label">Kode Penumpang</label>
      <input type="text" class="form-control" placeholder="Kode Penumpang" name="kode_penumpang" value="<?php echo set_value('kode_penumpang'); ?>">
      <small class="help-block pull-right"><em></em></small>
    </div>
    <div class="form-group">
      <label for="Jenis Penumpang" class="control-label">Jenis Penumpang</label>
      <input type="text" class="form-control" placeholder="Jenis Penumpang" name="jenis_penumpang" value="<?php echo set_value('jenis_penumpang'); ?>">
      <small class="help-block pull-right"><em>Contoh: Dewasa, Anak-anak, Inflant</em></small>
    </div>
    <div class="form-group">
      <label for="Keterangan" class="control-label">Keterangan</label>
      <textarea class="form-control" placeholder="Keterangan" name="keterangan" rows="4"></textarea>
      <small class="help-block pull-right"><em>Berisi keterangan mengenai jenis penumpang yang dibuat</em></small>
    </div>
    <br>
    <div class="form-group">
      <p>
        <?php echo btn_submit('Simpan'); ?>
        <?php echo link_to_previous_page('admin/penumpang', ' Kembali'); ?>
      </p>
    </div>
  <?php echo form_close(); ?>
</div>

<?php $this->load->view('admin/layouts/footer') ?>