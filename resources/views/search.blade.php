@extends('layouts.master')

@section('title', 'home')

@section('content')

	<div class="container">
		    <div class="row center"><br><br><br><br>
				<div class="col s12 m4 offset-m2">
					<div class="valign-wrapper">
						<h3 class="valign">Les articles</h3>
					</div>
				</div>
				<div class="col s12 m4">
					<nav>
						<div class="nav-wrapper">
							{!!Form::open(array('url'=> route('search'), 'method' => 'GET'))!!}
								<div class="input-field white">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input id="search" type="search" name="search" value="{{old('search')}}" required>
									<label for="search"><i class="material-icons black-text ">search</i></label>
									<i class="material-icons">close</i>
								</div>
							{!!Form::close()!!}
						</div>
					</nav>
				</div>
			</div>
			<div class="row">
				@if(count($articles) === 0)
					<div class="col s12 m8 offset-m2">
						<div class="card white">
							<div class="card-content black-text">
								<span class="card-title">Résultat de la recherche "{{$query}}"</span>

								<p class="center"><i class="small mdi-alert-error"></i><br>Aucun résultat de recherche trouvé.</p>
							</div>
						</div>
					</div>
				@else
					@foreach($articles as $item)
						<div class="col s12 m8 offset-m2">
							<div class="card white">
								<div class="card-content black-text">
									<span class="card-title">{{$item->title}}</span>
									<p id="para1" data-field-id="idHide_{{$item->id}}">{{str_limit($item->content, 150)}}<a href="#" id="showPara">Afficher la suite</a><br><br></p>
									<p id="para2" data-field-id="idShow_{{$item->id}}"  class="hide">{{$item->content}}<br><br></p>
									<p class="grey-text right">Publier par: <b>{{$item->author}}</b> à {{$item->created_at->format('d/m/Y')}}</p>
								</div>
								<div class="card-action">
									<a href="#" id="show"><i class="mdi-communication-comment"></i> commentaire</a>
									{{--<a href="{{route('articles.edit', $item->id)}}"><i class="mdi-editor-mode-edit"></i> Modifier</a>--}}
								</div>
								<div id="form_{{$item->id}}" class="card-action form hide">
									<a href="#" id="hide"><i class="mdi-content-clear right "></i></a>
									{!!Form::open(array('url'=> route('comments.store'), 'method' => 'POST'))!!}
									<div class="row {{ $errors->has('content') ? ' has-error' : '' }}">
										<div class="input-field col s1">
											<i class="small mdi-action-account-circle "></i>
										</div>
										<div class="input-field col s11 center">
											<i class="mdi-communication-comment prefix"></i>
											{!!Form::hidden('articles_id', $item->id, array('id'=>'articles_id'))!!}
											{!!Form::text('content', null, array('class'=>'icon_prefix','id'=>'content'))!!}
											{!!Form::label('content','Commentaire')!!}
											@if ($errors->has('content'))
												<span class="help-block red-text">
													<strong>{{ $errors->first('content') }}</strong>
												</span>
											@endif
										</div>
									</div>
									{!!Form::close()!!}
								</div>
								<ul id="comments_{{$item->id}}" class="collection comments hide">
									@foreach($comments as $value)
										@if($value->articles_id === $item->id)
											<li class="collection-item avatar">
												<i class="mdi-communication-comment circle">folder</i>
												<span class="title grey-text"></span>
												<p>{{$value->content}} <br>
													<span class="grey-text">Publier: {{$value->created_at}}</span>
												</p>
												<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
											</li>
										@endif
									@endforeach
								</ul>
							</div>
						</div>
					@endforeach
				@endif
			</div>
	</div>

@endsection