 	
<a class="sf-menu-header-logo-zone" href="/public"> </a>

{if $MENU != ''}
	
	<!-- Menu -->
	<div class="sf-contener sf-menu-header sf-menu-header-bottom">
		<ul class="">
			{$MENU}
		</ul>
	</div>
	
	{if $MENU_SEARCH}
	<div class="sf-contener sf-menu-header sf-menu-header-search">
		<form id="searchbox" action="/public/recherche" method="get">
			<input name="controller" value="search" type="hidden">
			<input value="position" name="orderby" type="hidden">
			<input value="desc" name="orderway" type="hidden">
			<input name="search_query" value="" type="text" placeholder="Recherche..">
		</form>
	</div>		
	{/if}

	<!--/ Menu -->
{/if}