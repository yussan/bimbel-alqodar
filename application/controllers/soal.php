<?php

/**
 * Description of soal
 *
 * @author white
 */
class soal extends CI_Controller {

    var $limit = 20;

    public function __construct() {
        parent::__construct();
        $this->load->model('m_soal', 'the_m');
        $this->load->library('breadcrumb');
        $this->load->helper('slug');
    }

    function index() {
        $this->rule->type('R');
        $offset = $this->uri->segment(3, "0");
        $this->layout->set_title('Kategori Soal');
        $this->layout->set_meta('Kategori Soal dari AL-Qodar');
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Kategori Soal');

        $data['primary_title'] = '<i class="ion-android-note"></i> Soal';
        $data['sub_primary_title'] = '';
        $data['list'] = $this->the_m->get($this->limit, $offset)->result_array();
        $jumlah = $this->the_m->get("", "")->num_rows();
        $data['pagination'] = $this->_pagination($jumlah, $this->limit, "soal/index", 3);
        $data['notif'] = $this->_notification();
        $this->layout->back('soal/index', $data);
    }

    function add() {
        $this->rule->type('C');
        $this->layout->set_title('Tambah KategoriSoal');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Kategori Soal', site_url('soal'));
        $this->breadcrumb->add_crumb('Tambah Kategori Soal');
        $data['primary_title'] = 'Kategori Soal';
        $data['sub_primary_title'] = 'Proses tambah data';
        $data['get_kelas'] = $this->the_m->get_kelas();
        $data['get_matapelajaran'] = $this->the_m->get_matapelajaran();
        $data['get_guru'] = $this->the_m->get_guru();
        //menggunakan layout back/backend templating
        $this->layout->back('soal/add', $data);
    }

    function save() {
        $this->rule->type('C');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('soal', 'Soal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataInsert = array(
                'id_kelas' => $this->input->post('id_kelas'),
                'id_matapelajaran' => $this->input->post('id_matapelajaran'),
                'id_guru' => $this->input->post('id_guru'),
                'soal' => $this->input->post('soal')
            );
            $q = $this->the_m->save($dataInsert);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
        }
        redirect('soal');
    }

    function edit($id = "") {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $data['get_kelas'] = $this->the_m->get_kelas();
        $data['get_matapelajaran'] = $this->the_m->get_matapelajaran();
        $data['get_guru'] = $this->the_m->get_guru();
        $this->layout->set_title('Edit Soal');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('soal', site_url('soal'));
        $this->breadcrumb->add_crumb('Edit Soal');
        //judul besar
        $data['primary_title'] = 'Soal';
        $data['sub_primary_title'] = 'Proses edit data';
        $this->layout->back('soal/edit', $data);
    }

    function detail($id) {
        $this->rule->type('R');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Detail Soal');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('soal', site_url('soal'));
        $this->breadcrumb->add_crumb('Detail Soal');
        $data['primary_title'] = '<i class="ion-android-note"></i> soal';
        $data['sub_primary_title'] = 'Data Detail soal';
        $this->layout->back('soal/detail', $data);
    }

    function update() {
        $this->rule->type('U');
        $id_soal = $this->input->post('id_soal');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('soal', 'Nama Soal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataUpdate = array(
                'id_kelas' => $this->input->post('id_kelas'),
                'id_matapelajaran' => $this->input->post('id_matapelajaran'),
                'id_guru' => $this->input->post('id_guru'),
                'soal' => $this->input->post('soal')
            );
            $q = $this->the_m->update($id_soal, $dataUpdate);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dirubah');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dirubah');
            }
        }
        redirect('soal');
    }

    function delete($id) {
        $this->rule->type('D');
        $cek_konstrain = $this->the_m->cek_konstrain($id)->result();
        $row = '';
        foreach ($cek_konstrain as $v) {
            $row .= $v->id_soal;
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
        redirect('soal');
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
