<?php

//  Diambil dari https://github.com/rattrap/codeigniter-layout
// * Khoiruddin *

class Layout {

    private $ci;
    // the title for the layout
    private $title_for_layout;
    // the meta description for the layout
    private $meta_for_layout;
    // title separator
    // you can change this in the construct
    public $title_separator;
    // holds the css and js files
    private $includes;

    public function __construct() {
        $this->ci = &get_instance();
        $this->title_for_layout = NULL;
        $this->title_separator = ' &bull; ';
        $this->includes = array();
    }

    public function set_title($title = NULL) {
        $this->title_for_layout = $title;
    }

    public function set_meta($meta = NULL) {
        $this->meta_for_layout = $meta;
    }

    public function add_includes($type, $file, $options = NULL, $prepend_base_url = TRUE) {

        if ($prepend_base_url) {
            $this->ci->load->helper('url');
            $file = base_url() . $file;
        }

        $this->includes[$type][] = array(
            'file' => $file,
            'options' => $options
        );
        // allows chaining
        return $this;
    }

    public function back($name, $data = array(), $layout = 'back') {
        // get the contents of the view and store it
        $view = $this->ci->load->view($layout . '/layouts/' . $name, $data, TRUE);
        // set the title
        $title = '';
        if ($this->title_for_layout !== NULL) {
            $title = $this->title_for_layout;
        }

        // set the meta
        $meta = '';
        if ($this->meta_for_layout !== NULL) {
            $meta = $this->meta_for_layout;
        } else {
            $meta = 'Tidak ada deskripsi';
        }
        $this->ci->load->view('back/layouts/' . $layout, array(
            'title_for_layout' => $title,
            'meta_for_layout' => $meta,
            'includes_for_layout' => $this->includes,
            'content_for_layout' => $view
        ));
    }

    public function front($name, $data = array(), $layout = 'front') {
        // get the contents of the view and store it
        $view = $this->ci->load->view($layout . '/layouts/' . $name, $data, TRUE);
        // set the title
        $title = '';
        if ($this->title_for_layout !== NULL) {
            $title = $this->title_for_layout;
        }
        // set the meta
        $meta = '';
        if ($this->meta_for_layout !== NULL) {
            $meta = $this->meta_for_layout;
        } else {
            $meta = 'Made with love by Raksa Abadi Informatika';
        }

        $this->ci->load->view('front/layouts/' . $layout, array(
            'title_for_layout' => $title,
            'meta_for_layout' => $meta,
            'includes_for_layout' => $this->includes,
            'content_for_layout' => $view
        ));
    }

}

/* End of file layout.php */
/* Location: ./application/libraries/layout.php */