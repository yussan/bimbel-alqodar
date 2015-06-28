<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Album</h3>
            </div>
            <?= form_open('kategori_album/save', array('id' => 'form-tambah', 'role' => 'form')); ?>
            <div class="box-body">				        
                <div class="form-group">
                    <label>Nama Album</label>
                    <input class="form-control input-sm" name="judul" type="text" placeholder="Nama Album">
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
                judul: {
                    required: true
                }
            },
            messages: {
                judul: {
                    required: "Kolom Kategori Album Harus Diisi"
                }
            }
        });
    });
</script>