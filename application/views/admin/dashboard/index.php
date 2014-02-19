<?php $this->load->view('admin/layouts/header'); ?>

<?php
  // echo $this->session->flashdata('warning');
  echo $this->session->flashdata('greeting');
?>

<?php $this->load->view('admin/layouts/footer'); ?>