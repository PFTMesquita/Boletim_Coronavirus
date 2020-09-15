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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  

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
                    <li class="nav-item princ"><a class="nav-link princ" href="#inicio"> <i class="fa fa-home"></i> Inicio</a></li>
                    <li class="nav-item princ"><a class="nav-link princ" href="#sobre"><i class="fa fa-university"></i> sobre o portal</a></li>
            	<li class="nav-item princ"><a class="nav-link princ" href="#noticias"> <i class="fa fa-newspaper-o"></i> Ultimas notícias</a></li>
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
                        <li class="nav-item princ"><a class="nav-link princ" href="#fale_conosco"> <i class="fa fa-comment"></i> Fale conosco</a></li>
                
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
                <div class="row d-flex justify-content-around  card-contain ">
                    <div class="card casos-confirmados cards-dados">
                        <h4 class="card-title total-mortos-titulo">Casos Confirmados</h4>
                        <div class="card-content">
                            <span><?= $mesquita['confirmed']; ?></span>
                        </div>     
                    </div>

                    <div class="card cards-dados">
                        <h4 class="card-title total-mortos-titulo " >Total de Óbitos<br></h4>
                        <div class="card-content">
                            <span><?= $mesquita['deaths']; ?></span>
                        </div>
                    </div>

                    <div class="card cards-dados ">
                        <h4 class="card-title total-mortos-titulo">Taxa % de Mortalidade</h4>
                        <div class="card-content">
                            <span><?= $mesquita['death_rate'].' %'; ?></span>
                        </div>
                    </div>

                    


                    <div class="card cards-dados ">
                        <h4 class="card-title total-mortos-titulo">Suspeitos com Teste</h4>
                        <div class="card-content">
                            <span><?= $suspeitosComTeste; ?></span>
                        </div>
                    </div>

                    <div class="card  cards-dados">
                        <h4 class="card-title total-mortos-titulo">Descartados com Teste</h4>
                        <div class="card-content">
                            <span><?= $descartadosComTeste; ?></span>
                        </div>
                    </div>

                    <div class="card  cards-dados">
                        <h4 class="card-title total-mortos-titulo">Descartados<br></h4>
                        <div class="card-content">
                            <span><?= $descartados; ?></span>
                        </div>
                    </div>
                    
                    <div class="card cards-dados ">
                        <h4 class="card-title total-mortos-titulo">Descartados Clinicos</h4>
                        <div class="card-content">
                            <span><?= $descartadosClinicos; ?></span>
                        </div>
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
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">13 de agosto</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="http://www.mesquita.rj.gov.br/pmm/wp-content/uploads/2020/08/IMG-20200813-WA0021-385x385.jpg"> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="http://www.mesquita.rj.gov.br/pmm/pgm/2020/08/13/comunicado-importante-2/" tabindex="0">
                                        <h5>COMUNICADO IMPORTANTE</h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p>
                                        Foi publicado em edição extraordinária do Diário Oficial de Mesquita desta quinta-feira, dia 13 de agosto, 
                                        o “Manual de Comportamento dos Agentes Públicos da Administração Municipal para as Eleições de 2020”. 
                                        Em seu tópico 3.9, que trata de publicidade institucional e outros assuntos, 
                                        é explicado que o art. 73 da Lei Federal nº 9.504/97 define como proibido 
                                        “[ … ] VI – nos três meses que antecedem o pleito: [ … ] b) com exceção da propaganda de produtos e serviços que tenham concorrência no mercado, autorizar publicidade institucional dos atos,
                                         programas, obras, serviços e campanhas dos órgãos públicos federais, estaduais ou municipais, ou das respectivas entidades da administração indireta, 
                                         salvo em caso de grave e urgente necessidade pública, assim reconhecida pela Justiça Eleitoral; c) fazer pronunciamento em cadeia de rádio e televisão, fora do horário eleitoral gratuito, salvo quando,
                                          a critério da Justiça Eleitoral, tratar-se de matéria urgente, relevante e característica das funções de governo.”</p>
                                    </div>
                                    <div class="mt"> <a href="http://www.mesquita.rj.gov.br/pmm/pgm/2020/08/13/comunicado-importante-2/" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">07 de agosto</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="http://www.mesquita.rj.gov.br/pmm/wp-content/uploads/2020/08/IMG_20200730_145010-513x385.jpg"> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="http://www.mesquita.rj.gov.br/pmm/semus/2020/08/07/testes-de-covid-19-em-casa-para-os-mesquitenses/" tabindex="0">
                                        <h5>TESTES DE COVID-19 EM CASA</h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p>Prefeitura está testando 200 moradores de cada bairro para avaliar índice de contágio nas localidades
Mesquita começou, no mês passado, uma nova forma de realizar testes de covid-19. A ideia é fazer o exame em cerca de 200 pessoas por bairro, mas nas casas desses mesquitenses. Para entrar na lista, o cidadão acessa o link consultas.colab.re/cadastrotestecovid19mesquita ou baixa o aplicativo COLAB e realizar um cadastro, pessoal e intransferível. Só as pessoas que realizaram previamente a inscrição poderão ser testadas, caso sejam selecionadas.</p>
                                    </div>
                                    <div class="mt"> <a href="http://www.mesquita.rj.gov.br/pmm/semus/2020/08/07/testes-de-covid-19-em-casa-para-os-mesquitenses/" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">03 de agosto</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="http://www.mesquita.rj.gov.br/pmm/wp-content/uploads/2020/08/Polos-exclusivos-para-covid-19-em-Mesquita-ja-atenderam-28-mil-pessoas-3-581x385.jpg"> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="http://www.mesquita.rj.gov.br/pmm/semus/2020/08/03/polos-exclusivos-para-covid-19-em-mesquita-ja-atenderam-28-mil-pessoas/" tabindex="0">
                                        <h5>POLOS EXCLUSIVOS PARA COVID-19 EM MESQUITA JÁ ATENDERAM 28 MIL PESSOAS</h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p>Com cerca de 20 mil diagnósticos feitos nesses espaços, a partir de testes de covid-19 e exames de imagem, município mantém em funcionamento unidade da Vila Olímpica
Em pouco mais de quatro meses de funcionamento, os polos exclusivos para covid-19 em Mesquita registraram, juntos, 28.248 atendimentos. No total, foram realizados, por exemplo, cerca de 20 mil diagnósticos nos espaços, a partir de testes de covid-19 e exames de imagem. E um dado curioso é que, entre todas as pessoas que estiveram em ambos os polos exclusivos para covid-19 em Mesquita, 37% eram moradores de outras cidades. Ou seja, foram 10.504 atendimentos realizados para pacientes que não residiam em Mesquita.</p>
                                    </div>
                                    <div class="mt"> <a href="http://www.mesquita.rj.gov.br/pmm/semus/2020/08/03/polos-exclusivos-para-covid-19-em-mesquita-ja-atenderam-28-mil-pessoas/" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
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
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">03 de julho</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="http://www.mesquita.rj.gov.br/pmm/wp-content/uploads/2020/07/MG_5804-578x385.jpg"> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="http://www.mesquita.rj.gov.br/pmm/semus/2020/07/03/atendimento-exclusivo-a-covid-19/" tabindex="0">
                                        <h5>Queda na busca por atendimento para covid-19 em Mesquita</h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p>A procura pelo atendimento para covid-19 caiu expressivamente em Mesquita nos últimos 30 dias. De até 600 pacientes atendidos em um único dia nos polos de atendimento exclusivo montados na cidade, os locais chegaram a registrar cerca de 10% desse total em alguns dias de junho – considerando os novos pacientes. Com os números se mantendo baixos, a Secretaria Municipal de Saúde decidiu concentrar o atendimento exclusivo no polo criado na Vila Olímpica de Mesquita, na Avenida Baronesa de Mesquita s/nº, no Cosmorama. E, com isso, encerrar as atividades no polo localizado em Santa Terezinha, na Avenida União. A mudança vale a partir deste sábado, dia 4 de julho.</p>
                                    </div>
                                    <div class="mt"> <a href="http://www.mesquita.rj.gov.br/pmm/semus/2020/07/03/atendimento-exclusivo-a-covid-19/" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">12 de junho</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="http://www.mesquita.rj.gov.br/pmm/wp-content/uploads/2020/06/teste-de-covid-19-nas-clinicas-da-familia-de-mesquita-340x385.jpeg"> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="http://www.mesquita.rj.gov.br/pmm/pmm/2020/06/12/teste-de-covid-19-nas-clinicas-da-familia-de-mesquita/" tabindex="0">
                                        <h5>Teste de covid-19 nas clínicas da família de Mesquita</h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p>Desde o começo do mês, a Secretaria Municipal de Saúde vem registrando uma redução na busca por atendimento nos polos de atendimento exclusivo a pessoas com sintomas de Covid-19. Na primeira semana de junho, na comparação com o dia de maior procura dos espaços em maio, a queda chegou a cerca de 90%. Para garantir maior segurança nas medidas adotadas pelo governo para conter o avanço do novo coronavírus na cidade e proteger a população, a prefeitura agora também está fazendo teste de covid-19 em pacientes nas quatro clínicas da família abertas.</p>
                                    </div>
                                    <div class="mt"> <a href="http://www.mesquita.rj.gov.br/pmm/pmm/2020/06/12/teste-de-covid-19-nas-clinicas-da-familia-de-mesquita/" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
                                    <!--leia mais Button-->
                                </div>
                                </div>
                                
                            </div>
                            <!-----------------------------------------------------------------------copiar daqui ----------------------------------------------------------------------->
                            <div class="col-md-4 slider" >
                                <div class="item-box-blog">
                                <div class="item-box-blog-image">
                                    <!--Date-->
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">30 de maio</span> </div>
                                    <!--Image-->
                                    <figure> <img alt="" src="http://www.mesquita.rj.gov.br/pmm/wp-content/uploads/2020/06/Mesquita-registra-reducao-impressionante-de-atendimentos-suspeitos-de-covid-19-4-513x385.jpeg"> </figure>
                                </div>
                                <div class="item-box-blog-body">
                                    <!--Heading-->
                                    <div class="item-box-blog-heading">
                                    <a href="http://www.mesquita.rj.gov.br/pmm/semus/2020/06/05/mesquita-registra-reducao-impressionante-de-atendimentos-suspeitos-de-covid-19/" tabindex="0">
                                        <h5>Mesquita registra grande redução nos atendimentos suspeitos de Covid-19</h5>
                                    </a>
                                    </div>
                                    <!--Data-->
                                    <div class="item-box-blog-data" style="padding: px 15px;">
                                    
                                    </div>
                                    <!--Text-->
                                    <div class="item-box-blog-text">
                                    <p>Neste começo de junho, as equipes que trabalham nos polos de atendimento exclusivo à covid-19 de Mesquita tiveram uma boa surpresa. Depois de enfrentarem semanas com atendimento a centenas de novos casos suspeitos diariamente na cidade, nesta semana, a média de atendimentos a novos pacientes tem sido em torno de 50 pessoas por dia. Isso nos dois espaços.</p>
                                    </div>
                                    <div class="mt"> <a href="http://www.mesquita.rj.gov.br/pmm/semus/2020/06/05/mesquita-registra-reducao-impressionante-de-atendimentos-suspeitos-de-covid-19/" tabindex="0" class="btn bg-blue-ui white read">leia mais</a> </div>
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
                            <br>
                    
                           

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
                                <select name="motivo" class="form-control option motivo">
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
                    <li class="nav-item princ"><a class="nav-link princ" href="#noticias"> <i class="fa fa-newspaper-o"></i> Ultimas notícias</a></li>
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
                        <li class="nav-item princ"><a class="nav-link princ" href="#fale_conosco"> <i class="fa fa-comment"></i> Fale conosco</a></li>
                
                    </ul>

            

      </div>
      <!-- Grid column -->

      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1 ">
      <h5 class="font-weight-bold text-uppercase mb-4" >Veja também </h5>
      <div class="d-flex justify-content-around">
      <iframe width="100%" height="300rem" src="https://www.youtube.com/embed/ivJaW4mIYzE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>  
    </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-4 text-center  my-4">

        <!-- Social buttons -->
        <h5 class="font-weight-bold text-uppercase mb-4">Siga nossas redes </h5>

        <div class="row">   
            <div class="col">
                             
                             
           <!-- youtube -->
           <a href="https://www.youtube.com/channel/UCXgKyvQithT0D1IrEsMMfrg?view_as=subscriber&sub_confirmation=1">
                         
                         <i class="fa fa-youtube fa-2x" aria-hidden="true"></i>
                           
                          
                          <div class="title">
                              <h6 class="social" style="color:white; text-decoration:none;">Youtube</h4>
                          </div>
                          </a>                        
           
            <!-- whatsapp -->
            <a href="https://chat.whatsapp.com/HQ6ES5kycNA8aVJDN3Lnz8" >
                                <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
                                        
                            
                                <div class="title">
                                    <h6 class="social" style="color:white; text-decoration:none;">Whatsapp</h4>
                                </div>
                                </a>

            <!-- Facebook -->
            <a href="https://bit.ly/3fWbhfC" ><i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                                
                                <div class="title">
                                    <h6 class="social" style="color:white; text-decoration:none;">Facebook</h4>
                                </div>
                                
                                </a>

    </div>
        <div class="col">
            <!-- instagram -->
            <a href="https://www.instagram.com/prefmesquitacovid19/" >
                                    <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                                    
                                <div class="title">
                                    <h6 class="social" style="color:white; text-decoration:none;">Instagram</h4>
                                </div>
                                </a>
            <!-- twitter-->
            <a href="https://twitter.com/pmmcovid19"> <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                            
                            <div class="title">
                                <h6 class="social" style="color:white; text-decoration:none;">Twitter</h4>
                            </div>
                            
                            </a>   
            <!-- linkedin -->
            <a href="https://www.linkedin.com/company/prefeitura-de-mesquita-boletim-coronav%C3%ADrus/">
                            <i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                                    
                            
                            <div class="title">
                                <h6 class="social" style="color:white; text-decoration:none;">LinkedIn</h4>
                            </div>
      </a>
                                </div>
        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 header-content">© 
    Desenvolvimento: <br>
CCS - Coordenadoria de Comunicação Social - 2020
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="./grafico.js"></script>
<script src="./script.js"></script>
</body>
</html>

