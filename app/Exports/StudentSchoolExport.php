<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

// use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

// WithDrawings
class StudentSchoolExport implements FromCollection , WithHeadings , WithMapping, ShouldAutoSize , WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct()
    {

    }

    public function collection()
    {
        $student = Student::select('id', 'name', 'school_id', 'user_id', 'address', 'phone_mother', 'phone_home', 'grade')->with('school' , 'user');

        if (request()->has('school_id') && request()->school_id != "all")
            $student = $student->where('school_id', request('school_id'));


        return $student->get();
    }

    public function map($student): array
    {
        if ($student->grade == 'preschool'){
            $grade = 'پیش دبستانی';
        }else{
            $aa = explode('_',$student->grade);
            $grade = $aa[1];
        }
        if (request()->has('school_id') && request()->school_id != "all"){
            return [
                $student->id,
                $student->school->name,
                $student->name,
                $student->user->family,
                $student->phone_home,
                $student->user->phone,
                $grade,
                $student->address
            ];
        }else{
            return [
                $student->id,
                $student->name,
                $student->user->family,
                $student->phone_home,
                $student->user->phone,
                $grade,
                $student->address
            ];
        }

    }

    public function headings(): array
    {
        if (request()->has('school_id') && request()->school_id != "all"){
            return [
                '#',
                'نام مدرسه',
                'نام',
                'نام خوانوادگی',
                'شماره ثابت',
                'شماره همراه',
                'کلاس',
                'نشانی',
            ];
        }else{
            return [
                '#',
                'نام',
                'نام خوانوادگی',
                'شماره ثابت',
                'شماره همراه',
                'کلاس',
                'نشانی',
            ];
        }

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

    // public function drawings()
    // {
    //     $drawing = new Drawing();
    //     $drawing->setName('Logo');
    //     $drawing->setDescription('This is my logo');
    //     //dd(public_path('/img/logo.jpg'));
    //     $drawing->setPath(public_path('assets/media/logos/logo-1-dark.png'));
    //     $drawing->setHeight(100);
    //     $drawing->setCoordinates('A1');
    //     return $drawing;

    // }
}
