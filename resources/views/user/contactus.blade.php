<div class="container">
    <section class="ft_bg">
        <div class="row align-items-center">
            <div class="col-12 col-xl-4">
                <div class="ft_left">
                    <h3>Address</h3>
                    <div class="ft_info">
                        <img src="{{asset('images/user-image/marker.png')}}" alt="image">
                        <span>1600 Range St. #201 , Boulder CO 80301</span>
                    </div>
                    <div class="ft_info mt-3">
                        <img src="{{asset('images/user-image/msg.png')}}" alt="image">
                        <span>info@jonahventures.com</span>
                    </div>
                    <div class="mt-3">
                        <!-- <span class="fls">Follows On</span> -->
                        <a class="tw_btn" href="https://twitter.com/jonahventures" target="_blank">twitter <img src="{{asset('images/user-image/tw.png')}}" alt="image"></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-8">
                <div class="ft_right">
                    <h3 class="mb-3">Questions?</h3>
                    <div class="mt-3">
                        <form id="contact_us" method="post" action="contact-us">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="form-group">
                                        <input type="text" id="first_name" class="transition material-input-fff"  placeholder="First Name" name="first_name" value="{{old('first_name')}}">
                                        <label for="firstname" class="form__label__2">First Name</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="form-group">
                                        <input type="text" id="last_name" class="  material-input-fff transition" name="last_name" placeholder="Last Name" value="{{old('last_name')}}">
                                        <label for="lastname" class="form__label__2">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="form-group">
                                        <input type="text" id="email_address" class="material-input-fff transition"  placeholder="Email Address" name="email_address" value="{{old('email_address')}}">
                                        <label for="emailid" class="form__label__2">Email ID</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="form-group">
                                        <input type="number" id="phone_no" name="phone_no" class="material-input-fff transition"  placeholder="Phone No."  value="{{old('phone_no')}}">
                                        <label for="phone" class="form__label__2">Phone</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="form-group">
                                        <textarea class="form_cntrl transition h_auto" rows="4" placeholder="Message" name="message" value="{{old('message')}}">{{old('message')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn_yl w-100 transition submit-contactus">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>