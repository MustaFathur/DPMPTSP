@extends('layouts.main')

@section('title', 'Standar Pelayanan | DPMPTSP Kota Padang')

@section('content')
<style>
    .fade-in-scale {
        animation: fadeInScale 0.5s ease-out;
    }
    
    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .slide-in-bottom {
        animation: slideInBottom 0.6s ease-out;
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

    .hover-float {
        transition: transform 0.3s ease;
    }
    
    .hover-float:hover {
        transform: translateY(-5px);
    }

    @media (max-width: 768px) {
        .table-container {
            margin: 0 -1rem;  /* Negative margin untuk full width di mobile */
        }
        
        .search-container {
            padding: 1rem;
        }
    }
</style>

<div class="overflow-hidden pt-16 relative">
    <div class="heading bg-cover bg-center py-24 flex items-center justify-center relative">
        <div class="absolute inset-0 bg-cover bg-center transform scale-105 transition-transform duration-1000" 
             style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/bg.jpg')">
        </div>
        <h1 class="text-4xl md:text-6xl text-white uppercase font-bold relative z-10 tracking-wider fade-in-scale">
            Standar Pelayanan
            <div class="h-1 w-24 bg-red-500 mx-auto mt-4 rounded-full"></div>
        </h1>
    </div>

    <section class="bg-white/80 px-4 md:px-24 relative backdrop-blur-sm">
        <div class="container mx-auto py-6 md:py-12">
            <div class="max-w-4xl mx-auto mb-6 md:mb-12 slide-in-bottom">
                <form method="GET" action="{{ route('standar-pelayanan') }}" 
                      class="p-4 md:p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari dokumen..."
                                    class="w-full h-12 pl-12 pr-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="h-12 px-8 text-white bg-red-500 hover:bg-red-600 rounded-xl transition-all duration-300">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Cari
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden slide-in-bottom transition-all duration-300 hover:shadow-xl" 
                 style="animation-delay: 0.2s;">
                <div class="overflow-x-auto -mx-4 sm:mx-0">
                    <table class="w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gradient-to-r from-red-50 to-red-100">
                                <th scope="col" class="px-4 md:px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col" class="px-4 md:px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Nama Dokumen
                                </th>
                                <th scope="col" class="px-4 md:px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($documents as $index => $document)
                                <tr class="hover:bg-red-50/30 transition-all duration-200">
                                    <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                        <span class="bg-gray-100 text-gray-700 py-1 px-3 rounded-full text-sm">
                                            {{ $documents->firstItem() + $index }}
                                        </span>
                                    </td>
                                    <td class="px-4 md:px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $document->nama }}
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                        <a href="{{ asset('storage/' . $document->nama_file) }}" 
                                           target="_blank"
                                           class="inline-flex items-center px-3 md:px-4 py-2 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-600">
                                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 md:px-6 py-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center space-y-3">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <p class="text-lg font-medium">Tidak ada dokumen yang ditemukan</p>
                                            <p class="text-sm text-gray-400">Coba ubah filter pencarian Anda</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-4 md:px-6 py-4 border-t border-gray-200 bg-gray-50">
                    {{ $documents->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection  