<?php

class Usuario {

    private $idUsuario;
    private $deslogin;
    private $dessenha;
    private $dtCadastro;

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function getDesLogin(){
        return $this->deslogin;
    }

    public function getDesSenha(){
        return $this->dessenha;
    }

    public function getDtCadastro(){
        return $this->dtCadastro;
    }


    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function setDesLogin($deslogin){
        $this->deslogin = $deslogin;
    }

    public function setDesSenha($dessenha){
        $this->dessenha = $dessenha;
    }

    public function setDtCadastro($dtCadastro){
        $this->dtCadastro = $dtCadastro;
    }


    public function loadById($id){
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        if(count($result) > 0){
            $row = $result[0];

            $this->setIdUsuario($row["idusuario"]);
            $this->setDesLogin($row["deslogin"]);
            $this->setDesSenha($row["dessenha"]);
            $this->setDtCadastro(new DateTime($row["dtcadastro"]));



        }

    }

    public function __toString(){

        return json_encode(array(
            "idusuario"=>$this->getIdUsuario(),
            "deslogin"=>$this->getDesLogin(),
            "dessenha"=>$this->getDesSenha(),
            "dtcadastro"=>$this->getDtCadastro()
        ));
    }



}


?>