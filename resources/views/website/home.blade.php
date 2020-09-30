@extends('website.website')

@section('content')

    <div class="container mb-5">
        @foreach($page->components as $content)
            <div class="mb-5">
                @include('website.pages.page_heading')
                @include('website.pages.page_content')

                @include('website.pages.page_gallery')
                @include('website.pages.page_documents')
            </div>
        @endforeach

        <div class="row mt-5 mb-5">
            <div class="col-sm-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-fw fa-check"></i> Laravel & AdminLTE</h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><strong>Laravel v7.x</strong></li>
                            <li><strong>AdminLTE v3.0.2</strong></li>
                            <li><strong>Bootstrap v4.4.1</strong></li>
                            <li><strong>jQuery v3.4.1</strong></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-fw fa-gift"></i> Free &amp; Open Source</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-8">
                                <ul>
                                    <li>Auth (Login, Register, Forgot Password)</li>
                                    <li>Roles</li>
                                    <li>Log Activity (website and admin)</li>
                                    <li>Notifications</li>
                                    <li>Google Analytics Reports</li>
                                    <li>Website Page Builder</li>
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <ul>
                                    <li>Banners</li>
                                    <li>Photos</li>
                                    <li>Documents</li>
                                    <li>Blog</li>
                                    <li>News and Events</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-fw fa-cubes"></i> Add On Packages
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="https://github.com/bpocallaghan/faq" target="_blank">FAQ</a>
                            </li>
                            <li>
                                <a href="https://github.com/bpocallaghan/changelogs" target="_blank">Changelogs</a>
                            </li>
                            <li>
                                <a href="https://github.com/bpocallaghan/corporate" target="_blank">Corporate</a>
                            </li>
                            <li>
                                <a href="https://github.com/bpocallaghan/testimonials" target="_blank">Testimonials</a>
                            </li>
                            <li>
                                <a href="https://github.com/bpocallaghan/locations" target="_blank">Locations</a>
                            </li>
                            <li>
                                <a href="https://github.com/bpocallaghan/subscriptions" target="_blank">Subscription
                                    Plans</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12">
                <h2 class="page-header">Core Packages Included</h2>
            </div>
        </div>
        <div class="row card-columns mt-2 packages text-center">
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">File Generators</div>
                    </div>
                    <div class="card-body">
                        <div class="description">
                            <a target="_blank" href="https://github.com/bpocallaghan/generators">
                                Laravel 5 File Generators with config and publishable stubs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">Impersonate User</div>
                    </div>
                    <div class="card-body">
                        <div class="description">
                            <a target="_blank" href="https://github.com/bpocallaghan/impersonate">
                                This allows you to authenticate as any of your customers.
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">Sluggable</div>
                    </div>
                    <div class="card-body">
                        <div class="description">
                            <a target="_blank" href="https://github.com/bpocallaghan/sluggable">
                                Provides a HasSlug trait that will generate a unique slug when
                                saving your Laravel Eloquent model.
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">Notification</div>
                    </div>
                    <div class="card-body">
                        <div class="description">
                            <a target="_blank" href="https://github.com/bpocallaghan/notify">
                                Laravel 5 Flash Notifications with icons and animations and with a
                                timeout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">Alert</div>
                    </div>
                    <div class="card-body">
                        <div class="description">
                            <a target="_blank" href="https://github.com/bpocallaghan/alert">
                                A helper package to flash a bootstrap alert to the browser via a
                                Facade or a helper function.
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">Titan</div>
                    </div>
                    <div class="card-body">
                        <div class="description">
                            <a target="_blank" href="https://github.com/bpocallaghan/titan">
                                Projects Core Useful classes you can use for every Laravel project
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <p>A Laravel CMS Starter project with AdminLTE, Roles, Impersonations,
                            Analytics, Activity, Notifications and more.</p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-lg btn-light btn-block" href="https://github.com/bpocallaghan/titan-starter">
                            <i class="fab fa-github"></i>
                            Read More on GitHub
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
