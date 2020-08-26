@extends('layouts.user')
@section('content')
    <div class="container-fluid bn-bg mt-4">
        <div class="container1400">
            <div class="bannerSlider">
                <div class="item d-flex align-items-center" style="background:url({{asset('images/user-image/banner_img1.jpg')}}) no-repeat center;height:615px">
                    <div class="pl-33">
                        <div class="bannerInfo">
                            <span class="bannerSubHd">UNLEASH</span>
                            <span class="bannerHd">THE POWER OF DNA</span>
                            <span class="bannerHd">TESTING ON</span>
                            <span class="bannerHd"><font>RIVERS & LAKES</font></span>
                        </div>
                        <div class="banner-btn">
                            <a href="javascript:;" class="bn-btn transition">
                                BUY KIT
                            </a>
                            <a href="javascript:;">
                                <img src="{{asset('images/user-image/amazon.png')}}" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="item d-flex align-items-center" style="background:url({{asset('images/user-image/banner_img1.jpg')}}) no-repeat center;height:615px">
                    <div class="pl-33">
                        <div class="bannerInfo">
                            <span class="bannerSubHd">UNLEASH</span>
                            <span class="bannerHd">THE POWER OF DNA</span>
                            <span class="bannerHd">TESTING ON</span>
                            <span class="bannerHd"><font>RIVERS & LAKES</font></span>
                        </div>
                        <div class="banner-btn">
                            <a href="javascript:;" class="bn-btn transition">
                                Buy Kit
                            </a>
                            <a href="javascript:;">
                                <img src="images/amazon.png" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item d-flex align-items-center" style="background:url({{asset('images/user-image/banner_img1.jpg')}}) no-repeat center;height:615px">
                    <div class="pl-33">
                        <div class="bannerInfo">
                            <span class="bannerSubHd">UNLEASH</span>
                            <span class="bannerHd">THE POWER OF DNA</span>
                            <span class="bannerHd">TESTING ON</span>
                            <span class="bannerHd"><font>RIVERS & LAKES</font></span>
                        </div>
                        <div class="banner-btn">
                            <a href="javascript:;" class="bn-btn transition">
                                Buy Kit
                            </a>
                            <a href="javascript:;">
                                <img src="{{asset('images/user-image/amazon.png')}}" alt="image">
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>


    <section class="sec1Ab">
        <div class="container">
            <h3 class="hm_headng">about jonahwater</h3>
            
            <span class="web_txt">
               Welcome to the site of the world’s first personal DNA test for streams, rivers, and lakes! Our JonahWater aquatic environmental DNA test allows anyone to see what species live in their favorite body of water. Users filter a water sample, send it to the lab, and then learn what species* live in their river or lake. To make this work, Jonah Ventures relies on the power of state-of-the-art DNA sequencing to identify the DNA signatures species leave behind. Here, users can sign up for the service, register their kits, and see their results. Users will also have the opportunity to contribute their data to what is likely to become the largest global freshwater biodiversity survey!. *Right now, we report data for algae (phytoplankton) and fish, but are adding other species in the near future.

               <!--  <a href="javascript:;" class="read_m">Read More...</a> -->
            </span>
        </div>
    </section>

    
        <div class="container">
            <section class="op_p">
                <h3 class="hm_headng text-center">Our Process</h3>
                <div class="d-flex flex-wrap mt-4">
                    <div class="col-12 col-xl-3 ">
                        <div class="op_bx transition text-center">
                            <h3>BUY KIT</h3>
                            <span>Kits can be bought on Amazon. Contains everything you need to filter water and return to lab.</span>
                            <div class="mt-3">
                                <img src="{{asset('images/user-image/icon-2.png')}}" class="img-hid">
                                <img src="{{asset('images/user-image/icon-2-hover.png')}}" class="img-show">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-3">
                        <div class="op_bx transition text-center">
                            <h3>SAMPLE WATER</h3>
                            <span>Sampling takes just 2 minutes! Site data uploaded through our mobile app.</span>
                            <div class="mt-3">
                                <img src="{{asset('images/user-image/icon-1.png')}}" class="img-hid">
                                <img src="{{asset('images/user-image/icon-1-hover.png')}}" class="img-show">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-3">
                        <div class="op_bx transition text-center">
                            <h3>MAIL SAMPLE</h3>
                            <span>Each kit includes a first-class USPS return mailer. Couldn’t be easier.</span>
                            <div class="mt-3">
                                <img src="{{asset('images/user-image/icon-3.png')}}" class="img-hid">
                                <img src="{{asset('images/user-image/icon-3-hover.png')}}" class="img-show">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-3">
                        <div class="op_bx transition text-center">
                            <h3>GET REPORT</h3>
                            <span>After sequencing, data will be posted on our JonahWater data portal. Biodiversity revealed!</span>
                            <div class="mt-3">
                                <img src="{{asset('images/user-image/icon-4.png')}}" class="img-hid">
                                <img src="{{asset('images/user-image/icon-4-hover.png')}}" class="img-show">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    <section class="se_sc">
        <div class="container">
            <div class="sec_bg">
                <div class="lft">
                    <img src="{{asset('images/user-image/box-img.png')}}" alt="image" class="bx_img">
                    <img src="{{asset('images/user-image/strip.png')}}" alt="image" class="strip">
                </div>
                <div class="rgt">
                    <h3>Simplifying Environmental<span class="d-block">DNA Testing in Rivers and Lakes</span></h3>
                    <span>Simplifying environmental DNA Testing in Rivers and Lakes: The JonahWater aquatic environmental DNA kit allows everyone to access the latest DNA sequencing technology to learn about their favorite water bodies. Find invasive species. Detect algal blooms. Discover hidden food webs.</span>
                    <div class="banner-btn mt-3">
                        <a href="javascript:;" class="bn-btn transition" tabindex="0">
                            BUY KIT
                        </a>
                        <a href="javascript:;" tabindex="0">
                            <img src="{{asset('images/user-image/amazon.png')}}" alt="image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('user.contactus')
@endsection