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
            <p><a class="title-caps-small" href="#support">Support</a></p>
            <p>If you are a customer and experiencing a technical issue or if you have any questions about our services, visit  the Support Center.</p>
            {{-- <p><a href="#feedback">Feedback</a></p>
            <p>Drop us a line using the feedback form.</p> --}}
            <p><a class="title-caps-small" href="#chat">Chat</a></p>
            <p>We are [often] available for one-on-one or group chat via text or video. Come say hello!</p>
            <p><a class="title-caps-small" href="#call">Call</a></p>
            <p>Direct access to our <a href="/contact/meeting-scheduler">live calendar</a> allows you to  schedule a call with us at available times for both of us. Unless there  is an emergency, this is a great method of contacting us.</p>
            <p><a class="title-caps-small" href="#social">Social Media</a></p>
            <p>Check us out on Twitter and G+</p>
          </div>
        </div>
        <div class="col-md-8 col-sm-offset-1 col-content">
          <p><span id="support">&nbsp;</span></p>
          <p><span class="title-caps-bold">Support</span></p>
          <p>Our&nbsp;<a target="_blank" href="https://westlinks.zendesk.com/hc/en-us" data-concrete5-link-type="image">helpdesk</a>, powered by&nbsp;Zendesk is set up to answer your questions and manage tickets should you need our assistance. <a target="_blank" href="https://westlinks.zendesk.com/hc/en-us/requests/new" data-concrete5-link-type="image">Submit a Ticket</a> (or just&nbsp;click the "Help" button below). You can also&nbsp;simply send an email to&nbsp;<a href="mailto:support@westlinks.com" data-concrete5-link-type="image">support@westlinks.com</a>.&nbsp;</p>
          <p>Your satisfaction is guaranteed. Expect prompt service.</p>
          {{-- <p><span id="feedback">&nbsp;</span></p>
          <p><span class="title-caps-bold">Feedback</span></p>
          <p>
            Feedback form will return soon.
          </p> --}}

          {{-- <div id="formblock919" class="ccm-block-type-form">
            <form enctype="multipart/form-data" class="form-stacked" id="miniSurveyView919" class="miniSurveyView" method="post" action="/index.php/contact/submit_form#1446018899">
              <div class="fields">
                <div class="form-group field field-text">
                  <label class="control-label" for="Question6">First Name<span class="text-muted small" style="font-weight: normal">Required</span></label>
                  <input name="Question6" id="Question6" class="form-control" type="text" value="" />
                </div>
                <div class="form-group field field-text">
                  <label class="control-label" for="Question7">Last Name<span class="text-muted small" style="font-weight: normal">Required</span></label>
                  <input name="Question7" id="Question7" class="form-control" type="text" value="" />
                </div>
                <div class="form-group field field-email">
                  <label class="control-label" for="Question8">Email Address<span class="text-muted small" style="font-weight: normal">Required</span></label>
                  <input name="Question8" id="Question8" class="form-control" type="email" value="" />
                </div>
                <div class="form-group field field-textarea">
                  <label class="control-label" for="Question9">Comment<span class="text-muted small" style="font-weight: normal">Required</span></label>
                  <textarea name="Question9" class="form-control" id="Question9" cols="50" rows="4"></textarea></div>
              </div>
              <!-- .fields -->
              <div class="form-group captcha">
                <label class="control-label">Please type the letters and numbers shown in the image.</label>
                <div>
                  <div><img src="/index.php/tools/required/captcha?nocache=1467123189" alt="Captcha Code" onclick="this.src = '/index.php/tools/required/captcha?nocache='+(new Date().getTime())" class="ccm-captcha-image" />
                  </div>
                  <br/>
                  <div>Click the image to see another captcha.
                  </div>
                </div>
                <div>
                  <div><input type="text" name="ccmCaptchaCode" class="ccm-input-captcha" required="required"  /></div>
                  <br/>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" name="Submit" class="btn btn-primary" value="Submit" />
              </div>
                <input name="qsID" type="hidden" value="1446018899" />
                <input name="pURI" type="hidden" value="" />
            </form>
          </div> --}}
          <!-- .formblock -->

          <p>&nbsp;</p>
          <p><span id="chat">&nbsp;</span></p>
          <p><span class="title-caps-bold">Chat with us</span></p>
          <p>There are various ways to contact us via chat or video. Please select the method that works best for you. We can't guarantee that we'll be available on a moments notice however, so for best results, it's best to plan a session using our <a href="/contact/meeting-scheduler">calendar</a>.</p>
          <div id="HTMLBlock911" class="HTMLBlock">
            <table width="100%">
              <tbody>
                <tr>
                  <td><p style="text-align: center;"><span class="title-caps-bold">Text Chat</span></p></td>
                  <td><p style="text-align: center;"><span class="title-caps-bold">Video Chat</span></p></td>
                </tr>
                <tr>
                  <td><p style="text-align: center;"><strong>IRC</strong><br>
                    <a href="irc://irc.freenode.net:6667/westlinks">irc.freenode.net:6667/westlinks</a><br>
                    <!-- <a href="irc://irc.preinter.net:6669/westlinks">irc.preinter.net:6669/westlinks</a> --></p>
                    <p style="text-align: center;"><strong>Google Hangouts</strong><br>
                      (support@westlinks.com)</p></td>
                  <td>
                    <div style="margin:auto;text-align:center;">
                      <p><strong>Google Hangouts</strong><br />
                        <script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>
                        <g:hangout render="createhangout" invites="[{ id : '100057973526240014682', invite_type : 'PROFILE' }]"></g:hangout>
                      </p>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <p><span id="call">&nbsp;</span></p>
          <p><span class="title-caps-bold">Schedule a Call</span></p>
          <p>Making spontaneous calls and schedule juggling can be a huge waste of valuable time, so click the link below to avoid all that and choose a time and date that works best for you. Just let us know what you would like to discuss. We look forward to hearing from you!</p>
          <p><a href="/contact/meeting-scheduler" data-concrete5-link-type="ajax"><strong>View Calendar Here</strong></a></p>
          <p><span class="title-caps-bold">SMS Text Message</span></p>
          <p>Send a text to +1 </span>855-712-1800 (NYC area: +1 929-325-1800).<br />
            We will respond as quickly as possible.</p>
          <p><span id="social">&nbsp;</span></p>
          <p><span class="title-caps-bold">Social Media</span></p>
          <p style="text-align: center;"><a href="https://twitter.com/westlinksOnline" data-concrete5-link-type="image"><strong>Twitter</strong></a></p>
          <p style="text-align: center;"><a href="https://plus.google.com/+Westlinks/" data-concrete5-link-type="image"><strong>Google +</strong></a></p>
          <p style="text-align: center;"><em><span style="color: rgb(191, 191, 191);"><span>Not on FB</span></span></em><br>
            <a href="https://plus.google.com/+Westlinks/" data-concrete5-link-type="image"></a></p>
        </div>
      </div>
    </div>
  </main>
@endsection
