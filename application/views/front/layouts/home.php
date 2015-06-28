<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($slide_home as $key => $value): ?>
                        <?php
                        if ($key == 0 AND $key < 1) {
                            $ac = 'active';
                        } else {
                            $ac = '';
                        }
                        ?>
                        <div class="item <?php echo $ac; ?>">
                            <img src="<?php echo base_url(); ?>res/foto/slider/<?php echo $value['img']; ?>" alt="<?php echo $value['judul']; ?>"/>
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1><a href="<?php echo $value['link']; ?>"><?php echo $value['judul']; ?></a></h1>
                                    <p style="text-align: justify;"><?php echo substr($value['ket'], 0, 150); ?></p>
                                    <br>
                                    <a style="margin-top: 10px;" class="btn btn-sm btn-primary" href="<?php echo $value['link']; ?>" role="button">Learn more <i class="fa">&#xf101;</i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="about-home">
                <h2>Tentang Kami</h2>
                <?php echo $about_us->ISI; ?>
                <p class="pull-right">
                    <?php
                    if (!empty($sosmed_profil)) {
                        foreach ($sosmed_profil as $s) {
                            echo '<a target="_blank" href="' . $s->url_link . '"><img src="' . base_url() . 'themes/front/images/' . $s->gambar_link . '"></a> &nbsp;';
                        }
                    } else {
                        echo "";
                    }
                    ?>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="container margintop20">
    <div class="row">
        <div class="col-md-9">
            <?php foreach ($home_artikel as $value) :; ?>
                <div class="outer-blog">
                    <h2><a href="<?php echo site_url($value->SLUG_KATEGORI . '/' . $value->SLUG_ARTIKEL); ?>"><?php echo $value->JUDUL; ?></a></h2>
                    <p class="wkt-post">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo tgl($value->TANGGAL); ?>
                        <span style="margin: 0 20px;"></span>
                        <span class="glyphicon glyphicon-user"></span>&nbsp;Oleh: <?php echo $value->PENULIS; ?>
                    </p>
                    <p>
                        <!-- <span class="pull-left img-sidebar" style="margin-bottom: 10px;">
                            <img class="media-list" src="<?php echo base_url(); ?>res/foto/artikel/<?php echo $value->GAMBAR; ?>">
                        </span> -->
                        <?php echo substr($value->ISI, 0, 250); ?> ...
                        &nbsp;<a href="<?php echo site_url($value->SLUG_KATEGORI . '/' . $value->SLUG_ARTIKEL); ?>">Selengkapnya <i class="fa">&#xf101;</i></a>
                    </p>
                    <div class="clearfix"></div>
                </div>
            <?php endforeach; ?>
            <center>
                <?php echo $links; ?>
            </center>
            <div class="clearfix"></div>
            <div class="row margintop20" style="margin-bottom: 10px;">
                <div class="col-sm-6">
                    <div class="outer-col-2">
                        <h2 class="bg-red">News</h2>
                        <?php if (!empty($home_berita)) { ?>
                            <?php foreach ($home_berita as $value) : ?>
                                <div class="media line">
                                    <a href="<?php echo site_url($value['SLUG_KATEGORI'] . '/' . $value['SLUG_ARTIKEL']); ?>">
                                        <!-- <span class="pull-left img-sidebar" href="#">
                                            <img class="media-object" src="<?php echo base_url(); ?>res/foto/artikel/<?php echo $value['GAMBAR']; ?>" alt="<?php echo $value['JUDUL']; ?> - Image">
                                        </span> -->
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo $value['JUDUL']; ?></h4>
                                            <p class="wkt-post" style="text-align: left;">
                                                <span class="glyphicon glyphicon-calendar"></span> <?php echo tgl($value['TANGGAL']); ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                            <p class="pull-right" style="margin-top:10px;">
                                <a href="<?php echo site_url($berita_arsip->slug); ?>" class="btn btn-sm btn-primary">Arsip <i class="fa">&#xf101;</i></a>
                            </p>
                            <div class="clearfix"></div>
                            <?php
                        } else {
                            echo "";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="outer-col-2">
                        <h2 class="bg-dark">Event</h2>
                        <?php if (!empty($home_events)) { ?>
                            <?php foreach ($home_events as $value) : ?>
                                <div class="media line">
                                    <a href="<?php echo site_url($value['SLUG_KATEGORI'] . '/' . $value['SLUG_ARTIKEL']); ?>">
                                        <!-- <span class="pull-left img-sidebar" href="#">
                                            <img class="media-object" src="<?php echo base_url(); ?>res/foto/artikel/<?php echo $value['GAMBAR']; ?>" alt="<?php echo $value['JUDUL']; ?> - Image">
                                        </span> -->
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo $value['JUDUL']; ?></h4>
                                            <p class="wkt-post" style="text-align: left;">
                                                <span class="glyphicon glyphicon-calendar"></span> <?php echo tgl($value['TANGGAL']); ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                            <p class="pull-right" style="margin-top:10px;">
                                <a href="<?php echo site_url($event_arsip->slug); ?>" class="btn btn-sm btn-info">Arsip <i class="fa">&#xf101;</i></a>
                            </p>
                            <div class="clearfix"></div>
                            <?php
                        } else {
                            echo "";
                        }
                        ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- start sidebar -->
        <div class="col-md-3">
            <div class="outer-sidebar">
                <div class="outer-judul">
                    <h2 class="judul-red">Category</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="content-sidebar-nomrg">
                    <ul class="nav nav-pills nav-stacked">
                        <?php foreach ($side_kategori as $value):; ?>
                            <li><a href="<?php echo site_url($value['slug']); ?>"><?php echo $value['kategori']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="outer-sidebar">
                <div class="outer-judul">
                    
                <div class="clearfix"></div>
            </div>
            <div class="outer-sidebar">
                <div class="outer-judul">
                    <h2 class="judul-dark">Post Terbaru</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="content-sidebar">
                    <?php foreach ($new_post as $value):; ?>
                        <div class="media">
                            <a href="<?php echo site_url($value['SLUG_KATEGORI'] . '/' . $value['SLUG_ARTIKEL']); ?>">
                                <!-- <span class="pull-left img-sidebar">
                                    <img class="media-object" src="<?php echo base_url(); ?>res/foto/artikel/<?php echo $value['GAMBAR']; ?>" alt="<?php echo $value['JUDUL']; ?> - Images">
                                </span> -->
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $value['JUDUL']; ?></h4>
                                    <p class="wkt-post" style="text-align: left;">
                                        <span class="glyphicon glyphicon-calendar"></span> <?php echo tgl($value['TANGGAL']); ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                    <p class="pull-right" style="margin-top:20px;">
                        <a href="<?php echo site_url('all_post') ?>" class="btn btn-primary btn-sm">Semua Berita</a>
                    </p>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end sidebar -->
    </div>
</div>