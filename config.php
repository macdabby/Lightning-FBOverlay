<?php

return [
    'package' => [
        'module' => 'FBOverlay',
        'version' => '1.0',
    ],
    'routes' => [
        'static' => [
            'overlay' => 'Modules\\FBOverlay\\Pages\\Overlay',
            'overlay/complete' => 'Modules\\FBOverlay\\Pages\\Complete',
            'overlay/preview' => 'Modules\\FBOverlay\\Pages\\Preview',
        ]
    ],
];
