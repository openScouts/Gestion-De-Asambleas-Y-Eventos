<style>
@font-face {
  font-family: "c39";
  src: url('http://localhost:8000/Code39r.ttf') format("truetype");
}
td { font-family: "c39"}

</style>

<table class="table table-sm table-striped">
<thead>
<tr>
    <th>Numero</th>
    <th>Documento</th>
    <th>Nombre</th>
    <th>Estado</th>
</tr>
</thead>
<tbody>
@foreach($nomina as $var)
    <tr>
        <td>{{ $var->id  }}</td>
        <td>{{ $var->nombre  }}</td>
        <td>{{ $var->documento  }}</td>
        @if($var->presente  == 'S')
            <td class="success-color text-white">Presente</td>
        @else
            <td class="danger-color text-white">Ausente</td>
        @endif
    </tr>
@endforeach
</tbody>
</table>
