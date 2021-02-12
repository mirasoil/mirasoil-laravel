<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name' => "Sirop natural ",
                'quantity' => "330",
                'price' => "25",
                'stock' => "32",
                'image' => "sirop.jpg",
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
                    pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. 
                    Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, 
                    in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent
                    per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut 
                    vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor.
                    Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat 
                    faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. 
                    Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. 
                    Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, 
                    non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.",
                'properties' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
                        pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. 
                        Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, 
                        in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent
                        per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut 
                        vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor.
                        Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat 
                        faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. 
                        Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. 
                        Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, 
                        non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.",
                'uses' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
                        pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. 
                        Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, 
                        in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent
                        per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut 
                        vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor.
                        Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat 
                        faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. 
                        Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. 
                        Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, 
                        non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.",
            ],
            [
                'name' => "Brichete de foc",
                'quantity' => "1",
                'price' => "50",
                'stock' => "2",
                'image' => "brichete1.jpg",
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
                    pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. 
                    Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, 
                    in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent
                    per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut 
                    vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor.
                    Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat 
                    faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. 
                    Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. 
                    Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, 
                    non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.",
                'properties' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
                        pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. 
                        Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, 
                        in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent
                        per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut 
                        vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor.
                        Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat 
                        faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. 
                        Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. 
                        Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, 
                        non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.",
                'uses' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
                        pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. 
                        Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, 
                        in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent
                        per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut 
                        vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor.
                        Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat 
                        faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. 
                        Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. 
                        Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, 
                        non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.",
            ],
            [
                'name' => "Buchete florale",
                'quantity' => "1",
                'price' => "25",
                'stock' => "3",
                'image' => "buchete3.jpg",
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
                    pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. 
                    Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, 
                    in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent
                    per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut 
                    vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor.
                    Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat 
                    faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. 
                    Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. 
                    Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, 
                    non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.",
                'properties' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
                        pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. 
                        Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, 
                        in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent
                        per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut 
                        vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor.
                        Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat 
                        faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. 
                        Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. 
                        Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, 
                        non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.",
                'uses' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, 
                        pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. 
                        Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, 
                        in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent
                        per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut 
                        vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor.
                        Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat 
                        faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. 
                        Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. 
                        Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, 
                        non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.",
            ],
        ]);
    }
}
