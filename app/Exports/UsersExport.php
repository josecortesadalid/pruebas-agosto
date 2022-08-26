<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromQuery, ShouldQueue
{

    use Exportable;

    public function __construct(){}

    public function query()
    {
        // return User::query()->whereYear('created_at', $this->year);
        return User::query();
    }

    public function view(): View
    {
        return view('exports.users', [
            'users' => User::get()
        ]);
    }
}
