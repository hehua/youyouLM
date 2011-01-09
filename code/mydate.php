<?php 
class mydate{
	
	public function mydate() {
	   $this->t = time()+3600*8;//这里和标准时间相差8小时需要补足
	} 
	
	public function now_date(){
		return date("Y-m-d",$this->t);
	}
	
    public function now_time(){
		return date("H:i:s",$this->t);
	}
	
    public function now_datetime(){
		return date("Y-m-d H:i:s",$this->t);
	}
	
	public function weekday(){
		return date("w",$this->t);
	}
	
    public function mydate_minus($n){
    	$temp = time()+3600*8-3600*24*$n;
		return date("Y-m-d",$temp);
	}
	
    public function mydate_add($n){
    	$temp = time()+3600*8+3600*24*$n;
		return date("Y-m-d",$temp);
	}
	
    public function get_current_week(){
    	$n = date("w",$this->t)-1;
    	$list = array();
    	for( $i = 0; $i < 7; $i++){
    		array_push( $list, $this->mydate_add($i-$n) );
    	}
		return $list;
	}
	
    public function get_next_week(){
    	$n = 7-date("w",$this->t)+1;
    	$list = array();
    	for( $i = 0; $i < 7; $i++){
    		array_push( $list, $this->mydate_add($i+$n) );
    	}
		return $list;
	}
	
}
?>