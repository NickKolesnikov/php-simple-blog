<div class="content">
    <div class="container">
        <div class="col-md-8 content-main">

            <?php
            if (!count($rsPosts)) {
                echo "<h3 class='no-posts-label'>Нет записей</h3>";
            }
            ?>

            <!--- Carousel ---->
            <div class="carousel-index-top">
                <?php
                    if (count($rsPostsTop)) {
                ?>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                            $counter = 0; //для первого слайда добавляем класс active
                            foreach ($rsPostsTop as $item) {
                                $counter++;
                                if ($counter == 1) {
                                    $active = ' active';
                                } else {
                                    $active = '';
                                }
                        ?>
                        <div class="item <?php echo $active;?>">
                            <img src="<?php echo $templateWebPath;?>images/slider-background.jpg">
                            <div class="carousel-caption">
                                <h3><?php echo $item['title'];?></h3>
                                <p><?php echo $item['text'];?></p>
                                <div class="carousel-caption-bottom1">
                                    <a>Автор: <?php echo $item['author'];?></a><br />
                                    <a>Комментариев: <?php echo $item['comments_count'];?></a><br />
                                </div>
                                <div class="carousel-caption-bottom2">
                                    <a>Добавлен: <?php echo $item['datetime'];?></a><br />
                                    <a class="carousel-caption-goto" href="?controller=post&action=view&id=<?php echo $item['id'];?>">Читать полностью</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>

                    <!--- Left and right controls for carousel ---->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="carousel-control-push"><</span>
                        <span class="sr-only">Назад</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="carousel-control-push">></span>
                        <span class="sr-only">Далее</span>
                    </a>
                    <!--- //Left and right controls for carousel ---->

                </div>
                <?php
                    }
                ?>
            </div>
            <!--- //Carousel ---->
        </div>



        <!--- Recent comments ---->
        <div class="col-md-4 content-right ">
            <div class="comments recent-comments">
                <h3>ПОСЛЕДНИЕ КОММЕНТАРИИ</h3>
                <ul>
                    <?php
                        foreach ($rsLastComments as $item) {
                    ?>
                        <li><a class="comment" href="?controller=post&action=view&id=<?php echo $item['post_id'];?>#comment-id<?php echo $item['id'];?>"><?php echo $item['author'];?> : <?php echo $item['text'];?></a></li>
                    <?php
                        }
                        if (!count($rsLastComments)) {
                            echo "<a>Нет комментариев</a>";
                        }
                     ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--- //Recent comments ---->

        <!--- Posts ---->
        <div class="content-grids">
            <div class="col-md-8 content-main">
                <div class="content-grid">
                    <?php
                        if (count($rsPosts)) {
                            foreach ($rsPosts as $item) {
                    ?>
                        <div class="content-grid-info">
                            <div class="post-info">
                                <h4><a href="?controller=post&action=view&id=<?php echo $item['id'];?>"><?php echo $item['title'];?></a>  <?php echo $item['datetime'];?> / Комментариев: <?php echo $item['comments_count'];?></h4>
                                <p><?php echo $item['text'];?></p>
                                <a href="?controller=post&action=view&id=<?php echo $item['id'];?>"><span></span>ЧИТАТЬ ДАЛЕЕ</a>
                            </div>
                        </div>
                    <?php
                            }
                        }
                     ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--- //Posts ---->

    </div>
</div>

