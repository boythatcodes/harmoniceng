@extends('layouts.main_page')

@section('content')
<link rel="stylesheet" id="siteground-optimizer-combined-css-8241d8cad2405f0aa8182767f58ee52f"
    href="/wp-content/uploads/siteground-optimizer-assets/siteground-optimizer-combined-css-8241d8cad2405f0aa8182767f58ee52f.css"
    media="all" />


<main id="cms-main" class="cms-main is-elementor">
    <div data-elementor-type="wp-page" data-elementor-id="17" class="elementor elementor-17">
        <div class="elementor-element elementor-element-e11003e e-con-full-no-space e-flex cms-econ-boxed-no cms-econ-no-space-no elementor-invisible e-con e-parent"
            data-id="e11003e" data-element_type="container"
            data-settings="{&quot;content_width&quot;:&quot;full-no-space&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;}">
            <div class="elementor-element elementor-element-aff4bc0 cms-eptitle-overlay-1 elementor-widget elementor-widget-cms_page_title"
                data-id="aff4bc0" data-element_type="widget" data-widget_type="cms_page_title.default">
                <div class="elementor-widget-container">
                    <div class="cms-eptitle-overlay cms-overlay cms-bg-cover cms-lazy"
                        style="--cms-bg-lazyload:url(../wp-content/uploads/service-bg.webp);background-image:var(--cms-bg-lazyload-loaded);">
                    </div>
                    <div class="cms-eptitle cms-eptitle-1 relative z-top text-center">
                        <div class="cms-content container text-center d-flex justify-content-center">
                            <div class="cms--content d-flex flex-column justify-content-center">
                                <div
                                    class="cms-small-title mt-n7 pb-15 w-100 text-15 text-uppercase text-white ls-06 empty-none">
                                </div>
                                <h1
                                    class="cms-title cms-nl2br lh-108 text-75 text-tablet-50 text-smobile-40 text-white w-100 empty-none">
                                    Leadership</h1>
                                <div class="cms-desc cms-nl2br pt-15 w-100 text-17 font-700 text-white empty-none">
                                    Take control of your cunstruction projects and start growing your <br /> wealth and
                                    achieve your desired outcomes!</div>
                                <div class="d-flex gap empty-none w-100 pt-35 justify-content-center"
                                    style="--cms-gap:30px;--cms-gap-tablet:30px;--cms-gap-mobile:20px;"></div>
                                <ul
                                    class="cms-breadcrumb unstyled text-white text-hover-white justify-content-center">
                                    <li><a class="breadcrumb-entry cms-hover-underline text-white text-hover-white"
                                            href="/">Home<span
                                                class="breadcrumb-separate text-6 lh-0"><svg version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 32">
                                                    <path
                                                        d="M17.842 17.061l-12.146 12.146c-0.586 0.586-1.536 0.586-2.121 0l-1.417-1.417c-0.585-0.585-0.586-1.533-0.002-2.119l9.626-9.672-9.626-9.672c-0.583-0.586-0.582-1.534 0.002-2.119l1.417-1.417c0.586-0.586 1.536-0.586 2.121 0l12.146 12.146c0.586 0.586 0.586 1.536 0 2.121z">
                                                    </path>
                                                </svg> </span></a></li>
                                    <li><span class="breadcrumb-entry">Leadership</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-element elementor-element-1a91ba6 p-tb-110 p-tb-tablet-40 e-flex e-con-boxed cms-econ-boxed-no cms-econ-no-space-no e-con e-parent"
            data-id="1a91ba6" data-element_type="container">
            <div class="e-con-inner">
                @foreach ($users as $user)
                
                <div class="elementor-element elementor-element-f88cf66 e-con-full e-flex cms-econ-boxed-no cms-econ-no-space-no e-con e-child"
                    data-id="f88cf66" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-17e72fb elementor-invisible elementor-widget elementor-widget-cms_teams"
                        data-id="17e72fb" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                        data-widget_type="cms_teams.default">
                        <div class="elementor-widget-container">
                            <div
                                class="cms-eteam cms-eteam-1 cms-team-grid d-flex gutter flex-col-1 flex-col-smobile-1">
                                <div class="cms-team-item ">
                                    <div
                                        style="cursor: default;"
                                        class="cms-team--item bg-white bg-hover-grey cms-transition cms-radius-16 cms-hover-change hover-image-zoom-out">
                                        <div class="team-name d-block text-center cms-radius-16 overflow-hidden"
                                        ><img loading="lazy"
                                                decoding="async" width="400" height="420"
                                                src="/data/users/{{ $user->id }}.jpg" 
                                            alt="Image" 
                                            onerror="this.src='https://ui-avatars.com/api/?name={{ $user->name }}';"
                                            alt="Avatar">
                                        </div>                                          
                                        <div
                                            class="team-content p-40 p-lr-smobile-20 d-flex gap-20 align-items-center justify-content-between">
                                            <div class="team--content">
                                                <h4 class="team-heading cms-heading text-21 mt-n5"> <div
                                                        class="team-name d-block relative"
                                                        rel="nofollow">{{$user->name}} </div></h4>
                                                <div
                                                    class="team-position empty-none text-15 pt-5 mb-n5 text-primary">
                                                    {{$user->description}} </div>
                                                <div
                                                    class="team-position empty-none text-15 pt-5 mb-n5 text-primary">
                                                    {{$user->phone}} </div>
                                                <div class="team-desc empty-none pt-15 text-15"></div>
                                            </div>
                                            <div class="team-socials d-flex gap-10 lh-20"> 
                                                <small>With Us Since: <b>{{$user->since}} </b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection
