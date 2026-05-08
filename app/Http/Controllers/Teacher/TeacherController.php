<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Models\Section;
use App\Models\Teacher;
use App\Repository\Teachers\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher){
        $this->Teacher = $Teacher;
    }

    public function index()
    {
        return $this->Teacher->getAllTeachers();
    }

    public function create()
    {
        return $this->Teacher->Create_Teachers();
    }

    public function store(StoreTeachers $request)
    {
        return $this->Teacher->StoreTeachers($request);
    }

    public function edit($id)
    {
        
        return $this->Teacher->editTeachers($id);
    }
    public function update(StoreTeachers $request)
    {
        return $this->Teacher->UpdateTeachers($request);
    }
    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
}
