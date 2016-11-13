<div class="modal fade r-color" id="delete-project" tabindex="-1" role="dialog" aria-labelledby="deleteProjectLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="{{ route('project.delete', ['owner_name' => $ownerName, 'repo_name' => $repoName]) }}">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="DELETE">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('model.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title r-color" id="deleteProjectLabel">{{ trans('model.delete_project_title') }}</h4>
                </div>

                <div class="modal-body">
                    {{ trans('model.delete_project_message') }}
                </div>

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">{{ trans('model.delete_keep_project') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('model.delete_project_title') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade r-color" id="create-user" tabindex="-1" role="dialog" aria-labelledby="createUserLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="{{ route('user.create', ['owner_name' => $ownerName, 'repo_name' => $repoName]) }}">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('model.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title r-color" id="createUserLabel">{{ trans('model.create_user_title') }}</h4>
                </div>
                <div class="modal-body">
                    @include('repo._form-create-user')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('model.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('model.create_user_title') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade r-color" id="create-report" tabindex="-1" role="dialog" aria-labelledby="createReportLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="{{ route('report.create', ['owner_name' => $ownerName, 'repo_name' => $repoName]) }}">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('model.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title r-color" id="createReportLabel">{{ trans('model.create_report_title') }}</h4>
                </div>
                <div class="modal-body">
                    @include('repo._form-create-report')
                </div>


            </form>

        </div>
    </div>
</div>
