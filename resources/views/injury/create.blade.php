@extends('_layout')

@section('content')


    <h1 class="text-center form-group">Zranenia</h1>


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
                    <select class="form-control" name="injury_type_id">
                        <option ></option>
                        @foreach($injuryTypes as $type)
                            <option value="{{ $type->id }}" @if($type->id == Input::old('injury_type_id'))
                            selected @endif>({{ $type->code }}) {{ $type>name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Kategória zranenia</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="injury_category_id">
                        <option ></option>
                        @foreach($injuryCategories as $category)
                            <option value="{{ $category->id }}" @if($category->id == Input::old('injury_category_id'))
                            selected @endif>({{ $category->code }}) {{ $category>name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Okolnosti zranenia</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="injury_circumstances_id">
                        <option ></option>
                        @foreach($injuryCircumstances as $circumstance)
                            <option value="{{ $circumstance->id }}" @if($circumstance->id == Input::old('injury_circumstances_id'))
                            selected @endif>({{ $circumstance->code }}) {{ $circumstance>name }}</option>
                        @endforeach
                    </select>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Príčiny zranenia</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <select class="form-control" name="injury_causes_id">
                        <option ></option>
                        @foreach($injuryCauses as $cause)
                            <option value="{{ $cause->id }}" @if($cause->id == Input::old('injury_causes_id'))
                            selected @endif>({{ $cause->code }}) {{ $cause>name }}</option>
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