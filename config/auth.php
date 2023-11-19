<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'cliente',
    ],

    'guards' => [
        'cliente' => [
            'driver' => 'session',
            'provider' => 'cliente',
        ],
    
        'funcionario' => [
            'driver' => 'session',
            'provider' => 'funcionario',
        ],
    ],

    'providers' => [
        'cliente' => [
            'driver' => 'eloquent',
            'model' => App\Models\Cliente::class,
        ],
    
        'funcionario' => [
            'driver' => 'eloquent',
            'model' => App\Models\Funcionario::class,
        ],
    ],

    'passwords' => [
        'cliente' => [
            'provider' => 'cliente',
            'table' => 'password_resets', // Alterado para tabela mais genérica
            'expire' => 60,
            'throttle' => 60,
        ],
    
        'funcionario' => [
            'provider' => 'funcionario',
            'table' => 'password_resets', // Alterado para tabela mais genérica
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */
    
    'password_timeout' => 10800,

];
