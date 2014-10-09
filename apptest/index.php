<?php
error_reporting();
ob_start();
function __autoload($class_name) {
    //The lib library name wasn't before the class_name variable
	require_once "lib/$class_name.class.php";
}

if (!$_POST) {
	$tpl = new tpl('index');
	echo $tpl;
} else {
	if (isset($_POST['key']) && is_array($_POST['key']) && isset($_POST['val']) && is_array($_POST['val'])) {
            $json = array();
            $resArr = array();
            $postArr = array_combine($_POST['key'], $_POST['val']);
            foreach($postArr as $k => $v){
                if(is_numeric(substr($k, 0,1)) || !preg_match('/[A-Za-z0-9]/', $k) ) {
                    $json['err2'] = "A kulcs nem tartalmazhat spec. karaktereket, Ă©s nem kezdĹ‘dhet szĂˇmmal!";                    
                } 
                elseif(!is_numeric($v)){  
                    $json['err1'] = "Az Ă©rtĂ©k nem lehet betĹ±, csak szĂˇm!";
                }
                else{
                    $db = new Db;
                    $sql = "SELECT * FROM test";
                    $result = $db->get($sql);
                    foreach ($result as $val){
                        $resArr[]=$val;
                    }
                    if(empty($resArr)){
                    //insert first time                        
                        $data = new Data($postArr);                    
                        foreach ($data as $key => $val) {
                                $json[$key] = $val;
                        }
                        //itt van a bibibi
                        
                        $sql = "INSER INTO test(data) VALUES('\$json'\)";
                        $res = $db->get($sql);
                        var_dump("val->".$res);
                    }
                    /*elseif () {
                    //if the input value same as the database value   
                    
                    }
                    else{
                    //update database, because we have new values
                        $data = new Data($postArr);                    
                        foreach ($data as $key => $val) {
                                $json[$key] = $val;
                        }
                    }*/
                    
                }
            }
            echo(json_encode($json));
	}
}