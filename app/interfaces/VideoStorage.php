<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface VideoStorage {
    public static function store(Request $request, $exercise);
}
