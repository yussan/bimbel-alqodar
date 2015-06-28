<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sesfilter
 *
 * @author teguholica
 */
class Sesfilter {
    
    var $ci;
    var $sesName = "sesFilter";//default nama session filter
    var $isLock = false;//mematikan fungsi lock page
    
    public function __construct() {
        $this->ci = & get_instance();;
    }
    
    /*
     * Membentuk session khusus untuk filter. "parameter LOCK" digunakan untuk
     * menjadi pengenal page bahwa session filter ini hanya bisa digunakan di
     * page tersebut. Jika lock = NULL maka halaman tersebut tidak akan hilang
     * filternya.
     */
    public function setSesFilterName($name,$lock = null){
        $this->sesName = $name;
        if($this->ci->session->userdata("sesFilterLock") != $lock && $lock != null){
            $this->ci->session->unset_userdata($this->sesName);
            $this->ci->session->set_userdata("sesFilterLock",$lock);
            $this->isLock = true;
        }
    }
    
    /*
     * Untuk menyimpan variabel yang mengandung value tertentu untuk dimasukkan
     * dalam session khusus filter
     */
    public function setFilter($var,$val){
        if($this->ci->session->userdata($this->sesName) == ""){
            $this->ci->session->set_userdata($this->sesName,array($var=>$val));
        }else{
            $arrSes = $this->ci->session->userdata($this->sesName);
            $arrSes[$var] = $val;
            $this->ci->session->set_userdata($this->sesName,$arrSes);
        }
    }
    
    /*
     * Untuk menyimpan variabel yang dikembalikan melalui method POST ke session
     * khusus filter.
     */
    public function setFilterFromPost($var,$post){
        $val = $this->ci->input->post($post);
        if($this->ci->session->userdata($this->sesName) == ""){
            $this->ci->session->set_userdata($this->sesName,array($var=>$val));
        }else{
            $arrSes = $this->ci->session->userdata($this->sesName);
            $arrSes[$var] = $val;
            $this->ci->session->set_userdata($this->sesName,$arrSes);
        }
    }
    
    /*
     * Untuk mendapatkan variabel yang tercatat dalam session khusus filter. Jika
     * variabel tidak ditemukan maka akan mengembalikan nilai kosong atau ''.
     */
    public function getFilter($var){
        if($this->ci->session->userdata($this->sesName) == ""){
            return "";
        }else{
            $arrSes = $this->ci->session->userdata($this->sesName);
            if(array_key_exists($var, $arrSes)){
                $r = $arrSes[$var];
                if($r == "all"){
                    $r = "";
                }
                return $r;
            }else{
                return "";
            }
        }
    }
    
    /*
     * Mengecek apakah variabel yang dimasukkan dalam parameter ada dalam session
     * khusus filter. Jika tidak ada maka akan mengembalikan nilai "FALSE" dan
     * jika ada dalam session khusus filter maka akan bernilai "TRUE
     */
    public function isFilterNull($var){
        if($this->ci->session->userdata($this->sesName) == ""){
            return false;
        }else{
            $arrSes = $this->ci->session->userdata($this->sesName);
            if(array_key_exists($var, $arrSes)){
                return true;
            }else{
                return false;
            }
        }
    }
    
    /*
     * Digunakan untuk menghapus session filter yang sedang aktif
     */
    public function resetFilter(){
        $this->ci->session->unset_userdata($this->sesName);
    }
}

?>
