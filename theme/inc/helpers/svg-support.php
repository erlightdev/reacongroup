<?php
/**
 * SVG Support and Helper Functions
 *
 * This file handles SVG upload support, admin display fixes, and provides
 * helper functions for inline SVG rendering with Tailwind CSS support.
 *
 * Notes on security:
 * SVG is an XML format and can contain active content (e.g. <script> tags or
 * event handler attributes). This theme enables SVG uploads, but also includes
 * a lightweight sanitization step for inline rendering.
 *
 * @package reacon-group
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * PHP 7.4-compatible "starts with" helper.
 *
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
function reacon_group_string_starts_with($haystack, $needle)
{
	if ($needle === '') {
		return true;
	}

	return substr($haystack, 0, strlen($needle)) === $needle;
}

/**
 * Allow SVG uploads by WordPress.
 *
 * @param array<string,string> $mimes Existing mime types.
 * @return array<string,string>
 */
function reacon_group_svg_upload_mimes($mimes)
{
	if (!current_user_can('upload_files')) {
		return $mimes;
	}

	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'reacon_group_svg_upload_mimes');

/**
 * Fix MIME type detection for SVG.
 *
 * @param array<string,mixed> $data wp_check_filetype_and_ext output.
 * @param mixed                $file Temporary file path.
 * @param string               $filename Full file name.
 * @param array<string,string> $mimes Allowed mime types.
 * @return array<string,mixed>
 */
function reacon_group_svg_check_filetype_and_ext($data, $file, $filename, $mimes)
{
	// If WP already identified the type, keep it.
	if (!empty($data['type'])) {
		return $data;
	}

	$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
	if ('svg' !== $extension) {
		return $data;
	}

	$data['ext']  = 'svg';
	$data['type'] = 'image/svg+xml';
	return $data;
}
add_filter('wp_check_filetype_and_ext', 'reacon_group_svg_check_filetype_and_ext', 10, 4);

/**
 * Ensure SVG attachments are displayed correctly in the Media Library grid/list.
 *
 * @param array<string,mixed> $response Attachment prepared data for JS.
 * @param WP_Post              $attachment Attachment post.
 * @param array<string,mixed> $meta Attachment meta.
 * @return array<string,mixed>
 */
function reacon_group_svg_prepare_attachment_for_js($response, $attachment, $meta)
{
	if (empty($response['mime']) || 'image/svg+xml' !== $response['mime']) {
		return $response;
	}

	$url = wp_get_attachment_url($attachment->ID);
	if (!$url) {
		return $response;
	}

	// SVGs don't generate intermediate sizes, so we provide a "full" size.
	$width  = !empty($meta['width']) ? (int) $meta['width'] : 0;
	$height = !empty($meta['height']) ? (int) $meta['height'] : 0;
	$response['sizes'] = array(
		'full' => array(
			'url' => $url,
			'width' => $width,
			'height' => $height,
		),
	);
	$response['url']  = $url;

	return $response;
}
add_filter('wp_prepare_attachment_for_js', 'reacon_group_svg_prepare_attachment_for_js', 10, 3);

/**
 * Inline-render an SVG file (or attachment) as markup.
 *
 * Tailwind-friendly behavior:
 * - Adds your `$class` string to the root `<svg>` element.
 * - Optionally sets `fill="currentColor"` and `stroke="currentColor"` so
 *   Tailwind `text-*` utilities can drive icon color.
 *
 * @param string|int $svg Path to an SVG file (relative to theme root or absolute), or an attachment ID.
 * @param string      $class Root SVG class(es).
 * @param array<string,mixed> $args Options:
 *  - 'sanitize' (bool) Default true. Removes <script> and inline event handlers.
 *  - 'remove_width_height' (bool) Default true.
 *  - 'use_current_color' (bool) Default true.
 *  - 'aria_hidden' (bool) Default true.
 * @return string Inline SVG markup, or empty string on failure.
 */
function reacon_group_inline_svg($svg, $class = '', $args = array())
{
	$args = wp_parse_args(
		$args,
		array(
			'sanitize' => true,
			'remove_width_height' => true,
			'use_current_color' => true,
			'aria_hidden' => true,
		)
	);

	$path = '';

	// Attachment ID.
	if (is_numeric($svg)) {
		$attachment_id = (int) $svg;
		$path = get_attached_file($attachment_id);
	} elseif (is_string($svg)) {
		$maybe_absolute = $svg;
		if (
			reacon_group_string_starts_with($maybe_absolute, 'http://') ||
			reacon_group_string_starts_with($maybe_absolute, 'https://')
		) {
			// We intentionally disallow remote fetching for security and performance.
			return '';
		}

		if (reacon_group_string_starts_with($maybe_absolute, '/')) {
			$path = $maybe_absolute;
		} else {
			$path = trailingslashit(get_template_directory()) . ltrim($maybe_absolute, '/');
		}
	}

	if (!$path || !is_readable($path)) {
		return '';
	}

	$svg_contents = file_get_contents($path);
	if ($svg_contents === false) {
		return '';
	}

	$dom = new DOMDocument();
	libxml_use_internal_errors(true);

	$loaded = $dom->loadXML($svg_contents, LIBXML_NOERROR | LIBXML_NOWARNING);
	libxml_clear_errors();

	if (!$loaded) {
		return '';
	}

	$root = $dom->getElementsByTagName('svg')->item(0);
	if (!$root) {
		return '';
	}
	if (!($root instanceof DOMElement)) {
		return '';
	}

	if (!empty($args['remove_width_height'])) {
		// Icons often come with baked-in sizing; let CSS/Tailwind handle sizing.
		if ($root->hasAttribute('width')) {
			$root->removeAttribute('width');
		}
		if ($root->hasAttribute('height')) {
			$root->removeAttribute('height');
		}
	}

	// Tailwind class support: put classes on the root <svg>.
	$existing_class = $root->getAttribute('class');
	$root_class_parts = array();
	if (!empty($existing_class)) {
		$root_class_parts[] = trim($existing_class);
	}
	if (!empty($class)) {
		$root_class_parts[] = trim($class);
	}
	$root_class = trim(implode(' ', array_filter($root_class_parts)));
	if ($root_class !== '') {
		$root->setAttribute('class', $root_class);
	}

	if (!empty($args['use_current_color'])) {
		// Drives fill/stroke color from CSS `color` via Tailwind `text-*` utilities.
		$root->setAttribute('fill', 'currentColor');
		$root->setAttribute('stroke', 'currentColor');
	}

	if (!empty($args['aria_hidden'])) {
		$root->setAttribute('aria-hidden', 'true');
	}

	$root->setAttribute('focusable', 'false');
	$root->setAttribute('role', 'presentation');

	if (!empty($args['sanitize'])) {
		reacon_group_svg_sanitize_dom($dom);
	}

	// saveXML($root) includes only the root node markup.
	return $dom->saveXML($root);
}

/**
 * Lightweight inline SVG sanitization.
 *
 * @param DOMDocument $dom Parsed SVG DOM.
 * @return void
 */
function reacon_group_svg_sanitize_dom($dom)
{
	$xpath = new DOMXPath($dom);

	// Remove scripts.
	foreach ($xpath->query('//script') as $script) {
		if ($script && $script->parentNode) {
			$script->parentNode->removeChild($script);
		}
	}

	// Remove event handler attributes and javascript: URLs.
	foreach ($xpath->query('//*') as $node) {
		if (!$node || !($node instanceof DOMElement) || !$node->attributes) {
			continue;
		}

		$to_remove = array();
		for ($i = 0; $i < $node->attributes->length; $i++) {
			$attr = $node->attributes->item($i);
			if (!$attr) {
				continue;
			}

			$attr_name = strtolower($attr->nodeName);
			$attr_value = (string) $attr->nodeValue;

			if (reacon_group_string_starts_with($attr_name, 'on')) {
				$to_remove[] = $attr->nodeName;
				continue;
			}

			if (in_array($attr_name, array('href', 'xlink:href'), true)) {
				if (stripos($attr_value, 'javascript:') === 0) {
					$to_remove[] = $attr->nodeName;
				}
			}
		}

		foreach ($to_remove as $attr_name) {
			if ($node->hasAttribute($attr_name)) {
				$node->removeAttribute($attr_name);
			}
		}
	}
}

