@extends('myapp')

@section('content')
	<section>
		<div class="container-fluid">
			<div class="jumbotron">
				<h1  class="text-info" align="center">MyUsic</h1>
				<div class="col-md-1">
					{{"Welcome ".Auth::user()['user']}}
					<a class="navbar-brand " href="#"></a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4" style="background-color:#696969;">
					<br>

					<div class="item">
						<img class="avatar" src="/img/icon.png" />
						<strong class="name">Username</strong>
						<span class="button following">Following</span>
						<br>
						<br>
						<br>
						<br>
						<button type="button" class="btn btn-primary"><a href="playlists">Playlists</a></button>
						<br>
						<br>
						<button type="button" class="btn btn-danger"><a href="tracks">Tracks</a></button>
						<br>
					</div>
					<br>
				</div>
				<div class="col-sm-6" style="background-color:;">
					<h2>My Tracks</h2>
					<table class="table table-condensed">
						<thead>
						</thead>
						<tr>
							<th>Artist/Band</th>
							<th>Track Name</th>
							<th>Genre</th>
						</tr>
						<tr>
							<td><a href="PlayListSongs.html">Jay Z</td>
							<td>Roc Boys</td>
							<td>Hip Hop</td>
							<td><audio controls> <source src="horse.ogg" type="audio/ogg"><source src="horse.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></td>
						</tr>
						<tr>
							<td><a href="PlayListSongs.html">Jay Z</a></td>
							<td>Pound Cake</td>
							<td>Hip Hop</td>
							<td><audio controls> <source src="horse.ogg" type="audio/ogg"><source src="horse.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection