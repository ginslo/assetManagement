@extends('layouts.master')

@section('title')
	{{-- {{ $title }} --}}
@endsection

@section('sidebar')
@endsection

@section('content')
  <main>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sidebar">
          <p><span class="title-thin">Contact Us</span></p>
          <div class="ccm-custom-style-container ccm-custom-style-sidebar-925" >
            <p><a class="title-caps-small" href="/contact/#support">Support</a></p>
            <p>If you are a customer and experiencing a technical issue or if you have any questions about our services, visit  the Support Center.</p>
            {{-- <p><a href="#feedback">Feedback</a></p>
            <p>Drop us a line using the feedback form.</p> --}}
            <p><a class="title-caps-small" href="/contact/#chat">Chat</a></p>
            <p>We are [often] available for one-on-one or group chat via text or video. Come say hello!</p>
            <p><a class="title-caps-small" href="/contact/#call">Call</a></p>
            <p>Direct access to our <a href="/contact/meeting-scheduler">live calendar</a> allows you to  schedule a call with us at available times for both of us. Unless there  is an emergency, this is a great method of contacting us.</p>
            <p><a class="title-caps-small" href="/contact/#social">Social Media</a></p>
            <p>Check us out on Twitter and G+</p>
          </div>
        </div>
        <div class="col-md-8 col-sm-offset-1 col-content">
          <p><span class="title-caps-bold">Schedule a Voice Call</span></p>
          <p>With all the sophisticated project management tools, email, chat and various other communication methods available, sometimes going old school and talking one on one just makes the most sense. It can save a lot of time during any phase of a project but especially at the beginning while doing the initial knowledge transfer. Time is valuable though so spontaneous calls and schedule juggling can be a huge waste of time. Using the calendar grid below, please choose a block of time that works best for you, letting us know what you would like to discuss. We look forward to hearing from you!</p>
          <div id="HTMLBlock1231" class="HTMLBlock">
            <iframe src="https://westlinks.youcanbook.me?noframe=true&skipHeaderFooter=true" style="width:100%;height:1000px;border:0px;background-color:transparent;" frameborder="0" allowtransparency="true" onload="keepInView(this);">
            </iframe>
            <script>function keepInView(item) {
              if((document.documentElement&&document.documentElement.scrollTop)||document.body.scrollTop>item.offsetTop)item.scrollIntoView();
            }
            </script>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
