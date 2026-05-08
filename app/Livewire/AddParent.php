<?php

namespace App\Livewire;

use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\ParentAttachment;
use App\Models\Religionist;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Livewire\Features\SupportFileUploads\WithFileUploads;


class AddParent extends Component
{
    use WithFileUploads;

    // كومبوننت Livewire الخاص بصفحة إضافة ولي أمر
    // يدير الخطوات، التحقق، الحفظ، ورفع الملفات
    public $successMessage = '',$id;


    public $catchError,$updateMode = false,$photos, $show_table = true,$Parent_id;

    public $currentStep = 1,
    // * Father Inputs
    $Email,$Password,$Name_Father,$Name_Father_en,$National_ID_Father,$Passport_ID_Father,$Phone_Father,$Job_Father,$Job_Father_en,$Nationality_Father_id,$Blood_Type_Father_id,$Address_Father,$Religion_Father_id,
    // * Mother Inputs
    $Name_Mother,$Name_Mother_en,$National_ID_Mother,$Passport_ID_Mother,$Phone_Mother,$Job_Mother,$Job_Mother_en,$Nationality_Mother_id,$Blood_Type_Mother_id,$Address_Mother,$Religion_Mother_id;

    // تحقق مباشر لخاصية واحدة أثناء الكتابة
    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName, $this->validationRules());
        //    'Email' => ['required', 'Email', Rule::unique('my_parents', 'Email')->ignore($this->Parent_id)],
        $this->validateOnly($propertyName,[
            'Email' => 'required|Email',
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Father' => 'min:10|max:10',
            'Phone_Father' => 'min:9|max:13|regex:/^([0-9\s\-\+\(\)]*)$/',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'min:9|max:13|regex:/^([0-9\s\-\+\(\)]*)$/'
            ]);
    }

    // إعادة العرض الرئيسي للمكون
    public function render()
    {
        return view('livewire.add-parent', [
            'nationalities' => Nationalitie::all(),
            'bloodTypes' => Type_Blood::all(),
            'religions' => Religionist::all(),
            'my_parents' => MyParent::all(),

        ]);
    }

    // عرض نموذج إضافة ولي أمر جديد
    public function showFormAdd()
    {
        $this->show_table = false;
    }
    // عرض جدول اولي الامور 
    public function BakeShowTable()
    {
        $this->show_table = true;
        $this->currentStep = 1;
    }

    public function goToStep($step)
    {
        $this->currentStep = $step;
    }

    public function firstStepSubmit()
    {
        // $this->validate($this->rulesStepOne());

        $this->validate([
            'Email' => 'required|unique:my_parents,Email,'.$this->id,
            'Password' => 'required|min:6|max:8',
            'Name_Father' => 'required|string',
            'Name_Father_en' => 'required|string|regex:/[A-Za-z]/',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my_parents,National_ID_Mother,'.$this->id,
            'Passport_ID_Father' => 'required|unique:my_parents,Passport_ID_Mother,'.$this->id,
            'Phone_Father' => 'required|min:9|max:13|regex:/^([0-9\s\-\+\(\)]*)$/',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        // $this->validate($this->rulesStepTwo());
        $this->validate([
            'Name_Mother' => 'required|string',
            'Name_Mother_en' => 'required|string|regex:/[A-Za-z]/',
            'National_ID_Mother' => 'required|unique:my_parents,National_ID_Mother'.$this->id,
            'Passport_ID_Mother' => 'required|unique:my_parents,Passport_ID_Mother'.$this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);
        $this->currentStep = 3;
    }

    public function submitForm()
    {
        try {
            $My_parent = new MyParent();
            // Father_INPUTS
            $My_parent->Email = $this->Email;
            $My_parent->Password = Hash::make($this->Password);
            $My_parent->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
            $My_parent->National_ID_Father = $this->National_ID_Father;
            $My_parent->Passport_ID_Father = $this->Passport_ID_Father;
            $My_parent->Phone_Father = $this->Phone_Father;
            $My_parent->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
            $My_parent->Passport_ID_Father = $this->Passport_ID_Father;
            $My_parent->Nationality_Father_id = $this->Nationality_Father_id;
            $My_parent->Blood_Type_Father_id = $this->Blood_Type_Father_id;
            $My_parent->Religion_Father_id = $this->Religion_Father_id;
            $My_parent->Address_Father = $this->Address_Father;

            // Mother_INPUTS
            $My_parent->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            $My_parent->National_ID_Mother = $this->National_ID_Mother;
            $My_parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $My_parent->Phone_Mother = $this->Phone_Mother;
            $My_parent->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
            $My_parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $My_parent->Nationality_Mother_id = $this->Nationality_Mother_id;
            $My_parent->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
            $My_parent->Religion_Mother_id = $this->Religion_Mother_id;
            $My_parent->Address_Mother = $this->Address_Mother;
            $My_parent->save();
            // =========================
            if (!empty($this->photos)) {
                foreach ($this->photos as $photo) {
                    $fileName = $photo->getClientOriginalName();
                    $photo->storeAs($this->National_ID_Father, $fileName, $disks ='parent_attachments');
                    // * -------------new--------------
                    ParentAttachment::create([
                        'file_name' =>  $fileName,
                        'parent_id' => MyParent::latest()->first()->id,
                    ]);
                }
                }
                $this->successMessage = trans('messages.success');
                $this->clearForm();
            return redirect()->to('/Add_Parent');

            // $this->currentStep = 1;
            // $this->show_table = true;
        } catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        }
    }

    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
    // *****************************(new)************************
    $My_Parent = MyParent::where('id',$id)->first();
        // $this->currentStep = 1;
        $this->Parent_id = $id;
        $this->Email = $My_Parent->Email;
        $this->Password = '';
        $this->Name_Father = $My_Parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Father = $My_Parent->getTranslation('Job_Father', 'ar');;
        $this->Job_Father_en = $My_Parent->getTranslation('Job_Father', 'en');
        $this->National_ID_Father =$My_Parent->National_ID_Father;
        $this->Passport_ID_Father = $My_Parent->Passport_ID_Father;
        $this->Phone_Father = $My_Parent->Phone_Father;
        $this->Nationality_Father_id = $My_Parent->Nationality_Father_id;
        $this->Blood_Type_Father_id = $My_Parent->Blood_Type_Father_id;
        $this->Address_Father =$My_Parent->Address_Father;
        $this->Religion_Father_id =$My_Parent->Religion_Father_id;

        $this->Name_Mother = $My_Parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Mother = $My_Parent->getTranslation('Job_Mother', 'ar');;
        $this->Job_Mother_en = $My_Parent->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother =$My_Parent->National_ID_Mother;
        $this->Passport_ID_Mother = $My_Parent->Passport_ID_Mother;
        $this->Phone_Mother = $My_Parent->Phone_Mother;
        $this->Nationality_Mother_id = $My_Parent->Nationality_Mother_id;
        $this->Blood_Type_Mother_id = $My_Parent->Blood_Type_Mother_id;
        $this->Address_Mother =$My_Parent->Address_Mother;
        $this->Religion_Mother_id =$My_Parent->Religion_Mother_id;
    }

    public function firstStepSubmit_edit()
    {
        // $this->validate($this->rulesStepOne());
        $this->updateMode = true;
        $this->currentStep = 2;
    }

    public function secondStepSubmit_edit()
    {
        // $this->validate($this->rulesStepTwo());
        $this->updateMode = true;
        $this->currentStep = 3;
    }

    public function submitForm_edit()
    {
    // *************(new)**************
        if ($this->Parent_id){
            $parent = MyParent::findOrFail($this->Parent_id);
            $parent->update([
            // Father_INPUTS
            'Email' => $this->Email,
            'Password' => Hash::make($this->Password),
            'Name_Father' => ['en' =>  $this->Name_Father_en, 'ar' =>  $this->Name_Father],
            'National_ID_Father' => $this->National_ID_Father,
            'Passport_ID_Father' => $this->Passport_ID_Father,
            'Phone_Father' => $this->Phone_Father,
            'Job_Father' => ['en' =>  $this->Job_Father_en, 'ar' =>  $this->Job_Father],
            'Nationality_Father_id' => $this->Nationality_Father_id,
            'Blood_Type_Father_id' => $this->Blood_Type_Father_id,
            'Religion_Father_id' => $this->Religion_Father_id,
            'Address_Father' => $this->Address_Father,

            

            // Mother_INPUTS
            'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother],
            'National_ID_Mother' => $this->National_ID_Mother,
            'Passport_ID_Mother' => $this->Passport_ID_Mother,
            'Phone_Mother' => $this->Phone_Mother,
            'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother],
            'Nationality_Mother_id' => $this->Nationality_Mother_id,
            'Blood_Type_Mother_id' => $this->Blood_Type_Mother_id,
            'Religion_Mother_id' => $this->Religion_Mother_id,
            'Address_Mother' => $this->Address_Mother,


            // 'file_name' => $fileName,
            // 'parent_id' => ,
        
                ]);

            
                $this->successMessage = trans('messages.Update');
                $this->clearForm();
            return redirect()->to('/Add_Parent');
        }
        return redirect()->to('/Add_Parent');
    }

    public function delete($id)
    {
        $ass = ParentAttachment::where('id',$id)->pluck('parent_id');
        if($ass->count() == 0){
            MyParent::where('id','=',$id)->delete();
            // $this->show_table = true;
            $this->successMessage = trans('messages.Delete');
            return redirect()->to('/Add_Parent');

            }else{
            // $this->show_table= true;
            $this->successMessage = trans('messages.Delete_prants_error');
            return redirect()->back();



        }
        return redirect()->to('/Add_Parent');
        // ******************new*************
    }


    // protected function rulesStepOne()
    // {
    //     return [
    //         'Email' => ['required', 'email', Rule::unique('my_parents', 'Email')->ignore($this->Parent_id)],
    //         'Password' => $this->updateMode ? [] : ['required'],
    //         'Name_Father' => 'required',
    //         'Name_Father_en' => 'required',
    //         'Job_Father' => 'required',
    //         'Job_Father_en' => 'required',
    //         'National_ID_Father' => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]{10}$/', Rule::unique('my_parents', 'National_ID_Father')->ignore($this->Parent_id)],
    //         'Passport_ID_Father' => ['required', 'min:10', 'max:10', Rule::unique('my_parents', 'Passport_ID_Father')->ignore($this->Parent_id)],
    //         'Phone_Father' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
    //         'Nationality_Father_id' => 'required',
    //         'Blood_Type_Father_id' => 'required',
    //         'Religion_Father_id' => 'required',
    //         'Address_Father' => 'required',
    //     ];
    // }

    // protected function rulesStepTwo()
    // {
    //     return [
    //         'Name_Mother' => 'required',
    //         'Name_Mother_en' => 'required',
    //         'National_ID_Mother' => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]{10}$/', Rule::unique('my_parents', 'National_ID_Mother')->ignore($this->Parent_id)],
    //         'Passport_ID_Mother' => ['required', 'min:10', 'max:10', Rule::unique('my_parents', 'Passport_ID_Mother')->ignore($this->Parent_id)],
    //         'Phone_Mother' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
    //         'Job_Mother' => 'required',
    //         'Job_Mother_en' => 'required',
    //         'Nationality_Mother_id' => 'required',
    //         'Blood_Type_Mother_id' => 'required',
    //         'Religion_Mother_id' => 'required',
    //         'Address_Mother' => 'required',
    //     ];
    // }

    // protected function rulesStepThree()
    // {
    //     return [
    //         'photos.*' => 'nullable|image|max:2048',
    //     ];
    // }

    // protected function validationRules()
    // {
    //     // return array_merge($this->rulesStepOne(), $this->rulesStepTwo(), $this->rulesStepThree());
    // }

    protected function clearForm()
    {
        $this->Email = '';
        $this->Password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father = '';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father = '';
        $this->Religion_Father_id = '';

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother = '';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Address_Mother = '';
        $this->Religion_Mother_id = '';
        // $this->photos = [];
        // $this->Parent_id = null;
        // $this->catchError = null;
        // $this->successMessage = '';
    }

     public function back($step)
    {
        // $this->currentStep = $step;
        IF($step==0){
            $this->show_table = true;
        }
        else{
            $this->currentStep = $step;
        }
    }

}
