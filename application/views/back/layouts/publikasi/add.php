<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Publikasi</h3>
            </div>
            <?= form_open('publikasi/save', array('id'=> 'form-tambah','role' => 'form', 'enctype' => 'multipart/form-data')); ?>
            <div class="box-body">	
                <div class="form-group">
                    <label>Jenis Publikasi</label>
                    <select name="id_kat_publikasi" class="form-control input-sm" style="max-width: 250px;">
                        <?php
                        foreach ($get_kat as $vkat) {
                            echo "<option value='$vkat[ID]'>$vkat[NAMA]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Judul Publikasi</label>
                    <input class="form-control input-sm" name="judul" type="text" placeholder="Judul Publikasi">
                </div>
                <div class="form-group">
                    <label>Abstraksi (Maksimal 200 Kata)</label>
                    <textarea class="form-control" rows="3" name="abstraksi"></textarea>
                </div>
                <div class="form-group">
                    <label>Kata Kunci</label>
                    <input class="form-control input-sm" name="kata_kunci" type="text" placeholder="Kata Kunci">
                </div>
                <div class="form-group">
                    <label>File</label>
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
        $('#form-tambah').validate({
            rules: {
                id_kat_publikasi: {
                    required: true
                },
                judul: {
                    required: true
                },
                kata_kunci: {
                    required: true
                },
                userfile: {
                    required: true
                }
            },
            messages: {
                id_kat_publikasi: {
                    required: "Jenis Publikasi Belum Dipilih"
                },
                judul: {
                    required: "Kolom Judul Publikasi Harus Diisi"
                },
                kata_kunci: {
                    required: "Kolom Kata Kunci Harus Diisi"
                },
                userfile: {
                    required: "Belum Ada File Publikasi"
                }
            }
        });
    });
</script>