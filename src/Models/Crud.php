<?php

  namespace Arcanos\Enigmas\Models;

 class Crud{

     private $pdo = null;

     public function __construct($conexao, $tabela=NULL){

         if (!empty($conexao)):
             $this->pdo = $conexao;
         else:
             echo "<h3>Conexão inexistente!</h3>";
             exit();
         endif;

         if (!empty($tabela)) $this->tabela =$tabela;
     }
     public function buildInsert($arrayDados){

         $sql = "";
         $campos = "";
         $valores = "";
         foreach($arrayDados as $chave => $valor):
             $campos .= $chave . ', ';
             $valores .= '?, ';
         endforeach;
         $campos = (substr($campos, -2) == ', ') ? trim(substr($campos, 0, (strlen($campos) - 2))) : $campos ;
         $valores = (substr($valores, -2) == ', ') ? trim(substr($valores, 0, (strlen($valores) - 2))) : $valores ;
         $sql .= "INSERT INTO {$this->tabela} (" . $campos . ")VALUES(" . $valores . ")";
         return trim($sql);
     }

     public function buildUpdate($arrayDados, $arrayCondicao){

         $sql = "";
         $valCampos = "";
         $valCondicao = "";

         foreach($arrayDados as $chave => $valor):
             $valCampos .= $chave . '=?, ';
         endforeach;

         foreach($arrayCondicao as $chave => $valor):
             $valCondicao .= $chave . '? AND ';
         endforeach;
         $valCampos = (substr($valCampos, -2) == ', ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 2))) : $valCampos ;

         $valCondicao = (substr($valCondicao, -4) == 'AND ') ? trim(substr($valCondicao, 0, (strlen($valCondicao) - 4))) : $valCondicao ;

         $sql .= "UPDATE {$this->tabela} SET " . $valCampos . " WHERE " . $valCondicao;

         return trim($sql);
     }

     public function buildDelete($arrayCondicao)
     {
         $sql = "";
         $valCampos= "";
         foreach($arrayCondicao as $chave => $valor):
             $valCampos .= $chave . '? AND ';
         endforeach;
         $valCampos = (substr($valCampos, -4) == 'AND ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 4))) : $valCampos ;
         $sql .= "DELETE FROM {$this->tabela} WHERE " . $valCampos;
         return trim($sql);
     }
     public function insert($arrayDados){
         try {

             $sql = $this->buildInsert($arrayDados);
             $stm = $this->pdo->prepare($sql);
             $cont = 1;
             foreach ($arrayDados as $valor):
                 $stm->bindValue($cont, $valor);
                 $cont++;
             endforeach;
             $retorno = $stm->execute();
             return $retorno;

         } catch (PDOException $e) {
             echo "Erro: " . $e->getMessage();
         }
     }

     public function update($arrayDados, $arrayCondicao){
         try {
             $sql = $this->buildUpdate($arrayDados, $arrayCondicao);
             $stm = $this->pdo->prepare($sql);
             $cont = 1;
             foreach ($arrayDados as $valor):
                 $stm->bindValue($cont, $valor);
                 $cont++;
             endforeach;
             foreach ($arrayCondicao as $valor):
                 $stm->bindValue($cont, $valor);
                 $cont++;
             endforeach;
             $retorno = $stm->execute();
             return $retorno;
         } catch (PDOException $e) {
             echo "Erro: " . $e->getMessage();
         }
     }

     public function delete($arrayCondicao){
         try {
             $sql = $this->buildDelete($arrayCondicao);
             $stm = $this->pdo->prepare($sql);
             $cont = 1;
             foreach ($arrayCondicao as $valor):
                 $stm->bindValue($cont, $valor);
                 $cont++;
             endforeach;
             $retorno = $stm->execute();
             return $retorno;
         } catch (PDOException $e) {
             echo "Erro: " . $e->getMessage();
         }
     }
     public function getSQLGeneric($sql, $arrayParams=null, $fetchAll=TRUE){
         try {
            $stm = $this->pdo->prepare($sql);
            if (!empty($arrayParams)):
                $cont = 1;
                foreach ($arrayParams as $valor):
                    $stm->bindValue($cont, $valor);
                    $cont++;
                endforeach;
            endif;
            $stm->execute();
            if($fetchAll):
                $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            else:
                $dados = $stm->fetch(PDO::FETCH_OBJ);
            endif;
            return $dados;
         } catch (PDOException $e) {
             echo "Erro: " . $e->getMessage();
         }
     }
 }