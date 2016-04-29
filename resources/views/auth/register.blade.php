@extends('layouts.app')

@section('title', 'register')

@section('content')

	<div class="row "><br><br><br><br><br>
		<div class="col s4 offset-s4">
			<div class="card-panel">
				{{--<p class="center"><img src="{{asset('img/cinema-pink.png')}}" width="70" height="70" alt="logo"></p>--}}
				<h5 class="header2 upper center">Register</h5>
				<div class="row">
					{!!Form::open(array('url' => '/auth/register' , 'method' => 'post'))!!}

					<div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-action-account-circle prefix"></i>
							{!!Form::text('name', null, array('id'=>'name'))!!}
							{!!Form::label('name','Name')!!}
							@if ($errors->has('name'))
								<span class="help-block red-text">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
							@endif
						</div>
					</div>
					<div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-communication-email prefix"></i>
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
							{!!Form::password('password', null, array('id' => 'password'))!!}
							{!!Form::label('password', 'Password')!!}
							@if ($errors->has('password'))
								<span class="help-block red-text">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
							@endif
						</div>
					</div>
					<div class="row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-action-lock-outline prefix"></i>
							{!!Form::password('password_confirmation', null, array('id' => 'password_confirmation'))!!}
							{!!Form::label('password_confirmation', 'Confirm Password')!!}
							@if ($errors->has('password_confirmation'))
								<span class="help-block red-text">
										<strong>{{ $errors->first('password_confirmation') }}</strong>
									</span>
							@endif
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							{!!Form::submit('Register', array('class' =>'btn cyan waves-effect waves-light right'))!!}
						</div>
					</div>

					{!!Form::token()!!}
					{!!Form::close()!!}
				</div>
			</div>

		</div>
	</div>

@endsection