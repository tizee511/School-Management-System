<?php

namespace App\Http\Controllers;

use App\Repository\Subjects\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $Subject;
    public function __construct (SubjectRepositoryInterface $Subject)
    {
        $this->Subject = $Subject;
    }
    public function index()
    {
        return $this->Subject->getAllSubjects();

    }
    public function create()
    {
        return $this->Subject->Create_Subjects();
    }
    public function store(Request $request)
    {
        return $this->Subject->StoreSubjects($request);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return $this->Subject->editSubjects($id);
    }

    public function update(Request $request)
    {
        return $this->Subject->UpdateSubjects($request);
    }

    public function destroy(Request $request)
    {
        return $this->Subject->DeleteSubjects($request);
    }
}
