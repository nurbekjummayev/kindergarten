<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ko'p so'raladigan savollar - Bog'chalar platformasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<!-- Navbar -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 md:py-4">
        <div class="flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl md:text-2xl font-bold text-blue-600 flex items-center gap-2">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Bog'chalar
            </a>

            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition font-medium">
                    Bosh sahifa
                </a>
                <a href="{{ route('faq') }}" class="text-blue-600 font-semibold">
                    FAQ
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="py-12 md:py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">
            Ko'p so'raladigan savollar
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-3xl mx-auto">
            Platformamiz haqida eng ko'p beriladigan savollarga javoblar
        </p>
    </div>
</section>

<!-- FAQ Content -->
<section class="py-12 md:py-16">
    <div class="container mx-auto px-4 max-w-4xl">

        <!-- FAQ Category 1: Bog'cha tanlash -->
        <div class="mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Bog'cha tanlash
            </h2>

            <div class="space-y-4">
                <!-- Question 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Qanday bog'cha tanlash kerak?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p class="mb-3">Bog'cha tanlashda quyidagi mezonlarga e'tibor bering:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li><strong>Joylashuv:</strong> Uyingizdan yoki ish joyingizdan qancha masofada joylashgan</li>
                            <li><strong>Narx:</strong> Oylik to'lov sizning byudjetingizga mos keladimi</li>
                            <li><strong>Yosh oralig'i:</strong> Bog'cha farzandingiz yoshiga mos kelishi kerak</li>
                            <li><strong>Reyting va izohlar:</strong> Boshqa ota-onalarning fikrlari muhim</li>
                            <li><strong>Bog'cha turi:</strong> Davlat, xususiy, Montessori yoki til o'rgatadigan bog'chalarni taqqoslang</li>
                            <li><strong>Dastur va o'qitish usullari:</strong> Bog'chada qanday dastur bo'yicha ta'lim berilishi</li>
                        </ul>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Platformada qanday qilib qidirsam bo'ladi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p class="mb-3">Platformamizda qidirish juda oson:</p>
                        <ol class="list-decimal list-inside space-y-2 ml-4">
                            <li>Bosh sahifada qidiruv formadan foydalaning</li>
                            <li>Bog'cha nomini, yosh oralig'ini yoki narxni kiriting</li>
                            <li>Filtrlar yordamida natijalarni toraytiring (tur, reyting, saralash)</li>
                            <li>Yoqqan bog'chani bosib, batafsil ma'lumotlarni ko'ring</li>
                        </ol>
                        <p class="mt-3">Barcha filtrlar real vaqtda ishlaydi va natijalar darhol yangilanadi.</p>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Bog'chalarni qanday taqqoslash mumkin?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p>Har bir bog'cha kartasida quyidagilar ko'rsatiladi:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li>O'rtacha reyting (yulduzchalar)</li>
                            <li>Izohlar soni</li>
                            <li>Oylik to'lov oralig'i</li>
                            <li>Yosh oralig'i</li>
                            <li>Bog'cha turi</li>
                            <li>Manzil va bog'lanish ma'lumotlari</li>
                        </ul>
                        <p class="mt-3">Batafsil sahifada esa galereyalar, ish vaqtlari va boshqa ma'lumotlar mavjud.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Category 2: Ariza berish -->
        <div class="mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Ariza berish
            </h2>

            <div class="space-y-4">
                <!-- Question 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Ariza qanday beriladi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p class="mb-3">Ariza berish jarayoni juda oddiy:</p>
                        <ol class="list-decimal list-inside space-y-2 ml-4">
                            <li><strong>Ro'yxatdan o'ting:</strong> Platformaga tizimga kiring yoki yangi akkaunt yarating</li>
                            <li><strong>Bog'chani tanlang:</strong> Yoqqan bog'chaning sahifasiga o'ting</li>
                            <li><strong>Ariza tugmasini bosing:</strong> "Ariza qoldirish" yoki "Batafsil ma'lumot" tugmasini bosing</li>
                            <li><strong>Ma'lumotlarni to'ldiring:</strong> Oddiy formani to'ldiring (farzand ismi, yoshi, ota-ona ma'lumotlari)</li>
                            <li><strong>Yuborish:</strong> Arizani yuboring va javob kutib turing</li>
                        </ol>
                        <p class="mt-3 font-semibold text-gray-900">Bog'cha ma'muriyati sizga 1-3 ish kuni ichida javob beradi.</p>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Bir nechta bog'chaga ariza bersam bo'ladimi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p>Ha, albatta! Siz bir nechta bog'chaga ariza berishingiz mumkin. Bu sizga:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li>Ko'proq tanlov imkoniyati beradi</li>
                            <li>Qabul qilish ehtimolini oshiradi</li>
                            <li>Narx va shartlarni taqqoslash imkonini beradi</li>
                        </ul>
                        <p class="mt-3">Tavsiya: 2-3 ta bog'chaga ariza bering va eng yaxshi javobni tanlang.</p>
                    </div>
                </div>

                <!-- Question 6 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Arizamni qanday kuzataman?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p>Tizimga kirgandan so'ng, shaxsiy kabinetingizda:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li>"Mening arizalarim" bo'limida barcha arizalaringizni ko'rishingiz mumkin</li>
                            <li>Har bir arizaning holati ko'rsatiladi (ko'rib chiqilmoqda, qabul qilindi, rad etildi)</li>
                            <li>Bog'cha javob berganda email yoki SMS orqali xabar keladi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Category 3: To'lovlar -->
        <div class="mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                To'lovlar haqida
            </h2>

            <div class="space-y-4">
                <!-- Question 7 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Platformadan foydalanish pullikmi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p class="text-lg font-semibold text-green-600 mb-3">Yo'q, platformamiz ota-onalar uchun mutlaqo bepul!</p>
                        <p>Siz quyidagilarni to'lovsiz qilishingiz mumkin:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li>Bog'chalarni qidirish va ko'rish</li>
                            <li>Filtrlar va saralash</li>
                            <li>Ariza yuborish</li>
                            <li>Sharh va reyting qoldirish</li>
                            <li>Bog'chalar bilan to'g'ridan-to'g'ri bog'lanish</li>
                        </ul>
                    </div>
                </div>

                <!-- Question 8 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Bog'chaga to'lovlar qanday amalga oshiriladi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p>Bog'chaga to'lovlarni to'g'ridan-to'g'ri bog'cha bilan kelishib amalga oshirasiz:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li><strong>Boshlang'ich to'lov:</strong> Ro'yxatga olish uchun birinchi to'lov (agar mavjud bo'lsa)</li>
                            <li><strong>Oylik to'lov:</strong> Har oy bo'sh bo'yicha bog'chaga to'lanadi</li>
                            <li><strong>To'lov usullari:</strong> Naqd, plastik karta yoki bank o'tkazmasi (bog'chaga qarab)</li>
                        </ul>
                        <p class="mt-3 text-sm bg-blue-50 p-3 rounded">
                            <strong>Muhim:</strong> Platformamiz to'lovlar jarayonida vositachi emas. Barcha to'lovlar to'g'ridan-to'g'ri bog'cha bilan amalga oshiriladi.
                        </p>
                    </div>
                </div>

                <!-- Question 9 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Oylik to'lov nimalarni o'z ichiga oladi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p>Oylik to'lov odatda quyidagilarni o'z ichiga oladi:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li>Kunlik parvarish va ta'lim</li>
                            <li>Ovqatlanish (ertalab, tushlik, peşin)</li>
                            <li>O'quv mashg'ulotlari va o'yinlar</li>
                            <li>Asosiy o'quv materiallari</li>
                        </ul>
                        <p class="mt-3"><strong>Qo'shimcha to'lovlar:</strong></p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-2">
                            <li>Qo'shimcha darslar (ingliz tili, sport, san'at)</li>
                            <li>Ekskursiyalar va tadbirlar</li>
                            <li>Transport xizmati (agar bo'lsa)</li>
                        </ul>
                        <p class="mt-3 text-sm bg-yellow-50 p-3 rounded">
                            Aniq ma'lumot uchun bog'cha bilan to'g'ridan-to'g'ri bog'laning.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 text-center text-white">
            <h3 class="text-2xl font-bold mb-3">Savolingiz qoldimi?</h3>
            <p class="text-blue-100 mb-6">Biz sizga yordam berishga tayyormiz!</p>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Bosh sahifaga qaytish
            </a>
        </div>

    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8 mt-12">
    <div class="container mx-auto px-4 text-center">
        <p>&copy; {{ date('Y') }} Bog'chalar platformasi. Barcha huquqlar himoyalangan.</p>
    </div>
</footer>

<!-- Alpine.js for accordion -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqButtons = document.querySelectorAll('.faq-button');

        faqButtons.forEach(button => {
            button.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                const icon = this.querySelector('.faq-icon');

                // Close all other answers
                document.querySelectorAll('.faq-answer').forEach(item => {
                    if (item !== answer && !item.classList.contains('hidden')) {
                        item.classList.add('hidden');
                        item.previousElementSibling.querySelector('.faq-icon').classList.remove('rotate-180');
                    }
                });

                // Toggle current answer
                answer.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
    });
</script>

</body>
</html>
