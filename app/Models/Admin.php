<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDOException;
use PDO;
Use Illuminate\Support\Env;

class Admin extends Model
{
    use HasFactory;

    private $dns;
        private $username;
        private $password;
        private $db;

        public function __construct(){
            $this->dns = 'mysql:host='.Env::get('DB_HOST');
            $this->username = Env::get('DB_USERNAME');
            $this->password = Env::get('DB_PASSWORD');
            $this->db = new PDO($this->dns,$this->username,$this->password);
        }

        public function createDataBase(){
            try {
                $query = $this->db->query('CREATE DATABASE bdunad01');
                return $query;
            } 
            catch (PDOException $e) {
                error_log($e->getMessage());
                return $e->getCode();
            }

        }

        public function createTable(){
            try {
                $query = $this->db->query('USE bdunad01');
                if($query){
                    $query = $this->db->query('CREATE TABLE tabla01 (
                        id VARCHAR(30) PRIMARY KEY,
                        nombre VARCHAR(60) NOT NULL,
                        marca VARCHAR(30) NOT NULL,
                        precio DECIMAL NOT NULL,
                        cantidad INT NOT NULL,
                        created_at TIMESTAMP,
                        updated_at TIMESTAMP 
                        )
                    ');
                    return $query;
                }

                return '3';
                
            } 
            catch (PDOException $e) {
                return $e->getCode();
            }
        }


}
