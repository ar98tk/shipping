<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'admin')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'admin')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'admin')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'admin')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
            <br>
        @if(auth('admin')->user()->type == 'admin')
        <ul class="side-menu">

            <li class="side-item side-item-category">القوائم الرئيسية</li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg><span class="side-menu__label">الاحصائيات</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/admins')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M21.881,5.223c-0.015-0.378-0.421-0.603-0.747-0.412c-0.672,0.392-1.718,0.898-2.643,0.898 c-0.421,0-0.849-0.064-1.289-0.198c-0.265-0.08-0.532-0.178-0.808-0.309c-1.338-0.639-2.567-1.767-3.696-2.889 C12.506,2.122,12.253,2.027,12,2.023c-0.253,0.004-0.506,0.099-0.698,0.29c-1.129,1.122-2.358,2.25-3.696,2.889c0,0,0,0-0.001,0 C7.33,5.333,7.063,5.431,6.798,5.511c-0.44,0.134-0.869,0.198-1.289,0.198c-0.925,0-1.971-0.507-2.643-0.898 C2.54,4.62,2.134,4.845,2.119,5.223c-0.061,1.538-0.077,4.84,0.688,7.444c1.399,4.763,4.48,7.976,8.91,9.292L11.857,22l0.14-0.014 V22v-0.014H12L12.143,22l0.14-0.041c4.43-1.316,7.511-4.529,8.91-9.292C21.958,10.063,21.941,6.761,21.881,5.223z"/>
                    </svg><span class="side-menu__label">المدراء</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/companies')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M21,7h-6c-0.553,0-1,0.447-1,1v3h-2V4c0-0.553-0.447-1-1-1H3C2.447,3,2,3.447,2,4v16c0,0.553,0.447,1,1,1h7h1h4h1h5 c0.553,0,1-0.447,1-1V8C22,7.447,21.553,7,21,7z M8,6h2v2H8V6z M6,16H4v-2h2V16z M6,12H4v-2h2V12z M6,8H4V6h2V8z M10,16H8v-2h2V16z M10,12H8v-2h2v1V12z M19,16h-2v-2h2V16z M19,12h-2v-2h2V12z"/>
                    </svg><span class="side-menu__label">الشركات</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/drivers')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M20.772,10.155l-1.368-4.104C18.995,4.824,17.852,4,16.559,4H14V2h-4v2H7.441C6.148,4,5.005,4.824,4.596,6.051 l-1.368,4.104C2.507,10.457,2,11.169,2,12v5c0,0.738,0.404,1.376,1,1.723v1.174V21c0,0.553,0.447,1,1,1h1c0.553,0,1-0.447,1-1v-2 h12v2c0,0.553,0.447,1,1,1h1c0.553,0,1-0.447,1-1v-2.277c0.596-0.347,1-0.984,1-1.723v-5C22,11.169,21.493,10.457,20.772,10.155z M7.441,6h9.117c0.431,0,0.813,0.274,0.949,0.684L18.613,10h-0.794H6.181H5.387l1.105-3.316C6.629,6.274,7.011,6,7.441,6z M5.5,16 C4.672,16,4,15.328,4,14.5S4.672,13,5.5,13S7,13.672,7,14.5S6.328,16,5.5,16z M18.5,16c-0.828,0-1.5-0.672-1.5-1.5 s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S19.328,16,18.5,16z"/>
                    </svg><span class="side-menu__label">السائقين</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/users')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M21,2H6C4.896,2,4,2.896,4,4v3H2v2h2v2H2v2h2v2H2v2h2v3c0,1.104,0.896,2,2,2h15c0.553,0,1-0.447,1-1V3 C22,2.447,21.553,2,21,2z M13,4.999c1.648,0,3,1.351,3,3C16,9.647,14.648,11,13,11c-1.647,0-3-1.353-3-3.001 C10,6.35,11.353,4.999,13,4.999z M19,18H7v-0.75c0-2.219,2.705-4.5,6-4.5s6,2.281,6,4.5V18z"/>
                    </svg><span class="side-menu__label">الاشتراكات</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/orders')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">الطلبات</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/financials')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M13,16.915V18h-2v-1.08 C8.661,16.553,8,14.918,8,14h2c0.011,0.143,0.159,1,2,1c1.38,0,2-0.585,2-1c0-0.324,0-1-2-1c-3.48,0-4-1.88-4-3 c0-1.288,1.029-2.584,3-2.915V6.012h2v1.109c1.734,0.41,2.4,1.853,2.4,2.879h-1l-1,0.018C13.386,9.638,13.185,9,12,9 c-1.299,0-2,0.516-2,1c0,0.374,0,1,2,1c3.48,0,4,1.88,4,3C16,15.288,14.971,16.584,13,16.915z"/>
                    </svg><span class="side-menu__label">المالية</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/payments')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M15 11H22V13H15zM16 15H22V17H16zM14 7H22V9H14zM4 19h8 1 1v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h1H4zM8 12c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5 4.5 6.505 4.5 8.5 6.005 12 8 12z"/>
                    </svg><span class="side-menu__label"> طلبات دفع الفواتير  </span>
                    @if(\App\Models\OfflinePayment::where('admin_approve','=',null)->count() > 0)
                    <button style="font-size: 15px" class="btn btn-sm btn-danger">
                        {{ \App\Models\OfflinePayment::where('admin_approve','=',null)->count() }}
                    </button>
                    @endif
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/discounts')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M20.749,12l1.104-1.908c0.276-0.479,0.112-1.09-0.365-1.366l-1.91-1.104V5.422c0-0.553-0.447-1-1-1h-2.199l-1.103-1.909 c-0.133-0.229-0.352-0.397-0.607-0.466c-0.256-0.07-0.529-0.033-0.759,0.1l-1.91,1.104L10.09,2.146C9.611,1.869,9,2.034,8.724,2.512 L7.62,4.422H5.421c-0.553,0-1,0.447-1,1v2.199l-1.91,1.104C2.281,8.858,2.114,9.077,2.046,9.333 C1.978,9.59,2.014,9.862,2.146,10.092L3.25,12l-1.104,1.908c-0.133,0.23-0.169,0.503-0.101,0.76 c0.068,0.256,0.235,0.475,0.465,0.607l1.91,1.104v2.199c0,0.553,0.447,1,1,1H7.62l1.104,1.91c0.133,0.229,0.352,0.396,0.608,0.466 c0.085,0.022,0.171,0.034,0.258,0.034c0.174,0,0.347-0.046,0.501-0.135l1.908-1.104l1.91,1.104c0.229,0.133,0.503,0.168,0.759,0.1 s0.475-0.235,0.607-0.465l1.103-1.91h2.199c0.553,0,1-0.447,1-1v-2.199l1.91-1.104c0.478-0.277,0.642-0.889,0.365-1.367L20.749,12z M9.499,6.99c0.828,0,1.5,0.672,1.5,1.5s-0.672,1.5-1.5,1.5s-1.5-0.672-1.5-1.5S8.671,6.99,9.499,6.99z M9.799,16.59l-1.6-1.199l6-8 l1.6,1.199L9.799,16.59z M14.499,16.99c-0.828,0-1.5-0.672-1.5-1.5s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S15.327,16.99,14.499,16.99z"/>
                    </svg><span class="side-menu__label">الخصومات</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/trucks')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M19.148,7.971C18.789,7.372,18.132,7,17.434,7H15V5c0-0.553-0.447-1-1-1H4C2.897,4,2,4.897,2,6v10 c0,0.746,0.416,1.391,1.023,1.734C3.146,19.553,4.65,21,6.5,21c1.759,0,3.204-1.309,3.449-3h3.102c0.245,1.691,1.69,3,3.449,3 s3.204-1.309,3.449-3H20c1.103,0,2-0.897,2-2v-3c0-0.182-0.049-0.359-0.143-0.515L19.148,7.971z M15,9h2.434l1.8,3H15V9z M6.5,19 C5.673,19,5,18.327,5,17.5S5.673,16,6.5,16S8,16.673,8,17.5S7.327,19,6.5,19z M16.5,19c-0.827,0-1.5-0.673-1.5-1.5 s0.673-1.5,1.5-1.5s1.5,0.673,1.5,1.5S17.327,19,16.5,19z"/>
                    </svg><span class="side-menu__label">الشاحنات</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/phones')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M13 8c2.103 0 3 .897 3 3h2c0-3.225-1.775-5-5-5V8zM16.422 13.443c-.399-.363-1.015-.344-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394c.388-.376.406-.991.043-1.391L6.859 3.513c-.363-.401-.98-.439-1.391-.087l-2.17 1.861C3.125 5.461 3.022 5.691 3.008 5.936c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008.245-.014.475-.117.648-.291l1.86-2.171c.353-.411.313-1.027-.086-1.391L16.422 13.443z"/>
                    </svg><span class="side-menu__label">تليفونات الشركة</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/emails')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M20,2H4C2.897,2,2,2.894,2,3.992v12.016C2,17.106,2.897,18,4,18h3v4l6.351-4H20c1.103,0,2-0.894,2-1.992V3.992 C22,2.894,21.103,2,20,2z M14,13H7v-2h7V13z M17,9H7V7h10V9z"/>
                    </svg><span class="side-menu__label">ايميلات الشركة</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/contacts_types')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M12,2C6.486,2,2,5.589,2,10c0,2.907,1.897,5.515,5,6.934V22l5.34-4.005C17.697,17.853,22,14.32,22,10 C22,5.589,17.514,2,12,2z M11,14.414l-3.707-3.707l1.414-1.414L11,11.586l4.793-4.793l1.414,1.414L11,14.414z"/>
                    </svg><span class="side-menu__label">أنواع الرسائل</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/goods')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M21.999,8c0-0.181-0.049-0.359-0.143-0.515L19.147,2.97C18.788,2.372,18.131,2,17.433,2H6.565 C5.867,2,5.21,2.372,4.851,2.971L2.142,7.485C2.048,7.641,1.999,7.819,1.999,8c0,1.005,0.386,1.914,1,2.618V11v2v7 c0,0.553,0.447,1,1,1h8c0.553,0,1-0.447,1-1v-5h4v5c0,0.553,0.447,1,1,1h2c0.553,0,1-0.447,1-1v-7v-2v-0.382 C21.613,9.914,21.999,9.005,21.999,8z M19.983,8.251C19.859,9.236,19.017,10,17.999,10c-1.103,0-2-0.897-2-2 c0-0.068-0.025-0.128-0.039-0.192l0.02-0.004L15.219,4h2.214L19.983,8.251z M10.006,8.065L10.818,4h2.361l0.813,4.065 C13.957,9.138,13.079,10,11.999,10S10.041,9.138,10.006,8.065z M6.565,4h2.214L8.019,7.804l0.02,0.004 C8.024,7.872,7.999,7.932,7.999,8c0,1.103-0.897,2-2,2c-1.018,0-1.86-0.764-1.984-1.749L6.565,4z M9.999,16h-4v-3h4V16z"/>
                    </svg><span class="side-menu__label">البضائع</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/prices')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M20 6c0-2.168-3.663-4-8-4S4 3.832 4 6v2c0 2.168 3.663 4 8 4s8-1.832 8-4V6zM12 19c-4.337 0-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3C20 17.168 16.337 19 12 19z"/>
                    </svg><span class="side-menu__label">الاسعار</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/bank_accounts')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path xmlns="http://www.w3.org/2000/svg" d="M3,5v14c0,1.104,0.896,2,2,2h14c1.104,0,2-0.896,2-2V5c0-1.104-0.896-2-2-2H5C3.896,3,3,3.896,3,5z M10,7h8v2h-8V7z M10,11 h8v2h-8V11z M10,15h8v2h-8V15z M6,7h2v2H6V7z M6,11h2v2H6V11z M6,15h2v2H6V15z"/>
                    </svg><span class="side-menu__label">الحسابات البنكية</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/contacts/users')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"></path></svg>
                    <span class="side-menu__label">الرسائل ( مستخدمين )</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'admin/contacts/drivers')) }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"></path></svg>
                    <span class="side-menu__label">الرسائل ( سائقين )</span></a>
            </li>
            <br><br>
        </ul>
        @elseif(auth('admin')->user()->type == 'company')
            <ul class="side-menu">

                <li class="side-item side-item-category">القوائم الرئيسية</li>

                <li class="slide">
                    <a class="side-menu__item" href="{{ url('/' . ($page = 'company')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path
                                d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg><span class="side-menu__label">الاحصائيات</span></a>
                </li>


                <li class="slide">
                    <a class="side-menu__item" href="{{ url('/' . ($page = 'company/drivers')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path xmlns="http://www.w3.org/2000/svg" d="M20.772,10.155l-1.368-4.104C18.995,4.824,17.852,4,16.559,4H14V2h-4v2H7.441C6.148,4,5.005,4.824,4.596,6.051 l-1.368,4.104C2.507,10.457,2,11.169,2,12v5c0,0.738,0.404,1.376,1,1.723v1.174V21c0,0.553,0.447,1,1,1h1c0.553,0,1-0.447,1-1v-2 h12v2c0,0.553,0.447,1,1,1h1c0.553,0,1-0.447,1-1v-2.277c0.596-0.347,1-0.984,1-1.723v-5C22,11.169,21.493,10.457,20.772,10.155z M7.441,6h9.117c0.431,0,0.813,0.274,0.949,0.684L18.613,10h-0.794H6.181H5.387l1.105-3.316C6.629,6.274,7.011,6,7.441,6z M5.5,16 C4.672,16,4,15.328,4,14.5S4.672,13,5.5,13S7,13.672,7,14.5S6.328,16,5.5,16z M18.5,16c-0.828,0-1.5-0.672-1.5-1.5 s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S19.328,16,18.5,16z"/>
                        </svg><span class="side-menu__label">السائقين</span></a>
                </li>



                <li class="slide">
                    <a class="side-menu__item" href="{{ url('/' . ($page = 'company/orders')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label">الطلبات</span></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item" href="{{ url('/' . ($page = 'company/financials')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path xmlns="http://www.w3.org/2000/svg" d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M13,16.915V18h-2v-1.08 C8.661,16.553,8,14.918,8,14h2c0.011,0.143,0.159,1,2,1c1.38,0,2-0.585,2-1c0-0.324,0-1-2-1c-3.48,0-4-1.88-4-3 c0-1.288,1.029-2.584,3-2.915V6.012h2v1.109c1.734,0.41,2.4,1.853,2.4,2.879h-1l-1,0.018C13.386,9.638,13.185,9,12,9 c-1.299,0-2,0.516-2,1c0,0.374,0,1,2,1c3.48,0,4,1.88,4,3C16,15.288,14.971,16.584,13,16.915z"/>
                        </svg><span class="side-menu__label">المالية</span></a>
                </li>

                <br><br>
            </ul>
        @endif
    </div>
</aside>
<!-- main-sidebar -->
