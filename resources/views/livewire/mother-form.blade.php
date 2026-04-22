@if($currentStep == 2)
<div class="row setup-content" id="step-2">
 <div class="col-xs-12">
  <div class="col-md-12">
   <br>
   <div class="form-row">
    <div class="col">
     <label>{{ trans('Parent_trans.Name_Mother') }}</label>
     <input type="text" wire:model.debounce.500ms="Name_Mother" class="form-control">
     @error('Name_Mother')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col">
     <label>{{ trans('Parent_trans.Name_Mother_en') }}</label>
     <input type="text" wire:model.debounce.500ms="Name_Mother_en" class="form-control">
     @error('Name_Mother_en')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-3">
     <label>{{ trans('Parent_trans.Job_Mother') }}</label>
     <input type="text" wire:model.debounce.500ms="Job_Mother" class="form-control">
     @error('Job_Mother')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col-md-3">
     <label>{{ trans('Parent_trans.Job_Mother_en') }}</label>
     <input type="text" wire:model.debounce.500ms="Job_Mother_en" class="form-control">
     @error('Job_Mother_en')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col">
     <label>{{ trans('Parent_trans.National_ID_Mother') }}</label>
     <input type="text" wire:model.debounce.500ms="National_ID_Mother" class="form-control">
     @error('National_ID_Mother')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col">
     <label>{{ trans('Parent_trans.Passport_ID_Mother') }}</label>
     <input type="text" wire:model.debounce.500ms="Passport_ID_Mother" class="form-control">
     @error('Passport_ID_Mother')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col">
     <label>{{ trans('Parent_trans.Phone_Mother') }}</label>
     <input type="text" wire:model.debounce.500ms="Phone_Mother" class="form-control">
     @error('Phone_Mother')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
   </div>

   <div class="form-row">
    <div class="form-group col-md-6">
     <label>{{ trans('Parent_trans.Nationality_Father_id') }}</label>
     <select class="custom-select my-1 mr-sm-2" wire:model.debounce.500ms="Nationality_Mother_id">
      <option selected>{{ trans('Parent_trans.Choose') }}...</option>
      @foreach($nationalities as $nationality)
      <option value="{{ $nationality->id }}">{{ $nationality->nat_name }}</option>
      @endforeach
     </select>
     @error('Nationality_Mother_id')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="form-group col">
     <label>{{ trans('Parent_trans.Blood_Type_Father_id') }}</label>
     <select class="custom-select my-1 mr-sm-2" wire:model.debounce.500ms="Blood_Type_Mother_id">
      <option selected>{{ trans('Parent_trans.Choose') }}...</option>
      @foreach($bloodTypes as $bloodType)
      <option value="{{ $bloodType->id }}">{{ $bloodType->Name }}</option>
      @endforeach
     </select>
     @error('Blood_Type_Mother_id')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="form-group col">
     <label>{{ trans('Parent_trans.Religion_Father_id') }}</label>
     <select class="custom-select my-1 mr-sm-2" wire:model.debounce.500ms="Religion_Mother_id">
      <option selected>{{ trans('Parent_trans.Choose') }}...</option>
      @foreach($religions as $religion)
      <option value="{{ $religion->id }}">{{ $religion->rel_name }}</option>
      @endforeach
     </select>
     @error('Religion_Mother_id')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
   </div>

   <div class="form-group">
    <label>{{ trans('Parent_trans.Address_Mother') }}</label>
    <textarea class="form-control" wire:model.debounce.500ms="Address_Mother" rows="4"></textarea>
    @error('Address_Mother')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
   </div>

   <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="goToStep(1)">
    {{ trans('Parent_trans.Back') }}
   </button>
   @if($updateMode)
   <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit_edit" type="button">{{ trans('Parent_trans.Next') }}
   </button>
   @else
   <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">{{ trans('Parent_trans.Next') }}</button>
   @endif
  </div>
 </div>
</div>
@endif

