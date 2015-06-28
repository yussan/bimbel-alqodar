<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('cek_kata')) {

    function cek_kata($kata) {
        $kata = preg_replace(array(
            // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
            // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
                ), array(
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            "\$0",
            "\$0",
            "\$0",
            "\$0",
            "\$0",
            "\$0",
            "\$0",
            "\$0",
                ), $kata);
        
        $kata = strip_tags(str_replace('&nbsp', '', strip_tags($kata)));
        $kata = strip_tags(str_replace('<p>', '', strip_tags($kata)));
        return $kata;
    }

}

if (!function_exists('list_halaman')){
    function list_halaman(){
        $CI=& get_instance();
        $CI->load->database();
        $sql='SELECT judul, slug FROM halaman';
        $query = $CI->db->query($sql)->result_array();

        echo '<ul class="list-footer">';
        foreach ($query as $kolom) {
            echo '<li><a href="'.site_url($kolom['slug']).'">'.$kolom['judul'].'</a></li>';
        }
        echo '</ul>';
    }
}