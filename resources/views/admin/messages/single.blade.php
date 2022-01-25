<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <td>Subject</td>
            <td>{{$message->subject}}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>{{$message->description}}</td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{$message->created_at}}</td>
        </tr>

        </tbody>
    </table>
</div>
