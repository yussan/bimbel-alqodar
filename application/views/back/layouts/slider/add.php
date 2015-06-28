<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Album Foto</h3>
            </div>
            <?= form_open('slider/save', array('id' => 'form-tambah', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
            <div class="box-body">				        
                <div class="form-group">
                    <label>Judul</label>
                    <input class="form-control input-sm" name="judul" type="text" placeholder="Judul Slider">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input class="form-control input-sm" name="link" type="text" placeholder="Link Slider">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control input-sm" name="ket"></textarea>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="userfile[]" multiple="" />
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
                    required: "Kolom Judul Harus Diisi"
                }
            }
        });
    });
</script>