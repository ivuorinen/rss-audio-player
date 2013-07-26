

<div class="row">
    <div class="large-12 columns">
        <div class="panel">

            <h2><a title="<?php
                echo $data['feed']->get_link();
            ?>" href="<?php
                echo $data['feed']->get_link();
            ?>" target="_blank"><?php
                echo $data['feed']->get_title();
            ?></a></h2>
            <header>
                <p><?php echo $data['feed']->get_description(); ?></p>
            </header>

<?php
    $items = $data['feed']->get_items();

if (! empty($items)) {

    echo '<audio></audio>'."\n";
    echo '<ol>' . "\n";

    foreach ($items as $item) {

        if (($enclosure = $item->get_enclosure())) {
            $link = $enclosure->get_link();
        } else {
            $link = null;
        }

        echo "\t\t\t\t<li>"
        . '<a href="'. $item->get_permalink() .'" '
        . ' data-src="'. $link .'"'
        . '>'
        . $item->get_title()
        . '</a>'
        ."</li>\n";
    }

    echo '</ol>' . "\n";
}
?>
        </div>
    </div>
</div>