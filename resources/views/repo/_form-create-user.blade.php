{{ csrf_field() }}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">{{ trans('model.name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">{{ trans('model.email') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">{{ trans('model.password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    <label for="type" class="col-md-4 control-label">{{ trans('model.type') }}</label>

    <div class="col-md-6">
        <select class="form-control" name="type" id="type">
            <option value=""></option>
            <option value="0">All</option>
            <option value="1">Only See</option>
        </select>

        @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('token') ? ' has-error' : '' }}">
    <label for="token" class="col-md-4 control-label">{{ trans('model.github_token') }}</label>

    <div class="col-md-6">
        <input id="token" type="token" class="form-control" name="token" required>

        @if ($errors->has('token'))
            <span class="help-block">
                <strong>{{ $errors->first('token') }}</strong>
            </span>
        @endif
    </div>
</div>
