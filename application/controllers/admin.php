<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();  
        $this->load->library('breadcrumb');
    }

    function index()
    {
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('login', 'refresh');
        }else{
            $this->layout->set_title('Beranda');
            $this->layout->set_meta('Bimbingan Belajar AL-Qodar');
            
            $this->breadcrumb->clear();
            $this->breadcrumb->add_crumb('');
            
            $data['primary_title']      = "<i class='ion-ios7-home'></i> Beranda";
            $data['sub_primary_title']  = "Halaman kerja utama";          

            $this->layout->back('admin/index', $data);
        }
    }
}