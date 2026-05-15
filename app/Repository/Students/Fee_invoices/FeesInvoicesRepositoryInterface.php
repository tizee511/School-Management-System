<?php
namespace App\Repository\Students\Fee_invoices;

interface FeesInvoicesRepositoryInterface
{
    // Get_all_Fees
    // public function Get_all_Fees();

    // // Create Fees
    // public function create_fee();

    // // Store Fees
    // public function store_fees($request);
    
    // // Fees Edit
    // public function Fees_Edit($id);
    
    // public function Update_Fees($request);

    // public function Destroy_Fee($request);

// ------------------------------

    public function index ();
    public function show ($id);
    public function edit ($id);
    public function store ($request);
    public function update ($request);
    public function destroy ($request);
    // ======================================
    // // Create promotions
    // public function create_promotions_students();
    // // Delete promotions
    // public function destroy_promotions($request);

}
