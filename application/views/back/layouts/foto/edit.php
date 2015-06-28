<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Album Foto</h3>
            </div><!-- /.box-header -->
            <?=
            form_open('foto/update', array('id' => 'form-edit', 'role' => 'form', 'enctype' => 'multipart/form-data'));
            if (!empty($list)) {
                foreach ($list as $row) {
                    ?>
                    <div class="box-body">				        
                        <input type="hidden" name="id" value="<?= $row['ID'] ?>" />
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
                            <input class="form-control input-sm" name="judul" type="text" value="<?= $row['NAMA_FOTO'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="userfile" />
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