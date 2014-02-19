<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-list-alt"></i>&nbsp; <?php echo $title ?></h4>

<p><?php echo link_to_add_page('admin/pejabat/add', array('title' => 'Add New '.$title)) ?></p>
<p><?php echo $this->session->flashdata('message'); ?></p>
<table class="table table-striped table-hover" id="table-data">
  <thead>
    <tr>
      <th>No</th>
      <th>NNIP</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 0; foreach ($pejabats as $pejabat) : $no++ ?>
    <tr>
      <td class="TCenter"><?php echo $no ?></td>
      <td class="TCenter">        
        <?php echo anchor('admin/pejabat/details/'.$pejabat->id, $pejabat->nnip, 'title = "'.$pejabat->nnip.' detail"') ?>
      </td>
      <td class="TCenter"><?php echo $pejabat->nama; ?></td>
      <td class="TCenter"><?php echo $pejabat->jabatan; ?></td>
      <td class="TCenter">        
        <div class="btn-group">
          <?php echo link_edit('admin/pejabat/edit/'.$pejabat->id, array('title' => 'Edit '.$pejabat->nama)) ?>
          <?php echo link_delete('admin/pejabat/delete/'.$pejabat->id, array('title' => 'Delete '.$pejabat->nama)) ?>
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