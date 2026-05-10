<?php
namespace App\Http\Controllers\Students\promotions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Students\promotions\StudentPromotionRepositoryInterface;


class PromotionController extends Controller 
{
    protected $Promotion;
    public function __construct(StudentPromotionRepositoryInterface $Promotion)
    {
        $this->Promotion = $Promotion;
    }
    public function index()
    {
        return $this->Promotion->Get_promotions();
    }
    public function store(Request $request)
    {
        return $this->Promotion->Store_promotions($request);
    }
}