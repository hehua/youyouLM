<?php
class newslist {
	public function newslist() {
		$this->con = mysql_connect("localhost","root","");
	    if (!$this->con)
	    {die('Could not connect: ' . mysql_error());}
	    mysql_select_db("hehua", $this->con);
	} 
	
	public function add_news($ntitle,$ntime,$ncontent){
		if( $this->check_news( $ntitle,$ntime,$ncontent) ){
			echo 'Error,the news has already exist';			
			return false;
		}
		 
		mysql_query("INSERT INTO news VALUES ('$ntitle','$ntime','$ncontent')");
        return true;
	}
	
	
    
    public function edit_news($old_title,$oldtime,$ntitle,$ntime,$ncontent){
        
        if( !$this->check_news($old_title,$oldtime) ){
			echo 'ttttError,the news does not exist';			
			return false;
		}
		
		$this->del_news($old_title,$oldtime);
		$this->add_news($ntitle,$ntime,$ncontent);
		
		
		return true;
	}
	
	
	
	public function del_news($ntitle,$ntime){
	    if( !$this->check_news($ntitle,$ntime) ){
			echo 'Error,the news does not exist';			
			return false;
		}
		mysql_query("DELETE FROM news WHERE ntitle = '$ntitle' AND ntime = '$ntime' ");
		return true;
	}
	

    public function check_news( $ntitle,$ntime){
        $results = mysql_query("SELECT * FROM news");
		while($result = mysql_fetch_array($results)) {
			if ($result['ntitle'] == $ntitle && $result['ntime'] == $ntime) {	
				return 1;
			}
		}
		return 0;
	}
		
		
	public function get_news_data($ntitle,$ntime){
	    if( !$this->check_news($ntitle,$ntime) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM news WHERE ntitle = '$ntitle' AND ntime = '$ntime'");
		$result = mysql_fetch_array($results);
		return $result[0].'|'.$result[1].'|'.$result[2];
	}
	
	
	
	
	
	public function get_news_list(){
		$ulist = array();
        $result = mysql_query("SELECT * FROM news");
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






















