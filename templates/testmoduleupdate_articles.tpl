<{include file='db:testmoduleupdate_header.tpl' }>

<{if $articlesCount|default:0 > 0}>
<div class='table-responsive'>
    <table class='table table-<{$table_type|default:false}>'>
        <thead>
            <tr class='head'>
                <th colspan='<{$divideby|default:false}>'><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLES_TITLE}></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <{foreach item=article from=$articles name=article}>
                <td>
                    <div class='panel panel-<{$panel_type|default:false}>'>
                        <{include file='db:testmoduleupdate_articles_item.tpl' }>
                    </div>
                </td>
                <{if $smarty.foreach.article.iteration is div by $divideby}>
                    </tr><tr>
                <{/if}>
                <{/foreach}>
            </tr>
        </tbody>
        <tfoot><tr><td>&nbsp;</td></tr></tfoot>
    </table>
</div>
<{/if}>
<{if $form|default:''}>
    <{$form|default:false}>
<{/if}>
<{if $error|default:''}>
    <{$error|default:false}>
<{/if}>

<{include file='db:testmoduleupdate_footer.tpl' }>
