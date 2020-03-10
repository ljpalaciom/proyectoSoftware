<?php

namespace App\Exports;

use App\Record;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class RecordExport implements FromQuery
{
  use Exportable;

     public function __construct(int $id)
     {
         $this->id = $id;
     }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
  {
      return Record::query()->where('user_id', $this->id);
  }
}
