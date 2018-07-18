<?php
/**
 * Push Plugin example config
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 */
return [
    'Push' => [
        'adapters' => [
            'Fcm' => [
                'api' => [
                    'key' => 168801535780,
                    'url' => 'https://fcm.googleapis.com/fcm/send',
                ],
            ],
        ],
    ],
];
