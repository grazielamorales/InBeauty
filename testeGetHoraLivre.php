 $idReserva = $_GET['idReserva'];
            $data = $_GET['data'];
            $idPrestador = $_GET['idPrestador'];

            $reservaDAO = new ReservaDAO($this->param);
            $agendamentos = array_column($reservaDAO->getHorarios($idReserva, $data, $idPrestador), "HoraReserva");

            $prestadorDAO = new PrestadorDAO($this->param);
            $TempoEstimadoProcedimento = $prestadorDAO->getTempoEstimado($idPrestador);
            var_dump($TempoEstimadoProcedimento);
            $horario = "08:00:00";
            $fechamento = "19:00:00";            
            $TempoEstimadoProcedimento = explode(':', $TempoEstimadoProcedimento);
            $TempoEstimadoProcedimento = ((int)$TempoEstimadoProcedimento[0] * 60) + $TempoEstimadoProcedimento[1];
            $horarios = array();//horarios disponiveis p/ agendamento

            while ($horario < $fechamento) {
                if (!in_array($horario, $agendamentos)) {
                    $horarios[]=$horario;
                }

                $hora = explode(":", $horario);
                $horas = $hora[0] * 60;
                $minutos = $horas + $hora[1];

                $tempoFinal = $TempoEstimadoProcedimento + $minutos;
                $horaFinal = floor($tempoFinal / 60);
                $minutoFinal = $tempoFinal - ($horaFinal * 60);

                $tempoFinal = str_pad($horaFinal, 2, '0', STR_PAD_LEFT) . ':' . str_pad($minutoFinal, 2, '0', STR_PAD_LEFT) . ':00';

                $horario = $tempoFinal;
            }
            echo json_encode($horarios);



//para usar qdo for add um prestador
<script>
function atualizarCampos(idServico) {
    var preco, tempoEstimado;
  
    <?php foreach($retServ as $option) { ?>
        if ('<?php echo $option->idServico ?>' === idServico) {
            preco = '<?php echo number_format($option->preco,2,',','.')?>';
            tempoEstimado = '<?php echo $option->tempoEstimado ?>';
           
        }
    <?php } ?>

    document.getElementsByName('preco')[0].value = preco;
    document.getElementsByName('tempoEstimado')[0].value = tempoEstimado;
}
</script>


//parte do formEditarCadastroUsuario - senha
<div class="col-12 erro"><?php echo $msg[5] != ""?$msg[5]:""?></div>
                <div class="col-6 mt-3">     
                    <label class="label" for="Senha">Senha</label>
                    <input class="form-control" type="password" name="Senha">
                </div>
                <div class="col-6 mt-3">     
                    <label class="label" for="Confsenha">Confirme a Senha</label>
                    <input class="form-control" type="password" name="Confsenha">
                </div>
                <div class="col-6 erro"><?php echo $msg[6] != ""?$msg[6]:""?></div>
                <div class="col-6 erro"><?php echo $msg[7] != ""?$msg[7]:""?></div> 


                if(empty($_POST["Senha"]))
				{
					$msg[7] = "Preencha a senha";
					$erro = true;
				}
				if(empty($_POST["ConfSenha"]))
				{
					$msg[8] = "Preencha a confirmação da senha";
					$erro = true;
				}			