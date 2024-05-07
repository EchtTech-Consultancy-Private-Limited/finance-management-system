<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
        @include('partials.header-css')
   </head>
   <body class="crm_body_bg">
      <nav class="sidebar dark_sidebar">
         @include('partials.asidebar')
      </nav>
      <section class="main_content dashboard_part large_header_bg">
         <div class="container-fluid g-0">
            <div class="row">
               <div class="col-lg-12 p-0 ">
                  <div class="header_iner d-flex justify-content-between align-items-center">
                     <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                     </div>
                     <div class="line_icon open_miniSide d-none d-lg-block">
                        <img src="{{ asset('assets/img/line_img.png') }}" alt>
                     </div>
                     <div class="serach_field-area d-flex align-items-center">
                        <div class="search_inner">
                           <form action="#">
                              <div class="search_field">
                                 <input type="text" placeholder="Search">
                              </div>
                              <button type="submit"> <img src="{{ asset('assets/img/icon/icon_search.svg') }}" alt> </button>
                           </form>
                        </div>
                     </div>
                     <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                           <li>
                              <a class="bell_notification_clicker" href="#"> <img src="{{ asset('assets/img/icon/bell.svg') }}" alt>
                              <span>2</span>
                              </a>
                              <div class="Menu_NOtification_Wrap">
                                 <div class="notification_Header">
                                    <h4>Notifications</h4>
                                 </div>
                                 <div class="Notification_body">
                                    <div class="single_notify d-flex align-items-center">
                                       <div class="notify_thumb">
                                          <a href="#"><img src="{{ asset('assets/img/staf/2.png') }}" alt></a>
                                       </div>
                                       <div class="notify_content">
                                          <a href="#">
                                             <h5>Cool Marketing </h5>
                                          </a>
                                          <p>Lorem ipsum dolor sit amet</p>
                                       </div>
                                    </div>
                                    <div class="single_notify d-flex align-items-center">
                                       <div class="notify_thumb">
                                          <a href="#"><img src="{{ asset('assets/img/staf/4.png') }}" alt></a>
                                       </div>
                                       <div class="notify_content">
                                          <a href="#">
                                             <h5>Awesome packages</h5>
                                          </a>
                                          <p>Lorem ipsum dolor sit amet</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                       <a href="#" class="btn_1">See More</a>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </div>
                        <div class="profile_info">
                           <img src="{{ asset('assets/img/client_img.png') }}" alt="#">
                           <div class="profile_info_iner">
                              <div class="profile_author_name">
                                 <p>@if(isset(Auth::user()->user_type) && Auth::user()->user_type ==0) National User @else Institute User @endif </p>
                                 <h5>{{Auth::user()->name}} {{Auth::user()->mname}} {{Auth::user()->lname}}</h5>
                              </div>
                              <div class="profile_info_details">
                                 <a href="{{ route('profile.edit',Auth::user()->id) }}">My Profile </a>
                                 <a href="#">Change Password</a>
                                 <a href="{{ route('logout') }}">Log Out </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                @yield('content')
            </div>
         </div>
         @include('partials.footer-script')
   </body>
   <!--end::Body-->
</html>