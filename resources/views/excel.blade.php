<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Excel</title>
</head>
<style>
    #galeria {
        display: flex;
    }

    #galeria img {
        width: 85px;
        height: 85px;
        border-radius: 10px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        opacity: 85%;
    }
</style>

<body>

    <form action="{{ route('excel.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image[]" multiple onchange="previewMultiple(event)" id="adicionafoto">
        <button type="submit" class="btn btn-primary">create</button>
        <div id="galeria">
        </div>
    </form>
    {{--export excel --}}
    <a href="{{ route('excel.export') }}" class="btn btn-danger">export</a>

    {{--download PDF--}}
    <a href="{{ route('download.pdf') }}" class="btn btn-success">Donload Pdf</a>

    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <li class="error">{{ $item }}</li>
        @endforeach
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hla as $excel)
                <tr>
                    {{-- { dd($excels) }} --}}
                    <td>{{ $excel->id }}</td>
                    <td><img src="{{ asset('storage/' . $excel->image) }}" alt="" width="50px"></td>
            @endforeach

            </tr>
        </tbody>
    </table>
    <script>
        function previewMultiple(event) {
            var saida = document.getElementById("adicionafoto");
            var quantos = saida.files.length;
            for (i = 0; i < quantos; i++) {
                var urls = URL.createObjectURL(event.target.files[i]);
                document.getElementById("galeria").innerHTML += '<img src="' + urls + '">';
            }
        }
    </script>
</body>

</html>
