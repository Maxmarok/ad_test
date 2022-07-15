<?php

namespace Tests\Unit;

use App\Ads;
use App\Http\Controllers\AdsController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() :void
    {
        parent::setUp();
    }

    public function testItem()
    {
        $ads = factory(Ads::class)->create();
        $list = new AdsController();
        $data = $list->getItem(['id' => $ads->id]);
        $this->assertEquals($data->id, $ads->id);
    }

    public function testList()
    {
        $count = 100;
        $ads = factory(Ads::class, $count)->create();
        $list = new AdsController();
        $data = $list->getList();
        $this->assertEquals($data->perPage(), 10);
        $this->assertEquals($data->total(), $count);
    }

    public function testCreate()
    {
        $arr = [
            'title' => 'Test',
        ];

        $list = new AdsController();
        $data = $list->createItem($arr);

        $this->assertEquals($data->title, $arr['title']);
    }
}
