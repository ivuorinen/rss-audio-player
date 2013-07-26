<?php
/**
* RSS Audio Player class
*/
namespace ivuorinen;

class RSSAudioPlayer
{
    public $basepath;
    public $baseurl;
    public $feeds;
    public $feedslist;
    public $templatepath;

    protected $version;
    protected $build;

    public function __construct($config = null)
    {
        $this->version = "1.0";
        $this->build   = "20130725";

        self::setDefaults();
        self::setConfig($config);
    }

    public function translateFeed($feed = null)
    {
        $data = $this->feedslist;
        if (is_readable($data)) {
            $data = json_decode(file_get_contents($data));
            $this->feeds = $data;
        } else {
            return $this->feed_url;
        }

        return $this->feeds->$feed;
    }

    public function buildPage($page = 'list', $feed = null)
    {
        // Set our template path to shorthand
        $tpl = $this->templatepath;
        require_once $tpl . '/header.php';

        $feed = $this->translateFeed($feed);

        $simplepie = new \SimplePie();
        $simplepie->set_feed_url($feed);
        $simplepie->init();
        $simplepie->handle_content_type();

        $data['this'] = $this;

        switch ($page) {
            case 'show':
                $data['feed'] = $simplepie;
                break;
            case 'list':
            default:
                $data['feeds'] = $this->feedslist;
                break;
        }

        if (is_readable($tpl . DIRECTORY_SEPARATOR . $page . '.php')) {
            require_once $tpl . DIRECTORY_SEPARATOR . $page . '.php';
        }

        require_once $tpl . '/footer.php';
        return true;
    }

    public function getFeedTitle($feed = null)
    {
        if (empty($feed)) {
            return 'Feed "'.$feed.'" not known.';
        } else {
            $feed = $this->translateFeed($feed);

            $simplepie = new \SimplePie();
            $simplepie->set_feed_url($feed);
            $simplepie->init();
            $simplepie->handle_content_type();

            return $simplepie->get_title();
        }
        return false;
    }

    public function lnk($link = null, $text = '')
    {
        return '<a href="' . $link . '">' . $text . '</a>';
    }

    public function lst($text = null)
    {
        return '<li>' . $text . '</li>';
    }

    public function currentDir()
    {
        $path = dirname($_SERVER["PHP_SELF"]);
        $position = strrpos($path, '/') + 1;
        return '/' . substr($path, $position);
    }

    public function setDefaults()
    {
        $path                 = pathinfo(__FILE__);
        $this->basepath       = dirname($path['dirname']) . DIRECTORY_SEPARATOR;
        $this->cache_location = $this->basepath . 'cache';
        $this->feed_url       = 'http://feeds.5by5.tv/master';
        $this->useragent      = 'RSSAudioPlayer/'. $this->version
                                .' (Feed Parser; http://github.com/ivuorinen/rss-audio-player; '
                                .'Allow like Gecko) Build/'. $this->build;
        $this->templatepath   = $this->basepath . 'templates';
        $this->feedslist      = $this->basepath . 'feeds.json';
        $this->baseurl        = $this->currentDir();
    }

    public function setConfig($config = null)
    {
        if (empty($config)) {
            return false;
        }

        foreach ($config as $key => $value) {
            $this->$key = $value;
        }

        return true;
    }
}
