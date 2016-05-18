@extends('_layout')


@section('content')

    <div class="col-lg-12"><h1 class="text-center">Evidencia požiarov</h1></div>
    <div class="row">
        <div class="col-lg-2">
            <a href="{{route('incident.create')}}" class="btn btn-success">Pridaj nový záznam</a>
        </div>

        <div class="col-lg-10">
            <table class="table table-striped">
                <tr><h3 class="text-center">Posledné pridané incidenty</h3></tr>
                <tr>
                    <th>Evidenčné číslo požiaru</th>
                    <th>Adresa</th>
                    <th>industry type</th>
                    <th>report date</th>

                    <th>akcie</th>
                </tr>
                @foreach($incidents as $incident)
                    <tr>
                        <td>{{$incident->evidence_number}}</td>
                        <td>{{$incident->address}}</td>
                        <td>{{$incident->industryType ? $incident->industryType->name : null}}</td>
                        <td>{{$incident->report_date}}</td>

                        <td>
                            @if($incident->incidentDetail)
                                <a href="{{route('incident.incidentDetail.edit', [$incident->id, $incident->incidentDetail->id])}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Uprav detail požiaru</a>
                            @else
                                <a href="{{route('incident.incidentDetail.create', [$incident->id])}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Pridaj detail požiaru</a>
                            @endif
                            <a href="{{route('incident.edit', [$incident->id])}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Uprav</a>
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