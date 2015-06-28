<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Album Foto</h3>
            </div>
            <?= form_open('foto/save', array('id' => 'form-tambah', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
            <div class="box-body">				        
                <div class="form-group">
                    <label>Album</label>
                    <select name="id_album" class="form-control input-sm" style="max-width: 250px;">
                        <?php
                        foreach ($get_album as $vkat) {
                            echo "<option value='$vkat[ID]'>$vkat[NAMA]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Judul Foto</label>
                    <input class="form-control input-sm" name="judul" type="text" placeholder="Judul Foto">
                </div>
                <div class="form-group">
                    <label>Foto</label>
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
                id_album: {
                    required: true
                },
                judul: {
                    required: true
                }
            },
            messages: {
                id_album: {
                    required: "Kategori Album Belum Dipilih"
                },
                judul: {
                    required: "Kolom Judul Foto Harus Diisi"
                }
            }
        });
    });
</script>