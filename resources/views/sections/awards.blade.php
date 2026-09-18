<!-- Conference Awards Section -->
<section class="awards-section" style="background-color: #ffffff; padding: 70px 0 50px 0; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 20px;">
        
        <!-- Centered Header -->
        <div class="section-header-center" style="text-align: center; margin-bottom: 50px;">
            <h2 class="section-title" style="margin-top: 0; margin-bottom: 14px; color: #0f172a; font-weight: 800; font-size: 2.2rem; text-transform: uppercase; tracking: -0.5px;">
                {{ $settings['awards_section_title'] ?? 'CONFERENCE AWARDS' }}
            </h2>
            <div class="header-line" style="width: 60px; height: 3px; background-color: #009688; margin: 0 auto 16px auto; border-radius: 2px;"></div>
            <p class="participants-desc" style="max-width: 750px; margin: 0 auto; color: #64748b; font-size: 1.05rem; line-height: 1.6;">
                {{ $settings['awards_section_sub'] ?? 'Celebrating exceptional scholastic achievements, research excellence, and entrepreneurial vision with cash prizes and distiction.' }}
            </p>
        </div>

        <!-- Awards List Container -->
        <div style="max-width: 700px; margin: 0 auto; border: 2px solid #9fb6f2; background-color: #f4f9f9; border-radius: 4px; overflow: hidden;">
            
            @for($i = 1; $i <= ($settings['awards_count'] ?? 20); $i++)
                @if(!empty($settings['award_' . $i . '_title']))
                <!-- Row {{ $i }} -->
                <div style="display: flex; align-items: center; justify-content: space-between; padding: 25px 30px; {{ $i < 3 ? 'border-bottom: 2px solid #9fb6f2;' : '' }}">
                    <div style="display: flex; align-items: center; gap: 25px; flex: 1;">
                        <i class="{{ $settings['award_' . $i . '_icon'] ?? 'fa-solid fa-award' }}" style="font-size: 3rem; color: #f59e0b;"></i>
                        <h4 style="margin: 0; color: #1e3250; font-size: 1.3rem; font-weight: 500; font-family: Georgia, serif; line-height: 1.5; text-align: center; flex: 1;">
                            {!! nl2br(e($settings['award_' . $i . '_title'])) !!}
                        </h4>
                    </div>
                    <div style="font-size: 1.5rem; font-weight: 800; color: #1e3250; min-width: 120px; text-align: right;">
                        {{ $settings['award_' . $i . '_amount'] ?? '' }}
                    </div>
                </div>
                @endif
            @endfor

            <!-- Bottom Banner -->
            @if(!empty($settings['awards_footer_note']))
            <div style="background-color: #154770; padding: 20px 30px; display: flex; align-items: center; gap: 30px; justify-content: center;">
                <img src="{{ asset('images/gold-medal.png') }}" alt="Gold Medal" style="height: 60px; width: auto; object-fit: contain;">
                <h4 style="margin: 0; color: #ffffff; font-size: 1.15rem; font-weight: 500; line-height: 1.6; text-align: center;">
                    {!! nl2br(e($settings['awards_footer_note'])) !!}
                </h4>
            </div>
            @endif

        </div>

    </div>
</section>
