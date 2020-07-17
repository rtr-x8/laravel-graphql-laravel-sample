<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use App\GraphQL\Scalars\EmailType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A type',
        'model' => App\User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id onf the user',
            ],
            'email' => [
                'type' => [
                    'type' => Type::EmailType(),
                    'description' => 'The Email of user',
                    'resoleve' => function($root, $args) {
                        return strtolower($root->email);
                    }
                ]
            ],
            'isMe' => [
                'type' => Type::boolean(),
                'description' => 'if user is logined, return true',
                'selectable' => false // DBから取得しない
            ]
        ];
    }
}
