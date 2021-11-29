<small>
    <{if $rating_5stars}>
        <div class="testmoduleupdate_ratingblock">
            <div id="unit_long<{$item.id}>">
                <div id="unit_ul<{$item.id}>" class="testmoduleupdate_unit-rating">
                    <div class="testmoduleupdate_current-rating" style="width:<{$item.rating.size}>;"><{$item.rating.text}></div>
                    <div>
                        <a class="testmoduleupdate_r1-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=1&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING1}>" rel="nofollow">1</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r2-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=2&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING2}>" rel="nofollow">2</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r3-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=3&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING3}>" rel="nofollow">3</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r4-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=4&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING4}>" rel="nofollow">4</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r5-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=5&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING5}>" rel="nofollow">5</a>
                    </div>
                </div>
                <div>
                    <{$item.rating.text}>
                </div>
            </div>
        </div>
    <{/if}>
    <{if $rating_10stars}>
        <div class="testmoduleupdate_ratingblock">
            <div id="unit_long<{$item.id}>">
                <div id="unit_ul<{$item.id}>" class="testmoduleupdate_unit-rating-10">
                    <div class="testmoduleupdate_current-rating" style="width:<{$item.rating.size}>;"><{$item.rating.text}></div>
                    <div>
                        <a class="testmoduleupdate_r1-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=1&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_10_1}>" rel="nofollow">1</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r2-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=2&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_10_2}>" rel="nofollow">2</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r3-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=3&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_10_3}>" rel="nofollow">3</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r4-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=4&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_10_4}>" rel="nofollow">4</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r5-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=5&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_10_5}>" rel="nofollow">5</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r6-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=6&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_10_6}>" rel="nofollow">6</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r7-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=7&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_10_7}>" rel="nofollow">7</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r8-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=8&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_10_8}>" rel="nofollow">8</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r9-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=9&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_10_9}>" rel="nofollow">9</a>
                    </div>
                    <div>
                        <a class="testmoduleupdate_r10-unit rater" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=10&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_10_10}>" rel="nofollow">10</a>
                    </div>
                </div>
                <div>
                    <{$item.rating.text}>
                </div>
            </div>
        </div>
    <{/if}>
<{if $rating_10num}>
        <div class="testmoduleupdate_ratingblock">
            <div id="unit_long<{$item.id}>">
                <div id="unit_ul<{$item.id}>" class="testmoduleupdate_unit-rating-10numeric">
                    <a class="testmoduleupdate-rater-numeric <{if $item.rating.avg_rate_value >=1}>testmoduleupdate-rater-numeric-active<{/if}>" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=1&amp;source=1" rel="nofollow">1</a>
                    <a class="testmoduleupdate-rater-numeric <{if $item.rating.avg_rate_value >=2}>testmoduleupdate-rater-numeric-active<{/if}>" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=2&amp;source=1" rel="nofollow">2</a>
                    <a class="testmoduleupdate-rater-numeric <{if $item.rating.avg_rate_value >=3}>testmoduleupdate-rater-numeric-active<{/if}>" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=3&amp;source=1" rel="nofollow">3</a>
                    <a class="testmoduleupdate-rater-numeric <{if $item.rating.avg_rate_value >=4}>testmoduleupdate-rater-numeric-active<{/if}>" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=4&amp;source=1" rel="nofollow">4</a>
                    <a class="testmoduleupdate-rater-numeric <{if $item.rating.avg_rate_value >=5}>testmoduleupdate-rater-numeric-active<{/if}>" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=5&amp;source=1" rel="nofollow">5</a>
                    <a class="testmoduleupdate-rater-numeric <{if $item.rating.avg_rate_value >=6}>testmoduleupdate-rater-numeric-active<{/if}>" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=6&amp;source=1" rel="nofollow">6</a>
                    <a class="testmoduleupdate-rater-numeric <{if $item.rating.avg_rate_value >=7}>testmoduleupdate-rater-numeric-active<{/if}>" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=7&amp;source=1" rel="nofollow">7</a>
                    <a class="testmoduleupdate-rater-numeric <{if $item.rating.avg_rate_value >=8}>testmoduleupdate-rater-numeric-active<{/if}>" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=8&amp;source=1" rel="nofollow">8</a>
                    <a class="testmoduleupdate-rater-numeric <{if $item.rating.avg_rate_value >=9}>testmoduleupdate-rater-numeric-active<{/if}>" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=9&amp;source=1" rel="nofollow">9</a>
                    <a class="testmoduleupdate-rater-numeric <{if $item.rating.avg_rate_value >=10}>testmoduleupdate-rater-numeric-active<{/if}>" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=10&amp;source=1" rel="nofollow">10</a>
                </div>
                <div class='left'>
                    <{$item.rating.text}>
                </div>
            </div>
        </div>
    <{/if}>
    <{if $rating_likes}>
        <div class="testmoduleupdate_ratingblock">
            <a class="testmoduleupdate-rate-like" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=1&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_LIKE}>" rel="nofollow">
                <img class='testmoduleupdate-btn-icon' src='<{$testmoduleupdate_icon_url_16}>/like.png' alt='<{$smarty.const._MA_TESTMODULEUPDATE_RATING_LIKE}>' title='<{$smarty.const._MA_TESTMODULEUPDATE_RATING_LIKE}>'>(<{$item.rating.likes}>)</a>

            <a class="testmoduleupdate-rate-dislike" href="rate.php?op=save&amp;<{$itemid}>=<{$item.id}>&rating=-1&amp;source=1" title="<{$smarty.const._MA_TESTMODULEUPDATE_RATING_DISLIKE}>" rel="nofollow">
                <img class='testmoduleupdate-btn-icon' src='<{$testmoduleupdate_icon_url_16}>/dislike.png' alt='<{$smarty.const._MA_TESTMODULEUPDATE_RATING_DISLIKE}>' title='<{$smarty.const._MA_TESTMODULEUPDATE_RATING_DISLIKE}>'> (<{$item.rating.dislikes}>)</a>
        </div>
    <{/if}>
</small>