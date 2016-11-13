{{ csrf_field() }}

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="col-md-4 control-label">{{ trans('model.title') }}</label>

    <div class="col-md-6">
        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    <label for="body" class="col-md-4 control-label">{{ trans('model.body') }}</label>

    <div class="col-md-6">
        <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>

        @if ($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <p class="help-block">* {{ trans('model.body_helper') }}
            <a href="https://guides.github.com/features/mastering-markdown/">#Markdown</a>
        </p>
    </div>
</div>

<div class="text-right">
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('model.close_modal_report') }}</button>
    <button type="submit" class="btn btn-primary">{{ trans('model.create_report_title') }}</button>
</div>

<hr>
@if (! empty($reports))

<h3 class="r-color">Reportações em aberto</h3>
    @foreach ($reports as $report)
    <div class="form-group">
        <div class="col-md-4 text-right mt-5">
            {{ \Carbon\Carbon::parse($report['created_at'])->format('d/m/Y') }}
        </div>

        <div class="col-sm-8">
            <p class="help-block">
                {{ $report['title'] }}
            </p>
        </div>
    </div>
    @endforeach
@endif
