<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Kategori siswa</span>
                <span class="box-title pull-right"><a href="<?= site_url('kategori_siswa/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo $notif; ?>
                <table id="tbarang" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Kategori siswa</th>
                            <th>Slug</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($list)) {
                        $i = 1;
                        foreach ($list as $row) {
                            ?>
                            <tr>
                                <td width="3%" align="center"><?= $i++ ?></td>
                                <td> <?= $row['KATEGORI'] ?></td>
                                <td> <?= $row['SLUG'] ?></td>
                                <td>
                                    <span class="pull-right">
                                        <?= anchor('kategori_siswa/edit/' . $row['ID'] . '', 'Edit', 'class="label label-warning" title="Edit Kategori siswa"') ?>
                                        <?= anchor('kategori_siswa/delete/' . $row['ID'] . '', 'Hapus', 'class="label label-danger" title="Hapus Kategori siswa" onClick="return confirm(\'Yakin ingin menghapus ' . $row['KATEGORI'] . ' dari kategori siswa?\');"') ?>
                                    </span>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4" align="center">Belum Ada Data</td>
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