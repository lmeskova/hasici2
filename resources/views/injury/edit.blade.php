@extends('_layout')

@section('content')


    <h3 class="text-center form-group">Zranenie vzniknuté pri incidente</h3>


    <form class="form-horizontal" method="post" action="">

        {{csrf_field()}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <div class="form-group">
            <label class="col-sm-3 control-label">Dôvod evidencie zranenia</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control select2" name="injury_type_id" data-placeholder="" data-allow-clear="true">
                        <option ></option>
                        @foreach($injuryTypes as $type)
                            <option value="{{ $type->id }}"
                                    @if(Input::old('injury_type_id') ? ($type->id == Input::old('injury_type_id')) : ($type->id == $injury->injury_type_id)) selected
                                    @endif
                            >{{ $type->code }} | {{ $type->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Kategória zranenia</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control select2" name="injury_category_id" data-placeholder="" data-allow-clear="true">
                        <option ></option>
                        @foreach($injuryCategories as $category)
                            <option value="{{ $category->id }}"
                                    @if(Input::old('injury_category_id') ? ($category->id == Input::old('injury_category_id')) : ($category->id == $injury->injury_category_id)) selected
                                    @endif
                            >{{ $category->code }} | {{ $category->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Okolnosti zranenia</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control select2" name="injury_circumstance_id" data-placeholder="" data-allow-clear="true">
                        <option ></option>
                        @foreach($injuryCircumstances as $circumstance)
                            <option value="{{ $circumstance->id }}"
                                    @if(Input::old('injury_circumstance_id') ? ($circumstance->id == Input::old('injury_circumstance_id')) : ($circumstance->id == $injury->injury_circumstance_id)) selected
                                    @endif
                            >{{ $circumstance->code }} | {{ $circumstance->name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Príčiny zranenia</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control select2" name="injury_cause_id" data-placeholder="" data-allow-clear="true">
                        <option ></option>
                        @foreach($injuryCauses as $cause)
                            <option value="{{ $cause->id }}"
                                    @if(Input::old('injury_cause_id') ? ($cause->id == Input::old('injury_cause_id')) : ($cause->id == $injury->injury_cause_id)) selected
                                    @endif
                            >{{ $cause->code }} | {{ $cause->name }}</option>
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