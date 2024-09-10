<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="baseURL" content="{{ asset('/') }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Financial Management System | Login</title>
    <link rel="shortcut icon" href="{{ asset('assets-cms/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap1.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/finance-nrcp/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/finance-nrcp/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/finance-nrcp/scroll/scrollable.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <script src="{{ asset('assets/js/jquery1-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/captcharefresh.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/colors/default.css') }}" id="colorSkinCSS">
</head>

<body class="crm_body_bg">
    <section class="main_content login-p ps-0 p-0">
        <div class="main_content_iner p-0">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_box">
                            <div class="row justify-content-center">
                                <div class="col-lg-4">
                                    <div class="modal-content cs_modal">
                                        <div class="modal-header justify-content-center theme_bg_1">
                                            <h5 class="modal-title text_white">NRCP Financial Management System</h5>
                                        </div>
                                        {!! Toastr::message() !!}
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('authenticate') }}" id="loginForm">
                                                @csrf
                                                <div class="form-check">
                                                    <div class="radio-btn-card d-flex mb-3 position-relative">
                                                        <div class="d-flex me-5">
                                                            <input class="form-check-radio" type="radio" name="usertype"
                                                                id="gridRadios1" value="0">
                                                            <label class="form-label form-check-label"
                                                                for="gridRadios1">National User</label>
                                                        </div>
                                                        <div class="d-flex">
                                                            <input class="form-check-radio" type="radio" name="usertype"
                                                                id="gridRadios2" value="1">
                                                            <label class="form-label form-check-label"
                                                                for="gridRadios2">Institute User</label>
                                                        </div>
                                                        @error('usertype')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="text" name="email" value="{{ old('email') }}"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="Enter your email">
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="p-relative mb-3">
                                                        <input type="password" name="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="Password" id="pass_log_id">
                                                        <span toggle="#password-field"
                                                            class="fa fa-fw fa-eye-slash field_icon toggle-password icon-psw"></span>
                                                        @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="row captcha-alignment">
                                                      
                                                       
                                                        <div class="col-md-6">
                                                            <div class="mb-0">
                                                                <img src="{{ url('captcha-code') }}" id="captchaimg" class="mb-0">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-0">
                                                                <input placeholder="Enter Captcha" type="text"
                                                                    name="captcha_code" tabindex="2" id="captcha_code" class="mb-0">
                                                                @error('captcha_code')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 mt-2 capcha-text">
                                                            Can't read the above code?
                                                            <a class="ccc" href="javascript:void(0);"
                                                                onClick="refreshCaptcha();">Refresh</a>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn_1 full_width text-center">Log
                                                        in</button>
                                                    <div class="text-center">
                                                        <a href="#" data-toggle="modal" data-target="#forgot_password"
                                                            data-dismiss="modal" class="pass_forget_btn">Forget
                                                            Password?</a>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="footer_part ps-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2024 © - Designed by NRCP<a href="#"></a></p>
                    </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>

    <script>
    $(".toggle-password.icon-psw").click(function() {
        $(this).toggleClass("fa-eye-slash fa-eye");
        input = $(this).parent().find("input");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    $(document).ready(function() {

        $("#loginForm").validate({
            rules: {
                // usertype: {
                //     required: true
                // },
                password: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                captcha_code: 'required'
            },
            messages: {

                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                email: "Please enter a valid email address",
                captcha_code: 'Please enter captcha code'
            }
        });
    })
    </script>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap1.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.js') }}"></script>
    <script src="{{ asset('assets/finance-nrcp/scroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/finance-nrcp/scroll/scrollable-custom.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
</body>

</html>