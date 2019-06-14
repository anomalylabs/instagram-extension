<?php

return [
    'username' => [
        'required' => true,
        'env'      => 'INSTAGRAM_USERNAME',
        'type'     => 'anomaly.field_type.encrypted',
        'bind'     => 'anomaly.extension.instagram::instagram.username',
    ],
    'password' => [
        'required' => true,
        'env'      => 'INSTAGRAM_PASSWORD',
        'type'     => 'anomaly.field_type.encrypted',
        'bind'     => 'anomaly.extension.instagram::instagram.password',
    ],
];
