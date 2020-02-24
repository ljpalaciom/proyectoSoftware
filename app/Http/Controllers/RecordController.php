<?php

namespace App\Http\Controllers;

class RecordController extends Controller
{
    public function create()
    {
        return view('record.createRecord');
    }

    public function list(){
        return view('record.listRecords');
    }
}
