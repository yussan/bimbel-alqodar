<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Ganti Cover</h3>
            </div><!-- /.box-header -->
            <?=
            form_open('kategori_album/save_cover', array('role' => 'form', 'enctype' => 'multipart/form-data'));
            if (!empty($list)) {
                foreach ($list as $row) {
                    ?>
                    <div class="box-body">				        
                        <input type="hidden" name="id" value="<?= $row['ID'] ?>" />
                        <input type="hidden" name="cover" value="<?= $row['COVER'] ?>" />
                        <div class="form-group">
                            <label>ALbum</label>
                            <input readonly="readonly" class="form-control input-sm" name="judul" type="text" value="<?= $row['JUDUL'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Cover</label>
                        </div>
                        <div class="form-group">
                            <img src="<?php echo base_url(); ?>res/foto/galeri/cover/<?= $row['COVER'] ?>" />
                        </div>
                        <div class="form-group">
                            <label>Ganti Cover *) Kosongkan jika cover tidak ingin diganti (resolusi yang disarankan: 306 x 200 Pixel)</label>
                            <input type="file" name="userfile" />
                        </div>
                    </div>		                   
                    <div class="box-footer">
                        <button type="submit" class="btn btn-sm btn-primary btn-flat"><span class="ion-ios7-loop-strong"></span> Update</button>
                    </div>
                    <?php
                }
            } else {
                ?>
                Tidak ada data
                <?php
            }
            echo form_close();
            ?>
        </div><!-- /.box -->                            
    </div>
</div>
