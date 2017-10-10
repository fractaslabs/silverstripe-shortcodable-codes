<% if Link %>
<div class="embed-wrapper sc-vimeo">
	<% if Title %>
		<h3 class="embed-title">$Title</h3>
	<% end_if %>
	<div class="flexible-container">
		<iframe src="//player.vimeo.com/video/{$Link}" width="$Width" height="$Height" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</div>
</div>
<% end_if %>