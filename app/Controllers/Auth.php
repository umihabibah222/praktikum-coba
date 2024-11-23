<?php 
namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }
    public function Register()
    {
        return view('auth/register');
    }
}