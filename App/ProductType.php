<?php

namespace AlanKent\GraphQL\App;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class ProductType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Product',
            'fields' => [
                'id' => Type::int(),
                'sku' => Type::string(),
                'name' => Type::string(),
                'attributeSetId' => Type::int(),
                'price' => Type::float(),
                'status' => Type::int(),
                'visibility' => Type::int(),
                'typeId' => Type::string(),
                'createdAt' => Type::string(),
                'updatedAt' => Type::string(),
                'weight' => Type::float(),
            ],
            'resolveField' => function($val, $args, $context, ResolveInfo $info) {
                $getFn = 'get' . ucfirst($info->fieldName);
                return $val->$getFn();
            }
        ];
        parent::__construct($config);
    }
}
