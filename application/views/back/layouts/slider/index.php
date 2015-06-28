<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Slider</span>
                <span class="box-title pull-right"><a href="<?= site_url('slider/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a></span>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo $notif; ?>
                <table id="tartikel" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Link</th>
                            <th width="160px">Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($list)) {
                        $i = 1;
                        foreach ($list as $row) {
                            ?>
                            <tr>
                                <td width="3%" align="center"><?= $i++ ?></td>
                                <td><img width="120px" height="90px" src="<?php echo base_url(); ?>res/foto/slider/<?= $row['img'] ?>" /></td>
                                <td> <?= $row['judul'] ?></td>
                                <td> <?= $row['ket'] ?></td>
                                <td> <?= $row['link'] ?></td>
                                <td>
                                    <span class="pull-right">
                                        <?= anchor('slider/edit/' . $row['id'] . '', 'Edit', 'class="label label-warning" title="Edit Slider"') ?>
                                        <?= anchor('slider/delete/' . $row['id'] . '', 'Hapus', 'class="label label-danger" title="Hapus Slider" onClick="return confirm(\'Yakin ingin menghapus ' . $row['judul'] . ' dari slider?\');"') ?>
                                    </span>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8" align="center">Belum Ada Data</td>
                        </tr>
                        <?php
                    }
                    ?>							
                </table>									
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <?php echo $pagination; ?>
            </div>
        </div><!-- /.box -->                            
    </div>
</div>