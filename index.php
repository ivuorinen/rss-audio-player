<?php
/**
 * MIT License
 * ===========
 *
 * Copyright (c) 2012 Ismo Vuorinen <ivuorinen@me.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
 * CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category   Default
 * @package    ivuorinen\RSS_Audio_Player
 * @author     Ismo Vuorinen <ivuorinen@me.com>
 * @copyright  2012 Ismo Vuorinen.
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 * @version    1.0
 * @link       http://github.com/ivuorinen/rss-audio-player
 */

require_once 'vendor/simplepie/simplepie/autoloader.php';
require_once 'inc/rss-audio-player.php';

$page = (empty($_GET['page'])) ? 'list' : $_GET['page'];
$feed = (empty($_GET['feed'])) ? '5by5master' : $_GET['feed'];

$rap  = new \ivuorinen\RSSAudioPlayer();

$rap->buildPage($page, $feed);
