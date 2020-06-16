<?php
class Customer
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
            'customer_fullname' => 'Full Name',
            'customer_email' => 'Email',
            'customer_contact' => 'Contact',
        ];

        return $ordering;
    }
}
?>
