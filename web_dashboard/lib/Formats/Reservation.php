<?php
class Reservation
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
            'customer_email' => 'Customer Email',
            'item_name' => 'Item Name',
            'reservation_type' => 'Reservation Type',
        ];

        return $ordering;
    }
}
?>
