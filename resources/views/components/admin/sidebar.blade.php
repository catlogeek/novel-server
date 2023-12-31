<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.top.index') }}">
    <div class="sidebar-brand-icon">
      <i class="fas fa-tools"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.top.index') }}">
      <i class="fas fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.user.index') }}">
      <i class="fas fa-users"></i>
      <span>@lang('messages.headline.user')</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.note.index') }}">
      <i class="fas fa-clipboard"></i>
      <span>@lang('messages.headline.note')</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.review.index') }}">
      <i class="fas fa-star"></i>
      <span>@lang('messages.headline.review')</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.story.index') }}">
      <i class="fas fa-book"></i>
      <span>@lang('messages.headline.story')</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.episode.index') }}">
      <i class="fas fa-file-alt"></i>
      <span>@lang('messages.headline.episode')</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.comment.index') }}">
      <i class="fas fa-comments"></i>
      <span>@lang('messages.headline.comment')</span></a>
  </li>


  <!-- Heading -->
  {{-- <div class="sidebar-heading">
    Interface
  </div> --}}

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
