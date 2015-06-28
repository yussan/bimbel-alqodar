<?php

/**
 * Description of profile
 *
 * @author white
 */
class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_profile', 'the_m');
        $this->load->library('breadcrumb');
        $this->load->helper('slug');
    }

    function index() {
        $this->rule->type('R');

        $this->layout->set_title('Profil');
        $this->layout->set_meta('Profil dari Bimbingan Belajar AL-Qodar');
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Profil');

        $data['primary_title'] = '<i class="ion-android-note"></i> Profil';
        $data['sub_primary_title'] = 'Data Profil';
        $data['list'] = $this->the_m->get();
        $data['notif'] = $this->_notification();
        $this->layout->back('profile/index', $data);
    }

    function detail($id) {
        $this->rule->type('R');
        $data['list'] = $this->the_m->get_detail_by($id)->row();
        $this->layout->set_title('Detail Profil');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Profil', site_url('profile'));
        $this->breadcrumb->add_crumb('Detail Profil');
        $data['primary_title'] = '<i class="ion-android-note"></i> Profil';
        $data['sub_primary_title'] = 'Data Detail Profil';
        $this->layout->back('profile/detail', $data);
    }

    function add() {
        $this->rule->type('C');
        $this->layout->set_title('Tambah Profil');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Profil', site_url('profile'));
        $this->breadcrumb->add_crumb('Tambah Profil');
        $data['primary_title'] = 'Profil';
        $data['sub_primary_title'] = 'Proses tambah data';
        $this->layout->back('profile/add', $data);
    }

    function save() {
        $this->rule->type('C');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('email_perusahaan', 'Email Perusahaan', 'valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataInsert = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
                'kdpos_perusahaan' => $this->input->post('kdpos_perusahaan'),
                'telp_perusahaan' => $this->input->post('telp_perusahaan'),
                'fax_perusahaan' => $this->input->post('fax_perusahaan'),
                'email_perusahaan' => $this->input->post('email_perusahaan'),
                'web_perusahaan' => $this->input->post('web_perusahaan')
            );
            $q = $this->the_m->save($dataInsert);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
        }
        redirect('profile');
    }

    function edit($id) {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Edit Profil');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Profil', site_url('profile'));
        $this->breadcrumb->add_crumb('Edit Profil');

        $data['primary_title'] = 'Profil';
        $data['sub_primary_title'] = 'Proses edit data';
        $this->layout->back('profile/edit', $data);
    }

    function update() {
        $this->rule->type('U');
        $id = $this->input->post('id');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('email_perusahaan', 'Email Perusahaan', 'valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataUpdate = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
                'kdpos_perusahaan' => $this->input->post('kdpos_perusahaan'),
                'telp_perusahaan' => $this->input->post('telp_perusahaan'),
                'fax_perusahaan' => $this->input->post('fax_perusahaan'),
                'email_perusahaan' => $this->input->post('email_perusahaan'),
                'web_perusahaan' => $this->input->post('web_perusahaan')
            );
            $q = $this->the_m->update($id, $dataUpdate);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dirubah');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dirubah');
            }
        }
        redirect('profile');
    }

    function delete($id) {
        $this->rule->type('D');
        $q = $this->the_m->delete($id);
        if ($q) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        redirect('profile');
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
