<table>
    <thead>
        <tr>
            <td>id</td>
            <td>image</td>
            <td>created_at</td>
        </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->id }}</td>
            <td>{{ $invoice->image }}</td>
            <td>{{ $invoice->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
