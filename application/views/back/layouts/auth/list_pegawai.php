<?php 
  if(count($list)>0){
    foreach ($list as $row){
?>

<div class="form-group">
      <label>Nama Lengkap</label>
      <input type="text" readonly name="first_name" value="<?php echo $row['nm_pegawai'];?>" id="first_name" class="form-control input-sm" placeholder="Nama Lengkap"  />                          
</div>                          
<input type="hidden" name="last_name" value="-" id="last_name" class="form-control input-sm" placeholder="Nama Belakang"  />                          
<input type="hidden" name="company" value="-" id="company" class="form-control input-sm" placeholder="Nama Perusahaan"  />                          
<div class="form-group">
      <label><label for="email">Email</label></label>
      <input type="text" readonly  name="email" value="<?php echo $row['email'];?>" id="email" class="form-control input-sm" placeholder="Belum ada"  />                          
</div>
<div class="form-group">
      <label>Namapengguna</label>
      <input type="text" readonly name="username" value="<?php echo str_replace('-', '', $row['nip']);?>" id="username" class="form-control input-sm" placeholder="Namapengguna"  />                          
</div>
<input type="hidden" name="phone" value="-" id="phone" class="form-control input-sm" placeholder="Telepon"  />                          
<div class="form-group">
      <label><label for="password">Kata Sandi</label></label>
      <input type="text" readonly name="password" value="<?php echo date('dmY',strtotime($row['tgl_lahir']));?>" id="password" class="form-control input-sm" placeholder="Kata Sandi"  />                          
</div>
<div class="box-footer">
      <button type="submit" class="btn btn-sm btn-primary btn-flat" style="margin-left:-10px;"><span class="ion-ios7-loop-strong"></span> Tambahkan</button>
</div>
<?php
    }
  }else{
?>
<div class="form-group">
      <label>Nama Lengkap</label>
      <input type="text" name="first_name" value="" id="first_name" class="form-control input-sm" placeholder="Nama Lengkap"  />                          
</div>                          
<input type="hidden" name="last_name" value="-" id="last_name" class="form-control input-sm" placeholder="Nama Belakang"  />                          
<input type="hidden" name="company" value="-" id="company" class="form-control input-sm" placeholder="Nama Perusahaan"  />                          
<div class="form-group">
      <label><label for="email">Email</label></label>
      <input type="text" name="email" value="" id="email" class="form-control input-sm" placeholder="Email"  />                          
</div>
<div class="form-group">
      <label>Namapengguna</label>
      <input type="text" name="username" value="" id="username" class="form-control input-sm" placeholder="Namapengguna"  />                          
</div>
<input type="hidden" name="phone" value="-" id="phone" class="form-control input-sm" placeholder="Telepon"  />                          
<div class="form-group">
      <label><label for="password">Kata Sandi</label></label>
      <input type="text" name="password" value="" id="password" class="form-control input-sm" placeholder="Kata Sandi"  />                          
</div>
</div>
<?php
  }
?>