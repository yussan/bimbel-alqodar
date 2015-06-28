<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Link</h3>
            </div>
            <?= form_open('link/save', array('id' => 'form-tambah', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
            <div class="box-body">				        
                <div class="form-group">
                    <label>Nama Link</label>
                    <input class="form-control input-sm" name="nama_link" type="text" placeholder="nama Link">
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input class="form-control input-sm" name="url_link" type="text" placeholder="URL Link">
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="userfile" />
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
                nama_link: {
                    required: true
                },
                url_link: {
                    required: true,
                    url: true
                },
                userfile: {
                    required: true
                }
            },
            messages: {
                nama_link: {
                    required: "Kolom Nama Link Harus Diisi"
                },
                url_link: {
                    required: "Kolom URL Link Harus Diisi",
                    url: "URL tidak valid"
                },
                userfile: {
                    required: "Belum Ada Gambar"
                }
            }
        });
    });
</script>