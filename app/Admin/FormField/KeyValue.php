<?php

namespace App\Admin\FormField;

class KeyValue extends \Encore\Admin\Form\Field\KeyValue
{
    /**
     * @var array
     */
    protected $value = [];

    protected function setupScript()
    {
        $column = str_replace('.', '-', $this->column);

        $this->script = <<<SCRIPT

$('.{$column}-add').on('click', function () {
    var tpl = $('template.{$column}-tpl').html();
    $('tbody.kv-{$column}-table').append(tpl);
});

$('tbody').on('click', '.{$column}-remove', function () {
    $(this).closest('tr').remove();
});

SCRIPT;
    }

    /**
     * Get the view variables of this field.
     *
     * @return array
     */
    public function variables(): array
    {
        return array_merge($this->variables, [
            'id'          => $this->id,
            'name'        => $this->elementName ?: $this->formatName($this->column),
            'help'        => $this->help,
            'class'       => $this->getElementClassString(),
            'value'       => $this->value(),
            'label'       => $this->label,
            'viewClass'   => $this->getViewElementClasses(),
            'column'      => str_replace('.', '-', $this->column),
            'errorKey'    => str_replace('.', '-', $this->getErrorKey()),
            'attributes'  => $this->formatAttributes(),
            'placeholder' => $this->getPlaceholder(),
        ]);
    }
}
