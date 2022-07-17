<div class="nk-header nk-header-fluid @role(\App\Models\User::Staff) 'bg-light'  @else 'is-theme' @endrole">
  <div class="container-xl wide-xl">
      <div class="nk-header-wrap">
          <div class="nk-menu-trigger mr-sm-2 d-lg-none">
              <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
          </div>
          <div class="nk-header-brand">
              <a href="html/index.html" class="logo-link">
                  <img class="logo-light logo-img @role(\App\Models\User::Staff) 'is-white'  @else '' @endrole" src="{{ asset('/img/logo-kominfo.png') }}" srcset="{{ asset('/img/logo-kominfo.png') }} 2x" alt="logo">
                  <img class="logo-dark logo-img @role(\App\Models\User::Staff) 'is-white'  @else '' @endrole" src="{{ asset('/img/logo-kominfo.png') }}" srcset="{{ asset('/img/logo-kominfo.png') }} 2x" alt="logo-dark">
              </a>
          </div>
          <!-- .nk-header-brand -->
          <div class="nk-header-menu" data-content="headerNav">
              <div class="nk-header-mobile">
                  <div class="nk-header-brand">
                      <a href="#" class="logo-link">
                        <img class="logo-light logo-img" src="{{ asset('/img/logo-kominfo.png') }}" srcset="{{ asset('/img/logo-kominfo.png') }} 2x" alt="logo">
                        <img class="logo-dark logo-img" src="{{ asset('/img/logo-kominfo.png') }}" srcset="{{ asset('/img/logo-kominfo.png') }} 2x" alt="logo-dark">
                      </a>
                  </div>
                  <div class="nk-menu-trigger mr-n2">
                      <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a>
                  </div>
              </div>
              <ul class="nk-menu nk-menu-main ui-s2">
                  <li class="nk-menu-item">
                      <a href="{{ route('government.task.home') }}" class="nk-menu-link">
                        <em class="icon ni ni-book"></em>  <span class="nk-menu-text">Task</span>
                      </a>
                  </li><!-- .nk-menu-item -->
                  <li class="nk-menu-item">
                      <a href="#" class="nk-menu-link">
                        <em class="icon ni ni-gift"></em><span class="nk-menu-text">Hadiah</span>
                      </a>
                  </li><!-- .nk-menu-item -->
                  @role(\App\Models\User::SuperAdmin)
                  <li class="nk-menu-item">
                    <a href="#" class="nk-menu-link">
                      <em class="icon ni ni-users"></em><span class="nk-menu-text">Staff Admin</span>
                    </a>
                  </li><!-- .nk-menu-item -->
                  @endrole

              </ul><!-- .nk-menu -->
          </div><!-- .nk-header-menu -->
          <div class="nk-header-tools">
              <ul class="nk-quick-nav">
                  <li class="dropdown notification-dropdown">
                      <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                          <div class="icon-status icon-status-info"><em class="icon ni ni-bell-fill"></em></div>
                      </a>
                  </li><!-- .dropdown -->
                  <li class="dropdown user-dropdown order-sm-first">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <div class="user-toggle">
                              <div class="user-avatar bg-white sm">
                                  <em class="icon ni ni-user-fill text-dark"></em>
                              </div>
                              <div class="user-info d-none d-xl-block">
                                  <div class="user-status">Administrator</div>
                                  <div class="user-name dropdown-indicator">
                                    {{ Str::of(auth()->user()->name)->title()->limit(30) }}
                                  </div>
                              </div>
                          </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-light">
                          <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                              <div class="user-card">
                                  <div class="user-avatar">
                                    <em class="icon ni ni-user-fill"></em>
                                  </div>
                                  <div class="user-info">
                                      <span class="lead-text">{{ Str::of(auth()->user()->name)->title()->limit(30) }}</span>
                                      <span class="sub-text">
                                        {{ Str::of(auth()->user()->email)->limit(30) }}
                                      </span>
                                  </div>
                              </div>
                          </div>
                          <div class="dropdown-inner">
                              <ul class="link-list">
                                  <li>
                                    <form method="post" action="{{ route('logout') }}">
                                      @csrf
                                      <button class="btn-block btn"><em class="icon ni ni-signout font-weight-bold"></em><span>Sign out</span></button>
                                    </form>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </li><!-- .dropdown -->
              </ul><!-- .nk-quick-nav -->
          </div><!-- .nk-header-tools -->
      </div><!-- .nk-header-wrap -->
  </div><!-- .container-fliud -->
</div>
