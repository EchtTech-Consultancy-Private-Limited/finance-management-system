<div class="logo d-flex justify-content-between">
            <a class="large_logo" ><img src="{{ asset('assets/img/FMSDashboard.png') }}" alt></a>
            <a class="small_logo"><img src="{{ asset('assets/img/FMSDashboard.png') }}" alt style="height: 25px;"></a>
            <div class="sidebar_close_icon d-lg-none">
               <i class="ti-close"></i>
            </div>
         </div>
         <ul id="sidebar_menu">
            <li class=>
               <a href="@if(isset(Auth::user()->user_type) && Auth::user()->user_type ==1) {{ route('institute-user.dashboard') }} @elseif(isset(Auth::user()->user_type) && Auth::user()->user_type ==0) {{ route('national-user.dashboard') }} @else {{ route('admin.dashboard') }} @endif" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/dashboard.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>Dashboard</span>
                  </div>
               </a>
            </li>
            @if(isset(Auth::user()->user_type) && Auth::user()->user_type =='admin')
            <li class>
               <a href="{{ route('admin.facility-mapping') }}" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/2.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>Facility Mapping</span>
                  </div>
               </a>
            </li>
            @endif
            @if(isset(Auth::user()->user_type) && Auth::user()->user_type ==1)
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/2.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>SOE Form</span>
                  </div>
               </a>
               <ul>
                  <li><a href="{{ route('institute-user.SOE-&-UC') }}">SOE Form Entry</a></li>
                  <li><a href="{{ route('institute-user.SOE-&-UC-list') }}">SOE Form Database</a></li>
               </ul>
            </li>
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/3.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>UC Upload</span>
                  </div>
               </a>
               <ul>
                  <li><a href="{{ route('institute-user.SOE-UC-upload') }}">Create</a></li>
                  <li><a href="{{ route('institute-user.SOE-UC-upload-list') }}">List</a></li>
               </ul>
            </li>
            <li class=>
               <a href="{{ asset('assets/img/pdf/uc_form.pdf') }}" target="_blank" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/3.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>Form Download</span>
                  </div>
               </a>
            </li>
            <li class=>
               <a href="{{ route('institute-user.report') }}" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/3.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>Generate Report</span>
                  </div>
               </a>
            </li>
            @endif
            @if(isset(Auth::user()->user_type) && Auth::user()->user_type ==0)
            <li class>
               <a class="has-arrow" href="#" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/3.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>SOE Expense</span>
                  </div>
               </a>
               <ul>
                  <li><a href="{{ route('national-user.soe-expense-create') }}">SOE Expense Entry</a></li>
                  <li><a href="{{ route('national-user.soe-expense-index') }}">SOE Expense List</a></li>
               </ul>
               <!-- <ul>
               </ul> -->
            </li>
            <li class>
               <a class="" href="{{ route('national-user.nohppczrcs') }}" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/4.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>NOHPPCZ -RC's</span>
                  </div>
               </a>
               <!-- <ul>
                  <li><a href="#">Create</a></li>
                  <li><a href="#">List</a></li>
               </ul> -->
            </li>
            <li class>
               <a class="" href="{{ route('national-user.nohppczrsss') }}" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/11.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>NOHPPCZ -SSS</span>
                  </div>
               </a>
               <!-- <ul>
                  <li><a href="#">Create</a></li>
                  <li><a href="#">List</a></li>
               </ul> -->
            </li>
            <li class>
               <a class="" href="{{ route('national-user.nrcplab') }}" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/5.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>NRCP -Lab</span>
                  </div>
               </a>
               <!-- <ul>
                  <li><a href="#">Create</a></li>
                  <li><a href="#">List</a></li>
               </ul> -->
            </li>
            <li class>
               <a class="" href="{{ route('national-user.ppcllab') }}" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/8.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>PPCL -Lab</span>
                  </div>
               </a>
               <!-- <ul>
                  <li><a href="#">Create</a></li>
                  <li><a href="#">List</a></li>
               </ul> -->
            </li>
            <li class>
               <a class="" href="{{ route('national-user.pmabhimsss') }}" aria-expanded="false">
                  <div class="nav_icon_small">
                     <img src="{{ asset('assets/img/menu-icon/11.svg') }}" alt>
                  </div>
                  <div class="nav_title">
                     <span>PM-ABHIM-SSS</span>
                  </div>
               </a>
               <!-- <ul>
                  <li><a href="#">Create</a></li>
                  <li><a href="#">List</a></li>
               </ul> -->
            </li>
         </ul>
         @endif