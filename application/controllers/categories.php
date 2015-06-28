<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends CI_Controller {

    var $limit = 10;

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_categories', 'm_home'));
        $this->load->library("pagination");
    }

    function index() {
        $KategoriSlug = $this->security->xss_clean($this->uri->segment(1));
        $offset = $this->uri->segment(3, "0");
        $data_a = $this->m_categories->get_posts_by_category($KategoriSlug, $this->limit, $offset)->result();
        $data['list'] = $data_a;
        $config = array(
            'base_url' => site_url($KategoriSlug.'/'),
            'total_rows' => $this->m_categories->get_posts_by_category($KategoriSlug, "", "")->num_rows(),
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

        $this->layout->set_title(strtoupper($KategoriSlug) . ' | AL-Qodar ');
        $this->layout->set_meta('Sedang berada di dalam kategori ' . strtolower($KategoriSlug) . ' dari website AL-Qodar ');
        $data['list_cat'] = $this->m_categories->get_categories();
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
        $data["links"] = $this->pagination->create_links();
		$data['menu_program'] =$this->m_home->get_menu_program();
        $this->layout->front('categories', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/categories.php */