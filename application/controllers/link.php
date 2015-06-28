<?php

/**
 * Description of link
 *
 * @author white
 */
class Link extends CI_Controller {

    var $limit = 20;

    public function __construct() {
        parent::__construct();
        $this->load->model('m_link', 'the_m');
        $this->load->library('breadcrumb');
        $this->load->helper('slug');
    }

    function index() {
        $this->rule->type('R');
        $offset = $this->uri->segment(3, "0");
        $this->layout->set_title('Link');
        $this->layout->set_meta('Link dari KPMAK UGM');
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Link');

        $data['primary_title'] = '<i class="ion-android-note"></i> Data';
        $data['sub_primary_title'] = 'Link';
        $data['list'] = $this->the_m->get($this->limit, $offset)->result_array();
        $jumlah = $this->the_m->get("", "")->num_rows();
        $data['pagination'] = $this->_pagination($jumlah, $this->limit, "link/index", 3);
        $data['notif'] = $this->_notification();
        $this->layout->back('link/index', $data);
    }

    function add() {
        $this->rule->type('C');
        $this->layout->set_title('Tambah Link');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Link', site_url('link'));
        $this->breadcrumb->add_crumb('Tambah Link');
        $data['primary_title'] = 'Link';
        $data['sub_primary_title'] = 'Proses tambah data';
        $this->layout->back('link/add', $data);
    }

    function save() {
        $this->rule->type('C');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
        $this->form_validation->set_rules('url_link', 'URL Link', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $path = dirname(BASEPATH) . DIRECTORY_SEPARATOR;
            $config['upload_path'] = $path . 'res/foto/link/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            } else {
                $data = $this->upload->data();
                $dataInsert = array(
                    'nama_link' => $this->input->post('nama_link'),
                    'url_link' => $this->input->post('url_link'),
                    'gambar_link' => $data['file_name'],
                    'settingKey' => 'IK'
                );
                $q = $this->the_m->save($dataInsert);
                if ($q) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        }
        redirect('link');
    }

    function edit($id) {
        $this->rule->type('U');
        $data['list'] = $this->the_m->get_by($id);
        $this->layout->set_title('Edit Link');
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Link', site_url('link'));
        $this->breadcrumb->add_crumb('Edit Link');

        $data['primary_title'] = 'Link';
        $data['sub_primary_title'] = 'Proses edit data';

        $this->layout->back('link/edit', $data);
    }

    function update() {
        $this->rule->type('U');
        $id = $this->input->post('id');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
        $this->form_validation->set_rules('url_link', 'URL Link', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $file = $_FILES['userfile']['name'];
            if (empty($file)) {
                $dataUpdate = array(
                    'nama_link' => $this->input->post('nama_link'),
                    'url_link' => $this->input->post('url_link')
                );
                $q = $this->the_m->update($id, $dataUpdate);
                if ($q) {
                    $this->session->set_flashdata('success', 'Data Berhasil Dirubah Tanpa Mengganti Gambar');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Dirubah');
                }
            } else {
                $path = dirname(BASEPATH) . DIRECTORY_SEPARATOR;

                $config['upload_path'] = $path . 'res/foto/link/';
                $config['allowed_types'] = '*';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $data = $this->upload->data();
                    $dataUpdate = array(
                        'nama_link' => $this->input->post('nama_link'),
                        'url_link' => $this->input->post('url_link'),
                        'gambar_link' => $data['file_name']
                    );
                    $q = $this->the_m->update($id, $dataUpdate);
                    if ($q) {
                        $this->session->set_flashdata('success', 'Data Berhasil Dirubah dengan perubahan gambar');
                    } else {
                        $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                    }
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }
        }
        redirect('link');
    }

    function delete($id) {
        $this->rule->type('D');
        $q = $this->the_m->delete($id);
        if ($q) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        redirect('link');
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
