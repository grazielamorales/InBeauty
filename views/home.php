<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="INBEAUTY" content="Agendamento online para salões de beleza, barbearias e   clinicas de estética">
    <meta name="Graziela B. Morales" content="5º Sem S.I. FATEC/Jau">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
     <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eefac6c057.js" crossorigin="anonymous"></script>
    <title>INBEAUTY Agenda Online para salões e barbearias</title>
<!--

TemplateMo 548 Training Studio

https://templatemo.com/tm-548-training-studio

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-training-studio.css">
    <link rel="stylesheet" href="../assets/css/style2.css">

    </head>
    
    <body>    
 
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">IN<em> Beauty</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->

                        <ul class="nav">
                            <?php 
                            if(!isset($_SESSION["Tipo"]))
                                echo"<li class='scroll-to-section'><a href='#call-to-action' class='active'>Cadastre-se</a></li>";
                            ?>
                            <li class="scroll-to-section"><a href="#features">Sobre nós</a></li>
                            <li class="scroll-to-section"><a href="#our-classes">Serviços</a></li>
                            <?php
                            if(!isset($_SESSION["Tipo"]))
                                echo"<li class='scroll-to-section'><a href='#schedule'>Cadastre sua Empresa</a></li>";
                            ?>
                            <li class="scroll-to-section"><a href="#contact-us">Contato</a></li> 
                            <?php
                            if(!isset($_SESSION["Tipo"]))
                                echo"<li class='main-button'><a href='index.php?controle=usuarioController&metodo=login'>ENTRAR</a></li>";
                            else
                            {
                                if($_SESSION["Tipo"] == "usuario"){
                                    echo"<li ><a href='index.php?controle=usuarioController&metodo=home'>AGENDA</a></li>";
                                }
                                else{
                                    echo"<li ><a href='index.php?controle=prestadorController&metodo=home'>PRESTADOR</a></li>";
                                }
                                echo"<li class='main-button'><a href='index.php?controle=usuarioController&metodo=logout'>SAIR</a></li>";
                              
                            }
                            ?>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/videoapresentacao.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Bem vindo a <em>INBEAUTY</em>!</h6>
                <h2>Agende online os serviços de beleza mais próximo <em>de você</em></h2>
                <div class="main-button scroll-to-section">
                    <a href="#features">Como funciona</a>
                </div>
          
                <!-- ***** Main Campo de Busca serviços ***** -->
                <div class="container-fluid mt-5">
                    <form name="search" action="#"  method="get">
                        <ul class="busca">
                            <li class="busca-li">
                                <input class="form-control form-control-lg" type="text" name="servico" placeholder="Digite o serviço ou estabelecimento" style="border-radius: 0%;">
                            </li>
                            
                            <li class="form-group">
                                <input class="btn btn-danger btn-lg"  type="submit" value="Buscar" style="background-color: #ed563b; border-radius: 0%;">
                            </li>
                        </ul>               
                            
                    </form>
                </div>
            </div>
        </div>
    </div>       
    
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Agenda <em>Online</em></h2>
                        <img src="assets/images/line-dec.png" alt="waves">
                        <p>A <em>INBEAUTY</em> é uma plataforma de agendamento online para estabelecimentos de beleza que funciona em 3 etapas:</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/images/pesquisa-qualitativa.png" class="card-img-top" alt="imagem lupa" style="width: 30%;" >
                        <div class="card-body">
                            <h5 class="card-title">1. ENCONTRE</h5>
                            <p class="card-text">Escolha os estabelecimentos e profissionais de sua preferência.</p>                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/images/agendamento.png" class="card-img-top" alt="imagem agenda" style="width: 30%;">
                        <div class="card-body">
                            <h5 class="card-title">2. MARQUE</h5>
                            <p class="card-text">Defina o dia e o horário em que deseja marcar seu agendamento.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/images/confirma.png" class="card-img-top" alt="imagem agenda" style="width: 30%;">
                        <div class="card-body">
                            <h5 class="card-title">3. COMPAREÇA</h5>
                            <p class="card-text">Pronto! Agora, é só comparecer ao salão no horário marcado.</p>
                        </div>
                    </div>
                </div>               
            </div>
            
        </div>
    </section>
    <!-- ***** Features Item End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section" id="call-to-action" >
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Não <em>pense</em>, comece <em> hoje</em>!</h2>
                        <p>A INBEAUTY encontra os melhores salões para você</p>
                        <p>Cadastre-se gratuitamente</p>
                        <div class="main-button scroll-to-section">
                            <a href="index.php?controle=UsuarioController&metodo=inserir">Começar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Os melhores <em>Profissionais</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <h6>Veja alguns dos serviços que você encontra na <em>INBEAUTY</em></h6>
                    </div>
                </div>
            </div>
            <!-- ***** Inicio do Modal ***** -->
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            
                            <img class="img-fluid" src="assets/images/indico1.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption mt-3" style="text-align: center">
                            <h3>Manicure</h3>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            
                            <img class="img-fluid" src="assets/images/indico2.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption mt-3" style="text-align: center">
                            <h3>Cabelo</h3>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            
                            <img class="img-fluid" src="assets/images/indico3.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption mt-3" style="text-align: center">
                            <h3>Maquiagem</h3>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Portfolio item 4-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                            
                            <img class="img-fluid" src="assets/images/indico4.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption mt-3" style="text-align: center">
                           <h3>Massagem</h3>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- Portfolio item 5-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                            
                            <img class="img-fluid" src="assets/images/indico5.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption mt-3" style="text-align: center">
                            <h3>Barbearia</h3>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Portfolio item 6-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                            
                            <img class="img-fluid" src="assets/images/indico6.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption mt-3" style="text-align: center">
                            <h3>Estética</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
              
    <!-- ***** Final PortifolioModal ***** -->
    
    <section class="section" id="schedule">
        <div="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Venha fazer parte do time <em> INBEAUTY</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Traga seu negócio para a plataforma mais visitada.</p>
                        <p>Você não paga nada para cadastrar seu estabelecimento e ainda terá sete dias de teste gratuíto!</p>
                        <p>Se você é autônomo, também pode fazer parte da INBEAUTY!</p>
                        <br>
                        <h2>Comece agora mesmo!</h2>
                    </div>
                </div>               
                <div class="col-lg-6 offset-lg-5">
                        <div class="main-button scroll-to-section">
                            <a href="index.php?controle=PrestadorController&metodo=inserir">Cadastre sua EMPRESA</a>
                        </div>
                </div>       
         </div>
 </section>

    <!-- ***** Testimonials Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Casos de <em>Sucesso</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Alguns dos profissinais que fazem parte do time INBEAUTY. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/cas1.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>Hair Stylist</span>
                            <h4>Lisa Tompson</h4>
                            <p>Hair Stylist e Maqueadora. </p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa-brands fa-facebook fa-2xl" ></i>
                                <li><a href="#"><i class="fa-brands fa-linkedin fa-2xl"></i>
                                <li><a href="#"><i class="fa-brands fa-instagram fa-2xl"></i>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/casi2.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>Hair Stylist e Barbeiro</span>
                            <h4>Paulo Vitchenzo</h4>
                            <p>Cabeleireiro e empresário. </p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa-brands fa-facebook fa-2xl" ></i>
                                <li><a href="#"><i class="fa-brands fa-linkedin fa-2xl"></i>
                                <li><a href="#"><i class="fa-brands fa-instagram fa-2xl"></i>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/casi3.jpg" alt="">
                        </div>
                        <div class="down-content" style="width: 18rem;">
                            <span>Hair Stylist, visagista e colorimetrista</span>
                            <h4>Jorge Valentim</h4>
                            <p>Especialista  mechas e tintutas.</p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa-brands fa-facebook fa-2xl" ></i>
                                <li><a href="#"><i class="fa-brands fa-linkedin fa-2xl"></i>
                                <li><a href="#"><i class="fa-brands fa-instagram fa-2xl"></i>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Ends ***** -->
    
    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">
                      <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="nome" type="text" id="name" placeholder="Seu Nome*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Seu Email*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="subject" type="text" id="subject" placeholder="Objetivo">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Mensagem" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Enviar</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Copyright &copy; 2023 INBEAUTY 
                    - S.I. FATEC / JAÚ               
                    </p>                    
                    <!-- You shall support us a little via PayPal to info@templatemo.com -->
                </div>
            </div>
        </div>
    </footer>

     <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">                
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase" style="color:#ed563b">Manicure e Pedicure</h2>
                                <p class="item-intro text-muted">Profissionais dedicados em manter a saúde e beleza dos pés e das mãos!</p>
                                <img class="img-fluid d-block mx-auto" src="assets/images/indico1.jpg" alt="..." />
                                <p>O que é ser uma manicure? A manicure/pedicure é a profissional responsável pelo embelezamento e saúde das unhas das mãos e dos pés. Para tal, este profissional utiliza técnicas e instrumentos específicos, como alicates,
                                    cortadores, lixas, fortalecedores, esmaltes, palitos, espátulas, etc.</p>
                                <p>Outro Profissional de destaque é o Podólogo. Podologia é uma área auxiliar da Medicina dedicada ao estudo, tratamento e prevenção de podopatias (doenças dos pés). O podólogo estuda profundamente a anatomia, a fisiologia
                                    e a biomecânica do pé e do tornozelo, assim como as enfermidades que os atingem. </p>
                                <ul class="list-inline">
                                    <li >
                                        <strong>Profissionais em Destaque</strong><br>
                                        <strong>Nome:</strong> Threads
                                    </li>
                                    <li>
                                        <strong>Empresa:</strong> Illustration
                                    </li>
                                </ul>
                                <button class="btn btn-danger btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                       
                                        Fechar
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
             
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase" style="color:#ed563b">Cabelo</h2>
                                <p class="item-intro text-muted">Hair Staylist/Cabeleireiro(a).</p>
                                <img class="img-fluid d-block mx-auto" src="assets/images/indico2.jpg" alt="..." />
                                <p>Esses profissionais fazem cortes, escovas, aplicação de cremes, químicas e tinturas. Realiza terapia capilar, aplicação de produtos químicos para ondular, alisar ou colorir cabelos.</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Profissionais em destaque</strong><br>
                                        <strong>Nome:</strong> Explore
                                    </li>
                                    <li>
                                        <strong>Empresa:</strong> Graphic Design
                                    </li>
                                </ul>
                                <button class="btn btn-danger btn-xl text-uppercase" data-bs-dismiss="modal" type="button">                            
                                        Fechar
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase" style="color:#ed563b">Maquiagem</h2>
                                <p class="item-intro text-muted">Makup.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/images/indico3.jpg" alt="..." />
                                <p>O Maquiador é o profissional responsável por preparar o rosto das pessoas por meio da aplicação de produtos de beleza, seja para eventos artísticos, teatrais ou ocasiões festivas.</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Profissionais em destaque</strong><br>
                                        <strong>Nome:</strong> Finish
                                    </li>
                                    <li>
                                        <strong>Empresa:</strong> Identity
                                    </li>
                                </ul>
                                <button class="btn btn-danger btn-xl text-uppercase" data-bs-dismiss="modal" type="button">                                      
                                        Fechar
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase" style="color:#ed563b">Massagem</h2>
                                <p class="item-intro text-muted">Massoterapia/massagem relaxante.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/images/indico4.jpg" alt="..." />
                                <p>O massagista é o profissional que realiza massagens baseadas em técnicas ocidentais, considerando aspectos anatômicos, fisiopatológicos e biomecânicos essenciais, com o objetivo de contribuir com a promoção e manutenção
                                    da saúde e do bem-estar.</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Profissionais em destaque</strong><br>
                                        <strong>Nome:</strong> Lines
                                    </li>
                                    <li>
                                        <strong>Empresa:</strong> Branding
                                    </li>
                                </ul>
                                <button class="btn btn-danger btn-xl text-uppercase" data-bs-dismiss="modal" type="button">                                       
                                        Fechar
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 5 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">               
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase" style="color:#ed563b">Barbearia</h2>
                                <p class="item-intro text-muted">Barbeiro.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/images/indico5.jpg" alt="..." />
                                <p>O barbeiro é o profissional que cuida da barba e do cabelo masculino. Esse trabalho exige habilidade e muita prática para que seja executado com maestria. O barbeiro precisa dominar técnicas de luz e sombras usadas no degradê
                                    e manusear navalhas, tesouras e máquinas</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Profissionais em destaque</strong><br>
                                        <strong>Nome:</strong> Southwest
                                    </li>
                                    <li>
                                        <strong>Empresa:</strong> Website Design
                                    </li>
                                </ul>
                                <button class="btn btn-danger btn-xl text-uppercase" data-bs-dismiss="modal" type="button">                                       
                                        Fechar
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 6 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">              
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase" style="color:#ed563b">Estética</h2>
                                <p class="item-intro text-muted">Esteticista.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/images/indico6.jpg" alt="..." />
                                <p>Um esteticista promove a beleza e o bem-estar das pessoas, utilizando técnicas e procedimentos no rosto, no cabelo e no corpo de seus clientes.</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Profissionais em destaque</strong><br>
                                        <strong>Nome:</strong> Véra Moreira
                                    </li>
                                    <li>
                                        <strong>Empresa:</strong> Clínica Bela
                                    </li>
                                </ul>
                                <button class="btn btn-danger btn-xl text-uppercase" data-bs-dismiss="modal" type="button">                                      
                                        Fechar
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

  </body>
</html>