/*--------------------------------------------------------------------------------------------------------
| Helpers
--------------------------------------------------------------------------------------------------------*/

function atualizarTabela(url, tabela)
{
	$.get(url, function(data){

		//Converter a resposta em um objeto JSON
		var resposta = JSON.parse(data);

		$(tabela).empty();

		console.log(resposta);

	});
}

/*--------------------------------------------------------------------------------------------------------
| Page Load
--------------------------------------------------------------------------------------------------------*/

$(function(){

	/*---------------------------------------
	| Máscaras dos campos
	---------------------------------------*/

	$('.data').mask('99/99/9999', { placeholder : 'dd/mm/aaaa' });
	$('.text-cnpj').mask('99.999.999/9999-99');

	/*----------------------------------------------
	| Botões que abrem os forms de cadastro
	----------------------------------------------*/

	$("#btn-cadastro").click(function(){ $('a[href="#cadastro"]').trigger('click') })

	/*----------------------------------------------
	| Enviar o formulário de cadastro de campanhas
	----------------------------------------------*/

	$("#form-cadastro-campanha").submit(function(e){

		//Evitar o comportamento padrão do form

		e.preventDefault();

		//Obter os dados

		var nome         = $('input#nome').val();
		var data_inicial = $('input#data_inicial').val();
		var data_final   = $('input#data_final').val();
		var empresa_id   = $('select#empresa_id').val();
		var _token       = $('input[name=_token]').val();

		//Enviar por Ajax e obter a resposta

		$.post('/campanhas', { nome : nome, data_inicial : data_inicial, data_final : data_final, empresa_id : empresa_id, _token : _token }, function(data){
			
			var resposta = JSON.parse(data);

			//Caso o cadastro tenha ocorrido normalmente

			if(!resposta.erros)
			{
				var campanha = JSON.parse(resposta.campanha);

				//Mostrar a mensagem de sucesso
				$("div.alertas").append('<div class="alert alert-success alert-dismissible fadeInDown animated"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Campanha <strong>'+nome+'</strong> criada com sucesso.</div>');

				//Apagar os dados do formulário
				$("#form-cadastro-campanha").find('input, select').val('');

				//Atualizar os dados da tabela de campanhas da empresa
				$('table[data-empresa="'+empresa_id+'"] tbody').append('<tr><td>'+nome+'</td><td>'+campanha.created_at+'</td><td><button type="button" class="btn btn-default btn-xs" aria-label="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button> <button type="button" class="btn btn-danger btn-xs" aria-label="Excluir"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button> </td></tr>');
			}

			//TODO : Colocar a mensagem de erro

		});

		//Evitar que o formulário seja submetido de forma tradicional

		return false;

	});

	/*----------------------------------------------
	| Enviar o formulário de cadastro de empresas
	----------------------------------------------*/

	$("#form-cadastro-empresa").submit(function(e){

		e.preventDefault();

		var razao_social = $("input#razao_social").val();
		var cnpj         = $("input#cnpj").val();
		var _token       = $('input[name=_token]').val();

		$.post('/empresas', { razao_social : razao_social, cnpj : cnpj, _token : _token }, function(data){

			var resposta = JSON.parse(data);

			if(!resposta.erros)
			{
				var empresa = JSON.parse(resposta.empresa);

				//Mostrar a mensagem de sucesso
				$("div.alertas").append('<div class="alert alert-success alert-dismissible fadeInDown animated"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Empresa <strong>'+razao_social+'</strong> criada com sucesso.</div>');

				//Apagar os dados do formulário
				$("#form-cadastro-empresa").find('input').val('');

				//Atualizar os dados da tabela de empresas
				$("table#lista-empresas").append('<tr><td>'+razao_social+'</td><td>'+cnpj+'</td><td><button type="button" class="btn btn-default btn-xs" aria-label="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button> <button type="button" class="btn btn-danger btn-xs" aria-label="Excluir"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button> </td></tr>');
			}

		});

		return false;

	});

});