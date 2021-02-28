@extends('frontend.layouts.master')
@section('title','User Registration')
@section('content')


<section class="user-login-section pt-15 pb-15">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="login-modal-main bg-white rounded-8 overflow-hidden" style="border: 1px solid #ddd;">
                    <div class="row no-gutters">
                        <div class="col-lg-5 col-md-6">
                            <div class="pt-10 pb-6 pl-11 pr-12 bg-black-2 h-100 d-flex flex-column dark-mode-texts">
                                <div class="pb-9">
                                    <h3 class="font-size-8 text-white line-height-reset pb-4 line-height-1p4">
                                        Register as a user
                                    </h3>
                                    <p class="mb-0 font-size-4 text-white">Create your account to continue
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="bg-white-2 h-100 px-11 pt-11 pb-7">

                                <form method="post" action="{{ route('user.register.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Full Name</label>

                                        <input id="name" placeholder="Enter Name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>

                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">E-mail</label>
                                        <input id="email" placeholder="Enter email" type="text" class="form-control" name="email" value="{{ old('email') }}">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>

                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Mobile No</label>
                                        <input id="mobile" placeholder="Enter mobile no" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile'))?($errors->first('mobile')):''}}</div>

                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('gender'))?($errors->first('gender')):''}}</div>

                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Password</label>
                                        <div class="position-relative">
                                            <input id="password" placeholder="Enter password" type="password" class="form-control " name="password">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Confirm Password</label>
                                        <div class="position-relative">
                                            <input id="password2" placeholder="Confirm password" type="password" class="form-control" name="password_confirmation">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex flex-wrap justify-content-between mb-1">
                                        <label for="terms-check2" class="gr-check-input d-flex  mr-3">
                                            <input class="d-none" type="checkbox" id="terms-check2">
                                            <span class="checkbox mr-5"></span>
                                            <span class="font-size-3 mb-0 line-height-reset d-block">Agree to the <a href="#" class="text-primary">Terms & Conditions</a></span>
                                        </label>
                                        <a href="#" class="font-size-3 text-dodger line-height-reset">Forget Password</a>
                                    </div>
                                    <div class="form-group mb-8">
                                        <button type="submit" class="btn btn-primary btn-medium w-100 rounded-5 text-uppercase">Sign Up </button>
                                    </div>
                                    <p class="font-size-4 text-center heading-default-color">Don’t have an account? <a href="#" class="text-primary">Create a free account</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection