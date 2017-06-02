<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => true,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AIzaSyCo5xFM5H--dG9scIUhTmeT8d_Ut4C4-uo'),
        'sender_id' => env('FCM_SENDER_ID', 'fir-notificationibvn-22e39'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
