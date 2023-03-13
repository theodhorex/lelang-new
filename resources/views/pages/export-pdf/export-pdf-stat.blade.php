<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>{{ $tanggal }}</title>
</head>

<body>
    <h2 class="mb-2">Item list</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th scope="col">Item name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Created at</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($postingan as $item)
                <tr>
                    <th class="text-center" scope="row">{{ $i++ }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->start_price }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
