@extends('_layout')

@section('content')


    <h1 class="text-center form-group">Údaje o poškodenom objekte - editovanie dát</h1>


    <form class="form-horizontal" method="post" action="">

        {{csrf_field()}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <div class="form-group">
            <label class="col-sm-3 control-label">Plocha/objem/hmotnosť</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <input type="number" class="form-control" name="dimension_value" value="{{Input::old('dimension_value') ? Input::old('dimension_value') : $incidentDamagedObject->dimension_value}}">

                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Stupeň poškodenia budov</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="damage_degree_id">
                        <option ></option>
                        @foreach($damageDegrees as $degree)
                            <option value="{{ $degree->id }}"
                                    @if(Input::old('damage_degree_id') ? ($degree->id == Input::old('damage_degree_id')) : ($degree->id == $incidentDamagedObject->damage_degree_id)) selected
                                    @endif
                            >({{ $degree->code }}) {{ $degree->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Funkcia požiarneho úseku</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="segment_function_id">
                        <option ></option>
                        @foreach($segmentFunctions as $function)
                            <option value="{{ $function->id }}"
                                    @if(Input::old('segment_function_id') ? ($function->id == Input::old('segment_function_id')) : ($function->id == $incidentDamagedObject->segment_function_id)) selected
                                    @endif
                            >({{ $function->code }}) {{ $function->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Výška požiarneho úseku</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="segment_altitude_id">
                        <option ></option>
                        @foreach($segmentAltitudes as $altitude)
                            <option value="{{ $altitude->id }}"
                                    @if(Input::old('segment_altitude_id') ? ($altitude->id == Input::old('segment_altitude_id')) : ($altitude->id == $incidentDamagedObject->segment_altitude_id)) selected
                                    @endif
                            >({{ $altitude->code }}) {{ $altitude->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Požiarna odolnosť stavebnej konštrukcie</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="fire_resistance_id">
                        <option ></option>
                        @foreach($fireResistances as $resistance)
                            <option value="{{ $resistance->id }}"
                                    @if(Input::old('fire_resistance_id') ? ($resistance->id == Input::old('fire_resistance_id')) : ($resistance->id == $incidentDamagedObject->fire_resistance_id)) selected
                                    @endif
                            >({{ $resistance->code }}) {{ $resistance->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Horľavosť stavebných konštrukcií</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="flammability_of_object_id">
                        <option ></option>
                        @foreach($flammabilityOfObjects as $object)
                            <option value="{{ $object->id }}"
                                    @if(Input::old('flammability_of_object_id') ? ($object->id == Input::old('flammability_of_object_id')) : ($object->id == $incidentDamagedObject->flammability_of_object_id)) selected
                                    @endif
                            >({{ $object->code }}) {{ $object->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Požiarna bezpečnosť uzáverov</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="fire_shutter_id">
                        <option ></option>
                        @foreach($fireShutters as $shutter)
                            <option value="{{ $shutter->id }}"
                                    @if(Input::old('fire_shutter_id') ? ($shutter->id == Input::old('fire_shutter_id')) : ($shutter->id == $incidentDamagedObject->fire_shutter_id)) selected
                                    @endif
                            >({{ $shutter->code }}) {{ $shutter->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Požiarna odolnosť uzáverov</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="shutter_resistance_id">
                        <option ></option>
                        @foreach($shutterResistances as $resistance)
                            <option value="{{ $resistance->id }}"
                                    @if(Input::old('shutter_resistance_id') ? ($resistance->id == Input::old('shutter_resistance_id')) : ($resistance->id == $incidentDamagedObject->shutter_resistance_id)) selected
                                    @endif
                            >({{ $resistance->code }}) {{ $resistance->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Dôvod šírenia požiaru do ďalších úsekov</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="spreading_cause_id">
                        <option ></option>
                        @foreach($spreadingCauses as $cause)
                            <option value="{{ $cause->id }}"
                                    @if(Input::old('spreading_cause_id') ? ($cause->id == Input::old('spreading_cause_id')) : ($cause->id == $incidentDamagedObject->spreading_cause_id)) selected
                                    @endif
                            >({{ $cause->code }}) {{ $cause->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Elektrická požiarna signalizácia</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="fire_alarm_id">
                        <option ></option>
                        @foreach($fireAlarms as $alarm)
                            <option value="{{ $alarm->id }}"
                                    @if(Input::old('fire_alarm_id') ? ($alarm->id == Input::old('fire_alarm_id')) : ($alarm->id == $incidentDamagedObject->fire_alarm_id)) selected
                                    @endif
                            >({{ $alarm->code }}) {{ $alarm->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Stabilné/polostabilné hasiace zariadenia</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="fire_extinguisher_id">
                        <option ></option>
                        @foreach($fireExtinguishers as $extinguisher)
                            <option value="{{ $extinguisher->id }}"
                                    @if(Input::old('fire_extinguisher_id') ? ($extinguisher->id == Input::old('fire_extinguisher_id')) : ($extinguisher->id == $incidentDamagedObject->fire_extinguisher_id)) selected
                                    @endif
                            >({{ $extinguisher->code }}) {{ $extinguisher->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Hasiace látky v stabilnom hasiacom zariadení</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="chemical_id">
                        <option ></option>
                        @foreach($chemicals as $chemical)
                            <option value="{{ $chemical->id }}"
                                    @if(Input::old('chemical_id') ? ($chemical->id == Input::old('chemical_id')) : ($chemical->id == $incidentDamagedObject->chemical_id)) selected
                                    @endif
                            >({{ $chemical->code }}) {{ $chemical->name }}</option>
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


