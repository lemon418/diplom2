<?php


namespace Dmitry\Music\Controllers;
use Dmitry\Music\Core\Controller;
use Dmitry\Music\Models\TrackModel;
use Dmitry\Music\Core\DBConnection;
use Dmitry\Music\Core\Request;

class IndexController extends Controller

{

	private $track_model;
    private $db_connection;
    
    public function __construct() {
        $this->db_connection =
            DBConnection::getInstance();
        $this->track_model = new TrackModel();

    }

	public function index(Request $request) {
		$link = $request->params()['link'];
        $content = 'main/main.php';
        $track = $this->track_model
            ->getAllTracks();
        $rate = $this->track_model->getRating();
   
        $data = [
            'title'=>'Главная',
            'track' => $track,
            'rate' => $rate
        ];
        return $this->generateResponse($content, $data);

	}

    public function delete(Request $request) {

        $id = $request->post();
        $idp = $id['id'];
        $this->track_model->delete($idp);
        $track = $this->track_model->getMyTrack();
        $content = 'account/my.php';
            $data = [
            'title'=>'Главная',
            'mytracks' => $track,
        ];
        return $this->generateResponse($content, $data);
    }

        public function vote(Request $request) {
        $id = $request->post();
        $voice = $id['vote'];
        $idp = $id['id'];
        $this->track_model->vote($voice, $idp);
        $content = 'main/main.php';
        $rate = $this->track_model->getRating();
        $track = $this->track_model->getAllTracks();
        $data = [
            'title'=>'Главная',
            'track' => $track,
            'rate' => $rate
        ];
        return $this->generateResponse($content, $data);
    }



}