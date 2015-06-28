<?php
	
	/**
	* author white
	*/
	class MY_Form_validation extends CI_Form_validation {
		
		function __construct($rule = array()) {
			parent::__construct($rule);
			$this->set_error_delimiters('', '<br />');
			$this->set_message('required', 'Kolom <b>%s</b> Harus Diisi');
			$this->set_message('valid_email', 'Alamat Email Tidak Valid');
		}
	}
?>