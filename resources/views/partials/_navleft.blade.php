<div class="col-md-3 col-sidebar">
  <p><span class="title-thin">Services</span></p>

  @foreach($categories as $category)
  <ul class="nav"><li class="nav-selected nav-path-selected">
    <a href="/services/{!! $category->slug !!}" target="_self" class="nav-selected nav-path-selected">{{ $category->name }}</a>
    {{-- <a href="/services/cms" target="_self" class="nav-selected nav-path-selected">Content Management Systems</a> --}}
    <ul>
      @foreach($products as $product)
        <li class=""><a href="/services/{{ $category->slug }}/{!! $product->slug !!}" target="_self" class="">{!! $product->name !!}</a></li>
      @endforeach
    </ul>
  @endforeach
  </ul>
  <div class="ccm-custom-style-container ccm-custom-style-sidebar-933" >
    <p style="text-align: center;">  	<span class="title-caps">Get Started Now!</span>  </p>  <ul>  	<li><a href="http://store.westlinks.com/cms.html" data-concrete5-link-type="image"><strong>Go to Store</strong></a></li>  	<li><strong><a href="/contact/meeting-scheduler" data-concrete5-link-type="image">Call Us</a></strong></li>  </ul>  <p>  	<strong>Questions?</strong> If you're not sure how to proceed with our self-service items or have special needs, feel free to&nbsp;schedule a&nbsp;phone call with us to go over your requirements. We'll point you in the right direction.</p>
  </div>
</div>
