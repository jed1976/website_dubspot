<?php
namespace DS;

// HTML Elements

/**
 * The base element function.
 *
 * @param string  $tag          HTML tagname.
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 *
 * @return string Rendered HTML of the element.
 */

function element(string $tag = 'div', $attributes = [], $content = '')
{
  $attributes_f = '';
  $void_elements = [
    'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input',
    'link', 'meta', 'param', 'source', 'track', 'wbr'
  ];

  $closing_tag = in_array($tag, $void_elements) ? '' : "</{$tag}>";

  $args = func_get_args();

  if (is_string($args[1])) {
    $content = $args[1];
    $attributes = [];
  }

  if (is_array($attributes) == false) {
    trigger_error('Attributes must be an array.', E_USER_ERROR);
  }

  if (array_key_exists('class', $attributes) == false) {
    $attributes['class'] = '';
  }

  if (empty($attributes['class'])) {
    unset($attributes['class']);
  }

  if (array_key_exists('class', $attributes)) {
    $attributes['class'] = explode(' ', $attributes['class']);
    sort($attributes['class']);
    $attributes['class'] = implode(' ', $attributes['class']);
  }

  foreach ($attributes as $attribute => $value) {
    $attributes_f .= ' '.$attribute.'="'.trim($value).'"';
  }

  return trim("<{$tag}{$attributes_f}>{$content}{$closing_tag}");
};

/**
 * HTML anchor.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function a($attributes = [], $content = '')
{
  return element('a', $attributes, $content);
}

/**
 * HTML abbreviation.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function abbr($attributes = [], $content = '')
{
  return element('abbr', $attributes, $content);
}

/**
 * HTML address.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function address($attributes = [], $content = '')
{
  return element('address', $attributes, $content);
}

/**
 * HTML article.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function article($attributes = [], $content = '')
{
  return element('article', $attributes, $content);
}

/**
 * HTML aside.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function aside($attributes = [], $content = '')
{
  return element('aside', $attributes, $content);
}

/**
 * HTML audio.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function audio($attributes = [], $content = '')
{
  return element('audio', $attributes, $content);
}

/**
 * HTML b.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function b($attributes = [], $content = '')
{
  return element('b', $attributes, $content);
}

/**
 * HTML blockquote.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function blockquote($attributes = [], $content = '')
{
  return element('blockquote', $attributes, $content);
}

/**
 * HTML body.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function body($attributes = [], $content = '')
{
  return element('body', $attributes, $content);
}

/**
 * HTML br.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function br($attributes = [], $content = '')
{
  return element('br', $attributes, $content);
}

/**
 * HTML button.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function button($attributes = [], $content = '')
{
  return element('button', $attributes, $content);
}

/**
 * HTML canvas.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function canvas($attributes = [], $content = '')
{
  return element('canvas', $attributes, $content);
}

/**
 * HTML caption.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function caption($attributes = [], $content = '')
{
  return element('caption', $attributes, $content);
}

/**
 * HTML cite.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function cite($attributes = [], $content = '')
{
  return element('cite', $attributes, $content);
}

/**
 * HTML code.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function code($attributes = [], $content = '')
{
  return element('code', $attributes, $content);
}

/**
 * HTML Comment.
 *
 * @param   string  $comment  HTML Comment.
 * @return  string  HTML output.
 */
function comment(string $comment = '')
{
  return "<!-- {$comment} -->";
}

/**
 * HTML dd.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function dd($attributes = [], $content = '')
{
  return element('dd', $attributes, $content);
}

/**
 * HTML del.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function del($attributes = [], $content = '')
{
  return element('del', $attributes, $content);
}

/**
 * HTML div.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function div($attributes = [], $content = '')
{
  return element('div', $attributes, $content);
}

/**
 * HTML dl.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function dl($attributes = [], $content = '')
{
  return element('dl', $attributes, $content);
}

/**
 * Creates an HTML5 doctype.
 */
function doctype()
{
  return '<!DOCTYPE html>';
}

/**
 * HTML dt.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function dt($attributes = [], $content = '')
{
  return element('dt', $attributes, $content);
}

/**
 * HTML em.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function em($attributes = [], $content = '')
{
  return element('em', $attributes, $content);
}

/**
 * HTML fieldset.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function fieldset($attributes = [], $content = '')
{
  return element('fieldset', $attributes, $content);
}

/**
 * HTML figcaption.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function figcaption($attributes = [], $content = '')
{
  return element('figcaption', $attributes, $content);
}

/**
 * HTML figure.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function figure($attributes = [], $content = '')
{
  return element('figure', $attributes, $content);
}

/**
 * HTML footer.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function footer($attributes = [], $content = '')
{
  return element('footer', $attributes, $content);
}

/**
 * HTML form.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function form($attributes = [], $content = '')
{
  return element('form', $attributes, $content);
}

/**
 * HTML h1.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function h1($attributes = [], $content = '')
{
  return element('h1', $attributes, $content);
}

/**
 * HTML h2.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function h2($attributes = [], $content = '')
{
  return element('h2', $attributes, $content);
}

/**
 * HTML h3.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function h3($attributes = [], $content = '')
{
  return element('h3', $attributes, $content);
}

/**
 * HTML h4.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function h4($attributes = [], $content = '')
{
  return element('h4', $attributes, $content);
}

/**
 * HTML h5.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function h5($attributes = [], $content = '')
{
  return element('h5', $attributes, $content);
}

/**
 * HTML h6.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function h6($attributes = [], $content = '')
{
  return element('h6', $attributes, $content);
}

/**
 * HTML head.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function head($attributes = [], $content = '')
{
  return element('head', $attributes, $content);
}

/**
 * HTML header.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function header($attributes = [], $content = '')
{
  return element('header', $attributes, $content);
}

/**
 * HTML hr.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function hr($attributes = [], $content = '')
{
  return element('hr', $attributes, $content);
}

/**
 * HTML html.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function html($attributes = [], $content = '')
{
  return element('html', $attributes, $content);
}

/**
 * HTML i.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function i($attributes = [], $content = '')
{
  return element('i', $attributes, $content);
}

/**
 * HTML iframe.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function iframe($attributes = [], $content = '')
{
  return element('iframe', $attributes, $content);
}

/**
 * HTML img.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function img($attributes = [], $content = '')
{
  return element('img', $attributes, $content);
}

/**
 * HTML input.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function input($attributes = [], $content = '')
{
  return element('input', $attributes, $content);
}

/**
 * HTML ins.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function ins($attributes = [], $content = '')
{
  return element('ins', $attributes, $content);
}

/**
 * HTML label.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function label($attributes = [], $content = '')
{
  return element('label', $attributes, $content);
}

/**
 * HTML legend.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function legend($attributes = [], $content = '')
{
  return element('legend', $attributes, $content);
}

/**
 * HTML li.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function li($attributes = [], $content = '')
{
  return element('li', $attributes, $content);
}

/**
 * HTML link.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function link($attributes = [], $content = '')
{
  return element('link', $attributes, $content);
}

/**
 * HTML main.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function main($attributes = [], $content = '')
{
  return element('main', $attributes, $content);
}

/**
 * HTML mark.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function mark($attributes = [], $content = '')
{
  return element('mark', $attributes, $content);
}

/**
 * HTML meta.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function meta($attributes = [], $content = '')
{
  return element('meta', $attributes, $content);
}

/**
 * HTML nav.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function nav($attributes = [], $content = '')
{
  return element('nav', $attributes, $content);
}

/**
 * HTML noscript.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function noscript($attributes = [], $content = '')
{
  return element('noscript', $attributes, $content);
}

/**
 * HTML ol.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function ol($attributes = [], $content = '')
{
  return element('ol', $attributes, $content);
}

/**
 * HTML optgroup.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function optgroup($attributes = [], $content = '')
{
  return element('optgroup', $attributes, $content);
}

/**
 * HTML option.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function option($attributes = [], $content = '')
{
  return element('option', $attributes, $content);
}

/**
 * HTML p.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function p($attributes = [], $content = '')
{
  return element('p', $attributes, $content);
}

/**
 * HTML pre.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function pre($attributes = [], $content = '')
{
  return element('pre', $attributes, $content);
}

/**
 * HTML script.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function script($attributes = [], $content = '')
{
  return element('script', $attributes, $content);
}

/**
 * HTML section.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function section($attributes = [], $content = '')
{
  return element('section', $attributes, $content);
}

/**
 * HTML select.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function select($attributes = [], $content = '')
{
  return element('select', $attributes, $content);
}

/**
 * HTML small.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function small($attributes = [], $content = '')
{
  return element('small', $attributes, $content);
}

/**
 * HTML span.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function span($attributes = [], $content = '')
{
  return element('span', $attributes, $content);
}

/**
 * HTML strong.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function strong($attributes = [], $content = '')
{
  return element('strong', $attributes, $content);
}

/**
 * HTML style.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function style($attributes = [], $content = '')
{
  return element('style', $attributes, $content);
}

/**
 * HTML sub.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function sub($attributes = [], $content = '')
{
  return element('sub', $attributes, $content);
}

/**
 * HTML sup.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function sup($attributes = [], $content = '')
{
  return element('sup', $attributes, $content);
}

/**
 * HTML svg.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function svg($attributes = [], $content = '')
{
  return element('svg', $attributes, $content);
}

/**
 * HTML table.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function table($attributes = [], $content = '')
{
  return element('table', $attributes, $content);
}

/**
 * HTML tbody.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function tbody($attributes = [], $content = '')
{
  return element('tbody', $attributes, $content);
}

/**
 * HTML td.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function td($attributes = [], $content = '')
{
  return element('td', $attributes, $content);
}

/**
 * HTML textarea.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function textarea($attributes = [], $content = '')
{
  return element('textarea', $attributes, $content);
}

/**
 * HTML tfoot.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function tfoot($attributes = [], $content = '')
{
  return element('tfoot', $attributes, $content);
}

/**
 * HTML th.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function th($attributes = [], $content = '')
{
  return element('th', $attributes, $content);
}

/**
 * HTML thead.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function thead($attributes = [], $content = '')
{
  return element('thead', $attributes, $content);
}

/**
 * HTML time.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function h_time($attributes = [], $content = '')
{
  return element('time', $attributes, $content);
}

/**
 * HTML title.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function title($attributes = [], $content = '')
{
  return element('title', $attributes, $content);
}

/**
 * HTML ul.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function ul($attributes = [], $content = '')
{
  return element('ul', $attributes, $content);
}

/**
 * HTML video.
 *
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 */
function video($attributes = [], $content = '')
{
  return element('video', $attributes, $content);
}

// Utilities

/**
 * Returns a ProcessWire User object if found.
 *
 * @param  $email string  User email address.
 * @return array          \ProcessWire\User and token.
 */
function security_check()
{
  $pages    = \ProcessWire\wire('pages');
  $session  = \ProcessWire\wire('session');
  $users    = \ProcessWire\wire('users');

  // Variables
  $email        = $session->get('email');
  $ip           = $_SERVER['REMOTE_ADDR'];
  $redirect_url = $pages->get('name=signin')->url;
  $token_2      = $session->get('token_2');
  $u            = $users->get("email=$email, user_token_1='', user_token_1_expiration=-1, user_token_2=$token_2, user_ip=$ip");

  if ($u instanceof \ProcessWire\NullPage || $email === '' || $token_2 === '') {
    $session->redirect($redirect_url);
  }
}

/**
 * Returns an image path from a selector.
 *
 * @param $selector string
 * @return mixed
 */
function image_path($selector = '')
{
  return \ProcessWire\wire('pages')->get('template=image, '.$selector)->image->url;
}

/**
 * Returns a Hex Color for the specified product.
 *
 * @param  $product   ProcessWire\Page Object
 * @return mixed
 */
function product_color(\ProcessWire\Page $product)
{
  #if ($product->color != 'transparent') return $product->color;
  #if ($product->disciplines->first->color != 'transparent') return $product->disciplines->first->color;
  return DS_YELLOW;
}

/**
 * Sends an email using WireMail.
 *
 * @param   $to_address     string
 * @param   $from_address   string
 * @param   $from_title     string
 * @param   $subject        string
 * @param   $body           string
 * @return  mixed
 */
function send_email($to_address = '', $from_address = '', $from_title = '', $subject = '', $body = '')
{
  $logo_src = \ProcessWire\wire('config')->httpHost.\ProcessWire\wire('urls')->templates."images/dubspot-circle-logo.png";
  $html = <<<EOD
<!DOCTYPE html>
<html>
  <body>
    <table border="0" width="100%">
      <tr>
        <td cellpadding="10" center valign="top">
          <img alt="Dubspot Logo" height="96" src="http://$logo_src" width="96">
        </td>
      </tr>
      <tr>
        <td valign="top">
          $body
        </td>
      </tr>
    </table>
  </body>
</html>
EOD;

  $mail = \ProcessWire\wire('mail')->new();
  $mail->to($to_address)
    ->from($from_address, $from_title)
    ->subject($subject)
    ->body(\ProcessWire\wire('sanitizer')->markupToText($body))
    ->bodyHTML($html)
    ->send();
}

/**
 * Returns inline SVG content from a file path.
 *
 * @param $path string
 * @return mixed
 */
function svg_image($path = '')
{
    return file_get_contents(\ProcessWire\wire('config')->paths->templates.$path);
}

/**
 * Returns inline SVG content from a selector.
 *
 * @param $selector string
 * @return mixed
 */
function svg_image_selector($selector = '')
{
    return file_get_contents(
      \ProcessWire\wire('config')->paths->root.
      \ProcessWire\wire('pages')->get('template=image, '.$selector)->image->url
    );
}
