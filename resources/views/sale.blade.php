<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
table, th, td {
  border:1px solid black;
}
</style>
    <h1>ok</h1>
@foreach ($sales as $sale)
<table >
    <tr>
        <th>Nama buah</th>
        <th>Total Harga</th>
        <th>Tanggal</th>
        <th>Stock Terjual</th>
    </tr>

<tr>
    <td>{{$sale->nama_buah_terjual}}</td>
    <td>{{$sale->total_harga_terjual}}</td>
    <td>{{$sale->tanggal_terjual}}</td>
    <td>{{$sale->stock_terjual}}</td>
</tr>
</table>
@endforeach
</body>
</html>