<?php

return [
    'theme' => \PowerComponents\LivewirePowerGrid\Themes\Tailwind::class,

    'plugins' => [
        /*
         * https://flatpickr.js.org
         */
        'flatpickr' => [
            'locales' => [
                'pt_BR' => [
                    'locale'     => 'pt',
                    'dateFormat' => 'd/m/Y H:i',
                    'enableTime' => true,
                    'time_24hr'  => true,
                ],
            ],
        ],

        'select' => [
            'default' => 'tom',

            /* TomSelect Options: https://tom-select.js.org */
            'tom' => [
                'plugins' => [
                    'clear_button' => [
                        'title' => 'Remove all selected options',
                    ],
                ],
            ],

            /*
             * Slim Select options
             * https://slimselectjs.com/
             */
            'slim' => [
                'settings' => [
                    'alwaysOpen' => false,
                ],
            ],
        ],
    ],

    'filter' => 'inline',
    'cached_data' => true,
    'check_version' => false,
    'exportable' => [
        'default'      => 'openspout_v4',
        'openspout_v4' => [
            'xlsx' => \PowerComponents\LivewirePowerGrid\Components\Exports\OpenSpout\v4\ExportToXLS::class,
            'csv'  => \PowerComponents\LivewirePowerGrid\Components\Exports\OpenSpout\v4\ExportToCsv::class,
        ],
        'openspout_v3' => [
            'xlsx' => \PowerComponents\LivewirePowerGrid\Components\Exports\OpenSpout\v3\ExportToXLS::class,
            'csv'  => \PowerComponents\LivewirePowerGrid\Components\Exports\OpenSpout\v3\ExportToCsv::class,
        ],
    ],
];
