    <div class="container margintop20">
    <div class="outer-judul">
        <h2 class="judul-dark">Daftar Guru</h2>
        <div class="clearfix"></div>
    </div>
	<div class="clearfix"></div>   
<div class="row">
        <div class="col-md-9">
            <div class="outer-blog">
                <ul>
                    <?php foreach ($list_guru as $value): ?>
                        <li><?php echo $value['NAMA']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
			</div>
			</div>