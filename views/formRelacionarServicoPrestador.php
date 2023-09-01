<?php   
    // form para o prestador adicionar um novo serviço p/ seu estabelecimento
    if(!isset($_SESSION))
		session_start();
    
    require_once "views/config.php";
    require_once "views/headerPrestador.php";

?>

<div class="container-sm">   
    <div class="card mt-3">
        <div class="card-header mt-3">
            
            <h2>Cadastro de Serviços  </h2>           
            <strong style="font-size:22px; color:#ed563b"><em><?php echo $_SESSION["Nome"]?></em> </strong>
            <p>Selecione abaixo os serviços que você deja realizar</p>           
        
        </div>
        <div class="card-body">
            <form class="form-group" action="#" method="post" >
                <input required type="hidden" name="idPrestador" value="<?=$_SESSION['idPrestador'];?>">
                <table class="table table-striped">
                    <thead>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Tempo Estimado</th>
                        <th class="text-center">Adicionar</th>
                    </thead>
                    <tbody>                
                        <?php foreach ($retServ as $dado):?>
                            <tr>
                                <td><?=$dado->descritivo?></td>
                                <td><?= "R$ ". number_format($dado->preco, 2, ",", ".")?></td>
                                <td><?=$dado->tempoEstimado?></td>
                                <td class="text-center">
                                    <input type="checkbox" id="idServico" name="servico[]" value="<?=$dado->idServico?>" >
                                </td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                    
                </table>            
        </div>
                <div class="card-footer">
                    <button class="btn btn-primary ms-3" type="submit">Salvar</button>
                   <a class="btn btn-success ms-3" href="index.php?controle=prestadorController&metodo=listarServicos&pagina=1&id=<?php echo $idPrestador; ?>">Voltar</a>

                    
                    <div class="m-3" style="color:green"> 
                        <?php echo "<em>".$msg."</em>";?>  
                    </div> 
                </div> 
            </form>
    </div>
</div>
</body>



















