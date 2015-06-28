<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Link</span>
                <span class="box-title pull-right"><a href="<?= site_url('link/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a></span>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo $notif; ?>
                <table id="tartikel" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Gambar</th>
                            <th>Nama Link</th>
                            <th>URL</th>
                            <th width="160px">Aksi</Nama Linkth>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($list)) {
                        $i = 1;
                        foreach ($list as $row) {
                            ?>
                            <tr>
                                <td width="3%" align="center"><?= $i++ ?></td>
                                <td><img width="120px" height="90px" src="<?php echo base_url(); ?>res/foto/link/<?= $row['GAMBAR'] ?>" /></td>
                                <td> <?= $row['NAMA'] ?></td>
                                <td> <?= $row['URL'] ?></td>
                                <td>
                                    <span class="pull-right">
                                        <?= anchor('link/edit/' . $row['ID'] . '', 'Edit', 'class="label label-warning" title="Edit Link"') ?>
                                        <?= anchor('link/delete/' . $row['ID'] . '', 'Hapus', 'class="label label-danger" title="Hapus Link" onClick="return confirm(\'Yakin ingin menghapus ' . $row['NAMA'] . ' dari data link?\');"') ?>
                                    </span>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5" align="center">Belum Ada Data</td>
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