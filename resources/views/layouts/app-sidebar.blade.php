<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
	<div class="c-sidebar-brand d-lg-down-none">
		<svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
{{--			<use xlink:href="assets/brand/coreui.svg#full"></use>--}}
		</svg>
		<svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
{{--			<use xlink:href="assets/brand/coreui.svg#signet"></use>--}}
		</svg>
	</div>
	<ul class="c-sidebar-nav">
		<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('dashboard')}}">
				<span class="c-sidebar-nav-icon">
					<i class="fa fa-database"></i>
				</span>
				Dashboard
{{--				<span class="badge badge-info">NEW</span>--}}
			</a></li>
		<li class="c-sidebar-nav-title">Masters</li>
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{route('category.index')}}">
				<span class="c-sidebar-nav-icon">
					<i class="fa fa-list"></i>
				</span>
				Category
			</a>
		</li>
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{route('tag.index')}}">
				<span class="c-sidebar-nav-icon">
					<i class="fa fa-list"></i>
				</span>
				Tag
			</a>
		</li>
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{route('day.index')}}">
				<span class="c-sidebar-nav-icon">
					<i class="fa fa-list"></i>
				</span>
				Day
			</a>
		</li>
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{route('poster.index')}}">
				<span class="c-sidebar-nav-icon">
					<i class="fa fa-list"></i>
				</span>
				Poster
			</a>
		</li>
	</ul>
	<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
	        data-class="c-sidebar-minimized"></button>
</div>