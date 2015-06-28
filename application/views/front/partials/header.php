<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="shortcut icon" href="<?php echo base_url('themes/front/ico/favicon.ico'); ?>">

        <title><?php echo $title_for_layout; ?></title>
        <meta name="description" content="<?php echo $meta_for_layout; ?>"/>
        <meta name="author" content="AL-Qodar">

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('themes/front/css/bootstrap.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('themes/front/css/carousel.css'); ?>" rel="stylesheet">

        <link href="<?php echo base_url('themes/front/css/custom-bimbel.css'); ?>" rel="stylesheet">
        <!-- for grid -->
        <link rel="stylesheet" href="<?php echo base_url('themes/front/css/css-grid/pin.css'); ?>" type="text/css">
        <!-- end for grid -->
        <!-- font awesome -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('themes/front/fonts/fontawesome/css/font-awesome.css'); ?>" />
        <!-- additional css and javascript -->
        <?php if (isset($includes_for_layout['css']) AND count($includes_for_layout['css']) > 0): ?>
            <?php foreach ($includes_for_layout['css'] as $css): ?>
                <link rel="stylesheet" type="text/css" href="<?php echo $css['file']; ?>"<?php echo ($css['options'] === NULL ? '' : ' media="' . $css['options'] . '"'); ?>>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (isset($includes_for_layout['js']) AND count($includes_for_layout['js']) > 0): ?>
            <?php foreach ($includes_for_layout['js'] as $js): ?>

                <?php if ($js['options'] !== NULL AND $js['options'] == 'header'): ?>

                    <script type="text/javascript" src="<?php echo $js['file']; ?>"></script>

                <?php endif; ?>

            <?php endforeach; ?>
        <?php endif; ?>
        <!-- additional css and javascript -->
        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="<?php echo base_url('themes/front/js/ie8-responsive-file-warning.js'); ?>"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url('themes/front/js/html5shiv.js'); ?>"></script>
          <script src="<?php echo base_url('themes/front/js/respond.min.js'); ?>"></script>
        <![endif]-->


        <!-- jquery for all -->
        <script src="<?php echo base_url('themes/front/js/jquery.min.js'); ?>"></script>
        <!-- end jquery for all -->

        <!-- js lightbox gallery -->
        <script src="<?php echo base_url('themes/front/js/lightboxgallery/lightGallery.js'); ?>"></script>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('themes/front/js/lightboxgallery/lightGallery.css'); ?>" />
        <!-- end js lightbox gallery -->

        <script type="text/javascript">
            $('.carousel').carousel({
                interval: 2000
            })
        </script>

    </head>

    <body>

        <div class="line-atas">
            <div class="clearfix"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-8">
                    <div class="logo-utama">
                        <a href="<?php echo site_url();?>"><img src="<?php echo base_url('themes/front/images/logo.png'); ?>"></a>
                    </div>
                </div>
                <?= form_open('cari', array('role' => 'form')); ?>
                    <div class="col-xs-4">
                        <div class="input-group input-group-sm" style="margin-top:35px; margin-bottom: 10px;">
                            <input type="text" class="form-control" name="cari" placeholder="Search ...">
                            <span class="input-group-btn">
                                <button type="submit" name="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                <?= form_close(); ?>
            </div>

        </div>
        <div class="container">
            <div class="navbar navbar-inverse navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="#"></a> -->
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo site_url(); ?>">Home</a></li>
						<li class="dropdown">
                          
                        </li>
                        
						<li class="dropdown">
                            <a href="<?php echo site_url('login_siswa'); ?>">Soal</a>
                            
                           
                        </li>
						  <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Program Unggulan<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                               
                                <li><a href="<?php echo site_url('program-sd'); ?>">Program SD</a></li>
                                <li><a href="<?php echo site_url('program-smp'); ?>">Program SMP</a></li>
                                   
                            </ul>
                        </li>
                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gallery <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('album'); ?>">Foto</a></li>
                                <li><a href="<?php echo site_url('media'); ?>">Video</a></li>
                            </ul>
                        </li>
						<li class="dropdown"><a href="<?php echo site_url('sitemap'); ?>">Sitemap</a></li>
						<li class="dropdown"><a href="<?php echo site_url('list_guru'); ?>">Daftar Guru</a></li>
                    </ul>
                </div>
            </div>
        </div>