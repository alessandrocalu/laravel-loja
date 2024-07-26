@extends('app')

@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registrar</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Ops!</strong> Ocorreu algum problema!<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Whatsapp/Celular</label>
							<div class="col-md-6">
								<input type="whatsapp" class="form-control" name="whatsapp" value="{{ old('whatsapp') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Data Nascimento</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Senha</label>
							<div class="col-md-6">
								<img src="/resources/img/oio.png" id="olho" class="olho" title="ver texto">
								<input type="password" id="pass" class="form-control" name="password" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmar Senha</label>
							<div class="col-md-6">
								<img src="/resources/img/oio.png" id="olho_confirmation" class="olho" title="ver texto">
								<input type="password" id="pass_confirmation" class="form-control" name="password_confirmation" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<div class="g-recaptcha" data-sitekey="6LfjcaYpAAAAACBo7Q7Sutjco7xzxTHsaD4E8xZu"></div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
document.getElementById('olho').addEventListener('mousedown', function() {
  document.getElementById('pass').type = 'text';
});

document.getElementById('olho').addEventListener('mouseup', function() {
  document.getElementById('pass').type = 'password';
});

// Para que o password não fique exposto apos mover a imagem.
document.getElementById('olho').addEventListener('mousemove', function() {
  document.getElementById('pass').type = 'password';
});


document.getElementById('olho_confirmation').addEventListener('mousedown', function() {
  document.getElementById('pass_confirmation').type = 'text';
});

document.getElementById('olho_confirmation').addEventListener('mouseup', function() {
  document.getElementById('pass_confirmation').type = 'password';
});

// Para que o password não fique exposto apos mover a imagem.
document.getElementById('olho_confirmation').addEventListener('mousemove', function() {
  document.getElementById('pass_confirmation').type = 'password';
});

</script>

<style>
.olho {
  cursor: pointer;
  right: 25px;
  position: absolute;
  width: 30px;
}
</style>
@endsection
