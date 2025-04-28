<!-- Sidebar Elegant -->
<div class="fixed inset-y-0 left-0 z-20 w-64 h-screen overflow-y-auto transition-transform duration-300 bg-gradient-to-b from-blue-800 to-blue-900 shadow-xl">
  <!-- Logo Brand -->
  <div class="flex items-center justify-center p-6 border-b border-blue-700">
    <div class="flex items-center">
      <img src="{{ asset('assets/img/inpay.png') }}" class="w-10 h-10" alt="InPay Logo">
      <span class="ml-3 text-xl font-semibold text-black">InPay Electro</span>
    </div>
  </div>

  <!-- Menu Navigation -->
  <nav class="p-4 space-y-1">
    <a href="{{ route('produk.index') }}" class="flex items-center px-4 py-3 text-sm font-medium text-black rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
      <svg class="w-5 h-5 mr-3 text-blue-300 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
      </svg>
      Produk
    </a>

    <a href="{{ route('penjualan.index') }}" class="flex items-center px-4 py-3 text-sm font-medium text-black rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
      <svg class="w-5 h-5 mr-3 text-blue-300 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
      </svg>
      Penjualan
    </a>

    <a href="{{ route('trans') }}" class="flex items-center px-4 py-3 text-sm font-medium text-black rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
      <svg class="w-5 h-5 mr-3 text-blue-300 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
      </svg>
      In & Out
    </a>

    <a href="{{ route('pelanggan.index') }}" class="flex items-center px-4 py-3 text-sm font-medium text-black rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
      <svg class="w-5 h-5 mr-3 text-blue-300 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
      </svg>
      Pemesanan
    </a>
  </nav>

  <!-- Logout Section -->
  <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-blue-700">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="flex items-center w-full px-4 py-3 text-sm font-medium text-black rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
        <svg class="w-5 h-5 mr-3 text-blue-300 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        Logout
      </button>
    </form>
  </div>
</div>

<!-- Main Content -->
<div class="ml-64 p-6">
  <!-- Isi konten utama Anda di sini -->
</div>
