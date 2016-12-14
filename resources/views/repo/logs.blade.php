@extends('layouts.html')

@section('title')
    : {{ $repoName }}
@endsection

@section('content')
    @include('partials.header')

    <section id="fh5co-services" data-section="services">
        <div class="container">
            @if (auth()->user()->type == 1)
                <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#create-report">
                    <i class="fa fa-envelope" aria-hidden="true"></i> Reportar
                </button>
            @endif

            @if (auth()->user()->type == 0)
                <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#create-user">
                   <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('model.create_user_title') }}
                </button>

                <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#delete-project">
                    <i class="fa fa-trash" aria-hidden="true"></i> {{ trans('model.delete_project_title') }}
                </button>
            @endif

            @include('repo.modals')

            <div class="row">
                <div class="col-md-12 section-heading text-left">
                    <h2 class="left-border to-animate">Logs</h2>
                    <div class="row">
                        <div class="col-md-8 subtext to-animate">
                            <h3>{{ trans('model.project_detail_message') }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($logs as $log)
                <div class="col-md-12 logs">
                    <div class="col-md-2 col-sm-2 fh5co-service to-animate">
                        <h3 class="to-animate-2">
                            @if (app()->isLocale('br'))
                                {{ \Carbon\Carbon::parse($log['created_at'])->format('d/m/Y') }}
                            @else
                                {{ \Carbon\Carbon::parse($log['created_at'])->format('m/d/Y') }}
                            @endif
                        </h3>
                    </div>

                    <div class="col-md-10 col-sm-10 fh5co-service to-animate">
                        {!! \GrahamCampbell\Markdown\Facades\Markdown::convertToHtml($log['body']) !!}
                    </div>
                </div>

                <div class="clearfix visible-sm-block mt-30"></div>
                @endforeach
            </div>
    </section>

{{-- <div class="container">
    @foreach ($logs as $log)
    {{ $log['labels'][0]['color'] }}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $log['number'] - $log['created_at'] }}</div>

                <div class="panel-body">
                    {!! \GrahamCampbell\Markdown\Facades\Markdown::convertToHtml($log['body']) !!}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div> --}}
@endsection
