<div class="card-datatable table-responsive">
    <table class="datatables-demo table table-striped table-bordered">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $role->name }}</td>
            </tr>
            <tr>
                <th>Permissions</th>
                <td>
                    @if (!empty($rolePermissions))
                        @foreach ($rolePermissions as $v)
                            <label class="label label-success">{{ $v->name }},</label>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{ $role->created_at }}</td>
            </tr>

        </tbody>
    </table>
</div>
