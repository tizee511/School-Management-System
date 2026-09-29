@extends('layouts.master')

@section('title')
إعدادات المدرسة
@endsection

@section('page-header')
@section('PageTitle')
إعدادات المدرسة
@endsection
@endsection

@section('content')
<style>
 .settings-page {
  --settings-ink: #18324b;
  --settings-muted: #728195;
  --settings-border: #e5ebf1;
  --settings-accent: #177e89;
  max-width: 1180px;
  margin: 0 auto;
  padding: 12px 18px 36px;
  color: var(--settings-ink);
 }

 .settings-page .settings-heading {
  margin-bottom: 24px;
 }

 .settings-page .settings-heading h2 {
  margin: 0 0 6px;
  color: var(--settings-ink);
  font-size: 25px;
  font-weight: 700;
 }

 .settings-page .settings-heading p,
 .settings-page .settings-muted {
  margin: 0;
  color: var(--settings-muted);
 }

 .settings-page .settings-card {
  overflow: hidden;
  border: 1px solid var(--settings-border);
  border-radius: 14px;
  background: #fff;
  box-shadow: 0 10px 30px rgba(24, 50, 75, .06);
 }

 .settings-page .settings-card-header {
  display: flex;
  align-items: center;
  gap: 13px;
  padding: 22px 26px;
  border-bottom: 1px solid var(--settings-border);
  background: linear-gradient(115deg, #f6fbfc, #fff);
 }

 .settings-page .settings-card-icon {
  display: inline-flex;
  width: 44px;
  height: 44px;
  align-items: center;
  justify-content: center;
  border-radius: 12px;
  background: #e5f3f3;
  color: var(--settings-accent);
  font-size: 18px;
 }

 .settings-page .settings-card-header h3 {
  margin: 0 0 4px;
  color: var(--settings-ink);
  font-size: 17px;
  font-weight: 700;
 }

 .settings-page .settings-card-header p {
  margin: 0;
  color: var(--settings-muted);
  font-size: 13px;
 }

 .settings-page .settings-card-body {
  padding: 26px;
 }

 .settings-page .settings-section-title {
  margin: 0 0 20px;
  color: var(--settings-ink);
  font-size: 15px;
  font-weight: 700;
 }

 .settings-page .settings-field {
  margin-bottom: 20px;
 }

 .settings-page .settings-field label {
  display: block;
  margin-bottom: 8px;
  color: #344b60;
  font-size: 13px;
  font-weight: 600;
 }

 .settings-page .settings-required {
  color: #d9534f;
 }

 .settings-page .settings-control {
  min-height: 44px;
  border: 1px solid #dce4eb;
  border-radius: 8px;
  background-color: #fff;
  box-shadow: none;
 }

 .settings-page .settings-control:focus {
  border-color: #75b9bc;
  box-shadow: 0 0 0 3px rgba(23, 126, 137, .11);
 }

 .settings-page .settings-logo-panel {
  display: grid;
  grid-template-columns: 170px minmax(0, 1fr);
  gap: 24px;
  align-items: center;
  padding: 20px;
  border: 1px solid var(--settings-border);
  border-radius: 12px;
  background: #fbfcfd;
 }

 .settings-page .settings-logo-preview {
  display: flex;
  width: 170px;
  height: 150px;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  border: 1px dashed #cbd7e1;
  border-radius: 10px;
  background: #fff;
 }

 .settings-page .settings-logo-preview img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
 }

 .settings-page .settings-logo-placeholder {
  color: #9aa9b7;
  font-size: 34px;
 }

 .settings-page .settings-file-input {
  display: block;
  width: 100%;
  max-width: 460px;
  padding: 8px;
  border: 1px solid #dce4eb;
  border-radius: 8px;
  background: #fff;
  color: #4b6074;
 }

 .settings-page .settings-file-input::file-selector-button {
  margin-inline-end: 12px;
  padding: 8px 13px;
  border: 0;
  border-radius: 6px;
  background: #e5f3f3;
  color: #176d76;
  font-weight: 600;
  cursor: pointer;
 }

 .settings-page .settings-upload-help {
  margin-top: 10px;
  color: var(--settings-muted);
  font-size: 12px;
 }

 .settings-page .settings-error {
  margin-top: 8px;
  color: #c0392b;
  font-size: 13px;
 }

 .settings-page .settings-actions {
  display: flex;
  justify-content: flex-start;
  padding-top: 22px;
  margin-top: 22px;
  border-top: 1px solid var(--settings-border);
 }

 .settings-page .settings-save-button {
  min-width: 145px;
  padding: 10px 18px;
  border: 0;
  border-radius: 8px;
  background: var(--settings-accent);
  color: #fff;
  font-weight: 600;
 }

 .settings-page .settings-save-button:hover,
 .settings-page .settings-save-button:focus {
  background: #126b74;
  color: #fff;
 }

 @media (max-width: 767px) {
  .settings-page {
   padding: 8px 10px 24px;
  }

  .settings-page .settings-card-header,
  .settings-page .settings-card-body {
   padding: 18px;
  }

  .settings-page .settings-logo-panel {
   grid-template-columns: 1fr;
  }

  .settings-page .settings-logo-preview {
   width: 100%;
  }
 }
</style>

<div class="settings-page">
 <header class="settings-heading">
  <h2>إعدادات المدرسة</h2>
  <p>حدّث بيانات المدرسة والشعار من مكان واحد.</p>
 </header>

 @if (session()->has('error'))
  <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
 @endif

 @if ($errors->any())
  <div class="alert alert-danger" role="alert">
   <div class="font-weight-bold mb-1">يرجى مراجعة البيانات التالية:</div>
   <ul class="mb-0">
    @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
    @endforeach
   </ul>
  </div>
 @endif

 <form enctype="multipart/form-data" method="post" action="{{ route('settings.update', 'setting') }}">
  @method('PUT')
  @csrf

  <section class="settings-card">
   <div class="settings-card-header">
    <span class="settings-card-icon" aria-hidden="true"><i class="fa fa-sliders"></i></span>
    <div>
     <h3>بيانات المدرسة</h3>
     <p>تظهر هذه البيانات في أجزاء النظام المختلفة.</p>
    </div>
   </div>

   <div class="settings-card-body">
    <h4 class="settings-section-title">المعلومات الأساسية</h4>
    <div class="row">
     <div class="col-md-6">
      <div class="settings-field">
       <label for="school-name">اسم المدرسة <span class="settings-required">*</span></label>
       <input id="school-name" name="school_name" value="{{ old('school_name', $setting['school_name'] ?? '') }}" required type="text" class="form-control settings-control">
      </div>
     </div>
     <div class="col-md-6">
      <div class="settings-field">
       <label for="current-session">العام الحالي <span class="settings-required">*</span></label>
       <select required name="current_session" style="height: 55px;" id="current-session" class="form-control settings-control">



        <option value="">اختر العام الدراسي</option>
        @for ($year = (int) date('Y') - 3; $year <= (int) date('Y') + 1; $year++)
         @php($session = ($year - 1).'-'.$year)
         <option value="{{ $session }}" {{ old('current_session', $setting['current_session'] ?? '') === $session ? 'selected' : '' }}>{{ $session }}</option>
        @endfor
       </select>
      </div>
     </div>
     <div class="col-md-6">
      <div class="settings-field">
       <label for="school-title">اسم المدرسة المختصر</label>
       <input id="school-title" name="school_title" value="{{ old('school_title', $setting['school_title'] ?? '') }}" type="text" class="form-control settings-control">
      </div>
     </div>
     <div class="col-md-6">
      <div class="settings-field">
       <label for="school-phone">الهاتف</label>
       <input id="school-phone" name="phone" value="{{ old('phone', $setting['phone'] ?? '') }}" type="text" class="form-control settings-control">
      </div>
     </div>
     <div class="col-md-6">
      <div class="settings-field">
       <label for="school-email">البريد الإلكتروني</label>
       <input id="school-email" name="school_email" value="{{ old('school_email', $setting['school_email'] ?? '') }}" type="email" class="form-control settings-control">
      </div>
     </div>
     <div class="col-md-6">
      <div class="settings-field">
       <label for="school-address">عنوان المدرسة <span class="settings-required">*</span></label>
       <input id="school-address" required name="address" value="{{ old('address', $setting['address'] ?? '') }}" type="text" class="form-control settings-control">
      </div>
     </div>
     <div class="col-md-6">
      <div class="settings-field">
       <label for="end-first-term">نهاية الترم الأول</label>
       <input id="end-first-term" name="end_first_term" value="{{ old('end_first_term', $setting['end_first_term'] ?? '') }}" type="text" class="form-control settings-control date-pick">
      </div>
     </div>
     <div class="col-md-6">
      <div class="settings-field">
       <label for="end-second-term">نهاية الترم الثاني</label>
       <input id="end-second-term" name="end_second_term" value="{{ old('end_second_term', $setting['end_second_term'] ?? '') }}" type="text" class="form-control settings-control date-pick">
      </div>
     </div>
    </div>

    <h4 class="settings-section-title mt-2">شعار المدرسة</h4>
    @php($logoName = old('logo', $setting['logo'] ?? ''))
    @php($logoUrl = $logoName ? request()->getBaseUrl().'/storage/attachments/logo/'.rawurlencode($logoName) : '')
    <div class="settings-logo-panel">
     <div id="logo-preview-container" class="settings-logo-preview">
      <img id="logo-preview" src="{{ $logoUrl }}" alt="معاينة شعار المدرسة" @if (!$logoUrl) hidden @endif>
      <span id="logo-placeholder" class="settings-logo-placeholder" @if ($logoUrl) hidden @endif aria-label="لا يوجد شعار"><i class="fa fa-image" aria-hidden="true"></i></span>
     </div>
     <div>
      <label for="logo-input">اختر صورة الشعار</label>
      <input id="logo-input" name="logo" accept="image/*" type="file" class="settings-file-input">
      <p class="settings-upload-help">اختر صورة بصيغة شائعة، بحد أقصى 5 ميجابايت. ستظهر معاينتها هنا قبل الحفظ.</p>
      <p id="logo-preview-error" class="settings-error" role="alert" hidden></p>
      @error('logo')
       <p class="settings-error">{{ $message }}</p>
      @enderror
     </div>
    </div>

    <div class="settings-actions">
     <button class="btn settings-save-button" type="submit"><i class="fa fa-save ml-1" aria-hidden="true"></i> حفظ الإعدادات</button>
    </div>
   </div>
  </section>
 </form>
</div>

<script>
 (function () {
  var input = document.getElementById('logo-input');
  var preview = document.getElementById('logo-preview');
  var placeholder = document.getElementById('logo-placeholder');
  var error = document.getElementById('logo-preview-error');

  if (!input || !preview || !placeholder || !error) {
   return;
  }

  input.addEventListener('change', function () {
   var file = input.files && input.files[0];
   error.hidden = true;
   error.textContent = '';

   if (!file) {
    return;
   }

   if (!file.type || file.type.indexOf('image/') !== 0) {
    error.textContent = 'الملف المحدد ليس صورة صالحة.';
    error.hidden = false;
    return;
   }

   var reader = new FileReader();
   reader.onload = function () {
    if (typeof reader.result !== 'string') {
     error.textContent = 'تعذرت معاينة الصورة المحددة.';
     error.hidden = false;
     return;
    }

    preview.src = reader.result;
    preview.hidden = false;
    placeholder.hidden = true;
   };
   reader.onerror = function () {
    error.textContent = 'تعذرت قراءة الصورة المحددة.';
    error.hidden = false;
   };
   reader.readAsDataURL(file);
  });

  preview.addEventListener('error', function () {
   preview.hidden = true;
   placeholder.hidden = false;
   error.textContent = 'تعذر تحميل الشعار المحفوظ. تحقق من وجود الملف في مجلد التخزين العام.';
   error.hidden = false;
  });
 })();
</script>
@endsection
