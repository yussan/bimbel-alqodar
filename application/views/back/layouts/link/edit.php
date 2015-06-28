<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Link</h3>
            </div><!-- /.box-header -->
            <?=
            form_open('link/update', array('id' => 'form-edit', 'role' => 'form', 'enctype' => 'multipart/form-data'));
            if (!empty($list)) {
                foreach ($list as $row) {
                    ?>
                    <div class="box-body">				        
                        <input type="hidden" name="id" value="<?= $row['ID'] ?>" />
                        <div class="form-group">
                            <label>Nama Link</label>
                            <input class="form-control input-sm" name="nama_link" type="text" value="<?= $row['NAMA'] ?>">
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input class="form-control input-sm" name="url_link" type="text" value="<?= $row['URL'] ?>">
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
                nama_link: {
                    required: true
                },
                url_link: {
                    required: true,
                    url: true
                }
            },
            messages: {
                nama_link: {
                    required: "Kolom Nama Link Harus Diisi"
                },
                url_link: {
                    required: "Kolom URL Link Harus Diisi",
                    url: "URL tidak valid"
                }
            }
        });
    });
</script>