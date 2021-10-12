<?php 

namespace App\Core\Database;

class DatabaseConnection{
    private $connection;
    private $configuration;

    public function __construct(DatabaseConfiguration $databaseConfiguration){
        $this->configuration = $databaseConfiguration;
    }

    public function getConnection(): \PDO{
        if(is_null($this->connection)){
            $this->connection = new \PDO($this->configuration->getSourceString(),
                                        $this->configuration->getUser(),
                                        $this->configuration->getPass()
                                    );
        }
        return $this->connection;
    }
}

?>