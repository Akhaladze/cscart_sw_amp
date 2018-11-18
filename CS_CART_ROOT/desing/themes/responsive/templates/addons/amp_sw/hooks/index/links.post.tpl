{assign var="_path" value=$seo_canonical.current}

	{if isset($location_data.dispatch) && ($location_data.dispatch == "categories.view" || $location_data.dispatch=="products.view" || $location_data.dispatch=="pages.view?page_type=B")}

		{if $location_data.dispatch == "categories.view" && isset($category_data.category_id)}	
				{assign var="page_type" value="cat"}
				{assign var="id" value=$category_data.category_id}
		
		{elseif $location_data.dispatch=="products.view" && isset($product.product_id) }
			{assign var="page_type" value="good"}
			{assign var="id" value=$product.product_id}


		{elseif $location_data.dispatch && $location_data.dispatch=="pages.view?page_type=B" && isset($page.page_id) }
			{assign var="page_type" value="blog"}
			{assign var="id" value=$page.page_id}

		{elseif $location_data.dispatch || $location_data.dispatch=="index.index"}
			{assign var="page_type" value="index"}
			
		{else assign var="page_type" value="error"}
		
		{/if}
			
			{assign var="new_amp" value="amp.akademorto.kz"}
			{assign var="new_amp_ptype" value="{$new_amp}/{$page_type}"}
			{assign var="old" value="akademorto.kz"}

			<link rel="amphtml" href="{$_path|replace:$old:$new_amp_ptype}/{$id}">
	{/if}