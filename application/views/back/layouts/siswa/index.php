<script>
    $(document).ready(function() {
        $("#judulFilter").val("<?php echo $judul; ?>");
    });
</script>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Siswa</span>
                <span class="box-title pull-right"><a href="<?= site_url('siswa/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo $notif; ?>
                <table id="tsiswa" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
							<th>Alamat</th>
							<th>Email</th>
							<th>Telp</th>
							<th>Kelamin</th>
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
                                <td> <?= $row['NIS'] ?></td>
                                <td> <?= $row['KELAS'] ?></td>
								<td> <?= $row['ALAMAT'] ?></td>
								<td> <?= $row['EMAIL'] ?></td>
								<td> <?= $row['TELP'] ?></td>
								<td> <?= $row['KELAMIN'] ?></td>
                                <td>
                                    <span class="pull-right">
                                        <?= anchor('siswa/detail/' . $row['NIS'] . '', 'Detail', 'class="label label-info" title="Lihat detail siswa"') ?>
                                        <?= anchor('siswa/edit/' . $row['NIS'] . '', 'Edit', 'class="label label-warning" title="Edit siswa"') ?>
                                        <?= anchor('siswa/delete/' . $row['NIS'] . '', 'Hapus', 'class="label label-danger" title="Hapus siswa" onClick="return confirm(\'Yakin ingin menghapus ' . $row['NAMA'] . ' dari data siswa?\');"') ?>
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