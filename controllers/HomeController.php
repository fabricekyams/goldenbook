<?php
class HomeController extends Controller{

	/*public function __construct(){
		
		
	}*/
	
	public function index(){
		require_once  ROOT.DS.'core'.DS.'Form.php';
		$this->loadModel('message');
		$model = $this->getModel()['message'];
		$this->ajouter($model);
		$this->recuperer($model);
		$this->moyene($model);
		$this->render('index');

	}
	
	private function moyene($model){
		$moy=$model->getMoyenne();
		var_dump($moy);
		if($moy){
			$this->addVars('moyenne',round($moy));
		}
	}
	
	private function ajouter($model){

		if(!empty($this->getReq()->getData())){
			$message = $this->getReq()->getData();
			$userNotValid = $model->notValid($message['username']);
			if (!$userNotValid){
				$model->addmessage($message);
				$this->redirect(WEBROOT);
				die();
			}else{
				$session = $this->getSession();
				$session->setFlash( $userNotValid, 'danger');
			}
				
		}
	}
	
	private function recuperer($model){
		$messages = $model->getMessages();
		if ($messages){
			$this->addVars('messages', $messages);
		}
	}
}