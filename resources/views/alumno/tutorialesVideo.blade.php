<div class="infomacion">
    <div class="tutorialesVideo">
        <?php
            if (isset($continue)) {
                ?>
                    <x-video :continue="$continue"/>
                <?php
            } else {
                ?>
                    <x-video continue=""/>
                <?php
            }
        ?>
    </div>
</div>