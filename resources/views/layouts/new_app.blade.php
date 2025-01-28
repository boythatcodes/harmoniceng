<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harmonic Group</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.13/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">
    <div id="root">
        <div class="drawer  md:drawer-open"><input id="left-sidebar-drawer" type="checkbox" class="drawer-toggle">
            <div class="drawer-content flex flex-col ">
                <div class="navbar sticky top-0 bg-base-100  z-10 shadow-md ">
                    <div class="flex-1"><label for="left-sidebar-drawer"
                            class="btn btn-primary drawer-button md:hidden"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true" class="h-5 inline-block w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                            </svg></label>
                        <h1 class="text-2xl font-semibold ml-2 capitalize">{{$header_info}}</h1>
                    </div>
                    <div class="flex-none ">
                        <button class="btn btn-circle pb-1 cursor-pointer tooltip  tooltip-bottom" style="padding-left: 11px;" data-tip="Toggle Dark Mode" onclick="toggle_theme()">
                            <!-- this hidden checkbox controls the state -->

                            <svg class="w-6 h-6 fill-current hidden" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" id="moon">
                                <path
                                    d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                            </svg>
                            <!-- sun icon -->
                            <svg class="w-6 h-6 fill-current hidden" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" id="sun">
                                <path
                                    d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                            </svg>

                            <!-- moon icon -->

                        </button>
                       <button class="btn ml-4  btn-circle tooltip  tooltip-bottom" data-tip="No New Notification">
                            <div class="indicator"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                    class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0">
                                    </path>
                                </svg><span class="indicator-item badge badge-secondary badge-sm">0</span></div>
                        </button>
                        <div class="dropdown dropdown-end ml-4"><label tabindex="0"
                                class="btn btn-ghost btn-circle avatar">
                                <div class="avatar online">
                                    <div class="w-10 rounded-full">
                                        <img src="https://ui-avatars.com/api/?name=Sairash+Gautam" />
                                    </div>
                                </div>

                            </label>
                            <ul tabindex="0"
                                class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-300 rounded-box w-52">

                                <li><a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <main class="flex-1 overflow-y-auto md:pt-4 pt-4 px-6  bg-base-200">
                    <div class="card w-full p-6 bg-base-100 shadow-xl mt-2">
                        <div class="text-xl font-semibold inline-block">{{$active}}
                            <div
                                class="inline-block float-right">
                                <div class="inline-block float-right"><button
                                        class="btn px-6 btn-sm normal-case btn-primary" onclick="{{$button[1]}}()">{{$button[0]}}</button></div>
                            </div>
                        </div>
                        <div class="divider mt-2"></div>
                        <div class="h-full w-full pb-6 bg-base-100">
                            @yield("content")
                        </div>
                    </div>
                    <div class="h-16"></div>
                </main>
            </div>
            <div class="drawer-side  z-30  "><label for="left-sidebar-drawer" class="drawer-overlay"></label>
                <ul class="menu  pt-2 w-80 bg-base-100 min-h-full   text-base-content">
                    <li class="mb-2 font-semibold text-xl "><a href="/"><img class="mask mask-squircle w-10"
                                src="/harmonic_eng.png" alt="Harmonic Logo">Harmonic Eng</a> </li>
                    <li class=""><a class="@if($header_info == 'dashboard') font-semibold bg-base-200 @else font-normal @endif"  href="/home"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"></path>
                            </svg> Dashboard @if($header_info == 'dashboard')<span
                                class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary "
                                aria-hidden="true"></span> @endif</a></li>
                    <div class="divider mt-2"></div>

                    <li class=""><a class="@if($header_info == 'projects') font-semibold bg-base-200 @else font-normal @endif" href="/projects"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true" class="h-6 w-6 inline">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75">
                                </path>
                            </svg> Projects @if($header_info == 'projects')<span
                                class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary "
                                aria-hidden="true"></span> @endif</a></li>
                    <li class=""><a class="@if($header_info == 'services') font-semibold bg-base-200 @else font-normal @endif" href="/services"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true" class="h-6 w-6 inline">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 17.25v-.228a4.5 4.5 0 0 0-.12-1.03l-2.268-9.64a3.375 3.375 0 0 0-3.285-2.602H7.923a3.375 3.375 0 0 0-3.285 2.602l-2.268 9.64a4.5 4.5 0 0 0-.12 1.03v.228m19.5 0a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3m19.5 0a3 3 0 0 0-3-3H5.25a3 3 0 0 0-3 3m16.5 0h.008v.008h-.008v-.008Zm-3 0h.008v.008h-.008v-.008Z" />
                            </svg> Services @if($header_info == 'services')<span
                                class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary "
                                aria-hidden="true"></span> @endif</a></li>
                    <li class=""><a class="@if($header_info == 'users') font-semibold bg-base-200 @else font-normal @endif" href="/users" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z">
                                </path>
                            </svg> Users @if($header_info == 'users')<span
                                class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary "
                                aria-hidden="true"></span> @endif</a></li>

                            <li class=""><a class="@if($header_info == 'popup') font-semibold bg-base-200 @else font-normal @endif" href="/popup" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg> Popup @if($header_info == 'popup')<span
                                class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary "
                                aria-hidden="true"></span> @endif</a>
                            </li>

                    <li class=""><a class="@if($header_info == 'inqueries') font-semibold bg-base-200 @else font-normal @endif" href="/inqueries" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg> Inqueries @if($header_info == 'inqueries')<span
                            class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary "
                            aria-hidden="true"></span> @endif</a></li>

                </ul>
            </div>
        </div>

        
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</body>
<script>
    const htmlElement = document.documentElement;


    function setTheme(theme) {
        if (theme == "light") {
            document.getElementById("moon").classList.remove("hidden")
            document.getElementById("sun").classList.add("hidden")

        } else {
            document.getElementById("moon").classList.add("hidden")
            document.getElementById("sun").classList.remove("hidden")
        }
        htmlElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme); // Save theme to localStorage
    }

    // Check for a saved theme in localStorage
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {

        setTheme(savedTheme); // Apply saved theme on load
    } else {
        setTheme('dark'); // Default to light theme if nothing is saved
    }

    function toggle_theme() {
        const currentTheme = htmlElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        setTheme(newTheme); // Toggle and save the new theme
    }

</script>

</html>