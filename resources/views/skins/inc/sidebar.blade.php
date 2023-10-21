   <div class="container-fluid page-body-wrapper">
       <!-- partial:partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
           <ul class="nav">
               <li class="nav-item">
                   <a class="nav-link" href="{{ route('index') }}">
                       <i class="ti-shield menu-icon"></i>
                       <span class="menu-title">Dashboard</span>
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                       aria-controls="ui-basic">
                       <i class="ti-hand-point-up menu-icon"></i>
                       <span class="menu-title">Add Details</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="collapse" id="ui-basic">
                       <ul class="nav flex-column sub-menu">
                           <li class="nav-item"> <a class="nav-link" href="{{ route('add.sector') }}">Add Sector</a>
                           </li>
                           <li class="nav-item"> <a class="nav-link" href="{{ route('add.employer') }}">Employer</a>
                           </li>
                           <li class="nav-item"> <a class="nav-link" href="{{ route('add.employee') }}">Employee</a>
                           </li>
                       </ul>
                   </div>
               </li>

               <li class="nav-item">
                   <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                       <i class="ti-user menu-icon"></i>
                       <span class="menu-title">List</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="collapse" id="auth">
                       <ul class="nav flex-column sub-menu">
                           {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('workers-list') }}"> Wokers List</a></li> --}}
                           <li class="nav-item"> <a class="nav-link" href="{{ route('employer.list') }}">Employers
                                   List</a>
                           <li class="nav-item"> <a class="nav-link" href="{{ route('workers.list') }}">Employee
                                   List</a>
                           <li class="nav-item"> <a class="nav-link" href="{{ route('sector.list') }}">Sectors List</a>
                           </li>
                       </ul>
                   </div>
               </li>
               <li class="nav-item">
                   <a class="nav-link" data-toggle="collapse" href="#new-dropdown" aria-expanded="false"
                       aria-controls="new-dropdown">
                       <i class="ti-reload menu-icon"></i>
                       <span class="menu-title">Renewal</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="collapse" id="new-dropdown">
                       <ul class="nav flex-column sub-menu">
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('employer.renewal') }}">Employer</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('employee.renewal') }}">Employee</a>
                           </li>
                           {{-- <li class="nav-item">
                               <a class="nav-link" href="">Item 3</a>
                           </li> --}}
                       </ul>
                   </div>
               </li>
               <li class="nav-item">
                   <a class="nav-link" data-toggle="collapse" href="#next-dropdown" aria-expanded="false"
                       aria-controls="next-dropdown">
                       <i class="ti-list menu-icon"></i>
                       <span class="menu-title">Renewal List</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="collapse" id="next-dropdown">
                       <ul class="nav flex-column sub-menu">
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('renewal.list') }}">Renewal List</a>
                           </li>
                           <li class="nav-item">
                               {{-- <a class="nav-link" href="{{ route('employee.renewal') }}">Employee</a> --}}
                           </li>
                           {{-- <li class="nav-item">
                               <a class="nav-link" href="">Item 3</a>
                           </li> --}}
                       </ul>
                   </div>
               </li>


               {{-- <li class="nav-item">
                   <a class="nav-link" href="documentation/documentation.html">
                       <i class="ti-write menu-icon"></i>
                       <span class="menu-title">Documentation</span>
                   </a>
               </li> --}}
           </ul>
       </nav>
