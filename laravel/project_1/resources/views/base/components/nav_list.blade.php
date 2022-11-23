<ul class="navbar-nav">
    @include('base.components.nav_item', ['nav_item__name'     => 'Dashboard',
                                          'nav_item__target'   => '/',
                                          'nav_item_icon_name' => 'dashboard',
                                          'nav_item__active'   => ( $active == 'dashboard' ? 1 : 0 ) ])

    @include('base.components.nav_item', ['nav_item__name'     => 'Produk',
                                          'nav_item__target'   => '/produk',
                                          'nav_item_icon_name' => 'inventory_2',
                                          'nav_item__active'   => ( $active == 'produk'    ? 1 : 0 ) ])

    @include('base.components.nav_item', ['nav_item__name'     => 'Brand',
                                          'nav_item__target'   => '/brand',
                                          'nav_item_icon_name' => 'label',
                                          'nav_item__active'   => ( $active == 'brand'     ? 1 : 0 ) ])

    @include('base.components.nav_item', ['nav_item__name'     => 'Gudang',
                                          'nav_item__target'   => '/gudang',
                                          'nav_item_icon_name' => 'warehouse',
                                          'nav_item__active'   => ( $active == 'gudang'    ? 1 : 0 ) ])

    @include('base.components.nav_item', ['nav_item__name'     => 'Customer',
                                          'nav_item__target'   => '/customer',
                                          'nav_item_icon_name' => 'contact_mail',
                                          'nav_item__active'   => ( $active == 'customer'  ? 1 : 0 ) ])

    @include('base.components.nav_item', ['nav_item__name'     => 'Market',
                                          'nav_item__target'   => '/market',
                                          'nav_item_icon_name' => 'store',
                                          'nav_item__active'   => ( $active == 'market'    ? 1 : 0 ) ])
</ul>
