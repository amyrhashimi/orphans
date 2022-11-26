<?php

namespace App\Exports;

use App\Models\School;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class SchoolsExport implements FromCollection , WithHeadings , WithMapping, ShouldAutoSize , WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $school = School::select('id', 'user_id','name','amount' , 'phone', 'address', 'type', 'grade', 'shift', 'login_morning', 'logout_noon', 'login_noon', 'logout_evening')->with('user');
        return $school->get();
//        dd($aa->user->name);
    }

    public function map($school): array
    {
        return [
            $school->id,
            $school->name,
            $school->user !== null ? $school->user->name . ' ' . $school->user->family : '',
            $school->amount,
            $school->phone,
            $school->user !== null ? $school->user->phone : '',
            $school->address,
            $school->type,
            $school->grade,
            $school->shift,
            $school->login_morning,
            $school->logout_noon,
            $school->login_noon,
            $school->logout_evening,
        ];
    }

    public function headings() : array
    {
        return [
            '#',
            'نام مدرسه',
            'نام و نام خوانوادگی مدیر',
            'هزینه',
            'شماره ثابت',
            'شماره همراه مدیر',
            'آدرس مدرسه',
            'جنسیت مدرسه',
            'دوره مدرسه',
            'شیفت مدرسه',
            'ساعت ورود صبح',
            'ساعت خروج صبح',
            'ساعت ورود عصر',
            'ساعت خروج عصر',
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
                $event->sheet->getStyle('A1:N1')

                ->applyFromArray($styleArray);


                $event->sheet->setRightToLeft(true);
            },
        ];
    }
}
