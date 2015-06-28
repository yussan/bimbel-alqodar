<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit profil</h3>
            </div><!-- /.box-header -->
            <?=
            form_open('profile/update', array('id' => 'form-edit', 'role' => 'form'));
            if (!empty($list)) {
                foreach ($list as $row) {
                    ?>
                    <div class="box-body">				        
                        <input type="hidden" name="id" value="<?= $row['ID'] ?>" />
                        <div class="form-group">
                            <label>Nama Perusahaan *</label>
                            <input class="form-control input-sm" name="nama_perusahaan" type="text" value="<?= $row['NAMA'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat Perusahaan</label>
                            <textarea class="form-control" rows="3" name="alamat_perusahaan"><?= $row['ALAMAT'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kode Pos Perusahaan</label>
                            <input class="form-control input-sm" name="kdpos_perusahaan" type="text" value="<?= $row['KODEPOS'] ?>">
                        </div>
                        <div class="form-group">
                            <label>No Telepon Perusahaan</label>
                            <input class="form-control input-sm" name="telp_perusahaan" type="text" value="<?= $row['TELP'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Fax Perusahaan</label>
                            <input class="form-control input-sm" name="fax_perusahaan" type="text" value="<?= $row['FAX'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Email Perusahaan</label>
                            <input class="form-control input-sm" name="email_perusahaan" type="text" value="<?= $row['EMAIL'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Web Perusahaan</label>
                            <input class="form-control input-sm" name="web_perusahaan" type="text" value="<?= $row['WEB'] ?>">
                        </div>
                    </div>		                   
                    <div class="box-footer">
                        <button type="submit" class="btn btn-sm btn-primary btn-flat"><span class="ion-ios7-loop-strong"></span> Update</button>
                    </div>
                    <?php
                }
            } else {
                ?>
                Tidak ada data
                <?php
            }
            echo form_close();
            ?>
        </div><!-- /.box -->                            
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#form-edit').validate({
            rules: {
                nama_perusahaan: {
                    required: true
                }
            },
            messages: {
                nama_perusahaan: {
                    required: "Kolom Nama Perusahaan Harus Diisi"
                }
            }
        });
    });
</script>