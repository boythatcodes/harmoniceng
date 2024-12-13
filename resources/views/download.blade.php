@extends('layouts.main_page')

@section('content')
<link rel="stylesheet" id="siteground-optimizer-combined-css-07ef100e8c9f8537cc3e26b2c8577d05"
    href="/wp-content/uploads/siteground-optimizer-assets/siteground-optimizer-combined-css-07ef100e8c9f8537cc3e26b2c8577d05.css"
    media="all" />
<link rel="preload"
    href="/wp-content/uploads/siteground-optimizer-assets/siteground-optimizer-combined-css-07ef100e8c9f8537cc3e26b2c8577d05.css"
    as="style">
<main id="cms-main" class="cms-main is-elementor">
    <div data-elementor-type="wp-page" data-elementor-id="27" class="elementor elementor-27">
        <div class="elementor-element elementor-element-7d6cdc6 e-con-full-no-space e-flex cms-econ-boxed-no cms-econ-no-space-no elementor-invisible e-con e-parent"
            data-id="7d6cdc6" data-element_type="container"
            data-settings="{&quot;content_width&quot;:&quot;full-no-space&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;}">
            <div class="elementor-element elementor-element-664918f cms-eptitle-overlay-1 elementor-widget elementor-widget-cms_page_title"
                data-id="664918f" data-element_type="widget" data-widget_type="cms_page_title.default">
                <div class="elementor-widget-container">
                    <div class="cms-eptitle-overlay cms-overlay cms-bg-cover cms-lazy"
                        style="--cms-bg-lazyload:url(/harmonic/place.jpeg);background-image:var(--cms-bg-lazyload-loaded);">
                    </div>
                    <div class="cms-eptitle cms-eptitle-4 relative z-top text-center">
                        <div class="cms-content container p-tb-150 p-tb-tablet-60">
                            <div class="cms-small-title font-500 mt-n7 pb-25 text-white empty-none"></div>
                            <h1
                                class="cms-title cms-nl2br lh-108 mt-n10 text-75 text-tablet-50 text-smobile-40 text-white empty-none">
                                Rate Analysis</h1>
                            <ul
                                class="cms-breadcrumb unstyled text-white text-hover-white justify-content-center pt-20">
                                <li><a class="breadcrumb-entry cms-hover-underline text-white text-hover-white"
                                        href="/">Home<span class="breadcrumb-separate text-6 lh-0"><svg
                                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 32">
                                                <path
                                                    d="M17.842 17.061l-12.146 12.146c-0.586 0.586-1.536 0.586-2.121 0l-1.417-1.417c-0.585-0.585-0.586-1.533-0.002-2.119l9.626-9.672-9.626-9.672c-0.583-0.586-0.582-1.534 0.002-2.119l1.417-1.417c0.586-0.586 1.536-0.586 2.121 0l12.146 12.146c0.586 0.586 0.586 1.536 0 2.121z">
                                                </path>
                                            </svg> </span></a></li>
                                <li><span class="breadcrumb-entry">Download</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-0bb4d33 p-tb-110 p-tb-tablet-60 e-flex e-con-boxed cms-econ-boxed-no cms-econ-no-space-no e-con e-parent"
            data-id="0bb4d33" data-element_type="container"

            data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-488014d elementor-invisible elementor-widget elementor-widget-cms_case_grid padding_auto"
                    data-id="488014d" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                    data-widget_type="cms_case_grid.default">
                    <div class="elementor-widget-container">
                        <div id="cms_case_grid-488014d" class="cms-post-grid cms-grid cms-grid-9" data-layout="grid">

                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-6a6a6aa elementor-widget elementor-widget-cms_blog_grid"
                                    data-id="6a6a6aa" data-element_type="widget" data-widget_type="cms_blog_grid.default">
                                    <div class="elementor-widget-container">
                                        <div id="cms_blog_grid-6a6a6aa" class="cms-post-grid cms-grid cms-grid-1" data-layout="grid">
                                            <div
                                                class="cms-grid-content">

                                                <form method="get" action="/download" style="margin-bottom: 50px; display: flex;">
                                                    <input type="text" name="s" placeholder="Search File" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;">
                                                    <button style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">Search</button>
                                                </form>

                                                <div class="" style="width: 100%;">
                                                    <table style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Project Name</th>
                                                                <th>File Name</th>
                                                                <th>Info</th>
                                                                <th>Status</th>
                                                                <th style="text-align: center;">Download</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($files as $file)
                                                            <tr>
                                                                <td>
                                                                    {{$file["title"]}}
                                                                </td>
                                                                <td>{{$file["file_name"]}}</td>
                                                                <td>
                                                                    <div><b>Client: </b> {{$file["client"]}}</div>
                                                                    <div><b>Submited: </b> {{$file["submission_date"]}}</div>
                                                                    <div><b>Type: </b> {{$file["type_of_service"]}}</div>
                                                                    <div><b>SoilTest: </b> {{$file["soil_test"] == 1? "Yes": "No"}}</div>
                                                                    <div><b>Location: </b> {{$file["location"]}}</div>
                                                                </td>
                                                                <td>{{$file["status"]}}</td>
                                                                <td style="text-align: center;">
                                                                    @if($file["status"] == "free")
                                                                        <a
                                                                            href="{{$file['link']}}"
                                                                            download="{{$file['link']}}"
                                                                            class="cms-readmore cms-readmore-1 cms-hover-move-icon-up"> <span
                                                                                class="cms-readmore--1 d-flex gap-10 align-items-center pr-10">
                                                                                <span class="text relative z-top">Free Download</span> 
                                                                                <svg xmlns="http://www.w3.org/2000/svg" style="height: 30px; width: 30px;" viewBox="0 0 24 24" fill="none">
                                                                                    <path d="M12 6.25C12.4142 6.25 12.75 6.58579 12.75 7V12.1893L14.4697 10.4697C14.7626 10.1768 15.2374 10.1768 15.5303 10.4697C15.8232 10.7626 15.8232 11.2374 15.5303 11.5303L12.5303 14.5303C12.3897 14.671 12.1989 14.75 12 14.75C11.8011 14.75 11.6103 14.671 11.4697 14.5303L8.46967 11.5303C8.17678 11.2374 8.17678 10.7626 8.46967 10.4697C8.76256 10.1768 9.23744 10.1768 9.53033 10.4697L11.25 12.1893V7C11.25 6.58579 11.5858 6.25 12 6.25Z"/>
                                                                                    <path d="M7.25 17C7.25 16.5858 7.58579 16.25 8 16.25H16C16.4142 16.25 16.75 16.5858 16.75 17C16.75 17.4142 16.4142 17.75 16 17.75H8C7.58579 17.75 7.25 17.4142 7.25 17Z"/>
                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9426 1.25C9.63423 1.24999 7.82519 1.24998 6.4137 1.43975C4.96897 1.63399 3.82895 2.03933 2.93414 2.93414C2.03933 3.82895 1.63399 4.96897 1.43975 6.41371C1.24998 7.82519 1.24999 9.63423 1.25 11.9426V12.0574C1.24999 14.3658 1.24998 16.1748 1.43975 17.5863C1.63399 19.031 2.03933 20.1711 2.93414 21.0659C3.82895 21.9607 4.96897 22.366 6.4137 22.5603C7.82519 22.75 9.63423 22.75 11.9426 22.75H12.0574C14.3658 22.75 16.1748 22.75 17.5863 22.5603C19.031 22.366 20.1711 21.9607 21.0659 21.0659C21.9607 20.1711 22.366 19.031 22.5603 17.5863C22.75 16.1748 22.75 14.3658 22.75 12.0574V11.9426C22.75 9.63423 22.75 7.82519 22.5603 6.41371C22.366 4.96897 21.9607 3.82895 21.0659 2.93414C20.1711 2.03933 19.031 1.63399 17.5863 1.43975C16.1748 1.24998 14.3658 1.24999 12.0574 1.25H11.9426ZM3.9948 3.9948C4.56445 3.42514 5.33517 3.09825 6.61358 2.92637C7.91356 2.75159 9.62177 2.75 12 2.75C14.3782 2.75 16.0864 2.75159 17.3864 2.92637C18.6648 3.09825 19.4355 3.42514 20.0052 3.9948C20.5749 4.56445 20.9018 5.33517 21.0736 6.61358C21.2484 7.91356 21.25 9.62178 21.25 12C21.25 14.3782 21.2484 16.0864 21.0736 17.3864C20.9018 18.6648 20.5749 19.4355 20.0052 20.0052C19.4355 20.5749 18.6648 20.9018 17.3864 21.0736C16.0864 21.2484 14.3782 21.25 12 21.25C9.62177 21.25 7.91356 21.2484 6.61358 21.0736C5.33517 20.9018 4.56445 20.5749 3.9948 20.0052C3.42514 19.4355 3.09825 18.6648 2.92637 17.3864C2.75159 16.0864 2.75 14.3782 2.75 12C2.75 9.62178 2.75159 7.91356 2.92637 6.61358C3.09825 5.33517 3.42514 4.56445 3.9948 3.9948Z"/>
                                                                                </svg>
                                                                        </a>
                                                                    @else
                                                                        <a
                                                                            href="{{$file['link']}}"
                                                                            class="cms-readmore cms-readmore-1 cms-hover-move-icon-up"> <span
                                                                                class="cms-readmore--1 d-flex gap-10 align-items-center pr-10">
                                                                                <span class="text relative z-top">Contact To Download</span> <span
                                                                                    class="cms-svg-icon cms-eicon lh-0 text-10 rtl-flip"><svg
                                                                                        class="cms-arrow-up cms-arrow-up-right"
                                                                                        fill="currentColor" fill-hover="currentColor"
                                                                                        viewBox="0 0 10 11" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path class="cms-hover-move-1"
                                                                                            d="M10 9.80108V0H0.198919V0.633514H8.91892L0 9.55243L0.447568 10L9.36649 1.08108V9.80108H10Z" />
                                                                                        <path class="cms-hover-move-2"
                                                                                            d="M10 9.80108V0H0.198919V0.633514H8.91892L0 9.55243L0.447568 10L9.36649 1.08108V9.80108H10Z" />
                                                                                    </svg></span> </span> 
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
    .padding_auto {
        padding-left: 100px;
        padding-right: 100px;
    }

    @media only screen and (max-width: 900px) {
        .padding_auto {
            padding-left: 10px;
            padding-right: 10px;
        }
    }
</style>
@endsection('content')