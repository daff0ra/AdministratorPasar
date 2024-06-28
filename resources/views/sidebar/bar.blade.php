<div class="w-64 bg-gray-800 text-white flex flex-col">
    <div class="p-4 text-xl font-semibold">Sidebar Menu</div>
    <nav class="flex flex-col p-4">
        <a href="{{ route('home')}}" class="py-2 px-4 rounded hover:bg-gray-700">Dashboard</a>
        <a href="" class="py-2 px-4 rounded hover:bg-gray-700">Data Pasar</a>
      <a href="{{ route('ManagemenPasar.index')}}" class="py-2 px-4 rounded hover:bg-gray-700">Laporan</a>
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="py-2 px-4 rounded hover:bg-gray-700">Log out</a>
    </nav>
  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>