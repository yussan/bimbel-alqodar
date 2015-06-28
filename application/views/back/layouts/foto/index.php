<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Album Foto</span>
                <span class="box-title pull-right"><a href="<?= site_url('foto/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a></span>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo $notif; ?>
                <table id="tartikel" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Foto</th>
                            <th>Judul Foto</th>
                            <th>Nama Album</th>
                            <th>Diupload Oleh</th>
                            <th>Tanggal</th>
                            <th>Slug</th>
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
                                <td><img width="120px" height="90px" src="<?php echo base_url(); ?>res/foto/galeri/<?= $row['FOTO'] ?>" /></td>
                                <td> <?= $row['NAMA_FOTO'] ?></td>
                                <td> <?= $row['ALBUM'] ?></td>
                                <td> <?= $row['PENULIS'] ?></td>
                                <td> <?= $row['TANGGAL'] ?></td>
                                <td> <?= $row['SLUG'] ?></td>
                                <td>
                                    <span class="pull-right">
                                        <?= anchor('foto/edit/' . $row['ID'] . '', 'Edit', 'class="label label-warning" title="Edit Foto"') ?>
                                        <?= anchor('foto/delete/' . $row['ID'] . '', 'Hapus', 'class="label label-danger" title="Hapus Foto" onClick="return confirm(\'Yakin ingin menghapus ' . $row['NAMA_FOTO'] . ' dari album foto?\');"') ?>
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