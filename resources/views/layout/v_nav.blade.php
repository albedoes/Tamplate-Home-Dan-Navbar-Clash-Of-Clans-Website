<ul class="sidebar">
<div class="logo-teks-container">
    <div class="logo">
        <img src="{{ asset('PrimeLTE/logo/theprime.png') }}" alt="Logo" class="logo-img">
    </div>
</div>
    <li class="{{ Request::is('home') ? 'active' : '' }}">
        <a href="{{ url('/') }}" onclick="navigate('home')">Home</a>
    </li>
    <li class="{{ Request::is('data') ? 'active' : '' }}">
        <a href="{{ url('/data') }}" onclick="navigate('data')">Data</a>
    </li>
    <li class="{{ Request::is('berita') ? 'active' : '' }}">
        <a href="{{ url('/berita') }}" onclick="navigate('berita')">Berita</a>
    </li>

</ul>
