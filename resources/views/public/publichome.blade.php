@extends('public.main', [
'full' => true
])

@section('container')
    <!-- ======= Pendaftaran Section ======= -->
    <div class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Persyaratan & Link Pendaftaran</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left pt-5">
                        <div class="single-well">
                            <img src="assets/img/uptd/5.jpg" alt="" class="shadow-lg" style="border-radius: 1rem; transform: rotateZ(3deg)">
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle p-5">
                        <div class="single-well">
                            <a href="#">
                                <h4 class="sec-head">Persyaratan</h4>
                            </a>
                            <p>
                                Redug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure
                                aspernatur sit adipisci quaerat unde at nequeRedug Lagre dolor sit amet, consectetur
                                adipisicing elit. Itaque quas officiis iure
                            </p>
                            <ul>
                                <li>
                                    <i class="bi bi-check"></i> Fotocopy KTP 1 lembar
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Fotocopy ijazah terakhir 1 lembar
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Pas Foto 3x4 latar belakang merah 4 lembar
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Surat keterangan sehat
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Surat keterangan telah menyelesaikan tugas akhir (Bagi
                                    calon peserta mahasiswa)
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Surat pernyataan bersedia menaati semua ketentuan yang
                                    berlaku (Disiapkan oleh penyelenggara)
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
				<div class="col-md-12">
					<div class="w-100 d-flex">
						<a href="/register" class="btn btn-warning mt-3 px-5 py-3 mx-auto">
							Daftar Sekarang
						</a>
					</div>
				</div>
                <!-- End col-->
            </div>
        </div>
    </div><!-- End About Section -->
    <!-- ======= Contact Section ======= -->
    <div class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Kontak Kami</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start contact icon column -->
                    <div class="col-md-4">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="bi bi-phone"></i>
                                <p>
                                    Call: +1 5589 55488 55<br>
                                    <span>Monday-Friday (9am-5pm)</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="bi bi-envelope"></i>
                                <p>
                                    Email: info@example.com<br>
                                    <span>Web: www.example.com</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="bi bi-geo-alt"></i>
                                <p>
                                    Location: A108 Adam Street<br>
                                    <span>NY 535022, USA</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Start Google Map -->
                    <div class="col-md-6">
                        <!-- Start Map --><iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.117109076514!2d123.61521808451924!3d-10.171135431926654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c569cad5bf811b7%3A0x381cb66b36a37a05!2sUPTD.%20BLK%20Provinsi%20NTT!5e0!3m2!1sid!2sid!4v1648538849890!5m2!1sid!2sid"
                            width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen></iframe>
                        <!-- End Map -->
                    </div>
                    <!-- End Google Map -->

                    <!-- Start  contact -->
                    <div class="col-md-6">
                        <div class="form contact-form">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                        required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center"><button type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                    <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div><!-- End Contact Section -->
@endsection
