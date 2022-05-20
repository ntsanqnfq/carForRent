<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Bootstrap\Controller;
use Sang\CarForRent\Bootstrap\Request;
use Sang\CarForRent\Database\Database;

class LoginController extends Controller
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    public function login(Request $request)
    {
        if ($request->isPost()){
            echo "submitted data successfully";
        }
        return $this->render('login');

    }
}
