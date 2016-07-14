@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

	<div class="ccm-page page-type-page">
	  <div class="row">
			<main>
				<div class="container">
					<div class="row">
					@include('partials._navleft')
					<div class="col-md-8 col-sm-offset-1 col-content">
					@if($service=='Not Found')
						<p><span class="title-caps-bold">Services</span></p>
						<picture><source srcset="/images/panels/hp-panel-3c-750.png" media="(min-width: 900px)" class="ccm-image-block img-responsive bID-962"><source srcset="/images/panels/hp-panel-3c-750.png" media="(min-width: 768px)" class="ccm-image-block img-responsive bID-962"><source srcset="/images/panels/hp-panel-3c-750.jpg" class="ccm-image-block img-responsive bID-962"><img src="/images/panels/hp-panel-3c-750.jpg" alt="#" class="ccm-image-block img-responsive bID-962"></picture>
							<div class="ccm-custom-style-container ccm-custom-style-main-963" >
								<p style="margin-top:20px;">We provide several CMS, IT, and Productivity &amp; Operations solutions. We&nbsp;install and configure each order for you. After you place your order, you will get a ready-to-use website. It's really that simple.</p>
								<p>For certain IT and productivity services, we consult directly with you to fully understand your specific needs. <a href="/contact" data-concrete5-link-type="ajax">Contact us</a> today to get started.</p>
								<p><span class="title-caps-bold">Available Services</span></p>
							</div>
							<div class="ccm-block-page-list-wrapper">
								<div class="ccm-block-page-list-pages">

									@foreach($categories as $category)
										<div class="ccm-block-page-list-page-entry">
											<div class="ccm-block-page-list-page-entry-text">
												<div class="ccm-block-page-list-title">
													<a href="/services/cms" target="_self"><p><a href="/services/{{ $category->slug }}" target="_self">{{ $category->name }}</a>
												</div>
												<div class="ccm-block-page-list-description">
													{{ $category->short_description }}
												</div>
											</div>
										</div>
									@endforeach

								</div>
							</div>
							@endif
							@foreach($services as $service)
								@unless (Auth::guest())
					        @if(Auth::user()->is_admin == 1)
										<a href="{{ route('products.product.edit', $service->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
									@endif
								@endunless
								<p>{!! $service->description !!}</p>
					    @endforeach
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection
