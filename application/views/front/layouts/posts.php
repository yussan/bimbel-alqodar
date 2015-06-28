<!-- konten -->
<div class="container margintop20">
    <div class="row">
        <div class="col-md-9">
            <div class="outer-blog">
                <?php
                if (!empty($list)) {
                    foreach ($list as $row) {
                        ?>
                        <h2><?php echo $row['judul']; ?></h2>
                        <p class="wkt-post">
                            <span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo tgl($row['waktu']) . ' ' . waktu($row['waktu']); ?>
                            <span style="margin: 0 20px;"></span>
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Oleh: <?php echo $row['first_name']; ?>
                            <span style="margin: 0 20px;"></span>
                            <span class="glyphicon glyphicon-tag"></span>&nbsp;Kategori: <a href="<?php echo site_url($row['slug_kategori']); ?>" title="Kategori <?php echo $row['kategori']; ?>"><?php echo $row['kategori']; ?></a>
                        </p>
                        <p>
                            <img width="848px" height="auto" src="<?php echo base_url();?>res/foto/artikel/<?php echo $row['gambar'];?>" />
                        </p>
                        <?php echo $row['konten']; ?>
                        <div class="clearfix"></div>
                        <p><strong>Share:</strong></p>
                        <?php
//                        $url = base_url() . $row['slug_kategori'] . '/' . $row['slug_artikel'];
                        $url = "http://" . $_SERVER['SERVER_NAME'] . str_replace("index.php", "", $_SERVER['SCRIPT_NAME']) . $row['slug_kategori'] . '/' . $row['slug_artikel'];
                        $text = substr($row['konten'], 0, 100);
                        ?>
                        <p>
                            <a target="_blank" href="<?= share_url('facebook', array('url' => $url, 'text' => $text)) ?>"><img src="<?php echo base_url('themes/front/images/fb.png'); ?>"></a>
                            <a target="_blank" href="<?= share_url('twitter', array('url' => $url, 'text' => $text)) ?>"><img src="<?php echo base_url('themes/front/images/tw.png'); ?>"></a>

                        </p>
                    </div>
                    <?php
                }
            } else {
                ?>
                <h2><a href="#">Konten tidak tersedia</a></h2>
                <p>Mungkin URL yang Anda tuju sudah dihapus atau memang tidak tersedia.</p>
                <?php
            }
            ?>
            <div class="clearfix"></div>
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
                    <h2 class="judul-red">Tweet</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="content-sidebar-nomrg">
                    <ul class="nav nav-pills nav-stacked">
                        <a class="twitter-timeline" href="https://twitter.com/username" data-widget-id="ganti_idnya">Tweets by @al-qodar</a>
                        <script>!function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + "://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, "script", "twitter-wjs");</script>
                    </ul>
                </div>
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