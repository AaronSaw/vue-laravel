<!DOCTYPE html>
<html>

<head>
    <title>Hi</title>
</head>
<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>

<body>
    <table id="customers">
        <thead>
            <tr>
            <th>id</th>
            <th>image</th>
            <th>media_id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->image }}</td>
                    <td>{{ $data->media_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
