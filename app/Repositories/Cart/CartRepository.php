<?php

namespace App\Repositories\Cart;

use App\Models\Service;

use Illuminate\Support\Collection;

interface CartRepository
{
    public function get() : Collection;

    public function where($id) : Collection;

    public function add(Service $service, $quantity = 1,$addons, $addons_price );

    public function update($id, $quantity);

    public function updateAddons($id,$addons,$addons_price);

    public function delete($id);

    public function empty();

    public function total();
}
