<div class="card-datatable table-responsive">
    @if ($log->user_id)
        <table class="datatables-demo table table-striped table-bordered">
            <tbody>
                <tr>
                    <th colspan="2" class="text-center">
                        Users Detail
                    </th>
                </tr>
                <tr>
                    <th>Code</th>
                    <td>{{ $log->user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $log->user->email }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($log->user->active)
                            <span class="btn btn-sm btn-success">Active</span>
                        @else
                            <span class="btn btn-sm btn-warning">Inactive</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{ $log->user->created_at }}</td>
                </tr>

            </tbody>
        </table>
    @endif
    <table class="datatables-demo table table-striped table-bordered">
        <tbody>
            <tr>
                <th colspan="2" class="text-center">
                    Error Detail
                </th>
            </tr>
            <tr>
                <th>Code</th>
                <td>{{ $log->code }}</td>
            </tr>
            <tr>
                <th>File</th>
                <td>{{ $log->file }}</td>
            </tr>
            <tr>
                <th>Line</th>
                <td>{{ $log->line }}</td>
            </tr>
            <tr>
                <th>Message</th>
                <td>{{ $log->message }}</td>
            </tr>
            <tr>
                <th>Trace</th>
                <td>{{ $log->trace }}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{ $log->created_at }}</td>
            </tr>

        </tbody>
    </table>
</div>
