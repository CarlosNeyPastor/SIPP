@php
$configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  @if(!isset($navbarFull))
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        @include('_partials.macros')
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">SIPP</span>
      <span class="app-brand-text  menu-text ms-2">v3.0</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
      <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
    </a>
  </div>
  @endif

  <!-- ! Hide menu divider if navbar-full -->
  @if(!isset($navbarFull))
  <div class="menu-divider mt-0 ">
  </div>
  @endif

  <div class="menu-inner-shadow"></div>
 <!----------------------------------------------------------------MENU------------------------------------------------------------------>
  @role('adm')
  <ul class="menu-inner py-1">
    @foreach ($menuData[0]->menu as $menu)
    {{-- menu headers --}}
    @if (isset($menu->menuHeader))
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">{{ $menu->menuHeader }}</span>
    </li>

    @else

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $menu->slug) {
    $activeClass = 'active';
    }
    elseif (isset($menu->submenu)) {
    if (gettype($menu->slug) === 'array') {
    foreach($menu->slug as $slug){
    if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
    $activeClass = 'active open';
    }
    }
    }
    else{
    if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
    $activeClass = 'active open';
    }
    }

    }
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
        @isset($menu->icon)
        <i class="{{ $menu->icon }}"></i>
        @endisset
        <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
      </a>
    </li>
    @endif
    @endforeach
  </ul>
  @endrole
  @role('ujq|dta')
  <!------------------------------------------------------ PERICIAL - DATA (RECORDAR QUE ES ROL26 EN LA DB)------------------------------>
  <ul class="menu-inner py-1">
    @foreach ($menuData[0]->pericial as $pericial)
    {{-- menu headers --}}
    @if (isset($pericial->menuHeader))
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">{{ $pericial->menuHeader }}</span>
    </li>

    @else

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $pericial->slug) {
    $activeClass = 'active';
    }
    elseif (isset($pericial->submenu)) {
    if (gettype($pericial->slug) === 'array') {
    foreach($pericial->slug as $slug){
    if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
    $activeClass = 'active open';
    }
    }
    }
    else{
    if (str_contains($currentRouteName,$pericial->slug) and strpos($currentRouteName,$pericial->slug) === 0) {
    $activeClass = 'active open';
    }
    }

    }
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="{{ isset($pericial->url) ? url($pericial->url) : 'javascript:void(0);' }}" class="{{ isset($pericial->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($pericial->target) and !empty($pericial->target)) target="_blank" @endif>
        @isset($pericial->icon)
        <i class="{{ $pericial->icon }}"></i>
        @endisset
        <div>{{ isset($pericial->name) ? __($pericial->name) : '' }}</div>
      </a>
    </li>
    @endif
    @endforeach
  </ul>
  @endrole
  @role('ujp')
  <!--------------------------------------------------------------JEFE PERICIAL---------------------------------------------------------->
  <ul class="menu-inner py-1">
    @foreach ($menuData[0]->jefePericial as $jefePericial)
    {{-- menu headers --}}
    @if (isset($jefePericial->menuHeader))
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">{{ $jefePericial->menuHeader }}</span>
    </li>

    @else

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $jefePericial->slug) {
    $activeClass = 'active';
    }
    elseif (isset($jefePericial->submenu)) {
    if (gettype($jefePericial->slug) === 'array') {
    foreach($jefePericial->slug as $slug){
    if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
    $activeClass = 'active open';
    }
    }
    }
    else{
    if (str_contains($currentRouteName,$jefePericial->slug) and strpos($currentRouteName,$jefePericial->slug) === 0) {
    $activeClass = 'active open';
    }
    }

    }
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="{{ isset($jefePericial->url) ? url($jefePericial->url) : 'javascript:void(0);' }}" class="{{ isset($jefePericial->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($jefePericial->target) and !empty($jefePericial->target)) target="_blank" @endif>
        @isset($jefePericial->icon)
        <i class="{{ $jefePericial->icon }}"></i>
        @endisset
        <div>{{ isset($jefePericial->name) ? __($jefePericial->name) : '' }}</div>
      </a>
    </li>
    @endif
    @endforeach
  </ul>
  @endrole
  @role('upa|uep')
  <!--------------------------------------------------------------PLANIMETRIA------------------------------------------------------------>
  <ul class="menu-inner py-1">
    @foreach ($menuData[0]->planimetria as $planimetria)
    {{-- menu headers --}}
    @if (isset($planimetria->menuHeader))
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">{{ $planimetria->menuHeader }}</span>
    </li>

    @else

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $planimetria->slug) {
    $activeClass = 'active';
    }
    elseif (isset($planimetria->submenu)) {
    if (gettype($planimetria->slug) === 'array') {
    foreach($planimetria->slug as $slug){
    if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
    $activeClass = 'active open';
    }
    }
    }
    else{
    if (str_contains($currentRouteName,$planimetria->slug) and strpos($currentRouteName,$planimetria->slug) === 0) {
    $activeClass = 'active open';
    }
    }

    }
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="{{ isset($planimetria->url) ? url($planimetria->url) : 'javascript:void(0);' }}" class="{{ isset($planimetria->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($planimetria->target) and !empty($planimetria->target)) target="_blank" @endif>
        @isset($planimetria->icon)
        <i class="{{ $planimetria->icon }}"></i>
        @endisset
        <div>{{ isset($planimetria->name) ? __($planimetria->name) : '' }}</div>
      </a>
    </li>
    @endif
    @endforeach
  </ul>
  @endrole
  @role('ufa')
  <!--------------------------------------------------------------FOTOGRAFIA------------------------------------------------------------>
  <ul class="menu-inner py-1">
    @foreach ($menuData[0]->fotografia as $fotografia)
    {{-- menu headers --}}
    @if (isset($fotografia->menuHeader))
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">{{ $fotografia->menuHeader }}</span>
    </li>

    @else

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $fotografia->slug) {
    $activeClass = 'active';
    }
    elseif (isset($fotografia->submenu)) {
    if (gettype($fotografia->slug) === 'array') {
    foreach($fotografia->slug as $slug){
    if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
    $activeClass = 'active open';
    }
    }
    }
    else{
    if (str_contains($currentRouteName,$fotografia->slug) and strpos($currentRouteName,$fotografia->slug) === 0) {
    $activeClass = 'active open';
    }
    }

    }
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="{{ isset($fotografia->url) ? url($fotografia->url) : 'javascript:void(0);' }}" class="{{ isset($fotografia->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($fotografia->target) and !empty($fotografia->target)) target="_blank" @endif>
        @isset($fotografia->icon)
        <i class="{{ $fotografia->icon }}"></i>
        @endisset
        <div>{{ isset($fotografia->name) ? __($fotografia->name) : '' }}</div>
      </a>
    </li>
    @endif
    @endforeach
  </ul>
  @endrole
</aside>
