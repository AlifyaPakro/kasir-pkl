<aside class="w-full md:w-64 bg-[#ebebeb] border-b md:border-b-0 md:border-r border-gray-300 p-4 shrink-0">
    <div class="text-[11px] font-bold uppercase tracking-wider text-gray-500 px-3 mb-3">
        RUANG KERJA
    </div>
    <nav class="space-y-1 text-sm">
        <a
            href="{{ route('katalog.index') }}"
            class="block px-3 py-2.5 rounded transition {{ request()->routeIs('katalog.index') ? 'bg-[#d6d6d6] font-semibold text-gray-900' : 'text-gray-700 hover:bg-gray-200/70' }}"
        >
            Katalog produk
        </a>
        <a
            href="#"
            class="block px-3 py-2.5 text-gray-700 hover:bg-gray-200/70 rounded transition"
        >
            Rak &amp; lorong
        </a>
        <a
            href="{{ route('katalog.pencarian') }}"
            class="block px-3 py-2.5 rounded transition {{ request()->routeIs('katalog.pencarian') ? 'bg-[#d6d6d6] font-semibold text-gray-900' : 'text-gray-700 hover:bg-gray-200/70' }}"
        >
            Pencarian produk
        </a>
        <a
            href="{{ route('katalog.tambah') }}"
            class="block px-3 py-2.5 rounded transition {{ request()->routeIs('katalog.tambah') || request()->routeIs('katalog.create') ? 'bg-[#d6d6d6] font-semibold text-gray-900' : 'text-gray-700 hover:bg-gray-200/70' }}"
        >
            Tambah produk
        </a>
        <a
            href="{{ route('katalog.update') }}"
            class="block px-3 py-2.5 rounded transition {{ request()->routeIs('katalog.update') ? 'bg-[#d6d6d6] font-semibold text-gray-900' : 'text-gray-700 hover:bg-gray-200/70' }}"
        >
            Update produk
        </a>
        <a
            href="{{ route('katalog.nonaktif') }}"
            class="block px-3 py-2.5 rounded transition {{ request()->routeIs('katalog.nonaktif') ? 'bg-[#d6d6d6] font-semibold text-gray-900' : 'text-gray-700 hover:bg-gray-200/70' }}"
        >
            Nonaktifkan produk
        </a>
        <a
            href="#"
            class="block px-3 py-2.5 text-gray-700 hover:bg-gray-200/70 rounded transition"
        >
            Validasi stok
        </a>
        <a
            href="#"
            class="block px-3 py-2.5 text-gray-700 hover:bg-gray-200/70 rounded transition"
        >
            Kontrol rilis PM
        </a>
    </nav>
</aside>