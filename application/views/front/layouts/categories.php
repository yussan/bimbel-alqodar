<div class="container margintop20">
    <div class="row">

        <div class="col-md-9">
            <?php if (!empty($list)): ?>
                <?php foreach ($list as $row) : ?>
                    <div class="outer-blog">
                        <h2><a href="<?php echo site_url($row->slug_kategori . '/' . $row->slug_artikel); ?>" title="Baca artikel <?php echo $row->judul; ?> selengkapnya"><?php echo $row->judul; ?></a></h2>
                        <?php if (!empty($row->id_artikel)) { ?>
                            <p class="wkt-post">
                                <span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo tgl($row->waktu) . ' ' . waktu($row->waktu); ?>
                                <span style="margin: 0 20px;"></span>
                                <span class="glyphicon glyphicon-user"></span>&nbsp;Oleh: <?php echo $row->penulis; ?>
                                <span style="margin: 0 20px;"></span>
                                <span class="glyphicon glyphicon-tag"></span>&nbsp;Kategori: <a href="<?php echo site_url($row->slug_kategori); ?>" title="Kategori <?php echo $row->kategori; ?>"><?php echo $row->kategori; ?></a>
                            </p>
                            <p>
                                <?php echo substr($row->konten, 0, 300); ?>
                                <a href="<?php echo site_url($row->slug_kategori . '/' . $row->slug_artikel); ?>" title="Baca artikel <?php echo $row->judul; ?> selengkapnya">Selengkapnya <i class="fa">&#xf101;</i></a>
                            </p>
                            <div class="clearfix"></div>
                        <?php } else {
                            echo "<h2>Belum Ada Artikel Dalam Kategori Ini</h2>";
                        } ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <center>
                <?php echo $links; ?>
            </center>
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
                  
                <div class="content-sidebar-nomrg">
                    <ul class="nav nav-pills nav-stacked">
                        <a class="twitter-timeline" href="https://twitter.com/username" data-widget-id="ganti_idnya">Tweets by @bimbel_alqodar</a>
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
                                <span class="pull-left img-sidebar">
                                    <img class="media-object" src="<?php echo base_url(); ?>res/foto/artikel/<?php echo $value['GAMBAR']; ?>" alt="<?php echo $value['JUDUL']; ?> - Images">
                                </span>
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