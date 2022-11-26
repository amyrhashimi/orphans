<div>
    <div id="kt_header" class="header">
        <!--begin::Container-->
        <div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                <!--begin::Logo-->
                <a href="{{ route('admin') }}" class="d-flex align-items-center">
                    <img alt="Logo" src="data:image/png;base64,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" class="h-20px" />
                </a>
                <!--end::Logo-->
            </div>
            <!--end::Page title=-->
            <!--begin::Wrapper-->
            <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
                <!--begin::Aside mobile toggle-->
                <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                    <span class="svg-icon svg-icon-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                            <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside mobile toggle-->
                <!--begin::Logo-->
                <a href="{{ route('admin') }}" class="d-flex align-items-center">
                    <img alt="Logo" src="data:image/png;base64,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" class="h-20px" />
                </a>
                <!--end::Logo-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-center flex-shrink-0">
                <!--begin::Chat-->
                <div class="d-flex d-none align-items-center ms-3 ms-lg-4">
                    <!--begin::Drawer wrapper-->
                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline btn-outline-secondary position-relative w-40px h-40px" id="kt_drawer_chat_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black" />
                                <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--begin::Bullet-->
                        <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                        <!--end::Bullet-->
                    </div>
                    <!--end::Drawer wrapper-->
                </div>
                <!--end::Chat-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Container-->
    </div>
</div>
