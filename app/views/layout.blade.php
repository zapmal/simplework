<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simplework</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />

<link href="/css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/public/fonts.css" rel="stylesheet" type="text/css" media="all" />

@yield("bulma-style")
</head>
<body>
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="/">SimpleWork</a></h1>
			</div>
			<div id="menu">
				<ul>
					<li class="{{ Request::is("/") ? "current_page_item" : "" }}"><a href="/" accesskey="1" title="">Homepage</a></li>
					<li class="{{ Request::is("clients") ? "current_page_item" : "" }}"><a href="#" accesskey="2" title="">Our Clients</a></li>
					<li class="{{ Request::is("about") ? "current_page_item" : "" }}"><a href="/about" accesskey="3" title="">About Us</a></li>
					<li class="{{ Request::is("articles") ? "current_page_item" : "" }}"><a href="/articles" accesskey="4" title="">Articles</a></li>
					<li class="{{ Request::is("contacts") ? "current_page_item" : "" }}"><a href="#" accesskey="5" title="">Contact Us</a></li>
					
					@if (!Auth::check())
						<li style="margin-left: 120px;" class="{{ Request::is("users/login") ? "current_page_item" : "" }}">{{ HTML::link("users/login", "Login") }}</li>
						<li class="{{ Request::is("users/register") ? "current_page_item" : "" }}">{{ HTML::link("users/register", "Register") }}</li>	
					@else 
						<li>{{ HTML::link("users/logout", "Logout") }}</li>
					@endif
					
				</ul>
			</div>
		</div>

		@if (Session::has("message"))
			<h3 class="help">{{ Session::get("message") }}</h3>
		@endif

		@yield("header")

		@yield("content")

	<div id="copyright" class="container">
		<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
	</div>
</body>
</html>
