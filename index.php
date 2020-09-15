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
    <link rel="shortcut icon" href="img/corona/corona.webp" type="image/x-icon">
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
--><script src="./bootstrap/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="./bootstrap/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="./bootstrap/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

  

    <title>Boletim Coronavirus</title>


</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v8.0" nonce="9gdaVeOT"></script>

    <header  class="conteiner-fluid ">
    <div class="header-content text-center align-middle">

    <div class="row" id="header-row">   
    
    <div class="col"><img src="./img/logo-boletimcorona.png" class="logo img-fluid" style="max-width: 8rem;" ></div>
    <div class="col ">
            
            <div class="align-middle">Ultima atualização: <?= $hoje; ?></div>

    </div>
    <div class="col social-sup align-middle">
                       
     <!-- youtube -->
     <a href="https://www.youtube.com/channel/UCXgKyvQithT0D1IrEsMMfrg?view_as=subscriber&sub_confirmation=1" class="btn-circle">
                   
                   <i class="fa fa-youtube " aria-hidden="true"></i>
                     
                    
        </a>                        
     
      <!-- whatsapp -->
      <a href="https://chat.whatsapp.com/HQ6ES5kycNA8aVJDN3Lnz8" class="btn-circle">
                          <i class="fa fa-whatsapp " aria-hidden="true"></i>
                                  
                      
                        
        </a>

      <!-- Facebook -->
      <a href="https://bit.ly/3fWbhfC" class="btn-circle" ><i class="fa fa-facebook " aria-hidden="true"></i>
                          
                         
                          
        </a>

      <!-- instagram -->
      <a href="https://www.instagram.com/prefmesquitacovid19/" class="btn-circle">
                              <i class="fa fa-instagram " aria-hidden="true"></i>
                              
                          
        </a>
      <!-- twitter-->
      <a href="https://twitter.com/pmmcovid19" class="btn-circle"> <i class="fa fa-twitter " aria-hidden="true"></i>
                      
                                          
        </a>   
      <!-- linkedin -->
      <a href="https://www.linkedin.com/company/prefeitura-de-mesquita-boletim-coronav%C3%ADrus/" class="btn-circle">
                      <i class="fa fa-linkedin-square " aria-hidden="true"></i>
                   
        </a>



    </div>
            
</div>
            
            
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
                <span class="navbar-toggler-icon "><i class="fa fa-navicon" alt="banner" class="toggler"></i></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto order-0 ">
                    <li class="nav-item princ"><a class="nav-link princ" href="#inicio"> <i class="fa fa-home"></i> Inicio</a></li>
                    <li class="nav-item princ"><a class="nav-link princ" href="#sobre"><i class="fa fa-university"></i> sobre o portal</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle princ" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-heartbeat"></i> COVID-19</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#coronavirus"><i class="fa fa-angle-right"></i> O que é?</a>
                            <a class="dropdown-item" href="#sintomas"> <i class="fa fa-angle-right"></i> Sintomas</a>
                            <a class="dropdown-item" href="#prevencao"> <i class="fa fa-angle-right"></i> Prevenção</a>
                            <a class="dropdown-item" href="#tratamento"> <i class="fa fa-angle-right"></i> Tratamento</a>
                        </div>
                    </li>

                    <li class="nav-item princ"><a class="nav-link princ" href="#grafico"> <i class="fa fa-bar-chart"></i> Gráfico de Contaminação</a></li>
                    <li class="nav-item princ"><a class="nav-link princ" href="#noticias"> <i class="fa fa-newspaper-o"></i> Ultimas notícias</a></li>
                        <li class="nav-item princ"><a class="nav-link princ" href="#fale_conosco"> <i class="fa fa-comment"></i> Fale conosco</a></li>
                
                    </ul>
                </div>
        </nav>


    </header>

    <div class="cards  d-flex justify-content-around" id="inicio">
        

                <div class="cards  d-flex justify-content-around ">
                
                <h1 class="display-4">Ultimos dados (Mesquita/RJ)<br><a style="color: #3e276a; font-size:16px" href="http://coronavirus.mesquita.rj.gov.br/coronaapp1_list.php">Fonte dos dados: coronavirus.mesquita</a>
		<p style="color: #ff0000; font-size:16px" >dados coletados a partir de : 02/03/2020</p>
                 </h1>   
                </div>
</div>

    <div class="container-fluid .horizontal-center  ultimos">
        
<div class="cards  d-flex justify-content-around">
                <div class="row d-flex justify-content-around  card-contain ">


    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6 card-mob">
                <div class="card-box bg-white">
                    <div class="inner">
                        <h3> <?= $dadosTotais['confirmados']; ?> </h3>
                        <p> Casos Confirmados </p>
                        <h3> <?= $replace['confirmadosHoje']; ?> </h3>
                        <p> informados no dia <?= $hoje; ?>  </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 card-mob ">
                <div class="card-box bg-white">
                    <div class="inner">
                    <h3> <?= $dadosTotais['obitos']; ?> </h3>
                        <p> Total de Óbitos </p>
                        <h3> <?= $replace['obitosHoje']; ?> </h3>
                        <p>  informados no dia <?= $hoje; ?>  </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 card-mob">
                <div class="card-box bg-white">
                    <div class="inner">
                    <h3> <?= $dadosTotais['suspeitosComTeste']; ?> </h3>
                        <p> Suspeitos com Teste </p>
                        <h3> <?= $replace['suspeitosTesteHoje']; ?> </h3>
                        <p> informados no dia <?= $hoje; ?>  </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 card-mob">
                <div class="card-box bg-white">
                    <div class="inner">
                    <h3> <?= $dadosTotais['descartadosComTeste']; ?> </h3>
                        <p> Descartados com Teste </p>
                        <h3> <?= $replace['descartadosTesteHoje']; ?> </h3>
                        <p> informados no dia <?= $hoje; ?>  </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 card-mob">
                <div class="card-box bg-white">
                    <div class="inner">
                    <h3> <?= $dadosTotais['descartados']; ?> </h3>
                        <p> Descartados </p>
                        <h3> <?= $replace['descartadosHoje']; ?> </h3>
                        <p> informados no dia <?= $hoje; ?>  </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 card-mob">
                <div class="card-box bg-white">
                    <div class="inner">
                    <h3> <?= $dadosTotais['descartadosClinicos']; ?> </h3>
                        <p> Descartados Clinicos </p>
                        <h3> <?= $replace['descartadosClinicosHoje']; ?> </h3>
                        <p> informados no dia <?= $hoje; ?>  </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    
                </div>
            </div>

                        <div class="col-lg-4 col-sm-6 ">
                <div class="card-box bg-white">
                    <div class="inner">
                    <h3><?= $mesquita['death_rate'].' %'; ?> </h3>
                        <p>  % de Mortalidade </p>
                        <h3>  </h3>
                        <p> </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



<!--

            
                    <div class="card casos-confirmados cards-dados">
                        <h4 class="card-title total-mortos-titulo">Casos Confirmados</h4>
                        <div class="card-content">
                           
                                    <span class="align-middle total-mortos-titulo">TOTAL:</span>
                                    <span class="align-middle"><?= $mesquita['confirmed']; ?></span>
                                   
                                    <span class="align-middle total-mortos-titulo dia">NO DIA <?= $hoje; ?> </span>
                                    <span class="align-middle"><?= $confirmadosHoje; ?></span>
                            
                        </div>     
                    </div>

                    <div class="card cards-dados">
                        <h4 class="card-title total-mortos-titulo " >Total de Óbitos<br></h4>
                        <div class="card-content">
                           
                                    <span class="align-middle total-mortos-titulo">Total</span><br>
                                    <span class="align-middle"><?= $mesquita['deaths']; ?></span>
                                   
                                    <span class="align-middle total-mortos-titulo dia">no dia <?= $hoje; ?> </span><br>
                                    <span  class="align-middle"><?= $obitosHoje; ?></span>
                                
                            
                        </div>
                    </div>

                    <div class="card cards-dados ">
                        <h4 class="card-title total-mortos-titulo">Taxa % de Mortalidade</h4>
                        <div class="card-content">
                           
                                    <span class="align-middle total-mortos-titulo">Total</span><br>
                                    <span class="align-middle"><?= $mesquita['death_rate'].' %'; ?></span>
                                   
                                    <span class="align-middle total-mortos-titulo dia">no dia <?= $hoje; ?> </span><br>
                                    <span class="align-middle"><?= $mesquita['death_rate'].' %'; ?></span>
                                
                           
                        </div>
                    </div>

                    


                    <div class="card cards-dados ">
                        <h4 class="card-title total-mortos-titulo">Suspeitos com Teste</h4>
                        <div class="card-content">
                           
                                    <span class="align-middle total-mortos-titulo">Total</span><br>
                                    <span class="align-middle"><?= $suspeitosComTeste; ?></span>
                                   
                                    <span class="align-middle total-mortos-titulo dia">no dia <?= $hoje; ?> </span><br>
                                    <span  class="align-middle"><?= $suspeitosTesteHoje; ?></span>
                                
                            
                        </div>
                    </div>

                    <div class="card  cards-dados">
                        <h4 class="card-title total-mortos-titulo">Descartados com Teste</h4>
                        <div class="card-content">
                           
                                    <span class="align-middle total-mortos-titulo">Total</span><br>
                                    <span class="align-middle"> <?= $descartadosComTeste; ?></span>
                                   
                                    <span class="align-middle total-mortos-titulo dia">no dia <?= $hoje; ?> </span><br>
                                    <span  class="align-middle"><?= $descartadosTesteHoje; ?></span>
                                
                            
                        </div>
                    </div>

                    <div class="card  cards-dados">
                        <h4 class="card-title total-mortos-titulo">Descartados<br></h4>
                        <div class="card-content">
                           
                                    <span class="align-middle total-mortos-titulo">Total</span><br>
                                    <span class="align-middle"><?= $descartados; ?></span>
                                   
                                    <span class="align-middle total-mortos-titulo dia">no dia <?= $hoje; ?> </span><br>
                                    <span class="align-middle"><?= $descartadosHoje; ?></span>
                               
                            
                        </div>
                    </div>
                    
                    <div class="card cards-dados ">
                        <h4 class="card-title total-mortos-titulo">Descartados Clinicos</h4>
                        <div class="card-content">
                           
                                    <span class="align-middle total-mortos-titulo">Total</span><br>
                                    <span class="align-middle"><?= $descartadosClinicos; ?></span>
                                   
                                    <span class="align-middle total-mortos-titulo dia">no dia <?= $hoje; ?> </span><br>
                                    <span ><?= $descartadosClinicosHoje; ?></span>
                                
                            
                        </div>
                    </div>
-->
                </div>
                </div>
    </div>

    <div class=" horizontal-center">
        <div class="card"> 
            <div class="cards  d-flex justify-content-around" id="sobre">
                    
                <h1 class="display-4 sobreTitulo">Sobre o portal</h1>
                
            </div>
        
            <div class="card-body sobre">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
                    sheets containing Lorem Ipsum passages, and more recently with 
                    desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p> </div> 

            </div>

        </div> 
    </div>     
        










 


        

<!------------------------- noticias  ----------------------------------------->

    <div class=" horizontal-center">
        <div class="card"> 
                <div>
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
                        <li data-target="#blogCarousel" data-slide-to="2"></li>
                        <li data-target="#blogCarousel" data-slide-to="3"></li>
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date1;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img1; ?> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link1;?>" tabindex="0">
                                        <h5 class="h6"><?=$title1;?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content1;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link1;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date2;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img2;?> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link2;?>" tabindex="0">
                                        <h5 class="h6"><?= $title2;?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content2;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link2;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date3;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img3;?> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link3;?>" tabindex="0">
                                        <h5 class="h6"><?= $title3;?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content3;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link3;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                            </div>
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item -->
                        <div class="carousel-item ">
                            <div class="row">
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date4;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img4;?> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link4;?>" tabindex="0">
                                        <h5 class="h6"><?= $title4;?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content4;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link4;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date5;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img5;?> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link5;?>" tabindex="0">
                                        <h5 class="h6"><?= $title5?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content5;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link5;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>
                            <!-----------------------------------------------------------------------copiar daqui ----------------------------------------------------------------------->
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date6;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img6;?></figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link6;?>" tabindex="0">
                                        <h5 class="h6"><?= $title6;?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content6;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link6;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>

                            <!-----------------------------------------------------------------------copiar até aqui ----------------------------------------------------------------------->
                            <!--.row-->
                            
                        </div>
                        
                        <!--.item-->
                        </div>
                        


                        <!--.item -->
                        <div class="carousel-item ">
                            <div class="row">
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date7;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img7;?> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link7;?>" tabindex="0">
                                        <h5 class="h6"><?= $title7;?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content7;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link7;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date8;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img8;?> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link8;?>" tabindex="0">
                                        <h5 class="h6"><?= $title8?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content8;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link8;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>
                            <!-----------------------------------------------------------------------copiar daqui ----------------------------------------------------------------------->
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date9;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img9;?></figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link9;?>" tabindex="0">
                                        <h5 class="h6"><?= $title9;?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content9;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link9;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>

                            <!-----------------------------------------------------------------------copiar até aqui ----------------------------------------------------------------------->
                            <!--.row-->
                            
                        </div>
                        
                        <!--.item-->
                        </div>
                        

                        <!--.item -->
                        <div class="carousel-item ">
                            <div class="row">
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date10;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img10;?> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link10;?>" tabindex="0">
                                        <h5 class="h6"><?= $title10;?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content10;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link10;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date11;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img11;?> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link11;?>" tabindex="0">
                                        <h5 class="h6"><?= $title11?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content11;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link11;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>
                            <!-----------------------------------------------------------------------copiar daqui ----------------------------------------------------------------------->
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?= $date12;?></span> </div>
                                    <!--Image-->
                                    <figure> <?= $img12;?></figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="<?=$link12;?>" tabindex="0">
                                        <h5 class="h6"><?= $title12;?></h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p><?= $content12;?></p>
                                    </div>
                                    <div class="mt"> <a href="<?=$link12;?>" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>

                            <!-----------------------------------------------------------------------copiar até aqui ----------------------------------------------------------------------->
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
</div>

<!----------------------------fim noticias----------------------------------->


<div class="card"> 
        <div class=" d-flex justify-content-around" id="COVID">
                <h1 class="display-4">COVID-19</h1>
            </div>
        <div id="accordion_COVID19">
<div class="container ">
    <div id="accordion" class="accordion">
        <div class="card mb-0">
            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne" id="coronavirus"> 
                <a class="card-title "> O que é Coronavírus (Covid-19)? </a>
            </div>
            <div id="collapseOne" class="card-body collapse coronavirus" data-parent="#accordion">
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
            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" id="sintomas">
                <a class="card-title"> Sintomas do Covid-19 </a>
            </div>
            <div id="collapseTwo" class="card-body collapse sintomas-container sintomas" data-parent="#accordion">
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
            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" id="prevencao">
                <a class="card-title">Prevenção</a>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body prevencao-container prevencao"><p>
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
            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFourth" id="tratamento">
                <a class="card-title">Tratamento</a>
            </div>
            <div id="collapseFourth" class="collapse" data-parent="#accordion">
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
            
                                </div>                </div>
        </div>
            </div>
        </div>
    </div>
</div>




       <div class="card"> 
            <div class=" d-flex justify-content-around" id="grafico">
                <h1 class="display-4">Gráfico de Contaminação</h1>
            </div>
       
            <div class="card-body grafico">
                    
            <h4>Dados exclusivamente de Mesquita/Rj<br><br> atualizados mensalmente!</h4>
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
                            <br>
                    
                           

                            <div class="form-group">   
                                <label for="tel">Telefone:</label><br>
                                <?php 
                                    if(isset($_GET['erroTel'])) {
                                        $alert->setErroTel();
                                        echo $alert->getErroTel();
                                    }    
                                ?>
                                <input type="text" name="tel" class="form-control" id="celular" placeholder="21999999999." onkeypress="$(this).mask('(00) 00000.0000');"><br>
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
                                    <option value="Não Binário">Não Binário</option>
                                    <option value="Cisgênero">Cisgênero</option>
				<option value="Outros">Outros</option>
                                    
                                </select><br>
                            </div>

                            <div class="form-group">   
                                <label  for="cep">Cep:</label><br>
                                <?php 
                                    if(isset($_GET['erroSexo'])) {
                                        $alert->setErroSexo();
                                        echo $alert->getErroSexo();
                                    }    
                                ?>
                                <input placeholder="21999999" type="text" name="cep" onkeypress="$(this).mask('00000-000');">
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
                                <select name="motivo" class="form-control option motivo">
                                    <option value="Selecione">Selecione o motivo</option>
                                   <option value="denuncia">Denuncia</option>
					<option value="duvida">Dúvidas</option>
					<option value="elogios">Elogios</option>
					<option value="solicitação">Solicitação</option>
				   <option value="sugestao">Sugestão</option>
                                    <option value="outros">Outros</option>
                                </select><br>
                            </div>
                        
                            <div class="form-group">   
                                <label for="mensagem">Deixe sua mensagem:</label><br>
                                <textarea name="mensagem" class="form-control"  cols="20" rows="7" placeholder="Envie sua sugestção"></textarea><br>
                                
                            </div> 

		
                <div class="  justify-content-around">
			<div class="row">
				<div class="col">
				<button style="cursor: pointer;" type="button" class="btn-lg btn-color clear">Limpar</button>
                   

                 </div>
				<div class="col">
                    <button type="submit" class="btn-lg btn-color">Enviar</button>
                </div>
				
				</div>
                </form>
            </div>       

        </div>


</div>
</div>





<!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
      <h5 class="font-weight-bold text-uppercase mb-4" >Menu Principal </h5>

        <!-- Content -->
        
        <ul class="navbar-nav mx-auto order-0 ">
        <li class="nav-item princ"><a class="nav-link princ" href="#inicio"> <i class="fa fa-home"></i> Inicio</a></li>
                    <li class="nav-item princ"><a class="nav-link princ" href="#sobre"><i class="fa fa-university"></i> sobre o portal</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle princ" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-heartbeat"></i> COVID-19</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#coronavirus"><i class="fa fa-angle-right"></i> O que é?</a>
                            <a class="dropdown-item" href="#sintomas"> <i class="fa fa-angle-right"></i> Sintomas</a>
                            <a class="dropdown-item" href="#prevencao"> <i class="fa fa-angle-right"></i> Prevenção</a>
                            <a class="dropdown-item" href="#tratamento"> <i class="fa fa-angle-right"></i> Tratamento</a>
                        </div>
                    </li>

                    
                    <li class="nav-item princ"><a class="nav-link princ" href="#grafico"> <i class="fa fa-bar-chart"></i> Gráfico de Contaminação</a></li>
                    <li class="nav-item princ"><a class="nav-link princ" href="#noticias"> <i class="fa fa-newspaper-o"></i> Ultimas notícias</a></li>
                        <li class="nav-item princ"><a class="nav-link princ" href="#fale_conosco"> <i class="fa fa-comment"></i> Fale conosco</a></li>
                
                    </ul>

            

      </div>
      <!-- Grid column -->

      <!-- Grid column -->


      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1 ">
      <h5 class="font-weight-bold text-uppercase mb-4" >CURTA NO FACEBOOK! </h5>
      <div class="d-flex justify-content-around">
	
	<div class="fb-page" data-href="https://www.facebook.com/prefmesquitaboletimcovid19/" data-tabs="timeline" data-width="425" data-height="325" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/prefmesquitaboletimcovid19/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/prefmesquitaboletimcovid19/">Prefeitura de Mesquita Boletim Coronavirus</a></blockquote></div>
      </div>  
    </div>

      <!-- Grid column -->
 <!-- Grid column -->
 <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1 ">
      <h5 class="font-weight-bold text-uppercase mb-4" >SIGA-NOS NO TWITTER </h5>
      <div class="d-flex justify-content-around">
	
      <a class="twitter-timeline" data-width="420" data-height="320" href="https://twitter.com/pmmcovid19?ref_src=twsrc%5Etfw">Tweets by pmmcovid19</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>  
    </div>

      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 footer-content">© 
    Desenvolvimento: <br>
CCS - Coordenadoria de Comunicação Social - 2020
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->



<script type="text/javascript">
    $("#telefone, #celular").mask("(00) 00000-0000");
    </script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="./grafico.js"></script>
<script src="./script.js"></script>
</body>
</html>

