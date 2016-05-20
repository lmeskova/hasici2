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



        <div class="row text-right">
            <button type="submit"  class="btn btn-primary btn-lg">Uložiť záznam</button>
        </div>
    </form>



@endsection