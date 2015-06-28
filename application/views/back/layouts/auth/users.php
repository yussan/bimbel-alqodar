	<div class="row">
	    <div class="col-xs-12">
	        <div class="box">
	            <div class="box-header">
	                <h3 class="box-title"><i class="ion-person"></i> <?php echo lang('index_heading');?></h3>
	                <span class="box-title pull-right">
	                	<a href="<?php echo site_url('auth/create_user')?>" title="Tambahkan pengguna baru" class="btn btn-xs btn-primary btn-flat"><i class="ion-plus-round"></i>&nbsp;&nbsp;Pengguna Baru</button></a>
	            	</span>
	            </div><!-- /.box-header -->
	            <div class="box-body table-responsive">
	            	<!-- notif -->
	                <div class="alert alert-info alert-dismissable col-centered col-xs-5" <?php if(is_string($message)){echo 'style="display:block; margin-bottom:7px;"';}else{echo 'style="display:none;"';}?> >
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <?php echo $message;?>  
	                </div>

	                <table class="table table-bordered table-hover table-condensed">
	                	<thead>
	                		<tr>
								<th>No</th>
								<th>Nama Lengkap</th>
								<th><?php echo lang('index_email_th');?></th>
								<th><?php echo lang('index_groups_th');?></th>
								<th><?php echo lang('index_status_th');?></th>
							</tr>
						</thead>
						<?php
							if(!empty($users)){
								$i = 1; 
								foreach ($users as $user):
						?>	
							<tr>
					            <td width="3%"><?php echo $i++?></td>
					            <td width="25%"><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?> <?php //echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
					            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
								<td>
									<?php foreach ($user->groups as $group):?>
										<span class="label label-info"><?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')?></span>
					                <?php endforeach;?>
								</td>
								<td width="15%">
									<?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'),'class="label label-success" title="Non aktifkan pengguna ini"') : anchor("auth/activate/". $user->id, lang('index_inactive_link'),'class="label label-default" title="Aktifkan pengguna ini"');?>
									<span class="pull-right editorLink"><?php echo anchor("auth/edit_user/".$user->id, 'Edit','class="label label-warning" title="Edit data pengguna '.htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8').'"') ;?></span>
								</td>
							</tr>
						<?php 
								endforeach;
							}else{
						?>
							<tr><td colspan="7" align="center">Tidak ada data</td></tr>
						<?php 
							}
						?>
					</table>
				</div><!-- /.box-body -->
	        </div><!-- /.box -->                            
	    </div>
	</div>