<?php
return
[

    'url' => env('APP_URL=http://localhost:8080
    ', ''),
    'form'=>
    [
        'hobby'=>
        [
             'ギター',
             '料理',
             '釣り',
             '旅行',
        ],

        'food'=>
        [
            'たこ焼き',
            'パフェ',
            'タピオカ',
            'ラーメン',

        ],

        'area'=>
        [
            '東京',
            '富山',
            '千葉',
            '埼玉',
        ],


    ],

    'mail' =>[

        'admin'=>
        [
            'subject' => '問い合わせがありました',
            'course2'  =>'プレミアム',
            'course3'  =>'プラチナ',
            'course4'  =>'ゴールド',
        ],

        'Inquirer'=>
        [
            'subject' => 'お問い合わせを受付ました',
            'course2'  =>'プレミアム',
            'course3'  =>'プラチナ',
            'course4'  =>'ゴールド',
        ],


    ],
];