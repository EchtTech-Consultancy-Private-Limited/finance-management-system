<div class="logo d-flex justify-content-between">
   <a class="large_logo text-white">
       <img src="{{ asset('assets/img/FMSDashboard.png') }}" alt class="mb-2"><br>
       <b>{{ Auth::user()->user_type == 'admin' ? 'Admin' : (Auth::user()->user_type == '0' ? 'National' : 'Institute') }} Dashboard</b>
   </a>
   <a class="small_logo"><img src="{{ asset('assets/img/FMSDashboard.png') }}" alt style="height: 25px;"></a>
   <div class="sidebar_close_icon d-lg-none">
       <i class="ti-close"></i>
   </div>
</div>

<ul id="sidebar_menu">
    <li>
        <a class="{{ request()->routeIs('institute-user.dashboard') || request()->routeIs('national-user.dashboard') || request()->routeIs('admin.dashboard') ? 'active-nav' : '' }}" 
           href="@if(Auth::user()->user_type == 1) {{ route('institute-user.dashboard') }} 
           @elseif(Auth::user()->user_type == 0) {{ route('national-user.dashboard') }} 
           @else {{ route('admin.dashboard') }} 
           @endif" aria-expanded="false">
            
           <div class="nav_icon_small">
              <img src="{{ asset('assets/img/menu-icon/dashboard.svg') }}" alt>
           </div>
           <div class="nav_title">
              <span>{{ Auth::user()->user_type == 0 ? 'Integrated Dashboard' : 'Dashboard' }}</span>
           </div>
        </a>
     </li>
     
   @if(Auth::user()->user_type == 'admin')
       <li>
           <a href="{{ route('admin.facility-mapping') }}" class="{{ request()->routeIs('admin.facility-mapping') ? 'active-nav' : '' }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{ asset('assets/img/menu-icon/2.svg') }}" alt>
               </div>
               <div class="nav_title">
                   <span>Facility Center Mapping</span>
               </div>
           </a>
       </li>
       <li>
           <a href="{{ route('admin.ucuploads.index') }}" class="{{ request()->routeIs('admin.ucuploads.index') ? 'active-nav' : '' }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <img src="{{ asset('assets/img/menu-icon/2.svg') }}" alt>
               </div>
               <div class="nav_title">
                   <span>UC Form Upload</span>
               </div>
           </a>
       </li>
       <li class="{{ request()->routeIs('admin.programs.index','admin.institutes.index') ? 'dropdown-active' : '' }}">
           <a class="has-arrow" href="#" aria-expanded="false">
               <div class="nav_icon_small">
                   <i class="fas fa-file-alt"></i>
               </div>
               <div class="nav_title">
                   <span>Master</span>
               </div>
           </a>
           <ul>
               <li><a href="{{ route('admin.programs.index') }}" class="{{ request()->routeIs('admin.programs.index') ? 'active-nav' : '' }}">Programs</a></li>
               <li><a href="{{ route('admin.institutes.index') }}" class="{{ request()->routeIs('admin.institutes.index') ? 'active-nav' : '' }}">Institutes</a></li>
           </ul>
       </li>
   @endif

   @if(Auth::user()->user_type == 1) <!-- Institute User -->
       <li class="{{ request()->routeIs('institute-user.soe-form','institute-user.soe-form-list') ? 'dropdown-active' : '' }}">
           <a class="has-arrow" href="#" aria-expanded="false">
               <div class="nav_icon_small">
                   <i class="fas fa-file-alt"></i>
               </div>
               <div class="nav_title">
                   <span>SOE Form</span>
               </div>
           </a>
           <ul>
               <li><a href="{{ route('institute-user.soe-form') }}" class="{{ request()->routeIs('institute-user.soe-form') ? 'active-nav' : '' }}">SOE Form Entry</a></li>
               <li><a href="{{ route('institute-user.soe-form-list') }}" class="{{ request()->routeIs('institute-user.soe-form-list') ? 'active-nav' : '' }}">SOE Form Database</a></li>
           </ul>
       </li>

       <li class="{{ request()->routeIs('institute-user.SOE-UC-upload','institute-user.SOE-UC-upload-list') ? 'dropdown-active' : '' }}">
           <a class="has-arrow" href="#" aria-expanded="false">
               <div class="nav_icon_small">
                   <i class="fas fa-upload"></i>
               </div>
               <div class="nav_title">
                   <span>UC Upload</span>
               </div>
           </a>
           <ul>
               <li><a href="{{ route('institute-user.SOE-UC-upload') }}" class="{{ request()->routeIs('institute-user.SOE-UC-upload') ? 'active-nav' : '' }}">UC Upload</a></li>
               <li><a href="{{ route('institute-user.SOE-UC-upload-list') }}" class="{{ request()->routeIs('institute-user.SOE-UC-upload-list') ? 'active-nav' : '' }}">UC Upload List</a></li>
           </ul>
       </li>

       <li>
           <a href="{{ asset('public/images/uploads/ucform/' . ucForm()) }}" target="_blank" class="{{ request()->routeIs('institute-user.uc-form-download') ? 'active-nav' : '' }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <i class="fas fa-download"></i>
               </div>
               <div class="nav_title">
                   <span>UC Form Download</span>
               </div>
           </a>
       </li>

       <li>
           <a href="{{ route('institute-user.report') }}" class="{{ request()->routeIs('institute-user.report') ? 'active-nav' : '' }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <i class="fas fa-file-invoice"></i>
               </div>
               <div class="nav_title">
                   <span>Generate Report</span>
               </div>
           </a>
       </li>
   @endif

   @if(Auth::user()->user_type == 0) <!-- National User -->
       <li>
           <a href="{{ route('national-user.soe-expense-index') }}" class="{{ request()->routeIs('national-user.soe-expense-index') ? 'active-nav' : '' }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <i class="fas fa-list"></i>
               </div>
               <div class="nav_title">
                   <span>SOE Uploaded List</span>
               </div>
           </a>
       </li>

       <li>
           <a href="{{ route('national-user.uc-upload-list') }}" class="{{ request()->routeIs('national-user.uc-upload-list') ? 'active-nav' : '' }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <i class="fas fa-list"></i>
               </div>
               <div class="nav_title">
                   <span>UC Uploaded List</span>
               </div>
           </a>
       </li>

       <li class="{{ request()->routeIs('national-user.nohppczrcs', 'national-user.nohppczrsss', 'national-user.nrcplab', 'national-user.ppcllab', 'national-user.pmabhimsss') ? 'dropdown-active' : '' }}">
           <a class="has-arrow" href="#" aria-expanded="true">
               <div class="nav_icon_small">
                   <i class="fas fa-file-alt"></i>
               </div>
               <div class="nav_title">
                   <span>Program List</span>
               </div>
           </a>
           <ul>
               <li><a href="{{ route('national-user.nohppczrcs') }}" class="{{ request()->routeIs('national-user.nohppczrcs') ? 'active-nav' : '' }}">NOHPPCZ -RC's</a></li>
               <li><a href="{{ route('national-user.nohppczrsss') }}" class="{{ request()->routeIs('national-user.nohppczrsss') ? 'active-nav' : '' }}">NOHPPCZ -SSS</a></li>
               <li><a href="{{ route('national-user.nrcplab') }}" class="{{ request()->routeIs('national-user.nrcplab') ? 'active-nav' : '' }}">NRCP -Lab</a></li>
               <li><a href="{{ route('national-user.ppcllab') }}" class="{{ request()->routeIs('national-user.ppcllab') ? 'active-nav' : '' }}">PPCL -Lab</a></li>
               <li><a href="{{ route('national-user.pmabhimsss') }}" class="{{ request()->routeIs('national-user.pmabhimsss') ? 'active-nav' : '' }}">PM-ABHIM-SSS</a></li>
           </ul>
       </li>

       <li>
           <a href="{{ route('national-user.report') }}" class="{{ request()->routeIs('national-user.report') ? 'active-nav' : '' }}" aria-expanded="false">
               <div class="nav_icon_small">
                   <i class="bi bi-file-earmark-text"></i>
               </div>
               <div class="nav_title">
                   <span>Generate Report</span>
               </div>
           </a>
       </li>
   @endif
</ul>
