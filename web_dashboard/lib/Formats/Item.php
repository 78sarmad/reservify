<?php
class Item
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'item_name' => 'Item Name',
            'item_price' => 'Price',
            'item_rating' => 'Rating',
            'item_stock' => 'Stock'
        ];

        return $ordering;
    }
}
?>
