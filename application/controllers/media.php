<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of video
 *
 * @author windows
 */
class Media extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_media', 'm_home'));
        $this->load->helper('video');
    }

    function index() {
        $this->layout->set_title('Media Video AL-Qodar');
        $this->layout->set_meta('Halaman ini berisi kumpulan media-media dari AL-Qodar');
        $data['list'] = $this->m_media->get_media();
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
		$data['menu_program'] =$this->m_home->get_menu_program();
        $this->layout->front('media', $data);
    }

}

?>
