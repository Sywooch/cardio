<?php

namespace app\components\helpers;

use Yii;
use yii\helpers\Html;

/**
 * Overrides some of the functions in BaseHtml.
 */
class CustomHtml extends Html
{

    /**
     * @inheritdoc
     */
    public static function checkboxList($name, $selection = null, $items = [], $options = [])
    {
        if (substr($name, -2) !== '[]') {
            $name .= '[]';
        }

        $formatter = isset($options['item']) ? $options['item'] : null;
        $itemOptions = isset($options['itemOptions']) ? $options['itemOptions'] : [];
        $encode = !isset($options['encode']) || $options['encode'];
        $lines = [];
        $index = 0;
        foreach ($items as $value => $label) {
            $checked = $selection !== null &&
                (!is_array($selection) && !strcmp($value, $selection)
                    || is_array($selection) && in_array($value, $selection));
            if ($formatter !== null) {
                $lines[] = call_user_func($formatter, $index, $label, $name, $checked, $value);
            } else {
                $lines[] = static::checkbox($name, $checked, array_merge($itemOptions, [
                    'value' => $value,
                    'label' => $encode ? static::encode($label) : $label,
                ]));
            }
            $index++;
        }

        if (isset($options['unselect']) && $options['unselect'] !== false) {
            // Overriden here to avoid additional hidden input
            // add a hidden field so that if the list box has no option being selected, it still submits a value
            $name2 = substr($name, -2) === '[]' ? substr($name, 0, -2) : $name;
            $hidden = static::hiddenInput($name2, $options['unselect']);
        } else {
            $hidden = '';
        }
        $separator = isset($options['separator']) ? $options['separator'] : "\n";

        $tag = isset($options['tag']) ? $options['tag'] : 'div';
        unset($options['tag'], $options['unselect'], $options['encode'], $options['separator'], $options['item'], $options['itemOptions']);

        return $hidden . static::tag($tag, implode($separator, $lines), $options);
    }

    /**
     * Display radio inputs in for of buttons
     */
    public static function activeButtonRadioList($model, $field, $items, $view)
    {
        $html = Html::activeRadioList($model, $field, $items,
            [
                'unselect' => ($model->isNewRecord && !Yii::$app->request->isPost) ? '1' : $model->clinical,
                'item' => function($index, $label, $name, $checked, $value) {
                    $options = [
                        'checked' => (boolean) $checked,
                    ];
                    $label = Yii::t('modules/forms/app', $label);

                    $class = "btn btn-primary btn_custom_1";
                    if ($checked) {
                        $class .= " active";
                    }
                    $html = Html::a($label, '#', [
                        'class' => $class,
                        'data-value' => $value,
                    ]);
                    return $html;
                }
            ]
        );

        $class = explode('\\', get_class($model));
        $className = array_pop($class);
        $inputName = $className . '[' . $field . ']';
        $inputId = '#' . strtolower($className) . '-' . $field;
        $view->registerJs(
            "
            var links = $('$inputId a.btn_custom_1');
            var hiddenInput = $('input[name=\"$inputName\"]');

            $(links).on('click', function(e) {
                e.preventDefault();
                links.removeClass('active');
                $(this).addClass('active');
                var value = $(this).data('value');
                hiddenInput.val(value);
            });
            "
        );

        return $html;
    }

}
