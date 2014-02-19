<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-list-alt"></i>&nbsp; <?php echo $title ?></h4>

<p><?php echo link_to_add_page('admin/group/add', array('title' => 'Add New '.$title)) ?></p>
<p><?php echo $this->session->flashdata('message'); ?></p>
<table class="table table-striped table-hover" id="table-data">
  <thead>
    <tr>
      <th>No</th>
      <th>Group Name</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 0; foreach ($groups as $group) : $no++ ?>
    <tr>
      <td class="TCenter"><?php echo $no ?></td>
      <td class="TCenter">        
        <?php echo anchor('admin/group/details/'.$group->id, $group->group_name, 'title = "'.$group->group_name.' detail"') ?>
      </td>
      <td class="TCenter"><?php echo ($group->status) == '1' ? label_green('Active') : label_grey('Not Active') ?></td>
      <td class="TCenter">        
        <div class="btn-group">
          <?php echo link_edit('admin/group/edit/'.$group->id, array('title' => 'Edit '.$group->group_name)) ?>
          <?php echo link_delete('admin/group/delete/'.$group->id, array('title' => 'Delete '.$group->group_name)) ?>
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