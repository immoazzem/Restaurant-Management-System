
    <!-- Footer -->
    <footer class="site-footer site-subscribe-main site-dark-section-a">

        <!-- Bootstrap -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <!-- Widget -->
                    <div class="widget">
						
                        <!-- H2 Heading -->
                    	<h2>Be updated</h2>
                    	<!-- H1 Heading -->
                    	<h1>Subscribe us</h1>
                    
                        <!-- Paragraph -->
                        <p>Subscribe to our Newsletter to get first<br>

                            Gift voucher by StartLorem Ipsum is simply dummy
						</p>



                        <!-- Subscribe -->
                        <form method="post" action="#" class="site-subscribe">
                            <input type="email" placeholder="Enter your email" required="required" name="form_subscribe">
                            <button type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>

                    </div>
                    <!-- End widget -->

                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12">
					<!-- Social Icons -->
                    <div class="site-social-icons">
                        <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                    
                    <!-- Copyright -->
                    <div class="site-copyright">
                        <a href="https://www.templateshub.net" target="_blank">Templates Hub</a>
                    </div>
                </div>
                

            </div>

        </div>
        <!-- End Bootstrap -->

    </footer>
    <!-- End Footer -->

    <!-- Preloader -->
    <div class="site-preloader">
        <img src="assets/images/loader.gif" alt="loader">
    </div>

</div>
<!-- End Wrapper -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/jquery-1.12.4.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/wow.min.js"></script>						<!--Wow animation js -->
<script src="assets/js/scrollspy.js"></script>						<!--Wow animation repeat js -->

<script src="assets/js/jquery.countimator.min.js"></script>        <!-- Counter -->
<script src="assets/js/jquery.sticky.min.js"></script>             <!-- Sticky Header -->
<script src="assets/js/swiper.jquery.min.js"></script>             <!-- Carousel Slider -->
<script src="assets/js/isotope.pkgd.min.js"></script>              <!-- Isotope -->
<script src="assets/js/jquery.tabslet.min.js"></script>            <!-- Tabs -->
<script src="assets/js/tweetie.min.js"></script>                   <!-- Tweets -->
<script src="assets/js/jquery.scrollUp.min.js"></script>           <!-- Scroll up -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqv7qQuTFyzA7Pgs9SSAOBIOMLI8iiems"></script>    <!-- Google map -->
<script src="assets/js/imagesloaded.pkgd.min.js"></script>         <!-- Header slider scripts -->
<script src="assets/js/hammer.min.js"></script>
<script src="assets/js/sequence.min.js"></script>
<script src="assets/js/venobox.min.js"></script>                   <!-- Light box -->
<script src="assets/js/jquery.mb.YTPlayer.min.js"></script>        <!-- Video background -->
<script src="assets/js/template.js"></script>                      <!-- Theme Options -->

<script src="assets/js/retina.js"></script>                      <!-- Retina js -->
<script src="assets/js/retina.min.js"></script>                  <!-- Retina js -->

<script src="assets/js/jquery-ui.js"></script>                  <!-- jquery-ui for date picker and time -->

<script src="assets/js/easyResponsiveTabs.js"></script>			<!-- Tab to accordian -->
	<script>
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

    });
	</script>
    

<script>
 
$('#date').datepicker({
   dateFormat: 'yy-mm-dd'
});
 
</script>

    
</body>
</html>