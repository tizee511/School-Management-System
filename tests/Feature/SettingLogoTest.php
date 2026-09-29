<?php

namespace Tests\Feature;

use App\Http\Controllers\SettingController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SettingLogoTest extends TestCase
{
    use RefreshDatabase;

    public function test_uploaded_logo_is_saved_and_persisted_for_the_next_page_load(): void
    {
        Storage::fake('upload_attachments');

        DB::table('settings')->insert([
            ['Key' => 'school_name', 'value' => 'Test School'],
            ['Key' => 'current_session', 'value' => '2025-2026'],
            ['Key' => 'school_title', 'value' => 'TS'],
            ['Key' => 'phone', 'value' => '123456'],
            ['Key' => 'school_email', 'value' => 'school@example.com'],
            ['Key' => 'address', 'value' => 'Test address'],
            ['Key' => 'end_first_term', 'value' => '01-12-2025'],
            ['Key' => 'end_second_term', 'value' => '01-03-2026'],
            ['Key' => 'logo', 'value' => ''],
        ]);

        $request = Request::create('/settings/setting', 'PUT', [
            'school_name' => 'Test School',
            'current_session' => '2025-2026',
            'school_title' => 'TS',
            'phone' => '123456',
            'school_email' => 'school@example.com',
            'address' => 'Test address',
            'end_first_term' => '01-12-2025',
            'end_second_term' => '01-03-2026',
        ], [], [
            'logo' => UploadedFile::fake()->create('school-logo.png', 1, 'image/png'),
        ]);

        (new SettingController())->update($request);

        $logoName = DB::table('settings')->where('Key', 'logo')->value('value');
        $settingsPage = (new SettingController())->index();

        $this->assertNotEmpty($logoName);
        $this->assertNotSame('school-logo.png', $logoName);
        $this->assertSame($logoName, $settingsPage->getData()['setting']['logo']);
        Storage::disk('upload_attachments')->assertExists('attachments/logo/'.$logoName);
    }
}
