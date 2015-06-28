            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><i class="ion-locked"></i> Tambahkan Role Grup Baru</h3>
                        </div><!-- /.box-header -->
                        <?php echo form_open('auth/create_role', array('role' => 'form'));?>
                        <div class="box-body">
                          <!-- notif -->
                          <div class="alert alert-info alert-dismissable col-centered col-xs-5" <?php if($this->session->flashdata('message')){echo 'style="display:block; margin-bottom:7px;"';}else{echo 'style="display:none;"';}?> >
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <?php echo $this->session->flashdata('message');?>  
                          </div>

                          <!-- text input -->
                          <div class="form-group">
                              <label>Nama Role Grup</label>
                              <input type="text" name="role_name" id="role_name" class="form-control input-sm" placeholder="Nama Role Grup"/>
                              <?php echo '<span style="color:red">'.form_error('role_name').'</span>';?>
                          </div>
                          <div class="form-group">
                            <label>Kategori</label>
                            <select name="kat" class="form-control input-sm" <?php if(count($list_cat)<1){echo "disabled";}?>>
                            <?php 
                            if(count($list_cat)>0){
                              foreach ($list_cat as $row){ ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo ucfirst($row['category']); ?></option>
                            <?php 
                              }
                            }else{
                            ?>
                              <option>Tidak ada data</option>
                            <?php 
                            }
                            ?>
                            </select>
                          </div>
                          <div class="form-group">
                              <label>URL Role Grup</label>
                              <input type="text" name="role_url" id="role_url" class="form-control input-sm" placeholder="URL Role Grup"/>
                              <?php echo '<span style="color:red">'.form_error('role_url').'</span>';?>
                          </div>
                          <div class="form-group">
                              <label>Deskripsi Role Grup</label>
                              <input type="text" name="role_desc" id="role_desc" class="form-control input-sm" placeholder="Deskripsi Role Grup"/> 
                              <?php echo '<span style="color:red">'.form_error('role_desc').'</span>';?>
                          </div>
                        </div>                               
                        <div class="box-footer">
                              <button type="submit" class="btn btn-sm btn-primary btn-flat"><span class="ion-ios7-loop-strong"></span> Tambahkan</button>
                        </div>
                        <?php echo form_close();?>
                    </div><!-- /.box -->                            
                </div>
            </div>