<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pub extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_pub', 'm_home'));
    }

    function index() {
        $KategoriSlug = $this->security->xss_clean($this->uri->segment(1));
        $judul = str_replace('-', ' ', $KategoriSlug);
        $this->layout->set_title('Publikasi '. ucwords($judul). ' | KPMAK UGM');
        $this->layout->set_meta('Kumpulan semua publikasi '.strtolower($judul). ' dalam website KPMAK UGM');
        $params = array($KategoriSlug);
        $data['list'] = $this->m_pub->get_publikasi_by_slug($params);
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
		$data['menu_program'] =$this->m_home->get_menu_program();
        $this->layout->front('pub', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/categories.php */