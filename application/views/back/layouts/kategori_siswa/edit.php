<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Kategori</h3>
            </div><!-- /.box-header -->
            <?=
            form_open('kategori_siswa/update', array('id' => 'form-edit', 'role' => 'form'));
            if (!empty($list)) {
                foreach ($list as $row) {
                    ?>
                    <div class="box-body">				        
                        <input type="hidden" name="id_kategori" value="<?= $row['ID'] ?>" />
                        <div class="form-group">
                            <label>Kategori siswa</label>
                            <input class="form-control input-sm" name="kategori" type="text" value="<?= $row['KATEGORI'] ?>" placeholder="Nama Kategori siswa">
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