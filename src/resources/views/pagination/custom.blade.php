<style>
    /* ================= PAGINATION ================= */

.pagination {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 1rem;
  gap: 12px;
}

/* LEFT INFO */
.pag-info {
  font-size: 0.75rem;
  color: var(--muted);
}

/* BUTTON WRAPPER */
.pag-btns {
  display: flex;
  gap: 6px;
  align-items: center;
}

/* BUTTON STYLE */
.pag-btn {
  width: 34px;
  height: 34px;
  display: flex;
  align-items: center;
  justify-content: center;

  border: 1px solid var(--border);
  border-radius: 8px;
  background: var(--white);
  color: var(--forest);

  font-size: 13px;
  font-weight: 700;
  text-decoration: none;

  transition: all 0.2s ease;
}

/* HOVER */
.pag-btn:hover {
  background: var(--fog);
}

/* ACTIVE PAGE */
.pag-btn.cur {
  background: var(--forest);
  color: white;
  border-color: var(--forest);
}

/* DISABLED */
.pag-disabled {
  opacity: 0.4;
  cursor: not-allowed;
}

/* DOTS */
.pag-dots {
  border: none;
  background: transparent;
  width: auto;
  padding: 0 6px;
}

/* 🔥 FIX ARROW SIZE (IMPORTANT) */
.pag-btn svg {
  width: 14px !important;
  height: 14px !important;
  display: block;
}
</style>
@if ($paginator->hasPages())
<div class="pagination">
 
    <span class="pag-info">
        Affichage {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }}
        sur {{ $paginator->total() }} cultures
    </span>
 
    <div class="pag-btns">
 
        @if ($paginator->onFirstPage())
            <span class="pag-btn pag-disabled" aria-disabled="true">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pag-btn" rel="prev">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
        @endif
 
        @foreach ($elements as $element)
 
            @if (is_string($element))
                <span class="pag-btn pag-dots">{{ $element }}</span>
            @endif
 
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="pag-btn cur" aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="pag-btn">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
 
        @endforeach
 
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pag-btn" rel="next">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        @else
            <span class="pag-btn pag-disabled" aria-disabled="true">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </span>
        @endif
 
    </div>
</div>
@endif
 