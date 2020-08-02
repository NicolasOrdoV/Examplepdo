<?php
    /**
     * modelo tipo de estado
     */

     class TypeStatus{
         private $id;
         private $name;
         private $pdo;

         public function __construct()
         {
             $this->pdo=new Database;
         }
         public function getAll()
         {
             try{
                 $strSql="SELECT*FROM type_statutes";
                 $query=$this->pdo->select($strSql);
                 return $query;
             }catch(PDOException $e){
                 die($e->getMessage());
             }
         }
         public function newTS($data)
         {
             try{
                 $this->pdo->insert('type_statutes',$_REQUEST);
             }catch(PDOException $e){
                 die($e->getMessage());
             }
         }
         public function editTS($data)
         {
             try{
                 $strWhere='id='.$data['id'];
                 $this->pdo->update('type_statutes',$data,$strWhere);
             }catch(PDOException $e){
                 die($e->getMessage());
             }
         }
         public function deleteTS($data)
         {
             try{
                 $strWhere='id='.$data['id'];
                 $this->pdo->delete('type_statutes',$strWhere);
             }catch(PDOException $e){
                die($e->getMessage());
             }
         }
         public function getById($id)
         {
             try{
                 $strSql="SELECT*FROM type_statutes WHERE id= :id";
                 $array=['id'=>$id];
                 $query=$this->pdo->select($strSql,$array);
                 return $query;
             }catch(PDOException $e){
                 die($e->getMessage());
             }
         }
     }

?>