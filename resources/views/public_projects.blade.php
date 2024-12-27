@extends('layouts.main_page')

@section('content')
<link rel="stylesheet" id="siteground-optimizer-combined-css-07ef100e8c9f8537cc3e26b2c8577d05"
    href="/wp-content/uploads/siteground-optimizer-assets/siteground-optimizer-combined-css-07ef100e8c9f8537cc3e26b2c8577d05.css"
    media="all" />
<link rel="preload"
    href="/wp-content/uploads/siteground-optimizer-assets/siteground-optimizer-combined-css-07ef100e8c9f8537cc3e26b2c8577d05.css"
    as="style">
<main id="cms-main" class="cms-main is-elementor">

    <link rel="stylesheet" id="siteground-optimizer-combined-css-8241d8cad2405f0aa8182767f58ee52f"
        href="/wp-content/uploads/siteground-optimizer-assets/siteground-optimizer-combined-css-8241d8cad2405f0aa8182767f58ee52f.css"
        media="all" />

    <div data-elementor-type="wp-post" data-elementor-id="255" class="elementor elementor-255">

        <div class="elementor-element elementor-element-b88d5e9 p-tb-110 p-tb-tablet-60 e-flex e-con-boxed cms-econ-boxed-no cms-econ-no-space-no e-con e-parent"
            data-id="b88d5e9" data-element_type="container"
            style="padding-top: 10px !important"
            data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-384d10b e-con-full e-flex cms-econ-boxed-no cms-econ-no-space-no e-con e-child"
                    data-id="384d10b" data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-d305c82 elementor-invisible elementor-widget elementor-widget-cms_post_feature"
                        data-id="d305c82" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                        data-widget_type="cms_post_feature.default">
                        <div class="elementor-widget-container">
                            <div class="cms-epf cms-epf-1 text-center">
                                <div class="post-cat text-13 lh-1308 mb-30 gap-10 d-flex justify-content-center" style="cursor: pointer;">
                                    <a href="/{{$url_thing}}/q/all"
                                        class="cms-term tag-cloud-link">All @if($url_thing == "public_service") Services @else Projects @endif</a>
                                    <a href="/{{$url_thing}}/q/{{$project_data->type_of_service}}"
                                        class="cms-term tag-cloud-link" style="text-transform: capitalize;">{{$project_data->type_of_service}}</a>
                                </div>
                                <h2 class="cms-title cms-heading text-34 max-580 mt-n7 mb-40 m-lr-auto">{{$project_data->Title}}</h2>
                                <img loading="lazy" decoding="async"
                                    style="height: 587px; width: 840px;" src="/data/{{$project_data->public_image}}"
                                    onerror="this.src='https://www.svgrepo.com/show/522113/file-document.svg'; this.style.height = '10px !important';"
                                    class="cms-lazy lazy-loading cms-radius-24 lazyload" alt="" loading="lazy"
                                    data-duration="" />
                            </div>
                        </div>
                    </div>
                    @if($url_thing == "public_project")
                    <a href="/data/{{$project_data->public_image}}" download="/data/{{$project_data->public_image}}" style="text-align: center;">
                        <svg style="width: 25px;" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-339.000000, -480.000000)" fill="#000000">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path d="M297.92575,332.227 L294.9427,334.913 C294.13315,335.641 292.86685,335.641 292.0573,334.913 L289.07425,332.227 C288.65215,331.848 288.6343,331.215 289.03225,330.813 L289.03225,330.813 C289.4302,330.412 290.09485,330.394 290.51695,330.773 L291.5638,331.716 C291.89875,332.018 292.45,331.792 292.45,331.353 L292.45,326 C292.45,325.448 292.9204,325 293.5,325 C294.0796,325 294.55,325.448 294.55,326 L294.55,331.353 C294.55,331.792 295.10125,332.018 295.43515,331.716 L296.48305,330.773 C296.9041,330.394 297.56875,330.412 297.96775,330.813 L297.96775,330.813 C298.3657,331.215 298.3468,331.848 297.92575,332.227 M300.85,338 L286.15,338 C285.5704,338 285.1,337.553 285.1,337 L285.1,323 C285.1,322.448 285.5704,322 286.15,322 L300.85,322 C301.4296,322 301.9,322.448 301.9,323 L301.9,337 C301.9,337.553 301.4296,338 300.85,338 M283,322 L283,338 C283,339.105 283.93975,340 285.1,340 L301.9,340 C303.0592,340 304,339.105 304,338 L304,322 C304,320.896 303.0592,320 301.9,320 L285.1,320 C283.93975,320 283,320.896 283,322" id="download-[#1453]">

                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <b style="margin-bottom: 10px">Download Demo File</b>
                    </a>
                    <div class="elementor-element elementor-element-8d498fb elementor-invisible elementor-widget elementor-widget-cms_heading"
                        data-id="8d498fb" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                        data-widget_type="cms_heading.default">
                        <div class="elementor-widget-container">
                            <div class="cms-eheading cms-eheading-6 text-start">
                                <div class="cms-heading empty-none text-heading text-26 mt-n7 mb-30" style="margin-top: 50px;">Project Details
                                </div>
                                <div>
                                    <span class="cms-desc font-700 empty-none text-heading mt-n7 pb-25">Location:</span>
                                    <span class="cms-desc empty-none text-body" style="text-transform: capitalize; margin-top: 10px;">{{$project_data->location}}</span>
                                </div>
                                <div>
                                    <span class="cms-desc font-700 empty-none text-heading mt-n7 pb-25">Client:</span>
                                    <span class="cms-desc empty-none text-body" style="text-transform: capitalize; margin-top: 10px;">{{$project_data->client}}</span>
                                </div>
                                <div>
                                    <span class="cms-desc font-700 empty-none text-heading mt-n7 pb-25">Soil Test:</span>
                                    <span class="cms-desc empty-none text-body" style="text-transform: capitalize; margin-top: 10px;">{{$project_data->soil_test?"Yes":"No"}}</span>
                                </div>
                                <div>
                                    <span class="cms-desc font-700 empty-none text-heading mt-n7 pb-25">Submission Date:</span>
                                    <span class="cms-desc empty-none text-body" style="text-transform: capitalize; margin-top: 10px;">{{$project_data->submission_date}}</span>
                                </div>
                                <div>
                                    <span class="cms-desc font-700 empty-none text-heading mt-n7 pb-25">Language:</span>
                                    <span class="cms-desc empty-none text-body" style="text-transform: capitalize; margin-top: 10px;">{{$project_data->language}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="elementor-element elementor-element-a432728 elementor-invisible elementor-widget elementor-widget-cms_heading"
                        data-id="a432728" data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                        data-widget_type="cms_heading.default">
                        <div class="elementor-widget-container">
                            <div class="cms-eheading cms-eheading-6 text-start">
                                <div class="cms-desc font-700 empty-none text-heading mt-n7 pb-25"></div>
                                <div class="cms-desc empty-none text-body">
                                    {!! $project_data->description !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($display_team_members)
                    <h4 style="text-align: left !important;">Team at hand: </h4>

                    <main id="cms-main" class="cms-main is-elementor" style="margin-top: -150px;">
                        <div data-elementor-type="wp-page" data-elementor-id="17" class="elementor elementor-17">

                            <div class="elementor-element elementor-element-1a91ba6 p-tb-110 p-tb-tablet-40 e-flex e-con-boxed cms-econ-boxed-no cms-econ-no-space-no e-con e-parent"
                                data-id="1a91ba6" data-element_type="container">
                                <div class="e-con-inner">
                                    @foreach ($team_members as $user)

                                    <a href="/contact" style="cursor: pointer !important;" class="elementor-element elementor-element-f88cf66 e-con-full e-flex cms-econ-boxed-no cms-econ-no-space-no e-con e-child"
                                        data-id="f88cf66" data-element_type="container"
                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                                        <div style="cursor: pointer !important;" class="elementor-element elementor-element-17e72fb elementor-invisible elementor-widget elementor-widget-cms_teams"
                                            data-id="17e72fb" data-element_type="widget"
                                            data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                                            data-widget_type="cms_teams.default">
                                            <div class="elementor-widget-container">
                                                <div
                                                    class="cms-eteam cms-eteam-1 cms-team-grid d-flex gutter flex-col-1 flex-col-smobile-1">
                                                    <div class="cms-team-item ">
                                                        <div
                                                            class="cms-team--item bg-white bg-hover-grey cms-transition cms-radius-16 cms-hover-change hover-image-zoom-out">
                                                            <div class="team-name d-block text-center cms-radius-16 overflow-hidden"><img loading="lazy"
                                                                    decoding="async" width="400" height="420"
                                                                    src="/data/users/{{ $user->id }}.jpg"
                                                                    alt="Image"
                                                                    onerror="this.src='https://ui-avatars.com/api/?name={{ $user->name }}';"
                                                                    alt="Avatar">
                                                            </div>
                                                            <div
                                                                class="team-content p-40 p-lr-smobile-20 d-flex gap-20 align-items-center justify-content-between">
                                                                <div class="team--content">
                                                                    <h4 class="team-heading cms-heading text-21 mt-n5">
                                                                        <div
                                                                            class="team-name d-block relative"
                                                                            rel="nofollow">{{$user->name}} </div>
                                                                    </h4>
                                                                    <div
                                                                        class="team-position empty-none text-15 pt-5 mb-n5 text-primary">
                                                                        <b>Postion: </b>{{$user->position}}
                                                                    </div>
                                                                    <div
                                                                        class="team-position empty-none text-15 pt-5 mb-n5 text-primary">
                                                                        <b>Expertise: </b>{{$user->expertise}}
                                                                    </div>
                                                                    <div
                                                                        class="team-position empty-none text-15 pt-5 mb-n5 text-primary">
                                                                        <b>Description:</b>
                                                                        {!! nl2br(e($user->description)) !!}
                                                                    </div>
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
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </main>
                    @endif
                </div>
                <a
                    class="btn btn-lg cms-hover-move-icon-up btn-accent text-white btn-hover-accent-darken text-hover-white"
                    href="/contact">
                    @if($url_thing == "public_project")
                    Request Access to files
                    @else
                    Contact US
                    @endif
                    <span
                        class="text-10 lh-0"><svg class="cms-arrow-up cms-arrow-up-right"
                            fill="currentColor" fill-hover="currentColor" viewBox="0 0 10 11"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="cms-hover-move-1"
                                d="M10 9.80108V0H0.198919V0.633514H8.91892L0 9.55243L0.447568 10L9.36649 1.08108V9.80108H10Z" />
                            <path class="cms-hover-move-2"
                                d="M10 9.80108V0H0.198919V0.633514H8.91892L0 9.55243L0.447568 10L9.36649 1.08108V9.80108H10Z" />
                        </svg></span> </a>
            </div>
        </div>
    </div>
</main>
@endsection('content')