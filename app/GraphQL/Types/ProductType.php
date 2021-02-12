<?php

namespace App\GraphQL\Types;

use App\Product;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'Collection of products',
        'model' => Product::class
    ];


    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of a particular product',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the product',
            ],
            'quantity' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The quantity of the product',
            ],
            'price' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The price of the product',
            ],
            'stock' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The stock of the product',
            ],
            'image' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The product\'s image',
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The description of the product',
            ],
            'properties' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The product\'s properties',
            ],
            'uses' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The product\'s uses',
            ]
        ];
    }
}