<?php namespace App\Controllers;

use App\Models\BookModel;
use System\Controller;

class Book extends Controller
{
    /*
     * view book
     */
    public function index($book_id)
    {
        if (!$book = BookModel::select($book_id)) {
            return not_found();
        }

        return view('book_index', [
            'title' => $book['title'],
            'book' => $book
        ]);

    }

    /*
     * edit book
     */
    public function edit($book_id)
    {
        auth_only();

        if (!$book = BookModel::select($book_id)) {
            redirect();
        }

        if ($_POST) {
            $this->validate('title', 'required|min:5|max:25');
            $this->validate('author', 'required|min:5|max:25');
            $this->validate('description', 'required|min:5|max:1000');

            BookModel::update($book_id, $_POST['title'], $_POST['author'], $_POST['description']);

            set_alert('The book information updated successfully');

            back();
        }

        return view('book_edit', [
            'title' => $book['title'],
            'book' => $book
        ]);
    }

    /*
     * delete book
     */
    public function delete($book_id)
    {
        auth_only();

        BookModel::delete($book_id);

        redirect();
    }

    /*
     * add book
     */
    public function add()
    {
        auth_only();

        if ($_POST) {
            $this->validate('title', 'required|min:5|max:25');
            $this->validate('author', 'required|min:5|max:25');
            $this->validate('description', 'required|min:5|max:1000');

            $book_id = BookModel::insert($_POST['title'], $_POST['author'], $_POST['description']);

            redirect('book/index/' . $book_id);
        }

        return view('book_add', [
            'title' => 'Add Book'
        ]);
    }
}