<div>

</div>
<footer id="footer">
	<!-- =============== container =============== -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6">

				<ul class="social-links">
					<li><a class="wow fadeInUp animated" href="index.html#"
							style="visibility: visible; animation-name: fadeInUp;"><i
								class="fa fa-facebook"></i></a></li>
					<li><a data-wow-delay=".1s" class="wow fadeInUp animated" href="index.html#"
							style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;"><i
								class="fa fa-twitter"></i></a></li>
					<li><a data-wow-delay=".2s" class="wow fadeInUp animated" href="index.html#"
							style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;"><i
								class="fa fa-google-plus"></i></a></li>
					<li><a data-wow-delay=".4s" class="wow fadeInUp animated" href="index.html#"
							style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;"><i
								class="fa fa-pinterest"></i></a></li>
					<li><a data-wow-delay=".5s" class="wow fadeInUp animated" href="index.html#"
							style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;"><i
								class="fa fa-envelope"></i></a></li>
				</ul>

				<p class="copyright">
					&copy; 2022 UPTD
				</p>

			</div>
			<div data-wow-delay=".6s" class="col-xs-12 col-sm-6 col-md-6 wow bounceIn  animated"
				style="visibility: visible; animation-delay: 0.6s; animation-name: bounceIn;">

				<section class="widget widget_text" id="text-15">
					<h3 class="widget-title"><span>UPTD</span> Latihan Kerja Prov. NTT</h3>
					<div class="textwidget">786, Firs Avenue, The Mall,<br>
						<p>Jl. Thamrin, No. 3, Kecamatan Oebobo, Kelurahan Kayuputih, Kota Kupang</p>
					</div>
				</section>

			</div>
		</div>
	</div><!-- =============== container end =============== -->
</footer>
<!-- =============== jQuery =============== -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/isotope-docs.min.js"></script>
<!-- =============== Bootstrap Core JavaScript =============== -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- =============== Plugin JavaScript =============== -->
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/jquery.fittext.js"></script>
<script src="assets/js/wow.min.js"></script>
<!-- =============== owl carousel =============== -->
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Isotope does NOT require jQuery. But it does make things easier -->

<script src="assets/js/baguetteBox.js" async></script>
<script src="assets/js/plugins.js" async></script>

<!-- =============== Custom Theme JavaScript =============== -->
<script src="assets/js/creative.js"></script>
<script src="assets/js/jquery.nicescroll.min.js"></script>

<script>
	$(document).ready(function() {

		var nice = $("html").niceScroll(); // The document page (body)

		$("#div1").html($("#div1").html() + ' ' + nice.version);

		$("#boxscroll").niceScroll({
			cursorborder: "",
			cursorcolor: "#00F",
			boxzoom: true
		}); // First scrollable DIV

		$("#boxscroll2").niceScroll("#contentscroll2", {
			cursorcolor: "#F00",
			cursoropacitymax: 0.7,
			boxzoom: true,
			touchbehavior: true
		}); // Second scrollable DIV
		$("#boxframe").niceScroll("#boxscroll3", {
			cursorcolor: "#0F0",
			cursoropacitymax: 0.7,
			boxzoom: true,
			touchbehavior: true
		}); // This is an IFrame (iPad compatible)

		$("#boxscroll4").niceScroll("#boxscroll4 .wrapper", {
			boxzoom: true
		}); // hw acceleration enabled when using wrapper

	});
</script>
<script>
	window.onload = function() {
		if (typeof oldIE === 'undefined' && Object.keys)
			hljs.initHighlighting();

		baguetteBox.run('.baguetteBoxOne');
		baguetteBox.run('.baguetteBoxTwo');
		baguetteBox.run('.baguetteBoxThree', {
			animation: 'fadeIn'
		});
		baguetteBox.run('.baguetteBoxFour', {
			buttons: false
		});
		baguetteBox.run('.baguetteBoxFive', {
			captions: function(element) {
				return element.getElementsByTagName('img')[0].alt;
			}
		});
	};
</script>
