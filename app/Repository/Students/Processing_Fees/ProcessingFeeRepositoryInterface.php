<?php


namespace App\Repository\Students\Processing_Fees;


interface ProcessingFeeRepositoryInterface
{
    // index show edit store update destroy
    public function index();

    public function show($id);

    public function edit($id);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
