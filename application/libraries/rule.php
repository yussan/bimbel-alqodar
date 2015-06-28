<?php
/*
Mudah-mudahan bermanfaat, 
Pembuatan library ini terinspirasi dari dari TE Framework (CISmart v3.0) dengan beberapa perbedaan
Masih banyak sekali kekurangan, silahkan dikembangkan :)
khoiruddin.com
*/
class Rule {    
    private $CI;

    function __construct()
    {
        $this->CI = get_instance();
        $this->CI->load->library('ion_auth');
    }

    //function yang sama dengan in_array, namun ini multidimensi
    //https://www.namepros.com/threads/php-in_array-for-multidimensional-arrays.711084/
    public function multi_in_array($value, $arr2ay) 
    { 
        foreach ($arr2ay AS $item) 
        { 
            if (!is_array($item)) 
            { 
                if ($item == $value) 
                { 
                    return true; 
                } 
                continue; 
            } 

            if (in_array($value, $item)) 
            { 
                return true; 
            } 
            else if ($this->multi_in_array($value, $item)) 
            { 
                return true; 
            } 
        } 
        return false; 
    }

    protected function array_multi_sum($arr2ay, $property) {
        $total = '';
        foreach ($arr2ay as $key => $value) {
          if (is_array($value)) {
             $total += $this->array_multi_sum($value, $property);
          }
          else if ($key == $property) {
             $total += $value;
          }
        }
        return $total;
    }

    public function type($rule = '') {
        //load model
        $this->CI->load->model('m_auth');
        //cek url
        $url    = $this->CI->security->xss_clean($this->CI->uri->segment(1));
        //user id
        $user = $this->CI->ion_auth->user()->row();
        if (!$this->CI->ion_auth->logged_in()){
            $user_id = '';
        }else{
            $user_id = $user->id;
        }

        //ambil role dan rule
        $role_rule = $this->CI->m_auth->get_rule($user_id);
        //jika user belum login/masuk
        if (!$this->CI->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('login', 'refresh');
        }elseif     
        //jika tidak punya hak/authority dalam ole ini
        (!$this->multi_in_array($url, $role_rule)) {
            //jika tidak memiliki authority
            show_404();
        }else{
            //cari rule berdasarkan dari variable $url
            $params = array($user_id,$url);
            $rule_url = $this->CI->m_auth->get_rule_url($params);
            //menjadikan field user_role array CRUD
            foreach ($rule_url as $row) {
                //user rule dalam per role, dipisahkan dengan koma
                $user_rule = $row['user_rule'];
            }
            //menjadikan array 2 dimensi per role
            $arr2ayMulti = array_map (
              function ($_) {
                return str_split($_);
              },
              explode (',', $user_rule)
            );
            //menjumlahkan array multi,
            //array ke 0 / Create
            $total1 = $this->array_multi_sum($arr2ayMulti, '0');
            //array ke 1 / Read
            $total2 = $this->array_multi_sum($arr2ayMulti, '1');
            //array ke 2 / Update
            $total3 = $this->array_multi_sum($arr2ayMulti, '2');
            //array ke 3 / Delete
            $total4 = $this->array_multi_sum($arr2ayMulti, '3');

            //logical yang simple, pahamlah kamu
            if($total1!='0'){
                $n1 = '1';
            }else{
                $n1 = '0';
            }
            if($total2!='0'){
                $n2 = '1';
            }else{
                $n2 = '0';
            }
            if($total3!='0'){
                $n3 = '1';
            }else{
                $n3 = '0';
            }
            if($total4!='0'){
                $n4 = '1';
            }else{
                $n4 = '0';
            }
            //hasil logical
            $user_rulesOK = $n1.$n2.$n3.$n4;
            //menjadikan array dari hasil logical
            $rules = array(
                'C' => substr($user_rulesOK, 0,1), 
                'R' => substr($user_rulesOK, 1,1), 
                'U' => substr($user_rulesOK, 2,1), 
                'D' => substr($user_rulesOK, 3,1)
            );
    
            //jika permission yang diminta tidak ada (misal 'C' tidak ada)
            if (!array_key_exists($rule, $rules)) {
                //makan ke halaman error
                show_404();
            }
            else{
                //atau jika permission di database/field user_rule tidak sama dengan 1 (misal 'C' != 1)
                if ($rules[$rule]!='1') {
                    //maka ke halaman error
                    show_404();
                }
                //jika berhasil melewati semua rintangan yang menghadang, 
                //maka disinilah halaman dimunculkan tanpa di redirect ke show_404();         
            }
        }
    }

    function sidebar_menu(){
        
        $user       = $this->CI->ion_auth->user()->row();
        $fullUrl    = site_url(uri_string());

        $q1 = 'SELECT * FROM (
            SELECT distinct(category_id), category FROM permissions 
            join roles ON roles.id = permissions.role_id
            join roles_category ON roles_category.id = roles.category_id
            WHERE group_id IN (SELECT group_id FROM users_groups WHERE user_id = '.$user->id.')
            AND rule != "0000") as q
            ORDER BY category';
        $arr1 = $this->CI->db->query($q1);    
        if($arr1->num_rows()>0){
            foreach($arr1->result_array() as $key => $value){

                $q2 = 'SELECT * FROM (
                    SELECT distinct(role_id), category_id, category, name AS role, url FROM permissions 
                    join roles ON roles.id = permissions.role_id
                    join roles_category ON roles_category.id = roles.category_id
                    WHERE group_id IN (SELECT group_id FROM users_groups WHERE user_id = '.$user->id.')
                    AND rule != "0000") as q
                    WHERE category_id = '.$value['category_id'].'
                    ORDER BY role';
                $arr2 = $this->CI->db->query($q2);
                  
                if($arr2->num_rows()>0){
                echo '<li class="treeview ';

                $q3 = 'SELECT * FROM (
                    SELECT category, url FROM permissions 
                    join roles ON roles.id = permissions.role_id
                    join roles_category ON roles_category.id = roles.category_id
                    WHERE group_id IN (SELECT group_id FROM users_groups WHERE user_id = '.$user->id.')
                    AND rule != "0000") as q
                    ORDER BY category';
                $arr3 = $this->CI->db->query($q3);  
                foreach ($arr3->result_array() as $isi) {
                    if ($fullUrl == site_url($isi['url']) && $value['category'] == $isi['category']){echo 'active';}
                }
                echo '">
                <a href="#">
                    <i class="ion-pricetag"></i>
                    <span>'; 
                    $category = array();
                    foreach($arr2->result_array() as $kat){
                        if ( in_array($kat['category'], $category) ) {
                            continue;
                        }
                        $category[] = $kat['category'];
                        echo ucfirst($kat['category']);
                    }
                echo '</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>';
                echo '<ul class="treeview-menu">';
                    foreach ($arr2->result_array() as $val_menu) {
                        echo'<li ';
                        if ($fullUrl == site_url($val_menu['url'])) {echo 'class="current"';}
                        echo '><a href="'.site_url($val_menu['url']).'"><i class="fa fa-angle-double-right"></i>'.$val_menu['role'].'</a></li>';
                    }
                echo '</ul></li>';
                }
            }
        }
    }   
}

/* End of file rule.php */
/* Location: ./application/libraries/rule.php */