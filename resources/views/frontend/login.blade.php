@extends('frontend.layouts.master')
@section('title','User Login')
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
                                        Welcome Back
                                    </h3>
                                    <p class="mb-0 font-size-4 text-white">Log in to continue your account
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="bg-white-2 h-100 px-11 pt-11 pb-7">

                                <form action="{{route('login')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">E-mail</label>
                                        <input name="email"  type="email" placeholder="Enter email" class="form-control " name="email">

                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Password</label>
                                        <div class="position-relative">
                                            <input name="password" id="password" type="password" class="form-control" placeholder="Enter password" name="password"  autocomplete="current-password">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex flex-wrap justify-content-between">
                                        <label for="terms-check" class="gr-check-input d-flex  mr-3">
                                            <input class="d-none" type="checkbox" id="terms-check">
                                            <span class="checkbox mr-5"></span>
                                            <span class="font-size-3 mb-0 line-height-reset mb-1 d-block">Remember password</span>
                                        </label>
                                        <a href="#" class="font-size-3 text-dodger line-height-reset google-drive-opener">Forget Password</a>
                                    </div>
                                    <div class="form-group mb-8">
                                        <button type="submit" class="btn btn-primary btn-medium w-100 rounded-5 text-uppercase">Log in </button>
                                    </div>
                                    <p class="font-size-4 text-center heading-default-color">Don’t have an account? <a href="javascript:;" class="text-primary google-drive-opener" data-toggle="modal" data-target="#register">Create a free account</a></p>
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