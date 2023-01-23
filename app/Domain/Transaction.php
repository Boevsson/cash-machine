<?php
namespace App\Domain;

interface Transaction
{
    /**
     * Validate Inputs
     */
    public function validate();

    /**
     * Return total amount
     */
    public function amount();

    /**
     * Return Inputs
     */
    public function inputs();
}
