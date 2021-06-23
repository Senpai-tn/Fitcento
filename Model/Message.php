<?php
class Message
{
    private $id, $email, $phone, $name, $message;
    function __construct($id, $email, $phone, $name, $message, $created_at)
    {
        $this->id = $id;
        $this->email = $email;
        $this->phone = $phone;
        $this->name = $name;
        $this->message = $message;
        $this->created_at = $created_at;
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

    function SaveMessage()
    {
        $connexion = $this->connect_db();
        try {
            $sql =
                "INSERT INTO messages (	name,email,phone,message) VALUES ('" .
                $this->getName() .
                "','" .
                $this->getEmail() .
                "' , '" .
                $this->getPhone() .
                "' ,'" .
                $this->getMessage() .
                "')";

            $connexion->exec($sql);
        } catch (PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
        }

        $conn = null;
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
     * Get the value of message
     */

    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */

    public function setMessage($message)
    {
        $this->message = $message;

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
     * Get the value of phone
     */

    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of name
     */

    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
?>
