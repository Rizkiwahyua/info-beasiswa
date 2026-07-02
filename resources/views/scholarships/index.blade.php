<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Info Beasiswa - Temukan Beasiswa Impian Anda</title>

    <!-- Google Fonts & Tailwind -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AlpineJS for interactive client components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-[#F8FAFC] text-slate-700 font-sans antialiased min-h-screen flex flex-col selection:bg-emerald-500 selection:text-white"
      x-data="{ 
          lang: 'id',
          selectedScholarship: null,
          mobileMenuOpen: false,
          scholarships: {{ json_encode($scholarships) }},
          openModal(item) {
              this.selectedScholarship = item;
              document.body.style.overflow = 'hidden';
          },
          closeModal() {
              this.selectedScholarship = null;
              document.body.style.overflow = 'auto';
          }
      }">

    <!-- Visual Accents: Grid Patterns & Colored Light Halos -->
    <div class="fixed inset-0 bg-grid-pattern pointer-events-none -z-20 opacity-80"></div>
    <div class="fixed top-[-10%] left-1/4 w-[600px] h-[600px] bg-[radial-gradient(circle_at_center,rgba(16,185,129,0.12),transparent_70%)] pointer-events-none -z-10 rounded-full"></div>
    <div class="fixed top-[20%] right-[-10%] w-[600px] h-[600px] bg-[radial-gradient(circle_at_center,rgba(99,102,241,0.08),transparent_70%)] pointer-events-none -z-10 rounded-full"></div>

    <!-- Floating Capsule Navigation Bar -->
    <div class="sticky top-4 z-40 max-w-7xl mx-auto px-4 w-full">
        <header class="bg-white/70 backdrop-blur-xl border border-white/80 rounded-3xl shadow-xl shadow-slate-100/50 px-6 py-4 flex items-center justify-between transition-all duration-300">
            
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-emerald-500 to-teal-600 flex items-center justify-center shadow-lg shadow-emerald-500/20 group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </div>
                <div>
                    <span class="text-base font-black tracking-tight text-slate-900 font-outfit">Info<span class="text-emerald-600">Beasiswa</span></span>
                    <span class="block text-[8px] text-slate-400 font-bold tracking-widest uppercase -mt-1" x-text="lang === 'id' ? 'Pintu Masa Depanmu' : 'Your Gate to the Future'"></span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-8 font-outfit">
                <a href="#listings" class="text-[11px] font-bold text-slate-600 hover:text-emerald-600 uppercase tracking-wider transition-colors" x-text="lang === 'id' ? 'Jelajahi Beasiswa' : 'Explore Scholarships'"></a>
                <a href="#panduan" class="text-[11px] font-bold text-slate-600 hover:text-emerald-600 uppercase tracking-wider transition-colors" x-text="lang === 'id' ? 'Panduan Beasiswa' : 'Scholarship Guides'"></a>
                <a href="#categories" class="text-[11px] font-bold text-slate-600 hover:text-emerald-600 uppercase tracking-wider transition-colors" x-text="lang === 'id' ? 'Kategori Beasiswa' : 'Categories'"></a>
                <a href="#about" class="text-[11px] font-bold text-slate-600 hover:text-emerald-600 uppercase tracking-wider transition-colors" x-text="lang === 'id' ? 'Tentang Kami' : 'About Us'"></a>
            </nav>

            <!-- Language Switcher Pill Selector (Replaced Login/Register) -->
            <div class="flex items-center bg-slate-100 p-1.5 rounded-2xl border border-slate-200/50">
                <button @click="lang = 'id'" :class="lang === 'id' ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-500 hover:text-slate-800'" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all duration-200">
                    Bahasa (ID)
                </button>
                <button @click="lang = 'en'" :class="lang === 'en' ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-500 hover:text-slate-800'" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all duration-200">
                    English (EN)
                </button>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-xl text-slate-600 hover:bg-slate-50 focus:outline-none transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </header>

        <!-- Mobile Menu -->
        <div class="md:hidden mt-2 bg-white rounded-3xl border border-slate-100 shadow-xl p-4 space-y-2" x-show="mobileMenuOpen" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0">
            <a href="#listings" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50" x-text="lang === 'id' ? 'Jelajahi Beasiswa' : 'Explore Scholarships'"></a>
            <a href="#panduan" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50" x-text="lang === 'id' ? 'Panduan Beasiswa' : 'Scholarship Guides'"></a>
            <a href="#categories" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50" x-text="lang === 'id' ? 'Kategori Beasiswa' : 'Categories'"></a>
            <a href="#about" @click="mobileMenuOpen = false" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50" x-text="lang === 'id' ? 'Tentang Kami' : 'About Us'"></a>
            <div class="border-t border-slate-100 pt-3 flex items-center justify-between">
                <span class="text-xs font-bold text-slate-400 uppercase pl-2">Language / Bahasa</span>
                <div class="flex items-center bg-slate-100 p-1 rounded-xl border border-slate-200/50">
                    <button @click="lang = 'id'" :class="lang === 'id' ? 'bg-emerald-600 text-white shadow-sm' : 'text-slate-500'" class="px-2.5 py-1 rounded-lg text-xs font-bold">ID</button>
                    <button @click="lang = 'en'" :class="lang === 'en' ? 'bg-emerald-600 text-white shadow-sm' : 'text-slate-500'" class="px-2.5 py-1 rounded-lg text-xs font-bold">EN</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        
        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                
                <!-- Left Column (Massive Modern Typography & Search) -->
                <div class="lg:col-span-7 space-y-8 text-left">
                    <!-- Glowing Promo Badge -->
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold text-emerald-700 bg-emerald-500/10 border border-emerald-500/20">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                        <span x-text="lang === 'id' ? 'Info Beasiswa Resmi Terupdate 2026' : 'Officially Updated Scholarship Info 2026'"></span>
                    </span>
                    
                    <h1 class="text-5xl sm:text-6xl md:text-7xl font-black tracking-tight text-slate-950 font-outfit leading-[1.05]">
                        <span x-text="lang === 'id' ? 'Wujudkan Kuliah' : 'Achieve Your Study'"></span><br />
                        <span class="bg-gradient-to-r from-emerald-600 via-teal-500 to-indigo-600 bg-clip-text text-transparent" x-text="lang === 'id' ? 'Impianmu Disini' : 'Dreams Right Here'"></span>
                    </h1>
                    
                    <p class="max-w-xl text-base sm:text-lg text-slate-550 leading-relaxed font-medium" 
                       x-text="lang === 'id' ? 'Cari dan temukan ribuan program beasiswa penuh (fully funded) maupun parsial, dalam dan luar negeri, terverifikasi resmi oleh tim ahli kami.' : 'Search and find thousands of fully funded and partial scholarship programs, domestic and abroad, officially verified by our team of experts.'">
                    </p>

                    <!-- Elegant Search Form -->
                    <div class="max-w-xl">
                        <form action="{{ url('/') }}#listings" method="GET" class="flex flex-col sm:flex-row gap-3 bg-white p-3 rounded-3xl border border-slate-200/50 shadow-2xl shadow-slate-100/50">
                            <div class="relative flex-grow">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <input type="text" name="search" value="{{ $filters['search'] }}" :placeholder="lang === 'id' ? 'Nama beasiswa, negara, universitas...' : 'Scholarship name, country, university...'" class="block w-full pl-12 pr-3 py-3 text-sm text-slate-900 placeholder-slate-400 bg-transparent border-0 focus:ring-0 focus:outline-none" />
                            </div>
                            
                            <!-- Keep other filters in sync -->
                            <input type="hidden" name="level" value="{{ $filters['level'] }}">
                            <input type="hidden" name="location" value="{{ $filters['location'] }}">
                            <input type="hidden" name="funding" value="{{ $filters['funding'] }}">

                            <button type="submit" class="w-full sm:w-auto px-8 py-4 bg-emerald-600 hover:bg-emerald-500 active:scale-95 text-white font-bold rounded-2xl transition-all shadow-lg shadow-emerald-500/20" x-text="lang === 'id' ? 'Cari Beasiswa' : 'Search'"></button>
                        </form>
                    </div>

                    <!-- Visual Quick Statistics -->
                    <div class="flex items-center gap-10 pt-6 border-t border-slate-200/60 max-w-xl">
                        <div>
                            <span class="block text-3xl font-extrabold text-slate-950 font-outfit">150+</span>
                            <span class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5 block" x-text="lang === 'id' ? 'Program Aktif' : 'Active Programs'"></span>
                        </div>
                        <div class="w-px h-8 bg-slate-200"></div>
                        <div>
                            <span class="block text-3xl font-extrabold text-slate-950 font-outfit">15+</span>
                            <span class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5 block" x-text="lang === 'id' ? 'Negara Tujuan' : 'Target Countries'"></span>
                        </div>
                        <div class="w-px h-8 bg-slate-200"></div>
                        <div>
                            <span class="block text-3xl font-extrabold text-emerald-600 font-outfit">100%</span>
                            <span class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5 block" x-text="lang === 'id' ? 'Terverifikasi' : 'Verified'"></span>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Futuristic Frame with generated image) -->
                <div class="lg:col-span-5 relative flex justify-center">
                    <div class="relative w-full max-w-[390px] aspect-square lg:max-w-none">
                        <!-- Glowing Neon Border Halo -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-emerald-500 to-indigo-500 rounded-[40px] blur-3xl opacity-20 animate-pulse"></div>

                        <!-- Browser Mockup Box -->
                        <div class="w-full h-full rounded-[32px] overflow-hidden border border-slate-200 shadow-2xl relative z-10 bg-white p-3 flex flex-col justify-between">
                            <div class="h-6 flex items-center gap-1.5 px-3 mb-2 shrink-0">
                                <span class="w-2.5 h-2.5 rounded-full bg-rose-400"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            </div>
                            <div class="flex-grow rounded-2xl overflow-hidden relative">
                                <img src="{{ asset('images/hero.png') }}" alt="Portal Beasiswa" class="w-full h-full object-cover" />
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 to-transparent"></div>
                            </div>
                        </div>

                        <!-- Floating Card 1 -->
                        <div class="absolute -top-4 -left-6 z-20 bg-white/95 backdrop-blur-md px-4 py-3.5 rounded-2xl border border-slate-100 flex items-center gap-3 shadow-2xl shadow-slate-200">
                            <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-emerald-500 to-teal-500 text-white flex items-center justify-center font-black text-xs shadow-md">
                                L
                            </div>
                            <div class="leading-tight">
                                <span class="text-[9px] text-slate-400 font-bold uppercase tracking-wider block" x-text="lang === 'id' ? 'Beasiswa RI' : 'Govt Scholarship'"></span>
                                <span class="text-xs font-black text-slate-800 block mt-0.5">LPDP 2026</span>
                            </div>
                        </div>

                        <!-- Floating Card 2 -->
                        <div class="absolute -bottom-6 -right-4 z-20 bg-white/95 backdrop-blur-md px-4 py-3.5 rounded-2xl border border-slate-100 flex items-center gap-3 shadow-2xl shadow-slate-200">
                            <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-indigo-500 to-blue-500 text-white flex items-center justify-center font-black text-xs shadow-md">
                                A
                            </div>
                            <div class="leading-tight">
                                <span class="text-[9px] text-slate-400 font-bold uppercase tracking-wider block" x-text="lang === 'id' ? 'Pemerintah Australia' : 'Aust. Government'"></span>
                                <span class="text-xs font-black text-slate-800 block mt-0.5">AAS 2026</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Category Section (ID categories) -->
        <section id="categories" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 scroll-mt-28">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-xs font-black text-emerald-600 uppercase tracking-widest font-outfit" x-text="lang === 'id' ? 'Kategori Pilihan' : 'Featured Categories'"></span>
                <h2 class="text-3xl font-black text-slate-900 mt-2 font-outfit" x-text="lang === 'id' ? 'Temukan Berdasarkan Jenjang' : 'Discover by Degree Level'"></h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                
                <!-- S1 -->
                <a href="?level=s1#listings" class="bg-white border border-slate-200/60 rounded-3xl p-6 hover:border-emerald-500/30 hover:shadow-xl hover:shadow-slate-100 hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center text-center group">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4 group-hover:scale-105 transition-transform border border-emerald-100 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                    </div>
                    <span class="text-xs font-black text-slate-800 tracking-wider uppercase font-outfit" x-text="lang === 'id' ? 'Beasiswa S1' : 'Bachelor S1'"></span>
                    <span class="text-[9px] text-slate-400 font-bold mt-1 uppercase tracking-widest">Undergraduate</span>
                </a>

                <!-- S2 -->
                <a href="?level=s2#listings" class="bg-white border border-slate-200/60 rounded-3xl p-6 hover:border-indigo-500/30 hover:shadow-xl hover:shadow-slate-100 hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center text-center group">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4 group-hover:scale-105 transition-transform border border-indigo-100 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <span class="text-xs font-black text-slate-800 tracking-wider uppercase font-outfit" x-text="lang === 'id' ? 'Beasiswa S2' : 'Master S2'"></span>
                    <span class="text-[9px] text-slate-400 font-bold mt-1 uppercase tracking-widest">Master Degree</span>
                </a>

                <!-- S3 -->
                <a href="?level=s3#listings" class="bg-white border border-slate-200/60 rounded-3xl p-6 hover:border-rose-500/30 hover:shadow-xl hover:shadow-slate-100 hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center text-center group">
                    <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center mb-4 group-hover:scale-105 transition-transform border border-rose-100 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 9.172V5L8 4z"/></svg>
                    </div>
                    <span class="text-xs font-black text-slate-800 tracking-wider uppercase font-outfit" x-text="lang === 'id' ? 'Beasiswa S3' : 'Doctoral S3'"></span>
                    <span class="text-[9px] text-slate-400 font-bold mt-1 uppercase tracking-widest">Doctoral / PhD</span>
                </a>

                <!-- Luar Negeri -->
                <a href="?location=abroad#listings" class="bg-white border border-slate-200/60 rounded-3xl p-6 hover:border-sky-500/30 hover:shadow-xl hover:shadow-slate-100 hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center text-center group">
                    <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center mb-4 group-hover:scale-105 transition-transform border border-sky-100 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h2a2.5 2.5 0 002.5-2.5V8a2 2 0 00-2-2h-.5A2 2 0 0115 4V3.055M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <span class="text-xs font-black text-slate-800 tracking-wider uppercase font-outfit" x-text="lang === 'id' ? 'Luar Negeri' : 'Study Abroad'"></span>
                    <span class="text-[9px] text-slate-400 font-bold mt-1 uppercase tracking-widest">International</span>
                </a>

                <!-- Dalam Negeri -->
                <a href="?location=domestic#listings" class="bg-white border border-slate-200/60 rounded-3xl p-6 hover:border-amber-500/30 hover:shadow-xl hover:shadow-slate-100 hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center text-center group">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center mb-4 group-hover:scale-105 transition-transform border border-amber-100 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <span class="text-xs font-black text-slate-800 tracking-wider uppercase font-outfit" x-text="lang === 'id' ? 'Dalam Negeri' : 'Domestic Study'"></span>
                    <span class="text-[9px] text-slate-400 font-bold mt-1 uppercase tracking-widest">National</span>
                </a>

            </div>
        </section>

        <!-- Scholarship Listings Section -->
        <section id="listings" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 scroll-mt-28">
            
            <div class="flex flex-col lg:flex-row gap-8 items-start">
                
                <!-- Filter Sidebar -->
                <aside class="w-full lg:w-72 bg-white rounded-[32px] border border-slate-200/80 p-6 shrink-0 shadow-xl shadow-slate-100/50 sticky top-28">
                    <div class="flex items-center justify-between mb-6 border-b border-slate-100 pb-4">
                        <h2 class="text-xs font-black uppercase tracking-widest text-slate-800 flex items-center gap-2 font-outfit">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                            </svg>
                            <span x-text="lang === 'id' ? 'Filter Beasiswa' : 'Filter'"></span>
                        </h2>
                        @if($filters['level'] !== 'all' || $filters['location'] !== 'all' || $filters['funding'] !== 'all')
                            <a href="{{ url('/') }}#listings" class="text-[10px] font-bold text-rose-500 hover:text-rose-600 tracking-wider uppercase">Reset</a>
                        @endif
                    </div>

                    <form action="{{ url('/') }}#listings" method="GET" class="space-y-6">
                        <!-- Keep search query -->
                        <input type="hidden" name="search" value="{{ $filters['search'] }}">

                        <!-- Degree level filter -->
                        <div>
                            <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-3.5" x-text="lang === 'id' ? 'Jenjang Pendidikan' : 'Degree Level'"></label>
                            <div class="space-y-2.5">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="level" value="all" {{ $filters['level'] === 'all' ? 'checked' : '' }} onchange="this.form.submit()" class="w-4 h-4 text-emerald-600 border-slate-200 focus:ring-emerald-500 focus:ring-offset-0 rounded-full" />
                                    <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-900 transition-colors" x-text="lang === 'id' ? 'Semua Jenjang' : 'All Degrees'"></span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="level" value="s1" {{ $filters['level'] === 's1' ? 'checked' : '' }} onchange="this.form.submit()" class="w-4 h-4 text-emerald-600 border-slate-200 focus:ring-emerald-500 focus:ring-offset-0 rounded-full" />
                                    <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-900 transition-colors">S1 / Undergraduate</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="level" value="s2" {{ $filters['level'] === 's2' ? 'checked' : '' }} onchange="this.form.submit()" class="w-4 h-4 text-emerald-600 border-slate-200 focus:ring-emerald-500 focus:ring-offset-0 rounded-full" />
                                    <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-900 transition-colors">S2 / Master Degree</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="level" value="s3" {{ $filters['level'] === 's3' ? 'checked' : '' }} onchange="this.form.submit()" class="w-4 h-4 text-emerald-600 border-slate-200 focus:ring-emerald-500 focus:ring-offset-0 rounded-full" />
                                    <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-900 transition-colors">S3 / PhD</span>
                                </label>
                            </div>
                        </div>

                        <!-- Location filter -->
                        <div class="border-t border-slate-100 pt-5">
                            <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-3.5" x-text="lang === 'id' ? 'Wilayah Studi' : 'Study Location'"></label>
                            <div class="space-y-2.5">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="location" value="all" {{ $filters['location'] === 'all' ? 'checked' : '' }} onchange="this.form.submit()" class="w-4 h-4 text-emerald-600 border-slate-200 focus:ring-emerald-500 focus:ring-offset-0 rounded-full" />
                                    <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-900 transition-colors" x-text="lang === 'id' ? 'Semua Lokasi' : 'All Locations'"></span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="location" value="domestic" {{ $filters['location'] === 'domestic' ? 'checked' : '' }} onchange="this.form.submit()" class="w-4 h-4 text-emerald-600 border-slate-200 focus:ring-emerald-500 focus:ring-offset-0 rounded-full" />
                                    <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-900 transition-colors" x-text="lang === 'id' ? 'Dalam Negeri (Indonesia)' : 'Domestic (Indonesia)'"></span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="location" value="abroad" {{ $filters['location'] === 'abroad' ? 'checked' : '' }} onchange="this.form.submit()" class="w-4 h-4 text-emerald-600 border-slate-200 focus:ring-emerald-500 focus:ring-offset-0 rounded-full" />
                                    <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-900 transition-colors" x-text="lang === 'id' ? 'Luar Negeri' : 'Study Abroad'"></span>
                                </label>
                            </div>
                        </div>

                        <!-- Funding type filter -->
                        <div class="border-t border-slate-100 pt-5">
                            <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-3.5" x-text="lang === 'id' ? 'Jenis Pendanaan' : 'Funding Type'"></label>
                            <div class="space-y-2.5">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="funding" value="all" {{ $filters['funding'] === 'all' ? 'checked' : '' }} onchange="this.form.submit()" class="w-4 h-4 text-emerald-600 border-slate-200 focus:ring-emerald-500 focus:ring-offset-0 rounded-full" />
                                    <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-900 transition-colors" x-text="lang === 'id' ? 'Semua Tipe' : 'All Types'"></span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="funding" value="full" {{ $filters['funding'] === 'full' ? 'checked' : '' }} onchange="this.form.submit()" class="w-4 h-4 text-emerald-600 border-slate-200 focus:ring-emerald-500 focus:ring-offset-0 rounded-full" />
                                    <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-900 transition-colors" x-text="lang === 'id' ? 'Fully Funded (Penuh)' : 'Fully Funded'"></span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="funding" value="partial" {{ $filters['funding'] === 'partial' ? 'checked' : '' }} onchange="this.form.submit()" class="w-4 h-4 text-emerald-600 border-slate-200 focus:ring-emerald-500 focus:ring-offset-0 rounded-full" />
                                    <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-900 transition-colors" x-text="lang === 'id' ? 'Partial Funded (Sebagian)' : 'Partial Funded'"></span>
                                </label>
                            </div>
                        </div>
                    </form>
                </aside>

                <!-- Listings Grid -->
                <div class="flex-1 w-full">
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-xs font-bold text-slate-500">
                            <span x-text="lang === 'id' ? 'Menampilkan' : 'Showing'"></span> <span class="text-slate-950 font-extrabold">{{ $scholarships->count() }}</span> <span x-text="lang === 'id' ? 'Beasiswa Terpilih' : 'Selected Scholarships'"></span>
                        </span>
                        <span class="text-[10px] text-slate-400 flex items-center gap-1.5 font-bold uppercase tracking-widest font-outfit">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span x-text="lang === 'id' ? 'Terbaru & Terpopuler' : 'Latest & Popular'"></span>
                        </span>
                    </div>

                    @if($scholarships->isEmpty())
                        <div class="bg-white border border-slate-200 rounded-[32px] p-12 text-center shadow-lg shadow-slate-100/50">
                            <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center mx-auto mb-4 text-slate-400 border border-slate-100">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <h3 class="text-base font-extrabold text-slate-900 font-outfit" x-text="lang === 'id' ? 'Beasiswa Tidak Ditemukan' : 'Scholarships Not Found'"></h3>
                            <p class="text-slate-505 text-xs mt-2 max-w-xs mx-auto" x-text="lang === 'id' ? 'Kami tidak dapat menemukan beasiswa yang sesuai dengan kriteria filter Anda.' : 'We could not find any scholarships matching your filter criteria.'"></p>
                            <a href="{{ url('/') }}#listings" class="inline-flex items-center gap-2 mt-6 px-5 py-2.5 bg-slate-900 text-white text-xs font-black rounded-xl transition-colors">
                                Reset Filter
                            </a>
                        </div>
                    @else
                        <!-- Cards Grid (With Images) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            @foreach($scholarships as $item)
                                <article class="bg-white border border-slate-200/40 rounded-[32px] overflow-hidden hover:shadow-2xl hover:border-emerald-500/25 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group shadow-lg shadow-slate-100/40">
                                    
                                    <!-- Dynamic Card Image Header -->
                                    <div class="h-48 overflow-hidden relative">
                                        <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
                                        
                                        <!-- Absolute Badges overlay on Image -->
                                        <div class="absolute top-4 left-4 flex flex-wrap gap-1.5">
                                            <span class="text-[9px] font-black uppercase tracking-wider px-2.5 py-1.5 rounded-xl bg-slate-900/80 backdrop-blur-md text-white border border-slate-700/30">
                                                {{ $item['level'] }}
                                            </span>
                                            <span class="text-[9px] font-black uppercase tracking-wider px-2.5 py-1.5 rounded-xl bg-emerald-600/90 backdrop-blur-md text-white">
                                                {{ $item['location'] }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="p-6 flex-grow">
                                        <!-- Provider & Funding type -->
                                        <div class="flex items-center justify-between text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">
                                            <span class="truncate max-w-[150px]">{{ $item['provider'] }}</span>
                                            <span class="text-emerald-650 font-extrabold text-glow">{{ $item['funding_type'] }}</span>
                                        </div>

                                        <!-- Title -->
                                        <h3 class="text-base sm:text-lg font-black text-slate-955 font-outfit group-hover:text-emerald-600 transition-colors line-clamp-1">
                                            {{ $item['title'] }}
                                        </h3>

                                        <!-- Description -->
                                        <p class="text-slate-500 text-xs mt-3 line-clamp-3 leading-relaxed">
                                            {{ $item['description'] }}
                                        </p>
                                    </div>

                                    <!-- Bottom Info Footer -->
                                    <div class="border-t border-slate-100/80 px-6 py-4 bg-slate-50/50 flex items-center justify-between">
                                        <!-- Deadline info -->
                                        <div class="flex items-center gap-2 text-slate-500">
                                            <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <div class="leading-none">
                                                <span class="text-[9px] font-bold text-slate-400 uppercase block tracking-wider">Deadline</span>
                                                <span class="text-xs font-bold text-slate-700">{{ $item['deadline'] }}</span>
                                            </div>
                                        </div>

                                        <!-- Details Button -->
                                        <button @click="openModal({{ json_encode($item) }})" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-650 hover:text-emerald-700 hover:gap-2 transition-all duration-150 font-outfit" x-text="lang === 'id' ? 'Detail Beasiswa' : 'Scholarship Details'">
                                        </button>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>

        </section>

        <!-- Process Timeline Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 border-t border-slate-200/50">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-black text-emerald-600 uppercase tracking-widest font-outfit" x-text="lang === 'id' ? 'Panduan Tahapan' : 'Application Journey'"></span>
                <h2 class="text-3xl font-black text-slate-900 mt-2 font-outfit" x-text="lang === 'id' ? 'Langkah Menuju Beasiswa Impian' : 'Steps to Your Dream Scholarship'"></h2>
                <p class="text-slate-500 text-sm mt-3" x-text="lang === 'id' ? 'Proses pendaftaran yang mudah dipahami demi kesiapan berkas Anda secara menyeluruh.' : 'Simple application stages to ensure your checklist is thoroughly prepared.'"></p>
            </div>
            
            <!-- Timeline nodes -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                <!-- Node 1 -->
                <div class="space-y-4 text-center relative group">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center justify-center font-black text-lg mx-auto shadow-md group-hover:scale-105 transition-transform duration-300">
                        1
                    </div>
                    <h3 class="text-sm font-bold text-slate-900 font-outfit" x-text="lang === 'id' ? 'Pencarian & Filter' : 'Search & Filter'"></h3>
                    <p class="text-xs text-slate-500 leading-relaxed px-4" x-text="lang === 'id' ? 'Temukan program beasiswa yang sesuai dengan profil akademik dan rencana masa depan Anda.' : 'Identify the scholarship program matching your academic scores and future pathway.'"></p>
                </div>
                
                <!-- Node 2 -->
                <div class="space-y-4 text-center relative group">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 border border-indigo-100 flex items-center justify-center font-black text-lg mx-auto shadow-md group-hover:scale-105 transition-transform duration-300">
                        2
                    </div>
                    <h3 class="text-sm font-bold text-slate-900 font-outfit" x-text="lang === 'id' ? 'Persiapan Dokumen' : 'Prepare Files'"></h3>
                    <p class="text-xs text-slate-500 leading-relaxed px-4" x-text="lang === 'id' ? 'Siapkan berkas administrasi seperti TOEFL/IELTS, LoA, Motivation Letter, dan Surat Rekomendasi.' : 'Prepare credentials such as language certificates, LoAs, essays, and references.'"></p>
                </div>

                <!-- Node 3 -->
                <div class="space-y-4 text-center relative group">
                    <div class="w-14 h-14 rounded-2xl bg-rose-50 text-rose-600 border border-rose-100 flex items-center justify-center font-black text-lg mx-auto shadow-md group-hover:scale-105 transition-transform duration-300">
                        3
                    </div>
                    <h3 class="text-sm font-bold text-slate-900 font-outfit" x-text="lang === 'id' ? 'Kirim Pendaftaran' : 'Submit Application'"></h3>
                    <p class="text-xs text-slate-500 leading-relaxed px-4" x-text="lang === 'id' ? 'Kirim lamaran secara daring ke universitas tujuan dan portal lembaga penyelenggara beasiswa.' : 'Send applications online to the destination universities and provider portals.'"></p>
                </div>

                <!-- Node 4 -->
                <div class="space-y-4 text-center relative group">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 border border-amber-100 flex items-center justify-center font-black text-lg mx-auto shadow-md group-hover:scale-105 transition-transform duration-300">
                        4
                    </div>
                    <h3 class="text-sm font-bold text-slate-900 font-outfit" x-text="lang === 'id' ? 'Wawancara & Lolos' : 'Interview & Award' font-outfit"></h3>
                    <p class="text-xs text-slate-500 leading-relaxed px-4" x-text="lang === 'id' ? 'Jalani wawancara dengan penuh persiapan dan dapatkan pengumuman kelulusan resmi Anda!' : 'Ace the interview panels and obtain your official scholarship acceptance announcement!'"></p>
                </div>
            </div>
        </section>

        <!-- Panduan Beasiswa Section (ID panduan) -->
        <section id="panduan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 border-t border-slate-200/50 scroll-mt-28">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-black text-emerald-600 uppercase tracking-widest font-outfit" x-text="lang === 'id' ? 'Tips & Strategi Lolos' : 'Tips & Strategies'"></span>
                <h2 class="text-3xl font-black text-slate-900 mt-2 font-outfit" x-text="lang === 'id' ? 'Panduan Sukses Beasiswa' : 'Scholarship Success Guides'"></h2>
                <p class="text-slate-500 text-sm mt-3" x-text="lang === 'id' ? 'Pelajari panduan terkurasi dari alumni penerima beasiswa global untuk mempersiapkan dokumen pendaftaranmu.' : 'Learn from curated guides written by global scholarship alumni to prepare your application documents.'"></p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Guide 1 -->
                <article class="bg-white rounded-3xl border border-slate-200/50 overflow-hidden shadow-lg shadow-slate-100/50 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="p-6 space-y-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100 shadow-sm">
                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </div>
                        <h3 class="text-base font-black text-slate-900 font-outfit group-hover:text-emerald-650 transition-colors" x-text="lang === 'id' ? 'Cara Menulis Essay Beasiswa (Motivation Letter)' : 'How to Write a Scholarship Essay (Motivation Letter)'"></h3>
                        <p class="text-slate-500 text-xs leading-relaxed" x-text="lang === 'id' ? 'Strategi menyusun tulisan personal statement yang memikat para panelis penyeleksi beasiswa nasional dan dunia.' : 'Key strategies to structure a winning personal statement that impresses global selection committees.'"></p>
                    </div>
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex justify-between items-center text-xs font-bold text-emerald-600 group-hover:text-emerald-700">
                        <span x-text="lang === 'id' ? 'Baca Panduan Essay' : 'Read Essay Guide'"></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </div>
                </article>

                <!-- Guide 2 -->
                <article class="bg-white rounded-3xl border border-slate-200/50 overflow-hidden shadow-lg shadow-slate-100/50 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="p-6 space-y-4">
                        <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center border border-indigo-100 shadow-sm">
                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5c-.313 1.565-.95 3.018-1.859 4.307m.854-4.307a5.115 5.115 0 01-1.043-.258M10.5 9a8.729 8.729 0 01-3.293-2.193M6 9a9.018 9.018 0 013.293 2.193M3.177 9a15.09 15.09 0 003.235 5.613m-3.235-5.613a18.218 18.218 0 013.235-5.613m0 11.226a11.753 11.753 0 003.57-2.61m-3.57 2.61a15.521 15.521 0 01-3.57-2.61"/></svg>
                        </div>
                        <h3 class="text-base font-black text-slate-900 font-outfit group-hover:text-emerald-650 transition-colors" x-text="lang === 'id' ? 'Skor IELTS Tinggi: Tips Belajar Mandiri Gratis' : 'High IELTS Score: Free Self-Study Guide'"></h3>
                        <p class="text-slate-500 text-xs leading-relaxed" x-text="lang === 'id' ? 'Rencana belajar harian terbukti untuk meningkatkan skor IELTS dari band 5.0 menuju 7.0 secara mandiri tanpa kursus mahal.' : 'Proven study routine to boost your IELTS score from band 5.0 to 7.0 independently without expensive courses.'"></p>
                    </div>
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex justify-between items-center text-xs font-bold text-emerald-600 group-hover:text-emerald-700">
                        <span x-text="lang === 'id' ? 'Pelajari Tips IELTS' : 'Learn IELTS Tips'"></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </div>
                </article>

                <!-- Guide 3 -->
                <article class="bg-white rounded-3xl border border-slate-200/50 overflow-hidden shadow-lg shadow-slate-100/50 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="p-6 space-y-4">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center border border-amber-100 shadow-sm">
                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h3 class="text-base font-black text-slate-900 font-outfit group-hover:text-emerald-650 transition-colors" x-text="lang === 'id' ? 'Cara Menghubungi Profesor & Meminta LoA' : 'Contacting Professors & Requesting LoAs'"></h3>
                        <p class="text-slate-500 text-xs leading-relaxed" x-text="lang === 'id' ? 'Etika dan contoh email resmi menghubungi calon pembimbing riset di universitas luar negeri untuk mendapatkan Letter of Acceptance.' : 'Etiquette and email templates to reach out to research supervisors abroad for securing a LoA.'"></p>
                    </div>
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex justify-between items-center text-xs font-bold text-emerald-600 group-hover:text-emerald-700">
                        <span x-text="lang === 'id' ? 'Baca Cara Cari LoA' : 'Read LoA Guide'"></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </div>
                </article>
            </div>
        </section>

    </main>

    <!-- Interactive Detail Modal -->
    <div class="fixed inset-0 z-50 overflow-y-auto" 
         x-show="selectedScholarship !== null"
         x-transition:enter="transition ease-out duration-350"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak>
        
        <!-- Backdrop Blur -->
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm" @click="closeModal()"></div>

        <!-- Modal Content Container -->
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="relative bg-white rounded-3xl max-w-2xl w-full overflow-hidden shadow-2xl border border-slate-100 transition-all transform duration-350"
                 x-show="selectedScholarship !== null"
                 x-transition:enter="transition ease-out duration-350"
                 x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 scale-95 translate-y-4">
                
                <!-- Modal Top Design Banner -->
                <div class="h-48 relative overflow-hidden flex items-end p-6 border-b border-slate-100">
                    <img :src="selectedScholarship ? '{{ asset('images') }}/' + selectedScholarship.image : ''" class="absolute inset-0 w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>

                    <!-- Close button -->
                    <button @click="closeModal()" class="absolute top-4 right-4 p-2 bg-slate-950/50 hover:bg-slate-950/70 border border-slate-800/40 text-slate-200 hover:text-white rounded-full transition-colors focus:outline-none z-20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                    
                    <!-- Meta badges -->
                    <div class="relative z-10 flex flex-wrap gap-2 items-center">
                        <span class="text-[9px] font-extrabold uppercase tracking-wider px-2.5 py-1 rounded bg-slate-900/80 text-white border border-slate-800" x-text="selectedScholarship?.level"></span>
                        <span class="text-[9px] font-extrabold uppercase tracking-wider px-2.5 py-1 rounded bg-slate-900/80 text-white border border-slate-800" x-text="selectedScholarship?.funding_type"></span>
                        <span class="text-[9px] font-extrabold uppercase tracking-wider px-2.5 py-1 rounded bg-emerald-600 text-white" x-text="selectedScholarship?.location"></span>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6 sm:p-8">
                    <!-- Title & Provider -->
                    <h2 class="text-xl sm:text-2xl font-black text-slate-900 font-outfit leading-tight" x-text="selectedScholarship?.title"></h2>
                    <span class="text-xs font-bold text-slate-400 block mt-1.5 uppercase tracking-wider" x-text="selectedScholarship?.provider"></span>

                    <!-- Description -->
                    <p class="text-slate-500 text-xs sm:text-sm mt-4 leading-relaxed" x-text="selectedScholarship?.description"></p>

                    <!-- Inner Lists -->
                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Requirements -->
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-5">
                            <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3.5 flex items-center gap-2" x-text="lang === 'id' ? 'Persyaratan' : 'Requirements'">
                            </h3>
                            <ul class="space-y-2">
                                <template x-for="req in selectedScholarship?.requirements">
                                    <li class="flex items-start gap-2">
                                        <span class="text-emerald-500 font-bold shrink-0 mt-0.5">•</span>
                                        <span class="text-xs text-slate-600 leading-normal" x-text="req"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <!-- Coverage -->
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-5">
                            <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3.5 flex items-center gap-2" x-text="lang === 'id' ? 'Cakupan' : 'Coverage'">
                            </h3>
                            <ul class="space-y-2">
                                <template x-for="cov in selectedScholarship?.coverage">
                                    <li class="flex items-start gap-2">
                                        <span class="text-emerald-500 font-bold shrink-0 mt-0.5">•</span>
                                        <span class="text-xs text-slate-600 leading-normal" x-text="cov"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>

                    <!-- Footer Action area -->
                    <div class="border-t border-slate-100 pt-6 mt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <!-- Deadline Alert -->
                        <div class="flex items-center gap-2.5 text-slate-500 self-start sm:self-auto">
                            <div class="w-9 h-9 rounded-xl bg-rose-50 border border-rose-100 flex items-center justify-center text-rose-500 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div class="leading-none">
                                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest block" x-text="lang === 'id' ? 'Batas Pendaftaran' : 'Closing Date'"></span>
                                <span class="text-xs font-black text-slate-800 mt-0.5 block" x-text="selectedScholarship?.deadline"></span>
                            </div>
                        </div>

                        <!-- CTA Apply Button -->
                        <div class="flex w-full sm:w-auto items-center gap-3">
                            <button @click="closeModal()" class="w-1/2 sm:w-auto px-5 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 border border-slate-200 font-bold rounded-xl text-xs transition-colors text-center" x-text="lang === 'id' ? 'Tutup' : 'Close'">
                            </button>
                            <a :href="selectedScholarship?.link" target="_blank" class="w-1/2 sm:w-auto px-6 py-2.5 bg-emerald-600 hover:bg-emerald-500 active:scale-95 text-white font-bold rounded-xl text-xs transition-all text-center inline-flex items-center justify-center gap-1.5 shadow-md shadow-emerald-500/10">
                                <span x-text="lang === 'id' ? 'Kunjungi Website' : 'Apply Now'"></span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Footer (ID about) -->
    <footer id="about" class="bg-slate-900 text-slate-400 border-t border-slate-850 mt-auto scroll-mt-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Branding -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-emerald-500 flex items-center justify-center">
                            <svg class="w-4.5 h-4.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            </svg>
                        </div>
                        <span class="text-lg font-black tracking-tight text-white font-outfit">Info<span class="text-emerald-400">Beasiswa</span></span>
                    </div>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium" x-text="lang === 'id' ? 'Portal rujukan informasi beasiswa terpopuler bagi pelajar Indonesia yang ingin melangkah tinggi mewujudkan cita-cita akademisnya.' : 'The most popular scholarship resource portal for Indonesian students looking to step high and fulfill their academic dreams.'"></p>
                </div>
                
                <!-- Navigation -->
                <div>
                    <h4 class="text-xs font-black text-white uppercase tracking-widest mb-4" x-text="lang === 'id' ? 'Navigasi' : 'Navigation'"></h4>
                    <ul class="space-y-2.5 text-xs font-semibold">
                        <li><a href="#listings" class="hover:text-emerald-400 transition-colors" x-text="lang === 'id' ? 'Cari Beasiswa' : 'Find Scholarships'"></a></li>
                        <li><a href="?location=domestic#listings" class="hover:text-emerald-400 transition-colors" x-text="lang === 'id' ? 'Beasiswa Dalam Negeri' : 'Domestic Study'"></a></li>
                        <li><a href="?location=abroad#listings" class="hover:text-emerald-400 transition-colors" x-text="lang === 'id' ? 'Beasiswa Luar Negeri' : 'Study Abroad'"></a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h4 class="text-xs font-black text-white uppercase tracking-widest mb-4" x-text="lang === 'id' ? 'Panduan' : 'Guides'"></h4>
                    <ul class="space-y-2.5 text-xs font-semibold">
                        <li><a href="#panduan" class="hover:text-emerald-400 transition-colors" x-text="lang === 'id' ? 'Tips Esai Beasiswa' : 'Essay Tips'"></a></li>
                        <li><a href="#panduan" class="hover:text-emerald-400 transition-colors" x-text="lang === 'id' ? 'Persiapan Sertifikasi IELTS' : 'IELTS Preparation'"></a></li>
                        <li><a href="#panduan" class="hover:text-emerald-400 transition-colors" x-text="lang === 'id' ? 'Cara Meminta LoA' : 'Requesting LoAs'"></a></li>
                    </ul>
                </div>

                <!-- Subscribe -->
                <div>
                    <h4 class="text-xs font-black text-white uppercase tracking-widest mb-4">Newsletter</h4>
                    <p class="text-xs text-slate-550 mb-3.5 leading-relaxed font-medium" x-text="lang === 'id' ? 'Dapatkan informasi pembukaan beasiswa langsung di email Anda.' : 'Get scholarship opening updates directly in your email.'"></p>
                    <form action="#" class="flex gap-2">
                        <input type="email" placeholder="Email Anda" class="px-3 py-2 bg-slate-800 text-slate-200 placeholder-slate-500 rounded-lg text-xs w-full focus:ring-1 focus:ring-emerald-500 focus:outline-none border-0" />
                        <button type="submit" class="px-3.5 py-2 bg-emerald-500 text-slate-950 font-bold rounded-lg text-xs hover:bg-emerald-400 transition-colors shrink-0" x-text="lang === 'id' ? 'Daftar' : 'Subscribe'"></button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-slate-800 mt-12 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-650 font-semibold">
                <span x-text="lang === 'id' ? '© 2026 Info Beasiswa. Hak Cipta Dilindungi Undang-Undang.' : '© 2026 Info Beasiswa. All Rights Reserved.'"></span>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-slate-400" x-text="lang === 'id' ? 'Kebijakan Privasi' : 'Privacy Policy'"></a>
                    <a href="#" class="hover:text-slate-400" x-text="lang === 'id' ? 'Syarat & Ketentuan' : 'Terms & Conditions'"></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
