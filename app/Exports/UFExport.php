<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UFExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $ufs;

    public function __construct($ufs)
    {
        $this->ufs = $ufs;
    }

    // public function collection()
    // {
    //     return collect($this->ufs);
    // }

    public function view(): View
    {
        return view('uf.table', [
            'data' => $this->ufs
        ]);
    }
}
