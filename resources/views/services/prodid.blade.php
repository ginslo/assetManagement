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
					@if($prodid=='Not Found')
            <p><span class="title-caps-bold">Services</span></p>
            <picture><source srcset="/images/panels/hp-panel-3c-750.png" media="(min-width: 900px)" class="ccm-image-block img-responsive bID-962"><source srcset="/images/panels/hp-panel-3c-750.png" media="(min-width: 768px)" class="ccm-image-block img-responsive bID-962"><source srcset="/images/panels/hp-panel-3c-750.jpg" class="ccm-image-block img-responsive bID-962"><img src="/images/panels/hp-panel-3c-750.jpg" alt="#" class="ccm-image-block img-responsive bID-962"></picture>
              <div class="ccm-custom-style-container ccm-custom-style-main-963" >
                <p style="margin-top:20px;">We provide several CMS, IT, and Productivity &amp; Operations solutions. We install and configure each order for you. After you place your order, you will get a ready-to-use website. It's really that simple.</p>
                <p>For certain IT and productivity services, we consult directly with you to fully understand your specific needs. <a href="/contact" data-concrete5-link-type="ajax">Contact us</a> today to get started.</p>
                <p><span class="title-caps-bold">Available Services</span></p>
              </div>
              <div class="ccm-block-page-list-wrapper">
                <div class="ccm-block-page-list-pages">
                  <div class="ccm-block-page-list-page-entry">
                    <div class="ccm-block-page-list-page-entry-text">
                      <div class="ccm-block-page-list-title">
                        <a href="/services/cms" target="_self">Content Management Systems</a>
                      </div>
                      <div class="ccm-block-page-list-description">
                        <p>We provide several CMS solutions. We install and configure each order for you. After you place your order, you will get a ready-to-use website. It's really that simple.</p>
                      </div>
                    </div>
                  </div>
                  <div class="ccm-block-page-list-page-entry">
                    <div class="ccm-block-page-list-page-entry-text">
                      <div class="ccm-block-page-list-title">
                        <p><a href="/services/productivity-and-operations" target="_self">Productivity and Operations</a></p>
                      </div>
                      <div class="ccm-block-page-list-description">
                        <p>We can help you get your ducks in a row and stay organized. Contact us for a consultation today.</p>
                      </div>
                    </div>
                  </div>
                  <div class="ccm-block-page-list-page-entry">
                    <div class="ccm-block-page-list-page-entry-text">
                      <div class="ccm-block-page-list-title">
                        <p><a href="/services/devops" target="_self">IT Services</a></p>
                      </div>
                      <div class="ccm-block-page-list-description">
                        <p>We have a deep knowledge of IT and are eager to pass it on our clients.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          		@endif
          		@foreach($products as $product)
          		{{-- @foreach($services as $service) --}}
          			@unless (Auth::guest())
                  @if(Auth::user()->is_admin == 1)
          					<a href="{{ route('products.product.edit', $product->id) }}"><span title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
          				@endif
          			@endunless
          			 <p>{!! $product->description !!}</p>
								 <br /><br />
								 @if($category_slug == 'hosting')
									 <p><strong>Hosting Price:</strong> ${{ $product->price }} per month</p>
								 @else
									 <p><strong>Installation Price:</strong> ${{ $product->price }} (One Time)<br />
										 We can host this application for you. <a href="/products/hosting/">See hosting options</a></p>
									@endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
