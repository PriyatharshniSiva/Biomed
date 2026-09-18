@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

<!-- Hero Section -->
<div style="background: url('{{ asset('images/hero-bg.png') }}') center center/cover no-repeat; padding: 120px 0 80px 0; position: relative;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.85);"></div>
    <div class="container" style="position: relative; z-index: 1; text-align: center;">
        <h1 style="color: #ffffff; font-size: 3rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin: 0;">VENUE</h1>
    </div>
</div>

<!-- Venue Content Section -->
<section style="padding: 80px 0; background-color: #ffffff; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 20px;">
        
        <!-- Top Grid: Images & Map -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 60px;">
            <!-- Left: Images -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <!-- Main tall image -->
                <div style="grid-column: 1 / 2; grid-row: 1 / 3;">
                    <img src="{{ asset('images/mcc_main.jpg') }}" alt="MCC Campus" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px; border: 4px solid #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                </div>
                <!-- Stacked smaller images -->
                <div>
                    <img src="{{ asset('images/mcc_images.jpg') }}" alt="MCC Campus" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; border: 4px solid #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                </div>
                <div>
                    <img src="{{ asset('images/mcc4.jpg') }}" alt="MCC Campus" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; border: 4px solid #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                </div>
            </div>
            
            <!-- Right: Map -->
            <div style="border-radius: 8px; overflow: hidden; border: 4px solid #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.6656816562095!2d80.11300951482084!3d12.929202790883648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525f0a00000001%3A0x1a8f9b9f71c9df68!2sMadras%20Christian%20College!5e0!3m2!1sen!2sin!4v1689255018693!5m2!1sen!2sin" width="100%" height="100%" style="border:0; min-height: 415px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- Content -->
        <div style="max-width: 900px; margin: 0 auto;">
            
            @php
                $settings = \App\Models\SiteSetting::where('group', 'venue')->pluck('value', 'key');
            @endphp

            <div style="margin-bottom: 40px; text-align: center;">
                <h3 style="color: #0f172a; font-size: 1.4rem; font-weight: 700; margin-bottom: 15px;">{{ $settings['venue_s1_heading'] ?? 'Discover Madras Christian College' }}</h3>
                <p style="color: #475569; font-size: 0.95rem; line-height: 1.8;">
                    {{ $settings['venue_s1_content'] ?? "Founded in 1837, Madras Christian College (MCC) is one of Asia's oldest and most prestigious academic institutions. Set within a sprawling, lush 320-acre scrub jungle campus in Tambaram, Chennai, MCC offers a serene, intellectually stimulating environment that provides a perfect backdrop for international conferences, global collaboration, and cutting-edge scientific exchange." }}
                </p>
            </div>

            <div style="margin-bottom: 40px; text-align: center;">
                <h3 style="color: #0f172a; font-size: 1.4rem; font-weight: 700; margin-bottom: 15px;">{{ $settings['venue_s2_heading'] ?? 'A Hub of Heritage & Innovation' }}</h3>
                <p style="color: #475569; font-size: 0.95rem; line-height: 1.8;">
                    {{ $settings['venue_s2_content'] ?? 'MCC seamlessly blends a rich historical legacy with modern scientific inquiry. With a profound history of producing renowned scholars, researchers, and global leaders, the institution continues to foster excellence. Its proximity to prominent research hubs in Chennai and its own state-of-the-art facilities make it an ideal meeting point for the BioMed Summit 2027.' }}
                </p>
            </div>

            <div style="margin-bottom: 40px; text-align: center;">
                <h3 style="color: #0f172a; font-size: 1.4rem; font-weight: 700; margin-bottom: 15px;">{{ $settings['venue_s3_heading'] ?? 'Campus Biodiversity & Environment' }}</h3>
                <p style="color: #475569; font-size: 0.95rem; line-height: 1.8;">
                    {{ $settings['venue_s3_content'] ?? 'The MCC campus is a documented sanctuary of rare flora and fauna, providing delegates with a refreshing escape from the urban hustle. During the conference, attendees can enjoy:' }}
                </p>
                <ul style="color: #475569; font-size: 0.95rem; line-height: 1.8; text-align: left; max-width: 700px; margin: 20px auto 0 auto; padding-left: 20px;">
                    @php
                        $bulletsText = $settings['venue_s3_bullets'] ?? "Exploring the expansive, protected scrub jungle ecosystem\nHistoric British-era architectural landmarks seamlessly integrated with modern halls\nA tranquil, pollution-free atmosphere ideal for focused scientific networking\nThe vibrant cultural heritage and traditional South Indian hospitality of Chennai";
                        $bullets = array_filter(array_map('trim', explode("\n", $bulletsText)));
                    @endphp
                    @foreach($bullets as $bullet)
                        <li style="margin-bottom: 8px;">{{ $bullet }}</li>
                    @endforeach
                </ul>
            </div>

            <div style="margin-bottom: 40px; text-align: center;">
                <h3 style="color: #0f172a; font-size: 1.4rem; font-weight: 700; margin-bottom: 15px;">{{ $settings['venue_s4_heading'] ?? 'Easy Accessibility' }}</h3>
                <p style="color: #475569; font-size: 0.95rem; line-height: 1.8;">
                    {{ $settings['venue_s4_content'] ?? 'Located in the bustling metropolis of Chennai, MCC is exceptionally well-connected. It is easily accessible via the Chennai International Airport (MAA), which offers direct flights worldwide. Furthermore, the Tambaram Railway Station and major transit hubs are situated directly opposite the campus, ensuring seamless domestic and international travel for all delegates.' }}
                </p>
            </div>

            <div style="text-align: center;">
                <h3 style="color: #0f172a; font-size: 1.4rem; font-weight: 700; margin-bottom: 15px;">{{ $settings['venue_s5_heading'] ?? 'World-Class Conference Facilities' }}</h3>
                <p style="color: #475569; font-size: 0.95rem; line-height: 1.8;">
                    {{ $settings['venue_s5_content'] ?? 'MCC boasts a wide array of premium venues, including historic grand auditoriums and highly equipped modern smart-halls. With advanced audio-visual technology, high-speed connectivity, and spacious seating, the campus provides a highly professional, comfortable, and accommodating environment for large-scale plenary sessions and specialized workshops alike.' }}
                </p>
            </div>

        </div>
    </div>
</section>

@include('sections.footer')
@endsection
