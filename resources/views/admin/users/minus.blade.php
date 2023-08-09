@extends('app')


@section('content')

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Utilizar Honra
                <small>{{$user->matricula}} - {{$user->name}} (Saldo: {{$user->points}})</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    {!! Form::open(['route'=> 'points.minus' , 'method'=>'post']) !!}

        {!! Form::hidden('id', $user->id, array('id' => 'id')) !!}

        <div  class="form-group row">
            <label class="col-md-2 control-label text-right">Pontos(-)</label>
            <div class="col-md-4">
                <input type="number" class="form-control" name="pontos" min=1 value="{{ old('pontos') }}" required>
            </div>
        </div>

        <div  class="form-group row">
            <label class="col-md-2 control-label text-right">Motivo</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="motivo" value="{{ old('motivo') }}" required>
            </div>
        </div>

        <div  class="form-group row">
            <div class="col-md-2 col-md-offset-2">
                <button type="submit" class="btn btn-primary">
                    Utilizar
                </button>
            </div>
            <div class="col-md-2">
                <a href="{{ URL::previous() }}" class="btn btn-default">voltar</a>
            </div>
        </div>
    </form>

@endsection