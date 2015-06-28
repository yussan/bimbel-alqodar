<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cari
 *
 * @author white
 */
class Cari extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_cari', 'm_home'));
    }

    function index() {
        $cari = $this->input->post("cari");
        $this->layout->set_title('AL-Qodar');
        $this->layout->set_meta('Website ini merupakan situs resmi dari AL-Qodar');
        $data['list'] = $this->m_cari->get_data($cari)->result();
        $data['side_kategori'] = $this->m_home->get_categories();
        $data['new_post'] = $this->m_home->get_side_post();
        $data['about_us'] = $this->m_home->about_us()->row();
        $data['sosmed_profil'] = $this->m_home->sosmed_profil()->result();
        $data['footer_link'] = $this->m_home->get_link_footer();
        $data['hubungi_kami'] = $this->m_home->get_profil()->row();
        $data['menu_publikasi'] = $this->m_home->get_menu_pub();
        $data['menu_artikel'] = $this->m_home->get_menu_artikel();
		$data['menu_program'] =$this->m_home->get_menu_program();
        $this->layout->front('cari', $data);
    }

}

?>
