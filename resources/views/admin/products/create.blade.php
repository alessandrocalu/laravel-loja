@extends('app')


@section('content')

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Produtos
                <small>Novo Produto</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    {!! Form::open(['route'=> 'items.store' , 'method'=>'post']) !!}

    <div  class="form-group">
        {!! Form::label('grupos','Grupos:') !!}
        {!! Form::text('grupos',null, ['class'=>'form-control']) !!}
    </div>

    <div  class="form-group">
        {!! Form::label('nome','Nome:') !!}
        {!! Form::text('nome',null, ['class'=>'form-control']) !!}
    </div>

    <div  class="form-group">
        {!! Form::label('marca','Marca:') !!}
        {!! Form::text('marca',null, ['class'=>'form-control']) !!}
    </div>

    <div  class="form-group">
        {!! Form::label('modelo','Modelo:') !!}
        {!! Form::text('modelo',null, ['class'=>'form-control']) !!}
    </div>

    <div  class="form-group">
        {!! Form::label('cor','Cor:') !!}
        {!! Form::text('cor',null, ['class'=>'form-control']) !!}
    </div>

    <div  class="form-group">
        {!! Form::label('quantidade','Quantidade:') !!}
        {!! Form::text('quantidade',null, ['class'=>'form-control']) !!}
    </div>

    <div  class="form-group">
        {!! Form::label('unidade','Unidade:') !!}
        {!! Form::text('unidade',null, ['class'=>'form-control']) !!}
    </div>

    <div  class="form-group">
        {!! Form::submit('Criar Produto', ['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}

@stop


