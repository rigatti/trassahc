{*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!-- MODULE Home Featured Products -->
<div id="featured-products_block_center" class="row block products_block clearfix">
    <nav class="navbar navbar-default" style="margin-left:0px;">
        <div class="col-xs-12">
            <div class="exclusive">
                <p class="titleBlock" style="float: left; height: 50px; padding: 15px 15px; font-size: 18px; line-height: 20px;">
                    {l s='Featured products' mod='homefeatured'}
                </p>
            </div>
        </div>
    </nav>
	{if isset($products) AND $products}
		<div class="block_content">
			{assign var='liHeight' value=250}
			{assign var='nbItemsPerLine' value=3}

            {assign var='i' value=1}
            {assign var='step' value=1}

			{foreach from=$products item=product name=homeFeaturedProducts}

                    {if $i == 1}
                            <div class="row">
                                <center>
                                    <div class="col-xs-12">
                    {/if}

                    <div class="col-sm-4 col-xs-12">
                        <div id="homefeaturedProductContent" style="background-color:#F1F2F4; margin-bottom:10px;">
                            <p class="s_title_block"><a href="{$product.link|escape:'html'}" title="{$product.name|truncate:50:'...'|escape:'htmlall':'UTF-8'}">{$product.name|truncate:35:'...'|escape:'htmlall':'UTF-8'}</a></p>
                            <a href="{$product.link|escape:'html'}" title="{$product.name|escape:html:'UTF-8'}" class="product_image"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html'}" height="{$homeSize.height}" width="{$homeSize.width}" alt="{$product.name|escape:html:'UTF-8'}" />{if isset($product.new) && $product.new == 1}<span class="new">{l s='New' mod='homefeatured'}</span>{/if}</a>
                            <div>
                                {if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}<p class="price_container"><span class="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span></p>{else}<div style="height:21px;"></div>{/if}

                                <a class="lnk_more" href="{$product.link|escape:'html'}" title="{l s='View' mod='homefeatured'}">{l s='View' mod='homefeatured'}</a>
                                <div style="height:23px;"></div>
                            </div>
                        </div>
                    </div>

                    {if $i == 3}
                                </div>
                            </center>
                        </div>
                    {/if}

                    {math equation="(x + y)" x=$i y=$step assign=result}
                    {if $nbItemsPerLine < $result}{$i=1}{else}{$i=$result}{/if}
			{/foreach}

		</div>
	{else}
		<p>{l s='No featured products' mod='homefeatured'}</p>
	{/if}
</div>
<!-- /MODULE Home Featured Products -->
