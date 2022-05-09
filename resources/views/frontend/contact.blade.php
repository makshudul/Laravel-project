@extends('frontend.master')

@section('content')
         <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- contact_section - start
            ================================================== -->
            <div class="map_section">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d335.7868380280774!2d89.37608075333125!3d24.848115524099008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fc545551611823%3A0xe8324d124644f91e!2sRunner%20Plaza!5e0!3m2!1sen!2sbd!4v1649129688136!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- contact_section - end
            ================================================== -->

            <!-- contact_section - start
            ================================================== -->
            <section class="contact_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="contact_info_wrap">
                                <h3 class="contact_title">Address <span>Information</span></h3>
                                <div class="decoration_image">
                                    <img src="{{asset('/front/images/leaf.png')}}" alt="image_not_found">
                                </div>
                                <p>Hi, How can we help you</p>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="contact_info_list">
                                            <h4 class="list_title">Stowaa Shoping mail</h4>
                                            <ul class="ul_li_block">
                                                <li>Bogura Sodor, Bogura </li>
                                                <li>Shopping Complex</li>
                                                <li>Open  Closes 8:30PM </li>
                                                <li>stowaa@gmail.com</li>
                                                <li>+8801571164542</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            <div class="contact_info_wrap">
                                <h3 class="contact_title">Get In Touch <span>Inform Us</span></h3>
                                <div class="decoration_image">
                                    <img src="{{asset('/front/images/leaf.png')}}" alt="image_not_found">
                                </div>
                                <p>Need any help please contact</p>
                                <form action="#">
                                    <div class="form_item">
                                        <input id="contact-form-name" type="text" name="name" placeholder="Your Name">
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-6 col-sm-6">
                                            <div class="form_item">
                                            <input id="contact-form-email" type="email" name="email" placeholder="Your Email">
                                        </div>
                                        </div>
                                        <div class="col col-md-6 col-sm-6">
                                            <div class="form_item">
                                                <input type="text" name="subject" placeholder="Your Subject">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_item">
                                        <textarea id="contact-form-message" name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div id="form-msg"></div>
                                    <button id="contact-form-submit" type="submit" class="btn btn_dark">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact_section - end
            ================================================== -->
@endsection
