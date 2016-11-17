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
                @endif

                <div class="col-md-12 section-heading text-center">
                    @if ($repos)
                        <h2 class="to-animate fadeInUp animated">Repositórios</h2>
                    @endif

                    <ul class="inline">
                    @foreach ($repos as $repo)
                        <li>
                            <form method="POST" action="{{ route('project.create') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="repo_owner" value="{{ $repo['owner']['login'] }}">
                                <input type="hidden" name="repo_name" value="{{ $repo['name'] }}">

                                <button class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    {{ $repo['full_name'] }}
                                </button>
                            </form>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection

