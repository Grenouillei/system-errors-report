<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport implements FromCollection
{
    protected $reports;

    public function __construct($reports)
    {
        $this->reports = $reports;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resultArr = collect($this->reports);

        return $resultArr->map(function($line)  {
                return [
                    $line['title'],
                    $line['count'],
                    $line['date'],
                ];
        });

    }
}
