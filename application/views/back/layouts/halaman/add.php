<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Halaman Statis</h3>
            </div>
            <?= form_open('halaman/save', array('id' => 'form-tambah', 'role' => 'form')); ?>
            <div class="box-body">				        
                <div class="form-group">
                    <label>Judul</label>
                    <input class="form-control input-sm" name="judul" type="text" placeholder="Judul">
                </div>
                <div class="form-group">
                    <label>Isi</label>
                    <textarea class="form-control" rows="3" name="konten"></textarea>
                </div
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