
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="col-sm-12 mt-4 ">
        <div class="form-group col-sm-4 "  style="float: left">
            {{ Form::label('guia') }}
            {{ Form::text('guia', $depositogracca->guia, ['class' => 'form-control' . ($errors->has('guia') ? ' is-invalid' : ''), 'placeholder' => 'Guia']) }}
            {!! $errors->first('guia', '<div class="invalid-feedback">:message</p>') !!}
        </div>
       
        <div class="form-group col-sm-4"  style="float: left">
            {{ Form::label('numeroFactura') }}
            {{ Form::text('numeroFactura', $depositogracca->numeroFactura, ['class' => 'form-control' . ($errors->has('numeroFactura') ? ' is-invalid' : ''), 'placeholder' => 'Numerofactura']) }}
            {!! $errors->first('numeroFactura', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group col-sm-4"  style="float: left">
            {{ Form::label('producto') }}
            {{ Form::text('producto', $depositogracca->producto, ['class' => 'form-control' . ($errors->has('producto') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
            {!! $errors->first('producto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group col-sm-4"  style="float: left">
            {{ Form::label('modelo') }}
            {{ Form::text('modelo', $depositogracca->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group col-sm-4"  style="float: left">
            {{ Form::label('partCode') }}
            {{ Form::text('partCode', $depositogracca->partCode, ['class' => 'form-control' . ($errors->has('partCode') ? ' is-invalid' : ''), 'placeholder' => 'Partcode']) }}
            {!! $errors->first('partCode', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group col-sm-4"  style="float: left">
            {{ Form::label('codigoAlternativo') }}
            {{ Form::text('codigoAlternativo', $depositogracca->codigoAlternativo, ['class' => 'form-control' . ($errors->has('codigoAlternativo') ? ' is-invalid' : ''), 'placeholder' => 'Codigoalternativo']) }}
            {!! $errors->first('codigoAlternativo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group col-sm-4"  style="float: left">
            {{ Form::label('partName') }}
            {{ Form::text('partName', $depositogracca->partName, ['class' => 'form-control' . ($errors->has('partName') ? ' is-invalid' : ''), 'placeholder' => 'Partname']) }}
            {!! $errors->first('partName', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group col-sm-4"  style="float: left">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $depositogracca->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group col-sm-4"  style="float: left">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $depositogracca->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group col-sm-4"  style="float: left">
            {{ Form::label('origen') }}
            {{ Form::text('origen', $depositogracca->origen, ['class' => 'form-control' . ($errors->has('origen') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
            {!! $errors->first('origen', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        </div>
    </div> 
   
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    
</div>
     