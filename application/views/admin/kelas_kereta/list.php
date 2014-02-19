<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-list-alt"></i>&nbsp; <?php echo $title ?></h4>

<p><?php echo link_to_add_page('admin/kelas_kereta/add', array('title' => 'Tambah '.$title)) ?></p>
<p><?php echo $this->session->flashdata('message'); ?></p>
<table class="table table-striped table-hover" id="table-data">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Kelas</th>
      <th>Nama Kelas</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 0; foreach ($trains as $train) : $no++ ?>
    <tr>
      <td class="TCenter"><?php echo $no ?></td>
      <td class="TCenter">        
        <?php echo anchor('admin/kelas_kereta/details/'.$train->id, $train->kode_kelas_kereta, 'title = "'.$train->kode_kelas_kereta.' detail"') ?>
      </td>
      <td class="TCenter"><?php echo $train->nama_kelas ?></td>      
      <td class="TCenter">        
        <div class="btn-group">
          <?php echo link_edit('admin/kelas_kereta/edit/'.$train->id, array('title' => 'Edit '.$train->nama_kelas)) ?>
          <?php echo link_delete('admin/kelas_kereta/delete/'.$train->id, array('title' => 'Hapus '.$train->nama_kelas)) ?>
        </div>
      </td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<?php $this->load->view('admin/layouts/footer') ?>

<!-- Page-Level Plugin Scripts - Tables -->
<script src="<?php echo base_url() ?>assets/admin/scripts/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/scripts/plugins/dataTables/dataTables.bootstrap.js"></script>

<script>
$(document).ready(function() {
    $('#table-data').dataTable();
});
</script>