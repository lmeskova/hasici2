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
                    <select class="form-control" name="areas[]">
                        <option value=""></option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" @if($area->id == Input::old('areas'))
                            selected @endif>({{ $area->code }}) {{ $area->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Miesto vzniku požiaru</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="fireLocations[]">
                        <option value=""></option>
                        @foreach($fireLocations as $location)
                            <option value="{{ $location->id }}" @if($location->id == Input::old('fireLocations'))
                            selected @endif>({{ $location->code }}) {{ $location->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Časť dopravného prostriedku a pracovného stroja</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="vehicleParts[]">
                        <option value=""></option>
                        @foreach($vehicleParts as $part)
                            <option value="{{ $part->id }}" @if($part->id == Input::old('vehicleParts'))
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
                    <select class="form-control" name="conveyorEquipments[]">
                        <option value=""></option>
                        @foreach($conveyorEquipments as $equipment)
                            <option value="{{ $equipment->id }}" @if($equipment->id == Input::old('conveyorEquipments'))
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
                    <select class="form-control" name="incidentCauses[]">
                        <option value=""></option>
                        @foreach($incidentCauses as $cause)
                            <option value="{{ $cause->id }}" @if($cause->id == Input::old('incidentCauses'))
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
                    <select class="form-control" name="flammableSubstances[]">
                        <option value=""></option>
                        @foreach($flammableSubstances as $substance)
                            <option value="{{ $substance->id }} @if($substance->id == Input::old('flammableSubstances'))
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
                    <select class="form-control" name="initiators[]">
                        <option value=""></option>
                        @foreach($initiators as $initiator)
                            <option value="{{ $initiator->id }}" @if($initiator->id == Input::old('initiators'))
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
                    <select class="form-control" name="electricalWirings[]">
                        <option value=""></option>
                        @foreach($electricalWirings as $wiring)
                            <option value="{{ $wiring->id }}" @if($wiring->id == Input::old('electricalWirings'))
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
                    <select class="form-control" name="initiatorsImpacts[]">
                        <option value=""></option>
                        @foreach($initiatorsImpacts as $impact)
                            <option value="{{ $impact->id }}" @if($impact->id == Input::old('initiatorsImpacts'))
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
                    <select class="form-control" name="burningSubstances[]">
                        <option value=""></option>
                        @foreach($burningSubstances as $substance)
                            <option value="{{ $substance->id }}" @if($substance->id == Input::old('burningSubstances'))
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
                    <select class="form-control" name="followingSubstances[]">
                        <option value=""></option>
                        @foreach($followingSubstances as $followingSubstance)
                            <option value="{{ $followingSubstance->id }}" @if($followingSubstance->id == Input::old('followingSubstances'))
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
                    <select class="form-control" name="hazardClasses[]">
                        <option value=""></option>
                        @foreach($hazardClasses as $class)
                            <option value="{{ $class->id }}" @if($class->id == Input::old('hazardClasses'))
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
                    <select class="form-control" name="organizationShortcomings[]">
                        <option value=""></option>
                        @foreach($organizationShortcomings as $shortcoming)
                            <option value="{{ $shortcoming->id }}" @if($shortcoming->id == Input::old('organizationShortcomings'))
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
                    <select class="form-control" name="actionShortcomings[]">
                        <option value=""></option>
                        @foreach($actionShortcomings as $actionShortcoming)
                            <option value="{{ $actionShortcoming->id }}" @if($actionShortcoming->id == Input::old('actionShortcomings'))
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
                    <select class="form-control" name="incidentConclusions[]">
                        <option value=""></option>
                        @foreach($incidentConclusions as $conclusion)
                            <option value="{{ $conclusion->id }}" @if($conclusion->id == Input::old('incidentConclusions'))
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


