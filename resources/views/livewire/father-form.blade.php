<div style="font-weight: bold; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif" >
<style>
    label{
        margin-top: 5px;
        margin-bottom: 2px;
        margin-right: 7px
    }
    select,option{

        font-size:15px;
        font-weight: bold;
        margin-right: 5px
    }
</style>
@if($currentStep == 1)
<div class="row setup-content" id="step-1">
 <div class="col-xs-12">
  <div class="col-md-12">
   <br>
   <div class="form-row">
    <div class="col">
     <label>{{ trans('Parent_trans.Email') }}</label>
     <input type="email" wire:model.debounce.200ms="Email" class="form-control">
     @error('Email')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col">
     <label>{{ trans('Parent_trans.Password') }}</label>
     <input type="password" wire:model.debounce.200ms="Password" class="form-control">
     @error('Password')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
   </div>

   <div class="form-row">
    <div class="col">
     <label>{{ trans('Parent_trans.Name_Father') }}</label>
     <input type="text" wire:model.debounce.200ms="Name_Father" class="form-control">
     @error('Name_Father')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col">
     <label>{{ trans('Parent_trans.Name_Father_en') }}</label>
     <input type="text" wire:model.debounce.200ms="Name_Father_en" class="form-control">
     @error('Name_Father_en')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
   </div>

   <div class="form-row">
    <div class="col-md-3">
     <label>{{ trans('Parent_trans.Job_Father') }}</label>
     <input type="text" wire:model.debounce.200ms="Job_Father" class="form-control">
     @error('Job_Father')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col-md-3">
     <label>{{ trans('Parent_trans.Job_Father_en') }}</label>
     <input type="text" wire:model.debounce.200ms="Job_Father_en" class="form-control">
     @error('Job_Father_en')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col">
     <label>{{ trans('Parent_trans.National_ID_Father') }}</label>
     <input type="text" wire:model.debounce.200ms="National_ID_Father" class="form-control">
     @error('National_ID_Father')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col">
     <label>{{ trans('Parent_trans.Passport_ID_Father') }}</label>
     <input type="text" wire:model.debounce.200ms="Passport_ID_Father" class="form-control">
     @error('Passport_ID_Father')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="col">
     <label>{{ trans('Parent_trans.Phone_Father') }}</label>
     <input type="text" wire:model.debounce.200ms="Phone_Father" class="form-control">
     @error('Phone_Father')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
   </div>

   <div class="form-row">
    <div class="form-group col-md-6">
     <label>{{ trans('Parent_trans.Nationality_Father_id') }}</label>
     <select class="custom-select my-1 mr-sm-2" wire:model.debounce.200ms="Nationality_Father_id">
      <option selected>{{ trans('Parent_trans.Choose') }}...</option>
      @foreach($nationalities as $nationality)
      <option value="{{ $nationality->id }}">{{ $nationality->nat_name }}</option>
      @endforeach
     </select>
     @error('Nationality_Father_id')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="form-group col">
     <label>{{ trans('Parent_trans.Blood_Type_Father_id') }}</label>
     <select class="custom-select my-1 mr-sm-2" wire:model.debounce.200ms="Blood_Type_Father_id">
      <option selected>{{ trans('Parent_trans.Choose') }}...</option>
      @foreach($bloodTypes as $bloodType)
      <option value="{{ $bloodType->id }}">{{ $bloodType->Name }}</option>
      @endforeach
     </select>
     @error('Blood_Type_Father_id')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="form-group col">
     <label>{{ trans('Parent_trans.Religion_Father_id') }}</label>
     <select class="custom-select my-1 mr-sm-2" wire:model.debounce.200ms="Religion_Father_id">
      <option selected>{{ trans('Parent_trans.Choose') }}...</option>
      @foreach($religions as $religion)
      <option value="{{ $religion->id }}">{{ $religion->rel_name }}</option>
      @endforeach
     </select>
     @error('Religion_Father_id')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
   </div>

   <div class="form-group">
    <label>{{ trans('Parent_trans.Address_Father') }}</label>
    <textarea class="form-control" wire:model.debounce.200ms="Address_Father" rows="4"></textarea>
    @error('Address_Father')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
   </div>

   @if($updateMode)
   <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_edit" type="button">{{ trans('Parent_trans.Next') }}
   </button>
   @else
   <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button">{{ trans('Parent_trans.Next') }}</button>
   @endif
  </div>
 </div>
</div>
@endif
</div>
