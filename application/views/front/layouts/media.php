<div class="container margintop20">
    <div class="outer-judul">
        <h2 class="judul-dark">Media</h2>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row outer-media">
        <?php if (!empty($list)): ?>
            <?php foreach ($list as $v) : ?>
                <div class="col-md-6" style="margin-bottom:20px;">
                    <h2><?php echo $v['judul_media']; ?></h2>
                    <?php // echo em_youtube($v['url_media']) ;?>
                    <embed width="100%" height="370" src="<?php echo$v['url_media']; ?>">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>