    <div class="container margintop20">
    <div class="outer-judul">
        <h2 class="judul-dark">LOGIN SISWA</h2>
        <div class="clearfix"></div>
    </div>
	<div class="clearfix"></div>   
   <div class="row">
                                    <div class="col-sm-6 col-md-4">
                    <div class="outer-publikasi">
					<?= form_open('login_siswa/cek_login', array('id' => 'form-tambah', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
	
            <table>
						<tr>
							<th colspan="2">lOGIN SISWA</th>
						</tr>
						<tr>
							<td>NIS</td>
							<td><input type="text" name="nis" class="form-control"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" class="form-control"></td>
						</tr>	
						<tr>
							<td colspan="2">
								 <button type="submit" class="btn btn-sm btn-primary btn-flat"><span class="ion-ios7-loop-strong"></span> Submit</button>
            
							</td>
						</tr>
					   </table>
					     <?= form_close(); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                        </div>