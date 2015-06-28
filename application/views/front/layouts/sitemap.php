<div class="container margintop20">
    <div class="row">
        <div class="col-md-9">
            <div class="outer-blog">
                <h2>Kategori</h2>
                <ul>
                    <?php foreach ($sitemap_cat as $value): ?>
                        <li><a href="<?php echo site_url($value['slug']); ?>"><?php echo $value['kategori']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="outer-blog">
                <h2>Halaman Statis</h2>
                <ul>
                    <?php foreach ($sitemap_hal as $value): ?>
                        <li><a href="<?php echo site_url($value['slug']); ?>"><?php echo $value['judul']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="outer-blog">
                <h2>Artikel</h2>
                <ul>
                    <?php echo $sitemap_art; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
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
                               <!--  <span class="pull-left img-sidebar">
                                    <img class="media-object" src="<?php echo base_url(); ?>res/foto/artikel/2.jpg" alt="judul">
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