@extends('layouts.master')

@section('title', 'home')

@section('content')

	<div class="container">
		    <div class="row center"><br><br><br><br>
				<div class="col s12 m6">
					<div class="valign-wrapper">
						<h3 class="valign">Dashboard</h3>
					</div>
				</div>
				{{--<div class="col s12 m6">
					<nav>
						<div class="nav-wrapper">
							{!!Form::open(array('url'=> route('search'), 'method' => 'GET'))!!}
								<div class="input-field white">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input id="search" type="search" name="search" placeholder="Recherche" required>
									<label for="search"><i class="material-icons black-text ">search</i></label>
									<i class="material-icons">close</i>
								</div>
							{!!Form::close()!!}
						</div>
					</nav>
				</div>--}}
			</div>
		@if(Session::has('create'))
			<div class="row">
				<div class="col s12">
					<div id="card-alert" class="card green lighten-5">
						<div class="card-content green-text center">
							<p><i class="material-icons">error_outline</i> {{Session::get('create')}}</p>
						</div>
					</div>
				</div>
			</div>
		@elseif(Session::has('delete'))
			<div class="row">
				<div class="col s12">
					<div id="card-alert" class="card green lighten-5">
						<div class="card-content green-text center">
							<p><i class="material-icons">error_outline</i> {{Session::get('delete')}}</p>
						</div>
					</div>
				</div>
			</div>
		@endif

		<h5><i class="fa fa-clipboard "></i> Mes Articles </h5>

		<table class="centered bordered responsive-table white z-depth-1">
			<thead class="grey lighten-3">
			<tr>
				<th data-field="Id">Id</th>
				<th data-field="name">Auteur</th>
				<th data-field="name">Contenu</th>
				<th data-field="name">Publier</th>
				<th data-field="name">Online</th>
				<th data-field="action" colspan="3">Action</th>
			</tr>
			</thead>
			@foreach($articles as $item)
				<tbody>
				<tr>
					<td>{{$item->id}}</td>
					<td>{{$item->author}}</td>
					<td>{{str_limit($item->content,100)}}</td>
					<td>{{$item->created_at->formatLocalized('%d %B %Y')}}</td>
					<td>
						@if($item->online == 1)
							<a class="btn-floating btn-large waves-effect waves-light cyan" href="{{route('published_off.articles', $item->id)}}">OFF</a>
						@else
							<a class="btn-floating btn-large waves-effect waves-light grey" href="{{route('published.articles', $item->id)}}">ON</a>
						@endif
					</td>
					<td>
						<a class="btn-floating btn-large waves-effect waves-light green" href="{{route('articles.create')}}"><i class="small material-icons ">add</i></a>
						@if($item->online == 1)
							<a class="btn-floating btn-large waves-effect waves-light pink" href="{{route('articles.show', $item->id)}}"><i class="small mdi-action-visibility "></i></a>
						@else
							<a class="btn-floating btn-large waves-effect waves-light purple" href="{{route('articles.show', $item->id)}}"><i class="small mdi-action-visibility-off "></i></a>
						@endif
						<a class="btn-floating btn-large waves-effect waves-light blue" href="{{route('articles.edit', $item->id)}}"><i class="small material-icons ">mode_edit</i></a>
						<a class="btn-floating btn-large waves-effect waves-light red" href="{{route('articles.destroy', $item->id)}}" onclick="return confirm('Vous etez sur?')"><i class="small material-icons">delete</i></a>
					</td>
				</tr>
				</tbody>
			@endforeach
		</table>
	</div>

@endsection