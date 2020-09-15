<?php

class DadosCorona {

    private $pdo;

    public function __construct($obitos, $suspeitosComTeste, $descartadosComTeste, $descartados, $descartadosClinico, $casosConfirmados) {
        try {
            $this->pdo = new PDO("mysql:dbname=coronaviruspmm;host=coronaviruspmm.mysql.dbaas.com.br", 'coronaviruspmm', 'pmmcorona2020');
            //$this->pdo = new PDO("mysql:dbname=coronavirus;host=localhost", 'root', '');
        } catch(Exception $e) {
            echo "ERRO: ".$e->getMessage();
        }

        if(!$this->read()) {
            $this->create($obitos, $suspeitosComTeste, $descartadosComTeste, $descartados, $descartadosClinico, $casosConfirmados);
        } 
    }
    
    public function create($obitos, $suspeitosComTeste, $descartadosComTeste, $descartados, $descartadosClinico, $casosConfirmados) {
    
        $sql = $this->pdo->prepare("INSERT INTO dadoscorona (casosConfirmados, obitos, suspeitosTeste, descartadosTeste, descartados , descartadosClinico) VALUES(:casosConfirmados, :obitos, :suspeitosComTeste, :decartadosTeste, :descartados, :descartadosClinicos)");
        $sql->bindValue(":casosConfirmados", $casosConfirmados);
        $sql->bindValue(":obitos", $obitos);
        $sql->bindValue(":suspeitosComTeste", $suspeitosComTeste);
        $sql->bindValue(":decartadosTeste", $descartadosComTeste);
        $sql->bindValue(":descartados", $descartados);
        $sql->bindValue(":descartadosClinicos", $descartadosClinico);
        $sql->execute();    
    
    }
    
    public function update($obitos, $suspeitosComTeste, $descartadosComTeste, $descartados, $descartadosClinico, $casosConfirmados) {

        $sql = $this->pdo->prepare("UPDATE dadoscorona SET casosConfirmados = :casosConfirmados, obitos = :obitos, suspeitosTeste = :suspeitosComTeste, 
                            descartadosTeste = :descartadosComTeste, descartados = :descartados, descartadosClinico = :descartadosClinico");
        $sql->bindValue(":casosConfirmados", $casosConfirmados);
        $sql->bindValue(":obitos", $obitos);
        $sql->bindValue(":suspeitosComTeste", $suspeitosComTeste);
        $sql->bindValue(":descartadosComTeste", $descartadosComTeste);
        $sql->bindValue(":descartados", $descartados);
        $sql->bindValue(":descartadosClinico", $descartadosClinico);
        $sql->execute();
    }
    
    public function read() {
        
       $sql = $this->pdo->prepare("SELECT * FROM dadoscorona");
       $sql->execute();
       if($sql->rowCount() > 0) {
           return $sql->fetchAll();
       } else {
           return false;
       } 

    }
}
