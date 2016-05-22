@extends('_layout')


@section('content')

    <div class="row">
        <div class="col-md-5">

            <table class="table table-striped">
                <tr >
                    <td >Evc</td>
                    <td >{{$incident->evidence_number}}</td>
                </tr>
                <tr >
                    <td >Town</td>
                    <td >{{$incident->town->name}}</td>
                </tr>
                <tr >
                    <td >address</td>
                    <td >{{$incident->address}}</td>
                </tr>
                <tr >
                    <td >Vlastnictvo</td>
                    <td >{{ $incident->ownership ? $incident->ownership->name : null}}</td>
                </tr>
                <tr >
                    <td >Urcenie skody</td>
                    <td >{{$incident->damageSpecification->name}}</td>
                </tr>
                <tr >
                    <td >Typ poskodenia</td>
                    <td >{{$incident->damageType->name}}</td>
                </tr>
                <tr >
                    <td >Industry type</td>
                    <td >{{$incident->industryType->name}}</td>
                </tr>
                <tr >
                    <td >Dir dmg</td>
                    <td >{{$incident->direct_damage_value}}</td>
                </tr>
                <tr >
                    <td >folu dmg</td>
                    <td >{{$incident->followup_damage_value}}</td>
                </tr>
                <tr >
                    <td >saved value</td>
                    <td >{{$incident->saved_value}}</td>
                </tr>
                <tr >
                    <td >Obsrv date</td>
                    <td >{{$incident->observe_date}}</td>
                </tr>
                <tr >
                    <td >Rep date</td>
                    <td >{{$incident->report_date}}</td>
                </tr>

                <tr >
                    <td >Poistovne</td>
                    <td     >
                        <div class="row">
                            @forelse($incident->insuranceCompanies as $company)
                                <div class="col-lg-12">
                                    {{$company->name}}
                                </div>
                            @empty
                                <div class="col-lg-12">ziadne poistovne</div>
                            @endforelse
                        </div>
                    </td>
                </tr>
            </table>


            <div class="row">
                <div class="col-lg-5">Obrazky</div>
            </div>
            <div class="row">
                @foreach($incident->images as $image)
                    <div class="col-lg-3">
                        <img src="{{public_path('images').'/'.$image->hash}}" class="img img-responsive">
                    </div>
                @endforeach
            </div>

        </div>


        @if($incident->incidentDetail)
        <div class="col-md-5">

            <table class="table table-striped">
                <tr >
                    <td >Area</td>
                    <td >{{$incident->incidentDetail->area ? $incident->incidentDetail->area->name : 'N/A'}}</td>
                </tr>
                <tr >
                    <td >Fire location</td>
                    <td >{{$incident->incidentDetail->fireLocation ? $incident->incidentDetail->fireLocation->name : 'N/A'}}</td>
                </tr>                <tr >
                    <td >Vehicle part</td>
                    <td >{{$incident->incidentDetail->vehiclePart ? $incident->incidentDetail->vehiclePart->name : 'N/A'}}</td>
                </tr>                <tr >
                    <td >Conveyor</td>
                    <td >{{$incident->incidentDetail->conveyorEquipment ? $incident->incidentDetail->conveyorEquipment->name : 'N/A'}}</td>
                </tr>
            </table>


        </div>

@endif

        <div class="col-md-2">
            @if($incident->incidentDetail)
                <a href="{{route('incident.incidentDetail.edit', [$incident->id, $incident->incidentDetail->id])}}" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil"></span> Uprav detail požiaru</a>
            @else
                <a href="{{route('incident.incidentDetail.create', [$incident->id])}}" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Pridaj detail požiaru</a>
            @endif

            @if($incident->damagedObject)
                <a href="{{route('incident.incidentDamagedObject.edit', [$incident->id, $incident->damagedObject->id])}}" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-pencil"></span> Uprav detail požiaru</a>
            @else
                <a href="{{route('incident.incidentDamagedObject.create', [$incident->id])}}" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Pridaj detail požiaru</a>
            @endif
        </div>
    </div>





@endsection