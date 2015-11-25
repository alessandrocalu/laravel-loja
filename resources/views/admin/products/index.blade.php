@extends('app')


@section('content')

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Produtos
                <small>Listagem de Produtos</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <table class="table">
        <tr>
            <th>
               Grupos
            </th>
            <th>
               Nome
            </th>
            <th>
                Marca
            </th>
            <th>
                Modelo
            </th>
            <th>
                Cor
            </th>
            <th>
                Quant.
            </th>
            <th>
                Action
            </th>
        </tr>

        @foreach( $listProducts as $product)
            <tr>
                <td>
                    {{ $product->grupos }}
                </td>
                <td>
                    {{ $product->nome }}
                </td>
                <td>
                    {{ $product->marca  }}
                </td>
                <td>
                    {{ $product->modelo }}
                </td>
                <td>
                    {{ $product->cor }}
                </td>
                <td>
                    {{ $product->quantidade .' '.$product->unidade }}
                </td>
                <td>
                    ...
                </td>
            </tr>
        @endforeach

    </table>

    <hr>

    <!-- Pagination -->
    {!! $listProducts->render() !!}
    <!-- /.row -->

@stop


