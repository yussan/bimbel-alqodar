<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta name="robots" content="noindex">
        <meta charset="UTF-8">
        <title>Lupa Kata Sandi &bull; Aplikasi Raport SAF</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Halaman Login"/>
        
        <link href="<?php echo base_url('themes/back/css/bootstrap/bootstrap.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('themes/back/css/fontawesome/font-awesome.css');?>" rel="stylesheet" type="text/css" />
        
        <!-- Theme style -->
        <link href="<?php echo base_url('themes/back/css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('themes/back/css/rai.css');?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url('themes/back/js/plugins/ie/html5shiv.js');?>"></script>
          <script src="<?php echo base_url('themes/back/js/plugins/ie/respond.min.js');?>"></script>
        <![endif]-->
        <link rel="shortcut icon" href="<?php echo base_url('themes/back/img/favicon.ico');?>"/>
    </head>
    <body class="bg-black">
    <script>
      window.onload = function() {
        document.getElementById("email").focus();
      };
    </script>

        <div class="form-box" id="login-box">
            <div class="header"><?php echo lang('forgot_password_heading');?></div>
            <?php echo form_open("auth/forgot_password");?>
                <div class="body bg-gray">
                    <div class="form-group">
                    <?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?>
                    <!-- notif -->
                        <div class="alert alert-info alert-dismissable col-centered" <?php if(is_string($message)){echo 'style="display:block; margin-bottom:7px;"';}else{echo 'style="display:none;"';}?> >
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $message;?>  
                        </div>
                        <?php echo form_input($email);?>
                    </div>
                </div>
                <div class="footer">
                    <input type="submit" value="Kirim" class="btn btn-success btn-block btn-flat">
                </div>
            <?php echo form_close();?>
        </div>

        <script src="<?php echo base_url('themes/back/js/jquery.min.js');?>"></script>
        <script src="<?php echo base_url('themes/back/js/plugins/bootstrap/bootstrap.min.js');?>" type="text/javascript"></script>

    </body>
</html>