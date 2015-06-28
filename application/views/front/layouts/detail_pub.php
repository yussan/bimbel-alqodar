<div class="container margintop20">

    <div class="outer-judul">
        <h2 class="judul-dark">Detail Publikasi</h2>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <?php if (!empty($list)): ?>
        <?php foreach ($list as $v) : ?>
            <div class="row outer-d-publikasi">
                <div class="col-sm-4">
                    <img src="<?php echo base_url(); ?>res/file/publikasi/cover/<?php echo $v['COVER']; ?>">
                    <p style="text-align:center;margin-top: 50px; margin-bottom:30px;">
                        <a class="btn btn-lg btn-primary" target="_blank" href="<?php echo base_url(); ?>res/file/publikasi/<?php echo $v['FILE']; ?>"><i class="fa fa-download"></i>&nbsp;Download</a>
                    </p>
                </div>
                <div class="col-sm-8">
                    <h2><?php echo $v['JUDUL']; ?></h2>
                    <?php echo $v['ABSTRAK']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="clearfix"></div>
</div>