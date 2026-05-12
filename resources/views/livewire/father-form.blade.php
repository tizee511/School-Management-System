<!--  -->


<!-- ============================ -->
@if($currentStep == 1)
<style>
    label {
        margin-top: 10px;
        font-weight: bold;
    }

    .setup-content {
        width: 100%;
    }

    .form-container {
        width: 100%;
        max-width: 100%;
        padding: 10px;
    }
</style>

<div class="row setup-content justify-content-center" >
    <div class="col-12">
        <div class="form-container">
            <br>

            {{-- Email + Password --}}
            <div class="row">
                <div class="col-md-6 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Email') }}</label>
                    <input type="email" wire:model.live.throttle.15ms="Email" class="form-control">
                    @error('Email') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Password') }}</label>
                    <input type="password" wire:model.live.throttle.15ms="Password" class="form-control">
                    @error('Password') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Father Name --}}
            <div class="row">
                <div class="col-md-6 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Name_Father') }}</label>
                    <input type="text" wire:model.live.throttle.15ms="Name_Father" class="form-control">
                    @error('Name_Father') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Name_Father_en') }}</label>
                    <input type="text" wire:model.live.throttle.15ms="Name_Father_en" class="form-control">
                    @error('Name_Father_en') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Job + IDs + Phone --}}
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Job_Father') }}</label>
                    <input type="text" wire:model="Job_Father" class="form-control">
                    @error('Job_Father') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Job_Father_en') }}</label>
                    <input type="text" wire:model="Job_Father_en" class="form-control">
                    @error('Job_Father_en') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>

                <div class="col-lg-2 col-md-4 col-12 mb-3">
                    <label>{{ trans('Parent_trans.National_ID_Father') }}</label>
                    <input type="text" wire:model.live.throttle.150ms="National_ID_Father" class="form-control">
                    @error('National_ID_Father') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>

                <div class="col-lg-2 col-md-4 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Passport_ID_Father') }}</label>
                    <input type="text" wire:model.live.throttle.150ms="Passport_ID_Father" class="form-control">
                    @error('Passport_ID_Father') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>

                <div class="col-lg-2 col-md-4 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Phone_Father') }}</label>
                    <input type="text" wire:model.live.throttle.10ms="Phone_Father" class="form-control">
                    @error('Phone_Father') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Selects --}}
            <div class="row">
                <div class="col-md-4 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Nationality_Father_id') }}</label>
                    <select class="custom-select" wire:model="Nationality_Father_id">
                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                        @foreach($nationalities as $nationality)
                            <option value="{{ $nationality->id }}">{{ $nationality->nat_name }}</option>
                        @endforeach
                    </select>
                    @error('Nationality_Father_id') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Blood_Type_Father_id') }}</label>
                    <select class="custom-select" wire:model="Blood_Type_Father_id">
                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                        @foreach($bloodTypes as $bloodType)
                            <option value="{{ $bloodType->id }}">{{ $bloodType->Name }}</option>
                        @endforeach
                    </select>
                    @error('Blood_Type_Father_id') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 col-12 mb-3">
                    <label>{{ trans('Parent_trans.Religion_Father_id') }}</label>
                    <select class="custom-select" wire:model="Religion_Father_id">
                        <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                        @foreach($religions as $religion)
                            <option value="{{ $religion->id }}">{{ $religion->rel_name }}</option>
                        @endforeach
                    </select>
                    @error('Religion_Father_id') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Address --}}
            <div class="row">
                <div class="col-12 mb-3">
                    <label>{{ trans('Parent_trans.Address_Father') }}</label>
                    <textarea class="form-control" wire:model="Address_Father" rows="4"></textarea>
                    @error('Address_Father') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Button --}}
            <div class="row">
                <div class="col-12 pull-right">
                    @if($updateMode)
                        <button class="btn btn-success px-4 pull-right" wire:click="firstStepSubmit_edit" type="button">
                            {{ trans('Parent_trans.Next') }}
                        </button>
                    @else
                    <!-- btn btn-success btn-sm nextBtn btn-lg pull-right -->
                        <button class="btn btn-success px-4 pull-right" wire:click="firstStepSubmit" type="button">
                            {{ trans('Parent_trans.Next') }}
                        </button>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endif