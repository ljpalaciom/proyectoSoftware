<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface ImageStorage {
    public static function store(Request $request, $exercise);
}
