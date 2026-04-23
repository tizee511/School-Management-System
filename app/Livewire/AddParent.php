<?php

namespace App\Livewire;

use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\ParentAttachment;
use App\Models\Religionist;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;
    // كومبوننت Livewire الخاص بصفحة إضافة ولي أمر
    // يدير الخطوات، التحقق، الحفظ، ورفع الملفات
    // * columns Fathers
    public $successMessage = '', $catchError, $updateMode = false,
        $photos = [], $show_table = true, $Parent_id, $currentStep = 1,
        $Email, $Password, $Name_Father, $Name_Father_en, $National_ID_Father,
        $Passport_ID_Father, $Phone_Father, $Job_Father, $Job_Father_en, $Nationality_Father_id,
        $Blood_Type_Father_id, $Address_Father, $Religion_Father_id;
    // * Column Mothers
    public $Name_Mother, $Name_Mother_en, $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en, $Nationality_Mother_id,
        $Blood_Type_Mother_id, $Address_Mother, $Religion_Mother_id;

    // تحقق مباشر لخاصية واحدة أثناء الكتابة
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->validationRules());
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
        $this->clearForm();
        $this->updateMode = false;
        $this->show_table = false;
        $this->currentStep = 1;
    }

    public function goToStep($step)
    {
        if (!in_array($step, [1, 2, 3])) {
            return;
        }
        $this->currentStep = $step;
    }
    public function firstStepSubmit()
    {
        $this->validate($this->rulesStepOne());
        $this->currentStep = 2;
    }
    public function secondStepSubmit()
    {
        $this->validate($this->rulesStepTwo());
        $this->currentStep = 3;
    }

    public function submitForm()
    {
        $this->validate(array_merge($this->rulesStepOne(), $this->rulesStepTwo(), $this->rulesStepThree()));

        try {
            $parent = MyParent::create([
                'Email' => $this->Email,
                'Password' => Hash::make($this->Password),
                'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],
                'National_ID_Father' => $this->National_ID_Father,
                'Passport_ID_Father' => $this->Passport_ID_Father,
                'Phone_Father' => $this->Phone_Father,
                'Job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father],
                'Nationality_Father_id' => $this->Nationality_Father_id,
                'Blood_Type_Father_id' => $this->Blood_Type_Father_id,
                'Religion_Father_id' => $this->Religion_Father_id,
                'Address_Father' => $this->Address_Father,
                'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother],
                'National_ID_Mother' => $this->National_ID_Mother,
                'Passport_ID_Mother' => $this->Passport_ID_Mother,
                'Phone_Mother' => $this->Phone_Mother,
                'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother],
                'Nationality_Mother_id' => $this->Nationality_Mother_id,
                'Blood_Type_Mother_id' => $this->Blood_Type_Mother_id,
                'Religion_Mother_id' => $this->Religion_Mother_id,
                'Address_Mother' => $this->Address_Mother,
            ]);

            if (!empty($this->photos)) {
                foreach ($this->photos as $photo) {
                    $fileName = $photo->getClientOriginalName();
                    $photo->storeAs($this->National_ID_Father, $fileName, 'parent_attachments');

                    ParentAttachment::create([
                        'file_name' => $fileName,
                        'parent_id' => $parent->id,
                    ]);
                }
            }

            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->show_table = true;
            $this->currentStep = 1;
        } catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        }
    }

    public function edit($id)
    {
        $parent = MyParent::findOrFail($id);
        $this->show_table = false;
        $this->updateMode = true;
        $this->currentStep = 1;
        $this->Parent_id = $id;
        $this->Email = $parent->Email;
        $this->Password = '';
        $this->Name_Father = $parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $parent->getTranslation('Name_Father', 'en');
        $this->Job_Father = $parent->getTranslation('Job_Father', 'ar');
        $this->Job_Father_en = $parent->getTranslation('Job_Father', 'en');
        $this->National_ID_Father = $parent->National_ID_Father;
        $this->Passport_ID_Father = $parent->Passport_ID_Father;
        $this->Phone_Father = $parent->Phone_Father;
        $this->Nationality_Father_id = $parent->Nationality_Father_id;
        $this->Blood_Type_Father_id = $parent->Blood_Type_Father_id;
        $this->Address_Father = $parent->Address_Father;
        $this->Religion_Father_id = $parent->Religion_Father_id;
        $this->Name_Mother = $parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $parent->getTranslation('Name_Mother', 'en');
        $this->Job_Mother = $parent->getTranslation('Job_Mother', 'ar');
        $this->Job_Mother_en = $parent->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother = $parent->National_ID_Mother;
        $this->Passport_ID_Mother = $parent->Passport_ID_Mother;
        $this->Phone_Mother = $parent->Phone_Mother;
        $this->Nationality_Mother_id = $parent->Nationality_Mother_id;
        $this->Blood_Type_Mother_id = $parent->Blood_Type_Mother_id;
        $this->Address_Mother = $parent->Address_Mother;
        $this->Religion_Mother_id = $parent->Religion_Mother_id;
    }

    public function firstStepSubmit_edit()
    {
        $this->validate($this->rulesStepOne());
        $this->updateMode = true;
        $this->currentStep = 2;
    }

    public function secondStepSubmit_edit()
    {
        $this->validate($this->rulesStepTwo());
        $this->updateMode = true;
        $this->currentStep = 3;
    }

    public function submitForm_edit()
    {
        if ($this->Parent_id) {
            $this->validate(array_merge($this->rulesStepOne(), $this->rulesStepTwo(), $this->rulesStepThree()));
            $parent = MyParent::findOrFail($this->Parent_id);
            $parent->update([
                'Email' => $this->Email,
                'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],
                'National_ID_Father' => $this->National_ID_Father,
                'Passport_ID_Father' => $this->Passport_ID_Father,
                'Phone_Father' => $this->Phone_Father,
                'Job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father],
                'Nationality_Father_id' => $this->Nationality_Father_id,
                'Blood_Type_Father_id' => $this->Blood_Type_Father_id,
                'Religion_Father_id' => $this->Religion_Father_id,
                'Address_Father' => $this->Address_Father,
                'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother],
                'National_ID_Mother' => $this->National_ID_Mother,
                'Passport_ID_Mother' => $this->Passport_ID_Mother,
                'Phone_Mother' => $this->Phone_Mother,
                'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother],
                'Nationality_Mother_id' => $this->Nationality_Mother_id,
                'Blood_Type_Mother_id' => $this->Blood_Type_Mother_id,
                'Religion_Mother_id' => $this->Religion_Mother_id,
                'Address_Mother' => $this->Address_Mother,
            ]);

            if (!empty($this->Password)) {
                $parent->update(['Password' => Hash::make($this->Password)]);
            }

            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->show_table = true;
            $this->currentStep = 1;
            $this->updateMode = false;
        }
    }

    public function delete($id)
    {
        MyParent::findOrFail($id)->delete();
        $this->show_table = true;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    protected function rulesStepOne()
    {
        return [
            'Email' => ['required', 'email', Rule::unique('my_parents', 'Email')->ignore($this->Parent_id)],
            'Password' => $this->updateMode ? [] : ['required'],
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]{10}$/', Rule::unique('my_parents', 'National_ID_Father')->ignore($this->Parent_id)],
            'Passport_ID_Father' => ['required', 'min:10', 'max:10', Rule::unique('my_parents', 'Passport_ID_Father')->ignore($this->Parent_id)],
            'Phone_Father' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ];
    }

    protected function rulesStepTwo()
    {
        return [
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => ['required', 'string', 'min:10', 'max:10', 'regex:/^[0-9]{10}$/', Rule::unique('my_parents', 'National_ID_Mother')->ignore($this->Parent_id)],
            'Passport_ID_Mother' => ['required', 'min:10', 'max:10', Rule::unique('my_parents', 'Passport_ID_Mother')->ignore($this->Parent_id)],
            'Phone_Mother' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ];
    }

    protected function rulesStepThree()
    {
        return [
            'photos.*' => 'nullable|image|max:2048',
        ];
    }

    protected function validationRules()
    {
        return array_merge($this->rulesStepOne(), $this->rulesStepTwo(), $this->rulesStepThree());
    }

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
        $this->photos = [];
        $this->Parent_id = null;
        $this->catchError = null;
        $this->successMessage = '';
    }
}
