<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Http\Requests\CreateAdRequest;
use App\Http\Requests\ItemAdRequest;
use App\Http\Requests\ListAdRequest;

class AdsController extends Controller
{
    public function item(ItemAdRequest $request)
    {
        $data = $request->validated();
        return response($this->getItem($data), 200);
    }

    public function list(ListAdRequest $request)
    {
        $data = $request->validated();
        return response($this->getList($data), 200);
    }

    public function create(CreateAdRequest $request)
    {
        $data = $request->validated();

        $data = $this->cleanPhotos($data);
        $item = $this->createItem($data);

        return $item ? response($item->id, 200) : response('Creating Error', 500);
    }

    public function getItem(Array $data = [])
    {
        $items = new Ads();

        if($data) $items = $this->checkForFileds($items, $data);

        $items = $items->find($data['id']);

        return $items;
    }

    public function getList(Array $data = [])
    {
        $items = new Ads();

        if($data) $items = $this->checkForOrder($items, $data);

        $items = $items->paginate(10);

        return $items;
    }

    public function createItem($data)
    {
        return Ads::create($data);
    }

    protected function cleanPhotos(Array $data): Array
    {
        $data['photo'] = $data['photos'][0];
        $data['photos'] = array_slice($data['photos'], 1);
        $data['photos'] = implode(',', $data['photos']);
        return $data;
    }

    protected function checkForFileds(Object $items, Array $data): Object
    {
        if(isset($data['fields']) && $data['fields']) {
            $items = $items->all();
        } else {
            $items = $items->short();
        }

        return $items;
    }

    protected function checkForOrder(Object $items, Array $data): Object
    {
        if(isset($data['order']) || isset($data['sort'])) {
            $sort = $data['sort'] ?? 'desc';
            $order = $data['order'] ?? 'created_at';
            $items = $items->orderBy($order, $sort);
        } else {
            $items = $items->orderBy('created_at', 'desc');
        }

        return $items;
    }
}
