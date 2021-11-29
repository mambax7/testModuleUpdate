<table class='table table-<{$table_type|default:false}>'>
    <thead>
        <tr class='head'>
            <th>&nbsp;</th>
            <th class='center'><{$smarty.const._MB_TESTMODULEUPDATE_ART_CAT}></th>
            <th class='center'><{$smarty.const._MB_TESTMODULEUPDATE_ART_TITLE}></th>
            <th class='center'><{$smarty.const._MB_TESTMODULEUPDATE_ART_DESCR}></th>
            <th class='center'><{$smarty.const._MB_TESTMODULEUPDATE_ART_IMG}></th>
            <th class='center'><{$smarty.const._MB_TESTMODULEUPDATE_ART_FILE}></th>
            <th class='center'><{$smarty.const._MB_TESTMODULEUPDATE_ART_CREATED}></th>
            <th class='center'><{$smarty.const._MB_TESTMODULEUPDATE_ART_SUBMITTER}></th>
        </tr>
    </thead>
    <{if count($block)}>
    <tbody>
        <{foreach item=article from=$block}>
        <tr class='<{cycle values="odd, even"}>'>
            <td class='center'><{$article.id}></td>
            <td class='center'><{$article.cat}></td>
            <td class='center'><{$article.title}></td>
            <td class='center'><{$article.descr}></td>
            <td class='center'><img src="<{$testmoduleupdate_upload_url|default:false}>/images/articles/<{$article.img}>" alt="articles" ></td>
            <td class='center'><{$article.file}></td>
            <td class='center'><{$article.created}></td>
            <td class='center'><{$article.submitter}></td>
            <td class='center'><a href='articles.php?op=show&amp;art_id=<{$article.id}>' title='<{$smarty.const._MB_TESTMODULEUPDATE_ARTICLE_GOTO}>'><{$smarty.const._MB_TESTMODULEUPDATE_ARTICLE_GOTO}></a></td>
        </tr>
        <{/foreach}>
    </tbody>
    <{/if}>
    <tfoot><tr><td>&nbsp;</td></tr></tfoot>
</table>
