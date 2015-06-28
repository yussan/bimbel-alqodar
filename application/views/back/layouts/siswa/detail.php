<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Siswa</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover table-condensed">
                    <tr>
                        <td>No</td>
                        <td><?php echo $list['ID'] ; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><?php echo $list['NAMA']; ?></td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td><?php echo $list['NIS']; ?></td>
                   </tr>
					<tr>
                        <td>Kelas</td>
                        <td><?php echo $list['KELAS']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $list['ALAMAT']; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Email</td>
                        <td><?php echo $list['EMAIL']; ?></td>
                    </tr
                        
					<tr>
                        <td>Telp</td>
                        <td><?php echo $list['TELP']; ?></td>
                    </tr>
					<tr>
                        <td>Kelamin</td>
                        <td><?php echo $list['KELAMIN']; ?></td>
                    </tr>
                </table>									
            </div>
        </div>                         
    </div>
</div>