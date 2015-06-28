            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><i class="ion-locked"></i> Edit Role Grup</h3>
                        </div><!-- /.box-header -->
                        <?php echo form_open('auth/update_role', array('role' => 'form'));?>
                        <div class="box-body">
                          <!-- notif -->
                          <div class="alert alert-info alert-dismissable col-centered col-xs-5" <?php if($this->session->flashdata('message')){echo 'style="display:block; margin-bottom:7px;"';}else{echo 'style="display:none;"';}?> >
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <?php echo $this->session->flashdata('message');?>  
                          </div>
                          <?php
                            foreach ($list as $row) {
                          ?>
                          <input type="hidden" value="<?php echo $row['id']?>" name="id">
                          <?php echo validation_errors(); ?>
                          <!-- text input -->
                          <div class="form-group">
                              <label>Nama Role Grup</label>
                              <input value="<?php echo $row['name']; ?>" type="text" name="role_name" id="role_name" class="form-control input-sm" placeholder="Nama Role Grup"/>
                          </div>
                          <div class="form-group">
                              <label>URL Role Grup</label>
                              <input type="text" value="<?php echo $row['url']; ?>" name="role_url" id="role_url" class="form-control input-sm" placeholder="URL Role Grup"/>
                          </div>
                          <div class="form-group">
                              <label>Deskripsi Role Grup</label>
                              <input type="text" value="<?php echo $row['desc']; ?>" name="role_desc" id="role_desc" class="form-control input-sm" placeholder="Deskripsi Role Grup"/> 
                          </div>
                          <?php
                            }
                          ?>
                        </div>                               
                        <div class="box-footer">
                              <button type="submit" class="btn btn-sm btn-primary btn-flat"><span class="ion-ios7-loop-strong"></span> Update</button>
                        </div>
                        <?php echo form_close();?>
                    </div><!-- /.box -->                            
                </div>
            </div>