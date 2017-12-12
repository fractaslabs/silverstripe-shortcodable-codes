<% if Image %>
<div class="embed-wrapper sc-image-full">
	<% if Title %>
		<h3 class="embed-title">$Title</h3>
	<% end_if %>
	<% if Description %>
		<p class="embed-desc">$Description</p>
	<% end_if %>
	<% with Image %>
	<figure>
		<% if ResponsiveSet4 %>
			$ResponsiveSet4(950, SetWidth)
		<% else %>
			<img src="$SetWidth(950).URL" alt="$Title" width="$SetWidth(950).Width" height="$SetWidth(950).Height">
		<% end_if %>
		<% if Description || Origin %>
			<figcaption class="img-desc">
				<% if Origin %><cite class="img-credits">$Origin</cite><% end_if %>
				{$Description}
			</figcaption>
		<% end_if %>
	</figure>
	<% end_with %>
</div>
<% end_if %>