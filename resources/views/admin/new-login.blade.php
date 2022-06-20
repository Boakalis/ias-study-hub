<!DOCTYPE html>
<html lang="en">
<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="msapplication-TileColor" content="#2aa87e" />
          <meta name="theme-color" content="#2aa87e" />
          <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
          <meta name="apple-mobile-web-app-capable" content="yes" />
          <meta name="mobile-web-app-capable" content="yes" />
          <meta name="HandheldFriendly" content="True" />
          <meta name="Duplex VehiclesOptimized" content="320" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/new-login.css')}}">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">

    <meta name="description" content="@page-discription">
    @yield('meta_title')
    <!-- Page Title  -->
    <title> Referer Login| IAS StudyHub</title>

</head>
<body>


    <div class="content">
        <div>



          <div class="login-header">
          <img src="{{asset($globalSettings->logo)}}" alt="IASSTUDYHUB" >
          <h1>Sign in</h1>
          <p>Enter your email and your password  and login <br> to your dashboard now</p>
        </div>
        @if(Session::has('alert-danger'))
        <center>
            <div class="alert alert-success alert-dismissible fade show alert-danger" role="alert">
                <strong></strong><span style="color: red" >{{ Session::get('alert-danger') }}</span>
            </div>
        </center>

        @endif
        <div class="form-container">
           <form method="post" class="login-form" action="{{route('refererSignin')}}">
             <div class="form-group">
                <input type="text" name="name" placeholder="Username" required class="form-control">
             </div>
             <div class="form-group">
                <input type="password"  name="password" placeholder="Password" required class="form-control password-input">
             </div>
             <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">

             {{-- <div class="remeber-forget">
                <div class="left-side">
                     <input class="checkbox-input" id="checkbox-input1" type="checkbox" value="value1">
                   <label for="checkbox-input1">Remember me</label>
                </div>
                <div class="right-side">
                  <a href="#">Forget your password</a>
                </div>
             </div> --}}

             <div class="form-group">
                <button class="login-button">Sign in</button>
             </div>

           </form>
        </div>
        </div>
      </div>

    <script>
         $("#login-button").click(function(event){
		 event.preventDefault();

	 $('form').fadeOut(500);
	 $('.wrapper').addClass('form-success');
});
    </script>
</body>
</html>

