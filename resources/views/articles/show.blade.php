@extends('layouts.master')

@section('title', 'Ajouter aricle')

@section('content')
	<div class="container">
		<div class="row"><br><br><br><br>
			<div class="col s12 m8 offset-m2">
				<div class="valign-wrapper">
					<h3 class="valign">Dashboard</h3>
				</div>
			</div>
			<div class="row ">
				<div class="col s12 m8 offset-m2">
					<div class="card white">
						<div class="card-content black-text">
							<span class="card-title">{{$articles->title}}</span>
							<p>{{$articles->content}}<br><br></p>
							<p class="grey-text right">Publier par: <b>{{$articles->author}}</b> à {{$articles->created_at->format('d/m/Y')}}<br></p>
						</div>
						<div class="card-action">
							<a href="#" id="show"><i class="mdi-communication-comment"></i> commentaire</a>
							<a href="{{route('articles.edit', $articles->id)}}"><i class="mdi-editor-mode-edit"></i> Modifier</a>
						</div>
						<ul class="collection">
							@foreach($comments as $value)
								@if($value->articles_id === $articles->id)
									<li class="collection-item avatar">
										<i class="mdi-communication-comment circle">folder</i>
										<span class="title grey-text"></span>
										<p>{{$value->content}} <br>
											<span class="grey-text">Publier: {{$value->created_at}}</span>
										</p>
										<a href="{{route('comments.destroy', $value->id)}}" class="secondary-content" onclick="return confirm('Vous etez sur?')"><i class="small mdi-action-delete red-text"></i></a>
									</li>
								@endif
							@endforeach
						</ul>
					</div>
				</div>
			</div>
	</div>

@endsection