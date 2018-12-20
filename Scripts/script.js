$(document).ready(function(e) {
	
	var tempo = setInterval(function(){
		
		$("#splash").hide();
		$("#Telalogin").show();
		
	},2000);

	$("#btnEntrar").click(function(){
		$("#Telalogin").hide();
		$("#telaInicial").show();
	})

	$("#btnCadastrar").click(function(){
		$("#Telalogin").hide();
		$("#TelaCadastro").show();
	})

	$("#btnEntrarCadastro").click(function(){
		$("#TelaCadastro").hide();
		$("#Telalogin").show();
	})


	$("#btnGlossarioI").click(function(){
		$("#telaInicial").hide();
		$("#TelaGlossario").show();
	})

	$("#btnInicioG").click(function(){
		$("#TelaGlossario").hide();
		$("#telaInicial").show();
	})

	/*$("#btnCadastraBanco").click(function(){		
	alert('cadastro realizado com sucesso');
	$("#TelaCadastro").hide();
	$("#telaInicial").show();

	})*/

	$("#btnSairI").click(function(){
		$("#telaInicial").hide();
		$("#Telalogin").show();
	})

		$("#btnSairG").click(function(){
		$("#TelaGlossario").hide();
		$("#Telalogin").show();
	})

		$("#btnPlanta1").click(function(){
		$("#telaInicial").hide();
		$("#TelaPlantas").show();
	})
		$("#btnPlanta2").click(function(){
		$("#telaInicial").hide();
		$("#TelaPlantas").show();
	})

		$("#btnPlanta3").click(function(){
		$("#telaInicial").hide();
		$("#TelaPlantas").show();
	})

		$("#btnPlanta4").click(function(){
		$("#telaInicial").hide();
		$("#TelaPlantas").show();
	})

		$("#btnInicioP").click(function(){
		$("#TelaPlantas").hide();
		$("#telaInicial").show();
	})

		$("#btnGlossarioP").click(function(){
		$("#TelaPlantas").hide();
		$("#TelaGlossario").show();
	})

		$("#btnSairP").click(function(){
		$("#TelaPlantas").hide();
		$("#Telalogin").show();
	})	
	
		$("#btnEsqueciSenha").click(function(){
		$("#Telalogin").hide();
		$("#TelaEsqueciSenha").show();
	})		

		$("#btnMudarSenha").click(function(){
		alert('Confirmação enviada para e-mail informado');
		$("#TelaEsqueciSenha").hide();
		$("#Telalogin").show();
	})


})


