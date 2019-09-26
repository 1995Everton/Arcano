<?php

namespace Arcanos\Enigmas\Models;

use PDO;

class Crud{

     private $pdo = null;

     public function __construct()
     {
         $this->pdo = new PDO("mysql:host=localhost;dbname=arcano", "amanda", "Root-1");
     }
     private function buildInsert($tabela,$arrayDados)
     {
         $sql = "";
         $campos = "";
         $valores = "";
         foreach($arrayDados as $chave => $valor){
             $campos .= $chave . ', ';
             $valores .= '?, ';
         }
         $campos = (substr($campos, -2) == ', ') ? trim(substr($campos, 0, (strlen($campos) - 2))) : $campos ;
         $valores = (substr($valores, -2) == ', ') ? trim(substr($valores, 0, (strlen($valores) - 2))) : $valores ;
         $sql .= "INSERT INTO $tabela (" . $campos . ")VALUES(" . $valores . ")";
         return trim($sql);
     }

    private function buildUpdate($tabela,$arrayDados, $arrayCondicao){

         $sql = "";
         $valCampos = "";
         $valCondicao = "";
         foreach($arrayDados as $chave => $valor){
             $valCampos .= $chave . '= ?, ';
         }
         foreach($arrayCondicao as $chave => $valor){
             $valCondicao .= $chave . ' = ? AND ';
         }
         $valCampos = (substr($valCampos, -2) == ', ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 2))) : $valCampos ;
         $valCondicao = (substr($valCondicao, -4) == 'AND ') ? trim(substr($valCondicao, 0, (strlen($valCondicao) - 4))) : $valCondicao ;
         $sql .= "UPDATE $tabela SET " . $valCampos . " WHERE " . $valCondicao;
         return trim($sql);
     }

    private function buildDelete($tabela,$arrayCondicao)
     {
         $sql = "";
         $valCampos= "";
         foreach($arrayCondicao as $chave => $valor){
             $valCampos .= $chave . ' = ? AND ';
         }
         $valCampos = (substr($valCampos, -4) == 'AND ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 4))) : $valCampos ;
         $sql .= "DELETE FROM $tabela WHERE " . $valCampos;
         return trim($sql);
     }
     public function insert($tabela,$arrayDados){
         try {
             $sql = $this->buildInsert($tabela,$arrayDados);
             $stm = $this->pdo->prepare($sql);
             $cont = 1;
             foreach ($arrayDados as $valor){
                 $stm->bindValue($cont, $valor);
                 $cont++;
             }
             $retorno = $stm->execute();
             return $retorno;
         } catch (PDOException $e) {
             echo "Erro: " . $e->getMessage();
         }
     }

     public function update($tabela,$arrayDados, $arrayCondicao){
         try {
             $sql = $this->buildUpdate($tabela,$arrayDados, $arrayCondicao);
             $stm = $this->pdo->prepare($sql);
             $cont = 1;
             foreach ($arrayDados as $valor){
                 $stm->bindValue($cont, $valor);
                 $cont++;
             }
             foreach ($arrayCondicao as $valor){
                 $stm->bindValue($cont, $valor);
                 $cont++;
             }
             $retorno = $stm->execute();
             return $retorno;
         } catch (PDOException $e) {
             echo "Erro: " . $e->getMessage();
         }
     }

     public function delete($tabela,$arrayCondicao){
         try {
             $sql = $this->buildDelete($tabela,$arrayCondicao);
             $stm = $this->pdo->prepare($sql);
             $cont = 1;
             foreach ($arrayCondicao as $valor){
                 $stm->bindValue($cont, $valor);
                 $cont++;
             }
             $retorno = $stm->execute();
             return $retorno;
         } catch (PDOException $e) {
             echo "Erro: " . $e->getMessage();
         }
     }
     public function select($sql, $arrayParams=null, $fetchAll=TRUE){
         try {
            $stm = $this->pdo->prepare($sql);
            if (!empty($arrayParams)){
                $cont = 1;
                foreach ($arrayParams as $valor){
                    $stm->bindValue($cont, $valor);
                    $cont++;
                }
            }
            $stm->execute();
            if($fetchAll){
                $dados = $stm->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $dados = $stm->fetch(PDO::FETCH_ASSOC);
            }
            return $dados;
         } catch (PDOException $e) {
             echo "Erro: " . $e->getMessage();
         }
     }
}