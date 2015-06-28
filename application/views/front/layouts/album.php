<!-- konten -->
<div class="container margintop20">
    <div class="outer-judul">
        <h2 class="judul-dark">Album</h2>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <?php if (!empty($list_album)) { ?>
            <?php foreach ($list_album as $row):; ?>
                <div class="col-sm-6 col-md-3">
                    <a href="<?php echo site_url('album/' . $row['slug']); ?>">
                    <div class="outer-gallfol">
                        <div class="outer-img">
                            <img src="<?php echo base_url(); ?>res/foto/galeri/cover/<?php echo $row['cover']; ?>">
                            <div class="clearfix"></div>
                        </div>
                        <p class="nm-gallfol">
                            
                                <?php echo $row['judul']; ?>
                            
                        </p>
                        <div class="clearfix"></div>
                    </div>
                    </a>
                    <div class="clearfix"></div>
                </div>
            <?php endforeach; ?>
            <?php
        } else {
        ?>
            <div class="col-sm-12">
            <h3>Konten tidak tersedia</h3>
            <p>Mungkin URL yang Anda tuju sudah dihapus atau memang tidak tersedia.</p>
            </div>
        <?php
        }
        ?>
        <div class="clearfix"></div>
    </div>
