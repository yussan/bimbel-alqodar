<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Publikasi</span>
                <span class="box-title pull-right"><a href="<?= site_url('publikasi/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a></span>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo $notif; ?>
                <table id="tartikel" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Judul</th>
                            <th>Abstraksi</th>
                            <th>Kata Kunci</th>
                            <th width="180px">Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($list)) {
                        $i = 1;
                        foreach ($list as $row) {
                            ?>
                            <tr>
                                <td width="3%" align="center"><?= $i++ ?></td>
                                <td> <?= $row['JUDUL'] ?></td>
                                <td> <?= substr($row['ABSTRAK'], 0, 120) . ' ...'; ?></td>
                                <td> <?= $row['KUNCI'] ?></td>
                                <td>
                                    <span class="pull-right">
                                        <?= anchor('publikasi/upload_cover/' . $row['ID'] . '', 'Cover', 'class="label label-default" title="Upload Cover"') ?>
                                        <?= anchor('publikasi/detail/' . $row['ID'] . '', 'Detail', 'class="label label-info" title="Lihat detail publikasi"') ?>
                                        <?= anchor('publikasi/edit/' . $row['ID'] . '', 'Edit', 'class="label label-warning" title="Edit Publikasi"') ?>
                                        <?= anchor('publikasi/delete/' . $row['ID'] . '', 'Hapus', 'class="label label-danger" title="Hapus Publikasi" onClick="return confirm(\'Yakin ingin menghapus data ini dari album foto?\');"') ?>
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