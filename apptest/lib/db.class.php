<?php
//Db class for the database connection
class Db{
    private $_hostname;
    private $_username;
    private $_password;
    private $_database;
    private $_connect;
    private $_select_db;
    private $_charset;

    public function __construct(){
        $this->_hostname = "localhost";
        $this->_username = "root";
        $this->_password = "";
        $this->_database = "apptest_bb";
        
    }
    
    public function open_connection(){
        try{
            $this->_connect = new mysqli($this->_hostname, $this->_username, $this->_password, $this->_database);           
            $this->_charset = $this->_connect->query("SET NAMES UTF8");
        }
        catch(Exception $e){
            return $e;
        }
    }
    
    public function close_connection(){
        try{
            mysqli_close($this->_connect);
        }
        catch(Exception $e){
            return $e;
        }
    }   
    
    public function get($sql){
        try{
            $this->open_connection();
            $sql = $this->_connect->query($sql);
        }
        catch(Exception $e){
            return $e;
        }
        $this->close_connection();
            return $sql;
    } 
    
    public function insert($table,$rec,$val){
        try{
            $this->open_connection();
            $sql = $this->_connect->query("INSER INTO $table($rec) VALUES('$val')");
        }
        catch(Exception $e){
            return $e;
        }
        $this->close_connection();
            return $sql;
    }
    
    public function update($table, $field, $id){
        try{
            $this->open_connection($table, $field, $id);
            $update = "UPDATE $table SET $field WHERE id='$id'";
        }
        catch(Exception $e){
            return $e;
        }
        $this->close_connection();
            return $update;
    }
}

?>