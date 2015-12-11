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
                <center><h3>Upload Tracks</h3></center>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <form   class="form-horizontal col-md-4 col-md-offset-4" id="form-uploadtracklist" id="form-uploadtracklist" name="form-uploadtracklist" action="" method="POST" align="center" >
                    <label>
                        Artist/Band
                        &nbsp;
                        <input name="artist" id="artist" type="text" data-validation="[NOTEMPTY]"  class="form-control">
                    </label><br>
                    <label>
                        Track Name
                        &nbsp;
                        <input name="track" id="track" type="text" data-validation="[NOTEMPTY]"  class="form-control">
                    </label><br>
                    <label>
                        Genre
                        &nbsp;
                        <input name="genre" id="genre" type="text" data-validation="[NOTEMPTY]"  class="form-control">
                    </label><br><br><br>
                    <center><input id="input-1a" type="file" class="file" data-show-preview="false"></center><br>
                    <button type="submit" class="form-control">Upload</button>
                    <br>
                </form>

                <div class="panel-body">

                    <form method="POST" id="tableForm" role="form"></form>
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                        <th>Select</th>
                        <th>Artist/Band</th>
                        <th>Track Name</th>
                        <th>Genre</th>
                        <th>Play Track</th>


                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" form="tableForm" type="checkbox">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td><audio controls> <source src="horse.ogg" type="audio/ogg"><source src="horse.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></td>

                        </tr>
                        <tr>
                            <td>
                                <input class="form-control" form="tableForm" type="checkbox">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td><audio controls> <source src="horse.ogg" type="audio/ogg"><source src="horse.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-1 col-md-offset-10">
                        </div>
                        <div class="col-md-1">
                            <input class="form-control" type="submit" value="delete">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection