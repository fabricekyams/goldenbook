<?php
class MessageModel extends Model{
	
	/**
	 * enregistrer un nouveau message
	 * @param unknown $message
	 */
	public function addMessage($messages){
		extract($messages);
		$field = array('username', 'email', 'message','note', 'date');
		$values = array($username, $email, $message, $note,date("Y-m-d H:i:s") );
		$this->insert($field, $values);
	}
	
	/**
	 * recuperer les messages
	 */
	public function getMessages(){
		$query = 'SELECT * FROM message ORDER BY date DESC LIMIT 10';
		$result = $this->find($query);;
		
		return $result;
		
		
		//return false;
	}
	
	public function getLastMessage(){
		
	}
	
	public function notValid($username){
		$ok = (boolval(preg_match("#[a-zA-Z]+#", $username))); 
		 if(!$ok){
		 	return("le nom d'utilisateur ne peut contenir que des lettre et le .");die();
		 }
		return false;
	}
	
	public function getMoyenne(){
		$query ='SELECT note FROM message';
		$results = $this->find($query);
		$total=0;
		if ($results){
			foreach ($results as $result){
				$total += $result['note'];
				
			}
			$count = count($results);
			$moyenne = $total/$count;
			return $moyenne;
		}
		return false;
		
		

		
		
	}
}