
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:" style="width: 1em; height: 1em;">
        <use xlink:href="#check-circle-fill"/>
    </svg>
    <div>{{ Session::pull('message') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@elseif(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:" style="width: 1em; height: 1em;">
        <use xlink:href="#exclamation-triangle-fill"/>
    </svg>
    <div>{{ Session::pull('error') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
