// ==UserScript==
// @name           First
// @namespace      http://www.formconstant.net/
// @description    A first GreaseMonkey script
// @include        *
// @exclude        http://www.google.com/*
// @require        http://formconstant.net/ajax/mootools-1.2-core.js
// @require        http://formconstant.net/ajax/mootools-1.2-more.js
// ==/UserScript==

// make the links biggers
$$('a').setStyle('font-size', 24);