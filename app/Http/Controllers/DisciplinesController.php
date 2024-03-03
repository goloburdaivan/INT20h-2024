<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplinesController extends Controller
{
    public function list() {
        return view('disciplines.list', [
            'disciplines' => Discipline::all()
        ]);
    }
}
