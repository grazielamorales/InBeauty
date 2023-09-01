    <?php 
       require_once "views/config.php";
         if(!isset($_SESSION)){
            session_start();
         }   

    ?>

<body>
    <nav class="navbar fixed-top navbar-expand-sm bg-body-tertiary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="index.php" id="logo">IN<em> BEAUTY</em></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">           
            
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user fa-2xl" style="color: #ed563b;"></i>
               <?= $_SESSION["Apelido"];?>
            </a>
            <ul class="dropdown-menu">
              
                <li><a class="dropdown-item" href="index.php?controle=ReservaController&metodo=listarAgenda">Minha Agenda</a></li>
                <li><hr class="dropdown-divider"></li>

                <li><a class="dropdown-item" href="index.php?controle=UsuarioController&metodo=editarUsuario">Minha Conta</a></li>
                 <li><hr class="dropdown-divider"></li>

                <li><a class="dropdown-item" href="index.php?controle=UsuarioController&metodo=home">Serviços</a></li>
                <li><hr class="dropdown-divider"></li>

                <li><a class="dropdown-item" href="index.php?controle=UsuarioController&metodo=logout">Sair</a></li>
            </ul>
            
           
        </ul>
        
        </div>
    </div>
    </nav>



<!--JS Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


