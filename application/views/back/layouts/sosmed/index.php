<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <span class="box-title">Link</span>
                <!--<span class="box-title pull-right"><a href="<?= site_url('sosmed/add') ?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a></span>-->
            </div>
            <div class="box-body table-responsive">
                <?php echo $notif; ?>
                <table id="tartikel" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama Link</th>
                            <th>URL</th>
                            <th width="90px">Aksi</Nama Linkth>
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
                                <td> <?= $row['URL'] ?></td>
                                <td>
                                    <span class="pull-right">
                                        <?= anchor('sosmed/edit/' . $row['ID'] . '', 'Edit', 'class="label label-warning" title="Edit Link"') ?>
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
            </div>
        </div><!-- /.box -->                            
    </div>
</div>