@extends('_layout')


@section('content')



<h1 class="text-center form-group">Základné údaje o požiari - pridávanie dát</h1>


    <form class="form-horizontal">

        <div class="form-group">
            <label class="col-sm-2 control-label">Evidečné číslo udalosti</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <input type="number">

                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Deň a čas ohlásenia</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <input type="date" value="<?php
                    echo(date("Y-m-d"));
                    ?>">
                    <input type="time" value="<?php
                    $date = new DateTime();
                    $date->setTimezone(new DateTimeZone('Europe/Prague'));
                    echo $date->format('H:i');
                    ?>">
                </p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">Deň a čas spozorovania</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <input type="date" value="<?php
                    echo(date("Y-m-d"));
                    ?>">
                    <input type="time" value="<?php
                    $date = new DateTime();
                    $date->setTimezone(new DateTimeZone('Europe/Prague'));
                    echo $date->format('H:i');
                    ?>">
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
                    <textarea class="form-control" rows="2" placeholder="Vyplňiť adresu..."></textarea>
                </p>
            </div>
        </div>

                <div class="form-group">
                    <label for="insurance" class="col-sm-2 control-label">Poisťovňa</label>
                    <div class="col-sm-10">

                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                žiadna
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                jedna alebo viac poisťovní
                            </label>
                        </div>

                        <p class="form-control-static">

                            <select multiple class="form-control" name="insuranceCompanies[]" id="insurance" disabled>
                                @foreach($insuranceCompanies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label">Vlastníctvo</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">

                            <select class="form-control" name="ownerships[]">
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
                            <select class="form-control" name="damageSpecifications[]">
                                @foreach($damageSpecifications as $specification)
                                    <option value="{{ $specification->id }}">({{ $specification->code }}) {{ $specification->name }}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Charakter škôd</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">
                            <select class="form-control" name="damageTypes[]">
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
                            <select class="form-control" name="industryTypes">
                                @foreach($industryTypes as $type)
                                    @if($type["id"] == "02" || $type["id"] == "08" || $type["id"] == "17" || $type["id"] == "26" ||
                                    $type["id"] == "41" || $type["id"] == "49" || $type["id"] == "56" || $type["id"] == "65")
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
                    Priama: <input type="number" class="text-center"> Následná: <input type="number" class="text-center"> Uchránené hodnoty: <input type="number" class="text-center">
                </p>
        </div>

        <div class="row text-right">
            <button type="button" class="btn btn-primary btn-lg"><a href="/details" role="button">Detaily</a></button>
            <button type="button" class="btn btn-primary btn-lg">Uložiť záznam</button>
        </div>
</form>






@endsection