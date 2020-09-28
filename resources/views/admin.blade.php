@extends('app')
@section('admin-page')
	<div class="admin">
		<div class="wrapper fadeInDown">
		  <div id="formContent">
		  	@if(Route::currentRouteName() === 'admin')
		  		<form role="form" method="POST" action="{{ url('/admin/login') }}">
			    	{{ csrf_field() }}
			      <input type="email" class="fadeIn second" name="email" placeholder="login" required="">
			      <input type="password" class="fadeIn third" name="password" placeholder="password" required="">
			      <input type="submit" class="fadeIn fourth" value="Log In">
			    </form>
			    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 2)
						<p class="login-error">Credentials do not match, please try again.</p>
				@endif
			    <!-- <div id="formFooter">
			      <a class="underlineHover" href="{{ url('/admin/password/reset') }}">Forgot Password?</a>
			    </div> -->
			@elseif(Route::currentRouteName() === '/admin/register')
				<form role="form" method="POST" action="{{ url('/admin/register') }}">
			    	{{ csrf_field() }}
			    	<input type="text" class="fadeIn second" name="name" placeholder="name" required="">
			     	<input type="email" class="fadeIn second" name="email" placeholder="email" required="">
			      	<input type="password" class="fadeIn third" name="password" placeholder="password" required="">
			      	<input type="submit" class="fadeIn fourth" value="Register">
			    </form>
			 @else
			 	<form role="form" method="POST" action="{{ url('/admin/password/reset') }}">
			    	{{ csrf_field() }}
			     	<input type="email" class="fadeIn second" name="email" placeholder="enter your email id" required="">
			      	<input type="submit" class="fadeIn fourth" value="Send">
			    </form>
			     @if(!empty(Session::get('error_code')) && Session::get('error_code') == 3)
						<p class="login-error">Check email for password reset link.</p>
				@endif
			 @endif
			</div>
		</div>
	</div>
@endsection