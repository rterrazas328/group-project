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
                <center><h3>Edit Playlist</h3></center>
            </div>
        </div>
        <div class="panel-body">
            <form method="POST" id="tableForm" role="form"></form>
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                <th>Edit Track</th>
                <th>PlayList Name</th>
                <th>Genre</th>
                <th>Play Track</th>
                <th>Delete Track</th>
                </thead>
                <tr>
                    <td>
                        <a class="form-control btn btn-warning" id="edit_3" name="edit3" form="tableForm">edit</a>
                    </td>
                    <td><a href="#">Playlist 1</a></td>
                    <td>Hip Hop</td>


                    <td><audio controls> <source src="horse.ogg" type="audio/ogg"><source src="horse.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></td>
                    <td><a class="form-control btn btn-danger" id="delete_3" name="delete3" form="tableForm">delete</a></td>
                </tr>
                <tr>
                    <td>
                        <a class="form-control btn btn-warning" id="edit_4" name="edit4" form="tableForm" href="">edit</a>
                    </td>
                    <td><a href="#">Playlist 2</a></td>
                    <td>Rock</td>
                    <td><audio controls> <source src="horse.ogg" type="audio/ogg"><source src="horse.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></td>
                    <td><a class="form-control btn btn-danger" id="delete_4" name="delete4" form="tableForm" href="">delete</a></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-2">
                    <a class="form-control btn btn-success" id="create_new" name="create" form="tableForm" href="createplaylist" value="Create a new playlist">Create a new playlist</a>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection