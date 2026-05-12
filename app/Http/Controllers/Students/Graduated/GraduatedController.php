<?php

namespace App\Http\Controllers\Students\Graduated;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Repository\Students\Graduated\StudentGraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    protected $Graduated;
    public function __construct(StudentGraduatedRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated;
    }
    public function index()
    {
        // return "mmmmmmmmmmmmmmmmm";
        return $this->Graduated->Get_graduated_students();
    }

    public function create()
    {
        return  $this->Graduated->create_graduated_student();
    }

    public function store(Request $request)
    {
        return $this->Graduated->SoftDelete($request);
    }

    public function update(Request $request)
    {
        return $this->Graduated->ReturnData($request);
    }

    public function destroy(Request $request)
    {
        return $this->Graduated->destroy($request);
    }
}
