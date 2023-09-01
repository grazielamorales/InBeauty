<?php 
	//var_dump($prestador);
	//var_dump($servico);
	//die();
	require_once "headerUsuario.php";
    if(!isset($_SESSION))
		session_start();

	date_default_timezone_set("America/Sao_Paulo");
	
?>

<style>
	.card{
	margin-top:80px;
	}
	
	p{
		font-size: 18px;
		font-weight:bold;
	}

	strong{
		color: #ed563b;
		font-size: 18px;
		font-weight: bold;
		font-style: italic;
	}
	.input-padding-y{
		padding:0.5rem;
	}

</style>

<div class="container">
	<div class="card">
	
		<div class="card-header">
			<h2>Reserva de horário:</h2>	
			<p>Profissional: <strong><?php echo $retprestador[0]->Nome;?></strong></p>			
			<p>Procedimento: <strong><?php echo $retservico[0]->descritivo?></strong></p>
			<p>Valor procedimento: <strong><?php echo "R$". number_format($retservico[0]->preco, 2, ',', '.');?></strong></p>
		</div>
		<div class="card-body mt-3 mb-5">
			<h2>Escolha uma data e hora:</h2>
			<form action="#" method="post">
				<input class="form-control" type="hidden" name="idUsuario" value="<?php echo $_SESSION["idUsuario"]?>" id="">
				<input class="form-control" type="hidden" name="idPrestador" value="<?php echo $retprestador[0]->idPrestador ?>" id="idPrestador">
				<input class="form-control" type="hidden" name="idServico" value="<?php echo $retservico[0]->idServico ?>">
				
			
						
				<input class="input-padding-y" type="date" min="<?php echo date('Y-m-d') ?>"  name="DataReserva" id="DataReserva" required>
				
				<select class="input-padding-y" name="HoraReserva" id="hora" required>
					<option value="">Hora:</option>
					
				</select>
				
				<button type="submit" class="btn btn-primary ms-5">Agendar</button>
				<a href="index.php?controle=usuarioController&metodo=home" class="btn btn-success"> Voltar</a>				
			</form>
			
		</div>
		<div class="col-6 ms-5 mb-5" style="color:#198754"><?php echo $msg;?></div>
	</div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
	 
	 $(function(){
            $("#DataReserva").change(function(){               
                var data = $(this).val();
				var idPrestador = document.getElementById("idPrestador").value;
				
                $.ajax({
                    type:'GET',
                    url:'index.php',
                    data:'controle=reservaController&metodo=buscarDataAgenda&data=' + data + '&idPrestador=' + idPrestador,
					dataType:'json', 
                    success:function(dataReservada){
                       //remover os filhos select
					   document.getElementById("hora").innerText = "";
					   
						
						if(dataReservada.length > 0)
						{
							verificar_horarios(dataReservada);
						}
						else
						{
							gerar_horarios();
								
						}
                    },
                    error:function(){
                        alert("erro");
                    }
                });

               
            });
        });
		
		function verificar_horarios(dataReservada)
		{
			
				var horaInicio = 8;
				var gerar = true;
				while(gerar)
				{
					var procurar = false;
					var hora="";
					for(var x=0; x<dataReservada.length; x++)
					{
						
						if(horaInicio < 10)
						{
							hora = "0" + horaInicio + ":00:00";
						}
						else
						{
							hora = horaInicio + ":00:00"
						}
						if(dataReservada[x].HoraReserva == hora)
						{
							procurar = true;
							break;
							
						}
					}//fim do for
					//alert(procurar);
					if(!procurar)
					{
						var horaApres = hora.substr(0, 5);
						var option = document.createElement("option");
						option.appendChild(document.createTextNode(horaApres));
						document.getElementById("hora").appendChild(option);
						
					}
					// somar horaInicio
					horaInicio++;
					if(horaInicio == 12)
					{
						//pula a hora do almoço
						horaInicio++;
					}
					
					if(horaInicio == 19)
					{
						gerar = false;
					}
				}//fim while
			
		}
		function gerar_horarios()
		{
			
			var horaInicio = 8;
			
			for(var x = 0; x < 10; x++)
			{
				var hora="";
				if(horaInicio < 10)
				{
					hora = "0" + horaInicio + ":00";
				}
				else
				{
					hora = horaInicio + ":00"
				}
				var option = document.createElement("option");
				option.appendChild(document.createTextNode(hora));
				document.getElementById("hora").appendChild(option);
				
				horaInicio = horaInicio + 1;
				if(horaInicio == 12)
				{
					horaInicio = horaInicio + 1;
				}
			}
		}
</script>

