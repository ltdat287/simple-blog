<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * View all articles
     */
    public function index()
    {
        return redirect('/index.php/articles');
    }

    /**
     * View form login
     */
    public function login()
    {
    	return view('members.login');
    }
}
