<?php require_once("inc/init.php");?>
<style>
	.itens div {
		padding-left: 0;
		padding-right: 0;
		text-align: center;
	}
	
	.meses div {
		border: 0 solid;
		color: #000;
		text-align: right;
	}
</style>
<h1 class="page-title txt-color-blueDark">
	
	<!-- PAGE HEADER -->
	<i class="fa-fw fa fa-home"></i> 
		Relatório Sintético 
	<select  class="col-sm-2" onchange="iniciar()" id="ano" name="ano" style="float:right">

  </select>
</h1>

<div class="row" style="min-width: 900px !important;">
	<div class="col-sm-12" style="min-width: 900px !important;">
		<div class="col-sm-3" style="background: #666; color:white"> Categoria</div>
		<div class="col-sm-9 itens" style="background: #666; color:white;">
			<div class="col-sm-1" style="color: white;"> JAN</div>
			<div class="col-sm-1" style="color: white;"> FEV</div>
			<div class="col-sm-1" style="color: white;"> MAR</div>
			<div class="col-sm-1" style="color: white;"> ABR</div>
			<div class="col-sm-1" style="color: white;"> MAI</div>
			<div class="col-sm-1" style="color: white;"> JUN</div>
			<div class="col-sm-1" style="color: white;"> JUL</div>
			<div class="col-sm-1" style="color: white;"> AGO</div>
			<div class="col-sm-1" style="color: white;"> SET</div>
			<div class="col-sm-1" style="color: white;"> OUT</div>
			<div class="col-sm-1" style="color: white;"> NOV</div>
			<div class="col-sm-1" style="color: white;"> DEZ</div>
		</div>
	</div>
	<div class="col-sm-12 meses"></div>
</div>

<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		    carregarSelect_custom('ano', 'LISTAR_ANOS_DISPONIVEIS');
				iniciar();
	
	};

	function iniciar() {
		$("#label_status").html("<img src='/money/img/popup.gif' width='20px'>Aguarde... Atualizando registros!!");
					carregarValores({
								consulta: "LISTAR_VALORES_ANO_DETALHES",
								parametro: $('#ano').val() 
							}, function(obj) {
                 $('.meses').html("");
									$.each(obj, function(index, value) {
											if (value.tipo == "1") {
												color = "#B0C4DE";
											} else {
												color = 'white';
											}
											var item = '';
											item = item + '<div class="col-xs-3 col-md-3 col-sm-3" style="border: 1px #ccc solid; color: #800000;background: ' + color + ';height: 22px; text-overflow: ellipsis;  text-align:left"><span> <a href="#" data-toggle="tooltip" data-placement="top" title="0" id="media_' + value.id + '">' + value.descricao + '</a></span></div>';
											item = item + '<div class="col-xs-9 col-md-9 col-sm-9 itens" style="border: 1px #ccc solid;background: ' + color + ';height: 22px; text-overflow: ellipsis;">';
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes1"><a href="#paginas/detalhes.php?mes=01&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["1"])+'</a></div>';	
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes2" ><a href="#paginas/detalhes.php?mes=02&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["2"])+'</a></div>';
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes3"><a href="#paginas/detalhes.php?mes=03&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["3"])+'</a></div>';	
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes4"><a href="#paginas/detalhes.php?mes=04&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["4"])+'</a></div>';
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes5"><a href="#paginas/detalhes.php?mes=05&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["5"])+'</a></div>';	
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes6"><a href="#paginas/detalhes.php?mes=06&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["6"])+'</a></div>';
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes7"><a href="#paginas/detalhes.php?mes=07&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["7"])+'</a></div>';	
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes8"><a href="#paginas/detalhes.php?mes=08&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["8"])+'</a></div>';
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes9"><a href="#paginas/detalhes.php?mes=09&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["9"])+'</a></div>';  	
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes10"><a href="#paginas/detalhes.php?mes=10&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["10"])+'</a></div>';
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes11"><a href="#paginas/detalhes.php?mes=11&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["11"])+'</a></div>';	
											item = item + '<div class="col-xs-1 col-md-1 col-sm-1 valor mes12" ><a href="#paginas/detalhes.php?mes=12&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["12"])+'</a></div>';
											item = item + '</div>';
								     $('.meses').append(item);

							});
								$("#label_status").html("Registros Atualizados!");
					    	colorir();
						});
				$("#label_status").html("<img src='/money/img/popup.gif' width='20px'>Aguarde... Atualizando registros!!");
	}

function colorir(){
		$.each(	$(".valor a"), function(index, value) {
	 
		var d = new Date();
	    var n = d.getMonth();
		console.log(n);
		for(i=1;i<(n+2);i++){
			if(parseInt($(value).html())==0){
				if($(value).parent().hasClass('mes'+i)){
					$(value).parent().css('background','#FCC9C9');
				}
			}
		}
	});
}
	
function retVal(val){
		if(val){
			return val.replace('.',',');
		}else{
			return '0,00';
		}
	}
	pagefunction();
</script>
