<div class="logo d-flex justify-content-between">
            <a class="large_logo" ><img src="{{ asset('assets/img/logo_white.png') }}" alt></a>
            <a class="small_logo"><img src="{{ asset('assets/img/mini_logo.png') }}" alt style="height: 25px;"></a>
            <div class="sidebar_close_icon d-lg-none">
               <i class="ti-close"></i>
            </div>
         </div>
         <ul id="sidebar_menu">
            <li class>
               <a href="@if(isset(Auth::user()->user_type) && Auth::user()->user_type ==1) {{ route('institue-user.dashboard') }} @else {{ route('national-user.dashboard') }} @endif" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/dashboard.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>Dashboard</span>
                  </div>
               </a>
            </li>
            @if(isset(Auth::user()->user_type) && Auth::user()->user_type ==1)
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/2.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>SOE & UC</span>
                  </div>
               </a>
               <ul>
                  <li><a href="{{ route('institue-user.SOE-&-UC') }}">Create</a></li>
                  <li><a href="{{ route('institue-user.SOE-&-UC-list') }}">List</a></li>
               </ul>
            </li>
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/3.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>SOE | UC Upload</span>
                  </div>
               </a>
               <ul>
                  <li><a href="{{ route('institue-user.SOE-UC-upload') }}">Create</a></li>
                  <li><a href="{{ route('institue-user.SOE-UC-upload-list') }}">List</a></li>
               </ul>
            </li>
            @endif
            @if(isset(Auth::user()->user_type) && Auth::user()->user_type ==0)
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/4.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>NOHPPCZ -RC's</span>
                  </div>
               </a>
               <ul>
                  <li><a href="#">Create</a></li>
                  <li><a href="#">List</a></li>
               </ul>
            </li>
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/11.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>NOHPPCZ -SSS</span>
                  </div>
               </a>
               <ul>
                  <li><a href="#">Create</a></li>
                  <li><a href="#">List</a></li>
               </ul>
            </li>
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/5.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>NRCP -Lab</span>
                  </div>
               </a>
               <ul>
                  <li><a href="#">Create</a></li>
                  <li><a href="#">List</a></li>
               </ul>
            </li>
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/8.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>PPCL -Lab</span>
                  </div>
               </a>
               <ul>
                  <li><a href="#">Create</a></li>
                  <li><a href="#">List</a></li>
               </ul>
            </li>
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/11.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>PM-ABHIM-SSS</span>
                  </div>
               </a>
               <ul>
                  <li><a href="#">Create</a></li>
                  <li><a href="#">List</a></li>
               </ul>
            </li>
         </ul>
         @endif