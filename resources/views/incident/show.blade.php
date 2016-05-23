@extends('_layout')


@section('content')

    <h2 class="text-center text-uppercase">Incident č. {{$incident->evidence_number}}</h2>
    <div class="row">
        <div class="col-lg-4">
            <table class="table table-striped table-bordered">
                <tr>
                    <td colspan="2"><h3 class="text-center">Incident</h3></td>
                </tr>
                <tr >
                    <td >Evidenčné číslo</td>
                    <td >{{$incident->evidence_number}}</td>
                </tr>
                <tr >
                    <td >Deň a čas spozorovania</td>
                    <td >{{$incident->observe_date}}</td>
                </tr>
                <tr >
                    <td >Deň a čas ohlásenia</td>
                    <td >{{$incident->report_date}}</td>
                </tr>
                <tr >
                    <td >Obec</td>
                    <td >{{$incident->town->name}}</td>
                </tr>
                <tr >
                    <td >Adresa</td>
                    <td >{{$incident->address}}</td>
                </tr>
                <tr >
                    <td >Vlastníctvo</td>
                    <td >{{ $incident->ownership ? $incident->ownership->name : null}}</td>
                </tr>
                <tr >
                    <td >Určenie škody</td>
                    <td >{{$incident->damageSpecification->name}}</td>
                </tr>
                <tr >
                    <td >Charakter škôd</td>
                    <td >{{$incident->damageType->name}}</td>
                </tr>
                <tr >
                    <td >Odvetvie ekonomickej činnosti</td>
                    <td >{{$incident->industryType->name}}</td>
                </tr>
                <tr >
                    <td >Priama škoda</td>
                    <td >{{$incident->direct_damage_value}}</td>
                </tr>
                <tr >
                    <td >Následná škoda</td>
                    <td >{{$incident->followup_damage_value}}</td>
                </tr>
                <tr >
                    <td >Uchránené hodnoty</td>
                    <td >{{$incident->saved_value}}</td>
                </tr>
                <tr >
                    <td >Poisťovne</td>
                    <td     >
                        <div class="row">
                            @forelse($incident->insuranceCompanies as $company)
                                <div class="col-lg-12">
                                    {{$company->name}}
                                </div>
                            @empty
                                <div class="col-lg-12">Bez poisťovne</div>
                            @endforelse
                        </div>
                    </td>
                </tr>
                <!--
            <tr >
                <td >Fotografická dokumentácia</td>
                <td > </td>
            </tr>
                <tr >
                    <td >                @foreach($incident->images as $image)
                            <div class="col-lg-3">
                                <img src="{{public_path('images').'/'.$image->hash}}" class="img img-responsive">
                            </div>
                        @endforeach</td>
-->
                </tr>
                <tr >
                    <td colspan="2" class="text-center" ><a href="{{route('incident.edit', [$incident->id])}}" class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-pencil"></span> Upraviť</a></td>
                </tr>
            </table>
        </div>


        @if($incident->incidentDetail)
        <div class="col-lg-4">

            <table class="table table-striped table-bordered">
                <tr>
                    <td colspan="2"><h3 class="text-center">Detaily</h3></td>
                </tr>
                <tr >
                    <td >Priestor</td>
                    <td >{{$incident->incidentDetail->area ? $incident->incidentDetail->area->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Miesto vzniku požiaru</td>
                    <td >{{$incident->incidentDetail->fireLocation ? $incident->incidentDetail->fireLocation->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Časť dopravného prostriedku a pracovného stroja</td>
                    <td >{{$incident->incidentDetail->vehiclePart ? $incident->incidentDetail->vehiclePart->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Dopravníkové zariadenia</td>
                    <td >{{$incident->incidentDetail->conveyorEquipment ? $incident->incidentDetail->conveyorEquipment->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Príčina vzniku požiaru</td>
                    <td >{{$incident->incidentDetail->incidentCause ? $incident->incidentDetail->incidentCause->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Manipulácia s horľavými výbušnými látkami</td>
                    <td >{{$incident->incidentDetail->flammableSubstances ? $incident->incidentDetail->flammableSubstances->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Iniciátor</td>
                    <td >{{$incident->incidentDetail->initiator ? $incident->incidentDetail->initiator->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Časti elektrických rozvodov</td>
                    <td >{{$incident->incidentDetail->electricalwiring ? $incident->incidentDetail->electricalwiring->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Pôsobenie iniciátora</td>
                    <td >{{$incident->incidentDetail->initiatorsImpact ? $incident->incidentDetail->initiatorsImpact->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Látky, ktoré začali horieť ako prvé</td>
                    <td >{{$incident->incidentDetail->burningSubstance ? $incident->incidentDetail->burningSubstance->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Látky, ktoré určovali rozvoj</td>
                    <td >{{$incident->incidentDetail->followingSubstance ? $incident->incidentDetail->followingSubstance->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Trieda nebezpečnosti horľavých kvapalín</td>
                    <td >{{$incident->incidentDetail->hazardClass ? $incident->incidentDetail->hazardClass->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Nedostatky v organizácii s vplyvom na vznik požiaru</td>
                    <td >{{$incident->incidentDetail->organizationShortcoming ? $incident->incidentDetail->organizationShortcoming->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Nedostatky v činnostiach s vplyvom na šírenie požiaru</td>
                    <td >{{$incident->incidentDetail->actionShortcoming ? $incident->incidentDetail->actionShortcoming->name : '-'}}</td>
                </tr>
                <tr >
                    <td >Uzatvorenie prípadu</td>
                    <td >{{$incident->incidentDetail->incidentConclusion ? $incident->incidentDetail->incidentConclusion->name : '-'}}</td>
                </tr>
                <tr >
                    <td colspan="2" class="text-center" >
                        @if($incident->incidentDetail)
                            <a href="{{route('incident.incidentDetail.edit', [$incident->id, $incident->incidentDetail->id])}}" class="btn btn-info btn-lg btn-block"><span class="glyphicon glyphicon-pencil"></span> Upraviť</a>
                        @else
                            <a href="{{route('incident.incidentDetail.create', [$incident->id])}}" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span> Pridať detail incidentu</a>
                        @endif
                    </td>

                </tr>
            </table>


            </div>

        @endif

<div class="row">
        @if($incident->damagedObject)
            <div class="col-lg-4">

                <table class="table table-striped table-bordered">
                    <tr>
                        <td colspan="2"><h3 class="text-center">Poškodený objekt</h3></td>
                    </tr>
                    <tr >
                        <td >Stupeň poškodenia budov</td>
                        <td >{{$incident->damagedObject->damageDegree ? $incident->damagedObject->damageDegree->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td>Funkcia požiarneho úseku</td>
                        <td >{{$incident->damagedObject->segmentFunction ? $incident->damagedObject->segmentFunction->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td >Výška požiarneho úseku</td>
                        <td >{{$incident->damagedObject->segmentAltitude ? $incident->damagedObject->segmentAltitude->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td >Požiarna odolnosť stavebnej konštrukcie</td>
                        <td >{{$incident->damagedObject->fireResistance ? $incident->damagedObject->fireResistance->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td >Horľavosť stavebných konštrukcií</td>
                        <td >{{$incident->damagedObject->flammabilityOfObject ? $incident->damagedObject->flammabilityOfObject->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td >Požiarna bezpečnosť uzáverov</td>
                        <td >{{$incident->damagedObject->fireShutter ? $incident->damagedObject->fireShutter->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td >Požiarna odolnosť uzáverov</td>
                        <td >{{$incident->damagedObject->shutterResistance ? $incident->damagedObject->shutterResistance->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td >Dôvod šírenia požiaru do ďalších úsekov</td>
                        <td >{{$incident->damagedObject->spreadingCause ? $incident->damagedObject->spreadingCause->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td >Elektrická požiarna signalizácia</td>
                        <td >{{$incident->damagedObject->fireAlarm ? $incident->damagedObject->fireAlarm->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td >Stabilné/polostabilné hasiace zariadenia</td>
                        <td >{{$incident->damagedObject->fireExtinguisher ? $incident->damagedObject->fireExtinguisher->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td >Hasiace látky v stabilnom hasiacom zariadení</td>
                        <td >{{$incident->damagedObject->chemicals ? $incident->damagedObject->chemicals->name : '-'}}</td>
                    </tr>
                    <tr >
                        <td colspan="2" class="text-center" >
                                @if($incident->damagedObject)
                                    <a href="{{route('incident.incidentDamagedObject.edit', [$incident->id, $incident->damagedObject->id])}}" class="btn btn-info btn-block btn-lg"><span class="glyphicon glyphicon-pencil"></span> Upraviť</a>
                                @else
                                    <a href="{{route('incident.incidentDamagedObject.create', [$incident->id])}}" class="btn btn-success btn-block btn-lg"><span class="glyphicon glyphicon-plus"></span> Pridať poškodený objekt</a>
                                @endif
                        </td>

                    </tr>
                </table>

</div>
@endif
</div>
</div>



@endsection