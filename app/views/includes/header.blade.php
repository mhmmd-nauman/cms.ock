<link rel="stylesheet" href="/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/neon-core.css">
	<link rel="stylesheet" href="/assets/css/neon-theme.css">
	<link rel="stylesheet" href="/assets/css/neon-forms.css">
	<link rel="stylesheet" href="/assets/css/custom.css">

	

<!-- Start HEADER
========================== -->
<div id="header">
    
    <div class="logo-social clearfix"  >
                <a href="{{ URL::to('/') }}" class="logo"><!-- --></a>
                <div class="col-md-6 col-sm-8 pull-right clearfix " valign=" bottom">
		@if(Session::has('user'))
		<ul class="user-info pull-right pull-none-xsm"style=" padding-top: 20px;">
                    
			<!-- Profile Info -->
			<li class="profile-info dropdown" >
                            <!-- add class "pull-right" if you want to place this from right -->
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    {{$user->firstName}} {{$user->lastName}}
					<img src="/assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
					
				</a>
				
				<ul class="dropdown-menu">
					
					<!-- Reverse Caret -->
					<li class="caret"></li>
					
					<!-- Profile sub-links -->
                                        <li>
						<a href="{{ URL::to('myaccount') }}">
							<i class="entypo-user"></i>
							Dashboard
						</a>
					</li>
					<li>
						<a href="{{ URL::to('editprofile') }}">
							<i class="entypo-user"></i>
							Edit Profile
						</a>
					</li>
					
					<li>
						<a href="mailbox.html">
							<i class="entypo-mail"></i>
							Inbox
						</a>
					</li>
					
					<li>
						<a href="extra-calendar.html">
							<i class="entypo-calendar"></i>
							Calendar
						</a>
					</li>
					
					<li>
						<a href="#">
							<i class="entypo-clipboard"></i>
							Tasks
						</a>
					</li>
                                        <li>
						<a href="{{ URL::to('logout') }}">
							<i class="entypo-clipboard"></i>
							Logout
						</a>
					</li>
				</ul>
			</li>
		
		</ul>
				
		<ul class="user-info pull-right pull-right-xs pull-none-xsm" style=" padding-top: 20px;">
			
			<!-- Raw Notifications -->
			<li class="notifications dropdown">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="entypo-attention"></i>
					<span class="badge badge-info">6</span>
				</a>
				
				<ul class="dropdown-menu">
					<li class="top">
                                            <p class="small" style="width: 200px;">
		<a href="#" class="pull-right">Mark all Read</a>
		You have <strong>3</strong> new notifications.
	</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller">
		<li class="unread notification-success">
			<a href="#">
				<i class="entypo-user-add pull-right"></i>
				
				<span class="line">
					<strong>New user registered</strong>
				</span>
				
				<span class="line small">
					30 seconds ago
				</span>
			</a>
		</li>
		
		<li class="unread notification-secondary">
			<a href="#">
				<i class="entypo-heart pull-right"></i>
				
				<span class="line">
					<strong>Someone special liked this</strong>
				</span>
				
				<span class="line small">
					2 minutes ago
				</span>
			</a>
		</li>
		
		<li class="notification-primary">
			<a href="#">
				<i class="entypo-user pull-right"></i>
				
				<span class="line">
					<strong>Privacy settings have been changed</strong>
				</span>
				
				<span class="line small">
					3 hours ago
				</span>
			</a>
		</li>
		
		<li class="notification-danger">
			<a href="#">
				<i class="entypo-cancel-circled pull-right"></i>
				
				<span class="line">
					John cancelled the event
				</span>
				
				<span class="line small">
					9 hours ago
				</span>
			</a>
		</li>
		
		<li class="notification-info">
			<a href="#">
				<i class="entypo-info pull-right"></i>
				
				<span class="line">
					The server is status is stable
				</span>
				
				<span class="line small">
					yesterday at 10:30am
				</span>
			</a>
		</li>
		
		<li class="notification-warning">
			<a href="#">
				<i class="entypo-rss pull-right"></i>
				
				<span class="line">
					New comments waiting approval
				</span>
				
				<span class="line small">
					last week
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="#">View all notifications</a>
</li>				</ul>
				
			</li>
			
			<!-- Message Notifications -->
			<li class="notifications dropdown">
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="entypo-mail"></i>
					<span class="badge badge-secondary">10</span>
				</a>
				
				<ul class="dropdown-menu">
					<li>
	<ul class="dropdown-menu-list scroller">
		<li class="active">
			<a href="#">
				<span class="image pull-right">
					<img src="/assets/images/thumb-1.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					<strong>Luc Chartier</strong>
					- yesterday
				</span>
				
				<span class="line desc small">
					This ain’t our first item, it is the best of the rest.
				</span>
			</a>
		</li>
		
		<li class="active">
			<a href="#">
				<span class="image pull-right">
					<img src="/assets/images/thumb-2.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					<strong>Salma Nyberg</strong>
					- 2 days ago
				</span>
				
				<span class="line desc small">
					Oh he decisively impression attachment friendship so if everything. 
				</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<span class="image pull-right">
					<img src="/assets/images/thumb-3.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					Hayden Cartwright
					- a week ago
				</span>
				
				<span class="line desc small">
					Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
				</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<span class="image pull-right">
					<img src="/assets/images/thumb-4.png" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					Sandra Eberhardt
					- 16 days ago
				</span>
				
				<span class="line desc small">
					On so attention necessary at by provision otherwise existence direction.
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="mailbox.html">All Messages</a>
</li>				</ul>
				
			</li>
			
			<!-- Task Notifications -->
			
		
		</ul>
                @endif
	</div> 
               
        </div>
          
        <!-- Start MAIN MENU
========================== -->
        <div class="main-menu">    
<nav id="main-nav">
<ul>
    <li class="home current indicator"><div class="first">&nbsp;</div>
    </li>
    <li class=""><a href="{{ URL::to('/') }}">&nbsp;</a> </p>

    
    </li>
    <li class=" indicator"><a href="{{ URL::to('/') }}">Deed</a> </p>

    <ul class="submenu">
      <li class="current"><a href="{{ URL::to('open') }}">Open</a></li>
      <li><a href="{{ URL::to('closed') }}">Closed</a></li>
      <li><a href="{{ URL::to('pushed') }}" class="last">Pushed</a></li>
    </ul>
    </li>
    <li class="indicator"><a href="{{ URL::to('formulas') }}">Formulas</a>
    <ul class="submenu">
      <li><a href="{{ URL::to('category') }}">Category</a></li>
      <li><a href="{{ URL::to('formulas') }}">Formula</a></li>
    </ul>
    </li>
    <li>
        <a href="{{ URL::to('marketplace') }}">Marketplace</a>
    </li>
    <li>
        <a href="{{ URL::to('feedback') }}">Feedback</a>
    </li>
</ul>
</nav>
</div>
</div>
<!-- #End HEADER -->
