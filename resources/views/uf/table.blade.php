<br>
<div class="row">
    <h4>Información Obtenida</h4>
    <table class="table table-hover">
        <tr>
            <td>Día</td>
            <td>Valor</td>
        </tr>
        <tbody>
            @foreach ($data as $uf)
               <tr>
                   <td>{{ $uf->Fecha }}</td>
                   <td>{{ $uf->Valor }}</td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</div>