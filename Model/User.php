<?php

class User
{
    private $id, $email, $password, $plan, $created_at;

    function __construct($id, $email, $password, $plan, $created_at)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->plan = $plan;
        $this->created_at = $created_at;
    }

    /**
     * Get the value of created_at
     */

    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of id
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of plan
     */

    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set the value of plan
     *
     * @return  self
     */

    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    function connect_db()
    {
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'fitcento';
        $dsn = 'mysql:dbname=' . $db_name . ';host=' . $server;
        try {
            $connexion = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            printf("Echec connexion : %s\n", $e->getMessage());
            exit();
        }
        return $connexion;
    }

    function register()
    {
        session_start();
        $connexion = $this->connect_db();
        try {
            $sql =
                "INSERT INTO users (email,password) VALUES ('" .
                $this->getEmail() .
                "','" .
                $this->getPassword() .
                "')";

            $connexion->exec($sql);
            $_SESSION['message'] = 'Registred successfuly';
            header('location:../logins.php');
        } catch (PDOException $e) {
            $_SESSION['error'] = 'Registred failed';
            header('location:../logins.php');
        }

        $conn = null;
    }

    function login()
    {
        $connexion = $this->connect_db();
        $stmt = $connexion->prepare(
            'SELECT * FROM users where email = "' .
                $this->getEmail() .
                '" and password = "' .
                $this->getPassword() .
                '"  limit 1'
        );
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->fetchAll();
        return $result;
    }

    function buy_plan($plan)
    {
        try {
            $connexion = $this->connect_db();
            $sql = "UPDATE users SET plan='$plan' WHERE id=" . $this->getId();

            // Prepare statement
            $stmt = $connexion->prepare($sql);

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . ' records UPDATED successfully';
        } catch (PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
        }

        $conn = null;
    }
}
?>
