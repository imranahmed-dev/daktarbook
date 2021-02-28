<div id="sidebar" class="sidebar">

    <div data-scrollbar="true" data-height="100%">

        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="@if(!empty(Auth::user()->image)) {{asset( Auth::user()->image ) }} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>{{Auth::user()->name}}
                        <small>Admin</small>
                    </div>
                </a>
            </li>

            <li>
                <ul class="nav nav-profile">
                    <li><a href="{{route('admin.profile.index')}}"><i class="fa fa-user-circle"></i>Profile</a></li>
                    <li><a href="{{route('admin.profile.ep')}}"><i class="fa fa-key"></i> Change Password</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>


        <ul class="nav">
            <li class="nav-header">General</li>
            <li>
                <a href="{{route('home')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-users"></i>
                    <span>Admin</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('admin.index')}}"><i class="fa fa-list"></i> Admin List</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-map-marker"></i>
                    <span>Division</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('division.index')}}"><i class="fa fa-plus-list"></i> Division List</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-map-marker"></i>
                    <span>District</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('district.index')}}"><i class="fa fa-plus-list"></i> District List</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-tags"></i>
                    <span>Specialist</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('specialist.index')}}"><i class="fa fa-plus-list"></i> Specialist List</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-user-circle"></i>
                    <span>Normal User</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('normal.user.index')}}"><i class="fa fa-list"></i> Normal User lsit</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-medkit"></i>
                    <span>Doctors</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('doctor.create')}}"><i class="fa fa-plus-circle"></i> Add Doctor</a></li>
                    <li><a href="{{route('doctor.index')}}"><i class="fa fa-list"></i> All Doctor</a></li>
                    <li><a href="{{route('doctor.pending')}}"><i class="fa fa-spinner"></i> Pending Doctor</a></li>
                    <li><a href="{{route('doctor.approved')}}"><i class="fa fa-check"></i> Approved Doctor</a></li>
                    <li><a href="{{route('doctor.trashed.index')}}"><i class="fa fa-trash"></i> Trahsed Doctor</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-newspaper-o"></i>
                    <span>Blog</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('blog.create')}}"><i class="fa fa-plus-circle"></i> Add Blog</a></li>
                    <li><a href="{{route('blog.index')}}"><i class="fa fa-list"></i> Blog List</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-gear"></i>
                    <span>Site Settings</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('setting.index')}}"><i class="fa fa-plus-circle"></i> Settings</a></li>
                </ul>
            </li>


            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>

        </ul>

    </div>

</div>
<div class="sidebar-bg"></div>