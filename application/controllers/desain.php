<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Desain extends CI_Controller {

	function __construct() {
        parent::__construct();
        //jika digunakan di mayoritas function, panggil disini
		//library breadcrum/untuk navigasi
		$this->load->library('breadcrumb');
	}

	function index()
    {
        $this->rule->type('R');
        $this->layout->set_title('Forms');
        $this->layout->set_meta('Made with love by Raksa Abadi Informatika');
        
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Forms');
        
        $data['primary_title']      = '<i class="ion-android-note"></i> Forms';
        $data['sub_primary_title']  = 'Kumpulan desain form';

        //untuk mengaktifkan menu
        $data['forms']             = 'active';
        
        $this->layout->back('desain/index', $data);
    }
	
	function buttons()
	{	
		//rule type pada function ini: Read
		$this->rule->type('R');
		//Layout
		//title
		$this->layout->set_title('Form Buttons');
		//meta description jika perlu
		$this->layout->set_meta('Made with love by Raksa Abadi Informatika');
		//breadcrumb/untuk navigasi
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Beranda', site_url());
		$this->breadcrumb->add_crumb('Forms', site_url('forms'));
		$this->breadcrumb->add_crumb('Form Buttons');
		//judul besar
		$data['primary_title'] 		= '<i class="fa fa-edit"></i> Forms';
		$data['sub_primary_title']	= 'Kumpulan desain button';
		//mengaktifkan menu master di sidebar
		$data['forms'] 				= 'active';
		//mengaktifkan current menu
		$data['f_button'] 			= 'class="current"';
		//menggunakan layout back/backend templating
		$this->layout->back('desain/buttons', $data);
	}

	function form()
	{	
		//rule type pada function ini: Read
		$this->rule->type('R');
		//Layout
		//title
		$this->layout->set_title('Form General');
		//meta description jika perlu
		$this->layout->set_meta('Made with love by Raksa Abadi Informatika');
		//breadcrumb/untuk navigasi
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Beranda', site_url());
		$this->breadcrumb->add_crumb('Forms', site_url('forms'));
		$this->breadcrumb->add_crumb('Form General');
		//judul besar
		$data['primary_title'] 		= '<i class="fa fa-edit"></i> Forms';
		$data['sub_primary_title']	= 'Kumpulan desain tabel';
		//mengaktifkan menu master di sidebar
		$data['forms'] 				= 'active';
		//mengaktifkan current menu
		$data['f_general'] 			= 'class="current"';
		//menggunakan layout back/backend templating
		$this->layout->back('desain/form', $data);
	}

	function radio_check()
	{	
		//rule type pada function ini: Read
		$this->rule->type('R');
		//Layout
		//title
		$this->layout->set_title('Form Radio dan Checkbox');
		//meta description jika perlu
		$this->layout->set_meta('Made with love by Raksa Abadi Informatika');
		//breadcrumb/untuk navigasi
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Beranda', site_url());
		$this->breadcrumb->add_crumb('Forms', site_url('forms'));
		$this->breadcrumb->add_crumb('Form Radio dan Checkbox');
		//judul besar
		$data['primary_title'] 		= '<i class="fa fa-edit"></i> Forms';
		$data['sub_primary_title']	= 'Kumpulan desain Radio dan Checkbox';
		//mengaktifkan menu master di sidebar
		$data['forms'] 				= 'active';
		//mengaktifkan current menu
		$data['f_radioc'] 			= 'class="current"';
		//menggunakan layout back/backend templating
		$this->layout->back('desain/radio_check', $data);
	}

	function table()
	{	
		//rule type pada function ini: Read
		$this->rule->type('R');
		//Layout
		//title
		$this->layout->set_title('Desain Table');
		//meta description jika perlu
		$this->layout->set_meta('Made with love by Raksa Abadi Informatika');
		//breadcrumb/untuk navigasi
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Beranda', site_url());
		$this->breadcrumb->add_crumb('Master', site_url('master'));
		$this->breadcrumb->add_crumb('Table');
		//judul besar
		$data['primary_title'] 		= '<i class="ion-android-note"></i> Master';
		$data['sub_primary_title']	= 'Merupakan induk dari semua data';
		//menggunakan layout back/backend templating
		$this->layout->back('desain/table', $data);
	}
}