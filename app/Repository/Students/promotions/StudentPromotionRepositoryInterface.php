<?php
namespace App\Repository\Students\promotions;

interface StudentPromotionRepositoryInterface
{
    // Get_promotions
    public function Get_promotions();

    // Store promotions
     public function Store_promotions($request);

}
