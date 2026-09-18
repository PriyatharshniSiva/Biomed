<!-- Thrust Areas Section -->
<section class="thrust-areas-section" style="background-color: #ffffff; padding: 10px 0 40px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        
        <!-- Centered Header -->
        <div class="section-header-center" style="text-align: center; margin-bottom: 30px;">
            <div class="section-subtitle" style="margin-bottom: 8px; font-weight: bold; color: #009688; text-transform: uppercase; letter-spacing: 2px; font-size: 1rem;">Conference Themes</div>
            <h2 class="section-title" style="margin-top: 0; margin-bottom: 12px; color: #333; font-weight: 800;">Thrust <span>Areas</span></h2>
            <div class="header-line" style="width: 60px; height: 4px; background-color: #009688; margin: 0 auto 15px auto;"></div>
            <p class="participants-desc" style="margin-top: 0;">
                {{ $settings['thrust_areas_desc'] ?? 'Explore the latest advancements, critical challenges, and future innovations across our core diagnostic and scientific themes.' }}
            </p>
        </div>

        <!-- TRACK-WISE PRESENTATION SCHEDULE -->
        <div class="presentation-schedule" style="margin-top: 60px; margin-bottom: 50px;">
            <div style="border: 2px solid #009688; border-radius: 12px; padding: 25px; background: #fff; position: relative;">
                
                <!-- Center Header Box -->
                <div style="background: linear-gradient(135deg, #00796B, #009688); color: #fff; text-align: center; font-weight: bold; font-size: 1.4rem; padding: 12px 30px; display: inline-block; position: absolute; top: -25px; left: 50%; transform: translateX(-50%); border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); white-space: nowrap;">
                    TRACK-WISE PRESENTATION SCHEDULE
                </div>

                <div class="schedule-grid" style="display: grid; grid-template-columns: 1fr auto 1fr; gap: 30px; margin-top: 30px; align-items: stretch;">
                    
                    <!-- Left Side: Day I -->
                    <div>
                        <div style="background: linear-gradient(135deg, #00796B, #009688); color: #fff; text-align: center; font-weight: bold; font-size: 1.2rem; padding: 12px; border-radius: 8px 8px 0 0;">
                            Day I – 3:00 PM to 6:00 PM
                        </div>
                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #b2dfdb;">
                            <thead>
                                <tr>
                                    <th style="padding: 12px; text-align: center; color: #00796B; font-weight: bold; font-size: 1.1rem; border-bottom: 1px solid #b2dfdb; border-right: 1px solid #b2dfdb; width: 45%;">Presentation Type</th>
                                    <th style="padding: 12px; text-align: center; color: #00796B; font-weight: bold; font-size: 1.1rem; border-bottom: 1px solid #b2dfdb;">Tracks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-bottom: 1px solid #b2dfdb; border-right: 1px solid #b2dfdb;">Paper Presentation</td>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-bottom: 1px solid #b2dfdb;">Track I, Track II, Track III</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-right: 1px solid #b2dfdb;">Poster Presentation</td>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600;">Track I, Track II, Track III</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Divider -->
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <div style="width: 1px; height: 80%; border-left: 2px dotted #b2dfdb;"></div>
                    </div>

                    <!-- Right Side: Day II -->
                    <div>
                        <div style="background: linear-gradient(135deg, #00796B, #009688); color: #fff; text-align: center; font-weight: bold; font-size: 1.2rem; padding: 12px; border-radius: 8px 8px 0 0;">
                            Day II – 11:15 AM to 1:15 PM
                        </div>
                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #b2dfdb;">
                            <thead>
                                <tr>
                                    <th style="padding: 12px; text-align: center; color: #00796B; font-weight: bold; font-size: 1.1rem; border-bottom: 1px solid #b2dfdb; border-right: 1px solid #b2dfdb; width: 45%;">Presentation Type</th>
                                    <th style="padding: 12px; text-align: center; color: #00796B; font-weight: bold; font-size: 1.1rem; border-bottom: 1px solid #b2dfdb;">Session</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-bottom: 1px solid #b2dfdb; border-right: 1px solid #b2dfdb;">Oral Presentation</td>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-bottom: 1px solid #b2dfdb;">Parallel Session</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-right: 1px solid #b2dfdb;">Poster Presentation</td>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600;">Parallel Session</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            
            <style>
                @media (max-width: 991px) {
                    .schedule-grid {
                        grid-template-columns: 1fr !important;
                    }
                    .schedule-grid > div:nth-child(2) {
                        display: none !important;
                    }
                }
            </style>
        </div>

        <style>
            .thrust-grid-alt {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
                gap: 30px;
                align-items: start; /* Prevents cards from stretching vertically */
            }
            .premium-topic-card {
                background: #ffffff;
                padding: 35px 30px;
                border-radius: 20px;
                box-shadow: 0 10px 40px rgba(15, 23, 42, 0.04);
                border: 1px solid rgba(0, 150, 136, 0.1);
                position: relative;
                overflow: hidden;
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            .premium-topic-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 50px rgba(0, 150, 136, 0.12);
                border-color: rgba(0, 150, 136, 0.3);
            }
            .premium-topic-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 5px;
                background: linear-gradient(90deg, #009688, #84cc16);
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            .premium-topic-card:hover::before {
                opacity: 1;
            }
            .premium-topic-title {
                margin-top: 0;
                margin-bottom: 20px;
                font-size: 1.25rem;
                color: #0f172a;
                font-weight: 800;
                line-height: 1.4;
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .premium-topic-list {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: column;
                gap: 0;
            }
            .premium-topic-list li {
                display: flex;
                gap: 12px;
                font-size: 1.05rem;
                color: #475569;
                line-height: 1.5;
                align-items: flex-start;
                font-weight: 500;
                padding: 12px 0;
                border-bottom: 1px dashed rgba(0,0,0,0.06);
            }
            .premium-topic-list li:last-child {
                border-bottom: none;
                padding-bottom: 0;
            }
            .premium-topic-list li i {
                color: #84cc16; /* Vibrant lime green for the checks */
                margin-top: 4px;
                font-size: 0.95rem;
            }
        </style>
        <div class="thrust-grid-alt">
            @forelse($tracks as $track)
            <div class="premium-topic-card">
                <h3 class="premium-topic-title">
                    <div>{{ $track->title }}</div>
                </h3>
                @if($track->bullet_points && count($track->bullet_points) > 0)
                <ul class="premium-topic-list">
                    @foreach($track->bullet_points as $point)
                    <li><i class="fa-solid fa-check"></i> <span>{{ $point }}</span></li>
                    @endforeach
                </ul>
                @endif
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; color: #64748b; font-style: italic; padding: 40px;">
                Thrust Areas and Tracks will be announced soon.
            </div>
            @endforelse
        </div>
    </div>
</section>
