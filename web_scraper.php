<?php
header('Content-Type: text/html; charset=utf-8');
include('simple_html_dom.php');
require './DadosCorona.php';

$html = file_get_html('http://coronavirus.mesquita.rj.gov.br/coronaapp1_list.php');

date_default_timezone_set('America/Sao_Paulo');
$hoje = date('d-m');
$date = getdate();

//$casosDescartados = $html->find('span[id="edit4_sum_of_casos_descartados"]', 0)->plaintext;
$dadosTotais = [
    'obitos' => $obitos = $html->find('span[id="edit4_sum_of_obito"]', 0)->plaintext,
    'suspeitosComTeste' => $suspeitosComTeste = $html->find('span[id="edit4_sum_of_casos_suspeitos_com_teste"]', 0)->plaintext,
    'descartadosComTeste' => $descartadosComTeste = $html->find('span[id="edit4_sum_of_casos_descartados_com_teste"]', 0)->plaintext,
    'descartados' => $descartados = $html->find('span[id="edit4_sum_of_casos_descartados"]', 0)->plaintext,
    'suspeitos' => $suspeitos = $html->find('span[id="edit4_sum_of_casos_suspeitos"]', 0)->plaintext,
    'confirmados' => $confirmados = $html->find('span[id="edit4_sum_of_casos_confirmados"]', 0)->plaintext,
    'descartadosClinicos' => $descartadosClinicos = $html->find('span[id="edit4_sum_of_casos_descartados_clinicos"]', 0)->plaintext
];

// numero anterior é sempre puxado da API antes das 12:00 e armazenado no banco de dados
// numero posterior é sempre puxado da API depois das 14:00 e armazenado na variável para mostrar os dados totais, ou seja, numeroPosterior = dadosTotais
// os numeros são atualizados 14:00
// os dados de hoje são criados a partir da fórmula ->  dadosAtuais = numeroPosterior - numeroAnterior
// quando a hora do getdate marcar 14 uma função é inicializada e armazena 



$dadosCorona = new DadosCorona($obitos, $suspeitosComTeste, $descartadosComTeste, $descartados, $descartadosClinicos, $confirmados);
$read = $dadosCorona->read();
/*$confirmadosHoje = $confirmados - $read[0]['casosConfirmados'] ;
$obitosHoje = $obitos - $read[0]['obitos'];
$suspeitosTesteHoje = $suspeitosComTeste - $read[0]['suspeitosTeste'];
$descartadosTesteHoje = $descartadosComTeste - $read[0]['descartadosTeste'];
$descartadosHoje = $descartados - $read[0]['descartados'];
$descartadosClinicosHoje = $descartadosClinicos - $read[0]['descartadosClinico'];*/

$dadosHoje = [
    'confirmadosHoje' => $confirmadosHoje = $confirmados - $read[0]['casosConfirmados'] ,
    'obitosHoje' => $obitosHoje = $obitos - $read[0]['obitos'],
    'suspeitosTesteHoje' => $suspeitosTesteHoje = $suspeitosComTeste - $read[0]['suspeitosTeste'],
    'descartadosTesteHoje' => $descartadosTesteHoje = $descartadosComTeste - $read[0]['descartadosTeste'],
    'descartadosHoje' => $descartadosHoje = $descartados - $read[0]['descartados'],
    'descartadosClinicosHoje' => $descartadosClinicosHoje = $descartadosClinicos - $read[0]['descartadosClinico']
];

if($date['hours'] == 12) {
    $dadosCorona->update($obitos, $suspeitosComTeste, $descartadosComTeste, $descartados, $descartadosClinicos, $confirmados);
    echo "Tabela deu update";
} else {
    echo "Tabela ainda não foi atualziada";
}

$format = [
    '0.0',
    '00.00',
    '0.00',
    '0.'
];

$replace = str_replace($format, '', $dadosHoje); 
$jsonDadosHoje = json_encode($replace, JSON_PRETTY_PRINT);
$jsonDadosTotais = json_encode($dadosTotais, JSON_PRETTY_PRINT);

//file_put_contents('dados-grafico.json',$jsonDadosHoje);

file_put_contents('dados-grafico.json', $jsonDadosTotais);

$htmlPosts = file_get_html('http://www.mesquita.rj.gov.br/pmm/noticias','class="panel-grid-cell');
     
    $title1 = $htmlPosts->find('h2[class="entry-title"]',0)->plaintext;
    
    $img1 = $htmlPosts->find('img[class="img-responsive"]',0);

    $content1 = $htmlPosts->find('div[class="post-content"]',0)->plaintext;

    $date1 = $htmlPosts->find('span[class="date"]',0)->plaintext;
    $link1 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',0)->href;

    $title2 = $htmlPosts->find('h2[class="entry-title"]',1)->plaintext;
    
    $img2 = $htmlPosts->find('img[class="img-responsive"]',1);

    $content2 = $htmlPosts->find('div[class="post-content"]',1)->plaintext;

    $date2 = $htmlPosts->find('span[class="date"]',1)->plaintext;

    $link2 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',1)->href;



    $title3 = $htmlPosts->find('h2[class="entry-title"]',2)->plaintext;
    
    $img3 = $htmlPosts->find('img[class="img-responsive"]',2);

    $content3 = $htmlPosts->find('div[class="post-content"]',2)->plaintext;

    $date3 = $htmlPosts->find('span[class="date"]',2)->plaintext;

    $link3 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',2)->href;


    
    $title4 = $htmlPosts->find('h2[class="entry-title"]',3)->plaintext;
    
    $img4 = $htmlPosts->find('img[class="img-responsive"]',3);

    $content4 = $htmlPosts->find('div[class="post-content"]',3)->plaintext;

    $date4 = $htmlPosts->find('span[class="date"]',3)->plaintext;

    $link4 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',3)->href;

    
    $title5 = $htmlPosts->find('h2[class="entry-title"]',4)->plaintext;
    
    $img5 = $htmlPosts->find('img[class="img-responsive"]',4);

    $content5 = $htmlPosts->find('div[class="post-content"]',4)->plaintext;

    $date5 = $htmlPosts->find('span[class="date"]',4)->plaintext;

    $link5 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',4)->href;

    
    $title6 = $htmlPosts->find('h2[class="entry-title"]',5)->plaintext;
    
    $img6 = $htmlPosts->find('img[class="img-responsive"]',5);

    $content6 = $htmlPosts->find('div[class="post-content"]',5)->plaintext;

    $date6 = $htmlPosts->find('span[class="date"]',5)->plaintext;

    $link6 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',5)->href;

    
    $title7 = $htmlPosts->find('h2[class="entry-title"]',6)->plaintext;
    
    $img7 = $htmlPosts->find('img[class="img-responsive"]',6);

    $content7 = $htmlPosts->find('div[class="post-content"]',6)->plaintext;

    $date7 = $htmlPosts->find('span[class="date"]',6)->plaintext;

    $link7 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',6)->href;


    $title8 = $htmlPosts->find('h2[class="entry-title"]',7)->plaintext;
    
    $img8 = $htmlPosts->find('img[class="img-responsive"]',7);

    $content8 = $htmlPosts->find('div[class="post-content"]',7)->plaintext;

    $date8 = $htmlPosts->find('span[class="date"]',7)->plaintext;

    $link8 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',7)->href;


    $title9 = $htmlPosts->find('h2[class="entry-title"]',8)->plaintext;
    
    $img9 = $htmlPosts->find('img[class="img-responsive"]',8);

    $content9 = $htmlPosts->find('div[class="post-content"]',8)->plaintext;

    $date9 = $htmlPosts->find('span[class="date"]',8)->plaintext;

    $link9 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',8)->href;


    $title10 = $htmlPosts->find('h2[class="entry-title"]',9)->plaintext;
    
    $img10 = $htmlPosts->find('img[class="img-responsive"]',9);

    $content10 = $htmlPosts->find('div[class="post-content"]',9)->plaintext;

    $date10 = $htmlPosts->find('span[class="date"]',9)->plaintext;

    $link10 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',9)->href;


    $title11 = $htmlPosts->find('h2[class="entry-title"]',10)->plaintext;
    
    $img11 = $htmlPosts->find('img[class="img-responsive"]',10);

    $content11 = $htmlPosts->find('div[class="post-content"]',10)->plaintext;

    $date11 = $htmlPosts->find('span[class="date"]',10)->plaintext;

    $link11 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',10)->href;


    $title12 = $htmlPosts->find('h2[class="entry-title"]',11)->plaintext;
    
    $img12 = $htmlPosts->find('img[class="img-responsive"]',11);

    $content12 = $htmlPosts->find('div[class="post-content"]',11)->plaintext;

    $date12 = $htmlPosts->find('span[class="date"]',11)->plaintext;

    $link12 = $htmlPosts->find('div[class="rt-holder"] div[class="rt-img-holder"] a[href]',11)->href;



    