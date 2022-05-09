@extends('frontend.master')
@section('content')
		<div class="breadcrumb_section">
			<div class="container">
				<ul class="breadcrumb_nav ul_li">
					<li><a href="index.html">Home</a></li>
					<li>About Us</li>
				</ul>
			</div>
		</div>
		<!-- breadcrumb_section - end
		================================================== -->


		<!-- about_section - start
		================================================== -->
		<section class="about_section section_space">
			<div class="container">
				<div class="row align-items-center">
					<div class="col col-md-6 order-last">
						<div class="about_image">
							<img src="{{asset('/front/images/about/about_image.jpg')}}" alt="image_not_found">
						</div>
					</div>
					<div class="col col-md-6">
						<div class="about_content">
							<h2 class="about_small_title text-uppercase">About Stowaa</h2>
							<h3 class="about_title">Electro is a clean, modern, user friendly, responsive</h3>
							<p>
								Stowaa has been founded on 1 March 2020. From then to now, Stowaa has won the heart of many people and now is a country-wide renowned brand. That has been possible due to the hard work Stowaa has done to satisfy its customers. Having the aim to satisfy customers, providing customers with their required products, and being true to their motto, “Customers Come First,” has brought Stowaa to the top of the E-Commerce Site and also is one of the largest Computer and Technology product retailers. Star Tech has over 300 employees and is growing more and more, working diligently to fulfill the Main Criteria of Stowaa's Motto or Vision.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- about_section - end
		================================================== -->


		<!-- service_section - start
		================================================== -->
		<section class="service_section bg_gray section_space">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col col-lg-4 col-md-6 col-sm-6">
						<div class="service_boxed">
							<div class="item_icon">
								<i class="icon icon-Wrench"></i>
								<i class="icon icon-Wrench"></i>
							</div>
							<h3 class="item_title"> Head Office </h3>
                            <h6 style="color: red">Stowaa Shoping Mail</h6>
							<p>Rana Plaza Bougra,6 Floor</p>
						</div>
					</div>

					<div class="col col-lg-4 col-md-6 col-sm-6">
						<div class="service_boxed">
							<div class="item_icon">
								<i class="icon icon-Dollars"></i>
								<i class="icon icon-Dollars"></i>
							</div>
							<h3 class="item_title">Money Back Guarantee</h3>
                               <h6 style="color: red">Contact</h6>
							<p>+8801796382625</p>
						</div>
					</div>

					<div class="col col-lg-4 col-md-6 col-sm-6">
						<div class="service_boxed">
							<div class="item_icon">
								<i class="icon icon-Phone2"></i>
								<i class="icon icon-Phone2"></i>
							</div>
							<h3 class="item_title">Online Support 24/7</h3>
                            <h6 style="color: red">9.30AM-7PM</h6>

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- service_section - end
		================================================== -->


		<!-- team_section - start
		================================================== -->
		<section class="team_section section_space">
			<div class="container">

				<div class="row">
					<div class="col col-lg-6 col-md-8 col-sm-10">
						<div class="team_section_title">
							<h2 class="title_text">Meet Our Team</h2>
							<p class="mb-0">To a prospect seeking out a new service provider, the process can be a little overwhelming. It's easy to wonder: Who are the real people behind all the smoke and mirrors?</p>
						</div>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col col-lg-3 col-md-4 col-sm-6">
						<div class="team_item">
							<div class="team_image">
								<img src="{{asset('/front/images/team/team_1.png')}}" alt="image_not_found">
							</div>
							<div class="team_content">
								<h3 class="team_member_name">Makshudul Haque</h3>
								<span class="team_member_title">CEO/Founder</span>
							</div>
						</div>
					</div>

					<div class="col col-lg-3 col-md-4 col-sm-6">
						<div class="team_item">
							<div class="team_image">
								<img src="{{asset('/front/images/team/team_2.jpg')}}" alt="image_not_found">
							</div>
							<div class="team_content">
								<h3 class="team_member_name">John Swim</h3>
								<span class="team_member_title">Fashion Designer</span>
							</div>
						</div>
					</div>

					<div class="col col-lg-3 col-md-4 col-sm-6">
						<div class="team_item">
							<div class="team_image">
								<img src="{{asset('/front/images/team/team_3.jpg')}}" alt="image_not_found">
							</div>
							<div class="team_content">
								<h3 class="team_member_name">Harry Dor</h3>
								<span class="team_member_title">CEO/Founder</span>
							</div>
						</div>
					</div>

					<div class="col col-lg-3 col-md-4 col-sm-6">
						<div class="team_item">
							<div class="team_image">
								<img src="{{asset('/front/images/team/team_4.jpg')}}" alt="image_not_found">
							</div>
							<div class="team_content">
								<h3 class="team_member_name">John Swim</h3>
								<span class="team_member_title">Fashion Designer</span>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- team_section - end
		================================================== -->
@endsection
