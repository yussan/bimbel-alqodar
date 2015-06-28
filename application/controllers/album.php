<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Album extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_album', 'm_home'));
    }

    function index() {
        $this->layout->set_title('Data Album | AL-Qodar');
        $this->layout->set_meta('Data semua album dari AL-Qodar');
        $data['list_album'] = $this->m_album->get_album();
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
		$data['menu_program'] =$this->m_home->get_menu_program();
        $this->layout->front('album', $data);
    }

}