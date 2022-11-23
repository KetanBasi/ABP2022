<li class="nav-item">
    <a class="nav-link text-white {{ ($nav_item__active ?? 0) == 1 ? 'active bg-gradient-primary' : '' }}" href="{{ $nav_item__target ?? ''}}">

        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">{{ $nav_item_icon_name ?? '' }}</i>
        </div>

        <span class="nav-link-text ms-1">{{ $nav_item__name ?? 'Navigation Item' }}</span>
    </a>
</li>
