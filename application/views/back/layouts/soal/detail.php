<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Soal</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover table-condensed">
                    <tr>
                        <td>Kelas</td>
                        <td><?php echo $list['id_kelas']; ?></td>
                    </tr>
                    <tr>
                        <td>Mata Pelajaran</td>
                        <td><?php echo $list['matapelajaran']; ?></td>
                    </tr>
                    <tr>
                        <td>Guru</td>
                        <td><?php echo $list['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>Soal</td>
                        <td><?php echo $list['soal']; ?></td>
                    </tr>
                   
                </table>									
            </div>
        </div>                         
    </div>
</div>