<?php namespace App\Controllers;

use System\Auth;
use System\Controller;

class Account extends Controller
{
    /*
     * constructor has auth_only method making the whole class accessible only by authenticated users
     */
    public function __construct()
    {
        parent::__construct();

        auth_only();
    }

    /*
     * main account page
     */
    public function index()
    {
        return view('account_index', [
            'title' => 'My Account'
        ]);
    }

    /*
     * logout page
     */
    public function logout()
    {
        Auth::destroy();

        redirect('home/login');
    }
}