    <form class="form-horizontal" role="form" method="POST" action="{{ route('user_update', ['id' => $user->id]) }}">
        <input type="hidden" name="_method" value="PATCH">
        <div class="panel panel-default">
            <div class="panel-heading">
                Editer un utilisateur
            </div>
            <div class="panel-body">
                <div class="form-group {{ ($errors->has('username')) ? 'has-error' : '' }}">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" value="{{ old('username') ?: $user->username }}">
                        <p class="help-block">{{ ($errors->has('username') ? $errors->first('username') : '') }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" name="password" class="form-control" value="{{ old('password') ?: $user->password }}">
                        <p class="help-block"></p>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-sm btn-info btn-addon"><i class="glyphicon glyphicon-ok"></i>Update</button>
                <a href="{{ route('user_index') }}" class="btn btn-default btn-sm btn-addon"><i class="glyphicon glyphicon-remove"></i>Cancel</a>
            </div>
        </div>
    </form>