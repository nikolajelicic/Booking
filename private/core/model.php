<?php
    namespace App\Core;
    
    use App\Core\Database\DatabaseConnection;

    class Model{
        private $dbc;

        final public function __construct(DatabaseConnection &$dbc) {
            $this->dbc = $dbc;
        }

        final protected function getConnection() {
            return $this->dbc->getConnection();
        }

        final private function getTableName(): string {
            $matches = [];
            preg_match('|^.*\\\((?:[A-Z][a-z]+)+)Model$|', static::class, $matches);
            return substr(strtolower(preg_replace('|[A-Z]|', '_$0', $matches[1] ?? '')), 1);
        }

        final public function getById(int $id) {
            $tableName = $this->getTableName();
            $sql = 'SELECT * FROM ' . $tableName . ' WHERE ' . 'id'.$tableName . '= ?;';
            $prep = $this->getConnection()->prepare($sql);
            $res = $prep->execute([$id]);
            $item = NULL;
            if ($res) {
                $item = $prep->fetch(\PDO::FETCH_OBJ);
            }
            return $item;
        }

        final public function getAll(): array {
            $tableName = $this->getTableName();
            $sql = 'SELECT * FROM ' . $tableName . ';';
            $prep = $this->getConnection()->prepare($sql);
            $res = $prep->execute();
            $items = [];
            if ($res) {
                $items = $prep->fetchAll(\PDO::FETCH_OBJ);
            }
            return $items;
        }

        final public function deleteById(int $id) {
            $tableName = $this->getTableName();
            $sql = 'DELETE FROM ' . $tableName . ' WHERE ' . 'id'.$tableName . '= ?;';
            $prep = $this->getConnection()->prepare($sql);
            return $prep->execute([$id]);
        }

        public function getRowCount(){
            $tableName = $this->getTableName();
            $sql = "SELECT * FROM . $tableName";
            $prep = $this->getConnection()->prepare($sql);
            $prep->execute();
                return $prep->rowCount();
        }
    }