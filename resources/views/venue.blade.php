@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

<!-- Hero Section -->
<div style="background: url('{{ asset('images/hero-bg.png') }}') center center/cover no-repeat; padding: 120px 0 80px 0; position: relative;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.85);"></div>
    <div class="container" style="position: relative; z-index: 1; text-align: center;">
        <h1 style="color: #ffffff; font-size: 3rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin: 0;">VISIT</h1>
    </div>
</div>

<!-- Places of Interest Section -->
<section style="padding: 80px 0; background-color: #f8fafc; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 style="color: #0f172a; font-size: clamp(2rem, 5vw, 2.8rem); font-weight: 800; margin-bottom: 20px;">Places of Interest in Chennai</h2>
            <p style="color: #475569; font-size: 1.1rem; line-height: 1.8; max-width: 800px; margin: 0 auto;">
                Chennai, the vibrant capital of Tamil Nadu, offers a rich blend of cultural heritage, history, art and coastal beauty. Conference delegates may explore these iconic destinations:
            </p>
        </div>

        <!-- Grid of Places -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;">
            
            <!-- Item 1 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/marina_beach.jpg') }}" alt="Marina Beach" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Marina Beach</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">One of India’s longest urban beaches and an iconic landmark of Chennai.</p>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/kapaleeshwarar_temple.jpg') }}" alt="Kapaleeshwarar Temple" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Kapaleeshwarar Temple, Mylapore</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A historic temple showcasing traditional Dravidian architecture.</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/santhome_basilica.jpg') }}" alt="Santhome Basilica" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Santhome Basilica</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A significant Christian heritage site built over the traditional tomb of St. Thomas the Apostle.</p>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/fort_st_george.jpg') }}" alt="Fort St. George" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Fort St. George</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A historic colonial landmark and an important part of Chennai’s history.</p>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/government_museum.jpg') }}" alt="Government Museum" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Government Museum, Egmore</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">Home to an extensive collection of archaeology, art and bronze sculptures.</p>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/elliots_beach.jpg') }}" alt="Elliot's Beach" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Elliot’s Beach, Besant Nagar</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A popular destination for a relaxing evening by the sea.</p>
                </div>
            </div>

            <!-- Item 7 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/guindy_national_park.jpg') }}" alt="Guindy National Park" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Guindy National Park</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A unique urban national park known for its native flora and fauna.</p>
                </div>
            </div>

            <!-- Item 8 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/chennai_rail_museum.jpg') }}" alt="Chennai Rail Museum" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Chennai Rail Museum</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">Showcasing India’s railway heritage through vintage locomotives and exhibits.</p>
                </div>
            </div>

            <!-- Item 9 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/dakshinachitra.jpg') }}" alt="DakshinaChitra" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">DakshinaChitra</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A cultural museum showcasing the traditional architecture, crafts and lifestyles of South India.</p>
                </div>
            </div>

            <!-- Item 10 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/birla_planetarium.jpg') }}" alt="Birla Planetarium" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Birla Planetarium</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A popular destination for astronomy and science enthusiasts.</p>
                </div>
            </div>
            
        </div>

        <!-- Quote -->
        <div style="margin-top: 70px; padding: 40px; background: #0f172a; border-radius: 16px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <h4 style="color: #009688; font-size: clamp(1.2rem, 3vw, 1.8rem); font-style: italic; font-weight: 600; margin: 0; line-height: 1.5;">
                “Experience Chennai — where tradition, heritage, science and the sea meet.”
            </h4>
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.visit-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'none';
                this.style.boxShadow = '0 4px 15px rgba(0,0,0,0.05)';
            });
        });
    });
</script>

@include('sections.footer')
@endsection
