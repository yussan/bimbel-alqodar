<?php

/**
 * Description of kategori_album
 *
 * @author white
 */
class Kategori_album extends CI_Controller {

    var $limit = 20;

    public function __construct() {
        parent::__construct();
        $this->load->model('m_kategori_album', 'the_m');
        $this->load->library('breadcrumb');
        $this->load->helper('slug');
    }

    function index() {
        $this->rule->type('R');
        $offset = $this->uri->segment(3, "0");
        $this->layout->set_title('Kategori Album');
        $this->layout->set_meta('Kategori album dari AL-Qodar');
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Kategori Album');

        $data['primary_title'] = '<i class="ion-android-note"></i> Kategori';
        $data['sub_primary_title'] = 'Album';
        $data['list'] = $this->the_m->get($this->limit, $offset)->result_array();
        $jumlah = $this->the_m->get("", "")->num_rows();
        $data['pagination'] = $this->_pagination($jumlah, $this->limit, "kategori_album/index", 3);
        $data['notif'] = $this->_notification();
        $this->layout->back('kategori_album/index', $data);
    }

    function add() {
        $this->rule->type('C');
        $this->layout->set_title('Tambah Kategori Album');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Kategori Album', site_url('kategori_album'));
        $this->breadcrumb->add_crumb('Tambah Kategori Album');
        $data['primary_title'] = 'Kategori Album';
        $data['sub_primary_title'] = 'Proses tambah data';
        $this->layout->back('kategori_album/add', $data);
    }

    function save() {
        $this->rule->type('C');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul', 'Nama Album', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataInsert = array(
                'slug' => slug($this->input->post('judul')),
                'judul' => $this->input->post('judul')
            );
            $q = $this->the_m->save($dataInsert);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
        }

        redirect('kategori_album');
    }

    function edit($id) {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Edit Kategori Album');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Kategori Album', site_url('kategori_album'));
        $this->breadcrumb->add_crumb('Edit Kategori Album');

        $data['primary_title'] = 'Kategori Album';
        $data['sub_primary_title'] = 'Proses edit data';

        $this->layout->back('kategori_album/edit', $data);
    }

    function update() {
        $this->rule->type('U');
        $id = $this->input->post('id');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul', 'Nama Album', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $dataUpdate = array(
                'slug' => slug($this->input->post('judul')),
                'judul' => $this->input->post('judul')
            );
            $q = $this->the_m->update($id, $dataUpdate);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dirubah');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dirubah');
            }
        }
        redirect('kategori_album');
    }

    function delete($id) {
        $this->rule->type('D');
        $cek_konstrain = $this->the_m->cek_konstrain($id)->result();
        $row = '';
        foreach ($cek_konstrain as $v) {
            $row .= $v->id_album;
        }
        if (!empty($row)) {
            $this->session->set_flashdata('error', 'Album Tidak Dapat Dihapus. Album Ini Sudah Digunakan');
        } else {
            $q = $this->the_m->delete($id);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dihapus');
            }
        }
        redirect('kategori_album');
    }

    function cover($id) {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Upload Cover');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Album', site_url('kategori_album'));
        $this->breadcrumb->add_crumb('Upload Cover');

        $data['primary_title'] = 'Kategori Album';
        $data['sub_primary_title'] = 'Proses upload cover';
        $this->layout->back('kategori_album/cover', $data);
    }

    function save_cover() {
        $this->rule->type('U');
        $id = $this->input->post('id');

        $file = $_FILES['userfile']['name'];
        if (empty($file)) {
            $dataUpdateCover = array(
                'cover' => 'default.png'
            );
            $q = $this->the_m->update_cover($id, $dataUpdateCover);
            if ($q) {
                $this->session->set_flashdata('success', 'Data Berhasil Dirubah Tanpa Mengganti Cover');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Dirubah');
            }
        } else {
            $path = dirname(BASEPATH) . DIRECTORY_SEPARATOR;

            $config['upload_path'] = $path . 'res/foto/galeri/cover/';
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['overwrite'] = TRUE;
            $config['max_size'] = 2000;


            $this->load->library('upload', $config);
            if ($this->upload->do_upload()) {
                $data = $this->upload->data();
                $config['width'] = 306;
                $config['height'] = 200;
                $config['source_image'] = $path . 'res/foto/galeri/cover/' . $data["file_name"];
                $config['create_thumb'] = FALSE;
                $this->load->library('image_lib', $config);
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                } else {
                    $dataUpdateCover = array(
                        'cover' => $data['file_name']
                    );
                    $q = $this->the_m->update_cover($id, $dataUpdateCover);
                    if ($q) {
                        $this->session->set_flashdata('success', 'Data Berhasil Dirubah dengan perubahan cover');
                    } else {
                        $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                    }
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        }
        redirect('kategori_album');
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
