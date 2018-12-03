@if (count($breadcrumbs))

    <div class="col-lg-12">
    	<div class="btn-group btn-breadcrumb">
            <a href="/" class="btn btn-breadcrumb-primary btn-sm"><i class="fa fa-home"></i></a>
        @foreach ($breadcrumbs as $breadcrumb)
        
            @if ($breadcrumb->url && !$loop->last)
            	<a href="{{ $breadcrumb->url }}" class="btn btn-breadcrumb-primary btn-sm">{{ $breadcrumb->title }}</a>
            @else
                <a class="btn btn-breadcrumb-primary btn-sm" style="color: #fff;">{{ $breadcrumb->title }}</a>
            @endif

        @endforeach
    	</div>
    </div>

@endif
