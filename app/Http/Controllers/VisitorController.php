<?php

namespace App\Http\Controllers;

use App\Models\formation;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function visit() {
        visitor()->visit();

    }
}
