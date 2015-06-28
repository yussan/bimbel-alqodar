<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Album</h3>
            </div><!-- /.box-header -->
            <?=
            form_open('kategori_album/update', array('id' => 'form-edit', 'role' => 'form'));
            if (!empty($list)) {
                foreach ($list as $row) {
                    ?>
                    <div class="box-body">				        
                        <input type="hidden" name="id" value="<?= $row['ID'] ?>" />
                        <div class="form-group">
                            <label>Nama Album</label>
                            <input class="form-control input-sm" name="judul" type="text" value="<?= $row['JUDUL'] ?>" placeholder="Nama Album">
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
                    required: "Kolom Kategori Album Harus Diisi"
                }
            }
        });
    });
</script>