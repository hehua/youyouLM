<?php
class valid_time_list {
	var $employ_list;
	public function valid_time_list() {
		$this ->employ_list = new employ_list();
		$this->con = mysql_connect("localhost","root","");
	    if (!$this->con)
	    {die('Could not connect: ' . mysql_error());}
	    mysql_select_db("hehua", $this->con);
	} 
	
	public function add_valid_time($eid,$star,$end,$thedate ){
		if( !$this->employ_list->check_employ($eid)){
			echo 'Error,the employee has not exist';			
			return false;
		}
		
		if( $this->check_valid_time( $eid,$star,$end,$thedate) ){
			echo 'Error,the valid_time has already exist';			
			return false;
		}
		 
		mysql_query("INSERT INTO valid_time VALUES ('$eid','$star','$end',$thedate)");
        return true;
	}
	
	
    
    public function edit_valid_time($old_eid,$old_star,$old_end,$old_thedate,$eid,$star,$end,$thedate){
  	
        if( !$this->check_valid_time($old_eid,$old_star,$old_end,$old_thedate) ){
			echo 'tttttError,the valid_time does not exist';			
			return false;
		}
		
		$this->del_valid_time($old_eid,$old_star,$old_end,$old_thedate);
		$this->add_valid_time($eid,$star,$end,$thedate);
		
		
		return true;
	}
	
	
	
	public function del_valid_time($eid,$star,$end,$thedate){
	    if( !$this->check_valid_time($eid,$star,$end,$thedate) ){
			echo 'hhhhError,the valid_time does not exist';			
			return false;
		}
		mysql_query("DELETE FROM valid_time WHERE eid = '$eid' AND star = '$star' AND end = '$end' AND thedate = '$thedate'");
		return true;
	}
	

    public function check_valid_time( $eid,$star,$end,$thedate){
        $results = mysql_query("SELECT * FROM valid_time");
		while($result = mysql_fetch_array($results)) {
			if ( $result['eid'] == $eid && $result['star'] == $star && $result['end'] == $end && $result['thedate'] == $thedate ) {	
				return 1;
			}
		}
		return 0;
	}
		
		
	/*public function get_valid_time_data($eid,$star,$end,$thedate){
	    if( !$this->check_valid_time($eid,$star,$end,$thedate) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM valid_time WHERE eid = '$eid' AND star = '$star' AND end = '$end' AND thedate = '$thedate'");
		$result = mysql_fetch_array($results);
		return $result[0].'|'.$result[1].'|'.$result[2].$result[3];
	}*/
	
	
	
	
	
	public function get_valid_time_list(){
		$ulist = array();
        $result = mysql_query("SELECT * FROM valid_time");
        while( $results = mysql_fetch_array($result) ){
        	array_push($ulist,$results[0].'|'.$results[1].'|'.$results[2].$result[3]);
        }
        return  $ulist;
	}
	
	
   public function get_list_date($thedate){
		$ulist = array();
        $result = mysql_query("SELECT * FROM valid_time WHERE thedate='$thedate'");
        while( $results = mysql_fetch_array($result) ){
        	array_push($ulist,$results[0].'|'.$results[1].'|'.$results[2].$result[3]);
        }
        return  $ulist;
	}
	
	
	
    function __destruct() {
      @mysql_close($this->con);
    }
	
}

?>

