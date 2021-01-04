    <form class="form-horizontal" role="form" method="POST" action="{{ route('user_update', ['id' => $user->id]) }}">
        <input type="hidden" name="_method" value="DELETE">
        <div class="panel panel-default">
            <div class="panel-heading">
                Supprimer un utilisateur
            </div>
            <div class="panel-body">
                <p>Etes vous vraiment sur de supprimer l'utilisateur <del>{{ $user->username }}</del>?</p>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-sm btn-danger btn-addon"><i class="glyphicon glyphicon-ok"></i>Delete</button>
                <a href="{{ route('user_index') }}" class="btn btn-default btn-sm btn-addon"><i class="glyphicon glyphicon-remove"></i>Cancel</a>
            </div>
        </div>
    </form>