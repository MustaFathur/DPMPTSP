@extends('layouts.main')
@section('title', 'Beranda | DPMPTSP Kota Padang')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css" />
<style>
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    
    @keyframes fadeInScale {
        0% { 
            opacity: 0;
            transform: scale(0.8);
        }
        100% { 
            opacity: 1;
            transform: scale(1);
        }
    }

    .floating-shape {
        animation: float 6s ease-in-out infinite;
    }

    .fade-in-scale {
        animation: fadeInScale 0.8s ease-out forwards;
    }

    .dot-pattern {
        background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
        background-size: 20px 20px;
    }
    .main-swiper {
        overflow: visible !important; 
        padding: 50px 0;
        margin: 0 70px; 
    }
    .main-swiper .swiper-slide {
        width: auto;
        height: auto;
        transform: scale(0.85);
        opacity: 0.5;
        transition: all 0.3s ease;
    }
    .main-swiper .swiper-slide-active {
        transform: scale(1);
        opacity: 1;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    .main-swiper .swiper-button-next,
    .main-swiper .swiper-button-prev {
        width: 50px;
        height: 50px;
        background-color: red;
        border-radius: 50%;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .main-swiper .swiper-button-next:after,
    .main-swiper .swiper-button-prev:after {
        font-size: 20px;
        color: white;
    }
    .main-swiper .swiper-button-prev {
        left: -70px; 
    }
    .main-swiper .swiper-button-next {
        right: -70px; 
    }

    .custom-carousel {
        cursor: grab;
        user-select: none;
    }
    .custom-carousel:active {
        cursor: grabbing;
    }
    .carousel-track {
        will-change: transform;
    }
    .relative.overflow-hidden {
    overflow: hidden;
    position: relative;
    }
    #carouselTrack {
        display: flex;
        gap: 1.5rem; 
        transition: transform 0.5s ease-out;
        will-change: transform;
    }
    .flex-none {
        flex: 0 0 auto;
    }
</style>

<div class="px-24 pt-16 overflow-hidden relative">
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-20 left-20 w-32 h-32 bg-red-100 rounded-full floating-shape opacity-20" style="animation-delay: 0s;"></div>
        <div class="absolute top-40 right-40 w-24 h-24 bg-gray-200 rounded-full floating-shape opacity-30" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-red-50 rounded-full floating-shape opacity-25" style="animation-delay: 2s;"></div>
    </div> 
    <div class="relative mx-auto max-w-7xl px-16 py-8">
        <div class="swiper main-swiper relative">
            <div class="swiper-wrapper">
                @php
                    $slides = [];
                    foreach ($sliders as $item) {
                        foreach ($item->pictures as $index => $picture) {
                            $slides[] = $picture;
                        }
                    }

                    if (count($slides) <= 3 && count($slides) > 1) {
                        $slides = array_merge($slides, $slides);
                    }
                @endphp

                @foreach ($slides as $index => $picture)
                <div class="swiper-slide relative rounded-2xl" style="width: 70%">
                    <div class="aspect-[16/9] w-full">
                        @if ($picture->imageable && $picture->imageable->link)
                            <a href="{{ $picture->imageable->link }}" target="_blank">
                                <img src="{{ asset('storage/' . $picture->nama_file) }}" 
                                    alt="Slide {{ $index }}" 
                                    class="w-full h-full object-cover rounded-2xl cursor-pointer">
                            </a>
                        @else  
                            <img src="{{ asset('storage/' . $picture->nama_file) }}" 
                                alt="Slide {{ $index }}" 
                                class="w-full h-full object-cover rounded-2xl">
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div class="w-full md:w-8/12">
                        <h6 class="text-2xl font-semibold text-gray-800">
                            Wujudkan <span class="font-bold text-red-600">ZONA INTEGRITAS</span>
                        </h6>
                        <h3 class="text-3xl text-gray-700">
                            Pada <span class="font-bold text-red-600">DPMPTSP Kota Padang</span>
                        </h3>
                        <p class="text-base lg:text-lg text-gray-600">
                            Menuju <span class="font-bold italic text-green-600">Wilayah Bebas Korupsi (WBK)</span> & 
                            <span class="font-bold italic text-green-600">Wilayah Birokrasi Bersih Melayani (WBBM)</span>
                        </p>
                    </div>
                    <div class="w-full md:w-4/12 flex justify-end pr-4">
                        <div class="relative group">
                            <img 
                                src="/images/zi/zi_5.png" 
                                alt="Logo Zona Integritas" 
                                class="w-full max-w-[100px] transition-transform duration-300 group-hover:scale-105"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="relative overflow-hidden">
                <div class="flex gap-6 transition-transform duration-500 ease-in-out" id="carouselTrack">
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/akhlak.png" alt="Akhlak" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/evp.png" alt="EVP" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_5.png" alt="ZI 2" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_4.png" alt="ZI 4" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_6.png" alt="ZI 5" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-4 transition-opacity">
                        <div class="bg-white rounded-lg shadow-sm p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                            <img src="/images/zi/zi_2.png" alt="ZI 6" class="w-full h-40 object-contain transition-transform duration-300 hover:brightness-110">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-gray-50/80 px-6 relative backdrop-blur-sm">
        <div class="container mx-auto py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-4">
                <div class="relative">
                    <img
                        src="/images/background-dpmptsp.jpg"
                        alt="Tentang Kami"
                        class="rounded-2xl shadow-2xl w-full h-[400px] object-cover"
                    />
                    <div
                        class="absolute -bottom-4 -right-4 w-36 h-36 bg-red-600 rounded-2xl -z-10"
                    ></div>
                </div>
                <div data-aos="fade-left">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        DPMPTSP Kota Padang
                    </h2>
                    <div class="w-16 h-1 bg-red-600 mb-4"></div>
                    <p class="text-gray-600 text-base leading-relaxed mb-4 text-justify">
                        Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Padang berkomitmen untuk meningkatkan pelayanan publik yang prima melalui Pelayanan Terpadu Satu Pintu (PTSP). Masyarakat dapat menikmati layanan dengan kepastian persyaratan, biaya, dan waktu penyelesaian, guna mendukung pertumbuhan ekonomi dan investasi daerah.
                    </p>
                    <p class="text-gray-600 text-base leading-relaxed mb-6">
                        Dengan standar pelayanan yang transparan, mudah, dan akuntabel, DPMPTSP menjadi ujung tombak peningkatan kualitas pelayanan di bidang penanaman modal.
                    </p>
                    <a href="{{ route('about') }}" class="text-red-500 text-lg font-semibold hover:underline">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 bg-gray-50 p-6 my-32">
        <div class="container mx-auto px-24">
            <h2 class="text-3xl font-bold text-center mb-12">Layanan Perizinan</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <a href="https://oss.go.id/" target="_blank" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300" 
                   >
                    <div class="icon-wrap">
                        <img class="w-56 h-50 object-cover mb-4 rounded-lg mx-auto" src="/images/osss.png" alt="OSS">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">OSS</h3>
                    <p class="text-gray-600 text-justify">OSS (Online Single Submission) merupakan sistem informasi layanan perizinan berusaha yang diterbitkan oleh Lembaga OSS untuk kepada Pelaku Usaha melalui sistem elektronik yang terintegrasi.</p>
                </a>
                <a href="https://simbg.pu.go.id/" target="_blank" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300">
                    <div class="icon-wrap">
                        <img class="w-50 h-50 object-cover mb-4 mt-6 rounded-lg mx-auto" src="/images/simbg.png" alt="SIMBG">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">SIMBG</h3>
                    <p class="text-gray-600 text-justify">Sistem Informasi Manajemen Bangunan Gedung yang selanjutnya disingkat SIMBG adalah sistem elektronik berbasis web yang digunakan untuk melaksanakan proses penyelenggaraan PBG, SLF, SBKBG, RTB, dan Pendataan Bangunan Gedung disertai dengan informasi terkait penyelenggaraan bangunan gedung.</p>
                </a>
                <a href="http://ikm.web.dpmptsp.padang.go.id/" target="_blank" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300">
                    <div class="icon-wrap">
                        <img class="w-32 h-32 object-cover mb-4 rounded-lg mx-auto" src="/images/ikm.png" alt="IKM">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">IKM</h3>
                    <p class="text-gray-600 text-justify">Indeks Kepuasan Masyarakat (IKM) adalah layanan yang dirancang untuk mengukur tingkat kepuasan masyarakat terhadap pelayanan yang diberikan oleh instansi pemerintah, guna meningkatkan kualitas layanan secara berkelanjutan.</p>
                </a>
                <a href="https://nonperizinan.web.dpmptsp.padang.go.id/sinopen" target="_blank" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300">
                    <div class="icon-wrap">
                        <img class="w-32 h-32 object-cover mb-4 rounded-lg mx-auto" src="/images/sinopen.png" alt="IKM">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">SINOPEN</h3>
                    <p class="text-gray-600 text-justify">Sistem Informasi Non Perizinan dan Perizinan Non OSS, dengan aplikasi SINOPEN yang dapat diakses oleh seluruh pemohon dan petugas di Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu dengan mudah tidak terbatas ruang dan waktu bisa di akses kapan pun dan dimana saja.</p>
                </a>
            </div>
        </div>
    </section>

    <section class="py-10 bg-gray-50 p-6 my-32">
        <div class="container mx-auto px-24">
            <h2 class="text-3xl font-bold text-center mb-12">Inovasi Pelayanan</h2>
            <div class="grid md:grid-cols-2 gap-8">
                @forelse($innovations as $innovation)
                    <a href="{{ $innovation->url }}" target="_blank" 
                       class="bg-white p-4 rounded-lg shadow-sm hover:shadow-xl transition duration-300 flex items-center gap-4">
                        <figure class="avatar" style="border-radius: 0px; width: 64px;">
                            @if($innovation->pictures->isNotEmpty())
                                <img src="{{ asset('storage/' . $innovation->pictures->first()->nama_file) }}" 
                                     alt="{{ $innovation->nama }}" class="w-full h-full object-contain">
                            @endif
                        </figure>
                        <div class="testimonial-info">
                            <h5 data-asw-orgfontsize="18" style="font-size: 18px; margin-bottom: 4px;">{{ $innovation->nama }}</h5>
                            <h6 class="font-weight-normal text-red-600" data-asw-orgfontsize="16" style="font-size: 16px;">{{ $innovation->deskripsi }}</h6>
                        </div>
                    </a>
                @empty
                    <div class="col-span-2 text-center py-8">
                        <p class="text-gray-500">Tidak ada inovasi yang tersedia</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-10 bg-white my-32">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Indeks Kepuasan Masyarakat</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div class="bg-red-50 rounded-lg p-8 mb-8">
                        <div class="flex items-center justify-between"> 
                            <div class="text-center">
                                <div class="text-4xl font-bold text-red-600 mb-1">{{ $overallPercentage }}</div> 
                                <div class="text-base text-gray-600">
                                    {{ number_format($overallScore, 2) }}/4.00
                                </div>
                            </div>
                            
                            <div class="text-right">
                                <div class="text-sm text-gray-500 italic">Tingkat Kepuasan</div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $keteranganScore }}</h3>
                            </div>
                        </div>
                        
                        <div class="mt-6"> 
                            <div class="w-full bg-gray-200 rounded-full h-4"> 
                                <div
                                    class="bg-red-600 h-4 rounded-full transition-all duration-500 ease-out progress-bar"
                                    data-width="{{ $overallPercentage }}%"
                                    style="width: 0"
                                ></div>
                            </div>
                        </div>
                    </div>
     
                    @foreach($surveyResults as $item)
                        <div class="space-y-2 hover:bg-red-50 p-4 rounded-lg transition-all duration-300"> 
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-700">
                                    {{ $item['question'] }}
                                </span>
                                <span class="text-sm font-medium text-red-600 bg-red-100 px-3 py-1 rounded-full"> 
                                    {{ round(($item['score'] / 4) * 100, 1) }}
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div
                                    class="bg-red-600 h-2.5 rounded-full transition-all duration-500 ease-out progress-bar"
                                    data-width="{{ ($item['score'] / 4) * 100 }}%"
                                    style="width: 0"
                                ></div>
                            </div>
                        </div>
                    @endforeach
                </div>
     
                <div class="hidden md:block bg-gradient-to-br from-red-50 to-white rounded-lg shadow-lg">
                    <div class="h-full min-h-[300px] w-full flex items-center justify-center">
                        <img 
                            src="{{ asset('images/skm3.png') }}" 
                            alt="Deskripsi gambar"
                            class="object-cover rounded-lg w-full h-full"
                        />
                    </div>
                </div>
            </div>
     
            <div class="text-center mt-12"> 
                <a href="{{ route('home-survey') }}"
                   class="inline-flex items-center justify-center px-10 py-4 text-lg font-semibold text-white bg-red-600
                          rounded-lg shadow-lg transition-all duration-300 hover:bg-red-700 hover:shadow-xl
                          hover:-translate-y-1 relative overflow-hidden group">
                    <span class="relative z-10 flex items-center">
                        Ayo Isi Survei
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </span>
                    <div class="absolute inset-0 w-0 bg-red-700 transition-all duration-300 ease-out group-hover:w-full"></div>
                </a>
                <p class="text-gray-600 mt-4 text-sm">Bantu kami meningkatkan layanan dengan mengisi survei</p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="bg-gray-50 py-12">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">
                        Galeri
                    </h2>
                    <div class="w-20 h-1 bg-red-600 mx-auto"></div>
                </div>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                >
                @foreach ($gallery as $picture)
                    <div class="group relative overflow-hidden rounded-xl shadow-lg">
                        <img
                            src="{{ asset('storage/' . $picture->nama_file) }}"
                            alt="{{ $picture->caption ?? 'Gallery Image' }}"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const progressBars = document.querySelectorAll('.progress-bar');

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progressBar = entry.target;
                    progressBar.style.width = progressBar.getAttribute('data-width');
                    observer.unobserve(progressBar);
                }
            });
        }, {
            threshold: 0.5
        });

        progressBars.forEach(progressBar => {
            observer.observe(progressBar);
        });

        const surveyData = @json($surveyResults);
    
        new Chart(document.getElementById('surveyChart'), {
            type: 'bar',
            data: {
                labels: surveyData.map(item => item.question),
                datasets: [{
                    label: 'Nilai Rata-rata',
                    data: surveyData.map(item => item.score),
                    backgroundColor: '#3B82F6',
                    borderColor: '#2563EB',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',  
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        max: 4, 
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        
        const mainSwiper = new Swiper('.main-swiper', {
            loop: true,
            autoHeight: true,
            slidesPerView: 1.5, 
            centeredSlides: true,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.main-swiper .swiper-button-next',
                prevEl: '.main-swiper .swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1.5
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const track = document.getElementById('carouselTrack');
        const slides = track.children;
        const totalSlides = slides.length;
        let currentIndex = 0;
        let isTransitioning = false;

        const firstClone = slides[0].cloneNode(true);
        const lastClone = slides[totalSlides - 1].cloneNode(true);
        track.appendChild(firstClone);
        track.insertBefore(lastClone, slides[0]);

        currentIndex = 1;
        updateSlidePosition(false);

        function updateSlidePosition(withTransition = true) {
            if (withTransition) {
                track.style.transition = 'transform 0.5s ease-out';
            } else {
                track.style.transition = 'none';
            }
            const slideWidth = slides[0].offsetWidth + 24; 
            const offset = -currentIndex * slideWidth;
            track.style.transform = `translateX(${offset}px)`;
        }

        function moveToSlide(index) {
            if (isTransitioning) return;
            isTransitioning = true;
            currentIndex = index;
            updateSlidePosition();
            
            setTimeout(() => {
                if (currentIndex === 0) { 
                    currentIndex = totalSlides;
                    updateSlidePosition(false);
                } else if (currentIndex === totalSlides + 1) { 
                    currentIndex = 1;
                    updateSlidePosition(false);
                }
                isTransitioning = false;
            }, 500);
        }

        function nextSlide() {
            moveToSlide(currentIndex + 1);
        }

        function prevSlide() {
            moveToSlide(currentIndex - 1);
        }
        const slideInterval = setInterval(nextSlide, 4000);

        let startX;
        let endX;

        track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            clearInterval(slideInterval); 
        });

        track.addEventListener('touchmove', (e) => {
            if (!startX) return;
            
            endX = e.touches[0].clientX;
            const diff = startX - endX;
            
            if (Math.abs(diff) > 5) {
                e.preventDefault();
            }
        }, { passive: false });

        track.addEventListener('touchend', () => {
            if (!startX || !endX) return;
            
            const diff = startX - endX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }
            
            startX = null;
            endX = null;
        });

        window.addEventListener('resize', () => {
            updateSlidePosition(false);
        });
    });
</script>