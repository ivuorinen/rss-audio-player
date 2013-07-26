
<div class="row">
    <div class="large-12 columns">
        <div class="panel">

            <h2>Our known feeds</h2>
            <ul class="inline-list feeds-list">

<?php

foreach ($this->feeds as $key => $url) {
    $title = $this->getFeedTitle($key);
    echo "\t\t\t\t" . $this->lst(
        $this->lnk(
            $this->baseurl . '/show/' . $key, // Our link
            $title
        )
    ). "\n";
}

?>

            </ul>
        </div>
    </div>
</div>