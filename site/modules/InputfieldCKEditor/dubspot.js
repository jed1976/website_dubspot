/**
 * dubspot.js - for ProcessWire CKEditor "Custom Editor Styles Set" option
 * 
 * Example file for "Custom Editor Styles Set" as seen in your CKEditor field config.
 * This file is not in use unless you specify it for that configuration item.
 * 
 * PLEASE NOTE: 
 * 
 * It's possible this file may be out of date since it is in /site/ rather than /wire/,
 * and the version of this file will reflect whatever version you had when you first
 * installed this copy of ProcessWire. 
 * 
 * If you intend to use this, you may first want to get the newest copy out of: 
 * /wire/modules/Inputfield/InputfieldCKEditor/dubspot.js
 *
 * For a more comprehensive example, see: 
 * /wire/modules/Inputfield/InputfieldCKEditor/ckeditor-[version]/styles.js
 * 
 */

CKEDITOR.stylesSet.add('dubspot', [
  { name: 'List Item', element: 'li', attributes: { 'class': 'lh-copy' } },
  { name: 'Paragraph', element: 'p', attributes: { 'class': 'lh-copy measure' } },
  { name: 'Heading 1', element: 'h1', attributes: { 'class': 'b f1 lh-title' } },
  { name: 'Heading 2', element: 'h2', attributes: { 'class': 'b f2 lh-copy' } },
  { name: 'Heading 3', element: 'h3', attributes: { 'class': 'b f3 lh-copy' } },
  { name: 'Heading 4', element: 'h4', attributes: { 'class': 'b f4 lh-copy' } },
  { name: 'Heading 5', element: 'h5', attributes: { 'class': 'b f5 lh-copy' } },
  { name: 'Heading 6', element: 'h6', attributes: { 'class': 'b f6 lh-copy' } }
]);

