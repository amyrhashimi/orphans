<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
<head>
    <title> ایمن سفر قم @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="description" content="شرکت ایمن سفر قم در سال 1388 تاسیس و بعد از اخذ مجوزات لازم اقدام به قرارداد با مدارس مختلف جهت انجام سرویس و ایاب و ذهاب دانش آموزان نموده است. از این رو سالیانه بیش از 4000 هزار دانش در غالب 1000 سرویس تحت مسوولیت شرکت انجام شده است" />
    <meta name="keywords" content="سرویس مدرسه ایمان سفر, سرویس ایمان سفر قم, راننده مدرسه قم,سرویس مدارس قم,سرویس مدرسه" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://imensafarqom.ir" />
    <meta property="og:site_name" content="شرکت سرویس مدارس - ایمان سفر قم" />
    <link rel="canonical" href="http://imensafarqom.ir" />
    <link rel="shortcut icon" href="/assets/media/logos/favicon.ico" />

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

    <!-- Cdn Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('link')

    @livewireStyles
</head>
	<!--begin::Body-->
	<body id="kt_body" class="sidebar-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				@include('livewire.admin.section.sidebar')
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper" style="padding-left: unset !important">

                    @include('livewire.admin.section.navbar')

                    {{  $slot }}

					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column header align-items-center " id="kt_footer" >
                        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <a href="https://alimajidi.com" target="_blank" class="text-gray-800 text-hover-primary">CopyRight © 2022 Aytam. all rights reserved</a>
                            </div>
                            <!--end::Copyright-->
                        </div>
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->

		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--end::Main-->
		<script>var hostUrl = "/assets/";</script>
		<!--begin::Javascript--/>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Glob/al Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
		<!--end::Page/ Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
		<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->

        @yield('script')

        @if(session()->has('warning') OR session()->has('error') OR session()->has('success'))

            @php
                if (session()->has('warning'))
                {
                    $icon = 'warning';
                    $text = session()->get('warning');
                }elseif (session()->has('success'))
                {
                    $icon = 'success';
                    $text = session()->get('success');
                }else
                {
                    $icon = 'error';
                    $text = session()->get('error');
                }
            @endphp
            <script>

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-start',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: '{{ $icon }}',
                    title: '{{ $text }}'
                })

            </script>
        @endif

        @livewireScripts
	</body>
	<!--end::Body-->
</html>

