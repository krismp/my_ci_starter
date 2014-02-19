<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-plus-square"></i>&nbsp; <?php echo $title ?></h4>

<div class="col-xs-5">
  <?php echo $this->session->flashdata('message'); ?>
  <?php echo form_open('admin/pejabat/save', array('role' => 'form')); ?>
    <div class="form-group">
      <label for="NNIP" class="control-label">NNIP</label>
      <input type="text" class="form-control" placeholder="NNIP" name="nnip" value="<?php echo set_value('nnip'); ?>">
    </div>
    <div class="form-group">
      <label for="Nama" class="control-label">Nama</label>
      <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo set_value('nama'); ?>">
    </div>
    <div class="form-group">
      <label for="Jabatan" class="control-label">Jabatan</label>
      <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" value="<?php echo set_value('jabatan'); ?>">
    </div>
    <br>
    <div class="form-group">
      <p>
        <?php echo btn_submit('Save'); ?>
        <?php echo link_to_previous_page('admin/pejabat', ' Back'); ?>
      </p>
    </div>
  <?php echo form_close(); ?>
</div>

<?php $this->load->view('admin/layouts/footer') ?>