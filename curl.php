<?php 

$url = "https://brasil.io/api/dataset/covid19/caso/data/?is_last=True&state=RJ&city=Mesquita";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($ch), true);
$mesquita = $resultado['results'][0 ];
$dateCurl = explode('-', $mesquita['date']);
$data = $dateCurl[2].'-'.$dateCurl[1].'-'.$dateCurl[0];
$dataResum = $dateCurl[2].'-'.$dateCurl[1];


// Criar um arquivo JSON, enviar os dados mensais para o mesmo e criar uma condição
// if e verificar se o mês seguinte possui o array 'results' preenchido, se retornar
// true pegar os dados de mesquita e escrever no arquivo JSON.