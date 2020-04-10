<?php namespace App\Models;

use PDOException;
use System\Db;

class BookModel
{
    /*
     * deletes a book by its ID
     */
    public static function delete($book_id)
    {
        try {
            $prepare = Db::conn()->prepare("DELETE FROM books WHERE id = ?");
            $prepare->execute([$book_id]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*
     * inserts book
     */
    public static function insert(... $data)
    {
        try {
            $prepare = Db::conn()->prepare("INSERT INTO books SET title = ?, author = ?, description = ?");
            $prepare->execute($data);
            return Db::conn()->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*
     * returns book by its ID
     *
     * @return array|void
     */
    public static function select($book_id)
    {
        try {
            $prepare = Db::conn()->prepare("SELECT * FROM books WHERE id = ?");
            $prepare->execute([$book_id]);
            return $prepare->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*
     * returns books
     *
     * @return array|mixed
     */
    public static function select_all()
    {
        try {
            $query = Db::conn()->query("SELECT * FROM books");
            return $query->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /*
     * update book by ID
     */
    public static function update($book_id, ... $data)
    {
        $data[] = $book_id;

        try {
            $prepare = Db::conn()->prepare("UPDATE books SET title = ?, author = ?, description = ? WHERE id = ?");
            $prepare->execute($data);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }



}