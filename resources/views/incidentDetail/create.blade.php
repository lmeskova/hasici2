@extends('_layout')

@section('content')


    <h1 class="text-center form-group">Základné údaje o požiari - detaily</h1>


    <form class="form-horizontal" method="post" action="">

        {{csrf_field()}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <div class="form-group">
            <label class="col-sm-3 control-label">Priestor</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="area_id">
                        <option ></option>
                        @foreach($areas as $area)
                            @if(in_array($area->code, ['1000', '2000','3000','4000', '5000','6000']))
                                <option value="{{ $area->id }}" disabled class="bg-primary text-primary">({{$area->code}}) {{ $area->name }}</option>
                            @else
                                @if(in_array($area->code, ['9000']))
                                    <option value="{{ $area->id }}" class="bg-primary text-primary">({{$area->code}}) {{ $area->name }}</option>
                                @else
                            @if(in_array($area->code, ['1100', '1200','1300','1400', '1500','1600','1700','1800','1900',
                            '2100', '2200','2300','2400', '2500','2600','2700','2800','2900',
                            '3100', '3200','3300','3400', '3500','3600','3700','3800','3900',
                            '4100', '4200','4300','4400', '4500','4600','4700','4800','4900',
                            '5100', '5200','5300','5400', '5500','5600','5700','5800','5900',
                            '6100', '6200','6300','6400', '6500','6600','6700','6800','6900']))
                                <option value="{{ $area->id }}" disabled class="bg-info text-info">({{$area->code}}) {{ $area->name }}</option>
                            @else
                            <option value="{{ $area->id }}" @if($area->id == Input::old('area_id'))
                            selected @endif>({{ $area->code }}) {{ $area->name }}</option>
                            @endif
                            @endif
                            @endif
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Miesto vzniku požiaru</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="fire_location_id">
                        <option ></option>
                        @foreach($fireLocations as $location)
                            @if(in_array($location->code, ['1000', '2000','3000','4000', '5000','6000']))
                                <option value="{{ $location->id }}" disabled class="bg-info text-info">({{$location->code}}) {{ $location->name }}</option>
                            @else
                                @if(in_array($location->code, ['7000']))
                                    <option value="{{ $location->id }}" class="bg-primary text-primary">({{$location->code}}) {{ $location->name }}</option>
                                    @else
                            <option value="{{ $location->id }}" @if($location->id == Input::old('fire_location_id'))
                            selected @endif>({{ $location->code }}) {{ $location->name }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Časť dopravného prostriedku a pracovného stroja</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="vehicle_part_id">
                        <option ></option>
                        @foreach($vehicleParts as $part)
                            <option value="{{ $part->id }}" @if($part->id == Input::old('vehicle_part_id'))
                            selected @endif>({{ $part->code }}) {{ $part->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Dopravníkové zariadenia</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="conveyor_equipment_id">
                        <option ></option>
                        @foreach($conveyorEquipments as $equipment)
                            <option value="{{ $equipment->id }}" @if($equipment->id == Input::old('conveyor_equipment_id'))
                            selected @endif>({{ $equipment->code }}) {{ $equipment->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Príčina vzniku požiaru</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="incident_cause_id">
                        <option ></option>
                        @foreach($incidentCauses as $cause)
                            <option value="{{ $cause->id }}" @if($cause->id == Input::old('incident_cause_id'))
                            selected @endif>({{ $cause->code }}) {{ $cause->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Manipulácia s horľavými výbušnými látkami</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="flammable_substance_id">
                        <option ></option>
                        @foreach($flammableSubstances as $substance)
                            <option value="{{ $substance->id }}" @if($substance->id == Input::old('flammable_substance_id'))
                                    selected @endif>({{ $substance->code }}) {{ $substance->name }}</option>
                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Iniciátor</label>
                            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="initiator_id">
                        <option ></option>
                        @foreach($initiators as $initiator)
                            <option value="{{ $initiator->id }}" @if($initiator->id == Input::old('initiator_id'))
                            selected @endif>({{ $initiator->code }}) {{ $initiator->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Časti elektrických rozvodov</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="electrical_wiring_id">
                        <option ></option>
                        @foreach($electricalWirings as $wiring)
                            <option value="{{ $wiring->id }}" @if($wiring->id == Input::old('electrical_wiring_id'))
                            selected @endif>({{ $wiring->code }}) {{ $wiring->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Pôsobenie iniciátora</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="initiators_impact_id">
                        <option ></option>
                        @foreach($initiatorsImpacts as $impact)
                            <option value="{{ $impact->id }}" @if($impact->id == Input::old('initiators_impact_id'))
                            selected @endif>({{ $impact->code }}) {{ $impact->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Látky, ktoré začali horieť ako prvé</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="burning_substance_id">
                        <option ></option>
                        @foreach($burningSubstances as $substance)
                            <option value="{{ $substance->id }}" @if($substance->id == Input::old('burning_substance_id'))
                            selected @endif>({{ $substance->code }}) {{ $substance->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Látky, ktoré určovali rozvoj</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="following_substance_id">
                        <option ></option>
                        @foreach($followingSubstances as $followingSubstance)
                            <option value="{{ $followingSubstance->id }}" @if($followingSubstance->id == Input::old('following_substance_id'))
                            selected @endif>({{ $followingSubstance->code }}) {{ $followingSubstance->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Trieda nebezpečnosti horľavých kvapalín</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="hazard_class_id">
                        <option ></option>
                        @foreach($hazardClasses as $class)
                            <option value="{{ $class->id }}" @if($class->id == Input::old('hazard_class_id'))
                            selected @endif>({{ $class->code }}) {{ $class->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Nedostatky v organizácii s vplyvom na vznik požiaru</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="organization_shortcoming_id">
                        <option ></option>
                        @foreach($organizationShortcomings as $shortcoming)
                            <option value="{{ $shortcoming->id }}" @if($shortcoming->id == Input::old('organization_shortcoming_id'))
                            selected @endif>({{ $shortcoming->code }}) {{ $shortcoming->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Nedostatky v činnostiach s vplyvom na šírenie požiaru</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="action_shortcoming_id">
                        <option ></option>
                        @foreach($actionShortcomings as $actionShortcoming)
                            <option value="{{ $actionShortcoming->id }}" @if($actionShortcoming->id == Input::old('action_shortcoming_id'))
                            selected @endif>({{ $actionShortcoming->code }}) {{ $actionShortcoming->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Uzatvorenie prípadu</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="incident_conclusion_id">
                        <option ></option>
                        @foreach($incidentConclusions as $conclusion)
                            <option value="{{ $conclusion->id }}" @if($conclusion->id == Input::old('incident_conclusion_id'))
                            selected @endif>({{ $conclusion->code }}) {{ $conclusion->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="row text-right">
            <button type="submit"  class="btn btn-primary btn-lg">Uložiť záznam</button>
        </div>
    </form>



@endsection


