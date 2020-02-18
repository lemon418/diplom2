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
        $id = $request->get();
        $idp = $id['del'];
        $this->track_model->delete($idp);
        header("Location: main/main.php");
    }


}