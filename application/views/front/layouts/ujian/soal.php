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
					<?= form_open('ujian/input_skor', array('id' => 'form-tambah', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
	
            <table>
						<tr>
							<th>Soal</th>
							
						</tr>	
			<?php 
			$i=1;
			foreach($get_soal as $data){ ?>
					<input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">
					<input type="hidden" name="id_matapelajaran" value="<?php echo $id_matapelajaran; ?>">
					<input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
					<input type="hidden" name="id_soal" value="<?php echo $data['id_soal']; ?>">
					
						<tr>
							<td><b><?= $i++ ?>. <?php echo $data['soal']; ?></b>
							<?php $get_jawaban=$this->m_ujian->get_jawaban($data['id_soal']); 
								  foreach ($get_jawaban AS $data2){	
							?>
							<input type="hidden" name="id_jawaban" value="<?php echo $data2['id_jawaban']; ?>">
							<ul>
								<ol><input type="radio" name="jawaban<?php echo $data['id_soal']; ?>" value="<?php echo $data2['skor']; ?>"><?php echo $data2['jawaban']; ?></ol>
							</ul>
							<?php } ?>
							</td>
							
						</tr>
			<?php } ?>			
							
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