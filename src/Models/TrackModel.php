<?php


namespace Dmitry\Music\Models;
use Dmitry\Music\Core\DBConnection;
// use Dmitry\Music\Controllers\IndexController;

class TrackModel
{
    private $db;
    public function __construct()
    {
        $this->db = DBConnection::getInstance();
    }

    public function getAllTracks() {
        $sql = 'SELECT id_track, name, link FROM tracks';
        return $this->db->queryAll($sql);

    }

    public function getRating() {
    	$sql ='SELECT rate, name FROM rate RIGHT JOIN tracks ON rate.idtrack = tracks.id_track ORDER BY rate DESC';
    	return $this->db->queryAll($sql);

    }


        public function getMyTrack() {
    	$sql ='SELECT id_track, name FROM tracks RIGHT JOIN users ON tracks.id_user = users.idusers WHERE login = :login;';
    	$login = $_SESSION['login'];
    	$params = ['login' => $login];
    	return $this->db->execute($sql, $params);

    }

    public function delete($id) {
 		$sql = 'DELETE FROM tracks WHERE id_track = :id;';
 		$params = ['id' => $id];
    	return $this->db->executeSql($sql, $params);
    }



    public function vote($voice, $idtrack) {
 		$sql = 'UPDATE rate SET rate = rate + :voice WHERE idtrack = :idt;';
 		$params = [
 			'voice' => $voice,	
 			'idt' => $idtrack];

    	return $this->db->executeSql($sql, $params);
    }

}
