<?php
session_start();
require './Formulario.php';
require './Alert.php';

$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);
$address = [
        
        'weslleyadesousa@gmail.com',
        
];

if($postArray) {
    
    if($postArray['nome'] == "" ) {
        header("location:index.php?erroNome=true");  
    }
    elseif($postArray['email'] == "" || !filter_var($postArray['email'], FILTER_VALIDATE_EMAIL)) {
       header("location:index.php?erroEmail=true#fale_conosco");
    }
    elseif($postArray['nascimento'] == "") {
        header("location:index.php?erroNascimento=true");
    }
    elseif($postArray['tel'] == "") {
        header("location:index.php?erroTel=true");
    }
    elseif($postArray['sexo'] == "Selecione") {
        header("location:index.php?erroSexo=true");
    }
    elseif($postArray['endereco'] == "") {
        header("location:index.php?erroEndereco=true");
    }
    elseif($postArray['motivo'] == "Selecione") {
        header("location:index.php?erroMotivo=true");
    }
    elseif($postArray['mensagem'] == "" ) {
        $_SESSION['erroForm']['mensagemInvalida'] = "<p class='erro'> Por favor, digite uma mensagem válida!</p>";;
    }
    elseif($postArray['cep'] == "") {
        $_SESSION['erroForm']['cepInvalido'] = "<p class='erro'> Por favor, digite um cep válido </p>";
    }
 /*   
    elseif($postArray['denuncia'] == "") {
        $_SESSION['erroForm']['denunciaInvalida'] = "<p class='erro'> Por favor, informe uma denuncia válida!</p>";
    }
    elseif($postArray['duvidas'] == "") {
        $_SESSION['erroForm']['duvidasInvalida'] = "<p class='erro'> Por favor, informe uma dúvida válida!</p>";
    }
*/
    else {
        $formulario = new Formulario(
            $postArray['nome'],
            $postArray['email'],
            $postArray['tel'],
            $postArray['nascimento'],
            $postArray['sexo'],
            $postArray['endereco'],
            $postArray['motivo'],
            $postArray['mensagem'],
            $postArray['cep']
           /* $postArray['duvidas'] */

        );
        $msg = "
        <h1 style='color: red;'>EMAIL DE TESTE DO PORTAL CORONAVÍRUS, SE RECEBERAM ESTA MENSAGEM RESPONDA COM 'OK' COMO FEEDBACK POR FAVOR!!<h1>
        <div style='max-width: 900px; margin: 0 auto;''>
        
            <h1 style='text-align: center; color: red;''>Fale Conosco - Boletim Coronavirus</h1>
            <fieldset>
                <legend style='font-size: 22px; font-weight: bold;''>Nome Completo:</legend>
                <p style='font-size: 18px;''>{$formulario->getNome()}</p>
            </fieldset>
            
            <fieldset style='margin-top: 20px;'>
                <legend style='font-size: 22px; font-weight: bold;'>Email:</legend>
                <p style='font-size: 18px;'>{$formulario->getEmail()}</p>
            </fieldset>
            
            <fieldset style='margin-top: 20px;'>
                <legend style='font-size: 22px; font-weight: bold;'>Telefone:</legend>
                <p style='font-size: 18px;'>{$formulario->getTel()}</p>
            </fieldset>
            
            <fieldset style='margin-top: 20px;'>
                <legend style='font-size: 22px; font-weight: bold;'>Data de nascimento:</legend>
                <p style='font-size: 18px;'>{$formulario->getNascimento()}</p>
            </fieldset>
            
            <fieldset style='margin-top: 20px;'>
                <legend style='font-size: 22px; font-weight: bold;'>Sexo:</legend>
                <p style='font-size: 18px;'>{$formulario->getSexo()}</p>
            </fieldset>
            
            <fieldset style='margin-top: 20px;'>
                <legend style='font-size: 22px; font-weight: bold;'>Telefone:</legend>
                <p style='font-size: 18px;'>{$formulario->getTel()}</p>
            </fieldset>
            
            <fieldset style='margin-top: 20px;'>
                <legend style='font-size: 22px; font-weight: bold;'>Motivo do Contato:</legend>
                <p style='font-size: 18px;'>{$formulario->getMensagem()}</p>
            </fieldset>

            <fieldset style='margin-top: 20px;'>
                <legend style='font-size: 22px; font-weight: bold;'>CEP:</legend>
                <p style='font-size: 18px;'>{$formulario->getCep()}</p>
            </fieldset>
        </div>";

        header("location:index.php");
        $formulario->addFormulario($postArray, $address, 'governodemesquita@gmail.com', $msg , 'Boletim Coronavirus');
    }
}   

