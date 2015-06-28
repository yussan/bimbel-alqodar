<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of publikasi
 *
 * @author white
 */
class Publikasi extends CI_Controller {

    var $limit = 20;

    function __construct() {
        parent::__construct();
        $this->load->model('m_publikasi', 'the_m');
        $this->load->library('breadcrumb');
        $this->load->helper(array('slug', 'tanggal'));
    }

    function index() {
        $this->rule->type('R');
        $offset = $this->uri->segment(3, "0");
        $this->layout->set_title('Publikasi');
        $this->layout->set_meta('Publikasi dari KPMAK UGM');
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Publikasi');

        $data['primary_title'] = '<i class="ion-android-note"></i> Data';
        $data['sub_primary_title'] = 'Publikasi';
        $data['list'] = $this->the_m->get($this->limit, $offset)->result_array();
        $jumlah = $this->the_m->get("", "")->num_rows();
        $data['pagination'] = $this->_pagination($jumlah, $this->limit, "publikasi/index", 3);
        $data['notif'] = $this->_notification();
        $this->layout->back('publikasi/index', $data);
    }

    function detail($id) {
        $this->rule->type('R');
        $data['list'] = $this->the_m->get_detail_by($id)->row();
        $this->layout->set_title('Detail Publikasi');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Publikasi', site_url('publikasi'));
        $this->breadcrumb->add_crumb('Detail Publikasi');
        $data['primary_title'] = '<i class="ion-android-note"></i> Publikasi';
        $data['sub_primary_title'] = 'Data Detail Publikasi';
        $this->layout->back('publikasi/detail', $data);
    }

    function add() {
        $this->rule->type('C');
        $this->layout->set_title('Tambah Publikasi');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Publikasi', site_url('publikasi'));
        $this->breadcrumb->add_crumb('Tambah Publikasi');

        $data['primary_title'] = 'Publikasi';
        $data['sub_primary_title'] = 'Proses tambah data';
        $data['get_kat'] = $this->the_m->get_kat()->result_array();
        $this->layout->back('publikasi/add', $data);
    }

    function save() {
        $this->rule->type('C');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul', 'Judul Publikasi', 'required');
        $this->form_validation->set_rules('kata_kunci', 'Kata Kunci', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $user = $this->ion_auth->user()->row();
            $path = dirname(BASEPATH) . DIRECTORY_SEPARATOR;

            $config['upload_path'] = $path . 'res/file/publikasi/';
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            } else {
                $data = $this->upload->data();
                $dataInsert = array(
                    'judul' => $this->input->post('judul'),
                    'abstraksi' => $this->input->post('abstraksi'),
                    'kata_kunci' => $this->input->post('kata_kunci'),
                    'file' => $data['file_name'],
                    'tanggal_upload' => date('Y-m-d H:i:s'),
                    'id_penulis' => $user->id,
                    'slug' => slug($this->input->post('judul')),
                    'id_kat_publikasi' => $this->input->post('id_kat_publikasi')
                );
                $q = $this->the_m->save($dataInsert);
                if ($q) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        }
        redirect('publikasi');
    }

    function edit($id) {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Edit Publikasi');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Publikasi', site_url('publikasi'));
        $this->breadcrumb->add_crumb('Edit Publikasi');

        $data['primary_title'] = 'Publikasi';
        $data['sub_primary_title'] = 'Proses edit data';
        $data['get_kat'] = $this->the_m->get_kat()->result_array();
        $this->layout->back('publikasi/edit', $data);
    }

    function update() {
        $this->rule->type('U');
        $id = $this->input->post('id');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul', 'Judul Publikasi', 'required');
        $this->form_validation->set_rules('kata_kunci', 'Kata Kunci', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $file = $_FILES['userfile']['name'];
            if (empty($file)) {
                $dataUpdate = array(
                    'judul' => $this->input->post('judul'),
                    'abstraksi' => $this->input->post('abstraksi'),
                    'kata_kunci' => $this->input->post('kata_kunci'),
                    'slug' => slug($this->input->post('judul')),
                    'id_kat_publikasi' => $this->input->post('id_kat_publikasi')
                );
                $q = $this->the_m->update($id, $dataUpdate);
                if ($q) {
                    $this->session->set_flashdata('success', 'Data Berhasil Dirubah Tanpa Mengganti File');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Dirubah');
                }
            } else {
                $path = dirname(BASEPATH) . DIRECTORY_SEPARATOR;

                $config['upload_path'] = $path . 'res/file/publikasi/';
                $config['allowed_types'] = '*';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $data = $this->upload->data();
                    $dataUpdate = array(
                        'judul' => $this->input->post('judul'),
                        'abstraksi' => $this->input->post('abstraksi'),
                        'kata_kunci' => $this->input->post('kata_kunci'),
                        'file' => $data['file_name'],
                        'slug' => slug($this->input->post('judul')),
                        'id_kat_publikasi' => $this->input->post('id_kat_publikasi')
                    );
                    $q = $this->the_m->update($id, $dataUpdate);
                    if ($q) {
                        $this->session->set_flashdata('success', 'Data Berhasil Dirubah dengan perubahan file');
                    } else {
                        $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                    }
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }
        }
        redirect('publikasi');
    }

    function delete($id) {
        $this->rule->type('D');
        $q = $this->the_m->delete($id);
        if ($q) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        redirect('publikasi');
    }

    function upload_cover($id) {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Upload Cover');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Publikasi', site_url('publikasi'));
        $this->breadcrumb->add_crumb('Upload Cover');

        $data['primary_title'] = 'Publikasi';
        $data['sub_primary_title'] = 'Proses upload cover';
        $this->layout->back('publikasi/cover', $data);
    }

    function save_cover() {
        $this->rule->type('U');
        $id = $this->input->post('id');

        $file = $_FILES['userfile']['name'];
        if (empty($file)) {
            $dataUpdateCover = array(
                'cover' => $this->input->post('cover')
            );
            $q = $this->the_m->update_cover($id, $dataUpdateCover);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dirubah Tanpa Mengganti Cover');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dirubah');
            }
        } else {
            $path = dirname(BASEPATH) . DIRECTORY_SEPARATOR;

            $config['upload_path'] = $path . 'res/file/publikasi/cover';
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload()) {
                $data = $this->upload->data();
                $dataUpdateCover = array(
                    'cover' => $data['file_name']
                );
                $q = $this->the_m->update_cover($id, $dataUpdateCover);
                if ($q) {
                    $this->session->set_flashdata('success', 'Data Berhasil Dirubah dengan perubahan cover');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        }
        redirect('publikasi');
    }

    function download() {
        $this->load->helper('download');
        $file_asli = $this->uri->segment(3);
        $name = date('Ymd') . '_' . $file_asli;
        $data = file_get_contents(base_url() . 'res/file/publikasi/' . $file_asli);
        force_download($name, $data);
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