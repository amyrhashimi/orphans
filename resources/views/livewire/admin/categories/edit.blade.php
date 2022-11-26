<div>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">ساخت دسته بندی جدید</h3>

                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body">

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>انتخاب ویژگی</span>
                    </label>
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <select class="form-select form-select-solid @error('attribute_id') border-danger @enderror" wire:model="attribute_id">
                            <option disabled>ویژگی خود را انتخاب کنید </option>
                            <option value=""> هیچکدام </option>
                            @foreach ( \App\Models\Attribute::whereEditable(1)->get() as $attr)
                                <option value="{{ $attr->id }}">{{ $attr->value . ' - ' . $attr->name }}</option>
                            @endforeach

                        </select>
                        <div class="fv-plugins-message-container invalid-feedback"></div>

                        @error('attribute_id')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>مقدار</span>
                    </label>
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="text" class="form-control form-control-solid @error('value') border-danger @enderror" wire:model="value">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        @error('value')
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
