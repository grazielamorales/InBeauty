<html lang="pt-BR">
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="INBEAUTY" content="Agendamento online para salões de beleza, barbearias e   clinicas de estética">
    <meta name="Graziela B. Morales" content="5º Sem S.I. FATEC/Jau">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
     <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eefac6c057.js" crossorigin="anonymous"></script>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">   
    <title>INBEAUTY - HeaderUsuario</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <style>
        body{        
        background-image: url(assets/images/bkg6-1.jpg);
        background-color: #000000b9;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        text-align: center;
             
        }
       
        .card{
         background-color: #000000b9;
         color: #fff;       
        
        }
        a{
            color:#fff;
            text-decoration: none;
        }     

        
    </style>
<body>
<br>
<div class="container-md">
    <div class=" card d-grid gap-2 col col-sm-4 mx-auto">
        <div class="logo-login mt-5">           
            <h2>IN<em>Beauty</em></h2>           
        </div>        
        
        <div class="card-body text-start">
            <form action="#" method="post">            
                 <!--Email e Senha-->                 
                 <div class="d-grid gap-2 col col-sm-8 mx-auto  mt-3">
                    <label class="label" for="Email">Email</label>
                    <input class="form-control" type="email" name="Email" required>
                </div>
                <div class="d-grid gap-2 col col-sm-8 mx-auto  mt-3">                   
                    <label class="label" for="Senha">Senha</label>
                    <input class="form-control" type="password" name="Senha" required>
                </div>
                <div class="d-grid gap-2 col col-sm-8 mx-auto  mt-5 mb-5 ">
                    <button type="submit" class="btn btn-dark btn-lg" name="action" style="background-color:#ed563b">ENTRAR</button>   
                                                 
                </div> 
                <div class="col col-sm-10 offset-1 mt-5 mb-5 text-center">
                    
                    <p><a href="index.php">Precisa de ajuda?</a></p>

                     <strong>Novo por aqui? </strong>                    
                    <a href="index.php?controle=usuarioController&metodo=inserir"> Inscreva-se agora.</a>
                
                </div> 
                <div class="col col-sm-10 offset-1 mb-3 text-center" style="font-size: 12px;">
                     &copy; Direitos reservados
                </div>                
            </form>
        </div>
    </div>
</div>


