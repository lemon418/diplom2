<?php


namespace Dmitry\Music\Controllers;
use Dmitry\Music\Core\Controller;

class IndexController extends Controller
{
	public function index() {
		$title = 'Главная';
		$content = 'main/main.php';
		$data = [
			'title'=>$title,
			'main_info'=>'Hello'
		];
		return parent::generateResponse($content, $data);
	}
}