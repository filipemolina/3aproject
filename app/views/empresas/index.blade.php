@extends('layouts.main')

@section('content')

	<div role="tabpanel">

		<!-- Abas -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#empresas" aria-controls="empresas" role="tab" data-toggle="tab">Empresas</a></li>
			<li role="presentation"><a href="#cadastro" aria-controls="cadastro" role="tab" data-toggle="tab">Cadastro</a></li>
		</ul>

		<!-- Painéis -->
		<div class="tab-content">

			{{--------------------- Lista de Empresas ----------------------}}
			
			<div role="tabpanel" class="tab-pane active" id="empresas">

				<table class="table table-striped" id="lista-empresas">
					<thead>
						<tr>
							<th>Razão Social</th>
							<th>CNPJ</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						
						@forelse($empresas as $empresa)

							<tr>
								<td> {{ $empresa->razao_social }} </td>
								<td> {{ $empresa->cnpj }} </td>
								<td>
									{{--------------- Botões ----------------}}

									{{-- Editar --}}

									<button type="button" class="btn btn-default btn-xs" aria-label="Editar">
									 	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</button>

									{{-- Excluir --}}

									<button type="button" class="btn btn-danger btn-xs" aria-label="Excluir">
									 	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									</button>

								</td>
							</tr>

						@empty

							<tr>
								<td colspan="3">Nenhuma Empresa Cadastrada</td>
							</tr>

						@endforelse

					</tbody>
				</table>

				<button class="btn btn-primary" id="btn-cadastro">Cadastrar Empresa</button>

			</div>

			{{--------------------- Cadastro de Empresas ----------------------}}
			
			<div role="tabpanel" class="tab-pane" id="cadastro">

				{{-- Nesta div serão mostradas as mensagens para o usuário --}}

				<div class="alertas row"></div>

				{{-- Formulário --}}

				{{ Form::open(array('url' => '/empresas', 'class' => 'col-md-6 col-md-offset-3', 'id' => 'form-cadastro-empresa')) }}

					<div class="form-group">
						{{ Form::label('razao_social', 'Razão Social: ') }}
						{{ Form::text('razao_social', '', array('class' => 'form-control', 'placeholder' => 'Razão Social')) }}
					</div>

					<div class="form-group">
						{{ Form::label('cnpj', 'CNPJ: ') }}
						{{ Form::text('cnpj', '', array('class' => 'form-control text-cnpj', 'placeholder' => 'CNPJ')) }}
					</div>

					<div class="form-group">
						{{ Form::button('Enviar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
					</div>

				{{ Form::close() }}

			</div>

		</div>

@stop