@extends('_layout')


@section('content')



    <h3 class="text-center">Základné údaje o incidente</h3>


    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

        {{csrf_field()}}
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
        <div class="row form-group">
            <label for="observe_date" class="col-sm-2 control-label">Deň a čas spozorovania</label>
            <div class="col-sm-4">
                <p class="form-control-static">
                    <input type="datetime-local" class="form-control" name="observe_date" value="{{ (Input::old('observe_date')) ?  Input::old('observe_date') :  Carbon\Carbon::now()->format('Y-m-d\TH:i')  }}">
                </p>
            </div>
            <label class="col-sm-2 control-label">Deň a čas ohlásenia</label>
            <div class="col-sm-4">
                <p class="form-control-static">
                    <input type="datetime-local" class="form-control" name="report_date" value="{{ (Input::old('report_date')) ?  Input::old('report_date') :  Carbon\Carbon::now()->format('Y-m-d\TH:i')  }}">
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Obec</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <select class="form-control select2" name="town_id"  data-placeholder="" data-allow-clear="false">
                        <option ></option>
                        @foreach($towns as $town)
                            @if (in_array($town->district_id, ['11', '12', '14','29','32','35','39','55','71','72','79']))
                            <option value="{{ $town->id }}"
                                    @if($town->id == Input::old('town_id')) selected @endif
                            >{{ $town->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Adresa</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <input type="text" class="form-control" name="address" value="{{Input::old('address')}}">
                </p>
            </div>
        </div>

        <div class="form-group">
            <label for="insurance" class="col-sm-2 control-label">Poisťovňa</label>
            <div class="col-sm-10">
                <p class="form-control-static">

                    <select multiple class="form-control" name="insurance_companies[]" id="insurance" data-toggle="tooltip" data-placement="bottom"
                    title="Vyber viac poisťovní pridržaním ľavej klávesy Ctrl a kliknutím myši.">
                        @foreach($insuranceCompanies as $company)
                            @if(Input::old('insurance_companies'))
                                <option value="{{ $company->id }}"
                                    @if(in_array($company->id, Input::old('insurance_companies'))) selected @endif
                                >{{ $company->name }}</option>
                            @else
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">Vlastníctvo</label>
            <div class="col-sm-10">
                <p class="form-control-static">

                    <select class="form-control select2" name="ownership_id" data-placeholder="" data-allow-clear="false">
                        <option ></option>
                        @foreach($ownerships as $ownership)
                            <option value="{{ $ownership->id }}"
                                    @if($ownership->id == Input::old('ownership_id')) selected @endif
                            >{{ $ownership->code }} | {{ $ownership->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Určenie škody</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <select class="form-control select2" name="damage_specification_id" data-placeholder="" data-allow-clear="false">
                        <option ></option>
                        @foreach($damageSpecifications as $specification)
                            <option value="{{ $specification->id }}"
                                @if($specification->id == Input::old('damage_specification_id')) selected @endif
                            >{{ $specification->code }} | {{ $specification->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Charakter škôd</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <select class="form-control select2" name="damage_type_id" data-placeholder="" data-allow-clear="false">
                        <option ></option>
                        @foreach($damageTypes as $type)
                            <option value="{{ $type->id }}"
                                    @if($type->id == Input::old('damage_type_id')) selected @endif
                            >{{ $type->code }} | {{ $type->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Odvetvie ekonomickej činnosti</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <select class="form-control select2" name="industry_type_id" data-placeholder="" data-allow-clear="false">
                        <option ></option>
                        @foreach($industryTypes as $type)
                            @if(in_array($type->code, ['100', '200','300','400', '500','600','700','800','900']))
                                <optgroup label="{{ $type->name }}"></optgroup>
                            @else
                                <option value="{{ $type->id }}"
                                        @if($type->id == Input::old('industry_type_id')) selected @endif
                                >{{ $type->code }} | {{ $type->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Škoda (€)</label>
            <div class="col-sm-10">
            <p class="form-control-static">
                Priama: <input type="number" class="text-center" name="direct_damage_value" min="0"
                @if('direct_damage_value' == Input::old('direct_damage_value'))
                value="{{Input::old('direct_damage_value')}}"
                @else value="0"
                @endif>

                Následná: <input type="number" class="text-center" name="followup_damage_value" min="0"
                @if('followup_damage_value' == Input::old('followup_damage_value'))
                value="{{Input::old('followup_damage_value')}}" @else value="0"
                @endif>

                Uchránené hodnoty: <input type="number" class="text-center" name="saved_value" min="0"
                @if('saved_value' == Input::old('saved_value'))
                value="{{Input::old('saved_value')}}" @else value="0"
                @endif>
            </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Fotografická dokumentácia</label>
            <div class="col-sm-10">
            <p class="form-control-static text-center">
                <input type="file" multiple class="text-center" name="images[]" value="{{Input::old('images')}}">
            </p>
            </div>
        </div>


        <div class="row text-right">
            <!-- <button type="button" class="btn btn-primary btn-lg"><a href="/details" role="button">Detaily</a></button>-->
            <button type="submit" class="btn btn-primary btn-lg">Uložiť záznam</button>
        </div>



    </form>






@endsection