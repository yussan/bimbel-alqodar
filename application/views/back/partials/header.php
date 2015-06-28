<?php 
if (!$this->ion_auth->logged_in()){
    $user ='';
    $user_groups='';
}else{
    $user = $this->ion_auth->user()->row();
    $user_groups = $this->ion_auth->get_users_groups()->result();    
}
?>
<!DOCTYPE html>
<html>
    <head>

        <meta name="robots" content="noindex">
        <meta charset="UTF-8">
        <title><?php echo $title_for_layout; ?> | Bimbingan Belajar Al-Qodar</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="<?php echo $meta_for_layout; ?>"/>
        
        <link href="<?php echo base_url('themes/back/css/bootstrap/bootstrap.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('themes/back/css/fontawesome/font-awesome.css');?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('themes/back/css/ionicons/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- Radiocheck -->
        <link href="<?php echo base_url('themes/back/css/radiocheck/radiocheck.css');?>" rel="stylesheet" type="text/css" />

        <?php 
            if(isset($includes_for_layout['css']) AND count($includes_for_layout['css']) > 0):
                foreach($includes_for_layout['css'] as $css): 
        ?>

        <link rel="stylesheet" type="text/css" href="<?php echo $css['file']; ?>"<?php echo ($css['options'] === NULL ? '' : ' media="' . $css['options'] . '"'); ?>>

        <?php 
                endforeach;
            endif; 
        ?>
        <!-- Theme style -->
        <link href="<?php echo base_url('themes/back/css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('themes/back/css/rai.css');?>" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url('themes/back/js/jquery.min.js');?>"></script>
        <script src="<?php echo base_url('themes/back/js/validation/jquery.validate.min.js');?>"></script>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url('themes/back/js/plugins/ie/html5shiv.js');?>"></script>
          <script src="<?php echo base_url('themes/back/js/plugins/ie/respond.min.js');?>"></script>
        <![endif]-->
        <?php if(isset($includes_for_layout['js']) AND count($includes_for_layout['js']) > 0): ?>
	        <?php foreach($includes_for_layout['js'] as $js): ?>

	            <?php if($js['options'] !== NULL AND $js['options'] == 'header'): ?>

	                <script type="text/javascript" src="<?php echo $js['file']; ?>"></script>

	            <?php endif; ?>

	        <?php endforeach; ?>
	    <?php endif; ?>        
        <link rel="shortcut icon" href="<?php echo base_url('themes/back/img/favicon.ico');?>"/>
    </head>
    <body class="skin-green fixed pace-done">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo site_url('admin')?>" class="logo" title="Beranda">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
               Al-Qodar
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>
                                <?php 
                                if (!$this->ion_auth->logged_in()){
                                    echo 'Anda belum Login';                                    
                                }else{
                                    echo $user->last_name;
                                }
                                ?> 
                                <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url('themes/back/img/user.png');?>" class="img-circle" alt="User Image" />
                                    <p>                                       
                                        <?php
                                        if (!$this->ion_auth->logged_in()){
                                            echo 'Anda belum Login';                                            
                                        }else{
                                            echo $user->last_name;
                                            if ($this->ion_auth->is_admin()){
                                        ?>                                        
                                        <small><a href="<?php echo site_url('auth')?>" title="Autentikasi pengguna aplikasi ini">Autentikasi <i class="fa fa-arrow-circle-right"></i></a></small>
                                        <?php
                                        }}
                                        ?> 
                                        <small>
                                        <?php
                                            foreach ($user_groups as $value) {
                                                echo ucfirst($value->name).' ';
                                            }
                                        ?>
                                        </small>                                       
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('me')?>" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('logout')?>" class="btn btn-default btn-flat">Keluar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">