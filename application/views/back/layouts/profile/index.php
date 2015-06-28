<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Profil Perusahaan</span>
                <?php
                if (empty($list)) {
                    ?>
                    <span class="box-title pull-right"><a href="<?= site_url('profile/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a></span>
                    <?php } ?>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo $notif; ?>
                <table id="tbarang" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th width="200px">Nama Perusahaan</th>
                            <th>Alamat</th>
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
                                <td> <?= $row['NAMA'] ?></td>
                                <td> <?= $row['ALAMAT'] ?></td>
                                <td>
                                    <span class="pull-right">
                                        <?=anchor('profile/detail/'.$row['ID'].'','Detail','class="label label-info" title="Lihat detail profil"')?>
                                        <?= anchor('profile/edit/' . $row['ID'] . '', 'Edit', 'class="label label-warning" title="Edit Profil Perusahaan"') ?>
                                        <?= anchor('profile/delete/' . $row['ID'] . '', 'Hapus', 'class="label label-danger" title="Hapus Profil Perusahaan" onClick="return confirm(\'Yakin ingin menghapus data ini dari kategori album?\');"') ?>
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
        </div><!-- /.box -->                            
    </div>
</div>