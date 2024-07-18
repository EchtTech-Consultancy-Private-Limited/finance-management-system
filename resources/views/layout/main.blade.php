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
                        <!-- <img src="{{ asset('assets/img/line_img.png') }}" alt> -->
                        <i class="bi bi-list"></i>
                     </div>
                     <!-- <div class="serach_field-area d-flex align-items-center">
                        <div class="search_inner">
                           <form action="#">
                              <div class="search_field">
                                 <input type="text" placeholder="Search">
                              </div>
                              <button type="submit"> <img src="{{ asset('assets/img/icon/icon_search.svg') }}" alt> </button>
                           </form>
                        </div>
                     </div> -->
                     <div class="dashboard-title">
                        <h1 class="title"> Finance Management System</h1>
                        <h6 class="text-center mb-1">{{ optional(Auth::user()->institute)->name }}</h6>
                     </div>
                     <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                           <li>
                               <a class="bell_notification_clicker" href="#">
                                   <img src="{{ asset('assets/img/icon/bell.svg') }}" alt>
                                   <span id="bell_notification_clicker"></span>
                               </a>
                               <div class="Menu_NOtification_Wrap">
                                   <div class="notification_Header">
                                    <div class="d-flex justify-content-between">
                                       <h4>Notifications </h4>
                                       <span class="notification-total text-white">0</span>
                                    </div>
                                   </div>
                                   <div class="Notification_body">
                                     <ul>
                                       <li>Please click to see notification</li>
                                       <li>Please click to see notification</li>
                                       <li>Please click to see notification</li>
                                     </ul>
                                       <!-- <div class="mb-4 total-resolved">
                                           <h2 class="mb-3">0</h2>
                                           <h4>Total Resolved /<span class="text-danger">Reported</span></h4>
                                       </div> -->
                                       <div class="confirm-pending">
                                           <div class="col">
                                               <div class="status">
                                                  <h5>Confirmed</h5>
                                                  <span>0</span>
                                               </div>
                                           </div>
                                           <div class="col">
                                               <div class="status">
                                                  <h5>Pending</h5>
                                                  <span>0</span>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </li>
                       </div>                       
                        <div class="profile_info">
                           <img src="{{ asset('assets/img/client_img.png') }}" alt="#">
                           <div class="profile_info_iner">
                              <div class="profile_author_name">
                                 <div class="profile_img">
                                    <img src="{{ asset('assets/img/client_img.png') }}" alt>
                                 </div>
                                 <div class="profile_img">
                                    <p>@if(isset(Auth::user()->user_type) && Auth::user()->user_type ==0) National User @elseif(isset(Auth::user()->user_type) && Auth::user()->user_type ==1) Institute User @else Admin @endif </p>
                                    <h5>{{Auth::user()->name}} {{Auth::user()->mname}} {{Auth::user()->lname}}</h5>
                                 </div>
                                 
                              </div>
                              <div class="profile_info_details">
                                 <a href="{{ route('profile.edit',Auth::user()->id) }}"> <i class="bi bi-person-circle"></i> My Profile </a>
                                 <a href="{{ route('password.update',Auth::user()->id) }}"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a>
                                 <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i>Log Out </a>
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