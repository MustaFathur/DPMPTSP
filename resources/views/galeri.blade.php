@extends('layouts.main')
@section('title', 'Galeri | DPMPTSP Kota Padang')

@section('content')
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

    @keyframes slideInBottom {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .floating-shape {
        animation: float 6s ease-in-out infinite;
    }

    .fade-in-scale {
        animation: fadeInScale 0.8s ease-out forwards;
    }

    .slide-in-bottom {
        animation: slideInBottom 0.6s ease-out;
    }

    .dot-pattern {
        background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
        background-size: 20px 20px;
    }

    @media (max-width: 768px) {
        .mobile-container {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
    }
</style>

<div class="overflow-hidden pt-16 relative">
    <div class="heading bg-cover bg-center py-16 md:py-24 flex items-center justify-center relative">
        <div class="absolute inset-0 bg-cover bg-center transform scale-105 transition-transform duration-1000" 
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/bg-6.jpg')">
        </div>
        <h1 class="text-4xl md:text-6xl text-white uppercase font-bold relative z-10 tracking-wider fade-in-scale px-4 text-center">
            Galeri
            <div class="h-1 w-24 bg-red-500 mx-auto mt-4 rounded-full"></div>
        </h1>
    </div>

    <section class="bg-white/80 relative backdrop-blur-sm px-4 md:px-8 lg:px-24">
        <div class="container mx-auto py-8 md:py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
                @forelse($pictures as $picture)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group fade-in-scale">
                        <div class="relative">
                            <div class="cursor-pointer aspect-[4/3] overflow-hidden"
                                onclick="showImage('{{ asset('storage/' . $picture->nama_file) }}', '{{ $picture->caption }}')"
                            >
                                <img 
                                    src="{{ asset('storage/' . $picture->nama_file) }}"
                                    alt="{{ $picture->alt_text }}"
                                    class="w-full h-full object-contain transition-all duration-500 group-hover:scale-105"
                                >
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white text-base md:text-lg font-medium">Lihat Detail</span>
                                </div>
                            </div>
                            <div class="absolute -bottom-4 -right-4 w-20 h-20 md:w-24 md:h-24 bg-red-600 rounded-xl -z-10 transition-all duration-300 group-hover:-bottom-6 group-hover:-right-6 group-hover:rotate-6"></div>
                        </div>
                        <div class="p-4 md:p-6">
                            <p class="text-gray-600 text-sm md:text-base">
                                {{ $picture->caption }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">Tidak ada foto yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
            <div class="mt-8 px-4">
                {{ $pictures->links() }}
            </div>
        </div>
    </section>
</div>

<div id="imageModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="absolute inset-0 bg-black/75 backdrop-blur-sm" id="modalBackground"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-4xl shadow-2xl transform transition-all scale-95 opacity-0" id="modalContent">
            <button onclick="closeModal()" 
                    class="absolute -right-2 md:-right-4 -top-2 md:-top-4 z-10 bg-white rounded-full p-2 text-gray-500 hover:text-red-600 transform hover:rotate-90 transition-all duration-300 shadow-lg">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <div class="relative">
                <img id="modalImage" src="" alt="" class="w-full rounded-t-2xl max-h-[80vh] object-contain">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 to-transparent p-4 md:p-8">
                    <p id="modalCaption" class="text-white text-base md:text-xl font-medium text-center"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showImage(src, caption) {
        const modal = document.getElementById('imageModal');
        const modalContent = document.getElementById('modalContent');
        const modalImage = document.getElementById('modalImage');
        const modalCaption = document.getElementById('modalCaption');
        
        modalImage.src = src;
        modalCaption.textContent = caption;
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.style.opacity = '1';
            modalContent.style.transform = 'scale(1)';
        }, 10);
        
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        const modalContent = document.getElementById('modalContent');
        
        modalContent.style.opacity = '0';
        modalContent.style.transform = 'scale(0.95)';
        
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 300);
    }
    document.getElementById('modalBackground').addEventListener('click', closeModal);

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('imageModal').classList.contains('hidden')) {
            closeModal();
        }
    });    
</script>
@endsection