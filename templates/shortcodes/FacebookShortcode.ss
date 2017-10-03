<% if Link %>
<% if First %>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml      : true,
      version    : 'v2.10'
    });
  };
  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<% end_if %>
<div class="embed-wrapper sc-fb">
	<% if Title %>
		<h3 class="embed-title">$Title</h3>
	<% end_if %>
	<% if Video %>
		<div class="fb-video" data-href="$Link" data-allowfullscreen="true" data-width="$Width"></div>
	<% else %>
		<div class="fb-post" data-href="$Link" data-width="$Width"></div>
	<% end_if %>
</div>
<% end_if %>
