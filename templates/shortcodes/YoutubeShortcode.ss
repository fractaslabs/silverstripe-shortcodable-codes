<% if Link %>
<div class="embed-wrapper sc-youtube">
	<% if Title %>
		<h3 class="embed-title">$Title</h3>
	<% end_if %>
	<div class="flexible-container">
		<iframe id="ytplayer" type="text/html" width="$Width" height="$Height" src="https://www.youtube.com/embed/{$Link}" frameborder="0"></iframe>
	</div>
</div>
<% end_if %>