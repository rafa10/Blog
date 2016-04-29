@extends('layouts.master')

@section('title', 'Ajouter aricle')

@section('content')
	<div class="container">
		<div class="row"><br><br><br><br>
			@if (Auth::guest())
			@else
			<div class="col s12 m8 offset-m2">
				<div class="valign-wrapper">
					<h3 class="valign">Dashboard</h3>
				</div>
			</div>
			@endif
			<div class="row ">
				<div class="col s8 offset-s2">
					<div class="card-panel">
						<h5 class="header2 upper center">Ajouter article</h5>
						<div class="row">
							{!!Form::open(array('url' => route('articles.store') , 'method' => 'post'))!!}

							<div class="row">
								<div class="input-field col s6 {{ $errors->has('author') ? ' has-error' : '' }}">
									<i class="mdi-action-account-circle prefix"></i>
									{!!Form::text('author', null, array('id'=>'author'))!!}
									{!!Form::label('author','Auteur')!!}
									@if ($errors->has('author'))
										<span class="help-block red-text">
											<strong>{{ $errors->first('author') }}</strong>
										</span>
									@endif
								</div>
								<div class="input-field col s6 {{ $errors->has('title') ? ' has-error' : '' }}">
									<i class="mdi-editor-border-color prefix"></i>
									{!!Form::text('title', null, array('id'=>'title'))!!}
									{!!Form::label('title','Titre')!!}
									@if ($errors->has('title'))
										<span class="help-block red-text">
											<strong>{{ $errors->first('title') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="row {{ $errors->has('content') ? ' has-error' : '' }}">
								<div class="input-field col s12">
									<i class="mdi-editor-format-align-justify prefix"></i>
									{!!Form::textarea('content', null, array('class'=>'materialize-textarea','id'=>'content'))!!}
									{!!Form::label('content','Contenu')!!}
									@if ($errors->has('content'))
										<span class="help-block red-text">
											<strong>{{ $errors->first('content') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									{!!Form::submit('Ajouter', array('class' =>'btn cyan waves-effect waves-light right'))!!}
								</div>
							</div>

							{!!Form::token()!!}
							{!!Form::close()!!}
						</div>
					</div>

				</div>
			</div>
	</div>

@endsection