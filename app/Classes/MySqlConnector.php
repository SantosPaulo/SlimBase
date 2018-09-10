<?php

namespace App\Classes;

use PDO;

class MySqlConnector
{
    /**
     * @var string
     */
    private $dbname;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * PDO behavior settings.
     * @var array
     */
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ];

    /**
     * @var PDO
     */
    private $objInstance; 
        
    /**
     * Class Constructor - Create a new database connection if one doesn't exist 
     * Set to private so no-one can create a new instance via ' = new DB();' 
     */ 
    public function __construct($configs) {
        $this->dbname = $configs['dbname'];
        $this->host = $configs['host'];
        $this->username = $configs['username'];
        $this->password = $configs['password'];

        return $this->getInstance();
    } 

    /**
     * Like the constructor, we make __clone private so nobody can clone the instance 
     */ 
    private function __clone() {}
    
    /** 
     * Returns DB instance or create initial connection 
     * @param 
     * @return $objInstance; 
     */ 
    public function getInstance()
    { 
        if (!$this->objInstance){ 
            $this->objInstance = new PDO(
                'mysql:dbname=' . $this->dbname . ';host=' . $this->host . ';',
                $this->username,
                $this->password,
                $this->options
            );
        } 
        return $this->objInstance; 
    }

    /**
     * Overrides PDO query method.
     * @param string $sql
     * @return mixed
     */
    public function query($sql)
    {
        return $this->getInstance()->query($sql);
    }

    /**
     * Overrides PDO exec method.
     * @param string $sql
     * @return mixed
     */
    public function exec($sql)
    {
        return $this->getInstance()->exec($sql);
    }

    /**
     * Overrides PDO exec method.
     * @param string $sql
     * @return mixed
     */
    public function prepare($sql, $params = [])
    {
        $state = $this->getInstance()->prepare($sql);
        $state->execute(
            count($params) > 0 ? $params : NULL
        );

        return $state->fetchAll();
    }
}
