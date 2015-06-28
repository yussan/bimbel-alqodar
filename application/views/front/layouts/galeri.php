<script type="text/javascript">
    var site = $('#site');
    $(document).ready(function() {
        window.prettyPrint && prettyPrint()
        $('#lightGallery').lightGallery({caption: true, desc: true, mobileSrc: true, hideControlOnEnd: true, easing: 'cubic-bezier(0.25, 0, 0.25, 1)'});
        var clk = true;
        $('.btn-navbar').on('click', function() {
            if (site.hasClass('translate')) {
                clk = false;
                site.removeClass('translate');
                setTimeout(function() {
                    $("#mast-head").css('display', 'none');
                    clk = true;
                }, 700);
            } else if (clk) {
                $("#mast-head").css('display', 'block');
                site.addClass('translate');
            }
        });
        $('#site').on('touchmove', function(e) {
            if ($(this).hasClass('translate')) {
                e.preventDefault();
            }
        });
        $('#site > .nav-over').on('click touchstart', function(e) {
            e.preventDefault();
            e.stopPropagation();
            clk = false;
            site.removeClass('translate');
            setTimeout(function() {
                $("#mast-head").css('display', 'none');
                clk = true;
            }, 700);
        })
        $(window).on("resize orientationchange", function() {
            if ($(window).width() > 767) {
                $("#mast-head").css('display', 'block');
                site.removeClass('translate');
            } else if (!site.hasClass('translate')) {
                $("#mast-head").css('display', 'none');
            }
        });
    });
</script>
<!-- konten -->
<div class="container margintop20">
    <div class="outer-judul">
        <h2 class="judul-dark">Galeri Album - <span style="color: #ed2f36;"><strong><?php echo $nama_album; ?></strong></span></h2>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div id="container" class="large-8 columns transitions-enabled large-centered clearfix" >
        <?php if (!empty($list)) { ?>
            <ul id="lightGallery" class="gallery list-unstyled">
                <?php foreach ($list as $value): ?>
                    <li data-title="<?php echo $value['judul_album']; ?>" data-desc="<?php echo $value['judul_galeri']; ?>" data-src="<?php echo base_url(); ?>res/foto/galeri/<?php echo $value['foto']; ?>">
                        <div class="box col2">
                            <div class="tinggi-fix">
                                <a href="<?php echo base_url(); ?>res/foto/galeri/<?php echo $value['foto']; ?>">
                                    <img src="<?php echo base_url(); ?>res/foto/galeri/<?php echo $value['foto']; ?>" title="Album <?php echo $value['judul_album']; ?> : <?php echo $value['judul_galeri']; ?>" alt="Gambar Galeri <?php echo $value['judul_galeri']; ?>">
                                </a>
                            </div>
                            <div class="nm-produk text-center">
                                <?php echo $value['judul_galeri']; ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
        } else {
            echo "<p>Galeri Foto Belum Ada</p>";
        }
        ?>
    </div>
    <div class="clearfix"></div>