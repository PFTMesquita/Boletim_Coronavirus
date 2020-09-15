<?php 
    session_start();
    include './curl.php';
    require './web_scraper.php';
    require './Formulario.php';
    require './Alert.php';

    $alert = new Alert();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <script src="./bootstrap/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="./bootstrap/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="./bootstrap/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
    
    
  

    <title>Boletim Coronavirus</title>


</head>
<body>



    <header  class="conteiner-fluid">
    <div class="header-content text-center">
            
            <div>Casos atualizados até o dia : <?= $data; ?></div>
            
        </div>  
        <div id="carouselBanner" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./img/banner.jpg" alt="banner1" >
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="./img/banner.jpg" alt="banner2" >
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="./img/banner.jpg" alt="banner3" >
    </div>
  </div>
</div>
    <script>
        $('.carousel').carousel({
    interval: 5000
    })
        </script>
        


        <nav class=" navbar-expand-lg purple-bar d-flex " >
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon "><img src="./img/open-menu.svg" alt="banner" class="toggler"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto order-0 ">
                    <li class="nav-item princ"><a class="nav-link princ" href="#inicio">Inicio</a></li>
                    <li class="nav-item princ"><a class="nav-link princ" href="#sobre">sobre o portal</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle princ" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">COVID-19</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#coronavirus">Oque é?</a>
                            <a class="dropdown-item" href="#sintomas">Sintomas</a>
                            <a class="dropdown-item" href="#prevencao">Prevenção</a>
                            <a class="dropdown-item" href="#tratamento">Tratamento</a>
                        </div>
                    </li>

                    <li class="nav-item princ"><a class="nav-link princ" href="#grafico">Gráfico de Contaminação</a></li>
                    <li class="nav-item princ"><a class="nav-link princ" href="#noticias">Ultimas notícias</a></li>
                        <li class="nav-item princ"><a class="nav-link princ" href="#fale_conosco">Fale conosco</a></li>
                
                    </ul>
                </div>
        </nav>


    </header>

    <div class="cards  d-flex justify-content-around" id="inicio">
        

                <div class="cards  d-flex justify-content-around ">
                
                    <h1 class="display-4">Ultimos dados (MESQUITA/RJ)</h1>
                    
                </div>
    </div>

    <div class="container-fluid .horizontal-center  ultimos">
        

                <div class="cards  d-flex justify-content-around">
                
                    <div class="card casos-confirmados">
                        <h4 class="card-title confirmados-titulo">Casos Confirmados</h4>
                        <div class="card-content">
                            <span><?= $mesquita['confirmed']; ?></span>
                            <img src="./img/cards/casos-confirmados.webp"  width="60px" alt="Casos confirmados">
                        </div>     
                    </div>

                    <div class="card ">
                        <h4 class="card-title total-mortos-titulo" >Total de Óbitos</h4>
                        <div class="card-content">
                            <span><?= $mesquita['deaths']; ?></span>
                            <img src="./img/cards/taxa-de-mortalidade.webp"  width="60px" alt="Casos confirmados">
                        </div>
                    </div>

                    <div class="card ">
                        <h4 class="card-title taxa-mortalidade-titulo">Taxa % de Mortalidade</h4>
                        <div class="card-content">
                            <span><?= $mesquita['death_rate'].' %'; ?></span>
                            <img src="./img/cards/total-de-mortos.webp"  width="60px" alt="Casos confirmados">
                        </div>
                    </div>

                    <div class="card ">
                        <h4 class="card-title taxa-mortalidade-titulo">Casos Descartados</h4>
                        <div class="card-content">
                            <span><?= $casosDescartados; ?></span>
                            <img src="./img/cards/total-de-mortos.webp"  width="60px" alt="Casos confirmados">
                        </div>
                    </div>

                    <div class="card ">
                        <h4 class="card-title taxa-mortalidade-titulo">Suspeitos com Teste</h4>
                        <div class="card-content">
                            <span><?= $suspeitosComTeste; ?></span>
                            <img src="./img/cards/total-de-mortos.webp"  width="60px" alt="Casos confirmados">
                        </div>
                    </div>

                    <div class="card ">
                        <h4 class="card-title taxa-mortalidade-titulo">Descartados com Teste</h4>
                        <div class="card-content">
                            <span><?= $descartadosComTeste; ?></span>
                            <img src="./img/cards/total-de-mortos.webp"  width="60px" alt="Casos confirmados">
                        </div>
                    </div>

                    <div class="card ">
                        <h4 class="card-title taxa-mortalidade-titulo">Descartados</h4>
                        <div class="card-content">
                            <span><?= $descartados; ?></span>
                            <img src="./img/cards/total-de-mortos.webp"  width="60px" alt="Casos confirmados">
                        </div>
                    </div>
                    
                    <div class="card ">
                        <h4 class="card-title taxa-mortalidade-titulo">Descartados Clinicos</h4>
                        <div class="card-content">
                            <span><?= $descartadosClinicos; ?></span>
                            <img src="./img/cards/total-de-mortos.webp"  width="60px" alt="Casos confirmados">
                        </div>
                    </div>

                </div>
    </div>


    <div class=" horizontal-center">

        <div class="card"> 
        <div class="cards  d-flex justify-content-around" id="sobre">
                
        <h1 class="display-4 sobreTitulo">Sobre o portal</h1>
                
            </div>
        
            <div class="card-body sobre">
            <div class="row">
                <div class="col"><img class="img-fluid2" src="./img/IMGcorona.jpg" alt="ex" ></div>
                <div class="col"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
                    sheets containing Lorem Ipsum passages, and more recently with 
                    desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>   
                </div>
            </div>

            </div> 
        </div>     
        










 


        

<!------------------------- noticias  ----------------------------------------->

    <div class=" horizontal-center">
        <div class="card"> 
            <div class="cards  d-flex justify-content-around" id="noticias">
                
                <h1 class="display-4 noticiasTitle">Ultimas notícias</h1>
                        
            </div>
            
            <div class="container cta-100 ">
                <div class="container">
                <div class="row blog">
                    <div class="col-md-12">
                    <div id="blogCarousel" class="carousel slide container-blog" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#blogCarousel" data-slide-to="1"></li>
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                            <div class="col-md-4" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">01 de agosto</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="https://cdn.pixabay.com/photo/2017/02/08/14/25/computer-2048983_960_720.jpg"> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="#" tabindex="0">
                                        <h5>Titulo</h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    <p><i class="fa fa-user-o"></i> Admin, <i class="fa fa-comments-o"></i> Comentários(3)</p>
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p>Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor.</p>
                                    </div>
                                    <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">18 de agosto</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="https://cdn.pixabay.com/photo/2017/02/08/14/25/computer-2048983_960_720.jpg"> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="#" tabindex="0">
                                        <h5>Titulo</h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    <p><i class="fa fa-user-o"></i> Admin, <i class="fa fa-comments-o"></i> Comentários(3)</p>
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p>Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor.</p>
                                    </div>
                                    <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">15 de julho</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="https://cdn.pixabay.com/photo/2017/02/08/14/25/computer-2048983_960_720.jpg"> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="#" tabindex="0">
                                        <h5>Titulo</h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    <p><i class="fa fa-user-o"></i> Admin, <i class="fa fa-comments-o"></i> Comentários(3)</p>
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p>Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor.</p>
                                    </div>
                                    <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                            </div>
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->
                        <div class="carousel-item ">
                            <div class="row">
                            <div class="col-md-4" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">30 de maio</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="https://cdn.pixabay.com/photo/2017/02/08/14/25/computer-2048983_960_720.jpg"> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="#" tabindex="0">
                                        <h5>Titulo</h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    <p><i class="fa fa-user-o"></i> Admin, <i class="fa fa-comments-o"></i> Commentários(3)</p>
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p>Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, adipiscing. Lorem ipsum dolor sit amet, consectetuer adipiscing. Lorem ipsum dolor.</p>
                                    </div>
                                    <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->
                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


<!----------------------------fim noticias----------------------------------->

    <div class="card"> 
        <div class=" d-flex justify-content-around" id="COVID">
                <h1 class="display-4">COVID-19</h1>
            </div>
        <div id="accordion_COVID19">

            <div class="sub-tabs d-flex " id="headingOqueE">
            <h5 class="mb-0">
                <a href="#" id="coronavirus" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h1>O que é Coronavírus (Covid-19)?</h1>
                    
                </a>
            </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOqueE" data-parent="#accordion_COVID19">
            <div class="card-body coronavirus">
                <p>
                    Coronavírus é uma família de vírus que causam infecções respiratórias.
                    O novo agente do coronavírus foi descoberto em 31/12/19 após casos registrados na China. Provoca a doença chamada de coronavírus (COVID-19).
                </p>
                <p>
                    Os primeiros coronavírus humanos foram isolados pela primeira vez em 1937. No entanto, foi em 1965 que o vírus foi descrito como coronavírus,
                    em decorrência do perfil na microscopia, parecendo uma coroa.
                </p>
                <p>
                    A maioria das pessoas se infecta com os coronavírus comuns ao longo da vida, sendo as crianças pequenas mais propensas a se infectarem com o tipo mais comum do vírus. 
                    Os coronavírus mais comuns que infectam humanos são o alpha coronavírus 229E e NL63 e beta coronavírus OC43, HKU1.
                </p>      
            </div>
        </div>


            <div class="sub-tabs" id="headingSintomas">
            <h5 class="mb-0">
                <a href="#" id="sintomas" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h1>Sintomas do Covid-19</h1>
                </a>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingSintomas" data-parent="#accordion_COVID19">
            <div class="card-body sintomas-container sintomas ">
            <p>
                                    Os sinais e sintomas do coronavírus são principalmente respiratórios, semelhantes a um resfriado. Podem, também, causar infecção do trato 
                                    respiratório inferior, como as pneumonias. No entanto, o novo coronavírus (SARS-CoV-2) ainda precisa de mais estudos e investigações para caracterizar melhor os sinais e sintomas da doença.
                                </p>
                                    <h3>Os principais sintomas conhecidos até o momento são:</h3>
                                <div class="sintomas-cards row">
                                    <div class="sintoma-card col">
                                        <img src="./img/sintomas/sintomas1.webp" class="img-fluid img-size" >
                                        <span>Febre</span>
                                    </div>
                                    <div class="sintoma-card col">
                                        <img src="./img/sintomas/sintomas2.webp"  class="img-fluid img-size" >
                                        <span>Tosse</span>
                                    </div>
                                    <div class="sintoma-card col">
                                        <img src="./img/sintomas/sintomas3.webp" class="img-fluid img-size" >
                                        <span>Dificuldade para Respirar</span>
                                    </div>
                                    <div class="sintoma-card col">
                                        <img src="./img/sintomas/sintomas4.webp"  class="img-fluid img-size" >
                                        <span>Garganta Inflamada</span>
                                    </div>
                                </div>

                                <p>
                                    Se você apresentar febre a partir de 37,8°C e dificuldade para respirar, procure atendimento médico imediatamente.
                                </p>

                                <p>
                                    Se entrou em contato com pacientes confirmados ou retornou de viagem nos últimos dias, permaneça em casa em observação por, no mínimo, 7 dias. 
                                    Havendo sintomas que persistem (tosse, febre a partir de 37.8°C, coriza), procure atendimento médico.
                                </p>      
            </div>
        </div>

            <div class="sub-tabs" id="headingPrevencao">
            <h5 class="mb-0">
                <a href="#" id="prevencao" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h1>Prevenção</h1>
                </a>
            </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingPrevencao" data-parent="#accordion_COVID19">
            <div class="card-body prevencao-container prevencao">
            <p>
                                    Devem ser adotados cuidados básicos para reduzir o risco 
                                    geral de contrair ou transmitir infecções respiratórias agudas. Algumas medidas são:
                                </p>
                                <div class="container-cards">
                                    
                                    <div class="prevencao-cards row">
                                        <div class="prevencao-card col">
                                            <img src="./img/prevencao/prevencao1.webp"  class="img-fluid img-size" />
                                            <span>Lavar as mãos com sabão</span>
                                        </div>
                                        <div class="prevencao-card col">
                                            <img src="./img/prevencao/prevencao2.webp"  class="img-fluid img-size" />
                                            <span>Usar álcool em gel</span>
                                        </div>
                                        <div class="prevencao-card col">
                                            <img src="./img/prevencao/prevencao3.webp"  class="img-fluid img-size" />
                                            <span>Cubra a boca ao espirrar</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="prevencao-card col">
                                            <img src="./img/prevencao/prevencao4.webp"  class="img-fluid img-size" />
                                            <span>Evite aglomerações</span>
                                        </div>        
                                        <div class="prevencao-card col">
                                            <img src="./img/prevencao/prevencao5.webp"  class="img-fluid img-size" />
                                            <span>Prefira ambientes arejados</span>
                                        </div>
                                        <div class="prevencao-card col">
                                            <img src="./img/prevencao/prevencao7.webp"  class="img-fluid img-size" />
                                            <span>Não compartilhar<br> objeto pessoais</span>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Profissionais de saúde devem utilizar medidas de precaução padrão, 
                                    de contato e de gotículas (máscara cirúrgica, luvas, avental não estéril e óculos de proteção).
                                </p>

                                <p>
                                    Para a realização de procedimentos que gerem aerossolização de secreções respiratórias como intubação, 
                                    aspiração de vias aéreas ou indução de escarro, deverá ser utilizada precaução por aerossóis, com uso de máscara N95.
                                </p>      
            </div>
        </div>


            <div class="sub-tabs" id="headingTratamento">
            <h5 class="mb-0">
                <a href="#" id="tratamento" data-toggle="collapse" data-target="#collapseFourth" aria-expanded="false" aria-controls="collapseFourth">
                <h1 >Tratamento</h1>
                </a>
            </h5>
            </div>
            <div id="collapseFourth" class="collapse" aria-labelledby="headingTratamento" data-parent="#accordion_COVID19">
            <div class="card-body tratamento-container tratamento">
            <div class="tratamento-cards row">
                                    <div class=" prevencao-card col">
                                        
                                        <img src="./img/tratamento/tratamento.webp" class="img-fluid img-size"  >
                                    </div>
                                    <div class="prevencao-card col">
                                        
                                        <img src="./img/tratamento/tratamento2.webp" class="img-fluid img-size" >
                                    </div>
                                    <div class="prevencao-card col">
                                        <img src="./img/tratamento/tratamento3.webp" class="img-fluid img-size" >
                                    </div>
                                </div>
                                <p>
                                    Não existe tratamento específico para infecções causadas por coronavírus humano. É indicado repouso e consumo
                                    de bastante água, além de algumas medidas adotadas para aliviar os sintomas, conforme cada caso, como, por exemplo:
                                </p>
                                <p>
                                    - Uso de medicamento para dor e febre (antitérmicos e analgésicos);
                                </p>
                                <p>
                                    - Uso de umidificador no quarto ou tomar banho quente para auxiliar no alívio da dor de garanta e tosse.
                                </p>
                                <p>
                                    Assim que os primeiros sintomas surgirem, é fundamental procurar ajuda médica imediata para confirmar diagnóstico e iniciar o tratamento.
                                </p>
            </div>
        </div>


        </div>


    </div>                                    





       <div class="card"> 
            <div class=" d-flex justify-content-around" id="grafico">
                <h1 class="display-4">Gráfico </h1>
            </div>
       
            <div class="card-body grafico">
                    
                <h4>Dados atualizados mensalmente!</h4>
                <canvas id="myChart"></canvas>

            </div>
        </div>       





        <div class="card"> 
            <div class=" d-flex justify-content-around" id="fale_conosco">
                <h1 class="display-4">Fale Conosco</h1>
            </div>
    
            <div class="card-body fale-conosco">

                <form action="form_action.php" method="POST">
                    <div class="row">

                        <div class="col">
                            
                            <div class="form-group">
                                <label for="nome">Nome Completo:</label><br>
                                <?php 
                                    if(isset($_GET['erroNome'])) {
                                        $alert->setErroNome();
                                        echo $alert->getErroNome();
                                    }
                                ?>
                                <input type="text" name="nome" class="form-control" placeholder="Nome completo">
                            </div>
                    
                           

                            <div class="form-group">   
                                <label for="tel">Telefone:</label><br>
                                <?php 
                                    if(isset($_GET['erroTel'])) {
                                        $alert->setErroTel();
                                        echo $alert->getErroTel();
                                    }    
                                ?>
                                <input type="number" name="tel" class="form-control" placeholder="21999999999."><br>
                            </div> 

                            

                            <div class="form-group">   
                                <label  for="sexo">Sexo:</label><br>
                                <?php 
                                    if(isset($_GET['erroSexo'])) {
                                        $alert->setErroSexo();
                                        echo $alert->getErroSexo();
                                    }    
                                ?>
                                <select name="sexo" class="form-control option" >
                                    <option value="Selecione">Selecione seu sexo</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                </select><br>
                            </div>
                            
                           
                        </div>

                        <div class="col">

                        <div class="form-group">
                                <label for="email">Email:</label><br>
                                <?php 
                                    if(isset($_GET['erroEmail'])) {
                                        $alert->setErroEmail();
                                        echo $alert->getErroEmail();
                                    }
                                ?>
                                <input type="text" name="email" class="form-control" placeholder="exemplo@exemplo.com.br"><br>
                            </div> 

                            <div class="form-group">   
                                <label for="nascimento">Data de nascimento:</label><br>
                                <?php 
                                    if(isset($_GET['erroNascimento'])) {
                                        $alert->setErroNascimento();
                                        echo $alert->getErroNascimento();
                                    }    
                                ?>
                                <input type="date"  class="form-control" name="nascimento"><br>
                            </div> 

                            <div class="form-group">   
                                <label for="endereco">Endereço:</label><br>
                                <?php 
                                    if(isset($_GET['erroEndereco'])) {
                                        $alert->setErroEndereco();
                                        echo $alert->getErroEndereco();
                                    }    
                                ?>
                                <input type="text"  class="form-control" name="endereco" placeholder="Rua exemplo, 10"><br>

                                <label for=""></label>
                            </div>
                            </div>
                        
                        </div>

                            <div class="form-group">   
                                <label  for="motivo">Motivo do contato:</label><br>
                                <?php 
                                    if(isset($_GET['erroMotivo'])) {
                                        $alert->setErroMotivo();
                                        echo $alert->getErroMotivo();
                                    }    
                                ?>
                                <select name="motivo" class="form-control option">
                                    <option value="Selecione">Selecione o motivo</option>
                                    <option value="sugestao">Sugestão</option>
                                    <option value="denuncia">Denuncia</option>
                                    <option value="duvida">Dúvidas</option>
                                </select><br>
                            </div>
                        
                            <div class="form-group">   
                                <label for="mensagem">Deixe sua mensagem:</label><br>
                                <textarea name="mensagem" class="form-control"  cols="20" rows="7" placeholder="Envie sua sugestção"></textarea><br>
                                
                            </div> 


                <div class=" d-flex justify-content-around">
                    <button type="submit" class="btn-lg btn-color">enviar</button>
                                </div>
                </form>
            </div>       

        </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="./grafico.js"></script>
<script src="./script.js"></script>
</body>
</html>