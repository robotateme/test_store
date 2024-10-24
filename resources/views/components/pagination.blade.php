<nav class="shop-pages d-flex justify-content-between mt-3" aria-label="Page navigation">
    <a href="{{url()->query('/', ['page' => $prev, 'perPage' => $perPage])}}"
       class="btn-link d-inline-flex align-items-center">
        <svg class="me-1" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_prev_sm"/>
        </svg>
        <span class="fw-medium">PREV</span>
    </a>

    <ul class="pagination mb-0">
        @foreach($pages as $pageNum)
            @if($pageNum === $page)
                <li class="page-item">
                    <a class="btn-link px-1 mx-2 btn-link_active"
                       href="{{url()->query('/', ['page' => $pageNum, 'perPage' => $perPage])}}">{{$pageNum}}
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="btn-link px-1 mx-2"
                       href="{{url()->query('/', ['page' => $pageNum, 'perPage' => $perPage])}}">{{$pageNum}}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
    <a href="{{url()->query('/', ['page' => $next, 'perPage' => $perPage])}}" class="btn-link d-inline-flex align-items-center">
        <span class="fw-medium me-1">NEXT</span>
        <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_next_sm"/>
        </svg>
    </a>
</nav>