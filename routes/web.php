<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PaperSubmissionController;
use App\Http\Controllers\RegistrationController;

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/setup-db', function () {
    try {
        // Force Laravel to clear the cache and read the new .env file
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        
        $pdo = new PDO("mysql:host=127.0.0.1;port=3306", "root", "");
        $pdo->exec("CREATE DATABASE IF NOT EXISTS biomed_app");
        
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true]);
        
        // Optionally delete the sqlite file so it doesn't cause confusion
        if (file_exists(database_path('database.sqlite'))) {
            @unlink(database_path('database.sqlite'));
        }
        
        return "Cache cleared, MySQL database created, and migrations run successfully!<br><br>Output:<br>" . nl2br(\Illuminate\Support\Facades\Artisan::output());
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/run-migration', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate');
        return "Migration run successfully!<br>Output:<br>" . nl2br(\Illuminate\Support\Facades\Artisan::output());
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/seed-tracks', function () {
    $tracks = [
        [
            'title' => 'Track I: Emerging infectious diseases through a One health lens',
            'bullet_points' => ['Zoonosis', 'Vector borne diseases', 'Next generation pandemic preparedness', 'Environmental Reservoirs and AMR', 'Molecular Therapeutics and countermeasure innovations', 'Metagenomics in the wild', 'Novel antimicrobials']
        ],
        [
            'title' => 'Track II: Strengthening Health Systems from Theory to Practice: Embedding Social Infrastructure and Public Governance in One Health Capacities',
            'bullet_points' => ['Institutional Governance & Multi-Sectoral Policy', 'Public health policy and One Health governance', 'Social Infrastructure & Community Resilience', 'Workforce Development & Operational Capacity', 'Addressing Social Determinants of Health', 'Crisis and outbreak management', 'Community-led health equity']
        ],
        [
            'title' => 'Track III: Integrating Environment and Climate change in One Health',
            'bullet_points' => ['Climate Change and Pathogen Dynamics', 'Biodiversity conservation and Biosecurity', 'Ecosystem resilience', 'Climate change and Environmental health', 'Waste management and circular bioeconomy', 'Mitigating Pollution', 'Sustainable production systems']
        ],
        [
            'title' => 'Track IV: Translating Sustainable Chemistry and Future Technologies to One Health',
            'bullet_points' => ['Green Chemistry & Eco-Safe Material Design', 'Advanced Technologies for Environmental and Pathogen Remediation', 'Translational Innovation & Regulatory Harmonization', 'One Health and chemical challenges', 'Emerging contaminants and environmental chemistry', 'Sustainable solutions for environmental challenges']
        ],
        [
            'title' => 'Track V: Ensuring health intervention through the Indian Knowledge System',
            'bullet_points' => ['Traditional Healthcare Systems', 'Ethnomedicine and Community Health Practices', 'Medicinal Plants and Natural Product Research', 'Traditional Food Systems, Nutrition and Functional Foods', 'Biodiversity Conservation and Indigenous Ecological Knowledge', 'Validation of Traditional Knowledge through Modern Science', 'Integrative Medicine and Precision Traditional Therapeutics', 'One Health Perspectives in Indian Knowledge Systems', 'Digital Documentation and Preservation of Indigenous Knowledge', 'Policy, Ethics and Intellectual Property Rights in Traditional Knowledge', 'AI and Omics Approaches for Traditional Medicine Research', 'Translational Research and Commercialization of IKS-based Innovations']
        ],
        [
            'title' => 'Track VI: Regenerative Health: Redefining Industrial One Health Paradigms',
            'bullet_points' => ['Responsible Pharmaceutical Manufacturing', 'Next-Generation Veterinary Biologics', 'Green Agrochemicals & Biopesticides', 'Corporate Stewardship & Supply Chain Resilience', 'Venture Capital in Planetary Health', 'Cross-Sectoral Commercial Collaboration', 'Integrating comprehensive One Health metrics into Environmental, Social, and Governance (ESG) corporate reporting standards']
        ]
    ];
    
    \App\Models\Track::truncate();
    foreach($tracks as $index => $trackData) {
        \App\Models\Track::create([
            'title' => $trackData['title'],
            'bullet_points' => $trackData['bullet_points'],
            'sort_order' => $index + 1
        ]);
    }
    return "Default tracks have been seeded! You can now visit the /scientific-themes page or the admin CMS to view them.";
});

//     return view('submit-paper');
// })->name('submit-paper');

Route::get('/registration', function () {
    $registrationFees = \App\Models\RegistrationFee::where('is_active', true)->orderBy('sort_order')->get();
    $addons = \App\Models\Addon::where('is_active', true)->get();
    $policies = \App\Models\Policy::where('is_active', true)->orderBy('sort_order')->get();
    return view('registration', compact('registrationFees', 'addons', 'policies'));
})->name('registration');

Route::get('/speakers', function () {
    $keynote = \App\Models\Speaker::where('type', 'keynote')->orderBy('sort_order')->get();
    $distinguished = \App\Models\Speaker::where('type', 'distinguished')->orderBy('sort_order')->get();
    return view('speakers', compact('keynote', 'distinguished'));
})->name('speakers');

Route::get('/keynote-speakers', function () {
    $speakers = \App\Models\Speaker::where('type', 'keynote')->orderBy('sort_order')->get();
    return view('keynote-speakers', compact('speakers'));
})->name('keynote-speakers');

Route::get('/distinguished-speakers', function () {
    $speakers = \App\Models\Speaker::where('type', 'distinguished')->orderBy('sort_order')->get();
    return view('distinguished-speakers', compact('speakers'));
})->name('distinguished-speakers');

Route::get('/committee', function () {
    $leadership = \App\Models\CommitteeMember::where('category', 'leadership')->orderBy('sort_order')->get()->groupBy('subcategory');
    $organizing = \App\Models\CommitteeMember::where('category', 'organizing_committee')->orderBy('sort_order')->get();
    $advisory = \App\Models\CommitteeMember::where('category', 'advisory_committee')->orderBy('sort_order')->get();
    return view('committee', compact('leadership', 'organizing', 'advisory'));
})->name('committee');

Route::get('/venue', function () {
    return view('venue');
})->name('venue');

Route::get('/about-organizer', function () {
    return view('about-organizer');
})->name('about-organizer');

Route::get('/topics', function () {
    return view('topics-page');
})->name('topics');

Route::get('/scientific-themes', function () {
    $tracks = \App\Models\Track::orderBy('sort_order')->get();
    return view('scientific-themes', compact('tracks'));
})->name('scientific-themes');

Route::get('/guidelines', function () {
    return view('guidelines');
})->name('guidelines');

Route::get('/sponsors', function () {
    return view('sponsors');
})->name('sponsors');

Route::get('/awards', function () {
    return view('awards');
})->name('awards');

Route::get('/key-dates', function () {
    $deadlines = \App\Models\Deadline::where('is_active', true)->orderBy('sort_order')->get();
    return view('key-dates', compact('deadlines'));
})->name('key-dates');

Route::get('/venue', function () {
    $settings = \App\Models\SiteSetting::where('group', 'venue')->pluck('value', 'key');
    return view('venue', compact('settings'));
})->name('venue');

Route::get('/schedule', function () {
    return view('schedule');
})->name('schedule');
Route::post('/api/submit-paper', [PaperSubmissionController::class, 'store'])->name('api.submit_paper');
Route::post('/api/register', [RegistrationController::class, 'store']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/registrations', [AdminController::class, 'registrations'])->name('admin.registrations');
    Route::get('/submissions', [AdminController::class, 'submissions'])->name('admin.submissions');
    
    // CMS: Registration Fees
    Route::get('/fees', [AdminController::class, 'fees'])->name('admin.fees');
    Route::post('/fees', [AdminController::class, 'storeFee'])->name('admin.fees.store');
    Route::put('/fees/{id}', [AdminController::class, 'updateFee'])->name('admin.fees.update');
    Route::delete('/fees/{id}', [AdminController::class, 'deleteFee'])->name('admin.fees.delete');

    // CMS: Global Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');

    // CMS: Hero Section
    Route::get('/hero', [AdminController::class, 'heroSettings'])->name('admin.hero');
    Route::post('/hero', [AdminController::class, 'updateSettings'])->name('admin.hero.update');
    Route::post('/hero/organizers', [AdminController::class, 'storeHeroOrganizer'])->name('admin.hero.organizers.store');
    Route::put('/hero/organizers/{id}', [AdminController::class, 'updateHeroOrganizer'])->name('admin.hero.organizers.update');
    Route::delete('/hero/organizers/{id}', [AdminController::class, 'destroyHeroOrganizer'])->name('admin.hero.organizers.destroy');
    Route::post('/hero/organizers/reorder', [AdminController::class, 'reorderHeroOrganizers'])->name('admin.hero.organizers.reorder');

    // CMS: About Section
    Route::get('/about', [AdminController::class, 'aboutSettings'])->name('admin.about');
    Route::post('/about', [AdminController::class, 'updateSettings'])->name('admin.about.update');

    // CMS: Conference Section
    Route::get('/conference', [AdminController::class, 'conferenceSettings'])->name('admin.conference');
    Route::post('/conference', [AdminController::class, 'updateSettings'])->name('admin.conference.update');

    // CMS: Conference Objectives Section
    Route::get('/objectives', [AdminController::class, 'objectivesSettings'])->name('admin.objectives');
    Route::post('/objectives', [AdminController::class, 'updateObjectivesSettings'])->name('admin.objectives.update');

    // CMS: Who Can Attend (Participants) Section
    Route::get('/participants', [AdminController::class, 'participantsSettings'])->name('admin.participants');
    Route::post('/participants', [AdminController::class, 'updateSettings'])->name('admin.participants.update');

    // CMS: Key Expected Outcomes Section
    Route::get('/outcomes', [AdminController::class, 'outcomesSettings'])->name('admin.outcomes');
    Route::post('/outcomes', [AdminController::class, 'updateSettings'])->name('admin.outcomes.update');

    // CMS: About Organizer Section
    Route::get('/about-organizer', [AdminController::class, 'aboutOrganizerSettings'])->name('admin.about_organizer');
    Route::post('/about-organizer', [AdminController::class, 'updateSettings'])->name('admin.about_organizer.update');

    // CMS: Guidelines Section
    Route::get('/guidelines', [AdminController::class, 'guidelinesSettings'])->name('admin.guidelines');
    Route::post('/guidelines', [AdminController::class, 'updateGuidelinesSettings'])->name('admin.guidelines.update');

    // CMS: Event Details (Schedule, Deadlines, Venue)
    Route::get('/event-details', [AdminController::class, 'eventDetails'])->name('admin.event_details');
    Route::post('/event-details', [AdminController::class, 'updateEventDetails'])->name('admin.event_details.update');
    Route::post('/event-details/deadlines', [AdminController::class, 'storeDeadline'])->name('admin.deadlines.store');
    Route::put('/event-details/deadlines/{id}', [AdminController::class, 'updateDeadline'])->name('admin.deadlines.update');
    Route::delete('/event-details/deadlines/{id}', [AdminController::class, 'deleteDeadline'])->name('admin.deadlines.delete');

    // CMS: Registration Page Content
    Route::get('/settings/registration', [AdminController::class, 'registrationSettings'])->name('admin.settings.registration');
    Route::post('/settings/registration', [AdminController::class, 'updateRegistrationSettings'])->name('admin.settings.registration.update');
    
    // CMS: Interest Options
    Route::post('/interest-options', [AdminController::class, 'storeInterestOption'])->name('admin.interest_options.store');
    Route::delete('/interest-options/{id}', [AdminController::class, 'deleteInterestOption'])->name('admin.interest_options.delete');

    // CMS: Programs & Themes (Workshop & Thrust Areas)
    Route::get('/programs', [AdminController::class, 'programsSettings'])->name('admin.programs');
    Route::post('/programs', [AdminController::class, 'updateProgramsSettings'])->name('admin.programs.update');
    Route::post('/programs/tracks', [AdminController::class, 'storeTrack'])->name('admin.tracks.store');
    Route::put('/programs/tracks/{id}', [AdminController::class, 'updateTrack'])->name('admin.tracks.update');
    Route::delete('/programs/tracks/{id}', [AdminController::class, 'destroyTrack'])->name('admin.tracks.destroy');

    // Pillars Settings
    Route::get('/pillars', [AdminController::class, 'pillarsSettings'])->name('admin.pillars');
    Route::post('/pillars', [AdminController::class, 'updateSettings'])->name('admin.pillars.update');

    // CMS: Abstracts & Awards
    Route::get('/abstracts-awards', [AdminController::class, 'abstractsAwards'])->name('admin.abstracts_awards');
    Route::post('/abstracts-awards', [AdminController::class, 'updateAbstractsAwards'])->name('admin.abstracts_awards.update');



    // CMS: Venue
    Route::get('/venue', [AdminController::class, 'venueSettings'])->name('admin.venue');
    Route::post('/venue', [AdminController::class, 'updateSettings'])->name('admin.venue.update');

    // CMS: Addons
    Route::get('/addons', [AdminController::class, 'addons'])->name('admin.addons');
    Route::post('/addons', [AdminController::class, 'storeAddon'])->name('admin.addons.store');
    Route::put('/addons/{id}', [AdminController::class, 'updateAddon'])->name('admin.addons.update');
    Route::delete('/addons/{id}', [AdminController::class, 'deleteAddon'])->name('admin.addons.delete');

    // CMS: Policies
    Route::get('/policies', [AdminController::class, 'policies'])->name('admin.policies');
    Route::post('/policies', [AdminController::class, 'storePolicy'])->name('admin.policies.store');
    Route::put('/policies/{id}', [AdminController::class, 'updatePolicy'])->name('admin.policies.update');
    
    // CMS: Submit Paper Settings
    Route::get('/settings/submit-paper', [AdminController::class, 'submitPaperSettings'])->name('admin.submit_paper_settings');
    Route::post('/settings/submit-paper', [AdminController::class, 'updateSubmitPaperSettings'])->name('admin.submit_paper_settings.update');

    // CMS: Page Banners
    Route::get('/settings/page-banners', [AdminController::class, 'pageBanners'])->name('admin.page_banners');
    Route::post('/settings/page-banners', [AdminController::class, 'updatePageBanners'])->name('admin.page_banners.update');

    // CMS: Submit Paper Form Builder
    Route::get('/settings/submit-paper/fields', [AdminController::class, 'submitPaperFormFields'])->name('admin.submit_paper_fields');
    Route::post('/settings/submit-paper/fields', [AdminController::class, 'storeSubmitPaperFormField'])->name('admin.submit_paper_fields.store');
    Route::put('/settings/submit-paper/fields/{id}', [AdminController::class, 'updateSubmitPaperFormField'])->name('admin.submit_paper_fields.update');
    Route::delete('/settings/submit-paper/fields/{id}', [AdminController::class, 'destroySubmitPaperFormField'])->name('admin.submit_paper_fields.destroy');
    Route::delete('/policies/{id}', [AdminController::class, 'deletePolicy'])->name('admin.policies.delete');

    // Speakers CMS
    Route::get('/speakers', [AdminController::class, 'speakers'])->name('admin.speakers');
    Route::post('/speakers', [AdminController::class, 'storeSpeaker'])->name('admin.speakers.store');
    Route::put('/speakers/{id}', [AdminController::class, 'updateSpeaker'])->name('admin.speakers.update');
    Route::delete('/speakers/{id}', [AdminController::class, 'destroySpeaker'])->name('admin.speakers.destroy');

    // Topics CMS
    Route::get('/topics', [AdminController::class, 'topics'])->name('admin.topics');
    Route::post('/topics/settings', [AdminController::class, 'updateTopicsSettings'])->name('admin.topics.update_settings');
    Route::post('/topics', [AdminController::class, 'storeTopic'])->name('admin.topics.store');
    Route::put('/topics/{id}', [AdminController::class, 'updateTopic'])->name('admin.topics.update');
    Route::delete('/topics/{id}', [AdminController::class, 'destroyTopic'])->name('admin.topics.destroy');

    // Highlights CMS
    Route::get('/highlights', [AdminController::class, 'highlights'])->name('admin.highlights');
    Route::post('/highlights/settings', [AdminController::class, 'updateHighlightsSettings'])->name('admin.highlights.update_settings');
    Route::post('/highlights', [AdminController::class, 'storeHighlight'])->name('admin.highlights.store');
    Route::put('/highlights/{id}', [AdminController::class, 'updateHighlight'])->name('admin.highlights.update');
    Route::delete('/highlights/{id}', [AdminController::class, 'destroyHighlight'])->name('admin.highlights.destroy');

    // Committee CMS
    Route::get('/committee', [AdminController::class, 'committee'])->name('admin.committee');
    Route::post('/committee', [AdminController::class, 'storeCommitteeMember'])->name('admin.committee.store');
    Route::put('/committee/{id}', [AdminController::class, 'updateCommitteeMember'])->name('admin.committee.update');
    Route::delete('/committee/{id}', [AdminController::class, 'destroyCommitteeMember'])->name('admin.committee.destroy');
    // Sponsors CMS
    Route::get('/sponsors', [AdminController::class, 'sponsors'])->name('admin.sponsors');
    Route::post('/sponsors/settings', [AdminController::class, 'updateSponsorSettings'])->name('admin.sponsors.settings.update');
    Route::post('/sponsors/packages', [AdminController::class, 'storeSponsorPackage'])->name('admin.sponsors.packages.store');
    Route::put('/sponsors/packages/{id}', [AdminController::class, 'updateSponsorPackage'])->name('admin.sponsors.packages.update');
    Route::delete('/sponsors/packages/{id}', [AdminController::class, 'destroySponsorPackage'])->name('admin.sponsors.packages.destroy');

    // Awards CMS
    Route::get('/awards', [AdminController::class, 'awards'])->name('admin.awards');
    Route::post('/awards/settings', [AdminController::class, 'updateAwardsSettings'])->name('admin.awards.settings.update');
    Route::post('/awards', [AdminController::class, 'storeAward'])->name('admin.awards.store');
    Route::put('/awards/{id}', [AdminController::class, 'updateAward'])->name('admin.awards.update');
    Route::delete('/awards/{id}', [AdminController::class, 'destroyAward'])->name('admin.awards.destroy');
});

// Award Application Routes
Route::get('/downloads/proforma', function () {
    $headers = [
        "Content-type"        => "application/msword",
        "Content-Disposition" => "attachment;Filename=Proforma_For_Nomination.doc",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];
    return response()->view('downloads.proforma')->withHeaders($headers);
})->name('download.proforma');

Route::get('/downloads/proforma-scholar', function () {
    $headers = [
        "Content-type"        => "application/msword",
        "Content-Disposition" => "attachment;Filename=Proforma_For_Scholar_Award.doc",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];
    return response()->view('downloads.proforma_scholar')->withHeaders($headers);
})->name('download.proforma_scholar');

Route::get('/downloads/proforma-innovator', function () {
    $headers = [
        "Content-type"        => "application/msword",
        "Content-Disposition" => "attachment;Filename=Proforma_For_Innovator_Award.doc",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];
    return response()->view('downloads.proforma_innovator')->withHeaders($headers);
})->name('download.proforma_innovator');

Route::post('/awards/apply', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'application_file' => 'required|file|mimes:doc,docx,pdf|max:10240', // 10MB max
    ]);

    $awardName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $request->input('award_name', 'Award'));
    $file = $request->file('application_file');
    $filename = time() . '_' . $awardName . '_' . $file->getClientOriginalName();
    
    // Store in storage/app/public/award_applications
    $file->storeAs('public/award_applications', $filename);
    
    return redirect()->back()->with('success', 'Your application has been submitted successfully!');
})->name('awards.apply');

Route::get('/pre-conference', function () {
    $bannerSettings = \App\Models\SiteSetting::where('group', 'page_banners')->pluck('value', 'key')->toArray();
    return view('pre_conference', compact('bannerSettings'));
})->name('pre-conference');

Route::get('/mcc-memorial', function () {
    return view('mcc_memorial');
})->name('mcc-memorial');

