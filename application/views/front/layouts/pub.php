<div class="container margintop20">
    <div class="outer-judul">
        <h2 class="judul-dark">Publikasi</h2>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <?php if (!empty($list)):?>
            <?php foreach ($list as $v) : ?>
                <div class="col-sm-6 col-md-4">
                    <div class="outer-publikasi">
                        <a href="<?php echo site_url($v['SLUG_KATEGORI'] . '/' . $v['SLUG_PUBLIKASI']); ?>">
                            <div class="outer-img">
                                <img height="90px" src="<?php echo base_url(); ?>res/file/publikasi/cover/<?php echo $v['COVER']; ?>" />
                                <br />
                            </div>
                            <div class="nm-publikasi" style="color: #555555;">
                                <?php echo $v['JUDUL']; ?>
                            </div>
                        </a>
                        <br />
                        <p class="text-center">
                            <a href="<?php echo site_url($v['SLUG_KATEGORI'] . '/' . $v['SLUG_PUBLIKASI']); ?>" class="btn btn-sm btn-primary">Detail</a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
</div>