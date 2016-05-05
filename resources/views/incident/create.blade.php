@extends('_layout')


@section('content')



    <h1 class="text-center form-group">Základné údaje o požiari - pridávanie dát</h1>


    <form class="form-horizontal" method="post" action="">

        {{csrf_field()}}
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
        <div class="form-group">
            <label class="col-sm-2 control-label">Evidečné číslo udalosti</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <input type="number" class="form-control" name="evidence_number" value="{{Input::old('evidence_number')}}">

                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Deň a čas ohlásenia</label>
            <div class="col-sm-10">
                <p class="form-control-static">

                    <input type="datetime-local" class="form-control" name="report_date" value="{{Carbon\Carbon::now()->toW3cString()}}">


                    <!--
                    <input type="date" value="<?php
                    echo(date("Y-m-d"));
                    ?>">
                    <input type="time" value="<?php
                    $date = new DateTime();
                    $date->setTimezone(new DateTimeZone('Europe/Prague'));
                    echo $date->format('H:i');
                    ?>">
                    -->
                </p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">Deň a čas spozorovania</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <input type="datetime-local" class="form-control" name="observe_date" value="{{Carbon\Carbon::now()->toW3cString()}}">
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Obec</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <input type="text">

                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Adresa</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <textarea class="form-control" rows="2" placeholder="Vyplňiť adresu..." name="address"></textarea>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label for="insurance" class="col-sm-2 control-label">Poisťovňa</label>
            <div class="col-sm-10">
                <p class="form-control-static">

                    <select multiple class="form-control" name="insurance_companies[]" id="insurance">
                        @foreach($insuranceCompanies as $company)
                            <option value="{{ $company->id }}"
                                @if(in_array($company->id, Input::old('insurance_companies'))) selected @endif
                            >{{ $company->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">Vlastníctvo</label>
            <div class="col-sm-10">
                <p class="form-control-static">

                    <select class="form-control" name="ownerships" required>
                        <option ></option>
                        @foreach($ownerships as $ownership)
                            <option value="{{ $ownership->id }}">({{ $ownership->code }}) {{ $ownership->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Určenie škody</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <select class="form-control" name="damage_specifications">
                        @foreach($damageSpecifications as $specification)
                            <option value="{{ $specification->id }}"
                                @if($specification->id == Input::old('damage_specifications')) selected @endif
                            >({{ $specification->code }}) {{ $specification->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Charakter škôd</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <select class="form-control" name="damage_types">
                        @foreach($damageTypes as $type)
                            <option value="{{ $type->id }}">({{ $type->code }}) {{ $type->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Odvetvie ekonomickej činnosti</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <select class="form-control" name="industry_types">
                        @foreach($industryTypes as $type)
                            @if(in_array($type->id, ['02', '08', '17', '26', '41', '49', '56', '65']))
                                <option value="{{ $type->id }}" disabled class="bg-info text-info">{{ $type->name }}</option>
                            @else
                                <option value="{{ $type->id }}">({{ $type->code }}) {{ $type->name }}</option>
                            @endif
                        @endforeach

                    </select>
                </p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">Škoda (€)</label>
            <p class="form-control-static text-center">
                Priama: <input type="number" class="text-center" name="direct_damage_value">
                Následná: <input type="number" class="text-center" name="followup_damage_value">
                Uchránené hodnoty: <input type="number" class="text-center" name="saved_value">
            </p>
        </div>

        <div class="row text-right">
            <!-- <button type="button" class="btn btn-primary btn-lg"><a href="/details" role="button">Detaily</a></button>-->
            <button type="submit" class="btn btn-primary btn-lg">Uložiť záznam</button>
        </div>
    </form>






@endsection