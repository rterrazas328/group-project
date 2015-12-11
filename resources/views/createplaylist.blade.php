@extends('myapp')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>MyUsic</h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="panel panel-default table-responsive">
                <center><h3>Create Playlist</h3></center>
            </div>
        </div>
        <div class="panel-body">
            <form method="POST" id="form" name="form" role="form"></form>
            <div class="col-xs-4">
                <label for="ex3">Playlist Name:</label>
                <input class="form-control" id="name" placeholder="Enter Playlist Name" type="text"><br>
            </div>
            <br>
            <br>
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <th>Select</th>
                    <th>Artist/Band</th>
                    <th>Track Name</th>
                    <th>Genre</th>
                    <th>Play Track</th>
                </thead>
                <tr>
                    <td>
                        <input class="form-control" form="tableForm" type="checkbox">
                    </td>
                    <td>Jay Z</td>
                    <td>Pound Cake</td>
                    <td>Hip Hop</td>
                    <td><audio controls> <source src="horse.ogg" type="audio/ogg"><source src="horse.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" form="tableForm" type="checkbox">
                    </td>
                    <td>Drake</td>
                    <td>Hot Line Bling</td>
                    <td>Hip Hop</td>
                    <td><audio controls> <source src="horse.ogg" type="audio/ogg"><source src="horse.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-1 col-md-offset-10">
                </div>
                <div class="col-md-1">
                    <input class="form-control" type="submit"  onClick="parent.location='myPlaylist.html'" value="Create">
                </div>
            </div>
        </div>
        </div>
        <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
        <script src="./js/createplaylist.js" ></script>
        <script src="./js/jquery.validation.js"></script>
    </section>
@endsection