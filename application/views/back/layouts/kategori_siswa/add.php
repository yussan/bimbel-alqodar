<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Kategori siswa</h3>
            </div>
            <?= form_open('kategori_siswa/save', array('role' => 'form', 'id' => 'form-tambah')); ?>
            <div class="box-body">				        
                <div class="form-group">
                    <label>Kategori siswa</label>
                    <input id="kategori" class="form-control input-sm" name="kategori" type="text" placeholder="Nama Kategori siswa">
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
                kategori: {
                    required: true
                }
            },
            messages: {
                kategori: {
                    required: "Kolom Nama Kategori Harus Diisi"
                }
            }
        });
    });
</script>