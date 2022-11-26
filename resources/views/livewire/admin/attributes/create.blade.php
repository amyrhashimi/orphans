<div>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">ساخت ویژگی جدید</h3>

                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body">

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>عنوان (انگلیسی وارد شود)</span>
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
                        <span>متن فارسی</span>
                    </label>
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="text" class="form-control form-control-solid @error('persian') border-danger @enderror" wire:model="persian">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        @error('persian')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>قابلیت ویرایش</span>
                    </label>
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <select class="form-select form-select-solid @error('editable') border-danger @enderror"  wire:model="editable">
                            <option disabled>انتخاب کنید</option>
                            <option value="">هیچکدام</option>
                            <option value="1">دارد</option>
                            <option value="0">ندارد</option>
                        </select>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        @error('editable')
                            <div class="fv-plugins-message-container invalid-feedback"><div data-field="first-name" data-validator="notEmpty">{{ $message }}</div></div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>برای</span>
                    </label>
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <select class="form-select form-select-solid @error('status') border-danger @enderror"  wire:model="status">
                            <option disabled>انتخاب کنید</option>
                            <option value="">هردو</option>
                            <option value="1">والدین</option>
                            <option value="0">فرزندان</option>
                        </select>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        @error('status')
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
