<?php

/**
 * Description of jenis_publikasi
 *
 * @author white
 */
class Jenis_publikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_jenis_publikasi', 'the_m');
        $this->load->library('breadcrumb');
        $this->load->helper('slug');
    }

    function index() {
        $this->rule->type('R');

        $this->layout->set_title('Jenis Publikasi');
        $this->layout->set_meta('Jenis publikasi dari KPMAK UGM');
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Jenis Publikasi');

        $data['primary_title'] = '<i class="ion-android-note"></i> Kategori';
        $data['sub_primary_title'] = 'Jenis Publikasi';
        $data['list'] = $this->the_m->get();
        $data['notif'] = $this->_notification();
        $this->layout->back('jenis_publikasi/index', $data);
    }

    function add() {
        $this->rule->type('C');
        $this->layout->set_title('Tambah Jenis Publikasi');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Jenis Publikasi', site_url('jenis_publikasi'));
        $this->breadcrumb->add_crumb('Tambah Jenis Publikasi');
        $data['primary_title'] = 'Jenis Publikasi';
        $data['sub_primary_title'] = 'Proses tambah data';
        $this->layout->back('jenis_publikasi/add', $data);
    }

    function save() {
        $this->rule->type('C');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pub_kategori', 'Jenis Publikasi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataInsert = array(
                'pub_kategori' => $this->input->post('pub_kategori'),
                'pub_slug' => slug($this->input->post('pub_kategori'))
            );
            $q = $this->the_m->save($dataInsert);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
        }

        redirect('jenis_publikasi');
    }

    function edit($id) {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Edit Jenis Publikasi');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Jenis Publikasi', site_url('jenis_publikasi'));
        $this->breadcrumb->add_crumb('Edit Jenis Publikasi');

        $data['primary_title'] = 'Jenis Publikasi';
        $data['sub_primary_title'] = 'Proses edit data';

        $this->layout->back('jenis_publikasi/edit', $data);
    }

    function update() {
        $this->rule->type('U');
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pub_kategori', 'Jenis Publikasi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataUpdate = array(
                'pub_kategori' => $this->input->post('pub_kategori'),
                'pub_slug' => slug($this->input->post('pub_kategori'))
            );
            $q = $this->the_m->update($id, $dataUpdate);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dirubah');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dirubah');
            }
        }

        redirect('jenis_publikasi');
    }

    function delete($id) {
        $this->rule->type('D');
        $cek_konstrain = $this->the_m->cek_konstrain($id)->result();
        $row = '';
        foreach ($cek_konstrain as $v) {
            $row .= $v->id_kat_publikasi;
        }
        if (!empty($row)) {
            $this->session->set_flashdata('error', 'Jenis Publikasi Tidak Dapat Dihapus. Jenis Publikasi Ini Sudah Digunakan');
        } else {
            $q = $this->the_m->delete($id);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dihapus');
            }
        }
        redirect('jenis_publikasi');
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

?>
