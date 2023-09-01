<?php 
    //formulario para relacionar serviços com o prestador

    require_once "config.php";
    require_once "header.php";
?>




<main class="container">
    <div class="card">
        <div class="card-header">
            <h2>Cadastro de serviços</h2>
        </div>
        <div class="card-body">
            <p><strong>Selecione abaixo os serviços que você realizará:</strong></p>

            <?php
                foreach($retServ as $dado)
                {   
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type = 'checkbox' name='servico[]' value='{$dado->idServico}'><label>{$dado->descritivo}</label><br>";    
                    echo "</div>";                            
                }                       
 
            ?>                  
            <div class="col-6 erro">
                <?php echo $msg[6] != ""?$msg[6]:""?>
            </div>    
            </div>     
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary" name="action">Enviar</button>   
                <button type="reset" class="btn btn-danger">Cancelar</button>                       
            </div>             
        </div>
    </div>
</main>



<?php 
    require_once "footer.php";
?>