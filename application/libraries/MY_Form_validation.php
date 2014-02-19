<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct()
    {
        parent::__construct();

        $this->_error_prefix = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        $this->_error_suffix = '</div>';
    }

	function set_value($field = '', $default = '')
	{
	  $OBJ =& _get_validation_object();

	  if ($OBJ === TRUE && isset($OBJ->_field_data[$field]))
	  {
	    return form_prep($OBJ->set_value($field, $default));
	  }
	  else
	  {
	    if ( ! isset($_POST[$field]))
	    {
	      return $default;
	    }

	    return form_prep($_POST[$field]);
	  }
	}
}