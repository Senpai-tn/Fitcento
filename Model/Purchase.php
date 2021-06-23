<?php
class Purchase
{
    private $id, $id_user, $price, $created_at;
    function __construct($id, $id_user, $price, $created_at)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->price = $price;
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

    function SavePurchase()
    {
        $connexion = $this->connect_db();
        try {
            $sql =
                "INSERT INTO purchases (id_user,price) VALUES ('" .
                $this->getId_user() .
                "','" .
                $this->getPrice() .
                "')";

            $connexion->exec($sql);
            echo 'New record created successfully';
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
     * Get the value of id_user
     */

    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */

    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of price
     */

    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
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
}
?>
