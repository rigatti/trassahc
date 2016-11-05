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

<!-- Block user information module HEADER -->
<div id="header_user" {if $PS_CATALOG_MODE}class="header_user_catalog"{/if}>
	<ul id="header_nav">
		<li id="openHours" style="padding-right:15px;padding-top:40px;">
			<span style="color:#000000">
			<b>HORAIRE</b><br>
<!--
			<b>de MARS &agrave; JUIN</b><br>
			Semaine : 7h30 - 17h00<br>
			Samedi : 8h00 - 12h00<br>
-->
			<b>SEPTEMBRE - NOVEMBRE </b><br>
			En semaine : 8h - 16h30<br>
			Samedi : 8h00 - 12h00<br>

			</span>
		</li>
		<li id="your_account"><a href="{$link->getPageLink('my-account', true)|escape:'html'}" title="{l s='View my customer account' mod='blockuserinfo'}" rel="nofollow">{l s='Your Account' mod='blockuserinfo'}</a></li>
	</ul>
	<p id="header_user_info">
		<nobr>
		{l s='Welcome' mod='blockuserinfo'}
		{if $logged}
			<a href="{$link->getPageLink('my-account', true)|escape:'html'}" title="{l s='View my customer account' mod='blockuserinfo'}" class="account" rel="nofollow"><span>{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>
			<a href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html'}" title="{l s='Log me out' mod='blockuserinfo'}" class="logout" rel="nofollow">{l s='Log out' mod='blockuserinfo'}</a>
		{else}
			<a href="{$link->getPageLink('my-account', true)|escape:'html'}" title="{l s='Login to your customer account' mod='blockuserinfo'}" class="login" rel="nofollow">{l s='Login' mod='blockuserinfo'}</a>
		{/if}
		</nobr>
	</p>
</div>
<!-- /Block user information module HEADER -->
