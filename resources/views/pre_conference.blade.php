@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = $bannerSettings['banner_pre_conference_title'] ?? 'PRE-CONFERENCE WORKSHOP';
        $bannerImage = $bannerSettings['banner_pre_conference_image'] ?? 'images/2026-bg.jpg';
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.8), rgba(10, 25, 47, 0.85)), url('" . asset($bannerImage) . "');" : '' }} padding: 100px 0 80px 0; text-align: center; color: white;">
        <div class="page-banner-content" style="max-width: 900px; margin: 0 auto; padding: 0 20px;">
            <h1 style="text-transform: uppercase; font-size: 2.5rem; font-weight: 800; margin-bottom: 20px; letter-spacing: 1px; color: #fff;">{{ $bannerTitle }}</h1>
            <p style="font-size: 1.2rem; color: #94a3b8; margin: 0 auto; max-width: 800px; line-height: 1.6;">
                Pre-Conference Consultative Workshop on<br>
                <strong style="color: #009688; font-size: 1.4rem;">GLOBAL ONE HEALTH CONFLUENCE 2026</strong><br>
                Bridging Microbes, Molecules & Mankind for Sustainability
            </p>
        </div>
    </div>

<style>
    .pre-conf-wrap {
        padding: 70px 0;
        background-color: #f8fafc;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }
    
    .pre-conf-container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .pre-conf-section {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        padding: 40px;
        margin-bottom: 40px;
        border-top: 5px solid #009688;
    }

    .pre-conf-title {
        color: #0f172a;
        font-size: 1.8rem;
        font-weight: 800;
        margin-top: 0;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .pre-conf-text {
        color: #475569;
        line-height: 1.8;
        font-size: 1.05rem;
        text-align: justify;
    }

    .obj-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .obj-list li {
        position: relative;
        padding-left: 45px;
        margin-bottom: 20px;
        color: #334155;
        font-size: 1.05rem;
        line-height: 1.7;
    }

    .obj-list li::before {
        content: '\f00c';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        background: #d1fae5;
        color: #059669;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }

    .schedule-table-wrap {
        overflow-x: auto;
    }

    .schedule-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        min-width: 800px;
    }

    .schedule-table th {
        background-color: #1e293b;
        color: #ffffff;
        padding: 18px 20px;
        text-align: left;
        font-weight: 600;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        border: none;
    }
    
    .schedule-table th:first-child { border-top-left-radius: 8px; }
    .schedule-table th:last-child { border-top-right-radius: 8px; }

    .schedule-table td {
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
        color: #475569;
        font-size: 0.95rem;
        line-height: 1.6;
        vertical-align: top;
    }

    .schedule-table tr:last-child td {
        border-bottom: none;
    }

    .schedule-table tr:hover td {
        background-color: #f8fafc;
    }

    .schedule-note {
        background: #e0f2fe;
        border-left: 4px solid #0284c7;
        padding: 15px 20px;
        border-radius: 4px;
        margin-bottom: 30px;
        color: #0369a1;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    @media (max-width: 768px) {
        .pre-conf-section { padding: 25px; }
    }
</style>

<div class="pre-conf-wrap">
    <div class="pre-conf-container">

        <!-- PREAMBLE -->
        <div class="pre-conf-section">
            <h2 class="pre-conf-title"><i class="fa-solid fa-book-open" style="color: #009688;"></i> PREAMBLE</h2>
            <p class="pre-conf-text">
                The Pre-Conference Consultation of Global One Health Confluence 2026 aims to bring together eminent experts, academicians, researchers, healthcare professionals, policymakers and resource persons from diverse disciplines to provide focused and meaningful inputs for the scientific, thematic and collaborative planning of the conference. The consultation will facilitate interdisciplinary dialogue on key One Health priorities, including antimicrobial resistance, infectious and zoonotic diseases, veterinary and public health, environmental and planetary health, food and agricultural sustainability, Siddha and Indian Knowledge Systems (IKS), biotechnology, nanotechnology, innovation, public health and policy governance. It will provide an opportunity to identify emerging challenges, regional priorities and research needs relevant to Tamil Nadu and to develop scientifically relevant sessions, lectures, panel discussions and collaborative activities for GOHC 2026. The consultation will further encourage the exchange of expertise, experiences and innovative ideas among participating institutions and stakeholders, while strengthening academia–industry–healthcare–government partnerships and identifying opportunities for joint research, knowledge exchange, capacity building and translational initiatives. The inputs and recommendations emerging from the consultation will contribute towards shaping a comprehensive and impactful conference programme aligned with the theme "Bridging Microbes, Molecules & Mankind for Sustainability", while promoting integrated, evidence-based and sustainable approaches to human, animal and environmental health.
            </p>
        </div>

        <!-- KEY OBJECTIVES -->
        <div class="pre-conf-section" style="border-top-color: #f59e0b;">
            <h2 class="pre-conf-title"><i class="fa-solid fa-bullseye" style="color: #f59e0b;"></i> KEY OBJECTIVES</h2>
            <ul class="obj-list">
                <li>To obtain expert inputs for the scientific and thematic planning of Global One Health Confluence 2026.</li>
                <li>To facilitate interdisciplinary dialogue on human health, animal health, environmental health and allied One Health domains.</li>
                <li>To discuss regional priorities related to antimicrobial resistance, infectious diseases, zoonotic diseases, veterinary public health, IKS and public health.</li>
                <li>To integrate diverse expert perspectives into the scientific sessions and thematic discussions of GOHC 2026.</li>
                <li>To strengthen institutional and professional collaboration towards advancing sustainable and integrated One Health approaches.</li>
            </ul>
        </div>

        <!-- SCHEDULE -->
        <div class="pre-conf-section" style="border-top-color: #3b82f6;">
            <h2 class="pre-conf-title"><i class="fa-regular fa-calendar-days" style="color: #3b82f6;"></i> SCHEDULE FOR THE PRE-CONFERENCE</h2>
            
            <div class="schedule-note">
                <i class="fa-solid fa-circle-info"></i> Proposed date: 25th September 2026 | Venue: Blue-whale auditorium, MMIP | Mode: Hybrid
            </div>

            <div class="schedule-table-wrap">
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th style="width: 8%;">S.No</th>
                            <th style="width: 25%;">Resource Persons</th>
                            <th style="width: 37%;">Affiliation</th>
                            <th style="width: 30%;">Expertise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td style="text-align: center;">
                                <img src="{{ asset('images/raman_muthusamy_cropped.png') }}" alt="Prof. Dr. Raman Muthusamy" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; margin: 0 auto 10px auto; display: block; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                <strong style="color: #0f172a;">Prof. Dr. Raman Muthusamy</strong>
                            </td>
                            <td>Advisor & Cluster Head, One Health, Center for Global Healrtth Research, Saveetha Medical College, Former Director, Translational Research platform for Veterinary Biologicals, TANUVAS, Chennai</td>
                            <td>One Health, AMR, Zoonotic disease and translational research</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td style="text-align: center;">
                                <img src="{{ asset('images/suresh_kannan.png') }}" alt="Dr. S. Suresh Kannan" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; margin: 0 auto 10px auto; display: block; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                <strong style="color: #0f172a;">Dr. S. Suresh Kannan</strong>
                            </td>
                            <td>Professor & Head, Department of Veterinary Public Health and Epidemiology, Madras Veterinary college, Chennai</td>
                            <td>One health, zoonotic disease surveillance, AMR and veterinary public health</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td style="text-align: center;">
                                <img src="{{ asset('images/meenakshi_sundaram.png') }}" alt="Dr. M. Meenakshi Sundaram" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; margin: 0 auto 10px auto; display: block; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                <strong style="color: #0f172a;">Dr. M. Meenakshi Sundaram</strong>
                            </td>
                            <td>Dean, Professor & Head, Department of Kuzhandhai Muruthuvam, National Institute of Siddha, Chennai</td>
                            <td>Indian Knowledge system</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td style="text-align: center;">
                                <img src="{{ asset('images/vijaykumar.png') }}" alt="Dr. V. Vijaykumar" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; margin: 0 auto 10px auto; display: block; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                <strong style="color: #0f172a;">Dr. V. Vijaykumar</strong>
                            </td>
                            <td>Expert Advisor for child health, National Health Mission, Chennai</td>
                            <td>Public health integration and environmental determinants and health policy</td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td style="text-align: center;">
                                <img src="{{ asset('images/ramdev_krishnan.png') }}" alt="Dr. Ramdev Krishnan. J" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; margin: 0 auto 10px auto; display: block; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                <strong style="color: #0f172a;">Dr. Ramdev Krishnan. J</strong>
                            </td>
                            <td>Head of Operations, Mazumdarshaw Medical Foundation (MSMF)-TBI Narayana Health, Bangalore</td>
                            <td>AI in health-care</td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td colspan="3"><strong style="color: #0f172a;">Panel discussion with Doctors and health care experts (Tentative)</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@include('sections.footer')

@endsection
