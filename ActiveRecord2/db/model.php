<?php
try {
    require_once './conn/dbConn.php';
} catch (Exception $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
class model {
    protected $tableName;

    public function save()
    {
        $a = array();       
        $a = get_object_vars($this);
        $action = "";
        if ($this->id =='') {
            $action = "INSERTED";
            $sql = $this->insert($a);
        } else {
            $action = "UPDATED";
            $sql = $this->update($a);
        }
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
        echo 'Successfully  '.$action.' record: ' . $this->id;
    }


    private function insert($array) {
       // $tableName = get_called_class();
        $tableName = $array['tableName'];
        $c = "";
        $v ="";
         foreach ($array as $key => $value) {
            if($key != 'tableName' && $key != 'id'){
                $c .= $key. ",";   
                $v .="'".$value. "',";     
            }       
         }

         $c = rtrim($c,", ");
         $v = rtrim($v,", ");
         $v =ltrim($v,",");
       
        // INSERT SQL --> INSERT INTO <#TABLE_NAME#> ( COLIMN#1, COLUMN#2) VALUES( VALUE#1, VALUE#2);
        $sql = "INSERT INTO ".$tableName." (" . $c . ") VALUES (" . $v . ")";
        echo "Insert statement : ". $sql;       
        return $sql;
    }
    private function update($array) {
        // UPDATE SQL --> UPDATE <#TABLE_NAME#> SET COLUMN#1 = VALUE#1, COLUMN#2 = VALUE#2 WHERE KEYCOLUMN = KEYVALUE;
        $tableName = $array['tableName'];
        $c = "";
        foreach ($array as $key => $value) {
            if($key != 'tableName' && $key != 'id'){
                $c .= $key. " = '".rtrim($value,":")."', "; 
            }          
         }
        $c = rtrim($c,", ");
        $sql = "UPDATE ".$tableName." SET ".$c." WHERE id = ". $this -> id;
        echo "Update statement : ". $sql;  
        return $sql;        
    }
    public function delete() {
        // DELETE FROM <#TABLE_NAME#> WHERE KEYCOLUMN = KEY;     
        $a = array();       
        $a = get_object_vars($this);  
        $tableName = $a['tableName'];
        $sql = "DELETE FROM ".$tableName."  WHERE  id = ".$this-> id;
        echo "Delete statement : ". $sql;    
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
        echo 'Successfully  DELETED record: ' . $this->id;
    }
}
?>