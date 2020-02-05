<?php


namespace Dmitry\Music\Controllers;
use Dmitry\Music\Core\Controller;
use Dmitry\Music\Models\AccountModel;

class AccountController extends Controller

{
    private $account_model;
    public function __construct()
    {
        $this->$account_model = new AccountModel();
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
        $result = $this->$account_model
            ->addUser($request->post());
        $content = '../../Models/signup.php';
        $data = [
            'page_title'=>'Зарегистрироваться',
            'result' => $result
        ];
        return $this->generateResponse($content, $data);
    }
}