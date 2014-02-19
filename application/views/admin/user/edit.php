<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-edit"></i>&nbsp; <?php echo $title ?></h4>

<div class="col-xs-5">
  <?php echo $this->session->flashdata('message'); ?>
  <?php echo form_open('admin/user/update/'.$users->id, array('role' => 'form')); ?>
    <div class="form-group">
      <label for="Nama" class="control-label">Nama</label>
      <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo set_value('nama', $users->nama); ?>">
    </div>
    <div class="form-group">
      <label for="Username" class="control-label">Username</label>
      <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo set_value('username', $users->username); ?>">
    </div>
    <div class="form-group">
      <label for="Email" class="control-label">Email</label>
      <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email', $users->email); ?>">
    </div>
    <div class="form-group">
        <label>Group User</label>
        <select class="form-control" name="group_id">
            <option value="">-- Select Group --</option>
          <?php foreach ($groups as $group) : ?>
            <option value="<?php echo $group->id ?>" <?php echo $group->id == $users->group_id ? 'selected' : '' ?>><?php echo $group->group_name ?></option>
          <?php endforeach ?>
        </select>
    </div>    
    <div class="form-group">
        <label>Status</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="status1" value="1" <?php echo ($users->status) == '1' ? 'checked' : '' ?>>Activate
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="status2" value="0" <?php echo ($users->status) == '0' ? 'checked' : '' ?>>Deactivate
            </label>
        </div>
    </div>
    <div class="form-group">
      <label for="Password" class="control-label">Password</label>
      <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
    </div>
    <div class="form-group">
      <label for="Password" class="control-label">Confirm Password</label>
      <input type="password" class="form-control" placeholder="Password" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>">
    </div>
    <br>
    <div class="form-group">
      <p>
        <?php echo btn_submit('Update'); ?>
        <?php echo link_to_previous_page('admin/user', ' Back'); ?>
      </p>
    </div>
  <?php echo form_close(); ?>
</div>

<?php $this->load->view('admin/layouts/footer') ?>