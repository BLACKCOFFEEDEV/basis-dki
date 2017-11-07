<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">&nbsp;</li>

            <?php
            foreach ($items as $item) :
            $attribute = explode("/", substr($item->link, 0));
            ?>
            <li class="treeview <?php echo selected($attribute[0]) ?>">
                <?php if(is_parent($item->id) > 0) : ?>
                <a href="#">
                    <i class="fa <?php echo $item->icon ?>"></i> <span><?php echo $item->label ?></span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php
                    foreach (get_child($item->id) as $child):
                    $attribute2 = explode("/", substr($child->link, 0));
                    ?>
                    <li class="<?php echo selected($attribute2[0]) ?>"><a href="<?php echo base_url($child->link) ?>"><i class="fa <?php echo $child->icon ?>"></i> <?php echo $child->label ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php else: ?>
            <li class="<?php echo selected($attribute[0]) ?>"><a href="<?php echo base_url($item->link) ?>"><i class="fa <?php echo $item->icon ?>"></i> <span><?php echo $item->label ?></span></a></li>
            <?php endif; ?>
            <?php endforeach; ?>

        </ul>
    </section>
</aside>

