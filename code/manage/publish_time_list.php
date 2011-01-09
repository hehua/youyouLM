<?php
class publish_time_list {
	var $employ_list;
	public function publish_time_list() {
		$this ->employ_list = new employ_list();
		$this->con = mysql_connect("localhost","root","");
	    if (!$this->con)
	    {die('Could not connect: ' . mysql_error());}
	    mysql_select_db("hehua", $this->con);
	} 
	
	public function add_publish_time($eid,$star,$end,$thedate ){
		if( !$this->employ_list->check_employ($eid)){
			echo 'Error,the employee has not exist';			
			return false;
		}
		
		if( $this->check_publish_time( $star,$end,$thedate) ){
			echo 'Error,the publish_time has already exist';			
			return false;
		}
		 
		mysql_query("INSERT INTO publish_time VALUES ('$eid','$star','$end',$thedate)");
        return true;
	}
	
	
    
    public function edit_publish_time($old_star,$old_end,$old_thedate,$eid,$star,$end,$thedate){
  	
        if( !$this->check_publish_time($old_star,$old_end,$old_thedate) ){
			echo 'tttttError,the publish_time does not exist';			
			return false;
		}
		
		$this->del_publish_time($old_star,$old_end,$old_thedate);
		$this->add_publish_time($eid,$star,$end,$thedate);
		
		
		return true;
	}
	
	
	
	public function del_publish_time($star,$end,$thedate){
	    if( !$this->check_publish_time($star,$end,$thedate) ){
			echo 'hhhhError,the publish_time does not exist';			
			return false;
		}
		mysql_query("DELETE FROM publish_time WHERE star = '$star' AND end = '$end' AND thedate = '$thedate'");
		return true;
	}
	

    public function check_publish_time( $star,$end,$thedate){
        $results = mysql_query("SELECT * FROM publish_time");
		while($result = mysql_fetch_array($results)) {
			if (  $result['star'] == $star && $result['end'] == $end && $result['thedate'] == $thedate ) {	
				return 1;
			}
		}
		return 0;
	}
		
		
	public function get_publish_time_eoploy($star,$end,$thedate){
	    $results = mysql_query("SELECT * FROM publish_time");
		while($result = mysql_fetch_array($results)) {
			if (  $result['star'] == $star && $result['end'] == $end && $result['thedate'] == $thedate ) {	
				return $result['eid'];
			}
		}
		return 'error';
	}
	
	
	
	
	
	public function get_publish_time_list(){
		$ulist = array();
        $result = mysql_query("SELECT * FROM publish_time");
        while( $results = mysql_fetch_array($result) ){
        	array_push($ulist,$results[0].'|'.$results[1].'|'.$results[2].$result[3]);
        }
        return  $ulist;
	}
	
	
   public function get_list_date($thedate){
		$ulist = array();
        $result = mysql_query("SELECT * FROM publish_time WHERE thedate='$thedate' ");
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

