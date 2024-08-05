@if ($paginator->hasPages())
    <div class="flex justify-between">

        {{-- 前のページ --}}
        @if ($paginator->onFirstPage())
        <span class="disabled" aria-disabled="true">&#9664;</span> <!-- 左矢印 -->

        @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&#9664;</a> <!-- 左矢印 -->
        @endif

        {{-- ページ番号 --}}
        @foreach ($elements as $element)

        {{-- 数字 --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="current">{{ $page }}</span>

                            <!-- 現在のページ -->
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- 次のページ --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">&#9654;</a>

            <!-- 右矢印 -->
        @else
            <span class="disabled" aria-disabled="true">&#9654;</span>

            <!-- 右矢印 -->
        @endif
    </div>
@endif
