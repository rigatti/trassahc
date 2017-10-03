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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="{$lang_iso}"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="{$lang_iso}"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="{$lang_iso}"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="{$lang_iso}"> <![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$lang_iso}">
	<head>
		<title>{$meta_title|escape:'htmlall':'UTF-8'}</title>
{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:html:'UTF-8'}" />
{/if}
{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:html:'UTF-8'}" />
{/if}
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		<meta http-equiv="content-language" content="{$meta_language}" />
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />
		<script type="text/javascript">
			var baseDir = '{$content_dir|addslashes}';
			var baseUri = '{$base_uri|addslashes}';
			var static_token = '{$static_token|addslashes}';
			var token = '{$token|addslashes}';
			var priceDisplayPrecision = {$priceDisplayPrecision*$currency->decimals};
			var priceDisplayMethod = {$priceDisplay};
			var roundMode = {$roundMode};
		</script>

		<script src="/public/themes/chassartV3R/js/jquery.1.12.4.min.js"></script>
		<script src="/public/themes/chassartV3R/js/bootstrap.3.3.7.min.js"></script>

        <link rel="stylesheet" href="/public/themes/chassartV3R/css/bootstrap.3.3.7.min.css" />
        <link rel="stylesheet" href="/public/themes/chassartV3R/css/bootstrap-theme.3.3.7.min.css" />

        <link rel="stylesheet" href="/public/themes/chassartV3R/css/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="/public/themes/chassartV3R/css/main.css" />
{if isset($css_files)}
	{foreach from=$css_files key=css_uri item=media}
	<link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />
	{/foreach}
{/if}
{if isset($js_files)}
	{foreach from=$js_files item=js_uri}
	<script type="text/javascript" src="{$js_uri}"></script>
	{/foreach}
{/if}
		{$HOOK_HEADER}
	</head>
	
	<body {if isset($page_name)}id="{$page_name|escape:'htmlall':'UTF-8'}"{/if} class="{if isset($page_name)}{$page_name|escape:'htmlall':'UTF-8'}{/if}{if $hide_left_column} hide-left-column{/if}{if $hide_right_column} hide-right-column{/if}{if $content_only} content_only{/if}">
	{if !$content_only}
		{if isset($restricted_country_mode) && $restricted_country_mode}
		<div id="restricted-country">
			<p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>
		</div>
		{/if}

        <div class="row" style="padding-bottom: 5px;">
            <div class="col-xs-3 vcenter" style="padding-left:38px;">
                <img style="min-width: 50px;" class="img-responsive" src="logo_homepage_text.jpg"/>
            </div>
            <div class="col-xs-9 vcenter">
                <div class="row">
                    <div class="col-xs-7 text-right">
                        <div >
                             <form id="searchbox" action="#" method="get">
                                    <input name="controller" value="search" type="hidden">
                                    <input value="position" name="orderby" type="hidden"> <input value="desc" name="orderway" type="hidden">
                                    <input name="search_query" value="" type="text" placeholder="Recherche..">
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-4" style="margin-right:20px;">
                        <nobr>Bienvenue | <i class="fa fa-user" aria-hidden="true"></i> login</nobr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-11">
                        <nav class="navbar-default navbar-fixed-width navbar">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                            data-target="#navbarMenu" aria-expanded="false" aria-controls="navbarMenu">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div id="navbarMenu" class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-haspopup="true" aria-expanded="false">Catalogues et conseils <span
                                                    class="caret"></span> </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Am&eacute;nagement d'&eacute;tang</a></li>
                                                <li><a href="#">Engrais</a></li>
                                                <li><a href="#">Terracottem</a></li>
                                                <li><a href="#">Bordures m&eacute;talliques</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="#"
                                               title="Heures d'ouvertures">Heures d'ouvertures</a></li>
                                        <li><a href="#"
                                               title="Contacts">Contacts</a></li>
                                        <li><a href="#"
                                               title="Liens">Liens</a></li>
                                        <li class="hidden-sm"><a href="#"
                                                                 title="Nouveaux produits">Nouveaux
                                            produits</a></li>
                                        <li class="hidden-sm hidden-md">
                                            <a href="#"
                                               title="Tarif en pdf">Tarif en pdf</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row containerMain">
            <div class="col-sm-3 col-lg-2">
                {$HOOK_LEFT_COLUMN}
            </div>
            <div class="col-sm-6 col-lg-8">


	{/if}
