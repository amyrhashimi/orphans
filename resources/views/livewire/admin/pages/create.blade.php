<div>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">صفحه جدید</h3>

                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body">

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>عنوان</span>
                    </label>
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="text" class="form-control form-control-solid @error('title') border-danger @enderror" wire:model="title">
                        <div class="fv-plugins-message-container invalid-feedback"></div>

                        @error('title')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>ویژگی و مقدار</span>
                    </label>

                    <div class="col-lg-8">
                        <div class="row fv-plugins-icon-container">
                            <div class="col-md-{{ is_null($values) ? '12' : '6' }}">
                                {{-- <input type="text" class="form-control form-control-solid @error('attribute') border-danger @enderror" > --}}
                                <select class="form-select form-select-solid @error('attribute') border-danger @enderror" wire:change="setAttribute($event.target.value)">
                                    <option> ویژگی خود را انتخاب کنید... </option>
                                    @foreach ( \App\Models\Attribute::whereEditable(1)->get() as $attr)
                                        <option value="{{ $attr->id }}"> {{ $attr->value }} </option>
                                    @endforeach
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                @error('attribute')
                                    <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                @enderror
                            </div>
                            @if (! is_null($values))
                                <div class="col-md-6">
                                    {{-- <input type="text" class="form-control form-control-solid @error('value') border-danger @enderror" wire:model="value"> --}}
                                    <select class="form-select form-select-solid @error('value') border-danger @enderror" wire:model="value">
                                        <option > مقدار خود را انتخاب کنید... </option>
                                        @foreach ( $values as $value)
                                            <option value="{{ $value->id }}"> {{ $value->value }} </option>
                                        @endforeach
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    @error('value')
                                        <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                                    @enderror
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>توضیحات (اختیاری)</span>
                    </label>
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        {{-- <input type="text" class="form-control form-control-solid @error('title') border-danger @enderror" wire:model="title"> --}}

                        <textarea class="form-control form-control-solid @error('desc') border-danger @enderror" wire:model="desc"></textarea>
                        <div class="fv-plugins-message-container invalid-feedback"></div>

                        @error('desc')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>مقادیر که باید نمایش داده شود</span>
                    </label>
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">

                        <select class="form-select form-select-solid @error('selects') border-danger @enderror" multiple wire:model="selects">
                            @foreach ( \App\Models\Attribute::whereStatus(3)->get() as $attr)
                                <option value="{{ $attr->id }}"> {{ $attr->value }} </option>
                            @endforeach
                        </select>
                        <div class="fv-plugins-message-container invalid-feedback"></div>

                        @error('selects')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                        @enderror
                    </div>
                </div>

                <a href="#" wire:click.prevent="save()" class="btn btn-sm btn-primary btn-hover-rotate-end">ذخیره</a>
                <a href="#" wire:click.prevent="comeBack()" class="btn btn-sm btn-active-light-danger btn-hover-rotate-end">انصراف</a>

            </div>
        </div>
    </div>
</div>
