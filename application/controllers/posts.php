<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Posts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_posts', 'm_home'));
    }

    function index() {
        $KategoriSlug = $this->security->xss_clean($this->uri->segment(1));
        $ArtikelSlug = $this->security->xss_clean($this->uri->segment(2));
        $judul = str_replace('-', ' ', $ArtikelSlug);
        $this->layout->set_title(ucwords($judul) . ' | AL-Qodar');
        $params = array($KategoriSlug, $ArtikelSlug);
        //model
        $isi = $this->m_posts->get_post_by($params);
        $data_meta = '';
        foreach ($isi as $value) {
            $data_meta .= cek_kata(substr($value['konten'], 0, 150));
        }
        $this->layout->set_meta($data_meta);
        $data['list'] = $isi;
        $data['list_cat'] = $this->m_posts->get_categories();
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
		$data['menu_program'] =$this->m_home->get_menu_program();
        $this->layout->front('posts', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/posts.php */