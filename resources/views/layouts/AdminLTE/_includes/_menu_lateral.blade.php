<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header" style="color:#fff;"> Danh sách <i class="fa fa-level-down"></i></li>
			<li class="
						{{ Request::segment(1) === null ? 'active' : null }}
						{{ Request::segment(1) === 'home' ? 'active' : null }}
					  ">
				<a href="{{ route('home') }}" title="Dashboard"><i class="fa fa-dashboard"></i> <span>Tổng quan</span></a>
			</li>

			@if(Request::segment(1) === 'profile')

			<li class="{{ Request::segment(1) === 'profile' ? 'active' : null }}">
				<a href="{{ route('profile') }}" title="Profile"><i class="fa fa-user"></i> <span>Hồ sơ</span></a>
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
                    <i class="fa fa-user"></i> <span> Quản trị viên</span>
                </a>
                <a href="{{ route('member.index') }}" title="Users">
                    <i class="fa fa-users"></i> <span> Học viên</span>
                </a>
                <a href="{{ route('course.index') }}" title="Course">
                    <i class="fa fa-book"></i><span> Khóa học</span>
                </a>
                <a href="{{ route('lesson.home') }}" title="Lessons">
                    <i class="fa fa-list-alt"></i><span> Bài học</span>
                </a>
                <a href="{{ route('document.index') }}" title="Documents">
                    <i class="fa fa-file"></i><span> Tài liệu</span>
                </a>
                <a href="{{ route('review.index') }}" title="Documents">
                    <i class="fa fa-comments"></i><span>Nhận xét</span>
                </a>
                <a href="{{ route('tag.index') }}" title="Tags">
                    <i class="fa fa-tags"></i><span> Nhãn dán</span>
                </a>
            </li>
        </ul>
	</section>
</aside>
