<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('index')}}" class="">
            <img src="{{asset('../admin/assets/img/logo (2).png')}}" alt="" class="">
        </a>
    </div>
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}">
            <a href="{{route('index')}}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>

        </li>

        <!-- registration -->
        <li class="menu-item {{ Route::currentRouteName() == 'students_management' || Route::currentRouteName() == 'bookingleave_date' || Route::currentRouteName() == 'listing_counselor' || Route::currentRouteName() == 'country' || Route::currentRouteName() == 'agents' || Route::currentRouteName() == 'reference' || Route::currentRouteName() == 'sessions' || Route::currentRouteName() == 'subagent' ||Route::currentRouteName() == 'university' ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Extended UI">Registration</div>
            </a>
            <ul class="menu-sub">
                @can('Student Management')
                <li class="menu-item {{ Route::currentRouteName() == 'students_management' ? 'active' : '' }}">
                    <a href="{{route('students_management')}}" class="menu-link">
                        <div data-i18n="Text Divider">Student Management</div>
                    </a>
                </li>
                @endcan
                @can('Booking Management')
                <li class="menu-item {{ Route::currentRouteName() == 'bookingleave_date' ? 'active' : '' }} ">
                  <a href="{{route('bookingleave_date')}}" class="menu-link">
                      <div data-i18n="Text Divider">Booking Management</div>
                  </a>
              </li>
              @endcan
              @can('Currency')
                <li class="menu-item  {{ Route::currentRouteName() == 'listing_counselor' ? 'active' : '' }}">
                    <a href="{{route('listing_counselor')}}" class="menu-link">
                        <div data-i18n="Text Divider">Currency</div>
                    </a>
                </li>
                @endcan
                @can('Country')
                <li class="menu-item {{ Route::currentRouteName() == 'country' ? 'active' : '' }}">
                    <a href="{{route('country')}}" class="menu-link">
                        <div data-i18n="Text Divider">Country</div>
                    </a>
                </li>
                @endcan
                @can('Agent')
                <li class="menu-item {{ Route::currentRouteName() == 'agents' ? 'active' : '' }}">
                    <a href="{{route('agents')}}" class="menu-link">
                        <div data-i18n="Text Divider">Agent</div>
                    </a>
                </li>
                @endcan
                @can('Reference')
                <li class="menu-item {{ Route::currentRouteName() == 'reference' ? 'active' : '' }}">
                    <a href="{{route('reference')}}" class="menu-link">
                        <div data-i18n="Text Divider">Reference</div>
                    </a>
                </li>
                @endcan
                @can('Session')
                <li class="menu-item {{ Route::currentRouteName() == 'sessions' ? 'active' : '' }}">
                    <a href="{{route('sessions')}}" class="menu-link">
                        <div data-i18n="Text Divider">Session</div>
                    </a>
                </li>
                @endcan
                @can('Sub Agent')
                <li class="menu-item  {{ Route::currentRouteName() == 'subagent' ? 'active' : '' }}">
                    <a href="{{route('subagent')}}" class="menu-link">
                        <div data-i18n="Text Divider">Sub Agent</div>
                    </a>
                </li>
                @endcan
                @can('University')
                <li class="menu-item {{ Route::currentRouteName() == 'university' ? 'active' : '' }}">
                    <a href="{{route('university')}}" class="menu-link">
                        <div data-i18n="Text Divider">University</div>
                    </a>
                </li>
                @endcan
            </ul>
        </li>

       
        <!-- Transection -->
        <li class="menu-item  {{ Route::currentRouteName() == 'counselor' ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-transfer"></i>

                <div data-i18n="Extended UI">Transection</div>
            </a>
            <ul class="menu-sub">
              
                @can('Assign Counselor')
                <li class="menu-item {{ Route::currentRouteName() == 'counselor' ? 'active' : '' }}">
                    <a href="{{route('counselor')}}" class="menu-link">
                        <div data-i18n="Text Divider">Assign Counselor</div>
                    </a>
                </li>
                @endcan

            </ul>
        </li>
     

      
        <!-- User Managementn -->
        <li class="menu-item {{ Route::currentRouteName() == 'user_page' || Route::currentRouteName() == 'roles' || Route::currentRouteName() == 'permissions' ? 'active open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>

                <div data-i18n="Extended UI">User Management</div>
            </a>
            <ul class="menu-sub">
                @can('Users')
                <li class="menu-item {{ Route::currentRouteName() == 'user_page' ? 'active' : '' }}">
                    <a href="{{route('user_page')}}" class="menu-link">
                        <div data-i18n="Text Divider">Users</div>
                    </a>
                </li>
                @endcan
                @can('Users Access Role')
                <li class="menu-item {{ Route::currentRouteName() == 'roles' ? 'active' : '' }}">
                    <a href="{{route('roles')}}" class="menu-link">
                        <div data-i18n="Text Divider">Users Access Role</div>
                    </a>
                </li>
                @endcan
                @can('Users Permissions')
                <li class="menu-item {{ Route::currentRouteName() == 'permissions' ? 'active' : '' }}">
                    <a href="{{route('permissions')}}" class="menu-link">
                        <div data-i18n="Text Divider">Users Permissions</div>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
       
    </ul>
</aside>


<script>
     function toggleDropdown(element) {
        // Toggle active class when the dropdown is clicked
        element.parentNode.classList.toggle('active');
    }
</script>