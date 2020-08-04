<div class="form-group">
    {{ Form::label($name, $attributes['label'], ['class' => 'control-label']) }}
    {{ Form::email($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>