<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Album Foto</h3>
            </div><!-- /.box-header -->
            <?=
            form_open('slider/update', array('id' => 'form-edit', 'role' => 'form', 'enctype' => 'multipart/form-data'));
            if (!empty($list)) {
                foreach ($list as $row) {
                    ?>
                    <div class="box-body">				        
                        <input type="hidden" name="id" value="<?= $row['id_slider'] ?>" />
                        <div class="form-group">
                            <label>Judul</label>
                            <input class="form-control input-sm" name="judul" type="text" value="<?= $row['judul'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input class="form-control input-sm" name="link" type="text" value="<?= $row['link'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control input-sm" name="ket"><?= $row['ket'] ?>></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
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