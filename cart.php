<?php

ini_set('unserialize_callback_func', 'mycallback');

class cart
{
    public $id, $productname, $price, $discount, $stock, $photo, $qty, $subcat;

    public function __construct($id, $productname, $price, $discount, $stock, $photo, $qty, $subcat)
    {
        $this->id = $id;
        $this->productname = $productname;
        $this->price = $price;
        $this->discount = $discount;
        $this->stock = $stock;
        $this->photo = $photo;
        $this->qty = $qty;
        $this->subcat = $subcat;
    }
}