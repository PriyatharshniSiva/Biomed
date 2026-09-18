@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

<!-- Hero Section -->
<div style="background: url('{{ asset('images/hero-bg.png') }}') center center/cover no-repeat; padding: 120px 0 80px 0; position: relative;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.85);"></div>
    <div class="container" style="position: relative; z-index: 1; text-align: center;">
        <h1 style="color: #ffffff; font-size: 3rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin: 0;">MCC MEMORIAL</h1>
    </div>
</div>

<section style="background-color: #0f172a; padding: 80px 0; min-height: 80vh; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; text-align: center;">
        <h2 style="color: #fff; font-size: 2.5rem; font-weight: 800; margin-bottom: 20px;">Memories of MCC</h2>
        <p style="color: #94a3b8; font-size: 1.1rem; line-height: 1.8; max-width: 800px; margin: 0 auto 50px auto;">
            Experience a visual journey through the heritage, corridors, and legacy of the Madras Christian College.
        </p>

        <!-- 3D Image Stream Container -->
        <div id="image-stream-hero" style="position: relative; overflow: hidden; width: 100%; height: 600px; container-type: inline-size; background: #000; border-radius: 16px; border: 1px solid #1e293b; box-shadow: 0 20px 40px rgba(0,0,0,0.5);">
            <style id="image-stream-styles"></style>
            
            <div aria-hidden="true" style="pointer-events: none; position: absolute; inset: 0; perspective: 30cqw; perspective-origin: 50% 55%;">
                <div id="image-stream-cards" style="position: absolute; inset: 0; transform-style: preserve-3d;">
                    <!-- Cards will be injected here by JS -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const PATH = {
        perspective: 30,
        cardWidth: 18,
        cardHeight: 25,
        cardRadius: 0.4,
        birthHeight: 2.6,
        exitHeight: 46,
        railBirth: -11,
        railExit: 44,
        fan: 3.3,
        turnBirth: 6,
        turnExit: 28,
        stops: 24,
    };

    function generateKeyframes(dir, name, p) {
        let steps = [];
        for (let s = 0; s <= p.stops; s++) {
            const u = s / p.stops;
            const scale = (p.birthHeight / p.cardHeight) * Math.pow(p.exitHeight / p.birthHeight, u);
            const z = p.perspective * (1 - 1 / scale);
            const rail = p.railExit - (p.railExit - p.railBirth) * Math.pow(1 - u, p.fan);
            const turn = p.turnBirth + (p.turnExit - p.turnBirth) * u;
            steps.push(`${(u * 100).toFixed(2)}%{transform:translate3d(${(dir * rail).toFixed(2)}cqw,0,${z.toFixed(2)}cqw) rotateY(${(-dir * turn).toFixed(2)}deg)}`);
        }
        return `@keyframes ${name}{${steps.join("")}}`;
    }

    const rightName = "ish-r-memorial";
    const leftName = "ish-l-memorial";
    const cardClass = "ish-c-memorial";
    
    let css = generateKeyframes(1, rightName, PATH) + generateKeyframes(-1, leftName, PATH);
    css += `@media(prefers-reduced-motion:reduce){.${cardClass}{animation-play-state:paused}}`;
    
    document.getElementById("image-stream-styles").innerHTML = css;

    const images = [
        "{{ asset('images/mcc_memorial_1.jpg') }}",
        "{{ asset('images/mcc_memorial_2.jpg') }}",
        "{{ asset('images/mcc_memorial_3.jpg') }}",
        "{{ asset('images/mcc_memorial_4.jpg') }}",
        "{{ asset('images/mcc_memorial_5.jpg') }}",
        "{{ asset('images/mcc_memorial_6.jpg') }}",
        "{{ asset('images/mcc_memorial_7.jpg') }}",
        "{{ asset('images/mcc_memorial_8.jpg') }}",
        "{{ asset('images/mcc_memorial_9.jpg') }}"
    ];

    const cards = 9;
    const speed = 18;
    const axis = 55;
    
    const container = document.getElementById("image-stream-cards");
    let html = "";
    
    [rightName, leftName].forEach(name => {
        for(let i = 0; i < cards; i++) {
            const img = images[i % images.length];
            html += `
            <div class="${cardClass}" style="
                position: absolute; 
                overflow: hidden;
                left: 50%;
                top: ${axis}%;
                width: ${PATH.cardWidth}cqw;
                height: ${PATH.cardHeight}cqw;
                margin-left: ${-PATH.cardWidth / 2}cqw;
                margin-top: ${-PATH.cardHeight / 2}cqw;
                border-radius: ${PATH.cardRadius}cqw;
                animation: ${name} ${speed}s linear infinite;
                animation-delay: ${-(i * speed) / cards}s;
                backface-visibility: hidden;
                box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            ">
                <img src="${img}" style="height: 100%; width: 100%; object-fit: cover;" draggable="false" />
            </div>`;
        }
    });
    
    container.innerHTML = html;
});
</script>

@include('sections.footer')
@endsection
