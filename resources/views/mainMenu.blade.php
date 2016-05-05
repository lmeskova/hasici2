@extends('_layout')

@section('content')

<div class="form-group">
    <div class="col-md-12"><h2 class="text-center">Evidencia požiarov</h2></div>
</div>
    <div class="row form-group">
        <div class="col-md-3"></div>

        <div class="col-md-3 text-center">

            <div class="text-center form-group">
                <a href="/newIncident" role="button">
                    <button type="button" class="btn btn-primary btn-lg btn-block text-center">Naplnenie údajov</button>
                </a>
            </div>


            <div class="text-center form-group">
                <a href="/newIncident" role="button">
                    <button type="button" class="btn btn-primary btn-lg btn-block text-center">Editovanie údajov</button>
                </a>
            </div>


            <div class="text-center form-group">
                <a href="/newIncident" role="button">
                    <button type="button" class="btn btn-primary btn-lg btn-block text-center">Prezeranie</button>
                </a>
            </div>

        </div>

        <div class="col-md-3">

            <div class="text-center form-group">
                <a href="/newIncident" role="button">
                    <button type="button" class="btn btn-primary btn-lg">Editovanie údajov</button>
                </a>
            </div>


            <div class="text-center form-group">
                <a href="/newIncident" role="button">
                    <button type="button" class="btn btn-primary btn-lg">Prezeranie</button>
                </a>
            </div>

            <div class="col-md-3"></div>


        </div>

    </div>



@endsection