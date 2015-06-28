<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Detail Artikel</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover table-condensed">
                    <tr>
                        <td>Judul</td>
                        <td><?php echo $list->JUDUL; ?></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td><?php echo $list->KATEGORI; ?></td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td><?php echo $list->PENULIS; ?></td>
                    </tr>
                    <tr>
                        <td>Slug</td>
                        <td><?php echo $list->SLUG; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td><?php echo $list->TANGGAL; ?></td>
                    </tr>
                    <tr>
                        <td>Isi</td>
                        <td><?php echo $list->ISI; ?></td>
                    </tr>
                </table>									
            </div>
        </div>                         
    </div>
</div>