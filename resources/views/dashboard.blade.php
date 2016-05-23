@extends('_layout')


@section('content')
    <div class="text-left col-lg-3">
        <a href="{{route('incident.create')}}" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span> Pridaj nový záznam</a>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <table class="table table-striped">
                <tr><h3 class="text-center">Posledné pridané incidenty</h3></tr>
                <tr>
                    <th>Evidenčné číslo</th>
                    <th>Obec</th>
                    <th>Adresa</th>
                    <th>Spozorovanie požiaru</th>
                    <th>Ohlásenie požiaru</th>
                    <th> </th>
                </tr>

                @foreach($incidents as $incident)
                    <tr>
                        <td>{{$incident->evidence_number}}</td>
                        <td>{{$incident->town ? $incident->town->name : null}}</td>
                        <td>{{$incident->address}}</td>
                        <td>{{$incident->observe_date}}</td>
                        <td>{{$incident->report_date}}</td>
                        <td><a href="{{route('incident.show', [$incident->id])}}" class="btn btn-info btn-lg btn-block">Zobraziť</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-lg-4 col-lg-offset-4 text-center">
            {!! $incidents->links() !!}
        </div>
  </div>


@endsection