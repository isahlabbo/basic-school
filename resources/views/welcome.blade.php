<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>{{config('app.name')}}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css"><![endif]-->
</head>
<body>
<div id="header">
  <div> <a href="index.html"><img src="assets/images/logo.gif" alt=""></a>
    <ul>
        <li class="current"><a href="#">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact us</a></li>
        @auth
            <li><a href="{{ url('/dashboard') }}" class=" current">Dashboard</a></li>
        @else
            <li><a href="{{ route('login') }}" class="">Log in</a></li>
        @endauth
    </ul>
  </div>
</div>
<div id="content">
  <div>
    <div>
      <h1>Basics School</h1>
      <p>This website template has been designed by Free Website Templates for you, for free. You can replace all this text with your own text. 
	  You can remove any link to our website from this website template, you're free to use this website template without linking
	  back to us. If you're having problems editing this website template, then don't hesitate to ask for help on the Forum.</p>
      <h2>Nursery School</h2>
      <p>
	  Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
	  euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad mini
	  m veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl u
	  t aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulpu
	  tate velit esse molestie consequeat, vel illum dolore eu feugiat nulla facilisis at vero ero
	  s et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis \
	  dolore te feugait nulla facilisi.
	  </p>
	  <h2>Primary School</h2>
      <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis quifacit eorum claritatem. Investigationes demonstraverunt lectores legere me luis quod ii legunt saepius.</p>
    </div>
  </div>
</div>
<div id="footer">
  <div>
    <div> <span>Follow us</span> <a href="#" class="facebook">Facebook</a> <a href="#" class="subscribe">Subscribe</a> <a href="#" class="twitter">Twitter</a> <a href="#" class="flicker">Flickr</a> </div>
    <ul>
      <li> <a href="#"><img src="assets/images/playing-in-grass.gif" alt=""></a>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.</p>
        </li>
      <li> <a href="#"><img src="assets/images/baby-smiling.gif" alt=""></a>
        <p>Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud.</p>
        </li>
    </ul>
  </div>
  <p class="footnote">Copyright &copy; 2012 <a href="#">Way Forward International Academy</a> All rights reserved | Website Designed By <a target="_blank" href="http://www.catsol.com/">Chaliphate Tech Solution Limited</a></p>
</div>
</body>
</html>
