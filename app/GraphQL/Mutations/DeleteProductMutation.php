<?php

namespace App\graphql\Mutations;

use App\Product;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteProduct',
        'description' => 'Delete a product'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }


    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $product = Product::findOrFail($args['id']);

        return  $product->delete() ? true : false;
    }
}