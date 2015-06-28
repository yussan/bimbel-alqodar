<div class="container margintop20">
    <div class="row">
        <div class="col-md-9">
            <?php
            if (!empty($list)) {
                foreach ($list as $row) {
                    ?>
                    <div class="outer-blog">
                        <h2><a href="<?php echo site_url($row['SLUG_KATEGORI'] . '/' . $row['SLUG_ARTIKEL']); ?>" title="Baca artikel <?php echo $row['JUDUL']; ?> selengkapnya"><?php echo $row['JUDUL']; ?></a></h2>
                        <p class="wkt-post">
                            <span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo tgl($row['TANGGAL']) . ' ' . waktu($row['TANGGAL']); ?>
                            <span style="margin: 0 20px;"></span>
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Oleh: <?php echo $row['PENULIS']; ?>
                            <span style="margin: 0 20px;"></span>
                            <span class="glyphicon glyphicon-tag"></span>&nbsp;Kategori: <a href="<?php echo site_url($row['SLUG_KATEGORI']); ?>" title="Kategori <?php echo $row['KATEGORI']; ?>"><?php echo $row['KATEGORI']; ?></a>
                        </p>
                        <p>
                            <span class="pull-left img-sidebar" style="margin-bottom: 10px;">
                                <img class="media-list" src="<?php echo base_url(); ?>res/foto/artikel/<?php echo $row['GAMBAR']; ?>">
                            </span>
                            <?php echo substr($row['ISI'], 0, 300); ?>
                            &nbsp;<a href="<?php echo site_url($row['SLUG_KATEGORI'] . '/' . $row['SLUG_ARTIKEL']); ?>" title="Baca artikel <?php echo $row['JUDUL']; ?> selengkapnya">Selengkapnya <i class="fa">&#xf101;</i></a>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="outer-blog">
                    <h2>Belum ada artikel dalam kategori ini.</h2>
                </div>
                <?php
            }
            ?>
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
