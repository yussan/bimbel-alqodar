<?php

/**
 * Description of siswa
 *
 * @author white
 */
class siswa extends CI_Controller {

    var $limit = 20;

    public function __construct() {
        parent::__construct();
        $this->load->model('m_siswa', 'the_m');
        $this->load->library('breadcrumb');
        $this->load->helper('slug');
    }

    function index() {
        $this->rule->type('R');
        $offset = $this->uri->segment(3, "0");
        $this->layout->set_title('Siswa');
        $this->layout->set_meta('Siswa dari AL-Qodar');
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Siswa');

        $data['primary_title'] = '<i class="ion-android-note"></i> Siswa';
        $data['sub_primary_title'] = '';
        $data['list'] = $this->the_m->get($this->limit, $offset)->result_array();
        $jumlah = $this->the_m->get("", "")->num_rows();
        $data['pagination'] = $this->_pagination($jumlah, $this->limit, "siswa/index", 3);
        $data['notif'] = $this->_notification();
        $this->layout->back('siswa/index', $data);
    }

    function add() {
        $this->rule->type('C');
        $this->layout->set_title('Tambah Kategori Program');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Kategori Siswa', site_url('siswa'));
        $this->breadcrumb->add_crumb('Tambah Siswa');
        $data['primary_title'] = 'Siswa';
        $data['sub_primary_title'] = 'Proses tambah data';
		$data['get_kategori']=$this->the_m->get_kategori();
        //menggunakan layout back/backend templating
        $this->layout->back('siswa/add', $data);
    }

    function save() {
        $this->rule->type('C');
        $this->load->library('form_validation');

       $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('nama', 'Nama siswa', 'required');
		
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataInsert = array(
				'id_kategori' => $this->input->post('id_kategori'),
				'nama_lengkap' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
				'alamat' => $this->input->post('alamat'),
				'nis' => $this->input->post('nis'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('email'),
				'telp' => $this->input->post('telp'),
				'kelamin' => $this->input->post('kelamin'),
                
            );
            $q = $this->the_m->save($dataInsert);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
        }
        redirect('siswa');
    }
 function detail($id) {
        $this->rule->type('R');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Detail Siswa');
        //$this->layout->set_meta(substr($data['list']->ISI, 0, 200));
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('siswa', site_url('siswa'));
        $this->breadcrumb->add_crumb('Detail Siswa');
        $data['primary_title'] = '<i class="ion-android-note"></i> siswa';
        $data['sub_primary_title'] = 'Data Detail Siswa';
        $this->layout->back('siswa/detail', $data);
    }
    function edit($id="") {
        $this->rule->type('U');
        $data['row'] = $this->the_m->get_by($id);
		$data['get_kategori']=$this->the_m->get_kategori();
        $this->layout->set_title('Edit Siswa');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('siswa', site_url('siswa'));
        $this->breadcrumb->add_crumb('Edit Siswa');
        //judul besar
        $data['primary_title'] = 'Siswa';
        $data['sub_primary_title'] = 'Proses edit data';
        //mengaktifkan menu master di sidebar
        $data['arikel'] = 'active';
        $this->layout->back('siswa/edit', $data);
    }

    function update() {
        $this->rule->type('U');
        $id = $this->input->post('id');
        $this->load->library('form_validation');

        $this->form_validation->set_rules ('nama', 'Nama Siswa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataUpdate = array(
                'id_kategori' => $this->input->post('id_kategori'),
				'nama_lengkap' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
				'alamat' => $this->input->post('alamat'),
				'nis' => $this->input->post('nis'),
				'email' => $this->input->post('email'),
				'telp' => $this->input->post('telp'),
				'kelamin' => $this->input->post('kelamin'),
            );
            $q = $this->the_m->update($id, $dataUpdate);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dirubah');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dirubah');
            }
        }
        redirect('siswa');
    }

    function delete($id) {
        $this->rule->type('D');
        $cek_konstrain = $this->the_m->cek_konstrain($id)->result();
        $row = '';
        foreach ($cek_konstrain as $v) {
            $row .= $v->id_kategori;
        }
        if (!empty($row)) {
            $this->session->set_flashdata('error', 'Kategori Tidak Dapat Dihapus. Kategori Ini Sudah Digunakan');
        } else {
            $q = $this->the_m->delete($id);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dihapus');
            }
        }
        redirect('siswa');
    }

    function _notification() {
        $notifForm = "";
        if ($this->session->flashdata('error') != "") {
            $notifForm .= '<div style="display:block; margin-bottom:7px;" class="alert alert-info alert-dismissable col-centered col-xs-5">';
            $notifForm .= '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
            $notifForm .= $this->session->flashdata('error');
            $notifForm .= '</div>';
        } else if ($this->session->flashdata('success') != "") {
            $notifForm .= '<div style="display:block; margin-bottom:7px;" class="alert alert-success alert-dismissable col-centered col-xs-5">';
            $notifForm .= '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
            $notifForm .= $this->session->flashdata('success');
            $notifForm .= '</div>';
        }
        return $notifForm;
    }

    function _pagination($total, $per_page, $url, $uri_segment) {
        $this->load->library("pagination");
        $config['base_url'] = base_url() . $url;
        if ($_SERVER['QUERY_STRING'] != "") {
            $config['last_url'] = '?' . $_SERVER['QUERY_STRING'];
        }
        $config['uri_segment'] = $uri_segment;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['next_link'] = '>';
        $config['prev_link'] = '<';
        $config['first_link'] = '<<';
        $config['num_links'] = 20;
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = '&laquo;';
        $config['prev_link'] = '&lsaquo;';
        $config['last_link'] = '&raquo;';
        $config['next_link'] = '&rsaquo;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }

}

?>
