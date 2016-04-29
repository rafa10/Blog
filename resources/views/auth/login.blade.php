@extends('layouts.app')

@section('title', 'login')

@section('content')

	<div class="row "><br><br><br><br><br>
		<div class="col s4 offset-s4">
			<div class="card-panel">
				{{--<p class="center"><img src="{{asset('img/cinema-pink.png')}}" width="70" height="70" alt="logo"></p>--}}
				<h5 class="header2 upper center">Login</h5>
				<div class="row">
					{!!Form::open(array('url' => '/auth/login' , 'method' => 'post')  )!!}

					<div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-action-account-circle prefix"></i>
							{!!Form::email('email', null, array('id'=>'email'))!!}
							{!!Form::label('email','Email')!!}
							@if ($errors->has('email'))
								<span class="help-block red-text">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
							@endif
						</div>
					</div>
					<div class="row {{ $errors->has('password') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-action-lock-outline prefix"></i>
							{!!Form::password('password', null, array('id' => 'password3'))!!}
							{!!Form::label('password', 'Password')!!}
							@if ($errors->has('password'))
								<span class="help-block red-text">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
							@endif
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							{!!Form::checkbox('remember', 1, false,array('id'=>'remember'))!!}
							{!!Form::label('remember', 'Remember Me')!!}
						</div>
					</div>


					<div class="row">
						<div class="input-field col s12">
							{!!Form::submit('Log in', array('class' =>'btn cyan waves-effect waves-light right'))!!}
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12 center">
							<a class="" href="{{ url('/password/email') }}">Forgot Your Password ?</a>
						</div>
					</div>

					{!!Form::token()!!}
					{!!Form::close()!!}
				</div>
			</div>

		</div>
	</div>
@endsection