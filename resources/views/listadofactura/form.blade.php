<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('guia') }}
            {{ Form::text('guia', $listadofactura->guia, ['class' => 'form-control' . ($errors->has('guia') ? ' is-invalid' : ''), 'placeholder' => 'Guia']) }}
            {!! $errors->first('guia', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numeroFactura') }}
            {{ Form::text('numeroFactura', $listadofactura->numeroFactura, ['class' => 'form-control' . ($errors->has('numeroFactura') ? ' is-invalid' : ''), 'placeholder' => 'Numerofactura']) }}
            {!! $errors->first('numeroFactura', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('producto') }}
            {{ Form::text('producto', $listadofactura->producto, ['class' => 'form-control' . ($errors->has('producto') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
            {!! $errors->first('producto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modelo') }}
            {{ Form::text('modelo', $listadofactura->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('partCode') }}
            {{ Form::text('partCode', $listadofactura->partCode, ['class' => 'form-control' . ($errors->has('partCode') ? ' is-invalid' : ''), 'placeholder' => 'Partcode']) }}
            {!! $errors->first('partCode', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codigoAlternativo') }}
            {{ Form::text('codigoAlternativo', $listadofactura->codigoAlternativo, ['class' => 'form-control' . ($errors->has('codigoAlternativo') ? ' is-invalid' : ''), 'placeholder' => 'Codigoalternativo']) }}
            {!! $errors->first('codigoAlternativo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('partName') }}
            {{ Form::text('partName', $listadofactura->partName, ['class' => 'form-control' . ($errors->has('partName') ? ' is-invalid' : ''), 'placeholder' => 'Partname']) }}
            {!! $errors->first('partName', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $listadofactura->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $listadofactura->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('origen') }}
            {{ Form::text('origen', $listadofactura->origen, ['class' => 'form-control' . ($errors->has('origen') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
            {!! $errors->first('origen', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>