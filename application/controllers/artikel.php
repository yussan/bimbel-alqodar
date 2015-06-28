<?php

/**
 * Description of artikel
 *
 * @author white
 */
class Artikel extends CI_Controller {

    var $limit = 20;

    function __construct() {
        parent::__construct();
        $this->load->model('m_artikel', 'the_m');
        $this->load->library(array('breadcrumb', 'sesfilter'));
        $this->load->helper(array('slug', 'filter'));
    }

    function index() {
        $this->rule->type('R');
        $offset = $this->uri->segment(3, "0");
        $this->layout->set_title('Artikel');
        $this->layout->set_meta('Data artikel dari AL-Qodar');
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Artikel');

        $data['primary_title'] = '<i class="ion-android-note"></i> Artikel';
        $data['sub_primary_title'] = 'Data Artikel';
        $data['list'] = $this->the_m->get($this->limit, $offset)->result_array();
        $jumlah = $this->the_m->get("", "")->num_rows();
        $data['notif'] = $this->_notification();
        $data['pagination'] = $this->_pagination($jumlah, $this->limit, "artikel/index", 3);
        $data['link_cari'] = site_url('artikel/search');
        $this->layout->back('artikel/index', $data);
    }

    function add() {
        $this->rule->type('C');
        $this->layout->set_title('Tambah Artikel');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Artikel', site_url('artikel'));
        $this->breadcrumb->add_crumb('Tambah Artikel');

        $data['primary_title'] = 'Artikel';
        $data['sub_primary_title'] = 'Proses tambah data';
        $data['get_kategori'] = $this->the_m->get_kategori()->result_array();
        $this->layout->back('artikel/add', $data);
    }

    function save() {
        $this->rule->type('C');
        $user = $this->ion_auth->user()->row();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('judul', 'Judul Artikel', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $file = $_FILES['userfile']['name'];
            if (empty($file)) {
                $dataInsert = array(
                    'id_kategori' => $this->input->post('id_kategori'),
                    'id_penulis' => $user->id,
                    'judul' => $this->input->post('judul'),
                    'slug' => slug($this->input->post('judul')),
                    'waktu' => date('Y-m-d H:i:s'),
                    'konten' => $this->input->post('konten'),
                    'gambar' => 'no_image.jpg'
                );
                $q = $this->the_m->save($dataInsert);
                if ($q) {
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan Tanpa Gambar');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Disimpan');
                }
            } else {
                $path = dirname(BASEPATH) . DIRECTORY_SEPARATOR;
                $config['upload_path'] = $path . 'res/foto/artikel/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['overwrite'] = TRUE;
                $config['max_size'] = 2000;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $path . 'res/foto/artikel/' . $data["file_name"];
                    $config['create_thumb'] = false;
                    $config['maintain_ration'] = false;
                    $config['width'] = 602;
                    $config['height'] = 300;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    } else {
                        $dataInsert = array(
                            'id_kategori' => $this->input->post('id_kategori'),
                            'id_penulis' => $user->id,
                            'judul' => $this->input->post('judul'),
                            'slug' => slug($this->input->post('judul')),
                            'waktu' => date('Y-m-d H:i:s'),
                            'konten' => $this->input->post('konten'),
                            'gambar' => $data['file_name']
                        );
                        $q = $this->the_m->save($dataInsert);
                        if ($q) {
                            $this->session->set_flashdata('success', 'Data Berhasil Disimpan Dengan Gambar');
                        } else {
                            $this->session->set_flashdata('error', 'Data Gagal Disimpan');
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }
        }
        redirect('artikel');
    }

    function detail($id) {
        $this->rule->type('R');
        $data['list'] = $this->the_m->get_detail_by($id)->row();
        $this->layout->set_title('Detail Artikel');
        $this->layout->set_meta(substr($data['list']->ISI, 0, 200));
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Artikel', site_url('artikel'));
        $this->breadcrumb->add_crumb('Detail Artikel');
        $data['primary_title'] = '<i class="ion-android-note"></i> Artikel';
        $data['sub_primary_title'] = 'Data Detail Artikel';
        $this->layout->back('artikel/detail', $data);
    }

    function edit($id) {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Edit Artikel');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Artikel', site_url('artikel'));
        $this->breadcrumb->add_crumb('Edit Artikel');

        $data['primary_title'] = 'Artikel';
        $data['sub_primary_title'] = 'Proses edit data';
        $data['get_kategori'] = $this->the_m->get_kategori()->result_array();
        $this->layout->back('artikel/edit', $data);
    }

    function update() {
        $this->rule->type('U');
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('judul', 'Judul Artikel', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $file = $_FILES['userfile']['name'];
            if (empty($file)) {
                $dataUpdate = array(
                    'id_kategori' => $this->input->post('id_kategori'),
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
            } else {
                $path = dirname(BASEPATH) . DIRECTORY_SEPARATOR;
                $config['upload_path'] = $path . 'res/foto/artikel/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['overwrite'] = TRUE;
                $config['max_size'] = 2000;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $path . 'res/foto/artikel/' . $data["file_name"];
                    $config['create_thumb'] = false;
                    $config['maintain_ratio'] = false;
                    $config['width'] = 602;
                    $config['height'] = 300;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    } else {
                        $dataUpdate = array(
                            'id_kategori' => $this->input->post('id_kategori'),
                            'judul' => $this->input->post('judul'),
                            'slug' => slug($this->input->post('judul')),
                            'konten' => $this->input->post('konten'),
                            'gambar' => $data['file_name']
                        );
                        $q = $this->the_m->update($id, $dataUpdate);
                        if ($q) {
                            $this->session->set_flashdata('success', 'Data Berhasil Dirubah');
                        } else {
                            $this->session->set_flashdata('error', 'Data Gagal Dirubah');
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }
        }
        redirect('artikel');
    }

    function delete($id) {
        $this->rule->type('D');
        $q = $this->the_m->delete($id);
        if ($q) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        redirect('artikel');
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
