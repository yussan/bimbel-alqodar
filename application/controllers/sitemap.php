<?php

/**
 * Description of sitemap
 *
 * @author white
 */
class Sitemap extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_sitemap', 'm_home'));
    }

    function index() {
        $KategoriSlug = $this->security->xss_clean($this->uri->segment(1));
        $ArtikelSlug = $this->security->xss_clean($this->uri->segment(2));
        $this->layout->set_title('Sitemap | Al-Qodar');
        $this->layout->set_meta('Sitemap dari website Bimbingan Belajar AL-Qodar');
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
		$data['menu_program'] =$this->m_home->get_menu_program();

        //Sitemap
        $data['sitemap_cat'] = $this->m_sitemap->get_kategori()->result_array();
        $data['sitemap_hal'] = $this->m_sitemap->get_halaman()->result_array();
        $data['sitemap_cat_art'] = $this->m_sitemap->get_kategori_artikel()->result_array();
        $data['sitemap_art'] = '';
        foreach ($data['sitemap_cat_art'] as $value) {
            $data['sitemap_art'] .= '<li>';
            $data['sitemap_art'] .= $value['kategori'];
            $data['sitemap_art'] .= '<ul>';
            $sitemap_artikel = $this->m_sitemap->get_artikel($value['id_kategori'])->result_array();
            foreach ($sitemap_artikel as $v) {
                $tanggal = tgl($v['waktu']);
                $data['sitemap_art'] .= '<li><a href="' . $v['slug_kategori'] . '/' . $v['slug_artikel'] . '">' . $v['judul'] . '</a> (' . $tanggal . ')</li>';
            }
            $data['sitemap_art'] .= '</ul>';
            $data['sitemap_art'] .= '</li>';
        }
        $this->layout->front('sitemap', $data);
    }

}

?>
