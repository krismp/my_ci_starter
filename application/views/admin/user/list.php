<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-list-alt"></i>&nbsp; <?php echo $title ?></h4>

<p><?php echo link_to_add_page('admin/user/add', array('title' => 'Add New '.$title)) ?></p>
<p><?php echo $this->session->flashdata('message'); ?></p>
<table class="table table-striped table-hover" id="table-data">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Email</th>
      <th>Group</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 0; foreach ($users as $user) : $no++ ?>
    <tr>
      <td class="TCenter"><?php echo $no ?></td>
      <td>        
        <?php echo anchor('admin/user/details/'.$user->id, $user->nama, 'title = "'.$user->nama.' detail"') ?>
      </td>
      <td><?php echo $user->username ?></td>
      <td><?php echo $user->email ?></td>
      <td class="TCenter"><?php echo $user->group_name ?></td>
      <td class="TCenter"><?php echo ($user->status) == '1' ? label_green('Active') : label_grey('Not Active') ?></td>
      <td class="TCenter">        
        <div class="btn-group">
          <?php echo link_edit('admin/user/edit/'.$user->id, array('title' => 'Edit '.$user->username)) ?>
          <?php echo link_delete('admin/user/delete/'.$user->id, array('title' => 'Delete '.$user->username)) ?>
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