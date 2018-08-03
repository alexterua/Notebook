<?php

class Auth
{
    public $db;
    /*
     * // Auth
        register()
        createUser()
        insert('users')
        login()
        logout()
        currentUser() ['id', 'name', 'email']
        isChecked()     //true || false
        ...
        ban()
        unban()
        getUserStatus() // "banned", "normal" как fullName()
        isBanned    //true
        isNormal()  // false
        remove()
        uploadAvatar() // будет использоваться компонент ImageManager




    // Validate

    */



    public function __construct(QueryBuilder $db)
    {
        $this->db = $db;
    }

    public function register($email, $password)
    {
        $this->db->add("users", [
            'email' => $email,
            'password' => md5($password)
        ]);
    }

    public function createUser()
    {

    }

    public function insert()
    {

    }

    public function login($table, $email, $password)
    {
        // 1. Проверить существует ли пользователь в базе
        /*$sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", md5($password));
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);*/
        $user = $this->selectUser($table, $email, $password);
        // 2. Если да
        //  2.1 Записываем в сессию и возвращаем true
        if($user) {
            $_SESSION['user'] = $user;
            return true;
        }
        // 3. Если нет
        // 3.1 Возвращаем false
        return false;
    }

    // Поиск пользователя по БД
    public function selectUser($table, $email, $password)
    {
        $sql = "SELECT * FROM $table WHERE email=:email AND password=:password LIMIT 1";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", md5($password));
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

    public function isChecked()
    {
        if(isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    public function currentUser()
    {
        if($this->isChecked()) {
            return $_SESSION['user'];
        }
    }

    public function fullName()
    {
        $user = $this->currentUser();

        return $user['name'] . " " . $user['surname'];
    }
}