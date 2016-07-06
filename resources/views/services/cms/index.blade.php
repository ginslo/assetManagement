@extends('layouts.master')
@section('title')
	{{ $title }}
@endsection
@section('sidebar')
@endsection

@section('content')

	<div class="ccm-page page-type-page">
	  <div class="row">

	    @if($service=='Not Found')
				<main>
        <div class="container">
        <div class="row">
            <div class="col-md-3 col-sidebar">


    <p><span class="title-thin">Services</span></p>


    <ul class="nav"><li class="nav-selected nav-path-selected">
			<a href="/services/cms" target="_self" class="nav-selected nav-path-selected">Content Management Systems</a>
			<ul>
				<li class=""><a href="/services/cms/Concrete5" target="_self" class="">Concrete5</a></li>
				<li class=""><a href="/services/cms/drupal" target="_self" class="">Drupal</a></li>
				<li class=""><a href="/services/cms/Wordpress" target="_self" class="">Wordpress</a></li>
				<li class=""><a href="/services/cms/magento" target="_self" class="">Magento eCommerce</a></li>
				<li class=""><a href="/services/cms/MediaWiki" target="_self" class="">MediaWiki</a></li></ul></li>
				<li class=""><a href="/services/productivity-and-operations" target="_self" class="">Productivity and Operations</a></li>
				<li class=""><a href="/services/it" target="_self" class="">IT Services</a></li>
			</ul>

        <div class="ccm-custom-style-container ccm-custom-style-sidebar-933" >
    <p style="text-align: center;">  	<span class="title-caps">Get Started Now!</span>  </p>  <ul>  	<li><a href="http://store.westlinks.com/cms.html" data-concrete5-link-type="image"><strong>Go to Store</strong></a></li>  	<li><strong><a href="https://www.westlinks.com/contact/meeting-scheduler" data-concrete5-link-type="image">Call Us</a></strong></li>  </ul>  <p>  	<strong>Questions?</strong> If you're not sure how to proceed with our self-service items or have special needs, feel free to&nbsp;schedule a&nbsp;phone call with us to go over your requirements. We'll point you in the right direction.  </p>
    </div>
            </div>
            <div class="col-md-8 col-sm-offset-1 col-content">

    <p>  	<span class="title-caps-bold">Content Management Systems (CMS)</span>  </p>

    <picture><source srcset="/images/products/logos/hp-panel-1c-750.png" media="(min-width: 900px)" class="ccm-image-block img-responsive bID-959"><source srcset="https://www.westlinks.com/application/files/8914/3208/1263/hp-panel-1c-750.png" media="(min-width: 768px)" class="ccm-image-block img-responsive bID-959"><source srcset="https://www.westlinks.com/application/files/thumbnails/small/8914/3208/1263/hp-panel-1c-750.jpg" class="ccm-image-block img-responsive bID-959"><img src="https://www.westlinks.com/application/files/thumbnails/small/8914/3208/1263/hp-panel-1c-750.jpg" alt="#" class="ccm-image-block img-responsive bID-959"></picture>


    <p>  	  	  	  	We specialize in providing our users with a variety of popular&nbsp;CMS systems hosted on dedicated servers&nbsp;at Amazon, Digital Ocean or Google Cloud Platform. This arrangement provides the security and autonomy that a small business needs and is an asset to any individual as well. Your server is installed on your company, in your name.</p>
		<h4>These apps are&nbsp;<a href="http://store.westlinks.com/cms.html" data-concrete5-link-type="image">available in our store</a> now!</h4>
		<p>Available packages include</p>
		<ul>
			<li><a href="/services/cms/Concrete5" data-concrete5-link-type="ajax">Concrete5</a></li>
			<li><a href="/services/cms/drupal" data-concrete5-link-type="ajax">Drupal</a></li>
			<li><a href="/services/cms/Wordpress" data-concrete5-link-type="ajax">Wordpress</a></li>
			<li><a href="/services/cms/magento" data-concrete5-link-type="ajax">Magento eCommerce</a></li>
			<li><a href="/services/cms/MediaWiki" data-concrete5-link-type="ajax">MediaWiki</a></li>
		</ul>
		<p>To get started, please select a package of your choice in the store. If you would like to have a conversation with us, please&nbsp;<a target="_blank" href="https://westlinks.youcanbook.me">schedule a call</a> or send us your ideas below. We look forward to working with you!</p>



<div id="formblock249" class="ccm-block-type-form">
<form enctype="multipart/form-data" class="form-stacked" id="miniSurveyView249" class="miniSurveyView" method="post" action="/index.php/services/cms/submit_form#1414311713">



	<div class="fields">

					<div class="form-group field field-text">
				<label class="control-label" for="Question1">
					First Name                                            <span class="text-muted small" style="font-weight: normal">Required</span>
                    				</label>
				<input name="Question1" id="Question1" class="form-control" type="text" value="" />			</div>
					<div class="form-group field field-text">
				<label class="control-label" for="Question2">
					Last Name                                            <span class="text-muted small" style="font-weight: normal">Required</span>
                    				</label>
				<input name="Question2" id="Question2" class="form-control" type="text" value="" />			</div>
					<div class="form-group field field-email">
				<label class="control-label" for="Question3">
					Email Address                                            <span class="text-muted small" style="font-weight: normal">Required</span>
                    				</label>
				<input name="Question3" id="Question3" class="form-control" type="email" value="" />			</div>
					<div class="form-group field field-select">
				<label class="control-label" for="Question4">
					Subject                    				</label>
				<select class="form-control" name="Question4" id="Question4" ><option value="" selected="selected">----</option><option selected="selected"></option><option >Support inquiry</option><option >I love your work</option><option >Great website</option><option >Other</option></select>			</div>
					<div class="form-group field field-textarea">
				<label class="control-label" for="Question5">
					Message                    				</label>
				<textarea name="Question5" class="form-control" id="Question5" cols="50" rows="3"></textarea>			</div>

	</div><!-- .fields -->

			<div class="form-group captcha">
			<label class="control-label">Please type the letters and numbers shown in the image.</label>
			<div><div><img src="/index.php/tools/required/captcha?nocache=1467129421" alt="Captcha Code" onclick="this.src = '/index.php/tools/required/captcha?nocache='+(new Date().getTime())" class="ccm-captcha-image" /></div><br/><div>Click the image to see another captcha.</div></div>
			<div><div><input type="text" name="ccmCaptchaCode" class="ccm-input-captcha" required="required"  /></div><br/></div>
		</div>

	<div class="form-actions">
		<input type="submit" name="Submit" class="btn btn-primary" value="Submit" />
	</div>

	<input name="qsID" type="hidden" value="1414311713" />
	<input name="pURI" type="hidden" value="" />

</form>
</div><!-- .formblock -->


            </div>
        </div>
    </div>


</main>



	    @endif

	    @foreach($services as $service)
	    {{-- <p>You selected {{ $service->name }}, {{ $service->source_url }}</p> --}}
	    <p>{!! $service->description !!}</p>
	    @endforeach
	  </div>
  </div>
@endsection
