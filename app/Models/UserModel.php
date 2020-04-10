<?php namespace App\Models;

use PDOException;
use System\Db;

class UserModel
{
    /*
     * insert a user
     *
     * @return int
     */
    public static function insert(... $data)
    {
        try {
            $prepare = Db::conn()->prepare("INSERT INTO users SET email = ?, password = ?");
            $prepare->execute($data);
            return Db::conn()->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*
     * select user by id
     *
     * @returna array|mixed
     */
    public static function select($user_id)
    {
        try {
            $prepare = Db::conn()->prepare("SELECT * FROM users WHERE id = ?");
            $prepare->execute([$user_id]);
            return $prepare->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*
     * select by `field`
     *
     * @return array|mixed
     */
    public static function select_by($column_name, $value)
    {
        try {
            $prepare = Db::conn()->prepare("SELECT * FROM users WHERE $column_name = ?");
            $prepare->execute([$value]);
            return $prepare->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}