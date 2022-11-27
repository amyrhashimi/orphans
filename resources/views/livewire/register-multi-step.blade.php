<div>

    @if ($current_page_now == 1)
        {{-- Setup 1 --}}
        <!--begin::Input group-->
        <div class="row fv-row mb-7">
            <label class="form-label fw-bolder text-dark fs-6">شماره تلفن</label>
            <input class="form-control form-control-lg form-control-solid" type="text" autocomplete="off" wire:model="phone" />
            @error('phone')
                <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
            @enderror
        </div>
        <!--end::Input group-->

        @if ($code == true)
            <!--begin::Input group-->
            <div class="row fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">کد</label>
                <input class="form-control form-control-lg form-control-solid" type="text" autocomplete="off" wire:model="number" />
                @if(session()->has('code_not_found'))
                    <span class="text-danger mt-2">{{ session()->get('code_not_found') }}</span>
                @endif
            </div>
            <!--end::Input group-->

            <button type="button" class="btn btn-success" wire:click="next()" >شروع به ثبت نام</button>

        @else
            <button type="button" class="btn btn-success" wire:click="sendSms()" >دریافت کد</button>
        @endif
    @endif

    @if ($current_page_now == 2)
    {{-- Setup 2 --}}

    <div class="row fv-row mb-7">
        <!--begin::Col-->
        <div class="col-xl-6">
            <label class="form-label fw-bolder text-dark fs-6">نام مادر</label>
            <input class="form-control form-control-lg form-control-solid" type="text" wire:model.debounce.lazy="name_mother" autocomplete="off"/>
            @error('name_mother')
            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
            @enderror
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            <label class="form-label fw-bolder text-dark fs-6">نام خانوادگی</label>
            <input class="form-control form-control-lg form-control-solid" type="text" wire:model.debounce.lazy="family" autocomplete="off"/>
            @error('family')
            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
            @enderror
        </div>
        <!--end::Col-->
    </div>

    <div class="row fv-row mb-7">
        <div class="col-xl-6">
            <label class="form-label fw-bolder text-dark fs-6">شناسه اختصاصی</label>
            <input class="form-control form-control-lg form-control-solid" type="text" wire:model.debounce.lazy="unique_id_mother" autocomplete="off"/>
            @error('unique_id_mother')
            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
            @enderror
        </div>
        <div class="col-xl-6">
            <label class="form-label fw-bolder text-dark fs-6">کد فراگیر گذرنامه</label>
            <input class="form-control form-control-lg form-control-solid" type="text" wire:model.debounce.lazy="passport_code_mother" autocomplete="off"/>
            @error('passport_code_mother')
            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
            @enderror
        </div>
    </div>

    <div class="row fv-row mb-7">
        <div class="col-xl-6">
            <label class="form-label fw-bolder text-dark fs-6">شماره همراه</label>
            <input class="form-control form-control-lg form-control-solid" disabled type="text" value="{{ $phone }}" autocomplete="off"/>
        </div>
        <div class="col-xl-6">
            <label class="form-label fw-bolder text-dark fs-6">نشان اینترنتی</label>
            <input class="form-control form-control-lg form-control-solid" type="email" wire:model.debounce.lazy="email_mother" autocomplete="off"/>
            @error('email_mother')
            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
            @enderror
        </div>
    </div>


    @foreach ($inputs->chunk(2) as $input)
        <div class="row fv-row mb-7">
            @foreach ($input as $item)
                <div class="col-xl-6">
                    <label class="form-label fw-bolder text-dark fs-6">{{ $item->value }}</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" wire:model.debounce.lazy="{{ $item->name.'_mother' }}" autocomplete="off"/>
                    @error($item->name.'_mother')
                    <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                    @enderror
                </div>
            @endforeach
        </div>
    @endforeach

    @foreach ($selects->chunk(2) as $select)
        <div class="row fv-row mb-7">
            @foreach ($select as $item)
                <div class="col-xl-6">
                    <label class="form-label fw-bolder text-dark fs-6">{{ $item->value }}</label>
                    <select class="form-select form-select-lg form-select-solid" wire:model="{{ $item->name.'_mother' }}">
                        <option disabled>انتخاب کنید</option>
                        <option value="">هیجکدام</option>
                        @foreach ( \App\Models\Category::where('attribute_id', $item->id)->get() as $option)
                            <option value="{{ $option->id }}">{{ $option->value }}</option>
                        @endforeach

                    </select>
                    @error($item->name.'_mother')
                        <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                    @enderror
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="text-end mb-3">
        <input type="file" class="form-control mb-2" wire:model.debounce.lazy="avatar_mother" >
        <span>لطفا عکس خود را بارگزاری کنید.</span>
        @error('avatar_mother')
            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
        @enderror
    </div>

    <div class="row fv-row mb-7">

        <div class="bg-success p-3 rounded text-white text-center mb-3">
            افزودن شماره های بیشتر (اختیاری)
        </div>

        <div class="input-group mb-3" dir="ltr">
            <input type="text" class="form-control" wire:model="phones_mother.0" placeholder="شماره همراه جدید">
            <button class="btn btn-danger" wire:click="remove_phones_mother(0)" type="button">X</button>
        </div>

        @foreach ( $phones_mother as $index => $phone)
            <div class="input-group mb-3" dir="ltr">
                <input type="text" class="form-control" wire:model="phones_mother.{{ $index+1 }}" placeholder="شماره همراه جدید">
                <button class="btn btn-danger" wire:click="remove_phones_mother({{ $index+1 }})" type="button">X</button>
            </div>
        @endforeach

    </div>
    @endif

    @if ($current_page_now == 3)
    {{-- Setup 3 --}}


    @endif

    @if ($current_page_now == 4)
    {{-- Setup 4 --}}


    @endif

    @if ($current_page_now > 1 && $current_page_now <= $current_page)
        <div class="d-flex justify-content-between mt-4">
            @if ($current_page_now == 2 || $current_page_now == 3 )
                <button type="button" wire:click="next()" class="btn btn-success">بعدی</button>
            @endif

            @if ($current_page_now == 3 || $current_page_now == 4 )
                <button type="button" wire:click="before()" class="btn btn-danger"> قبلی </button>
            @endif
        </div>
    @endif
</div>
