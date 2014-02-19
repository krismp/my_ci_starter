<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-plus-square"></i>&nbsp; <?php echo $title ?></h4>

<div class="col-xs-5">
  <?php echo $this->session->flashdata('message'); ?>
  <?php echo form_open('admin/group/save', array('role' => 'form')); ?>
    <div class="form-group">
      <label for="Group Name" class="control-label">Group Name</label>
      <input type="text" class="form-control" placeholder="Group Name" name="group_name" value="<?php echo set_value('group_name'); ?>">
    </div>
    <div class="form-group">
        <label>Status</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="status1" value="1">Activate
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="status2" value="0" checked>Deactivate
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="Description" class="control-label">Description</label>
        <textarea class="form-control" placeholder="Description" name="description" rows="3" ><?php echo set_value('description'); ?></textarea>      
        <small class="help-block pull-right">Description for Group</small>
    </div>
    <br>
    <div class="form-group">
      <p>
        <?php echo btn_submit('Save'); ?>
        <?php echo link_to_previous_page('admin/group', ' Back'); ?>
      </p>
    </div>
  <?php echo form_close(); ?>
</div>

<?php $this->load->view('admin/layouts/footer') ?>