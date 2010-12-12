<?php
class lb
{
    public $id;
	public $password;
	public $name;
	public $address;
	public $phone;
	
	
	public function __construct($id,$password,$name,$address,$phone) 
	{
        $this->id = $id;              
        $this->password = $password;       
        $this->name=$name;          
		$this->address=$address;
		$this->phone=$phone;                           
	}
    



	
	public function edit_data($id,$password,$name,$address,$phone)  //更新信息
	{
	   $this->password=$password;
	   $this->name=$name;
	   $this->address=$address;
	   $this->phone=$phone;
	}


	public function getDataArr() {
		return array($this->id,
					 $this->password,
					 $this->name,
					 $this->address,
					 $this->phone
					 );
	}
	
	public function getDatastr() {
		return implode("|",$this->getDataArr());
	}
	

	
	public function getId() {
		return $this->id;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getPhone() {
		return $this->phone;
	}
	

}
?>