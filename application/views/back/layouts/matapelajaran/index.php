<script>
    $(document).ready(function() {
        $("#judulFilter").val("<?php echo $judul; ?>");
    });
</script>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Mata Pelajaran</span>
                <span class="box-title pull-right"><a href="<?= site_url('matapelajaran/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo $notif; ?>
                <table id="tsiswa" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Matapelajaran</th>
                         
							
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
                            
                                <td> <?= $row['matapelajaran'] ?></td>
                            
								<td>
                                    <span class="pull-right">
                                        <?= anchor('matapelajaran/detail/' . $row['id_matapelajaran'] . '', 'Detail', 'class="label label-info" title="Lihat detail siswa"') ?>
                                        <?= anchor('matapelajaran/edit/' . $row['id_matapelajaran'] . '', 'Edit', 'class="label label-warning" title="Edit siswa"') ?>
                                        <?= anchor('matapelajaran/delete/' . $row['id_matapelajaran'] . '', 'Hapus', 'class="label label-danger" title="Hapus siswa" onClick="return confirm(\'Yakin ingin menghapus ' . $row['matapelajaran'] . ' dari data siswa?\');"') ?>
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