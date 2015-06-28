<?php

/**
 * Description of siswa
 *
 * @author white
 */
class list_guru extends CI_Controller {

    var $limit = 20;

    public function __construct() {
        parent::__construct();
        $this->load->model('m_guru');
        $this->load->model('m_home');
        $this->load->library('breadcrumb');
    }

    function index() {
        $data['home_berita'] = $this->m_home->get_home_berita();
        $data['home_events'] = $this->m_home->get_home_events();
        $data['event_arsip'] = $this->m_home->get_home_events_arsip()->row();
        $data['berita_arsip'] = $this->m_home->get_home_berita_arsip()->row();
        $data['slide_home'] = $this->m_home->get_slider();
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['about_us'] = $this->m_home->about_us()->row();
        $data['sosmed_profil'] = $this->m_home->sosmed_profil()->result();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
		$data['menu_program'] =$this->m_home->get_menu_program();
		$data['list_guru'] = $this->m_guru->get_guru()->result_array();
        $this->layout->front('guru', $data);
    }
}

