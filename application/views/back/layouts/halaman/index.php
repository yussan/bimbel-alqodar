<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Halaman Statis</span>
                <span class="box-title pull-right"><a href="<?= site_url('halaman/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a></span>
            </div>
            <div class="box-body table-responsive">
                <?php echo $notif;?>
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
                                        <?php
                                            if($row['ID'] == 1){
                                            ?>
                                                <?=anchor('halaman/detail/'.$row['ID'].'','Detail','class="label label-info" title="Lihat detail halaman"')?>
                                                <?=anchor('halaman/edit/' . $row['ID'] . '', 'Edit', 'class="label label-warning" title="Edit Halaman"')?>
                                            <?php
                                            }else{
                                            ?>
                                                <?=anchor('halaman/detail/'.$row['ID'].'','Detail','class="label label-info" title="Lihat detail halaman"')?>
                                                <?=anchor('halaman/edit/' . $row['ID'] . '', 'Edit', 'class="label label-warning" title="Edit Halaman"')?>
                                                <?=anchor('halaman/hapus/' . $row['ID'] . '', 'Hapus', 'class="label label-warning" title="Hapus Halaman"')?>
                                            <?php
                                            }
                                        ?>
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
        </div><!-- /.box -->                            
    </div>
</div>