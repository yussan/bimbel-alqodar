<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    var $limit = 5;

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_home'));
        $this->load->library("pagination");
    }

    function index() {
        $this->layout->set_title('AL-Qodar');
        $this->layout->set_meta('Website ini merupakan situs resmi dari Bimbingan Al-Qodar');
        $offset = $this->uri->segment(3, "0");
        $data['home_artikel'] = $this->m_home->get_home_artikel($this->limit, $offset)->result();
        $config = array(
            'base_url' => site_url('home/index'),
            'total_rows' => $this->m_home->get_home_artikel("", "")->num_rows(),
            'per_page' => $this->limit,
            'uri_segment' => 3,
            'first_link' => 'Pertama',
            'last_link' => 'Terakhir',
            'next_link' => 'SELANJUTNYA &rarr;',
            'prev_link' => '&larr; SEBELUMNYA',
            'full_tag_open' => '<ul class="pagination pagination-sm">',
            'full_tag_close' => '</ul">',
            'cur_tag_open' => '<li class="active"><a href="">',
            'cur_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'first_tag_open' => '</li>',
            'first_tag_close' => '</li>',
            'prev_tag_open' => '<li class="prev">',
            'prev_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>'
        );
        if ($_SERVER['QUERY_STRING'] != "") {
            $config['last_url'] = '?' . $_SERVER['QUERY_STRING'];
        }
        $this->pagination->initialize($config);

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
        $data["links"] = $this->pagination->create_links();
        $this->layout->front('home', $data);
    }

}