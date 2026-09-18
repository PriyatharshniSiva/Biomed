@extends('layouts.admin_cms')

@section('header_title', 'Conference Highlights & Scientific Publications Settings')

@section('content')
<style>
    .page-title {
        color: #1a237e;
        font-size: 1.8rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }
    .page-title::before {
        content: '';
        display: block;
        width: 6px;
        height: 28px;
        background: linear-gradient(180deg, #009688 0%, #00796b 100%);
        border-radius: 10px;
    }

    .success-alert {
        background-color: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
        border-radius: 8px;
        padding: 15px 20px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
    }

    .config-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        border: 1px solid #f1f5f9;
        padding: 30px;
        margin-bottom: 30px;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 15px;
    }

    .card-title {
        color: #1e293b;
        font-size: 1.25rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .card-title i {
        color: #009688;
    }

    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 0.95rem;
        color: #334155;
        transition: all 0.3s;
        box-sizing: border-box;
    }
    .form-control:focus {
        border-color: #009688;
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 150, 136, 0.1);
    }

    .btn-save {
        background: #009688;
        color: #ffffff;
        border: none;
        padding: 12px 32px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1.05rem;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-save:hover {
        background: #00796b;
        transform: translateY(-1px);
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
</style>

<div class="page-title">Conference Highlights & Scientific Publications</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('admin.about.update') }}">
    @csrf

    <!-- Section Header Settings -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-heading"></i>
                Section Title Information
            </div>
        </div>
        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Section Heading Title</label>
                <input type="text" name="highlights_title" class="form-control" value="{{ $settings['highlights_title'] ?? 'Conference Highlights' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Section Subtitle</label>
                <input type="text" name="highlights_subtitle" class="form-control" value="{{ $settings['highlights_subtitle'] ?? 'Key features and interactive forums scheduled for the Global One Health Confluence 2026' }}">
            </div>
        </div>
    </div>

    <!-- Scientific Publications Card -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-book-journal-whills"></i>
                Scientific Publications Box Configuration
            </div>
        </div>
        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Box Heading Title</label>
                <input type="text" name="pub_title" class="form-control" value="{{ $settings['pub_title'] ?? 'Scientific Publications' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Box Subtitle / Description</label>
                <input type="text" name="pub_subtitle" class="form-control" value="{{ $settings['pub_subtitle'] ?? 'Selected peer-reviewed manuscripts will be considered for publication in:' }}">
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Publication Option 1</label>
            <input type="text" name="pub_item_1" class="form-control" value="{{ $settings['pub_item_1'] ?? 'Scopus-indexed journals' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Publication Option 2</label>
            <input type="text" name="pub_item_2" class="form-control" value="{{ $settings['pub_item_2'] ?? 'Edited ISBN conference proceedings' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Publication Option 3</label>
            <input type="text" name="pub_item_3" class="form-control" value="{{ $settings['pub_item_3'] ?? 'Special issues with partnering international journals (subject to review)' }}">
        </div>
    </div>

    <!-- Sticky Save Button -->
    <div style="position: sticky; bottom: 20px; z-index: 100; text-align: right; background: rgba(255,255,255,0.9); padding: 15px; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.1); backdrop-filter: blur(8px); border: 1px solid #e2e8f0;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save All Changes
        </button>
    </div>
</form>
@endsection
