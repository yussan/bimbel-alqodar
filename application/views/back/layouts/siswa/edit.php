<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Siswa</h3>
            </div><!-- /.box-header -->
            <?=
            form_open('siswa/update', array('id' => 'form-edit', 'role' => 'form', 'enctype' => 'multipart/form-data'));
            if (!empty($row)) {
                    ?>
                    <div class="box-body">				        
                        <input type="hidden" name="id" value="<?= $row['ID'] ?>" />
                        <div class="form-group">
                            <label>Siswa</label>
                            <select name="id_kategori" class="form-control input-sm" style="max-width: 250px;">
                                <?php
                                foreach ($get_kategori as $vkat) {
                                    echo "<option value='$vkat[id_kategori]'>$vkat[kategori]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama </label>
                            <input class="form-control input-sm" name="nama" type="text" value="<?= $row['NAMA'] ?>">
                        </div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input class="form-control input-sm" name="nis" type="text" value="<?= $row['NIS'] ?>">
                        </div>
						 <div class="form-group">
                            <label>Kelas</label>
                             <input class="form-control input-sm" name="kelas" type="text" value="<?= $row['KELAS'] ?>">
                        </div>
						 <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control input-sm" name="alamat" type="text" value="<?= $row['ALAMAT'] ?>">
                        </div>
						
						 <div class="form-group">
                            <label>Email</label>
                            <input class="form-control input-sm" name="email" type="text" value="<?= $row['EMAIL'] ?>">
                        </div>
						<div class="form-group">
				
						
<form method="POST" action="<?php echo site_url('process/siswa/updatepassword')?>">
 
    <?php echo validation_errors()?>
    <label>Password Lama</label>
    <input class="form-control" name="txtrecentpass" type="password" required/>
    <label>Password Baru</label>
    <input class="form-control" name="txtnewpass1" type="password" required/>
    <label>Ulangi Password Baru</label>
    <input class="form-control" name="txtnewpass2" type="password" required/>
    <br/>
						 <div class="form-group">
                            <label>Telp</label>
                             <input class="form-control input-sm" name="telp" type="text" value="<?= $row['TELP'] ?>">
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