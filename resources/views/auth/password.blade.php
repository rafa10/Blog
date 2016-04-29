@extends('layouts.app')

@section('title', 'password')

@section('content')

	<div class="row "><br><br><br><br><br>
		<div class="col s4 offset-s4">
			<div class="card-panel">
				{{--<p class="center"><img src="{{asset('img/cinema-pink.png')}}" width="70" height="70" alt="logo"></p>--}}
				<h5 class="header2 upper center">Reset Password</h5>
				<div class="row">

					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					{!!Form::open(array('url' => '/password/email' , 'method' => 'post'))!!}

					<div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="input-field col s12">
							<i class="mdi-communication-email prefix"></i>
							{!!Form::email('email', null, array('id'=>'email'))!!}
							{!!Form::label('email','E-Mail Address')!!}
							@if ($errors->has('email'))
								<span class="help-block red-text">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
							@endif
						</div>
					</div>


					<div class="row">
						<div class="input-field col s12">
							{!!Form::submit('Send Password Reset Link', array('class' =>'btn cyan waves-effect waves-light right'))!!}
						</div>
					</div>

					{!!Form::token()!!}
					{!!Form::close()!!}
				</div>
			</div>

		</div>
	</div>
@endsection