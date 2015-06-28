<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_pages', 'm_home'));
    }

    function index() {
        $Slug = $this->security->xss_clean($this->uri->segment(1));
        $judul = str_replace('-', ' ', $Slug);
        $this->layout->set_title('Halaman ' . ucwords($judul) . ' | AL-Qodar');
        $this->layout->set_meta('Keterangan lengkap halaman ' . strtolower($judul) . ' dari website AL-Qodar');
        $params = array($Slug);
        //model
        $data['list'] = $this->m_pages->get_page_by($params);
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
		$data['menu_program'] =$this->m_home->get_menu_program();
        $this->layout->front('pages', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/statis.php */