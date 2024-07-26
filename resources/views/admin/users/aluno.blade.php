@extends('app')


@section('content')

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Alunos
                <small>Listagem de Alunos</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <table class="table">
        <tr>
            <th>
                <a href="{{ url('/alunos?order=matricula') }}">Matrícula</a>
            </th>
            <th>
                <a href="{{ url('/alunos?order=name') }}">Nome</a>
            </th>
            <th>
                <a href="{{ url('/alunos?order=email') }}">Email</a>
            </th>
            <th>
                <a href="{{ url('/alunos?order=whatsapp') }}">Whatsapp</a>
            </th>
            <th>
                <a href="{{ url('/alunos?order=data_nascimento') }}">Nascimento</a>
            </th>
            <th>
                <a href="{{ url('/alunos?order=points') }}">Moedas</a>
            </th>
            <th>
                Ações
            </th>
        </tr>

        @foreach( $listUsers as $user)
            <tr>
                <td>
                    {{ $user->matricula }}
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->whatsapp }}
                </td>
                <td>
                    {{ $user->data_nascimento }}
                </td>
                <td>
                    {{ $user->points  }}
                </td>
                <td>
                    <a href="{{ url('/points/plus') }}/{{ $user->id }}">+ Honras</a><br>
                    <a href="{{ url('/points/minus') }}/{{ $user->id }}">- Honras</a>
                </td>
            </tr>
        @endforeach

    </table>

    <hr>

    <!-- Pagination -->
    {!! $listUsers->render() !!}
    <!-- /.row -->

@stop


