<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Album</h3>
            </div>
            <?= form_open('video/save', array('id'=>'form-tambah','role' => 'form')); ?>
            <div class="box-body">				        
                <div class="form-group">
                    <label>Judul Video</label>
                    <input class="form-control input-sm" name="judul_media" type="text" placeholder="Judul Video">
                </div>
                <div class="form-group">
                    <label>URL Video</label>
                    <input class="form-control input-sm" name="url_media" type="text" placeholder="URL Video">
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
                judul_media: {
                    required: true
                },
                url_media: {
                    required: true
                }
            },
            messages: {
                judul_media: {
                    required: "Kolom Judul Media Harus Diisi"
                },
                url_media: {
                    required: "Kolom URL Media Harus Diisi"
                }
            }
        });
    });
</script>