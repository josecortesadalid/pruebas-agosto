<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExport implements FromQuery
{

    use Exportable;

    private $year;

    public function __construct($year)
    {
        $this->year = $year;
    }



    public function query()
    {
        return User::query()->whereYear('created_at', $this->year);
    }
}
