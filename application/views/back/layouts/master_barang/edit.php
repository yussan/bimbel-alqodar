		<div class="row">
		    <div class="col-xs-12">
		        <div class="box box-primary">
		            <div class="box-header">
		                <h3 class="box-title">Edit Data Darang</h3>
		            </div><!-- /.box-header -->
		            <?=form_open('master_barang/update', array('role' => 'form')); 
						if(!empty($list)){
							foreach ($list as $row) {
					?>
		            <div class="box-body">				        
						<input type="hidden" name="id_barang" value="<?=$row['id_barang']?>" />
	                    <!-- text input -->
	                    <div class="form-group">
	                    	<label>ID Produksi</label>
	                       	<input class="form-control input-sm" name="id_produksi" type="text" value="<?=$row['id_produksi']?>" placeholder="ID produksi">
	                    </div>
	                    <div class="form-group">
	                        <label>Nama Barang</label>
	                       	<input class="form-control input-sm" name="nama" type="text" value="<?=$row['nama']?>" placeholder="Nama baraang">
	                    </div>
	                    <div class="form-group">
	                        <label>Keteranagan</label>
	                       	<textarea class="form-control" rows="3" name="ket" placeholder="Keterangan barang"><?=$row['ket']?></textarea>
	                    </div>
		            </div>		                   
                    <div class="box-footer">
                         <button type="submit" class="btn btn-sm btn-primary btn-flat"><span class="ion-ios7-loop-strong"></span> Update</button>
                    </div>
	                <?php 
							}
						}else{
					?>
						Tidak ada data
					<?php 
						}
					echo form_close();
					?>
		        </div><!-- /.box -->                            
		    </div>
		</div>