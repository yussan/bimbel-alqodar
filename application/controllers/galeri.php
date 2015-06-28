<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeri extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_galeri', 'm_home'));
    }

    function index() {
        $AlbumSlug = $this->security->xss_clean($this->uri->segment(2));
        $judul = str_replace('-', ' ', $AlbumSlug);
        $this->layout->set_title('Foto Album ' . ucwords($judul) . ' | AL-QODAR');
        $this->layout->set_meta('Kumpulan foto-foto dari album ' . $judul . ' website AL-Qodar');
        $data['list'] = $this->m_galeri->get_galeri_by_album($AlbumSlug);
        $nama = $this->m_galeri->get_nama_album($AlbumSlug)->row();
        if (!empty($nama)) {
            $data['nama_album'] = $nama->judul;
        }
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
		$data['menu_program'] =$this->m_home->get_menu_program();
        $this->layout->front('galeri', $data);
    }

}