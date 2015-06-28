<?php

/**
 * Description of sosmed
 *
 * @author white
 */
class Sosmed extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_sosmed', 'the_m');
        $this->load->library('breadcrumb');
        $this->load->helper('slug');
    }

    function index() {
        $this->rule->type('R');
        $this->layout->set_title('Link Sosial Media');
        $this->layout->set_meta('Link Sosial Media dari AL-Qodar');
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Link Sosial Media');

        $data['primary_title'] = '<i class="ion-android-note"></i> Data';
        $data['sub_primary_title'] = 'Link Sosial Media';
        $data['list'] = $this->the_m->get()->result_array();
        $data['notif'] = $this->_notification();
        $this->layout->back('sosmed/index', $data);
    }

//    function add() {
//        $this->rule->type('C');
//        $this->layout->set_title('Tambah Link Sosial Media');
//        $this->breadcrumb->clear();
//        $this->breadcrumb->add_crumb('Beranda', site_url());
//        $this->breadcrumb->add_crumb('Link Sosial Media', site_url('sosmed'));
//        $this->breadcrumb->add_crumb('Tambah Link Sosial Media');
//        $data['primary_title'] = 'Link Sosial Media';
//        $data['sub_primary_title'] = 'Proses tambah data';
//        $this->layout->back('sosmed/add', $data);
//    }
//    function save() {
//        $this->rule->type('C');
//        $this->load->library('form_validation');
//
//        $this->form_validation->set_rules('nama_sosmed', 'Nama Link Sosial Media', 'required');
//        $this->form_validation->set_rules('url_sosmed', 'URL Link Sosial Media', 'required');
//
//
//        if ($this->form_validation->run() == FALSE) {
//            $this->session->set_flashdata('error', validation_errors());
//        } else {
//            $path = dirname(BASEPATH) . DIRECTORY_SEPARATOR;
//            $config['upload_path'] = $path . 'res/foto/sosmed/';
//            $config['allowed_types'] = 'jpg|png|jpeg|gif';
//            $config['overwrite'] = TRUE;
//
//            $this->load->library('upload', $config);
//
//            if (!$this->upload->do_upload()) {
//                $this->session->set_flashdata('error', $this->upload->display_errors());
//            } else {
//                $data = $this->upload->data();
//                $dataInsert = array(
//                    'nama_sosmed' => $this->input->post('nama_sosmed'),
//                    'url_sosmed' => $this->input->post('url_sosmed'),
//                    'gambar_sosmed' => $data['file_name'],
//                    'settingKey' => 'IK'
//                );
//                $q = $this->the_m->save($dataInsert);
//                if ($q) {
//                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
//                } else {
//                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
//                }
//            }
//        }
//        redirect('sosmed');
//    }

    function edit($id) {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Edit Link Sosial Media');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Link Sosial Media', site_url('sosmed'));
        $this->breadcrumb->add_crumb('Edit Link Sosial Media');

        $data['primary_title'] = 'Link Sosial Media';
        $data['sub_primary_title'] = 'Proses edit data';
        $this->layout->back('sosmed/edit', $data);
    }

    function update() {
        $this->rule->type('U');
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $url_sosmed = $this->input->post('url_sosmed');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('url_link', 'URL Link', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataUpdate = array(
                'url_link' => $this->input->post('url_link')
            );
            $q = $this->the_m->update($id, $dataUpdate);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dirubah');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Ditambah');
            }
        }
        redirect('sosmed');
    }

//    function delete($id) {
//        $this->rule->type('D');
//        $q = $this->the_m->delete($id);
//        if ($q) {
//            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
//        } else {
//            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
//        }
//        redirect('sosmed');
//    }

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
