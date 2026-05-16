<?php

namespace App\Http\Controllers\Students\Processing;

use App\Http\Controllers\Controller;
use App\Repository\Students\Processing_Fees\ProcessingFeeRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{
    public  $processing_fees;
        public function __construct(ProcessingFeeRepositoryInterface $processing_fees)
        {
            $this->processing_fees = $processing_fees;
        }
   
    public function index()
    {
       return  $this->processing_fees->index();    
       
    } 
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        return $this->processing_fees->store($request);
    }

    public function show( $id)
    {
        return $this->processing_fees->show($id);
    }
    public function edit( $id)
    {
        return $this->processing_fees->edit($id);
    }

    public function update(Request $request)
    {
        return $this->processing_fees->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->processing_fees->destroy($request);
    }
}
