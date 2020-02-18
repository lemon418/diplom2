<?php


namespace Dmitry\Music\Models;

use Dmitry\Music\Core\DBConnection;
use Dmitry\Music\Core\AccountController;

class AccountModel 
{   const SUCCESS = "Авторизация прошла успешно";
    const ERROR = "Ошибка авторизации";
    const USER_EXISTS = 'Пользователь с таким логином уже существует';
    const REGISTRATION_FAILED = 'Вы не были зарегистрированы';
    const REGISTRATION_SUCCESS = 'Регистрация прошла успешно';
    private $db;
    public function __construct()
    {
        $this->db = DBConnection::getInstance();
    }

    public function authorisation(array $formData)
    {
        $login = $formData['login'];
        $pwd = $formData['pwd'];
        $user = $this->isUser($login);
        if(!$user) {
            return self::ERROR;
        }
        if(!password_verify($pwd, $user['psw'])) {
            echo $pwd;
            return self::ERROR;
        }
        return self::SUCCESS;
    }

    public function addUser(array $user_data){
        // проверка уникальности логина
        // password_hash();
        // добавление в таблицу user

        // добавление контактной информации
        //  в таблицу user_info
        $login = $user_data['login'];
        $pwd = $user_data['pwd'];
        $pwd = password_hash($pwd,
            PASSWORD_DEFAULT);
        var_dump($pwd);
        $email = $user_data['email'];
        $user_sql = "INSERT INTO users (login, psw, email)
VALUES (:login, :psw, :email)";

  
        try{
            // начало транзакции
            // $this->db->getConnection()
            //         ->beginTransaction();
            $user_params = [
                'login' => $login,
                'psw' => $pwd,
                'email'=> $email
            ];
            $this->db->executeSql($user_sql, $user_params);

            // подтверждение транзакции
            // $this->db->getConnection()->commit();
            return self::REGISTRATION_SUCCESS;
        } catch (Exception $e) { // Обработка ошибки
//           // откат транзакции
            $this->db->getConnection()->rollBack();
            return self::REGISTRATION_FAILED;


        }
    }

        private function isUser(string $login){
        $sql = 'SELECT * FROM users WHERE login = :login';
        $user = $this->db->execute($sql,
            ['login'=>$login], false);
        return $user;
    }

    public function trackload($insert) {
        $name = $_POST['name'];
        $hash_name = time() . $insert['track']['name'];
        $tmp_name = $insert['track']['tmp_name'];

        move_uploaded_file($tmp_name, "static/tracks/" . $hash_name);  

        $sql = 'INSERT INTO tracks(name, hash_name, link, id_user) VALUES (:name, :hash_name, :dir, (SELECT idusers FROM users WHERE login = :login))';

        $dir = "static/tracks/" . $hash_name;
        $login = $_SESSION['login'];        
        $track_params = [
                        'name'=>$name,    
                        'hash_name' => $hash_name,
                        'dir' => $dir,
                        'login' => $login
                        ];

        try {
            $this->db->getConnection()->beginTransaction();                
            $this->db->executeSql($sql, $track_params);  
            $id = $this->db->lastInsertId();
            $sql_2 = 'INSERT INTO rate (idtrack, rate) VALUES ((SELECT id_track FROM tracks WHERE id_track = :id), 0)';

            $this->db->executeSql($sql_2, ['id'=>$id]);
        $this->db->getConnection()->commit();
        }
        catch (Exception $e){
            $this->db->rollback();
            return "Ошибка добавления трека";
        }
        // rateForNewTrack($id);

    }
}

