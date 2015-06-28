    <div class="container margintop20">
    <div class="outer-judul">
        <h2 class="judul-dark">Ujian Online</h2>
        <div class="clearfix"></div>
    </div>
	<div class="clearfix"></div> 
<p>Hi, <b><?php echo $siswa['NAMA']; ?></b>|<a href="<?php echo site_url('login_siswa/logout') ?>">Logout</a></p>	
   <div class="row">
                                    <div class="col-sm-6 col-md-4">
                    <div class="outer-publikasi">
					<?= form_open('ujian/get_soal', array('id' => 'form-tambah', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
            
                       <table>
						<tr>
							<th colspan="2">Pilih Kategori Soal</th>
							
						</tr>
						<tr>
							<td width="30%"><label>Kelas</label></td>
							<td width="70%">
								<select name="id_kelas" class="form-control input-sm" style="max-width: 250px;">
                        <?php
                        foreach ($get_kelas as $vkat) {
                            echo "<option value='$vkat[ID]'>$vkat[ID]</option>";
                        }
                        ?>
                    </select>
							</td>
						</tr>
						<tr>
							<td><label>Mata Pelajaran</label></td>
							<td>
								<select name="id_matapelajaran" class="form-control input-sm" style="max-width: 250px;">
                        <?php
                        foreach ($get_matapelajaran as $vkat) {
                            echo "<option value='$vkat[id_mapel]'>$vkat[nama_mapel]</option>";
                        }
                        ?>
                    </select>
							</td>
						</tr>
						<tr>
							<td><label>Guru</label></td>
							<td>
								<select name="id_guru" class="form-control input-sm" style="max-width: 250px;">
                        <?php
                        foreach ($get_guru as $vkat) {
                            echo "<option value='$vkat[id_guru]'>$vkat[nama_lengkap]</option>";
                        }
                        ?>
                    </select>

							</td>
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
						    <div class="clearfix"></div>
							</div>