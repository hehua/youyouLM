<?php
class employ_list {
	public function employ_list() {
		$this->con = mysql_connect("localhost","root","");
	    if (!$this->con)
	    {die('Could not connect: ' . mysql_error());}
	    mysql_select_db("hehua", $this->con);
	} 
	
	public function add_employ($eid,$name,$password,$phone,$email){
		if( $this->check_employ($eid) ){
			echo 'Error,the employ has already exist';			
			return false;
		}
	   mysql_query("INSERT INTO eploy_list VALUES ('$eid','$name','$password','$phone','$email')");
       return true;
	}
	
	
    
    public function edit_employ($eid,$name,$password,$phone,$email){
      
        if( !$this->check_employ($eid) ){
			echo 'Error,the eploy_list does not exist';			
			return false;
		}
		mysql_query("UPDATE eploy_list SET name='$name',password='$password',phone='$phone',email='$email'         
                WHERE eid = '$eid'");
		
		return true;
	}
	
	
	
	public function del_employ($eid){
	    if( !$this->check_employ($eid) ){
			echo 'Error,the news does not exist';			
			return false;
		}
		mysql_query("DELETE FROM eploy_list WHERE eid = '$eid' ");
		return true;
	}
	

    public function check_employ($eid){
        $results = mysql_query("SELECT * FROM eploy_list");
		while($result = mysql_fetch_array($results)) {
			if ($result['eid'] == $eid) {	
				return 1;
			}
		}
		return 0;
	}
	
		
		
	public function get_eploy_data($eid){
	    if( !$this->check_employ($eid) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM eploy_list WHERE eid='$eid'");
		$result = mysql_fetch_array($results);
		return $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4];
	}
	
	
   public function get_eploy_name($eid){
	    if( !$this->check_employ($eid) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM eploy_list WHERE eid='$eid'");
		$result = mysql_fetch_array($results);
		return $result[1];
	}
	
	
	
	
	
	public function get_eploy_list(){
		$ulist = array();
        $result = mysql_query("SELECT S.eid FROM eploy_list S");
        while( $results = mysql_fetch_array($result) ){
        	array_push($ulist, $results[0]);
        }
        return  $ulist;
	}
	
   public function get_eployname_list(){
		$ulist = array();
        $result = mysql_query("SELECT * FROM eploy_list ");
        while( $results = mysql_fetch_array($result) ){
        	array_push($ulist, $results[1]);
        }
        return  $ulist;
	}
	
	public function check_account($eid,$password){
		if(!$this->check_employ($eid)){
			return false;
		}
		$results = mysql_query("SELECT * FROM eploy_list WHERE eid='$eid'");
		$result = mysql_fetch_array($results);
		
		if($result[2] !=$password ){
			return false;
		}
		return true;
	}
	
	


	
    function __destruct() {
      @mysql_close($this->con);
    }
	
}

?>





