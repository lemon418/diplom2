<?php


namespace Dmitry\Music\Controllers;
use Dmitry\Music\Core\Controller;
use Dmitry\Music\Models\AccountModel;
use Dmitry\Music\Models\TrackModel;
use Dmitry\Music\Core\Request;

class AccountController extends Controller

{
    private $account_model;
    private $track_model;

    public function __construct()
    {
        $this->account_model = new AccountModel();
        $this->track_model = new TrackModel();
    }
	public function index() {
		$title = 'Регистрация';
		$content = 'account/reg.php';
		$data = [
			'title'=>$title,
			'info'=>'Information is here'
		];
		return parent::generateResponse($content, $data);
	}

	public function addUser(Request $request){
        $result = $this->account_model
            ->addUser($request->post());
            
            
        $content = 'account/reg.php';
        $data = [
            'page_title'=>'Зарегистрироваться',
            'result' => $result
        ];
        return $this->generateResponse($content, $data);
    }

    public function login(Request $request) {
        $formData = $request->post();        
        $result = $this->account_model->authorisation($formData);
        if ($result === AccountModel::SUCCESS) {
            $_SESSION['login'] = $formData['login'];
            
        }
        return $this->ajaxResponse($result);

    }

    public function logout() {
        unset($_SESSION['login']);
        $_SESSION = [];
        session_destroy();
        header('Location: /');
    }

    public function trackload(Request $request) {
        $data = $request->files();
        $result = $this->account_model->trackload($data);
        header('Location: /');
    }
    
    public function my() {
        $title = 'Личный кабинет';
        $content = 'account/my.php';
        $track = $this->track_model->getMyTrack();
        $data = [
            'title'=>$title,
            'mytracks'=> $track
            
        ];
        return parent::generateResponse($content, $data);
    } 




}