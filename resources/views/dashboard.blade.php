@extends('_layout')


@section('content')
    <div class="text-left">
        <a href="{{route('incident.create')}}" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Pridaj nový záznam</a>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <table class="table table-striped">
                <tr><h3 class="text-center">Posledné pridané incidenty</h3></tr>
                <tr>
                    <th>Evidenčné číslo požiaru</th>
                    <th>Obec</th>
                    <th>Adresa</th>
                    <th>Ohlásenie požiaru</th>

                    <th> </th>
                </tr>

                @foreach($incidents as $incident)
                    <tr>
                        <td>{{$incident->evidence_number}}</td>
                        <td>{{$incident->town ? $incident->town->name : null}}</td>
                        <td>{{$incident->address}}</td>
                        <td>{{$incident->report_date}}</td>

                        <td>

                            <a href="{{route('incident.edit', [$incident->id])}}" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil"></span> Uprav</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-lg-10 col-lg-offset-2 text-center">
            {!! $incidents->links() !!}
        </div>
  </div>


@endsection