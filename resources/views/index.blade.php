@extends('layouts.guest')
@section('meta')
	<title>Amlaen Digital Marketing Agency</title>
@endsection
@section('content')
	<main>
		<div class="jumbotron mb-0 pb-0" style="background-color: #ffffff;">
			<div class="container mb-0">
				<div class="site-slider">
					<div class="slider-one">
						<div>
							<img src="{{ asset('assets/img/banners2/search-engine-optimization-4111000.jpg')}}" class="img-fluid" />
						</div>
						<div>
							<img src="{{ asset('assets/img/banners2/scrabble-letters-spelling-digital-marketing-2556700.jpg')}}" class="img-fluid" />
						</div>
						<div>
							<img src="{{ asset('assets/img/banners2/merakist-jyoSxjUE22g-unsplash.jpg')}}" class="img-fluid" />
						</div>
						
						<div>
							<img src="{{ asset('assets/img/banners2/photo-of-person-holding-mobile-phone-3183153 (1).jpg')}}" class="img-fluid" />
						</div>
						
						<div>
							<img src="{{ asset('assets/img/banners2/online-marketing-1246457.jpg')}}" class="img-fluid" />
						</div>
						<div>
							<img src="{{ asset('assets/img/banners2/freelancer-763730.jpg')}}" class="img-fluid" />
						</div>
					</div>
					<div class="slider-btn">
              <span class="position-top prev">
                <i class="far fa-chevron-left"></i>
              </span>
						<span class="position-top next right-0">
                <i class="far fa-chevron-right"></i>
              </span>
					</div>
				</div>
			</div>
		</div>
		<!-- Service Section -->
		<section id="services">
			<div class="container">
				<div class="services-title mb-5 text-uppercase">
					<h1 style="font-weight: 700">Services</h1>
				</div>
				<div class="row">
					<div class="align-ch col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
						<div class="services-div">
							<div class="services-div-icon">
								<img src="{{ asset('assets/img/home/image-6.png')}}" />
							</div>
							<h4>Youtube Promotion</h4>
							<p class="services-tag">
								We provide organic traffic to promote your youtube channel
							</p>
							<a href="/contact_us" class="contact-us-link">Contact Us</a>
						</div>
					</div>
					<div class="align-ch col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
						<div class="services-div">
							<div class="services-div-icon">
								<img src="{{ asset('assets/img/home/image-1.png')}}" />
							</div>
							<h4>Web Development</h4>
							<p class="services-tag">
								Build your perfect website. We create powerful brand-centric
								and functional sites
							</p>
							<a href="/contact_us" class="contact-us-link">Contact Us</a>
						</div>
					</div>
					<div class="align-ch col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
						<div class="services-div">
							<div class="services-div-icon">
								<img src="{{ asset('assets/img/home/image-2.png')}}" />
							</div>
							<h4>Social Media Marketing</h4>
							<p class="services-tag">
								Build your perfect website. We create powerful brand-centric
								and functional sites
							</p>
							<a href="/contact_us" class="contact-us-link">Contact Us</a>
						</div>
					</div>
					<div class="align-ch col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
						<div class="services-div">
							<div class="services-div-icon">
								<img src="{{ asset('assets/img/home/image-3.png')}}" />
							</div>
							<h4>Search Engine Optimization</h4>
							<p class="services-tag">
								We provide best SEO solution for the scaling of your website.
							</p>
							<a href="/contact_us" class="contact-us-link">Contact Us</a>
						</div>
					</div>
					<div class="align-ch col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
						<div class="services-div">
							<div class="services-div-icon">
								<img src="{{ asset('assets/img/home/image-4.png')}}" />
							</div>
							<h4>PPC Management</h4>
							<p class="services-tag">
								Build your perfect website. We create powerful brand-centric
								and functional sites
							</p>
							<a href="/contact_us" class="contact-us-link">Contact Us</a>
						</div>
					</div>
					<div class="align-ch col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
						<div class="services-div">
							<div class="services-div-icon">
								<img src="{{ asset('assets/img/home/image-5.png')}}" />
							</div>
							<h4>UI /UX</h4>
							<p class="services-tag">
								Build your perfect website. We create powerful brand-centric
								and functional sites
							</p>
							<a href="/contact_us" class="contact-us-link">Contact Us</a>
						</div>
					</div>
{{--					 --}}
				</div>
			</div>
		</section>
	
	</main>
@endsection