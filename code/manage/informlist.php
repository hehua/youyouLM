<?php
class informlist {
	var $employlist;
	public function informlist() {
		$this->employlist = new employ_list();
		$this->con = mysql_connect("localhost","root","");
	    if (!$this->con)
	    {die('Could not connect: ' . mysql_error());}
	    mysql_select_db("hehua", $this->con);
	} 
	
	public function add_inform($ititle,$itime,$icontent,$eid,$readyes ){
		if( $this->check_inform( $ititle,$itime,$eid) ){
			echo 'Error,the inform has already exist';			
			return false;
		}
		 
		mysql_query("INSERT INTO inform VALUES ('$ititle','$itime','$icontent','$eid','$readyes')");
        return true;
	}
	
	
    
    public function edit_inform($old_title,$oldtime,$oldeid,$ititle,$itime,$icontent,$eid,$readyes){
        
        if( !$this->check_inform($old_title,$oldtime,$oldeid) ){
			echo 'ttttError,the inform does not exist';			
			return false;
		}
		
		$this->del_inform($old_title,$oldtime,$oldeid);
		$this->add_inform($ititle,$itime,$icontent,$eid,$readyes);
		
		
		return true;
	}
	
	
	
	public function del_inform($ititle,$itime,$eid){
	    if( !$this->check_inform($ititle,$itime,$eid) ){
			echo 'Error,the inform does not exist';			
			return false;
		}
		mysql_query("DELETE FROM inform WHERE ititle = '$ititle' AND itime = '$itime' AND eid = '$eid'");
		return true;
	}
	

    public function check_inform( $ititle,$itime, $eid){
        $results = mysql_query("SELECT * FROM inform");
		while($result = mysql_fetch_array($results)) {
			if ($result['ititle'] == $ititle && $result['itime'] == $itime && $result['eid'] == $eid) {	
				return 1;
			}
		}
		return 0;
	}
		
		
	public function get_content_data($ititle,$itime,$eid){
	    if( !$this->check_inform($ititle,$itime,$eid) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM inform WHERE ititle = '$ititle' AND itime = '$itime' AND eid = '$eid' ");
		$result = mysql_fetch_array($results);
		return $result[2];
	}
	
	
   public function get_name_eid($eid){
		return $this->employlist->get_eploy_name($eid);
	}
	
	
	public function get_inform_list($eid){
		$rlist = array();
		$results = mysql_query("SELECT * FROM inform WHERE eid = '$eid' ");
		 while( $result = mysql_fetch_array($results) ){
		 	array_push( $rlist,  $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4] );
		 }
		return $rlist;
	}
	
    public function get_all_list(){
		$rlist = array();
		$results = mysql_query("SELECT * FROM inform ");
		while( $result = mysql_fetch_array($results) ){
			array_push( $rlist,  $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4] );
		}
		return $rlist;
	}
	
    public function get_num($ititle,$itime,$eid){
		$results = mysql_query("SELECT * FROM inform ");
		$i = 0;
		while( $result = mysql_fetch_array($results) ){
		    if ($result['ititle'] == $ititle && $result['itime'] == $itime && $result['eid'] == $eid) {	
				return $i;
			}
			$i ++;
		}
		print 'error';
		return 'error';
	}
	
    public function get_notread_list($eid){
		$rlist = array();
		$results = mysql_query("SELECT * FROM inform WHERE readyes = '0' AND eid='$eid'");
		while( $result = mysql_fetch_array($results) ){
			 array_push( $rlist,  $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4] );
		}
		return $rlist;
	}
	
   public function get_notread_num($eid){
		$rlist = array();
		$results = mysql_query("SELECT * FROM inform WHERE readyes = '0' AND eid='$eid'");
		$i = 0;
		while( $result = mysql_fetch_array($results) ){
			 $i++;
		}
		return $i;
	}
	
   public function get_read_list($eid){
		$rlist = array();
		$results = mysql_query("SELECT * FROM inform WHERE readyes ='1' AND eid='$eid'");
		while( $result = mysql_fetch_array($results) ){
			 array_push( $rlist,  $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4] );
		}
		return $rlist;
	}
	
	
   public function mark_read($ititle,$itime,$eid){
        if( !$this->check_inform($ititle,$itime,$eid) ){
			echo 'Error,the inform does not exist';			
			return false;
		}
		mysql_query("UPDATE inform SET readyes='1'  WHERE  ititle = '$ititle' AND itime = '$itime' AND eid= '$eid' ");
		
	}
	
	
	
	
    function __destruct() {
      @mysql_close($this->con);
    }
	
}

?>






















