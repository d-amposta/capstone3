<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;

class InterestsController extends Controller
{
    function showAll() {
    	$interests = Interest::all();

    	return view('add_interest', compact('interests'));
    }
}
