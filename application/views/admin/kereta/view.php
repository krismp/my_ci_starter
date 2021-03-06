<?php $this->load->view('admin/layouts/header') ?>

<h4 class="page-header"><i class="fa fa-info-circle"></i>&nbsp; <?php echo $title ?></h4>

<div class="col-xs-5">

	<div class="panel panel-default">
	    <div class="panel-heading">
	        <div class="row">
	    		<div class="col-xs-6">
		        	<strong class="pull-left"><?php echo $trains->nama_kereta; ?></strong>
		        </div>
	    		<div class="col-xs-6">
		        	<a href="<?php echo site_url('admin/kereta/edit/'.$trains->id) ?>" class="pull-right btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
		        </div>
	    	</div>
	    </div>
	    <div class="panel-body">
	        <?php 
			  dump($trains);
			?>
	    </div>
	    <div class="panel-footer">	        
	    	<div class="row">
	    		<div class="col-xs-6">
		        	<small class="pull-left"><strong>Created at:</strong> <?php echo date('Y-m-d H:i:s'); ?>&nbsp;</small>
		        </div>
	    		<div class="col-xs-6">
		        	<small class="pull-right"><strong>Last Update:</strong> <?php echo date('Y-m-d'); ?>&nbsp;</small>
		        </div>
	    	</div>
	    </div>
	</div>

	<?php echo link_to_previous_page('admin/kereta', ' Back'); ?>

</div>

<?php $this->load->view('admin/layouts/footer') ?>