<?php

class Alert {

    private $erroNome;
    private $erroEmail;
    private $erroTel;
    private $erroSexo;
    private $erroEndereco;
    private $erroMotivo;
    private $erroMensagem;
    private $nascimento;

    public function setErroNome() {
        $this->erroNome = "<p class='erro'>Por favor, insira seu nome completo!</p>";
    }
    public function getErroNome() {
        return $this->erroNome;
    }

    public function setErroEmail() {
        $this->erroEmail = "<p class='erro'> Por favor, informe um email válido! </p>";
    }
    public function getErroEmail() {
        return $this->erroEmail;
    }

    public function setErroTel() {
        $this->erroTel = "<p class='erro'> Por favor, informe um número de telefone válido! </p>";
    }
    public function getErroTel() {
        return $this->erroTel;
    }

    public function setErroSexo() {
        $this->erroSexo = "<p class='erro'> Por favor, selecione um sexo válido. </p>";
    }
    public function getErroSexo() {
        return $this->erroSexo;
    }

    public function setErroMotivo() {
        $this->erroMotivo = "<p class='erro'> Por favor, selecione o motivo do contato. </p>";
    }
    public function getErroMotivo() {
        return $this->erroMotivo;
    }

    public function setErroMensagem() {
         $this->erroMensagem = "<p class='erro'> Por favor, digite sua mensagem!</p>";
    }
    public function getErroMensagem() {
        return $this->erroMensagem;
    }

    public function setErroEndereco() {
        $this->erroEndereco = "<p class='erro'> Por favor, informe um endereço válido! </p>";
    }
    public function getErroEndereco() {
        return $this->erroEndereco;
    }

    public function setErroNascimento() {
        $this->nascimento = "<p class='erro'> Por favor, informe sua data de nascimento! </p>";
    }
    public function getErroNascimento() {
        return $this->nascimento;
    }


}