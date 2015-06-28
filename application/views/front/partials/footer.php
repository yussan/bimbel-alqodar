<div class="clearfix margintop30"></div>
<div class="outer100footer">
    <div class="container">

        <div class="row">
            <div class="col-sm-5">
                <div class="outer-col-footer col-footer">
                    <h4>Lokasi</h4>
                      <table border="0">
                        <tr>
                          <td>
                            
                      
                          </td>
                          <td>
                           <div id="googleMap" style="width:250px;height:200px;"></div>
                          </td>
                        </tr>
                      </table>
                    
                    <!--
                    <?php foreach ($footer_link as $value) :; ?>
                        <a href="<?php echo $value['url_link']; ?>" target="_blank">
                            <img src="<?php echo base_url(); ?>res/foto/link/<?php echo $value['gambar_link']; ?>">
                        </a>
                    <?php endforeach; ?>
                    -->
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-sm-3">
              <div class="outer-col-footer col-footer">
                <h4>Tentang Al-Qodar</h4>
                <?php echo list_halaman(); ?>
              </div>
            </div>
            <div class="col-sm-4">
                <div class="outer-col-footer col-footer">
                    <h4>Hubungi Kami</h4>
                    <p>
                        <?php echo $hubungi_kami->alamat_perusahaan; ?>
                    </p>
                    <p class="pull-left" style="margin-right:30px;">
                        <i class="fa fa-phone-square"></i>&nbsp;Phone : <?php echo $hubungi_kami->telp_perusahaan; ?><br>
                        <i class="fa fa-fax"></i>&nbsp;Fax   : <?php echo $hubungi_kami->fax_perusahaan; ?>
                    </p>
                    <p class="pull-left">
                        <i class="fa fa-envelope"></i>&nbsp;Email   : <?php echo $hubungi_kami->email_perusahaan; ?><br>
                        <i class="fa fa-globe"></i>&nbsp;Web   : <?php echo $hubungi_kami->web_perusahaan; ?>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</div>

<div class="outer100footer-b">
    <div class="container">
        Copyright&copy; 2015. <span class="foot-owner">AL-Qodar</span>
        <span class="pull-right"><a href="http://www.rai.asia" target="_blank"></a></span>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="<?php echo base_url('themes/front/js/bootstrap.min.js'); ?>"></script>

<!-- js grid -->
<!-- <script src="asset/js/js-grid/jquery2.js" type="text/javascript"></script>-->
<script src="<?php echo base_url('themes/front/js/js-grid/jquery.masonry.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('themes/front/js/js-grid/modernizr.js'); ?>" type="text/javascript"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    /*untuk pin style*/
    var $containter = $('#container');
    $containter.imagesLoaded(function() {
        $containter.masonry({
            itemSelector: '.box',
            isAnimated: !Modernizr.csstransitions,
            isFitWidth: true
        });
    });
</script>  
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(-7.822514, 110.414675),
    zoom:17,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php if (isset($includes_for_layout['js']) AND count($includes_for_layout['js']) > 0): ?>
    <?php foreach ($includes_for_layout['js'] as $js): ?>
        <?php if ($js['options'] === NULL OR $js['options'] == 'footer'): ?>
            <script type="text/javascript" src="<?php echo $js['file']; ?>"></script>
        <?php endif; ?>

    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>