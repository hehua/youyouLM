<?php
class administrator_list {
	public function administrator_list() {
		$this->con = mysql_connect("localhost","root","");
	    if (!$this->con)
	    {die('Could not connect: ' . mysql_error());}
	    mysql_select_db("hehua", $this->con);
	} 
	
	public function add_administrator($ad_id,$name,$password,$power){
		if( $this->check_administrator($ad_id) ){
			echo 'Error,the administrator has already exist';			
			return false;
		}
	   mysql_query("INSERT INTO administrator VALUES ('$ad_id','$name','$password','$power')");
       return true;
	}
	
	
    
    public function edit_administrator($ad_id,$name,$password,$power){
      
        if( !$this->check_administrator($ad_id) ){
			echo 'Error,the administrator does not exist';			
			return false;
		}
		mysql_query("UPDATE administrator SET name='$name',password='$password',power=$power         
                WHERE ad_id = '$ad_id'");
		
		return true;
	}
	
	
	
	public function del_administrator($ad_id){
	    if( !$this->check_administrator($ad_id) ){
			echo 'Error,the news does not exist';			
			return false;
		}
		mysql_query("DELETE FROM administrator WHERE ad_id = '$ad_id' ");
		return true;
	}
	

    public function check_administrator($ad_id){
        $results = mysql_query("SELECT * FROM administrator");
		while($result = mysql_fetch_array($results)) {
			if ($result['ad_id'] == $ad_id) {	
				return 1;
			}
		}
		return 0;
	}
	
		
		
	public function get_administrator_data($ad_id){
	    if( !$this->check_administrator($ad_id) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM administrator WHERE ad_id='$ad_id'");
		$result = mysql_fetch_array($results);
		return $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3];
	}
	
	
	
	
	
	public function get_administrator_list(){
		$ulist = array();
        $result = mysql_query("SELECT * FROM administrator ");
        while( $results = mysql_fetch_array($result) ){
        	array_push($ulist, $results[0].'|'.$results[1].'|'.$results[2].'|'.$results[3]);
        }
        return  $ulist;
	}
	
	public function check_nomal_account($ad_id,$password){
		if(!$this->check_administrator($ad_id)){
			return false;
		}
		$results = mysql_query("SELECT * FROM administrator WHERE ad_id='$ad_id'");
		$result = mysql_fetch_array($results);
		
		if($result[2] !=$password ){
			return false;
		}
		return true;
	}
	
    public function check_high_account($ad_id,$password){
		if(!$this->check_administrator($ad_id)){
			return false;
		}
		$results = mysql_query("SELECT * FROM administrator WHERE ad_id='$ad_id'");
		$result = mysql_fetch_array($results);
		
		if($result[2] !=$password || $result[3] < 2){
			return false;
		}
		return true;
	}


	
    function __destruct() {
      @mysql_close($this->con);
    }
	
}

?>





