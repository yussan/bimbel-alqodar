<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pub extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_pub', 'm_home'));
    }

    function index() {
        $this->layout->set_title('Detail Publikasi');
        $this->layout->set_meta('Meta Deskipsi Kategori');
        $KategoriSlug = $this->security->xss_clean($this->uri->segment(1));
        $PublikasiSlug = $this->security->xss_clean($this->uri->segment(2));
        $params = array($KategoriSlug, $PublikasiSlug);
        $data['list'] = $this->m_pub->get_detail_publikasi($params);
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
		$data['menu_program'] =$this->m_home->get_menu_program();
        $this->layout->front('detail_pub', $data);
    }

    function download($file) {
        $this->load->helper('download');
        $name = date('Ymd') . '_' . $file;
        $data = file_get_contents(base_url() . 'res/file/publikasi/' . $file);
        force_download($name, $data);
    }

}