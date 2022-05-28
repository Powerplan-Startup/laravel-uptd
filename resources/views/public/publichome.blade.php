@extends('public.main', [
'full' => true
])

@push('head')
    <style>
        .header{
            background-image: linear-gradient(-127deg, rgba(0, 0, 0, .5), rgba(0, 0, 0, .15)), url("/assets/img/uptd/8.jpg");
        }
    </style>
@endpush

@section('container')
    <!-- ======= Pendaftaran Section ======= -->
    <div class="about-area area-padding">
        <div class="container p-5">
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
                            <img src="assets/img/uptd/5.jpg" alt="" class="shadow-lg" style="border-radius: 1rem; max-width: 100%; transform: rotateZ(3deg)">
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
                            <ul>
                                <li>
                                    <i class="bi bi-check"></i> Mengisi Form Pendaftaran
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Umur 18-38 tahun
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> KTP
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Surat Keterangan Telah Menyelesaikan Studi
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Surat pernyataan bersedia menaati semua ketentuan yang
                                    berlaku (Disiapkan oleh penyelenggara)
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
				<div class="col-md-12 pt-4">
					<div class="w-100 d-flex" style="display: flex">
						<a href="/register" class="btn btn-primary mt-3 px-5 py-3 mx-auto" style="padding: ">
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
                    <div class="col-md-12">
                        <!-- Start Map --><iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.117109076514!2d123.61521808451924!3d-10.171135431926654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c569cad5bf811b7%3A0x381cb66b36a37a05!2sUPTD.%20BLK%20Provinsi%20NTT!5e0!3m2!1sid!2sid!4v1648538849890!5m2!1sid!2sid"
                            width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen></iframe>
                        <!-- End Map -->
                    </div>
                    <!-- End Google Map -->

                    <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div><!-- End Contact Section -->
@endsection
