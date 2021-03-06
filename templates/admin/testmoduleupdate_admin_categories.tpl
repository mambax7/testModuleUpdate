<!-- Header -->
<{include file='db:testmoduleupdate_admin_header.tpl' }>

<{if $categories_list|default:''}>
    <table class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_CATEGORY_ID}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_CATEGORY_NAME}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_CATEGORY_LOGO}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_CATEGORY_CREATED}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_CATEGORY_SUBMITTER}></th>
                <th class="center width5"><{$smarty.const._AM_TESTMODULEUPDATE_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $categories_count|default:''}>
        <tbody>
            <{foreach item=category from=$categories_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$category.id}></td>
                <td class='center'><{$category.name}></td>
                <td class='center'><img src="<{$testmoduleupdate_upload_url|default:false}>/images/categories/<{$category.logo}>" alt="categories" style="max-width:100px" ></td>
                <td class='center'><{$category.created}></td>
                <td class='center'><{$category.submitter}></td>
                <td class="center  width5">
                    <a href="categories.php?op=edit&amp;cat_id=<{$category.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}> categories" ></a>
                    <a href="categories.php?op=clone&amp;cat_id_source=<{$category.id}>" title="<{$smarty.const._CLONE}>"><img src="<{xoModuleIcons16 editcopy.png}>" alt="<{$smarty.const._CLONE}> categories" ></a>
                    <a href="categories.php?op=delete&amp;cat_id=<{$category.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}> categories" ></a>
                </td>
            </tr>
            <{/foreach}>
        </tbody>
        <{/if}>
    </table>
    <div class="clear">&nbsp;</div>
    <{if $pagenav|default:''}>
        <div class="xo-pagenav floatright"><{$pagenav|default:false}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{/if}>
<{if $form|default:''}>
    <{$form|default:false}>
<{/if}>
<{if $error|default:''}>
    <div class="errorMsg"><strong><{$error|default:false}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:testmoduleupdate_admin_footer.tpl' }>
