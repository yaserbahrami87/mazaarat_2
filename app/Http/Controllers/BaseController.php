<?php

namespace App\Http\Controllers;

use App\festival;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $dateNow = verta();
        $this->dateNow = $dateNow->format('Y/m/d');
        $this->timeNow = $dateNow->format('H:i:s');

        $this->festival=festival::latest()->first();
    }
}
