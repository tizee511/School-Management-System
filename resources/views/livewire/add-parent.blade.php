<div>
    {{-- العرض الرئيسي لكومبوننت Livewire AddParent --}}
    @if (!empty($successMessage))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $successMessage }}
    </div>
    @endif
    @if ($catchError)
    <div class="alert alert-danger" id="success-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $catchError }}
    </div>
    @endif

    @if($show_table)
    @include('livewire.parent-table')
    @else
    <div class="stepwizard mb-4">
        <div class="stepwizard-row setup-panel d-flex justify-content-between align-items-center">
            <div class="stepwizard-step text-center flex-fill">
                <button type="button" wire:click="goToStep(1)"
                    class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</button>
                <p class="mt-2 mb-0">{{ trans('Parent_trans.Step1') }}</p>
            </div>
            <div class="stepwizard-step text-center flex-fill">
                <button type="button" wire:click="goToStep(2)"
                    class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</button>
                <p class="mt-2 mb-0">{{ trans('Parent_trans.Step2') }}</p>
            </div>
            <div class="stepwizard-step text-center flex-fill">
                <button type="button" wire:click="goToStep(3)"
                    class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}">3</button>
                <p class="mt-2 mb-0">{{ trans('Parent_trans.Step3') }}</p>
            </div>
        </div>
    </div>

    @include('livewire.father-form')
    @include('livewire.mother-form')
    
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
        @endif

            <div class="col-xs-12">
                <div class="col-md-12"><br>
                    <label style="color: red">{{ trans('Parent_trans.Attachments') }}</label>
                    <div class="form-group">
                        <input type="file" wire:model="photos" accept="image/*" multiple>
                    </div>
                    <br>

                    <input type="hidden" wire:model="Parent_id">

                    <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                        wire:click="back(2)">{{ trans('Parent_trans.Back') }}</button>

                    @if($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="submitForm_edit"
                        type="button">{{ trans('Parent_trans.Finish') }}
                    </button>
                    @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                        wire:click="submitForm">{{ trans('Parent_trans.Finish') }}</button>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>
