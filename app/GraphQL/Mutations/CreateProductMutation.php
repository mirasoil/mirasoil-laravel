<?php

namespace App\graphql\Mutations;

use App\Product;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createProduct'
    ];

    public function type(): Type
    {
        return GraphQL::type('Product');
    }

    public function args(): array
    {
        return [

            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string()),
            ],
            'quantity' => [
                'name' => 'quantity',
                'type' => Type::nonNull(Type::int()),
            ],
            'price' => [
                'name' => 'price',
                'type' => Type::nonNull(Type::int()),
            ],
            'stock' => [
                'name' => 'stock',
                'type' => Type::nonNull(Type::int()),
            ],
            'image' => [
                'name' => 'image',
                'type' => Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::nonNull(Type::string()),
            ],
            'properties' => [
                'name' => 'properties',
                'type' => Type::nonNull(Type::string()),
            ],
            'uses' => [
                'name' => 'uses',
                'type' => Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $product = new Product();
        $product->fill($args);
        $product->save();

        return $product;
    }
}