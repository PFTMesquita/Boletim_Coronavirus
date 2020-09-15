<?php 

    $url = 'http://www.mesquita.rj.gov.br/pmm/noticias/';

    $dados =file_get_contents($url);


    $caminho = explode(
        'content-area no" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">',
        $dados);
    $fimCaminho = explode('<footer id="colophon"',$caminho);

    print $fimCaminho; 


?>