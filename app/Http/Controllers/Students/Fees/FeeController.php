<?php

namespace App\Http\Controllers\Students\Fees;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Repository\Students\Fees\FeesRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $Fees;
    public function __construct(FeesRepositoryInterface $Fees)
    {
        $this->Fees = $Fees;
    }
    public function index()
    {
        return  $this->Fees->Get_all_Fees();
    }
    
    public function create()
    {
        return $this->Fees->create_fee();
    }

    public function store(Request $request)
    {
        return $this->Fees->store_fees($request);
    }

    public function show(Fee $fee)
    {
        //
    }

    public function edit($id)
    {
        return $this->Fees->Fees_Edit($id);
    }

    public function update(Request $request)
    {
        return $this->Fees->Update_Fees($request);
    }

    public function destroy(Request $request)
    {
        return $this->Fees->Destroy_Fee($request);
    }
}
