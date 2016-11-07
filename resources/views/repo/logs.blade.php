@extends('layouts.html')

@section('title')
    : {{ $repoName }}
@endsection

@section('content')
    @include('partials.header')

    <section id="fh5co-services" data-section="services">
        <div class="container">
            @if (auth()->user()->type == 0)
                <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#add-user">
                    <span class="glyphicon glyphicon-plus"></span> Adicionar Usuário
                </button>

                <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#delete-project">
                    <span class="glyphicon glyphicon-trash"></span> {{ trans('model.delete_project_title') }}
                </button>

                <div class="modal fade r-color" id="delete-project" tabindex="-1" role="dialog" aria-labelledby="deleteProjectLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="DELETE" action="{{ route('user.create', ['owner_name' => $ownerName, 'repo_name' => $repoName]) }}">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('model.close') }}"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="deleteProjectLabel">{{ trans('model.delete_project_title') }}</h4>
                                </div>

                                <div class="modal-body">
                                    {{ trans('model.delete_project_message') }}
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">{{ trans('model.delete') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="modal fade r-color" id="add-user" tabindex="-1" role="dialog" aria-labelledby="addUserLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="{{ route('user.create', ['owner_name' => $ownerName, 'repo_name' => $repoName]) }}">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('model.close') }}"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="addUserLabel">{{ trans('model.add_user_title') }}</h4>
                                </div>
                                <div class="modal-body">
                                    @include('repo._form-create-user')
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('model.close') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ trans('model.add_user_title') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endif

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
                    {{-- {{ $log['labels'][0]['color'] }} --}}
                    <div class="col-md-2 col-sm-2 fh5co-service to-animate">
                        <h3 class="to-animate-2">
                            {{ \Carbon\Carbon::parse($log['created_at'])->format('d/m/Y') }}
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
