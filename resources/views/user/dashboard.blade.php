@extends('layouts.user')
@section('content')
    <section class="db_sec">
        <div class="container">
            <h3 class="hm_headng">WELCOME TO DASHBOARD</h3>
            <span class="web_txt">Activate new kits here or explore your data.</span>
            <div class="welcome-bx">
                <div class="row">
                    
                    <div class="col-12 col-md-6">
                        <div class="db-bx-info text-center">
                            <div class="ic">
                                <img src="{{asset('images/user-image/db-icon-1.png')}}" alt="image">
                                <span class="d-block mt-3">Explore Your Data</span>
                            </div>
                            <div class="db-lg-btn">
                                <a href="/user/explore-data" class="transition">EXPLORE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="db-bx-info text-center">
                            <div class="ic">
                                <img src="{{asset('images/user-image/db-icon-1.png')}}" alt="image">
                                <span class="d-block mt-3">EXPLORE ALL DATA</span>
                            </div>
                            <div class="db-lg-btn">
                                <a href="/user/explore-all-data" class="transition">EXPLORE ALL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection