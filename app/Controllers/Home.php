<?php namespace App\Controllers;

use App\Models\BookModel;
use App\Models\UserModel;
use System\Auth;
use System\Controller;

class Home extends Controller
{
    /*
     * homepage
     */
    public function index()
    {
        $books = BookModel::select_all();

        return view('home_index', [
            'title' => 'Library',
            'books' => $books
        ]);
    }

    /*
     * login page
     */
    public function login()
    {
        guest_only();

        if ($_POST) {
            $this->validate('email', 'required|min:5|max:50');
            $this->validate('password', 'required|min:5|max:50');

            if (!$user = UserModel::select_by('email', $_POST['email'])) {
                set_alert('Incorrect Login Details', 'danger');
                back();
            }

            if (!password_verify($_POST['password'], $user['password'])) {
                set_alert('Incorrect Login Details', 'danger');
                back();
            }

            Auth::create($user['id']);

            redirect('account');
        }

        return view('home_login', [
            'title' => 'Login'
        ]);

    }

    /*
     * register page
     */
    public function register()
    {
        guest_only();

        if ($_POST) {
            $this->validate('email', 'required|min:5|max:50');
            $this->validate('password', 'required|min:5|max:50');

            $user_id = UserModel::insert($_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT));

            set_alert('You have successfully signed up!');

            Auth::create($user_id);

            redirect('account/index');
        }

        return view('home_register', [
            'title' => 'Register'
        ]);
    }
}