<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		{{--<i class="fa fa-user"></i>--}}
		{{ $currentUser->getAvatar() }} &nbsp; {{ $currentUser->username }} <b class="caret"></b>
	</a>
	<ul class="dropdown-menu profile-dropdown">
		<li><a href="{{ route('admin.usuarios.edit', $currentUser->id) }}"><i class="fa fa-fw fa-user"></i> Profile</a></li>
		<li><a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a></li>
		<li class="divider"></li>
		<li><a href="{{ route('session.destroy') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
	</ul>
</li>