@extends('layouts.main_page')

@section('content')
<link rel="stylesheet" id="siteground-optimizer-combined-css-07ef100e8c9f8537cc3e26b2c8577d05"
        href="/wp-content/uploads/siteground-optimizer-assets/siteground-optimizer-combined-css-07ef100e8c9f8537cc3e26b2c8577d05.css"
        media="all" />
<link rel="preload"
    href="/wp-content/uploads/siteground-optimizer-assets/siteground-optimizer-combined-css-07ef100e8c9f8537cc3e26b2c8577d05.css"
    as="style">
<main id="cms-main" class="cms-main is-elementor">

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
                                <a href="/service/q/all"
                                    class="cms-term tag-cloud-link">All Services</a>
                                    <a href="/services/q/{{$project_data->type_of_service}}"
                                        class="cms-term tag-cloud-link" style="text-transform: capitalize;">{{$project_data->type_of_service}}</a>
                                </div>
                                <h2 class="cms-title cms-heading text-34 max-580 mt-n7 mb-40 m-lr-auto">{{$project_data->title}}</h2>
                                <img loading="lazy" decoding="async" width="840"
                                    height="587" src="/data/{{$project_data->public_image}}"
                                    class="cms-lazy lazy-loading cms-radius-24 lazyload" alt="" loading="lazy"
                                    data-duration="" />
                            </div>
                        </div>
                    </div>
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

                </div>
                <a
                class="btn btn-lg cms-hover-move-icon-up btn-accent text-white btn-hover-accent-darken text-hover-white"
                href="/contact"> Request Access to files <span
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