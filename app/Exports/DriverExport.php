<?php

namespace App\Exports;

use App\Models\Driver;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class DriverExport implements FromCollection , WithHeadings , WithMapping , ShouldAutoSize , WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct()
    {

    }

    public function collection()
    {
        $driver = Driver::select('id', 'user_id','type_car', 'color_car', 'model_car', 'shomare_govahiname','bank_meli')->with('user');
        return $driver->get();
    }

    public function map($driver) : array
    {
        return [
            $driver->id,
            $driver->user->name . $driver->user->family ,
            $driver->user->phone ,
            $driver->type_car ,
            $driver->color_car ,
            $driver->model_car ,
            $driver->shomare_govahiname ,
            $driver->bank_meli,
        ];
    }

    public function headings() : array
    {
        return [
            '#',
            'نام و نام خانوادگی',
            'تلفن همراه' ,
            'نوع ماشین' ,
            'رنگ' ,
            'مدل',
            'شماره گواهینامه',
            'شماره حساب',
        ];
    }

    public function registerEvents(): array
    {
        $styleArray = [
            'font' => [
                'bold' => true
            ],
        ];
        return [
            AfterSheet::class =>

            function (AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A1:H1')

                ->applyFromArray($styleArray);


                $event->sheet->setRightToLeft(true);
            },
        ];
    }
}
