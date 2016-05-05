@extends('_layout')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('incident.create')}}" class="btn btn-success">New</a>
        </div>
    </div>
    <table class="table table-striped">
        @foreach($incidents as $incident)
            <tr>
                <td>{{$incident->id}}</td>
                <td>{{$incident->evidence_number}}</td>
                <td>{{$incident->address}}</td>
                <td>{{$incident->report_date}}</td>
            </tr>
        @endforeach
    </table>



@endsection