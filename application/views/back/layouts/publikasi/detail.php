<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Detail Publikasi</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover table-condensed">
                    <input type="hidden" name="id" value="<?php echo tgl($list->ID); ?>" />
                    <tr>
                        <td width="150px">Judul</td>
                        <td><?php echo $list->JUDUL; ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Jenis Publikasi</td>
                        <td><?php echo $list->JENIS; ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Tanggal Upload</td>
                        <td><?php echo tgl($list->TANGGAL); ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Waktu Upload</td>
                        <td><?php echo waktu($list->TANGGAL); ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Diupload Oleh</td>
                        <td><?php echo $list->PENULIS; ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Slug</td>
                        <td><?php echo $list->SLUG; ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Abstraksi</td>
                        <td><?php echo $list->ABSTRAK; ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Kata Kunci</td>
                        <td><?php echo $list->KUNCI; ?></td>
                    <tr>
                    <tr>
                        <td width="150px">Cover</td>
                        <td><img src="<?php echo base_url(); ?>res/file/publikasi/cover/<?php echo $list->COVER; ?>" /></td>
                    <tr>
                        <td width="150px">File</td>
                        <td><a target="_blank" href="<?php echo site_url('publikasi/download/' . $list->FILE); ?>"><?php echo $list->FILE; ?></a></td>
                    </tr>
                </table>									
            </div>
        </div>                         
    </div>
</div>