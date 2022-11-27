<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0  bg-gray-100"
    style="background-image: url('{{ asset('image/bg.png') }}'); background-repeat: no-repeat; background-size:cover;">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-2xl overflow-hidden sm:rounded-lg">
        {{ $slot }}
        <hr class="mt-6">
        <div class="text-center mt-4 text-slate-600">
            &copy;
            <br>
            {{ date('Y',time()) }}
            <br>
            <span class="text-slate-500">Powered by: Tracer Study IAIA 2.0</span> <br>
            Institut Agama Islam Al-Aziziyah
        </div>
    </div>
</div>