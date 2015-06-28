m_contoh<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_barang extends CI_Controller {

    function __construct() {
        parent::__construct();
        //jika digunakan di mayoritas function, panggil disini
        //model
        $this->load->model('m_master_barang');
        //library breadcrum/untuk navigasi
        $this->load->library('breadcrumb');
    }

    function index() {
        //rule type pada function ini: Read
        $this->rule->type('R');
        //Layout
        //title
        $this->layout->set_title('Data Barang');
        //meta description jika perlu
        $this->layout->set_meta('Data barang dari AL-Qodar');
        //css tambahan bila perlu
        $this->layout->add_includes('css', 'themes/back/css/datatables/dataTables.bootstrap.css');
        //js tambahan jika perlu
        $this->layout->add_includes('js', 'themes/back/js/plugins/datatables/jquery.dataTables.js');
        $this->layout->add_includes('js', 'themes/back/js/plugins/datatables/dataTables.bootstrap.js');
        //breadcrumb/untuk navigasi
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Barang');
        //judul besar
        $data['primary_title'] = '<i class="ion-android-note"></i> Master';
        $data['sub_primary_title'] = 'Merupakan induk dari semua data';
        //mengaktifkan menu master di sidebar
        $data['master'] = 'active';
        //ambil data dari model
        $data['list'] = $this->m_master_barang->get();
        //menggunakan layout back/backend templating
        $this->layout->back('master_barang/index', $data);
    }

    function barang_detail($id_barang = '', $id_produksi = '') {
        //rule type pada function ini: Read
        $this->rule->type('R');
        //parameter yang dipelukan query
        $params = array($id_barang, $id_produksi);
        //Layout
        //title
        $this->layout->set_title('Detail Barang');
        //meta description jika perlu
        $this->layout->set_meta($this->m_master_barang->get_ket($params));
        //breadcrumb/untuk navigasi
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Barang', site_url('master_barang'));
        $this->breadcrumb->add_crumb('Detail Barang');
        //judul besar
        $data['primary_title'] = '<i class="ion-android-note"></i> Master';
        $data['sub_primary_title'] = 'Merupakan induk dari semua data';
        //mengaktifkan menu master di sidebar
        $data['master'] = 'active';
        //ambil data dari model dengan berdasarkan parameter diatas
        $data['list'] = $this->m_master_barang->get_by($params);
        //menggunakan layout back/backend templating
        $this->layout->back('master_barang/detail', $data);
    }

    function add() {
        //rule type pada function ini: Create
        $this->rule->type('C');
        //Layout
        //title
        $this->layout->set_title('Tambah Data Barang');
        //breadcrumb/untuk navigasi
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Barang', site_url('master_barang'));
        $this->breadcrumb->add_crumb('Tambah Barang');
        //judul besar
        $data['primary_title'] = 'Data Master';
        $data['sub_primary_title'] = 'Merupakan induk dari semua data';
        //mengaktifkan menu master di sidebar
        $data['master'] = 'active';
        //menggunakan layout back/backend templating
        $this->layout->back('master_barang/add', $data);
    }

    function save() {
        //rule type pada function ini: Create
        $this->rule->type('C');
        //ambil data dari form
        $dataInsert = array(
            'id_produksi' => $this->input->post('id_produksi'),
            'nama' => $this->input->post('nama'),
            'ket' => $this->input->post('ket')
        );
        //simpan melalui model
        $this->m_master_barang->save($dataInsert);
        //kembalikan ke halaman master_barang
        redirect('master_barang');
    }

    function edit($id_barang = '', $id_produksi = '') {
        //rule type pada function ini: Update
        $this->rule->type('U');
        //parameter yang dipelukan query
        $params = array($id_barang, $id_produksi);
        //layout
        //title
        $this->layout->set_title('Edit Data Barang');
        //breadcrumb/untuk navigasi
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Beranda', site_url());
        $this->breadcrumb->add_crumb('Master', site_url('master'));
        $this->breadcrumb->add_crumb('Barang', site_url('master_barang'));
        $this->breadcrumb->add_crumb('Edit Barang');
        //judul besar
        $data['primary_title'] = 'Data Master';
        $data['sub_primary_title'] = 'Merupakan induk dari semua data';
        //mengaktifkan menu master di sidebar
        $data['master'] = 'active';
        //ambil data dari model dengan berdasarkan parameter diatas
        $data['list'] = $this->m_master_barang->get_by($params);
        //menggunakan layout back/backend templating
        $this->layout->back('master_barang/edit', $data);
    }

    function update() {
        //rule type pada function ini: Update
        $this->rule->type('U');
        //ambil data dari form
        $id_barang = $this->input->post('id_barang');
        $dataUpdate = array(
            'id_produksi' => $this->input->post('id_produksi'),
            'nama' => $this->input->post('nama'),
            'ket' => $this->input->post('ket')
        );
        //update melalui model
        $this->m_master_barang->update($id_barang, $dataUpdate);
        //kembalikan ke halaman master_barang
        redirect('master_barang');
    }

    function delete($id_barang = '') {
        //rule type pada function ini: Delete
        $this->rule->type('D');
        //hapus melalui model berdasarkan id
        $this->m_master_barang->delete($id_barang);
        //kembalikan ke halaman master_barang
        redirect('master_barang');
    }

}