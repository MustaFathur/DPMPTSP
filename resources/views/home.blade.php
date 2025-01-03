@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
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

    [data-aos] {
        pointer-events: none;
    }
    [data-aos].aos-animate {
        pointer-events: auto;
    }
</style>

<div class="p-16 overflow-hidden"> 
    <div class="relative mx-auto max-w-7xl px-16 py-8" data-aos="fade-up" data-aos-duration="1000">
        <div class="swiper main-swiper relative">
            <div class="swiper-wrapper">
                @foreach (['1', '2', '3', '4', '5', '6'] as $index)
                <div class="swiper-slide relative rounded-2xl" style="width: 70%"> <!-- Tambahkan width di sini -->
                    <div class="aspect-[16/9] w-full">
                        <img src="/images/{{ $index }}.jpg" alt="Slide {{ $index }}" class="w-full h-full object-cover rounded-2xl">
                    </div>
                </div> 
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <section class="py-10 bg-gray-50" data-aos="fade-right" data-aos-duration="800">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div class="w-full md:w-8/12">
                        <h6 class="text-2xl font-semibold text-gray-800">
                            Wujudkan <span class="font-bold text-red-600">ZONA INTEGRITAS</span>
                        </h6>
                        <h3 class="text-3xl text-gray-700">
                            Pada <span class="font-bold text-blue-600">DPMPTSP Kota Padang</span>
                        </h3>
                        <p class="text-base lg:text-lg text-gray-600">
                            Menuju <span class="font-bold italic text-green-600">Wilayah Bebas Korupsi (WBK)</span> & 
                            <span class="font-bold italic text-green-600">Wilayah Birokrasi Bersih Melayani (WBBM)</span>
                        </p>
                    </div>
                    <div class="w-full md:w-4/12 flex justify-end pr-4">
                        <div class="relative group">
                            <img 
                                src="/images/zi_5.png" 
                                alt="Logo Zona Integritas" 
                                class="w-full max-w-[100px] transition-transform duration-300 group-hover:scale-105"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="py-10 bg-gray-50 p-6">
        <div class="container mx-auto py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-4">
                <div class="relative" data-aos="fade-right" data-aos-duration="1000">
                    <img
                        src="/images/2.jpg"
                        alt="Tentang Kami"
                        class="rounded-2xl shadow-2xl w-full h-[400px] object-cover"
                    />
                    <div
                        class="absolute -bottom-4 -right-4 w-36 h-36 bg-red-600 rounded-2xl -z-10"
                    ></div>
                </div>
                <div data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
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
                    <a href="/tentang" class="text-red-500 text-lg font-semibold hover:underline">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 bg-gray-50 p-6">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Layanan Perizinan</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <a href="https://oss.go.id/" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300" 
                   data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-wrap">
                        <img class="w-56 h-50 object-cover mb-4 rounded-lg mx-auto" src="/images/osss.png" alt="OSS">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">OSS</h3>
                    <p class="text-gray-600 text-justify">OSS (Online Single Submission) merupakan sistem informasi layanan perizinan berusaha yang diterbitkan oleh Lembaga OSS untuk kepada Pelaku Usaha melalui sistem elektronik yang terintegrasi.</p>
                </a>
                <a href="https://simbg.pu.go.id/" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300" 
                   data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-wrap">
                        <img class="w-50 h-50 object-cover mb-4 mt-6 rounded-lg mx-auto" src="/images/simbg.png" alt="SIMBG">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">SIMBG</h3>
                    <p class="text-gray-600 text-justify">Sistem Informasi Manajemen Bangunan Gedung yang selanjutnya disingkat SIMBG adalah sistem elektronik berbasis web yang digunakan untuk melaksanakan proses penyelenggaraan PBG, SLF, SBKBG, RTB, dan Pendataan Bangunan Gedung disertai dengan informasi terkait penyelenggaraan bangunan gedung.</p>
                </a>
                <a href="http://ikm.web.dpmptsp.padang.go.id/" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300" 
                   data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-wrap">
                        <img class="w-32 h-32 object-cover mb-4 rounded-lg mx-auto" src="/images/ikm.png" alt="IKM">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">IKM</h3>
                    <p class="text-gray-600 text-justify">Indeks Kepuasan Masyarakat (IKM) adalah layanan yang dirancang untuk mengukur tingkat kepuasan masyarakat terhadap pelayanan yang diberikan oleh instansi pemerintah, guna meningkatkan kualitas layanan secara berkelanjutan.</p>
                </a>
                <a href="https://nonperizinan.web.dpmptsp.padang.go.id/sinopen" class="bg-white p-6 rounded-lg text-center shadow-sm hover:shadow-xl transition duration-300" 
                   data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-wrap">
                        <img class="w-32 h-32 object-cover mb-4 rounded-lg mx-auto" src="/images/sinopen.png" alt="IKM">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">SINOPEN</h3>
                    <p class="text-gray-600 text-justify">Sistem Informasi Non Perizinan dan Perizinan Non OSS, dengan aplikasi SINOPEN yang dapat diakses oleh seluruh pemohon dan petugas di Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu dengan mudah tidak terbatas ruang dan waktu bisa di akses kapan pun dan dimana saja.</p>
                </a>
            </div>
        </div>
    </section>

    <section class="py-10 bg-white">
        <div class="bg-gray-50 py-24">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">
                        Galeri
                    </h2>
                    <div class="w-20 h-1 bg-red-600 mx-auto"></div>
                </div>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                >
                    <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="100">
                        <img
                            src="/images/1.jpg"
                            alt="Gallery 1"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="200">
                        <img
                            src="/images/2.jpg"
                            alt="Gallery 2"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="300">
                        <img
                            src="/images/3.jpg"
                            alt="Gallery 3"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="100">
                        <img
                            src="/images/4.jpg"
                            alt="Gallery 4"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="200">
                        <img
                            src="/images/5.jpg"
                            alt="Gallery 5"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="300">
                        <img
                            src="/images/6.jpg"
                            alt="Gallery 6"
                            class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-500"
                        />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center"
                        >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 bg-white">
        <div class="container mx-auto px-4 max-w-3xl">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
                <div class="w-20 h-1 bg-red-600 mx-auto mb-4"></div>
                <p class="text-gray-600">Sampaikan pertanyaan Anda, kami siap membantu</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="100">
                <form action="/submit-question" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input 
                            type="text" 
                            id="nama" 
                            name="nama" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                            placeholder="Masukkan nama lengkap Anda"
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                            placeholder="Masukkan alamat email Anda"
                        >
                    </div>

                    <div>
                        <label for="topik" class="block text-sm font-medium text-gray-700 mb-2">Topik Pertanyaan</label>
                        <select 
                            id="topik" 
                            name="topik" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 bg-white"
                        >
                            <option value="" disabled selected hidden>Pilih topik pertanyaan</option>
                            <option value="perizinan">Perizinan</option>
                            <option value="mpp">MPP</option>
                            <option value="pengaduan">Pengaduan</option>
                            <option value="skm">SKM</option>
                        </select>
                    </div>

                    <div>
                        <label for="pertanyaan" class="block text-sm font-medium text-gray-700 mb-2">Pertanyaan</label>
                        <textarea 
                            id="pertanyaan" 
                            name="pertanyaan" 
                            rows="4" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 resize-none"
                            placeholder="Tuliskan pertanyaan Anda di sini"
                        ></textarea>
                    </div>

                    <div class="text-center">
                        <button 
                            type="submit" 
                            class="w-full sm:w-auto px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-200"
                        >
                            Kirim Pertanyaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Main Slider

        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        const mainSwiper = new Swiper('.main-swiper', {
            loop: true,
            autoHeight: true,
            slidesPerView: 'auto', // Ubah ke 'auto'
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
            // Tambahkan breakpoints untuk responsif
            breakpoints: {
                640: {
                    slidesPerView: 1.5
                }
            }
        });
    });
    </script>