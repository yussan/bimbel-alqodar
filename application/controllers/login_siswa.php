<?php

/**
 * Description of siswa
 *
 * @author white
 */
class login_siswa extends CI_Controller {

    var $limit = 20;

    public function __construct() {
        parent::__construct();
        $this->load->model('m_siswa');
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
        $this->layout->front('login', $data);
    }

    function cek_login() {
		$params = array(
					$this->input->post('nis'),
					md5($this->input->post('password'))
				);
        $cek=$this->m_siswa->cek_login($params);
        $data_siswa=$this->m_siswa->get_by_name($params);
		if($cek==1){
			$this->session->set_userdata('adminlog',TRUE);
			$this->session->set_userdata('nis',$data_siswa['NIS']);
			redirect('ujian');
		}else{
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
			$this->layout->front('login', $data);
		}
		
        
    }
    function logout() {
		$this->session->sess_destroy('');
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
        $this->layout->front('login', $data);
    }
}

