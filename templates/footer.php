
    <footer id="bottom" class="row">
        <div class="large-12 columns">
            <hr />
            <div class="row">
                <div class="large-3 columns">
                    <p>RSSAudioPlayer <?php echo $this->version; ?></p>
                </div>
                <div class="large-7 columns">
                    <ul class="inline-list right">
                        <li>Components used in making this</li>
                        <li><a href="http://foundation.zurb.com">ZURB's Foundation Framework</a></li>
                        <li><a href="http://simplepie.org">SimplePIE</a></li>
                        <li><a href="http://kolber.github.io/audiojs/">audio.js</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?php echo $this->baseurl; ?>/assets/audiojs/audio.min.js"></script>
    <script>
    document.write(
        '<script src=//cdnjs.cloudflare.com/ajax/libs'
        + '/foundation/4.1.6/js/vendor/'
        + ('__proto__' in {} ? 'zepto' : 'jquery')
        + '.js><\/script>'
    );
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.1.6/js/foundation.min.js"></script>
    <script src="<?php echo $this->baseurl; ?>/assets/scripts.js"></script>

</body>
</html>