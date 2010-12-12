<?php
include "lb.php";
include "GeneralFunction.php";
class lb_list
{
    public $count;
    public $lb_list=array();
    private $path = 'manage/data/lb_list.txt';

    public function __construct() {
    	//$this->count=0;
         $this->read_alldata();
    }

	public function __destruct() {
		//��������
		$this->save_alldata();
	}




/*
�����ڼ���$lb_list��ÿ��lb��,����ÿ��match_name($lb_name),�������TRUE,��ôreturn ���lb��
*/
	public function get_lb_by_id($lb_id) {
		//�����ڼ���$activity_list��ÿ��activity��ĺ���match_name($activity_name),
		//�������TRUE����ôreturn ���activity��
		for($position = 0; $position < count($this->lb_list); $position++) {
			if($lb_id==$this->lb_list[$position]->getId()){
				return $this->lb_list[$position];
			}
		}
		
		return 0;
	}
	
	public function get_lbnumber_by_id($lb_id) {
		//�����ڼ���$activity_list��ÿ��activity��ĺ���match_name($activity_name),
		//�������TRUE����ôreturn ���activity��
		
		for($position = 0; $position < count($this->lb_list); $position++) {
			if($lb_id==$this->lb_list[$position]->getId()){
				return ++$position;
			}
		}
		return 0;
	}



	
	public function get_lb_by_name($name) {
		//�����ڼ���$activity_list��ÿ��activity��ĺ���match_name($activity_name),
		//�������TRUE����ôreturn ���activity��
		$match_list=array();
		for($position = 0; $position < count($this->lb_list); $position++) {
			if(strcmp($name, $this->lb_list[$position]->getNmae()) == 0){
				array_push($match_list,$this->lb_list[$position]);
			}
		}
		
		return $match_list;
	}


	
	
	public function read_alldata() {
/*
��lb_list.txt�ж�ȡ����
��һ��Ϊһ������,��$this->count ��Ϊ�������
�ӵڶ��п�ʼ,��ȡ������ŵ���Ϣ,�����ʽΪ
����|����|ѧУ|�绰|����������|�1-�2-�3
����һ��lb��,��ʼ��������Ϣ,�����lb��ѹ�뵽$lb_list
*/
		if(!file_exists($this->path)) {
			file_put_contents($this->path, "0\n");
		}
		
		$lb_list = file($this->path);
		$this->count = trim($lb_list[0]);
		array_shift($lb_list);
		
		for($i = 0; $i < $this->count; $i++) {
			list($id,$password,$name,$address,$phone) = explode('|', trim($lb_list[$i]));
					  	  
			$lb = new lb($id,$password,$name,$address,$phone);
			
			array_push($this->lb_list, $lb);
		}
	}
	
	
	







public function add_lb($id,$password,$name,$address,$phone)
{
/*
����һ���µ�lb��,
new lb($new_name,$new_password,$new_school,$new_person_name,$new_phone)
Ȼ��������ѹ��lb_list����
�������lb���save_myself();
*/
    if($this->get_lb_by_id($id)) { return false; }
	$source1 = 'manage/temp';
    $source2 = 'manage/data/lb_list/'.$id;
    $this->xCopy($source1 ,$source2,1);
    $new_lb=new lb($id,$password,$name,$address,$phone);
	array_push($this->lb_list,$new_lb);
	$this->count=$this->count+1;
	$temp_data = $new_lb->getDatastr();
	file_put_contents('manage/data/lb_list/'.$id.'/data/center_data.txt', $temp_data."\n");
	$this->save_alldata();
}




	public function save_alldata() {
/*
��lb_list.txt���,�ڵ�һ��д��$this->Count,Ȼ��ÿһ�зֱ�д��lb_list���ÿ��lb�����Ϣ
*/
		$temp_path = 'temp.txt';
		//print $this->count;
		file_put_contents($temp_path, $this->count."\n");
		
		for($i = 0; $i < $this->count; $i++){
			$str=$this->lb_list[$i]->getDatastr();
			//print $str."\t\n";
			//print $str;
			file_put_contents($temp_path,$str."\n", FILE_APPEND);
		}
		if(!@unlink($this->path)) { return false; }
		if(!rename($temp_path, $this->path)) {
			return false;
		}
		
		return true;
	}





	public function del_lb($lb_id) {
		//����$this-> get_activity_by_name($activity_name)
	    //��$activity_list�еİ������Ӽ�����ɾ��
		//    ����$this->save_alldata()
	$position=$this->get_lbnumber_by_id($lb_id);
	//print $position;
	if($position==0) {print "false";return false; }
	else{
		   $position--;
		   $temp_lb=new lb("","","","","");
		   $temp_lb=$this->lb_list[$position];
		   $this->lb_list[$position]=$this->lb_list[0];
		   $this->lb_list[0]=$temp_lb;
		   array_shift($this->lb_list);
		   $this->count=count($this->lb_list);
		   removeDirectory('manage/data/lb_list/'.$lb_id);
		   if($this->save_alldata()){ return true; }
		   else { return false; }
		}

	}

    function xCopy($source, $destination, $child){ 

     if(!is_dir($source)){ 
     	echo("Error:the $source is not a direction!");
     	return 0; 
     } 
     if(!is_dir($destination)){ 
     	mkdir($destination,0777); 
     } 


     $handle=dir($source); 
     while($entry=$handle->read()) { 
     	if(($entry!=".")&&($entry!="..")){ 
     		if(is_dir($source."/".$entry)){
     			if($child){
     				$this->xCopy($source."/".$entry,$destination."/".$entry,$child);
     			}
     	    }
     	    else{
     	    	copy($source."/".$entry,$destination."/".$entry);
     	    }

     	} 
     }      

     return 1; 
   }

}
?>