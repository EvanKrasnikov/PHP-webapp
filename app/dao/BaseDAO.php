<?php

class BaseDAO
{
    private string $driver = "mysql";
    private string $host = "localhost";
    private string $dataBaseName = "news";
    private string $userName = "root";
    private string $password = "pass";
    private string $charset = "utf8";
    protected PDO $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("$this->driver:host=$this->host;dbname=$this->dataBaseName;charset=$this->charset", $this->userName, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    protected function executePrepared(string $query, array $params)
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            foreach ($stmt->errorInfo() as $err)
            {
                echo $err;
            }

        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    private function disconnect() : void
    {
        $this->conn = null;
    }

}

