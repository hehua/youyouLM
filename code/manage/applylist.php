<?php
class applylist {
	public function applylist() {
		$this->con = mysql_connect("localhost","root","");
	    if (!$this->con)
	    {die('Could not connect: ' . mysql_error());}
	    mysql_select_db("hehua", $this->con);
	} 
	
	public function add_apply($atitle,$atime,$acontent,$eid,$readyes ){
		if( $this->check_apply( $atitle,$atime,$eid) ){
			echo 'Error,the apply has already exist';			
			return false;
		}
		 
		mysql_query("INSERT INTO apply VALUES ('$atitle','$atime','$acontent','$eid','$readyes')");
        return true;
	}
	
    public function get_apply_data($ititle,$itime,$eid){
		$rlist = array();
		$results = mysql_query("SELECT * FROM apply WHERE atitle='$ititle' AND atime='$itime' AND eid = '$eid' ");
		$result = mysql_fetch_array($results);
		return   $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4];
		
	}
    
    public function edit_apply($old_title,$oldtime,$atitle,$atime,$acontent,$eid,$readyes){
        
        if( !$this->check_apply($old_title,$oldtime,$eid) ){
			echo 'ttttError,the apply does not exist';			
			return false;
		}
		
		$this->del_apply($old_title,$oldtime,$eid);
		$this->add_apply($atitle,$atime,$acontent,$eid,$readyes);
		
		
		return true;
	}
	
	
	
	public function del_apply($atitle,$atime,$eid){
	    if( !$this->check_apply($atitle,$atime,$eid) ){
			echo 'Error,the apply does not exist';			
			return false;
		}
		mysql_query("DELETE FROM apply WHERE atitle = '$atitle' AND atime = '$atime' AND eid = '$eid'");
		return true;
	}
	

    public function check_apply( $atitle,$atime, $eid){
        $results = mysql_query("SELECT * FROM apply");
		while($result = mysql_fetch_array($results)) {
			if ($result['atitle'] == $atitle && $result['atime'] == $atime && $result['eid'] == $eid) {	
				return 1;
			}
		}
		return 0;
	}
		
		
	public function get_content_data($atitle,$atime,$eid){
	    if( !$this->check_apply($atitle,$atime,$eid) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM apply WHERE atitle = '$atitle' AND atime = '$atime' AND eid = '$eid' ");
		$result = mysql_fetch_array($results);
		return $result[2];
	}
	
	
	
	
	
	public function get_apply_list($eid){
		$rlist = array();
		$results = mysql_query("SELECT * FROM apply WHERE eid = '$eid' ");
		$result = mysql_fetch_array($results);
		array_push( $rlist,  $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4] );
		return $rlist;
	}
	
    public function get_all_list(){
		$rlist = array();
		$results = mysql_query("SELECT * FROM apply ");
		while($result = mysql_fetch_array($results)) {
			array_push( $rlist,  $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4] );
		}
		return $rlist;
	}
	
    public function get_notread_list(){
		$rlist = array();
		$results = mysql_query("SELECT * FROM apply WHERE readyes = '0'");
		while($result = mysql_fetch_array($results)) {
			array_push( $rlist,  $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4] );
		}
		return $rlist;
	}
	
   public function get_read_list(){
		$rlist = array();
		$results = mysql_query("SELECT * FROM apply WHERE readyes = '1'");
		$result = mysql_fetch_array($results);
		array_push( $rlist,  $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4] );
	}
	
   public function mark_read($atitle,$atime,$eid){
        if( !$this->check_apply($atitle,$atime,$eid) ){
			echo 'Error,the inform does not exist';			
			return false;
		}
		mysql_query("UPDATE apply SET readyes='1'  WHERE  atitle = '$atitle' AND atime = '$atime' AND eid= '$eid' ");
		
	}
	
	
    function __destruct() {
      @mysql_close($this->con);
    }
	
}

?>






















