<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header" style="color:#fff;"> MAIN MENU <i class="fa fa-level-down"></i></li>
			<li class="
						{{ Request::segment(1) === null ? 'active' : null }}
						{{ Request::segment(1) === 'home' ? 'active' : null }}
					  ">
				<a href="{{ route('home') }}" title="Dashboard"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a>
			</li>

			@if(Request::segment(1) === 'profile')

			<li class="{{ Request::segment(1) === 'profile' ? 'active' : null }}">
				<a href="{{ route('profile') }}" title="Profile"><i class="fa fa-user"></i> <span> PROFILE</span></a>
			</li>

			@endif
			<li class="treeview
				{{ Request::segment(1) === 'config' ? 'active menu-open' : null }}
				{{ Request::segment(1) === 'user' ? 'active menu-open' : null }}
				{{ Request::segment(1) === 'role' ? 'active menu-open' : null }}
				">
            <li class="
						{{ Request::segment(1) === 'user' ? 'active' : null }}
            {{ Request::segment(1) === 'role' ? 'active' : null }}
                ">
                <a href="{{ route('user') }}" title="Users">
                    <i class="fa fa-user"></i> <span>Admin</span>
                </a>
                <a href="" title="Users">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
                <a href="{{ route('course.index') }}" title="Course">
                    <i class="fa fa-book"></i><span>Courses</span>
                </a>
                <a href="{{ route('tag.index') }}" title="Tags">
                    <i class="fa fa-tags"></i><span>Tags</span>
                </a>
                <a href="{{ route('lesson.home') }}" title="Lessons">
                    <i class="fa fa-book"></i><span>Lessons</span>
                </a>
                <a href="{{ route('document.index') }}" title="Documents">
                    <i class="fa fa-file"></i><span>Documents</span>
                </a>
            </li>
        </ul>
	</section>
</aside>
