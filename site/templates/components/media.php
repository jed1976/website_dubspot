<?php
/**
 * A Media element lets you embed many types of content hosted on a
 * third-party site (such as YouTube, SoundCloud, Spotify, etc.) via its URL.
 *
 * Note: This depends on the PHP Essence library for its functionality.
 * See: https://github.com/essence/essence
 *
 * The following providers are currently supported:
 *
 * 23hq                Deviantart          Kickstarter         Sketchfab
 * Animoto             Dipity              Meetup              SlideShare
 * Aol                 Dotsub              Mixcloud            SoundCloud
 * App.net             Edocr               Mobypicture         SpeakerDeck
 * Bambuser            Flickr              Nfb                 Spotify
 * Bandcamp            FunnyOrDie          Official.fm         Ted
 * Blip.tv             Gist                Polldaddy           Twitter
 * Cacoo               Gmep                PollEverywhere      Ustream
 * CanalPlus           HowCast             Prezi               Vhx
 * Chirb.it            Huffduffer          Qik                 Viddler
 * CircuitLab          Hulu                Rdio                Videojug
 * Clikthrough         Ifixit              Revision3           Vimeo
 * CollegeHumor        Ifttt               Roomshare           Vine
 * Coub                Imgur               Sapo                Wistia
 * CrowdRanking        Instagram           Screenr             WordPress
 * DailyMile           Jest                Scribd              Yfrog
 * Dailymotion         Justin.tv           Shoudio             Youtube
 *
 * @param string  $url          Video URL.
 * @param array   $attributes   HTML attributes.
 *
 * @return string Rendered HTML of the component.
 */

$media = function(string $url, array $attributes = []) use ($element)
{
  $Essence = new Essence\Essence();
  $media = $Essence->extract($url, ['maxwidth'  => 1024]);

  if ($media) {
    return $media->html;
  }
};