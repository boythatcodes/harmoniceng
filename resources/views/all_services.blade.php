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
                                {{strtoupper(explode("_", $url_thing)[1]."s")}}</h1>
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
                                <li><span class="breadcrumb-entry">{{explode("_", $url_thing)[1]}}</span></li>
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
                            <h3 style="text-transform: capitalize; text-align: center;">{{join(" ", explode('_', $type_of_service))}}</h3>
                            <br />
                            <div class="grid-filter-wrap d-flex justify-content-center"
                                style="--cms-filter-color:primary;--cms-filter-color-hover:accent-regular;">

                                @if(empty($unique_tags))
                                <b>Categories: </b>
                                    @foreach($tags as $tag)
                                    <?php
                                        $tag = strtolower(join('_', explode(' ', $tag)));
                                    ?>
                                    <a href="/{{$url_thing}}/q/{{$tag}}"
                                        @if($type_of_service  == $tag) style="border-bottom: 3px solid black; padding-bottom: 5px;" @endif
                                        class="filter-item text-primary text-hover-accent-regular text-active-accent-regular cms-hover-underline"
                                        data-filter="business|case-category"> <span class="filter--item"
                                            data-hover="Business" style="text-transform: capitalize;">{{$tag}}</span> </a>
                                    
                                    @endforeach
                                @else
                                    <b>Sub Categories: </b>
                                    @foreach($unique_tags as $catgory)
                                        <a href="/{{$url_thing}}/q/{{$type_of_service}}?sub={{strtolower(join('_', explode(' ', $catgory)))}}"
                                            class="filter-item text-primary text-hover-accent-regular text-active-accent-regular cms-hover-underline"
                                            @if($sub  == $catgory) style="border-bottom: 3px solid black; padding-bottom: 5px;" @endif
                                            data-filter="business|case-category"> <span class="filter--item"
                                                data-hover="Business" style="text-transform: capitalize;">{{$catgory}}</span> </a>
                                    @endforeach
                                @endif
                            </div>
                            <br />
                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-6a6a6aa elementor-widget elementor-widget-cms_blog_grid"
                                    data-id="6a6a6aa" data-element_type="widget" data-widget_type="cms_blog_grid.default">
                                    <div class="elementor-widget-container">
                                        <div id="cms_blog_grid-6a6a6aa" class="cms-post-grid cms-grid cms-grid-1" data-layout="grid">
                                            <div
                                                class="cms-grid-content d-flex gutter flex-col-3 flex-col-tablet-2 flex-col-smobile-1">

                                                @php($x = 1)
                                                @if(count($projects_data) == 0)
                                                    <h1 style="text-align: center; margin-top: 50px; margin-bottom: 50px">No Data Available</h1>
                                                @endif
                                                @foreach($projects_data as $project)
                                                <div class="cms-item hover-image-zoom-out cms-hover-change item-{{$x}}" style="text-align: center;">
                                                    <div class="cms--item cms-radius-16 cms-hover-shadow-2 cms-transition bg-white" style="border: 3px solid #E2DFD2;">
                                                        <div class="cms-post-thumbnail overflow-hidden relative cms-radius-16">
                                                            <img
                                                                loading="lazy" decoding="async"
                                                                src="@if($type_of_public == 'image' || explode('/', $project->mime_type)[0] == 'image') /data/public_path/{{$project->public_image}} @else /document.svg @endif" style="height: 200px; margin-top: 20px; border-radius: 10px;" 
                                                                onerror="this.src='https://www.svgrepo.com/show/522113/file-document.svg'; this.style.height = '10px !important';"
                                                                />
                                                            @if($show_details)
                                                                <div
                                                                    class="cms-post-thumb-date absolute top-left ml-20 mt-20 p-20 cms-radius-8" style="color: black;">
                                                                    <div class="month text-15 lh-08">{{$project->submission_date}}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="cms-content p-40 p-lr-smobile-20">
                                                            <div class="cms-post-meta text-13 pb-10 mt-n5"> <a
                                                                    @if(empty($project->sub_category))
                                                                    href="/{{$url_thing}}/q/{{$project->type_of_service}}"
                                                                    @else
                                                                    href="/{{$url_thing}}/q/{{$project->type_of_service}}?sub={{$project->sub_category}}"
                                                                    @endif
                                                                    class="cms-term cms-hover-underline" style="text-transform: capitalize;">@if(empty($project->sub_category)) {{$project->type_of_service}} @else {{$project->sub_category}} @endif</a></div>
                                                            <h3 class="cms-heading text-line-2 text-21 lh-1238 pr-10" style="margin-top: 20px; margin-bottom: 20px;"><a
                                                                    href="/{{$url_thing}}/{{$project->id}}">
                                                                    {{$project->Title}}
                                                                </a></h3>
                                                            @if($show_details)
                                                            <div class="cms-excerpt text-15 text-line-4 pt-20 mb-15">
                                                                <div>
                                                                    <span class="cms-desc font-700 empty-none text-heading mt-n7 pb-25">Location:</span>
                                                                    <span class="cms-desc empty-none text-body" style="text-transform: capitalize; margin-top: 10px;">{{$project->location}}</span>
                                                                </div>
                                                                <div>
                                                                    <span class="cms-desc font-700 empty-none text-heading mt-n7 pb-25">Client:</span>
                                                                    <span class="cms-desc empty-none text-body" style="text-transform: capitalize; margin-top: 10px;">{{$project->client}}</span>
                                                                </div>
                                                                <div>
                                                                    <span class="cms-desc font-700 empty-none text-heading mt-n7 pb-25">Soil Test:</span>
                                                                    <span class="cms-desc empty-none text-body" style="text-transform: capitalize; margin-top: 10px;">{{$project->soil_test?"Yes":"No"}}</span>
                                                                </div>
                                                            </div>
                                                            @endif
                                                             <a
                                                                href="/{{$url_thing}}/{{$project->id}}"
                                                                style="margin-left: 30px;"
                                                                class="cms-readmore cms-readmore-1 cms-hover-move-icon-up"> <span
                                                                    class="cms-readmore--1 d-flex gap-10 align-items-center pr-10">
                                                                    <span class="text relative z-top">Read More</span> <span
                                                                        class="cms-svg-icon cms-eicon lh-0 text-10 rtl-flip"><svg
                                                                            class="cms-arrow-up cms-arrow-up-right"
                                                                            fill="currentColor" fill-hover="currentColor"
                                                                            viewBox="0 0 10 11" xmlns="http://www.w3.org/2000/svg">
                                                                            <path class="cms-hover-move-1"
                                                                                d="M10 9.80108V0H0.198919V0.633514H8.91892L0 9.55243L0.447568 10L9.36649 1.08108V9.80108H10Z" />
                                                                            <path class="cms-hover-move-2"
                                                                                d="M10 9.80108V0H0.198919V0.633514H8.91892L0 9.55243L0.447568 10L9.36649 1.08108V9.80108H10Z" />
                                                                        </svg></span> </span> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php($x++)
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <br />
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