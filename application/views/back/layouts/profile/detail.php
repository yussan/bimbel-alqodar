<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Detail Profil Perusahaan</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover table-condensed">
                    <tr>
                        <td width="180px">Nama Perusahaan</td>
                        <td><?php echo $list->NAMA; ?></td>
                    </tr>
                    <tr>
                        <td width="180px">Alamat Perusahaan</td>
                        <td><?php echo $list->ALAMAT; ?></td>
                    </tr>
                    <tr>
                        <td width="180px">Kode Pos Perusahaan</td>
                        <td><?php echo $list->KODEPOS; ?></td>
                    </tr>
                    <tr>
                        <td width="180px">No Telp Perusahaan</td>
                        <td><?php echo $list->TELP; ?></td>
                    </tr>
                    <tr>
                        <td width="180px">Fax Perusahaan</td>
                        <td><?php echo $list->FAX; ?></td>
                    </tr>
                    <tr>
                        <td width="180px">Email Perusahaan</td>
                        <td><?php echo $list->EMAIL; ?></td>
                    </tr>
                    <tr>
                        <td width="180px">Website Perusahaan</td>
                        <td><?php echo $list->WEB; ?></td>
                    </tr>
                </table>									
            </div>
        </div>                         
    </div>
</div>