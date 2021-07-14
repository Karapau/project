<?php

return [
    'mode' => 'test',
    'host' => env('SIBS_HOST', 'https://test.oppwa.com/'),
    'version' => 'v1',
    'authentication' => [
        'userId' => env('SIBS_AUTH_USERID', '681275a2-4647-4e95-b090-98637e7a2bd0'),
        'password' => env('SIBS_AUTH_PASSWORD', 'G5wP5TzF5k'),
        'entityId' => env('SIBS_AUTH_ENTITYID', '24000'),
        'token' => env('SIBS_AUTH_TOKEN', 'Bearer eyJhbGciOiJSUzI1NiJ9.eyJqdGkiOiJhZDg2NjUyYi0xY2UxLTRkNTUtOWZmMC00NmI5MDljNThlODAiLCJleHAiOjAsIm5iZiI6MCwiaWF0IjoxNjI1NTg0NjU4LCJpc3MiOiJodHRwczovL3FseS5zaXRlMi5zc28uc3lzLnNpYnMucHQ6NDQzL2F1dGgvcmVhbG1zL1FMWS5TUEcuQVBJIiwiYXVkIjoiUUxZLlNQRy5BUEktQ0xJIiwic3ViIjoiZDBkODViMTItMDM5Zi00ZDBhLThmNmYtY2QzOTNkNDA1YWQwIiwidHlwIjoiT2ZmbGluZSIsImF6cCI6IlFMWS5TUEcuQVBJLUNMSSIsInNlc3Npb25fc3RhdGUiOiI2MDBhYzQzMS0zZWU2LTRhYjgtOTQ1ZC02MTdhOWQ0ZTZiMWEiLCJjbGllbnRfc2Vzc2lvbiI6IjZiZTVjZmJlLTQxNjctNDM3Yi04ZTA5LTRjNGJkMDU2N2NmYSIsInJlYWxtX2FjY2VzcyI6eyJyb2xlcyI6WyJvZmZsaW5lX2FjY2VzcyJdfSwicmVzb3VyY2VfYWNjZXNzIjp7ImFjY291bnQiOnsicm9sZXMiOlsibWFuYWdlLWFjY291bnQiLCJ2aWV3LXByb2ZpbGUiXX19fQ.SmYyR2JVAoArmCGz9nmHG1ZFRhzIY4a9y21Ys-f9rR5vBeXgoirF78a0mCYR7mhQQgdoSsG8o7JhKKGyBIVG7p4RYpVkIN4CbC4pPQ_2_7-xL6t52g_GLysVXR9J6nXWwuVLqjKp271_PpVKZiT9QaOQKgKvUjMy7sT3NmM2Pvo_7SYLrv03eQelD-0EpbO6Ns2W1NBpr5nCckKSIb9j6O0rTWvykZObhn1PBpAP_yPsjF2ppAlMNcXUJTkccgEQt4dX66-6s3UdblRzkIVPbLFwIi6C69MhTP1W1buX1dKYZBOlb80Bh9Ylq6aSqes5Q1xlfQ68mli20qDaT0jUQQ.eyJtYyI6Ijk5OTk5OTkiLCJ0YyI6IjUwOTk5In0=.7C4EEA6BEC88FA25E535018A9099609689C20C690819C3EE0DFC9ADC7385D7B5'),
    ],
    'entity' => env('SIBS_ENTITY', '21075'),

    /*
     * After completing your SIBS registration you will receive a key to decrypt its notifications via webhook.
     */
    'webHook' => env('SIBS_WEBHOOK_KEY', '')
];
