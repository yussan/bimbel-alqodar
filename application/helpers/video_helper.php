<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('em_youtube')) {

    function youtube_id($url = '') {
        if ($url === '') {
            return FALSE;
        }

        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);

        if (!$matches) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function em_youtube($url) {
//        $id = youtube_id($url);
        $id = $url;
        $width = '100%';
        $height = '370';
        return '<object width="' . $width . '" height="' . $height . '"><param name="movie" value="http://www.youtube.com/v/' . $id . '&amp;hl=en_US&amp;fs=1?rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/' . $id . '&amp;hl=en_US&amp;fs=1?rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="' . $width . '" height="' . $height . '"></embed></object>';
    }

}