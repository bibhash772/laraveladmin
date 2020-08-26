@extends('layouts.user')
@section('content')
<div class="container-fluid bn-bg">
    <div class="container1400">
        <div class="inner-banner">
            <img src="{{asset('images/user-image/privacy-policy-bg.jpg')}}" alt="image" class="w-100">
            <div class="inner-banner-info">
                <h3>PRIVACY <span>POLICY</span></h3>
                <ul class="bread-crumb">
                    <li><a href="/"><i class="fas fa-home"></i> HOME</a></li>
                    <li><a href="/privacy-policy" class="active"> PRIVACY POLICY</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="sec2Ab">
    <div class="container">
        <h3 class="hm_headng">Introduction</h3>
        <span class="web_txt">
           Jonah Ventures, LLC (“Jonah Ventures,” “we” or “us”) is committed to protecting your privacy. This Privacy Policy applies to our websites, mobile applications, DNA analysis services and other services and applications we may provide (collectively, our “Service”).
        </span>
        <span class="web_txt">
           By accessing or using our service, you signify that you have read, understood and agree to our collection, storage, use and disclosure of your personal information as described in this Privacy Policy. If you do not agree with this policy, do not access or use our Service or interact with any other aspect of our business. 
        </span>
    </div>
</section>


<div class="container sec2Ab">
    <div class="pr-info">
        <h3 class="mb-3">What Information do We Collect?</h3>
        <div class="form-group inf">
            <h4>Account Data</h4>
            <span class="web_txt">
              We collect information about you and your samples when you provide it to us, when you use our Service. Note we may collect information you enter in our Service or provide to us in some other manner, including your name, email address, password, physical address, and billing information. We also may collect communications between you and us. Samples are associated with meta-data including location and time/date. 
            </span>
        </div>
        <div class="form-group inf">
            <h4>How to use information we collect </h4>
            <span class="web_txt">
              We use information about you to provide our Service to you, authenticate you when you log in, and provide customer support. Note that communication over email are not encrypted. 
            </span>
            <span class="web_txt">
              If you have given consent for your sample information to be made public, it may be made available to others to view. No personal information will be made public. All sample data collected may be used for internal research and development. Sample data that is listed as publicly available may be used for research that will be made public in publications. As such, we may share information in an aggregated and anonymous form that does not identify you directly as an individual.
            </span>
        </div>
        
    </div>
</div>


<section class="sec2Ab">
    <div class="container">
        <h3 class="hm_headng">Storage and security of information ?</h3>
        <span class="web_txt">
          Your information collected through the Service may be stored and processed in the United States or another country in which Jonah Ventures, our affiliates, or service providers maintain facilities. We take reasonable physical, administrative, and technological safeguards to preserve the integrity and security of your information. We will retain your information indefinitely unless we receive written notification to remove all personal and sample data.
        </span>
    </div>
</section>
<section class="sec2Ab">
    <div class="container">
        <h3 class="hm_headng">UPDATES TO OUR PRIVACY POLICY</h3>
        <span class="web_txt">
          We may modify this Privacy Policy. See "Last Revision" date above for the date of any revision.
        </span>
    </div>
</section>
<section class="sec2Ab">
    <div class="container">
        <h3 class="hm_headng">CONTACTING US</h3>
        <span class="web_txt">
         If you have questions about this Privacy Policy, please contact us at privacy@jonahventures.com or by writing to us at: 
        </span>
        <span class="web_txt">
        <p>Jonah Ventures</p>
        <p>Attn: Privacy Officer</p>
        <p>1600 Range St. #201</p>
        <p>Boulder, CO 80301</p>
        </span>
         <span class="web_txt">
         When contacting us, please include sufficient information for us to identify all of your records, such as your name, address, email address, and a telephone number where we can contact you. 
        </span>
    </div>
</section>

@include('user.contactus')
@endsection