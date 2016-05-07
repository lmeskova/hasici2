@extends('_layout')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('incident.create')}}" class="btn btn-success">New</a>
        </div>
    </div>

    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>evidencne</th>
            <th>adresa</th>
            <th>industry type</th>
            <th>report date</th>

            <th>akcie</th>
        </tr>
        @foreach($incidents as $incident)
            <tr>
                <td>{{$incident->id}}</td>
                <td>{{$incident->evidence_number}}</td>
                <td>{{$incident->address}}</td>
                <td>{{$incident->industryType ? $incident->industryType->name : null}}</td>
                <td>{{$incident->report_date}}</td>

                <td>
                    <a href="{{route('incident.incidentDetail.create', [$incident->id])}}" class="btn btn-success">Pridaj detail</a>

                    <a href="{{route('incident.edit', [$incident->id])}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Uprav</a>
                </td>
            </tr>
        @endforeach
    </table>



@endsection