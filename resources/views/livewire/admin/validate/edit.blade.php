<div>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">ویرایش اعتبارسنجی</h3>

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
