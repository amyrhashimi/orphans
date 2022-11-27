<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Attribute ;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'family' => 'admin',
            'unique_id' => 11,
            'passport_code' => 123465,
            'status' => 1,
            'phone' => '09123456789',
            'email' => 'admin@gmail.com',
            'isAdmin' => 1,
            'password' => Hash::make('Power@110#') ,
        ]);

        Attribute::factory()->create([
            'name' => 'name_father',
            'value' => 'نام پدر',
            'editable' => 0,
            'status' => 0,
        ]);

        Attribute::factory()->create([
            'name' => 'status',
            'value' => 'تاهل',
            'editable' => 1,
            'status' => 1,
        ]);

        Attribute::factory()->create([
            'name' => 'date_birth',
            'value' => 'تاریخ تولد',
            'editable' => 0,
            'status' => null,
        ]);

        // محل تولد
        Attribute::factory()->create([
            'name' => 'place_birth',
            'value' => 'محل تولد',
            'editable' => 1,
            'status' => null,
        ]);

        // سهم
        Attribute::factory()->create([
            'name' => 'sahm',
            'value' => 'سهم',
            'editable' => 1,
            'status' => 1,
        ]);

        // میزان سواد
        Attribute::factory()->create([
            'name' => 'literacy_rate',
            'value' => 'میزان سواد',
            'editable' => 1,
            'status' => null,
        ]);

        // وضع تحصیلی
        Attribute::factory()->create([
            'name' => 'educational_status',
            'value' => 'وضع تحصیلی',
            'editable' => 1,
            'status' => 0,
        ]);

        // سلامتی
        Attribute::factory()->create([
            'name' => 'health',
            'value' => 'سلامتی',
            'editable' => 1,
            'status' => null,
        ]);

        // مهارت های فرهنگی هنری
        Attribute::factory()->create([
            'name' => 'skills',
            'value' => 'مهارت های فرهنگی هنری',
            'editable' => 1,
            'status' => 0,
        ]);

        // وضعیت اشتغال
        Attribute::factory()->create([
            'name' => 'employment_status',
            'value' => 'وضعیت اشتغال',
            'editable' => 1,
            'status' => 0,
        ]);

        // نوع اشتغال
        Attribute::factory()->create([
            'name' => 'type_employment',
            'value' => 'نوع اشتغال',
            'editable' => 1,
            'status' => 0,
        ]);

        // شغل
        Attribute::factory()->create([
            'name' => 'job',
            'value' => 'شغل',
            'editable' => 1,
            'status' => 0,
        ]);

        // علت بیکاری
        Attribute::factory()->create([
            'name' => 'cause_unemployment',
            'value' => 'علت بیکاری',
            'editable' => 1,
            'status' => 0,
        ]);

        Attribute::factory()->create([
            'name' => 'description',
            'value' => 'توضیحات',
            'editable' => 0,
            'status' => 0,
        ]);

        Attribute::factory()->create([
            'name' => 'phone',
            'value' => 'تلفن همراه',
            'editable' => 0,
            'status' => null,
        ]);

        // for status mother
        Category::create([
            'attribute_id' => 2,
            'value' => 'فاقد همسر (فوت)'
        ]);
        Category::create([
            'attribute_id' => 2,
            'value' => ' ازدواج نکرده'
        ]);
        Category::create([
            'attribute_id' => 2,
            'value' => 'همسر گم شده'
        ]);


        Category::create([
            'attribute_id' => 6,
            'value' => 'دارد'
        ]);
        Category::create([
            'attribute_id' => 6,
            'value' => 'ندارد'
        ]);

        Category::create([
            'attribute_id' => 5,
            'value' => 'سادات'
        ]);
        Category::create([
            'attribute_id' => 5,
            'value' => 'غیر سادات'
        ]);

        Category::create([
            'attribute_id' => 4,
            'value' => 'بلخاب'
        ]);

        Category::create([
            'attribute_id' => 7,
            'value' => 'با سواد'
        ]);
        Category::create([
            'attribute_id' => 7,
            'value' => 'بی سواد'
        ]);

        Category::create([
            'attribute_id' => 8,
            'value' => 'سالم'
        ]);
        Category::create([
            'attribute_id' => 8,
            'value' => 'ناسالم'
        ]);

        Category::create([
            'attribute_id' => 9,
            'value' => 'دارد'
        ]);
        Category::create([
            'attribute_id' => 9,
            'value' => 'ندارد'
        ]);

        Category::create([
            'attribute_id' => 10,
            'value' => 'شاغل'
        ]);
        Category::create([
            'attribute_id' => 10,
            'value' => 'بیکار'
        ]);

        Category::create([
            'attribute_id' => 10,
            'value' => 'کارگر'
        ]);
        Category::create([
            'attribute_id' => 10,
            'value' => 'کاسب'
        ]);

        Category::create([
            'attribute_id' => 13,
            'value' => 'مریضی'
        ]);
        Category::create([
            'attribute_id' => 13,
            'value' => 'عدم توانایی کار'
        ]);


        // For Validation
        \App\Models\Validation::factory()->create([
            'title' => 'اجباری',
            'value' => 'required',
        ]);
        \App\Models\Validation::factory()->create([
            'title' => 'اختیاری',
            'value' => 'nullable',
        ]);
        \App\Models\Validation::factory()->create([
            'title' => 'طول 11 کاراکتر',
            'value' => 'between:10,12',
        ]);
        \App\Models\Validation::factory()->create([
            'title' => 'عددی',
            'value' => 'int',
        ]);
        \App\Models\Validation::factory()->create([
            'title' => 'یکتا بودن unique_id',
            'value' => 'unique:users,unique_id',
        ]);
        \App\Models\Validation::factory()->create([
            'title' => 'یکتا بودن phone',
            'value' => 'unique:users,phone',
        ]);
        \App\Models\Validation::factory()->create([
            'title' => 'یکتا بودن passport_code',
            'value' => 'unique:users,passport_code',
        ]);
        \App\Models\Validation::factory()->create([
            'title' => 'ایمیل',
            'value' => 'email',
        ]);
        \App\Models\Validation::factory()->create([
            'title' => 'عکس',
            'value' => 'file|mimes:jpg,jpeg,png',
        ]);
        \App\Models\Validation::factory()->create([
            'title' => 'بیشترین حجم',
            'value' => 'max:1024',
        ]);
    }
}
