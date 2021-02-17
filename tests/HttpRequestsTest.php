<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class HttpRequestsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Http::fake([
        //     'jsonplaceholder.*' => Http::response([
        //         'userId' => 123
        //     ], 500, [
        //         'X-CODERS-TAPE' => 123
        //     ]),
        //     'example.*' => Http::response([
        //         'userId' => 123
        //     ], 500, [
        //         'X-CODERS-TAPE' => 123
        //     ])
        // ]);

        Http::fake([
            'jsonplaceholder.*' => Http::sequence()
            ->push([
                'userId' => 123
            ])
            -push([
                'userId' => 456
            ]),
        ]);
    }

    public function playing_around_with_requests_in_laravel_7()
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [    //1st param: retry 2 times, 2nd param: how long wait between retries
            'userId' => 123
        ]);

        // $response = Http::post('https://example.com', [    //1st param: retry 2 times, 2nd param: how long wait between retries
        //     'userId' => 456
        // ]);

        Http::assertSent(function ($request){
            return $request->url() == 'https://jsonplaceholder.typicode.com/posts'
                && $request['userId'] == 123;
        });

        // dd($response->json());
        // dd($response->json());
        // $response->assertStatus(200);
    }
}