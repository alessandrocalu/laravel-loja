@extends('app')


@section('content')

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Participantes
                <small>Listagem de Participantes</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <table class="table">
        <tr>
            <th>
               Tipo
            </th>
            <th>
               Matricula
            </th>
            <th>
               Nome
            </th>
            <th>
                Email
            </th>
            <th>
                Whatsapp
            </th>
            <th>
                Nascimento
            </th>
            <th>
                Moedas
            </th>
        </tr>

        @foreach( $listUsers as $user)
            <tr>
                <td>
                    {{ $user->type }}
                </td>
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
            </tr>
        @endforeach

    </table>

    <hr>

    <!-- Pagination -->
    {!! $listUsers->render() !!}
    <!-- /.row -->

@stop


