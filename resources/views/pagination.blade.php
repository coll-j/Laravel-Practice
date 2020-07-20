@if ($paginator->lastPage() > 1)
  <ul class="pagination" style="list-style: none;">
 <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}" style="display: inline;">
    <a href="{{ $paginator->url(1) }}">Previous</a>
</li>
@for ($i = 1; $i <= $paginator->lastPage(); $i++)
    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}" style="display: inline;">
        <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
    </li>
@endfor
  <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" style="display: inline;">
    <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>
  </li>
</ul>
@endif