@extends('home')

@section('content')
    @include('uf.flash-message')
    <div class="col-md-12">
        <h2>Consulta la UF</h2>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="month">Mes</label>
                    <select id="month" name="month" class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="01" {{ (old("month") == '01' ? "selected":"") }}>Enero</option>
                        <option value="02" {{ (old("month") == '02' ? "selected":"") }}>Febrero</option>
                        <option value="03" {{ (old("month") == '03' ? "selected":"") }}>Marzo</option>
                        <option value="04" {{ (old("month") == '04' ? "selected":"") }}>Abril</option>
                        <option value="05" {{ (old("month") == '05' ? "selected":"") }}>Mayo</option>
                        <option value="06" {{ (old("month") == '06' ? "selected":"") }}>Junio</option>
                        <option value="07" {{ (old("month") == '07' ? "selected":"") }}>Julio</option>
                        <option value="08" {{ (old("month") == '08' ? "selected":"") }}>Agosto</option>
                        <option value="09" {{ (old("month") == '09' ? "selected":"") }}>Septiembre</option>
                        <option value="10" {{ (old("month") == '10' ? "selected":"") }}>Octubre</option>
                        <option value="11" {{ (old("month") == '11' ? "selected":"") }}>Noviembre</option>
                        <option value="12" {{ (old("month") == '12' ? "selected":"") }}>Diciembre</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="format">Formato</label>
                    <select id="format" name="format" class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="display" {{ (old("format") == 'display' ? "selected":"") }}>Visualización por Pantalla</option>
                        <option value="excel" {{ (old("format") == 'excel' ? "selected":"") }}>Descargar Excel</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
    </div>
    
    @isset($data)
        @include('uf.table')
    @endisset
@endsection