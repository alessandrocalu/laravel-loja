@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Bem vindo!</div>

				<div class="panel-body">
					Seu saldo em moedas é: {{$points}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection