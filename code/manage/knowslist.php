<?php
class knowslist {
	public function knowslist() {
		$this->con = mysql_connect("localhost","root","");
	    if (!$this->con)
	    {die('Could not connect: ' . mysql_error());}
	    mysql_select_db("hehua", $this->con);
	} 
	
	public function add_knows($ntitle,$ntime,$ncontent){
		if( $this->check_knows( $ntitle,$ntime,$ncontent) ){
			echo 'Error,the knows has already exist';			
			return false;
		}
		 
		mysql_query("INSERT INTO knows VALUES ('$ntitle','$ntime','$ncontent')");
        return true;
	}
	
	
    
    public function edit_knows($old_title,$oldtime,$ntitle,$ntime,$ncontent){
        
        if( !$this->check_knows($old_title,$oldtime) ){
			echo 'ttttError,the knows does not exist';			
			return false;
		}
		
		$this->del_knows($old_title,$oldtime);
		$this->add_knows($ntitle,$ntime,$ncontent);
		
		
		return true;
	}
	
	
	
	public function del_knows($ntitle,$ntime){
	    if( !$this->check_knows($ntitle,$ntime) ){
			echo 'Error,the knows does not exist';			
			return false;
		}
		mysql_query("DELETE FROM knows WHERE ntitle = '$ntitle' AND ntime = '$ntime' ");
		return true;
	}
	

    public function check_knows( $ntitle,$ntime){
        $results = mysql_query("SELECT * FROM knows");
		while($result = mysql_fetch_array($results)) {
			if ($result['ntitle'] == $ntitle && $result['ntime'] == $ntime) {	
				return 1;
			}
		}
		return 0;
	}
		
		
	public function get_knows_data($ntitle,$ntime){
	    if( !$this->check_knows($ntitle,$ntime) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM knows WHERE ntitle = '$ntitle' AND ntime = '$ntime'");
		$result = mysql_fetch_array($results);
		return $result[0].'|'.$result[1].'|'.$result[2];
	}
	
	
	
	
	
	public function get_knows_list(){
		$ulist = array();
        $result = mysql_query("SELECT * FROM knows");
        while( $results = mysql_fetch_array($result) ){
        	array_push($ulist,$results[0].'|'.$results[1].'|'.$results[2]);
        }
        return  $ulist;
	}
	
	
	
	
    function __destruct() {
      @mysql_close($this->con);
    }
	
}

?>






















