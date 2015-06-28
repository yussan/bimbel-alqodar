<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Guru</h3>
            </div><!-- /.box-header -->
            <?=
            form_open('guru/update', array('id' => 'form-edit', 'role' => 'form', 'enctype' => 'multipart/form-data'));
            if (!empty($list)) {
                    ?>
                    <div class="box-body">				        
                        <input type="hidden" name="id" value="<?= $list['ID'] ?>" />
                        
                        <div class="form-group">
                            <label>Nama </label>
                            <input class="form-control input-sm" name="nama" type="text" value="<?= $list['NAMA'] ?>">
                        </div>
                        <div class="form-group">
                            <label>NIP</label>
                            <input class="form-control input-sm" name="nip" type="text" value="<?= $list['NIP'] ?>">
                        </div>
						 <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control input-sm" name="alamat" type="text" value="<?= $list['ALAMAT'] ?>">
                        </div>
						 <div class="form-group">
                            <label>Email</label>
                            <input class="form-control input-sm" name="email" type="text" value="<?= $list['EMAIL'] ?>">
                        </div>
						 <div class="form-group">
                            <label>Telp</label>
                             <input class="form-control input-sm" name="telp" type="text" value="<?= $list['TELP'] ?>">
                        </div>
						 <div class="form-group">
                            <label>Kelamin</label>
                            <select name="kelamin" class="form-control input-sm" style="max-width: 250px;">
                        <option value="laki-laki">Laki-Laki</option>
						<option value="perempuan">Perempuan</option>
                    </select>
                        </div>
                                         
                    <div class="box-footer">
                        <button type="submit" class="btn btn-sm btn-primary btn-flat"><span class="ion-ios7-loop-strong"></span> Update</button>
                    </div>
                    <?php
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
                    required: "Kolom  Harus Diisi"
                }
            }
        });
    });
</script>