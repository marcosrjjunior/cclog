@extends('layouts.html')

@section('content')
    @include('partials.header')

    <section id="fh5co-home" data-section="home" ;" data-stellar-background-ratio="0.5">
        <div class="gradient"></div>
        <div class="container">
            <div class="text-wrap">
                <div class="text-inner">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="to-animate">{{ trans('model.projects') }}</h1>
                            <h2 class="to-animate">
                                {{ trans('model.projects_slug') }}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slant"></div>
    </section>

    <section id="fh5co-intro">
        <div class="container">
            <div class="row row-bottom-padded-lg w-100">
                @foreach ($projects as $project)
                <div class="fh5co-block to-animate">
                    <div class="overlay-darker"></div>
                    <div class="overlay"></div>
                    <div class="fh5co-text">
                        <h2>{{ $project->name }}</h2>
                        <p>{{ $project->owner }}</p>
                        <p></p>
                        <p><a href="/{{ $project->full_name }}" class="btn btn-primary">See</a></p>
                    </div>
                </div>
                @endforeach
            </div>

            @if (auth()->user()->type == 0)
            <div class="row watch-video text-center to-animate fadeInRight animated">
                @if (! $repos)
                    <div class="col-md-12 section-heading text-center">
                        <h2 class="to-animate fadeInUp animated">{{ trans('model.repositories') }}</h2>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 subtext to-animate fadeInUp animated">
                            <h3>{{ trans('model.message.repositories') }}</h3>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('user.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('token') ? ' has-error' : '' }}">
                            <label for="token" class="col-md-4 control-label">Token</label>

                            <div class="col-md-6">
                                <input id="token" type="text" class="form-control" name="token" value="{{ old('token') }}" required>

                                @if ($errors->has('token'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('token') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('github_user') ? ' has-error' : '' }}">
                            <label for="github_user" class="col-md-4 control-label">Github User</label>

                            <div class="col-md-6">
                                <input id="github_user" type="text" class="form-control" name="github_user" value="{{ old('github_user') }}" required>

                                @if ($errors->has('github_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('github_user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>

                @endif

                <div class="col-md-12 section-heading text-center">
                    @if ($repos)
                    <h2 class="to-animate fadeInUp animated">Repositórios</h2>
                    @endif

                    <ul class="inline-flex">
                    @foreach ($repos as $repo)
                        <li>
                            <form method="POST" action="{{ route('project.create') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="repo_owner" value="{{ $repo['owner']['login'] }}">
                                <input type="hidden" name="repo_name" value="{{ $repo['name'] }}">

                                {{ $repo['name'] }}
                                <button class="btn btn-sm btn-primary">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Project
                                </button>
                            </form>
                        </li>
                    @endforeach
                    </ul>
                </div>
                {{-- <span>Watch the video</span>

                <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo btn-video"><i class="icon-play2"></i></a> --}}
            </div>
            @endif
        </div>
    </section>

{{--     <section id="fh5co-services" class="mt" data-section="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-left">
                    <h2 class=" left-border to-animate">Services</h2>
                    <div class="row">
                        <div class="col-md-8 subtext to-animate">
                            <h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 fh5co-service to-animate">
                    <i class="icon to-animate-2 icon-anchor"></i>
                    <h3>Brand &amp; Strategy</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean</p>
                </div>
                <div class="col-md-6 col-sm-6 fh5co-service to-animate">
                    <i class="icon to-animate-2 icon-layers2"></i>
                    <h3>Web &amp; Interface</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean</p>
                </div>

                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-6 col-sm-6 fh5co-service to-animate">
                    <i class="icon to-animate-2 icon-video2"></i>
                    <h3>Photo &amp; Video</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean</p>
                </div>
                <div class="col-md-6 col-sm-6 fh5co-service to-animate">
                    <i class="icon to-animate-2 icon-monitor"></i>
                    <h3>CMS &amp; eCommerce</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean</p>
                </div>

            </div>
        </div>
    </section>

    <section id="fh5co-contact" data-section="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <h2 class="to-animate">Get In Touch</h2>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 subtext to-animate">
                            <h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-6 to-animate">
                    <h3>Contact Info</h3>
                    <ul class="fh5co-contact-info">
                        <li class="fh5co-contact-address ">
                            <i class="icon-home"></i>
                            5555 Love Paradise 56 New Clity 5655, <br>Excel Tower United Kingdom
                        </li>
                        <li><i class="icon-phone"></i> (123) 465-6789</li>
                        <li><i class="icon-envelope"></i>info@freehtml5.co</li>
                        <li><i class="icon-globe"></i> <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></li>
                    </ul>
                </div>

                <div class="col-md-6 to-animate">
                    <h3>Contact Form</h3>
                    <div class="form-group ">
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" class="form-control" placeholder="Name" type="text">
                    </div>
                    <div class="form-group ">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" class="form-control" placeholder="Email" type="email">
                    </div>
                    <div class="form-group ">
                        <label for="phone" class="sr-only">Phone</label>
                        <input id="phone" class="form-control" placeholder="Phone" type="text">
                    </div>
                    <div class="form-group ">
                        <label for="message" class="sr-only">Message</label>
                        <textarea name="" id="message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group ">
                        <input class="btn btn-primary btn-lg" value="Send Message" type="submit">
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
@endsection

