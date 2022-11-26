<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use App\Models\AttributeUser;
use App\Models\Code;
use App\Models\User;
use Iamfarhad\Validation\Rules\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class RegisterMultiStep extends Component
{
    use WithFileUploads;

    // setup 1
    public $phone;
    public $code = false;
    public $number;
    // setup 2
    public $name_mother;
    public $family;
    public $email_mother;
    public $passport_code_mother;
    public $unique_id_mother;
    public $date_birth_mother;
    public $status;

    public $sahm_mother;
    public $place_birth_mother;
    public $status_mother;
    public $literacy_rate_mother;
    public $health_mother;
    public $skills_mother;
    public $employment_status_mother;
    public $type_employment_mother;
    public $job_mother;
    public $cause_unemployment_mother;
    public $description_mother;
    public $avatar_mother;
    public $inputs;
    public $selects;

    public $phones_mother;
    // setup 3


    // setup 4


    public $current_page = 3;
    public $current_page_now = 2;

    public function mount() {
        $this->inputs = Attribute::whereEditable(0)->where('status', 1)->orWhere(function($query) {
            $query->where('status', null)->whereEditable(0);
        })->where('name', '!=', 'phone' )->where('name', '!=', 'description' )->get();

        $this->selects = Attribute::whereEditable(1)->where('status', 1)->orWhere(function($query) {
            $query->where('status', null)->whereEditable(1);
        })->where('name', '!=', 'phone' )->where('name', '!=', 'description' )->get();

        dd($this->selects);
        $this->phones_mother = collect();
    }

    public function render()
    {
        return view('livewire.register-multi-step');
    }

    public function rules() {
        if( $this->current_page_now == 1 ){
            return [
                'phone' => ['required', new Mobile()]
            ];
        }
        elseif ( $this->current_page_now == 2 ) {
            return [
                'name_mother' => 'required',
                'family' => 'required',
                'email_mother' => 'nullable',
                'unique_id_mother' => 'required|unique:users,unique_id',
                'passport_code_mother' => 'required|unique:users,passport_code',
                'date_birth_mother' => 'required',
                'place_birth_mother' => 'required',
                'status_mother' => 'required', //
                'literacy_rate_mother' => 'required',
                'health_mother' => 'required',
                'sahm_mother' => 'required',
                'skills_mother' => 'required',
                'employment_status_mother' => 'required',
                'type_employment_mother' => 'required',
                'job_mother' => 'required',
                'cause_unemployment_mother' => 'required',
                // 'phones_mother.*' => 'nullable',
                'avatar_mother' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ];
        }
        elseif ( $this->current_page_now == 3 ) {
            return [
                'phone' => ['required', new Mobile()]
            ];
        }
        elseif ( $this->current_page_now == 4 ) {
            return [
                'phone' => ['required', new Mobile()]
            ];
        }
    }

    public function updated($name) {
        return $this->validateOnly($name);
    }

    public function sendSms()
    {
        $this->validate();
        Code::create([
            'phone' => $this->phone,
            'code' => rand(10000, 99999)
        ]);

        $this->code = true;
    }

    public function remove_phones_mother($key)
    {
        // dd( $key );
        $this->phones_mother->forget($key);
        // unset();
    }

    public function next()
    {
        if($this->current_page_now == 1 ){
            $code = Code::wherePhone($this->phone)->whereCode($this->number)->first();

            if ( ! is_null($code) && $code->status == 0) {
                $code->update(['status' => 1]);

                if ( User::wherePhone( $code->phone )->count() ) {
                    $user = User::wherePhone( $code->phone )->first();

                    if( $user->status == 1 ){

                    }elseif ( $user->status == 1 ) {

                    }elseif ( $user->status == 1 ) {

                    }
                }


                $this->current_page_now = 2;
            }

            return session()->put('code_not_found', 'این کد اشتباه هست.');

        }
        elseif ($this->current_page_now == 2) {
            $user = $this->validate();

            dd($user);
            User::create([
                'name' => $this->name_mother,
                'family' => $this->family,
                'unique_id' => $this->unique_id_mother,
                'passport_code' => $this->passport_code_mother,
                'phone' => $this->phone,
            ]);

        }
    }

    public function before()
    {

    }
}
