<?php


namespace application\models;


use application\components\Db;
use application\components\Validator;

class Register
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;

    public function __construct($post)
    {
        $this->first_name = $post['first_name'];
        $this->last_name = $post['last_name'];
        $this->email = $post['email'];
        $this->password = $post['password'];
        $this->confirm_password = $post['confirm_password'];
    }

    public static function getData(){
        $reg_show = '
            <div style="margin-bottom: 200px; font-size: 20px" class="alert alert-success" role="alert">
                You are registered.
            </div>
        ';
        $output = array(
            'reg_show' => $reg_show,
        );
        echo json_encode($output);
        return true;
    }
    public function validate()
    {
        $validator = new Validator($this->rules());
        if (!empty($validator->validate())) {
            return $validator->validate();
        }
        if ($this->password != $this->confirm_password) {
            return ['password' => 'Password is incorrect'];
        }
        if (self::checkEmailExists($this->email)){
            return ['email' => 'Email already exist'];
        }
        return [];
    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }


    public function rules()
    {
        return [
            'required' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => $this->password,
                'confirm_password' => $this->confirm_password,
            ],
            'name' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
            ],
            'email' => [
                'email' => $this->email,
            ],
            'password' => [
                'password' => $this->password,

            ]
        ];
    }

    public static function register ($first_name,$last_name, $email, $password) {
        $db = Db::getConnection();

        $sql = 'INSERT INTO users (first_name, last_name,email, password)' .
            'VALUES (:first_name, :last_name, :email, :password)';

        $result = $db->prepare($sql);

        $result->bindParam(':first_name', $first_name, \PDO::PARAM_STR);
        $result->bindParam(':last_name', $last_name, \PDO::PARAM_STR);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->bindParam(':password', $password, \PDO::PARAM_STR);

        return $result->execute();
    }

}