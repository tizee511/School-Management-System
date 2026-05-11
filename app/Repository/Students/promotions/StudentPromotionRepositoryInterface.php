<?php
namespace App\Repository\Students\promotions;

interface StudentPromotionRepositoryInterface
{
    // Get_promotions
    public function Get_promotions();

    // Store promotions
    public function Store_promotions($request);
    
    // Create promotions
    public function create_promotions_students();
    // Delete promotions
    public function destroy_promotions($request);

}
