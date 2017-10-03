<% if Link %>
<div class="embed-wrapper sc-iframe">
	<% if Title %>
		<h3 class="embed-title">$Title</h3>
	<% end_if %>
	<iframe type="text/html" src="$Link" width="$Width" height="$Height" class="iframe"></iframe>
</div>
<% end_if %>