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

<nav class="navbar navbar-default">
    <!-- Block categories module -->
    <div id="categories_block_left" class="block">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbarCategoryReal" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">{l s='Categories' mod='blockcategories'}</span>
        </div>

        <div id="navbarCategoryReal" class="collapse navbar-collapse">
            <div class="list-group mainMenu">
                {foreach from=$blockCategTree.children item=child name=blockCategTree}
                    {if $smarty.foreach.blockCategTree.last}
                        {include file="$tpl_dir./category-tree-branch.tpl" node=$child last='true'}
                    {else}
                        {include file="$tpl_dir./category-tree-branch.tpl" node=$child}
                    {/if}
                {/foreach}
            </div>
        </div>

    </div>
    <!-- /Block categories module -->
</nav>