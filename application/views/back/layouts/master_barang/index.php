		<div class="row">
		    <div class="col-xs-12">
		        <div class="box">
		            <div class="box-header">
		                <span class="box-title">Barang</span>
		                <span class="box-title pull-right"><a href="<?=site_url('master_barang/add')?>" class="btn btn-sm btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Tambah</button></a>
		            </div><!-- /.box-header -->
		            <div class="box-body table-responsive">
		                <table id="tbarang" class="table table-bordered table-hover table-condensed">
							<thead>
							<tr>
								<th width="3%">No.</th>
								<th width="15%">ID Produksi</th>
								<th>Nama Barang</th>
							</tr>
							</thead>
							<?php 
								if(!empty($list)){
									$i = 1; 
									foreach ($list as $row) {
							?>
							<tr>
								<td width="3%" align="center"><?=$i++ ?></td>
								<td width="15%"><?=$row['id_produksi']?></td>
								<td>
									<?=$row['nama']?>
									<span class="pull-right">
										<?=anchor('master_barang/barang_detail/'.$row['id_barang'].'/'.$row['id_produksi'].'','Detail','class="label label-info" title="Lihat detail data barang"')?>
										<?=anchor('master_barang/edit/'.$row['id_barang'].'/'.$row['id_produksi'].'','Edit','class="label label-warning" title="Edit data barang"')?>
										<?=anchor('master_barang/delete/'.$row['id_barang'].'','Hapus','class="label label-danger" title="Hapus data barang" onClick="return confirm(\'Yakin ingin menghapus '.$row['nama'].' dari data master barang?\');"')?>
									</span>
								</td>
							</tr>
							<?php 
									}
								}else{
							?>
							<tr>
								<td colspan="3" align="center">Belum ada data barang</td>
							</tr>
							<?php
								}
							?>							
						</table>									
		            </div><!-- /.box-body -->
		        </div><!-- /.box -->                            
		    </div>
		</div>