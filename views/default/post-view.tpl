<div class="single">
    <div class="container">
        <div class="col-md-12 single-main">
            <div class="post-name">
                <h3><?php echo $post['title'];?></h3>
            </div>
            <br />
            <div class="single-grid">
                <p><?php echo nl2br($post['text']);?></p>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-6">
                <div class="content-form">
                    <ul class="comment-list">
                        <h5 class="post-author_head">Автор: <a href="#" title="Posts by admin" rel="author"><?php echo $post['author'];?></a></h5>
                        <h5 class="post-datetime">Опубликовано: <?php echo $post['datetime'];?></h5>
                        <div class="clearfix"></div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="content-form">
                    <ul class="networks-share">
                        <h5 class="post-author_head">Поделиться записью:</h5>
                        <!--<h5 class="post-datetime">Posted: 18:05, 02.02.2017</h5>-->

                        <div data-mobile-view="false" data-share-size="20" data-like-text-enable="false" data-background-alpha="0.0" data-pid="1739701" data-mode="share" data-background-color="#ffffff" data-share-shape="rectangle" data-share-counter-size="12" data-icon-color="#ffffff" data-mobile-sn-ids="fb.vk.tw.ok.wh.vb.tm." data-text-color="#000000" data-buttons-color="#FFFFFF" data-counter-background-color="#ffffff" data-share-counter-type="disable" data-orientation="horizontal" data-following-enable="false" data-sn-ids="fb.vk.tw.ok.tm.em.ln." data-preview-mobile="false" data-selection-enable="false" data-exclude-show-more="true" data-share-style="1" data-counter-background-alpha="1.0" data-top-button="false" class="uptolike-buttons" ></div>
                        <div class="clearfix"></div>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-md-6">
                <div class="content-form">
                    <div class="page-header">
                        <h2><small class="pull-right">Комментариев: <?php echo $comments_length;?></small> Обсуждение </h2>
                    </div>
                    <div id="post-comments-list" class="comments-list">
                        <?php
                            foreach($comments as $item){
                        ?>
                            <div id="comment-id<?php echo $item['id'];?>" class="media">
                                <p class="pull-right"><small><?php echo $item['datetime'];?></small></p>
                                <div class="media-body">
                                    <h4 class="media-heading user_name"><?php echo $item['author'];?></h4>
                                    <p><?php echo nl2br($item['text']);?></p>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="content-form">
                    <h2>Комментировать</h2>
                    <form id="comment-add-to-post">
                        <input id="new-comment-author" type="text" placeholder="Имя" required/>
                        <textarea id="new-comment-text" placeholder="Сообщение"></textarea>
                        <input class="comment-submit" type="submit" value="ДОБАВИТЬ"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>