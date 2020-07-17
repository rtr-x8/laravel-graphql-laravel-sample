<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use App\User;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'users',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('user'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::id(),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::String()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /*
        if (isset($args['id'])) {
            return User::where('id' , $args['id'])->get();
        }

        if (isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }
        */

        return User::all();
    }
}
