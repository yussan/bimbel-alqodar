<?php

/**
 * Description of halaman
 *
 * @author white
 */
class Halaman extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_halaman', 'the_m');
        $this->load->library('breadcrumb');
        $this->load->helper('slug');
    }

    function index() {
        $this->rule->type('R');

        $this->layout->set_title('Halaman');
        $this->layout->set_meta('Data halaman dari AL-Qodar');
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Halaman');

        $data['primary_title'] = '<i class="ion-android-note"></i> Halaman';
        $data['sub_primary_title'] = 'Data Halaman';
        $data['list'] = $this->the_m->get();
        $data['notif'] = $this->_notification();
        $this->layout->back('halaman/index', $data);
    }

    function add() {
        $this->rule->type('C');
        $this->layout->set_title('Tambah Halaman');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Halaman', site_url('halaman'));
        $this->breadcrumb->add_crumb('Tambah Halaman');
        $data['primary_title'] = 'Halaman';
        $data['sub_primary_title'] = 'Proses tambah data';
        $this->layout->back('halaman/add', $data);
    }

    function save() {
        $this->rule->type('C');
        $user = $this->ion_auth->user()->row();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataInsert = array(
                'id_penulis' => $user->id,
                'judul' => $this->input->post('judul'),
                'slug' => slug($this->input->post('judul')),
                'waktu' => date('Y-m-d H:i:s'),
                'konten' => $this->input->post('konten')
            );
            $q = $this->the_m->save($dataInsert);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
        }
        redirect('halaman');
    }

    function detail($id) {
        $this->rule->type('R');
        $data['list'] = $this->the_m->get_detail_by($id)->row();
        $this->layout->set_title('Detail Halaman');
        $this->layout->set_meta(substr($data['list']->ISI, 0, 200));
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Halaman', site_url('halaman'));
        $this->breadcrumb->add_crumb('Detail Halaman');
        $data['primary_title'] = '<i class="ion-android-note"></i> Halaman';
        $data['sub_primary_title'] = 'Data Detail Halaman';
        $this->layout->back('halaman/detail', $data);
    }

    function edit($id) {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Edit Halaman');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Halaman', site_url('halaman'));
        $this->breadcrumb->add_crumb('Edit Halaman');

        $data['primary_title'] = 'Halaman';
        $data['sub_primary_title'] = 'Proses edit data';
        $this->layout->back('halaman/edit', $data);
    }

    function update() {
        $this->rule->type('U');
        $id = $this->input->post('id');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataUpdate = array(
                'judul' => $this->input->post('judul'),
                'slug' => slug($this->input->post('judul')),
                'konten' => $this->input->post('konten')
            );
            $q = $this->the_m->update($id, $dataUpdate);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dirubah');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dirubah');
            }
        }

        redirect('halaman');
    }

    function delete($id) {
        $this->rule->type('D');
        $q = $this->the_m->delete($id);
        if ($q) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        redirect('halaman');
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

}
