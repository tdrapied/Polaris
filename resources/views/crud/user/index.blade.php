<div class="panel panel-default">
        <table class="table table-bordered has-action">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <a href="{{ route('user_edit', ['id' => $user->id]) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ route('user_delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>