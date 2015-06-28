<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Jenis Publikasi</h3>
            </div>
            <?= form_open('profile/save', array('id' => 'form-tambah', 'role' => 'form')); ?>
            <div class="box-body">				        
                <div class="form-group">
                    <label>Nama Perusahaan *</label>
                    <input class="form-control input-sm" name="nama_perusahaan" type="text" placeholder="Nama Perusahaan">
                </div>
                <div class="form-group">
                    <label>Alamat Perusahaan</label>
                    <textarea class="form-control" rows="3" name="alamat_perusahaan"></textarea>
                </div>
                <div class="form-group">
                    <label>Kode Pos Perusahaan</label>
                    <input class="form-control input-sm" name="kdpos_perusahaan" type="text" placeholder="Kode Pos Perusahaan">
                </div>
                <div class="form-group">
                    <label>No Telepon Perusahaan</label>
                    <input class="form-control input-sm" name="telp_perusahaan" type="text" placeholder="Telepon Perusahaan">
                </div>
                <div class="form-group">
                    <label>Fax Perusahaan</label>
                    <input class="form-control input-sm" name="fax_perusahaan" type="text" placeholder="Fax Perusahaan">
                </div>
                <div class="form-group">
                    <label>Email Perusahaan</label>
                    <input class="form-control input-sm" name="email_perusahaan" type="text" placeholder="Email Perusahaan">
                </div>
                <div class="form-group">
                    <label>Web Perusahaan</label>
                    <input class="form-control input-sm" name="web_perusahaan" type="text" placeholder="Web Perusahaan">
                </div>
            </div>		                   
            <div class="box-footer">
                <button type="submit" class="btn btn-sm btn-primary btn-flat"><span class="ion-ios7-loop-strong"></span> Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>                      
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#form-tambah').validate({
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