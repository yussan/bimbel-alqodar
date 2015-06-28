<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Data </h3>
            </div><!-- /.box-header -->
            <?=
            form_open('artikel/update', array('id' => 'form-edit', 'role' => 'form', 'enctype' => 'multipart/form-data'));
            if (!empty($list)) {
                foreach ($list as $row) {
                    ?>
                    <div class="box-body">				        
                        <input type="hidden" name="id" value="<?= $row['ID'] ?>" />
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control input-sm" style="max-width: 250px;">
                                <?php
                                foreach ($get_kategori as $vkat) {
                                    echo "<option value='$vkat[ID]'>$vkat[NAMA]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judul Artikel</label>
                            <input class="form-control input-sm" name="judul" type="text" value="<?= $row['JUDUL'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Isi</label>
                            <textarea class="form-control" rows="3" name="konten"><?= $row['ISI'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Thumbnails</label>
                            <img src="<?php echo base_url(); ?>res/foto/artikel/<?= $row['GAMBAR'] ?>" />
                        </div>
                        <div class="form-group">
                            <label>Ganti Thumbnails *) Kosongkan jika thumbnails tidak ingin diganti</label>
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
<script type="text/javascript" src="<?php echo base_url(); ?>themes/back/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        height: 250,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });
</script>
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