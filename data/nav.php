<?php

return [
        [
            'icon' => 'nav-icon fas fa-tachometer-alt',
            'route' => 'dashboard.dashboard',
            'title' => 'Dashboard',
            'active' => 'dashboard.dashboard',
        ],
        [
            'icon' => 'nav-icon fas fa-clipboard',
            'route' => 'dashboard.organizers.index',
            'title' => 'Organizers',
            'active' => 'dashboard.organizers.*',
        ],
        [
            'icon' => 'nav-icon fas fa-bullhorn',
            'route' => 'dashboard.events.index',
            'title' => 'Events',
            'active' => 'dashboard.events.*',
        ],

        [
        'icon' => 'nav-icon fas fa-handshake',
        'route' => 'dashboard.sponsors.index',
        'title' => 'Sponsors',
        'active' => 'dashboard.sponsors.*',
        ],
        [
        'icon' => 'nav-icon fas fa-user-cog',
        'route' => 'dashboard.roles.index',
        'title' => 'Roles',
        'active' => 'dashboard.roles.*',
        ],
];
