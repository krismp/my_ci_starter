<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-edit"></i>&nbsp; <?php echo $title ?></h4>

<div class="col-xs-5">
  <?php echo $this->session->flashdata('message'); ?>
  <?php echo form_open('admin/kelas_kereta/update/'.$trains->id, array('role' => 'form')); ?>
    <div class="form-group">
      <label for="Kode Kelas Kereta" class="control-label">Kode Kelas Kereta</label>
      <input type="text" class="form-control" placeholder="Kode Kelas Kereta" name="kode_kelas_kereta" value="<?php echo set_value('kode_kelas_kereta', $trains->kode_kelas_kereta); ?>">
      <small class="help-block pull-right"><em></em></small>
    </div>
    <div class="form-group">
      <label for="Nama Kelas" class="control-label">Nama Kelas</label>
      <input type="text" class="form-control" placeholder="Nama Kelas" name="nama_kelas" value="<?php echo set_value('nama_kelas', $trains->nama_kelas); ?>">
      <small class="help-block pull-right"><em>Contoh: Eksekutif, Bisnis, Ekonomi</em></small>
    </div>
    <div class="form-group">
      <label for="Keterangan" class="control-label">Keterangan</label>
      <textarea class="form-control" placeholder="Keterangan" name="keterangan" rows="4"><?php echo set_value('keterangan', $trains->keterangan); ?></textarea>
      <small class="help-block pull-right"><em>Berisi keterangan mengenai kelas kereta yang dibuat</em></small>
    </div>
    <br>
    <div class="form-group">
      <p>
        <?php echo btn_submit('Update'); ?>
        <?php echo link_to_previous_page('admin/kelas_kereta', ' Back'); ?>
      </p>
    </div>
  <?php echo form_close(); ?>
</div>

<?php $this->load->view('admin/layouts/footer') ?>