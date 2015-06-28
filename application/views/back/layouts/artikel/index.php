<script>
    $(document).ready(function() {
        $("#judulFilter").val("<?php echo $judul; ?>");
    });
</script>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Artikel</span>
                <span class="box-title pull-right"><a href="<?= site_url('artikel/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo $notif; ?>
                <table id="tartikel" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
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
                                <td> <?= $row['JUDUL'] ?></td>
                                <td> <?= $row['PENULIS'] ?></td>
                                <td> <?= $row['TANGGAL'] ?></td>
                                <td>
                                    <span class="pull-right">
                                        <?= anchor('artikel/detail/' . $row['ID'] . '', 'Detail', 'class="label label-info" title="Lihat detail artikel"') ?>
                                        <?= anchor('artikel/edit/' . $row['ID'] . '', 'Edit', 'class="label label-warning" title="Edit Artikel"') ?>
                                        <?= anchor('artikel/delete/' . $row['ID'] . '', 'Hapus', 'class="label label-danger" title="Hapus Artikel" onClick="return confirm(\'Yakin ingin menghapus ' . $row['JUDUL'] . ' dari data artikel?\');"') ?>
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
            </div>
            <div class="box-footer clearfix">
                <?php echo $pagination; ?>
            </div>
        </div><!-- /.box -->                            
    </div>
</div>