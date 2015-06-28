		<div class="row">
		    <div class="col-xs-12">
		        <div class="box box-primary">
		            <div class="box-header">
		                <h3 class="box-title">Tambah Data Barang</h3>
		            </div><!-- /.box-header -->
		            <?=form_open('master_barang/save', array('role' => 'form'));?>
		            <div class="box-body">				        
	                    <!-- text input -->
	                    <div class="form-group">
	                    	<label>ID Produksi</label>
	                       	<input class="form-control input-sm" name="id_produksi" type="text" placeholder="ID produksi">
	                    </div>
	                    <div class="form-group">
	                        <label>Nama Barang</label>
	                       	<input class="form-control input-sm" name="nama" type="text" placeholder="Nama baraang">
	                    </div>
	                    <div class="form-group">
	                        <label>Keteranagan</label>
	                       	<textarea class="form-control" rows="3" name="ket" placeholder="Keterangan barang"></textarea>
	                    </div>
		            </div>		                   
                    <div class="box-footer">
                         <button type="submit" class="btn btn-sm btn-primary btn-flat"><span class="ion-ios7-loop-strong"></span> Simpan</button>
                    </div>
					<?=form_close();?>
		        </div><!-- /.box -->                            
		    </div>
		</div>