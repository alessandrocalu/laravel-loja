@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Bem vindo!</div>

				<div class="panel-body">
					<h3>Seu saldo em moedas é: {{$points}}</h3>
					{{ date('Y-m-d H:i:s') }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection