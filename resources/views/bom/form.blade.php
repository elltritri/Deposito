<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('partCode') }}
            {{ Form::text('partCode', $bom->partCode, ['class' => 'form-control' . ($errors->has('partCode') ? ' is-invalid' : ''), 'placeholder' => 'Partcode']) }}
            {!! $errors->first('partCode', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codigoAlternativo') }}
            {{ Form::text('codigoAlternativo', $bom->codigoAlternativo, ['class' => 'form-control' . ($errors->has('codigoAlternativo') ? ' is-invalid' : ''), 'placeholder' => 'Codigoalternativo']) }}
            {!! $errors->first('codigoAlternativo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('partName') }}
            {{ Form::text('partName', $bom->partName, ['class' => 'form-control' . ($errors->has('partName') ? ' is-invalid' : ''), 'placeholder' => 'Partname']) }}
            {!! $errors->first('partName', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $bom->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $bom->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('origen') }}
            {{ Form::text('origen', $bom->origen, ['class' => 'form-control' . ($errors->has('origen') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
            {!! $errors->first('origen', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>