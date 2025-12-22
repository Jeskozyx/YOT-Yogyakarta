<div class="max-w-8xl mx-auto mb-24 animate-fade-in-up animation-delay-600">
    <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12">Meet The Developers</h2>
    <div class="relative px-4 md:px-12">
        <div class="team-carousel-container overflow-hidden py-4">
            <div id="teamCarouselTrack" class="flex transition-transform duration-500 ease-in-out gap-6">
                @php
                    $teamMembers = [
                        ['name' => 'Billy Boen', 'role' => 'Founder', 'image' => 'images/team/Muhammad Sulthan Al Azzam_124230127.png'],
                        ['name' => 'Stevanus G', 'role' => 'Co-Founder', 'image' => 'images/divisi/IMG_2437.JPG'],
                        ['name' => 'Noverica W', 'role' => 'Director', 'image' => 'https://ui-avatars.com/api/?name=Noverica+Widjojo&background=0D8ABC&color=fff'],
                        ['name' => 'Team 4', 'role' => 'Staff', 'image' => 'https://ui-avatars.com/api/?name=Team+4&background=0D8ABC&color=fff'],
                        ['name' => 'Team 5', 'role' => 'Staff', 'image' => 'https://ui-avatars.com/api/?name=Team+5&background=0D8ABC&color=fff'],
                    ];
                @endphp
                @foreach ($teamMembers as $member)
                    <div class="team-card min-w-full md:min-w-[calc(50%-12px)] lg:min-w-[calc(25%-18px)] flex flex-col items-center group">
                        <div class="w-full aspect-[3/4] mb-4 rounded-2xl overflow-hidden shadow-lg relative bg-gray-200">
                            <img src="{{ $member['image'] }}" onerror="this.src='https://ui-avatars.com/api/?name={{$member['name']}}'" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-4">
                                <span class="text-white font-medium">{{ $member['role'] }}</span>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $member['name'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
        
        <button onclick="prevTeam()" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white p-3 rounded-full shadow-xl hover:scale-110 z-10 -ml-4 border border-gray-100">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button onclick="nextTeam()" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white p-3 rounded-full shadow-xl hover:scale-110 z-10 -mr-4 border border-gray-100">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>

<script>
    // --- TEAM CAROUSEL LOGIC ---
    // Logika ini dipindahkan ke sini agar terpisah dari file utama
    let teamCurrentIndex = 0;
    const teamTrack = document.getElementById('teamCarouselTrack');
    const teamCards = document.querySelectorAll('.team-card');

    function getVisibleTeamCards() { 
        if (window.innerWidth >= 1024) return 4; 
        if (window.innerWidth >= 768) return 2; 
        return 1; 
    }

    function updateTeamCarousel() {
        if(teamCards.length > 0 && teamTrack) {
            const cardStyle = window.getComputedStyle(teamTrack);
            const gap = parseFloat(cardStyle.gap) || 24;
            const cardWidth = teamCards[0].offsetWidth;
            const moveAmount = (cardWidth + gap) * teamCurrentIndex;
            teamTrack.style.transform = `translateX(-${moveAmount}px)`;
        }
    }

    function nextTeam() {
        const maxIndex = teamCards.length - getVisibleTeamCards();
        if (teamCurrentIndex < maxIndex) { teamCurrentIndex++; } else { teamCurrentIndex = 0; }
        updateTeamCarousel();
    }

    function prevTeam() {
        if (teamCurrentIndex > 0) { teamCurrentIndex--; } else {
            const maxIndex = teamCards.length - getVisibleTeamCards();
            teamCurrentIndex = maxIndex;
        }
        updateTeamCarousel();
    }

    // Initialize Team Carousel
    document.addEventListener('DOMContentLoaded', () => {
        updateTeamCarousel();
    });

    window.addEventListener('resize', () => {
        teamCurrentIndex = 0;
        updateTeamCarousel();
    });
</script>