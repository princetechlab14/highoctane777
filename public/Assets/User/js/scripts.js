/*! jQuery v3.3.1 | (c) JS Foundation and other contributors | jquery.org/license */
!function(e,t){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=e.document?t(e,!0):function(e){if(!e.document)throw new Error("jQuery requires a window with a document");return t(e)}:t(e)}("undefined"!=typeof window?window:this,function(e,t){"use strict";var n=[],r=e.document,i=Object.getPrototypeOf,o=n.slice,a=n.concat,s=n.push,u=n.indexOf,l={},c=l.toString,f=l.hasOwnProperty,p=f.toString,d=p.call(Object),h={},g=function e(t){return"function"==typeof t&&"number"!=typeof t.nodeType},y=function e(t){return null!=t&&t===t.window},v={type:!0,src:!0,noModule:!0};function m(e,t,n){var i,o=(t=t||r).createElement("script");if(o.text=e,n)for(i in v)n[i]&&(o[i]=n[i]);t.head.appendChild(o).parentNode.removeChild(o)}function x(e){return null==e?e+"":"object"==typeof e||"function"==typeof e?l[c.call(e)]||"object":typeof e}var b="3.3.1",w=function(e,t){return new w.fn.init(e,t)},T=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;w.fn=w.prototype={jquery:"3.3.1",constructor:w,length:0,toArray:function(){return o.call(this)},get:function(e){return null==e?o.call(this):e<0?this[e+this.length]:this[e]},pushStack:function(e){var t=w.merge(this.constructor(),e);return t.prevObject=this,t},each:function(e){return w.each(this,e)},map:function(e){return this.pushStack(w.map(this,function(t,n){return e.call(t,n,t)}))},slice:function(){return this.pushStack(o.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(e){var t=this.length,n=+e+(e<0?t:0);return this.pushStack(n>=0&&n<t?[this[n]]:[])},end:function(){return this.prevObject||this.constructor()},push:s,sort:n.sort,splice:n.splice},w.extend=w.fn.extend=function(){var e,t,n,r,i,o,a=arguments[0]||{},s=1,u=arguments.length,l=!1;for("boolean"==typeof a&&(l=a,a=arguments[s]||{},s++),"object"==typeof a||g(a)||(a={}),s===u&&(a=this,s--);s<u;s++)if(null!=(e=arguments[s]))for(t in e)n=a[t],a!==(r=e[t])&&(l&&r&&(w.isPlainObject(r)||(i=Array.isArray(r)))?(i?(i=!1,o=n&&Array.isArray(n)?n:[]):o=n&&w.isPlainObject(n)?n:{},a[t]=w.extend(l,o,r)):void 0!==r&&(a[t]=r));return a},w.extend({expando:"jQuery"+("3.3.1"+Math.random()).replace(/\D/g,""),isReady:!0,error:function(e){throw new Error(e)},noop:function(){},isPlainObject:function(e){var t,n;return!(!e||"[object Object]"!==c.call(e))&&(!(t=i(e))||"function"==typeof(n=f.call(t,"constructor")&&t.constructor)&&p.call(n)===d)},isEmptyObject:function(e){var t;for(t in e)return!1;return!0},globalEval:function(e){m(e)},each:function(e,t){var n,r=0;if(C(e)){for(n=e.length;r<n;r++)if(!1===t.call(e[r],r,e[r]))break}else for(r in e)if(!1===t.call(e[r],r,e[r]))break;return e},trim:function(e){return null==e?"":(e+"").replace(T,"")},makeArray:function(e,t){var n=t||[];return null!=e&&(C(Object(e))?w.merge(n,"string"==typeof e?[e]:e):s.call(n,e)),n},inArray:function(e,t,n){return null==t?-1:u.call(t,e,n)},merge:function(e,t){for(var n=+t.length,r=0,i=e.length;r<n;r++)e[i++]=t[r];return e.length=i,e},grep:function(e,t,n){for(var r,i=[],o=0,a=e.length,s=!n;o<a;o++)(r=!t(e[o],o))!==s&&i.push(e[o]);return i},map:function(e,t,n){var r,i,o=0,s=[];if(C(e))for(r=e.length;o<r;o++)null!=(i=t(e[o],o,n))&&s.push(i);else for(o in e)null!=(i=t(e[o],o,n))&&s.push(i);return a.apply([],s)},guid:1,support:h}),"function"==typeof Symbol&&(w.fn[Symbol.iterator]=n[Symbol.iterator]),w.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(e,t){l["[object "+t+"]"]=t.toLowerCase()});function C(e){var t=!!e&&"length"in e&&e.length,n=x(e);return!g(e)&&!y(e)&&("array"===n||0===t||"number"==typeof t&&t>0&&t-1 in e)}var E=function(e){var t,n,r,i,o,a,s,u,l,c,f,p,d,h,g,y,v,m,x,b="sizzle"+1*new Date,w=e.document,T=0,C=0,E=ae(),k=ae(),S=ae(),D=function(e,t){return e===t&&(f=!0),0},N={}.hasOwnProperty,A=[],j=A.pop,q=A.push,L=A.push,H=A.slice,O=function(e,t){for(var n=0,r=e.length;n<r;n++)if(e[n]===t)return n;return-1},P="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",M="[\\x20\\t\\r\\n\\f]",R="(?:\\\\.|[\\w-]|[^\0-\\xa0])+",I="\\["+M+"*("+R+")(?:"+M+"*([*^$|!~]?=)"+M+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+R+"))|)"+M+"*\\]",W=":("+R+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+I+")*)|.*)\\)|)",$=new RegExp(M+"+","g"),B=new RegExp("^"+M+"+|((?:^|[^\\\\])(?:\\\\.)*)"+M+"+$","g"),F=new RegExp("^"+M+"*,"+M+"*"),_=new RegExp("^"+M+"*([>+~]|"+M+")"+M+"*"),z=new RegExp("="+M+"*([^\\]'\"]*?)"+M+"*\\]","g"),X=new RegExp(W),U=new RegExp("^"+R+"$"),V={ID:new RegExp("^#("+R+")"),CLASS:new RegExp("^\\.("+R+")"),TAG:new RegExp("^("+R+"|[*])"),ATTR:new RegExp("^"+I),PSEUDO:new RegExp("^"+W),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+M+"*(even|odd|(([+-]|)(\\d*)n|)"+M+"*(?:([+-]|)"+M+"*(\\d+)|))"+M+"*\\)|)","i"),bool:new RegExp("^(?:"+P+")$","i"),needsContext:new RegExp("^"+M+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+M+"*((?:-\\d)?\\d*)"+M+"*\\)|)(?=[^-]|$)","i")},G=/^(?:input|select|textarea|button)$/i,Y=/^h\d$/i,Q=/^[^{]+\{\s*\[native \w/,J=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,K=/[+~]/,Z=new RegExp("\\\\([\\da-f]{1,6}"+M+"?|("+M+")|.)","ig"),ee=function(e,t,n){var r="0x"+t-65536;return r!==r||n?t:r<0?String.fromCharCode(r+65536):String.fromCharCode(r>>10|55296,1023&r|56320)},te=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,ne=function(e,t){return t?"\0"===e?"\ufffd":e.slice(0,-1)+"\\"+e.charCodeAt(e.length-1).toString(16)+" ":"\\"+e},re=function(){p()},ie=me(function(e){return!0===e.disabled&&("form"in e||"label"in e)},{dir:"parentNode",next:"legend"});try{L.apply(A=H.call(w.childNodes),w.childNodes),A[w.childNodes.length].nodeType}catch(e){L={apply:A.length?function(e,t){q.apply(e,H.call(t))}:function(e,t){var n=e.length,r=0;while(e[n++]=t[r++]);e.length=n-1}}}function oe(e,t,r,i){var o,s,l,c,f,h,v,m=t&&t.ownerDocument,T=t?t.nodeType:9;if(r=r||[],"string"!=typeof e||!e||1!==T&&9!==T&&11!==T)return r;if(!i&&((t?t.ownerDocument||t:w)!==d&&p(t),t=t||d,g)){if(11!==T&&(f=J.exec(e)))if(o=f[1]){if(9===T){if(!(l=t.getElementById(o)))return r;if(l.id===o)return r.push(l),r}else if(m&&(l=m.getElementById(o))&&x(t,l)&&l.id===o)return r.push(l),r}else{if(f[2])return L.apply(r,t.getElementsByTagName(e)),r;if((o=f[3])&&n.getElementsByClassName&&t.getElementsByClassName)return L.apply(r,t.getElementsByClassName(o)),r}if(n.qsa&&!S[e+" "]&&(!y||!y.test(e))){if(1!==T)m=t,v=e;else if("object"!==t.nodeName.toLowerCase()){(c=t.getAttribute("id"))?c=c.replace(te,ne):t.setAttribute("id",c=b),s=(h=a(e)).length;while(s--)h[s]="#"+c+" "+ve(h[s]);v=h.join(","),m=K.test(e)&&ge(t.parentNode)||t}if(v)try{return L.apply(r,m.querySelectorAll(v)),r}catch(e){}finally{c===b&&t.removeAttribute("id")}}}return u(e.replace(B,"$1"),t,r,i)}function ae(){var e=[];function t(n,i){return e.push(n+" ")>r.cacheLength&&delete t[e.shift()],t[n+" "]=i}return t}function se(e){return e[b]=!0,e}function ue(e){var t=d.createElement("fieldset");try{return!!e(t)}catch(e){return!1}finally{t.parentNode&&t.parentNode.removeChild(t),t=null}}function le(e,t){var n=e.split("|"),i=n.length;while(i--)r.attrHandle[n[i]]=t}function ce(e,t){var n=t&&e,r=n&&1===e.nodeType&&1===t.nodeType&&e.sourceIndex-t.sourceIndex;if(r)return r;if(n)while(n=n.nextSibling)if(n===t)return-1;return e?1:-1}function fe(e){return function(t){return"input"===t.nodeName.toLowerCase()&&t.type===e}}function pe(e){return function(t){var n=t.nodeName.toLowerCase();return("input"===n||"button"===n)&&t.type===e}}function de(e){return function(t){return"form"in t?t.parentNode&&!1===t.disabled?"label"in t?"label"in t.parentNode?t.parentNode.disabled===e:t.disabled===e:t.isDisabled===e||t.isDisabled!==!e&&ie(t)===e:t.disabled===e:"label"in t&&t.disabled===e}}function he(e){return se(function(t){return t=+t,se(function(n,r){var i,o=e([],n.length,t),a=o.length;while(a--)n[i=o[a]]&&(n[i]=!(r[i]=n[i]))})})}function ge(e){return e&&"undefined"!=typeof e.getElementsByTagName&&e}n=oe.support={},o=oe.isXML=function(e){var t=e&&(e.ownerDocument||e).documentElement;return!!t&&"HTML"!==t.nodeName},p=oe.setDocument=function(e){var t,i,a=e?e.ownerDocument||e:w;return a!==d&&9===a.nodeType&&a.documentElement?(d=a,h=d.documentElement,g=!o(d),w!==d&&(i=d.defaultView)&&i.top!==i&&(i.addEventListener?i.addEventListener("unload",re,!1):i.attachEvent&&i.attachEvent("onunload",re)),n.attributes=ue(function(e){return e.className="i",!e.getAttribute("className")}),n.getElementsByTagName=ue(function(e){return e.appendChild(d.createComment("")),!e.getElementsByTagName("*").length}),n.getElementsByClassName=Q.test(d.getElementsByClassName),n.getById=ue(function(e){return h.appendChild(e).id=b,!d.getElementsByName||!d.getElementsByName(b).length}),n.getById?(r.filter.ID=function(e){var t=e.replace(Z,ee);return function(e){return e.getAttribute("id")===t}},r.find.ID=function(e,t){if("undefined"!=typeof t.getElementById&&g){var n=t.getElementById(e);return n?[n]:[]}}):(r.filter.ID=function(e){var t=e.replace(Z,ee);return function(e){var n="undefined"!=typeof e.getAttributeNode&&e.getAttributeNode("id");return n&&n.value===t}},r.find.ID=function(e,t){if("undefined"!=typeof t.getElementById&&g){var n,r,i,o=t.getElementById(e);if(o){if((n=o.getAttributeNode("id"))&&n.value===e)return[o];i=t.getElementsByName(e),r=0;while(o=i[r++])if((n=o.getAttributeNode("id"))&&n.value===e)return[o]}return[]}}),r.find.TAG=n.getElementsByTagName?function(e,t){return"undefined"!=typeof t.getElementsByTagName?t.getElementsByTagName(e):n.qsa?t.querySelectorAll(e):void 0}:function(e,t){var n,r=[],i=0,o=t.getElementsByTagName(e);if("*"===e){while(n=o[i++])1===n.nodeType&&r.push(n);return r}return o},r.find.CLASS=n.getElementsByClassName&&function(e,t){if("undefined"!=typeof t.getElementsByClassName&&g)return t.getElementsByClassName(e)},v=[],y=[],(n.qsa=Q.test(d.querySelectorAll))&&(ue(function(e){h.appendChild(e).innerHTML="<a id='"+b+"'></a><select id='"+b+"-\r\\' msallowcapture=''><option selected=''></option></select>",e.querySelectorAll("[msallowcapture^='']").length&&y.push("[*^$]="+M+"*(?:''|\"\")"),e.querySelectorAll("[selected]").length||y.push("\\["+M+"*(?:value|"+P+")"),e.querySelectorAll("[id~="+b+"-]").length||y.push("~="),e.querySelectorAll(":checked").length||y.push(":checked"),e.querySelectorAll("a#"+b+"+*").length||y.push(".#.+[+~]")}),ue(function(e){e.innerHTML="<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";var t=d.createElement("input");t.setAttribute("type","hidden"),e.appendChild(t).setAttribute("name","D"),e.querySelectorAll("[name=d]").length&&y.push("name"+M+"*[*^$|!~]?="),2!==e.querySelectorAll(":enabled").length&&y.push(":enabled",":disabled"),h.appendChild(e).disabled=!0,2!==e.querySelectorAll(":disabled").length&&y.push(":enabled",":disabled"),e.querySelectorAll("*,:x"),y.push(",.*:")})),(n.matchesSelector=Q.test(m=h.matches||h.webkitMatchesSelector||h.mozMatchesSelector||h.oMatchesSelector||h.msMatchesSelector))&&ue(function(e){n.disconnectedMatch=m.call(e,"*"),m.call(e,"[s!='']:x"),v.push("!=",W)}),y=y.length&&new RegExp(y.join("|")),v=v.length&&new RegExp(v.join("|")),t=Q.test(h.compareDocumentPosition),x=t||Q.test(h.contains)?function(e,t){var n=9===e.nodeType?e.documentElement:e,r=t&&t.parentNode;return e===r||!(!r||1!==r.nodeType||!(n.contains?n.contains(r):e.compareDocumentPosition&&16&e.compareDocumentPosition(r)))}:function(e,t){if(t)while(t=t.parentNode)if(t===e)return!0;return!1},D=t?function(e,t){if(e===t)return f=!0,0;var r=!e.compareDocumentPosition-!t.compareDocumentPosition;return r||(1&(r=(e.ownerDocument||e)===(t.ownerDocument||t)?e.compareDocumentPosition(t):1)||!n.sortDetached&&t.compareDocumentPosition(e)===r?e===d||e.ownerDocument===w&&x(w,e)?-1:t===d||t.ownerDocument===w&&x(w,t)?1:c?O(c,e)-O(c,t):0:4&r?-1:1)}:function(e,t){if(e===t)return f=!0,0;var n,r=0,i=e.parentNode,o=t.parentNode,a=[e],s=[t];if(!i||!o)return e===d?-1:t===d?1:i?-1:o?1:c?O(c,e)-O(c,t):0;if(i===o)return ce(e,t);n=e;while(n=n.parentNode)a.unshift(n);n=t;while(n=n.parentNode)s.unshift(n);while(a[r]===s[r])r++;return r?ce(a[r],s[r]):a[r]===w?-1:s[r]===w?1:0},d):d},oe.matches=function(e,t){return oe(e,null,null,t)},oe.matchesSelector=function(e,t){if((e.ownerDocument||e)!==d&&p(e),t=t.replace(z,"='$1']"),n.matchesSelector&&g&&!S[t+" "]&&(!v||!v.test(t))&&(!y||!y.test(t)))try{var r=m.call(e,t);if(r||n.disconnectedMatch||e.document&&11!==e.document.nodeType)return r}catch(e){}return oe(t,d,null,[e]).length>0},oe.contains=function(e,t){return(e.ownerDocument||e)!==d&&p(e),x(e,t)},oe.attr=function(e,t){(e.ownerDocument||e)!==d&&p(e);var i=r.attrHandle[t.toLowerCase()],o=i&&N.call(r.attrHandle,t.toLowerCase())?i(e,t,!g):void 0;return void 0!==o?o:n.attributes||!g?e.getAttribute(t):(o=e.getAttributeNode(t))&&o.specified?o.value:null},oe.escape=function(e){return(e+"").replace(te,ne)},oe.error=function(e){throw new Error("Syntax error, unrecognized expression: "+e)},oe.uniqueSort=function(e){var t,r=[],i=0,o=0;if(f=!n.detectDuplicates,c=!n.sortStable&&e.slice(0),e.sort(D),f){while(t=e[o++])t===e[o]&&(i=r.push(o));while(i--)e.splice(r[i],1)}return c=null,e},i=oe.getText=function(e){var t,n="",r=0,o=e.nodeType;if(o){if(1===o||9===o||11===o){if("string"==typeof e.textContent)return e.textContent;for(e=e.firstChild;e;e=e.nextSibling)n+=i(e)}else if(3===o||4===o)return e.nodeValue}else while(t=e[r++])n+=i(t);return n},(r=oe.selectors={cacheLength:50,createPseudo:se,match:V,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(e){return e[1]=e[1].replace(Z,ee),e[3]=(e[3]||e[4]||e[5]||"").replace(Z,ee),"~="===e[2]&&(e[3]=" "+e[3]+" "),e.slice(0,4)},CHILD:function(e){return e[1]=e[1].toLowerCase(),"nth"===e[1].slice(0,3)?(e[3]||oe.error(e[0]),e[4]=+(e[4]?e[5]+(e[6]||1):2*("even"===e[3]||"odd"===e[3])),e[5]=+(e[7]+e[8]||"odd"===e[3])):e[3]&&oe.error(e[0]),e},PSEUDO:function(e){var t,n=!e[6]&&e[2];return V.CHILD.test(e[0])?null:(e[3]?e[2]=e[4]||e[5]||"":n&&X.test(n)&&(t=a(n,!0))&&(t=n.indexOf(")",n.length-t)-n.length)&&(e[0]=e[0].slice(0,t),e[2]=n.slice(0,t)),e.slice(0,3))}},filter:{TAG:function(e){var t=e.replace(Z,ee).toLowerCase();return"*"===e?function(){return!0}:function(e){return e.nodeName&&e.nodeName.toLowerCase()===t}},CLASS:function(e){var t=E[e+" "];return t||(t=new RegExp("(^|"+M+")"+e+"("+M+"|$)"))&&E(e,function(e){return t.test("string"==typeof e.className&&e.className||"undefined"!=typeof e.getAttribute&&e.getAttribute("class")||"")})},ATTR:function(e,t,n){return function(r){var i=oe.attr(r,e);return null==i?"!="===t:!t||(i+="","="===t?i===n:"!="===t?i!==n:"^="===t?n&&0===i.indexOf(n):"*="===t?n&&i.indexOf(n)>-1:"$="===t?n&&i.slice(-n.length)===n:"~="===t?(" "+i.replace($," ")+" ").indexOf(n)>-1:"|="===t&&(i===n||i.slice(0,n.length+1)===n+"-"))}},CHILD:function(e,t,n,r,i){var o="nth"!==e.slice(0,3),a="last"!==e.slice(-4),s="of-type"===t;return 1===r&&0===i?function(e){return!!e.parentNode}:function(t,n,u){var l,c,f,p,d,h,g=o!==a?"nextSibling":"previousSibling",y=t.parentNode,v=s&&t.nodeName.toLowerCase(),m=!u&&!s,x=!1;if(y){if(o){while(g){p=t;while(p=p[g])if(s?p.nodeName.toLowerCase()===v:1===p.nodeType)return!1;h=g="only"===e&&!h&&"nextSibling"}return!0}if(h=[a?y.firstChild:y.lastChild],a&&m){x=(d=(l=(c=(f=(p=y)[b]||(p[b]={}))[p.uniqueID]||(f[p.uniqueID]={}))[e]||[])[0]===T&&l[1])&&l[2],p=d&&y.childNodes[d];while(p=++d&&p&&p[g]||(x=d=0)||h.pop())if(1===p.nodeType&&++x&&p===t){c[e]=[T,d,x];break}}else if(m&&(x=d=(l=(c=(f=(p=t)[b]||(p[b]={}))[p.uniqueID]||(f[p.uniqueID]={}))[e]||[])[0]===T&&l[1]),!1===x)while(p=++d&&p&&p[g]||(x=d=0)||h.pop())if((s?p.nodeName.toLowerCase()===v:1===p.nodeType)&&++x&&(m&&((c=(f=p[b]||(p[b]={}))[p.uniqueID]||(f[p.uniqueID]={}))[e]=[T,x]),p===t))break;return(x-=i)===r||x%r==0&&x/r>=0}}},PSEUDO:function(e,t){var n,i=r.pseudos[e]||r.setFilters[e.toLowerCase()]||oe.error("unsupported pseudo: "+e);return i[b]?i(t):i.length>1?(n=[e,e,"",t],r.setFilters.hasOwnProperty(e.toLowerCase())?se(function(e,n){var r,o=i(e,t),a=o.length;while(a--)e[r=O(e,o[a])]=!(n[r]=o[a])}):function(e){return i(e,0,n)}):i}},pseudos:{not:se(function(e){var t=[],n=[],r=s(e.replace(B,"$1"));return r[b]?se(function(e,t,n,i){var o,a=r(e,null,i,[]),s=e.length;while(s--)(o=a[s])&&(e[s]=!(t[s]=o))}):function(e,i,o){return t[0]=e,r(t,null,o,n),t[0]=null,!n.pop()}}),has:se(function(e){return function(t){return oe(e,t).length>0}}),contains:se(function(e){return e=e.replace(Z,ee),function(t){return(t.textContent||t.innerText||i(t)).indexOf(e)>-1}}),lang:se(function(e){return U.test(e||"")||oe.error("unsupported lang: "+e),e=e.replace(Z,ee).toLowerCase(),function(t){var n;do{if(n=g?t.lang:t.getAttribute("xml:lang")||t.getAttribute("lang"))return(n=n.toLowerCase())===e||0===n.indexOf(e+"-")}while((t=t.parentNode)&&1===t.nodeType);return!1}}),target:function(t){var n=e.location&&e.location.hash;return n&&n.slice(1)===t.id},root:function(e){return e===h},focus:function(e){return e===d.activeElement&&(!d.hasFocus||d.hasFocus())&&!!(e.type||e.href||~e.tabIndex)},enabled:de(!1),disabled:de(!0),checked:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&!!e.checked||"option"===t&&!!e.selected},selected:function(e){return e.parentNode&&e.parentNode.selectedIndex,!0===e.selected},empty:function(e){for(e=e.firstChild;e;e=e.nextSibling)if(e.nodeType<6)return!1;return!0},parent:function(e){return!r.pseudos.empty(e)},header:function(e){return Y.test(e.nodeName)},input:function(e){return G.test(e.nodeName)},button:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&"button"===e.type||"button"===t},text:function(e){var t;return"input"===e.nodeName.toLowerCase()&&"text"===e.type&&(null==(t=e.getAttribute("type"))||"text"===t.toLowerCase())},first:he(function(){return[0]}),last:he(function(e,t){return[t-1]}),eq:he(function(e,t,n){return[n<0?n+t:n]}),even:he(function(e,t){for(var n=0;n<t;n+=2)e.push(n);return e}),odd:he(function(e,t){for(var n=1;n<t;n+=2)e.push(n);return e}),lt:he(function(e,t,n){for(var r=n<0?n+t:n;--r>=0;)e.push(r);return e}),gt:he(function(e,t,n){for(var r=n<0?n+t:n;++r<t;)e.push(r);return e})}}).pseudos.nth=r.pseudos.eq;for(t in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})r.pseudos[t]=fe(t);for(t in{submit:!0,reset:!0})r.pseudos[t]=pe(t);function ye(){}ye.prototype=r.filters=r.pseudos,r.setFilters=new ye,a=oe.tokenize=function(e,t){var n,i,o,a,s,u,l,c=k[e+" "];if(c)return t?0:c.slice(0);s=e,u=[],l=r.preFilter;while(s){n&&!(i=F.exec(s))||(i&&(s=s.slice(i[0].length)||s),u.push(o=[])),n=!1,(i=_.exec(s))&&(n=i.shift(),o.push({value:n,type:i[0].replace(B," ")}),s=s.slice(n.length));for(a in r.filter)!(i=V[a].exec(s))||l[a]&&!(i=l[a](i))||(n=i.shift(),o.push({value:n,type:a,matches:i}),s=s.slice(n.length));if(!n)break}return t?s.length:s?oe.error(e):k(e,u).slice(0)};function ve(e){for(var t=0,n=e.length,r="";t<n;t++)r+=e[t].value;return r}function me(e,t,n){var r=t.dir,i=t.next,o=i||r,a=n&&"parentNode"===o,s=C++;return t.first?function(t,n,i){while(t=t[r])if(1===t.nodeType||a)return e(t,n,i);return!1}:function(t,n,u){var l,c,f,p=[T,s];if(u){while(t=t[r])if((1===t.nodeType||a)&&e(t,n,u))return!0}else while(t=t[r])if(1===t.nodeType||a)if(f=t[b]||(t[b]={}),c=f[t.uniqueID]||(f[t.uniqueID]={}),i&&i===t.nodeName.toLowerCase())t=t[r]||t;else{if((l=c[o])&&l[0]===T&&l[1]===s)return p[2]=l[2];if(c[o]=p,p[2]=e(t,n,u))return!0}return!1}}function xe(e){return e.length>1?function(t,n,r){var i=e.length;while(i--)if(!e[i](t,n,r))return!1;return!0}:e[0]}function be(e,t,n){for(var r=0,i=t.length;r<i;r++)oe(e,t[r],n);return n}function we(e,t,n,r,i){for(var o,a=[],s=0,u=e.length,l=null!=t;s<u;s++)(o=e[s])&&(n&&!n(o,r,i)||(a.push(o),l&&t.push(s)));return a}function Te(e,t,n,r,i,o){return r&&!r[b]&&(r=Te(r)),i&&!i[b]&&(i=Te(i,o)),se(function(o,a,s,u){var l,c,f,p=[],d=[],h=a.length,g=o||be(t||"*",s.nodeType?[s]:s,[]),y=!e||!o&&t?g:we(g,p,e,s,u),v=n?i||(o?e:h||r)?[]:a:y;if(n&&n(y,v,s,u),r){l=we(v,d),r(l,[],s,u),c=l.length;while(c--)(f=l[c])&&(v[d[c]]=!(y[d[c]]=f))}if(o){if(i||e){if(i){l=[],c=v.length;while(c--)(f=v[c])&&l.push(y[c]=f);i(null,v=[],l,u)}c=v.length;while(c--)(f=v[c])&&(l=i?O(o,f):p[c])>-1&&(o[l]=!(a[l]=f))}}else v=we(v===a?v.splice(h,v.length):v),i?i(null,a,v,u):L.apply(a,v)})}function Ce(e){for(var t,n,i,o=e.length,a=r.relative[e[0].type],s=a||r.relative[" "],u=a?1:0,c=me(function(e){return e===t},s,!0),f=me(function(e){return O(t,e)>-1},s,!0),p=[function(e,n,r){var i=!a&&(r||n!==l)||((t=n).nodeType?c(e,n,r):f(e,n,r));return t=null,i}];u<o;u++)if(n=r.relative[e[u].type])p=[me(xe(p),n)];else{if((n=r.filter[e[u].type].apply(null,e[u].matches))[b]){for(i=++u;i<o;i++)if(r.relative[e[i].type])break;return Te(u>1&&xe(p),u>1&&ve(e.slice(0,u-1).concat({value:" "===e[u-2].type?"*":""})).replace(B,"$1"),n,u<i&&Ce(e.slice(u,i)),i<o&&Ce(e=e.slice(i)),i<o&&ve(e))}p.push(n)}return xe(p)}function Ee(e,t){var n=t.length>0,i=e.length>0,o=function(o,a,s,u,c){var f,h,y,v=0,m="0",x=o&&[],b=[],w=l,C=o||i&&r.find.TAG("*",c),E=T+=null==w?1:Math.random()||.1,k=C.length;for(c&&(l=a===d||a||c);m!==k&&null!=(f=C[m]);m++){if(i&&f){h=0,a||f.ownerDocument===d||(p(f),s=!g);while(y=e[h++])if(y(f,a||d,s)){u.push(f);break}c&&(T=E)}n&&((f=!y&&f)&&v--,o&&x.push(f))}if(v+=m,n&&m!==v){h=0;while(y=t[h++])y(x,b,a,s);if(o){if(v>0)while(m--)x[m]||b[m]||(b[m]=j.call(u));b=we(b)}L.apply(u,b),c&&!o&&b.length>0&&v+t.length>1&&oe.uniqueSort(u)}return c&&(T=E,l=w),x};return n?se(o):o}return s=oe.compile=function(e,t){var n,r=[],i=[],o=S[e+" "];if(!o){t||(t=a(e)),n=t.length;while(n--)(o=Ce(t[n]))[b]?r.push(o):i.push(o);(o=S(e,Ee(i,r))).selector=e}return o},u=oe.select=function(e,t,n,i){var o,u,l,c,f,p="function"==typeof e&&e,d=!i&&a(e=p.selector||e);if(n=n||[],1===d.length){if((u=d[0]=d[0].slice(0)).length>2&&"ID"===(l=u[0]).type&&9===t.nodeType&&g&&r.relative[u[1].type]){if(!(t=(r.find.ID(l.matches[0].replace(Z,ee),t)||[])[0]))return n;p&&(t=t.parentNode),e=e.slice(u.shift().value.length)}o=V.needsContext.test(e)?0:u.length;while(o--){if(l=u[o],r.relative[c=l.type])break;if((f=r.find[c])&&(i=f(l.matches[0].replace(Z,ee),K.test(u[0].type)&&ge(t.parentNode)||t))){if(u.splice(o,1),!(e=i.length&&ve(u)))return L.apply(n,i),n;break}}}return(p||s(e,d))(i,t,!g,n,!t||K.test(e)&&ge(t.parentNode)||t),n},n.sortStable=b.split("").sort(D).join("")===b,n.detectDuplicates=!!f,p(),n.sortDetached=ue(function(e){return 1&e.compareDocumentPosition(d.createElement("fieldset"))}),ue(function(e){return e.innerHTML="<a href='#'></a>","#"===e.firstChild.getAttribute("href")})||le("type|href|height|width",function(e,t,n){if(!n)return e.getAttribute(t,"type"===t.toLowerCase()?1:2)}),n.attributes&&ue(function(e){return e.innerHTML="<input/>",e.firstChild.setAttribute("value",""),""===e.firstChild.getAttribute("value")})||le("value",function(e,t,n){if(!n&&"input"===e.nodeName.toLowerCase())return e.defaultValue}),ue(function(e){return null==e.getAttribute("disabled")})||le(P,function(e,t,n){var r;if(!n)return!0===e[t]?t.toLowerCase():(r=e.getAttributeNode(t))&&r.specified?r.value:null}),oe}(e);w.find=E,w.expr=E.selectors,w.expr[":"]=w.expr.pseudos,w.uniqueSort=w.unique=E.uniqueSort,w.text=E.getText,w.isXMLDoc=E.isXML,w.contains=E.contains,w.escapeSelector=E.escape;var k=function(e,t,n){var r=[],i=void 0!==n;while((e=e[t])&&9!==e.nodeType)if(1===e.nodeType){if(i&&w(e).is(n))break;r.push(e)}return r},S=function(e,t){for(var n=[];e;e=e.nextSibling)1===e.nodeType&&e!==t&&n.push(e);return n},D=w.expr.match.needsContext;function N(e,t){return e.nodeName&&e.nodeName.toLowerCase()===t.toLowerCase()}var A=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;function j(e,t,n){return g(t)?w.grep(e,function(e,r){return!!t.call(e,r,e)!==n}):t.nodeType?w.grep(e,function(e){return e===t!==n}):"string"!=typeof t?w.grep(e,function(e){return u.call(t,e)>-1!==n}):w.filter(t,e,n)}w.filter=function(e,t,n){var r=t[0];return n&&(e=":not("+e+")"),1===t.length&&1===r.nodeType?w.find.matchesSelector(r,e)?[r]:[]:w.find.matches(e,w.grep(t,function(e){return 1===e.nodeType}))},w.fn.extend({find:function(e){var t,n,r=this.length,i=this;if("string"!=typeof e)return this.pushStack(w(e).filter(function(){for(t=0;t<r;t++)if(w.contains(i[t],this))return!0}));for(n=this.pushStack([]),t=0;t<r;t++)w.find(e,i[t],n);return r>1?w.uniqueSort(n):n},filter:function(e){return this.pushStack(j(this,e||[],!1))},not:function(e){return this.pushStack(j(this,e||[],!0))},is:function(e){return!!j(this,"string"==typeof e&&D.test(e)?w(e):e||[],!1).length}});var q,L=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;(w.fn.init=function(e,t,n){var i,o;if(!e)return this;if(n=n||q,"string"==typeof e){if(!(i="<"===e[0]&&">"===e[e.length-1]&&e.length>=3?[null,e,null]:L.exec(e))||!i[1]&&t)return!t||t.jquery?(t||n).find(e):this.constructor(t).find(e);if(i[1]){if(t=t instanceof w?t[0]:t,w.merge(this,w.parseHTML(i[1],t&&t.nodeType?t.ownerDocument||t:r,!0)),A.test(i[1])&&w.isPlainObject(t))for(i in t)g(this[i])?this[i](t[i]):this.attr(i,t[i]);return this}return(o=r.getElementById(i[2]))&&(this[0]=o,this.length=1),this}return e.nodeType?(this[0]=e,this.length=1,this):g(e)?void 0!==n.ready?n.ready(e):e(w):w.makeArray(e,this)}).prototype=w.fn,q=w(r);var H=/^(?:parents|prev(?:Until|All))/,O={children:!0,contents:!0,next:!0,prev:!0};w.fn.extend({has:function(e){var t=w(e,this),n=t.length;return this.filter(function(){for(var e=0;e<n;e++)if(w.contains(this,t[e]))return!0})},closest:function(e,t){var n,r=0,i=this.length,o=[],a="string"!=typeof e&&w(e);if(!D.test(e))for(;r<i;r++)for(n=this[r];n&&n!==t;n=n.parentNode)if(n.nodeType<11&&(a?a.index(n)>-1:1===n.nodeType&&w.find.matchesSelector(n,e))){o.push(n);break}return this.pushStack(o.length>1?w.uniqueSort(o):o)},index:function(e){return e?"string"==typeof e?u.call(w(e),this[0]):u.call(this,e.jquery?e[0]:e):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(e,t){return this.pushStack(w.uniqueSort(w.merge(this.get(),w(e,t))))},addBack:function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}});function P(e,t){while((e=e[t])&&1!==e.nodeType);return e}w.each({parent:function(e){var t=e.parentNode;return t&&11!==t.nodeType?t:null},parents:function(e){return k(e,"parentNode")},parentsUntil:function(e,t,n){return k(e,"parentNode",n)},next:function(e){return P(e,"nextSibling")},prev:function(e){return P(e,"previousSibling")},nextAll:function(e){return k(e,"nextSibling")},prevAll:function(e){return k(e,"previousSibling")},nextUntil:function(e,t,n){return k(e,"nextSibling",n)},prevUntil:function(e,t,n){return k(e,"previousSibling",n)},siblings:function(e){return S((e.parentNode||{}).firstChild,e)},children:function(e){return S(e.firstChild)},contents:function(e){return N(e,"iframe")?e.contentDocument:(N(e,"template")&&(e=e.content||e),w.merge([],e.childNodes))}},function(e,t){w.fn[e]=function(n,r){var i=w.map(this,t,n);return"Until"!==e.slice(-5)&&(r=n),r&&"string"==typeof r&&(i=w.filter(r,i)),this.length>1&&(O[e]||w.uniqueSort(i),H.test(e)&&i.reverse()),this.pushStack(i)}});var M=/[^\x20\t\r\n\f]+/g;function R(e){var t={};return w.each(e.match(M)||[],function(e,n){t[n]=!0}),t}w.Callbacks=function(e){e="string"==typeof e?R(e):w.extend({},e);var t,n,r,i,o=[],a=[],s=-1,u=function(){for(i=i||e.once,r=t=!0;a.length;s=-1){n=a.shift();while(++s<o.length)!1===o[s].apply(n[0],n[1])&&e.stopOnFalse&&(s=o.length,n=!1)}e.memory||(n=!1),t=!1,i&&(o=n?[]:"")},l={add:function(){return o&&(n&&!t&&(s=o.length-1,a.push(n)),function t(n){w.each(n,function(n,r){g(r)?e.unique&&l.has(r)||o.push(r):r&&r.length&&"string"!==x(r)&&t(r)})}(arguments),n&&!t&&u()),this},remove:function(){return w.each(arguments,function(e,t){var n;while((n=w.inArray(t,o,n))>-1)o.splice(n,1),n<=s&&s--}),this},has:function(e){return e?w.inArray(e,o)>-1:o.length>0},empty:function(){return o&&(o=[]),this},disable:function(){return i=a=[],o=n="",this},disabled:function(){return!o},lock:function(){return i=a=[],n||t||(o=n=""),this},locked:function(){return!!i},fireWith:function(e,n){return i||(n=[e,(n=n||[]).slice?n.slice():n],a.push(n),t||u()),this},fire:function(){return l.fireWith(this,arguments),this},fired:function(){return!!r}};return l};function I(e){return e}function W(e){throw e}function $(e,t,n,r){var i;try{e&&g(i=e.promise)?i.call(e).done(t).fail(n):e&&g(i=e.then)?i.call(e,t,n):t.apply(void 0,[e].slice(r))}catch(e){n.apply(void 0,[e])}}w.extend({Deferred:function(t){var n=[["notify","progress",w.Callbacks("memory"),w.Callbacks("memory"),2],["resolve","done",w.Callbacks("once memory"),w.Callbacks("once memory"),0,"resolved"],["reject","fail",w.Callbacks("once memory"),w.Callbacks("once memory"),1,"rejected"]],r="pending",i={state:function(){return r},always:function(){return o.done(arguments).fail(arguments),this},"catch":function(e){return i.then(null,e)},pipe:function(){var e=arguments;return w.Deferred(function(t){w.each(n,function(n,r){var i=g(e[r[4]])&&e[r[4]];o[r[1]](function(){var e=i&&i.apply(this,arguments);e&&g(e.promise)?e.promise().progress(t.notify).done(t.resolve).fail(t.reject):t[r[0]+"With"](this,i?[e]:arguments)})}),e=null}).promise()},then:function(t,r,i){var o=0;function a(t,n,r,i){return function(){var s=this,u=arguments,l=function(){var e,l;if(!(t<o)){if((e=r.apply(s,u))===n.promise())throw new TypeError("Thenable self-resolution");l=e&&("object"==typeof e||"function"==typeof e)&&e.then,g(l)?i?l.call(e,a(o,n,I,i),a(o,n,W,i)):(o++,l.call(e,a(o,n,I,i),a(o,n,W,i),a(o,n,I,n.notifyWith))):(r!==I&&(s=void 0,u=[e]),(i||n.resolveWith)(s,u))}},c=i?l:function(){try{l()}catch(e){w.Deferred.exceptionHook&&w.Deferred.exceptionHook(e,c.stackTrace),t+1>=o&&(r!==W&&(s=void 0,u=[e]),n.rejectWith(s,u))}};t?c():(w.Deferred.getStackHook&&(c.stackTrace=w.Deferred.getStackHook()),e.setTimeout(c))}}return w.Deferred(function(e){n[0][3].add(a(0,e,g(i)?i:I,e.notifyWith)),n[1][3].add(a(0,e,g(t)?t:I)),n[2][3].add(a(0,e,g(r)?r:W))}).promise()},promise:function(e){return null!=e?w.extend(e,i):i}},o={};return w.each(n,function(e,t){var a=t[2],s=t[5];i[t[1]]=a.add,s&&a.add(function(){r=s},n[3-e][2].disable,n[3-e][3].disable,n[0][2].lock,n[0][3].lock),a.add(t[3].fire),o[t[0]]=function(){return o[t[0]+"With"](this===o?void 0:this,arguments),this},o[t[0]+"With"]=a.fireWith}),i.promise(o),t&&t.call(o,o),o},when:function(e){var t=arguments.length,n=t,r=Array(n),i=o.call(arguments),a=w.Deferred(),s=function(e){return function(n){r[e]=this,i[e]=arguments.length>1?o.call(arguments):n,--t||a.resolveWith(r,i)}};if(t<=1&&($(e,a.done(s(n)).resolve,a.reject,!t),"pending"===a.state()||g(i[n]&&i[n].then)))return a.then();while(n--)$(i[n],s(n),a.reject);return a.promise()}});var B=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;w.Deferred.exceptionHook=function(t,n){e.console&&e.console.warn&&t&&B.test(t.name)&&e.console.warn("jQuery.Deferred exception: "+t.message,t.stack,n)},w.readyException=function(t){e.setTimeout(function(){throw t})};var F=w.Deferred();w.fn.ready=function(e){return F.then(e)["catch"](function(e){w.readyException(e)}),this},w.extend({isReady:!1,readyWait:1,ready:function(e){(!0===e?--w.readyWait:w.isReady)||(w.isReady=!0,!0!==e&&--w.readyWait>0||F.resolveWith(r,[w]))}}),w.ready.then=F.then;function _(){r.removeEventListener("DOMContentLoaded",_),e.removeEventListener("load",_),w.ready()}"complete"===r.readyState||"loading"!==r.readyState&&!r.documentElement.doScroll?e.setTimeout(w.ready):(r.addEventListener("DOMContentLoaded",_),e.addEventListener("load",_));var z=function(e,t,n,r,i,o,a){var s=0,u=e.length,l=null==n;if("object"===x(n)){i=!0;for(s in n)z(e,t,s,n[s],!0,o,a)}else if(void 0!==r&&(i=!0,g(r)||(a=!0),l&&(a?(t.call(e,r),t=null):(l=t,t=function(e,t,n){return l.call(w(e),n)})),t))for(;s<u;s++)t(e[s],n,a?r:r.call(e[s],s,t(e[s],n)));return i?e:l?t.call(e):u?t(e[0],n):o},X=/^-ms-/,U=/-([a-z])/g;function V(e,t){return t.toUpperCase()}function G(e){return e.replace(X,"ms-").replace(U,V)}var Y=function(e){return 1===e.nodeType||9===e.nodeType||!+e.nodeType};function Q(){this.expando=w.expando+Q.uid++}Q.uid=1,Q.prototype={cache:function(e){var t=e[this.expando];return t||(t={},Y(e)&&(e.nodeType?e[this.expando]=t:Object.defineProperty(e,this.expando,{value:t,configurable:!0}))),t},set:function(e,t,n){var r,i=this.cache(e);if("string"==typeof t)i[G(t)]=n;else for(r in t)i[G(r)]=t[r];return i},get:function(e,t){return void 0===t?this.cache(e):e[this.expando]&&e[this.expando][G(t)]},access:function(e,t,n){return void 0===t||t&&"string"==typeof t&&void 0===n?this.get(e,t):(this.set(e,t,n),void 0!==n?n:t)},remove:function(e,t){var n,r=e[this.expando];if(void 0!==r){if(void 0!==t){n=(t=Array.isArray(t)?t.map(G):(t=G(t))in r?[t]:t.match(M)||[]).length;while(n--)delete r[t[n]]}(void 0===t||w.isEmptyObject(r))&&(e.nodeType?e[this.expando]=void 0:delete e[this.expando])}},hasData:function(e){var t=e[this.expando];return void 0!==t&&!w.isEmptyObject(t)}};var J=new Q,K=new Q,Z=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,ee=/[A-Z]/g;function te(e){return"true"===e||"false"!==e&&("null"===e?null:e===+e+""?+e:Z.test(e)?JSON.parse(e):e)}function ne(e,t,n){var r;if(void 0===n&&1===e.nodeType)if(r="data-"+t.replace(ee,"-$&").toLowerCase(),"string"==typeof(n=e.getAttribute(r))){try{n=te(n)}catch(e){}K.set(e,t,n)}else n=void 0;return n}w.extend({hasData:function(e){return K.hasData(e)||J.hasData(e)},data:function(e,t,n){return K.access(e,t,n)},removeData:function(e,t){K.remove(e,t)},_data:function(e,t,n){return J.access(e,t,n)},_removeData:function(e,t){J.remove(e,t)}}),w.fn.extend({data:function(e,t){var n,r,i,o=this[0],a=o&&o.attributes;if(void 0===e){if(this.length&&(i=K.get(o),1===o.nodeType&&!J.get(o,"hasDataAttrs"))){n=a.length;while(n--)a[n]&&0===(r=a[n].name).indexOf("data-")&&(r=G(r.slice(5)),ne(o,r,i[r]));J.set(o,"hasDataAttrs",!0)}return i}return"object"==typeof e?this.each(function(){K.set(this,e)}):z(this,function(t){var n;if(o&&void 0===t){if(void 0!==(n=K.get(o,e)))return n;if(void 0!==(n=ne(o,e)))return n}else this.each(function(){K.set(this,e,t)})},null,t,arguments.length>1,null,!0)},removeData:function(e){return this.each(function(){K.remove(this,e)})}}),w.extend({queue:function(e,t,n){var r;if(e)return t=(t||"fx")+"queue",r=J.get(e,t),n&&(!r||Array.isArray(n)?r=J.access(e,t,w.makeArray(n)):r.push(n)),r||[]},dequeue:function(e,t){t=t||"fx";var n=w.queue(e,t),r=n.length,i=n.shift(),o=w._queueHooks(e,t),a=function(){w.dequeue(e,t)};"inprogress"===i&&(i=n.shift(),r--),i&&("fx"===t&&n.unshift("inprogress"),delete o.stop,i.call(e,a,o)),!r&&o&&o.empty.fire()},_queueHooks:function(e,t){var n=t+"queueHooks";return J.get(e,n)||J.access(e,n,{empty:w.Callbacks("once memory").add(function(){J.remove(e,[t+"queue",n])})})}}),w.fn.extend({queue:function(e,t){var n=2;return"string"!=typeof e&&(t=e,e="fx",n--),arguments.length<n?w.queue(this[0],e):void 0===t?this:this.each(function(){var n=w.queue(this,e,t);w._queueHooks(this,e),"fx"===e&&"inprogress"!==n[0]&&w.dequeue(this,e)})},dequeue:function(e){return this.each(function(){w.dequeue(this,e)})},clearQueue:function(e){return this.queue(e||"fx",[])},promise:function(e,t){var n,r=1,i=w.Deferred(),o=this,a=this.length,s=function(){--r||i.resolveWith(o,[o])};"string"!=typeof e&&(t=e,e=void 0),e=e||"fx";while(a--)(n=J.get(o[a],e+"queueHooks"))&&n.empty&&(r++,n.empty.add(s));return s(),i.promise(t)}});var re=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,ie=new RegExp("^(?:([+-])=|)("+re+")([a-z%]*)$","i"),oe=["Top","Right","Bottom","Left"],ae=function(e,t){return"none"===(e=t||e).style.display||""===e.style.display&&w.contains(e.ownerDocument,e)&&"none"===w.css(e,"display")},se=function(e,t,n,r){var i,o,a={};for(o in t)a[o]=e.style[o],e.style[o]=t[o];i=n.apply(e,r||[]);for(o in t)e.style[o]=a[o];return i};function ue(e,t,n,r){var i,o,a=20,s=r?function(){return r.cur()}:function(){return w.css(e,t,"")},u=s(),l=n&&n[3]||(w.cssNumber[t]?"":"px"),c=(w.cssNumber[t]||"px"!==l&&+u)&&ie.exec(w.css(e,t));if(c&&c[3]!==l){u/=2,l=l||c[3],c=+u||1;while(a--)w.style(e,t,c+l),(1-o)*(1-(o=s()/u||.5))<=0&&(a=0),c/=o;c*=2,w.style(e,t,c+l),n=n||[]}return n&&(c=+c||+u||0,i=n[1]?c+(n[1]+1)*n[2]:+n[2],r&&(r.unit=l,r.start=c,r.end=i)),i}var le={};function ce(e){var t,n=e.ownerDocument,r=e.nodeName,i=le[r];return i||(t=n.body.appendChild(n.createElement(r)),i=w.css(t,"display"),t.parentNode.removeChild(t),"none"===i&&(i="block"),le[r]=i,i)}function fe(e,t){for(var n,r,i=[],o=0,a=e.length;o<a;o++)(r=e[o]).style&&(n=r.style.display,t?("none"===n&&(i[o]=J.get(r,"display")||null,i[o]||(r.style.display="")),""===r.style.display&&ae(r)&&(i[o]=ce(r))):"none"!==n&&(i[o]="none",J.set(r,"display",n)));for(o=0;o<a;o++)null!=i[o]&&(e[o].style.display=i[o]);return e}w.fn.extend({show:function(){return fe(this,!0)},hide:function(){return fe(this)},toggle:function(e){return"boolean"==typeof e?e?this.show():this.hide():this.each(function(){ae(this)?w(this).show():w(this).hide()})}});var pe=/^(?:checkbox|radio)$/i,de=/<([a-z][^\/\0>\x20\t\r\n\f]+)/i,he=/^$|^module$|\/(?:java|ecma)script/i,ge={option:[1,"<select multiple='multiple'>","</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};ge.optgroup=ge.option,ge.tbody=ge.tfoot=ge.colgroup=ge.caption=ge.thead,ge.th=ge.td;function ye(e,t){var n;return n="undefined"!=typeof e.getElementsByTagName?e.getElementsByTagName(t||"*"):"undefined"!=typeof e.querySelectorAll?e.querySelectorAll(t||"*"):[],void 0===t||t&&N(e,t)?w.merge([e],n):n}function ve(e,t){for(var n=0,r=e.length;n<r;n++)J.set(e[n],"globalEval",!t||J.get(t[n],"globalEval"))}var me=/<|&#?\w+;/;function xe(e,t,n,r,i){for(var o,a,s,u,l,c,f=t.createDocumentFragment(),p=[],d=0,h=e.length;d<h;d++)if((o=e[d])||0===o)if("object"===x(o))w.merge(p,o.nodeType?[o]:o);else if(me.test(o)){a=a||f.appendChild(t.createElement("div")),s=(de.exec(o)||["",""])[1].toLowerCase(),u=ge[s]||ge._default,a.innerHTML=u[1]+w.htmlPrefilter(o)+u[2],c=u[0];while(c--)a=a.lastChild;w.merge(p,a.childNodes),(a=f.firstChild).textContent=""}else p.push(t.createTextNode(o));f.textContent="",d=0;while(o=p[d++])if(r&&w.inArray(o,r)>-1)i&&i.push(o);else if(l=w.contains(o.ownerDocument,o),a=ye(f.appendChild(o),"script"),l&&ve(a),n){c=0;while(o=a[c++])he.test(o.type||"")&&n.push(o)}return f}!function(){var e=r.createDocumentFragment().appendChild(r.createElement("div")),t=r.createElement("input");t.setAttribute("type","radio"),t.setAttribute("checked","checked"),t.setAttribute("name","t"),e.appendChild(t),h.checkClone=e.cloneNode(!0).cloneNode(!0).lastChild.checked,e.innerHTML="<textarea>x</textarea>",h.noCloneChecked=!!e.cloneNode(!0).lastChild.defaultValue}();var be=r.documentElement,we=/^key/,Te=/^(?:mouse|pointer|contextmenu|drag|drop)|click/,Ce=/^([^.]*)(?:\.(.+)|)/;function Ee(){return!0}function ke(){return!1}function Se(){try{return r.activeElement}catch(e){}}function De(e,t,n,r,i,o){var a,s;if("object"==typeof t){"string"!=typeof n&&(r=r||n,n=void 0);for(s in t)De(e,s,n,r,t[s],o);return e}if(null==r&&null==i?(i=n,r=n=void 0):null==i&&("string"==typeof n?(i=r,r=void 0):(i=r,r=n,n=void 0)),!1===i)i=ke;else if(!i)return e;return 1===o&&(a=i,(i=function(e){return w().off(e),a.apply(this,arguments)}).guid=a.guid||(a.guid=w.guid++)),e.each(function(){w.event.add(this,t,i,r,n)})}w.event={global:{},add:function(e,t,n,r,i){var o,a,s,u,l,c,f,p,d,h,g,y=J.get(e);if(y){n.handler&&(n=(o=n).handler,i=o.selector),i&&w.find.matchesSelector(be,i),n.guid||(n.guid=w.guid++),(u=y.events)||(u=y.events={}),(a=y.handle)||(a=y.handle=function(t){return"undefined"!=typeof w&&w.event.triggered!==t.type?w.event.dispatch.apply(e,arguments):void 0}),l=(t=(t||"").match(M)||[""]).length;while(l--)d=g=(s=Ce.exec(t[l])||[])[1],h=(s[2]||"").split(".").sort(),d&&(f=w.event.special[d]||{},d=(i?f.delegateType:f.bindType)||d,f=w.event.special[d]||{},c=w.extend({type:d,origType:g,data:r,handler:n,guid:n.guid,selector:i,needsContext:i&&w.expr.match.needsContext.test(i),namespace:h.join(".")},o),(p=u[d])||((p=u[d]=[]).delegateCount=0,f.setup&&!1!==f.setup.call(e,r,h,a)||e.addEventListener&&e.addEventListener(d,a)),f.add&&(f.add.call(e,c),c.handler.guid||(c.handler.guid=n.guid)),i?p.splice(p.delegateCount++,0,c):p.push(c),w.event.global[d]=!0)}},remove:function(e,t,n,r,i){var o,a,s,u,l,c,f,p,d,h,g,y=J.hasData(e)&&J.get(e);if(y&&(u=y.events)){l=(t=(t||"").match(M)||[""]).length;while(l--)if(s=Ce.exec(t[l])||[],d=g=s[1],h=(s[2]||"").split(".").sort(),d){f=w.event.special[d]||{},p=u[d=(r?f.delegateType:f.bindType)||d]||[],s=s[2]&&new RegExp("(^|\\.)"+h.join("\\.(?:.*\\.|)")+"(\\.|$)"),a=o=p.length;while(o--)c=p[o],!i&&g!==c.origType||n&&n.guid!==c.guid||s&&!s.test(c.namespace)||r&&r!==c.selector&&("**"!==r||!c.selector)||(p.splice(o,1),c.selector&&p.delegateCount--,f.remove&&f.remove.call(e,c));a&&!p.length&&(f.teardown&&!1!==f.teardown.call(e,h,y.handle)||w.removeEvent(e,d,y.handle),delete u[d])}else for(d in u)w.event.remove(e,d+t[l],n,r,!0);w.isEmptyObject(u)&&J.remove(e,"handle events")}},dispatch:function(e){var t=w.event.fix(e),n,r,i,o,a,s,u=new Array(arguments.length),l=(J.get(this,"events")||{})[t.type]||[],c=w.event.special[t.type]||{};for(u[0]=t,n=1;n<arguments.length;n++)u[n]=arguments[n];if(t.delegateTarget=this,!c.preDispatch||!1!==c.preDispatch.call(this,t)){s=w.event.handlers.call(this,t,l),n=0;while((o=s[n++])&&!t.isPropagationStopped()){t.currentTarget=o.elem,r=0;while((a=o.handlers[r++])&&!t.isImmediatePropagationStopped())t.rnamespace&&!t.rnamespace.test(a.namespace)||(t.handleObj=a,t.data=a.data,void 0!==(i=((w.event.special[a.origType]||{}).handle||a.handler).apply(o.elem,u))&&!1===(t.result=i)&&(t.preventDefault(),t.stopPropagation()))}return c.postDispatch&&c.postDispatch.call(this,t),t.result}},handlers:function(e,t){var n,r,i,o,a,s=[],u=t.delegateCount,l=e.target;if(u&&l.nodeType&&!("click"===e.type&&e.button>=1))for(;l!==this;l=l.parentNode||this)if(1===l.nodeType&&("click"!==e.type||!0!==l.disabled)){for(o=[],a={},n=0;n<u;n++)void 0===a[i=(r=t[n]).selector+" "]&&(a[i]=r.needsContext?w(i,this).index(l)>-1:w.find(i,this,null,[l]).length),a[i]&&o.push(r);o.length&&s.push({elem:l,handlers:o})}return l=this,u<t.length&&s.push({elem:l,handlers:t.slice(u)}),s},addProp:function(e,t){Object.defineProperty(w.Event.prototype,e,{enumerable:!0,configurable:!0,get:g(t)?function(){if(this.originalEvent)return t(this.originalEvent)}:function(){if(this.originalEvent)return this.originalEvent[e]},set:function(t){Object.defineProperty(this,e,{enumerable:!0,configurable:!0,writable:!0,value:t})}})},fix:function(e){return e[w.expando]?e:new w.Event(e)},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==Se()&&this.focus)return this.focus(),!1},delegateType:"focusin"},blur:{trigger:function(){if(this===Se()&&this.blur)return this.blur(),!1},delegateType:"focusout"},click:{trigger:function(){if("checkbox"===this.type&&this.click&&N(this,"input"))return this.click(),!1},_default:function(e){return N(e.target,"a")}},beforeunload:{postDispatch:function(e){void 0!==e.result&&e.originalEvent&&(e.originalEvent.returnValue=e.result)}}}},w.removeEvent=function(e,t,n){e.removeEventListener&&e.removeEventListener(t,n)},w.Event=function(e,t){if(!(this instanceof w.Event))return new w.Event(e,t);e&&e.type?(this.originalEvent=e,this.type=e.type,this.isDefaultPrevented=e.defaultPrevented||void 0===e.defaultPrevented&&!1===e.returnValue?Ee:ke,this.target=e.target&&3===e.target.nodeType?e.target.parentNode:e.target,this.currentTarget=e.currentTarget,this.relatedTarget=e.relatedTarget):this.type=e,t&&w.extend(this,t),this.timeStamp=e&&e.timeStamp||Date.now(),this[w.expando]=!0},w.Event.prototype={constructor:w.Event,isDefaultPrevented:ke,isPropagationStopped:ke,isImmediatePropagationStopped:ke,isSimulated:!1,preventDefault:function(){var e=this.originalEvent;this.isDefaultPrevented=Ee,e&&!this.isSimulated&&e.preventDefault()},stopPropagation:function(){var e=this.originalEvent;this.isPropagationStopped=Ee,e&&!this.isSimulated&&e.stopPropagation()},stopImmediatePropagation:function(){var e=this.originalEvent;this.isImmediatePropagationStopped=Ee,e&&!this.isSimulated&&e.stopImmediatePropagation(),this.stopPropagation()}},w.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,"char":!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:function(e){var t=e.button;return null==e.which&&we.test(e.type)?null!=e.charCode?e.charCode:e.keyCode:!e.which&&void 0!==t&&Te.test(e.type)?1&t?1:2&t?3:4&t?2:0:e.which}},w.event.addProp),w.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(e,t){w.event.special[e]={delegateType:t,bindType:t,handle:function(e){var n,r=this,i=e.relatedTarget,o=e.handleObj;return i&&(i===r||w.contains(r,i))||(e.type=o.origType,n=o.handler.apply(this,arguments),e.type=t),n}}}),w.fn.extend({on:function(e,t,n,r){return De(this,e,t,n,r)},one:function(e,t,n,r){return De(this,e,t,n,r,1)},off:function(e,t,n){var r,i;if(e&&e.preventDefault&&e.handleObj)return r=e.handleObj,w(e.delegateTarget).off(r.namespace?r.origType+"."+r.namespace:r.origType,r.selector,r.handler),this;if("object"==typeof e){for(i in e)this.off(i,t,e[i]);return this}return!1!==t&&"function"!=typeof t||(n=t,t=void 0),!1===n&&(n=ke),this.each(function(){w.event.remove(this,e,n,t)})}});var Ne=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,Ae=/<script|<style|<link/i,je=/checked\s*(?:[^=]|=\s*.checked.)/i,qe=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;function Le(e,t){return N(e,"table")&&N(11!==t.nodeType?t:t.firstChild,"tr")?w(e).children("tbody")[0]||e:e}function He(e){return e.type=(null!==e.getAttribute("type"))+"/"+e.type,e}function Oe(e){return"true/"===(e.type||"").slice(0,5)?e.type=e.type.slice(5):e.removeAttribute("type"),e}function Pe(e,t){var n,r,i,o,a,s,u,l;if(1===t.nodeType){if(J.hasData(e)&&(o=J.access(e),a=J.set(t,o),l=o.events)){delete a.handle,a.events={};for(i in l)for(n=0,r=l[i].length;n<r;n++)w.event.add(t,i,l[i][n])}K.hasData(e)&&(s=K.access(e),u=w.extend({},s),K.set(t,u))}}function Me(e,t){var n=t.nodeName.toLowerCase();"input"===n&&pe.test(e.type)?t.checked=e.checked:"input"!==n&&"textarea"!==n||(t.defaultValue=e.defaultValue)}function Re(e,t,n,r){t=a.apply([],t);var i,o,s,u,l,c,f=0,p=e.length,d=p-1,y=t[0],v=g(y);if(v||p>1&&"string"==typeof y&&!h.checkClone&&je.test(y))return e.each(function(i){var o=e.eq(i);v&&(t[0]=y.call(this,i,o.html())),Re(o,t,n,r)});if(p&&(i=xe(t,e[0].ownerDocument,!1,e,r),o=i.firstChild,1===i.childNodes.length&&(i=o),o||r)){for(u=(s=w.map(ye(i,"script"),He)).length;f<p;f++)l=i,f!==d&&(l=w.clone(l,!0,!0),u&&w.merge(s,ye(l,"script"))),n.call(e[f],l,f);if(u)for(c=s[s.length-1].ownerDocument,w.map(s,Oe),f=0;f<u;f++)l=s[f],he.test(l.type||"")&&!J.access(l,"globalEval")&&w.contains(c,l)&&(l.src&&"module"!==(l.type||"").toLowerCase()?w._evalUrl&&w._evalUrl(l.src):m(l.textContent.replace(qe,""),c,l))}return e}function Ie(e,t,n){for(var r,i=t?w.filter(t,e):e,o=0;null!=(r=i[o]);o++)n||1!==r.nodeType||w.cleanData(ye(r)),r.parentNode&&(n&&w.contains(r.ownerDocument,r)&&ve(ye(r,"script")),r.parentNode.removeChild(r));return e}w.extend({htmlPrefilter:function(e){return e.replace(Ne,"<$1></$2>")},clone:function(e,t,n){var r,i,o,a,s=e.cloneNode(!0),u=w.contains(e.ownerDocument,e);if(!(h.noCloneChecked||1!==e.nodeType&&11!==e.nodeType||w.isXMLDoc(e)))for(a=ye(s),r=0,i=(o=ye(e)).length;r<i;r++)Me(o[r],a[r]);if(t)if(n)for(o=o||ye(e),a=a||ye(s),r=0,i=o.length;r<i;r++)Pe(o[r],a[r]);else Pe(e,s);return(a=ye(s,"script")).length>0&&ve(a,!u&&ye(e,"script")),s},cleanData:function(e){for(var t,n,r,i=w.event.special,o=0;void 0!==(n=e[o]);o++)if(Y(n)){if(t=n[J.expando]){if(t.events)for(r in t.events)i[r]?w.event.remove(n,r):w.removeEvent(n,r,t.handle);n[J.expando]=void 0}n[K.expando]&&(n[K.expando]=void 0)}}}),w.fn.extend({detach:function(e){return Ie(this,e,!0)},remove:function(e){return Ie(this,e)},text:function(e){return z(this,function(e){return void 0===e?w.text(this):this.empty().each(function(){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||(this.textContent=e)})},null,e,arguments.length)},append:function(){return Re(this,arguments,function(e){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||Le(this,e).appendChild(e)})},prepend:function(){return Re(this,arguments,function(e){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var t=Le(this,e);t.insertBefore(e,t.firstChild)}})},before:function(){return Re(this,arguments,function(e){this.parentNode&&this.parentNode.insertBefore(e,this)})},after:function(){return Re(this,arguments,function(e){this.parentNode&&this.parentNode.insertBefore(e,this.nextSibling)})},empty:function(){for(var e,t=0;null!=(e=this[t]);t++)1===e.nodeType&&(w.cleanData(ye(e,!1)),e.textContent="");return this},clone:function(e,t){return e=null!=e&&e,t=null==t?e:t,this.map(function(){return w.clone(this,e,t)})},html:function(e){return z(this,function(e){var t=this[0]||{},n=0,r=this.length;if(void 0===e&&1===t.nodeType)return t.innerHTML;if("string"==typeof e&&!Ae.test(e)&&!ge[(de.exec(e)||["",""])[1].toLowerCase()]){e=w.htmlPrefilter(e);try{for(;n<r;n++)1===(t=this[n]||{}).nodeType&&(w.cleanData(ye(t,!1)),t.innerHTML=e);t=0}catch(e){}}t&&this.empty().append(e)},null,e,arguments.length)},replaceWith:function(){var e=[];return Re(this,arguments,function(t){var n=this.parentNode;w.inArray(this,e)<0&&(w.cleanData(ye(this)),n&&n.replaceChild(t,this))},e)}}),w.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(e,t){w.fn[e]=function(e){for(var n,r=[],i=w(e),o=i.length-1,a=0;a<=o;a++)n=a===o?this:this.clone(!0),w(i[a])[t](n),s.apply(r,n.get());return this.pushStack(r)}});var We=new RegExp("^("+re+")(?!px)[a-z%]+$","i"),$e=function(t){var n=t.ownerDocument.defaultView;return n&&n.opener||(n=e),n.getComputedStyle(t)},Be=new RegExp(oe.join("|"),"i");!function(){function t(){if(c){l.style.cssText="position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0",c.style.cssText="position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%",be.appendChild(l).appendChild(c);var t=e.getComputedStyle(c);i="1%"!==t.top,u=12===n(t.marginLeft),c.style.right="60%",s=36===n(t.right),o=36===n(t.width),c.style.position="absolute",a=36===c.offsetWidth||"absolute",be.removeChild(l),c=null}}function n(e){return Math.round(parseFloat(e))}var i,o,a,s,u,l=r.createElement("div"),c=r.createElement("div");c.style&&(c.style.backgroundClip="content-box",c.cloneNode(!0).style.backgroundClip="",h.clearCloneStyle="content-box"===c.style.backgroundClip,w.extend(h,{boxSizingReliable:function(){return t(),o},pixelBoxStyles:function(){return t(),s},pixelPosition:function(){return t(),i},reliableMarginLeft:function(){return t(),u},scrollboxSize:function(){return t(),a}}))}();function Fe(e,t,n){var r,i,o,a,s=e.style;return(n=n||$e(e))&&(""!==(a=n.getPropertyValue(t)||n[t])||w.contains(e.ownerDocument,e)||(a=w.style(e,t)),!h.pixelBoxStyles()&&We.test(a)&&Be.test(t)&&(r=s.width,i=s.minWidth,o=s.maxWidth,s.minWidth=s.maxWidth=s.width=a,a=n.width,s.width=r,s.minWidth=i,s.maxWidth=o)),void 0!==a?a+"":a}function _e(e,t){return{get:function(){if(!e())return(this.get=t).apply(this,arguments);delete this.get}}}var ze=/^(none|table(?!-c[ea]).+)/,Xe=/^--/,Ue={position:"absolute",visibility:"hidden",display:"block"},Ve={letterSpacing:"0",fontWeight:"400"},Ge=["Webkit","Moz","ms"],Ye=r.createElement("div").style;function Qe(e){if(e in Ye)return e;var t=e[0].toUpperCase()+e.slice(1),n=Ge.length;while(n--)if((e=Ge[n]+t)in Ye)return e}function Je(e){var t=w.cssProps[e];return t||(t=w.cssProps[e]=Qe(e)||e),t}function Ke(e,t,n){var r=ie.exec(t);return r?Math.max(0,r[2]-(n||0))+(r[3]||"px"):t}function Ze(e,t,n,r,i,o){var a="width"===t?1:0,s=0,u=0;if(n===(r?"border":"content"))return 0;for(;a<4;a+=2)"margin"===n&&(u+=w.css(e,n+oe[a],!0,i)),r?("content"===n&&(u-=w.css(e,"padding"+oe[a],!0,i)),"margin"!==n&&(u-=w.css(e,"border"+oe[a]+"Width",!0,i))):(u+=w.css(e,"padding"+oe[a],!0,i),"padding"!==n?u+=w.css(e,"border"+oe[a]+"Width",!0,i):s+=w.css(e,"border"+oe[a]+"Width",!0,i));return!r&&o>=0&&(u+=Math.max(0,Math.ceil(e["offset"+t[0].toUpperCase()+t.slice(1)]-o-u-s-.5))),u}function et(e,t,n){var r=$e(e),i=Fe(e,t,r),o="border-box"===w.css(e,"boxSizing",!1,r),a=o;if(We.test(i)){if(!n)return i;i="auto"}return a=a&&(h.boxSizingReliable()||i===e.style[t]),("auto"===i||!parseFloat(i)&&"inline"===w.css(e,"display",!1,r))&&(i=e["offset"+t[0].toUpperCase()+t.slice(1)],a=!0),(i=parseFloat(i)||0)+Ze(e,t,n||(o?"border":"content"),a,r,i)+"px"}w.extend({cssHooks:{opacity:{get:function(e,t){if(t){var n=Fe(e,"opacity");return""===n?"1":n}}}},cssNumber:{animationIterationCount:!0,columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{},style:function(e,t,n,r){if(e&&3!==e.nodeType&&8!==e.nodeType&&e.style){var i,o,a,s=G(t),u=Xe.test(t),l=e.style;if(u||(t=Je(s)),a=w.cssHooks[t]||w.cssHooks[s],void 0===n)return a&&"get"in a&&void 0!==(i=a.get(e,!1,r))?i:l[t];"string"==(o=typeof n)&&(i=ie.exec(n))&&i[1]&&(n=ue(e,t,i),o="number"),null!=n&&n===n&&("number"===o&&(n+=i&&i[3]||(w.cssNumber[s]?"":"px")),h.clearCloneStyle||""!==n||0!==t.indexOf("background")||(l[t]="inherit"),a&&"set"in a&&void 0===(n=a.set(e,n,r))||(u?l.setProperty(t,n):l[t]=n))}},css:function(e,t,n,r){var i,o,a,s=G(t);return Xe.test(t)||(t=Je(s)),(a=w.cssHooks[t]||w.cssHooks[s])&&"get"in a&&(i=a.get(e,!0,n)),void 0===i&&(i=Fe(e,t,r)),"normal"===i&&t in Ve&&(i=Ve[t]),""===n||n?(o=parseFloat(i),!0===n||isFinite(o)?o||0:i):i}}),w.each(["height","width"],function(e,t){w.cssHooks[t]={get:function(e,n,r){if(n)return!ze.test(w.css(e,"display"))||e.getClientRects().length&&e.getBoundingClientRect().width?et(e,t,r):se(e,Ue,function(){return et(e,t,r)})},set:function(e,n,r){var i,o=$e(e),a="border-box"===w.css(e,"boxSizing",!1,o),s=r&&Ze(e,t,r,a,o);return a&&h.scrollboxSize()===o.position&&(s-=Math.ceil(e["offset"+t[0].toUpperCase()+t.slice(1)]-parseFloat(o[t])-Ze(e,t,"border",!1,o)-.5)),s&&(i=ie.exec(n))&&"px"!==(i[3]||"px")&&(e.style[t]=n,n=w.css(e,t)),Ke(e,n,s)}}}),w.cssHooks.marginLeft=_e(h.reliableMarginLeft,function(e,t){if(t)return(parseFloat(Fe(e,"marginLeft"))||e.getBoundingClientRect().left-se(e,{marginLeft:0},function(){return e.getBoundingClientRect().left}))+"px"}),w.each({margin:"",padding:"",border:"Width"},function(e,t){w.cssHooks[e+t]={expand:function(n){for(var r=0,i={},o="string"==typeof n?n.split(" "):[n];r<4;r++)i[e+oe[r]+t]=o[r]||o[r-2]||o[0];return i}},"margin"!==e&&(w.cssHooks[e+t].set=Ke)}),w.fn.extend({css:function(e,t){return z(this,function(e,t,n){var r,i,o={},a=0;if(Array.isArray(t)){for(r=$e(e),i=t.length;a<i;a++)o[t[a]]=w.css(e,t[a],!1,r);return o}return void 0!==n?w.style(e,t,n):w.css(e,t)},e,t,arguments.length>1)}});function tt(e,t,n,r,i){return new tt.prototype.init(e,t,n,r,i)}w.Tween=tt,tt.prototype={constructor:tt,init:function(e,t,n,r,i,o){this.elem=e,this.prop=n,this.easing=i||w.easing._default,this.options=t,this.start=this.now=this.cur(),this.end=r,this.unit=o||(w.cssNumber[n]?"":"px")},cur:function(){var e=tt.propHooks[this.prop];return e&&e.get?e.get(this):tt.propHooks._default.get(this)},run:function(e){var t,n=tt.propHooks[this.prop];return this.options.duration?this.pos=t=w.easing[this.easing](e,this.options.duration*e,0,1,this.options.duration):this.pos=t=e,this.now=(this.end-this.start)*t+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),n&&n.set?n.set(this):tt.propHooks._default.set(this),this}},tt.prototype.init.prototype=tt.prototype,tt.propHooks={_default:{get:function(e){var t;return 1!==e.elem.nodeType||null!=e.elem[e.prop]&&null==e.elem.style[e.prop]?e.elem[e.prop]:(t=w.css(e.elem,e.prop,""))&&"auto"!==t?t:0},set:function(e){w.fx.step[e.prop]?w.fx.step[e.prop](e):1!==e.elem.nodeType||null==e.elem.style[w.cssProps[e.prop]]&&!w.cssHooks[e.prop]?e.elem[e.prop]=e.now:w.style(e.elem,e.prop,e.now+e.unit)}}},tt.propHooks.scrollTop=tt.propHooks.scrollLeft={set:function(e){e.elem.nodeType&&e.elem.parentNode&&(e.elem[e.prop]=e.now)}},w.easing={linear:function(e){return e},swing:function(e){return.5-Math.cos(e*Math.PI)/2},_default:"swing"},w.fx=tt.prototype.init,w.fx.step={};var nt,rt,it=/^(?:toggle|show|hide)$/,ot=/queueHooks$/;function at(){rt&&(!1===r.hidden&&e.requestAnimationFrame?e.requestAnimationFrame(at):e.setTimeout(at,w.fx.interval),w.fx.tick())}function st(){return e.setTimeout(function(){nt=void 0}),nt=Date.now()}function ut(e,t){var n,r=0,i={height:e};for(t=t?1:0;r<4;r+=2-t)i["margin"+(n=oe[r])]=i["padding"+n]=e;return t&&(i.opacity=i.width=e),i}function lt(e,t,n){for(var r,i=(pt.tweeners[t]||[]).concat(pt.tweeners["*"]),o=0,a=i.length;o<a;o++)if(r=i[o].call(n,t,e))return r}function ct(e,t,n){var r,i,o,a,s,u,l,c,f="width"in t||"height"in t,p=this,d={},h=e.style,g=e.nodeType&&ae(e),y=J.get(e,"fxshow");n.queue||(null==(a=w._queueHooks(e,"fx")).unqueued&&(a.unqueued=0,s=a.empty.fire,a.empty.fire=function(){a.unqueued||s()}),a.unqueued++,p.always(function(){p.always(function(){a.unqueued--,w.queue(e,"fx").length||a.empty.fire()})}));for(r in t)if(i=t[r],it.test(i)){if(delete t[r],o=o||"toggle"===i,i===(g?"hide":"show")){if("show"!==i||!y||void 0===y[r])continue;g=!0}d[r]=y&&y[r]||w.style(e,r)}if((u=!w.isEmptyObject(t))||!w.isEmptyObject(d)){f&&1===e.nodeType&&(n.overflow=[h.overflow,h.overflowX,h.overflowY],null==(l=y&&y.display)&&(l=J.get(e,"display")),"none"===(c=w.css(e,"display"))&&(l?c=l:(fe([e],!0),l=e.style.display||l,c=w.css(e,"display"),fe([e]))),("inline"===c||"inline-block"===c&&null!=l)&&"none"===w.css(e,"float")&&(u||(p.done(function(){h.display=l}),null==l&&(c=h.display,l="none"===c?"":c)),h.display="inline-block")),n.overflow&&(h.overflow="hidden",p.always(function(){h.overflow=n.overflow[0],h.overflowX=n.overflow[1],h.overflowY=n.overflow[2]})),u=!1;for(r in d)u||(y?"hidden"in y&&(g=y.hidden):y=J.access(e,"fxshow",{display:l}),o&&(y.hidden=!g),g&&fe([e],!0),p.done(function(){g||fe([e]),J.remove(e,"fxshow");for(r in d)w.style(e,r,d[r])})),u=lt(g?y[r]:0,r,p),r in y||(y[r]=u.start,g&&(u.end=u.start,u.start=0))}}function ft(e,t){var n,r,i,o,a;for(n in e)if(r=G(n),i=t[r],o=e[n],Array.isArray(o)&&(i=o[1],o=e[n]=o[0]),n!==r&&(e[r]=o,delete e[n]),(a=w.cssHooks[r])&&"expand"in a){o=a.expand(o),delete e[r];for(n in o)n in e||(e[n]=o[n],t[n]=i)}else t[r]=i}function pt(e,t,n){var r,i,o=0,a=pt.prefilters.length,s=w.Deferred().always(function(){delete u.elem}),u=function(){if(i)return!1;for(var t=nt||st(),n=Math.max(0,l.startTime+l.duration-t),r=1-(n/l.duration||0),o=0,a=l.tweens.length;o<a;o++)l.tweens[o].run(r);return s.notifyWith(e,[l,r,n]),r<1&&a?n:(a||s.notifyWith(e,[l,1,0]),s.resolveWith(e,[l]),!1)},l=s.promise({elem:e,props:w.extend({},t),opts:w.extend(!0,{specialEasing:{},easing:w.easing._default},n),originalProperties:t,originalOptions:n,startTime:nt||st(),duration:n.duration,tweens:[],createTween:function(t,n){var r=w.Tween(e,l.opts,t,n,l.opts.specialEasing[t]||l.opts.easing);return l.tweens.push(r),r},stop:function(t){var n=0,r=t?l.tweens.length:0;if(i)return this;for(i=!0;n<r;n++)l.tweens[n].run(1);return t?(s.notifyWith(e,[l,1,0]),s.resolveWith(e,[l,t])):s.rejectWith(e,[l,t]),this}}),c=l.props;for(ft(c,l.opts.specialEasing);o<a;o++)if(r=pt.prefilters[o].call(l,e,c,l.opts))return g(r.stop)&&(w._queueHooks(l.elem,l.opts.queue).stop=r.stop.bind(r)),r;return w.map(c,lt,l),g(l.opts.start)&&l.opts.start.call(e,l),l.progress(l.opts.progress).done(l.opts.done,l.opts.complete).fail(l.opts.fail).always(l.opts.always),w.fx.timer(w.extend(u,{elem:e,anim:l,queue:l.opts.queue})),l}w.Animation=w.extend(pt,{tweeners:{"*":[function(e,t){var n=this.createTween(e,t);return ue(n.elem,e,ie.exec(t),n),n}]},tweener:function(e,t){g(e)?(t=e,e=["*"]):e=e.match(M);for(var n,r=0,i=e.length;r<i;r++)n=e[r],pt.tweeners[n]=pt.tweeners[n]||[],pt.tweeners[n].unshift(t)},prefilters:[ct],prefilter:function(e,t){t?pt.prefilters.unshift(e):pt.prefilters.push(e)}}),w.speed=function(e,t,n){var r=e&&"object"==typeof e?w.extend({},e):{complete:n||!n&&t||g(e)&&e,duration:e,easing:n&&t||t&&!g(t)&&t};return w.fx.off?r.duration=0:"number"!=typeof r.duration&&(r.duration in w.fx.speeds?r.duration=w.fx.speeds[r.duration]:r.duration=w.fx.speeds._default),null!=r.queue&&!0!==r.queue||(r.queue="fx"),r.old=r.complete,r.complete=function(){g(r.old)&&r.old.call(this),r.queue&&w.dequeue(this,r.queue)},r},w.fn.extend({fadeTo:function(e,t,n,r){return this.filter(ae).css("opacity",0).show().end().animate({opacity:t},e,n,r)},animate:function(e,t,n,r){var i=w.isEmptyObject(e),o=w.speed(t,n,r),a=function(){var t=pt(this,w.extend({},e),o);(i||J.get(this,"finish"))&&t.stop(!0)};return a.finish=a,i||!1===o.queue?this.each(a):this.queue(o.queue,a)},stop:function(e,t,n){var r=function(e){var t=e.stop;delete e.stop,t(n)};return"string"!=typeof e&&(n=t,t=e,e=void 0),t&&!1!==e&&this.queue(e||"fx",[]),this.each(function(){var t=!0,i=null!=e&&e+"queueHooks",o=w.timers,a=J.get(this);if(i)a[i]&&a[i].stop&&r(a[i]);else for(i in a)a[i]&&a[i].stop&&ot.test(i)&&r(a[i]);for(i=o.length;i--;)o[i].elem!==this||null!=e&&o[i].queue!==e||(o[i].anim.stop(n),t=!1,o.splice(i,1));!t&&n||w.dequeue(this,e)})},finish:function(e){return!1!==e&&(e=e||"fx"),this.each(function(){var t,n=J.get(this),r=n[e+"queue"],i=n[e+"queueHooks"],o=w.timers,a=r?r.length:0;for(n.finish=!0,w.queue(this,e,[]),i&&i.stop&&i.stop.call(this,!0),t=o.length;t--;)o[t].elem===this&&o[t].queue===e&&(o[t].anim.stop(!0),o.splice(t,1));for(t=0;t<a;t++)r[t]&&r[t].finish&&r[t].finish.call(this);delete n.finish})}}),w.each(["toggle","show","hide"],function(e,t){var n=w.fn[t];w.fn[t]=function(e,r,i){return null==e||"boolean"==typeof e?n.apply(this,arguments):this.animate(ut(t,!0),e,r,i)}}),w.each({slideDown:ut("show"),slideUp:ut("hide"),slideToggle:ut("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(e,t){w.fn[e]=function(e,n,r){return this.animate(t,e,n,r)}}),w.timers=[],w.fx.tick=function(){var e,t=0,n=w.timers;for(nt=Date.now();t<n.length;t++)(e=n[t])()||n[t]!==e||n.splice(t--,1);n.length||w.fx.stop(),nt=void 0},w.fx.timer=function(e){w.timers.push(e),w.fx.start()},w.fx.interval=13,w.fx.start=function(){rt||(rt=!0,at())},w.fx.stop=function(){rt=null},w.fx.speeds={slow:600,fast:200,_default:400},w.fn.delay=function(t,n){return t=w.fx?w.fx.speeds[t]||t:t,n=n||"fx",this.queue(n,function(n,r){var i=e.setTimeout(n,t);r.stop=function(){e.clearTimeout(i)}})},function(){var e=r.createElement("input"),t=r.createElement("select").appendChild(r.createElement("option"));e.type="checkbox",h.checkOn=""!==e.value,h.optSelected=t.selected,(e=r.createElement("input")).value="t",e.type="radio",h.radioValue="t"===e.value}();var dt,ht=w.expr.attrHandle;w.fn.extend({attr:function(e,t){return z(this,w.attr,e,t,arguments.length>1)},removeAttr:function(e){return this.each(function(){w.removeAttr(this,e)})}}),w.extend({attr:function(e,t,n){var r,i,o=e.nodeType;if(3!==o&&8!==o&&2!==o)return"undefined"==typeof e.getAttribute?w.prop(e,t,n):(1===o&&w.isXMLDoc(e)||(i=w.attrHooks[t.toLowerCase()]||(w.expr.match.bool.test(t)?dt:void 0)),void 0!==n?null===n?void w.removeAttr(e,t):i&&"set"in i&&void 0!==(r=i.set(e,n,t))?r:(e.setAttribute(t,n+""),n):i&&"get"in i&&null!==(r=i.get(e,t))?r:null==(r=w.find.attr(e,t))?void 0:r)},attrHooks:{type:{set:function(e,t){if(!h.radioValue&&"radio"===t&&N(e,"input")){var n=e.value;return e.setAttribute("type",t),n&&(e.value=n),t}}}},removeAttr:function(e,t){var n,r=0,i=t&&t.match(M);if(i&&1===e.nodeType)while(n=i[r++])e.removeAttribute(n)}}),dt={set:function(e,t,n){return!1===t?w.removeAttr(e,n):e.setAttribute(n,n),n}},w.each(w.expr.match.bool.source.match(/\w+/g),function(e,t){var n=ht[t]||w.find.attr;ht[t]=function(e,t,r){var i,o,a=t.toLowerCase();return r||(o=ht[a],ht[a]=i,i=null!=n(e,t,r)?a:null,ht[a]=o),i}});var gt=/^(?:input|select|textarea|button)$/i,yt=/^(?:a|area)$/i;w.fn.extend({prop:function(e,t){return z(this,w.prop,e,t,arguments.length>1)},removeProp:function(e){return this.each(function(){delete this[w.propFix[e]||e]})}}),w.extend({prop:function(e,t,n){var r,i,o=e.nodeType;if(3!==o&&8!==o&&2!==o)return 1===o&&w.isXMLDoc(e)||(t=w.propFix[t]||t,i=w.propHooks[t]),void 0!==n?i&&"set"in i&&void 0!==(r=i.set(e,n,t))?r:e[t]=n:i&&"get"in i&&null!==(r=i.get(e,t))?r:e[t]},propHooks:{tabIndex:{get:function(e){var t=w.find.attr(e,"tabindex");return t?parseInt(t,10):gt.test(e.nodeName)||yt.test(e.nodeName)&&e.href?0:-1}}},propFix:{"for":"htmlFor","class":"className"}}),h.optSelected||(w.propHooks.selected={get:function(e){var t=e.parentNode;return t&&t.parentNode&&t.parentNode.selectedIndex,null},set:function(e){var t=e.parentNode;t&&(t.selectedIndex,t.parentNode&&t.parentNode.selectedIndex)}}),w.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){w.propFix[this.toLowerCase()]=this});function vt(e){return(e.match(M)||[]).join(" ")}function mt(e){return e.getAttribute&&e.getAttribute("class")||""}function xt(e){return Array.isArray(e)?e:"string"==typeof e?e.match(M)||[]:[]}w.fn.extend({addClass:function(e){var t,n,r,i,o,a,s,u=0;if(g(e))return this.each(function(t){w(this).addClass(e.call(this,t,mt(this)))});if((t=xt(e)).length)while(n=this[u++])if(i=mt(n),r=1===n.nodeType&&" "+vt(i)+" "){a=0;while(o=t[a++])r.indexOf(" "+o+" ")<0&&(r+=o+" ");i!==(s=vt(r))&&n.setAttribute("class",s)}return this},removeClass:function(e){var t,n,r,i,o,a,s,u=0;if(g(e))return this.each(function(t){w(this).removeClass(e.call(this,t,mt(this)))});if(!arguments.length)return this.attr("class","");if((t=xt(e)).length)while(n=this[u++])if(i=mt(n),r=1===n.nodeType&&" "+vt(i)+" "){a=0;while(o=t[a++])while(r.indexOf(" "+o+" ")>-1)r=r.replace(" "+o+" "," ");i!==(s=vt(r))&&n.setAttribute("class",s)}return this},toggleClass:function(e,t){var n=typeof e,r="string"===n||Array.isArray(e);return"boolean"==typeof t&&r?t?this.addClass(e):this.removeClass(e):g(e)?this.each(function(n){w(this).toggleClass(e.call(this,n,mt(this),t),t)}):this.each(function(){var t,i,o,a;if(r){i=0,o=w(this),a=xt(e);while(t=a[i++])o.hasClass(t)?o.removeClass(t):o.addClass(t)}else void 0!==e&&"boolean"!==n||((t=mt(this))&&J.set(this,"__className__",t),this.setAttribute&&this.setAttribute("class",t||!1===e?"":J.get(this,"__className__")||""))})},hasClass:function(e){var t,n,r=0;t=" "+e+" ";while(n=this[r++])if(1===n.nodeType&&(" "+vt(mt(n))+" ").indexOf(t)>-1)return!0;return!1}});var bt=/\r/g;w.fn.extend({val:function(e){var t,n,r,i=this[0];{if(arguments.length)return r=g(e),this.each(function(n){var i;1===this.nodeType&&(null==(i=r?e.call(this,n,w(this).val()):e)?i="":"number"==typeof i?i+="":Array.isArray(i)&&(i=w.map(i,function(e){return null==e?"":e+""})),(t=w.valHooks[this.type]||w.valHooks[this.nodeName.toLowerCase()])&&"set"in t&&void 0!==t.set(this,i,"value")||(this.value=i))});if(i)return(t=w.valHooks[i.type]||w.valHooks[i.nodeName.toLowerCase()])&&"get"in t&&void 0!==(n=t.get(i,"value"))?n:"string"==typeof(n=i.value)?n.replace(bt,""):null==n?"":n}}}),w.extend({valHooks:{option:{get:function(e){var t=w.find.attr(e,"value");return null!=t?t:vt(w.text(e))}},select:{get:function(e){var t,n,r,i=e.options,o=e.selectedIndex,a="select-one"===e.type,s=a?null:[],u=a?o+1:i.length;for(r=o<0?u:a?o:0;r<u;r++)if(((n=i[r]).selected||r===o)&&!n.disabled&&(!n.parentNode.disabled||!N(n.parentNode,"optgroup"))){if(t=w(n).val(),a)return t;s.push(t)}return s},set:function(e,t){var n,r,i=e.options,o=w.makeArray(t),a=i.length;while(a--)((r=i[a]).selected=w.inArray(w.valHooks.option.get(r),o)>-1)&&(n=!0);return n||(e.selectedIndex=-1),o}}}}),w.each(["radio","checkbox"],function(){w.valHooks[this]={set:function(e,t){if(Array.isArray(t))return e.checked=w.inArray(w(e).val(),t)>-1}},h.checkOn||(w.valHooks[this].get=function(e){return null===e.getAttribute("value")?"on":e.value})}),h.focusin="onfocusin"in e;var wt=/^(?:focusinfocus|focusoutblur)$/,Tt=function(e){e.stopPropagation()};w.extend(w.event,{trigger:function(t,n,i,o){var a,s,u,l,c,p,d,h,v=[i||r],m=f.call(t,"type")?t.type:t,x=f.call(t,"namespace")?t.namespace.split("."):[];if(s=h=u=i=i||r,3!==i.nodeType&&8!==i.nodeType&&!wt.test(m+w.event.triggered)&&(m.indexOf(".")>-1&&(m=(x=m.split(".")).shift(),x.sort()),c=m.indexOf(":")<0&&"on"+m,t=t[w.expando]?t:new w.Event(m,"object"==typeof t&&t),t.isTrigger=o?2:3,t.namespace=x.join("."),t.rnamespace=t.namespace?new RegExp("(^|\\.)"+x.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,t.result=void 0,t.target||(t.target=i),n=null==n?[t]:w.makeArray(n,[t]),d=w.event.special[m]||{},o||!d.trigger||!1!==d.trigger.apply(i,n))){if(!o&&!d.noBubble&&!y(i)){for(l=d.delegateType||m,wt.test(l+m)||(s=s.parentNode);s;s=s.parentNode)v.push(s),u=s;u===(i.ownerDocument||r)&&v.push(u.defaultView||u.parentWindow||e)}a=0;while((s=v[a++])&&!t.isPropagationStopped())h=s,t.type=a>1?l:d.bindType||m,(p=(J.get(s,"events")||{})[t.type]&&J.get(s,"handle"))&&p.apply(s,n),(p=c&&s[c])&&p.apply&&Y(s)&&(t.result=p.apply(s,n),!1===t.result&&t.preventDefault());return t.type=m,o||t.isDefaultPrevented()||d._default&&!1!==d._default.apply(v.pop(),n)||!Y(i)||c&&g(i[m])&&!y(i)&&((u=i[c])&&(i[c]=null),w.event.triggered=m,t.isPropagationStopped()&&h.addEventListener(m,Tt),i[m](),t.isPropagationStopped()&&h.removeEventListener(m,Tt),w.event.triggered=void 0,u&&(i[c]=u)),t.result}},simulate:function(e,t,n){var r=w.extend(new w.Event,n,{type:e,isSimulated:!0});w.event.trigger(r,null,t)}}),w.fn.extend({trigger:function(e,t){return this.each(function(){w.event.trigger(e,t,this)})},triggerHandler:function(e,t){var n=this[0];if(n)return w.event.trigger(e,t,n,!0)}}),h.focusin||w.each({focus:"focusin",blur:"focusout"},function(e,t){var n=function(e){w.event.simulate(t,e.target,w.event.fix(e))};w.event.special[t]={setup:function(){var r=this.ownerDocument||this,i=J.access(r,t);i||r.addEventListener(e,n,!0),J.access(r,t,(i||0)+1)},teardown:function(){var r=this.ownerDocument||this,i=J.access(r,t)-1;i?J.access(r,t,i):(r.removeEventListener(e,n,!0),J.remove(r,t))}}});var Ct=e.location,Et=Date.now(),kt=/\?/;w.parseXML=function(t){var n;if(!t||"string"!=typeof t)return null;try{n=(new e.DOMParser).parseFromString(t,"text/xml")}catch(e){n=void 0}return n&&!n.getElementsByTagName("parsererror").length||w.error("Invalid XML: "+t),n};var St=/\[\]$/,Dt=/\r?\n/g,Nt=/^(?:submit|button|image|reset|file)$/i,At=/^(?:input|select|textarea|keygen)/i;function jt(e,t,n,r){var i;if(Array.isArray(t))w.each(t,function(t,i){n||St.test(e)?r(e,i):jt(e+"["+("object"==typeof i&&null!=i?t:"")+"]",i,n,r)});else if(n||"object"!==x(t))r(e,t);else for(i in t)jt(e+"["+i+"]",t[i],n,r)}w.param=function(e,t){var n,r=[],i=function(e,t){var n=g(t)?t():t;r[r.length]=encodeURIComponent(e)+"="+encodeURIComponent(null==n?"":n)};if(Array.isArray(e)||e.jquery&&!w.isPlainObject(e))w.each(e,function(){i(this.name,this.value)});else for(n in e)jt(n,e[n],t,i);return r.join("&")},w.fn.extend({serialize:function(){return w.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var e=w.prop(this,"elements");return e?w.makeArray(e):this}).filter(function(){var e=this.type;return this.name&&!w(this).is(":disabled")&&At.test(this.nodeName)&&!Nt.test(e)&&(this.checked||!pe.test(e))}).map(function(e,t){var n=w(this).val();return null==n?null:Array.isArray(n)?w.map(n,function(e){return{name:t.name,value:e.replace(Dt,"\r\n")}}):{name:t.name,value:n.replace(Dt,"\r\n")}}).get()}});var qt=/%20/g,Lt=/#.*$/,Ht=/([?&])_=[^&]*/,Ot=/^(.*?):[ \t]*([^\r\n]*)$/gm,Pt=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Mt=/^(?:GET|HEAD)$/,Rt=/^\/\//,It={},Wt={},$t="*/".concat("*"),Bt=r.createElement("a");Bt.href=Ct.href;function Ft(e){return function(t,n){"string"!=typeof t&&(n=t,t="*");var r,i=0,o=t.toLowerCase().match(M)||[];if(g(n))while(r=o[i++])"+"===r[0]?(r=r.slice(1)||"*",(e[r]=e[r]||[]).unshift(n)):(e[r]=e[r]||[]).push(n)}}function _t(e,t,n,r){var i={},o=e===Wt;function a(s){var u;return i[s]=!0,w.each(e[s]||[],function(e,s){var l=s(t,n,r);return"string"!=typeof l||o||i[l]?o?!(u=l):void 0:(t.dataTypes.unshift(l),a(l),!1)}),u}return a(t.dataTypes[0])||!i["*"]&&a("*")}function zt(e,t){var n,r,i=w.ajaxSettings.flatOptions||{};for(n in t)void 0!==t[n]&&((i[n]?e:r||(r={}))[n]=t[n]);return r&&w.extend(!0,e,r),e}function Xt(e,t,n){var r,i,o,a,s=e.contents,u=e.dataTypes;while("*"===u[0])u.shift(),void 0===r&&(r=e.mimeType||t.getResponseHeader("Content-Type"));if(r)for(i in s)if(s[i]&&s[i].test(r)){u.unshift(i);break}if(u[0]in n)o=u[0];else{for(i in n){if(!u[0]||e.converters[i+" "+u[0]]){o=i;break}a||(a=i)}o=o||a}if(o)return o!==u[0]&&u.unshift(o),n[o]}function Ut(e,t,n,r){var i,o,a,s,u,l={},c=e.dataTypes.slice();if(c[1])for(a in e.converters)l[a.toLowerCase()]=e.converters[a];o=c.shift();while(o)if(e.responseFields[o]&&(n[e.responseFields[o]]=t),!u&&r&&e.dataFilter&&(t=e.dataFilter(t,e.dataType)),u=o,o=c.shift())if("*"===o)o=u;else if("*"!==u&&u!==o){if(!(a=l[u+" "+o]||l["* "+o]))for(i in l)if((s=i.split(" "))[1]===o&&(a=l[u+" "+s[0]]||l["* "+s[0]])){!0===a?a=l[i]:!0!==l[i]&&(o=s[0],c.unshift(s[1]));break}if(!0!==a)if(a&&e["throws"])t=a(t);else try{t=a(t)}catch(e){return{state:"parsererror",error:a?e:"No conversion from "+u+" to "+o}}}return{state:"success",data:t}}w.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:Ct.href,type:"GET",isLocal:Pt.test(Ct.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":$t,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":w.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(e,t){return t?zt(zt(e,w.ajaxSettings),t):zt(w.ajaxSettings,e)},ajaxPrefilter:Ft(It),ajaxTransport:Ft(Wt),ajax:function(t,n){"object"==typeof t&&(n=t,t=void 0),n=n||{};var i,o,a,s,u,l,c,f,p,d,h=w.ajaxSetup({},n),g=h.context||h,y=h.context&&(g.nodeType||g.jquery)?w(g):w.event,v=w.Deferred(),m=w.Callbacks("once memory"),x=h.statusCode||{},b={},T={},C="canceled",E={readyState:0,getResponseHeader:function(e){var t;if(c){if(!s){s={};while(t=Ot.exec(a))s[t[1].toLowerCase()]=t[2]}t=s[e.toLowerCase()]}return null==t?null:t},getAllResponseHeaders:function(){return c?a:null},setRequestHeader:function(e,t){return null==c&&(e=T[e.toLowerCase()]=T[e.toLowerCase()]||e,b[e]=t),this},overrideMimeType:function(e){return null==c&&(h.mimeType=e),this},statusCode:function(e){var t;if(e)if(c)E.always(e[E.status]);else for(t in e)x[t]=[x[t],e[t]];return this},abort:function(e){var t=e||C;return i&&i.abort(t),k(0,t),this}};if(v.promise(E),h.url=((t||h.url||Ct.href)+"").replace(Rt,Ct.protocol+"//"),h.type=n.method||n.type||h.method||h.type,h.dataTypes=(h.dataType||"*").toLowerCase().match(M)||[""],null==h.crossDomain){l=r.createElement("a");try{l.href=h.url,l.href=l.href,h.crossDomain=Bt.protocol+"//"+Bt.host!=l.protocol+"//"+l.host}catch(e){h.crossDomain=!0}}if(h.data&&h.processData&&"string"!=typeof h.data&&(h.data=w.param(h.data,h.traditional)),_t(It,h,n,E),c)return E;(f=w.event&&h.global)&&0==w.active++&&w.event.trigger("ajaxStart"),h.type=h.type.toUpperCase(),h.hasContent=!Mt.test(h.type),o=h.url.replace(Lt,""),h.hasContent?h.data&&h.processData&&0===(h.contentType||"").indexOf("application/x-www-form-urlencoded")&&(h.data=h.data.replace(qt,"+")):(d=h.url.slice(o.length),h.data&&(h.processData||"string"==typeof h.data)&&(o+=(kt.test(o)?"&":"?")+h.data,delete h.data),!1===h.cache&&(o=o.replace(Ht,"$1"),d=(kt.test(o)?"&":"?")+"_="+Et+++d),h.url=o+d),h.ifModified&&(w.lastModified[o]&&E.setRequestHeader("If-Modified-Since",w.lastModified[o]),w.etag[o]&&E.setRequestHeader("If-None-Match",w.etag[o])),(h.data&&h.hasContent&&!1!==h.contentType||n.contentType)&&E.setRequestHeader("Content-Type",h.contentType),E.setRequestHeader("Accept",h.dataTypes[0]&&h.accepts[h.dataTypes[0]]?h.accepts[h.dataTypes[0]]+("*"!==h.dataTypes[0]?", "+$t+"; q=0.01":""):h.accepts["*"]);for(p in h.headers)E.setRequestHeader(p,h.headers[p]);if(h.beforeSend&&(!1===h.beforeSend.call(g,E,h)||c))return E.abort();if(C="abort",m.add(h.complete),E.done(h.success),E.fail(h.error),i=_t(Wt,h,n,E)){if(E.readyState=1,f&&y.trigger("ajaxSend",[E,h]),c)return E;h.async&&h.timeout>0&&(u=e.setTimeout(function(){E.abort("timeout")},h.timeout));try{c=!1,i.send(b,k)}catch(e){if(c)throw e;k(-1,e)}}else k(-1,"No Transport");function k(t,n,r,s){var l,p,d,b,T,C=n;c||(c=!0,u&&e.clearTimeout(u),i=void 0,a=s||"",E.readyState=t>0?4:0,l=t>=200&&t<300||304===t,r&&(b=Xt(h,E,r)),b=Ut(h,b,E,l),l?(h.ifModified&&((T=E.getResponseHeader("Last-Modified"))&&(w.lastModified[o]=T),(T=E.getResponseHeader("etag"))&&(w.etag[o]=T)),204===t||"HEAD"===h.type?C="nocontent":304===t?C="notmodified":(C=b.state,p=b.data,l=!(d=b.error))):(d=C,!t&&C||(C="error",t<0&&(t=0))),E.status=t,E.statusText=(n||C)+"",l?v.resolveWith(g,[p,C,E]):v.rejectWith(g,[E,C,d]),E.statusCode(x),x=void 0,f&&y.trigger(l?"ajaxSuccess":"ajaxError",[E,h,l?p:d]),m.fireWith(g,[E,C]),f&&(y.trigger("ajaxComplete",[E,h]),--w.active||w.event.trigger("ajaxStop")))}return E},getJSON:function(e,t,n){return w.get(e,t,n,"json")},getScript:function(e,t){return w.get(e,void 0,t,"script")}}),w.each(["get","post"],function(e,t){w[t]=function(e,n,r,i){return g(n)&&(i=i||r,r=n,n=void 0),w.ajax(w.extend({url:e,type:t,dataType:i,data:n,success:r},w.isPlainObject(e)&&e))}}),w._evalUrl=function(e){return w.ajax({url:e,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,"throws":!0})},w.fn.extend({wrapAll:function(e){var t;return this[0]&&(g(e)&&(e=e.call(this[0])),t=w(e,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&t.insertBefore(this[0]),t.map(function(){var e=this;while(e.firstElementChild)e=e.firstElementChild;return e}).append(this)),this},wrapInner:function(e){return g(e)?this.each(function(t){w(this).wrapInner(e.call(this,t))}):this.each(function(){var t=w(this),n=t.contents();n.length?n.wrapAll(e):t.append(e)})},wrap:function(e){var t=g(e);return this.each(function(n){w(this).wrapAll(t?e.call(this,n):e)})},unwrap:function(e){return this.parent(e).not("body").each(function(){w(this).replaceWith(this.childNodes)}),this}}),w.expr.pseudos.hidden=function(e){return!w.expr.pseudos.visible(e)},w.expr.pseudos.visible=function(e){return!!(e.offsetWidth||e.offsetHeight||e.getClientRects().length)},w.ajaxSettings.xhr=function(){try{return new e.XMLHttpRequest}catch(e){}};var Vt={0:200,1223:204},Gt=w.ajaxSettings.xhr();h.cors=!!Gt&&"withCredentials"in Gt,h.ajax=Gt=!!Gt,w.ajaxTransport(function(t){var n,r;if(h.cors||Gt&&!t.crossDomain)return{send:function(i,o){var a,s=t.xhr();if(s.open(t.type,t.url,t.async,t.username,t.password),t.xhrFields)for(a in t.xhrFields)s[a]=t.xhrFields[a];t.mimeType&&s.overrideMimeType&&s.overrideMimeType(t.mimeType),t.crossDomain||i["X-Requested-With"]||(i["X-Requested-With"]="XMLHttpRequest");for(a in i)s.setRequestHeader(a,i[a]);n=function(e){return function(){n&&(n=r=s.onload=s.onerror=s.onabort=s.ontimeout=s.onreadystatechange=null,"abort"===e?s.abort():"error"===e?"number"!=typeof s.status?o(0,"error"):o(s.status,s.statusText):o(Vt[s.status]||s.status,s.statusText,"text"!==(s.responseType||"text")||"string"!=typeof s.responseText?{binary:s.response}:{text:s.responseText},s.getAllResponseHeaders()))}},s.onload=n(),r=s.onerror=s.ontimeout=n("error"),void 0!==s.onabort?s.onabort=r:s.onreadystatechange=function(){4===s.readyState&&e.setTimeout(function(){n&&r()})},n=n("abort");try{s.send(t.hasContent&&t.data||null)}catch(e){if(n)throw e}},abort:function(){n&&n()}}}),w.ajaxPrefilter(function(e){e.crossDomain&&(e.contents.script=!1)}),w.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(e){return w.globalEval(e),e}}}),w.ajaxPrefilter("script",function(e){void 0===e.cache&&(e.cache=!1),e.crossDomain&&(e.type="GET")}),w.ajaxTransport("script",function(e){if(e.crossDomain){var t,n;return{send:function(i,o){t=w("<script>").prop({charset:e.scriptCharset,src:e.url}).on("load error",n=function(e){t.remove(),n=null,e&&o("error"===e.type?404:200,e.type)}),r.head.appendChild(t[0])},abort:function(){n&&n()}}}});var Yt=[],Qt=/(=)\?(?=&|$)|\?\?/;w.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var e=Yt.pop()||w.expando+"_"+Et++;return this[e]=!0,e}}),w.ajaxPrefilter("json jsonp",function(t,n,r){var i,o,a,s=!1!==t.jsonp&&(Qt.test(t.url)?"url":"string"==typeof t.data&&0===(t.contentType||"").indexOf("application/x-www-form-urlencoded")&&Qt.test(t.data)&&"data");if(s||"jsonp"===t.dataTypes[0])return i=t.jsonpCallback=g(t.jsonpCallback)?t.jsonpCallback():t.jsonpCallback,s?t[s]=t[s].replace(Qt,"$1"+i):!1!==t.jsonp&&(t.url+=(kt.test(t.url)?"&":"?")+t.jsonp+"="+i),t.converters["script json"]=function(){return a||w.error(i+" was not called"),a[0]},t.dataTypes[0]="json",o=e[i],e[i]=function(){a=arguments},r.always(function(){void 0===o?w(e).removeProp(i):e[i]=o,t[i]&&(t.jsonpCallback=n.jsonpCallback,Yt.push(i)),a&&g(o)&&o(a[0]),a=o=void 0}),"script"}),h.createHTMLDocument=function(){var e=r.implementation.createHTMLDocument("").body;return e.innerHTML="<form></form><form></form>",2===e.childNodes.length}(),w.parseHTML=function(e,t,n){if("string"!=typeof e)return[];"boolean"==typeof t&&(n=t,t=!1);var i,o,a;return t||(h.createHTMLDocument?((i=(t=r.implementation.createHTMLDocument("")).createElement("base")).href=r.location.href,t.head.appendChild(i)):t=r),o=A.exec(e),a=!n&&[],o?[t.createElement(o[1])]:(o=xe([e],t,a),a&&a.length&&w(a).remove(),w.merge([],o.childNodes))},w.fn.load=function(e,t,n){var r,i,o,a=this,s=e.indexOf(" ");return s>-1&&(r=vt(e.slice(s)),e=e.slice(0,s)),g(t)?(n=t,t=void 0):t&&"object"==typeof t&&(i="POST"),a.length>0&&w.ajax({url:e,type:i||"GET",dataType:"html",data:t}).done(function(e){o=arguments,a.html(r?w("<div>").append(w.parseHTML(e)).find(r):e)}).always(n&&function(e,t){a.each(function(){n.apply(this,o||[e.responseText,t,e])})}),this},w.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(e,t){w.fn[t]=function(e){return this.on(t,e)}}),w.expr.pseudos.animated=function(e){return w.grep(w.timers,function(t){return e===t.elem}).length},w.offset={setOffset:function(e,t,n){var r,i,o,a,s,u,l,c=w.css(e,"position"),f=w(e),p={};"static"===c&&(e.style.position="relative"),s=f.offset(),o=w.css(e,"top"),u=w.css(e,"left"),(l=("absolute"===c||"fixed"===c)&&(o+u).indexOf("auto")>-1)?(a=(r=f.position()).top,i=r.left):(a=parseFloat(o)||0,i=parseFloat(u)||0),g(t)&&(t=t.call(e,n,w.extend({},s))),null!=t.top&&(p.top=t.top-s.top+a),null!=t.left&&(p.left=t.left-s.left+i),"using"in t?t.using.call(e,p):f.css(p)}},w.fn.extend({offset:function(e){if(arguments.length)return void 0===e?this:this.each(function(t){w.offset.setOffset(this,e,t)});var t,n,r=this[0];if(r)return r.getClientRects().length?(t=r.getBoundingClientRect(),n=r.ownerDocument.defaultView,{top:t.top+n.pageYOffset,left:t.left+n.pageXOffset}):{top:0,left:0}},position:function(){if(this[0]){var e,t,n,r=this[0],i={top:0,left:0};if("fixed"===w.css(r,"position"))t=r.getBoundingClientRect();else{t=this.offset(),n=r.ownerDocument,e=r.offsetParent||n.documentElement;while(e&&(e===n.body||e===n.documentElement)&&"static"===w.css(e,"position"))e=e.parentNode;e&&e!==r&&1===e.nodeType&&((i=w(e).offset()).top+=w.css(e,"borderTopWidth",!0),i.left+=w.css(e,"borderLeftWidth",!0))}return{top:t.top-i.top-w.css(r,"marginTop",!0),left:t.left-i.left-w.css(r,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var e=this.offsetParent;while(e&&"static"===w.css(e,"position"))e=e.offsetParent;return e||be})}}),w.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(e,t){var n="pageYOffset"===t;w.fn[e]=function(r){return z(this,function(e,r,i){var o;if(y(e)?o=e:9===e.nodeType&&(o=e.defaultView),void 0===i)return o?o[t]:e[r];o?o.scrollTo(n?o.pageXOffset:i,n?i:o.pageYOffset):e[r]=i},e,r,arguments.length)}}),w.each(["top","left"],function(e,t){w.cssHooks[t]=_e(h.pixelPosition,function(e,n){if(n)return n=Fe(e,t),We.test(n)?w(e).position()[t]+"px":n})}),w.each({Height:"height",Width:"width"},function(e,t){w.each({padding:"inner"+e,content:t,"":"outer"+e},function(n,r){w.fn[r]=function(i,o){var a=arguments.length&&(n||"boolean"!=typeof i),s=n||(!0===i||!0===o?"margin":"border");return z(this,function(t,n,i){var o;return y(t)?0===r.indexOf("outer")?t["inner"+e]:t.document.documentElement["client"+e]:9===t.nodeType?(o=t.documentElement,Math.max(t.body["scroll"+e],o["scroll"+e],t.body["offset"+e],o["offset"+e],o["client"+e])):void 0===i?w.css(t,n,s):w.style(t,n,i,s)},t,a?i:void 0,a)}})}),w.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(e,t){w.fn[t]=function(e,n){return arguments.length>0?this.on(t,null,e,n):this.trigger(t)}}),w.fn.extend({hover:function(e,t){return this.mouseenter(e).mouseleave(t||e)}}),w.fn.extend({bind:function(e,t,n){return this.on(e,null,t,n)},unbind:function(e,t){return this.off(e,null,t)},delegate:function(e,t,n,r){return this.on(t,e,n,r)},undelegate:function(e,t,n){return 1===arguments.length?this.off(e,"**"):this.off(t,e||"**",n)}}),w.proxy=function(e,t){var n,r,i;if("string"==typeof t&&(n=e[t],t=e,e=n),g(e))return r=o.call(arguments,2),i=function(){return e.apply(t||this,r.concat(o.call(arguments)))},i.guid=e.guid=e.guid||w.guid++,i},w.holdReady=function(e){e?w.readyWait++:w.ready(!0)},w.isArray=Array.isArray,w.parseJSON=JSON.parse,w.nodeName=N,w.isFunction=g,w.isWindow=y,w.camelCase=G,w.type=x,w.now=Date.now,w.isNumeric=function(e){var t=w.type(e);return("number"===t||"string"===t)&&!isNaN(e-parseFloat(e))},"function"==typeof define&&define.amd&&define("jquery",[],function(){return w});var Jt=e.jQuery,Kt=e.$;return w.noConflict=function(t){return e.$===w&&(e.$=Kt),t&&e.jQuery===w&&(e.jQuery=Jt),w},t||(e.jQuery=e.$=w),w});

void 0===jQuery.migrateMute&&(jQuery.migrateMute=!0),function(e){"function"==typeof define&&define.amd?define(["jquery"],window,e):"object"==typeof module&&module.exports?module.exports=e(require("jquery"),window):e(jQuery,window)}(function(e,t){"use strict";function r(r){var n=t.console;a[r]||(a[r]=!0,e.migrateWarnings.push(r),n&&n.warn&&!e.migrateMute&&(n.warn("JQMIGRATE: "+r),e.migrateTrace&&n.trace&&n.trace()))}function n(e,t,n,o){Object.defineProperty(e,t,{configurable:!0,enumerable:!0,get:function(){return r(o),n},set:function(e){r(o),n=e}})}function o(e,t,n,o){e[t]=function(){return r(o),n.apply(this,arguments)}}e.migrateVersion="3.0.1",t.console&&t.console.log&&(e&&!/^[12]\./.test(e.fn.jquery)||t.console.log("JQMIGRATE: jQuery 3.0.0+ REQUIRED"),e.migrateWarnings&&t.console.log("JQMIGRATE: Migrate plugin loaded multiple times"),t.console.log("JQMIGRATE: Migrate is installed"+(e.migrateMute?"":" with logging active")+", version "+e.migrateVersion));var a={};e.migrateWarnings=[],void 0===e.migrateTrace&&(e.migrateTrace=!0),e.migrateReset=function(){a={},e.migrateWarnings.length=0},"BackCompat"===t.document.compatMode&&r("jQuery is not compatible with Quirks Mode");var i,s=e.fn.init,u=e.isNumeric,c=e.find,l=/\[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]/,d=/\[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]/g;for(i in e.fn.init=function(e){var t=Array.prototype.slice.call(arguments);return"string"==typeof e&&"#"===e&&(r("jQuery( '#' ) is not a valid selector"),t[0]=[]),s.apply(this,t)},e.fn.init.prototype=e.fn,e.find=function(e){var n=Array.prototype.slice.call(arguments);if("string"==typeof e&&l.test(e))try{t.document.querySelector(e)}catch(o){e=e.replace(d,function(e,t,r,n){return"["+t+r+'"'+n+'"]'});try{t.document.querySelector(e),r("Attribute selector with '#' must be quoted: "+n[0]),n[0]=e}catch(e){r("Attribute selector with '#' was not fixed: "+n[0])}}return c.apply(this,n)},c)Object.prototype.hasOwnProperty.call(c,i)&&(e.find[i]=c[i]);e.fn.size=function(){return r("jQuery.fn.size() is deprecated and removed; use the .length property"),this.length},e.parseJSON=function(){return r("jQuery.parseJSON is deprecated; use JSON.parse"),JSON.parse.apply(null,arguments)},e.isNumeric=function(t){var n=u(t),o=function(t){var r=t&&t.toString();return!e.isArray(t)&&r-parseFloat(r)+1>=0}(t);return n!==o&&r("jQuery.isNumeric() should not be called on constructed objects"),o},o(e,"holdReady",e.holdReady,"jQuery.holdReady is deprecated"),o(e,"unique",e.uniqueSort,"jQuery.unique is deprecated; use jQuery.uniqueSort"),n(e.expr,"filters",e.expr.pseudos,"jQuery.expr.filters is deprecated; use jQuery.expr.pseudos"),n(e.expr,":",e.expr.pseudos,"jQuery.expr[':'] is deprecated; use jQuery.expr.pseudos");var p=e.ajax;e.ajax=function(){var e=p.apply(this,arguments);return e.promise&&(o(e,"success",e.done,"jQXHR.success is deprecated and removed"),o(e,"error",e.fail,"jQXHR.error is deprecated and removed"),o(e,"complete",e.always,"jQXHR.complete is deprecated and removed")),e};var f=e.fn.removeAttr,y=e.fn.toggleClass,m=/\S+/g;e.fn.removeAttr=function(t){var n=this;return e.each(t.match(m),function(t,o){e.expr.match.bool.test(o)&&(r("jQuery.fn.removeAttr no longer sets boolean properties: "+o),n.prop(o,!1))}),f.apply(this,arguments)},e.fn.toggleClass=function(t){return void 0!==t&&"boolean"!=typeof t?y.apply(this,arguments):(r("jQuery.fn.toggleClass( boolean ) is deprecated"),this.each(function(){var r=this.getAttribute&&this.getAttribute("class")||"";r&&e.data(this,"__className__",r),this.setAttribute&&this.setAttribute("class",r||!1===t?"":e.data(this,"__className__")||"")}))};var h=!1;e.swap&&e.each(["height","width","reliableMarginRight"],function(t,r){var n=e.cssHooks[r]&&e.cssHooks[r].get;n&&(e.cssHooks[r].get=function(){var e;return h=!0,e=n.apply(this,arguments),h=!1,e})}),e.swap=function(e,t,n,o){var a,i,s={};for(i in h||r("jQuery.swap() is undocumented and deprecated"),t)s[i]=e.style[i],e.style[i]=t[i];for(i in a=n.apply(e,o||[]),t)e.style[i]=s[i];return a};var g=e.data;e.data=function(t,n,o){var a;if(n&&"object"==typeof n&&2===arguments.length){a=e.hasData(t)&&g.call(this,t);var i={};for(var s in n)s!==e.camelCase(s)?(r("jQuery.data() always sets/gets camelCased names: "+s),a[s]=n[s]):i[s]=n[s];return g.call(this,t,i),n}return n&&"string"==typeof n&&n!==e.camelCase(n)&&(a=e.hasData(t)&&g.call(this,t))&&n in a?(r("jQuery.data() always sets/gets camelCased names: "+n),arguments.length>2&&(a[n]=o),a[n]):g.apply(this,arguments)};var v=e.Tween.prototype.run,j=function(e){return e};e.Tween.prototype.run=function(){e.easing[this.easing].length>1&&(r("'jQuery.easing."+this.easing.toString()+"' should use only one argument"),e.easing[this.easing]=j),v.apply(this,arguments)},e.fx.interval=e.fx.interval||13,t.requestAnimationFrame&&n(e.fx,"interval",e.fx.interval,"jQuery.fx.interval is deprecated");var Q=e.fn.load,b=e.event.add,w=e.event.fix;e.event.props=[],e.event.fixHooks={},n(e.event.props,"concat",e.event.props.concat,"jQuery.event.props.concat() is deprecated and removed"),e.event.fix=function(t){var n,o=t.type,a=this.fixHooks[o],i=e.event.props;if(i.length)for(r("jQuery.event.props are deprecated and removed: "+i.join());i.length;)e.event.addProp(i.pop());if(a&&!a._migrated_&&(a._migrated_=!0,r("jQuery.event.fixHooks are deprecated and removed: "+o),(i=a.props)&&i.length))for(;i.length;)e.event.addProp(i.pop());return n=w.call(this,t),a&&a.filter?a.filter(n,t):n},e.event.add=function(e,n){return e===t&&"load"===n&&"complete"===t.document.readyState&&r("jQuery(window).on('load'...) called after load event occurred"),b.apply(this,arguments)},e.each(["load","unload","error"],function(t,n){e.fn[n]=function(){var e=Array.prototype.slice.call(arguments,0);return"load"===n&&"string"==typeof e[0]?Q.apply(this,e):(r("jQuery.fn."+n+"() is deprecated"),e.splice(0,0,n),arguments.length?this.on.apply(this,e):(this.triggerHandler.apply(this,e),this))}}),e.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(t,n){e.fn[n]=function(e,t){return r("jQuery.fn."+n+"() event shorthand is deprecated"),arguments.length>0?this.on(n,null,e,t):this.trigger(n)}}),e(function(){e(t.document).triggerHandler("ready")}),e.event.special.ready={setup:function(){this===t.document&&r("'ready' event is deprecated")}},e.fn.extend({bind:function(e,t,n){return r("jQuery.fn.bind() is deprecated"),this.on(e,null,t,n)},unbind:function(e,t){return r("jQuery.fn.unbind() is deprecated"),this.off(e,null,t)},delegate:function(e,t,n,o){return r("jQuery.fn.delegate() is deprecated"),this.on(t,e,n,o)},undelegate:function(e,t,n){return r("jQuery.fn.undelegate() is deprecated"),1===arguments.length?this.off(e,"**"):this.off(t,e||"**",n)},hover:function(e,t){return r("jQuery.fn.hover() is deprecated"),this.on("mouseenter",e).on("mouseleave",t||e)}});var x=e.fn.offset;e.fn.offset=function(){var n,o=this[0],a={top:0,left:0};return o&&o.nodeType?(n=(o.ownerDocument||t.document).documentElement,e.contains(n,o)?x.apply(this,arguments):(r("jQuery.fn.offset() requires an element connected to a document"),a)):(r("jQuery.fn.offset() requires a valid DOM element"),a)};var k=e.param;e.param=function(t,n){var o=e.ajaxSettings&&e.ajaxSettings.traditional;return void 0===n&&o&&(r("jQuery.param() no longer uses jQuery.ajaxSettings.traditional"),n=o),k.call(this,t,n)};var A=e.fn.andSelf||e.fn.addBack;e.fn.andSelf=function(){return r("jQuery.fn.andSelf() is deprecated and removed, use jQuery.fn.addBack()"),A.apply(this,arguments)};var S=e.Deferred,q=[["resolve","done",e.Callbacks("once memory"),e.Callbacks("once memory"),"resolved"],["reject","fail",e.Callbacks("once memory"),e.Callbacks("once memory"),"rejected"],["notify","progress",e.Callbacks("memory"),e.Callbacks("memory")]];return e.Deferred=function(t){var n=S(),o=n.promise();return n.pipe=o.pipe=function(){var t=arguments;return r("deferred.pipe() is deprecated"),e.Deferred(function(r){e.each(q,function(a,i){var s=e.isFunction(t[a])&&t[a];n[i[1]](function(){var t=s&&s.apply(this,arguments);t&&e.isFunction(t.promise)?t.promise().done(r.resolve).fail(r.reject).progress(r.notify):r[i[0]+"With"](this===o?r.promise():this,s?[t]:arguments)})}),t=null}).promise()},t&&t.call(n,n),n},e.Deferred.exceptionHook=S.exceptionHook,e});
/*!
 * Bootstrap v5.0.0-beta1 (https://getbootstrap.com/)
 * Copyright 2011-2020 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 */
! function(t, e) { "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : (t = "undefined" != typeof globalThis ? globalThis : t || self).bootstrap = e() }(this, (function() {
    "use strict";

    function t(t, e) {
        for (var n = 0; n < e.length; n++) {
            var i = e[n];
            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i)
        }
    }

    function e(e, n, i) { return n && t(e.prototype, n), i && t(e, i), e }

    function n() { return (n = Object.assign || function(t) { for (var e = 1; e < arguments.length; e++) { var n = arguments[e]; for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i]) } return t }).apply(this, arguments) }

    function i(t, e) { t.prototype = Object.create(e.prototype), t.prototype.constructor = t, t.__proto__ = e }
    var o, r, s = function(t) { do { t += Math.floor(1e6 * Math.random()) } while (document.getElementById(t)); return t },
        a = function(t) {
            var e = t.getAttribute("data-bs-target");
            if (!e || "#" === e) {
                var n = t.getAttribute("href");
                e = n && "#" !== n ? n.trim() : null
            }
            return e
        },
        l = function(t) { var e = a(t); return e && document.querySelector(e) ? e : null },
        c = function(t) { var e = a(t); return e ? document.querySelector(e) : null },
        u = function(t) {
            if (!t) return 0;
            var e = window.getComputedStyle(t),
                n = e.transitionDuration,
                i = e.transitionDelay,
                o = Number.parseFloat(n),
                r = Number.parseFloat(i);
            return o || r ? (n = n.split(",")[0], i = i.split(",")[0], 1e3 * (Number.parseFloat(n) + Number.parseFloat(i))) : 0
        },
        f = function(t) { t.dispatchEvent(new Event("transitionend")) },
        d = function(t) { return (t[0] || t).nodeType },
        h = function(t, e) {
            var n = !1,
                i = e + 5;
            t.addEventListener("transitionend", (function e() { n = !0, t.removeEventListener("transitionend", e) })), setTimeout((function() { n || f(t) }), i)
        },
        p = function(t, e, n) {
            Object.keys(n).forEach((function(i) {
                var o, r = n[i],
                    s = e[i],
                    a = s && d(s) ? "element" : null == (o = s) ? "" + o : {}.toString.call(o).match(/\s([a-z]+)/i)[1].toLowerCase();
                if (!new RegExp(r).test(a)) throw new Error(t.toUpperCase() + ': Option "' + i + '" provided type "' + a + '" but expected type "' + r + '".')
            }))
        },
        g = function(t) {
            if (!t) return !1;
            if (t.style && t.parentNode && t.parentNode.style) {
                var e = getComputedStyle(t),
                    n = getComputedStyle(t.parentNode);
                return "none" !== e.display && "none" !== n.display && "hidden" !== e.visibility
            }
            return !1
        },
        m = function() { return function() {} },
        v = function(t) { return t.offsetHeight },
        _ = function() { var t = window.jQuery; return t && !document.body.hasAttribute("data-bs-no-jquery") ? t : null },
        b = function(t) { "loading" === document.readyState ? document.addEventListener("DOMContentLoaded", t) : t() },
        y = "rtl" === document.documentElement.dir,
        w = (o = {}, r = 1, {
            set: function(t, e, n) { void 0 === t.bsKey && (t.bsKey = { key: e, id: r }, r++), o[t.bsKey.id] = n },
            get: function(t, e) { if (!t || void 0 === t.bsKey) return null; var n = t.bsKey; return n.key === e ? o[n.id] : null },
            delete: function(t, e) {
                if (void 0 !== t.bsKey) {
                    var n = t.bsKey;
                    n.key === e && (delete o[n.id], delete t.bsKey)
                }
            }
        }),
        E = function(t, e, n) { w.set(t, e, n) },
        T = function(t, e) { return w.get(t, e) },
        k = function(t, e) { w.delete(t, e) },
        O = /[^.]*(?=\..*)\.|.*/,
        L = /\..*/,
        A = /::\d+$/,
        C = {},
        D = 1,
        x = { mouseenter: "mouseover", mouseleave: "mouseout" },
        S = new Set(["click", "dblclick", "mouseup", "mousedown", "contextmenu", "mousewheel", "DOMMouseScroll", "mouseover", "mouseout", "mousemove", "selectstart", "selectend", "keydown", "keypress", "keyup", "orientationchange", "touchstart", "touchmove", "touchend", "touchcancel", "pointerdown", "pointermove", "pointerup", "pointerleave", "pointercancel", "gesturestart", "gesturechange", "gestureend", "focus", "blur", "change", "reset", "select", "submit", "focusin", "focusout", "load", "unload", "beforeunload", "resize", "move", "DOMContentLoaded", "readystatechange", "error", "abort", "scroll"]);

    function j(t, e) { return e && e + "::" + D++ || t.uidEvent || D++ }

    function N(t) { var e = j(t); return t.uidEvent = e, C[e] = C[e] || {}, C[e] }

    function I(t, e, n) { void 0 === n && (n = null); for (var i = Object.keys(t), o = 0, r = i.length; o < r; o++) { var s = t[i[o]]; if (s.originalHandler === e && s.delegationSelector === n) return s } return null }

    function P(t, e, n) {
        var i = "string" == typeof e,
            o = i ? n : e,
            r = t.replace(L, ""),
            s = x[r];
        return s && (r = s), S.has(r) || (r = t), [i, o, r]
    }

    function M(t, e, n, i, o) {
        if ("string" == typeof e && t) {
            n || (n = i, i = null);
            var r = P(e, n, i),
                s = r[0],
                a = r[1],
                l = r[2],
                c = N(t),
                u = c[l] || (c[l] = {}),
                f = I(u, a, s ? n : null);
            if (f) f.oneOff = f.oneOff && o;
            else {
                var d = j(a, e.replace(O, "")),
                    h = s ? function(t, e, n) {
                        return function i(o) {
                            for (var r = t.querySelectorAll(e), s = o.target; s && s !== this; s = s.parentNode)
                                for (var a = r.length; a--;)
                                    if (r[a] === s) return o.delegateTarget = s, i.oneOff && H.off(t, o.type, n), n.apply(s, [o]);
                            return null
                        }
                    }(t, n, i) : function(t, e) { return function n(i) { return i.delegateTarget = t, n.oneOff && H.off(t, i.type, e), e.apply(t, [i]) } }(t, n);
                h.delegationSelector = s ? n : null, h.originalHandler = a, h.oneOff = o, h.uidEvent = d, u[d] = h, t.addEventListener(l, h, s)
            }
        }
    }

    function B(t, e, n, i, o) {
        var r = I(e[n], i, o);
        r && (t.removeEventListener(n, r, Boolean(o)), delete e[n][r.uidEvent])
    }
    var H = {
            on: function(t, e, n, i) { M(t, e, n, i, !1) },
            one: function(t, e, n, i) { M(t, e, n, i, !0) },
            off: function(t, e, n, i) {
                if ("string" == typeof e && t) {
                    var o = P(e, n, i),
                        r = o[0],
                        s = o[1],
                        a = o[2],
                        l = a !== e,
                        c = N(t),
                        u = e.startsWith(".");
                    if (void 0 === s) {
                        u && Object.keys(c).forEach((function(n) {
                            ! function(t, e, n, i) {
                                var o = e[n] || {};
                                Object.keys(o).forEach((function(r) {
                                    if (r.includes(i)) {
                                        var s = o[r];
                                        B(t, e, n, s.originalHandler, s.delegationSelector)
                                    }
                                }))
                            }(t, c, n, e.slice(1))
                        }));
                        var f = c[a] || {};
                        Object.keys(f).forEach((function(n) {
                            var i = n.replace(A, "");
                            if (!l || e.includes(i)) {
                                var o = f[n];
                                B(t, c, a, o.originalHandler, o.delegationSelector)
                            }
                        }))
                    } else {
                        if (!c || !c[a]) return;
                        B(t, c, a, s, r ? n : null)
                    }
                }
            },
            trigger: function(t, e, n) {
                if ("string" != typeof e || !t) return null;
                var i, o = _(),
                    r = e.replace(L, ""),
                    s = e !== r,
                    a = S.has(r),
                    l = !0,
                    c = !0,
                    u = !1,
                    f = null;
                return s && o && (i = o.Event(e, n), o(t).trigger(i), l = !i.isPropagationStopped(), c = !i.isImmediatePropagationStopped(), u = i.isDefaultPrevented()), a ? (f = document.createEvent("HTMLEvents")).initEvent(r, l, !0) : f = new CustomEvent(e, { bubbles: l, cancelable: !0 }), void 0 !== n && Object.keys(n).forEach((function(t) { Object.defineProperty(f, t, { get: function() { return n[t] } }) })), u && f.preventDefault(), c && t.dispatchEvent(f), f.defaultPrevented && void 0 !== i && i.preventDefault(), f
            }
        },
        R = function() {
            function t(t) { t && (this._element = t, E(t, this.constructor.DATA_KEY, this)) }
            return t.prototype.dispose = function() { k(this._element, this.constructor.DATA_KEY), this._element = null }, t.getInstance = function(t) { return T(t, this.DATA_KEY) }, e(t, null, [{ key: "VERSION", get: function() { return "5.0.0-beta1" } }]), t
        }(),
        W = "alert",
        K = function(t) {
            function n() { return t.apply(this, arguments) || this }
            i(n, t);
            var o = n.prototype;
            return o.close = function(t) {
                var e = t ? this._getRootElement(t) : this._element,
                    n = this._triggerCloseEvent(e);
                null === n || n.defaultPrevented || this._removeElement(e)
            }, o._getRootElement = function(t) { return c(t) || t.closest(".alert") }, o._triggerCloseEvent = function(t) { return H.trigger(t, "close.bs.alert") }, o._removeElement = function(t) {
                var e = this;
                if (t.classList.remove("show"), t.classList.contains("fade")) {
                    var n = u(t);
                    H.one(t, "transitionend", (function() { return e._destroyElement(t) })), h(t, n)
                } else this._destroyElement(t)
            }, o._destroyElement = function(t) { t.parentNode && t.parentNode.removeChild(t), H.trigger(t, "closed.bs.alert") }, n.jQueryInterface = function(t) {
                return this.each((function() {
                    var e = T(this, "bs.alert");
                    e || (e = new n(this)), "close" === t && e[t](this)
                }))
            }, n.handleDismiss = function(t) { return function(e) { e && e.preventDefault(), t.close(this) } }, e(n, null, [{ key: "DATA_KEY", get: function() { return "bs.alert" } }]), n
        }(R);
    H.on(document, "click.bs.alert.data-api", '[data-bs-dismiss="alert"]', K.handleDismiss(new K)), b((function() {
        var t = _();
        if (t) {
            var e = t.fn[W];
            t.fn[W] = K.jQueryInterface, t.fn[W].Constructor = K, t.fn[W].noConflict = function() { return t.fn[W] = e, K.jQueryInterface }
        }
    }));
    var Q = function(t) {
        function n() { return t.apply(this, arguments) || this }
        return i(n, t), n.prototype.toggle = function() { this._element.setAttribute("aria-pressed", this._element.classList.toggle("active")) }, n.jQueryInterface = function(t) {
            return this.each((function() {
                var e = T(this, "bs.button");
                e || (e = new n(this)), "toggle" === t && e[t]()
            }))
        }, e(n, null, [{ key: "DATA_KEY", get: function() { return "bs.button" } }]), n
    }(R);

    function U(t) { return "true" === t || "false" !== t && (t === Number(t).toString() ? Number(t) : "" === t || "null" === t ? null : t) }

    function F(t) { return t.replace(/[A-Z]/g, (function(t) { return "-" + t.toLowerCase() })) }
    H.on(document, "click.bs.button.data-api", '[data-bs-toggle="button"]', (function(t) {
        t.preventDefault();
        var e = t.target.closest('[data-bs-toggle="button"]'),
            n = T(e, "bs.button");
        n || (n = new Q(e)), n.toggle()
    })), b((function() {
        var t = _();
        if (t) {
            var e = t.fn.button;
            t.fn.button = Q.jQueryInterface, t.fn.button.Constructor = Q, t.fn.button.noConflict = function() { return t.fn.button = e, Q.jQueryInterface }
        }
    }));
    var Y = {
            setDataAttribute: function(t, e, n) { t.setAttribute("data-bs-" + F(e), n) },
            removeDataAttribute: function(t, e) { t.removeAttribute("data-bs-" + F(e)) },
            getDataAttributes: function(t) {
                if (!t) return {};
                var e = {};
                return Object.keys(t.dataset).filter((function(t) { return t.startsWith("bs") })).forEach((function(n) {
                    var i = n.replace(/^bs/, "");
                    i = i.charAt(0).toLowerCase() + i.slice(1, i.length), e[i] = U(t.dataset[n])
                })), e
            },
            getDataAttribute: function(t, e) { return U(t.getAttribute("data-bs-" + F(e))) },
            offset: function(t) { var e = t.getBoundingClientRect(); return { top: e.top + document.body.scrollTop, left: e.left + document.body.scrollLeft } },
            position: function(t) { return { top: t.offsetTop, left: t.offsetLeft } }
        },
        q = {
            matches: function(t, e) { return t.matches(e) },
            find: function(t, e) { var n; return void 0 === e && (e = document.documentElement), (n = []).concat.apply(n, Element.prototype.querySelectorAll.call(e, t)) },
            findOne: function(t, e) { return void 0 === e && (e = document.documentElement), Element.prototype.querySelector.call(e, t) },
            children: function(t, e) { var n, i = (n = []).concat.apply(n, t.children); return i.filter((function(t) { return t.matches(e) })) },
            parents: function(t, e) { for (var n = [], i = t.parentNode; i && i.nodeType === Node.ELEMENT_NODE && 3 !== i.nodeType;) this.matches(i, e) && n.push(i), i = i.parentNode; return n },
            prev: function(t, e) {
                for (var n = t.previousElementSibling; n;) {
                    if (n.matches(e)) return [n];
                    n = n.previousElementSibling
                }
                return []
            },
            next: function(t, e) {
                for (var n = t.nextElementSibling; n;) {
                    if (this.matches(n, e)) return [n];
                    n = n.nextElementSibling
                }
                return []
            }
        },
        z = "carousel",
        V = ".bs.carousel",
        X = { interval: 5e3, keyboard: !0, slide: !1, pause: "hover", wrap: !0, touch: !0 },
        $ = { interval: "(number|boolean)", keyboard: "boolean", slide: "(boolean|string)", pause: "(string|boolean)", wrap: "boolean", touch: "boolean" },
        G = { TOUCH: "touch", PEN: "pen" },
        Z = function(t) {
            function o(e, n) { var i; return (i = t.call(this, e) || this)._items = null, i._interval = null, i._activeElement = null, i._isPaused = !1, i._isSliding = !1, i.touchTimeout = null, i.touchStartX = 0, i.touchDeltaX = 0, i._config = i._getConfig(n), i._indicatorsElement = q.findOne(".carousel-indicators", i._element), i._touchSupported = "ontouchstart" in document.documentElement || navigator.maxTouchPoints > 0, i._pointerEvent = Boolean(window.PointerEvent), i._addEventListeners(), i }
            i(o, t);
            var r = o.prototype;
            return r.next = function() { this._isSliding || this._slide("next") }, r.nextWhenVisible = function() {!document.hidden && g(this._element) && this.next() }, r.prev = function() { this._isSliding || this._slide("prev") }, r.pause = function(t) { t || (this._isPaused = !0), q.findOne(".carousel-item-next, .carousel-item-prev", this._element) && (f(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null }, r.cycle = function(t) { t || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config && this._config.interval && !this._isPaused && (this._updateInterval(), this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval)) }, r.to = function(t) {
                var e = this;
                this._activeElement = q.findOne(".active.carousel-item", this._element);
                var n = this._getItemIndex(this._activeElement);
                if (!(t > this._items.length - 1 || t < 0))
                    if (this._isSliding) H.one(this._element, "slid.bs.carousel", (function() { return e.to(t) }));
                    else {
                        if (n === t) return this.pause(), void this.cycle();
                        var i = t > n ? "next" : "prev";
                        this._slide(i, this._items[t])
                    }
            }, r.dispose = function() { t.prototype.dispose.call(this), H.off(this._element, V), this._items = null, this._config = null, this._interval = null, this._isPaused = null, this._isSliding = null, this._activeElement = null, this._indicatorsElement = null }, r._getConfig = function(t) { return t = n({}, X, t), p(z, t, $), t }, r._handleSwipe = function() {
                var t = Math.abs(this.touchDeltaX);
                if (!(t <= 40)) {
                    var e = t / this.touchDeltaX;
                    this.touchDeltaX = 0, e > 0 && this.prev(), e < 0 && this.next()
                }
            }, r._addEventListeners = function() {
                var t = this;
                this._config.keyboard && H.on(this._element, "keydown.bs.carousel", (function(e) { return t._keydown(e) })), "hover" === this._config.pause && (H.on(this._element, "mouseenter.bs.carousel", (function(e) { return t.pause(e) })), H.on(this._element, "mouseleave.bs.carousel", (function(e) { return t.cycle(e) }))), this._config.touch && this._touchSupported && this._addTouchEventListeners()
            }, r._addTouchEventListeners = function() {
                var t = this,
                    e = function(e) { t._pointerEvent && G[e.pointerType.toUpperCase()] ? t.touchStartX = e.clientX : t._pointerEvent || (t.touchStartX = e.touches[0].clientX) },
                    n = function(e) { t._pointerEvent && G[e.pointerType.toUpperCase()] && (t.touchDeltaX = e.clientX - t.touchStartX), t._handleSwipe(), "hover" === t._config.pause && (t.pause(), t.touchTimeout && clearTimeout(t.touchTimeout), t.touchTimeout = setTimeout((function(e) { return t.cycle(e) }), 500 + t._config.interval)) };
                q.find(".carousel-item img", this._element).forEach((function(t) { H.on(t, "dragstart.bs.carousel", (function(t) { return t.preventDefault() })) })), this._pointerEvent ? (H.on(this._element, "pointerdown.bs.carousel", (function(t) { return e(t) })), H.on(this._element, "pointerup.bs.carousel", (function(t) { return n(t) })), this._element.classList.add("pointer-event")) : (H.on(this._element, "touchstart.bs.carousel", (function(t) { return e(t) })), H.on(this._element, "touchmove.bs.carousel", (function(e) { return function(e) { e.touches && e.touches.length > 1 ? t.touchDeltaX = 0 : t.touchDeltaX = e.touches[0].clientX - t.touchStartX }(e) })), H.on(this._element, "touchend.bs.carousel", (function(t) { return n(t) })))
            }, r._keydown = function(t) {
                if (!/input|textarea/i.test(t.target.tagName)) switch (t.key) {
                    case "ArrowLeft":
                        t.preventDefault(), this.prev();
                        break;
                    case "ArrowRight":
                        t.preventDefault(), this.next()
                }
            }, r._getItemIndex = function(t) { return this._items = t && t.parentNode ? q.find(".carousel-item", t.parentNode) : [], this._items.indexOf(t) }, r._getItemByDirection = function(t, e) {
                var n = "next" === t,
                    i = "prev" === t,
                    o = this._getItemIndex(e),
                    r = this._items.length - 1;
                if ((i && 0 === o || n && o === r) && !this._config.wrap) return e;
                var s = (o + ("prev" === t ? -1 : 1)) % this._items.length;
                return -1 === s ? this._items[this._items.length - 1] : this._items[s]
            }, r._triggerSlideEvent = function(t, e) {
                var n = this._getItemIndex(t),
                    i = this._getItemIndex(q.findOne(".active.carousel-item", this._element));
                return H.trigger(this._element, "slide.bs.carousel", { relatedTarget: t, direction: e, from: i, to: n })
            }, r._setActiveIndicatorElement = function(t) {
                if (this._indicatorsElement) {
                    for (var e = q.find(".active", this._indicatorsElement), n = 0; n < e.length; n++) e[n].classList.remove("active");
                    var i = this._indicatorsElement.children[this._getItemIndex(t)];
                    i && i.classList.add("active")
                }
            }, r._updateInterval = function() {
                var t = this._activeElement || q.findOne(".active.carousel-item", this._element);
                if (t) {
                    var e = Number.parseInt(t.getAttribute("data-bs-interval"), 10);
                    e ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval, this._config.interval = e) : this._config.interval = this._config.defaultInterval || this._config.interval
                }
            }, r._slide = function(t, e) {
                var n, i, o, r = this,
                    s = q.findOne(".active.carousel-item", this._element),
                    a = this._getItemIndex(s),
                    l = e || s && this._getItemByDirection(t, s),
                    c = this._getItemIndex(l),
                    f = Boolean(this._interval);
                if ("next" === t ? (n = "carousel-item-start", i = "carousel-item-next", o = "left") : (n = "carousel-item-end", i = "carousel-item-prev", o = "right"), l && l.classList.contains("active")) this._isSliding = !1;
                else if (!this._triggerSlideEvent(l, o).defaultPrevented && s && l) {
                    if (this._isSliding = !0, f && this.pause(), this._setActiveIndicatorElement(l), this._activeElement = l, this._element.classList.contains("slide")) {
                        l.classList.add(i), v(l), s.classList.add(n), l.classList.add(n);
                        var d = u(s);
                        H.one(s, "transitionend", (function() { l.classList.remove(n, i), l.classList.add("active"), s.classList.remove("active", i, n), r._isSliding = !1, setTimeout((function() { H.trigger(r._element, "slid.bs.carousel", { relatedTarget: l, direction: o, from: a, to: c }) }), 0) })), h(s, d)
                    } else s.classList.remove("active"), l.classList.add("active"), this._isSliding = !1, H.trigger(this._element, "slid.bs.carousel", { relatedTarget: l, direction: o, from: a, to: c });
                    f && this.cycle()
                }
            }, o.carouselInterface = function(t, e) {
                var i = T(t, "bs.carousel"),
                    r = n({}, X, Y.getDataAttributes(t));
                "object" == typeof e && (r = n({}, r, e));
                var s = "string" == typeof e ? e : r.slide;
                if (i || (i = new o(t, r)), "number" == typeof e) i.to(e);
                else if ("string" == typeof s) {
                    if (void 0 === i[s]) throw new TypeError('No method named "' + s + '"');
                    i[s]()
                } else r.interval && r.ride && (i.pause(), i.cycle())
            }, o.jQueryInterface = function(t) { return this.each((function() { o.carouselInterface(this, t) })) }, o.dataApiClickHandler = function(t) {
                var e = c(this);
                if (e && e.classList.contains("carousel")) {
                    var i = n({}, Y.getDataAttributes(e), Y.getDataAttributes(this)),
                        r = this.getAttribute("data-bs-slide-to");
                    r && (i.interval = !1), o.carouselInterface(e, i), r && T(e, "bs.carousel").to(r), t.preventDefault()
                }
            }, e(o, null, [{ key: "Default", get: function() { return X } }, { key: "DATA_KEY", get: function() { return "bs.carousel" } }]), o
        }(R);
    H.on(document, "click.bs.carousel.data-api", "[data-bs-slide], [data-bs-slide-to]", Z.dataApiClickHandler), H.on(window, "load.bs.carousel.data-api", (function() { for (var t = q.find('[data-bs-ride="carousel"]'), e = 0, n = t.length; e < n; e++) Z.carouselInterface(t[e], T(t[e], "bs.carousel")) })), b((function() {
        var t = _();
        if (t) {
            var e = t.fn[z];
            t.fn[z] = Z.jQueryInterface, t.fn[z].Constructor = Z, t.fn[z].noConflict = function() { return t.fn[z] = e, Z.jQueryInterface }
        }
    }));
    var J = "collapse",
        tt = { toggle: !0, parent: "" },
        et = { toggle: "boolean", parent: "(string|element)" },
        nt = function(t) {
            function o(e, n) {
                var i;
                (i = t.call(this, e) || this)._isTransitioning = !1, i._config = i._getConfig(n), i._triggerArray = q.find('[data-bs-toggle="collapse"][href="#' + e.id + '"],[data-bs-toggle="collapse"][data-bs-target="#' + e.id + '"]');
                for (var o = q.find('[data-bs-toggle="collapse"]'), r = 0, s = o.length; r < s; r++) {
                    var a = o[r],
                        c = l(a),
                        u = q.find(c).filter((function(t) { return t === e }));
                    null !== c && u.length && (i._selector = c, i._triggerArray.push(a))
                }
                return i._parent = i._config.parent ? i._getParent() : null, i._config.parent || i._addAriaAndCollapsedClass(i._element, i._triggerArray), i._config.toggle && i.toggle(), i
            }
            i(o, t);
            var r = o.prototype;
            return r.toggle = function() { this._element.classList.contains("show") ? this.hide() : this.show() }, r.show = function() {
                var t = this;
                if (!this._isTransitioning && !this._element.classList.contains("show")) {
                    var e, n;
                    this._parent && 0 === (e = q.find(".show, .collapsing", this._parent).filter((function(e) { return "string" == typeof t._config.parent ? e.getAttribute("data-bs-parent") === t._config.parent : e.classList.contains("collapse") }))).length && (e = null);
                    var i = q.findOne(this._selector);
                    if (e) { var r = e.find((function(t) { return i !== t })); if ((n = r ? T(r, "bs.collapse") : null) && n._isTransitioning) return }
                    if (!H.trigger(this._element, "show.bs.collapse").defaultPrevented) {
                        e && e.forEach((function(t) { i !== t && o.collapseInterface(t, "hide"), n || E(t, "bs.collapse", null) }));
                        var s = this._getDimension();
                        this._element.classList.remove("collapse"), this._element.classList.add("collapsing"), this._element.style[s] = 0, this._triggerArray.length && this._triggerArray.forEach((function(t) { t.classList.remove("collapsed"), t.setAttribute("aria-expanded", !0) })), this.setTransitioning(!0);
                        var a = "scroll" + (s[0].toUpperCase() + s.slice(1)),
                            l = u(this._element);
                        H.one(this._element, "transitionend", (function() { t._element.classList.remove("collapsing"), t._element.classList.add("collapse", "show"), t._element.style[s] = "", t.setTransitioning(!1), H.trigger(t._element, "shown.bs.collapse") })), h(this._element, l), this._element.style[s] = this._element[a] + "px"
                    }
                }
            }, r.hide = function() {
                var t = this;
                if (!this._isTransitioning && this._element.classList.contains("show") && !H.trigger(this._element, "hide.bs.collapse").defaultPrevented) {
                    var e = this._getDimension();
                    this._element.style[e] = this._element.getBoundingClientRect()[e] + "px", v(this._element), this._element.classList.add("collapsing"), this._element.classList.remove("collapse", "show");
                    var n = this._triggerArray.length;
                    if (n > 0)
                        for (var i = 0; i < n; i++) {
                            var o = this._triggerArray[i],
                                r = c(o);
                            r && !r.classList.contains("show") && (o.classList.add("collapsed"), o.setAttribute("aria-expanded", !1))
                        }
                    this.setTransitioning(!0);
                    this._element.style[e] = "";
                    var s = u(this._element);
                    H.one(this._element, "transitionend", (function() { t.setTransitioning(!1), t._element.classList.remove("collapsing"), t._element.classList.add("collapse"), H.trigger(t._element, "hidden.bs.collapse") })), h(this._element, s)
                }
            }, r.setTransitioning = function(t) { this._isTransitioning = t }, r.dispose = function() { t.prototype.dispose.call(this), this._config = null, this._parent = null, this._triggerArray = null, this._isTransitioning = null }, r._getConfig = function(t) { return (t = n({}, tt, t)).toggle = Boolean(t.toggle), p(J, t, et), t }, r._getDimension = function() { return this._element.classList.contains("width") ? "width" : "height" }, r._getParent = function() {
                var t = this,
                    e = this._config.parent;
                d(e) ? void 0 === e.jquery && void 0 === e[0] || (e = e[0]) : e = q.findOne(e);
                var n = '[data-bs-toggle="collapse"][data-bs-parent="' + e + '"]';
                return q.find(n, e).forEach((function(e) {
                    var n = c(e);
                    t._addAriaAndCollapsedClass(n, [e])
                })), e
            }, r._addAriaAndCollapsedClass = function(t, e) {
                if (t && e.length) {
                    var n = t.classList.contains("show");
                    e.forEach((function(t) { n ? t.classList.remove("collapsed") : t.classList.add("collapsed"), t.setAttribute("aria-expanded", n) }))
                }
            }, o.collapseInterface = function(t, e) {
                var i = T(t, "bs.collapse"),
                    r = n({}, tt, Y.getDataAttributes(t), "object" == typeof e && e ? e : {});
                if (!i && r.toggle && "string" == typeof e && /show|hide/.test(e) && (r.toggle = !1), i || (i = new o(t, r)), "string" == typeof e) {
                    if (void 0 === i[e]) throw new TypeError('No method named "' + e + '"');
                    i[e]()
                }
            }, o.jQueryInterface = function(t) { return this.each((function() { o.collapseInterface(this, t) })) }, e(o, null, [{ key: "Default", get: function() { return tt } }, { key: "DATA_KEY", get: function() { return "bs.collapse" } }]), o
        }(R);
    H.on(document, "click.bs.collapse.data-api", '[data-bs-toggle="collapse"]', (function(t) {
        "A" === t.target.tagName && t.preventDefault();
        var e = Y.getDataAttributes(this),
            n = l(this);
        q.find(n).forEach((function(t) {
            var n, i = T(t, "bs.collapse");
            i ? (null === i._parent && "string" == typeof e.parent && (i._config.parent = e.parent, i._parent = i._getParent()), n = "toggle") : n = e, nt.collapseInterface(t, n)
        }))
    })), b((function() {
        var t = _();
        if (t) {
            var e = t.fn[J];
            t.fn[J] = nt.jQueryInterface, t.fn[J].Constructor = nt, t.fn[J].noConflict = function() { return t.fn[J] = e, nt.jQueryInterface }
        }
    }));
    var it = "top",
        ot = "bottom",
        rt = "right",
        st = "left",
        at = [it, ot, rt, st],
        lt = at.reduce((function(t, e) { return t.concat([e + "-start", e + "-end"]) }), []),
        ct = [].concat(at, ["auto"]).reduce((function(t, e) { return t.concat([e, e + "-start", e + "-end"]) }), []),
        ut = ["beforeRead", "read", "afterRead", "beforeMain", "main", "afterMain", "beforeWrite", "write", "afterWrite"];

    function ft(t) { return t ? (t.nodeName || "").toLowerCase() : null }

    function dt(t) { if ("[object Window]" !== t.toString()) { var e = t.ownerDocument; return e && e.defaultView || window } return t }

    function ht(t) { return t instanceof dt(t).Element || t instanceof Element }

    function pt(t) { return t instanceof dt(t).HTMLElement || t instanceof HTMLElement }
    var gt = {
        name: "applyStyles",
        enabled: !0,
        phase: "write",
        fn: function(t) {
            var e = t.state;
            Object.keys(e.elements).forEach((function(t) {
                var n = e.styles[t] || {},
                    i = e.attributes[t] || {},
                    o = e.elements[t];
                pt(o) && ft(o) && (Object.assign(o.style, n), Object.keys(i).forEach((function(t) { var e = i[t];!1 === e ? o.removeAttribute(t) : o.setAttribute(t, !0 === e ? "" : e) })))
            }))
        },
        effect: function(t) {
            var e = t.state,
                n = { popper: { position: e.options.strategy, left: "0", top: "0", margin: "0" }, arrow: { position: "absolute" }, reference: {} };
            return Object.assign(e.elements.popper.style, n.popper), e.elements.arrow && Object.assign(e.elements.arrow.style, n.arrow),
                function() {
                    Object.keys(e.elements).forEach((function(t) {
                        var i = e.elements[t],
                            o = e.attributes[t] || {},
                            r = Object.keys(e.styles.hasOwnProperty(t) ? e.styles[t] : n[t]).reduce((function(t, e) { return t[e] = "", t }), {});
                        pt(i) && ft(i) && (Object.assign(i.style, r), Object.keys(o).forEach((function(t) { i.removeAttribute(t) })))
                    }))
                }
        },
        requires: ["computeStyles"]
    };

    function mt(t) { return t.split("-")[0] }

    function vt(t) { return { x: t.offsetLeft, y: t.offsetTop, width: t.offsetWidth, height: t.offsetHeight } }

    function _t(t, e) {
        var n, i = e.getRootNode && e.getRootNode();
        if (t.contains(e)) return !0;
        if (i && ((n = i) instanceof dt(n).ShadowRoot || n instanceof ShadowRoot)) {
            var o = e;
            do {
                if (o && t.isSameNode(o)) return !0;
                o = o.parentNode || o.host
            } while (o)
        }
        return !1
    }

    function bt(t) { return dt(t).getComputedStyle(t) }

    function yt(t) { return ["table", "td", "th"].indexOf(ft(t)) >= 0 }

    function wt(t) { return ((ht(t) ? t.ownerDocument : t.document) || window.document).documentElement }

    function Et(t) { return "html" === ft(t) ? t : t.assignedSlot || t.parentNode || t.host || wt(t) }

    function Tt(t) { if (!pt(t) || "fixed" === bt(t).position) return null; var e = t.offsetParent; if (e) { var n = wt(e); if ("body" === ft(e) && "static" === bt(e).position && "static" !== bt(n).position) return n } return e }

    function kt(t) {
        for (var e = dt(t), n = Tt(t); n && yt(n) && "static" === bt(n).position;) n = Tt(n);
        return n && "body" === ft(n) && "static" === bt(n).position ? e : n || function(t) {
            for (var e = Et(t); pt(e) && ["html", "body"].indexOf(ft(e)) < 0;) {
                var n = bt(e);
                if ("none" !== n.transform || "none" !== n.perspective || n.willChange && "auto" !== n.willChange) return e;
                e = e.parentNode
            }
            return null
        }(t) || e
    }

    function Ot(t) { return ["top", "bottom"].indexOf(t) >= 0 ? "x" : "y" }

    function Lt(t, e, n) { return Math.max(t, Math.min(e, n)) }

    function At(t) { return Object.assign(Object.assign({}, { top: 0, right: 0, bottom: 0, left: 0 }), t) }

    function Ct(t, e) { return e.reduce((function(e, n) { return e[n] = t, e }), {}) }
    var Dt = {
            name: "arrow",
            enabled: !0,
            phase: "main",
            fn: function(t) {
                var e, n = t.state,
                    i = t.name,
                    o = n.elements.arrow,
                    r = n.modifiersData.popperOffsets,
                    s = mt(n.placement),
                    a = Ot(s),
                    l = [st, rt].indexOf(s) >= 0 ? "height" : "width";
                if (o && r) {
                    var c = n.modifiersData[i + "#persistent"].padding,
                        u = vt(o),
                        f = "y" === a ? it : st,
                        d = "y" === a ? ot : rt,
                        h = n.rects.reference[l] + n.rects.reference[a] - r[a] - n.rects.popper[l],
                        p = r[a] - n.rects.reference[a],
                        g = kt(o),
                        m = g ? "y" === a ? g.clientHeight || 0 : g.clientWidth || 0 : 0,
                        v = h / 2 - p / 2,
                        _ = c[f],
                        b = m - u[l] - c[d],
                        y = m / 2 - u[l] / 2 + v,
                        w = Lt(_, y, b),
                        E = a;
                    n.modifiersData[i] = ((e = {})[E] = w, e.centerOffset = w - y, e)
                }
            },
            effect: function(t) {
                var e = t.state,
                    n = t.options,
                    i = t.name,
                    o = n.element,
                    r = void 0 === o ? "[data-popper-arrow]" : o,
                    s = n.padding,
                    a = void 0 === s ? 0 : s;
                null != r && ("string" != typeof r || (r = e.elements.popper.querySelector(r))) && _t(e.elements.popper, r) && (e.elements.arrow = r, e.modifiersData[i + "#persistent"] = { padding: At("number" != typeof a ? a : Ct(a, at)) })
            },
            requires: ["popperOffsets"],
            requiresIfExists: ["preventOverflow"]
        },
        xt = { top: "auto", right: "auto", bottom: "auto", left: "auto" };

    function St(t) {
        var e, n = t.popper,
            i = t.popperRect,
            o = t.placement,
            r = t.offsets,
            s = t.position,
            a = t.gpuAcceleration,
            l = t.adaptive,
            c = function(t) {
                var e = t.x,
                    n = t.y,
                    i = window.devicePixelRatio || 1;
                return { x: Math.round(e * i) / i || 0, y: Math.round(n * i) / i || 0 }
            }(r),
            u = c.x,
            f = c.y,
            d = r.hasOwnProperty("x"),
            h = r.hasOwnProperty("y"),
            p = st,
            g = it,
            m = window;
        if (l) {
            var v = kt(n);
            v === dt(n) && (v = wt(n)), o === it && (g = ot, f -= v.clientHeight - i.height, f *= a ? 1 : -1), o === st && (p = rt, u -= v.clientWidth - i.width, u *= a ? 1 : -1)
        }
        var _, b = Object.assign({ position: s }, l && xt);
        return a ? Object.assign(Object.assign({}, b), {}, ((_ = {})[g] = h ? "0" : "", _[p] = d ? "0" : "", _.transform = (m.devicePixelRatio || 1) < 2 ? "translate(" + u + "px, " + f + "px)" : "translate3d(" + u + "px, " + f + "px, 0)", _)) : Object.assign(Object.assign({}, b), {}, ((e = {})[g] = h ? f + "px" : "", e[p] = d ? u + "px" : "", e.transform = "", e))
    }
    var jt = {
            name: "computeStyles",
            enabled: !0,
            phase: "beforeWrite",
            fn: function(t) {
                var e = t.state,
                    n = t.options,
                    i = n.gpuAcceleration,
                    o = void 0 === i || i,
                    r = n.adaptive,
                    s = void 0 === r || r,
                    a = { placement: mt(e.placement), popper: e.elements.popper, popperRect: e.rects.popper, gpuAcceleration: o };
                null != e.modifiersData.popperOffsets && (e.styles.popper = Object.assign(Object.assign({}, e.styles.popper), St(Object.assign(Object.assign({}, a), {}, { offsets: e.modifiersData.popperOffsets, position: e.options.strategy, adaptive: s })))), null != e.modifiersData.arrow && (e.styles.arrow = Object.assign(Object.assign({}, e.styles.arrow), St(Object.assign(Object.assign({}, a), {}, { offsets: e.modifiersData.arrow, position: "absolute", adaptive: !1 })))), e.attributes.popper = Object.assign(Object.assign({}, e.attributes.popper), {}, { "data-popper-placement": e.placement })
            },
            data: {}
        },
        Nt = { passive: !0 };
    var It = {
            name: "eventListeners",
            enabled: !0,
            phase: "write",
            fn: function() {},
            effect: function(t) {
                var e = t.state,
                    n = t.instance,
                    i = t.options,
                    o = i.scroll,
                    r = void 0 === o || o,
                    s = i.resize,
                    a = void 0 === s || s,
                    l = dt(e.elements.popper),
                    c = [].concat(e.scrollParents.reference, e.scrollParents.popper);
                return r && c.forEach((function(t) { t.addEventListener("scroll", n.update, Nt) })), a && l.addEventListener("resize", n.update, Nt),
                    function() { r && c.forEach((function(t) { t.removeEventListener("scroll", n.update, Nt) })), a && l.removeEventListener("resize", n.update, Nt) }
            },
            data: {}
        },
        Pt = { left: "right", right: "left", bottom: "top", top: "bottom" };

    function Mt(t) { return t.replace(/left|right|bottom|top/g, (function(t) { return Pt[t] })) }
    var Bt = { start: "end", end: "start" };

    function Ht(t) { return t.replace(/start|end/g, (function(t) { return Bt[t] })) }

    function Rt(t) { var e = t.getBoundingClientRect(); return { width: e.width, height: e.height, top: e.top, right: e.right, bottom: e.bottom, left: e.left, x: e.left, y: e.top } }

    function Wt(t) { var e = dt(t); return { scrollLeft: e.pageXOffset, scrollTop: e.pageYOffset } }

    function Kt(t) { return Rt(wt(t)).left + Wt(t).scrollLeft }

    function Qt(t) {
        var e = bt(t),
            n = e.overflow,
            i = e.overflowX,
            o = e.overflowY;
        return /auto|scroll|overlay|hidden/.test(n + o + i)
    }

    function Ut(t, e) {
        void 0 === e && (e = []);
        var n = function t(e) { return ["html", "body", "#document"].indexOf(ft(e)) >= 0 ? e.ownerDocument.body : pt(e) && Qt(e) ? e : t(Et(e)) }(t),
            i = "body" === ft(n),
            o = dt(n),
            r = i ? [o].concat(o.visualViewport || [], Qt(n) ? n : []) : n,
            s = e.concat(r);
        return i ? s : s.concat(Ut(Et(r)))
    }

    function Ft(t) { return Object.assign(Object.assign({}, t), {}, { left: t.x, top: t.y, right: t.x + t.width, bottom: t.y + t.height }) }

    function Yt(t, e) {
        return "viewport" === e ? Ft(function(t) {
            var e = dt(t),
                n = wt(t),
                i = e.visualViewport,
                o = n.clientWidth,
                r = n.clientHeight,
                s = 0,
                a = 0;
            return i && (o = i.width, r = i.height, /^((?!chrome|android).)*safari/i.test(navigator.userAgent) || (s = i.offsetLeft, a = i.offsetTop)), { width: o, height: r, x: s + Kt(t), y: a }
        }(t)) : pt(e) ? function(t) { var e = Rt(t); return e.top = e.top + t.clientTop, e.left = e.left + t.clientLeft, e.bottom = e.top + t.clientHeight, e.right = e.left + t.clientWidth, e.width = t.clientWidth, e.height = t.clientHeight, e.x = e.left, e.y = e.top, e }(e) : Ft(function(t) {
            var e = wt(t),
                n = Wt(t),
                i = t.ownerDocument.body,
                o = Math.max(e.scrollWidth, e.clientWidth, i ? i.scrollWidth : 0, i ? i.clientWidth : 0),
                r = Math.max(e.scrollHeight, e.clientHeight, i ? i.scrollHeight : 0, i ? i.clientHeight : 0),
                s = -n.scrollLeft + Kt(t),
                a = -n.scrollTop;
            return "rtl" === bt(i || e).direction && (s += Math.max(e.clientWidth, i ? i.clientWidth : 0) - o), { width: o, height: r, x: s, y: a }
        }(wt(t)))
    }

    function qt(t, e, n) {
        var i = "clippingParents" === e ? function(t) {
                var e = Ut(Et(t)),
                    n = ["absolute", "fixed"].indexOf(bt(t).position) >= 0 && pt(t) ? kt(t) : t;
                return ht(n) ? e.filter((function(t) { return ht(t) && _t(t, n) && "body" !== ft(t) })) : []
            }(t) : [].concat(e),
            o = [].concat(i, [n]),
            r = o[0],
            s = o.reduce((function(e, n) { var i = Yt(t, n); return e.top = Math.max(i.top, e.top), e.right = Math.min(i.right, e.right), e.bottom = Math.min(i.bottom, e.bottom), e.left = Math.max(i.left, e.left), e }), Yt(t, r));
        return s.width = s.right - s.left, s.height = s.bottom - s.top, s.x = s.left, s.y = s.top, s
    }

    function zt(t) { return t.split("-")[1] }

    function Vt(t) {
        var e, n = t.reference,
            i = t.element,
            o = t.placement,
            r = o ? mt(o) : null,
            s = o ? zt(o) : null,
            a = n.x + n.width / 2 - i.width / 2,
            l = n.y + n.height / 2 - i.height / 2;
        switch (r) {
            case it:
                e = { x: a, y: n.y - i.height };
                break;
            case ot:
                e = { x: a, y: n.y + n.height };
                break;
            case rt:
                e = { x: n.x + n.width, y: l };
                break;
            case st:
                e = { x: n.x - i.width, y: l };
                break;
            default:
                e = { x: n.x, y: n.y }
        }
        var c = r ? Ot(r) : null;
        if (null != c) {
            var u = "y" === c ? "height" : "width";
            switch (s) {
                case "start":
                    e[c] = Math.floor(e[c]) - Math.floor(n[u] / 2 - i[u] / 2);
                    break;
                case "end":
                    e[c] = Math.floor(e[c]) + Math.ceil(n[u] / 2 - i[u] / 2)
            }
        }
        return e
    }

    function Xt(t, e) {
        void 0 === e && (e = {});
        var n = e,
            i = n.placement,
            o = void 0 === i ? t.placement : i,
            r = n.boundary,
            s = void 0 === r ? "clippingParents" : r,
            a = n.rootBoundary,
            l = void 0 === a ? "viewport" : a,
            c = n.elementContext,
            u = void 0 === c ? "popper" : c,
            f = n.altBoundary,
            d = void 0 !== f && f,
            h = n.padding,
            p = void 0 === h ? 0 : h,
            g = At("number" != typeof p ? p : Ct(p, at)),
            m = "popper" === u ? "reference" : "popper",
            v = t.elements.reference,
            _ = t.rects.popper,
            b = t.elements[d ? m : u],
            y = qt(ht(b) ? b : b.contextElement || wt(t.elements.popper), s, l),
            w = Rt(v),
            E = Vt({ reference: w, element: _, strategy: "absolute", placement: o }),
            T = Ft(Object.assign(Object.assign({}, _), E)),
            k = "popper" === u ? T : w,
            O = { top: y.top - k.top + g.top, bottom: k.bottom - y.bottom + g.bottom, left: y.left - k.left + g.left, right: k.right - y.right + g.right },
            L = t.modifiersData.offset;
        if ("popper" === u && L) {
            var A = L[o];
            Object.keys(O).forEach((function(t) {
                var e = [rt, ot].indexOf(t) >= 0 ? 1 : -1,
                    n = [it, ot].indexOf(t) >= 0 ? "y" : "x";
                O[t] += A[n] * e
            }))
        }
        return O
    }

    function $t(t, e) {
        void 0 === e && (e = {});
        var n = e,
            i = n.placement,
            o = n.boundary,
            r = n.rootBoundary,
            s = n.padding,
            a = n.flipVariations,
            l = n.allowedAutoPlacements,
            c = void 0 === l ? ct : l,
            u = zt(i),
            f = u ? a ? lt : lt.filter((function(t) { return zt(t) === u })) : at,
            d = f.filter((function(t) { return c.indexOf(t) >= 0 }));
        0 === d.length && (d = f);
        var h = d.reduce((function(e, n) { return e[n] = Xt(t, { placement: n, boundary: o, rootBoundary: r, padding: s })[mt(n)], e }), {});
        return Object.keys(h).sort((function(t, e) { return h[t] - h[e] }))
    }
    var Gt = {
        name: "flip",
        enabled: !0,
        phase: "main",
        fn: function(t) {
            var e = t.state,
                n = t.options,
                i = t.name;
            if (!e.modifiersData[i]._skip) {
                for (var o = n.mainAxis, r = void 0 === o || o, s = n.altAxis, a = void 0 === s || s, l = n.fallbackPlacements, c = n.padding, u = n.boundary, f = n.rootBoundary, d = n.altBoundary, h = n.flipVariations, p = void 0 === h || h, g = n.allowedAutoPlacements, m = e.options.placement, v = mt(m), _ = l || (v === m || !p ? [Mt(m)] : function(t) { if ("auto" === mt(t)) return []; var e = Mt(t); return [Ht(t), e, Ht(e)] }(m)), b = [m].concat(_).reduce((function(t, n) { return t.concat("auto" === mt(n) ? $t(e, { placement: n, boundary: u, rootBoundary: f, padding: c, flipVariations: p, allowedAutoPlacements: g }) : n) }), []), y = e.rects.reference, w = e.rects.popper, E = new Map, T = !0, k = b[0], O = 0; O < b.length; O++) {
                    var L = b[O],
                        A = mt(L),
                        C = "start" === zt(L),
                        D = [it, ot].indexOf(A) >= 0,
                        x = D ? "width" : "height",
                        S = Xt(e, { placement: L, boundary: u, rootBoundary: f, altBoundary: d, padding: c }),
                        j = D ? C ? rt : st : C ? ot : it;
                    y[x] > w[x] && (j = Mt(j));
                    var N = Mt(j),
                        I = [];
                    if (r && I.push(S[A] <= 0), a && I.push(S[j] <= 0, S[N] <= 0), I.every((function(t) { return t }))) { k = L, T = !1; break }
                    E.set(L, I)
                }
                if (T)
                    for (var P = function(t) { var e = b.find((function(e) { var n = E.get(e); if (n) return n.slice(0, t).every((function(t) { return t })) })); if (e) return k = e, "break" }, M = p ? 3 : 1; M > 0; M--) { if ("break" === P(M)) break }
                e.placement !== k && (e.modifiersData[i]._skip = !0, e.placement = k, e.reset = !0)
            }
        },
        requiresIfExists: ["offset"],
        data: { _skip: !1 }
    };

    function Zt(t, e, n) { return void 0 === n && (n = { x: 0, y: 0 }), { top: t.top - e.height - n.y, right: t.right - e.width + n.x, bottom: t.bottom - e.height + n.y, left: t.left - e.width - n.x } }

    function Jt(t) { return [it, rt, ot, st].some((function(e) { return t[e] >= 0 })) }
    var te = {
        name: "hide",
        enabled: !0,
        phase: "main",
        requiresIfExists: ["preventOverflow"],
        fn: function(t) {
            var e = t.state,
                n = t.name,
                i = e.rects.reference,
                o = e.rects.popper,
                r = e.modifiersData.preventOverflow,
                s = Xt(e, { elementContext: "reference" }),
                a = Xt(e, { altBoundary: !0 }),
                l = Zt(s, i),
                c = Zt(a, o, r),
                u = Jt(l),
                f = Jt(c);
            e.modifiersData[n] = { referenceClippingOffsets: l, popperEscapeOffsets: c, isReferenceHidden: u, hasPopperEscaped: f }, e.attributes.popper = Object.assign(Object.assign({}, e.attributes.popper), {}, { "data-popper-reference-hidden": u, "data-popper-escaped": f })
        }
    };
    var ee = {
        name: "offset",
        enabled: !0,
        phase: "main",
        requires: ["popperOffsets"],
        fn: function(t) {
            var e = t.state,
                n = t.options,
                i = t.name,
                o = n.offset,
                r = void 0 === o ? [0, 0] : o,
                s = ct.reduce((function(t, n) {
                    return t[n] = function(t, e, n) {
                        var i = mt(t),
                            o = [st, it].indexOf(i) >= 0 ? -1 : 1,
                            r = "function" == typeof n ? n(Object.assign(Object.assign({}, e), {}, { placement: t })) : n,
                            s = r[0],
                            a = r[1];
                        return s = s || 0, a = (a || 0) * o, [st, rt].indexOf(i) >= 0 ? { x: a, y: s } : { x: s, y: a }
                    }(n, e.rects, r), t
                }), {}),
                a = s[e.placement],
                l = a.x,
                c = a.y;
            null != e.modifiersData.popperOffsets && (e.modifiersData.popperOffsets.x += l, e.modifiersData.popperOffsets.y += c), e.modifiersData[i] = s
        }
    };
    var ne = {
        name: "popperOffsets",
        enabled: !0,
        phase: "read",
        fn: function(t) {
            var e = t.state,
                n = t.name;
            e.modifiersData[n] = Vt({ reference: e.rects.reference, element: e.rects.popper, strategy: "absolute", placement: e.placement })
        },
        data: {}
    };
    var ie = {
        name: "preventOverflow",
        enabled: !0,
        phase: "main",
        fn: function(t) {
            var e = t.state,
                n = t.options,
                i = t.name,
                o = n.mainAxis,
                r = void 0 === o || o,
                s = n.altAxis,
                a = void 0 !== s && s,
                l = n.boundary,
                c = n.rootBoundary,
                u = n.altBoundary,
                f = n.padding,
                d = n.tether,
                h = void 0 === d || d,
                p = n.tetherOffset,
                g = void 0 === p ? 0 : p,
                m = Xt(e, { boundary: l, rootBoundary: c, padding: f, altBoundary: u }),
                v = mt(e.placement),
                _ = zt(e.placement),
                b = !_,
                y = Ot(v),
                w = "x" === y ? "y" : "x",
                E = e.modifiersData.popperOffsets,
                T = e.rects.reference,
                k = e.rects.popper,
                O = "function" == typeof g ? g(Object.assign(Object.assign({}, e.rects), {}, { placement: e.placement })) : g,
                L = { x: 0, y: 0 };
            if (E) {
                if (r) {
                    var A = "y" === y ? it : st,
                        C = "y" === y ? ot : rt,
                        D = "y" === y ? "height" : "width",
                        x = E[y],
                        S = E[y] + m[A],
                        j = E[y] - m[C],
                        N = h ? -k[D] / 2 : 0,
                        I = "start" === _ ? T[D] : k[D],
                        P = "start" === _ ? -k[D] : -T[D],
                        M = e.elements.arrow,
                        B = h && M ? vt(M) : { width: 0, height: 0 },
                        H = e.modifiersData["arrow#persistent"] ? e.modifiersData["arrow#persistent"].padding : { top: 0, right: 0, bottom: 0, left: 0 },
                        R = H[A],
                        W = H[C],
                        K = Lt(0, T[D], B[D]),
                        Q = b ? T[D] / 2 - N - K - R - O : I - K - R - O,
                        U = b ? -T[D] / 2 + N + K + W + O : P + K + W + O,
                        F = e.elements.arrow && kt(e.elements.arrow),
                        Y = F ? "y" === y ? F.clientTop || 0 : F.clientLeft || 0 : 0,
                        q = e.modifiersData.offset ? e.modifiersData.offset[e.placement][y] : 0,
                        z = E[y] + Q - q - Y,
                        V = E[y] + U - q,
                        X = Lt(h ? Math.min(S, z) : S, x, h ? Math.max(j, V) : j);
                    E[y] = X, L[y] = X - x
                }
                if (a) {
                    var $ = "x" === y ? it : st,
                        G = "x" === y ? ot : rt,
                        Z = E[w],
                        J = Lt(Z + m[$], Z, Z - m[G]);
                    E[w] = J, L[w] = J - Z
                }
                e.modifiersData[i] = L
            }
        },
        requiresIfExists: ["offset"]
    };

    function oe(t, e, n) {
        void 0 === n && (n = !1);
        var i, o, r = wt(e),
            s = Rt(t),
            a = pt(e),
            l = { scrollLeft: 0, scrollTop: 0 },
            c = { x: 0, y: 0 };
        return (a || !a && !n) && (("body" !== ft(e) || Qt(r)) && (l = (i = e) !== dt(i) && pt(i) ? { scrollLeft: (o = i).scrollLeft, scrollTop: o.scrollTop } : Wt(i)), pt(e) ? ((c = Rt(e)).x += e.clientLeft, c.y += e.clientTop) : r && (c.x = Kt(r))), { x: s.left + l.scrollLeft - c.x, y: s.top + l.scrollTop - c.y, width: s.width, height: s.height }
    }

    function re(t) {
        var e = new Map,
            n = new Set,
            i = [];
        return t.forEach((function(t) { e.set(t.name, t) })), t.forEach((function(t) {
            n.has(t.name) || function t(o) {
                n.add(o.name), [].concat(o.requires || [], o.requiresIfExists || []).forEach((function(i) {
                    if (!n.has(i)) {
                        var o = e.get(i);
                        o && t(o)
                    }
                })), i.push(o)
            }(t)
        })), i
    }
    var se = { placement: "bottom", modifiers: [], strategy: "absolute" };

    function ae() { for (var t = arguments.length, e = new Array(t), n = 0; n < t; n++) e[n] = arguments[n]; return !e.some((function(t) { return !(t && "function" == typeof t.getBoundingClientRect) })) }

    function le(t) {
        void 0 === t && (t = {});
        var e = t,
            n = e.defaultModifiers,
            i = void 0 === n ? [] : n,
            o = e.defaultOptions,
            r = void 0 === o ? se : o;
        return function(t, e, n) {
            void 0 === n && (n = r);
            var o, s, a = { placement: "bottom", orderedModifiers: [], options: Object.assign(Object.assign({}, se), r), modifiersData: {}, elements: { reference: t, popper: e }, attributes: {}, styles: {} },
                l = [],
                c = !1,
                u = {
                    state: a,
                    setOptions: function(n) {
                        f(), a.options = Object.assign(Object.assign(Object.assign({}, r), a.options), n), a.scrollParents = { reference: ht(t) ? Ut(t) : t.contextElement ? Ut(t.contextElement) : [], popper: Ut(e) };
                        var o, s, c = function(t) { var e = re(t); return ut.reduce((function(t, n) { return t.concat(e.filter((function(t) { return t.phase === n }))) }), []) }((o = [].concat(i, a.options.modifiers), s = o.reduce((function(t, e) { var n = t[e.name]; return t[e.name] = n ? Object.assign(Object.assign(Object.assign({}, n), e), {}, { options: Object.assign(Object.assign({}, n.options), e.options), data: Object.assign(Object.assign({}, n.data), e.data) }) : e, t }), {}), Object.keys(s).map((function(t) { return s[t] }))));
                        return a.orderedModifiers = c.filter((function(t) { return t.enabled })), a.orderedModifiers.forEach((function(t) {
                            var e = t.name,
                                n = t.options,
                                i = void 0 === n ? {} : n,
                                o = t.effect;
                            if ("function" == typeof o) {
                                var r = o({ state: a, name: e, instance: u, options: i }),
                                    s = function() {};
                                l.push(r || s)
                            }
                        })), u.update()
                    },
                    forceUpdate: function() {
                        if (!c) {
                            var t = a.elements,
                                e = t.reference,
                                n = t.popper;
                            if (ae(e, n)) {
                                a.rects = { reference: oe(e, kt(n), "fixed" === a.options.strategy), popper: vt(n) }, a.reset = !1, a.placement = a.options.placement, a.orderedModifiers.forEach((function(t) { return a.modifiersData[t.name] = Object.assign({}, t.data) }));
                                for (var i = 0; i < a.orderedModifiers.length; i++)
                                    if (!0 !== a.reset) {
                                        var o = a.orderedModifiers[i],
                                            r = o.fn,
                                            s = o.options,
                                            l = void 0 === s ? {} : s,
                                            f = o.name;
                                        "function" == typeof r && (a = r({ state: a, options: l, name: f, instance: u }) || a)
                                    } else a.reset = !1, i = -1
                            }
                        }
                    },
                    update: (o = function() { return new Promise((function(t) { u.forceUpdate(), t(a) })) }, function() { return s || (s = new Promise((function(t) { Promise.resolve().then((function() { s = void 0, t(o()) })) }))), s }),
                    destroy: function() { f(), c = !0 }
                };
            if (!ae(t, e)) return u;

            function f() { l.forEach((function(t) { return t() })), l = [] }
            return u.setOptions(n).then((function(t) {!c && n.onFirstUpdate && n.onFirstUpdate(t) })), u
        }
    }
    var ce = le(),
        ue = le({ defaultModifiers: [It, ne, jt, gt] }),
        fe = le({ defaultModifiers: [It, ne, jt, gt, ee, Gt, ie, Dt, te] }),
        de = Object.freeze({ __proto__: null, popperGenerator: le, detectOverflow: Xt, createPopperBase: ce, createPopper: fe, createPopperLite: ue, top: it, bottom: ot, right: rt, left: st, auto: "auto", basePlacements: at, start: "start", end: "end", clippingParents: "clippingParents", viewport: "viewport", popper: "popper", reference: "reference", variationPlacements: lt, placements: ct, beforeRead: "beforeRead", read: "read", afterRead: "afterRead", beforeMain: "beforeMain", main: "main", afterMain: "afterMain", beforeWrite: "beforeWrite", write: "write", afterWrite: "afterWrite", modifierPhases: ut, applyStyles: gt, arrow: Dt, computeStyles: jt, eventListeners: It, flip: Gt, hide: te, offset: ee, popperOffsets: ne, preventOverflow: ie }),
        he = "dropdown",
        pe = new RegExp("ArrowUp|ArrowDown|Escape"),
        ge = y ? "top-end" : "top-start",
        me = y ? "top-start" : "top-end",
        ve = y ? "bottom-end" : "bottom-start",
        _e = y ? "bottom-start" : "bottom-end",
        be = y ? "left-start" : "right-start",
        ye = y ? "right-start" : "left-start",
        we = { offset: 0, flip: !0, boundary: "clippingParents", reference: "toggle", display: "dynamic", popperConfig: null },
        Ee = { offset: "(number|string|function)", flip: "boolean", boundary: "(string|element)", reference: "(string|element)", display: "string", popperConfig: "(null|object)" },
        Te = function(t) {
            function o(e, n) { var i; return (i = t.call(this, e) || this)._popper = null, i._config = i._getConfig(n), i._menu = i._getMenuElement(), i._inNavbar = i._detectNavbar(), i._addEventListeners(), i }
            i(o, t);
            var r = o.prototype;
            return r.toggle = function() {
                if (!this._element.disabled && !this._element.classList.contains("disabled")) {
                    var t = this._element.classList.contains("show");
                    o.clearMenus(), t || this.show()
                }
            }, r.show = function() {
                if (!(this._element.disabled || this._element.classList.contains("disabled") || this._menu.classList.contains("show"))) {
                    var t = o.getParentFromElement(this._element),
                        e = { relatedTarget: this._element };
                    if (!H.trigger(this._element, "show.bs.dropdown", e).defaultPrevented) {
                        if (!this._inNavbar) { if (void 0 === de) throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org)"); var n = this._element; "parent" === this._config.reference ? n = t : d(this._config.reference) && (n = this._config.reference, void 0 !== this._config.reference.jquery && (n = this._config.reference[0])), this._popper = fe(n, this._menu, this._getPopperConfig()) }
                        var i;
                        if ("ontouchstart" in document.documentElement && !t.closest(".navbar-nav"))(i = []).concat.apply(i, document.body.children).forEach((function(t) { return H.on(t, "mouseover", null, (function() {})) }));
                        this._element.focus(), this._element.setAttribute("aria-expanded", !0), this._menu.classList.toggle("show"), this._element.classList.toggle("show"), H.trigger(t, "shown.bs.dropdown", e)
                    }
                }
            }, r.hide = function() {
                if (!this._element.disabled && !this._element.classList.contains("disabled") && this._menu.classList.contains("show")) {
                    var t = o.getParentFromElement(this._element),
                        e = { relatedTarget: this._element };
                    H.trigger(t, "hide.bs.dropdown", e).defaultPrevented || (this._popper && this._popper.destroy(), this._menu.classList.toggle("show"), this._element.classList.toggle("show"), H.trigger(t, "hidden.bs.dropdown", e))
                }
            }, r.dispose = function() { t.prototype.dispose.call(this), H.off(this._element, ".bs.dropdown"), this._menu = null, this._popper && (this._popper.destroy(), this._popper = null) }, r.update = function() { this._inNavbar = this._detectNavbar(), this._popper && this._popper.update() }, r._addEventListeners = function() {
                var t = this;
                H.on(this._element, "click.bs.dropdown", (function(e) { e.preventDefault(), e.stopPropagation(), t.toggle() }))
            }, r._getConfig = function(t) { return t = n({}, this.constructor.Default, Y.getDataAttributes(this._element), t), p(he, t, this.constructor.DefaultType), t }, r._getMenuElement = function() { return q.next(this._element, ".dropdown-menu")[0] }, r._getPlacement = function() { var t = this._element.parentNode; if (t.classList.contains("dropend")) return be; if (t.classList.contains("dropstart")) return ye; var e = "end" === getComputedStyle(this._menu).getPropertyValue("--bs-position").trim(); return t.classList.contains("dropup") ? e ? me : ge : e ? _e : ve }, r._detectNavbar = function() { return null !== this._element.closest(".navbar") }, r._getPopperConfig = function() { var t = { placement: this._getPlacement(), modifiers: [{ name: "preventOverflow", options: { altBoundary: this._config.flip, rootBoundary: this._config.boundary } }] }; return "static" === this._config.display && (t.modifiers = [{ name: "applyStyles", enabled: !1 }]), n({}, t, this._config.popperConfig) }, o.dropdownInterface = function(t, e) {
                var n = T(t, "bs.dropdown");
                if (n || (n = new o(t, "object" == typeof e ? e : null)), "string" == typeof e) {
                    if (void 0 === n[e]) throw new TypeError('No method named "' + e + '"');
                    n[e]()
                }
            }, o.jQueryInterface = function(t) { return this.each((function() { o.dropdownInterface(this, t) })) }, o.clearMenus = function(t) {
                if (!t || 2 !== t.button && ("keyup" !== t.type || "Tab" === t.key))
                    for (var e = q.find('[data-bs-toggle="dropdown"]'), n = 0, i = e.length; n < i; n++) {
                        var r = o.getParentFromElement(e[n]),
                            s = T(e[n], "bs.dropdown"),
                            a = { relatedTarget: e[n] };
                        if (t && "click" === t.type && (a.clickEvent = t), s) {
                            var l = s._menu;
                            if (e[n].classList.contains("show"))
                                if (!(t && ("click" === t.type && /input|textarea/i.test(t.target.tagName) || "keyup" === t.type && "Tab" === t.key) && l.contains(t.target)))
                                    if (!H.trigger(r, "hide.bs.dropdown", a).defaultPrevented) {
                                        var c;
                                        if ("ontouchstart" in document.documentElement)(c = []).concat.apply(c, document.body.children).forEach((function(t) { return H.off(t, "mouseover", null, (function() {})) }));
                                        e[n].setAttribute("aria-expanded", "false"), s._popper && s._popper.destroy(), l.classList.remove("show"), e[n].classList.remove("show"), H.trigger(r, "hidden.bs.dropdown", a)
                                    }
                        }
                    }
            }, o.getParentFromElement = function(t) { return c(t) || t.parentNode }, o.dataApiKeydownHandler = function(t) {
                if (!(/input|textarea/i.test(t.target.tagName) ? "Space" === t.key || "Escape" !== t.key && ("ArrowDown" !== t.key && "ArrowUp" !== t.key || t.target.closest(".dropdown-menu")) : !pe.test(t.key)) && (t.preventDefault(), t.stopPropagation(), !this.disabled && !this.classList.contains("disabled"))) {
                    var e = o.getParentFromElement(this),
                        n = this.classList.contains("show");
                    if ("Escape" === t.key) return (this.matches('[data-bs-toggle="dropdown"]') ? this : q.prev(this, '[data-bs-toggle="dropdown"]')[0]).focus(), void o.clearMenus();
                    if (n && "Space" !== t.key) { var i = q.find(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", e).filter(g); if (i.length) { var r = i.indexOf(t.target); "ArrowUp" === t.key && r > 0 && r--, "ArrowDown" === t.key && r < i.length - 1 && r++, i[r = -1 === r ? 0 : r].focus() } } else o.clearMenus()
                }
            }, e(o, null, [{ key: "Default", get: function() { return we } }, { key: "DefaultType", get: function() { return Ee } }, { key: "DATA_KEY", get: function() { return "bs.dropdown" } }]), o
        }(R);
    H.on(document, "keydown.bs.dropdown.data-api", '[data-bs-toggle="dropdown"]', Te.dataApiKeydownHandler), H.on(document, "keydown.bs.dropdown.data-api", ".dropdown-menu", Te.dataApiKeydownHandler), H.on(document, "click.bs.dropdown.data-api", Te.clearMenus), H.on(document, "keyup.bs.dropdown.data-api", Te.clearMenus), H.on(document, "click.bs.dropdown.data-api", '[data-bs-toggle="dropdown"]', (function(t) { t.preventDefault(), t.stopPropagation(), Te.dropdownInterface(this, "toggle") })), H.on(document, "click.bs.dropdown.data-api", ".dropdown form", (function(t) { return t.stopPropagation() })), b((function() {
        var t = _();
        if (t) {
            var e = t.fn[he];
            t.fn[he] = Te.jQueryInterface, t.fn[he].Constructor = Te, t.fn[he].noConflict = function() { return t.fn[he] = e, Te.jQueryInterface }
        }
    }));
    var ke = { backdrop: !0, keyboard: !0, focus: !0 },
        Oe = { backdrop: "(boolean|string)", keyboard: "boolean", focus: "boolean" },
        Le = function(t) {
            function o(e, n) { var i; return (i = t.call(this, e) || this)._config = i._getConfig(n), i._dialog = q.findOne(".modal-dialog", e), i._backdrop = null, i._isShown = !1, i._isBodyOverflowing = !1, i._ignoreBackdropClick = !1, i._isTransitioning = !1, i._scrollbarWidth = 0, i }
            i(o, t);
            var r = o.prototype;
            return r.toggle = function(t) { return this._isShown ? this.hide() : this.show(t) }, r.show = function(t) {
                var e = this;
                if (!this._isShown && !this._isTransitioning) {
                    this._element.classList.contains("fade") && (this._isTransitioning = !0);
                    var n = H.trigger(this._element, "show.bs.modal", { relatedTarget: t });
                    this._isShown || n.defaultPrevented || (this._isShown = !0, this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), this._setEscapeEvent(), this._setResizeEvent(), H.on(this._element, "click.dismiss.bs.modal", '[data-bs-dismiss="modal"]', (function(t) { return e.hide(t) })), H.on(this._dialog, "mousedown.dismiss.bs.modal", (function() { H.one(e._element, "mouseup.dismiss.bs.modal", (function(t) { t.target === e._element && (e._ignoreBackdropClick = !0) })) })), this._showBackdrop((function() { return e._showElement(t) })))
                }
            }, r.hide = function(t) {
                var e = this;
                if ((t && t.preventDefault(), this._isShown && !this._isTransitioning) && !H.trigger(this._element, "hide.bs.modal").defaultPrevented) {
                    this._isShown = !1;
                    var n = this._element.classList.contains("fade");
                    if (n && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), H.off(document, "focusin.bs.modal"), this._element.classList.remove("show"), H.off(this._element, "click.dismiss.bs.modal"), H.off(this._dialog, "mousedown.dismiss.bs.modal"), n) {
                        var i = u(this._element);
                        H.one(this._element, "transitionend", (function(t) { return e._hideModal(t) })), h(this._element, i)
                    } else this._hideModal()
                }
            }, r.dispose = function() {
                [window, this._element, this._dialog].forEach((function(t) { return H.off(t, ".bs.modal") })), t.prototype.dispose.call(this), H.off(document, "focusin.bs.modal"), this._config = null, this._dialog = null, this._backdrop = null, this._isShown = null, this._isBodyOverflowing = null, this._ignoreBackdropClick = null, this._isTransitioning = null, this._scrollbarWidth = null
            }, r.handleUpdate = function() { this._adjustDialog() }, r._getConfig = function(t) { return t = n({}, ke, t), p("modal", t, Oe), t }, r._showElement = function(t) {
                var e = this,
                    n = this._element.classList.contains("fade"),
                    i = q.findOne(".modal-body", this._dialog);
                this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), this._element.scrollTop = 0, i && (i.scrollTop = 0), n && v(this._element), this._element.classList.add("show"), this._config.focus && this._enforceFocus();
                var o = function() { e._config.focus && e._element.focus(), e._isTransitioning = !1, H.trigger(e._element, "shown.bs.modal", { relatedTarget: t }) };
                if (n) {
                    var r = u(this._dialog);
                    H.one(this._dialog, "transitionend", o), h(this._dialog, r)
                } else o()
            }, r._enforceFocus = function() {
                var t = this;
                H.off(document, "focusin.bs.modal"), H.on(document, "focusin.bs.modal", (function(e) { document === e.target || t._element === e.target || t._element.contains(e.target) || t._element.focus() }))
            }, r._setEscapeEvent = function() {
                var t = this;
                this._isShown ? H.on(this._element, "keydown.dismiss.bs.modal", (function(e) { t._config.keyboard && "Escape" === e.key ? (e.preventDefault(), t.hide()) : t._config.keyboard || "Escape" !== e.key || t._triggerBackdropTransition() })) : H.off(this._element, "keydown.dismiss.bs.modal")
            }, r._setResizeEvent = function() {
                var t = this;
                this._isShown ? H.on(window, "resize.bs.modal", (function() { return t._adjustDialog() })) : H.off(window, "resize.bs.modal")
            }, r._hideModal = function() {
                var t = this;
                this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._isTransitioning = !1, this._showBackdrop((function() { document.body.classList.remove("modal-open"), t._resetAdjustments(), t._resetScrollbar(), H.trigger(t._element, "hidden.bs.modal") }))
            }, r._removeBackdrop = function() { this._backdrop.parentNode.removeChild(this._backdrop), this._backdrop = null }, r._showBackdrop = function(t) {
                var e = this,
                    n = this._element.classList.contains("fade") ? "fade" : "";
                if (this._isShown && this._config.backdrop) {
                    if (this._backdrop = document.createElement("div"), this._backdrop.className = "modal-backdrop", n && this._backdrop.classList.add(n), document.body.appendChild(this._backdrop), H.on(this._element, "click.dismiss.bs.modal", (function(t) { e._ignoreBackdropClick ? e._ignoreBackdropClick = !1 : t.target === t.currentTarget && ("static" === e._config.backdrop ? e._triggerBackdropTransition() : e.hide()) })), n && v(this._backdrop), this._backdrop.classList.add("show"), !n) return void t();
                    var i = u(this._backdrop);
                    H.one(this._backdrop, "transitionend", t), h(this._backdrop, i)
                } else if (!this._isShown && this._backdrop) {
                    this._backdrop.classList.remove("show");
                    var o = function() { e._removeBackdrop(), t() };
                    if (this._element.classList.contains("fade")) {
                        var r = u(this._backdrop);
                        H.one(this._backdrop, "transitionend", o), h(this._backdrop, r)
                    } else o()
                } else t()
            }, r._triggerBackdropTransition = function() {
                var t = this;
                if (!H.trigger(this._element, "hidePrevented.bs.modal").defaultPrevented) {
                    var e = this._element.scrollHeight > document.documentElement.clientHeight;
                    e || (this._element.style.overflowY = "hidden"), this._element.classList.add("modal-static");
                    var n = u(this._dialog);
                    H.off(this._element, "transitionend"), H.one(this._element, "transitionend", (function() { t._element.classList.remove("modal-static"), e || (H.one(t._element, "transitionend", (function() { t._element.style.overflowY = "" })), h(t._element, n)) })), h(this._element, n), this._element.focus()
                }
            }, r._adjustDialog = function() {
                var t = this._element.scrollHeight > document.documentElement.clientHeight;
                (!this._isBodyOverflowing && t && !y || this._isBodyOverflowing && !t && y) && (this._element.style.paddingLeft = this._scrollbarWidth + "px"), (this._isBodyOverflowing && !t && !y || !this._isBodyOverflowing && t && y) && (this._element.style.paddingRight = this._scrollbarWidth + "px")
            }, r._resetAdjustments = function() { this._element.style.paddingLeft = "", this._element.style.paddingRight = "" }, r._checkScrollbar = function() {
                var t = document.body.getBoundingClientRect();
                this._isBodyOverflowing = Math.round(t.left + t.right) < window.innerWidth, this._scrollbarWidth = this._getScrollbarWidth()
            }, r._setScrollbar = function() {
                var t = this;
                if (this._isBodyOverflowing) {
                    q.find(".fixed-top, .fixed-bottom, .is-fixed, .sticky-top").forEach((function(e) {
                        var n = e.style.paddingRight,
                            i = window.getComputedStyle(e)["padding-right"];
                        Y.setDataAttribute(e, "padding-right", n), e.style.paddingRight = Number.parseFloat(i) + t._scrollbarWidth + "px"
                    })), q.find(".sticky-top").forEach((function(e) {
                        var n = e.style.marginRight,
                            i = window.getComputedStyle(e)["margin-right"];
                        Y.setDataAttribute(e, "margin-right", n), e.style.marginRight = Number.parseFloat(i) - t._scrollbarWidth + "px"
                    }));
                    var e = document.body.style.paddingRight,
                        n = window.getComputedStyle(document.body)["padding-right"];
                    Y.setDataAttribute(document.body, "padding-right", e), document.body.style.paddingRight = Number.parseFloat(n) + this._scrollbarWidth + "px"
                }
                document.body.classList.add("modal-open")
            }, r._resetScrollbar = function() {
                q.find(".fixed-top, .fixed-bottom, .is-fixed, .sticky-top").forEach((function(t) {
                    var e = Y.getDataAttribute(t, "padding-right");
                    void 0 !== e && (Y.removeDataAttribute(t, "padding-right"), t.style.paddingRight = e)
                })), q.find(".sticky-top").forEach((function(t) {
                    var e = Y.getDataAttribute(t, "margin-right");
                    void 0 !== e && (Y.removeDataAttribute(t, "margin-right"), t.style.marginRight = e)
                }));
                var t = Y.getDataAttribute(document.body, "padding-right");
                void 0 === t ? document.body.style.paddingRight = "" : (Y.removeDataAttribute(document.body, "padding-right"), document.body.style.paddingRight = t)
            }, r._getScrollbarWidth = function() {
                var t = document.createElement("div");
                t.className = "modal-scrollbar-measure", document.body.appendChild(t);
                var e = t.getBoundingClientRect().width - t.clientWidth;
                return document.body.removeChild(t), e
            }, o.jQueryInterface = function(t, e) {
                return this.each((function() {
                    var i = T(this, "bs.modal"),
                        r = n({}, ke, Y.getDataAttributes(this), "object" == typeof t && t ? t : {});
                    if (i || (i = new o(this, r)), "string" == typeof t) {
                        if (void 0 === i[t]) throw new TypeError('No method named "' + t + '"');
                        i[t](e)
                    }
                }))
            }, e(o, null, [{ key: "Default", get: function() { return ke } }, { key: "DATA_KEY", get: function() { return "bs.modal" } }]), o
        }(R);
    H.on(document, "click.bs.modal.data-api", '[data-bs-toggle="modal"]', (function(t) {
        var e = this,
            i = c(this);
        "A" !== this.tagName && "AREA" !== this.tagName || t.preventDefault(), H.one(i, "show.bs.modal", (function(t) { t.defaultPrevented || H.one(i, "hidden.bs.modal", (function() { g(e) && e.focus() })) }));
        var o = T(i, "bs.modal");
        if (!o) {
            var r = n({}, Y.getDataAttributes(i), Y.getDataAttributes(this));
            o = new Le(i, r)
        }
        o.show(this)
    })), b((function() {
        var t = _();
        if (t) {
            var e = t.fn.modal;
            t.fn.modal = Le.jQueryInterface, t.fn.modal.Constructor = Le, t.fn.modal.noConflict = function() { return t.fn.modal = e, Le.jQueryInterface }
        }
    }));
    var Ae = new Set(["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"]),
        Ce = /^(?:(?:https?|mailto|ftp|tel|file):|[^#&/:?]*(?:[#/?]|$))/gi,
        De = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i,
        xe = { "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i], a: ["target", "href", "title", "rel"], area: [], b: [], br: [], col: [], code: [], div: [], em: [], hr: [], h1: [], h2: [], h3: [], h4: [], h5: [], h6: [], i: [], img: ["src", "srcset", "alt", "title", "width", "height"], li: [], ol: [], p: [], pre: [], s: [], small: [], span: [], sub: [], sup: [], strong: [], u: [], ul: [] };

    function Se(t, e, n) {
        var i;
        if (!t.length) return t;
        if (n && "function" == typeof n) return n(t);
        for (var o = (new window.DOMParser).parseFromString(t, "text/html"), r = Object.keys(e), s = (i = []).concat.apply(i, o.body.querySelectorAll("*")), a = function(t, n) {
                var i, o = s[t],
                    a = o.nodeName.toLowerCase();
                if (!r.includes(a)) return o.parentNode.removeChild(o), "continue";
                var l = (i = []).concat.apply(i, o.attributes),
                    c = [].concat(e["*"] || [], e[a] || []);
                l.forEach((function(t) {
                    (function(t, e) {
                        var n = t.nodeName.toLowerCase();
                        if (e.includes(n)) return !Ae.has(n) || Boolean(t.nodeValue.match(Ce) || t.nodeValue.match(De));
                        for (var i = e.filter((function(t) { return t instanceof RegExp })), o = 0, r = i.length; o < r; o++)
                            if (n.match(i[o])) return !0;
                        return !1
                    })(t, c) || o.removeAttribute(t.nodeName)
                }))
            }, l = 0, c = s.length; l < c; l++) a(l);
        return o.body.innerHTML
    }
    var je = "tooltip",
        Ne = new RegExp("(^|\\s)bs-tooltip\\S+", "g"),
        Ie = new Set(["sanitize", "allowList", "sanitizeFn"]),
        Pe = { animation: "boolean", template: "string", title: "(string|element|function)", trigger: "string", delay: "(number|object)", html: "boolean", selector: "(string|boolean)", placement: "(string|function)", container: "(string|element|boolean)", fallbackPlacements: "(null|array)", boundary: "(string|element)", customClass: "(string|function)", sanitize: "boolean", sanitizeFn: "(null|function)", allowList: "object", popperConfig: "(null|object)" },
        Me = { AUTO: "auto", TOP: "top", RIGHT: y ? "left" : "right", BOTTOM: "bottom", LEFT: y ? "right" : "left" },
        Be = { animation: !0, template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>', trigger: "hover focus", title: "", delay: 0, html: !1, selector: !1, placement: "top", container: !1, fallbackPlacements: null, boundary: "clippingParents", customClass: "", sanitize: !0, sanitizeFn: null, allowList: xe, popperConfig: null },
        He = { HIDE: "hide.bs.tooltip", HIDDEN: "hidden.bs.tooltip", SHOW: "show.bs.tooltip", SHOWN: "shown.bs.tooltip", INSERTED: "inserted.bs.tooltip", CLICK: "click.bs.tooltip", FOCUSIN: "focusin.bs.tooltip", FOCUSOUT: "focusout.bs.tooltip", MOUSEENTER: "mouseenter.bs.tooltip", MOUSELEAVE: "mouseleave.bs.tooltip" },
        Re = function(t) {
            function o(e, n) { var i; if (void 0 === de) throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org)"); return (i = t.call(this, e) || this)._isEnabled = !0, i._timeout = 0, i._hoverState = "", i._activeTrigger = {}, i._popper = null, i.config = i._getConfig(n), i.tip = null, i._setListeners(), i }
            i(o, t);
            var r = o.prototype;
            return r.enable = function() { this._isEnabled = !0 }, r.disable = function() { this._isEnabled = !1 }, r.toggleEnabled = function() { this._isEnabled = !this._isEnabled }, r.toggle = function(t) {
                if (this._isEnabled)
                    if (t) {
                        var e = this.constructor.DATA_KEY,
                            n = T(t.delegateTarget, e);
                        n || (n = new this.constructor(t.delegateTarget, this._getDelegateConfig()), E(t.delegateTarget, e, n)), n._activeTrigger.click = !n._activeTrigger.click, n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n)
                    } else {
                        if (this.getTipElement().classList.contains("show")) return void this._leave(null, this);
                        this._enter(null, this)
                    }
            }, r.dispose = function() { clearTimeout(this._timeout), H.off(this._element, this.constructor.EVENT_KEY), H.off(this._element.closest(".modal"), "hide.bs.modal", this._hideModalHandler), this.tip && this.tip.parentNode.removeChild(this.tip), this._isEnabled = null, this._timeout = null, this._hoverState = null, this._activeTrigger = null, this._popper && this._popper.destroy(), this._popper = null, this.config = null, this.tip = null, t.prototype.dispose.call(this) }, r.show = function() {
                var t = this;
                if ("none" === this._element.style.display) throw new Error("Please use show on visible elements");
                if (this.isWithContent() && this._isEnabled) {
                    var e = H.trigger(this._element, this.constructor.Event.SHOW),
                        n = function t(e) { if (!document.documentElement.attachShadow) return null; if ("function" == typeof e.getRootNode) { var n = e.getRootNode(); return n instanceof ShadowRoot ? n : null } return e instanceof ShadowRoot ? e : e.parentNode ? t(e.parentNode) : null }(this._element),
                        i = null === n ? this._element.ownerDocument.documentElement.contains(this._element) : n.contains(this._element);
                    if (e.defaultPrevented || !i) return;
                    var o = this.getTipElement(),
                        r = s(this.constructor.NAME);
                    o.setAttribute("id", r), this._element.setAttribute("aria-describedby", r), this.setContent(), this.config.animation && o.classList.add("fade");
                    var a = "function" == typeof this.config.placement ? this.config.placement.call(this, o, this._element) : this.config.placement,
                        l = this._getAttachment(a);
                    this._addAttachmentClass(l);
                    var c = this._getContainer();
                    E(o, this.constructor.DATA_KEY, this), this._element.ownerDocument.documentElement.contains(this.tip) || c.appendChild(o), H.trigger(this._element, this.constructor.Event.INSERTED), this._popper = fe(this._element, o, this._getPopperConfig(l)), o.classList.add("show");
                    var f, d, p = "function" == typeof this.config.customClass ? this.config.customClass() : this.config.customClass;
                    if (p)(f = o.classList).add.apply(f, p.split(" "));
                    if ("ontouchstart" in document.documentElement)(d = []).concat.apply(d, document.body.children).forEach((function(t) { H.on(t, "mouseover", (function() {})) }));
                    var g = function() {
                        var e = t._hoverState;
                        t._hoverState = null, H.trigger(t._element, t.constructor.Event.SHOWN), "out" === e && t._leave(null, t)
                    };
                    if (this.tip.classList.contains("fade")) {
                        var m = u(this.tip);
                        H.one(this.tip, "transitionend", g), h(this.tip, m)
                    } else g()
                }
            }, r.hide = function() {
                var t = this;
                if (this._popper) {
                    var e = this.getTipElement(),
                        n = function() { "show" !== t._hoverState && e.parentNode && e.parentNode.removeChild(e), t._cleanTipClass(), t._element.removeAttribute("aria-describedby"), H.trigger(t._element, t.constructor.Event.HIDDEN), t._popper && (t._popper.destroy(), t._popper = null) };
                    if (!H.trigger(this._element, this.constructor.Event.HIDE).defaultPrevented) {
                        var i;
                        if (e.classList.remove("show"), "ontouchstart" in document.documentElement)(i = []).concat.apply(i, document.body.children).forEach((function(t) { return H.off(t, "mouseover", m) }));
                        if (this._activeTrigger.click = !1, this._activeTrigger.focus = !1, this._activeTrigger.hover = !1, this.tip.classList.contains("fade")) {
                            var o = u(e);
                            H.one(e, "transitionend", n), h(e, o)
                        } else n();
                        this._hoverState = ""
                    }
                }
            }, r.update = function() { null !== this._popper && this._popper.update() }, r.isWithContent = function() { return Boolean(this.getTitle()) }, r.getTipElement = function() { if (this.tip) return this.tip; var t = document.createElement("div"); return t.innerHTML = this.config.template, this.tip = t.children[0], this.tip }, r.setContent = function() {
                var t = this.getTipElement();
                this.setElementContent(q.findOne(".tooltip-inner", t), this.getTitle()), t.classList.remove("fade", "show")
            }, r.setElementContent = function(t, e) { if (null !== t) return "object" == typeof e && d(e) ? (e.jquery && (e = e[0]), void(this.config.html ? e.parentNode !== t && (t.innerHTML = "", t.appendChild(e)) : t.textContent = e.textContent)) : void(this.config.html ? (this.config.sanitize && (e = Se(e, this.config.allowList, this.config.sanitizeFn)), t.innerHTML = e) : t.textContent = e) }, r.getTitle = function() { var t = this._element.getAttribute("data-bs-original-title"); return t || (t = "function" == typeof this.config.title ? this.config.title.call(this._element) : this.config.title), t }, r.updateAttachment = function(t) { return "right" === t ? "end" : "left" === t ? "start" : t }, r._getPopperConfig = function(t) {
                var e = this,
                    i = { name: "flip", options: { altBoundary: !0 } };
                return this.config.fallbackPlacements && (i.options.fallbackPlacements = this.config.fallbackPlacements), n({}, { placement: t, modifiers: [i, { name: "preventOverflow", options: { rootBoundary: this.config.boundary } }, { name: "arrow", options: { element: "." + this.constructor.NAME + "-arrow" } }, { name: "onChange", enabled: !0, phase: "afterWrite", fn: function(t) { return e._handlePopperPlacementChange(t) } }], onFirstUpdate: function(t) { t.options.placement !== t.placement && e._handlePopperPlacementChange(t) } }, this.config.popperConfig)
            }, r._addAttachmentClass = function(t) { this.getTipElement().classList.add("bs-tooltip-" + this.updateAttachment(t)) }, r._getContainer = function() { return !1 === this.config.container ? document.body : d(this.config.container) ? this.config.container : q.findOne(this.config.container) }, r._getAttachment = function(t) { return Me[t.toUpperCase()] }, r._setListeners = function() {
                var t = this;
                this.config.trigger.split(" ").forEach((function(e) {
                    if ("click" === e) H.on(t._element, t.constructor.Event.CLICK, t.config.selector, (function(e) { return t.toggle(e) }));
                    else if ("manual" !== e) {
                        var n = "hover" === e ? t.constructor.Event.MOUSEENTER : t.constructor.Event.FOCUSIN,
                            i = "hover" === e ? t.constructor.Event.MOUSELEAVE : t.constructor.Event.FOCUSOUT;
                        H.on(t._element, n, t.config.selector, (function(e) { return t._enter(e) })), H.on(t._element, i, t.config.selector, (function(e) { return t._leave(e) }))
                    }
                })), this._hideModalHandler = function() { t._element && t.hide() }, H.on(this._element.closest(".modal"), "hide.bs.modal", this._hideModalHandler), this.config.selector ? this.config = n({}, this.config, { trigger: "manual", selector: "" }) : this._fixTitle()
            }, r._fixTitle = function() {
                var t = this._element.getAttribute("title"),
                    e = typeof this._element.getAttribute("data-bs-original-title");
                (t || "string" !== e) && (this._element.setAttribute("data-bs-original-title", t || ""), !t || this._element.getAttribute("aria-label") || this._element.textContent || this._element.setAttribute("aria-label", t), this._element.setAttribute("title", ""))
            }, r._enter = function(t, e) {
                var n = this.constructor.DATA_KEY;
                (e = e || T(t.delegateTarget, n)) || (e = new this.constructor(t.delegateTarget, this._getDelegateConfig()), E(t.delegateTarget, n, e)), t && (e._activeTrigger["focusin" === t.type ? "focus" : "hover"] = !0), e.getTipElement().classList.contains("show") || "show" === e._hoverState ? e._hoverState = "show" : (clearTimeout(e._timeout), e._hoverState = "show", e.config.delay && e.config.delay.show ? e._timeout = setTimeout((function() { "show" === e._hoverState && e.show() }), e.config.delay.show) : e.show())
            }, r._leave = function(t, e) {
                var n = this.constructor.DATA_KEY;
                (e = e || T(t.delegateTarget, n)) || (e = new this.constructor(t.delegateTarget, this._getDelegateConfig()), E(t.delegateTarget, n, e)), t && (e._activeTrigger["focusout" === t.type ? "focus" : "hover"] = !1), e._isWithActiveTrigger() || (clearTimeout(e._timeout), e._hoverState = "out", e.config.delay && e.config.delay.hide ? e._timeout = setTimeout((function() { "out" === e._hoverState && e.hide() }), e.config.delay.hide) : e.hide())
            }, r._isWithActiveTrigger = function() {
                for (var t in this._activeTrigger)
                    if (this._activeTrigger[t]) return !0;
                return !1
            }, r._getConfig = function(t) { var e = Y.getDataAttributes(this._element); return Object.keys(e).forEach((function(t) { Ie.has(t) && delete e[t] })), t && "object" == typeof t.container && t.container.jquery && (t.container = t.container[0]), "number" == typeof(t = n({}, this.constructor.Default, e, "object" == typeof t && t ? t : {})).delay && (t.delay = { show: t.delay, hide: t.delay }), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), p(je, t, this.constructor.DefaultType), t.sanitize && (t.template = Se(t.template, t.allowList, t.sanitizeFn)), t }, r._getDelegateConfig = function() {
                var t = {};
                if (this.config)
                    for (var e in this.config) this.constructor.Default[e] !== this.config[e] && (t[e] = this.config[e]);
                return t
            }, r._cleanTipClass = function() {
                var t = this.getTipElement(),
                    e = t.getAttribute("class").match(Ne);
                null !== e && e.length > 0 && e.map((function(t) { return t.trim() })).forEach((function(e) { return t.classList.remove(e) }))
            }, r._handlePopperPlacementChange = function(t) {
                var e = t.state;
                e && (this.tip = e.elements.popper, this._cleanTipClass(), this._addAttachmentClass(this._getAttachment(e.placement)))
            }, o.jQueryInterface = function(t) {
                return this.each((function() {
                    var e = T(this, "bs.tooltip"),
                        n = "object" == typeof t && t;
                    if ((e || !/dispose|hide/.test(t)) && (e || (e = new o(this, n)), "string" == typeof t)) {
                        if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                        e[t]()
                    }
                }))
            }, e(o, null, [{ key: "Default", get: function() { return Be } }, { key: "NAME", get: function() { return je } }, { key: "DATA_KEY", get: function() { return "bs.tooltip" } }, { key: "Event", get: function() { return He } }, { key: "EVENT_KEY", get: function() { return ".bs.tooltip" } }, { key: "DefaultType", get: function() { return Pe } }]), o
        }(R);
    b((function() {
        var t = _();
        if (t) {
            var e = t.fn[je];
            t.fn[je] = Re.jQueryInterface, t.fn[je].Constructor = Re, t.fn[je].noConflict = function() { return t.fn[je] = e, Re.jQueryInterface }
        }
    }));
    var We = "popover",
        Ke = new RegExp("(^|\\s)bs-popover\\S+", "g"),
        Qe = n({}, Re.Default, { placement: "right", trigger: "click", content: "", template: '<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>' }),
        Ue = n({}, Re.DefaultType, { content: "(string|element|function)" }),
        Fe = { HIDE: "hide.bs.popover", HIDDEN: "hidden.bs.popover", SHOW: "show.bs.popover", SHOWN: "shown.bs.popover", INSERTED: "inserted.bs.popover", CLICK: "click.bs.popover", FOCUSIN: "focusin.bs.popover", FOCUSOUT: "focusout.bs.popover", MOUSEENTER: "mouseenter.bs.popover", MOUSELEAVE: "mouseleave.bs.popover" },
        Ye = function(t) {
            function n() { return t.apply(this, arguments) || this }
            i(n, t);
            var o = n.prototype;
            return o.isWithContent = function() { return this.getTitle() || this._getContent() }, o.setContent = function() {
                var t = this.getTipElement();
                this.setElementContent(q.findOne(".popover-header", t), this.getTitle());
                var e = this._getContent();
                "function" == typeof e && (e = e.call(this._element)), this.setElementContent(q.findOne(".popover-body", t), e), t.classList.remove("fade", "show")
            }, o._addAttachmentClass = function(t) { this.getTipElement().classList.add("bs-popover-" + this.updateAttachment(t)) }, o._getContent = function() { return this._element.getAttribute("data-bs-content") || this.config.content }, o._cleanTipClass = function() {
                var t = this.getTipElement(),
                    e = t.getAttribute("class").match(Ke);
                null !== e && e.length > 0 && e.map((function(t) { return t.trim() })).forEach((function(e) { return t.classList.remove(e) }))
            }, n.jQueryInterface = function(t) {
                return this.each((function() {
                    var e = T(this, "bs.popover"),
                        i = "object" == typeof t ? t : null;
                    if ((e || !/dispose|hide/.test(t)) && (e || (e = new n(this, i), E(this, "bs.popover", e)), "string" == typeof t)) {
                        if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                        e[t]()
                    }
                }))
            }, e(n, null, [{ key: "Default", get: function() { return Qe } }, { key: "NAME", get: function() { return We } }, { key: "DATA_KEY", get: function() { return "bs.popover" } }, { key: "Event", get: function() { return Fe } }, { key: "EVENT_KEY", get: function() { return ".bs.popover" } }, { key: "DefaultType", get: function() { return Ue } }]), n
        }(Re);
    b((function() {
        var t = _();
        if (t) {
            var e = t.fn[We];
            t.fn[We] = Ye.jQueryInterface, t.fn[We].Constructor = Ye, t.fn[We].noConflict = function() { return t.fn[We] = e, Ye.jQueryInterface }
        }
    }));
    var qe = "scrollspy",
        ze = { offset: 10, method: "auto", target: "" },
        Ve = { offset: "number", method: "string", target: "(string|element)" },
        Xe = function(t) {
            function o(e, n) { var i; return (i = t.call(this, e) || this)._scrollElement = "BODY" === e.tagName ? window : e, i._config = i._getConfig(n), i._selector = i._config.target + " .nav-link, " + i._config.target + " .list-group-item, " + i._config.target + " .dropdown-item", i._offsets = [], i._targets = [], i._activeTarget = null, i._scrollHeight = 0, H.on(i._scrollElement, "scroll.bs.scrollspy", (function(t) { return i._process(t) })), i.refresh(), i._process(), i }
            i(o, t);
            var r = o.prototype;
            return r.refresh = function() {
                var t = this,
                    e = this._scrollElement === this._scrollElement.window ? "offset" : "position",
                    n = "auto" === this._config.method ? e : this._config.method,
                    i = "position" === n ? this._getScrollTop() : 0;
                this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), q.find(this._selector).map((function(t) {
                    var e = l(t),
                        o = e ? q.findOne(e) : null;
                    if (o) { var r = o.getBoundingClientRect(); if (r.width || r.height) return [Y[n](o).top + i, e] }
                    return null
                })).filter((function(t) { return t })).sort((function(t, e) { return t[0] - e[0] })).forEach((function(e) { t._offsets.push(e[0]), t._targets.push(e[1]) }))
            }, r.dispose = function() { t.prototype.dispose.call(this), H.off(this._scrollElement, ".bs.scrollspy"), this._scrollElement = null, this._config = null, this._selector = null, this._offsets = null, this._targets = null, this._activeTarget = null, this._scrollHeight = null }, r._getConfig = function(t) {
                if ("string" != typeof(t = n({}, ze, "object" == typeof t && t ? t : {})).target && d(t.target)) {
                    var e = t.target.id;
                    e || (e = s(qe), t.target.id = e), t.target = "#" + e
                }
                return p(qe, t, Ve), t
            }, r._getScrollTop = function() { return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop }, r._getScrollHeight = function() { return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight) }, r._getOffsetHeight = function() { return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height }, r._process = function() {
                var t = this._getScrollTop() + this._config.offset,
                    e = this._getScrollHeight(),
                    n = this._config.offset + e - this._getOffsetHeight();
                if (this._scrollHeight !== e && this.refresh(), t >= n) {
                    var i = this._targets[this._targets.length - 1];
                    this._activeTarget !== i && this._activate(i)
                } else { if (this._activeTarget && t < this._offsets[0] && this._offsets[0] > 0) return this._activeTarget = null, void this._clear(); for (var o = this._offsets.length; o--;) { this._activeTarget !== this._targets[o] && t >= this._offsets[o] && (void 0 === this._offsets[o + 1] || t < this._offsets[o + 1]) && this._activate(this._targets[o]) } }
            }, r._activate = function(t) {
                this._activeTarget = t, this._clear();
                var e = this._selector.split(",").map((function(e) { return e + '[data-bs-target="' + t + '"],' + e + '[href="' + t + '"]' })),
                    n = q.findOne(e.join(","));
                n.classList.contains("dropdown-item") ? (q.findOne(".dropdown-toggle", n.closest(".dropdown")).classList.add("active"), n.classList.add("active")) : (n.classList.add("active"), q.parents(n, ".nav, .list-group").forEach((function(t) { q.prev(t, ".nav-link, .list-group-item").forEach((function(t) { return t.classList.add("active") })), q.prev(t, ".nav-item").forEach((function(t) { q.children(t, ".nav-link").forEach((function(t) { return t.classList.add("active") })) })) }))), H.trigger(this._scrollElement, "activate.bs.scrollspy", { relatedTarget: t })
            }, r._clear = function() { q.find(this._selector).filter((function(t) { return t.classList.contains("active") })).forEach((function(t) { return t.classList.remove("active") })) }, o.jQueryInterface = function(t) {
                return this.each((function() {
                    var e = T(this, "bs.scrollspy");
                    if (e || (e = new o(this, "object" == typeof t && t)), "string" == typeof t) {
                        if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                        e[t]()
                    }
                }))
            }, e(o, null, [{ key: "Default", get: function() { return ze } }, { key: "DATA_KEY", get: function() { return "bs.scrollspy" } }]), o
        }(R);
    H.on(window, "load.bs.scrollspy.data-api", (function() { q.find('[data-bs-spy="scroll"]').forEach((function(t) { return new Xe(t, Y.getDataAttributes(t)) })) })), b((function() {
        var t = _();
        if (t) {
            var e = t.fn[qe];
            t.fn[qe] = Xe.jQueryInterface, t.fn[qe].Constructor = Xe, t.fn[qe].noConflict = function() { return t.fn[qe] = e, Xe.jQueryInterface }
        }
    }));
    var $e = function(t) {
        function n() { return t.apply(this, arguments) || this }
        i(n, t);
        var o = n.prototype;
        return o.show = function() {
            var t = this;
            if (!(this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && this._element.classList.contains("active") || this._element.classList.contains("disabled"))) {
                var e, n = c(this._element),
                    i = this._element.closest(".nav, .list-group");
                if (i) {
                    var o = "UL" === i.nodeName || "OL" === i.nodeName ? ":scope > li > .active" : ".active";
                    e = (e = q.find(o, i))[e.length - 1]
                }
                var r = null;
                if (e && (r = H.trigger(e, "hide.bs.tab", { relatedTarget: this._element })), !(H.trigger(this._element, "show.bs.tab", { relatedTarget: e }).defaultPrevented || null !== r && r.defaultPrevented)) {
                    this._activate(this._element, i);
                    var s = function() { H.trigger(e, "hidden.bs.tab", { relatedTarget: t._element }), H.trigger(t._element, "shown.bs.tab", { relatedTarget: e }) };
                    n ? this._activate(n, n.parentNode, s) : s()
                }
            }
        }, o._activate = function(t, e, n) {
            var i = this,
                o = (!e || "UL" !== e.nodeName && "OL" !== e.nodeName ? q.children(e, ".active") : q.find(":scope > li > .active", e))[0],
                r = n && o && o.classList.contains("fade"),
                s = function() { return i._transitionComplete(t, o, n) };
            if (o && r) {
                var a = u(o);
                o.classList.remove("show"), H.one(o, "transitionend", s), h(o, a)
            } else s()
        }, o._transitionComplete = function(t, e, n) {
            if (e) {
                e.classList.remove("active");
                var i = q.findOne(":scope > .dropdown-menu .active", e.parentNode);
                i && i.classList.remove("active"), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !1)
            }(t.classList.add("active"), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !0), v(t), t.classList.contains("fade") && t.classList.add("show"), t.parentNode && t.parentNode.classList.contains("dropdown-menu")) && (t.closest(".dropdown") && q.find(".dropdown-toggle").forEach((function(t) { return t.classList.add("active") })), t.setAttribute("aria-expanded", !0));
            n && n()
        }, n.jQueryInterface = function(t) {
            return this.each((function() {
                var e = T(this, "bs.tab") || new n(this);
                if ("string" == typeof t) {
                    if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                    e[t]()
                }
            }))
        }, e(n, null, [{ key: "DATA_KEY", get: function() { return "bs.tab" } }]), n
    }(R);
    H.on(document, "click.bs.tab.data-api", '[data-bs-toggle="tab"], [data-bs-toggle="pill"], [data-bs-toggle="list"]', (function(t) { t.preventDefault(), (T(this, "bs.tab") || new $e(this)).show() })), b((function() {
        var t = _();
        if (t) {
            var e = t.fn.tab;
            t.fn.tab = $e.jQueryInterface, t.fn.tab.Constructor = $e, t.fn.tab.noConflict = function() { return t.fn.tab = e, $e.jQueryInterface }
        }
    }));
    var Ge = { animation: "boolean", autohide: "boolean", delay: "number" },
        Ze = { animation: !0, autohide: !0, delay: 5e3 },
        Je = function(t) {
            function o(e, n) { var i; return (i = t.call(this, e) || this)._config = i._getConfig(n), i._timeout = null, i._setListeners(), i }
            i(o, t);
            var r = o.prototype;
            return r.show = function() {
                var t = this;
                if (!H.trigger(this._element, "show.bs.toast").defaultPrevented) {
                    this._clearTimeout(), this._config.animation && this._element.classList.add("fade");
                    var e = function() { t._element.classList.remove("showing"), t._element.classList.add("show"), H.trigger(t._element, "shown.bs.toast"), t._config.autohide && (t._timeout = setTimeout((function() { t.hide() }), t._config.delay)) };
                    if (this._element.classList.remove("hide"), v(this._element), this._element.classList.add("showing"), this._config.animation) {
                        var n = u(this._element);
                        H.one(this._element, "transitionend", e), h(this._element, n)
                    } else e()
                }
            }, r.hide = function() {
                var t = this;
                if (this._element.classList.contains("show") && !H.trigger(this._element, "hide.bs.toast").defaultPrevented) {
                    var e = function() { t._element.classList.add("hide"), H.trigger(t._element, "hidden.bs.toast") };
                    if (this._element.classList.remove("show"), this._config.animation) {
                        var n = u(this._element);
                        H.one(this._element, "transitionend", e), h(this._element, n)
                    } else e()
                }
            }, r.dispose = function() { this._clearTimeout(), this._element.classList.contains("show") && this._element.classList.remove("show"), H.off(this._element, "click.dismiss.bs.toast"), t.prototype.dispose.call(this), this._config = null }, r._getConfig = function(t) { return t = n({}, Ze, Y.getDataAttributes(this._element), "object" == typeof t && t ? t : {}), p("toast", t, this.constructor.DefaultType), t }, r._setListeners = function() {
                var t = this;
                H.on(this._element, "click.dismiss.bs.toast", '[data-bs-dismiss="toast"]', (function() { return t.hide() }))
            }, r._clearTimeout = function() { clearTimeout(this._timeout), this._timeout = null }, o.jQueryInterface = function(t) {
                return this.each((function() {
                    var e = T(this, "bs.toast");
                    if (e || (e = new o(this, "object" == typeof t && t)), "string" == typeof t) {
                        if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                        e[t](this)
                    }
                }))
            }, e(o, null, [{ key: "DefaultType", get: function() { return Ge } }, { key: "Default", get: function() { return Ze } }, { key: "DATA_KEY", get: function() { return "bs.toast" } }]), o
        }(R);
    return b((function() {
        var t = _();
        if (t) {
            var e = t.fn.toast;
            t.fn.toast = Je.jQueryInterface, t.fn.toast.Constructor = Je, t.fn.toast.noConflict = function() { return t.fn.toast = e, Je.jQueryInterface }
        }
    })), { Alert: K, Button: Q, Carousel: Z, Collapse: nt, Dropdown: Te, Modal: Le, Popover: Ye, ScrollSpy: Xe, Tab: $e, Toast: Je, Tooltip: Re }
}));
/*
 Copyright (C) Federico Zivolo 2019
 Distributed under the MIT License (license terms are at http://opensource.org/licenses/MIT).
 */
(function (e, t) {
    'object' == typeof exports && 'undefined' != typeof module ? module.exports = t() : 'function' == typeof define && define.amd ? define(t) : e.Popper = t()
})(this, function () {
    'use strict';

    function e(e) {
        return e && '[object Function]' === {}.toString.call(e)
    }

    function t(e, t) {
        if (1 !== e.nodeType) return [];
        var o = e.ownerDocument.defaultView,
            n = o.getComputedStyle(e, null);
        return t ? n[t] : n
    }

    function o(e) {
        return 'HTML' === e.nodeName ? e : e.parentNode || e.host
    }

    function n(e) {
        if (!e) return document.body;
        switch (e.nodeName) {
            case 'HTML':
            case 'BODY':
                return e.ownerDocument.body;
            case '#document':
                return e.body;
        }
        var i = t(e),
            r = i.overflow,
            p = i.overflowX,
            s = i.overflowY;
        return /(auto|scroll|overlay)/.test(r + s + p) ? e : n(o(e))
    }

    function r(e) {
        return 11 === e ? pe : 10 === e ? se : pe || se
    }

    function p(e) {
        if (!e) return document.documentElement;
        for (var o = r(10) ? document.body : null, n = e.offsetParent || null; n === o && e.nextElementSibling;) n = (e = e.nextElementSibling).offsetParent;
        var i = n && n.nodeName;
        return i && 'BODY' !== i && 'HTML' !== i ? -1 !== ['TH', 'TD', 'TABLE'].indexOf(n.nodeName) && 'static' === t(n, 'position') ? p(n) : n : e ? e.ownerDocument.documentElement : document.documentElement
    }

    function s(e) {
        var t = e.nodeName;
        return 'BODY' !== t && ('HTML' === t || p(e.firstElementChild) === e)
    }

    function d(e) {
        return null === e.parentNode ? e : d(e.parentNode)
    }

    function a(e, t) {
        if (!e || !e.nodeType || !t || !t.nodeType) return document.documentElement;
        var o = e.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING,
            n = o ? e : t,
            i = o ? t : e,
            r = document.createRange();
        r.setStart(n, 0), r.setEnd(i, 0);
        var l = r.commonAncestorContainer;
        if (e !== l && t !== l || n.contains(i)) return s(l) ? l : p(l);
        var f = d(e);
        return f.host ? a(f.host, t) : a(e, d(t).host)
    }

    function l(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : 'top',
            o = 'top' === t ? 'scrollTop' : 'scrollLeft',
            n = e.nodeName;
        if ('BODY' === n || 'HTML' === n) {
            var i = e.ownerDocument.documentElement,
                r = e.ownerDocument.scrollingElement || i;
            return r[o]
        }
        return e[o]
    }

    function f(e, t) {
        var o = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
            n = l(t, 'top'),
            i = l(t, 'left'),
            r = o ? -1 : 1;
        return e.top += n * r, e.bottom += n * r, e.left += i * r, e.right += i * r, e
    }

    function m(e, t) {
        var o = 'x' === t ? 'Left' : 'Top',
            n = 'Left' == o ? 'Right' : 'Bottom';
        return parseFloat(e['border' + o + 'Width'], 10) + parseFloat(e['border' + n + 'Width'], 10)
    }

    function h(e, t, o, n) {
        return ee(t['offset' + e], t['scroll' + e], o['client' + e], o['offset' + e], o['scroll' + e], r(10) ? parseInt(o['offset' + e]) + parseInt(n['margin' + ('Height' === e ? 'Top' : 'Left')]) + parseInt(n['margin' + ('Height' === e ? 'Bottom' : 'Right')]) : 0)
    }

    function c(e) {
        var t = e.body,
            o = e.documentElement,
            n = r(10) && getComputedStyle(o);
        return {
            height: h('Height', t, o, n),
            width: h('Width', t, o, n)
        }
    }

    function g(e) {
        return fe({}, e, {
            right: e.left + e.width,
            bottom: e.top + e.height
        })
    }

    function u(e) {
        var o = {};
        try {
            if (r(10)) {
                o = e.getBoundingClientRect();
                var n = l(e, 'top'),
                    i = l(e, 'left');
                o.top += n, o.left += i, o.bottom += n, o.right += i
            } else o = e.getBoundingClientRect()
        } catch (t) {}
        var p = {
                left: o.left,
                top: o.top,
                width: o.right - o.left,
                height: o.bottom - o.top
            },
            s = 'HTML' === e.nodeName ? c(e.ownerDocument) : {},
            d = s.width || e.clientWidth || p.right - p.left,
            a = s.height || e.clientHeight || p.bottom - p.top,
            f = e.offsetWidth - d,
            h = e.offsetHeight - a;
        if (f || h) {
            var u = t(e);
            f -= m(u, 'x'), h -= m(u, 'y'), p.width -= f, p.height -= h
        }
        return g(p)
    }

    function b(e, o) {
        var i = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
            p = r(10),
            s = 'HTML' === o.nodeName,
            d = u(e),
            a = u(o),
            l = n(e),
            m = t(o),
            h = parseFloat(m.borderTopWidth, 10),
            c = parseFloat(m.borderLeftWidth, 10);
        i && s && (a.top = ee(a.top, 0), a.left = ee(a.left, 0));
        var b = g({
            top: d.top - a.top - h,
            left: d.left - a.left - c,
            width: d.width,
            height: d.height
        });
        if (b.marginTop = 0, b.marginLeft = 0, !p && s) {
            var w = parseFloat(m.marginTop, 10),
                y = parseFloat(m.marginLeft, 10);
            b.top -= h - w, b.bottom -= h - w, b.left -= c - y, b.right -= c - y, b.marginTop = w, b.marginLeft = y
        }
        return (p && !i ? o.contains(l) : o === l && 'BODY' !== l.nodeName) && (b = f(b, o)), b
    }

    function w(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
            o = e.ownerDocument.documentElement,
            n = b(e, o),
            i = ee(o.clientWidth, window.innerWidth || 0),
            r = ee(o.clientHeight, window.innerHeight || 0),
            p = t ? 0 : l(o),
            s = t ? 0 : l(o, 'left'),
            d = {
                top: p - n.top + n.marginTop,
                left: s - n.left + n.marginLeft,
                width: i,
                height: r
            };
        return g(d)
    }

    function y(e) {
        var n = e.nodeName;
        if ('BODY' === n || 'HTML' === n) return !1;
        if ('fixed' === t(e, 'position')) return !0;
        var i = o(e);
        return !!i && y(i)
    }

    function E(e) {
        if (!e || !e.parentElement || r()) return document.documentElement;
        for (var o = e.parentElement; o && 'none' === t(o, 'transform');) o = o.parentElement;
        return o || document.documentElement
    }

    function v(e, t, i, r) {
        var p = 4 < arguments.length && void 0 !== arguments[4] && arguments[4],
            s = {
                top: 0,
                left: 0
            },
            d = p ? E(e) : a(e, t);
        if ('viewport' === r) s = w(d, p);
        else {
            var l;
            'scrollParent' === r ? (l = n(o(t)), 'BODY' === l.nodeName && (l = e.ownerDocument.documentElement)) : 'window' === r ? l = e.ownerDocument.documentElement : l = r;
            var f = b(l, d, p);
            if ('HTML' === l.nodeName && !y(d)) {
                var m = c(e.ownerDocument),
                    h = m.height,
                    g = m.width;
                s.top += f.top - f.marginTop, s.bottom = h + f.top, s.left += f.left - f.marginLeft, s.right = g + f.left
            } else s = f
        }
        i = i || 0;
        var u = 'number' == typeof i;
        return s.left += u ? i : i.left || 0, s.top += u ? i : i.top || 0, s.right -= u ? i : i.right || 0, s.bottom -= u ? i : i.bottom || 0, s
    }

    function x(e) {
        var t = e.width,
            o = e.height;
        return t * o
    }

    function O(e, t, o, n, i) {
        var r = 5 < arguments.length && void 0 !== arguments[5] ? arguments[5] : 0;
        if (-1 === e.indexOf('auto')) return e;
        var p = v(o, n, r, i),
            s = {
                top: {
                    width: p.width,
                    height: t.top - p.top
                },
                right: {
                    width: p.right - t.right,
                    height: p.height
                },
                bottom: {
                    width: p.width,
                    height: p.bottom - t.bottom
                },
                left: {
                    width: t.left - p.left,
                    height: p.height
                }
            },
            d = Object.keys(s).map(function (e) {
                return fe({
                    key: e
                }, s[e], {
                    area: x(s[e])
                })
            }).sort(function (e, t) {
                return t.area - e.area
            }),
            a = d.filter(function (e) {
                var t = e.width,
                    n = e.height;
                return t >= o.clientWidth && n >= o.clientHeight
            }),
            l = 0 < a.length ? a[0].key : d[0].key,
            f = e.split('-')[1];
        return l + (f ? '-' + f : '')
    }

    function L(e, t, o) {
        var n = 3 < arguments.length && void 0 !== arguments[3] ? arguments[3] : null,
            i = n ? E(t) : a(t, o);
        return b(o, i, n)
    }

    function S(e) {
        var t = e.ownerDocument.defaultView,
            o = t.getComputedStyle(e),
            n = parseFloat(o.marginTop || 0) + parseFloat(o.marginBottom || 0),
            i = parseFloat(o.marginLeft || 0) + parseFloat(o.marginRight || 0),
            r = {
                width: e.offsetWidth + i,
                height: e.offsetHeight + n
            };
        return r
    }

    function T(e) {
        var t = {
            left: 'right',
            right: 'left',
            bottom: 'top',
            top: 'bottom'
        };
        return e.replace(/left|right|bottom|top/g, function (e) {
            return t[e]
        })
    }

    function D(e, t, o) {
        o = o.split('-')[0];
        var n = S(e),
            i = {
                width: n.width,
                height: n.height
            },
            r = -1 !== ['right', 'left'].indexOf(o),
            p = r ? 'top' : 'left',
            s = r ? 'left' : 'top',
            d = r ? 'height' : 'width',
            a = r ? 'width' : 'height';
        return i[p] = t[p] + t[d] / 2 - n[d] / 2, i[s] = o === s ? t[s] - n[a] : t[T(s)], i
    }

    function C(e, t) {
        return Array.prototype.find ? e.find(t) : e.filter(t)[0]
    }

    function N(e, t, o) {
        if (Array.prototype.findIndex) return e.findIndex(function (e) {
            return e[t] === o
        });
        var n = C(e, function (e) {
            return e[t] === o
        });
        return e.indexOf(n)
    }

    function P(t, o, n) {
        var i = void 0 === n ? t : t.slice(0, N(t, 'name', n));
        return i.forEach(function (t) {
            t['function'] && console.warn('`modifier.function` is deprecated, use `modifier.fn`!');
            var n = t['function'] || t.fn;
            t.enabled && e(n) && (o.offsets.popper = g(o.offsets.popper), o.offsets.reference = g(o.offsets.reference), o = n(o, t))
        }), o
    }

    function k() {
        if (!this.state.isDestroyed) {
            var e = {
                instance: this,
                styles: {},
                arrowStyles: {},
                attributes: {},
                flipped: !1,
                offsets: {}
            };
            e.offsets.reference = L(this.state, this.popper, this.reference, this.options.positionFixed), e.placement = O(this.options.placement, e.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding), e.originalPlacement = e.placement, e.positionFixed = this.options.positionFixed, e.offsets.popper = D(this.popper, e.offsets.reference, e.placement), e.offsets.popper.position = this.options.positionFixed ? 'fixed' : 'absolute', e = P(this.modifiers, e), this.state.isCreated ? this.options.onUpdate(e) : (this.state.isCreated = !0, this.options.onCreate(e))
        }
    }

    function W(e, t) {
        return e.some(function (e) {
            var o = e.name,
                n = e.enabled;
            return n && o === t
        })
    }

    function H(e) {
        for (var t = [!1, 'ms', 'Webkit', 'Moz', 'O'], o = e.charAt(0).toUpperCase() + e.slice(1), n = 0; n < t.length; n++) {
            var i = t[n],
                r = i ? '' + i + o : e;
            if ('undefined' != typeof document.body.style[r]) return r
        }
        return null
    }

    function B() {
        return this.state.isDestroyed = !0, W(this.modifiers, 'applyStyle') && (this.popper.removeAttribute('x-placement'), this.popper.style.position = '', this.popper.style.top = '', this.popper.style.left = '', this.popper.style.right = '', this.popper.style.bottom = '', this.popper.style.willChange = '', this.popper.style[H('transform')] = ''), this.disableEventListeners(), this.options.removeOnDestroy && this.popper.parentNode.removeChild(this.popper), this
    }

    function A(e) {
        var t = e.ownerDocument;
        return t ? t.defaultView : window
    }

    function M(e, t, o, i) {
        var r = 'BODY' === e.nodeName,
            p = r ? e.ownerDocument.defaultView : e;
        p.addEventListener(t, o, {
            passive: !0
        }), r || M(n(p.parentNode), t, o, i), i.push(p)
    }

    function F(e, t, o, i) {
        o.updateBound = i, A(e).addEventListener('resize', o.updateBound, {
            passive: !0
        });
        var r = n(e);
        return M(r, 'scroll', o.updateBound, o.scrollParents), o.scrollElement = r, o.eventsEnabled = !0, o
    }

    function I() {
        this.state.eventsEnabled || (this.state = F(this.reference, this.options, this.state, this.scheduleUpdate))
    }

    function R(e, t) {
        return A(e).removeEventListener('resize', t.updateBound), t.scrollParents.forEach(function (e) {
            e.removeEventListener('scroll', t.updateBound)
        }), t.updateBound = null, t.scrollParents = [], t.scrollElement = null, t.eventsEnabled = !1, t
    }

    function U() {
        this.state.eventsEnabled && (cancelAnimationFrame(this.scheduleUpdate), this.state = R(this.reference, this.state))
    }

    function Y(e) {
        return '' !== e && !isNaN(parseFloat(e)) && isFinite(e)
    }

    function j(e, t) {
        Object.keys(t).forEach(function (o) {
            var n = ''; - 1 !== ['width', 'height', 'top', 'right', 'bottom', 'left'].indexOf(o) && Y(t[o]) && (n = 'px'), e.style[o] = t[o] + n
        })
    }

    function V(e, t) {
        Object.keys(t).forEach(function (o) {
            var n = t[o];
            !1 === n ? e.removeAttribute(o) : e.setAttribute(o, t[o])
        })
    }

    function q(e, t) {
        var o = e.offsets,
            n = o.popper,
            i = o.reference,
            r = $,
            p = function (e) {
                return e
            },
            s = r(i.width),
            d = r(n.width),
            a = -1 !== ['left', 'right'].indexOf(e.placement),
            l = -1 !== e.placement.indexOf('-'),
            f = t ? a || l || s % 2 == d % 2 ? r : Z : p,
            m = t ? r : p;
        return {
            left: f(1 == s % 2 && 1 == d % 2 && !l && t ? n.left - 1 : n.left),
            top: m(n.top),
            bottom: m(n.bottom),
            right: f(n.right)
        }
    }

    function K(e, t, o) {
        var n = C(e, function (e) {
                var o = e.name;
                return o === t
            }),
            i = !!n && e.some(function (e) {
                return e.name === o && e.enabled && e.order < n.order
            });
        if (!i) {
            var r = '`' + t + '`';
            console.warn('`' + o + '`' + ' modifier is required by ' + r + ' modifier in order to work, be sure to include it before ' + r + '!')
        }
        return i
    }

    function z(e) {
        return 'end' === e ? 'start' : 'start' === e ? 'end' : e
    }

    function G(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
            o = ce.indexOf(e),
            n = ce.slice(o + 1).concat(ce.slice(0, o));
        return t ? n.reverse() : n
    }

    function _(e, t, o, n) {
        var i = e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
            r = +i[1],
            p = i[2];
        if (!r) return e;
        if (0 === p.indexOf('%')) {
            var s;
            switch (p) {
                case '%p':
                    s = o;
                    break;
                case '%':
                case '%r':
                default:
                    s = n;
            }
            var d = g(s);
            return d[t] / 100 * r
        }
        if ('vh' === p || 'vw' === p) {
            var a;
            return a = 'vh' === p ? ee(document.documentElement.clientHeight, window.innerHeight || 0) : ee(document.documentElement.clientWidth, window.innerWidth || 0), a / 100 * r
        }
        return r
    }

    function X(e, t, o, n) {
        var i = [0, 0],
            r = -1 !== ['right', 'left'].indexOf(n),
            p = e.split(/(\+|\-)/).map(function (e) {
                return e.trim()
            }),
            s = p.indexOf(C(p, function (e) {
                return -1 !== e.search(/,|\s/)
            }));
        p[s] && -1 === p[s].indexOf(',') && console.warn('Offsets separated by white space(s) are deprecated, use a comma (,) instead.');
        var d = /\s*,\s*|\s+/,
            a = -1 === s ? [p] : [p.slice(0, s).concat([p[s].split(d)[0]]), [p[s].split(d)[1]].concat(p.slice(s + 1))];
        return a = a.map(function (e, n) {
            var i = (1 === n ? !r : r) ? 'height' : 'width',
                p = !1;
            return e.reduce(function (e, t) {
                return '' === e[e.length - 1] && -1 !== ['+', '-'].indexOf(t) ? (e[e.length - 1] = t, p = !0, e) : p ? (e[e.length - 1] += t, p = !1, e) : e.concat(t)
            }, []).map(function (e) {
                return _(e, i, t, o)
            })
        }), a.forEach(function (e, t) {
            e.forEach(function (o, n) {
                Y(o) && (i[t] += o * ('-' === e[n - 1] ? -1 : 1))
            })
        }), i
    }

    function J(e, t) {
        var o, n = t.offset,
            i = e.placement,
            r = e.offsets,
            p = r.popper,
            s = r.reference,
            d = i.split('-')[0];
        return o = Y(+n) ? [+n, 0] : X(n, p, s, d), 'left' === d ? (p.top += o[0], p.left -= o[1]) : 'right' === d ? (p.top += o[0], p.left += o[1]) : 'top' === d ? (p.left += o[0], p.top -= o[1]) : 'bottom' === d && (p.left += o[0], p.top += o[1]), e.popper = p, e
    }
    for (var Q = Math.min, Z = Math.floor, $ = Math.round, ee = Math.max, te = 'undefined' != typeof window && 'undefined' != typeof document, oe = ['Edge', 'Trident', 'Firefox'], ne = 0, ie = 0; ie < oe.length; ie += 1)
        if (te && 0 <= navigator.userAgent.indexOf(oe[ie])) {
            ne = 1;
            break
        } var i = te && window.Promise,
        re = i ? function (e) {
            var t = !1;
            return function () {
                t || (t = !0, window.Promise.resolve().then(function () {
                    t = !1, e()
                }))
            }
        } : function (e) {
            var t = !1;
            return function () {
                t || (t = !0, setTimeout(function () {
                    t = !1, e()
                }, ne))
            }
        },
        pe = te && !!(window.MSInputMethodContext && document.documentMode),
        se = te && /MSIE 10/.test(navigator.userAgent),
        de = function (e, t) {
            if (!(e instanceof t)) throw new TypeError('Cannot call a class as a function')
        },
        ae = function () {
            function e(e, t) {
                for (var o, n = 0; n < t.length; n++) o = t[n], o.enumerable = o.enumerable || !1, o.configurable = !0, 'value' in o && (o.writable = !0), Object.defineProperty(e, o.key, o)
            }
            return function (t, o, n) {
                return o && e(t.prototype, o), n && e(t, n), t
            }
        }(),
        le = function (e, t, o) {
            return t in e ? Object.defineProperty(e, t, {
                value: o,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = o, e
        },
        fe = Object.assign || function (e) {
            for (var t, o = 1; o < arguments.length; o++)
                for (var n in t = arguments[o], t) Object.prototype.hasOwnProperty.call(t, n) && (e[n] = t[n]);
            return e
        },
        me = te && /Firefox/i.test(navigator.userAgent),
        he = ['auto-start', 'auto', 'auto-end', 'top-start', 'top', 'top-end', 'right-start', 'right', 'right-end', 'bottom-end', 'bottom', 'bottom-start', 'left-end', 'left', 'left-start'],
        ce = he.slice(3),
        ge = {
            FLIP: 'flip',
            CLOCKWISE: 'clockwise',
            COUNTERCLOCKWISE: 'counterclockwise'
        },
        ue = function () {
            function t(o, n) {
                var i = this,
                    r = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : {};
                de(this, t), this.scheduleUpdate = function () {
                    return requestAnimationFrame(i.update)
                }, this.update = re(this.update.bind(this)), this.options = fe({}, t.Defaults, r), this.state = {
                    isDestroyed: !1,
                    isCreated: !1,
                    scrollParents: []
                }, this.reference = o && o.jquery ? o[0] : o, this.popper = n && n.jquery ? n[0] : n, this.options.modifiers = {}, Object.keys(fe({}, t.Defaults.modifiers, r.modifiers)).forEach(function (e) {
                    i.options.modifiers[e] = fe({}, t.Defaults.modifiers[e] || {}, r.modifiers ? r.modifiers[e] : {})
                }), this.modifiers = Object.keys(this.options.modifiers).map(function (e) {
                    return fe({
                        name: e
                    }, i.options.modifiers[e])
                }).sort(function (e, t) {
                    return e.order - t.order
                }), this.modifiers.forEach(function (t) {
                    t.enabled && e(t.onLoad) && t.onLoad(i.reference, i.popper, i.options, t, i.state)
                }), this.update();
                var p = this.options.eventsEnabled;
                p && this.enableEventListeners(), this.state.eventsEnabled = p
            }
            return ae(t, [{
                key: 'update',
                value: function () {
                    return k.call(this)
                }
            }, {
                key: 'destroy',
                value: function () {
                    return B.call(this)
                }
            }, {
                key: 'enableEventListeners',
                value: function () {
                    return I.call(this)
                }
            }, {
                key: 'disableEventListeners',
                value: function () {
                    return U.call(this)
                }
            }]), t
        }();
    return ue.Utils = ('undefined' == typeof window ? global : window).PopperUtils, ue.placements = he, ue.Defaults = {
        placement: 'bottom',
        positionFixed: !1,
        eventsEnabled: !0,
        removeOnDestroy: !1,
        onCreate: function () {},
        onUpdate: function () {},
        modifiers: {
            shift: {
                order: 100,
                enabled: !0,
                fn: function (e) {
                    var t = e.placement,
                        o = t.split('-')[0],
                        n = t.split('-')[1];
                    if (n) {
                        var i = e.offsets,
                            r = i.reference,
                            p = i.popper,
                            s = -1 !== ['bottom', 'top'].indexOf(o),
                            d = s ? 'left' : 'top',
                            a = s ? 'width' : 'height',
                            l = {
                                start: le({}, d, r[d]),
                                end: le({}, d, r[d] + r[a] - p[a])
                            };
                        e.offsets.popper = fe({}, p, l[n])
                    }
                    return e
                }
            },
            offset: {
                order: 200,
                enabled: !0,
                fn: J,
                offset: 0
            },
            preventOverflow: {
                order: 300,
                enabled: !0,
                fn: function (e, t) {
                    var o = t.boundariesElement || p(e.instance.popper);
                    e.instance.reference === o && (o = p(o));
                    var n = H('transform'),
                        i = e.instance.popper.style,
                        r = i.top,
                        s = i.left,
                        d = i[n];
                    i.top = '', i.left = '', i[n] = '';
                    var a = v(e.instance.popper, e.instance.reference, t.padding, o, e.positionFixed);
                    i.top = r, i.left = s, i[n] = d, t.boundaries = a;
                    var l = t.priority,
                        f = e.offsets.popper,
                        m = {
                            primary: function (e) {
                                var o = f[e];
                                return f[e] < a[e] && !t.escapeWithReference && (o = ee(f[e], a[e])), le({}, e, o)
                            },
                            secondary: function (e) {
                                var o = 'right' === e ? 'left' : 'top',
                                    n = f[o];
                                return f[e] > a[e] && !t.escapeWithReference && (n = Q(f[o], a[e] - ('right' === e ? f.width : f.height))), le({}, o, n)
                            }
                        };
                    return l.forEach(function (e) {
                        var t = -1 === ['left', 'top'].indexOf(e) ? 'secondary' : 'primary';
                        f = fe({}, f, m[t](e))
                    }), e.offsets.popper = f, e
                },
                priority: ['left', 'right', 'top', 'bottom'],
                padding: 5,
                boundariesElement: 'scrollParent'
            },
            keepTogether: {
                order: 400,
                enabled: !0,
                fn: function (e) {
                    var t = e.offsets,
                        o = t.popper,
                        n = t.reference,
                        i = e.placement.split('-')[0],
                        r = Z,
                        p = -1 !== ['top', 'bottom'].indexOf(i),
                        s = p ? 'right' : 'bottom',
                        d = p ? 'left' : 'top',
                        a = p ? 'width' : 'height';
                    return o[s] < r(n[d]) && (e.offsets.popper[d] = r(n[d]) - o[a]), o[d] > r(n[s]) && (e.offsets.popper[d] = r(n[s])), e
                }
            },
            arrow: {
                order: 500,
                enabled: !0,
                fn: function (e, o) {
                    var n;
                    if (!K(e.instance.modifiers, 'arrow', 'keepTogether')) return e;
                    var i = o.element;
                    if ('string' == typeof i) {
                        if (i = e.instance.popper.querySelector(i), !i) return e;
                    } else if (!e.instance.popper.contains(i)) return console.warn('WARNING: `arrow.element` must be child of its popper element!'), e;
                    var r = e.placement.split('-')[0],
                        p = e.offsets,
                        s = p.popper,
                        d = p.reference,
                        a = -1 !== ['left', 'right'].indexOf(r),
                        l = a ? 'height' : 'width',
                        f = a ? 'Top' : 'Left',
                        m = f.toLowerCase(),
                        h = a ? 'left' : 'top',
                        c = a ? 'bottom' : 'right',
                        u = S(i)[l];
                    d[c] - u < s[m] && (e.offsets.popper[m] -= s[m] - (d[c] - u)), d[m] + u > s[c] && (e.offsets.popper[m] += d[m] + u - s[c]), e.offsets.popper = g(e.offsets.popper);
                    var b = d[m] + d[l] / 2 - u / 2,
                        w = t(e.instance.popper),
                        y = parseFloat(w['margin' + f], 10),
                        E = parseFloat(w['border' + f + 'Width'], 10),
                        v = b - e.offsets.popper[m] - y - E;
                    return v = ee(Q(s[l] - u, v), 0), e.arrowElement = i, e.offsets.arrow = (n = {}, le(n, m, $(v)), le(n, h, ''), n), e
                },
                element: '[x-arrow]'
            },
            flip: {
                order: 600,
                enabled: !0,
                fn: function (e, t) {
                    if (W(e.instance.modifiers, 'inner')) return e;
                    if (e.flipped && e.placement === e.originalPlacement) return e;
                    var o = v(e.instance.popper, e.instance.reference, t.padding, t.boundariesElement, e.positionFixed),
                        n = e.placement.split('-')[0],
                        i = T(n),
                        r = e.placement.split('-')[1] || '',
                        p = [];
                    switch (t.behavior) {
                        case ge.FLIP:
                            p = [n, i];
                            break;
                        case ge.CLOCKWISE:
                            p = G(n);
                            break;
                        case ge.COUNTERCLOCKWISE:
                            p = G(n, !0);
                            break;
                        default:
                            p = t.behavior;
                    }
                    return p.forEach(function (s, d) {
                        if (n !== s || p.length === d + 1) return e;
                        n = e.placement.split('-')[0], i = T(n);
                        var a = e.offsets.popper,
                            l = e.offsets.reference,
                            f = Z,
                            m = 'left' === n && f(a.right) > f(l.left) || 'right' === n && f(a.left) < f(l.right) || 'top' === n && f(a.bottom) > f(l.top) || 'bottom' === n && f(a.top) < f(l.bottom),
                            h = f(a.left) < f(o.left),
                            c = f(a.right) > f(o.right),
                            g = f(a.top) < f(o.top),
                            u = f(a.bottom) > f(o.bottom),
                            b = 'left' === n && h || 'right' === n && c || 'top' === n && g || 'bottom' === n && u,
                            w = -1 !== ['top', 'bottom'].indexOf(n),
                            y = !!t.flipVariations && (w && 'start' === r && h || w && 'end' === r && c || !w && 'start' === r && g || !w && 'end' === r && u);
                        (m || b || y) && (e.flipped = !0, (m || b) && (n = p[d + 1]), y && (r = z(r)), e.placement = n + (r ? '-' + r : ''), e.offsets.popper = fe({}, e.offsets.popper, D(e.instance.popper, e.offsets.reference, e.placement)), e = P(e.instance.modifiers, e, 'flip'))
                    }), e
                },
                behavior: 'flip',
                padding: 5,
                boundariesElement: 'viewport'
            },
            inner: {
                order: 700,
                enabled: !1,
                fn: function (e) {
                    var t = e.placement,
                        o = t.split('-')[0],
                        n = e.offsets,
                        i = n.popper,
                        r = n.reference,
                        p = -1 !== ['left', 'right'].indexOf(o),
                        s = -1 === ['top', 'left'].indexOf(o);
                    return i[p ? 'left' : 'top'] = r[o] - (s ? i[p ? 'width' : 'height'] : 0), e.placement = T(t), e.offsets.popper = g(i), e
                }
            },
            hide: {
                order: 800,
                enabled: !0,
                fn: function (e) {
                    if (!K(e.instance.modifiers, 'hide', 'preventOverflow')) return e;
                    var t = e.offsets.reference,
                        o = C(e.instance.modifiers, function (e) {
                            return 'preventOverflow' === e.name
                        }).boundaries;
                    if (t.bottom < o.top || t.left > o.right || t.top > o.bottom || t.right < o.left) {
                        if (!0 === e.hide) return e;
                        e.hide = !0, e.attributes['x-out-of-boundaries'] = ''
                    } else {
                        if (!1 === e.hide) return e;
                        e.hide = !1, e.attributes['x-out-of-boundaries'] = !1
                    }
                    return e
                }
            },
            computeStyle: {
                order: 850,
                enabled: !0,
                fn: function (e, t) {
                    var o = t.x,
                        n = t.y,
                        i = e.offsets.popper,
                        r = C(e.instance.modifiers, function (e) {
                            return 'applyStyle' === e.name
                        }).gpuAcceleration;
                    void 0 !== r && console.warn('WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!');
                    var s, d, a = void 0 === r ? t.gpuAcceleration : r,
                        l = p(e.instance.popper),
                        f = u(l),
                        m = {
                            position: i.position
                        },
                        h = q(e, 2 > window.devicePixelRatio || !me),
                        c = 'bottom' === o ? 'top' : 'bottom',
                        g = 'right' === n ? 'left' : 'right',
                        b = H('transform');
                    if (d = 'bottom' == c ? 'HTML' === l.nodeName ? -l.clientHeight + h.bottom : -f.height + h.bottom : h.top, s = 'right' == g ? 'HTML' === l.nodeName ? -l.clientWidth + h.right : -f.width + h.right : h.left, a && b) m[b] = 'translate3d(' + s + 'px, ' + d + 'px, 0)', m[c] = 0, m[g] = 0, m.willChange = 'transform';
                    else {
                        var w = 'bottom' == c ? -1 : 1,
                            y = 'right' == g ? -1 : 1;
                        m[c] = d * w, m[g] = s * y, m.willChange = c + ', ' + g
                    }
                    var E = {
                        "x-placement": e.placement
                    };
                    return e.attributes = fe({}, E, e.attributes), e.styles = fe({}, m, e.styles), e.arrowStyles = fe({}, e.offsets.arrow, e.arrowStyles), e
                },
                gpuAcceleration: !0,
                x: 'bottom',
                y: 'right'
            },
            applyStyle: {
                order: 900,
                enabled: !0,
                fn: function (e) {
                    return j(e.instance.popper, e.styles), V(e.instance.popper, e.attributes), e.arrowElement && Object.keys(e.arrowStyles).length && j(e.arrowElement, e.arrowStyles), e
                },
                onLoad: function (e, t, o, n, i) {
                    var r = L(i, t, e, o.positionFixed),
                        p = O(o.placement, r, t, e, o.modifiers.flip.boundariesElement, o.modifiers.flip.padding);
                    return t.setAttribute('x-placement', p), j(t, {
                        position: o.positionFixed ? 'fixed' : 'absolute'
                    }), o
                },
                gpuAcceleration: void 0
            }
        }
    }, ue
});
//# sourceMappingURL=popper.min.js.map
/*
 * jQuery.appear
 * https://github.com/bas2k/jquery.appear/
 * http://code.google.com/p/jquery-appear/
 * http://bas2k.ru/
 *
 * Copyright (c) 2009 Michael Hixson
 * Copyright (c) 2012-2014 Alexander Brovikov
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
 */
(function($) {
    $.fn.appear = function(fn, options) {

        var settings = $.extend({

            //arbitrary data to pass to fn
            data: undefined,

            //call fn only on the first appear?
            one: true,

            // X & Y accuracy
            accX: 0,
            accY: 0

        }, options);

        return this.each(function() {

            var t = $(this);

            //whether the element is currently visible
            t.appeared = false;

            if (!fn) {

                //trigger the custom event
                t.trigger('appear', settings.data);
                return;
            }

            var w = $(window);

            //fires the appear event when appropriate
            var check = function() {

                //is the element hidden?
                if (!t.is(':visible')) {

                    //it became hidden
                    t.appeared = false;
                    return;
                }

                //is the element inside the visible window?
                var a = w.scrollLeft();
                var b = w.scrollTop();
                var o = t.offset();
                var x = o.left;
                var y = o.top;

                var ax = settings.accX;
                var ay = settings.accY;
                var th = t.height();
                var wh = w.height();
                var tw = t.width();
                var ww = w.width();

                if (y + th + ay >= b &&
                    y <= b + wh + ay &&
                    x + tw + ax >= a &&
                    x <= a + ww + ax) {

                    //trigger the custom event
                    if (!t.appeared) t.trigger('appear', settings.data);

                } else {

                    //it scrolled out of view
                    t.appeared = false;
                }
            };

            //create a modified fn with some additional logic
            var modifiedFn = function() {

                //mark the element as visible
                t.appeared = true;

                //is this supposed to happen only once?
                if (settings.one) {

                    //remove the check
                    w.unbind('scroll', check);
                    var i = $.inArray(check, $.fn.appear.checks);
                    if (i >= 0) $.fn.appear.checks.splice(i, 1);
                }

                //trigger the original fn
                fn.apply(this, arguments);
            };

            //bind the modified fn to the element
            if (settings.one) t.one('appear', settings.data, modifiedFn);
            else t.bind('appear', settings.data, modifiedFn);

            //check whenever the window scrolls
            w.scroll(check);

            //check whenever the dom changes
            $.fn.appear.checks.push(check);

            //check now
            (check)();
        });
    };

    //keep a queue of appearance checks
    $.extend($.fn.appear, {

        checks: [],
        timeout: null,

        //process the queue
        checkAll: function() {
            var length = $.fn.appear.checks.length;
            if (length > 0) while (length--) ($.fn.appear.checks[length])();
        },

        //check the queue asynchronously
        run: function() {
            if ($.fn.appear.timeout) clearTimeout($.fn.appear.timeout);
            $.fn.appear.timeout = setTimeout($.fn.appear.checkAll, 20);
        }
    });

    //run checks when these methods are called
    $.each(['append', 'prepend', 'after', 'before', 'attr',
        'removeAttr', 'addClass', 'removeClass', 'toggleClass',
        'remove', 'css', 'show', 'hide'], function(i, n) {
        var old = $.fn[n];
        if (old) {
            $.fn[n] = function() {
                var r = old.apply(this, arguments);
                $.fn.appear.run();
                return r;
            }
        }
    });

})(jQuery);

/*! odometer 0.4.8 */
(function(){var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G=[].slice;q='<span class="odometer-value"></span>',n='<span class="odometer-ribbon"><span class="odometer-ribbon-inner">'+q+"</span></span>",d='<span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner">'+n+"</span></span>",g='<span class="odometer-formatting-mark"></span>',c="(,ddd).dd",h=/^\(?([^)]*)\)?(?:(.)(d+))?$/,i=30,f=2e3,a=20,j=2,e=.5,k=1e3/i,b=1e3/a,o="transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd",y=document.createElement("div").style,p=null!=y.transition||null!=y.webkitTransition||null!=y.mozTransition||null!=y.oTransition,w=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.msRequestAnimationFrame,l=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver,s=function(a){var b;return b=document.createElement("div"),b.innerHTML=a,b.children[0]},v=function(a,b){return a.className=a.className.replace(new RegExp("(^| )"+b.split(" ").join("|")+"( |$)","gi")," ")},r=function(a,b){return v(a,b),a.className+=" "+b},z=function(a,b){var c;return null!=document.createEvent?(c=document.createEvent("HTMLEvents"),c.initEvent(b,!0,!0),a.dispatchEvent(c)):void 0},u=function(){var a,b;return null!=(a=null!=(b=window.performance)&&"function"==typeof b.now?b.now():void 0)?a:+new Date},x=function(a,b){return null==b&&(b=0),b?(a*=Math.pow(10,b),a+=.5,a=Math.floor(a),a/=Math.pow(10,b)):Math.round(a)},A=function(a){return 0>a?Math.ceil(a):Math.floor(a)},t=function(a){return a-x(a)},C=!1,(B=function(){var a,b,c,d,e;if(!C&&null!=window.jQuery){for(C=!0,d=["html","text"],e=[],b=0,c=d.length;c>b;b++)a=d[b],e.push(function(a){var b;return b=window.jQuery.fn[a],window.jQuery.fn[a]=function(a){var c;return null==a||null==(null!=(c=this[0])?c.odometer:void 0)?b.apply(this,arguments):this[0].odometer.update(a)}}(a));return e}})(),setTimeout(B,0),m=function(){function a(b){var c,d,e,g,h,i,l,m,n,o,p=this;if(this.options=b,this.el=this.options.el,null!=this.el.odometer)return this.el.odometer;this.el.odometer=this,m=a.options;for(d in m)g=m[d],null==this.options[d]&&(this.options[d]=g);null==(h=this.options).duration&&(h.duration=f),this.MAX_VALUES=this.options.duration/k/j|0,this.resetFormat(),this.value=this.cleanValue(null!=(n=this.options.value)?n:""),this.renderInside(),this.render();try{for(o=["innerHTML","innerText","textContent"],i=0,l=o.length;l>i;i++)e=o[i],null!=this.el[e]&&!function(a){return Object.defineProperty(p.el,a,{get:function(){var b;return"innerHTML"===a?p.inside.outerHTML:null!=(b=p.inside.innerText)?b:p.inside.textContent},set:function(a){return p.update(a)}})}(e)}catch(q){c=q,this.watchForMutations()}}return a.prototype.renderInside=function(){return this.inside=document.createElement("div"),this.inside.className="odometer-inside",this.el.innerHTML="",this.el.appendChild(this.inside)},a.prototype.watchForMutations=function(){var a,b=this;if(null!=l)try{return null==this.observer&&(this.observer=new l(function(a){var c;return c=b.el.innerText,b.renderInside(),b.render(b.value),b.update(c)})),this.watchMutations=!0,this.startWatchingMutations()}catch(c){a=c}},a.prototype.startWatchingMutations=function(){return this.watchMutations?this.observer.observe(this.el,{childList:!0}):void 0},a.prototype.stopWatchingMutations=function(){var a;return null!=(a=this.observer)?a.disconnect():void 0},a.prototype.cleanValue=function(a){var b;return"string"==typeof a&&(a=a.replace(null!=(b=this.format.radix)?b:".","<radix>"),a=a.replace(/[.,]/g,""),a=a.replace("<radix>","."),a=parseFloat(a,10)||0),x(a,this.format.precision)},a.prototype.bindTransitionEnd=function(){var a,b,c,d,e,f,g=this;if(!this.transitionEndBound){for(this.transitionEndBound=!0,b=!1,e=o.split(" "),f=[],c=0,d=e.length;d>c;c++)a=e[c],f.push(this.el.addEventListener(a,function(){return b?!0:(b=!0,setTimeout(function(){return g.render(),b=!1,z(g.el,"odometerdone")},0),!0)},!1));return f}},a.prototype.resetFormat=function(){var a,b,d,e,f,g,i,j;if(a=null!=(i=this.options.format)?i:c,a||(a="d"),d=h.exec(a),!d)throw new Error("Odometer: Unparsable digit format");return j=d.slice(1,4),g=j[0],f=j[1],b=j[2],e=(null!=b?b.length:void 0)||0,this.format={repeating:g,radix:f,precision:e}},a.prototype.render=function(a){var b,c,d,e,f,g,h;for(null==a&&(a=this.value),this.stopWatchingMutations(),this.resetFormat(),this.inside.innerHTML="",f=this.options.theme,b=this.el.className.split(" "),e=[],g=0,h=b.length;h>g;g++)c=b[g],c.length&&((d=/^odometer-theme-(.+)$/.exec(c))?f=d[1]:/^odometer(-|$)/.test(c)||e.push(c));return e.push("odometer"),p||e.push("odometer-no-transitions"),f?e.push("odometer-theme-"+f):e.push("odometer-auto-theme"),this.el.className=e.join(" "),this.ribbons={},this.formatDigits(a),this.startWatchingMutations()},a.prototype.formatDigits=function(a){var b,c,d,e,f,g,h,i,j,k;if(this.digits=[],this.options.formatFunction)for(d=this.options.formatFunction(a),j=d.split("").reverse(),f=0,h=j.length;h>f;f++)c=j[f],c.match(/0-9/)?(b=this.renderDigit(),b.querySelector(".odometer-value").innerHTML=c,this.digits.push(b),this.insertDigit(b)):this.addSpacer(c);else for(e=!this.format.precision||!t(a)||!1,k=a.toString().split("").reverse(),g=0,i=k.length;i>g;g++)b=k[g],"."===b&&(e=!0),this.addDigit(b,e)},a.prototype.update=function(a){var b,c=this;return a=this.cleanValue(a),(b=a-this.value)?(v(this.el,"odometer-animating-up odometer-animating-down odometer-animating"),b>0?r(this.el,"odometer-animating-up"):r(this.el,"odometer-animating-down"),this.stopWatchingMutations(),this.animate(a),this.startWatchingMutations(),setTimeout(function(){return c.el.offsetHeight,r(c.el,"odometer-animating")},0),this.value=a):void 0},a.prototype.renderDigit=function(){return s(d)},a.prototype.insertDigit=function(a,b){return null!=b?this.inside.insertBefore(a,b):this.inside.children.length?this.inside.insertBefore(a,this.inside.children[0]):this.inside.appendChild(a)},a.prototype.addSpacer=function(a,b,c){var d;return d=s(g),d.innerHTML=a,c&&r(d,c),this.insertDigit(d,b)},a.prototype.addDigit=function(a,b){var c,d,e,f;if(null==b&&(b=!0),"-"===a)return this.addSpacer(a,null,"odometer-negation-mark");if("."===a)return this.addSpacer(null!=(f=this.format.radix)?f:".",null,"odometer-radix-mark");if(b)for(e=!1;;){if(!this.format.repeating.length){if(e)throw new Error("Bad odometer format without digits");this.resetFormat(),e=!0}if(c=this.format.repeating[this.format.repeating.length-1],this.format.repeating=this.format.repeating.substring(0,this.format.repeating.length-1),"d"===c)break;this.addSpacer(c)}return d=this.renderDigit(),d.querySelector(".odometer-value").innerHTML=a,this.digits.push(d),this.insertDigit(d)},a.prototype.animate=function(a){return p&&"count"!==this.options.animation?this.animateSlide(a):this.animateCount(a)},a.prototype.animateCount=function(a){var c,d,e,f,g,h=this;if(d=+a-this.value)return f=e=u(),c=this.value,(g=function(){var i,j,k;return u()-f>h.options.duration?(h.value=a,h.render(),void z(h.el,"odometerdone")):(i=u()-e,i>b&&(e=u(),k=i/h.options.duration,j=d*k,c+=j,h.render(Math.round(c))),null!=w?w(g):setTimeout(g,b))})()},a.prototype.getDigitCount=function(){var a,b,c,d,e,f;for(d=1<=arguments.length?G.call(arguments,0):[],a=e=0,f=d.length;f>e;a=++e)c=d[a],d[a]=Math.abs(c);return b=Math.max.apply(Math,d),Math.ceil(Math.log(b+1)/Math.log(10))},a.prototype.getFractionalDigitCount=function(){var a,b,c,d,e,f,g;for(e=1<=arguments.length?G.call(arguments,0):[],b=/^\-?\d*\.(\d*?)0*$/,a=f=0,g=e.length;g>f;a=++f)d=e[a],e[a]=d.toString(),c=b.exec(e[a]),null==c?e[a]=0:e[a]=c[1].length;return Math.max.apply(Math,e)},a.prototype.resetDigits=function(){return this.digits=[],this.ribbons=[],this.inside.innerHTML="",this.resetFormat()},a.prototype.animateSlide=function(a){var b,c,d,f,g,h,i,j,k,l,m,n,o,p,q,s,t,u,v,w,x,y,z,B,C,D,E;if(s=this.value,j=this.getFractionalDigitCount(s,a),j&&(a*=Math.pow(10,j),s*=Math.pow(10,j)),d=a-s){for(this.bindTransitionEnd(),f=this.getDigitCount(s,a),g=[],b=0,m=v=0;f>=0?f>v:v>f;m=f>=0?++v:--v){if(t=A(s/Math.pow(10,f-m-1)),i=A(a/Math.pow(10,f-m-1)),h=i-t,Math.abs(h)>this.MAX_VALUES){for(l=[],n=h/(this.MAX_VALUES+this.MAX_VALUES*b*e),c=t;h>0&&i>c||0>h&&c>i;)l.push(Math.round(c)),c+=n;l[l.length-1]!==i&&l.push(i),b++}else l=function(){E=[];for(var a=t;i>=t?i>=a:a>=i;i>=t?a++:a--)E.push(a);return E}.apply(this);for(m=w=0,y=l.length;y>w;m=++w)k=l[m],l[m]=Math.abs(k%10);g.push(l)}for(this.resetDigits(),D=g.reverse(),m=x=0,z=D.length;z>x;m=++x)for(l=D[m],this.digits[m]||this.addDigit(" ",m>=j),null==(u=this.ribbons)[m]&&(u[m]=this.digits[m].querySelector(".odometer-ribbon-inner")),this.ribbons[m].innerHTML="",0>d&&(l=l.reverse()),o=C=0,B=l.length;B>C;o=++C)k=l[o],q=document.createElement("div"),q.className="odometer-value",q.innerHTML=k,this.ribbons[m].appendChild(q),o===l.length-1&&r(q,"odometer-last-value"),0===o&&r(q,"odometer-first-value");return 0>t&&this.addDigit("-"),p=this.inside.querySelector(".odometer-radix-mark"),null!=p&&p.parent.removeChild(p),j?this.addSpacer(this.format.radix,this.digits[j-1],"odometer-radix-mark"):void 0}},a}(),m.options=null!=(E=window.odometerOptions)?E:{},setTimeout(function(){var a,b,c,d,e;if(window.odometerOptions){d=window.odometerOptions,e=[];for(a in d)b=d[a],e.push(null!=(c=m.options)[a]?(c=m.options)[a]:c[a]=b);return e}},0),m.init=function(){var a,b,c,d,e,f;if(null!=document.querySelectorAll){for(b=document.querySelectorAll(m.options.selector||".odometer"),f=[],c=0,d=b.length;d>c;c++)a=b[c],f.push(a.odometer=new m({el:a,value:null!=(e=a.innerText)?e:a.textContent}));return f}},null!=(null!=(F=document.documentElement)?F.doScroll:void 0)&&null!=document.createEventObject?(D=document.onreadystatechange,document.onreadystatechange=function(){return"complete"===document.readyState&&m.options.auto!==!1&&m.init(),null!=D?D.apply(this,arguments):void 0}):document.addEventListener("DOMContentLoaded",function(){return m.options.auto!==!1?m.init():void 0},!1),"function"==typeof define&&define.amd?define([],function(){return m}):"undefined"!=typeof exports&&null!==exports?module.exports=m:window.Odometer=m}).call(this);

/*
 * This combined file was created by the DataTables downloader builder:
 *   https://datatables.net/download
 *
 * To rebuild or modify this file with the latest versions of the included
 * software please visit:
 *   https://datatables.net/download/#bs4-4.1.1/dt-1.10.24/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2
 *
 * Included libraries:
 *  Bootstrap-4 4.1.1, DataTables 1.10.24, DateTime 1.0.3, FixedColumns 3.3.2, FixedHeader 3.1.8, KeyTable 2.6.1, Responsive 2.2.7, RowGroup 1.1.2, RowReorder 1.2.7, Scroller 2.0.3, SearchBuilder 1.0.1, SearchPanes 1.2.2
 */

/*!
  * Bootstrap v4.1.1 (https://getbootstrap.com/)
  * Copyright 2011-2018 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
  */
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?e(exports,require("jquery"),require("popper.js")):"function"==typeof define&&define.amd?define(["exports","jquery","popper.js"],e):e(t.bootstrap={},t.jQuery,t.Popper)}(this,function(t,e,c){"use strict";function i(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}function o(t,e,n){return e&&i(t.prototype,e),n&&i(t,n),t}function h(r){for(var t=1;t<arguments.length;t++){var s=null!=arguments[t]?arguments[t]:{},e=Object.keys(s);"function"==typeof Object.getOwnPropertySymbols&&(e=e.concat(Object.getOwnPropertySymbols(s).filter(function(t){return Object.getOwnPropertyDescriptor(s,t).enumerable}))),e.forEach(function(t){var e,n,i;e=r,i=s[n=t],n in e?Object.defineProperty(e,n,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[n]=i})}return r}e=e&&e.hasOwnProperty("default")?e.default:e,c=c&&c.hasOwnProperty("default")?c.default:c;var r,n,s,a,l,u,f,d,_,g,m,p,v,E,y,T,C,I,A,D,b,S,w,N,O,k,P,L,j,R,H,W,M,x,U,K,F,V,Q,B,Y,G,q,z,X,J,Z,$,tt,et,nt,it,rt,st,ot,at,lt,ht,ct,ut,ft,dt,_t,gt,mt,pt,vt,Et,yt,Tt,Ct,It,At,Dt,bt,St,wt,Nt,Ot,kt,Pt,Lt,jt,Rt,Ht,Wt,Mt,xt,Ut,Kt,Ft,Vt,Qt,Bt,Yt,Gt,qt,zt,Xt,Jt,Zt,$t,te,ee,ne,ie,re,se,oe,ae,le,he,ce,ue,fe,de,_e,ge,me,pe,ve,Ee,ye,Te,Ce,Ie,Ae,De,be,Se,we,Ne,Oe,ke,Pe,Le,je,Re,He,We,Me,xe,Ue,Ke,Fe,Ve,Qe,Be,Ye,Ge,qe,ze,Xe,Je,Ze,$e,tn,en,nn,rn,sn,on,an,ln,hn,cn,un,fn,dn,_n,gn,mn,pn,vn,En,yn,Tn,Cn=function(i){var e="transitionend";function t(t){var e=this,n=!1;return i(this).one(l.TRANSITION_END,function(){n=!0}),setTimeout(function(){n||l.triggerTransitionEnd(e)},t),this}var l={TRANSITION_END:"bsTransitionEnd",getUID:function(t){for(;t+=~~(1e6*Math.random()),document.getElementById(t););return t},getSelectorFromElement:function(t){var e=t.getAttribute("data-target");e&&"#"!==e||(e=t.getAttribute("href")||"");try{return 0<i(document).find(e).length?e:null}catch(t){return null}},getTransitionDurationFromElement:function(t){if(!t)return 0;var e=i(t).css("transition-duration");return parseFloat(e)?(e=e.split(",")[0],1e3*parseFloat(e)):0},reflow:function(t){return t.offsetHeight},triggerTransitionEnd:function(t){i(t).trigger(e)},supportsTransitionEnd:function(){return Boolean(e)},isElement:function(t){return(t[0]||t).nodeType},typeCheckConfig:function(t,e,n){for(var i in n)if(Object.prototype.hasOwnProperty.call(n,i)){var r=n[i],s=e[i],o=s&&l.isElement(s)?"element":(a=s,{}.toString.call(a).match(/\s([a-z]+)/i)[1].toLowerCase());if(!new RegExp(r).test(o))throw new Error(t.toUpperCase()+': Option "'+i+'" provided type "'+o+'" but expected type "'+r+'".')}var a}};return i.fn.emulateTransitionEnd=t,i.event.special[l.TRANSITION_END]={bindType:e,delegateType:e,handle:function(t){if(i(t.target).is(this))return t.handleObj.handler.apply(this,arguments)}},l}(e),In=(n="alert",a="."+(s="bs.alert"),l=(r=e).fn[n],u={CLOSE:"close"+a,CLOSED:"closed"+a,CLICK_DATA_API:"click"+a+".data-api"},f="alert",d="fade",_="show",g=function(){function i(t){this._element=t}var t=i.prototype;return t.close=function(t){var e=this._element;t&&(e=this._getRootElement(t)),this._triggerCloseEvent(e).isDefaultPrevented()||this._removeElement(e)},t.dispose=function(){r.removeData(this._element,s),this._element=null},t._getRootElement=function(t){var e=Cn.getSelectorFromElement(t),n=!1;return e&&(n=r(e)[0]),n||(n=r(t).closest("."+f)[0]),n},t._triggerCloseEvent=function(t){var e=r.Event(u.CLOSE);return r(t).trigger(e),e},t._removeElement=function(e){var n=this;if(r(e).removeClass(_),r(e).hasClass(d)){var t=Cn.getTransitionDurationFromElement(e);r(e).one(Cn.TRANSITION_END,function(t){return n._destroyElement(e,t)}).emulateTransitionEnd(t)}else this._destroyElement(e)},t._destroyElement=function(t){r(t).detach().trigger(u.CLOSED).remove()},i._jQueryInterface=function(n){return this.each(function(){var t=r(this),e=t.data(s);e||(e=new i(this),t.data(s,e)),"close"===n&&e[n](this)})},i._handleDismiss=function(e){return function(t){t&&t.preventDefault(),e.close(this)}},o(i,null,[{key:"VERSION",get:function(){return"4.1.1"}}]),i}(),r(document).on(u.CLICK_DATA_API,'[data-dismiss="alert"]',g._handleDismiss(new g)),r.fn[n]=g._jQueryInterface,r.fn[n].Constructor=g,r.fn[n].noConflict=function(){return r.fn[n]=l,g._jQueryInterface},g),An=(p="button",E="."+(v="bs.button"),y=".data-api",T=(m=e).fn[p],C="active",I="btn",D='[data-toggle^="button"]',b='[data-toggle="buttons"]',S="input",w=".active",N=".btn",O={CLICK_DATA_API:"click"+E+y,FOCUS_BLUR_DATA_API:(A="focus")+E+y+" blur"+E+y},k=function(){function n(t){this._element=t}var t=n.prototype;return t.toggle=function(){var t=!0,e=!0,n=m(this._element).closest(b)[0];if(n){var i=m(this._element).find(S)[0];if(i){if("radio"===i.type)if(i.checked&&m(this._element).hasClass(C))t=!1;else{var r=m(n).find(w)[0];r&&m(r).removeClass(C)}if(t){if(i.hasAttribute("disabled")||n.hasAttribute("disabled")||i.classList.contains("disabled")||n.classList.contains("disabled"))return;i.checked=!m(this._element).hasClass(C),m(i).trigger("change")}i.focus(),e=!1}}e&&this._element.setAttribute("aria-pressed",!m(this._element).hasClass(C)),t&&m(this._element).toggleClass(C)},t.dispose=function(){m.removeData(this._element,v),this._element=null},n._jQueryInterface=function(e){return this.each(function(){var t=m(this).data(v);t||(t=new n(this),m(this).data(v,t)),"toggle"===e&&t[e]()})},o(n,null,[{key:"VERSION",get:function(){return"4.1.1"}}]),n}(),m(document).on(O.CLICK_DATA_API,D,function(t){t.preventDefault();var e=t.target;m(e).hasClass(I)||(e=m(e).closest(N)),k._jQueryInterface.call(m(e),"toggle")}).on(O.FOCUS_BLUR_DATA_API,D,function(t){var e=m(t.target).closest(N)[0];m(e).toggleClass(A,/^focus(in)?$/.test(t.type))}),m.fn[p]=k._jQueryInterface,m.fn[p].Constructor=k,m.fn[p].noConflict=function(){return m.fn[p]=T,k._jQueryInterface},k),Dn=(L="carousel",R="."+(j="bs.carousel"),H=".data-api",W=(P=e).fn[L],M={interval:5e3,keyboard:!0,slide:!1,pause:"hover",wrap:!0},x={interval:"(number|boolean)",keyboard:"boolean",slide:"(boolean|string)",pause:"(string|boolean)",wrap:"boolean"},U="next",K="prev",F="left",V="right",Q={SLIDE:"slide"+R,SLID:"slid"+R,KEYDOWN:"keydown"+R,MOUSEENTER:"mouseenter"+R,MOUSELEAVE:"mouseleave"+R,TOUCHEND:"touchend"+R,LOAD_DATA_API:"load"+R+H,CLICK_DATA_API:"click"+R+H},B="carousel",Y="active",G="slide",q="carousel-item-right",z="carousel-item-left",X="carousel-item-next",J="carousel-item-prev",Z={ACTIVE:".active",ACTIVE_ITEM:".active.carousel-item",ITEM:".carousel-item",NEXT_PREV:".carousel-item-next, .carousel-item-prev",INDICATORS:".carousel-indicators",DATA_SLIDE:"[data-slide], [data-slide-to]",DATA_RIDE:'[data-ride="carousel"]'},$=function(){function s(t,e){this._items=null,this._interval=null,this._activeElement=null,this._isPaused=!1,this._isSliding=!1,this.touchTimeout=null,this._config=this._getConfig(e),this._element=P(t)[0],this._indicatorsElement=P(this._element).find(Z.INDICATORS)[0],this._addEventListeners()}var t=s.prototype;return t.next=function(){this._isSliding||this._slide(U)},t.nextWhenVisible=function(){!document.hidden&&P(this._element).is(":visible")&&"hidden"!==P(this._element).css("visibility")&&this.next()},t.prev=function(){this._isSliding||this._slide(K)},t.pause=function(t){t||(this._isPaused=!0),P(this._element).find(Z.NEXT_PREV)[0]&&(Cn.triggerTransitionEnd(this._element),this.cycle(!0)),clearInterval(this._interval),this._interval=null},t.cycle=function(t){t||(this._isPaused=!1),this._interval&&(clearInterval(this._interval),this._interval=null),this._config.interval&&!this._isPaused&&(this._interval=setInterval((document.visibilityState?this.nextWhenVisible:this.next).bind(this),this._config.interval))},t.to=function(t){var e=this;this._activeElement=P(this._element).find(Z.ACTIVE_ITEM)[0];var n=this._getItemIndex(this._activeElement);if(!(t>this._items.length-1||t<0))if(this._isSliding)P(this._element).one(Q.SLID,function(){return e.to(t)});else{if(n===t)return this.pause(),void this.cycle();var i=n<t?U:K;this._slide(i,this._items[t])}},t.dispose=function(){P(this._element).off(R),P.removeData(this._element,j),this._items=null,this._config=null,this._element=null,this._interval=null,this._isPaused=null,this._isSliding=null,this._activeElement=null,this._indicatorsElement=null},t._getConfig=function(t){return t=h({},M,t),Cn.typeCheckConfig(L,t,x),t},t._addEventListeners=function(){var e=this;this._config.keyboard&&P(this._element).on(Q.KEYDOWN,function(t){return e._keydown(t)}),"hover"===this._config.pause&&(P(this._element).on(Q.MOUSEENTER,function(t){return e.pause(t)}).on(Q.MOUSELEAVE,function(t){return e.cycle(t)}),"ontouchstart"in document.documentElement&&P(this._element).on(Q.TOUCHEND,function(){e.pause(),e.touchTimeout&&clearTimeout(e.touchTimeout),e.touchTimeout=setTimeout(function(t){return e.cycle(t)},500+e._config.interval)}))},t._keydown=function(t){if(!/input|textarea/i.test(t.target.tagName))switch(t.which){case 37:t.preventDefault(),this.prev();break;case 39:t.preventDefault(),this.next()}},t._getItemIndex=function(t){return this._items=P.makeArray(P(t).parent().find(Z.ITEM)),this._items.indexOf(t)},t._getItemByDirection=function(t,e){var n=t===U,i=t===K,r=this._getItemIndex(e),s=this._items.length-1;if((i&&0===r||n&&r===s)&&!this._config.wrap)return e;var o=(r+(t===K?-1:1))%this._items.length;return-1===o?this._items[this._items.length-1]:this._items[o]},t._triggerSlideEvent=function(t,e){var n=this._getItemIndex(t),i=this._getItemIndex(P(this._element).find(Z.ACTIVE_ITEM)[0]),r=P.Event(Q.SLIDE,{relatedTarget:t,direction:e,from:i,to:n});return P(this._element).trigger(r),r},t._setActiveIndicatorElement=function(t){if(this._indicatorsElement){P(this._indicatorsElement).find(Z.ACTIVE).removeClass(Y);var e=this._indicatorsElement.children[this._getItemIndex(t)];e&&P(e).addClass(Y)}},t._slide=function(t,e){var n,i,r,s=this,o=P(this._element).find(Z.ACTIVE_ITEM)[0],a=this._getItemIndex(o),l=e||o&&this._getItemByDirection(t,o),h=this._getItemIndex(l),c=Boolean(this._interval);if(t===U?(n=z,i=X,r=F):(n=q,i=J,r=V),l&&P(l).hasClass(Y))this._isSliding=!1;else if(!this._triggerSlideEvent(l,r).isDefaultPrevented()&&o&&l){this._isSliding=!0,c&&this.pause(),this._setActiveIndicatorElement(l);var u=P.Event(Q.SLID,{relatedTarget:l,direction:r,from:a,to:h});if(P(this._element).hasClass(G)){P(l).addClass(i),Cn.reflow(l),P(o).addClass(n),P(l).addClass(n);var f=Cn.getTransitionDurationFromElement(o);P(o).one(Cn.TRANSITION_END,function(){P(l).removeClass(n+" "+i).addClass(Y),P(o).removeClass(Y+" "+i+" "+n),s._isSliding=!1,setTimeout(function(){return P(s._element).trigger(u)},0)}).emulateTransitionEnd(f)}else P(o).removeClass(Y),P(l).addClass(Y),this._isSliding=!1,P(this._element).trigger(u);c&&this.cycle()}},s._jQueryInterface=function(i){return this.each(function(){var t=P(this).data(j),e=h({},M,P(this).data());"object"==typeof i&&(e=h({},e,i));var n="string"==typeof i?i:e.slide;if(t||(t=new s(this,e),P(this).data(j,t)),"number"==typeof i)t.to(i);else if("string"==typeof n){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n]()}else e.interval&&(t.pause(),t.cycle())})},s._dataApiClickHandler=function(t){var e=Cn.getSelectorFromElement(this);if(e){var n=P(e)[0];if(n&&P(n).hasClass(B)){var i=h({},P(n).data(),P(this).data()),r=this.getAttribute("data-slide-to");r&&(i.interval=!1),s._jQueryInterface.call(P(n),i),r&&P(n).data(j).to(r),t.preventDefault()}}},o(s,null,[{key:"VERSION",get:function(){return"4.1.1"}},{key:"Default",get:function(){return M}}]),s}(),P(document).on(Q.CLICK_DATA_API,Z.DATA_SLIDE,$._dataApiClickHandler),P(window).on(Q.LOAD_DATA_API,function(){P(Z.DATA_RIDE).each(function(){var t=P(this);$._jQueryInterface.call(t,t.data())})}),P.fn[L]=$._jQueryInterface,P.fn[L].Constructor=$,P.fn[L].noConflict=function(){return P.fn[L]=W,$._jQueryInterface},$),bn=(et="collapse",it="."+(nt="bs.collapse"),rt=(tt=e).fn[et],st={toggle:!0,parent:""},ot={toggle:"boolean",parent:"(string|element)"},at={SHOW:"show"+it,SHOWN:"shown"+it,HIDE:"hide"+it,HIDDEN:"hidden"+it,CLICK_DATA_API:"click"+it+".data-api"},lt="show",ht="collapse",ct="collapsing",ut="collapsed",ft="width",dt="height",_t={ACTIVES:".show, .collapsing",DATA_TOGGLE:'[data-toggle="collapse"]'},gt=function(){function a(t,e){this._isTransitioning=!1,this._element=t,this._config=this._getConfig(e),this._triggerArray=tt.makeArray(tt('[data-toggle="collapse"][href="#'+t.id+'"],[data-toggle="collapse"][data-target="#'+t.id+'"]'));for(var n=tt(_t.DATA_TOGGLE),i=0;i<n.length;i++){var r=n[i],s=Cn.getSelectorFromElement(r);null!==s&&0<tt(s).filter(t).length&&(this._selector=s,this._triggerArray.push(r))}this._parent=this._config.parent?this._getParent():null,this._config.parent||this._addAriaAndCollapsedClass(this._element,this._triggerArray),this._config.toggle&&this.toggle()}var t=a.prototype;return t.toggle=function(){tt(this._element).hasClass(lt)?this.hide():this.show()},t.show=function(){var t,e,n=this;if(!this._isTransitioning&&!tt(this._element).hasClass(lt)&&(this._parent&&0===(t=tt.makeArray(tt(this._parent).find(_t.ACTIVES).filter('[data-parent="'+this._config.parent+'"]'))).length&&(t=null),!(t&&(e=tt(t).not(this._selector).data(nt))&&e._isTransitioning))){var i=tt.Event(at.SHOW);if(tt(this._element).trigger(i),!i.isDefaultPrevented()){t&&(a._jQueryInterface.call(tt(t).not(this._selector),"hide"),e||tt(t).data(nt,null));var r=this._getDimension();tt(this._element).removeClass(ht).addClass(ct),(this._element.style[r]=0)<this._triggerArray.length&&tt(this._triggerArray).removeClass(ut).attr("aria-expanded",!0),this.setTransitioning(!0);var s="scroll"+(r[0].toUpperCase()+r.slice(1)),o=Cn.getTransitionDurationFromElement(this._element);tt(this._element).one(Cn.TRANSITION_END,function(){tt(n._element).removeClass(ct).addClass(ht).addClass(lt),n._element.style[r]="",n.setTransitioning(!1),tt(n._element).trigger(at.SHOWN)}).emulateTransitionEnd(o),this._element.style[r]=this._element[s]+"px"}}},t.hide=function(){var t=this;if(!this._isTransitioning&&tt(this._element).hasClass(lt)){var e=tt.Event(at.HIDE);if(tt(this._element).trigger(e),!e.isDefaultPrevented()){var n=this._getDimension();if(this._element.style[n]=this._element.getBoundingClientRect()[n]+"px",Cn.reflow(this._element),tt(this._element).addClass(ct).removeClass(ht).removeClass(lt),0<this._triggerArray.length)for(var i=0;i<this._triggerArray.length;i++){var r=this._triggerArray[i],s=Cn.getSelectorFromElement(r);if(null!==s)tt(s).hasClass(lt)||tt(r).addClass(ut).attr("aria-expanded",!1)}this.setTransitioning(!0);this._element.style[n]="";var o=Cn.getTransitionDurationFromElement(this._element);tt(this._element).one(Cn.TRANSITION_END,function(){t.setTransitioning(!1),tt(t._element).removeClass(ct).addClass(ht).trigger(at.HIDDEN)}).emulateTransitionEnd(o)}}},t.setTransitioning=function(t){this._isTransitioning=t},t.dispose=function(){tt.removeData(this._element,nt),this._config=null,this._parent=null,this._element=null,this._triggerArray=null,this._isTransitioning=null},t._getConfig=function(t){return(t=h({},st,t)).toggle=Boolean(t.toggle),Cn.typeCheckConfig(et,t,ot),t},t._getDimension=function(){return tt(this._element).hasClass(ft)?ft:dt},t._getParent=function(){var n=this,t=null;Cn.isElement(this._config.parent)?(t=this._config.parent,"undefined"!=typeof this._config.parent.jquery&&(t=this._config.parent[0])):t=tt(this._config.parent)[0];var e='[data-toggle="collapse"][data-parent="'+this._config.parent+'"]';return tt(t).find(e).each(function(t,e){n._addAriaAndCollapsedClass(a._getTargetFromElement(e),[e])}),t},t._addAriaAndCollapsedClass=function(t,e){if(t){var n=tt(t).hasClass(lt);0<e.length&&tt(e).toggleClass(ut,!n).attr("aria-expanded",n)}},a._getTargetFromElement=function(t){var e=Cn.getSelectorFromElement(t);return e?tt(e)[0]:null},a._jQueryInterface=function(i){return this.each(function(){var t=tt(this),e=t.data(nt),n=h({},st,t.data(),"object"==typeof i&&i?i:{});if(!e&&n.toggle&&/show|hide/.test(i)&&(n.toggle=!1),e||(e=new a(this,n),t.data(nt,e)),"string"==typeof i){if("undefined"==typeof e[i])throw new TypeError('No method named "'+i+'"');e[i]()}})},o(a,null,[{key:"VERSION",get:function(){return"4.1.1"}},{key:"Default",get:function(){return st}}]),a}(),tt(document).on(at.CLICK_DATA_API,_t.DATA_TOGGLE,function(t){"A"===t.currentTarget.tagName&&t.preventDefault();var n=tt(this),e=Cn.getSelectorFromElement(this);tt(e).each(function(){var t=tt(this),e=t.data(nt)?"toggle":n.data();gt._jQueryInterface.call(t,e)})}),tt.fn[et]=gt._jQueryInterface,tt.fn[et].Constructor=gt,tt.fn[et].noConflict=function(){return tt.fn[et]=rt,gt._jQueryInterface},gt),Sn=(pt="dropdown",Et="."+(vt="bs.dropdown"),yt=".data-api",Tt=(mt=e).fn[pt],Ct=new RegExp("38|40|27"),It={HIDE:"hide"+Et,HIDDEN:"hidden"+Et,SHOW:"show"+Et,SHOWN:"shown"+Et,CLICK:"click"+Et,CLICK_DATA_API:"click"+Et+yt,KEYDOWN_DATA_API:"keydown"+Et+yt,KEYUP_DATA_API:"keyup"+Et+yt},At="disabled",Dt="show",bt="dropup",St="dropright",wt="dropleft",Nt="dropdown-menu-right",Ot="position-static",kt='[data-toggle="dropdown"]',Pt=".dropdown form",Lt=".dropdown-menu",jt=".navbar-nav",Rt=".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)",Ht="top-start",Wt="top-end",Mt="bottom-start",xt="bottom-end",Ut="right-start",Kt="left-start",Ft={offset:0,flip:!0,boundary:"scrollParent",reference:"toggle",display:"dynamic"},Vt={offset:"(number|string|function)",flip:"boolean",boundary:"(string|element)",reference:"(string|element)",display:"string"},Qt=function(){function l(t,e){this._element=t,this._popper=null,this._config=this._getConfig(e),this._menu=this._getMenuElement(),this._inNavbar=this._detectNavbar(),this._addEventListeners()}var t=l.prototype;return t.toggle=function(){if(!this._element.disabled&&!mt(this._element).hasClass(At)){var t=l._getParentFromElement(this._element),e=mt(this._menu).hasClass(Dt);if(l._clearMenus(),!e){var n={relatedTarget:this._element},i=mt.Event(It.SHOW,n);if(mt(t).trigger(i),!i.isDefaultPrevented()){if(!this._inNavbar){if("undefined"==typeof c)throw new TypeError("Bootstrap dropdown require Popper.js (https://popper.js.org)");var r=this._element;"parent"===this._config.reference?r=t:Cn.isElement(this._config.reference)&&(r=this._config.reference,"undefined"!=typeof this._config.reference.jquery&&(r=this._config.reference[0])),"scrollParent"!==this._config.boundary&&mt(t).addClass(Ot),this._popper=new c(r,this._menu,this._getPopperConfig())}"ontouchstart"in document.documentElement&&0===mt(t).closest(jt).length&&mt(document.body).children().on("mouseover",null,mt.noop),this._element.focus(),this._element.setAttribute("aria-expanded",!0),mt(this._menu).toggleClass(Dt),mt(t).toggleClass(Dt).trigger(mt.Event(It.SHOWN,n))}}}},t.dispose=function(){mt.removeData(this._element,vt),mt(this._element).off(Et),this._element=null,(this._menu=null)!==this._popper&&(this._popper.destroy(),this._popper=null)},t.update=function(){this._inNavbar=this._detectNavbar(),null!==this._popper&&this._popper.scheduleUpdate()},t._addEventListeners=function(){var e=this;mt(this._element).on(It.CLICK,function(t){t.preventDefault(),t.stopPropagation(),e.toggle()})},t._getConfig=function(t){return t=h({},this.constructor.Default,mt(this._element).data(),t),Cn.typeCheckConfig(pt,t,this.constructor.DefaultType),t},t._getMenuElement=function(){if(!this._menu){var t=l._getParentFromElement(this._element);this._menu=mt(t).find(Lt)[0]}return this._menu},t._getPlacement=function(){var t=mt(this._element).parent(),e=Mt;return t.hasClass(bt)?(e=Ht,mt(this._menu).hasClass(Nt)&&(e=Wt)):t.hasClass(St)?e=Ut:t.hasClass(wt)?e=Kt:mt(this._menu).hasClass(Nt)&&(e=xt),e},t._detectNavbar=function(){return 0<mt(this._element).closest(".navbar").length},t._getPopperConfig=function(){var e=this,t={};"function"==typeof this._config.offset?t.fn=function(t){return t.offsets=h({},t.offsets,e._config.offset(t.offsets)||{}),t}:t.offset=this._config.offset;var n={placement:this._getPlacement(),modifiers:{offset:t,flip:{enabled:this._config.flip},preventOverflow:{boundariesElement:this._config.boundary}}};return"static"===this._config.display&&(n.modifiers.applyStyle={enabled:!1}),n},l._jQueryInterface=function(e){return this.each(function(){var t=mt(this).data(vt);if(t||(t=new l(this,"object"==typeof e?e:null),mt(this).data(vt,t)),"string"==typeof e){if("undefined"==typeof t[e])throw new TypeError('No method named "'+e+'"');t[e]()}})},l._clearMenus=function(t){if(!t||3!==t.which&&("keyup"!==t.type||9===t.which))for(var e=mt.makeArray(mt(kt)),n=0;n<e.length;n++){var i=l._getParentFromElement(e[n]),r=mt(e[n]).data(vt),s={relatedTarget:e[n]};if(r){var o=r._menu;if(mt(i).hasClass(Dt)&&!(t&&("click"===t.type&&/input|textarea/i.test(t.target.tagName)||"keyup"===t.type&&9===t.which)&&mt.contains(i,t.target))){var a=mt.Event(It.HIDE,s);mt(i).trigger(a),a.isDefaultPrevented()||("ontouchstart"in document.documentElement&&mt(document.body).children().off("mouseover",null,mt.noop),e[n].setAttribute("aria-expanded","false"),mt(o).removeClass(Dt),mt(i).removeClass(Dt).trigger(mt.Event(It.HIDDEN,s)))}}}},l._getParentFromElement=function(t){var e,n=Cn.getSelectorFromElement(t);return n&&(e=mt(n)[0]),e||t.parentNode},l._dataApiKeydownHandler=function(t){if((/input|textarea/i.test(t.target.tagName)?!(32===t.which||27!==t.which&&(40!==t.which&&38!==t.which||mt(t.target).closest(Lt).length)):Ct.test(t.which))&&(t.preventDefault(),t.stopPropagation(),!this.disabled&&!mt(this).hasClass(At))){var e=l._getParentFromElement(this),n=mt(e).hasClass(Dt);if((n||27===t.which&&32===t.which)&&(!n||27!==t.which&&32!==t.which)){var i=mt(e).find(Rt).get();if(0!==i.length){var r=i.indexOf(t.target);38===t.which&&0<r&&r--,40===t.which&&r<i.length-1&&r++,r<0&&(r=0),i[r].focus()}}else{if(27===t.which){var s=mt(e).find(kt)[0];mt(s).trigger("focus")}mt(this).trigger("click")}}},o(l,null,[{key:"VERSION",get:function(){return"4.1.1"}},{key:"Default",get:function(){return Ft}},{key:"DefaultType",get:function(){return Vt}}]),l}(),mt(document).on(It.KEYDOWN_DATA_API,kt,Qt._dataApiKeydownHandler).on(It.KEYDOWN_DATA_API,Lt,Qt._dataApiKeydownHandler).on(It.CLICK_DATA_API+" "+It.KEYUP_DATA_API,Qt._clearMenus).on(It.CLICK_DATA_API,kt,function(t){t.preventDefault(),t.stopPropagation(),Qt._jQueryInterface.call(mt(this),"toggle")}).on(It.CLICK_DATA_API,Pt,function(t){t.stopPropagation()}),mt.fn[pt]=Qt._jQueryInterface,mt.fn[pt].Constructor=Qt,mt.fn[pt].noConflict=function(){return mt.fn[pt]=Tt,Qt._jQueryInterface},Qt),wn=(Yt="modal",qt="."+(Gt="bs.modal"),zt=(Bt=e).fn[Yt],Xt={backdrop:!0,keyboard:!0,focus:!0,show:!0},Jt={backdrop:"(boolean|string)",keyboard:"boolean",focus:"boolean",show:"boolean"},Zt={HIDE:"hide"+qt,HIDDEN:"hidden"+qt,SHOW:"show"+qt,SHOWN:"shown"+qt,FOCUSIN:"focusin"+qt,RESIZE:"resize"+qt,CLICK_DISMISS:"click.dismiss"+qt,KEYDOWN_DISMISS:"keydown.dismiss"+qt,MOUSEUP_DISMISS:"mouseup.dismiss"+qt,MOUSEDOWN_DISMISS:"mousedown.dismiss"+qt,CLICK_DATA_API:"click"+qt+".data-api"},$t="modal-scrollbar-measure",te="modal-backdrop",ee="modal-open",ne="fade",ie="show",re={DIALOG:".modal-dialog",DATA_TOGGLE:'[data-toggle="modal"]',DATA_DISMISS:'[data-dismiss="modal"]',FIXED_CONTENT:".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",STICKY_CONTENT:".sticky-top",NAVBAR_TOGGLER:".navbar-toggler"},se=function(){function r(t,e){this._config=this._getConfig(e),this._element=t,this._dialog=Bt(t).find(re.DIALOG)[0],this._backdrop=null,this._isShown=!1,this._isBodyOverflowing=!1,this._ignoreBackdropClick=!1,this._scrollbarWidth=0}var t=r.prototype;return t.toggle=function(t){return this._isShown?this.hide():this.show(t)},t.show=function(t){var e=this;if(!this._isTransitioning&&!this._isShown){Bt(this._element).hasClass(ne)&&(this._isTransitioning=!0);var n=Bt.Event(Zt.SHOW,{relatedTarget:t});Bt(this._element).trigger(n),this._isShown||n.isDefaultPrevented()||(this._isShown=!0,this._checkScrollbar(),this._setScrollbar(),this._adjustDialog(),Bt(document.body).addClass(ee),this._setEscapeEvent(),this._setResizeEvent(),Bt(this._element).on(Zt.CLICK_DISMISS,re.DATA_DISMISS,function(t){return e.hide(t)}),Bt(this._dialog).on(Zt.MOUSEDOWN_DISMISS,function(){Bt(e._element).one(Zt.MOUSEUP_DISMISS,function(t){Bt(t.target).is(e._element)&&(e._ignoreBackdropClick=!0)})}),this._showBackdrop(function(){return e._showElement(t)}))}},t.hide=function(t){var e=this;if(t&&t.preventDefault(),!this._isTransitioning&&this._isShown){var n=Bt.Event(Zt.HIDE);if(Bt(this._element).trigger(n),this._isShown&&!n.isDefaultPrevented()){this._isShown=!1;var i=Bt(this._element).hasClass(ne);if(i&&(this._isTransitioning=!0),this._setEscapeEvent(),this._setResizeEvent(),Bt(document).off(Zt.FOCUSIN),Bt(this._element).removeClass(ie),Bt(this._element).off(Zt.CLICK_DISMISS),Bt(this._dialog).off(Zt.MOUSEDOWN_DISMISS),i){var r=Cn.getTransitionDurationFromElement(this._element);Bt(this._element).one(Cn.TRANSITION_END,function(t){return e._hideModal(t)}).emulateTransitionEnd(r)}else this._hideModal()}}},t.dispose=function(){Bt.removeData(this._element,Gt),Bt(window,document,this._element,this._backdrop).off(qt),this._config=null,this._element=null,this._dialog=null,this._backdrop=null,this._isShown=null,this._isBodyOverflowing=null,this._ignoreBackdropClick=null,this._scrollbarWidth=null},t.handleUpdate=function(){this._adjustDialog()},t._getConfig=function(t){return t=h({},Xt,t),Cn.typeCheckConfig(Yt,t,Jt),t},t._showElement=function(t){var e=this,n=Bt(this._element).hasClass(ne);this._element.parentNode&&this._element.parentNode.nodeType===Node.ELEMENT_NODE||document.body.appendChild(this._element),this._element.style.display="block",this._element.removeAttribute("aria-hidden"),this._element.scrollTop=0,n&&Cn.reflow(this._element),Bt(this._element).addClass(ie),this._config.focus&&this._enforceFocus();var i=Bt.Event(Zt.SHOWN,{relatedTarget:t}),r=function(){e._config.focus&&e._element.focus(),e._isTransitioning=!1,Bt(e._element).trigger(i)};if(n){var s=Cn.getTransitionDurationFromElement(this._element);Bt(this._dialog).one(Cn.TRANSITION_END,r).emulateTransitionEnd(s)}else r()},t._enforceFocus=function(){var e=this;Bt(document).off(Zt.FOCUSIN).on(Zt.FOCUSIN,function(t){document!==t.target&&e._element!==t.target&&0===Bt(e._element).has(t.target).length&&e._element.focus()})},t._setEscapeEvent=function(){var e=this;this._isShown&&this._config.keyboard?Bt(this._element).on(Zt.KEYDOWN_DISMISS,function(t){27===t.which&&(t.preventDefault(),e.hide())}):this._isShown||Bt(this._element).off(Zt.KEYDOWN_DISMISS)},t._setResizeEvent=function(){var e=this;this._isShown?Bt(window).on(Zt.RESIZE,function(t){return e.handleUpdate(t)}):Bt(window).off(Zt.RESIZE)},t._hideModal=function(){var t=this;this._element.style.display="none",this._element.setAttribute("aria-hidden",!0),this._isTransitioning=!1,this._showBackdrop(function(){Bt(document.body).removeClass(ee),t._resetAdjustments(),t._resetScrollbar(),Bt(t._element).trigger(Zt.HIDDEN)})},t._removeBackdrop=function(){this._backdrop&&(Bt(this._backdrop).remove(),this._backdrop=null)},t._showBackdrop=function(t){var e=this,n=Bt(this._element).hasClass(ne)?ne:"";if(this._isShown&&this._config.backdrop){if(this._backdrop=document.createElement("div"),this._backdrop.className=te,n&&Bt(this._backdrop).addClass(n),Bt(this._backdrop).appendTo(document.body),Bt(this._element).on(Zt.CLICK_DISMISS,function(t){e._ignoreBackdropClick?e._ignoreBackdropClick=!1:t.target===t.currentTarget&&("static"===e._config.backdrop?e._element.focus():e.hide())}),n&&Cn.reflow(this._backdrop),Bt(this._backdrop).addClass(ie),!t)return;if(!n)return void t();var i=Cn.getTransitionDurationFromElement(this._backdrop);Bt(this._backdrop).one(Cn.TRANSITION_END,t).emulateTransitionEnd(i)}else if(!this._isShown&&this._backdrop){Bt(this._backdrop).removeClass(ie);var r=function(){e._removeBackdrop(),t&&t()};if(Bt(this._element).hasClass(ne)){var s=Cn.getTransitionDurationFromElement(this._backdrop);Bt(this._backdrop).one(Cn.TRANSITION_END,r).emulateTransitionEnd(s)}else r()}else t&&t()},t._adjustDialog=function(){var t=this._element.scrollHeight>document.documentElement.clientHeight;!this._isBodyOverflowing&&t&&(this._element.style.paddingLeft=this._scrollbarWidth+"px"),this._isBodyOverflowing&&!t&&(this._element.style.paddingRight=this._scrollbarWidth+"px")},t._resetAdjustments=function(){this._element.style.paddingLeft="",this._element.style.paddingRight=""},t._checkScrollbar=function(){var t=document.body.getBoundingClientRect();this._isBodyOverflowing=t.left+t.right<window.innerWidth,this._scrollbarWidth=this._getScrollbarWidth()},t._setScrollbar=function(){var r=this;if(this._isBodyOverflowing){Bt(re.FIXED_CONTENT).each(function(t,e){var n=Bt(e)[0].style.paddingRight,i=Bt(e).css("padding-right");Bt(e).data("padding-right",n).css("padding-right",parseFloat(i)+r._scrollbarWidth+"px")}),Bt(re.STICKY_CONTENT).each(function(t,e){var n=Bt(e)[0].style.marginRight,i=Bt(e).css("margin-right");Bt(e).data("margin-right",n).css("margin-right",parseFloat(i)-r._scrollbarWidth+"px")}),Bt(re.NAVBAR_TOGGLER).each(function(t,e){var n=Bt(e)[0].style.marginRight,i=Bt(e).css("margin-right");Bt(e).data("margin-right",n).css("margin-right",parseFloat(i)+r._scrollbarWidth+"px")});var t=document.body.style.paddingRight,e=Bt(document.body).css("padding-right");Bt(document.body).data("padding-right",t).css("padding-right",parseFloat(e)+this._scrollbarWidth+"px")}},t._resetScrollbar=function(){Bt(re.FIXED_CONTENT).each(function(t,e){var n=Bt(e).data("padding-right");"undefined"!=typeof n&&Bt(e).css("padding-right",n).removeData("padding-right")}),Bt(re.STICKY_CONTENT+", "+re.NAVBAR_TOGGLER).each(function(t,e){var n=Bt(e).data("margin-right");"undefined"!=typeof n&&Bt(e).css("margin-right",n).removeData("margin-right")});var t=Bt(document.body).data("padding-right");"undefined"!=typeof t&&Bt(document.body).css("padding-right",t).removeData("padding-right")},t._getScrollbarWidth=function(){var t=document.createElement("div");t.className=$t,document.body.appendChild(t);var e=t.getBoundingClientRect().width-t.clientWidth;return document.body.removeChild(t),e},r._jQueryInterface=function(n,i){return this.each(function(){var t=Bt(this).data(Gt),e=h({},Xt,Bt(this).data(),"object"==typeof n&&n?n:{});if(t||(t=new r(this,e),Bt(this).data(Gt,t)),"string"==typeof n){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n](i)}else e.show&&t.show(i)})},o(r,null,[{key:"VERSION",get:function(){return"4.1.1"}},{key:"Default",get:function(){return Xt}}]),r}(),Bt(document).on(Zt.CLICK_DATA_API,re.DATA_TOGGLE,function(t){var e,n=this,i=Cn.getSelectorFromElement(this);i&&(e=Bt(i)[0]);var r=Bt(e).data(Gt)?"toggle":h({},Bt(e).data(),Bt(this).data());"A"!==this.tagName&&"AREA"!==this.tagName||t.preventDefault();var s=Bt(e).one(Zt.SHOW,function(t){t.isDefaultPrevented()||s.one(Zt.HIDDEN,function(){Bt(n).is(":visible")&&n.focus()})});se._jQueryInterface.call(Bt(e),r,this)}),Bt.fn[Yt]=se._jQueryInterface,Bt.fn[Yt].Constructor=se,Bt.fn[Yt].noConflict=function(){return Bt.fn[Yt]=zt,se._jQueryInterface},se),Nn=(ae="tooltip",he="."+(le="bs.tooltip"),ce=(oe=e).fn[ae],ue="bs-tooltip",fe=new RegExp("(^|\\s)"+ue+"\\S+","g"),ge={animation:!0,template:'<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!(_e={AUTO:"auto",TOP:"top",RIGHT:"right",BOTTOM:"bottom",LEFT:"left"}),selector:!(de={animation:"boolean",template:"string",title:"(string|element|function)",trigger:"string",delay:"(number|object)",html:"boolean",selector:"(string|boolean)",placement:"(string|function)",offset:"(number|string)",container:"(string|element|boolean)",fallbackPlacement:"(string|array)",boundary:"(string|element)"}),placement:"top",offset:0,container:!1,fallbackPlacement:"flip",boundary:"scrollParent"},pe="out",ve={HIDE:"hide"+he,HIDDEN:"hidden"+he,SHOW:(me="show")+he,SHOWN:"shown"+he,INSERTED:"inserted"+he,CLICK:"click"+he,FOCUSIN:"focusin"+he,FOCUSOUT:"focusout"+he,MOUSEENTER:"mouseenter"+he,MOUSELEAVE:"mouseleave"+he},Ee="fade",ye="show",Te=".tooltip-inner",Ce=".arrow",Ie="hover",Ae="focus",De="click",be="manual",Se=function(){function i(t,e){if("undefined"==typeof c)throw new TypeError("Bootstrap tooltips require Popper.js (https://popper.js.org)");this._isEnabled=!0,this._timeout=0,this._hoverState="",this._activeTrigger={},this._popper=null,this.element=t,this.config=this._getConfig(e),this.tip=null,this._setListeners()}var t=i.prototype;return t.enable=function(){this._isEnabled=!0},t.disable=function(){this._isEnabled=!1},t.toggleEnabled=function(){this._isEnabled=!this._isEnabled},t.toggle=function(t){if(this._isEnabled)if(t){var e=this.constructor.DATA_KEY,n=oe(t.currentTarget).data(e);n||(n=new this.constructor(t.currentTarget,this._getDelegateConfig()),oe(t.currentTarget).data(e,n)),n._activeTrigger.click=!n._activeTrigger.click,n._isWithActiveTrigger()?n._enter(null,n):n._leave(null,n)}else{if(oe(this.getTipElement()).hasClass(ye))return void this._leave(null,this);this._enter(null,this)}},t.dispose=function(){clearTimeout(this._timeout),oe.removeData(this.element,this.constructor.DATA_KEY),oe(this.element).off(this.constructor.EVENT_KEY),oe(this.element).closest(".modal").off("hide.bs.modal"),this.tip&&oe(this.tip).remove(),this._isEnabled=null,this._timeout=null,this._hoverState=null,(this._activeTrigger=null)!==this._popper&&this._popper.destroy(),this._popper=null,this.element=null,this.config=null,this.tip=null},t.show=function(){var e=this;if("none"===oe(this.element).css("display"))throw new Error("Please use show on visible elements");var t=oe.Event(this.constructor.Event.SHOW);if(this.isWithContent()&&this._isEnabled){oe(this.element).trigger(t);var n=oe.contains(this.element.ownerDocument.documentElement,this.element);if(t.isDefaultPrevented()||!n)return;var i=this.getTipElement(),r=Cn.getUID(this.constructor.NAME);i.setAttribute("id",r),this.element.setAttribute("aria-describedby",r),this.setContent(),this.config.animation&&oe(i).addClass(Ee);var s="function"==typeof this.config.placement?this.config.placement.call(this,i,this.element):this.config.placement,o=this._getAttachment(s);this.addAttachmentClass(o);var a=!1===this.config.container?document.body:oe(this.config.container);oe(i).data(this.constructor.DATA_KEY,this),oe.contains(this.element.ownerDocument.documentElement,this.tip)||oe(i).appendTo(a),oe(this.element).trigger(this.constructor.Event.INSERTED),this._popper=new c(this.element,i,{placement:o,modifiers:{offset:{offset:this.config.offset},flip:{behavior:this.config.fallbackPlacement},arrow:{element:Ce},preventOverflow:{boundariesElement:this.config.boundary}},onCreate:function(t){t.originalPlacement!==t.placement&&e._handlePopperPlacementChange(t)},onUpdate:function(t){e._handlePopperPlacementChange(t)}}),oe(i).addClass(ye),"ontouchstart"in document.documentElement&&oe(document.body).children().on("mouseover",null,oe.noop);var l=function(){e.config.animation&&e._fixTransition();var t=e._hoverState;e._hoverState=null,oe(e.element).trigger(e.constructor.Event.SHOWN),t===pe&&e._leave(null,e)};if(oe(this.tip).hasClass(Ee)){var h=Cn.getTransitionDurationFromElement(this.tip);oe(this.tip).one(Cn.TRANSITION_END,l).emulateTransitionEnd(h)}else l()}},t.hide=function(t){var e=this,n=this.getTipElement(),i=oe.Event(this.constructor.Event.HIDE),r=function(){e._hoverState!==me&&n.parentNode&&n.parentNode.removeChild(n),e._cleanTipClass(),e.element.removeAttribute("aria-describedby"),oe(e.element).trigger(e.constructor.Event.HIDDEN),null!==e._popper&&e._popper.destroy(),t&&t()};if(oe(this.element).trigger(i),!i.isDefaultPrevented()){if(oe(n).removeClass(ye),"ontouchstart"in document.documentElement&&oe(document.body).children().off("mouseover",null,oe.noop),this._activeTrigger[De]=!1,this._activeTrigger[Ae]=!1,this._activeTrigger[Ie]=!1,oe(this.tip).hasClass(Ee)){var s=Cn.getTransitionDurationFromElement(n);oe(n).one(Cn.TRANSITION_END,r).emulateTransitionEnd(s)}else r();this._hoverState=""}},t.update=function(){null!==this._popper&&this._popper.scheduleUpdate()},t.isWithContent=function(){return Boolean(this.getTitle())},t.addAttachmentClass=function(t){oe(this.getTipElement()).addClass(ue+"-"+t)},t.getTipElement=function(){return this.tip=this.tip||oe(this.config.template)[0],this.tip},t.setContent=function(){var t=oe(this.getTipElement());this.setElementContent(t.find(Te),this.getTitle()),t.removeClass(Ee+" "+ye)},t.setElementContent=function(t,e){var n=this.config.html;"object"==typeof e&&(e.nodeType||e.jquery)?n?oe(e).parent().is(t)||t.empty().append(e):t.text(oe(e).text()):t[n?"html":"text"](e)},t.getTitle=function(){var t=this.element.getAttribute("data-original-title");return t||(t="function"==typeof this.config.title?this.config.title.call(this.element):this.config.title),t},t._getAttachment=function(t){return _e[t.toUpperCase()]},t._setListeners=function(){var i=this;this.config.trigger.split(" ").forEach(function(t){if("click"===t)oe(i.element).on(i.constructor.Event.CLICK,i.config.selector,function(t){return i.toggle(t)});else if(t!==be){var e=t===Ie?i.constructor.Event.MOUSEENTER:i.constructor.Event.FOCUSIN,n=t===Ie?i.constructor.Event.MOUSELEAVE:i.constructor.Event.FOCUSOUT;oe(i.element).on(e,i.config.selector,function(t){return i._enter(t)}).on(n,i.config.selector,function(t){return i._leave(t)})}oe(i.element).closest(".modal").on("hide.bs.modal",function(){return i.hide()})}),this.config.selector?this.config=h({},this.config,{trigger:"manual",selector:""}):this._fixTitle()},t._fixTitle=function(){var t=typeof this.element.getAttribute("data-original-title");(this.element.getAttribute("title")||"string"!==t)&&(this.element.setAttribute("data-original-title",this.element.getAttribute("title")||""),this.element.setAttribute("title",""))},t._enter=function(t,e){var n=this.constructor.DATA_KEY;(e=e||oe(t.currentTarget).data(n))||(e=new this.constructor(t.currentTarget,this._getDelegateConfig()),oe(t.currentTarget).data(n,e)),t&&(e._activeTrigger["focusin"===t.type?Ae:Ie]=!0),oe(e.getTipElement()).hasClass(ye)||e._hoverState===me?e._hoverState=me:(clearTimeout(e._timeout),e._hoverState=me,e.config.delay&&e.config.delay.show?e._timeout=setTimeout(function(){e._hoverState===me&&e.show()},e.config.delay.show):e.show())},t._leave=function(t,e){var n=this.constructor.DATA_KEY;(e=e||oe(t.currentTarget).data(n))||(e=new this.constructor(t.currentTarget,this._getDelegateConfig()),oe(t.currentTarget).data(n,e)),t&&(e._activeTrigger["focusout"===t.type?Ae:Ie]=!1),e._isWithActiveTrigger()||(clearTimeout(e._timeout),e._hoverState=pe,e.config.delay&&e.config.delay.hide?e._timeout=setTimeout(function(){e._hoverState===pe&&e.hide()},e.config.delay.hide):e.hide())},t._isWithActiveTrigger=function(){for(var t in this._activeTrigger)if(this._activeTrigger[t])return!0;return!1},t._getConfig=function(t){return"number"==typeof(t=h({},this.constructor.Default,oe(this.element).data(),"object"==typeof t&&t?t:{})).delay&&(t.delay={show:t.delay,hide:t.delay}),"number"==typeof t.title&&(t.title=t.title.toString()),"number"==typeof t.content&&(t.content=t.content.toString()),Cn.typeCheckConfig(ae,t,this.constructor.DefaultType),t},t._getDelegateConfig=function(){var t={};if(this.config)for(var e in this.config)this.constructor.Default[e]!==this.config[e]&&(t[e]=this.config[e]);return t},t._cleanTipClass=function(){var t=oe(this.getTipElement()),e=t.attr("class").match(fe);null!==e&&0<e.length&&t.removeClass(e.join(""))},t._handlePopperPlacementChange=function(t){this._cleanTipClass(),this.addAttachmentClass(this._getAttachment(t.placement))},t._fixTransition=function(){var t=this.getTipElement(),e=this.config.animation;null===t.getAttribute("x-placement")&&(oe(t).removeClass(Ee),this.config.animation=!1,this.hide(),this.show(),this.config.animation=e)},i._jQueryInterface=function(n){return this.each(function(){var t=oe(this).data(le),e="object"==typeof n&&n;if((t||!/dispose|hide/.test(n))&&(t||(t=new i(this,e),oe(this).data(le,t)),"string"==typeof n)){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n]()}})},o(i,null,[{key:"VERSION",get:function(){return"4.1.1"}},{key:"Default",get:function(){return ge}},{key:"NAME",get:function(){return ae}},{key:"DATA_KEY",get:function(){return le}},{key:"Event",get:function(){return ve}},{key:"EVENT_KEY",get:function(){return he}},{key:"DefaultType",get:function(){return de}}]),i}(),oe.fn[ae]=Se._jQueryInterface,oe.fn[ae].Constructor=Se,oe.fn[ae].noConflict=function(){return oe.fn[ae]=ce,Se._jQueryInterface},Se),On=(Ne="popover",ke="."+(Oe="bs.popover"),Pe=(we=e).fn[Ne],Le="bs-popover",je=new RegExp("(^|\\s)"+Le+"\\S+","g"),Re=h({},Nn.Default,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'}),He=h({},Nn.DefaultType,{content:"(string|element|function)"}),We="fade",xe=".popover-header",Ue=".popover-body",Ke={HIDE:"hide"+ke,HIDDEN:"hidden"+ke,SHOW:(Me="show")+ke,SHOWN:"shown"+ke,INSERTED:"inserted"+ke,CLICK:"click"+ke,FOCUSIN:"focusin"+ke,FOCUSOUT:"focusout"+ke,MOUSEENTER:"mouseenter"+ke,MOUSELEAVE:"mouseleave"+ke},Fe=function(t){var e,n;function i(){return t.apply(this,arguments)||this}n=t,(e=i).prototype=Object.create(n.prototype),(e.prototype.constructor=e).__proto__=n;var r=i.prototype;return r.isWithContent=function(){return this.getTitle()||this._getContent()},r.addAttachmentClass=function(t){we(this.getTipElement()).addClass(Le+"-"+t)},r.getTipElement=function(){return this.tip=this.tip||we(this.config.template)[0],this.tip},r.setContent=function(){var t=we(this.getTipElement());this.setElementContent(t.find(xe),this.getTitle());var e=this._getContent();"function"==typeof e&&(e=e.call(this.element)),this.setElementContent(t.find(Ue),e),t.removeClass(We+" "+Me)},r._getContent=function(){return this.element.getAttribute("data-content")||this.config.content},r._cleanTipClass=function(){var t=we(this.getTipElement()),e=t.attr("class").match(je);null!==e&&0<e.length&&t.removeClass(e.join(""))},i._jQueryInterface=function(n){return this.each(function(){var t=we(this).data(Oe),e="object"==typeof n?n:null;if((t||!/destroy|hide/.test(n))&&(t||(t=new i(this,e),we(this).data(Oe,t)),"string"==typeof n)){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n]()}})},o(i,null,[{key:"VERSION",get:function(){return"4.1.1"}},{key:"Default",get:function(){return Re}},{key:"NAME",get:function(){return Ne}},{key:"DATA_KEY",get:function(){return Oe}},{key:"Event",get:function(){return Ke}},{key:"EVENT_KEY",get:function(){return ke}},{key:"DefaultType",get:function(){return He}}]),i}(Nn),we.fn[Ne]=Fe._jQueryInterface,we.fn[Ne].Constructor=Fe,we.fn[Ne].noConflict=function(){return we.fn[Ne]=Pe,Fe._jQueryInterface},Fe),kn=(Qe="scrollspy",Ye="."+(Be="bs.scrollspy"),Ge=(Ve=e).fn[Qe],qe={offset:10,method:"auto",target:""},ze={offset:"number",method:"string",target:"(string|element)"},Xe={ACTIVATE:"activate"+Ye,SCROLL:"scroll"+Ye,LOAD_DATA_API:"load"+Ye+".data-api"},Je="dropdown-item",Ze="active",$e={DATA_SPY:'[data-spy="scroll"]',ACTIVE:".active",NAV_LIST_GROUP:".nav, .list-group",NAV_LINKS:".nav-link",NAV_ITEMS:".nav-item",LIST_ITEMS:".list-group-item",DROPDOWN:".dropdown",DROPDOWN_ITEMS:".dropdown-item",DROPDOWN_TOGGLE:".dropdown-toggle"},tn="offset",en="position",nn=function(){function n(t,e){var n=this;this._element=t,this._scrollElement="BODY"===t.tagName?window:t,this._config=this._getConfig(e),this._selector=this._config.target+" "+$e.NAV_LINKS+","+this._config.target+" "+$e.LIST_ITEMS+","+this._config.target+" "+$e.DROPDOWN_ITEMS,this._offsets=[],this._targets=[],this._activeTarget=null,this._scrollHeight=0,Ve(this._scrollElement).on(Xe.SCROLL,function(t){return n._process(t)}),this.refresh(),this._process()}var t=n.prototype;return t.refresh=function(){var e=this,t=this._scrollElement===this._scrollElement.window?tn:en,r="auto"===this._config.method?t:this._config.method,s=r===en?this._getScrollTop():0;this._offsets=[],this._targets=[],this._scrollHeight=this._getScrollHeight(),Ve.makeArray(Ve(this._selector)).map(function(t){var e,n=Cn.getSelectorFromElement(t);if(n&&(e=Ve(n)[0]),e){var i=e.getBoundingClientRect();if(i.width||i.height)return[Ve(e)[r]().top+s,n]}return null}).filter(function(t){return t}).sort(function(t,e){return t[0]-e[0]}).forEach(function(t){e._offsets.push(t[0]),e._targets.push(t[1])})},t.dispose=function(){Ve.removeData(this._element,Be),Ve(this._scrollElement).off(Ye),this._element=null,this._scrollElement=null,this._config=null,this._selector=null,this._offsets=null,this._targets=null,this._activeTarget=null,this._scrollHeight=null},t._getConfig=function(t){if("string"!=typeof(t=h({},qe,"object"==typeof t&&t?t:{})).target){var e=Ve(t.target).attr("id");e||(e=Cn.getUID(Qe),Ve(t.target).attr("id",e)),t.target="#"+e}return Cn.typeCheckConfig(Qe,t,ze),t},t._getScrollTop=function(){return this._scrollElement===window?this._scrollElement.pageYOffset:this._scrollElement.scrollTop},t._getScrollHeight=function(){return this._scrollElement.scrollHeight||Math.max(document.body.scrollHeight,document.documentElement.scrollHeight)},t._getOffsetHeight=function(){return this._scrollElement===window?window.innerHeight:this._scrollElement.getBoundingClientRect().height},t._process=function(){var t=this._getScrollTop()+this._config.offset,e=this._getScrollHeight(),n=this._config.offset+e-this._getOffsetHeight();if(this._scrollHeight!==e&&this.refresh(),n<=t){var i=this._targets[this._targets.length-1];this._activeTarget!==i&&this._activate(i)}else{if(this._activeTarget&&t<this._offsets[0]&&0<this._offsets[0])return this._activeTarget=null,void this._clear();for(var r=this._offsets.length;r--;){this._activeTarget!==this._targets[r]&&t>=this._offsets[r]&&("undefined"==typeof this._offsets[r+1]||t<this._offsets[r+1])&&this._activate(this._targets[r])}}},t._activate=function(e){this._activeTarget=e,this._clear();var t=this._selector.split(",");t=t.map(function(t){return t+'[data-target="'+e+'"],'+t+'[href="'+e+'"]'});var n=Ve(t.join(","));n.hasClass(Je)?(n.closest($e.DROPDOWN).find($e.DROPDOWN_TOGGLE).addClass(Ze),n.addClass(Ze)):(n.addClass(Ze),n.parents($e.NAV_LIST_GROUP).prev($e.NAV_LINKS+", "+$e.LIST_ITEMS).addClass(Ze),n.parents($e.NAV_LIST_GROUP).prev($e.NAV_ITEMS).children($e.NAV_LINKS).addClass(Ze)),Ve(this._scrollElement).trigger(Xe.ACTIVATE,{relatedTarget:e})},t._clear=function(){Ve(this._selector).filter($e.ACTIVE).removeClass(Ze)},n._jQueryInterface=function(e){return this.each(function(){var t=Ve(this).data(Be);if(t||(t=new n(this,"object"==typeof e&&e),Ve(this).data(Be,t)),"string"==typeof e){if("undefined"==typeof t[e])throw new TypeError('No method named "'+e+'"');t[e]()}})},o(n,null,[{key:"VERSION",get:function(){return"4.1.1"}},{key:"Default",get:function(){return qe}}]),n}(),Ve(window).on(Xe.LOAD_DATA_API,function(){for(var t=Ve.makeArray(Ve($e.DATA_SPY)),e=t.length;e--;){var n=Ve(t[e]);nn._jQueryInterface.call(n,n.data())}}),Ve.fn[Qe]=nn._jQueryInterface,Ve.fn[Qe].Constructor=nn,Ve.fn[Qe].noConflict=function(){return Ve.fn[Qe]=Ge,nn._jQueryInterface},nn),Pn=(on="."+(sn="bs.tab"),an=(rn=e).fn.tab,ln={HIDE:"hide"+on,HIDDEN:"hidden"+on,SHOW:"show"+on,SHOWN:"shown"+on,CLICK_DATA_API:"click"+on+".data-api"},hn="dropdown-menu",cn="active",un="disabled",fn="fade",dn="show",_n=".dropdown",gn=".nav, .list-group",mn=".active",pn="> li > .active",vn='[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]',En=".dropdown-toggle",yn="> .dropdown-menu .active",Tn=function(){function i(t){this._element=t}var t=i.prototype;return t.show=function(){var n=this;if(!(this._element.parentNode&&this._element.parentNode.nodeType===Node.ELEMENT_NODE&&rn(this._element).hasClass(cn)||rn(this._element).hasClass(un))){var t,i,e=rn(this._element).closest(gn)[0],r=Cn.getSelectorFromElement(this._element);if(e){var s="UL"===e.nodeName?pn:mn;i=(i=rn.makeArray(rn(e).find(s)))[i.length-1]}var o=rn.Event(ln.HIDE,{relatedTarget:this._element}),a=rn.Event(ln.SHOW,{relatedTarget:i});if(i&&rn(i).trigger(o),rn(this._element).trigger(a),!a.isDefaultPrevented()&&!o.isDefaultPrevented()){r&&(t=rn(r)[0]),this._activate(this._element,e);var l=function(){var t=rn.Event(ln.HIDDEN,{relatedTarget:n._element}),e=rn.Event(ln.SHOWN,{relatedTarget:i});rn(i).trigger(t),rn(n._element).trigger(e)};t?this._activate(t,t.parentNode,l):l()}}},t.dispose=function(){rn.removeData(this._element,sn),this._element=null},t._activate=function(t,e,n){var i=this,r=("UL"===e.nodeName?rn(e).find(pn):rn(e).children(mn))[0],s=n&&r&&rn(r).hasClass(fn),o=function(){return i._transitionComplete(t,r,n)};if(r&&s){var a=Cn.getTransitionDurationFromElement(r);rn(r).one(Cn.TRANSITION_END,o).emulateTransitionEnd(a)}else o()},t._transitionComplete=function(t,e,n){if(e){rn(e).removeClass(dn+" "+cn);var i=rn(e.parentNode).find(yn)[0];i&&rn(i).removeClass(cn),"tab"===e.getAttribute("role")&&e.setAttribute("aria-selected",!1)}if(rn(t).addClass(cn),"tab"===t.getAttribute("role")&&t.setAttribute("aria-selected",!0),Cn.reflow(t),rn(t).addClass(dn),t.parentNode&&rn(t.parentNode).hasClass(hn)){var r=rn(t).closest(_n)[0];r&&rn(r).find(En).addClass(cn),t.setAttribute("aria-expanded",!0)}n&&n()},i._jQueryInterface=function(n){return this.each(function(){var t=rn(this),e=t.data(sn);if(e||(e=new i(this),t.data(sn,e)),"string"==typeof n){if("undefined"==typeof e[n])throw new TypeError('No method named "'+n+'"');e[n]()}})},o(i,null,[{key:"VERSION",get:function(){return"4.1.1"}}]),i}(),rn(document).on(ln.CLICK_DATA_API,vn,function(t){t.preventDefault(),Tn._jQueryInterface.call(rn(this),"show")}),rn.fn.tab=Tn._jQueryInterface,rn.fn.tab.Constructor=Tn,rn.fn.tab.noConflict=function(){return rn.fn.tab=an,Tn._jQueryInterface},Tn);!function(t){if("undefined"==typeof t)throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");var e=t.fn.jquery.split(" ")[0].split(".");if(e[0]<2&&e[1]<9||1===e[0]&&9===e[1]&&e[2]<1||4<=e[0])throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0")}(e),t.Util=Cn,t.Alert=In,t.Button=An,t.Carousel=Dn,t.Collapse=bn,t.Dropdown=Sn,t.Modal=wn,t.Popover=On,t.Scrollspy=kn,t.Tab=Pn,t.Tooltip=Nn,Object.defineProperty(t,"__esModule",{value:!0})});

/*!
   Copyright 2008-2021 SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 DataTables 1.10.24
 ©2008-2021 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(k,y,z){k instanceof String&&(k=String(k));for(var q=k.length,G=0;G<q;G++){var O=k[G];if(y.call(z,O,G,k))return{i:G,v:O}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(k,y,z){if(k==Array.prototype||k==Object.prototype)return k;k[y]=z.value;return k};$jscomp.getGlobal=function(k){k=["object"==typeof globalThis&&globalThis,k,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var y=0;y<k.length;++y){var z=k[y];if(z&&z.Math==Math)return z}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(k,y){var z=$jscomp.propertyToPolyfillSymbol[y];if(null==z)return k[y];z=k[z];return void 0!==z?z:k[y]};
$jscomp.polyfill=function(k,y,z,q){y&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(k,y,z,q):$jscomp.polyfillUnisolated(k,y,z,q))};$jscomp.polyfillUnisolated=function(k,y,z,q){z=$jscomp.global;k=k.split(".");for(q=0;q<k.length-1;q++){var G=k[q];if(!(G in z))return;z=z[G]}k=k[k.length-1];q=z[k];y=y(q);y!=q&&null!=y&&$jscomp.defineProperty(z,k,{configurable:!0,writable:!0,value:y})};
$jscomp.polyfillIsolated=function(k,y,z,q){var G=k.split(".");k=1===G.length;q=G[0];q=!k&&q in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var O=0;O<G.length-1;O++){var ma=G[O];if(!(ma in q))return;q=q[ma]}G=G[G.length-1];z=$jscomp.IS_SYMBOL_NATIVE&&"es6"===z?q[G]:null;y=y(z);null!=y&&(k?$jscomp.defineProperty($jscomp.polyfills,G,{configurable:!0,writable:!0,value:y}):y!==z&&($jscomp.propertyToPolyfillSymbol[G]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(G):$jscomp.POLYFILL_PREFIX+G,
G=$jscomp.propertyToPolyfillSymbol[G],$jscomp.defineProperty(q,G,{configurable:!0,writable:!0,value:y})))};$jscomp.polyfill("Array.prototype.find",function(k){return k?k:function(y,z){return $jscomp.findInternal(this,y,z).v}},"es6","es3");
(function(k){"function"===typeof define&&define.amd?define(["jquery"],function(y){return k(y,window,document)}):"object"===typeof exports?module.exports=function(y,z){y||(y=window);z||(z="undefined"!==typeof window?require("jquery"):require("jquery")(y));return k(z,y,y.document)}:k(jQuery,window,document)})(function(k,y,z,q){function G(a){var b,c,d={};k.each(a,function(e,f){(b=e.match(/^([^A-Z]+?)([A-Z])/))&&-1!=="a aa ai ao as b fn i m o s ".indexOf(b[1]+" ")&&(c=e.replace(b[0],b[2].toLowerCase()),
d[c]=e,"o"===b[1]&&G(a[e]))});a._hungarianMap=d}function O(a,b,c){a._hungarianMap||G(a);var d;k.each(b,function(e,f){d=a._hungarianMap[e];d===q||!c&&b[d]!==q||("o"===d.charAt(0)?(b[d]||(b[d]={}),k.extend(!0,b[d],b[e]),O(a[d],b[d],c)):b[d]=b[e])})}function ma(a){var b=u.defaults.oLanguage,c=b.sDecimal;c&&Va(c);if(a){var d=a.sZeroRecords;!a.sEmptyTable&&d&&"No data available in table"===b.sEmptyTable&&V(a,a,"sZeroRecords","sEmptyTable");!a.sLoadingRecords&&d&&"Loading..."===b.sLoadingRecords&&V(a,a,
"sZeroRecords","sLoadingRecords");a.sInfoThousands&&(a.sThousands=a.sInfoThousands);(a=a.sDecimal)&&c!==a&&Va(a)}}function yb(a){R(a,"ordering","bSort");R(a,"orderMulti","bSortMulti");R(a,"orderClasses","bSortClasses");R(a,"orderCellsTop","bSortCellsTop");R(a,"order","aaSorting");R(a,"orderFixed","aaSortingFixed");R(a,"paging","bPaginate");R(a,"pagingType","sPaginationType");R(a,"pageLength","iDisplayLength");R(a,"searching","bFilter");"boolean"===typeof a.sScrollX&&(a.sScrollX=a.sScrollX?"100%":
"");"boolean"===typeof a.scrollX&&(a.scrollX=a.scrollX?"100%":"");if(a=a.aoSearchCols)for(var b=0,c=a.length;b<c;b++)a[b]&&O(u.models.oSearch,a[b])}function zb(a){R(a,"orderable","bSortable");R(a,"orderData","aDataSort");R(a,"orderSequence","asSorting");R(a,"orderDataType","sortDataType");var b=a.aDataSort;"number"!==typeof b||Array.isArray(b)||(a.aDataSort=[b])}function Ab(a){if(!u.__browser){var b={};u.__browser=b;var c=k("<div/>").css({position:"fixed",top:0,left:-1*k(y).scrollLeft(),height:1,
width:1,overflow:"hidden"}).append(k("<div/>").css({position:"absolute",top:1,left:1,width:100,overflow:"scroll"}).append(k("<div/>").css({width:"100%",height:10}))).appendTo("body"),d=c.children(),e=d.children();b.barWidth=d[0].offsetWidth-d[0].clientWidth;b.bScrollOversize=100===e[0].offsetWidth&&100!==d[0].clientWidth;b.bScrollbarLeft=1!==Math.round(e.offset().left);b.bBounding=c[0].getBoundingClientRect().width?!0:!1;c.remove()}k.extend(a.oBrowser,u.__browser);a.oScroll.iBarWidth=u.__browser.barWidth}
function Bb(a,b,c,d,e,f){var g=!1;if(c!==q){var h=c;g=!0}for(;d!==e;)a.hasOwnProperty(d)&&(h=g?b(h,a[d],d,a):a[d],g=!0,d+=f);return h}function Wa(a,b){var c=u.defaults.column,d=a.aoColumns.length;c=k.extend({},u.models.oColumn,c,{nTh:b?b:z.createElement("th"),sTitle:c.sTitle?c.sTitle:b?b.innerHTML:"",aDataSort:c.aDataSort?c.aDataSort:[d],mData:c.mData?c.mData:d,idx:d});a.aoColumns.push(c);c=a.aoPreSearchCols;c[d]=k.extend({},u.models.oSearch,c[d]);Da(a,d,k(b).data())}function Da(a,b,c){b=a.aoColumns[b];
var d=a.oClasses,e=k(b.nTh);if(!b.sWidthOrig){b.sWidthOrig=e.attr("width")||null;var f=(e.attr("style")||"").match(/width:\s*(\d+[pxem%]+)/);f&&(b.sWidthOrig=f[1])}c!==q&&null!==c&&(zb(c),O(u.defaults.column,c,!0),c.mDataProp===q||c.mData||(c.mData=c.mDataProp),c.sType&&(b._sManualType=c.sType),c.className&&!c.sClass&&(c.sClass=c.className),c.sClass&&e.addClass(c.sClass),k.extend(b,c),V(b,c,"sWidth","sWidthOrig"),c.iDataSort!==q&&(b.aDataSort=[c.iDataSort]),V(b,c,"aDataSort"));var g=b.mData,h=ia(g),
l=b.mRender?ia(b.mRender):null;c=function(n){return"string"===typeof n&&-1!==n.indexOf("@")};b._bAttrSrc=k.isPlainObject(g)&&(c(g.sort)||c(g.type)||c(g.filter));b._setter=null;b.fnGetData=function(n,m,p){var t=h(n,m,q,p);return l&&m?l(t,m,n,p):t};b.fnSetData=function(n,m,p){return da(g)(n,m,p)};"number"!==typeof g&&(a._rowReadObject=!0);a.oFeatures.bSort||(b.bSortable=!1,e.addClass(d.sSortableNone));a=-1!==k.inArray("asc",b.asSorting);c=-1!==k.inArray("desc",b.asSorting);b.bSortable&&(a||c)?a&&!c?
(b.sSortingClass=d.sSortableAsc,b.sSortingClassJUI=d.sSortJUIAscAllowed):!a&&c?(b.sSortingClass=d.sSortableDesc,b.sSortingClassJUI=d.sSortJUIDescAllowed):(b.sSortingClass=d.sSortable,b.sSortingClassJUI=d.sSortJUI):(b.sSortingClass=d.sSortableNone,b.sSortingClassJUI="")}function ra(a){if(!1!==a.oFeatures.bAutoWidth){var b=a.aoColumns;Xa(a);for(var c=0,d=b.length;c<d;c++)b[c].nTh.style.width=b[c].sWidth}b=a.oScroll;""===b.sY&&""===b.sX||Ea(a);H(a,null,"column-sizing",[a])}function sa(a,b){a=Fa(a,"bVisible");
return"number"===typeof a[b]?a[b]:null}function ta(a,b){a=Fa(a,"bVisible");b=k.inArray(b,a);return-1!==b?b:null}function na(a){var b=0;k.each(a.aoColumns,function(c,d){d.bVisible&&"none"!==k(d.nTh).css("display")&&b++});return b}function Fa(a,b){var c=[];k.map(a.aoColumns,function(d,e){d[b]&&c.push(e)});return c}function Ya(a){var b=a.aoColumns,c=a.aoData,d=u.ext.type.detect,e,f,g;var h=0;for(e=b.length;h<e;h++){var l=b[h];var n=[];if(!l.sType&&l._sManualType)l.sType=l._sManualType;else if(!l.sType){var m=
0;for(f=d.length;m<f;m++){var p=0;for(g=c.length;p<g;p++){n[p]===q&&(n[p]=S(a,p,h,"type"));var t=d[m](n[p],a);if(!t&&m!==d.length-1)break;if("html"===t)break}if(t){l.sType=t;break}}l.sType||(l.sType="string")}}}function Cb(a,b,c,d){var e,f,g,h=a.aoColumns;if(b)for(e=b.length-1;0<=e;e--){var l=b[e];var n=l.targets!==q?l.targets:l.aTargets;Array.isArray(n)||(n=[n]);var m=0;for(f=n.length;m<f;m++)if("number"===typeof n[m]&&0<=n[m]){for(;h.length<=n[m];)Wa(a);d(n[m],l)}else if("number"===typeof n[m]&&
0>n[m])d(h.length+n[m],l);else if("string"===typeof n[m]){var p=0;for(g=h.length;p<g;p++)("_all"==n[m]||k(h[p].nTh).hasClass(n[m]))&&d(p,l)}}if(c)for(e=0,a=c.length;e<a;e++)d(e,c[e])}function ea(a,b,c,d){var e=a.aoData.length,f=k.extend(!0,{},u.models.oRow,{src:c?"dom":"data",idx:e});f._aData=b;a.aoData.push(f);for(var g=a.aoColumns,h=0,l=g.length;h<l;h++)g[h].sType=null;a.aiDisplayMaster.push(e);b=a.rowIdFn(b);b!==q&&(a.aIds[b]=f);!c&&a.oFeatures.bDeferRender||Za(a,e,c,d);return e}function Ga(a,
b){var c;b instanceof k||(b=k(b));return b.map(function(d,e){c=$a(a,e);return ea(a,c.data,e,c.cells)})}function S(a,b,c,d){var e=a.iDraw,f=a.aoColumns[c],g=a.aoData[b]._aData,h=f.sDefaultContent,l=f.fnGetData(g,d,{settings:a,row:b,col:c});if(l===q)return a.iDrawError!=e&&null===h&&(aa(a,0,"Requested unknown parameter "+("function"==typeof f.mData?"{function}":"'"+f.mData+"'")+" for row "+b+", column "+c,4),a.iDrawError=e),h;if((l===g||null===l)&&null!==h&&d!==q)l=h;else if("function"===typeof l)return l.call(g);
return null===l&&"display"==d?"":l}function Db(a,b,c,d){a.aoColumns[c].fnSetData(a.aoData[b]._aData,d,{settings:a,row:b,col:c})}function ab(a){return k.map(a.match(/(\\.|[^\.])+/g)||[""],function(b){return b.replace(/\\\./g,".")})}function ia(a){if(k.isPlainObject(a)){var b={};k.each(a,function(d,e){e&&(b[d]=ia(e))});return function(d,e,f,g){var h=b[e]||b._;return h!==q?h(d,e,f,g):d}}if(null===a)return function(d){return d};if("function"===typeof a)return function(d,e,f,g){return a(d,e,f,g)};if("string"!==
typeof a||-1===a.indexOf(".")&&-1===a.indexOf("[")&&-1===a.indexOf("("))return function(d,e){return d[a]};var c=function(d,e,f){if(""!==f){var g=ab(f);for(var h=0,l=g.length;h<l;h++){f=g[h].match(ua);var n=g[h].match(oa);if(f){g[h]=g[h].replace(ua,"");""!==g[h]&&(d=d[g[h]]);n=[];g.splice(0,h+1);g=g.join(".");if(Array.isArray(d))for(h=0,l=d.length;h<l;h++)n.push(c(d[h],e,g));d=f[0].substring(1,f[0].length-1);d=""===d?n:n.join(d);break}else if(n){g[h]=g[h].replace(oa,"");d=d[g[h]]();continue}if(null===
d||d[g[h]]===q)return q;d=d[g[h]]}}return d};return function(d,e){return c(d,e,a)}}function da(a){if(k.isPlainObject(a))return da(a._);if(null===a)return function(){};if("function"===typeof a)return function(c,d,e){a(c,"set",d,e)};if("string"!==typeof a||-1===a.indexOf(".")&&-1===a.indexOf("[")&&-1===a.indexOf("("))return function(c,d){c[a]=d};var b=function(c,d,e){e=ab(e);var f=e[e.length-1];for(var g,h,l=0,n=e.length-1;l<n;l++){if("__proto__"===e[l]||"constructor"===e[l])throw Error("Cannot set prototype values");
g=e[l].match(ua);h=e[l].match(oa);if(g){e[l]=e[l].replace(ua,"");c[e[l]]=[];f=e.slice();f.splice(0,l+1);g=f.join(".");if(Array.isArray(d))for(h=0,n=d.length;h<n;h++)f={},b(f,d[h],g),c[e[l]].push(f);else c[e[l]]=d;return}h&&(e[l]=e[l].replace(oa,""),c=c[e[l]](d));if(null===c[e[l]]||c[e[l]]===q)c[e[l]]={};c=c[e[l]]}if(f.match(oa))c[f.replace(oa,"")](d);else c[f.replace(ua,"")]=d};return function(c,d){return b(c,d,a)}}function bb(a){return T(a.aoData,"_aData")}function Ha(a){a.aoData.length=0;a.aiDisplayMaster.length=
0;a.aiDisplay.length=0;a.aIds={}}function Ia(a,b,c){for(var d=-1,e=0,f=a.length;e<f;e++)a[e]==b?d=e:a[e]>b&&a[e]--; -1!=d&&c===q&&a.splice(d,1)}function va(a,b,c,d){var e=a.aoData[b],f,g=function(l,n){for(;l.childNodes.length;)l.removeChild(l.firstChild);l.innerHTML=S(a,b,n,"display")};if("dom"!==c&&(c&&"auto"!==c||"dom"!==e.src)){var h=e.anCells;if(h)if(d!==q)g(h[d],d);else for(c=0,f=h.length;c<f;c++)g(h[c],c)}else e._aData=$a(a,e,d,d===q?q:e._aData).data;e._aSortData=null;e._aFilterData=null;g=
a.aoColumns;if(d!==q)g[d].sType=null;else{c=0;for(f=g.length;c<f;c++)g[c].sType=null;cb(a,e)}}function $a(a,b,c,d){var e=[],f=b.firstChild,g,h=0,l,n=a.aoColumns,m=a._rowReadObject;d=d!==q?d:m?{}:[];var p=function(x,r){if("string"===typeof x){var A=x.indexOf("@");-1!==A&&(A=x.substring(A+1),da(x)(d,r.getAttribute(A)))}},t=function(x){if(c===q||c===h)g=n[h],l=x.innerHTML.trim(),g&&g._bAttrSrc?(da(g.mData._)(d,l),p(g.mData.sort,x),p(g.mData.type,x),p(g.mData.filter,x)):m?(g._setter||(g._setter=da(g.mData)),
g._setter(d,l)):d[h]=l;h++};if(f)for(;f;){var v=f.nodeName.toUpperCase();if("TD"==v||"TH"==v)t(f),e.push(f);f=f.nextSibling}else for(e=b.anCells,f=0,v=e.length;f<v;f++)t(e[f]);(b=b.firstChild?b:b.nTr)&&(b=b.getAttribute("id"))&&da(a.rowId)(d,b);return{data:d,cells:e}}function Za(a,b,c,d){var e=a.aoData[b],f=e._aData,g=[],h,l;if(null===e.nTr){var n=c||z.createElement("tr");e.nTr=n;e.anCells=g;n._DT_RowIndex=b;cb(a,e);var m=0;for(h=a.aoColumns.length;m<h;m++){var p=a.aoColumns[m];e=(l=c?!1:!0)?z.createElement(p.sCellType):
d[m];e._DT_CellIndex={row:b,column:m};g.push(e);if(l||!(!p.mRender&&p.mData===m||k.isPlainObject(p.mData)&&p.mData._===m+".display"))e.innerHTML=S(a,b,m,"display");p.sClass&&(e.className+=" "+p.sClass);p.bVisible&&!c?n.appendChild(e):!p.bVisible&&c&&e.parentNode.removeChild(e);p.fnCreatedCell&&p.fnCreatedCell.call(a.oInstance,e,S(a,b,m),f,b,m)}H(a,"aoRowCreatedCallback",null,[n,f,b,g])}}function cb(a,b){var c=b.nTr,d=b._aData;if(c){if(a=a.rowIdFn(d))c.id=a;d.DT_RowClass&&(a=d.DT_RowClass.split(" "),
b.__rowc=b.__rowc?Ja(b.__rowc.concat(a)):a,k(c).removeClass(b.__rowc.join(" ")).addClass(d.DT_RowClass));d.DT_RowAttr&&k(c).attr(d.DT_RowAttr);d.DT_RowData&&k(c).data(d.DT_RowData)}}function Eb(a){var b,c,d=a.nTHead,e=a.nTFoot,f=0===k("th, td",d).length,g=a.oClasses,h=a.aoColumns;f&&(c=k("<tr/>").appendTo(d));var l=0;for(b=h.length;l<b;l++){var n=h[l];var m=k(n.nTh).addClass(n.sClass);f&&m.appendTo(c);a.oFeatures.bSort&&(m.addClass(n.sSortingClass),!1!==n.bSortable&&(m.attr("tabindex",a.iTabIndex).attr("aria-controls",
a.sTableId),db(a,n.nTh,l)));n.sTitle!=m[0].innerHTML&&m.html(n.sTitle);eb(a,"header")(a,m,n,g)}f&&wa(a.aoHeader,d);k(d).children("tr").attr("role","row");k(d).children("tr").children("th, td").addClass(g.sHeaderTH);k(e).children("tr").children("th, td").addClass(g.sFooterTH);if(null!==e)for(a=a.aoFooter[0],l=0,b=a.length;l<b;l++)n=h[l],n.nTf=a[l].cell,n.sClass&&k(n.nTf).addClass(n.sClass)}function xa(a,b,c){var d,e,f=[],g=[],h=a.aoColumns.length;if(b){c===q&&(c=!1);var l=0;for(d=b.length;l<d;l++){f[l]=
b[l].slice();f[l].nTr=b[l].nTr;for(e=h-1;0<=e;e--)a.aoColumns[e].bVisible||c||f[l].splice(e,1);g.push([])}l=0;for(d=f.length;l<d;l++){if(a=f[l].nTr)for(;e=a.firstChild;)a.removeChild(e);e=0;for(b=f[l].length;e<b;e++){var n=h=1;if(g[l][e]===q){a.appendChild(f[l][e].cell);for(g[l][e]=1;f[l+h]!==q&&f[l][e].cell==f[l+h][e].cell;)g[l+h][e]=1,h++;for(;f[l][e+n]!==q&&f[l][e].cell==f[l][e+n].cell;){for(c=0;c<h;c++)g[l+c][e+n]=1;n++}k(f[l][e].cell).attr("rowspan",h).attr("colspan",n)}}}}}function fa(a){var b=
H(a,"aoPreDrawCallback","preDraw",[a]);if(-1!==k.inArray(!1,b))U(a,!1);else{b=[];var c=0,d=a.asStripeClasses,e=d.length,f=a.oLanguage,g=a.iInitDisplayStart,h="ssp"==P(a),l=a.aiDisplay;a.bDrawing=!0;g!==q&&-1!==g&&(a._iDisplayStart=h?g:g>=a.fnRecordsDisplay()?0:g,a.iInitDisplayStart=-1);g=a._iDisplayStart;var n=a.fnDisplayEnd();if(a.bDeferLoading)a.bDeferLoading=!1,a.iDraw++,U(a,!1);else if(!h)a.iDraw++;else if(!a.bDestroying&&!Fb(a))return;if(0!==l.length)for(f=h?a.aoData.length:n,h=h?0:g;h<f;h++){var m=
l[h],p=a.aoData[m];null===p.nTr&&Za(a,m);var t=p.nTr;if(0!==e){var v=d[c%e];p._sRowStripe!=v&&(k(t).removeClass(p._sRowStripe).addClass(v),p._sRowStripe=v)}H(a,"aoRowCallback",null,[t,p._aData,c,h,m]);b.push(t);c++}else c=f.sZeroRecords,1==a.iDraw&&"ajax"==P(a)?c=f.sLoadingRecords:f.sEmptyTable&&0===a.fnRecordsTotal()&&(c=f.sEmptyTable),b[0]=k("<tr/>",{"class":e?d[0]:""}).append(k("<td />",{valign:"top",colSpan:na(a),"class":a.oClasses.sRowEmpty}).html(c))[0];H(a,"aoHeaderCallback","header",[k(a.nTHead).children("tr")[0],
bb(a),g,n,l]);H(a,"aoFooterCallback","footer",[k(a.nTFoot).children("tr")[0],bb(a),g,n,l]);d=k(a.nTBody);d.children().detach();d.append(k(b));H(a,"aoDrawCallback","draw",[a]);a.bSorted=!1;a.bFiltered=!1;a.bDrawing=!1}}function ja(a,b){var c=a.oFeatures,d=c.bFilter;c.bSort&&Gb(a);d?ya(a,a.oPreviousSearch):a.aiDisplay=a.aiDisplayMaster.slice();!0!==b&&(a._iDisplayStart=0);a._drawHold=b;fa(a);a._drawHold=!1}function Hb(a){var b=a.oClasses,c=k(a.nTable);c=k("<div/>").insertBefore(c);var d=a.oFeatures,
e=k("<div/>",{id:a.sTableId+"_wrapper","class":b.sWrapper+(a.nTFoot?"":" "+b.sNoFooter)});a.nHolding=c[0];a.nTableWrapper=e[0];a.nTableReinsertBefore=a.nTable.nextSibling;for(var f=a.sDom.split(""),g,h,l,n,m,p,t=0;t<f.length;t++){g=null;h=f[t];if("<"==h){l=k("<div/>")[0];n=f[t+1];if("'"==n||'"'==n){m="";for(p=2;f[t+p]!=n;)m+=f[t+p],p++;"H"==m?m=b.sJUIHeader:"F"==m&&(m=b.sJUIFooter);-1!=m.indexOf(".")?(n=m.split("."),l.id=n[0].substr(1,n[0].length-1),l.className=n[1]):"#"==m.charAt(0)?l.id=m.substr(1,
m.length-1):l.className=m;t+=p}e.append(l);e=k(l)}else if(">"==h)e=e.parent();else if("l"==h&&d.bPaginate&&d.bLengthChange)g=Ib(a);else if("f"==h&&d.bFilter)g=Jb(a);else if("r"==h&&d.bProcessing)g=Kb(a);else if("t"==h)g=Lb(a);else if("i"==h&&d.bInfo)g=Mb(a);else if("p"==h&&d.bPaginate)g=Nb(a);else if(0!==u.ext.feature.length)for(l=u.ext.feature,p=0,n=l.length;p<n;p++)if(h==l[p].cFeature){g=l[p].fnInit(a);break}g&&(l=a.aanFeatures,l[h]||(l[h]=[]),l[h].push(g),e.append(g))}c.replaceWith(e);a.nHolding=
null}function wa(a,b){b=k(b).children("tr");var c,d,e;a.splice(0,a.length);var f=0;for(e=b.length;f<e;f++)a.push([]);f=0;for(e=b.length;f<e;f++){var g=b[f];for(c=g.firstChild;c;){if("TD"==c.nodeName.toUpperCase()||"TH"==c.nodeName.toUpperCase()){var h=1*c.getAttribute("colspan");var l=1*c.getAttribute("rowspan");h=h&&0!==h&&1!==h?h:1;l=l&&0!==l&&1!==l?l:1;var n=0;for(d=a[f];d[n];)n++;var m=n;var p=1===h?!0:!1;for(d=0;d<h;d++)for(n=0;n<l;n++)a[f+n][m+d]={cell:c,unique:p},a[f+n].nTr=g}c=c.nextSibling}}}
function Ka(a,b,c){var d=[];c||(c=a.aoHeader,b&&(c=[],wa(c,b)));b=0;for(var e=c.length;b<e;b++)for(var f=0,g=c[b].length;f<g;f++)!c[b][f].unique||d[f]&&a.bSortCellsTop||(d[f]=c[b][f].cell);return d}function La(a,b,c){H(a,"aoServerParams","serverParams",[b]);if(b&&Array.isArray(b)){var d={},e=/(.*?)\[\]$/;k.each(b,function(m,p){(m=p.name.match(e))?(m=m[0],d[m]||(d[m]=[]),d[m].push(p.value)):d[p.name]=p.value});b=d}var f=a.ajax,g=a.oInstance,h=function(m){H(a,null,"xhr",[a,m,a.jqXHR]);c(m)};if(k.isPlainObject(f)&&
f.data){var l=f.data;var n="function"===typeof l?l(b,a):l;b="function"===typeof l&&n?n:k.extend(!0,b,n);delete f.data}n={data:b,success:function(m){var p=m.error||m.sError;p&&aa(a,0,p);a.json=m;h(m)},dataType:"json",cache:!1,type:a.sServerMethod,error:function(m,p,t){t=H(a,null,"xhr",[a,null,a.jqXHR]);-1===k.inArray(!0,t)&&("parsererror"==p?aa(a,0,"Invalid JSON response",1):4===m.readyState&&aa(a,0,"Ajax error",7));U(a,!1)}};a.oAjaxData=b;H(a,null,"preXhr",[a,b]);a.fnServerData?a.fnServerData.call(g,
a.sAjaxSource,k.map(b,function(m,p){return{name:p,value:m}}),h,a):a.sAjaxSource||"string"===typeof f?a.jqXHR=k.ajax(k.extend(n,{url:f||a.sAjaxSource})):"function"===typeof f?a.jqXHR=f.call(g,b,h,a):(a.jqXHR=k.ajax(k.extend(n,f)),f.data=l)}function Fb(a){return a.bAjaxDataGet?(a.iDraw++,U(a,!0),La(a,Ob(a),function(b){Pb(a,b)}),!1):!0}function Ob(a){var b=a.aoColumns,c=b.length,d=a.oFeatures,e=a.oPreviousSearch,f=a.aoPreSearchCols,g=[],h=pa(a);var l=a._iDisplayStart;var n=!1!==d.bPaginate?a._iDisplayLength:
-1;var m=function(x,r){g.push({name:x,value:r})};m("sEcho",a.iDraw);m("iColumns",c);m("sColumns",T(b,"sName").join(","));m("iDisplayStart",l);m("iDisplayLength",n);var p={draw:a.iDraw,columns:[],order:[],start:l,length:n,search:{value:e.sSearch,regex:e.bRegex}};for(l=0;l<c;l++){var t=b[l];var v=f[l];n="function"==typeof t.mData?"function":t.mData;p.columns.push({data:n,name:t.sName,searchable:t.bSearchable,orderable:t.bSortable,search:{value:v.sSearch,regex:v.bRegex}});m("mDataProp_"+l,n);d.bFilter&&
(m("sSearch_"+l,v.sSearch),m("bRegex_"+l,v.bRegex),m("bSearchable_"+l,t.bSearchable));d.bSort&&m("bSortable_"+l,t.bSortable)}d.bFilter&&(m("sSearch",e.sSearch),m("bRegex",e.bRegex));d.bSort&&(k.each(h,function(x,r){p.order.push({column:r.col,dir:r.dir});m("iSortCol_"+x,r.col);m("sSortDir_"+x,r.dir)}),m("iSortingCols",h.length));b=u.ext.legacy.ajax;return null===b?a.sAjaxSource?g:p:b?g:p}function Pb(a,b){var c=function(g,h){return b[g]!==q?b[g]:b[h]},d=Ma(a,b),e=c("sEcho","draw"),f=c("iTotalRecords",
"recordsTotal");c=c("iTotalDisplayRecords","recordsFiltered");if(e!==q){if(1*e<a.iDraw)return;a.iDraw=1*e}Ha(a);a._iRecordsTotal=parseInt(f,10);a._iRecordsDisplay=parseInt(c,10);e=0;for(f=d.length;e<f;e++)ea(a,d[e]);a.aiDisplay=a.aiDisplayMaster.slice();a.bAjaxDataGet=!1;fa(a);a._bInitComplete||Na(a,b);a.bAjaxDataGet=!0;U(a,!1)}function Ma(a,b){a=k.isPlainObject(a.ajax)&&a.ajax.dataSrc!==q?a.ajax.dataSrc:a.sAjaxDataProp;return"data"===a?b.aaData||b[a]:""!==a?ia(a)(b):b}function Jb(a){var b=a.oClasses,
c=a.sTableId,d=a.oLanguage,e=a.oPreviousSearch,f=a.aanFeatures,g='<input type="search" class="'+b.sFilterInput+'"/>',h=d.sSearch;h=h.match(/_INPUT_/)?h.replace("_INPUT_",g):h+g;b=k("<div/>",{id:f.f?null:c+"_filter","class":b.sFilter}).append(k("<label/>").append(h));var l=function(){var m=this.value?this.value:"";m!=e.sSearch&&(ya(a,{sSearch:m,bRegex:e.bRegex,bSmart:e.bSmart,bCaseInsensitive:e.bCaseInsensitive}),a._iDisplayStart=0,fa(a))};f=null!==a.searchDelay?a.searchDelay:"ssp"===P(a)?400:0;var n=
k("input",b).val(e.sSearch).attr("placeholder",d.sSearchPlaceholder).on("keyup.DT search.DT input.DT paste.DT cut.DT",f?fb(l,f):l).on("mouseup",function(m){setTimeout(function(){l.call(n[0])},10)}).on("keypress.DT",function(m){if(13==m.keyCode)return!1}).attr("aria-controls",c);k(a.nTable).on("search.dt.DT",function(m,p){if(a===p)try{n[0]!==z.activeElement&&n.val(e.sSearch)}catch(t){}});return b[0]}function ya(a,b,c){var d=a.oPreviousSearch,e=a.aoPreSearchCols,f=function(h){d.sSearch=h.sSearch;d.bRegex=
h.bRegex;d.bSmart=h.bSmart;d.bCaseInsensitive=h.bCaseInsensitive},g=function(h){return h.bEscapeRegex!==q?!h.bEscapeRegex:h.bRegex};Ya(a);if("ssp"!=P(a)){Qb(a,b.sSearch,c,g(b),b.bSmart,b.bCaseInsensitive);f(b);for(b=0;b<e.length;b++)Rb(a,e[b].sSearch,b,g(e[b]),e[b].bSmart,e[b].bCaseInsensitive);Sb(a)}else f(b);a.bFiltered=!0;H(a,null,"search",[a])}function Sb(a){for(var b=u.ext.search,c=a.aiDisplay,d,e,f=0,g=b.length;f<g;f++){for(var h=[],l=0,n=c.length;l<n;l++)e=c[l],d=a.aoData[e],b[f](a,d._aFilterData,
e,d._aData,l)&&h.push(e);c.length=0;k.merge(c,h)}}function Rb(a,b,c,d,e,f){if(""!==b){var g=[],h=a.aiDisplay;d=gb(b,d,e,f);for(e=0;e<h.length;e++)b=a.aoData[h[e]]._aFilterData[c],d.test(b)&&g.push(h[e]);a.aiDisplay=g}}function Qb(a,b,c,d,e,f){e=gb(b,d,e,f);var g=a.oPreviousSearch.sSearch,h=a.aiDisplayMaster;f=[];0!==u.ext.search.length&&(c=!0);var l=Tb(a);if(0>=b.length)a.aiDisplay=h.slice();else{if(l||c||d||g.length>b.length||0!==b.indexOf(g)||a.bSorted)a.aiDisplay=h.slice();b=a.aiDisplay;for(c=
0;c<b.length;c++)e.test(a.aoData[b[c]]._sFilterRow)&&f.push(b[c]);a.aiDisplay=f}}function gb(a,b,c,d){a=b?a:hb(a);c&&(a="^(?=.*?"+k.map(a.match(/"[^"]+"|[^ ]+/g)||[""],function(e){if('"'===e.charAt(0)){var f=e.match(/^"(.*)"$/);e=f?f[1]:e}return e.replace('"',"")}).join(")(?=.*?")+").*$");return new RegExp(a,d?"i":"")}function Tb(a){var b=a.aoColumns,c,d,e=u.ext.type.search;var f=!1;var g=0;for(c=a.aoData.length;g<c;g++){var h=a.aoData[g];if(!h._aFilterData){var l=[];var n=0;for(d=b.length;n<d;n++){f=
b[n];if(f.bSearchable){var m=S(a,g,n,"filter");e[f.sType]&&(m=e[f.sType](m));null===m&&(m="");"string"!==typeof m&&m.toString&&(m=m.toString())}else m="";m.indexOf&&-1!==m.indexOf("&")&&(Oa.innerHTML=m,m=rc?Oa.textContent:Oa.innerText);m.replace&&(m=m.replace(/[\r\n\u2028]/g,""));l.push(m)}h._aFilterData=l;h._sFilterRow=l.join("  ");f=!0}}return f}function Ub(a){return{search:a.sSearch,smart:a.bSmart,regex:a.bRegex,caseInsensitive:a.bCaseInsensitive}}function Vb(a){return{sSearch:a.search,bSmart:a.smart,
bRegex:a.regex,bCaseInsensitive:a.caseInsensitive}}function Mb(a){var b=a.sTableId,c=a.aanFeatures.i,d=k("<div/>",{"class":a.oClasses.sInfo,id:c?null:b+"_info"});c||(a.aoDrawCallback.push({fn:Wb,sName:"information"}),d.attr("role","status").attr("aria-live","polite"),k(a.nTable).attr("aria-describedby",b+"_info"));return d[0]}function Wb(a){var b=a.aanFeatures.i;if(0!==b.length){var c=a.oLanguage,d=a._iDisplayStart+1,e=a.fnDisplayEnd(),f=a.fnRecordsTotal(),g=a.fnRecordsDisplay(),h=g?c.sInfo:c.sInfoEmpty;
g!==f&&(h+=" "+c.sInfoFiltered);h+=c.sInfoPostFix;h=Xb(a,h);c=c.fnInfoCallback;null!==c&&(h=c.call(a.oInstance,a,d,e,f,g,h));k(b).html(h)}}function Xb(a,b){var c=a.fnFormatNumber,d=a._iDisplayStart+1,e=a._iDisplayLength,f=a.fnRecordsDisplay(),g=-1===e;return b.replace(/_START_/g,c.call(a,d)).replace(/_END_/g,c.call(a,a.fnDisplayEnd())).replace(/_MAX_/g,c.call(a,a.fnRecordsTotal())).replace(/_TOTAL_/g,c.call(a,f)).replace(/_PAGE_/g,c.call(a,g?1:Math.ceil(d/e))).replace(/_PAGES_/g,c.call(a,g?1:Math.ceil(f/
e)))}function za(a){var b=a.iInitDisplayStart,c=a.aoColumns;var d=a.oFeatures;var e=a.bDeferLoading;if(a.bInitialised){Hb(a);Eb(a);xa(a,a.aoHeader);xa(a,a.aoFooter);U(a,!0);d.bAutoWidth&&Xa(a);var f=0;for(d=c.length;f<d;f++){var g=c[f];g.sWidth&&(g.nTh.style.width=K(g.sWidth))}H(a,null,"preInit",[a]);ja(a);c=P(a);if("ssp"!=c||e)"ajax"==c?La(a,[],function(h){var l=Ma(a,h);for(f=0;f<l.length;f++)ea(a,l[f]);a.iInitDisplayStart=b;ja(a);U(a,!1);Na(a,h)},a):(U(a,!1),Na(a))}else setTimeout(function(){za(a)},
200)}function Na(a,b){a._bInitComplete=!0;(b||a.oInit.aaData)&&ra(a);H(a,null,"plugin-init",[a,b]);H(a,"aoInitComplete","init",[a,b])}function ib(a,b){b=parseInt(b,10);a._iDisplayLength=b;jb(a);H(a,null,"length",[a,b])}function Ib(a){var b=a.oClasses,c=a.sTableId,d=a.aLengthMenu,e=Array.isArray(d[0]),f=e?d[0]:d;d=e?d[1]:d;e=k("<select/>",{name:c+"_length","aria-controls":c,"class":b.sLengthSelect});for(var g=0,h=f.length;g<h;g++)e[0][g]=new Option("number"===typeof d[g]?a.fnFormatNumber(d[g]):d[g],
f[g]);var l=k("<div><label/></div>").addClass(b.sLength);a.aanFeatures.l||(l[0].id=c+"_length");l.children().append(a.oLanguage.sLengthMenu.replace("_MENU_",e[0].outerHTML));k("select",l).val(a._iDisplayLength).on("change.DT",function(n){ib(a,k(this).val());fa(a)});k(a.nTable).on("length.dt.DT",function(n,m,p){a===m&&k("select",l).val(p)});return l[0]}function Nb(a){var b=a.sPaginationType,c=u.ext.pager[b],d="function"===typeof c,e=function(g){fa(g)};b=k("<div/>").addClass(a.oClasses.sPaging+b)[0];
var f=a.aanFeatures;d||c.fnInit(a,b,e);f.p||(b.id=a.sTableId+"_paginate",a.aoDrawCallback.push({fn:function(g){if(d){var h=g._iDisplayStart,l=g._iDisplayLength,n=g.fnRecordsDisplay(),m=-1===l;h=m?0:Math.ceil(h/l);l=m?1:Math.ceil(n/l);n=c(h,l);var p;m=0;for(p=f.p.length;m<p;m++)eb(g,"pageButton")(g,f.p[m],m,n,h,l)}else c.fnUpdate(g,e)},sName:"pagination"}));return b}function kb(a,b,c){var d=a._iDisplayStart,e=a._iDisplayLength,f=a.fnRecordsDisplay();0===f||-1===e?d=0:"number"===typeof b?(d=b*e,d>f&&
(d=0)):"first"==b?d=0:"previous"==b?(d=0<=e?d-e:0,0>d&&(d=0)):"next"==b?d+e<f&&(d+=e):"last"==b?d=Math.floor((f-1)/e)*e:aa(a,0,"Unknown paging action: "+b,5);b=a._iDisplayStart!==d;a._iDisplayStart=d;b&&(H(a,null,"page",[a]),c&&fa(a));return b}function Kb(a){return k("<div/>",{id:a.aanFeatures.r?null:a.sTableId+"_processing","class":a.oClasses.sProcessing}).html(a.oLanguage.sProcessing).insertBefore(a.nTable)[0]}function U(a,b){a.oFeatures.bProcessing&&k(a.aanFeatures.r).css("display",b?"block":"none");
H(a,null,"processing",[a,b])}function Lb(a){var b=k(a.nTable);b.attr("role","grid");var c=a.oScroll;if(""===c.sX&&""===c.sY)return a.nTable;var d=c.sX,e=c.sY,f=a.oClasses,g=b.children("caption"),h=g.length?g[0]._captionSide:null,l=k(b[0].cloneNode(!1)),n=k(b[0].cloneNode(!1)),m=b.children("tfoot");m.length||(m=null);l=k("<div/>",{"class":f.sScrollWrapper}).append(k("<div/>",{"class":f.sScrollHead}).css({overflow:"hidden",position:"relative",border:0,width:d?d?K(d):null:"100%"}).append(k("<div/>",
{"class":f.sScrollHeadInner}).css({"box-sizing":"content-box",width:c.sXInner||"100%"}).append(l.removeAttr("id").css("margin-left",0).append("top"===h?g:null).append(b.children("thead"))))).append(k("<div/>",{"class":f.sScrollBody}).css({position:"relative",overflow:"auto",width:d?K(d):null}).append(b));m&&l.append(k("<div/>",{"class":f.sScrollFoot}).css({overflow:"hidden",border:0,width:d?d?K(d):null:"100%"}).append(k("<div/>",{"class":f.sScrollFootInner}).append(n.removeAttr("id").css("margin-left",
0).append("bottom"===h?g:null).append(b.children("tfoot")))));b=l.children();var p=b[0];f=b[1];var t=m?b[2]:null;if(d)k(f).on("scroll.DT",function(v){v=this.scrollLeft;p.scrollLeft=v;m&&(t.scrollLeft=v)});k(f).css("max-height",e);c.bCollapse||k(f).css("height",e);a.nScrollHead=p;a.nScrollBody=f;a.nScrollFoot=t;a.aoDrawCallback.push({fn:Ea,sName:"scrolling"});return l[0]}function Ea(a){var b=a.oScroll,c=b.sX,d=b.sXInner,e=b.sY;b=b.iBarWidth;var f=k(a.nScrollHead),g=f[0].style,h=f.children("div"),l=
h[0].style,n=h.children("table");h=a.nScrollBody;var m=k(h),p=h.style,t=k(a.nScrollFoot).children("div"),v=t.children("table"),x=k(a.nTHead),r=k(a.nTable),A=r[0],E=A.style,I=a.nTFoot?k(a.nTFoot):null,W=a.oBrowser,M=W.bScrollOversize,C=T(a.aoColumns,"nTh"),B=[],ba=[],X=[],lb=[],Aa,Yb=function(F){F=F.style;F.paddingTop="0";F.paddingBottom="0";F.borderTopWidth="0";F.borderBottomWidth="0";F.height=0};var ha=h.scrollHeight>h.clientHeight;if(a.scrollBarVis!==ha&&a.scrollBarVis!==q)a.scrollBarVis=ha,ra(a);
else{a.scrollBarVis=ha;r.children("thead, tfoot").remove();if(I){var ka=I.clone().prependTo(r);var la=I.find("tr");ka=ka.find("tr")}var mb=x.clone().prependTo(r);x=x.find("tr");ha=mb.find("tr");mb.find("th, td").removeAttr("tabindex");c||(p.width="100%",f[0].style.width="100%");k.each(Ka(a,mb),function(F,Y){Aa=sa(a,F);Y.style.width=a.aoColumns[Aa].sWidth});I&&Z(function(F){F.style.width=""},ka);f=r.outerWidth();""===c?(E.width="100%",M&&(r.find("tbody").height()>h.offsetHeight||"scroll"==m.css("overflow-y"))&&
(E.width=K(r.outerWidth()-b)),f=r.outerWidth()):""!==d&&(E.width=K(d),f=r.outerWidth());Z(Yb,ha);Z(function(F){X.push(F.innerHTML);B.push(K(k(F).css("width")))},ha);Z(function(F,Y){-1!==k.inArray(F,C)&&(F.style.width=B[Y])},x);k(ha).height(0);I&&(Z(Yb,ka),Z(function(F){lb.push(F.innerHTML);ba.push(K(k(F).css("width")))},ka),Z(function(F,Y){F.style.width=ba[Y]},la),k(ka).height(0));Z(function(F,Y){F.innerHTML='<div class="dataTables_sizing">'+X[Y]+"</div>";F.childNodes[0].style.height="0";F.childNodes[0].style.overflow=
"hidden";F.style.width=B[Y]},ha);I&&Z(function(F,Y){F.innerHTML='<div class="dataTables_sizing">'+lb[Y]+"</div>";F.childNodes[0].style.height="0";F.childNodes[0].style.overflow="hidden";F.style.width=ba[Y]},ka);r.outerWidth()<f?(la=h.scrollHeight>h.offsetHeight||"scroll"==m.css("overflow-y")?f+b:f,M&&(h.scrollHeight>h.offsetHeight||"scroll"==m.css("overflow-y"))&&(E.width=K(la-b)),""!==c&&""===d||aa(a,1,"Possible column misalignment",6)):la="100%";p.width=K(la);g.width=K(la);I&&(a.nScrollFoot.style.width=
K(la));!e&&M&&(p.height=K(A.offsetHeight+b));c=r.outerWidth();n[0].style.width=K(c);l.width=K(c);d=r.height()>h.clientHeight||"scroll"==m.css("overflow-y");e="padding"+(W.bScrollbarLeft?"Left":"Right");l[e]=d?b+"px":"0px";I&&(v[0].style.width=K(c),t[0].style.width=K(c),t[0].style[e]=d?b+"px":"0px");r.children("colgroup").insertBefore(r.children("thead"));m.trigger("scroll");!a.bSorted&&!a.bFiltered||a._drawHold||(h.scrollTop=0)}}function Z(a,b,c){for(var d=0,e=0,f=b.length,g,h;e<f;){g=b[e].firstChild;
for(h=c?c[e].firstChild:null;g;)1===g.nodeType&&(c?a(g,h,d):a(g,d),d++),g=g.nextSibling,h=c?h.nextSibling:null;e++}}function Xa(a){var b=a.nTable,c=a.aoColumns,d=a.oScroll,e=d.sY,f=d.sX,g=d.sXInner,h=c.length,l=Fa(a,"bVisible"),n=k("th",a.nTHead),m=b.getAttribute("width"),p=b.parentNode,t=!1,v,x=a.oBrowser;d=x.bScrollOversize;(v=b.style.width)&&-1!==v.indexOf("%")&&(m=v);for(v=0;v<l.length;v++){var r=c[l[v]];null!==r.sWidth&&(r.sWidth=Zb(r.sWidthOrig,p),t=!0)}if(d||!t&&!f&&!e&&h==na(a)&&h==n.length)for(v=
0;v<h;v++)l=sa(a,v),null!==l&&(c[l].sWidth=K(n.eq(v).width()));else{h=k(b).clone().css("visibility","hidden").removeAttr("id");h.find("tbody tr").remove();var A=k("<tr/>").appendTo(h.find("tbody"));h.find("thead, tfoot").remove();h.append(k(a.nTHead).clone()).append(k(a.nTFoot).clone());h.find("tfoot th, tfoot td").css("width","");n=Ka(a,h.find("thead")[0]);for(v=0;v<l.length;v++)r=c[l[v]],n[v].style.width=null!==r.sWidthOrig&&""!==r.sWidthOrig?K(r.sWidthOrig):"",r.sWidthOrig&&f&&k(n[v]).append(k("<div/>").css({width:r.sWidthOrig,
margin:0,padding:0,border:0,height:1}));if(a.aoData.length)for(v=0;v<l.length;v++)t=l[v],r=c[t],k($b(a,t)).clone(!1).append(r.sContentPadding).appendTo(A);k("[name]",h).removeAttr("name");r=k("<div/>").css(f||e?{position:"absolute",top:0,left:0,height:1,right:0,overflow:"hidden"}:{}).append(h).appendTo(p);f&&g?h.width(g):f?(h.css("width","auto"),h.removeAttr("width"),h.width()<p.clientWidth&&m&&h.width(p.clientWidth)):e?h.width(p.clientWidth):m&&h.width(m);for(v=e=0;v<l.length;v++)p=k(n[v]),g=p.outerWidth()-
p.width(),p=x.bBounding?Math.ceil(n[v].getBoundingClientRect().width):p.outerWidth(),e+=p,c[l[v]].sWidth=K(p-g);b.style.width=K(e);r.remove()}m&&(b.style.width=K(m));!m&&!f||a._reszEvt||(b=function(){k(y).on("resize.DT-"+a.sInstance,fb(function(){ra(a)}))},d?setTimeout(b,1E3):b(),a._reszEvt=!0)}function Zb(a,b){if(!a)return 0;a=k("<div/>").css("width",K(a)).appendTo(b||z.body);b=a[0].offsetWidth;a.remove();return b}function $b(a,b){var c=ac(a,b);if(0>c)return null;var d=a.aoData[c];return d.nTr?d.anCells[b]:
k("<td/>").html(S(a,c,b,"display"))[0]}function ac(a,b){for(var c,d=-1,e=-1,f=0,g=a.aoData.length;f<g;f++)c=S(a,f,b,"display")+"",c=c.replace(sc,""),c=c.replace(/&nbsp;/g," "),c.length>d&&(d=c.length,e=f);return e}function K(a){return null===a?"0px":"number"==typeof a?0>a?"0px":a+"px":a.match(/\d$/)?a+"px":a}function pa(a){var b=[],c=a.aoColumns;var d=a.aaSortingFixed;var e=k.isPlainObject(d);var f=[];var g=function(m){m.length&&!Array.isArray(m[0])?f.push(m):k.merge(f,m)};Array.isArray(d)&&g(d);
e&&d.pre&&g(d.pre);g(a.aaSorting);e&&d.post&&g(d.post);for(a=0;a<f.length;a++){var h=f[a][0];g=c[h].aDataSort;d=0;for(e=g.length;d<e;d++){var l=g[d];var n=c[l].sType||"string";f[a]._idx===q&&(f[a]._idx=k.inArray(f[a][1],c[l].asSorting));b.push({src:h,col:l,dir:f[a][1],index:f[a]._idx,type:n,formatter:u.ext.type.order[n+"-pre"]})}}return b}function Gb(a){var b,c=[],d=u.ext.type.order,e=a.aoData,f=0,g=a.aiDisplayMaster;Ya(a);var h=pa(a);var l=0;for(b=h.length;l<b;l++){var n=h[l];n.formatter&&f++;bc(a,
n.col)}if("ssp"!=P(a)&&0!==h.length){l=0;for(b=g.length;l<b;l++)c[g[l]]=l;f===h.length?g.sort(function(m,p){var t,v=h.length,x=e[m]._aSortData,r=e[p]._aSortData;for(t=0;t<v;t++){var A=h[t];var E=x[A.col];var I=r[A.col];E=E<I?-1:E>I?1:0;if(0!==E)return"asc"===A.dir?E:-E}E=c[m];I=c[p];return E<I?-1:E>I?1:0}):g.sort(function(m,p){var t,v=h.length,x=e[m]._aSortData,r=e[p]._aSortData;for(t=0;t<v;t++){var A=h[t];var E=x[A.col];var I=r[A.col];A=d[A.type+"-"+A.dir]||d["string-"+A.dir];E=A(E,I);if(0!==E)return E}E=
c[m];I=c[p];return E<I?-1:E>I?1:0})}a.bSorted=!0}function cc(a){var b=a.aoColumns,c=pa(a);a=a.oLanguage.oAria;for(var d=0,e=b.length;d<e;d++){var f=b[d];var g=f.asSorting;var h=f.sTitle.replace(/<.*?>/g,"");var l=f.nTh;l.removeAttribute("aria-sort");f.bSortable&&(0<c.length&&c[0].col==d?(l.setAttribute("aria-sort","asc"==c[0].dir?"ascending":"descending"),f=g[c[0].index+1]||g[0]):f=g[0],h+="asc"===f?a.sSortAscending:a.sSortDescending);l.setAttribute("aria-label",h)}}function nb(a,b,c,d){var e=a.aaSorting,
f=a.aoColumns[b].asSorting,g=function(h,l){var n=h._idx;n===q&&(n=k.inArray(h[1],f));return n+1<f.length?n+1:l?null:0};"number"===typeof e[0]&&(e=a.aaSorting=[e]);c&&a.oFeatures.bSortMulti?(c=k.inArray(b,T(e,"0")),-1!==c?(b=g(e[c],!0),null===b&&1===e.length&&(b=0),null===b?e.splice(c,1):(e[c][1]=f[b],e[c]._idx=b)):(e.push([b,f[0],0]),e[e.length-1]._idx=0)):e.length&&e[0][0]==b?(b=g(e[0]),e.length=1,e[0][1]=f[b],e[0]._idx=b):(e.length=0,e.push([b,f[0]]),e[0]._idx=0);ja(a);"function"==typeof d&&d(a)}
function db(a,b,c,d){var e=a.aoColumns[c];ob(b,{},function(f){!1!==e.bSortable&&(a.oFeatures.bProcessing?(U(a,!0),setTimeout(function(){nb(a,c,f.shiftKey,d);"ssp"!==P(a)&&U(a,!1)},0)):nb(a,c,f.shiftKey,d))})}function Pa(a){var b=a.aLastSort,c=a.oClasses.sSortColumn,d=pa(a),e=a.oFeatures,f;if(e.bSort&&e.bSortClasses){e=0;for(f=b.length;e<f;e++){var g=b[e].src;k(T(a.aoData,"anCells",g)).removeClass(c+(2>e?e+1:3))}e=0;for(f=d.length;e<f;e++)g=d[e].src,k(T(a.aoData,"anCells",g)).addClass(c+(2>e?e+1:3))}a.aLastSort=
d}function bc(a,b){var c=a.aoColumns[b],d=u.ext.order[c.sSortDataType],e;d&&(e=d.call(a.oInstance,a,b,ta(a,b)));for(var f,g=u.ext.type.order[c.sType+"-pre"],h=0,l=a.aoData.length;h<l;h++)if(c=a.aoData[h],c._aSortData||(c._aSortData=[]),!c._aSortData[b]||d)f=d?e[h]:S(a,h,b,"sort"),c._aSortData[b]=g?g(f):f}function Qa(a){if(a.oFeatures.bStateSave&&!a.bDestroying){var b={time:+new Date,start:a._iDisplayStart,length:a._iDisplayLength,order:k.extend(!0,[],a.aaSorting),search:Ub(a.oPreviousSearch),columns:k.map(a.aoColumns,
function(c,d){return{visible:c.bVisible,search:Ub(a.aoPreSearchCols[d])}})};H(a,"aoStateSaveParams","stateSaveParams",[a,b]);a.oSavedState=b;a.fnStateSaveCallback.call(a.oInstance,a,b)}}function dc(a,b,c){var d,e,f=a.aoColumns;b=function(h){if(h&&h.time){var l=H(a,"aoStateLoadParams","stateLoadParams",[a,h]);if(-1===k.inArray(!1,l)&&(l=a.iStateDuration,!(0<l&&h.time<+new Date-1E3*l||h.columns&&f.length!==h.columns.length))){a.oLoadedState=k.extend(!0,{},h);h.start!==q&&(a._iDisplayStart=h.start,a.iInitDisplayStart=
h.start);h.length!==q&&(a._iDisplayLength=h.length);h.order!==q&&(a.aaSorting=[],k.each(h.order,function(n,m){a.aaSorting.push(m[0]>=f.length?[0,m[1]]:m)}));h.search!==q&&k.extend(a.oPreviousSearch,Vb(h.search));if(h.columns)for(d=0,e=h.columns.length;d<e;d++)l=h.columns[d],l.visible!==q&&(f[d].bVisible=l.visible),l.search!==q&&k.extend(a.aoPreSearchCols[d],Vb(l.search));H(a,"aoStateLoaded","stateLoaded",[a,h])}}c()};if(a.oFeatures.bStateSave){var g=a.fnStateLoadCallback.call(a.oInstance,a,b);g!==
q&&b(g)}else c()}function Ra(a){var b=u.settings;a=k.inArray(a,T(b,"nTable"));return-1!==a?b[a]:null}function aa(a,b,c,d){c="DataTables warning: "+(a?"table id="+a.sTableId+" - ":"")+c;d&&(c+=". For more information about this error, please see http://datatables.net/tn/"+d);if(b)y.console&&console.log&&console.log(c);else if(b=u.ext,b=b.sErrMode||b.errMode,a&&H(a,null,"error",[a,d,c]),"alert"==b)alert(c);else{if("throw"==b)throw Error(c);"function"==typeof b&&b(a,d,c)}}function V(a,b,c,d){Array.isArray(c)?
k.each(c,function(e,f){Array.isArray(f)?V(a,b,f[0],f[1]):V(a,b,f)}):(d===q&&(d=c),b[c]!==q&&(a[d]=b[c]))}function pb(a,b,c){var d;for(d in b)if(b.hasOwnProperty(d)){var e=b[d];k.isPlainObject(e)?(k.isPlainObject(a[d])||(a[d]={}),k.extend(!0,a[d],e)):c&&"data"!==d&&"aaData"!==d&&Array.isArray(e)?a[d]=e.slice():a[d]=e}return a}function ob(a,b,c){k(a).on("click.DT",b,function(d){k(a).trigger("blur");c(d)}).on("keypress.DT",b,function(d){13===d.which&&(d.preventDefault(),c(d))}).on("selectstart.DT",function(){return!1})}
function Q(a,b,c,d){c&&a[b].push({fn:c,sName:d})}function H(a,b,c,d){var e=[];b&&(e=k.map(a[b].slice().reverse(),function(f,g){return f.fn.apply(a.oInstance,d)}));null!==c&&(b=k.Event(c+".dt"),k(a.nTable).trigger(b,d),e.push(b.result));return e}function jb(a){var b=a._iDisplayStart,c=a.fnDisplayEnd(),d=a._iDisplayLength;b>=c&&(b=c-d);b-=b%d;if(-1===d||0>b)b=0;a._iDisplayStart=b}function eb(a,b){a=a.renderer;var c=u.ext.renderer[b];return k.isPlainObject(a)&&a[b]?c[a[b]]||c._:"string"===typeof a?c[a]||
c._:c._}function P(a){return a.oFeatures.bServerSide?"ssp":a.ajax||a.sAjaxSource?"ajax":"dom"}function Ba(a,b){var c=ec.numbers_length,d=Math.floor(c/2);b<=c?a=qa(0,b):a<=d?(a=qa(0,c-2),a.push("ellipsis"),a.push(b-1)):(a>=b-1-d?a=qa(b-(c-2),b):(a=qa(a-d+2,a+d-1),a.push("ellipsis"),a.push(b-1)),a.splice(0,0,"ellipsis"),a.splice(0,0,0));a.DT_el="span";return a}function Va(a){k.each({num:function(b){return Sa(b,a)},"num-fmt":function(b){return Sa(b,a,qb)},"html-num":function(b){return Sa(b,a,Ta)},"html-num-fmt":function(b){return Sa(b,
a,Ta,qb)}},function(b,c){L.type.order[b+a+"-pre"]=c;b.match(/^html\-/)&&(L.type.search[b+a]=L.type.search.html)})}function fc(a){return function(){var b=[Ra(this[u.ext.iApiIndex])].concat(Array.prototype.slice.call(arguments));return u.ext.internal[a].apply(this,b)}}var u=function(a){this.$=function(f,g){return this.api(!0).$(f,g)};this._=function(f,g){return this.api(!0).rows(f,g).data()};this.api=function(f){return f?new D(Ra(this[L.iApiIndex])):new D(this)};this.fnAddData=function(f,g){var h=this.api(!0);
f=Array.isArray(f)&&(Array.isArray(f[0])||k.isPlainObject(f[0]))?h.rows.add(f):h.row.add(f);(g===q||g)&&h.draw();return f.flatten().toArray()};this.fnAdjustColumnSizing=function(f){var g=this.api(!0).columns.adjust(),h=g.settings()[0],l=h.oScroll;f===q||f?g.draw(!1):(""!==l.sX||""!==l.sY)&&Ea(h)};this.fnClearTable=function(f){var g=this.api(!0).clear();(f===q||f)&&g.draw()};this.fnClose=function(f){this.api(!0).row(f).child.hide()};this.fnDeleteRow=function(f,g,h){var l=this.api(!0);f=l.rows(f);var n=
f.settings()[0],m=n.aoData[f[0][0]];f.remove();g&&g.call(this,n,m);(h===q||h)&&l.draw();return m};this.fnDestroy=function(f){this.api(!0).destroy(f)};this.fnDraw=function(f){this.api(!0).draw(f)};this.fnFilter=function(f,g,h,l,n,m){n=this.api(!0);null===g||g===q?n.search(f,h,l,m):n.column(g).search(f,h,l,m);n.draw()};this.fnGetData=function(f,g){var h=this.api(!0);if(f!==q){var l=f.nodeName?f.nodeName.toLowerCase():"";return g!==q||"td"==l||"th"==l?h.cell(f,g).data():h.row(f).data()||null}return h.data().toArray()};
this.fnGetNodes=function(f){var g=this.api(!0);return f!==q?g.row(f).node():g.rows().nodes().flatten().toArray()};this.fnGetPosition=function(f){var g=this.api(!0),h=f.nodeName.toUpperCase();return"TR"==h?g.row(f).index():"TD"==h||"TH"==h?(f=g.cell(f).index(),[f.row,f.columnVisible,f.column]):null};this.fnIsOpen=function(f){return this.api(!0).row(f).child.isShown()};this.fnOpen=function(f,g,h){return this.api(!0).row(f).child(g,h).show().child()[0]};this.fnPageChange=function(f,g){f=this.api(!0).page(f);
(g===q||g)&&f.draw(!1)};this.fnSetColumnVis=function(f,g,h){f=this.api(!0).column(f).visible(g);(h===q||h)&&f.columns.adjust().draw()};this.fnSettings=function(){return Ra(this[L.iApiIndex])};this.fnSort=function(f){this.api(!0).order(f).draw()};this.fnSortListener=function(f,g,h){this.api(!0).order.listener(f,g,h)};this.fnUpdate=function(f,g,h,l,n){var m=this.api(!0);h===q||null===h?m.row(g).data(f):m.cell(g,h).data(f);(n===q||n)&&m.columns.adjust();(l===q||l)&&m.draw();return 0};this.fnVersionCheck=
L.fnVersionCheck;var b=this,c=a===q,d=this.length;c&&(a={});this.oApi=this.internal=L.internal;for(var e in u.ext.internal)e&&(this[e]=fc(e));this.each(function(){var f={},g=1<d?pb(f,a,!0):a,h=0,l;f=this.getAttribute("id");var n=!1,m=u.defaults,p=k(this);if("table"!=this.nodeName.toLowerCase())aa(null,0,"Non-table node initialisation ("+this.nodeName+")",2);else{yb(m);zb(m.column);O(m,m,!0);O(m.column,m.column,!0);O(m,k.extend(g,p.data()),!0);var t=u.settings;h=0;for(l=t.length;h<l;h++){var v=t[h];
if(v.nTable==this||v.nTHead&&v.nTHead.parentNode==this||v.nTFoot&&v.nTFoot.parentNode==this){var x=g.bRetrieve!==q?g.bRetrieve:m.bRetrieve;if(c||x)return v.oInstance;if(g.bDestroy!==q?g.bDestroy:m.bDestroy){v.oInstance.fnDestroy();break}else{aa(v,0,"Cannot reinitialise DataTable",3);return}}if(v.sTableId==this.id){t.splice(h,1);break}}if(null===f||""===f)this.id=f="DataTables_Table_"+u.ext._unique++;var r=k.extend(!0,{},u.models.oSettings,{sDestroyWidth:p[0].style.width,sInstance:f,sTableId:f});r.nTable=
this;r.oApi=b.internal;r.oInit=g;t.push(r);r.oInstance=1===b.length?b:p.dataTable();yb(g);ma(g.oLanguage);g.aLengthMenu&&!g.iDisplayLength&&(g.iDisplayLength=Array.isArray(g.aLengthMenu[0])?g.aLengthMenu[0][0]:g.aLengthMenu[0]);g=pb(k.extend(!0,{},m),g);V(r.oFeatures,g,"bPaginate bLengthChange bFilter bSort bSortMulti bInfo bProcessing bAutoWidth bSortClasses bServerSide bDeferRender".split(" "));V(r,g,["asStripeClasses","ajax","fnServerData","fnFormatNumber","sServerMethod","aaSorting","aaSortingFixed",
"aLengthMenu","sPaginationType","sAjaxSource","sAjaxDataProp","iStateDuration","sDom","bSortCellsTop","iTabIndex","fnStateLoadCallback","fnStateSaveCallback","renderer","searchDelay","rowId",["iCookieDuration","iStateDuration"],["oSearch","oPreviousSearch"],["aoSearchCols","aoPreSearchCols"],["iDisplayLength","_iDisplayLength"]]);V(r.oScroll,g,[["sScrollX","sX"],["sScrollXInner","sXInner"],["sScrollY","sY"],["bScrollCollapse","bCollapse"]]);V(r.oLanguage,g,"fnInfoCallback");Q(r,"aoDrawCallback",g.fnDrawCallback,
"user");Q(r,"aoServerParams",g.fnServerParams,"user");Q(r,"aoStateSaveParams",g.fnStateSaveParams,"user");Q(r,"aoStateLoadParams",g.fnStateLoadParams,"user");Q(r,"aoStateLoaded",g.fnStateLoaded,"user");Q(r,"aoRowCallback",g.fnRowCallback,"user");Q(r,"aoRowCreatedCallback",g.fnCreatedRow,"user");Q(r,"aoHeaderCallback",g.fnHeaderCallback,"user");Q(r,"aoFooterCallback",g.fnFooterCallback,"user");Q(r,"aoInitComplete",g.fnInitComplete,"user");Q(r,"aoPreDrawCallback",g.fnPreDrawCallback,"user");r.rowIdFn=
ia(g.rowId);Ab(r);var A=r.oClasses;k.extend(A,u.ext.classes,g.oClasses);p.addClass(A.sTable);r.iInitDisplayStart===q&&(r.iInitDisplayStart=g.iDisplayStart,r._iDisplayStart=g.iDisplayStart);null!==g.iDeferLoading&&(r.bDeferLoading=!0,f=Array.isArray(g.iDeferLoading),r._iRecordsDisplay=f?g.iDeferLoading[0]:g.iDeferLoading,r._iRecordsTotal=f?g.iDeferLoading[1]:g.iDeferLoading);var E=r.oLanguage;k.extend(!0,E,g.oLanguage);E.sUrl?(k.ajax({dataType:"json",url:E.sUrl,success:function(C){ma(C);O(m.oLanguage,
C);k.extend(!0,E,C);H(r,null,"i18n",[r]);za(r)},error:function(){za(r)}}),n=!0):H(r,null,"i18n",[r]);null===g.asStripeClasses&&(r.asStripeClasses=[A.sStripeOdd,A.sStripeEven]);f=r.asStripeClasses;var I=p.children("tbody").find("tr").eq(0);-1!==k.inArray(!0,k.map(f,function(C,B){return I.hasClass(C)}))&&(k("tbody tr",this).removeClass(f.join(" ")),r.asDestroyStripes=f.slice());f=[];t=this.getElementsByTagName("thead");0!==t.length&&(wa(r.aoHeader,t[0]),f=Ka(r));if(null===g.aoColumns)for(t=[],h=0,l=
f.length;h<l;h++)t.push(null);else t=g.aoColumns;h=0;for(l=t.length;h<l;h++)Wa(r,f?f[h]:null);Cb(r,g.aoColumnDefs,t,function(C,B){Da(r,C,B)});if(I.length){var W=function(C,B){return null!==C.getAttribute("data-"+B)?B:null};k(I[0]).children("th, td").each(function(C,B){var ba=r.aoColumns[C];if(ba.mData===C){var X=W(B,"sort")||W(B,"order");B=W(B,"filter")||W(B,"search");if(null!==X||null!==B)ba.mData={_:C+".display",sort:null!==X?C+".@data-"+X:q,type:null!==X?C+".@data-"+X:q,filter:null!==B?C+".@data-"+
B:q},Da(r,C)}})}var M=r.oFeatures;f=function(){if(g.aaSorting===q){var C=r.aaSorting;h=0;for(l=C.length;h<l;h++)C[h][1]=r.aoColumns[h].asSorting[0]}Pa(r);M.bSort&&Q(r,"aoDrawCallback",function(){if(r.bSorted){var ba=pa(r),X={};k.each(ba,function(lb,Aa){X[Aa.src]=Aa.dir});H(r,null,"order",[r,ba,X]);cc(r)}});Q(r,"aoDrawCallback",function(){(r.bSorted||"ssp"===P(r)||M.bDeferRender)&&Pa(r)},"sc");C=p.children("caption").each(function(){this._captionSide=k(this).css("caption-side")});var B=p.children("thead");
0===B.length&&(B=k("<thead/>").appendTo(p));r.nTHead=B[0];B=p.children("tbody");0===B.length&&(B=k("<tbody/>").appendTo(p));r.nTBody=B[0];B=p.children("tfoot");0===B.length&&0<C.length&&(""!==r.oScroll.sX||""!==r.oScroll.sY)&&(B=k("<tfoot/>").appendTo(p));0===B.length||0===B.children().length?p.addClass(A.sNoFooter):0<B.length&&(r.nTFoot=B[0],wa(r.aoFooter,r.nTFoot));if(g.aaData)for(h=0;h<g.aaData.length;h++)ea(r,g.aaData[h]);else(r.bDeferLoading||"dom"==P(r))&&Ga(r,k(r.nTBody).children("tr"));r.aiDisplay=
r.aiDisplayMaster.slice();r.bInitialised=!0;!1===n&&za(r)};g.bStateSave?(M.bStateSave=!0,Q(r,"aoDrawCallback",Qa,"state_save"),dc(r,g,f)):f()}});b=null;return this},L,w,J,rb={},gc=/[\r\n\u2028]/g,Ta=/<.*?>/g,tc=/^\d{2,4}[\.\/\-]\d{1,2}[\.\/\-]\d{1,2}([T ]{1}\d{1,2}[:\.]\d{2}([\.:]\d{2})?)?$/,uc=/(\/|\.|\*|\+|\?|\||\(|\)|\[|\]|\{|\}|\\|\$|\^|\-)/g,qb=/['\u00A0,$£€¥%\u2009\u202F\u20BD\u20a9\u20BArfkɃΞ]/gi,ca=function(a){return a&&!0!==a&&"-"!==a?!1:!0},hc=function(a){var b=parseInt(a,10);return!isNaN(b)&&
isFinite(a)?b:null},ic=function(a,b){rb[b]||(rb[b]=new RegExp(hb(b),"g"));return"string"===typeof a&&"."!==b?a.replace(/\./g,"").replace(rb[b],"."):a},sb=function(a,b,c){var d="string"===typeof a;if(ca(a))return!0;b&&d&&(a=ic(a,b));c&&d&&(a=a.replace(qb,""));return!isNaN(parseFloat(a))&&isFinite(a)},jc=function(a,b,c){return ca(a)?!0:ca(a)||"string"===typeof a?sb(a.replace(Ta,""),b,c)?!0:null:null},T=function(a,b,c){var d=[],e=0,f=a.length;if(c!==q)for(;e<f;e++)a[e]&&a[e][b]&&d.push(a[e][b][c]);else for(;e<
f;e++)a[e]&&d.push(a[e][b]);return d},Ca=function(a,b,c,d){var e=[],f=0,g=b.length;if(d!==q)for(;f<g;f++)a[b[f]][c]&&e.push(a[b[f]][c][d]);else for(;f<g;f++)e.push(a[b[f]][c]);return e},qa=function(a,b){var c=[];if(b===q){b=0;var d=a}else d=b,b=a;for(a=b;a<d;a++)c.push(a);return c},kc=function(a){for(var b=[],c=0,d=a.length;c<d;c++)a[c]&&b.push(a[c]);return b},Ja=function(a){a:{if(!(2>a.length)){var b=a.slice().sort();for(var c=b[0],d=1,e=b.length;d<e;d++){if(b[d]===c){b=!1;break a}c=b[d]}}b=!0}if(b)return a.slice();
b=[];e=a.length;var f,g=0;d=0;a:for(;d<e;d++){c=a[d];for(f=0;f<g;f++)if(b[f]===c)continue a;b.push(c);g++}return b},lc=function(a,b){if(Array.isArray(b))for(var c=0;c<b.length;c++)lc(a,b[c]);else a.push(b);return a};Array.isArray||(Array.isArray=function(a){return"[object Array]"===Object.prototype.toString.call(a)});String.prototype.trim||(String.prototype.trim=function(){return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,"")});u.util={throttle:function(a,b){var c=b!==q?b:200,d,e;return function(){var f=
this,g=+new Date,h=arguments;d&&g<d+c?(clearTimeout(e),e=setTimeout(function(){d=q;a.apply(f,h)},c)):(d=g,a.apply(f,h))}},escapeRegex:function(a){return a.replace(uc,"\\$1")}};var R=function(a,b,c){a[b]!==q&&(a[c]=a[b])},ua=/\[.*?\]$/,oa=/\(\)$/,hb=u.util.escapeRegex,Oa=k("<div>")[0],rc=Oa.textContent!==q,sc=/<.*?>/g,fb=u.util.throttle,mc=[],N=Array.prototype,vc=function(a){var b,c=u.settings,d=k.map(c,function(f,g){return f.nTable});if(a){if(a.nTable&&a.oApi)return[a];if(a.nodeName&&"table"===a.nodeName.toLowerCase()){var e=
k.inArray(a,d);return-1!==e?[c[e]]:null}if(a&&"function"===typeof a.settings)return a.settings().toArray();"string"===typeof a?b=k(a):a instanceof k&&(b=a)}else return[];if(b)return b.map(function(f){e=k.inArray(this,d);return-1!==e?c[e]:null}).toArray()};var D=function(a,b){if(!(this instanceof D))return new D(a,b);var c=[],d=function(g){(g=vc(g))&&c.push.apply(c,g)};if(Array.isArray(a))for(var e=0,f=a.length;e<f;e++)d(a[e]);else d(a);this.context=Ja(c);b&&k.merge(this,b);this.selector={rows:null,
cols:null,opts:null};D.extend(this,this,mc)};u.Api=D;k.extend(D.prototype,{any:function(){return 0!==this.count()},concat:N.concat,context:[],count:function(){return this.flatten().length},each:function(a){for(var b=0,c=this.length;b<c;b++)a.call(this,this[b],b,this);return this},eq:function(a){var b=this.context;return b.length>a?new D(b[a],this[a]):null},filter:function(a){var b=[];if(N.filter)b=N.filter.call(this,a,this);else for(var c=0,d=this.length;c<d;c++)a.call(this,this[c],c,this)&&b.push(this[c]);
return new D(this.context,b)},flatten:function(){var a=[];return new D(this.context,a.concat.apply(a,this.toArray()))},join:N.join,indexOf:N.indexOf||function(a,b){b=b||0;for(var c=this.length;b<c;b++)if(this[b]===a)return b;return-1},iterator:function(a,b,c,d){var e=[],f,g,h=this.context,l,n=this.selector;"string"===typeof a&&(d=c,c=b,b=a,a=!1);var m=0;for(f=h.length;m<f;m++){var p=new D(h[m]);if("table"===b){var t=c.call(p,h[m],m);t!==q&&e.push(t)}else if("columns"===b||"rows"===b)t=c.call(p,h[m],
this[m],m),t!==q&&e.push(t);else if("column"===b||"column-rows"===b||"row"===b||"cell"===b){var v=this[m];"column-rows"===b&&(l=Ua(h[m],n.opts));var x=0;for(g=v.length;x<g;x++)t=v[x],t="cell"===b?c.call(p,h[m],t.row,t.column,m,x):c.call(p,h[m],t,m,x,l),t!==q&&e.push(t)}}return e.length||d?(a=new D(h,a?e.concat.apply([],e):e),b=a.selector,b.rows=n.rows,b.cols=n.cols,b.opts=n.opts,a):this},lastIndexOf:N.lastIndexOf||function(a,b){return this.indexOf.apply(this.toArray.reverse(),arguments)},length:0,
map:function(a){var b=[];if(N.map)b=N.map.call(this,a,this);else for(var c=0,d=this.length;c<d;c++)b.push(a.call(this,this[c],c));return new D(this.context,b)},pluck:function(a){return this.map(function(b){return b[a]})},pop:N.pop,push:N.push,reduce:N.reduce||function(a,b){return Bb(this,a,b,0,this.length,1)},reduceRight:N.reduceRight||function(a,b){return Bb(this,a,b,this.length-1,-1,-1)},reverse:N.reverse,selector:null,shift:N.shift,slice:function(){return new D(this.context,this)},sort:N.sort,
splice:N.splice,toArray:function(){return N.slice.call(this)},to$:function(){return k(this)},toJQuery:function(){return k(this)},unique:function(){return new D(this.context,Ja(this))},unshift:N.unshift});D.extend=function(a,b,c){if(c.length&&b&&(b instanceof D||b.__dt_wrapper)){var d,e=function(h,l,n){return function(){var m=l.apply(h,arguments);D.extend(m,m,n.methodExt);return m}};var f=0;for(d=c.length;f<d;f++){var g=c[f];b[g.name]="function"===g.type?e(a,g.val,g):"object"===g.type?{}:g.val;b[g.name].__dt_wrapper=
!0;D.extend(a,b[g.name],g.propExt)}}};D.register=w=function(a,b){if(Array.isArray(a))for(var c=0,d=a.length;c<d;c++)D.register(a[c],b);else{d=a.split(".");var e=mc,f;a=0;for(c=d.length;a<c;a++){var g=(f=-1!==d[a].indexOf("()"))?d[a].replace("()",""):d[a];a:{var h=0;for(var l=e.length;h<l;h++)if(e[h].name===g){h=e[h];break a}h=null}h||(h={name:g,val:{},methodExt:[],propExt:[],type:"object"},e.push(h));a===c-1?(h.val=b,h.type="function"===typeof b?"function":k.isPlainObject(b)?"object":"other"):e=f?
h.methodExt:h.propExt}}};D.registerPlural=J=function(a,b,c){D.register(a,c);D.register(b,function(){var d=c.apply(this,arguments);return d===this?this:d instanceof D?d.length?Array.isArray(d[0])?new D(d.context,d[0]):d[0]:q:d})};var nc=function(a,b){if(Array.isArray(a))return k.map(a,function(d){return nc(d,b)});if("number"===typeof a)return[b[a]];var c=k.map(b,function(d,e){return d.nTable});return k(c).filter(a).map(function(d){d=k.inArray(this,c);return b[d]}).toArray()};w("tables()",function(a){return a!==
q&&null!==a?new D(nc(a,this.context)):this});w("table()",function(a){a=this.tables(a);var b=a.context;return b.length?new D(b[0]):a});J("tables().nodes()","table().node()",function(){return this.iterator("table",function(a){return a.nTable},1)});J("tables().body()","table().body()",function(){return this.iterator("table",function(a){return a.nTBody},1)});J("tables().header()","table().header()",function(){return this.iterator("table",function(a){return a.nTHead},1)});J("tables().footer()","table().footer()",
function(){return this.iterator("table",function(a){return a.nTFoot},1)});J("tables().containers()","table().container()",function(){return this.iterator("table",function(a){return a.nTableWrapper},1)});w("draw()",function(a){return this.iterator("table",function(b){"page"===a?fa(b):("string"===typeof a&&(a="full-hold"===a?!1:!0),ja(b,!1===a))})});w("page()",function(a){return a===q?this.page.info().page:this.iterator("table",function(b){kb(b,a)})});w("page.info()",function(a){if(0===this.context.length)return q;
a=this.context[0];var b=a._iDisplayStart,c=a.oFeatures.bPaginate?a._iDisplayLength:-1,d=a.fnRecordsDisplay(),e=-1===c;return{page:e?0:Math.floor(b/c),pages:e?1:Math.ceil(d/c),start:b,end:a.fnDisplayEnd(),length:c,recordsTotal:a.fnRecordsTotal(),recordsDisplay:d,serverSide:"ssp"===P(a)}});w("page.len()",function(a){return a===q?0!==this.context.length?this.context[0]._iDisplayLength:q:this.iterator("table",function(b){ib(b,a)})});var oc=function(a,b,c){if(c){var d=new D(a);d.one("draw",function(){c(d.ajax.json())})}if("ssp"==
P(a))ja(a,b);else{U(a,!0);var e=a.jqXHR;e&&4!==e.readyState&&e.abort();La(a,[],function(f){Ha(a);f=Ma(a,f);for(var g=0,h=f.length;g<h;g++)ea(a,f[g]);ja(a,b);U(a,!1)})}};w("ajax.json()",function(){var a=this.context;if(0<a.length)return a[0].json});w("ajax.params()",function(){var a=this.context;if(0<a.length)return a[0].oAjaxData});w("ajax.reload()",function(a,b){return this.iterator("table",function(c){oc(c,!1===b,a)})});w("ajax.url()",function(a){var b=this.context;if(a===q){if(0===b.length)return q;
b=b[0];return b.ajax?k.isPlainObject(b.ajax)?b.ajax.url:b.ajax:b.sAjaxSource}return this.iterator("table",function(c){k.isPlainObject(c.ajax)?c.ajax.url=a:c.ajax=a})});w("ajax.url().load()",function(a,b){return this.iterator("table",function(c){oc(c,!1===b,a)})});var tb=function(a,b,c,d,e){var f=[],g,h,l;var n=typeof b;b&&"string"!==n&&"function"!==n&&b.length!==q||(b=[b]);n=0;for(h=b.length;n<h;n++){var m=b[n]&&b[n].split&&!b[n].match(/[\[\(:]/)?b[n].split(","):[b[n]];var p=0;for(l=m.length;p<l;p++)(g=
c("string"===typeof m[p]?m[p].trim():m[p]))&&g.length&&(f=f.concat(g))}a=L.selector[a];if(a.length)for(n=0,h=a.length;n<h;n++)f=a[n](d,e,f);return Ja(f)},ub=function(a){a||(a={});a.filter&&a.search===q&&(a.search=a.filter);return k.extend({search:"none",order:"current",page:"all"},a)},vb=function(a){for(var b=0,c=a.length;b<c;b++)if(0<a[b].length)return a[0]=a[b],a[0].length=1,a.length=1,a.context=[a.context[b]],a;a.length=0;return a},Ua=function(a,b){var c=[],d=a.aiDisplay;var e=a.aiDisplayMaster;
var f=b.search;var g=b.order;b=b.page;if("ssp"==P(a))return"removed"===f?[]:qa(0,e.length);if("current"==b)for(g=a._iDisplayStart,a=a.fnDisplayEnd();g<a;g++)c.push(d[g]);else if("current"==g||"applied"==g)if("none"==f)c=e.slice();else if("applied"==f)c=d.slice();else{if("removed"==f){var h={};g=0;for(a=d.length;g<a;g++)h[d[g]]=null;c=k.map(e,function(l){return h.hasOwnProperty(l)?null:l})}}else if("index"==g||"original"==g)for(g=0,a=a.aoData.length;g<a;g++)"none"==f?c.push(g):(e=k.inArray(g,d),(-1===
e&&"removed"==f||0<=e&&"applied"==f)&&c.push(g));return c},wc=function(a,b,c){var d;return tb("row",b,function(e){var f=hc(e),g=a.aoData;if(null!==f&&!c)return[f];d||(d=Ua(a,c));if(null!==f&&-1!==k.inArray(f,d))return[f];if(null===e||e===q||""===e)return d;if("function"===typeof e)return k.map(d,function(l){var n=g[l];return e(l,n._aData,n.nTr)?l:null});if(e.nodeName){f=e._DT_RowIndex;var h=e._DT_CellIndex;if(f!==q)return g[f]&&g[f].nTr===e?[f]:[];if(h)return g[h.row]&&g[h.row].nTr===e.parentNode?
[h.row]:[];f=k(e).closest("*[data-dt-row]");return f.length?[f.data("dt-row")]:[]}if("string"===typeof e&&"#"===e.charAt(0)&&(f=a.aIds[e.replace(/^#/,"")],f!==q))return[f.idx];f=kc(Ca(a.aoData,d,"nTr"));return k(f).filter(e).map(function(){return this._DT_RowIndex}).toArray()},a,c)};w("rows()",function(a,b){a===q?a="":k.isPlainObject(a)&&(b=a,a="");b=ub(b);var c=this.iterator("table",function(d){return wc(d,a,b)},1);c.selector.rows=a;c.selector.opts=b;return c});w("rows().nodes()",function(){return this.iterator("row",
function(a,b){return a.aoData[b].nTr||q},1)});w("rows().data()",function(){return this.iterator(!0,"rows",function(a,b){return Ca(a.aoData,b,"_aData")},1)});J("rows().cache()","row().cache()",function(a){return this.iterator("row",function(b,c){b=b.aoData[c];return"search"===a?b._aFilterData:b._aSortData},1)});J("rows().invalidate()","row().invalidate()",function(a){return this.iterator("row",function(b,c){va(b,c,a)})});J("rows().indexes()","row().index()",function(){return this.iterator("row",function(a,
b){return b},1)});J("rows().ids()","row().id()",function(a){for(var b=[],c=this.context,d=0,e=c.length;d<e;d++)for(var f=0,g=this[d].length;f<g;f++){var h=c[d].rowIdFn(c[d].aoData[this[d][f]]._aData);b.push((!0===a?"#":"")+h)}return new D(c,b)});J("rows().remove()","row().remove()",function(){var a=this;this.iterator("row",function(b,c,d){var e=b.aoData,f=e[c],g,h;e.splice(c,1);var l=0;for(g=e.length;l<g;l++){var n=e[l];var m=n.anCells;null!==n.nTr&&(n.nTr._DT_RowIndex=l);if(null!==m)for(n=0,h=m.length;n<
h;n++)m[n]._DT_CellIndex.row=l}Ia(b.aiDisplayMaster,c);Ia(b.aiDisplay,c);Ia(a[d],c,!1);0<b._iRecordsDisplay&&b._iRecordsDisplay--;jb(b);c=b.rowIdFn(f._aData);c!==q&&delete b.aIds[c]});this.iterator("table",function(b){for(var c=0,d=b.aoData.length;c<d;c++)b.aoData[c].idx=c});return this});w("rows.add()",function(a){var b=this.iterator("table",function(d){var e,f=[];var g=0;for(e=a.length;g<e;g++){var h=a[g];h.nodeName&&"TR"===h.nodeName.toUpperCase()?f.push(Ga(d,h)[0]):f.push(ea(d,h))}return f},1),
c=this.rows(-1);c.pop();k.merge(c,b);return c});w("row()",function(a,b){return vb(this.rows(a,b))});w("row().data()",function(a){var b=this.context;if(a===q)return b.length&&this.length?b[0].aoData[this[0]]._aData:q;var c=b[0].aoData[this[0]];c._aData=a;Array.isArray(a)&&c.nTr&&c.nTr.id&&da(b[0].rowId)(a,c.nTr.id);va(b[0],this[0],"data");return this});w("row().node()",function(){var a=this.context;return a.length&&this.length?a[0].aoData[this[0]].nTr||null:null});w("row.add()",function(a){a instanceof
k&&a.length&&(a=a[0]);var b=this.iterator("table",function(c){return a.nodeName&&"TR"===a.nodeName.toUpperCase()?Ga(c,a)[0]:ea(c,a)});return this.row(b[0])});var xc=function(a,b,c,d){var e=[],f=function(g,h){if(Array.isArray(g)||g instanceof k)for(var l=0,n=g.length;l<n;l++)f(g[l],h);else g.nodeName&&"tr"===g.nodeName.toLowerCase()?e.push(g):(l=k("<tr><td></td></tr>").addClass(h),k("td",l).addClass(h).html(g)[0].colSpan=na(a),e.push(l[0]))};f(c,d);b._details&&b._details.detach();b._details=k(e);b._detailsShow&&
b._details.insertAfter(b.nTr)},wb=function(a,b){var c=a.context;c.length&&(a=c[0].aoData[b!==q?b:a[0]])&&a._details&&(a._details.remove(),a._detailsShow=q,a._details=q)},pc=function(a,b){var c=a.context;c.length&&a.length&&(a=c[0].aoData[a[0]],a._details&&((a._detailsShow=b)?a._details.insertAfter(a.nTr):a._details.detach(),yc(c[0])))},yc=function(a){var b=new D(a),c=a.aoData;b.off("draw.dt.DT_details column-visibility.dt.DT_details destroy.dt.DT_details");0<T(c,"_details").length&&(b.on("draw.dt.DT_details",
function(d,e){a===e&&b.rows({page:"current"}).eq(0).each(function(f){f=c[f];f._detailsShow&&f._details.insertAfter(f.nTr)})}),b.on("column-visibility.dt.DT_details",function(d,e,f,g){if(a===e)for(e=na(e),f=0,g=c.length;f<g;f++)d=c[f],d._details&&d._details.children("td[colspan]").attr("colspan",e)}),b.on("destroy.dt.DT_details",function(d,e){if(a===e)for(d=0,e=c.length;d<e;d++)c[d]._details&&wb(b,d)}))};w("row().child()",function(a,b){var c=this.context;if(a===q)return c.length&&this.length?c[0].aoData[this[0]]._details:
q;!0===a?this.child.show():!1===a?wb(this):c.length&&this.length&&xc(c[0],c[0].aoData[this[0]],a,b);return this});w(["row().child.show()","row().child().show()"],function(a){pc(this,!0);return this});w(["row().child.hide()","row().child().hide()"],function(){pc(this,!1);return this});w(["row().child.remove()","row().child().remove()"],function(){wb(this);return this});w("row().child.isShown()",function(){var a=this.context;return a.length&&this.length?a[0].aoData[this[0]]._detailsShow||!1:!1});var zc=
/^([^:]+):(name|visIdx|visible)$/,qc=function(a,b,c,d,e){c=[];d=0;for(var f=e.length;d<f;d++)c.push(S(a,e[d],b));return c},Ac=function(a,b,c){var d=a.aoColumns,e=T(d,"sName"),f=T(d,"nTh");return tb("column",b,function(g){var h=hc(g);if(""===g)return qa(d.length);if(null!==h)return[0<=h?h:d.length+h];if("function"===typeof g){var l=Ua(a,c);return k.map(d,function(p,t){return g(t,qc(a,t,0,0,l),f[t])?t:null})}var n="string"===typeof g?g.match(zc):"";if(n)switch(n[2]){case "visIdx":case "visible":h=parseInt(n[1],
10);if(0>h){var m=k.map(d,function(p,t){return p.bVisible?t:null});return[m[m.length+h]]}return[sa(a,h)];case "name":return k.map(e,function(p,t){return p===n[1]?t:null});default:return[]}if(g.nodeName&&g._DT_CellIndex)return[g._DT_CellIndex.column];h=k(f).filter(g).map(function(){return k.inArray(this,f)}).toArray();if(h.length||!g.nodeName)return h;h=k(g).closest("*[data-dt-column]");return h.length?[h.data("dt-column")]:[]},a,c)};w("columns()",function(a,b){a===q?a="":k.isPlainObject(a)&&(b=a,
a="");b=ub(b);var c=this.iterator("table",function(d){return Ac(d,a,b)},1);c.selector.cols=a;c.selector.opts=b;return c});J("columns().header()","column().header()",function(a,b){return this.iterator("column",function(c,d){return c.aoColumns[d].nTh},1)});J("columns().footer()","column().footer()",function(a,b){return this.iterator("column",function(c,d){return c.aoColumns[d].nTf},1)});J("columns().data()","column().data()",function(){return this.iterator("column-rows",qc,1)});J("columns().dataSrc()",
"column().dataSrc()",function(){return this.iterator("column",function(a,b){return a.aoColumns[b].mData},1)});J("columns().cache()","column().cache()",function(a){return this.iterator("column-rows",function(b,c,d,e,f){return Ca(b.aoData,f,"search"===a?"_aFilterData":"_aSortData",c)},1)});J("columns().nodes()","column().nodes()",function(){return this.iterator("column-rows",function(a,b,c,d,e){return Ca(a.aoData,e,"anCells",b)},1)});J("columns().visible()","column().visible()",function(a,b){var c=
this,d=this.iterator("column",function(e,f){if(a===q)return e.aoColumns[f].bVisible;var g=e.aoColumns,h=g[f],l=e.aoData,n;if(a!==q&&h.bVisible!==a){if(a){var m=k.inArray(!0,T(g,"bVisible"),f+1);g=0;for(n=l.length;g<n;g++){var p=l[g].nTr;e=l[g].anCells;p&&p.insertBefore(e[f],e[m]||null)}}else k(T(e.aoData,"anCells",f)).detach();h.bVisible=a}});a!==q&&this.iterator("table",function(e){xa(e,e.aoHeader);xa(e,e.aoFooter);e.aiDisplay.length||k(e.nTBody).find("td[colspan]").attr("colspan",na(e));Qa(e);c.iterator("column",
function(f,g){H(f,null,"column-visibility",[f,g,a,b])});(b===q||b)&&c.columns.adjust()});return d});J("columns().indexes()","column().index()",function(a){return this.iterator("column",function(b,c){return"visible"===a?ta(b,c):c},1)});w("columns.adjust()",function(){return this.iterator("table",function(a){ra(a)},1)});w("column.index()",function(a,b){if(0!==this.context.length){var c=this.context[0];if("fromVisible"===a||"toData"===a)return sa(c,b);if("fromData"===a||"toVisible"===a)return ta(c,b)}});
w("column()",function(a,b){return vb(this.columns(a,b))});var Bc=function(a,b,c){var d=a.aoData,e=Ua(a,c),f=kc(Ca(d,e,"anCells")),g=k(lc([],f)),h,l=a.aoColumns.length,n,m,p,t,v,x;return tb("cell",b,function(r){var A="function"===typeof r;if(null===r||r===q||A){n=[];m=0;for(p=e.length;m<p;m++)for(h=e[m],t=0;t<l;t++)v={row:h,column:t},A?(x=d[h],r(v,S(a,h,t),x.anCells?x.anCells[t]:null)&&n.push(v)):n.push(v);return n}if(k.isPlainObject(r))return r.column!==q&&r.row!==q&&-1!==k.inArray(r.row,e)?[r]:[];
A=g.filter(r).map(function(E,I){return{row:I._DT_CellIndex.row,column:I._DT_CellIndex.column}}).toArray();if(A.length||!r.nodeName)return A;x=k(r).closest("*[data-dt-row]");return x.length?[{row:x.data("dt-row"),column:x.data("dt-column")}]:[]},a,c)};w("cells()",function(a,b,c){k.isPlainObject(a)&&(a.row===q?(c=a,a=null):(c=b,b=null));k.isPlainObject(b)&&(c=b,b=null);if(null===b||b===q)return this.iterator("table",function(m){return Bc(m,a,ub(c))});var d=c?{page:c.page,order:c.order,search:c.search}:
{},e=this.columns(b,d),f=this.rows(a,d),g,h,l,n;d=this.iterator("table",function(m,p){m=[];g=0;for(h=f[p].length;g<h;g++)for(l=0,n=e[p].length;l<n;l++)m.push({row:f[p][g],column:e[p][l]});return m},1);d=c&&c.selected?this.cells(d,c):d;k.extend(d.selector,{cols:b,rows:a,opts:c});return d});J("cells().nodes()","cell().node()",function(){return this.iterator("cell",function(a,b,c){return(a=a.aoData[b])&&a.anCells?a.anCells[c]:q},1)});w("cells().data()",function(){return this.iterator("cell",function(a,
b,c){return S(a,b,c)},1)});J("cells().cache()","cell().cache()",function(a){a="search"===a?"_aFilterData":"_aSortData";return this.iterator("cell",function(b,c,d){return b.aoData[c][a][d]},1)});J("cells().render()","cell().render()",function(a){return this.iterator("cell",function(b,c,d){return S(b,c,d,a)},1)});J("cells().indexes()","cell().index()",function(){return this.iterator("cell",function(a,b,c){return{row:b,column:c,columnVisible:ta(a,c)}},1)});J("cells().invalidate()","cell().invalidate()",
function(a){return this.iterator("cell",function(b,c,d){va(b,c,a,d)})});w("cell()",function(a,b,c){return vb(this.cells(a,b,c))});w("cell().data()",function(a){var b=this.context,c=this[0];if(a===q)return b.length&&c.length?S(b[0],c[0].row,c[0].column):q;Db(b[0],c[0].row,c[0].column,a);va(b[0],c[0].row,"data",c[0].column);return this});w("order()",function(a,b){var c=this.context;if(a===q)return 0!==c.length?c[0].aaSorting:q;"number"===typeof a?a=[[a,b]]:a.length&&!Array.isArray(a[0])&&(a=Array.prototype.slice.call(arguments));
return this.iterator("table",function(d){d.aaSorting=a.slice()})});w("order.listener()",function(a,b,c){return this.iterator("table",function(d){db(d,a,b,c)})});w("order.fixed()",function(a){if(!a){var b=this.context;b=b.length?b[0].aaSortingFixed:q;return Array.isArray(b)?{pre:b}:b}return this.iterator("table",function(c){c.aaSortingFixed=k.extend(!0,{},a)})});w(["columns().order()","column().order()"],function(a){var b=this;return this.iterator("table",function(c,d){var e=[];k.each(b[d],function(f,
g){e.push([g,a])});c.aaSorting=e})});w("search()",function(a,b,c,d){var e=this.context;return a===q?0!==e.length?e[0].oPreviousSearch.sSearch:q:this.iterator("table",function(f){f.oFeatures.bFilter&&ya(f,k.extend({},f.oPreviousSearch,{sSearch:a+"",bRegex:null===b?!1:b,bSmart:null===c?!0:c,bCaseInsensitive:null===d?!0:d}),1)})});J("columns().search()","column().search()",function(a,b,c,d){return this.iterator("column",function(e,f){var g=e.aoPreSearchCols;if(a===q)return g[f].sSearch;e.oFeatures.bFilter&&
(k.extend(g[f],{sSearch:a+"",bRegex:null===b?!1:b,bSmart:null===c?!0:c,bCaseInsensitive:null===d?!0:d}),ya(e,e.oPreviousSearch,1))})});w("state()",function(){return this.context.length?this.context[0].oSavedState:null});w("state.clear()",function(){return this.iterator("table",function(a){a.fnStateSaveCallback.call(a.oInstance,a,{})})});w("state.loaded()",function(){return this.context.length?this.context[0].oLoadedState:null});w("state.save()",function(){return this.iterator("table",function(a){Qa(a)})});
u.versionCheck=u.fnVersionCheck=function(a){var b=u.version.split(".");a=a.split(".");for(var c,d,e=0,f=a.length;e<f;e++)if(c=parseInt(b[e],10)||0,d=parseInt(a[e],10)||0,c!==d)return c>d;return!0};u.isDataTable=u.fnIsDataTable=function(a){var b=k(a).get(0),c=!1;if(a instanceof u.Api)return!0;k.each(u.settings,function(d,e){d=e.nScrollHead?k("table",e.nScrollHead)[0]:null;var f=e.nScrollFoot?k("table",e.nScrollFoot)[0]:null;if(e.nTable===b||d===b||f===b)c=!0});return c};u.tables=u.fnTables=function(a){var b=
!1;k.isPlainObject(a)&&(b=a.api,a=a.visible);var c=k.map(u.settings,function(d){if(!a||a&&k(d.nTable).is(":visible"))return d.nTable});return b?new D(c):c};u.camelToHungarian=O;w("$()",function(a,b){b=this.rows(b).nodes();b=k(b);return k([].concat(b.filter(a).toArray(),b.find(a).toArray()))});k.each(["on","one","off"],function(a,b){w(b+"()",function(){var c=Array.prototype.slice.call(arguments);c[0]=k.map(c[0].split(/\s/),function(e){return e.match(/\.dt\b/)?e:e+".dt"}).join(" ");var d=k(this.tables().nodes());
d[b].apply(d,c);return this})});w("clear()",function(){return this.iterator("table",function(a){Ha(a)})});w("settings()",function(){return new D(this.context,this.context)});w("init()",function(){var a=this.context;return a.length?a[0].oInit:null});w("data()",function(){return this.iterator("table",function(a){return T(a.aoData,"_aData")}).flatten()});w("destroy()",function(a){a=a||!1;return this.iterator("table",function(b){var c=b.nTableWrapper.parentNode,d=b.oClasses,e=b.nTable,f=b.nTBody,g=b.nTHead,
h=b.nTFoot,l=k(e);f=k(f);var n=k(b.nTableWrapper),m=k.map(b.aoData,function(t){return t.nTr}),p;b.bDestroying=!0;H(b,"aoDestroyCallback","destroy",[b]);a||(new D(b)).columns().visible(!0);n.off(".DT").find(":not(tbody *)").off(".DT");k(y).off(".DT-"+b.sInstance);e!=g.parentNode&&(l.children("thead").detach(),l.append(g));h&&e!=h.parentNode&&(l.children("tfoot").detach(),l.append(h));b.aaSorting=[];b.aaSortingFixed=[];Pa(b);k(m).removeClass(b.asStripeClasses.join(" "));k("th, td",g).removeClass(d.sSortable+
" "+d.sSortableAsc+" "+d.sSortableDesc+" "+d.sSortableNone);f.children().detach();f.append(m);g=a?"remove":"detach";l[g]();n[g]();!a&&c&&(c.insertBefore(e,b.nTableReinsertBefore),l.css("width",b.sDestroyWidth).removeClass(d.sTable),(p=b.asDestroyStripes.length)&&f.children().each(function(t){k(this).addClass(b.asDestroyStripes[t%p])}));c=k.inArray(b,u.settings);-1!==c&&u.settings.splice(c,1)})});k.each(["column","row","cell"],function(a,b){w(b+"s().every()",function(c){var d=this.selector.opts,e=
this;return this.iterator(b,function(f,g,h,l,n){c.call(e[b](g,"cell"===b?h:d,"cell"===b?d:q),g,h,l,n)})})});w("i18n()",function(a,b,c){var d=this.context[0];a=ia(a)(d.oLanguage);a===q&&(a=b);c!==q&&k.isPlainObject(a)&&(a=a[c]!==q?a[c]:a._);return a.replace("%d",c)});u.version="1.10.24";u.settings=[];u.models={};u.models.oSearch={bCaseInsensitive:!0,sSearch:"",bRegex:!1,bSmart:!0};u.models.oRow={nTr:null,anCells:null,_aData:[],_aSortData:null,_aFilterData:null,_sFilterRow:null,_sRowStripe:"",src:null,
idx:-1};u.models.oColumn={idx:null,aDataSort:null,asSorting:null,bSearchable:null,bSortable:null,bVisible:null,_sManualType:null,_bAttrSrc:!1,fnCreatedCell:null,fnGetData:null,fnSetData:null,mData:null,mRender:null,nTh:null,nTf:null,sClass:null,sContentPadding:null,sDefaultContent:null,sName:null,sSortDataType:"std",sSortingClass:null,sSortingClassJUI:null,sTitle:null,sType:null,sWidth:null,sWidthOrig:null};u.defaults={aaData:null,aaSorting:[[0,"asc"]],aaSortingFixed:[],ajax:null,aLengthMenu:[10,
25,50,100],aoColumns:null,aoColumnDefs:null,aoSearchCols:[],asStripeClasses:null,bAutoWidth:!0,bDeferRender:!1,bDestroy:!1,bFilter:!0,bInfo:!0,bLengthChange:!0,bPaginate:!0,bProcessing:!1,bRetrieve:!1,bScrollCollapse:!1,bServerSide:!1,bSort:!0,bSortMulti:!0,bSortCellsTop:!1,bSortClasses:!0,bStateSave:!1,fnCreatedRow:null,fnDrawCallback:null,fnFooterCallback:null,fnFormatNumber:function(a){return a.toString().replace(/\B(?=(\d{3})+(?!\d))/g,this.oLanguage.sThousands)},fnHeaderCallback:null,fnInfoCallback:null,
fnInitComplete:null,fnPreDrawCallback:null,fnRowCallback:null,fnServerData:null,fnServerParams:null,fnStateLoadCallback:function(a){try{return JSON.parse((-1===a.iStateDuration?sessionStorage:localStorage).getItem("DataTables_"+a.sInstance+"_"+location.pathname))}catch(b){return{}}},fnStateLoadParams:null,fnStateLoaded:null,fnStateSaveCallback:function(a,b){try{(-1===a.iStateDuration?sessionStorage:localStorage).setItem("DataTables_"+a.sInstance+"_"+location.pathname,JSON.stringify(b))}catch(c){}},
fnStateSaveParams:null,iStateDuration:7200,iDeferLoading:null,iDisplayLength:10,iDisplayStart:0,iTabIndex:0,oClasses:{},oLanguage:{oAria:{sSortAscending:": activate to sort column ascending",sSortDescending:": activate to sort column descending"},oPaginate:{sFirst:"First",sLast:"Last",sNext:"Next",sPrevious:"Previous"},sEmptyTable:"No data available in table",sInfo:"Showing _START_ to _END_ of _TOTAL_ entries",sInfoEmpty:"Showing 0 to 0 of 0 entries",sInfoFiltered:"(filtered from _MAX_ total entries)",
sInfoPostFix:"",sDecimal:"",sThousands:",",sLengthMenu:"Show _MENU_ entries",sLoadingRecords:"Loading...",sProcessing:"Processing...",sSearch:"Search:",sSearchPlaceholder:"",sUrl:"",sZeroRecords:"No matching records found"},oSearch:k.extend({},u.models.oSearch),sAjaxDataProp:"data",sAjaxSource:null,sDom:"lfrtip",searchDelay:null,sPaginationType:"simple_numbers",sScrollX:"",sScrollXInner:"",sScrollY:"",sServerMethod:"GET",renderer:null,rowId:"DT_RowId"};G(u.defaults);u.defaults.column={aDataSort:null,
iDataSort:-1,asSorting:["asc","desc"],bSearchable:!0,bSortable:!0,bVisible:!0,fnCreatedCell:null,mData:null,mRender:null,sCellType:"td",sClass:"",sContentPadding:"",sDefaultContent:null,sName:"",sSortDataType:"std",sTitle:null,sType:null,sWidth:null};G(u.defaults.column);u.models.oSettings={oFeatures:{bAutoWidth:null,bDeferRender:null,bFilter:null,bInfo:null,bLengthChange:null,bPaginate:null,bProcessing:null,bServerSide:null,bSort:null,bSortMulti:null,bSortClasses:null,bStateSave:null},oScroll:{bCollapse:null,
iBarWidth:0,sX:null,sXInner:null,sY:null},oLanguage:{fnInfoCallback:null},oBrowser:{bScrollOversize:!1,bScrollbarLeft:!1,bBounding:!1,barWidth:0},ajax:null,aanFeatures:[],aoData:[],aiDisplay:[],aiDisplayMaster:[],aIds:{},aoColumns:[],aoHeader:[],aoFooter:[],oPreviousSearch:{},aoPreSearchCols:[],aaSorting:null,aaSortingFixed:[],asStripeClasses:null,asDestroyStripes:[],sDestroyWidth:0,aoRowCallback:[],aoHeaderCallback:[],aoFooterCallback:[],aoDrawCallback:[],aoRowCreatedCallback:[],aoPreDrawCallback:[],
aoInitComplete:[],aoStateSaveParams:[],aoStateLoadParams:[],aoStateLoaded:[],sTableId:"",nTable:null,nTHead:null,nTFoot:null,nTBody:null,nTableWrapper:null,bDeferLoading:!1,bInitialised:!1,aoOpenRows:[],sDom:null,searchDelay:null,sPaginationType:"two_button",iStateDuration:0,aoStateSave:[],aoStateLoad:[],oSavedState:null,oLoadedState:null,sAjaxSource:null,sAjaxDataProp:null,bAjaxDataGet:!0,jqXHR:null,json:q,oAjaxData:q,fnServerData:null,aoServerParams:[],sServerMethod:null,fnFormatNumber:null,aLengthMenu:null,
iDraw:0,bDrawing:!1,iDrawError:-1,_iDisplayLength:10,_iDisplayStart:0,_iRecordsTotal:0,_iRecordsDisplay:0,oClasses:{},bFiltered:!1,bSorted:!1,bSortCellsTop:null,oInit:null,aoDestroyCallback:[],fnRecordsTotal:function(){return"ssp"==P(this)?1*this._iRecordsTotal:this.aiDisplayMaster.length},fnRecordsDisplay:function(){return"ssp"==P(this)?1*this._iRecordsDisplay:this.aiDisplay.length},fnDisplayEnd:function(){var a=this._iDisplayLength,b=this._iDisplayStart,c=b+a,d=this.aiDisplay.length,e=this.oFeatures,
f=e.bPaginate;return e.bServerSide?!1===f||-1===a?b+d:Math.min(b+a,this._iRecordsDisplay):!f||c>d||-1===a?d:c},oInstance:null,sInstance:null,iTabIndex:0,nScrollHead:null,nScrollFoot:null,aLastSort:[],oPlugins:{},rowIdFn:null,rowId:null};u.ext=L={buttons:{},classes:{},builder:"bs4-4.1.1/dt-1.10.24/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2",errMode:"alert",feature:[],search:[],selector:{cell:[],column:[],row:[]},internal:{},legacy:{ajax:null},pager:{},renderer:{pageButton:{},header:{}},order:{},type:{detect:[],search:{},order:{}},_unique:0,fnVersionCheck:u.fnVersionCheck,
iApiIndex:0,oJUIClasses:{},sVersion:u.version};k.extend(L,{afnFiltering:L.search,aTypes:L.type.detect,ofnSearch:L.type.search,oSort:L.type.order,afnSortData:L.order,aoFeatures:L.feature,oApi:L.internal,oStdClasses:L.classes,oPagination:L.pager});k.extend(u.ext.classes,{sTable:"dataTable",sNoFooter:"no-footer",sPageButton:"paginate_button",sPageButtonActive:"current",sPageButtonDisabled:"disabled",sStripeOdd:"odd",sStripeEven:"even",sRowEmpty:"dataTables_empty",sWrapper:"dataTables_wrapper",sFilter:"dataTables_filter",
sInfo:"dataTables_info",sPaging:"dataTables_paginate paging_",sLength:"dataTables_length",sProcessing:"dataTables_processing",sSortAsc:"sorting_asc",sSortDesc:"sorting_desc",sSortable:"sorting",sSortableAsc:"sorting_desc_disabled",sSortableDesc:"sorting_asc_disabled",sSortableNone:"sorting_disabled",sSortColumn:"sorting_",sFilterInput:"",sLengthSelect:"",sScrollWrapper:"dataTables_scroll",sScrollHead:"dataTables_scrollHead",sScrollHeadInner:"dataTables_scrollHeadInner",sScrollBody:"dataTables_scrollBody",
sScrollFoot:"dataTables_scrollFoot",sScrollFootInner:"dataTables_scrollFootInner",sHeaderTH:"",sFooterTH:"",sSortJUIAsc:"",sSortJUIDesc:"",sSortJUI:"",sSortJUIAscAllowed:"",sSortJUIDescAllowed:"",sSortJUIWrapper:"",sSortIcon:"",sJUIHeader:"",sJUIFooter:""});var ec=u.ext.pager;k.extend(ec,{simple:function(a,b){return["previous","next"]},full:function(a,b){return["first","previous","next","last"]},numbers:function(a,b){return[Ba(a,b)]},simple_numbers:function(a,b){return["previous",Ba(a,b),"next"]},
full_numbers:function(a,b){return["first","previous",Ba(a,b),"next","last"]},first_last_numbers:function(a,b){return["first",Ba(a,b),"last"]},_numbers:Ba,numbers_length:7});k.extend(!0,u.ext.renderer,{pageButton:{_:function(a,b,c,d,e,f){var g=a.oClasses,h=a.oLanguage.oPaginate,l=a.oLanguage.oAria.paginate||{},n,m,p=0,t=function(x,r){var A,E=g.sPageButtonDisabled,I=function(B){kb(a,B.data.action,!0)};var W=0;for(A=r.length;W<A;W++){var M=r[W];if(Array.isArray(M)){var C=k("<"+(M.DT_el||"div")+"/>").appendTo(x);
t(C,M)}else{n=null;m=M;C=a.iTabIndex;switch(M){case "ellipsis":x.append('<span class="ellipsis">&#x2026;</span>');break;case "first":n=h.sFirst;0===e&&(C=-1,m+=" "+E);break;case "previous":n=h.sPrevious;0===e&&(C=-1,m+=" "+E);break;case "next":n=h.sNext;if(0===f||e===f-1)C=-1,m+=" "+E;break;case "last":n=h.sLast;if(0===f||e===f-1)C=-1,m+=" "+E;break;default:n=a.fnFormatNumber(M+1),m=e===M?g.sPageButtonActive:""}null!==n&&(C=k("<a>",{"class":g.sPageButton+" "+m,"aria-controls":a.sTableId,"aria-label":l[M],
"data-dt-idx":p,tabindex:C,id:0===c&&"string"===typeof M?a.sTableId+"_"+M:null}).html(n).appendTo(x),ob(C,{action:M},I),p++)}}};try{var v=k(b).find(z.activeElement).data("dt-idx")}catch(x){}t(k(b).empty(),d);v!==q&&k(b).find("[data-dt-idx="+v+"]").trigger("focus")}}});k.extend(u.ext.type.detect,[function(a,b){b=b.oLanguage.sDecimal;return sb(a,b)?"num"+b:null},function(a,b){if(a&&!(a instanceof Date)&&!tc.test(a))return null;b=Date.parse(a);return null!==b&&!isNaN(b)||ca(a)?"date":null},function(a,
b){b=b.oLanguage.sDecimal;return sb(a,b,!0)?"num-fmt"+b:null},function(a,b){b=b.oLanguage.sDecimal;return jc(a,b)?"html-num"+b:null},function(a,b){b=b.oLanguage.sDecimal;return jc(a,b,!0)?"html-num-fmt"+b:null},function(a,b){return ca(a)||"string"===typeof a&&-1!==a.indexOf("<")?"html":null}]);k.extend(u.ext.type.search,{html:function(a){return ca(a)?a:"string"===typeof a?a.replace(gc," ").replace(Ta,""):""},string:function(a){return ca(a)?a:"string"===typeof a?a.replace(gc," "):a}});var Sa=function(a,
b,c,d){if(0!==a&&(!a||"-"===a))return-Infinity;b&&(a=ic(a,b));a.replace&&(c&&(a=a.replace(c,"")),d&&(a=a.replace(d,"")));return 1*a};k.extend(L.type.order,{"date-pre":function(a){a=Date.parse(a);return isNaN(a)?-Infinity:a},"html-pre":function(a){return ca(a)?"":a.replace?a.replace(/<.*?>/g,"").toLowerCase():a+""},"string-pre":function(a){return ca(a)?"":"string"===typeof a?a.toLowerCase():a.toString?a.toString():""},"string-asc":function(a,b){return a<b?-1:a>b?1:0},"string-desc":function(a,b){return a<
b?1:a>b?-1:0}});Va("");k.extend(!0,u.ext.renderer,{header:{_:function(a,b,c,d){k(a.nTable).on("order.dt.DT",function(e,f,g,h){a===f&&(e=c.idx,b.removeClass(d.sSortAsc+" "+d.sSortDesc).addClass("asc"==h[e]?d.sSortAsc:"desc"==h[e]?d.sSortDesc:c.sSortingClass))})},jqueryui:function(a,b,c,d){k("<div/>").addClass(d.sSortJUIWrapper).append(b.contents()).append(k("<span/>").addClass(d.sSortIcon+" "+c.sSortingClassJUI)).appendTo(b);k(a.nTable).on("order.dt.DT",function(e,f,g,h){a===f&&(e=c.idx,b.removeClass(d.sSortAsc+
" "+d.sSortDesc).addClass("asc"==h[e]?d.sSortAsc:"desc"==h[e]?d.sSortDesc:c.sSortingClass),b.find("span."+d.sSortIcon).removeClass(d.sSortJUIAsc+" "+d.sSortJUIDesc+" "+d.sSortJUI+" "+d.sSortJUIAscAllowed+" "+d.sSortJUIDescAllowed).addClass("asc"==h[e]?d.sSortJUIAsc:"desc"==h[e]?d.sSortJUIDesc:c.sSortingClassJUI))})}}});var xb=function(a){return"string"===typeof a?a.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;"):a};u.render={number:function(a,b,c,d,e){return{display:function(f){if("number"!==
typeof f&&"string"!==typeof f)return f;var g=0>f?"-":"",h=parseFloat(f);if(isNaN(h))return xb(f);h=h.toFixed(c);f=Math.abs(h);h=parseInt(f,10);f=c?b+(f-h).toFixed(c).substring(2):"";return g+(d||"")+h.toString().replace(/\B(?=(\d{3})+(?!\d))/g,a)+f+(e||"")}}},text:function(){return{display:xb,filter:xb}}};k.extend(u.ext.internal,{_fnExternApiFunc:fc,_fnBuildAjax:La,_fnAjaxUpdate:Fb,_fnAjaxParameters:Ob,_fnAjaxUpdateDraw:Pb,_fnAjaxDataSrc:Ma,_fnAddColumn:Wa,_fnColumnOptions:Da,_fnAdjustColumnSizing:ra,
_fnVisibleToColumnIndex:sa,_fnColumnIndexToVisible:ta,_fnVisbleColumns:na,_fnGetColumns:Fa,_fnColumnTypes:Ya,_fnApplyColumnDefs:Cb,_fnHungarianMap:G,_fnCamelToHungarian:O,_fnLanguageCompat:ma,_fnBrowserDetect:Ab,_fnAddData:ea,_fnAddTr:Ga,_fnNodeToDataIndex:function(a,b){return b._DT_RowIndex!==q?b._DT_RowIndex:null},_fnNodeToColumnIndex:function(a,b,c){return k.inArray(c,a.aoData[b].anCells)},_fnGetCellData:S,_fnSetCellData:Db,_fnSplitObjNotation:ab,_fnGetObjectDataFn:ia,_fnSetObjectDataFn:da,_fnGetDataMaster:bb,
_fnClearTable:Ha,_fnDeleteIndex:Ia,_fnInvalidate:va,_fnGetRowElements:$a,_fnCreateTr:Za,_fnBuildHead:Eb,_fnDrawHead:xa,_fnDraw:fa,_fnReDraw:ja,_fnAddOptionsHtml:Hb,_fnDetectHeader:wa,_fnGetUniqueThs:Ka,_fnFeatureHtmlFilter:Jb,_fnFilterComplete:ya,_fnFilterCustom:Sb,_fnFilterColumn:Rb,_fnFilter:Qb,_fnFilterCreateSearch:gb,_fnEscapeRegex:hb,_fnFilterData:Tb,_fnFeatureHtmlInfo:Mb,_fnUpdateInfo:Wb,_fnInfoMacros:Xb,_fnInitialise:za,_fnInitComplete:Na,_fnLengthChange:ib,_fnFeatureHtmlLength:Ib,_fnFeatureHtmlPaginate:Nb,
_fnPageChange:kb,_fnFeatureHtmlProcessing:Kb,_fnProcessingDisplay:U,_fnFeatureHtmlTable:Lb,_fnScrollDraw:Ea,_fnApplyToChildren:Z,_fnCalculateColumnWidths:Xa,_fnThrottle:fb,_fnConvertToWidth:Zb,_fnGetWidestNode:$b,_fnGetMaxLenString:ac,_fnStringToCss:K,_fnSortFlatten:pa,_fnSort:Gb,_fnSortAria:cc,_fnSortListener:nb,_fnSortAttachListener:db,_fnSortingClasses:Pa,_fnSortData:bc,_fnSaveState:Qa,_fnLoadState:dc,_fnSettingsFromNode:Ra,_fnLog:aa,_fnMap:V,_fnBindAction:ob,_fnCallbackReg:Q,_fnCallbackFire:H,
_fnLengthOverflow:jb,_fnRenderer:eb,_fnDataSource:P,_fnRowAttributes:cb,_fnExtend:pb,_fnCalculateEnd:function(){}});k.fn.dataTable=u;u.$=k;k.fn.dataTableSettings=u.settings;k.fn.dataTableExt=u.ext;k.fn.DataTable=function(a){return k(this).dataTable(a).api()};k.each(u,function(a,b){k.fn.DataTable[a]=b});return k.fn.dataTable});


/*!
 DataTables Bootstrap 4 integration
 ©2011-2017 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(a,b,c){a instanceof String&&(a=String(a));for(var e=a.length,d=0;d<e;d++){var f=a[d];if(b.call(c,f,d,a))return{i:d,v:f}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(a,b,c){if(a==Array.prototype||a==Object.prototype)return a;a[b]=c.value;return a};$jscomp.getGlobal=function(a){a=["object"==typeof globalThis&&globalThis,a,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var b=0;b<a.length;++b){var c=a[b];if(c&&c.Math==Math)return c}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(a,b){var c=$jscomp.propertyToPolyfillSymbol[b];if(null==c)return a[b];c=a[c];return void 0!==c?c:a[b]};
$jscomp.polyfill=function(a,b,c,e){b&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(a,b,c,e):$jscomp.polyfillUnisolated(a,b,c,e))};$jscomp.polyfillUnisolated=function(a,b,c,e){c=$jscomp.global;a=a.split(".");for(e=0;e<a.length-1;e++){var d=a[e];if(!(d in c))return;c=c[d]}a=a[a.length-1];e=c[a];b=b(e);b!=e&&null!=b&&$jscomp.defineProperty(c,a,{configurable:!0,writable:!0,value:b})};
$jscomp.polyfillIsolated=function(a,b,c,e){var d=a.split(".");a=1===d.length;e=d[0];e=!a&&e in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var f=0;f<d.length-1;f++){var l=d[f];if(!(l in e))return;e=e[l]}d=d[d.length-1];c=$jscomp.IS_SYMBOL_NATIVE&&"es6"===c?e[d]:null;b=b(c);null!=b&&(a?$jscomp.defineProperty($jscomp.polyfills,d,{configurable:!0,writable:!0,value:b}):b!==c&&($jscomp.propertyToPolyfillSymbol[d]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(d):$jscomp.POLYFILL_PREFIX+d,d=
$jscomp.propertyToPolyfillSymbol[d],$jscomp.defineProperty(e,d,{configurable:!0,writable:!0,value:b})))};$jscomp.polyfill("Array.prototype.find",function(a){return a?a:function(b,c){return $jscomp.findInternal(this,b,c).v}},"es6","es3");
(function(a){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(b){return a(b,window,document)}):"object"===typeof exports?module.exports=function(b,c){b||(b=window);c&&c.fn.dataTable||(c=require("datatables.net")(b,c).$);return a(c,b,b.document)}:a(jQuery,window,document)})(function(a,b,c,e){var d=a.fn.dataTable;a.extend(!0,d.defaults,{dom:"<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
renderer:"bootstrap"});a.extend(d.ext.classes,{sWrapper:"dataTables_wrapper dt-bootstrap4",sFilterInput:"form-control form-control-sm",sLengthSelect:"custom-select custom-select-sm form-control form-control-sm",sProcessing:"dataTables_processing card",sPageButton:"paginate_button page-item"});d.ext.renderer.pageButton.bootstrap=function(f,l,A,B,m,t){var u=new d.Api(f),C=f.oClasses,n=f.oLanguage.oPaginate,D=f.oLanguage.oAria.paginate||{},h,k,v=0,y=function(q,w){var x,E=function(p){p.preventDefault();
a(p.currentTarget).hasClass("disabled")||u.page()==p.data.action||u.page(p.data.action).draw("page")};var r=0;for(x=w.length;r<x;r++){var g=w[r];if(Array.isArray(g))y(q,g);else{k=h="";switch(g){case "ellipsis":h="&#x2026;";k="disabled";break;case "first":h=n.sFirst;k=g+(0<m?"":" disabled");break;case "previous":h=n.sPrevious;k=g+(0<m?"":" disabled");break;case "next":h=n.sNext;k=g+(m<t-1?"":" disabled");break;case "last":h=n.sLast;k=g+(m<t-1?"":" disabled");break;default:h=g+1,k=m===g?"active":""}if(h){var F=
a("<li>",{"class":C.sPageButton+" "+k,id:0===A&&"string"===typeof g?f.sTableId+"_"+g:null}).append(a("<a>",{href:"#","aria-controls":f.sTableId,"aria-label":D[g],"data-dt-idx":v,tabindex:f.iTabIndex,"class":"page-link"}).html(h)).appendTo(q);f.oApi._fnBindAction(F,{action:g},E);v++}}}};try{var z=a(l).find(c.activeElement).data("dt-idx")}catch(q){}y(a(l).empty().html('<ul class="pagination"/>').children("ul"),B);z!==e&&a(l).find("[data-dt-idx="+z+"]").trigger("focus")};return d});


/*!
 DateTime picker for DataTables.net v1.0.3

 ©2020 SpryMedia Ltd, all rights reserved.
 License: MIT datatables.net/license/mit
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(d,f,k){d instanceof String&&(d=String(d));for(var n=d.length,g=0;g<n;g++){var q=d[g];if(f.call(k,q,g,d))return{i:g,v:q}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(d,f,k){if(d==Array.prototype||d==Object.prototype)return d;d[f]=k.value;return d};$jscomp.getGlobal=function(d){d=["object"==typeof globalThis&&globalThis,d,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var f=0;f<d.length;++f){var k=d[f];if(k&&k.Math==Math)return k}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(d,f){var k=$jscomp.propertyToPolyfillSymbol[f];if(null==k)return d[f];k=d[k];return void 0!==k?k:d[f]};
$jscomp.polyfill=function(d,f,k,n){f&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(d,f,k,n):$jscomp.polyfillUnisolated(d,f,k,n))};$jscomp.polyfillUnisolated=function(d,f,k,n){k=$jscomp.global;d=d.split(".");for(n=0;n<d.length-1;n++){var g=d[n];if(!(g in k))return;k=k[g]}d=d[d.length-1];n=k[d];f=f(n);f!=n&&null!=f&&$jscomp.defineProperty(k,d,{configurable:!0,writable:!0,value:f})};
$jscomp.polyfillIsolated=function(d,f,k,n){var g=d.split(".");d=1===g.length;n=g[0];n=!d&&n in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var q=0;q<g.length-1;q++){var a=g[q];if(!(a in n))return;n=n[a]}g=g[g.length-1];k=$jscomp.IS_SYMBOL_NATIVE&&"es6"===k?n[g]:null;f=f(k);null!=f&&(d?$jscomp.defineProperty($jscomp.polyfills,g,{configurable:!0,writable:!0,value:f}):f!==k&&($jscomp.propertyToPolyfillSymbol[g]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(g):$jscomp.POLYFILL_PREFIX+g,g=
$jscomp.propertyToPolyfillSymbol[g],$jscomp.defineProperty(n,g,{configurable:!0,writable:!0,value:f})))};$jscomp.polyfill("Array.prototype.find",function(d){return d?d:function(f,k){return $jscomp.findInternal(this,f,k).v}},"es6","es3");
(function(d){"function"===typeof define&&define.amd?define(["jquery"],function(f){return d(f,window,document)}):"object"===typeof exports?module.exports=function(f,k){f||(f=window);return d(k,f,f.document)}:d(jQuery,window,document)})(function(d,f,k,n){var g=f.moment?f.moment:f.dayjs?f.dayjs:f.luxon?f.luxon:null,q=function(a,b){this.c=d.extend(!0,{},q.defaults,b);b=this.c.classPrefix;var c=this.c.i18n;if(!g&&"YYYY-MM-DD"!==this.c.format)throw"DateTime: Without momentjs, dayjs or luxon only the format 'YYYY-MM-DD' can be used";
"string"===typeof this.c.minDate&&(this.c.minDate=new Date(this.c.minDate));"string"===typeof this.c.maxDate&&(this.c.maxDate=new Date(this.c.maxDate));c=d('<div class="'+b+'"><div class="'+b+'-date"><div class="'+b+'-title"><div class="'+b+'-iconLeft"><button title="'+c.previous+'">'+c.previous+'</button></div><div class="'+b+'-iconRight"><button title="'+c.next+'">'+c.next+'</button></div><div class="'+b+'-label"><span></span><select class="'+b+'-month"></select></div><div class="'+b+'-label"><span></span><select class="'+
b+'-year"></select></div></div><div class="'+b+'-calendar"></div></div><div class="'+b+'-time"><div class="'+b+'-hours"></div><div class="'+b+'-minutes"></div><div class="'+b+'-seconds"></div></div><div class="'+b+'-error"></div></div>');this.dom={container:c,date:c.find("."+b+"-date"),title:c.find("."+b+"-title"),calendar:c.find("."+b+"-calendar"),time:c.find("."+b+"-time"),error:c.find("."+b+"-error"),input:d(a)};this.s={d:null,display:null,minutesRange:null,secondsRange:null,namespace:"dateime-"+
q._instance++,parts:{date:null!==this.c.format.match(/[YMD]|L(?!T)|l/),time:null!==this.c.format.match(/[Hhm]|LT|LTS/),seconds:-1!==this.c.format.indexOf("s"),hours12:null!==this.c.format.match(/[haA]/)}};this.dom.container.append(this.dom.date).append(this.dom.time).append(this.dom.error);this.dom.date.append(this.dom.title).append(this.dom.calendar);this._constructor()};d.extend(q.prototype,{destroy:function(){this._hide(!0);this.dom.container.off().empty();this.dom.input.removeAttr("autocomplete").off(".datetime")},
errorMsg:function(a){var b=this.dom.error;a?b.html(a):b.empty();return this},hide:function(){this._hide();return this},max:function(a){this.c.maxDate="string"===typeof a?new Date(a):a;this._optionsTitle();this._setCalander();return this},min:function(a){this.c.minDate="string"===typeof a?new Date(a):a;this._optionsTitle();this._setCalander();return this},owns:function(a){return 0<d(a).parents().filter(this.dom.container).length},val:function(a,b){if(a===n)return this.s.d;if(a instanceof Date)this.s.d=
this._dateToUtc(a);else if(null===a||""===a)this.s.d=null;else if("--now"===a)this.s.d=new Date;else if("string"===typeof a)if(g&&g==f.luxon){var c=g.DateTime.fromFormat(a,this.c.format);this.s.d=c.isValid?c.toJSDate():null}else g?(c=g.utc(a,this.c.format,this.c.locale,this.c.strict),this.s.d=c.isValid()?c.toDate():null):(c=a.match(/(\d{4})\-(\d{2})\-(\d{2})/),this.s.d=c?new Date(Date.UTC(c[1],c[2]-1,c[3])):null);if(b||b===n)this.s.d?this._writeOutput():this.dom.input.val(a);this.s.d||(this.s.d=this._dateToUtc(new Date));
this.s.display=new Date(this.s.d.toString());this.s.display.setUTCDate(1);this._setTitle();this._setCalander();this._setTime();return this},_constructor:function(){var a=this,b=this.c.classPrefix,c=this.dom.input.val(),l=function(){var e=a.dom.input.val();e!==c&&(a.c.onChange.call(a,e,a.s.d,a.dom.input),c=e)};this.s.parts.date||this.dom.date.css("display","none");this.s.parts.time||this.dom.time.css("display","none");this.s.parts.seconds||(this.dom.time.children("div."+b+"-seconds").remove(),this.dom.time.children("span").eq(1).remove());
this._optionsTitle();d(k).on("i18n.dt",function(e,h){h.oLanguage.datetime&&(d.extend(!0,a.c.i18n,h.oLanguage.datetime),this._optionsTitle())});"hidden"===this.dom.input.attr("type")&&(this.dom.container.addClass("inline"),this.c.attachTo="input",this.val(this.dom.input.val(),!1),this._show());c&&this.val(c,!1);this.dom.input.attr("autocomplete","off").on("focus.datetime click.datetime",function(){a.dom.container.is(":visible")||a.dom.input.is(":disabled")||(a.val(a.dom.input.val(),!1),a._show())}).on("keyup.datetime",
function(){a.dom.container.is(":visible")&&a.val(a.dom.input.val(),!1)});this.dom.container.on("change","select",function(){var e=d(this),h=e.val();e.hasClass(b+"-month")?(a._correctMonth(a.s.display,h),a._setTitle(),a._setCalander()):e.hasClass(b+"-year")?(a.s.display.setUTCFullYear(h),a._setTitle(),a._setCalander()):e.hasClass(b+"-hours")||e.hasClass(b+"-ampm")?(a.s.parts.hours12?(e=1*d(a.dom.container).find("."+b+"-hours").val(),h="pm"===d(a.dom.container).find("."+b+"-ampm").val(),a.s.d.setUTCHours(12!==
e||h?h&&12!==e?e+12:e:0)):a.s.d.setUTCHours(h),a._setTime(),a._writeOutput(!0),l()):e.hasClass(b+"-minutes")?(a.s.d.setUTCMinutes(h),a._setTime(),a._writeOutput(!0),l()):e.hasClass(b+"-seconds")&&(a.s.d.setSeconds(h),a._setTime(),a._writeOutput(!0),l());a.dom.input.focus();a._position()}).on("click",function(e){var h=a.s.d,r=e.target.nodeName.toLowerCase(),m="span"===r?e.target.parentNode:e.target;r=m.nodeName.toLowerCase();if("select"!==r)if(e.stopPropagation(),"button"===r)if(m=d(m),e=m.parent(),
e.hasClass("disabled")&&!e.hasClass("range"))m.blur();else if(e.hasClass(b+"-iconLeft"))a.s.display.setUTCMonth(a.s.display.getUTCMonth()-1),a._setTitle(),a._setCalander(),a.dom.input.focus();else if(e.hasClass(b+"-iconRight"))a._correctMonth(a.s.display,a.s.display.getUTCMonth()+1),a._setTitle(),a._setCalander(),a.dom.input.focus();else{if(m.parents("."+b+"-time").length){r=m.data("value");m=m.data("unit");if("minutes"===m){if(e.hasClass("disabled")&&e.hasClass("range")){a.s.minutesRange=r;a._setTime();
return}a.s.minutesRange=null}if("seconds"===m){if(e.hasClass("disabled")&&e.hasClass("range")){a.s.secondsRange=r;a._setTime();return}a.s.secondsRange=null}if("am"===r)if(12<=h.getUTCHours())r=h.getUTCHours()-12;else return;else if("pm"===r)if(12>h.getUTCHours())r=h.getUTCHours()+12;else return;h["hours"===m?"setUTCHours":"minutes"===m?"setUTCMinutes":"setSeconds"](r);a._setTime();a._writeOutput(!0)}else h||(h=a._dateToUtc(new Date)),h.setUTCDate(1),h.setUTCFullYear(m.data("year")),h.setUTCMonth(m.data("month")),
h.setUTCDate(m.data("day")),a._writeOutput(!0),a.s.parts.time?a._setCalander():setTimeout(function(){a._hide()},10);l()}else a.dom.input.focus()})},_compareDates:function(a,b){return g&&g==f.luxon?g.DateTime.fromJSDate(a).toISODate()===g.DateTime.fromJSDate(b).toISODate():this._dateToUtcString(a)===this._dateToUtcString(b)},_correctMonth:function(a,b){var c=this._daysInMonth(a.getUTCFullYear(),b),l=a.getUTCDate()>c;a.setUTCMonth(b);l&&(a.setUTCDate(c),a.setUTCMonth(b))},_daysInMonth:function(a,b){return[31,
0!==a%4||0===a%100&&0!==a%400?28:29,31,30,31,30,31,31,30,31,30,31][b]},_dateToUtc:function(a){return new Date(Date.UTC(a.getFullYear(),a.getMonth(),a.getDate(),a.getHours(),a.getMinutes(),a.getSeconds()))},_dateToUtcString:function(a){return g&&g==f.luxon?g.DateTime.fromJSDate(a).toISODate():a.getUTCFullYear()+"-"+this._pad(a.getUTCMonth()+1)+"-"+this._pad(a.getUTCDate())},_hide:function(a){if(a||"hidden"!==this.dom.input.attr("type"))a=this.s.namespace,this.dom.container.detach(),d(f).off("."+a),
d(k).off("keydown."+a),d("div.dataTables_scrollBody").off("scroll."+a),d("div.DTE_Body_Content").off("scroll."+a),d("body").off("click."+a)},_hours24To12:function(a){return 0===a?12:12<a?a-12:a},_htmlDay:function(a){if(a.empty)return'<td class="empty"></td>';var b=["selectable"],c=this.c.classPrefix;a.disabled&&b.push("disabled");a.today&&b.push("now");a.selected&&b.push("selected");return'<td data-day="'+a.day+'" class="'+b.join(" ")+'"><button class="'+c+"-button "+c+'-day"  data-year="'+
a.year+'" data-month="'+a.month+'" data-day="'+a.day+'"><span>'+a.day+"</span></button></td>"},_htmlMonth:function(a,b){var c=this._dateToUtc(new Date),l=this._daysInMonth(a,b),e=(new Date(Date.UTC(a,b,1))).getUTCDay(),h=[],r=[];0<this.c.firstDay&&(e-=this.c.firstDay,0>e&&(e+=7));for(var m=l+e,u=m;7<u;)u-=7;m+=7-u;var w=this.c.minDate;u=this.c.maxDate;w&&(w.setUTCHours(0),w.setUTCMinutes(0),w.setSeconds(0));u&&(u.setUTCHours(23),u.setUTCMinutes(59),u.setSeconds(59));for(var p=0,t=0;p<m;p++){var x=
new Date(Date.UTC(a,b,1+(p-e))),A=this.s.d?this._compareDates(x,this.s.d):!1,v=this._compareDates(x,c),B=p<e||p>=l+e,z=w&&x<w||u&&x>u,y=this.c.disableDays;Array.isArray(y)&&-1!==d.inArray(x.getUTCDay(),y)?z=!0:"function"===typeof y&&!0===y(x)&&(z=!0);r.push(this._htmlDay({day:1+(p-e),month:b,year:a,selected:A,today:v,disabled:z,empty:B}));7===++t&&(this.c.showWeekNumber&&r.unshift(this._htmlWeekOfYear(p-e,b,a)),h.push("<tr>"+r.join("")+"</tr>"),r=[],t=0)}c=this.c.classPrefix;l=c+"-table";this.c.showWeekNumber&&
(l+=" weekNumber");w&&(w=w>=new Date(Date.UTC(a,b,1,0,0,0)),this.dom.title.find("div."+c+"-iconLeft").css("display",w?"none":"block"));u&&(a=u<new Date(Date.UTC(a,b+1,1,0,0,0)),this.dom.title.find("div."+c+"-iconRight").css("display",a?"none":"block"));return'<table class="'+l+'"><thead>'+this._htmlMonthHead()+"</thead><tbody>"+h.join("")+"</tbody></table>"},_htmlMonthHead:function(){var a=[],b=this.c.firstDay,c=this.c.i18n,l=function(h){for(h+=b;7<=h;)h-=7;return c.weekdays[h]};this.c.showWeekNumber&&
a.push("<th></th>");for(var e=0;7>e;e++)a.push("<th>"+l(e)+"</th>");return a.join("")},_htmlWeekOfYear:function(a,b,c){a=new Date(c,b,a,0,0,0,0);a.setDate(a.getDate()+4-(a.getDay()||7));return'<td class="'+this.c.classPrefix+'-week">'+Math.ceil(((a-new Date(c,0,1))/864E5+1)/7)+"</td>"},_options:function(a,b,c){c||(c=b);a=this.dom.container.find("select."+this.c.classPrefix+"-"+a);a.empty();for(var l=0,e=b.length;l<e;l++)a.append('<option value="'+b[l]+'">'+c[l]+"</option>")},_optionSet:function(a,
b){var c=this.dom.container.find("select."+this.c.classPrefix+"-"+a);a=c.parent().children("span");c.val(b);b=c.find("option:selected");a.html(0!==b.length?b.text():this.c.i18n.unknown)},_optionsTime:function(a,b,c,l,e){var h=this.c.classPrefix,r=this.dom.container.find("div."+h+"-"+a),m=12===b?function(v){return v}:this._pad;h=this.c.classPrefix;var u=h+"-table",w=this.c.i18n;if(r.length){var p="";var t=10;var x=function(v,B,z){12===b&&"number"===typeof v&&(12<=c&&(v+=12),12==v?v=0:24==v&&(v=12));
var y=c===v||"am"===v&&12>c||"pm"===v&&12<=c?"selected":"";l&&-1===d.inArray(v,l)&&(y+=" disabled");z&&(y+=" "+z);return'<td class="selectable '+y+'"><button class="'+h+"-button "+h+'-day"  data-unit="'+a+'" data-value="'+v+'"><span>'+B+"</span></button></td>"};if(12===b){p+="<tr>";for(e=1;6>=e;e++)p+=x(e,m(e));p+=x("am",w.amPm[0]);p+="</tr><tr>";for(e=7;12>=e;e++)p+=x(e,m(e));p+=x("pm",w.amPm[1]);p+="</tr>";t=7}else{if(24===b){var A=0;for(t=0;4>t;t++){p+="<tr>";for(e=0;6>e;e++)p+=x(A,
m(A)),A++;p+="</tr>"}}else{p+="<tr>";for(t=0;60>t;t+=10)p+=x(t,m(t),"range");e=null!==e?e:10*Math.floor(c/10);p=p+'</tr></tbody></thead><table class="'+(u+" "+u+'-nospace"><tbody><tr>');for(t=e+1;t<e+10;t++)p+=x(t,m(t));p+="</tr>"}t=6}r.empty().append('<table class="'+u+'"><thead><tr><th colspan="'+t+'">'+w[a]+"</th></tr></thead><tbody>"+p+"</tbody></table>")}},_optionsTitle:function(){var a=this.c.i18n,b=this.c.minDate,c=this.c.maxDate;b=b?b.getFullYear():null;c=c?c.getFullYear():null;b=null!==b?
b:(new Date).getFullYear()-this.c.yearRange;c=null!==c?c:(new Date).getFullYear()+this.c.yearRange;this._options("month",this._range(0,11),a.months);this._options("year",this._range(b,c))},_pad:function(a){return 10>a?"0"+a:a},_position:function(){var a="input"===this.c.attachTo?this.dom.input.position():this.dom.input.offset(),b=this.dom.container,c=this.dom.input.outerHeight();if(b.hasClass("inline"))b.insertAfter(this.dom.input);else{this.s.parts.date&&this.s.parts.time&&550<d(f).width()?b.addClass("horizontal"):
b.removeClass("horizontal");"input"===this.c.attachTo?b.css({top:a.top+c,left:a.left}).insertAfter(this.dom.input):b.css({top:a.top+c,left:a.left}).appendTo("body");var l=b.outerHeight(),e=b.outerWidth(),h=d(f).scrollTop();a.top+c+l-h>d(f).height()&&(c=a.top-l,b.css("top",0>c?0:c));e+a.left>d(f).width()&&(a=d(f).width()-e,"input"===this.c.attachTo&&(a-=d(b).offsetParent().offset().left),b.css("left",0>a?0:a))}},_range:function(a,b,c){var l=[];for(c||(c=1);a<=b;a+=c)l.push(a);return l},_setCalander:function(){this.s.display&&
this.dom.calendar.empty().append(this._htmlMonth(this.s.display.getUTCFullYear(),this.s.display.getUTCMonth()))},_setTitle:function(){this._optionSet("month",this.s.display.getUTCMonth());this._optionSet("year",this.s.display.getUTCFullYear())},_setTime:function(){var a=this,b=this.s.d,c=null;g&&g==f.luxon&&(c=g.DateTime.fromJSDate(b));var l=null!=c?c.hour:b?b.getUTCHours():0,e=function(h){return a.c[h+"Available"]?a.c[h+"Available"]:a._range(0,59,a.c[h+"Increment"])};this._optionsTime("hours",this.s.parts.hours12?
12:24,l,this.c.hoursAvailable);this._optionsTime("minutes",60,null!=c?c.minute:b?b.getUTCMinutes():0,e("minutes"),this.s.minutesRange);this._optionsTime("seconds",60,null!=c?c.second:b?b.getSeconds():0,e("seconds"),this.s.secondsRange)},_show:function(){var a=this,b=this.s.namespace;this._position();d(f).on("scroll."+b+" resize."+b,function(){a._position()});d("div.DTE_Body_Content").on("scroll."+b,function(){a._position()});d("div.dataTables_scrollBody").on("scroll."+b,function(){a._position()});
var c=this.dom.input[0].offsetParent;if(c!==k.body)d(c).on("scroll."+b,function(){a._position()});d(k).on("keydown."+b,function(l){9!==l.keyCode&&27!==l.keyCode&&13!==l.keyCode||a._hide()});setTimeout(function(){d("body").on("click."+b,function(l){d(l.target).parents().filter(a.dom.container).length||l.target===a.dom.input[0]||a._hide()})},10)},_writeOutput:function(a){var b=this.s.d,c=g&&g==f.luxon?g.DateTime.fromJSDate(this.s.d).toFormat(this.c.format):g?g.utc(b,n,this.c.locale,this.c.strict).format(this.c.format):
b.getUTCFullYear()+"-"+this._pad(b.getUTCMonth()+1)+"-"+this._pad(b.getUTCDate());this.dom.input.val(c).trigger("change",{write:b});"hidden"===this.dom.input.attr("type")&&this.val(c,!1);a&&this.dom.input.focus()}});q.use=function(a){g=a};q._instance=0;q.defaults={attachTo:"body",classPrefix:"dt-datetime",disableDays:null,firstDay:1,format:"YYYY-MM-DD",hoursAvailable:null,i18n:{previous:"Previous",next:"Next",months:"January February March April May June July August September October November December".split(" "),
weekdays:"Sun Mon Tue Wed Thu Fri Sat".split(" "),amPm:["am","pm"],hours:"Hour",minutes:"Minute",seconds:"Second",unknown:"-"},maxDate:null,minDate:null,minutesAvailable:null,minutesIncrement:1,strict:!0,locale:"en",onChange:function(){},secondsAvailable:null,secondsIncrement:1,showWeekNumber:!1,yearRange:25};q.version="1.0.3";f.DateTime||(f.DateTime=q);d.fn.dtDateTime=function(a){return this.each(function(){new q(this,a)})};d.fn.dataTable&&(d.fn.dataTable.DateTime=q,d.fn.DataTable.DateTime=q,d.fn.dataTable.Editor&&
(d.fn.dataTable.Editor.DateTime=q));return q});


/*!
   Copyright 2010-2020 SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 FixedColumns 3.3.2
 ©2010-2020 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(c,h,k){c instanceof String&&(c=String(c));for(var t=c.length,n=0;n<t;n++){var z=c[n];if(h.call(k,z,n,c))return{i:n,v:z}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(c,h,k){if(c==Array.prototype||c==Object.prototype)return c;c[h]=k.value;return c};$jscomp.getGlobal=function(c){c=["object"==typeof globalThis&&globalThis,c,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var h=0;h<c.length;++h){var k=c[h];if(k&&k.Math==Math)return k}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(c,h){var k=$jscomp.propertyToPolyfillSymbol[h];if(null==k)return c[h];k=c[k];return void 0!==k?k:c[h]};
$jscomp.polyfill=function(c,h,k,t){h&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(c,h,k,t):$jscomp.polyfillUnisolated(c,h,k,t))};$jscomp.polyfillUnisolated=function(c,h,k,t){k=$jscomp.global;c=c.split(".");for(t=0;t<c.length-1;t++){var n=c[t];if(!(n in k))return;k=k[n]}c=c[c.length-1];t=k[c];h=h(t);h!=t&&null!=h&&$jscomp.defineProperty(k,c,{configurable:!0,writable:!0,value:h})};
$jscomp.polyfillIsolated=function(c,h,k,t){var n=c.split(".");c=1===n.length;t=n[0];t=!c&&t in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var z=0;z<n.length-1;z++){var u=n[z];if(!(u in t))return;t=t[u]}n=n[n.length-1];k=$jscomp.IS_SYMBOL_NATIVE&&"es6"===k?t[n]:null;h=h(k);null!=h&&(c?$jscomp.defineProperty($jscomp.polyfills,n,{configurable:!0,writable:!0,value:h}):h!==k&&($jscomp.propertyToPolyfillSymbol[n]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(n):$jscomp.POLYFILL_PREFIX+n,n=
$jscomp.propertyToPolyfillSymbol[n],$jscomp.defineProperty(t,n,{configurable:!0,writable:!0,value:h})))};$jscomp.polyfill("Array.prototype.find",function(c){return c?c:function(h,k){return $jscomp.findInternal(this,h,k).v}},"es6","es3");
(function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(h){return c(h,window,document)}):"object"===typeof exports?module.exports=function(h,k){h||(h=window);k&&k.fn.dataTable||(k=require("datatables.net")(h,k).$);return c(k,h,h.document)}:c(jQuery,window,document)})(function(c,h,k,t){var n=c.fn.dataTable,z,u=function(a,b){var d=this;if(this instanceof u){if(b===t||!0===b)b={};var f=c.fn.dataTable.camelToHungarian;f&&(f(u.defaults,u.defaults,!0),f(u.defaults,
b));a=(new c.fn.dataTable.Api(a)).settings()[0];this.s={dt:a,iTableColumns:a.aoColumns.length,aiOuterWidths:[],aiInnerWidths:[],rtl:"rtl"===c(a.nTable).css("direction")};this.dom={scroller:null,header:null,body:null,footer:null,grid:{wrapper:null,dt:null,left:{wrapper:null,head:null,body:null,foot:null},right:{wrapper:null,head:null,body:null,foot:null}},clone:{left:{header:null,body:null,footer:null},right:{header:null,body:null,footer:null}}};if(a._oFixedColumns)throw"FixedColumns already initialised on this table";
a._oFixedColumns=this;a._bInitComplete?this._fnConstruct(b):a.oApi._fnCallbackReg(a,"aoInitComplete",function(){d._fnConstruct(b)},"FixedColumns")}else alert("FixedColumns warning: FixedColumns must be initialised with the 'new' keyword.")};c.extend(u.prototype,{fnUpdate:function(){this._fnDraw(!0)},fnRedrawLayout:function(){this._fnColCalc();this._fnGridLayout();this.fnUpdate()},fnRecalculateHeight:function(a){delete a._DTTC_iHeight;a.style.height="auto"},fnSetRowHeight:function(a,b){a.style.height=
b+"px"},fnGetPosition:function(a){var b=this.s.dt.oInstance;if(c(a).parents(".DTFC_Cloned").length){if("tr"===a.nodeName.toLowerCase())return a=c(a).index(),b.fnGetPosition(c("tr",this.s.dt.nTBody)[a]);var d=c(a).index();a=c(a.parentNode).index();return[b.fnGetPosition(c("tr",this.s.dt.nTBody)[a]),d,b.oApi._fnVisibleToColumnIndex(this.s.dt,d)]}return b.fnGetPosition(a)},fnToFixedNode:function(a,b){var d;b<this.s.iLeftColumns?d=c(this.dom.clone.left.body).find("[data-dt-row="+a+"][data-dt-column="+
b+"]"):b>=this.s.iRightColumns&&(d=c(this.dom.clone.right.body).find("[data-dt-row="+a+"][data-dt-column="+b+"]"));return d&&d.length?d[0]:(new c.fn.dataTable.Api(this.s.dt)).cell(a,b).node()},_fnConstruct:function(a){var b=this;if("function"!=typeof this.s.dt.oInstance.fnVersionCheck||!0!==this.s.dt.oInstance.fnVersionCheck("1.8.0"))alert("FixedColumns "+u.VERSION+" required DataTables 1.8.0 or later. Please upgrade your DataTables installation");else if(""===this.s.dt.oScroll.sX)this.s.dt.oInstance.oApi._fnLog(this.s.dt,
1,"FixedColumns is not needed (no x-scrolling in DataTables enabled), so no action will be taken. Use 'FixedHeader' for column fixing when scrolling is not enabled");else{this.s=c.extend(!0,this.s,u.defaults,a);a=this.s.dt.oClasses;this.dom.grid.dt=c(this.s.dt.nTable).parents("div."+a.sScrollWrapper)[0];this.dom.scroller=c("div."+a.sScrollBody,this.dom.grid.dt)[0];this._fnColCalc();this._fnGridSetup();var d,f=!1;c(this.s.dt.nTableWrapper).on("mousedown.DTFC",function(g){0===g.button&&(f=!0,c(k).one("mouseup",
function(){f=!1}))});c(this.dom.scroller).on("mouseover.DTFC touchstart.DTFC",function(){f||(d="main")}).on("scroll.DTFC",function(g){!d&&g.originalEvent&&(d="main");if("main"===d||"key"===d)0<b.s.iLeftColumns&&(b.dom.grid.left.liner.scrollTop=b.dom.scroller.scrollTop),0<b.s.iRightColumns&&(b.dom.grid.right.liner.scrollTop=b.dom.scroller.scrollTop)});var e="onwheel"in k.createElement("div")?"wheel.DTFC":"mousewheel.DTFC";0<b.s.iLeftColumns&&(c(b.dom.grid.left.liner).on("mouseover.DTFC touchstart.DTFC",
function(){f||"key"===d||(d="left")}).on("scroll.DTFC",function(g){!d&&g.originalEvent&&(d="left");"left"===d&&(b.dom.scroller.scrollTop=b.dom.grid.left.liner.scrollTop,0<b.s.iRightColumns&&(b.dom.grid.right.liner.scrollTop=b.dom.grid.left.liner.scrollTop))}).on(e,function(g){d="left";b.dom.scroller.scrollLeft-="wheel"===g.type?-g.originalEvent.deltaX:g.originalEvent.wheelDeltaX}),c(b.dom.grid.left.head).on("mouseover.DTFC touchstart.DTFC",function(){d="main"}));0<b.s.iRightColumns&&(c(b.dom.grid.right.liner).on("mouseover.DTFC touchstart.DTFC",
function(){f||"key"===d||(d="right")}).on("scroll.DTFC",function(g){!d&&g.originalEvent&&(d="right");"right"===d&&(b.dom.scroller.scrollTop=b.dom.grid.right.liner.scrollTop,0<b.s.iLeftColumns&&(b.dom.grid.left.liner.scrollTop=b.dom.grid.right.liner.scrollTop))}).on(e,function(g){d="right";b.dom.scroller.scrollLeft-="wheel"===g.type?-g.originalEvent.deltaX:g.originalEvent.wheelDeltaX}),c(b.dom.grid.right.head).on("mouseover.DTFC touchstart.DTFC",function(){d="main"}));c(h).on("resize.DTFC",function(){b._fnGridLayout.call(b)});
var l=!0,m=c(this.s.dt.nTable);m.on("draw.dt.DTFC",function(){b._fnColCalc();b._fnDraw.call(b,l);l=!1}).on("key-focus.dt.DTFC",function(){d="key"}).on("column-sizing.dt.DTFC",function(){b._fnColCalc();b._fnGridLayout(b)}).on("column-visibility.dt.DTFC",function(g,q,p,r,w){if(w===t||w)b._fnColCalc(),b._fnGridLayout(b),b._fnDraw(!0)}).on("select.dt.DTFC deselect.dt.DTFC",function(g,q,p,r){"dt"===g.namespace&&b._fnDraw(!1)}).on("position.dts.dt.DTFC",function(g,q){b.dom.grid.left.body&&c(b.dom.grid.left.body).find("table").eq(0).css("top",
q);b.dom.grid.right.body&&c(b.dom.grid.right.body).find("table").eq(0).css("top",q)}).on("destroy.dt.DTFC",function(){m.off(".DTFC");c(b.dom.scroller).off(".DTFC");c(h).off(".DTFC");c(b.s.dt.nTableWrapper).off(".DTFC");c(b.dom.grid.left.liner).off(".DTFC "+e);c(b.dom.grid.left.wrapper).remove();c(b.dom.grid.right.liner).off(".DTFC "+e);c(b.dom.grid.right.wrapper).remove()});this._fnGridLayout();this.s.dt.oInstance.fnDraw(!1)}},_fnColCalc:function(){var a=this,b=0,d=0;this.s.aiInnerWidths=[];this.s.aiOuterWidths=
[];c.each(this.s.dt.aoColumns,function(f,e){e=c(e.nTh);if(e.filter(":visible").length){var l=e.outerWidth();if(0===a.s.aiOuterWidths.length){var m=c(a.s.dt.nTable).css("border-left-width");l+="string"===typeof m&&-1===m.indexOf("px")?1:parseInt(m,10)}a.s.aiOuterWidths.length===a.s.dt.aoColumns.length-1&&(m=c(a.s.dt.nTable).css("border-right-width"),l+="string"===typeof m&&-1===m.indexOf("px")?1:parseInt(m,10));a.s.aiOuterWidths.push(l);a.s.aiInnerWidths.push(e.width());f<a.s.iLeftColumns&&(b+=l);
a.s.iTableColumns-a.s.iRightColumns<=f&&(d+=l)}else a.s.aiInnerWidths.push(0),a.s.aiOuterWidths.push(0)});this.s.iLeftWidth=b;this.s.iRightWidth=d},_fnGridSetup:function(){var a=this._fnDTOverflow();this.dom.body=this.s.dt.nTable;this.dom.header=this.s.dt.nTHead.parentNode;this.dom.header.parentNode.parentNode.style.position="relative";var b=c('<div class="DTFC_ScrollWrapper" style="position:relative; clear:both;"><div class="DTFC_LeftWrapper" style="position:absolute; top:0; left:0;" aria-hidden="true"><div class="DTFC_LeftHeadWrapper" style="position:relative; top:0; left:0; overflow:hidden;"></div><div class="DTFC_LeftBodyWrapper" style="position:relative; top:0; left:0; height:0; overflow:hidden;"><div class="DTFC_LeftBodyLiner" style="position:relative; top:0; left:0; overflow-y:scroll;"></div></div><div class="DTFC_LeftFootWrapper" style="position:relative; top:0; left:0; overflow:hidden;"></div></div><div class="DTFC_RightWrapper" style="position:absolute; top:0; right:0;" aria-hidden="true"><div class="DTFC_RightHeadWrapper" style="position:relative; top:0; left:0;"><div class="DTFC_RightHeadBlocker DTFC_Blocker" style="position:absolute; top:0; bottom:0;"></div></div><div class="DTFC_RightBodyWrapper" style="position:relative; top:0; left:0; height:0; overflow:hidden;"><div class="DTFC_RightBodyLiner" style="position:relative; top:0; left:0; overflow-y:scroll;"></div></div><div class="DTFC_RightFootWrapper" style="position:relative; top:0; left:0;"><div class="DTFC_RightFootBlocker DTFC_Blocker" style="position:absolute; top:0; bottom:0;"></div></div></div></div>')[0],
d=b.childNodes[0],f=b.childNodes[1];this.dom.grid.dt.parentNode.insertBefore(b,this.dom.grid.dt);b.appendChild(this.dom.grid.dt);this.dom.grid.wrapper=b;0<this.s.iLeftColumns&&(this.dom.grid.left.wrapper=d,this.dom.grid.left.head=d.childNodes[0],this.dom.grid.left.body=d.childNodes[1],this.dom.grid.left.liner=c("div.DTFC_LeftBodyLiner",b)[0],b.appendChild(d));if(0<this.s.iRightColumns){this.dom.grid.right.wrapper=f;this.dom.grid.right.head=f.childNodes[0];this.dom.grid.right.body=f.childNodes[1];
this.dom.grid.right.liner=c("div.DTFC_RightBodyLiner",b)[0];f.style.right=a.bar+"px";var e=c("div.DTFC_RightHeadBlocker",b)[0];e.style.width=a.bar+"px";e.style.right=-a.bar+"px";this.dom.grid.right.headBlock=e;e=c("div.DTFC_RightFootBlocker",b)[0];e.style.width=a.bar+"px";e.style.right=-a.bar+"px";this.dom.grid.right.footBlock=e;b.appendChild(f)}this.s.dt.nTFoot&&(this.dom.footer=this.s.dt.nTFoot.parentNode,0<this.s.iLeftColumns&&(this.dom.grid.left.foot=d.childNodes[2]),0<this.s.iRightColumns&&(this.dom.grid.right.foot=
f.childNodes[2]));this.s.rtl&&c("div.DTFC_RightHeadBlocker",b).css({left:-a.bar+"px",right:""})},_fnGridLayout:function(){var a=this,b=this.dom.grid;c(b.wrapper).width();var d=this.s.dt.nTable.parentNode.offsetHeight,f=this.s.dt.nTable.parentNode.parentNode.offsetHeight,e=this._fnDTOverflow(),l=this.s.iLeftWidth,m=this.s.iRightWidth,g="rtl"===c(this.dom.body).css("direction"),q=function(p,r){e.bar?a._firefoxScrollError()?34<c(p).height()&&(p.style.width=r+e.bar+"px"):p.style.width=r+e.bar+"px":(p.style.width=
r+20+"px",p.style.paddingRight="20px",p.style.boxSizing="border-box")};e.x&&(d-=e.bar);b.wrapper.style.height=f+"px";0<this.s.iLeftColumns&&(f=b.left.wrapper,f.style.width=l+"px",f.style.height="1px",g?(f.style.left="",f.style.right=0):(f.style.left=0,f.style.right=""),b.left.body.style.height=d+"px",b.left.foot&&(b.left.foot.style.top=(e.x?e.bar:0)+"px"),q(b.left.liner,l),b.left.liner.style.height=d+"px",b.left.liner.style.maxHeight=d+"px");0<this.s.iRightColumns&&(f=b.right.wrapper,f.style.width=
m+"px",f.style.height="1px",this.s.rtl?(f.style.left=e.y?e.bar+"px":0,f.style.right=""):(f.style.left="",f.style.right=e.y?e.bar+"px":0),b.right.body.style.height=d+"px",b.right.foot&&(b.right.foot.style.top=(e.x?e.bar:0)+"px"),q(b.right.liner,m),b.right.liner.style.height=d+"px",b.right.liner.style.maxHeight=d+"px",b.right.headBlock.style.display=e.y?"block":"none",b.right.footBlock.style.display=e.y?"block":"none")},_fnDTOverflow:function(){var a=this.s.dt.nTable,b=a.parentNode,d={x:!1,y:!1,bar:this.s.dt.oScroll.iBarWidth};
a.offsetWidth>b.clientWidth&&(d.x=!0);a.offsetHeight>b.clientHeight&&(d.y=!0);return d},_fnDraw:function(a){this._fnGridLayout();this._fnCloneLeft(a);this._fnCloneRight(a);c(this.dom.scroller).trigger("scroll");null!==this.s.fnDrawCallback&&this.s.fnDrawCallback.call(this,this.dom.clone.left,this.dom.clone.right);c(this).trigger("draw.dtfc",{leftClone:this.dom.clone.left,rightClone:this.dom.clone.right})},_fnCloneRight:function(a){if(!(0>=this.s.iRightColumns)){var b,d=[];for(b=this.s.iTableColumns-
this.s.iRightColumns;b<this.s.iTableColumns;b++)this.s.dt.aoColumns[b].bVisible&&d.push(b);this._fnClone(this.dom.clone.right,this.dom.grid.right,d,a)}},_fnCloneLeft:function(a){if(!(0>=this.s.iLeftColumns)){var b,d=[];for(b=0;b<this.s.iLeftColumns;b++)this.s.dt.aoColumns[b].bVisible&&d.push(b);this._fnClone(this.dom.clone.left,this.dom.grid.left,d,a)}},_fnCopyLayout:function(a,b,d){for(var f=[],e=[],l=[],m=0,g=a.length;m<g;m++){var q=[];q.nTr=c(a[m].nTr).clone(d,!1)[0];for(var p=0,r=this.s.iTableColumns;p<
r;p++)if(-1!==c.inArray(p,b)){var w=c.inArray(a[m][p].cell,l);-1===w?(w=c(a[m][p].cell).clone(d,!1)[0],e.push(w),l.push(a[m][p].cell),q.push({cell:w,unique:a[m][p].unique})):q.push({cell:e[w],unique:a[m][p].unique})}f.push(q)}return f},_fnClone:function(a,b,d,f){var e=this,l,m,g=this.s.dt;if(f){c(a.header).remove();a.header=c(this.dom.header).clone(!0,!1)[0];a.header.className+=" DTFC_Cloned";a.header.style.width="100%";b.head.appendChild(a.header);var q=this._fnCopyLayout(g.aoHeader,d,!0);var p=
c(">thead",a.header);p.empty();var r=0;for(l=q.length;r<l;r++)p[0].appendChild(q[r].nTr);g.oApi._fnDrawHead(g,q,!0)}else{q=this._fnCopyLayout(g.aoHeader,d,!1);var w=[];g.oApi._fnDetectHeader(w,c(">thead",a.header)[0]);r=0;for(l=q.length;r<l;r++){var x=0;for(p=q[r].length;x<p;x++)w[r][x].cell.className=q[r][x].cell.className,c("span.DataTables_sort_icon",w[r][x].cell).each(function(){this.className=c("span.DataTables_sort_icon",q[r][x].cell)[0].className})}}this._fnEqualiseHeights("thead",this.dom.header,
a.header);"auto"==this.s.sHeightMatch&&c(">tbody>tr",e.dom.body).css("height","auto");null!==a.body&&(c(a.body).remove(),a.body=null);a.body=c(this.dom.body).clone(!0)[0];a.body.className+=" DTFC_Cloned";a.body.style.paddingBottom=g.oScroll.iBarWidth+"px";a.body.style.marginBottom=2*g.oScroll.iBarWidth+"px";null!==a.body.getAttribute("id")&&a.body.removeAttribute("id");c(">thead>tr",a.body).empty();c(">tfoot",a.body).remove();var C=c("tbody",a.body)[0];c(C).empty();if(0<g.aiDisplay.length){l=c(">thead>tr",
a.body)[0];for(m=0;m<d.length;m++){var A=d[m];var v=c(g.aoColumns[A].nTh).clone(!0)[0];v.innerHTML="";p=v.style;p.paddingTop="0";p.paddingBottom="0";p.borderTopWidth="0";p.borderBottomWidth="0";p.height=0;p.width=e.s.aiInnerWidths[A]+"px";l.appendChild(v)}c(">tbody>tr",e.dom.body).each(function(y){y=!1===e.s.dt.oFeatures.bServerSide?e.s.dt.aiDisplay[e.s.dt._iDisplayStart+y]:y;var D=e.s.dt.aoData[y].anCells||c(this).children("td, th"),B=this.cloneNode(!1);B.removeAttribute("id");B.setAttribute("data-dt-row",
y);for(m=0;m<d.length;m++)A=d[m],0<D.length&&(v=c(D[A]).clone(!0,!0)[0],v.removeAttribute("id"),v.setAttribute("data-dt-row",y),v.setAttribute("data-dt-column",A),B.appendChild(v));C.appendChild(B)})}else c(">tbody>tr",e.dom.body).each(function(y){v=this.cloneNode(!0);v.className+=" DTFC_NoData";c("td",v).html("");C.appendChild(v)});a.body.style.width="100%";a.body.style.margin="0";a.body.style.padding="0";g.oScroller!==t&&(l=g.oScroller.dom.force,b.forcer?b.forcer.style.height=l.style.height:(b.forcer=
l.cloneNode(!0),b.liner.appendChild(b.forcer)));b.liner.appendChild(a.body);this._fnEqualiseHeights("tbody",e.dom.body,a.body);if(null!==g.nTFoot){if(f){null!==a.footer&&a.footer.parentNode.removeChild(a.footer);a.footer=c(this.dom.footer).clone(!0,!0)[0];a.footer.className+=" DTFC_Cloned";a.footer.style.width="100%";b.foot.appendChild(a.footer);q=this._fnCopyLayout(g.aoFooter,d,!0);b=c(">tfoot",a.footer);b.empty();r=0;for(l=q.length;r<l;r++)b[0].appendChild(q[r].nTr);g.oApi._fnDrawHead(g,q,!0)}else for(q=
this._fnCopyLayout(g.aoFooter,d,!1),b=[],g.oApi._fnDetectHeader(b,c(">tfoot",a.footer)[0]),r=0,l=q.length;r<l;r++)for(x=0,p=q[r].length;x<p;x++)b[r][x].cell.className=q[r][x].cell.className;this._fnEqualiseHeights("tfoot",this.dom.footer,a.footer)}b=g.oApi._fnGetUniqueThs(g,c(">thead",a.header)[0]);c(b).each(function(y){A=d[y];this.style.width=e.s.aiInnerWidths[A]+"px"});null!==e.s.dt.nTFoot&&(b=g.oApi._fnGetUniqueThs(g,c(">tfoot",a.footer)[0]),c(b).each(function(y){A=d[y];this.style.width=e.s.aiInnerWidths[A]+
"px"}))},_fnGetTrNodes:function(a){for(var b=[],d=0,f=a.childNodes.length;d<f;d++)"TR"==a.childNodes[d].nodeName.toUpperCase()&&b.push(a.childNodes[d]);return b},_fnEqualiseHeights:function(a,b,d){if("none"!=this.s.sHeightMatch||"thead"===a||"tfoot"===a){var f=b.getElementsByTagName(a)[0];d=d.getElementsByTagName(a)[0];a=c(">"+a+">tr:eq(0)",b).children(":first");a.outerHeight();a.height();f=this._fnGetTrNodes(f);b=this._fnGetTrNodes(d);var e=[];d=0;for(a=b.length;d<a;d++){var l=f[d].offsetHeight;
var m=b[d].offsetHeight;l=m>l?m:l;"semiauto"==this.s.sHeightMatch&&(f[d]._DTTC_iHeight=l);e.push(l)}d=0;for(a=b.length;d<a;d++)b[d].style.height=e[d]+"px",f[d].style.height=e[d]+"px"}},_firefoxScrollError:function(){if(z===t){var a=c("<div/>").css({position:"absolute",top:0,left:0,height:10,width:50,overflow:"scroll"}).appendTo("body");z=a[0].clientWidth===a[0].offsetWidth&&0!==this._fnDTOverflow().bar;a.remove()}return z}});u.defaults={iLeftColumns:1,iRightColumns:0,fnDrawCallback:null,sHeightMatch:"semiauto"};
u.version="3.3.2";n.Api.register("fixedColumns()",function(){return this});n.Api.register("fixedColumns().update()",function(){return this.iterator("table",function(a){a._oFixedColumns&&a._oFixedColumns.fnUpdate()})});n.Api.register("fixedColumns().relayout()",function(){return this.iterator("table",function(a){a._oFixedColumns&&a._oFixedColumns.fnRedrawLayout()})});n.Api.register("rows().recalcHeight()",function(){return this.iterator("row",function(a,b){a._oFixedColumns&&a._oFixedColumns.fnRecalculateHeight(this.row(b).node())})});
n.Api.register("fixedColumns().rowIndex()",function(a){a=c(a);return a.parents(".DTFC_Cloned").length?this.rows({page:"current"}).indexes()[a.index()]:this.row(a).index()});n.Api.register("fixedColumns().cellIndex()",function(a){a=c(a);if(a.parents(".DTFC_Cloned").length){var b=a.parent().index();b=this.rows({page:"current"}).indexes()[b];a=a.parents(".DTFC_LeftWrapper").length?a.index():this.columns().flatten().length-this.context[0]._oFixedColumns.s.iRightColumns+a.index();return{row:b,column:this.column.index("toData",
a),columnVisible:a}}return this.cell(a).index()});n.Api.registerPlural("cells().fixedNodes()","cell().fixedNode()",function(){return this.iterator("cell",function(a,b,d){return a._oFixedColumns?a._oFixedColumns.fnToFixedNode(b,d):this.cell(b,d).node()},1)});c(k).on("init.dt.fixedColumns",function(a,b){if("dt"===a.namespace){a=b.oInit.fixedColumns;var d=n.defaults.fixedColumns;if(a||d)d=c.extend({},a,d),!1!==a&&new u(b,d)}});c.fn.dataTable.FixedColumns=u;return c.fn.DataTable.FixedColumns=u});


/*!
 Bootstrap 4 styling wrapper for FixedColumns
 ©2018 SpryMedia Ltd - datatables.net/license
*/
(function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net-bs4","datatables.net-fixedcolumns"],function(a){return c(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||(a=window);b&&b.fn.dataTable||(b=require("datatables.net-bs4")(a,b).$);b.fn.dataTable.FixedColumns||require("datatables.net-fixedcolumns")(a,b);return c(b,a,a.document)}:c(jQuery,window,document)})(function(c,a,b,d){return c.fn.dataTable});


/*!
   Copyright 2009-2021 SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 FixedHeader 3.1.8
 ©2009-2021 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(c,e,f){c instanceof String&&(c=String(c));for(var k=c.length,h=0;h<k;h++){var n=c[h];if(e.call(f,n,h,c))return{i:h,v:n}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(c,e,f){if(c==Array.prototype||c==Object.prototype)return c;c[e]=f.value;return c};$jscomp.getGlobal=function(c){c=["object"==typeof globalThis&&globalThis,c,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var e=0;e<c.length;++e){var f=c[e];if(f&&f.Math==Math)return f}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(c,e){var f=$jscomp.propertyToPolyfillSymbol[e];if(null==f)return c[e];f=c[f];return void 0!==f?f:c[e]};
$jscomp.polyfill=function(c,e,f,k){e&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(c,e,f,k):$jscomp.polyfillUnisolated(c,e,f,k))};$jscomp.polyfillUnisolated=function(c,e,f,k){f=$jscomp.global;c=c.split(".");for(k=0;k<c.length-1;k++){var h=c[k];if(!(h in f))return;f=f[h]}c=c[c.length-1];k=f[c];e=e(k);e!=k&&null!=e&&$jscomp.defineProperty(f,c,{configurable:!0,writable:!0,value:e})};
$jscomp.polyfillIsolated=function(c,e,f,k){var h=c.split(".");c=1===h.length;k=h[0];k=!c&&k in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var n=0;n<h.length-1;n++){var m=h[n];if(!(m in k))return;k=k[m]}h=h[h.length-1];f=$jscomp.IS_SYMBOL_NATIVE&&"es6"===f?k[h]:null;e=e(f);null!=e&&(c?$jscomp.defineProperty($jscomp.polyfills,h,{configurable:!0,writable:!0,value:e}):e!==f&&($jscomp.propertyToPolyfillSymbol[h]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(h):$jscomp.POLYFILL_PREFIX+h,h=
$jscomp.propertyToPolyfillSymbol[h],$jscomp.defineProperty(k,h,{configurable:!0,writable:!0,value:e})))};$jscomp.polyfill("Array.prototype.find",function(c){return c?c:function(e,f){return $jscomp.findInternal(this,e,f).v}},"es6","es3");
(function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(e){return c(e,window,document)}):"object"===typeof exports?module.exports=function(e,f){e||(e=window);f&&f.fn.dataTable||(f=require("datatables.net")(e,f).$);return c(f,e,e.document)}:c(jQuery,window,document)})(function(c,e,f,k){var h=c.fn.dataTable,n=0,m=function(a,b){if(!(this instanceof m))throw"FixedHeader must be initialised with the 'new' keyword.";!0===b&&(b={});a=new h.Api(a);this.c=c.extend(!0,
{},m.defaults,b);this.s={dt:a,position:{theadTop:0,tbodyTop:0,tfootTop:0,tfootBottom:0,width:0,left:0,tfootHeight:0,theadHeight:0,windowHeight:c(e).height(),visible:!0},headerMode:null,footerMode:null,autoWidth:a.settings()[0].oFeatures.bAutoWidth,namespace:".dtfc"+n++,scrollLeft:{header:-1,footer:-1},enable:!0};this.dom={floatingHeader:null,thead:c(a.table().header()),tbody:c(a.table().body()),tfoot:c(a.table().footer()),header:{host:null,floating:null,placeholder:null},footer:{host:null,floating:null,
placeholder:null}};this.dom.header.host=this.dom.thead.parent();this.dom.footer.host=this.dom.tfoot.parent();a=a.settings()[0];if(a._fixedHeader)throw"FixedHeader already initialised on table "+a.nTable.id;a._fixedHeader=this;this._constructor()};c.extend(m.prototype,{destroy:function(){this.s.dt.off(".dtfc");c(e).off(this.s.namespace);this.c.header&&this._modeChange("in-place","header",!0);this.c.footer&&this.dom.tfoot.length&&this._modeChange("in-place","footer",!0)},enable:function(a,b){this.s.enable=
a;if(b||b===k)this._positions(),this._scroll(!0)},enabled:function(){return this.s.enable},headerOffset:function(a){a!==k&&(this.c.headerOffset=a,this.update());return this.c.headerOffset},footerOffset:function(a){a!==k&&(this.c.footerOffset=a,this.update());return this.c.footerOffset},update:function(){var a=this.s.dt.table().node();c(a).is(":visible")?this.enable(!0,!1):this.enable(!1,!1);this._positions();this._scroll(!0)},_constructor:function(){var a=this,b=this.s.dt;c(e).on("scroll"+this.s.namespace,
function(){a._scroll()}).on("resize"+this.s.namespace,h.util.throttle(function(){a.s.position.windowHeight=c(e).height();a.update()},50));var g=c(".fh-fixedHeader");!this.c.headerOffset&&g.length&&(this.c.headerOffset=g.outerHeight());g=c(".fh-fixedFooter");!this.c.footerOffset&&g.length&&(this.c.footerOffset=g.outerHeight());b.on("column-reorder.dt.dtfc column-visibility.dt.dtfc draw.dt.dtfc column-sizing.dt.dtfc responsive-display.dt.dtfc",function(){a.update()});b.on("destroy.dtfc",function(){a.destroy()});
this._positions();this._scroll()},_clone:function(a,b){var g=this.s.dt,d=this.dom[a],l="header"===a?this.dom.thead:this.dom.tfoot;!b&&d.floating?d.floating.removeClass("fixedHeader-floating fixedHeader-locked"):(d.floating&&(d.placeholder.remove(),this._unsize(a),d.floating.children().detach(),d.floating.remove()),d.floating=c(g.table().node().cloneNode(!1)).css("table-layout","fixed").attr("aria-hidden","true").removeAttr("id").append(l).appendTo("body"),d.placeholder=l.clone(!1),d.placeholder.find("*[id]").removeAttr("id"),
d.host.prepend(d.placeholder),this._matchWidths(d.placeholder,d.floating))},_matchWidths:function(a,b){var g=function(q){return c(q,a).map(function(){return 1*c(this).css("width").replace(/[^\d\.]/g,"")}).toArray()},d=function(q,r){c(q,b).each(function(p){c(this).css({width:r[p],minWidth:r[p]})})},l=g("th");g=g("td");d("th",l);d("td",g)},_unsize:function(a){var b=this.dom[a].floating;b&&("footer"===a||"header"===a&&!this.s.autoWidth)?c("th, td",b).css({width:"",minWidth:""}):b&&"header"===a&&c("th, td",
b).css("min-width","")},_horizontal:function(a,b){var g=this.dom[a],d=this.s.position,l=this.s.scrollLeft;g.floating&&l[a]!==b&&(g.floating.css("left",d.left-b),l[a]=b)},_modeChange:function(a,b,g){var d=this.dom[b],l=this.s.position,q=function(t){d.floating.attr("style",function(v,u){return(u||"")+"width: "+t+"px !important;"})},r=this.dom["footer"===b?"tfoot":"thead"],p=c.contains(r[0],f.activeElement)?f.activeElement:null;p&&p.blur();"in-place"===a?(d.placeholder&&(d.placeholder.remove(),d.placeholder=
null),this._unsize(b),"header"===b?d.host.prepend(r):d.host.append(r),d.floating&&(d.floating.remove(),d.floating=null)):"in"===a?(this._clone(b,g),d.floating.addClass("fixedHeader-floating").css("header"===b?"top":"bottom",this.c[b+"Offset"]).css("left",l.left+"px"),q(l.width),"footer"===b&&d.floating.css("top","")):"below"===a?(this._clone(b,g),d.floating.addClass("fixedHeader-locked").css("top",l.tfootTop-l.theadHeight).css("left",l.left+"px"),q(l.width)):"above"===a&&(this._clone(b,g),d.floating.addClass("fixedHeader-locked").css("top",
l.tbodyTop).css("left",l.left+"px"),q(l.width));p&&p!==f.activeElement&&setTimeout(function(){p.focus()},10);this.s.scrollLeft.header=-1;this.s.scrollLeft.footer=-1;this.s[b+"Mode"]=a},_positions:function(){var a=this.s.dt.table(),b=this.s.position,g=this.dom;a=c(a.node());var d=a.children("thead"),l=a.children("tfoot");g=g.tbody;b.visible=a.is(":visible");b.width=a.outerWidth();b.left=a.offset().left;b.theadTop=d.offset().top;b.tbodyTop=g.offset().top;b.tbodyHeight=g.outerHeight();b.theadHeight=
b.tbodyTop-b.theadTop;l.length?(b.tfootTop=l.offset().top,b.tfootBottom=b.tfootTop+l.outerHeight(),b.tfootHeight=b.tfootBottom-b.tfootTop):(b.tfootTop=b.tbodyTop+g.outerHeight(),b.tfootBottom=b.tfootTop,b.tfootHeight=b.tfootTop)},_scroll:function(a){var b=c(f).scrollTop(),g=c(f).scrollLeft(),d=this.s.position;if(this.c.header){var l=this.s.enable?!d.visible||b<=d.theadTop-this.c.headerOffset?"in-place":b<=d.tfootTop-d.theadHeight-this.c.headerOffset?"in":"below":"in-place";(a||l!==this.s.headerMode)&&
this._modeChange(l,"header",a);this._horizontal("header",g)}this.c.footer&&this.dom.tfoot.length&&(b=this.s.enable?!d.visible||b+d.windowHeight>=d.tfootBottom+this.c.footerOffset?"in-place":d.windowHeight+b>d.tbodyTop+d.tfootHeight+this.c.footerOffset?"in":"above":"in-place",(a||b!==this.s.footerMode)&&this._modeChange(b,"footer",a),this._horizontal("footer",g))}});m.version="3.1.8";m.defaults={header:!0,footer:!1,headerOffset:0,footerOffset:0};c.fn.dataTable.FixedHeader=m;c.fn.DataTable.FixedHeader=
m;c(f).on("init.dt.dtfh",function(a,b,g){"dt"===a.namespace&&(a=b.oInit.fixedHeader,g=h.defaults.fixedHeader,!a&&!g||b._fixedHeader||(g=c.extend({},g,a),!1!==a&&new m(b,g)))});h.Api.register("fixedHeader()",function(){});h.Api.register("fixedHeader.adjust()",function(){return this.iterator("table",function(a){(a=a._fixedHeader)&&a.update()})});h.Api.register("fixedHeader.enable()",function(a){return this.iterator("table",function(b){b=b._fixedHeader;a=a!==k?a:!0;b&&a!==b.enabled()&&b.enable(a)})});
h.Api.register("fixedHeader.enabled()",function(){if(this.context.length){var a=this.context[0]._fixedHeader;if(a)return a.enabled()}return!1});h.Api.register("fixedHeader.disable()",function(){return this.iterator("table",function(a){(a=a._fixedHeader)&&a.enabled()&&a.enable(!1)})});c.each(["header","footer"],function(a,b){h.Api.register("fixedHeader."+b+"Offset()",function(g){var d=this.context;return g===k?d.length&&d[0]._fixedHeader?d[0]._fixedHeader[b+"Offset"]():k:this.iterator("table",function(l){if(l=
l._fixedHeader)l[b+"Offset"](g)})})});return m});


/*!
 Bootstrap 4 styling wrapper for FixedHeader
 ©2018 SpryMedia Ltd - datatables.net/license
*/
(function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net-bs4","datatables.net-fixedheader"],function(a){return c(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||(a=window);b&&b.fn.dataTable||(b=require("datatables.net-bs4")(a,b).$);b.fn.dataTable.FixedHeader||require("datatables.net-fixedheader")(a,b);return c(b,a,a.document)}:c(jQuery,window,document)})(function(c,a,b,d){return c.fn.dataTable});


/*!
   Copyright 2009-2021 SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 KeyTable 2.6.1
 ©2009-2021 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.arrayIteratorImpl=function(b){var h=0;return function(){return h<b.length?{done:!1,value:b[h++]}:{done:!0}}};$jscomp.arrayIterator=function(b){return{next:$jscomp.arrayIteratorImpl(b)}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(b,h,k){if(b==Array.prototype||b==Object.prototype)return b;b[h]=k.value;return b};$jscomp.getGlobal=function(b){b=["object"==typeof globalThis&&globalThis,b,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var h=0;h<b.length;++h){var k=b[h];if(k&&k.Math==Math)return k}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(b,h){var k=$jscomp.propertyToPolyfillSymbol[h];if(null==k)return b[h];k=b[k];return void 0!==k?k:b[h]};
$jscomp.polyfill=function(b,h,k,n){h&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(b,h,k,n):$jscomp.polyfillUnisolated(b,h,k,n))};$jscomp.polyfillUnisolated=function(b,h,k,n){k=$jscomp.global;b=b.split(".");for(n=0;n<b.length-1;n++){var m=b[n];if(!(m in k))return;k=k[m]}b=b[b.length-1];n=k[b];h=h(n);h!=n&&null!=h&&$jscomp.defineProperty(k,b,{configurable:!0,writable:!0,value:h})};
$jscomp.polyfillIsolated=function(b,h,k,n){var m=b.split(".");b=1===m.length;n=m[0];n=!b&&n in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var u=0;u<m.length-1;u++){var w=m[u];if(!(w in n))return;n=n[w]}m=m[m.length-1];k=$jscomp.IS_SYMBOL_NATIVE&&"es6"===k?n[m]:null;h=h(k);null!=h&&(b?$jscomp.defineProperty($jscomp.polyfills,m,{configurable:!0,writable:!0,value:h}):h!==k&&($jscomp.propertyToPolyfillSymbol[m]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(m):$jscomp.POLYFILL_PREFIX+m,m=
$jscomp.propertyToPolyfillSymbol[m],$jscomp.defineProperty(n,m,{configurable:!0,writable:!0,value:h})))};$jscomp.initSymbol=function(){};
$jscomp.polyfill("Symbol",function(b){if(b)return b;var h=function(m,u){this.$jscomp$symbol$id_=m;$jscomp.defineProperty(this,"description",{configurable:!0,writable:!0,value:u})};h.prototype.toString=function(){return this.$jscomp$symbol$id_};var k=0,n=function(m){if(this instanceof n)throw new TypeError("Symbol is not a constructor");return new h("jscomp_symbol_"+(m||"")+"_"+k++,m)};return n},"es6","es3");$jscomp.initSymbolIterator=function(){};
$jscomp.polyfill("Symbol.iterator",function(b){if(b)return b;b=Symbol("Symbol.iterator");for(var h="Array Int8Array Uint8Array Uint8ClampedArray Int16Array Uint16Array Int32Array Uint32Array Float32Array Float64Array".split(" "),k=0;k<h.length;k++){var n=$jscomp.global[h[k]];"function"===typeof n&&"function"!=typeof n.prototype[b]&&$jscomp.defineProperty(n.prototype,b,{configurable:!0,writable:!0,value:function(){return $jscomp.iteratorPrototype($jscomp.arrayIteratorImpl(this))}})}return b},"es6",
"es3");$jscomp.initSymbolAsyncIterator=function(){};$jscomp.iteratorPrototype=function(b){b={next:b};b[Symbol.iterator]=function(){return this};return b};$jscomp.iteratorFromArray=function(b,h){b instanceof String&&(b+="");var k=0,n={next:function(){if(k<b.length){var m=k++;return{value:h(m,b[m]),done:!1}}n.next=function(){return{done:!0,value:void 0}};return n.next()}};n[Symbol.iterator]=function(){return n};return n};
$jscomp.polyfill("Array.prototype.keys",function(b){return b?b:function(){return $jscomp.iteratorFromArray(this,function(h){return h})}},"es6","es3");
(function(b){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(h){return b(h,window,document)}):"object"===typeof exports?module.exports=function(h,k){h||(h=window);k&&k.fn.dataTable||(k=require("datatables.net")(h,k).$);return b(k,h,h.document)}:b(jQuery,window,document)})(function(b,h,k,n){var m=b.fn.dataTable,u=0,w=0,t=function(a,c){if(!m.versionCheck||!m.versionCheck("1.10.8"))throw"KeyTable requires DataTables 1.10.8 or newer";this.c=b.extend(!0,{},m.defaults.keyTable,
t.defaults,c);this.s={dt:new m.Api(a),enable:!0,focusDraw:!1,waitingForDraw:!1,lastFocus:null,namespace:".keyTable-"+u++,tabInput:null};this.dom={};a=this.s.dt.settings()[0];if(c=a.keytable)return c;a.keytable=this;this._constructor()};b.extend(t.prototype,{blur:function(){this._blur()},enable:function(a){this.s.enable=a},enabled:function(){return this.s.enable},focus:function(a,c){this._focus(this.s.dt.cell(a,c))},focused:function(a){if(!this.s.lastFocus)return!1;var c=this.s.lastFocus.cell.index();
return a.row===c.row&&a.column===c.column},_constructor:function(){this._tabInput();var a=this,c=this.s.dt,e=b(c.table().node()),d=this.s.namespace,g=!1;"static"===e.css("position")&&e.css("position","relative");b(c.table().body()).on("click"+d,"th, td",function(f){if(!1!==a.s.enable){var q=c.cell(this);q.any()&&a._focus(q,null,!1,f)}});b(k).on("keydown"+d,function(f){g||a._key(f)});if(this.c.blurable)b(k).on("mousedown"+d,function(f){b(f.target).parents(".dataTables_filter").length&&a._blur();b(f.target).parents().filter(c.table().container()).length||
b(f.target).parents("div.DTE").length||b(f.target).parents("div.editor-datetime").length||b(f.target).parents("div.dt-datetime").length||b(f.target).parents().filter(".DTFC_Cloned").length||a._blur()});if(this.c.editor){var p=this.c.editor;p.on("open.keyTableMain",function(f,q,r){"inline"!==q&&a.s.enable&&(a.enable(!1),p.one("close"+d,function(){a.enable(!0)}))});if(this.c.editOnFocus)c.on("key-focus"+d+" key-refocus"+d,function(f,q,r,v){a._editor(null,v,!0)});c.on("key"+d,function(f,q,r,v,x){a._editor(r,
x,!1)});b(c.table().body()).on("dblclick"+d,"th, td",function(f){!1!==a.s.enable&&c.cell(this).any()&&(a.s.lastFocus&&this!==a.s.lastFocus.cell.node()||a._editor(null,f,!0))});p.on("preSubmit",function(){g=!0}).on("preSubmitCancelled",function(){g=!1}).on("submitComplete",function(){g=!1})}if(c.settings()[0].oFeatures.bStateSave)c.on("stateSaveParams"+d,function(f,q,r){r.keyTable=a.s.lastFocus?a.s.lastFocus.cell.index():null});c.on("column-visibility"+d,function(f){a._tabInput()});c.on("draw"+d,function(f){a._tabInput();
if(!a.s.focusDraw&&a.s.lastFocus){var q=a.s.lastFocus.relative,r=c.page.info(),v=q.row+r.start;0!==r.recordsDisplay&&(v>=r.recordsDisplay&&(v=r.recordsDisplay-1),a._focus(v,q.column,!0,f))}});this.c.clipboard&&this._clipboard();c.on("destroy"+d,function(){a._blur(!0);c.off(d);b(c.table().body()).off("click"+d,"th, td").off("dblclick"+d,"th, td");b(k).off("mousedown"+d).off("keydown"+d).off("copy"+d).off("paste"+d)});var l=c.state.loaded();if(l&&l.keyTable)c.one("init",function(){var f=c.cell(l.keyTable);
f.any()&&f.focus()});else this.c.focus&&c.cell(this.c.focus).focus()},_blur:function(a){if(this.s.enable&&this.s.lastFocus){var c=this.s.lastFocus.cell;b(c.node()).removeClass(this.c.className);this.s.lastFocus=null;a||(this._updateFixedColumns(c.index().column),this._emitEvent("key-blur",[this.s.dt,c]))}},_clipboard:function(){var a=this.s.dt,c=this,e=this.s.namespace;h.getSelection&&(b(k).on("copy"+e,function(d){d=d.originalEvent;var g=h.getSelection().toString(),p=c.s.lastFocus;!g&&p&&(d.clipboardData.setData("text/plain",
p.cell.render(c.c.clipboardOrthogonal)),d.preventDefault())}),b(k).on("paste"+e,function(d){d=d.originalEvent;var g=c.s.lastFocus,p=k.activeElement,l=c.c.editor,f;!g||p&&"body"!==p.nodeName.toLowerCase()||(d.preventDefault(),h.clipboardData&&h.clipboardData.getData?f=h.clipboardData.getData("Text"):d.clipboardData&&d.clipboardData.getData&&(f=d.clipboardData.getData("text/plain")),l?l.inline(g.cell.index()).set(l.displayed()[0],f).submit():(g.cell.data(f),a.draw(!1)))}))},_columns:function(){var a=
this.s.dt,c=a.columns(this.c.columns).indexes(),e=[];a.columns(":visible").every(function(d){-1!==c.indexOf(d)&&e.push(d)});return e},_editor:function(a,c,e){if(this.s.lastFocus&&(!c||"draw"!==c.type)){var d=this,g=this.s.dt,p=this.c.editor,l=this.s.lastFocus.cell,f=this.s.namespace+"e"+w++;if(!(b("div.DTE",l.node()).length||null!==a&&(0<=a&&9>=a||11===a||12===a||14<=a&&31>=a||112<=a&&123>=a||127<=a&&159>=a))){c&&(c.stopPropagation(),13===a&&c.preventDefault());var q=function(){p.one("open"+f,function(){p.off("cancelOpen"+
f);e||b("div.DTE_Field_InputControl input, div.DTE_Field_InputControl textarea").select();g.keys.enable(e?"tab-only":"navigation-only");g.on("key-blur.editor",function(r,v,x){p.displayed()&&x.node()===l.node()&&p.submit()});e&&b(g.table().container()).addClass("dtk-focus-alt");p.on("preSubmitCancelled"+f,function(){setTimeout(function(){d._focus(l,null,!1)},50)});p.on("submitUnsuccessful"+f,function(){d._focus(l,null,!1)});p.one("close"+f,function(){g.keys.enable(!0);g.off("key-blur.editor");p.off(f);
b(g.table().container()).removeClass("dtk-focus-alt");d.s.returnSubmit&&(d.s.returnSubmit=!1,d._emitEvent("key-return-submit",[g,l]))})}).one("cancelOpen"+f,function(){p.off(f)}).inline(l.index())};13===a?(e=!0,b(k).one("keyup",function(){q()})):q()}}},_emitEvent:function(a,c){this.s.dt.iterator("table",function(e,d){b(e.nTable).triggerHandler(a,c)})},_focus:function(a,c,e,d){var g=this,p=this.s.dt,l=p.page.info(),f=this.s.lastFocus;d||(d=null);if(this.s.enable){if("number"!==typeof a){if(!a.any())return;
var q=a.index();c=q.column;a=p.rows({filter:"applied",order:"applied"}).indexes().indexOf(q.row);if(0>a)return;l.serverSide&&(a+=l.start)}if(-1!==l.length&&(a<l.start||a>=l.start+l.length))this.s.focusDraw=!0,this.s.waitingForDraw=!0,p.one("draw",function(){g.s.focusDraw=!1;g.s.waitingForDraw=!1;g._focus(a,c,n,d)}).page(Math.floor(a/l.length)).draw(!1);else if(-1!==b.inArray(c,this._columns())){l.serverSide&&(a-=l.start);l=p.cells(null,c,{search:"applied",order:"applied"}).flatten();l=p.cell(l[a]);
if(f){if(f.node===l.node()){this._emitEvent("key-refocus",[this.s.dt,l,d||null]);return}this._blur()}this._removeOtherFocus();f=b(l.node());f.addClass(this.c.className);this._updateFixedColumns(c);if(e===n||!0===e)this._scroll(b(h),b(k.body),f,"offset"),e=p.table().body().parentNode,e!==p.table().header().parentNode&&(e=b(e.parentNode),this._scroll(e,e,f,"position"));this.s.lastFocus={cell:l,node:l.node(),relative:{row:p.rows({page:"current"}).indexes().indexOf(l.index().row),column:l.index().column}};
this._emitEvent("key-focus",[this.s.dt,l,d||null]);p.state.save()}}},_key:function(a){if(this.s.waitingForDraw)a.preventDefault();else{var c=this.s.enable;this.s.returnSubmit="navigation-only"!==c&&"tab-only"!==c||13!==a.keyCode?!1:!0;var e=!0===c||"navigation-only"===c;if(c&&(!(0===a.keyCode||a.ctrlKey||a.metaKey||a.altKey)||a.ctrlKey&&a.altKey)){var d=this.s.lastFocus;if(d)if(this.s.dt.cell(d.node).any()){d=this.s.dt;var g=this.s.dt.settings()[0].oScroll.sY?!0:!1;if(!this.c.keys||-1!==b.inArray(a.keyCode,
this.c.keys))switch(a.keyCode){case 9:this._shift(a,a.shiftKey?"left":"right",!0);break;case 27:this.s.blurable&&!0===c&&this._blur();break;case 33:case 34:e&&!g&&(a.preventDefault(),d.page(33===a.keyCode?"previous":"next").draw(!1));break;case 35:case 36:e&&(a.preventDefault(),c=d.cells({page:"current"}).indexes(),e=this._columns(),this._focus(d.cell(c[35===a.keyCode?c.length-1:e[0]]),null,!0,a));break;case 37:e&&this._shift(a,"left");break;case 38:e&&this._shift(a,"up");break;case 39:e&&this._shift(a,
"right");break;case 40:e&&this._shift(a,"down");break;case 113:if(this.c.editor){this._editor(null,a,!0);break}default:!0===c&&this._emitEvent("key",[d,a.keyCode,this.s.lastFocus.cell,a])}}else this.s.lastFocus=null}}},_removeOtherFocus:function(){var a=this.s.dt.table().node();b.fn.dataTable.tables({api:!0}).iterator("table",function(c){this.table().node()!==a&&this.cell.blur()})},_scroll:function(a,c,e,d){var g=e[d](),p=e.outerHeight(),l=e.outerWidth(),f=c.scrollTop(),q=c.scrollLeft(),r=a.height();
a=a.width();"position"===d&&(g.top+=parseInt(e.closest("table").css("top"),10));g.top<f&&c.scrollTop(g.top);g.left<q&&c.scrollLeft(g.left);g.top+p>f+r&&p<r&&c.scrollTop(g.top+p-r);g.left+l>q+a&&l<a&&c.scrollLeft(g.left+l-a)},_shift:function(a,c,e){var d=this.s.dt,g=d.page.info(),p=g.recordsDisplay,l=this._columns(),f=this.s.lastFocus;if(f){var q=f.cell;q&&(f=d.rows({filter:"applied",order:"applied"}).indexes().indexOf(q.index().row),g.serverSide&&(f+=g.start),d=d.columns(l).indexes().indexOf(q.index().column),
g=f,f=l[d],"right"===c?d>=l.length-1?(g++,f=l[0]):f=l[d+1]:"left"===c?0===d?(g--,f=l[l.length-1]):f=l[d-1]:"up"===c?g--:"down"===c&&g++,0<=g&&g<p&&-1!==b.inArray(f,l)?(a&&a.preventDefault(),this._focus(g,f,!0,a)):e&&this.c.blurable?this._blur():a&&a.preventDefault())}},_tabInput:function(){var a=this,c=this.s.dt,e=null!==this.c.tabIndex?this.c.tabIndex:c.settings()[0].iTabIndex;-1!=e&&(this.s.tabInput||(e=b('<div><input type="text" tabindex="'+e+'"/></div>').css({position:"absolute",height:1,width:0,
overflow:"hidden"}),e.children().on("focus",function(d){var g=c.cell(":eq(0)",a._columns(),{page:"current"});g.any()&&a._focus(g,null,!0,d)}),this.s.tabInput=e),(e=this.s.dt.cell(":eq(0)","0:visible",{page:"current",order:"current"}).node())&&b(e).prepend(this.s.tabInput))},_updateFixedColumns:function(a){var c=this.s.dt,e=c.settings()[0];if(e._oFixedColumns){var d=e.aoColumns.length-e._oFixedColumns.s.iRightColumns;(a<e._oFixedColumns.s.iLeftColumns||a>=d)&&c.fixedColumns().update()}}});t.defaults=
{blurable:!0,className:"focus",clipboard:!0,clipboardOrthogonal:"display",columns:"",editor:null,editOnFocus:!1,focus:null,keys:null,tabIndex:null};t.version="2.6.1";b.fn.dataTable.KeyTable=t;b.fn.DataTable.KeyTable=t;m.Api.register("cell.blur()",function(){return this.iterator("table",function(a){a.keytable&&a.keytable.blur()})});m.Api.register("cell().focus()",function(){return this.iterator("cell",function(a,c,e){a.keytable&&a.keytable.focus(c,e)})});m.Api.register("keys.disable()",function(){return this.iterator("table",
function(a){a.keytable&&a.keytable.enable(!1)})});m.Api.register("keys.enable()",function(a){return this.iterator("table",function(c){c.keytable&&c.keytable.enable(a===n?!0:a)})});m.Api.register("keys.enabled()",function(a){a=this.context;return a.length?a[0].keytable?a[0].keytable.enabled():!1:!1});m.Api.register("keys.move()",function(a){return this.iterator("table",function(c){c.keytable&&c.keytable._shift(null,a,!1)})});m.ext.selector.cell.push(function(a,c,e){c=c.focused;a=a.keytable;var d=[];
if(!a||c===n)return e;for(var g=0,p=e.length;g<p;g++)(!0===c&&a.focused(e[g])||!1===c&&!a.focused(e[g]))&&d.push(e[g]);return d});b(k).on("preInit.dt.dtk",function(a,c,e){"dt"===a.namespace&&(a=c.oInit.keys,e=m.defaults.keys,a||e)&&(e=b.extend({},e,a),!1!==a&&new t(c,e))});return t});


/*!
 Bootstrap 4 styling wrapper for KeyTable
 ©2018 SpryMedia Ltd - datatables.net/license
*/
(function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net-bs4","datatables.net-keytable"],function(a){return c(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||(a=window);b&&b.fn.dataTable||(b=require("datatables.net-bs4")(a,b).$);b.fn.dataTable.KeyTable||require("datatables.net-keytable")(a,b);return c(b,a,a.document)}:c(jQuery,window,document)})(function(c,a,b,d){return c.fn.dataTable});


/*!
   Copyright 2014-2021 SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 Responsive 2.2.7
 2014-2021 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(b,k,m){b instanceof String&&(b=String(b));for(var n=b.length,p=0;p<n;p++){var y=b[p];if(k.call(m,y,p,b))return{i:p,v:y}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(b,k,m){if(b==Array.prototype||b==Object.prototype)return b;b[k]=m.value;return b};$jscomp.getGlobal=function(b){b=["object"==typeof globalThis&&globalThis,b,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var k=0;k<b.length;++k){var m=b[k];if(m&&m.Math==Math)return m}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(b,k){var m=$jscomp.propertyToPolyfillSymbol[k];if(null==m)return b[k];m=b[m];return void 0!==m?m:b[k]};
$jscomp.polyfill=function(b,k,m,n){k&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(b,k,m,n):$jscomp.polyfillUnisolated(b,k,m,n))};$jscomp.polyfillUnisolated=function(b,k,m,n){m=$jscomp.global;b=b.split(".");for(n=0;n<b.length-1;n++){var p=b[n];if(!(p in m))return;m=m[p]}b=b[b.length-1];n=m[b];k=k(n);k!=n&&null!=k&&$jscomp.defineProperty(m,b,{configurable:!0,writable:!0,value:k})};
$jscomp.polyfillIsolated=function(b,k,m,n){var p=b.split(".");b=1===p.length;n=p[0];n=!b&&n in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var y=0;y<p.length-1;y++){var z=p[y];if(!(z in n))return;n=n[z]}p=p[p.length-1];m=$jscomp.IS_SYMBOL_NATIVE&&"es6"===m?n[p]:null;k=k(m);null!=k&&(b?$jscomp.defineProperty($jscomp.polyfills,p,{configurable:!0,writable:!0,value:k}):k!==m&&($jscomp.propertyToPolyfillSymbol[p]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(p):$jscomp.POLYFILL_PREFIX+p,p=
$jscomp.propertyToPolyfillSymbol[p],$jscomp.defineProperty(n,p,{configurable:!0,writable:!0,value:k})))};$jscomp.polyfill("Array.prototype.find",function(b){return b?b:function(k,m){return $jscomp.findInternal(this,k,m).v}},"es6","es3");
(function(b){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(k){return b(k,window,document)}):"object"===typeof exports?module.exports=function(k,m){k||(k=window);m&&m.fn.dataTable||(m=require("datatables.net")(k,m).$);return b(m,k,k.document)}:b(jQuery,window,document)})(function(b,k,m,n){function p(a,c,d){var f=c+"-"+d;if(A[f])return A[f];var g=[];a=a.cell(c,d).node().childNodes;c=0;for(d=a.length;c<d;c++)g.push(a[c]);return A[f]=g}function y(a,c,d){var f=c+"-"+
d;if(A[f]){a=a.cell(c,d).node();d=A[f][0].parentNode.childNodes;c=[];for(var g=0,l=d.length;g<l;g++)c.push(d[g]);d=0;for(g=c.length;d<g;d++)a.appendChild(c[d]);A[f]=n}}var z=b.fn.dataTable,u=function(a,c){if(!z.versionCheck||!z.versionCheck("1.10.10"))throw"DataTables Responsive requires DataTables 1.10.10 or newer";this.s={dt:new z.Api(a),columns:[],current:[]};this.s.dt.settings()[0].responsive||(c&&"string"===typeof c.details?c.details={type:c.details}:c&&!1===c.details?c.details={type:!1}:c&&
!0===c.details&&(c.details={type:"inline"}),this.c=b.extend(!0,{},u.defaults,z.defaults.responsive,c),a.responsive=this,this._constructor())};b.extend(u.prototype,{_constructor:function(){var a=this,c=this.s.dt,d=c.settings()[0],f=b(k).innerWidth();c.settings()[0]._responsive=this;b(k).on("resize.dtr orientationchange.dtr",z.util.throttle(function(){var g=b(k).innerWidth();g!==f&&(a._resize(),f=g)}));d.oApi._fnCallbackReg(d,"aoRowCreatedCallback",function(g,l,h){-1!==b.inArray(!1,a.s.current)&&b(">td, >th",
g).each(function(e){e=c.column.index("toData",e);!1===a.s.current[e]&&b(this).css("display","none")})});c.on("destroy.dtr",function(){c.off(".dtr");b(c.table().body()).off(".dtr");b(k).off("resize.dtr orientationchange.dtr");c.cells(".dtr-control").nodes().to$().removeClass("dtr-control");b.each(a.s.current,function(g,l){!1===l&&a._setColumnVis(g,!0)})});this.c.breakpoints.sort(function(g,l){return g.width<l.width?1:g.width>l.width?-1:0});this._classLogic();this._resizeAuto();d=this.c.details;!1!==
d.type&&(a._detailsInit(),c.on("column-visibility.dtr",function(){a._timer&&clearTimeout(a._timer);a._timer=setTimeout(function(){a._timer=null;a._classLogic();a._resizeAuto();a._resize(!0);a._redrawChildren()},100)}),c.on("draw.dtr",function(){a._redrawChildren()}),b(c.table().node()).addClass("dtr-"+d.type));c.on("column-reorder.dtr",function(g,l,h){a._classLogic();a._resizeAuto();a._resize(!0)});c.on("column-sizing.dtr",function(){a._resizeAuto();a._resize()});c.on("preXhr.dtr",function(){var g=
[];c.rows().every(function(){this.child.isShown()&&g.push(this.id(!0))});c.one("draw.dtr",function(){a._resizeAuto();a._resize();c.rows(g).every(function(){a._detailsDisplay(this,!1)})})});c.on("draw.dtr",function(){a._controlClass()}).on("init.dtr",function(g,l,h){"dt"===g.namespace&&(a._resizeAuto(),a._resize(),b.inArray(!1,a.s.current)&&c.columns.adjust())});this._resize()},_columnsVisiblity:function(a){var c=this.s.dt,d=this.s.columns,f,g=d.map(function(t,v){return{columnIdx:v,priority:t.priority}}).sort(function(t,
v){return t.priority!==v.priority?t.priority-v.priority:t.columnIdx-v.columnIdx}),l=b.map(d,function(t,v){return!1===c.column(v).visible()?"not-visible":t.auto&&null===t.minWidth?!1:!0===t.auto?"-":-1!==b.inArray(a,t.includeIn)}),h=0;var e=0;for(f=l.length;e<f;e++)!0===l[e]&&(h+=d[e].minWidth);e=c.settings()[0].oScroll;e=e.sY||e.sX?e.iBarWidth:0;h=c.table().container().offsetWidth-e-h;e=0;for(f=l.length;e<f;e++)d[e].control&&(h-=d[e].minWidth);var r=!1;e=0;for(f=g.length;e<f;e++){var q=g[e].columnIdx;
"-"===l[q]&&!d[q].control&&d[q].minWidth&&(r||0>h-d[q].minWidth?(r=!0,l[q]=!1):l[q]=!0,h-=d[q].minWidth)}g=!1;e=0;for(f=d.length;e<f;e++)if(!d[e].control&&!d[e].never&&!1===l[e]){g=!0;break}e=0;for(f=d.length;e<f;e++)d[e].control&&(l[e]=g),"not-visible"===l[e]&&(l[e]=!1);-1===b.inArray(!0,l)&&(l[0]=!0);return l},_classLogic:function(){var a=this,c=this.c.breakpoints,d=this.s.dt,f=d.columns().eq(0).map(function(h){var e=this.column(h),r=e.header().className;h=d.settings()[0].aoColumns[h].responsivePriority;
e=e.header().getAttribute("data-priority");h===n&&(h=e===n||null===e?1E4:1*e);return{className:r,includeIn:[],auto:!1,control:!1,never:r.match(/\bnever\b/)?!0:!1,priority:h}}),g=function(h,e){h=f[h].includeIn;-1===b.inArray(e,h)&&h.push(e)},l=function(h,e,r,q){if(!r)f[h].includeIn.push(e);else if("max-"===r)for(q=a._find(e).width,e=0,r=c.length;e<r;e++)c[e].width<=q&&g(h,c[e].name);else if("min-"===r)for(q=a._find(e).width,e=0,r=c.length;e<r;e++)c[e].width>=q&&g(h,c[e].name);else if("not-"===r)for(e=
0,r=c.length;e<r;e++)-1===c[e].name.indexOf(q)&&g(h,c[e].name)};f.each(function(h,e){for(var r=h.className.split(" "),q=!1,t=0,v=r.length;t<v;t++){var B=r[t].trim();if("all"===B){q=!0;h.includeIn=b.map(c,function(w){return w.name});return}if("none"===B||h.never){q=!0;return}if("control"===B||"dtr-control"===B){q=!0;h.control=!0;return}b.each(c,function(w,D){w=D.name.split("-");var x=B.match(new RegExp("(min\\-|max\\-|not\\-)?("+w[0]+")(\\-[_a-zA-Z0-9])?"));x&&(q=!0,x[2]===w[0]&&x[3]==="-"+w[1]?l(e,
D.name,x[1],x[2]+x[3]):x[2]!==w[0]||x[3]||l(e,D.name,x[1],x[2]))})}q||(h.auto=!0)});this.s.columns=f},_controlClass:function(){if("inline"===this.c.details.type){var a=this.s.dt,c=b.inArray(!0,this.s.current);a.cells(null,function(d){return d!==c},{page:"current"}).nodes().to$().filter(".dtr-control").removeClass("dtr-control");a.cells(null,c,{page:"current"}).nodes().to$().addClass("dtr-control")}},_detailsDisplay:function(a,c){var d=this,f=this.s.dt,g=this.c.details;if(g&&!1!==g.type){var l=g.display(a,
c,function(){return g.renderer(f,a[0],d._detailsObj(a[0]))});!0!==l&&!1!==l||b(f.table().node()).triggerHandler("responsive-display.dt",[f,a,l,c])}},_detailsInit:function(){var a=this,c=this.s.dt,d=this.c.details;"inline"===d.type&&(d.target="td.dtr-control, th.dtr-control");c.on("draw.dtr",function(){a._tabIndexes()});a._tabIndexes();b(c.table().body()).on("keyup.dtr","td, th",function(g){13===g.keyCode&&b(this).data("dtr-keyboard")&&b(this).click()});var f=d.target;d="string"===typeof f?f:"td, th";
if(f!==n||null!==f)b(c.table().body()).on("click.dtr mousedown.dtr mouseup.dtr",d,function(g){if(b(c.table().node()).hasClass("collapsed")&&-1!==b.inArray(b(this).closest("tr").get(0),c.rows().nodes().toArray())){if("number"===typeof f){var l=0>f?c.columns().eq(0).length+f:f;if(c.cell(this).index().column!==l)return}l=c.row(b(this).closest("tr"));"click"===g.type?a._detailsDisplay(l,!1):"mousedown"===g.type?b(this).css("outline","none"):"mouseup"===g.type&&b(this).trigger("blur").css("outline","")}})},
_detailsObj:function(a){var c=this,d=this.s.dt;return b.map(this.s.columns,function(f,g){if(!f.never&&!f.control)return f=d.settings()[0].aoColumns[g],{className:f.sClass,columnIndex:g,data:d.cell(a,g).render(c.c.orthogonal),hidden:d.column(g).visible()&&!c.s.current[g],rowIndex:a,title:null!==f.sTitle?f.sTitle:b(d.column(g).header()).text()}})},_find:function(a){for(var c=this.c.breakpoints,d=0,f=c.length;d<f;d++)if(c[d].name===a)return c[d]},_redrawChildren:function(){var a=this,c=this.s.dt;c.rows({page:"current"}).iterator("row",
function(d,f){c.row(f);a._detailsDisplay(c.row(f),!0)})},_resize:function(a){var c=this,d=this.s.dt,f=b(k).innerWidth(),g=this.c.breakpoints,l=g[0].name,h=this.s.columns,e,r=this.s.current.slice();for(e=g.length-1;0<=e;e--)if(f<=g[e].width){l=g[e].name;break}var q=this._columnsVisiblity(l);this.s.current=q;g=!1;e=0;for(f=h.length;e<f;e++)if(!1===q[e]&&!h[e].never&&!h[e].control&&!1===!d.column(e).visible()){g=!0;break}b(d.table().node()).toggleClass("collapsed",g);var t=!1,v=0;d.columns().eq(0).each(function(B,
w){!0===q[w]&&v++;if(a||q[w]!==r[w])t=!0,c._setColumnVis(B,q[w])});t&&(this._redrawChildren(),b(d.table().node()).trigger("responsive-resize.dt",[d,this.s.current]),0===d.page.info().recordsDisplay&&b("td",d.table().body()).eq(0).attr("colspan",v));c._controlClass()},_resizeAuto:function(){var a=this.s.dt,c=this.s.columns;if(this.c.auto&&-1!==b.inArray(!0,b.map(c,function(e){return e.auto}))){b.isEmptyObject(A)||b.each(A,function(e){e=e.split("-");y(a,1*e[0],1*e[1])});a.table().node();var d=a.table().node().cloneNode(!1),
f=b(a.table().header().cloneNode(!1)).appendTo(d),g=b(a.table().body()).clone(!1,!1).empty().appendTo(d);d.style.width="auto";var l=a.columns().header().filter(function(e){return a.column(e).visible()}).to$().clone(!1).css("display","table-cell").css("width","auto").css("min-width",0);b(g).append(b(a.rows({page:"current"}).nodes()).clone(!1)).find("th, td").css("display","");if(g=a.table().footer()){g=b(g.cloneNode(!1)).appendTo(d);var h=a.columns().footer().filter(function(e){return a.column(e).visible()}).to$().clone(!1).css("display",
"table-cell");b("<tr/>").append(h).appendTo(g)}b("<tr/>").append(l).appendTo(f);"inline"===this.c.details.type&&b(d).addClass("dtr-inline collapsed");b(d).find("[name]").removeAttr("name");b(d).css("position","relative");d=b("<div/>").css({width:1,height:1,overflow:"hidden",clear:"both"}).append(d);d.insertBefore(a.table().node());l.each(function(e){e=a.column.index("fromVisible",e);c[e].minWidth=this.offsetWidth||0});d.remove()}},_responsiveOnlyHidden:function(){var a=this.s.dt;return b.map(this.s.current,
function(c,d){return!1===a.column(d).visible()?!0:c})},_setColumnVis:function(a,c){var d=this.s.dt;c=c?"":"none";b(d.column(a).header()).css("display",c);b(d.column(a).footer()).css("display",c);d.column(a).nodes().to$().css("display",c);b.isEmptyObject(A)||d.cells(null,a).indexes().each(function(f){y(d,f.row,f.column)})},_tabIndexes:function(){var a=this.s.dt,c=a.cells({page:"current"}).nodes().to$(),d=a.settings()[0],f=this.c.details.target;c.filter("[data-dtr-keyboard]").removeData("[data-dtr-keyboard]");
"number"===typeof f?a.cells(null,f,{page:"current"}).nodes().to$().attr("tabIndex",d.iTabIndex).data("dtr-keyboard",1):("td:first-child, th:first-child"===f&&(f=">td:first-child, >th:first-child"),b(f,a.rows({page:"current"}).nodes()).attr("tabIndex",d.iTabIndex).data("dtr-keyboard",1))}});u.breakpoints=[{name:"desktop",width:Infinity},{name:"tablet-l",width:1024},{name:"tablet-p",width:768},{name:"mobile-l",width:480},{name:"mobile-p",width:320}];u.display={childRow:function(a,c,d){if(c){if(b(a.node()).hasClass("parent"))return a.child(d(),
"child").show(),!0}else{if(a.child.isShown())return a.child(!1),b(a.node()).removeClass("parent"),!1;a.child(d(),"child").show();b(a.node()).addClass("parent");return!0}},childRowImmediate:function(a,c,d){if(!c&&a.child.isShown()||!a.responsive.hasHidden())return a.child(!1),b(a.node()).removeClass("parent"),!1;a.child(d(),"child").show();b(a.node()).addClass("parent");return!0},modal:function(a){return function(c,d,f){if(d)b("div.dtr-modal-content").empty().append(f());else{var g=function(){l.remove();
b(m).off("keypress.dtr")},l=b('<div class="dtr-modal"/>').append(b('<div class="dtr-modal-display"/>').append(b('<div class="dtr-modal-content"/>').append(f())).append(b('<div class="dtr-modal-close">&times;</div>').click(function(){g()}))).append(b('<div class="dtr-modal-background"/>').click(function(){g()})).appendTo("body");b(m).on("keyup.dtr",function(h){27===h.keyCode&&(h.stopPropagation(),g())})}a&&a.header&&b("div.dtr-modal-content").prepend("<h2>"+a.header(c)+"</h2>")}}};var A={};u.renderer=
{listHiddenNodes:function(){return function(a,c,d){var f=b('<ul data-dtr-index="'+c+'" class="dtr-details"/>'),g=!1;b.each(d,function(l,h){h.hidden&&(b("<li "+(h.className?'class="'+h.className+'"':"")+' data-dtr-index="'+h.columnIndex+'" data-dt-row="'+h.rowIndex+'" data-dt-column="'+h.columnIndex+'"><span class="dtr-title">'+h.title+"</span> </li>").append(b('<span class="dtr-data"/>').append(p(a,h.rowIndex,h.columnIndex))).appendTo(f),g=!0)});return g?f:!1}},listHidden:function(){return function(a,
c,d){return(a=b.map(d,function(f){var g=f.className?'class="'+f.className+'"':"";return f.hidden?"<li "+g+' data-dtr-index="'+f.columnIndex+'" data-dt-row="'+f.rowIndex+'" data-dt-column="'+f.columnIndex+'"><span class="dtr-title">'+f.title+'</span> <span class="dtr-data">'+f.data+"</span></li>":""}).join(""))?b('<ul data-dtr-index="'+c+'" class="dtr-details"/>').append(a):!1}},tableAll:function(a){a=b.extend({tableClass:""},a);return function(c,d,f){c=b.map(f,function(g){return"<tr "+(g.className?
'class="'+g.className+'"':"")+' data-dt-row="'+g.rowIndex+'" data-dt-column="'+g.columnIndex+'"><td>'+g.title+":</td> <td>"+g.data+"</td></tr>"}).join("");return b('<table class="'+a.tableClass+' dtr-details" width="100%"/>').append(c)}}};u.defaults={breakpoints:u.breakpoints,auto:!0,details:{display:u.display.childRow,renderer:u.renderer.listHidden(),target:0,type:"inline"},orthogonal:"display"};var C=b.fn.dataTable.Api;C.register("responsive()",function(){return this});C.register("responsive.index()",
function(a){a=b(a);return{column:a.data("dtr-index"),row:a.parent().data("dtr-index")}});C.register("responsive.rebuild()",function(){return this.iterator("table",function(a){a._responsive&&a._responsive._classLogic()})});C.register("responsive.recalc()",function(){return this.iterator("table",function(a){a._responsive&&(a._responsive._resizeAuto(),a._responsive._resize())})});C.register("responsive.hasHidden()",function(){var a=this.context[0];return a._responsive?-1!==b.inArray(!1,a._responsive._responsiveOnlyHidden()):
!1});C.registerPlural("columns().responsiveHidden()","column().responsiveHidden()",function(){return this.iterator("column",function(a,c){return a._responsive?a._responsive._responsiveOnlyHidden()[c]:!1},1)});u.version="2.2.7";b.fn.dataTable.Responsive=u;b.fn.DataTable.Responsive=u;b(m).on("preInit.dt.dtr",function(a,c,d){"dt"===a.namespace&&(b(c.nTable).hasClass("responsive")||b(c.nTable).hasClass("dt-responsive")||c.oInit.responsive||z.defaults.responsive)&&(a=c.oInit.responsive,!1!==a&&new u(c,
b.isPlainObject(a)?a:{}))});return u});


/*!
 Bootstrap 4 integration for DataTables' Responsive
 ©2016 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(a,b,c){a instanceof String&&(a=String(a));for(var e=a.length,d=0;d<e;d++){var f=a[d];if(b.call(c,f,d,a))return{i:d,v:f}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(a,b,c){if(a==Array.prototype||a==Object.prototype)return a;a[b]=c.value;return a};$jscomp.getGlobal=function(a){a=["object"==typeof globalThis&&globalThis,a,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var b=0;b<a.length;++b){var c=a[b];if(c&&c.Math==Math)return c}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(a,b){var c=$jscomp.propertyToPolyfillSymbol[b];if(null==c)return a[b];c=a[c];return void 0!==c?c:a[b]};
$jscomp.polyfill=function(a,b,c,e){b&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(a,b,c,e):$jscomp.polyfillUnisolated(a,b,c,e))};$jscomp.polyfillUnisolated=function(a,b,c,e){c=$jscomp.global;a=a.split(".");for(e=0;e<a.length-1;e++){var d=a[e];if(!(d in c))return;c=c[d]}a=a[a.length-1];e=c[a];b=b(e);b!=e&&null!=b&&$jscomp.defineProperty(c,a,{configurable:!0,writable:!0,value:b})};
$jscomp.polyfillIsolated=function(a,b,c,e){var d=a.split(".");a=1===d.length;e=d[0];e=!a&&e in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var f=0;f<d.length-1;f++){var g=d[f];if(!(g in e))return;e=e[g]}d=d[d.length-1];c=$jscomp.IS_SYMBOL_NATIVE&&"es6"===c?e[d]:null;b=b(c);null!=b&&(a?$jscomp.defineProperty($jscomp.polyfills,d,{configurable:!0,writable:!0,value:b}):b!==c&&($jscomp.propertyToPolyfillSymbol[d]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(d):$jscomp.POLYFILL_PREFIX+d,d=
$jscomp.propertyToPolyfillSymbol[d],$jscomp.defineProperty(e,d,{configurable:!0,writable:!0,value:b})))};$jscomp.polyfill("Array.prototype.find",function(a){return a?a:function(b,c){return $jscomp.findInternal(this,b,c).v}},"es6","es3");
(function(a){"function"===typeof define&&define.amd?define(["jquery","datatables.net-bs4","datatables.net-responsive"],function(b){return a(b,window,document)}):"object"===typeof exports?module.exports=function(b,c){b||(b=window);c&&c.fn.dataTable||(c=require("datatables.net-bs4")(b,c).$);c.fn.dataTable.Responsive||require("datatables.net-responsive")(b,c);return a(c,b,b.document)}:a(jQuery,window,document)})(function(a,b,c,e){b=a.fn.dataTable;c=b.Responsive.display;var d=c.modal,f=a('<div class="modal fade dtr-bs-modal" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"/></div></div></div>');
c.modal=function(g){return function(k,h,l){if(!a.fn.modal)d(k,h,l);else if(!h){if(g&&g.header){h=f.find("div.modal-header");var m=h.find("button").detach();h.empty().append('<h4 class="modal-title">'+g.header(k)+"</h4>").append(m)}f.find("div.modal-body").empty().append(l());f.appendTo("body").modal()}}};return b.Responsive});


/*!
   Copyright 2017-2020 SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 RowGroup 1.1.2
 ©2017-2020 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(a,c,d){a instanceof String&&(a=String(a));for(var f=a.length,e=0;e<f;e++){var g=a[e];if(c.call(d,g,e,a))return{i:e,v:g}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(a,c,d){a!=Array.prototype&&a!=Object.prototype&&(a[c]=d.value)};$jscomp.getGlobal=function(a){a=["object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global,a];for(var c=0;c<a.length;++c){var d=a[c];if(d&&d.Math==Math)return d}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.polyfill=function(a,c,d,f){if(c){d=$jscomp.global;a=a.split(".");for(f=0;f<a.length-1;f++){var e=a[f];e in d||(d[e]={});d=d[e]}a=a[a.length-1];f=d[a];c=c(f);c!=f&&null!=c&&$jscomp.defineProperty(d,a,{configurable:!0,writable:!0,value:c})}};$jscomp.polyfill("Array.prototype.find",function(a){return a?a:function(a,d){return $jscomp.findInternal(this,a,d).v}},"es6","es3");
(function(a){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(c){return a(c,window,document)}):"object"===typeof exports?module.exports=function(c,d){c||(c=window);d&&d.fn.dataTable||(d=require("datatables.net")(c,d).$);return a(d,c,c.document)}:a(jQuery,window,document)})(function(a,c,d,f){var e=a.fn.dataTable,g=function(b,h){if(!e.versionCheck||!e.versionCheck("1.10.8"))throw"RowGroup requires DataTables 1.10.8 or newer";this.c=a.extend(!0,{},e.defaults.rowGroup,
g.defaults,h);this.s={dt:new e.Api(b)};this.dom={};b=this.s.dt.settings()[0];if(h=b.rowGroup)return h;b.rowGroup=this;this._constructor()};a.extend(g.prototype,{dataSrc:function(b){if(b===f)return this.c.dataSrc;var h=this.s.dt;this.c.dataSrc=b;a(h.table().node()).triggerHandler("rowgroup-datasrc.dt",[h,b]);return this},disable:function(){this.c.enable=!1;return this},enable:function(b){if(!1===b)return this.disable();this.c.enable=!0;return this},enabled:function(){return this.c.enable},_constructor:function(){var b=
this,a=this.s.dt,d=a.settings()[0];a.on("draw.dtrg",function(a,h){b.c.enable&&d===h&&b._draw()});a.on("column-visibility.dt.dtrg responsive-resize.dt.dtrg",function(){b._adjustColspan()});a.on("destroy",function(){a.off(".dtrg")})},_adjustColspan:function(){a("tr."+this.c.className,this.s.dt.table().body()).find("td:visible").attr("colspan",this._colspan())},_colspan:function(){return this.s.dt.columns().visible().reduce(function(b,a){return b+a},0)},_draw:function(){var b=this._group(0,this.s.dt.rows({page:"current"}).indexes());
this._groupDisplay(0,b)},_group:function(b,d){for(var h=a.isArray(this.c.dataSrc)?this.c.dataSrc:[this.c.dataSrc],c=e.ext.oApi._fnGetObjectDataFn(h[b]),g=this.s.dt,l,n,m=[],k=0,p=d.length;k<p;k++){var q=d[k];l=g.row(q).data();l=c(l);if(null===l||l===f)l=this.c.emptyDataGroup;if(n===f||l!==n)m.push({dataPoint:l,rows:[]}),n=l;m[m.length-1].rows.push(q)}if(h[b+1]!==f)for(k=0,p=m.length;k<p;k++)m[k].children=this._group(b+1,m[k].rows);return m},_groupDisplay:function(b,a){for(var d=this.s.dt,c,h=0,e=
a.length;h<e;h++){var f=a[h],g=f.dataPoint,k=f.rows;this.c.startRender&&(c=this.c.startRender.call(this,d.rows(k),g,b),(c=this._rowWrap(c,this.c.startClassName,b))&&c.insertBefore(d.row(k[0]).node()));this.c.endRender&&(c=this.c.endRender.call(this,d.rows(k),g,b),(c=this._rowWrap(c,this.c.endClassName,b))&&c.insertAfter(d.row(k[k.length-1]).node()));f.children&&this._groupDisplay(b+1,f.children)}},_rowWrap:function(b,d,c){if(null===b||""===b)b=this.c.emptyDataGroup;return b===f||null===b?null:("object"===
typeof b&&b.nodeName&&"tr"===b.nodeName.toLowerCase()?a(b):b instanceof a&&b.length&&"tr"===b[0].nodeName.toLowerCase()?b:a("<tr/>").append(a("<td/>").attr("colspan",this._colspan()).append(b))).addClass(this.c.className).addClass(d).addClass("dtrg-level-"+c)}});g.defaults={className:"dtrg-group",dataSrc:0,emptyDataGroup:"No group",enable:!0,endClassName:"dtrg-end",endRender:null,startClassName:"dtrg-start",startRender:function(b,a){return a}};g.version="1.1.2";a.fn.dataTable.RowGroup=g;a.fn.DataTable.RowGroup=
g;e.Api.register("rowGroup()",function(){return this});e.Api.register("rowGroup().disable()",function(){return this.iterator("table",function(a){a.rowGroup&&a.rowGroup.enable(!1)})});e.Api.register("rowGroup().enable()",function(a){return this.iterator("table",function(b){b.rowGroup&&b.rowGroup.enable(a===f?!0:a)})});e.Api.register("rowGroup().enabled()",function(){var a=this.context;return a.length&&a[0].rowGroup?a[0].rowGroup.enabled():!1});e.Api.register("rowGroup().dataSrc()",function(a){return a===
f?this.context[0].rowGroup.dataSrc():this.iterator("table",function(b){b.rowGroup&&b.rowGroup.dataSrc(a)})});a(d).on("preInit.dt.dtrg",function(b,d,c){"dt"===b.namespace&&(b=d.oInit.rowGroup,c=e.defaults.rowGroup,b||c)&&(c=a.extend({},c,b),!1!==b&&new g(d,c))});return g});


/*!
 Bootstrap 4 styling wrapper for RowGroup
 ©2018 SpryMedia Ltd - datatables.net/license
*/
(function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net-bs4","datatables.net-rowgroup"],function(a){return c(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||(a=window);b&&b.fn.dataTable||(b=require("datatables.net-bs4")(a,b).$);b.fn.dataTable.RowGroup||require("datatables.net-rowgroup")(a,b);return c(b,a,a.document)}:c(jQuery,window,document)})(function(c,a,b,d){return c.fn.dataTable});


/*!
   Copyright 2015-2020 SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 RowReorder 1.2.7
 2015-2020 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(a,f,d){a instanceof String&&(a=String(a));for(var k=a.length,g=0;g<k;g++){var h=a[g];if(f.call(d,h,g,a))return{i:g,v:h}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(a,f,d){a!=Array.prototype&&a!=Object.prototype&&(a[f]=d.value)};$jscomp.getGlobal=function(a){a=["object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global,a];for(var f=0;f<a.length;++f){var d=a[f];if(d&&d.Math==Math)return d}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.polyfill=function(a,f,d,k){if(f){d=$jscomp.global;a=a.split(".");for(k=0;k<a.length-1;k++){var g=a[k];g in d||(d[g]={});d=d[g]}a=a[a.length-1];k=d[a];f=f(k);f!=k&&null!=f&&$jscomp.defineProperty(d,a,{configurable:!0,writable:!0,value:f})}};$jscomp.polyfill("Array.prototype.find",function(a){return a?a:function(a,d){return $jscomp.findInternal(this,a,d).v}},"es6","es3");
(function(a){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(f){return a(f,window,document)}):"object"===typeof exports?module.exports=function(f,d){f||(f=window);d&&d.fn.dataTable||(d=require("datatables.net")(f,d).$);return a(d,f,f.document)}:a(jQuery,window,document)})(function(a,f,d,k){var g=a.fn.dataTable,h=function(b,e){if(!g.versionCheck||!g.versionCheck("1.10.8"))throw"DataTables RowReorder requires DataTables 1.10.8 or newer";this.c=a.extend(!0,{},g.defaults.rowReorder,
h.defaults,e);this.s={bodyTop:null,dt:new g.Api(b),getDataFn:g.ext.oApi._fnGetObjectDataFn(this.c.dataSrc),middles:null,scroll:{},scrollInterval:null,setDataFn:g.ext.oApi._fnSetObjectDataFn(this.c.dataSrc),start:{top:0,left:0,offsetTop:0,offsetLeft:0,nodes:[]},windowHeight:0,documentOuterHeight:0,domCloneOuterHeight:0};this.dom={clone:null,dtScroll:a("div.dataTables_scrollBody",this.s.dt.table().container())};b=this.s.dt.settings()[0];if(e=b.rowreorder)return e;this.dom.dtScroll.length||(this.dom.dtScroll=
a(this.s.dt.table().container(),"tbody"));b.rowreorder=this;this._constructor()};a.extend(h.prototype,{_constructor:function(){var b=this,e=this.s.dt,c=a(e.table().node());"static"===c.css("position")&&c.css("position","relative");a(e.table().container()).on("mousedown.rowReorder touchstart.rowReorder",this.c.selector,function(c){if(b.c.enable){if(a(c.target).is(b.c.excludedChildren))return!0;var d=a(this).closest("tr"),f=e.row(d);if(f.any())return b._emitEvent("pre-row-reorder",{node:f.node(),index:f.index()}),
b._mouseDown(c,d),!1}});e.on("destroy.rowReorder",function(){a(e.table().container()).off(".rowReorder");e.off(".rowReorder")})},_cachePositions:function(){var b=this.s.dt,e=a(b.table().node()).find("thead").outerHeight(),c=a.unique(b.rows({page:"current"}).nodes().toArray());c=a.map(c,function(b,c){c=a(b).position().top-e;return(c+c+a(b).outerHeight())/2});this.s.middles=c;this.s.bodyTop=a(b.table().body()).offset().top;this.s.windowHeight=a(f).height();this.s.documentOuterHeight=a(d).outerHeight()},
_clone:function(b){var e=a(this.s.dt.table().node().cloneNode(!1)).addClass("dt-rowReorder-float").append("<tbody/>").append(b.clone(!1)),c=b.outerWidth(),d=b.outerHeight(),f=b.children().map(function(){return a(this).width()});e.width(c).height(d).find("tr").children().each(function(a){this.style.width=f[a]+"px"});e.appendTo("body");this.dom.clone=e;this.s.domCloneOuterHeight=e.outerHeight()},_clonePosition:function(a){var b=this.s.start,c=this._eventToPage(a,"Y")-b.top;a=this._eventToPage(a,"X")-
b.left;var d=this.c.snapX;c+=b.offsetTop;b=!0===d?b.offsetLeft:"number"===typeof d?b.offsetLeft+d:a+b.offsetLeft;0>c?c=0:c+this.s.domCloneOuterHeight>this.s.documentOuterHeight&&(c=this.s.documentOuterHeight-this.s.domCloneOuterHeight);this.dom.clone.css({top:c,left:b})},_emitEvent:function(b,e){this.s.dt.iterator("table",function(c,d){a(c.nTable).triggerHandler(b+".dt",e)})},_eventToPage:function(a,e){return-1!==a.type.indexOf("touch")?a.originalEvent.touches[0]["page"+e]:a["page"+e]},_mouseDown:function(b,
e){var c=this,w=this.s.dt,g=this.s.start,n=e.offset();g.top=this._eventToPage(b,"Y");g.left=this._eventToPage(b,"X");g.offsetTop=n.top;g.offsetLeft=n.left;g.nodes=a.unique(w.rows({page:"current"}).nodes().toArray());this._cachePositions();this._clone(e);this._clonePosition(b);this.dom.target=e;e.addClass("dt-rowReorder-moving");a(d).on("mouseup.rowReorder touchend.rowReorder",function(a){c._mouseUp(a)}).on("mousemove.rowReorder touchmove.rowReorder",function(a){c._mouseMove(a)});a(f).width()===a(d).width()&&
a(d.body).addClass("dt-rowReorder-noOverflow");b=this.dom.dtScroll;this.s.scroll={windowHeight:a(f).height(),windowWidth:a(f).width(),dtTop:b.length?b.offset().top:null,dtLeft:b.length?b.offset().left:null,dtHeight:b.length?b.outerHeight():null,dtWidth:b.length?b.outerWidth():null}},_mouseMove:function(b){this._clonePosition(b);for(var e=this._eventToPage(b,"Y")-this.s.bodyTop,c=this.s.middles,d=null,f=this.s.dt,g=0,m=c.length;g<m;g++)if(e<c[g]){d=g;break}null===d&&(d=c.length);if(null===this.s.lastInsert||
this.s.lastInsert!==d)e=a.unique(f.rows({page:"current"}).nodes().toArray()),d>this.s.lastInsert?this.dom.target.insertAfter(e[d-1]):this.dom.target.insertBefore(e[d]),this._cachePositions(),this.s.lastInsert=d;this._shiftScroll(b)},_mouseUp:function(b){var e=this,c=this.s.dt,f,g=this.c.dataSrc;this.dom.clone.remove();this.dom.clone=null;this.dom.target.removeClass("dt-rowReorder-moving");a(d).off(".rowReorder");a(d.body).removeClass("dt-rowReorder-noOverflow");clearInterval(this.s.scrollInterval);
this.s.scrollInterval=null;var n=this.s.start.nodes,m=a.unique(c.rows({page:"current"}).nodes().toArray()),k={},h=[],p=[],q=this.s.getDataFn,x=this.s.setDataFn;var l=0;for(f=n.length;l<f;l++)if(n[l]!==m[l]){var r=c.row(m[l]).id(),y=c.row(m[l]).data(),t=c.row(n[l]).data();r&&(k[r]=q(t));h.push({node:m[l],oldData:q(y),newData:q(t),newPosition:l,oldPosition:a.inArray(m[l],n)});p.push(m[l])}var u=[h,{dataSrc:g,nodes:p,values:k,triggerRow:c.row(this.dom.target),originalEvent:b}];this._emitEvent("row-reorder",
u);var v=function(){if(e.c.update){l=0;for(f=h.length;l<f;l++){var a=c.row(h[l].node).data();x(a,h[l].newData);c.columns().every(function(){this.dataSrc()===g&&c.cell(h[l].node,this.index()).invalidate("data")})}e._emitEvent("row-reordered",u);c.draw(!1)}};this.c.editor?(this.c.enable=!1,this.c.editor.edit(p,!1,a.extend({submit:"changed"},this.c.formOptions)).multiSet(g,k).one("preSubmitCancelled.rowReorder",function(){e.c.enable=!0;e.c.editor.off(".rowReorder");c.draw(!1)}).one("submitUnsuccessful.rowReorder",
function(){c.draw(!1)}).one("submitSuccess.rowReorder",function(){v()}).one("submitComplete",function(){e.c.enable=!0;e.c.editor.off(".rowReorder")}).submit()):v()},_shiftScroll:function(b){var e=this,c=this.s.scroll,g=!1,h=b.pageY-d.body.scrollTop,k,m;h<a(f).scrollTop()+65?k=-5:h>c.windowHeight+a(f).scrollTop()-65&&(k=5);null!==c.dtTop&&b.pageY<c.dtTop+65?m=-5:null!==c.dtTop&&b.pageY>c.dtTop+c.dtHeight-65&&(m=5);k||m?(c.windowVert=k,c.dtVert=m,g=!0):this.s.scrollInterval&&(clearInterval(this.s.scrollInterval),
this.s.scrollInterval=null);!this.s.scrollInterval&&g&&(this.s.scrollInterval=setInterval(function(){if(c.windowVert){var b=a(d).scrollTop();a(d).scrollTop(b+c.windowVert);b!==a(d).scrollTop()&&(b=parseFloat(e.dom.clone.css("top")),e.dom.clone.css("top",b+c.windowVert))}c.dtVert&&(b=e.dom.dtScroll[0],c.dtVert&&(b.scrollTop+=c.dtVert))},20))}});h.defaults={dataSrc:0,editor:null,enable:!0,formOptions:{},selector:"td:first-child",snapX:!1,update:!0,excludedChildren:"a"};var p=a.fn.dataTable.Api;p.register("rowReorder()",
function(){return this});p.register("rowReorder.enable()",function(a){a===k&&(a=!0);return this.iterator("table",function(b){b.rowreorder&&(b.rowreorder.c.enable=a)})});p.register("rowReorder.disable()",function(){return this.iterator("table",function(a){a.rowreorder&&(a.rowreorder.c.enable=!1)})});h.version="1.2.6";a.fn.dataTable.RowReorder=h;a.fn.DataTable.RowReorder=h;a(d).on("init.dt.dtr",function(b,d,c){"dt"===b.namespace&&(b=d.oInit.rowReorder,c=g.defaults.rowReorder,b||c)&&(c=a.extend({},b,
c),!1!==b&&new h(d,c))});return h});


/*!
 Bootstrap 4 styling wrapper for RowReorder
 ©2018 SpryMedia Ltd - datatables.net/license
*/
(function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net-bs4","datatables.net-rowreorder"],function(a){return c(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||(a=window);b&&b.fn.dataTable||(b=require("datatables.net-bs4")(a,b).$);b.fn.dataTable.RowReorder||require("datatables.net-rowreorder")(a,b);return c(b,a,a.document)}:c(jQuery,window,document)})(function(c,a,b,d){return c.fn.dataTable});


/*!
   Copyright 2011-2020 SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 Scroller 2.0.3
 ©2011-2020 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(d,f,g){d instanceof String&&(d=String(d));for(var h=d.length,k=0;k<h;k++){var m=d[k];if(f.call(g,m,k,d))return{i:k,v:m}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(d,f,g){if(d==Array.prototype||d==Object.prototype)return d;d[f]=g.value;return d};$jscomp.getGlobal=function(d){d=["object"==typeof globalThis&&globalThis,d,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var f=0;f<d.length;++f){var g=d[f];if(g&&g.Math==Math)return g}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(d,f){var g=$jscomp.propertyToPolyfillSymbol[f];if(null==g)return d[f];g=d[g];return void 0!==g?g:d[f]};
$jscomp.polyfill=function(d,f,g,h){f&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(d,f,g,h):$jscomp.polyfillUnisolated(d,f,g,h))};$jscomp.polyfillUnisolated=function(d,f,g,h){g=$jscomp.global;d=d.split(".");for(h=0;h<d.length-1;h++){var k=d[h];if(!(k in g))return;g=g[k]}d=d[d.length-1];h=g[d];f=f(h);f!=h&&null!=f&&$jscomp.defineProperty(g,d,{configurable:!0,writable:!0,value:f})};
$jscomp.polyfillIsolated=function(d,f,g,h){var k=d.split(".");d=1===k.length;h=k[0];h=!d&&h in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var m=0;m<k.length-1;m++){var q=k[m];if(!(q in h))return;h=h[q]}k=k[k.length-1];g=$jscomp.IS_SYMBOL_NATIVE&&"es6"===g?h[k]:null;f=f(g);null!=f&&(d?$jscomp.defineProperty($jscomp.polyfills,k,{configurable:!0,writable:!0,value:f}):f!==g&&($jscomp.propertyToPolyfillSymbol[k]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(k):$jscomp.POLYFILL_PREFIX+k,k=
$jscomp.propertyToPolyfillSymbol[k],$jscomp.defineProperty(h,k,{configurable:!0,writable:!0,value:f})))};$jscomp.polyfill("Array.prototype.find",function(d){return d?d:function(f,g){return $jscomp.findInternal(this,f,g).v}},"es6","es3");
(function(d){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(f){return d(f,window,document)}):"object"===typeof exports?module.exports=function(f,g){f||(f=window);g&&g.fn.dataTable||(g=require("datatables.net")(f,g).$);return d(g,f,f.document)}:d(jQuery,window,document)})(function(d,f,g,h){var k=d.fn.dataTable,m=function(a,b){this instanceof m?(b===h&&(b={}),a=d.fn.dataTable.Api(a),this.s={dt:a.settings()[0],dtApi:a,tableTop:0,tableBottom:0,redrawTop:0,redrawBottom:0,
autoHeight:!0,viewportRows:0,stateTO:null,stateSaveThrottle:function(){},drawTO:null,heights:{jump:null,page:null,virtual:null,scroll:null,row:null,viewport:null,labelFactor:1},topRowFloat:0,scrollDrawDiff:null,loaderVisible:!1,forceReposition:!1,baseRowTop:0,baseScrollTop:0,mousedown:!1,lastScrollTop:0},this.s=d.extend(this.s,m.oDefaults,b),this.s.heights.row=this.s.rowHeight,this.dom={force:g.createElement("div"),label:d('<div class="dts_label">0</div>'),scroller:null,table:null,loader:null},this.s.dt.oScroller||
(this.s.dt.oScroller=this,this.construct())):alert("Scroller warning: Scroller must be initialised with the 'new' keyword.")};d.extend(m.prototype,{measure:function(a){this.s.autoHeight&&this._calcRowHeight();var b=this.s.heights;b.row&&(b.viewport=this._parseHeight(d(this.dom.scroller).css("max-height")),this.s.viewportRows=parseInt(b.viewport/b.row,10)+1,this.s.dt._iDisplayLength=this.s.viewportRows*this.s.displayBuffer);var c=this.dom.label.outerHeight();b.labelFactor=(b.viewport-c)/b.scroll;(a===
h||a)&&this.s.dt.oInstance.fnDraw(!1)},pageInfo:function(){var a=this.dom.scroller.scrollTop,b=this.s.dt.fnRecordsDisplay(),c=Math.ceil(this.pixelsToRow(a+this.s.heights.viewport,!1,this.s.ani));return{start:Math.floor(this.pixelsToRow(a,!1,this.s.ani)),end:b<c?b-1:c-1}},pixelsToRow:function(a,b,c){a-=this.s.baseScrollTop;c=c?(this._domain("physicalToVirtual",this.s.baseScrollTop)+a)/this.s.heights.row:a/this.s.heights.row+this.s.baseRowTop;return b||b===h?parseInt(c,10):c},rowToPixels:function(a,
b,c){a-=this.s.baseRowTop;c=c?this._domain("virtualToPhysical",this.s.baseScrollTop):this.s.baseScrollTop;c+=a*this.s.heights.row;return b||b===h?parseInt(c,10):c},scrollToRow:function(a,b){var c=this,e=!1,l=this.rowToPixels(a),n=a-(this.s.displayBuffer-1)/2*this.s.viewportRows;0>n&&(n=0);(l>this.s.redrawBottom||l<this.s.redrawTop)&&this.s.dt._iDisplayStart!==n&&(e=!0,l=this._domain("virtualToPhysical",a*this.s.heights.row),this.s.redrawTop<l&&l<this.s.redrawBottom&&(this.s.forceReposition=!0,b=!1));
b===h||b?(this.s.ani=e,d(this.dom.scroller).animate({scrollTop:l},function(){setTimeout(function(){c.s.ani=!1},250)})):d(this.dom.scroller).scrollTop(l)},construct:function(){var a=this,b=this.s.dtApi;if(this.s.dt.oFeatures.bPaginate){this.dom.force.style.position="relative";this.dom.force.style.top="0px";this.dom.force.style.left="0px";this.dom.force.style.width="1px";this.dom.scroller=d("div."+this.s.dt.oClasses.sScrollBody,this.s.dt.nTableWrapper)[0];this.dom.scroller.appendChild(this.dom.force);
this.dom.scroller.style.position="relative";this.dom.table=d(">table",this.dom.scroller)[0];this.dom.table.style.position="absolute";this.dom.table.style.top="0px";this.dom.table.style.left="0px";d(b.table().container()).addClass("dts DTS");this.s.loadingIndicator&&(this.dom.loader=d('<div class="dataTables_processing dts_loading">'+this.s.dt.oLanguage.sLoadingRecords+"</div>").css("display","none"),d(this.dom.scroller.parentNode).css("position","relative").append(this.dom.loader));this.dom.label.appendTo(this.dom.scroller);
this.s.heights.row&&"auto"!=this.s.heights.row&&(this.s.autoHeight=!1);this.s.ingnoreScroll=!0;d(this.dom.scroller).on("scroll.dt-scroller",function(l){a._scroll.call(a)});d(this.dom.scroller).on("touchstart.dt-scroller",function(){a._scroll.call(a)});d(this.dom.scroller).on("mousedown.dt-scroller",function(){a.s.mousedown=!0}).on("mouseup.dt-scroller",function(){a.s.labelVisible=!1;a.s.mousedown=!1;a.dom.label.css("display","none")});d(f).on("resize.dt-scroller",function(){a.measure(!1);a._info()});
var c=!0,e=b.state.loaded();b.on("stateSaveParams.scroller",function(l,n,p){c&&e?(p.scroller=e.scroller,c=!1):p.scroller={topRow:a.s.topRowFloat,baseScrollTop:a.s.baseScrollTop,baseRowTop:a.s.baseRowTop,scrollTop:a.s.lastScrollTop}});e&&e.scroller&&(this.s.topRowFloat=e.scroller.topRow,this.s.baseScrollTop=e.scroller.baseScrollTop,this.s.baseRowTop=e.scroller.baseRowTop);this.measure(!1);a.s.stateSaveThrottle=a.s.dt.oApi._fnThrottle(function(){a.s.dtApi.state.save()},500);b.on("init.scroller",function(){a.measure(!1);
a.s.scrollType="jump";a._draw();b.on("draw.scroller",function(){a._draw()})});b.on("preDraw.dt.scroller",function(){a._scrollForce()});b.on("destroy.scroller",function(){d(f).off("resize.dt-scroller");d(a.dom.scroller).off(".dt-scroller");d(a.s.dt.nTable).off(".scroller");d(a.s.dt.nTableWrapper).removeClass("DTS");d("div.DTS_Loading",a.dom.scroller.parentNode).remove();a.dom.table.style.position="";a.dom.table.style.top="";a.dom.table.style.left=""})}else this.s.dt.oApi._fnLog(this.s.dt,0,"Pagination must be enabled for Scroller")},
_calcRowHeight:function(){var a=this.s.dt,b=a.nTable,c=b.cloneNode(!1),e=d("<tbody/>").appendTo(c),l=d('<div class="'+a.oClasses.sWrapper+' DTS"><div class="'+a.oClasses.sScrollWrapper+'"><div class="'+a.oClasses.sScrollBody+'"></div></div></div>');d("tbody tr:lt(4)",b).clone().appendTo(e);var n=d("tr",e).length;if(1===n)e.prepend("<tr><td>&#160;</td></tr>"),e.append("<tr><td>&#160;</td></tr>");else for(;3>n;n++)e.append("<tr><td>&#160;</td></tr>");d("div."+a.oClasses.sScrollBody,l).append(c);a=this.s.dt.nHolding||
b.parentNode;d(a).is(":visible")||(a="body");l.find("input").removeAttr("name");l.appendTo(a);this.s.heights.row=d("tr",e).eq(1).outerHeight();l.remove()},_draw:function(){var a=this,b=this.s.heights,c=this.dom.scroller.scrollTop,e=d(this.s.dt.nTable).height(),l=this.s.dt._iDisplayStart,n=this.s.dt._iDisplayLength,p=this.s.dt.fnRecordsDisplay();this.s.skip=!0;!this.s.dt.bSorted&&!this.s.dt.bFiltered||0!==l||this.s.dt._drawHold||(this.s.topRowFloat=0);c="jump"===this.s.scrollType?this._domain("virtualToPhysical",
this.s.topRowFloat*b.row):c;this.s.baseScrollTop=c;this.s.baseRowTop=this.s.topRowFloat;var r=c-(this.s.topRowFloat-l)*b.row;0===l?r=0:l+n>=p&&(r=b.scroll-e);this.dom.table.style.top=r+"px";this.s.tableTop=r;this.s.tableBottom=e+this.s.tableTop;e=(c-this.s.tableTop)*this.s.boundaryScale;this.s.redrawTop=c-e;this.s.redrawBottom=c+e>b.scroll-b.viewport-b.row?b.scroll-b.viewport-b.row:c+e;this.s.skip=!1;this.s.dt.oFeatures.bStateSave&&null!==this.s.dt.oLoadedState&&"undefined"!=typeof this.s.dt.oLoadedState.scroller?
((b=!this.s.dt.sAjaxSource&&!a.s.dt.ajax||this.s.dt.oFeatures.bServerSide?!1:!0)&&2==this.s.dt.iDraw||!b&&1==this.s.dt.iDraw)&&setTimeout(function(){d(a.dom.scroller).scrollTop(a.s.dt.oLoadedState.scroller.scrollTop);setTimeout(function(){a.s.ingnoreScroll=!1},0)},0):a.s.ingnoreScroll=!1;this.s.dt.oFeatures.bInfo&&setTimeout(function(){a._info.call(a)},0);this.dom.loader&&this.s.loaderVisible&&(this.dom.loader.css("display","none"),this.s.loaderVisible=!1)},_domain:function(a,b){var c=this.s.heights;
if(c.virtual===c.scroll||1E4>b)return b;if("virtualToPhysical"===a&&b>=c.virtual-1E4)return a=c.virtual-b,c.scroll-a;if("physicalToVirtual"===a&&b>=c.scroll-1E4)return a=c.scroll-b,c.virtual-a;c=(c.virtual-1E4-1E4)/(c.scroll-1E4-1E4);var e=1E4-1E4*c;return"virtualToPhysical"===a?(b-e)/c:c*b+e},_info:function(){if(this.s.dt.oFeatures.bInfo){var a=this.s.dt,b=a.oLanguage,c=this.dom.scroller.scrollTop,e=Math.floor(this.pixelsToRow(c,!1,this.s.ani)+1),l=a.fnRecordsTotal(),n=a.fnRecordsDisplay();c=Math.ceil(this.pixelsToRow(c+
this.s.heights.viewport,!1,this.s.ani));c=n<c?n:c;var p=a.fnFormatNumber(e),r=a.fnFormatNumber(c),t=a.fnFormatNumber(l),u=a.fnFormatNumber(n);p=0===a.fnRecordsDisplay()&&a.fnRecordsDisplay()==a.fnRecordsTotal()?b.sInfoEmpty+b.sInfoPostFix:0===a.fnRecordsDisplay()?b.sInfoEmpty+" "+b.sInfoFiltered.replace("_MAX_",t)+b.sInfoPostFix:a.fnRecordsDisplay()==a.fnRecordsTotal()?b.sInfo.replace("_START_",p).replace("_END_",r).replace("_MAX_",t).replace("_TOTAL_",u)+b.sInfoPostFix:b.sInfo.replace("_START_",
p).replace("_END_",r).replace("_MAX_",t).replace("_TOTAL_",u)+" "+b.sInfoFiltered.replace("_MAX_",a.fnFormatNumber(a.fnRecordsTotal()))+b.sInfoPostFix;(b=b.fnInfoCallback)&&(p=b.call(a.oInstance,a,e,c,l,n,p));e=a.aanFeatures.i;if("undefined"!=typeof e)for(l=0,n=e.length;l<n;l++)d(e[l]).html(p);d(a.nTable).triggerHandler("info.dt")}},_parseHeight:function(a){var b,c=/^([+-]?(?:\d+(?:\.\d+)?|\.\d+))(px|em|rem|vh)$/.exec(a);if(null===c)return 0;a=parseFloat(c[1]);c=c[2];"px"===c?b=a:"vh"===c?b=a/100*
d(f).height():"rem"===c?b=a*parseFloat(d(":root").css("font-size")):"em"===c&&(b=a*parseFloat(d("body").css("font-size")));return b?b:0},_scroll:function(){var a=this,b=this.s.heights,c=this.dom.scroller.scrollTop;if(!this.s.skip&&!this.s.ingnoreScroll&&c!==this.s.lastScrollTop)if(this.s.dt.bFiltered||this.s.dt.bSorted)this.s.lastScrollTop=0;else{this._info();clearTimeout(this.s.stateTO);this.s.stateTO=setTimeout(function(){a.s.dtApi.state.save()},250);this.s.scrollType=Math.abs(c-this.s.lastScrollTop)>
b.viewport?"jump":"cont";this.s.topRowFloat="cont"===this.s.scrollType?this.pixelsToRow(c,!1,!1):this._domain("physicalToVirtual",c)/b.row;0>this.s.topRowFloat&&(this.s.topRowFloat=0);if(this.s.forceReposition||c<this.s.redrawTop||c>this.s.redrawBottom){var e=Math.ceil((this.s.displayBuffer-1)/2*this.s.viewportRows);e=parseInt(this.s.topRowFloat,10)-e;this.s.forceReposition=!1;0>=e?e=0:e+this.s.dt._iDisplayLength>this.s.dt.fnRecordsDisplay()?(e=this.s.dt.fnRecordsDisplay()-this.s.dt._iDisplayLength,
0>e&&(e=0)):0!==e%2&&e++;this.s.targetTop=e;e!=this.s.dt._iDisplayStart&&(this.s.tableTop=d(this.s.dt.nTable).offset().top,this.s.tableBottom=d(this.s.dt.nTable).height()+this.s.tableTop,e=function(){a.s.dt._iDisplayStart=a.s.targetTop;a.s.dt.oApi._fnDraw(a.s.dt)},this.s.dt.oFeatures.bServerSide?(this.s.forceReposition=!0,clearTimeout(this.s.drawTO),this.s.drawTO=setTimeout(e,this.s.serverWait)):e(),this.dom.loader&&!this.s.loaderVisible&&(this.dom.loader.css("display","block"),this.s.loaderVisible=
!0))}else this.s.topRowFloat=this.pixelsToRow(c,!1,!0);this.s.lastScrollTop=c;this.s.stateSaveThrottle();"jump"===this.s.scrollType&&this.s.mousedown&&(this.s.labelVisible=!0);this.s.labelVisible&&this.dom.label.html(this.s.dt.fnFormatNumber(parseInt(this.s.topRowFloat,10)+1)).css("top",c+c*b.labelFactor).css("display","block")}},_scrollForce:function(){var a=this.s.heights;a.virtual=a.row*this.s.dt.fnRecordsDisplay();a.scroll=a.virtual;1E6<a.scroll&&(a.scroll=1E6);this.dom.force.style.height=a.scroll>
this.s.heights.row?a.scroll+"px":this.s.heights.row+"px"}});m.defaults={boundaryScale:.5,displayBuffer:9,loadingIndicator:!1,rowHeight:"auto",serverWait:200};m.oDefaults=m.defaults;m.version="2.0.3";d(g).on("preInit.dt.dtscroller",function(a,b){if("dt"===a.namespace){a=b.oInit.scroller;var c=k.defaults.scroller;if(a||c)c=d.extend({},a,c),!1!==a&&new m(b,c)}});d.fn.dataTable.Scroller=m;d.fn.DataTable.Scroller=m;var q=d.fn.dataTable.Api;q.register("scroller()",function(){return this});q.register("scroller().rowToPixels()",
function(a,b,c){var e=this.context;if(e.length&&e[0].oScroller)return e[0].oScroller.rowToPixels(a,b,c)});q.register("scroller().pixelsToRow()",function(a,b,c){var e=this.context;if(e.length&&e[0].oScroller)return e[0].oScroller.pixelsToRow(a,b,c)});q.register(["scroller().scrollToRow()","scroller.toPosition()"],function(a,b){this.iterator("table",function(c){c.oScroller&&c.oScroller.scrollToRow(a,b)});return this});q.register("row().scrollTo()",function(a){var b=this;this.iterator("row",function(c,
e){c.oScroller&&(e=b.rows({order:"applied",search:"applied"}).indexes().indexOf(e),c.oScroller.scrollToRow(e,a))});return this});q.register("scroller.measure()",function(a){this.iterator("table",function(b){b.oScroller&&b.oScroller.measure(a)});return this});q.register("scroller.page()",function(){var a=this.context;if(a.length&&a[0].oScroller)return a[0].oScroller.pageInfo()});return m});


/*!
 Bootstrap 4 styling wrapper for Scroller
 ©2018 SpryMedia Ltd - datatables.net/license
*/
(function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net-bs4","datatables.net-scroller"],function(a){return c(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||(a=window);b&&b.fn.dataTable||(b=require("datatables.net-bs4")(a,b).$);b.fn.dataTable.Scroller||require("datatables.net-scroller")(a,b);return c(b,a,a.document)}:c(jQuery,window,document)})(function(c,a,b,d){return c.fn.dataTable});


/*!
 SearchBuilder 1.0.1
 ©2020 SpryMedia Ltd - datatables.net/license/mit
 DateTime picker for DataTables.net v1.0.1

 ©2020 SpryMedia Ltd, all rights reserved.
 License: MIT datatables.net/license/mit
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(m,r,t){m instanceof String&&(m=String(m));for(var f=m.length,u=0;u<f;u++){var B=m[u];if(r.call(t,B,u,m))return{i:u,v:B}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(m,r,t){if(m==Array.prototype||m==Object.prototype)return m;m[r]=t.value;return m};$jscomp.getGlobal=function(m){m=["object"==typeof globalThis&&globalThis,m,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var r=0;r<m.length;++r){var t=m[r];if(t&&t.Math==Math)return t}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(m,r){var t=$jscomp.propertyToPolyfillSymbol[r];if(null==t)return m[r];t=m[t];return void 0!==t?t:m[r]};
$jscomp.polyfill=function(m,r,t,f){r&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(m,r,t,f):$jscomp.polyfillUnisolated(m,r,t,f))};$jscomp.polyfillUnisolated=function(m,r,t,f){t=$jscomp.global;m=m.split(".");for(f=0;f<m.length-1;f++){var u=m[f];if(!(u in t))return;t=t[u]}m=m[m.length-1];f=t[m];r=r(f);r!=f&&null!=r&&$jscomp.defineProperty(t,m,{configurable:!0,writable:!0,value:r})};
$jscomp.polyfillIsolated=function(m,r,t,f){var u=m.split(".");m=1===u.length;f=u[0];f=!m&&f in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var B=0;B<u.length-1;B++){var x=u[B];if(!(x in f))return;f=f[x]}u=u[u.length-1];t=$jscomp.IS_SYMBOL_NATIVE&&"es6"===t?f[u]:null;r=r(t);null!=r&&(m?$jscomp.defineProperty($jscomp.polyfills,u,{configurable:!0,writable:!0,value:r}):r!==t&&($jscomp.propertyToPolyfillSymbol[u]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(u):$jscomp.POLYFILL_PREFIX+u,u=
$jscomp.propertyToPolyfillSymbol[u],$jscomp.defineProperty(f,u,{configurable:!0,writable:!0,value:r})))};$jscomp.polyfill("Array.prototype.find",function(m){return m?m:function(r,t){return $jscomp.findInternal(this,r,t).v}},"es6","es3");$jscomp.arrayIteratorImpl=function(m){var r=0;return function(){return r<m.length?{done:!1,value:m[r++]}:{done:!0}}};$jscomp.arrayIterator=function(m){return{next:$jscomp.arrayIteratorImpl(m)}};$jscomp.initSymbol=function(){};
$jscomp.polyfill("Symbol",function(m){if(m)return m;var r=function(u,B){this.$jscomp$symbol$id_=u;$jscomp.defineProperty(this,"description",{configurable:!0,writable:!0,value:B})};r.prototype.toString=function(){return this.$jscomp$symbol$id_};var t=0,f=function(u){if(this instanceof f)throw new TypeError("Symbol is not a constructor");return new r("jscomp_symbol_"+(u||"")+"_"+t++,u)};return f},"es6","es3");$jscomp.initSymbolIterator=function(){};
$jscomp.polyfill("Symbol.iterator",function(m){if(m)return m;m=Symbol("Symbol.iterator");for(var r="Array Int8Array Uint8Array Uint8ClampedArray Int16Array Uint16Array Int32Array Uint32Array Float32Array Float64Array".split(" "),t=0;t<r.length;t++){var f=$jscomp.global[r[t]];"function"===typeof f&&"function"!=typeof f.prototype[m]&&$jscomp.defineProperty(f.prototype,m,{configurable:!0,writable:!0,value:function(){return $jscomp.iteratorPrototype($jscomp.arrayIteratorImpl(this))}})}return m},"es6",
"es3");$jscomp.initSymbolAsyncIterator=function(){};$jscomp.iteratorPrototype=function(m){m={next:m};m[Symbol.iterator]=function(){return this};return m};$jscomp.iteratorFromArray=function(m,r){m instanceof String&&(m+="");var t=0,f={next:function(){if(t<m.length){var u=t++;return{value:r(u,m[u]),done:!1}}f.next=function(){return{done:!0,value:void 0}};return f.next()}};f[Symbol.iterator]=function(){return f};return f};
$jscomp.polyfill("Array.prototype.keys",function(m){return m?m:function(){return $jscomp.iteratorFromArray(this,function(r){return r})}},"es6","es3");$jscomp.checkStringArgs=function(m,r,t){if(null==m)throw new TypeError("The 'this' value for String.prototype."+t+" must not be null or undefined");if(r instanceof RegExp)throw new TypeError("First argument to String.prototype."+t+" must not be a regular expression");return m+""};
$jscomp.polyfill("String.prototype.startsWith",function(m){return m?m:function(r,t){var f=$jscomp.checkStringArgs(this,r,"startsWith");r+="";var u=f.length,B=r.length;t=Math.max(0,Math.min(t|0,f.length));for(var x=0;x<B&&t<u;)if(f[t++]!=r[x++])return!1;return x>=B}},"es6","es3");
$jscomp.polyfill("String.prototype.endsWith",function(m){return m?m:function(r,t){var f=$jscomp.checkStringArgs(this,r,"endsWith");r+="";void 0===t&&(t=f.length);t=Math.max(0,Math.min(t|0,f.length));for(var u=r.length;0<u&&0<t;)if(f[--t]!=r[--u])return!1;return 0>=u}},"es6","es3");
(function(){function m(c){f=c;u=c.fn.dataTable}function r(c){n=c;L=c.fn.dataTable}function t(c){w=c;J=c.fn.DataTable}(function(c){"function"===typeof define&&define.amd?define(["jquery"],function(a){return c(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||(a=window);return c(b,a,a.document)}:c(jQuery,window,document)})(function(c,a,b,e){var g=a.moment?a.moment:a.dayjs?a.dayjs:null,k=function(d,h){this.c=c.extend(!0,{},k.defaults,h);h=this.c.classPrefix;var l=this.c.i18n;
if(!g&&"YYYY-MM-DD"!==this.c.format)throw"DateTime: Without momentjs or dayjs only the format 'YYYY-MM-DD' can be used";"string"===typeof this.c.minDate&&(this.c.minDate=new Date(this.c.minDate));"string"===typeof this.c.maxDate&&(this.c.maxDate=new Date(this.c.maxDate));l=c('<div class="'+h+'"><div class="'+h+'-date"><div class="'+h+'-title"><div class="'+h+'-iconLeft"><button>'+l.previous+'</button></div><div class="'+h+'-iconRight"><button>'+l.next+'</button></div><div class="'+h+'-label"><span></span><select class="'+
h+'-month"></select></div><div class="'+h+'-label"><span></span><select class="'+h+'-year"></select></div></div><div class="'+h+'-calendar"></div></div><div class="'+h+'-time"><div class="'+h+'-hours"></div><div class="'+h+'-minutes"></div><div class="'+h+'-seconds"></div></div><div class="'+h+'-error"></div></div>');this.dom={container:l,date:l.find("."+h+"-date"),title:l.find("."+h+"-title"),calendar:l.find("."+h+"-calendar"),time:l.find("."+h+"-time"),error:l.find("."+h+"-error"),input:c(d)};this.s=
{d:null,display:null,minutesRange:null,secondsRange:null,namespace:"dateime-"+k._instance++,parts:{date:null!==this.c.format.match(/[YMD]|L(?!T)|l/),time:null!==this.c.format.match(/[Hhm]|LT|LTS/),seconds:-1!==this.c.format.indexOf("s"),hours12:null!==this.c.format.match(/[haA]/)}};this.dom.container.append(this.dom.date).append(this.dom.time).append(this.dom.error);this.dom.date.append(this.dom.title).append(this.dom.calendar);this._constructor()};c.extend(k.prototype,{destroy:function(){this._hide(!0);
this.dom.container.off().empty();this.dom.input.off(".datetime")},errorMsg:function(d){var h=this.dom.error;d?h.html(d):h.empty();return this},hide:function(){this._hide();return this},max:function(d){this.c.maxDate="string"===typeof d?new Date(d):d;this._optionsTitle();this._setCalander();return this},min:function(d){this.c.minDate="string"===typeof d?new Date(d):d;this._optionsTitle();this._setCalander();return this},owns:function(d){return 0<c(d).parents().filter(this.dom.container).length},val:function(d,
h){if(d===e)return this.s.d;if(d instanceof Date)this.s.d=this._dateToUtc(d);else if(null===d||""===d)this.s.d=null;else if("--now"===d)this.s.d=new Date;else if("string"===typeof d)if(g){var l=g.utc(d,this.c.format,this.c.locale,this.c.strict);this.s.d=l.isValid()?l.toDate():null}else l=d.match(/(\d{4})\-(\d{2})\-(\d{2})/),this.s.d=l?new Date(Date.UTC(l[1],l[2]-1,l[3])):null;if(h||h===e)this.s.d?this._writeOutput():this.dom.input.val(d);this.s.d||(this.s.d=this._dateToUtc(new Date));this.s.display=
new Date(this.s.d.toString());this.s.display.setUTCDate(1);this._setTitle();this._setCalander();this._setTime();return this},_constructor:function(){var d=this,h=this.c.classPrefix,l=function(){d.c.onChange.call(d,d.dom.input.val(),d.s.d,d.dom.input)};this.s.parts.date||this.dom.date.css("display","none");this.s.parts.time||this.dom.time.css("display","none");this.s.parts.seconds||(this.dom.time.children("div."+h+"-seconds").remove(),this.dom.time.children("span").eq(1).remove());this._optionsTitle();
a.allan=this;"hidden"===this.dom.input.attr("type")&&(this.dom.container.addClass("inline"),this.c.attachTo="input",this.val(this.dom.input.val(),!1),this._show());this.dom.input.attr("autocomplete","off").on("focus.datetime click.datetime",function(){d.dom.container.is(":visible")||d.dom.input.is(":disabled")||(d.val(d.dom.input.val(),!1),d._show())}).on("keyup.datetime",function(){d.dom.container.is(":visible")&&d.val(d.dom.input.val(),!1)});this.dom.container.on("change","select",function(){var q=
c(this),p=q.val();q.hasClass(h+"-month")?(d._correctMonth(d.s.display,p),d._setTitle(),d._setCalander()):q.hasClass(h+"-year")?(d.s.display.setUTCFullYear(p),d._setTitle(),d._setCalander()):q.hasClass(h+"-hours")||q.hasClass(h+"-ampm")?(d.s.parts.hours12?(q=1*c(d.dom.container).find("."+h+"-hours").val(),p="pm"===c(d.dom.container).find("."+h+"-ampm").val(),d.s.d.setUTCHours(12!==q||p?p&&12!==q?q+12:q:0)):d.s.d.setUTCHours(p),d._setTime(),d._writeOutput(!0),l()):q.hasClass(h+"-minutes")?(d.s.d.setUTCMinutes(p),
d._setTime(),d._writeOutput(!0),l()):q.hasClass(h+"-seconds")&&(d.s.d.setSeconds(p),d._setTime(),d._writeOutput(!0),l());d.dom.input.focus();d._position()}).on("click",function(q){var p=d.s.d,z=q.target.nodeName.toLowerCase(),y="span"===z?q.target.parentNode:q.target;z=y.nodeName.toLowerCase();if("select"!==z)if(q.stopPropagation(),"button"===z)if(y=c(y),q=y.parent(),q.hasClass("disabled")&&!q.hasClass("range"))y.blur();else if(q.hasClass(h+"-iconLeft"))d.s.display.setUTCMonth(d.s.display.getUTCMonth()-
1),d._setTitle(),d._setCalander(),d.dom.input.focus();else if(q.hasClass(h+"-iconRight"))d._correctMonth(d.s.display,d.s.display.getUTCMonth()+1),d._setTitle(),d._setCalander(),d.dom.input.focus();else{if(y.parents("."+h+"-time").length){z=y.data("value");y=y.data("unit");if("minutes"===y){if(q.hasClass("disabled")&&q.hasClass("range")){d.s.minutesRange=z;d._setTime();return}d.s.minutesRange=null}if("seconds"===y){if(q.hasClass("disabled")&&q.hasClass("range")){d.s.secondsRange=z;d._setTime();return}d.s.secondsRange=
null}if("am"===z)if(12<=p.getUTCHours())z=p.getUTCHours()-12;else return;else if("pm"===z)if(12>p.getUTCHours())z=p.getUTCHours()+12;else return;p["hours"===y?"setUTCHours":"minutes"===y?"setUTCMinutes":"setSeconds"](z);d._setTime();d._writeOutput(!0)}else p||(p=d._dateToUtc(new Date)),p.setUTCDate(1),p.setUTCFullYear(y.data("year")),p.setUTCMonth(y.data("month")),p.setUTCDate(y.data("day")),d._writeOutput(!0),d.s.parts.time?d._setCalander():setTimeout(function(){d._hide()},10);l()}else d.dom.input.focus()})},
_compareDates:function(d,h){return this._dateToUtcString(d)===this._dateToUtcString(h)},_correctMonth:function(d,h){var l=this._daysInMonth(d.getUTCFullYear(),h),q=d.getUTCDate()>l;d.setUTCMonth(h);q&&(d.setUTCDate(l),d.setUTCMonth(h))},_daysInMonth:function(d,h){return[31,0!==d%4||0===d%100&&0!==d%400?28:29,31,30,31,30,31,31,30,31,30,31][h]},_dateToUtc:function(d){return new Date(Date.UTC(d.getFullYear(),d.getMonth(),d.getDate(),d.getHours(),d.getMinutes(),d.getSeconds()))},_dateToUtcString:function(d){return d.getUTCFullYear()+
"-"+this._pad(d.getUTCMonth()+1)+"-"+this._pad(d.getUTCDate())},_hide:function(d){if(d||"hidden"!==this.dom.input.attr("type"))d=this.s.namespace,this.dom.container.detach(),c(a).off("."+d),c(b).off("keydown."+d),c("div.dataTables_scrollBody").off("scroll."+d),c("div.DTE_Body_Content").off("scroll."+d),c("body").off("click."+d)},_hours24To12:function(d){return 0===d?12:12<d?d-12:d},_htmlDay:function(d){if(d.empty)return'<td class="empty"></td>';var h=["selectable"],l=this.c.classPrefix;d.disabled&&
h.push("disabled");d.today&&h.push("now");d.selected&&h.push("selected");return'<td data-day="'+d.day+'" class="'+h.join(" ")+'"><button class="'+l+"-button "+l+'-day"  data-year="'+d.year+'" data-month="'+d.month+'" data-day="'+d.day+'"><span>'+d.day+"</span></button></td>"},_htmlMonth:function(d,h){var l=this._dateToUtc(new Date),q=this._daysInMonth(d,h),p=(new Date(Date.UTC(d,h,1))).getUTCDay(),z=[],y=[];0<this.c.firstDay&&(p-=this.c.firstDay,0>p&&(p+=7));for(var C=q+p,D=C;7<D;)D-=
7;C+=7-D;var E=this.c.minDate;D=this.c.maxDate;E&&(E.setUTCHours(0),E.setUTCMinutes(0),E.setSeconds(0));D&&(D.setUTCHours(23),D.setUTCMinutes(59),D.setSeconds(59));for(var v=0,A=0;v<C;v++){var G=new Date(Date.UTC(d,h,1+(v-p))),K=this.s.d?this._compareDates(G,this.s.d):!1,F=this._compareDates(G,l),N=v<p||v>=q+p,I=E&&G<E||D&&G>D,H=this.c.disableDays;Array.isArray(H)&&-1!==c.inArray(G.getUTCDay(),H)?I=!0:"function"===typeof H&&!0===H(G)&&(I=!0);y.push(this._htmlDay({day:1+(v-p),month:h,year:d,selected:K,
today:F,disabled:I,empty:N}));7===++A&&(this.c.showWeekNumber&&y.unshift(this._htmlWeekOfYear(v-p,h,d)),z.push("<tr>"+y.join("")+"</tr>"),y=[],A=0)}l=this.c.classPrefix;q=l+"-table";this.c.showWeekNumber&&(q+=" weekNumber");E&&(E=E>=new Date(Date.UTC(d,h,1,0,0,0)),this.dom.title.find("div."+l+"-iconLeft").css("display",E?"none":"block"));D&&(d=D<new Date(Date.UTC(d,h+1,1,0,0,0)),this.dom.title.find("div."+l+"-iconRight").css("display",d?"none":"block"));return'<table class="'+q+'"><thead>'+this._htmlMonthHead()+
"</thead><tbody>"+z.join("")+"</tbody></table>"},_htmlMonthHead:function(){var d=[],h=this.c.firstDay,l=this.c.i18n,q=function(z){for(z+=h;7<=z;)z-=7;return l.weekdays[z]};this.c.showWeekNumber&&d.push("<th></th>");for(var p=0;7>p;p++)d.push("<th>"+q(p)+"</th>");return d.join("")},_htmlWeekOfYear:function(d,h,l){d=new Date(l,h,d,0,0,0,0);d.setDate(d.getDate()+4-(d.getDay()||7));return'<td class="'+this.c.classPrefix+'-week">'+Math.ceil(((d-new Date(l,0,1))/864E5+1)/7)+"</td>"},_options:function(d,
h,l){l||(l=h);d=this.dom.container.find("select."+this.c.classPrefix+"-"+d);d.empty();for(var q=0,p=h.length;q<p;q++)d.append('<option value="'+h[q]+'">'+l[q]+"</option>")},_optionSet:function(d,h){var l=this.dom.container.find("select."+this.c.classPrefix+"-"+d);d=l.parent().children("span");l.val(h);h=l.find("option:selected");d.html(0!==h.length?h.text():this.c.i18n.unknown)},_optionsTime:function(d,h,l,q,p){var z=this.c.classPrefix,y=this.dom.container.find("div."+z+"-"+d),C=12===h?function(F){return F}:
this._pad;z=this.c.classPrefix;var D=z+"-table",E=this.c.i18n;if(y.length){var v="";var A=10;var G=function(F,N,I){12===h&&"number"===typeof F&&(12<=l&&(F+=12),12==F?F=0:24==F&&(F=12));var H=l===F||"am"===F&&12>l||"pm"===F&&12<=l?"selected":"";q&&-1===c.inArray(F,q)&&(H+=" disabled");I&&(H+=" "+I);return'<td class="selectable '+H+'"><button class="'+z+"-button "+z+'-day"  data-unit="'+d+'" data-value="'+F+'"><span>'+N+"</span></button></td>"};if(12===h){v+="<tr>";for(p=1;6>=p;p++)v+=
G(p,C(p));v+=G("am",E.amPm[0]);v+="</tr><tr>";for(p=7;12>=p;p++)v+=G(p,C(p));v+=G("pm",E.amPm[1]);v+="</tr>";A=7}else{if(24===h){var K=0;for(A=0;4>A;A++){v+="<tr>";for(p=0;6>p;p++)v+=G(K,C(K)),K++;v+="</tr>"}}else{v+="<tr>";for(A=0;60>A;A+=10)v+=G(A,C(A),"range");p=null!==p?p:10*Math.floor(l/10);v=v+'</tr></tbody></thead><table class="'+(D+" "+D+'-nospace"><tbody><tr>');for(A=p+1;A<p+10;A++)v+=G(A,C(A));v+="</tr>"}A=6}y.empty().append('<table class="'+D+'"><thead><tr><th colspan="'+A+'">'+E[d]+"</th></tr></thead><tbody>"+
v+"</tbody></table>")}},_optionsTitle:function(){var d=this.c.i18n,h=this.c.minDate,l=this.c.maxDate;h=h?h.getFullYear():null;l=l?l.getFullYear():null;h=null!==h?h:(new Date).getFullYear()-this.c.yearRange;l=null!==l?l:(new Date).getFullYear()+this.c.yearRange;this._options("month",this._range(0,11),d.months);this._options("year",this._range(h,l))},_pad:function(d){return 10>d?"0"+d:d},_position:function(){var d="input"===this.c.attachTo?this.dom.input.position():this.dom.input.offset(),h=this.dom.container,
l=this.dom.input.outerHeight();if(h.hasClass("inline"))h.insertAfter(this.dom.input);else{this.s.parts.date&&this.s.parts.time&&550<c(a).width()?h.addClass("horizontal"):h.removeClass("horizontal");"input"===this.c.attachTo?h.css({top:d.top+l,left:d.left}).insertAfter(this.dom.input):h.css({top:d.top+l,left:d.left}).appendTo("body");var q=h.outerHeight(),p=h.outerWidth(),z=c(a).scrollTop();d.top+l+q-z>c(a).height()&&(l=d.top-q,h.css("top",0>l?0:l));p+d.left>c(a).width()&&(d=c(a).width()-p,"input"===
this.c.attachTo&&(d-=c(h).offsetParent().offset().left),h.css("left",0>d?0:d))}},_range:function(d,h,l){var q=[];for(l||(l=1);d<=h;d+=l)q.push(d);return q},_setCalander:function(){this.s.display&&this.dom.calendar.empty().append(this._htmlMonth(this.s.display.getUTCFullYear(),this.s.display.getUTCMonth()))},_setTitle:function(){this._optionSet("month",this.s.display.getUTCMonth());this._optionSet("year",this.s.display.getUTCFullYear())},_setTime:function(){var d=this,h=this.s.d,l=h?h.getUTCHours():
0,q=function(p){return d.c[p+"Available"]?d.c[p+"Available"]:d._range(0,59,d.c[p+"Increment"])};this._optionsTime("hours",this.s.parts.hours12?12:24,l,this.c.hoursAvailable);this._optionsTime("minutes",60,h?h.getUTCMinutes():0,q("minutes"),this.s.minutesRange);this._optionsTime("seconds",60,h?h.getSeconds():0,q("seconds"),this.s.secondsRange)},_show:function(){var d=this,h=this.s.namespace;this._position();c(a).on("scroll."+h+" resize."+h,function(){d._hide()});c("div.DTE_Body_Content").on("scroll."+
h,function(){d._hide()});c("div.dataTables_scrollBody").on("scroll."+h,function(){d._hide()});var l=this.dom.input[0].offsetParent;if(l!==b.body)c(l).on("scroll."+h,function(){d._hide()});c(b).on("keydown."+h,function(q){9!==q.keyCode&&27!==q.keyCode&&13!==q.keyCode||d._hide()});setTimeout(function(){c("body").on("click."+h,function(q){c(q.target).parents().filter(d.dom.container).length||q.target===d.dom.input[0]||d._hide()})},10)},_writeOutput:function(d){var h=this.s.d,l=g?g.utc(h,e,this.c.locale,
this.c.strict).format(this.c.format):h.getUTCFullYear()+"-"+this._pad(h.getUTCMonth()+1)+"-"+this._pad(h.getUTCDate());this.dom.input.val(l).trigger("change",{write:h});"hidden"===this.dom.input.attr("type")&&this.val(l,!1);d&&this.dom.input.focus()}});k.use=function(d){g=d};k._instance=0;k.defaults={attachTo:"body",classPrefix:"dt-datetime",disableDays:null,firstDay:1,format:"YYYY-MM-DD",hoursAvailable:null,i18n:{previous:"Previous",next:"Next",months:"January February March April May June July August September October November December".split(" "),
weekdays:"Sun Mon Tue Wed Thu Fri Sat".split(" "),amPm:["am","pm"],hours:"Hour",minutes:"Minute",seconds:"Second",unknown:"-"},maxDate:null,minDate:null,minutesAvailable:null,minutesIncrement:1,strict:!0,locale:"en",onChange:function(){},secondsAvailable:null,secondsIncrement:1,showWeekNumber:!1,yearRange:25};k.version="1.0.1";a.DateTime||(a.DateTime=k);c.fn.dtDateTime=function(d){return this.each(function(){new k(this,d)})};c.fn.dataTable&&(c.fn.dataTable.DateTime=k,c.fn.DataTable.DateTime=k);return k});
var f,u,B=window.moment,x=function(){function c(a,b,e,g,k){var d=this;void 0===g&&(g=0);void 0===k&&(k=1);if(!u||!u.versionCheck||!u.versionCheck("1.10.0"))throw Error("SearchPane requires DataTables 1.10 or newer");this.classes=f.extend(!0,{},c.classes);this.c=f.extend(!0,{},c.defaults,f.fn.dataTable.ext.searchBuilder,b);b=this.c.i18n;this.s={condition:void 0,conditions:{},data:void 0,dataIdx:-1,dataPoints:[],depth:k,dt:a,filled:!1,index:g,momentFormat:!1,topGroup:e,type:"",value:[]};this.dom={buttons:f("<div/>").addClass(this.classes.buttonContainer),
condition:f("<select disabled/>").addClass(this.classes.condition).addClass(this.classes.dropDown).addClass(this.classes.italic).attr("autocomplete","hacking"),conditionTitle:f('<option value="" disabled selected hidden/>').text(this.s.dt.i18n("searchBuilder.condition",b.condition)),container:f("<div/>").addClass(this.classes.container),data:f("<select/>").addClass(this.classes.data).addClass(this.classes.dropDown).addClass(this.classes.italic),dataTitle:f('<option value="" disabled selected hidden/>').text(this.s.dt.i18n("searchBuilder.data",
b.data)),defaultValue:f("<select disabled/>").addClass(this.classes.value).addClass(this.classes.dropDown),"delete":f("<button>&times</button>").addClass(this.classes["delete"]).addClass(this.classes.button).attr("title",this.s.dt.i18n("searchBuilder.deleteTitle",b.deleteTitle)).attr("type","button"),left:f("<button><</button>").addClass(this.classes.left).addClass(this.classes.button).attr("title",this.s.dt.i18n("searchBuilder.leftTitle",b.leftTitle)).attr("type","button"),right:f("<button>></button>").addClass(this.classes.right).addClass(this.classes.button).attr("title",
this.s.dt.i18n("searchBuilder.rightTitle",b.rightTitle)).attr("type","button"),value:[f("<select disabled/>").addClass(this.classes.value).addClass(this.classes.dropDown).addClass(this.classes.italic)],valueTitle:f('<option value="--valueTitle--" selected/>').text(this.s.dt.i18n("searchBuilder.value",b.value))};if(this.c.greyscale)for(f(this.dom.data).addClass(this.classes.greyscale),f(this.dom.condition).addClass(this.classes.greyscale),f(this.dom.defaultValue).addClass(this.classes.greyscale),a=
0,e=this.dom.value;a<e.length;a++)f(e[a]).addClass(this.classes.greyscale);this.s.dt.on("draw.dtsp",function(){d._adjustCriteria()});this.s.dt.on("buttons-action",function(){d._adjustCriteria()});f(window).on("resize.dtsp",u.util.throttle(function(){d._adjustCriteria()}));this._buildCriteria();return this}c.prototype.updateArrows=function(a,b){void 0===a&&(a=!1);void 0===b&&(b=!0);f(this.dom.container).empty().append(this.dom.data).append(this.dom.condition).append(this.dom.value[0]);f(this.dom.value[0]).trigger("dtsb-inserted");
for(var e=1;e<this.dom.value.length;e++)f(this.dom.container).append(this.dom.value[e]),f(this.dom.value[e]).trigger("dtsb-inserted");1<this.s.depth&&f(this.dom.buttons).append(this.dom.left);(!1===this.c.depthLimit||this.s.depth<this.c.depthLimit)&&a?f(this.dom.buttons).append(this.dom.right):f(this.dom.right).remove();f(this.dom.buttons).append(this.dom["delete"]);f(this.dom.container).append(this.dom.buttons);b&&this._adjustCriteria()};c.prototype.destroy=function(){f(this.dom.data).off(".dtsb");
f(this.dom.condition).off(".dtsb");f(this.dom["delete"]).off(".dtsb");for(var a=0,b=this.dom.value;a<b.length;a++)f(b[a]).off(".dtsb");f(this.dom.container).remove()};c.prototype.search=function(a,b){var e=this.s.conditions[this.s.condition];if(void 0!==this.s.condition&&void 0!==e)return-1!==this.s.type.indexOf("num")&&""!==this.s.dt.settings()[0].oLanguage.sDecimal&&(a[this.s.dataIdx]=a[this.s.dataIdx].replace(this.s.dt.settings()[0].oLanguage.sDecimal,".")),a=a[this.s.dataIdx],"search"!==this.c.orthogonal.search&&
(a=this.s.dt.settings()[0],a=a.oApi._fnGetCellData(a,b,this.s.dataIdx,"string"===typeof this.c.orthogonal?this.c.orthogonal:this.c.orthogonal.search)),"array"===this.s.type&&(Array.isArray(a)||(a=[a]),a.sort()),e.search(a,this.s.value,this)};c.prototype.getDetails=function(){var a=this.s.value;if(-1!==this.s.type.indexOf("num")&&""!==this.s.dt.settings()[0].oLanguage.sDecimal)for(var b=0;b<this.s.value.length;b++)-1!==this.s.value[b].indexOf(".")&&(a[b]=this.s.value[b].replace(".",this.s.dt.settings()[0].oLanguage.sDecimal));
return{condition:this.s.condition,data:this.s.data,value:a}};c.prototype.getNode=function(){return this.dom.container};c.prototype.populate=function(){this._populateData();-1!==this.s.dataIdx&&(this._populateCondition(),void 0!==this.s.condition&&this._populateValue())};c.prototype.rebuild=function(a){var b=!1,e;this._populateData();if(void 0!==a.data){var g=this.classes.italic,k=this.dom.data;f(this.dom.data).children("option").each(function(){f(this).text()===a.data&&(f(this).attr("selected",!0),
f(k).removeClass(g),b=!0,e=f(this).val())})}if(b){this.s.data=a.data;this.s.dataIdx=e;f(this.dom.dataTitle).remove();this._populateCondition();f(this.dom.conditionTitle).remove();var d;f(this.dom.condition).children("option").each(function(){void 0!==a.condition&&f(this).val()===a.condition&&"string"===typeof a.condition&&(f(this).attr("selected",!0),d=f(this).val())});this.s.condition=d;void 0!==this.s.condition?(f(this.dom.conditionTitle).remove(),f(this.dom.condition).removeClass(this.classes.italic),
this._populateValue(a)):f(this.dom.conditionTitle).prependTo(this.dom.condition).attr("selected",!0)}};c.prototype.setListeners=function(){var a=this;f(this.dom.data).unbind("input change").on("input change",function(){f(a.dom.dataTitle).attr("selected",!1);f(a.dom.data).removeClass(a.classes.italic);a.s.dataIdx=f(a.dom.data).children("option:selected").val();a.s.data=f(a.dom.data).children("option:selected").text();a.c.orthogonal=a._getOptions().orthogonal;a._clearCondition();a._clearValue();a._populateCondition();
a.s.filled&&(a.s.filled=!1,a.s.dt.draw(),a.setListeners());a.s.dt.state.save()});f(this.dom.condition).unbind("input change").on("input change",function(){f(a.dom.conditionTitle).attr("selected",!1);f(a.dom.condition).removeClass(a.classes.italic);for(var b=f(a.dom.condition).children("option:selected").val(),e=0,g=Object.keys(a.s.conditions);e<g.length;e++)if(g[e]===b){a.s.condition=b;break}a._clearValue();a._populateValue();b=0;for(e=a.dom.value;b<e.length;b++)g=e[b],a.s.filled&&0!==f(a.dom.container).has(g).length&&
(a.s.filled=!1,a.s.dt.draw(),a.setListeners());a.s.dt.draw()})};c.prototype._adjustCriteria=function(){if(0!==f(document).has(this.dom.container).length){var a=this.dom.value[this.dom.value.length-1];if(0!==f(this.dom.container).has(a).length){var b=f(a).outerWidth(!0);a=f(a).offset().left+b;var e=f(this.dom.left).offset(),g=f(this.dom.right).offset(),k=f(this.dom["delete"]).offset(),d=0!==f(this.dom.container).has(this.dom.left).length,h=0!==f(this.dom.container).has(this.dom.right).length,l=d?e.left:
h?g.left:k.left;15>l-a||d&&e.top!==k.top||h&&g.top!==k.top?(f(this.dom.container).parent().addClass(this.classes.vertical),f(this.s.topGroup).trigger("dtsb-redrawContents")):15<l-(f(this.dom.data).offset().left+f(this.dom.data).outerWidth(!0)+f(this.dom.condition).outerWidth(!0)+b)&&(f(this.dom.container).parent().removeClass(this.classes.vertical),f(this.s.topGroup).trigger("dtsb-redrawContents"))}}};c.prototype._buildCriteria=function(){f(this.dom.data).append(this.dom.dataTitle);f(this.dom.condition).append(this.dom.conditionTitle);
f(this.dom.container).append(this.dom.data).append(this.dom.condition);for(var a=0,b=this.dom.value;a<b.length;a++){var e=b[a];f(e).append(this.dom.valueTitle);f(this.dom.container).append(e)}f(this.dom.container).append(this.dom["delete"]).append(this.dom.right);this.setListeners()};c.prototype._clearCondition=function(){f(this.dom.condition).empty();f(this.dom.conditionTitle).attr("selected",!0).attr("disabled",!0);f(this.dom.condition).prepend(this.dom.conditionTitle).prop("selectedIndex",0);this.s.conditions=
{};this.s.condition=void 0};c.prototype._clearValue=function(){if(void 0!==this.s.condition){for(var a=0,b=this.dom.value;a<b.length;a++){var e=b[a];f(e).remove()}this.dom.value=[].concat(this.s.conditions[this.s.condition].init(this,c.updateListener));f(this.dom.value[0]).insertAfter(this.dom.condition).trigger("dtsb-inserted");for(e=1;e<this.dom.value.length;e++)f(this.dom.value[e]).insertAfter(this.dom.value[e-1]).trigger("dtsb-inserted")}else{a=0;for(b=this.dom.value;a<b.length;a++)e=b[a],f(e).remove();
f(this.dom.valueTitle).attr("selected",!0);f(this.dom.defaultValue).append(this.dom.valueTitle).insertAfter(this.dom.condition)}this.s.value=[]};c.prototype._getOptions=function(){return f.extend(!0,{},c.defaults,this.s.dt.settings()[0].aoColumns[this.s.dataIdx].searchBuilder)};c.prototype._populateCondition=function(){var a=[],b=Object.keys(this.s.conditions).length;if(0===b){b=f(this.dom.data).children("option:selected").val();this.s.type=this.s.dt.columns().type().toArray()[b];null===this.s.type&&
(this.s.dt.draw(),this.setListeners(),this.s.type=this.s.dt.columns().type().toArray()[b]);f(this.dom.condition).attr("disabled",!1).empty().append(this.dom.conditionTitle).addClass(this.classes.italic);f(this.dom.conditionTitle).attr("selected",!0);b=this.s.dt.settings()[0].oLanguage.sDecimal;""!==b&&this.s.type.indexOf(b)===this.s.type.length-b.length&&(-1!==this.s.type.indexOf("num-fmt")?this.s.type=this.s.type.replace(b,""):-1!==this.s.type.indexOf("num")&&(this.s.type=this.s.type.replace(b,"")));
var e=void 0!==this.c.conditions[this.s.type]?this.c.conditions[this.s.type]:-1!==this.s.type.indexOf("moment")?this.c.conditions.moment:this.c.conditions.string;-1!==this.s.type.indexOf("moment")&&(this.s.momentFormat=this.s.type.replace(/moment\-/g,""));for(var g=0,k=Object.keys(e);g<k.length;g++){var d=k[g];null!==e[d]&&(this.s.conditions[d]=e[d],b=e[d].conditionName,"function"===typeof b&&(b=b(this.s.dt,this.c.i18n)),a.push(f("<option>",{text:b,value:d}).addClass(this.classes.option).addClass(this.classes.notItalic)))}}else if(0<
b)for(f(this.dom.condition).empty().attr("disabled",!1).addClass(this.classes.italic),e=0,g=Object.keys(this.s.conditions);e<g.length;e++)d=g[e],b=this.s.conditions[d].conditionName,"function"===typeof b&&(b=b(this.s.dt,this.c.i18n)),d=f("<option>",{text:b,value:d}).addClass(this.classes.option).addClass(this.classes.notItalic),void 0!==this.s.condition&&this.s.condition===b&&(f(d).attr("selected",!0),f(this.dom.condition).removeClass(this.classes.italic)),a.push(d);else{f(this.dom.condition).attr("disabled",
!0).addClass(this.classes.italic);return}for(b=0;b<a.length;b++)d=a[b],f(this.dom.condition).append(d);f(this.dom.condition).prop("selectedIndex",0)};c.prototype._populateData=function(){var a=this;f(this.dom.data).empty().append(this.dom.dataTitle);if(0===this.s.dataPoints.length)this.s.dt.columns().every(function(d){if(!0===a.c.columns||-1!==a.s.dt.columns(a.c.columns).indexes().toArray().indexOf(d)){for(var h=!1,l=0,q=a.s.dataPoints;l<q.length;l++)if(q[l].index===d){h=!0;break}h||(d={text:a.s.dt.settings()[0].aoColumns[d].sTitle,
index:d},a.s.dataPoints.push(d),f(a.dom.data).append(f("<option>",{text:d.text,value:d.index}).addClass(a.classes.option).addClass(a.classes.notItalic)))}});else for(var b=function(d){e.s.dt.columns().every(function(l){a.s.dt.settings()[0].aoColumns[l].sTitle===d.text&&(d.index=l)});var h=f("<option>",{text:d.text,value:d.index}).addClass(e.classes.option).addClass(e.classes.notItalic);e.s.data===d.text&&(e.s.dataIdx=d.index,f(h).attr("selected",!0),f(e.dom.data).removeClass(e.classes.italic));f(e.dom.data).append(h)},
e=this,g=0,k=this.s.dataPoints;g<k.length;g++)b(k[g])};c.prototype._populateValue=function(a){var b=this,e=this.s.filled;this.s.filled=!1;f(this.dom.defaultValue).remove();for(var g=0,k=this.dom.value;g<k.length;g++)f(k[g]).remove();g=f(this.dom.container).children();if(3<g.length)for(k=2;k<g.length-1;k++)f(g[k]).remove();void 0!==a&&this.s.dt.columns().every(function(d){b.s.dt.settings()[0].aoColumns[d].sTitle===a.data&&(b.s.dataIdx=d)});this.dom.value=[].concat(this.s.conditions[this.s.condition].init(this,
c.updateListener,void 0!==a?a.value:void 0));void 0!==a&&void 0!==a.value&&(this.s.value=a.value);f(this.dom.value[0]).insertAfter(this.dom.condition).trigger("dtsb-inserted");for(k=1;k<this.dom.value.length;k++)f(this.dom.value[k]).insertAfter(this.dom.value[k-1]).trigger("dtsb-inserted");this.s.filled=this.s.conditions[this.s.condition].isInputValid(this.dom.value,this);this.setListeners();e!==this.s.filled&&(this.s.dt.draw(),this.setListeners())};c.version="1.0.0";c.classes={button:"dtsb-button",
buttonContainer:"dtsb-buttonContainer",condition:"dtsb-condition",container:"dtsb-criteria",data:"dtsb-data","delete":"dtsb-delete",dropDown:"dtsb-dropDown",greyscale:"dtsb-greyscale",input:"dtsb-input",italic:"dtsb-italic",joiner:"dtsp-joiner",left:"dtsb-left",notItalic:"dtsb-notItalic",option:"dtsb-option",right:"dtsb-right",value:"dtsb-value",vertical:"dtsb-vertical"};c.initSelect=function(a,b,e,g){void 0===e&&(e=null);void 0===g&&(g=!1);var k=f(a.dom.data).children("option:selected").val(),d=
a.s.dt.rows().indexes().toArray(),h=a.s.dt.settings()[0],l=f("<select/>").addClass(c.classes.value).addClass(c.classes.dropDown).addClass(c.classes.italic).append(a.dom.valueTitle).on("input change",function(){f(this).removeClass(c.classes.italic);b(a,this)});a.c.greyscale&&f(l).addClass(c.classes.greyscale);for(var q=[],p=[],z=0;z<d.length;z++){var y=d[z],C=h.oApi._fnGetCellData(h,y,k,"string"===typeof a.c.orthogonal?a.c.orthogonal:a.c.orthogonal.search);C="string"===typeof C?C.replace(/[\r\n\u2028]/g,
" "):C;y=h.oApi._fnGetCellData(h,y,k,"string"===typeof a.c.orthogonal?a.c.orthogonal:a.c.orthogonal.display);"array"===a.s.type&&(C=Array.isArray(C)?C=C.sort():[C],y=Array.isArray(y)?y=y.sort():[y]);var D=function(v,A){v=f("<option>",{text:"string"===typeof A?A.replace(/(<([^>]+)>)/ig,""):A,type:Array.isArray(v)?"Array":"String",value:-1!==a.s.type.indexOf("html")&&null!==v&&"string"===typeof v?v.replace(/(<([^>]+)>)/ig,""):v}).addClass(a.classes.option).addClass(a.classes.notItalic);A=f(v).val();
-1===q.indexOf(A)&&(q.push(A),p.push(v),null!==e&&Array.isArray(e[0])&&(e[0]=e[0].sort().join(",")),null!==e&&v.val()===e[0]&&(v.attr("selected",!0),f(l).removeClass(c.classes.italic)))};if(g)for(var E=0;E<C.length;E++)D(C[E],y[E]);else D(C,y)}p.sort(function(v,A){if("string"===a.s.type||"num"===a.s.type||"html"===a.s.type||"html-num"===a.s.type)return f(v).val()<f(A).val()?-1:f(v).val()<f(A).val()?1:0;if("num-fmt"===a.s.type||"html-num-fmt"===a.s.type)return+f(v).val().replace(/[^0-9.]/g,"")<+f(A).val().replace(/[^0-9.]/g,
"")?-1:+f(v).val().replace(/[^0-9.]/g,"")<+f(A).val().replace(/[^0-9.]/g,"")?1:0});for(g=0;g<p.length;g++)k=p[g],f(l).append(k);return l};c.initSelectArray=function(a,b,e){void 0===e&&(e=null);return c.initSelect(a,b,e,!0)};c.initInput=function(a,b,e){void 0===e&&(e=null);var g=f("<input/>").addClass(c.classes.value).addClass(c.classes.input).on("input",function(){b(a,this)});a.c.greyscale&&f(g).addClass(c.classes.greyscale);null!==e&&f(g).val(e[0]);return g};c.init2Input=function(a,b,e){void 0===
e&&(e=null);var g=[f("<input/>").addClass(c.classes.value).addClass(c.classes.input).on("input",function(){b(a,this)}),f("<span>").addClass(a.classes.joiner).text(a.s.dt.i18n("searchBuilder.valueJoiner",a.c.i18n.valueJoiner)),f("<input/>").addClass(c.classes.value).addClass(c.classes.input).on("input",function(){b(a,this)})];a.c.greyscale&&(f(g[0]).addClass(c.classes.greyscale),f(g[2]).addClass(c.classes.greyscale));null!==e&&(f(g[0]).val(e[0]),f(g[2]).val(e[1]));a.s.dt.off("draw");a.s.dt.one("draw",
function(){f(a.s.topGroup).trigger("dtsb-redrawContents")});return g};c.initDate=function(a,b,e){void 0===e&&(e=null);var g=f("<input/>").addClass(c.classes.value).addClass(c.classes.input).dtDateTime({attachTo:"input",format:a.s.momentFormat?a.s.momentFormat:void 0}).on("input change",function(){b(a,this)});a.c.greyscale&&f(g).addClass(c.classes.greyscale);null!==e&&f(g).val(e[0]);return g};c.initNoValue=function(a){a.s.dt.off("draw");a.s.dt.one("draw",function(){f(a.s.topGroup).trigger("dtsb-redrawContents")})};
c.init2Date=function(a,b,e){void 0===e&&(e=null);var g=[f("<input/>").addClass(c.classes.value).addClass(c.classes.input).dtDateTime({attachTo:"input",format:a.s.momentFormat?a.s.momentFormat:void 0}).on("input change",function(){b(a,this)}),f("<span>").addClass(a.classes.joiner).text(a.s.dt.i18n("searchBuilder.valueJoiner",a.c.i18n.valueJoiner)),f("<input/>").addClass(c.classes.value).addClass(c.classes.input).dtDateTime({attachTo:"input",format:a.s.momentFormat?a.s.momentFormat:void 0}).on("input change",
function(){b(a,this)})];a.c.greyscale&&(f(g[0]).addClass(c.classes.greyscale),f(g[2]).addClass(c.classes.greyscale));null!==e&&0<e.length&&(f(g[0]).val(e[0]),f(g[2]).val(e[1]));a.s.dt.off("draw");a.s.dt.one("draw",function(){f(a.s.topGroup).trigger("dtsb-redrawContents")});return g};c.isInputValidSelect=function(a){for(var b=!0,e=0;e<a.length;e++){var g=a[e];f(g).children("option:selected").length===f(g).children("option").length-f(g).children("option."+c.classes.notItalic).length&&1===f(g).children("option:selected").length&&
f(g).children("option:selected")[0]===f(g).children("option:hidden")[0]&&(b=!1)}return b};c.isInputValidInput=function(a){for(var b=!0,e=0;e<a.length;e++){var g=a[e];f(g).is("input")&&0===f(g).val().length&&(b=!1)}return b};c.inputValueSelect=function(a){for(var b=[],e=0;e<a.length;e++){var g=a[e];if(f(g).is("select")){var k=f(g).children("option:selected").val();b.push("Array"===f(g).children("option:selected").attr("type")?k.split(",").sort():k)}}return b};c.inputValueInput=function(a){for(var b=
[],e=0;e<a.length;e++){var g=a[e];f(g).is("input")&&b.push(f(g).val())}return b};c.updateListener=function(a,b){var e=a.s.conditions[a.s.condition];a.s.filled=e.isInputValid(a.dom.value,a);a.s.value=e.inputValue(a.dom.value,a);Array.isArray(a.s.value)||(a.s.value=[a.s.value]);for(e=0;e<a.s.value.length;e++)Array.isArray(a.s.value[e])?a.s.value[e].sort():""!==a.s.dt.settings()[0].oLanguage.sDecimal&&(a.s.value[e]=a.s.value[e].replace(a.s.dt.settings()[0].oLanguage.sDecimal,"."));var g=null,k=null;
for(e=0;e<a.dom.value.length;e++)b===a.dom.value[e][0]&&(g=e,void 0!==b.selectionStart&&(k=b.selectionStart));a.s.dt.draw();null!==g&&(f(a.dom.value[g]).removeClass(a.classes.italic),f(a.dom.value[g]).focus(),null!==k&&f(a.dom.value[g])[0].setSelectionRange(k,k))};c.dateConditions={"=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.date.equals",b.conditions.date.equals)},init:c.initDate,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=a.replace(/(\/|\-|,)/g,
"-");return a===b[0]}},"!=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.date.not",b.conditions.date.not)},init:c.initDate,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=a.replace(/(\/|\-|,)/g,"-");return a!==b[0]}},"<":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.date.before",b.conditions.date.before)},init:c.initDate,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=a.replace(/(\/|\-|,)/g,
"-");return a<b[0]}},">":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.date.after",b.conditions.date.after)},init:c.initDate,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=a.replace(/(\/|\-|,)/g,"-");return a>b[0]}},between:{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.date.between",b.conditions.date.between)},init:c.init2Date,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=a.replace(/(\/|\-|,)/g,
"-");return b[0]<b[1]?b[0]<=a&&a<=b[1]:b[1]<=a&&a<=b[0]}},"!between":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.date.notBetween",b.conditions.date.notBetween)},init:c.init2Date,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=a.replace(/(\/|\-|,)/g,"-");return b[0]<b[1]?!(b[0]<=a&&a<=b[1]):!(b[1]<=a&&a<=b[0])}},"null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.date.empty",b.conditions.date.empty)},isInputValid:function(){return!0},
init:c.initNoValue,inputValue:function(){},search:function(a){return null===a||void 0===a||0===a.length}},"!null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.date.notEmpty",b.conditions.date.notEmpty)},isInputValid:function(){return!0},init:c.initNoValue,inputValue:function(){},search:function(a){return!(null===a||void 0===a||0===a.length)}}};c.momentDateConditions={"=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.moment.equals",b.conditions.moment.equals)},
init:c.initDate,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b,e){return B(a,e.s.momentFormat).valueOf()===B(b[0],e.s.momentFormat).valueOf()}},"!=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.moment.not",b.conditions.moment.not)},init:c.initDate,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b,e){return B(a,e.s.momentFormat).valueOf()!==B(b[0],e.s.momentFormat).valueOf()}},"<":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.moment.before",
b.conditions.moment.before)},init:c.initDate,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b,e){return B(a,e.s.momentFormat).valueOf()<B(b[0],e.s.momentFormat).valueOf()}},">":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.moment.after",b.conditions.moment.after)},init:c.initDate,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b,e){return B(a,e.s.momentFormat).valueOf()>B(b[0],e.s.momentFormat).valueOf()}},between:{conditionName:function(a,
b){return a.i18n("searchBuilder.conditions.moment.between",b.conditions.moment.between)},init:c.init2Date,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b,e){a=B(a,e.s.momentFormat).valueOf();var g=B(b[0],e.s.momentFormat).valueOf();b=B(b[1],e.s.momentFormat).valueOf();return g<b?g<=a&&a<=b:b<=a&&a<=g}},"!between":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.moment.notBetween",b.conditions.moment.notBetween)},init:c.init2Date,inputValue:c.inputValueInput,
isInputValid:c.isInputValidInput,search:function(a,b,e){a=B(a,e.s.momentFormat).valueOf();var g=B(b[0],e.s.momentFormat).valueOf();b=B(b[1],e.s.momentFormat).valueOf();return g<b?!(+g<=+a&&+a<=+b):!(+b<=+a&&+a<=+g)}},"null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.moment.empty",b.conditions.moment.empty)},isInputValid:function(){return!0},init:c.initNoValue,inputValue:function(){},search:function(a){return null===a||void 0===a||0===a.length}},"!null":{conditionName:function(a,
b){return a.i18n("searchBuilder.conditions.moment.notEmpty",b.conditions.moment.notEmpty)},isInputValid:function(){return!0},init:c.initNoValue,inputValue:function(){},search:function(a){return!(null===a||void 0===a||0===a.length)}}};c.numConditions={"=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.equals",b.conditions.number.equals)},init:c.initSelect,inputValue:c.inputValueSelect,isInputValid:c.isInputValidSelect,search:function(a,b){return+a===+b[0]}},"!=":{conditionName:function(a,
b){return a.i18n("searchBuilder.conditions.number.not",b.conditions.number.not)},init:c.initSelect,inputValue:c.inputValueSelect,isInputValid:c.isInputValidSelect,search:function(a,b){return+a!==+b[0]}},"<":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.lt",b.conditions.number.lt)},init:c.initInput,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){return+a<+b[0]}},"<=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.lte",
b.conditions.number.lte)},init:c.initInput,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){return+a<=+b[0]}},">=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.gte",b.conditions.number.gte)},init:c.initInput,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){return+a>=+b[0]}},">":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.gt",b.conditions.number.gt)},init:c.initInput,inputValue:c.inputValueInput,
isInputValid:c.isInputValidInput,search:function(a,b){return+a>+b[0]}},between:{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.between",b.conditions.number.between)},init:c.init2Input,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){return+b[0]<+b[1]?+b[0]<=+a&&+a<=+b[1]:+b[1]<=+a&&+a<=+b[0]}},"!between":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.notBetween",b.conditions.number.notBetween)},init:c.init2Input,
inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){return+b[0]<+b[1]?!(+b[0]<=+a&&+a<=+b[1]):!(+b[1]<=+a&&+a<=+b[0])}},"null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.empty",b.conditions.number.empty)},init:c.initNoValue,inputValue:function(){},isInputValid:function(){return!0},search:function(a){return null===a||void 0===a||0===a.length}},"!null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.notEmpty",
b.conditions.number.notEmpty)},isInputValid:function(){return!0},init:c.initNoValue,inputValue:function(){},search:function(a){return!(null===a||void 0===a||0===a.length)}}};c.numFmtConditions={"=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.equals",b.conditions.number.equals)},init:c.initSelect,inputValue:c.inputValueSelect,isInputValid:c.isInputValidSelect,search:function(a,b){a=0===a.indexOf("-")?"-"+a.replace(/[^0-9.]/g,""):a.replace(/[^0-9.]/g,"");b=0===b[0].indexOf("-")?
"-"+b[0].replace(/[^0-9.]/g,""):b[0].replace(/[^0-9.]/g,"");return+a===+b}},"!=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.not",b.conditions.number.not)},init:c.initSelect,inputValue:c.inputValueSelect,isInputValid:c.isInputValidSelect,search:function(a,b){a=0===a.indexOf("-")?"-"+a.replace(/[^0-9.]/g,""):a.replace(/[^0-9.]/g,"");b=0===b[0].indexOf("-")?"-"+b[0].replace(/[^0-9.]/g,""):b[0].replace(/[^0-9.]/g,"");return+a!==+b}},"<":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.lt",
b.conditions.number.lt)},init:c.initInput,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=0===a.indexOf("-")?"-"+a.replace(/[^0-9.]/g,""):a.replace(/[^0-9.]/g,"");b=0===b[0].indexOf("-")?"-"+b[0].replace(/[^0-9.]/g,""):b[0].replace(/[^0-9.]/g,"");return+a<+b}},"<=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.lte",b.conditions.number.lte)},init:c.initInput,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,
b){a=0===a.indexOf("-")?"-"+a.replace(/[^0-9.]/g,""):a.replace(/[^0-9.]/g,"");b=0===b[0].indexOf("-")?"-"+b[0].replace(/[^0-9.]/g,""):b[0].replace(/[^0-9.]/g,"");return+a<=+b}},">=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.gte",b.conditions.number.gte)},init:c.initInput,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=0===a.indexOf("-")?"-"+a.replace(/[^0-9.]/g,""):a.replace(/[^0-9.]/g,"");b=0===b[0].indexOf("-")?"-"+b[0].replace(/[^0-9.]/g,
""):b[0].replace(/[^0-9.]/g,"");return+a>=+b}},">":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.gt",b.conditions.number.gt)},init:c.initInput,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=0===a.indexOf("-")?"-"+a.replace(/[^0-9.]/g,""):a.replace(/[^0-9.]/g,"");b=0===b[0].indexOf("-")?"-"+b[0].replace(/[^0-9.]/g,""):b[0].replace(/[^0-9.]/g,"");return+a>+b}},between:{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.between",
b.conditions.number.between)},init:c.init2Input,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=0===a.indexOf("-")?"-"+a.replace(/[^0-9.]/g,""):a.replace(/[^0-9.]/g,"");var e=0===b[0].indexOf("-")?"-"+b[0].replace(/[^0-9.]/g,""):b[0].replace(/[^0-9.]/g,"");b=0===b[1].indexOf("-")?"-"+b[1].replace(/[^0-9.]/g,""):b[1].replace(/[^0-9.]/g,"");return+e<+b?+e<=+a&&+a<=+b:+b<=+a&&+a<=+e}},"!between":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.notBetween",
b.conditions.number.notBetween)},init:c.init2Input,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){a=0===a.indexOf("-")?"-"+a.replace(/[^0-9.]/g,""):a.replace(/[^0-9.]/g,"");var e=0===b[0].indexOf("-")?"-"+b[0].replace(/[^0-9.]/g,""):b[0].replace(/[^0-9.]/g,"");b=0===b[1].indexOf("-")?"-"+b[1].replace(/[^0-9.]/g,""):b[1].replace(/[^0-9.]/g,"");return+e<+b?!(+e<=+a&&+a<=+b):!(+b<=+a&&+a<=+e)}},"null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.empty",
b.conditions.number.empty)},init:c.initNoValue,inputValue:function(){},isInputValid:function(){return!0},search:function(a){return null===a||void 0===a||0===a.length}},"!null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.number.notEmpty",b.conditions.number.notEmpty)},isInputValid:function(){return!0},init:c.initNoValue,inputValue:function(){},search:function(a){return!(null===a||void 0===a||0===a.length)}}};c.stringConditions={"=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.string.equals",
b.conditions.string.equals)},init:c.initSelect,inputValue:c.inputValueSelect,isInputValid:c.isInputValidSelect,search:function(a,b){return a===b[0]}},"!=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.string.not",b.conditions.string.not)},init:c.initSelect,inputValue:c.inputValueSelect,isInputValid:c.isInputValidInput,search:function(a,b){return a!==b[0]}},starts:{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.string.startsWith",b.conditions.string.startsWith)},
init:c.initInput,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){return 0===a.toLowerCase().indexOf(b[0].toLowerCase())}},contains:{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.string.contains",b.conditions.string.contains)},init:c.initInput,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){return-1!==a.toLowerCase().indexOf(b[0].toLowerCase())}},ends:{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.string.endsWith",
b.conditions.string.endsWith)},init:c.initInput,inputValue:c.inputValueInput,isInputValid:c.isInputValidInput,search:function(a,b){return a.toLowerCase().endsWith(b[0].toLowerCase())}},"null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.string.empty",b.conditions.string.empty)},init:c.initNoValue,inputValue:function(){},isInputValid:function(){return!0},search:function(a){return null===a||void 0===a||0===a.length}},"!null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.string.notEmpty",
b.conditions.string.notEmpty)},isInputValid:function(){return!0},init:c.initNoValue,inputValue:function(){},search:function(a){return!(null===a||void 0===a||0===a.length)}}};c.arrayConditions={contains:{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.array.contains",b.conditions.array.contains)},init:c.initSelectArray,inputValue:c.inputValueSelect,isInputValid:c.isInputValidSelect,search:function(a,b){return-1!==a.indexOf(b[0])}},without:{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.array.without",
b.conditions.array.without)},init:c.initSelectArray,inputValue:c.inputValueSelect,isInputValid:c.isInputValidSelect,search:function(a,b){return-1===a.indexOf(b[0])}},"=":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.array.equals",b.conditions.array.equals)},init:c.initSelect,inputValue:c.inputValueSelect,isInputValid:c.isInputValidSelect,search:function(a,b){if(a.length===b[0].length){for(var e=0;e<a.length;e++)if(a[e]!==b[0][e])return!1;return!0}return!1}},"!=":{conditionName:function(a,
b){return a.i18n("searchBuilder.conditions.array.not",b.conditions.array.not)},init:c.initSelect,inputValue:c.inputValueSelect,isInputValid:c.isInputValidSelect,search:function(a,b){if(a.length===b[0].length){for(var e=0;e<a.length;e++)if(a[e]!==b[0][e])return!0;return!1}return!0}},"null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.array.empty",b.conditions.array.empty)},init:c.initNoValue,isInputValid:function(){return!0},inputValue:function(){},search:function(a){return null===
a||void 0===a||0===a.length}},"!null":{conditionName:function(a,b){return a.i18n("searchBuilder.conditions.array.notEmpty",b.conditions.array.notEmpty)},isInputValid:function(){return!0},init:c.initNoValue,inputValue:function(){},search:function(a){return null!==a&&void 0!==a&&0!==a.length}}};c.defaults={columns:!0,conditions:{array:c.arrayConditions,date:c.dateConditions,html:c.stringConditions,"html-num":c.numConditions,"html-num-fmt":c.numFmtConditions,moment:c.momentDateConditions,num:c.numConditions,
"num-fmt":c.numFmtConditions,string:c.stringConditions},depthLimit:!1,filterChanged:void 0,greyscale:!1,i18n:{add:"Add Condition",button:{0:"Search Builder",_:"Search Builder (%d)"},clearAll:"Clear All",condition:"Condition",data:"Data",deleteTitle:"Delete filtering rule",leftTitle:"Outdent criteria",logicAnd:"And",logicOr:"Or",rightTitle:"Indent criteria",title:{0:"Custom Search Builder",_:"Custom Search Builder (%d)"},value:"Value",valueJoiner:"and"},logic:"AND",orthogonal:{display:"display",search:"filter"},
preDefined:!1};return c}(),n,L,M=function(){function c(a,b,e,g,k,d){void 0===g&&(g=0);void 0===k&&(k=!1);void 0===d&&(d=1);if(!L||!L.versionCheck||!L.versionCheck("1.10.0"))throw Error("SearchBuilder requires DataTables 1.10 or newer");this.classes=n.extend(!0,{},c.classes);this.c=n.extend(!0,{},c.defaults,b);this.s={criteria:[],depth:d,dt:a,index:g,isChild:k,logic:void 0,opts:b,toDrop:void 0,topGroup:e};this.dom={add:n("<button/>").addClass(this.classes.add).addClass(this.classes.button).attr("type",
"button"),clear:n("<button>&times</button>").addClass(this.classes.button).addClass(this.classes.clearGroup).attr("type","button"),container:n("<div/>").addClass(this.classes.group),logic:n("<button/>").addClass(this.classes.logic).addClass(this.classes.button).attr("type","button"),logicContainer:n("<div/>").addClass(this.classes.logicContainer)};void 0===this.s.topGroup&&(this.s.topGroup=this.dom.container);this._setup();return this}c.prototype.destroy=function(){n(this.dom.add).off(".dtsb");n(this.dom.logic).off(".dtsb");
n(this.dom.container).trigger("dtsb-destroy").remove();this.s.criteria=[]};c.prototype.getDetails=function(){if(0===this.s.criteria.length)return{};for(var a={criteria:[],logic:this.s.logic},b=0,e=this.s.criteria;b<e.length;b++)a.criteria.push(e[b].criteria.getDetails());return a};c.prototype.getNode=function(){return this.dom.container};c.prototype.rebuild=function(a){if(void 0!==a.criteria&&null!==a.criteria&&0!==a.criteria.length){this.s.logic=a.logic;n(this.dom.logic).text("OR"===this.s.logic?
this.s.dt.i18n("searchBuilder.logicOr",this.c.i18n.logicOr):this.s.dt.i18n("searchBuilder.logicAnd",this.c.i18n.logicAnd));for(var b=0,e=a.criteria;b<e.length;b++)a=e[b],void 0!==a.logic?this._addPrevGroup(a):void 0===a.logic&&this._addPrevCriteria(a);b=0;for(e=this.s.criteria;b<e.length;b++)a=e[b],a.criteria instanceof x&&(a.criteria.updateArrows(1<this.s.criteria.length,!1),this._setCriteriaListeners(a.criteria))}};c.prototype.redrawContents=function(){n(this.dom.container).empty().append(this.dom.logicContainer).append(this.dom.add);
this.s.criteria.sort(function(e,g){return e.criteria.s.index<g.criteria.s.index?-1:e.criteria.s.index>g.criteria.s.index?1:0});this.setListeners();for(var a=0;a<this.s.criteria.length;a++){var b=this.s.criteria[a].criteria;b instanceof x?(this.s.criteria[a].index=a,this.s.criteria[a].criteria.s.index=a,n(this.s.criteria[a].criteria.dom.container).insertBefore(this.dom.add),this._setCriteriaListeners(b),this.s.criteria[a].criteria.rebuild(this.s.criteria[a].criteria.getDetails())):b instanceof c&&
0<b.s.criteria.length?(this.s.criteria[a].index=a,this.s.criteria[a].criteria.s.index=a,n(this.s.criteria[a].criteria.dom.container).insertBefore(this.dom.add),b.redrawContents(),this._setGroupListeners(b)):(this.s.criteria.splice(a,1),a--)}this.setupLogic()};c.prototype.search=function(a,b){return"AND"===this.s.logic?this._andSearch(a,b):"OR"===this.s.logic?this._orSearch(a,b):!0};c.prototype.setupLogic=function(){n(this.dom.logicContainer).remove();n(this.dom.clear).remove();if(1>this.s.criteria.length)this.s.isChild||
(n(this.dom.container).trigger("dtsb-destroy"),n(this.dom.container).css("margin-left",0));else{var a=n(this.dom.container).height()-2;n(this.dom.clear).height("0px");n(this.dom.logicContainer).append(this.dom.clear).width(a);n(this.dom.container).prepend(this.dom.logicContainer);this._setLogicListener();n(this.dom.container).css("margin-left",n(this.dom.logicContainer).outerHeight(!0));a=n(this.dom.logicContainer).offset();var b=a.left,e=n(this.dom.container).offset().left;b=b-(b-e)-n(this.dom.logicContainer).outerHeight(!0);
n(this.dom.logicContainer).offset({left:b});b=n(this.dom.logicContainer).next();a=a.top;b=n(b).offset().top;a-=a-b;n(this.dom.logicContainer).offset({top:a});n(this.dom.clear).outerHeight(n(this.dom.logicContainer).height());this._setClearListener()}};c.prototype.setListeners=function(){var a=this;n(this.dom.add).unbind("click");n(this.dom.add).on("click",function(){a.s.isChild||n(a.dom.container).prepend(a.dom.logicContainer);a.addCriteria();n(a.dom.container).trigger("dtsb-add");a.s.dt.state.save();
return!1});for(var b=0,e=this.s.criteria;b<e.length;b++)e[b].criteria.setListeners();this._setClearListener();this._setLogicListener()};c.prototype.addCriteria=function(a,b){void 0===a&&(a=null);void 0===b&&(b=!0);var e=null===a?this.s.criteria.length:a.s.index,g=new x(this.s.dt,this.s.opts,this.s.topGroup,e,this.s.depth);null!==a&&(g.c=a.c,g.s=a.s,g.s.depth=this.s.depth,g.classes=a.classes);g.populate();a=!1;for(var k=0;k<this.s.criteria.length;k++)0===k&&this.s.criteria[k].criteria.s.index>g.s.index?
(n(g.getNode()).insertBefore(this.s.criteria[k].criteria.dom.container),a=!0):k<this.s.criteria.length-1&&this.s.criteria[k].criteria.s.index<g.s.index&&this.s.criteria[k+1].criteria.s.index>g.s.index&&(n(g.getNode()).insertAfter(this.s.criteria[k].criteria.dom.container),a=!0);a||n(g.getNode()).insertBefore(this.dom.add);this.s.criteria.push({criteria:g,index:e});this.s.criteria=this.s.criteria.sort(function(d,h){return d.criteria.s.index-h.criteria.s.index});e=0;for(a=this.s.criteria;e<a.length;e++)k=
a[e],k.criteria instanceof x&&k.criteria.updateArrows(1<this.s.criteria.length,b);this._setCriteriaListeners(g);g.setListeners();this.setupLogic()};c.prototype.checkFilled=function(){for(var a=0,b=this.s.criteria;a<b.length;a++){var e=b[a];if(e.criteria instanceof x&&e.criteria.s.filled||e.criteria instanceof c&&e.criteria.checkFilled())return!0}return!1};c.prototype.count=function(){for(var a=0,b=0,e=this.s.criteria;b<e.length;b++){var g=e[b];g.criteria instanceof c?a+=g.criteria.count():a++}return a};
c.prototype._addPrevGroup=function(a){var b=this.s.criteria.length,e=new c(this.s.dt,this.c,this.s.topGroup,b,!0,this.s.depth+1);this.s.criteria.push({criteria:e,index:b,logic:e.s.logic});e.rebuild(a);this.s.criteria[b].criteria=e;n(this.s.topGroup).trigger("dtsb-redrawContents");this._setGroupListeners(e)};c.prototype._addPrevCriteria=function(a){var b=this.s.criteria.length,e=new x(this.s.dt,this.s.opts,this.s.topGroup,b,this.s.depth);e.populate();this.s.criteria.push({criteria:e,index:b});e.rebuild(a);
this.s.criteria[b].criteria=e;n(this.s.topGroup).trigger("dtsb-redrawContents")};c.prototype._andSearch=function(a,b){if(0===this.s.criteria.length)return!0;for(var e=0,g=this.s.criteria;e<g.length;e++){var k=g[e];if(!(k.criteria instanceof x&&!k.criteria.s.filled||k.criteria.search(a,b)))return!1}return!0};c.prototype._orSearch=function(a,b){if(0===this.s.criteria.length)return!0;for(var e=!1,g=0,k=this.s.criteria;g<k.length;g++){var d=k[g];if(d.criteria instanceof x&&d.criteria.s.filled){if(e=!0,
d.criteria.search(a,b))return!0}else if(d.criteria instanceof c&&d.criteria.checkFilled()&&(e=!0,d.criteria.search(a,b)))return!0}return!e};c.prototype._removeCriteria=function(a,b){void 0===b&&(b=!1);if(1>=this.s.criteria.length&&this.s.isChild)this.destroy();else{for(var e=void 0,g=0;g<this.s.criteria.length;g++)this.s.criteria[g].index===a.s.index&&(!b||this.s.criteria[g].criteria instanceof c)&&(e=g);void 0!==e&&this.s.criteria.splice(e,1);for(g=0;g<this.s.criteria.length;g++)this.s.criteria[g].index=
g,this.s.criteria[g].criteria.s.index=g}};c.prototype._setCriteriaListeners=function(a){var b=this;n(a.dom["delete"]).unbind("click").on("click",function(){b._removeCriteria(a);n(a.dom.container).remove();for(var e=0,g=b.s.criteria;e<g.length;e++){var k=g[e];k.criteria instanceof x&&k.criteria.updateArrows(1<b.s.criteria.length)}a.destroy();b.s.dt.draw();n(b.s.topGroup).trigger("dtsb-redrawContents");n(b.s.topGroup).trigger("dtsb-updateTitle");return!1});n(a.dom.right).unbind("click").on("click",
function(){var e=a.s.index,g=new c(b.s.dt,b.s.opts,b.s.topGroup,a.s.index,!0,b.s.depth+1);g.addCriteria(a);b.s.criteria[e].criteria=g;b.s.criteria[e].logic="AND";n(b.s.topGroup).trigger("dtsb-redrawContents");b._setGroupListeners(g);return!1});n(a.dom.left).unbind("click").on("click",function(){b.s.toDrop=new x(b.s.dt,b.s.opts,b.s.topGroup,a.s.index);b.s.toDrop.s=a.s;b.s.toDrop.c=a.c;b.s.toDrop.classes=a.classes;b.s.toDrop.populate();var e=b.s.toDrop.s.index;n(b.dom.container).trigger("dtsb-dropCriteria");
a.s.index=e;b._removeCriteria(a);n(b.s.topGroup).trigger("dtsb-redrawContents");b.s.dt.draw();return!1})};c.prototype._setClearListener=function(){var a=this;n(this.dom.clear).unbind("click").on("click",function(){if(!a.s.isChild)return n(a.dom.container).trigger("dtsb-clearContents"),!1;a.destroy();n(a.s.topGroup).trigger("dtsb-updateTitle");n(a.s.topGroup).trigger("dtsb-redrawContents");return!1})};c.prototype._setGroupListeners=function(a){var b=this;n(a.dom.add).unbind("click").on("click",function(){b.setupLogic();
n(b.dom.container).trigger("dtsb-add");return!1});n(a.dom.container).unbind("dtsb-add").on("dtsb-add",function(){b.setupLogic();n(b.dom.container).trigger("dtsb-add");return!1});n(a.dom.container).unbind("dtsb-destroy").on("dtsb-destroy",function(){b._removeCriteria(a,!0);n(a.dom.container).remove();b.setupLogic();return!1});n(a.dom.container).unbind("dtsb-dropCriteria").on("dtsb-dropCriteria",function(){var e=a.s.toDrop;e.s.index=a.s.index;e.updateArrows(1<b.s.criteria.length,!1);b.addCriteria(e,
!1);return!1});a.setListeners()};c.prototype._setup=function(){this.setListeners();n(this.dom.add).text(this.s.dt.i18n("searchBuilder.add",this.c.i18n.add));n(this.dom.logic).text("OR"===this.c.logic?this.s.dt.i18n("searchBuilder.logicOr",this.c.i18n.logicOr):this.s.dt.i18n("searchBuilder.logicAnd",this.c.i18n.logicAnd));this.s.logic="OR"===this.c.logic?"OR":"AND";this.c.greyscale&&n(this.dom.logic).addClass(this.classes.greyscale);n(this.dom.logicContainer).append(this.dom.logic).append(this.dom.clear);
this.s.isChild&&n(this.dom.container).append(this.dom.logicContainer);n(this.dom.container).append(this.dom.add)};c.prototype._setLogicListener=function(){var a=this;n(this.dom.logic).unbind("click").on("click",function(){a._toggleLogic();a.s.dt.draw();for(var b=0,e=a.s.criteria;b<e.length;b++)e[b].criteria.setListeners()})};c.prototype._toggleLogic=function(){"OR"===this.s.logic?(this.s.logic="AND",n(this.dom.logic).text(this.s.dt.i18n("searchBuilder.logicAnd",this.c.i18n.logicAnd))):"AND"===this.s.logic&&
(this.s.logic="OR",n(this.dom.logic).text(this.s.dt.i18n("searchBuilder.logicOr",this.c.i18n.logicOr)))};c.version="1.0.0";c.classes={add:"dtsb-add",button:"dtsb-button",clearGroup:"dtsb-clearGroup",greyscale:"dtsb-greyscale",group:"dtsb-group",inputButton:"dtsb-iptbtn",logic:"dtsb-logic",logicContainer:"dtsb-logicContainer"};c.defaults={columns:!0,conditions:{date:x.dateConditions,html:x.stringConditions,"html-num":x.numConditions,"html-num-fmt":x.numFmtConditions,moment:x.momentDateConditions,num:x.numConditions,
"num-fmt":x.numFmtConditions,string:x.stringConditions},depthLimit:!1,filterChanged:void 0,greyscale:!1,i18n:{add:"Add Condition",button:{0:"Search Builder",_:"Search Builder (%d)"},clearAll:"Clear All",condition:"Condition",data:"Data",deleteTitle:"Delete filtering rule",leftTitle:"Outdent criteria",logicAnd:"And",logicOr:"Or",rightTitle:"Indent criteria",title:{0:"Custom Search Builder",_:"Custom Search Builder (%d)"},value:"Value",valueJoiner:"and"},logic:"AND",orthogonal:{display:"display",search:"filter"},
preDefined:!1};return c}(),w,J,O=function(){function c(a,b){var e=this;if(!J||!J.versionCheck||!J.versionCheck("1.10.0"))throw Error("SearchBuilder requires DataTables 1.10 or newer");a=new J.Api(a);this.classes=w.extend(!0,{},c.classes);this.c=w.extend(!0,{},c.defaults,b);this.dom={clearAll:w('<button >'+a.i18n("searchBuilder.clearAll",this.c.i18n.clearAll)+"</button>").addClass(this.classes.clearAll).addClass(this.classes.button).attr("type","button"),container:w("<div/>").addClass(this.classes.container),
title:w("<div/>").addClass(this.classes.title),titleRow:w("<div/>").addClass(this.classes.titleRow),topGroup:void 0};this.s={dt:a,opts:b,search:void 0,topGroup:void 0};if(void 0===a.settings()[0]._searchBuilder){a.settings()[0]._searchBuilder=this;if(this.s.dt.settings()[0]._bInitComplete)this._setUp();else a.one("init.dt",function(){e._setUp()});return this}}c.prototype.getDetails=function(){return this.s.topGroup.getDetails()};c.prototype.getNode=function(){return this.dom.container};c.prototype.rebuild=
function(a){w(this.dom.clearAll).click();if(void 0===a||null===a)return this;this.s.topGroup.rebuild(a);this.s.dt.draw();this.s.topGroup.setListeners();return this};c.prototype._applyPreDefDefaults=function(a){var b=this;void 0!==a.criteria&&void 0===a.logic&&(a.logic="AND");for(var e=function(h){void 0!==h.criteria?h=g._applyPreDefDefaults(h):g.s.dt.columns().every(function(l){b.s.dt.settings()[0].aoColumns[l].sTitle===h.data&&(h.dataIdx=l)})},g=this,k=0,d=a.criteria;k<d.length;k++)e(d[k]);return a};
c.prototype._setUp=function(a){var b=this;void 0===a&&(a=!0);this.s.topGroup=new M(this.s.dt,this.c,void 0);this._setClearListener();this.s.dt.on("stateSaveParams",function(e,g,k){k.searchBuilder=b.getDetails();k.page=b.s.dt.page()});this._build();a&&(a=this.s.dt.state.loaded(),null!==a&&void 0!==a.searchBuilder?(this.s.topGroup.rebuild(a.searchBuilder),w(this.s.topGroup.dom.container).trigger("dtsb-redrawContents"),this.s.dt.page(a.page).draw("page"),this.s.topGroup.setListeners()):!1!==this.c.preDefined&&
(this.c.preDefined=this._applyPreDefDefaults(this.c.preDefined),this.rebuild(this.c.preDefined)));this._setEmptyListener();this.s.dt.state.save()};c.prototype._updateTitle=function(a){w(this.dom.title).text(this.s.dt.i18n("searchBuilder.title",this.c.i18n.title,a))};c.prototype._build=function(){var a=this;w(this.dom.clearAll).remove();w(this.dom.container).empty();var b=this.s.topGroup.count();this._updateTitle(b);w(this.dom.titleRow).append(this.dom.title);w(this.dom.container).append(this.dom.titleRow);
this.dom.topGroup=this.s.topGroup.getNode();w(this.dom.container).append(this.dom.topGroup);this._setRedrawListener();var e=this.s.dt.table(0).node();-1===w.fn.dataTable.ext.search.indexOf(this.s.search)&&(this.s.search=function(g,k,d,h){return g.nTable!==e?!0:a.s.topGroup.search(k,d)},w.fn.dataTable.ext.search.push(this.s.search));w.fn.DataTable.Api.registerPlural("columns().type()","column().type()",function(g,k){return this.iterator("column",function(d,h){return d.aoColumns[h].sType},1)});this.s.dt.on("destroy.dt",
function(){w(a.dom.container).remove();w(a.dom.clearAll).remove();for(var g=w.fn.dataTable.ext.search.indexOf(a.s.search);-1!==g;)w.fn.dataTable.ext.search.splice(g,1),g=w.fn.dataTable.ext.search.indexOf(a.s.search)})};c.prototype._checkClear=function(){0<this.s.topGroup.s.criteria.length?(w(this.dom.clearAll).insertAfter(this.dom.title),this._setClearListener()):w(this.dom.clearAll).remove()};c.prototype._filterChanged=function(a){var b=this.c.filterChanged;"function"===typeof b&&b(a,this.s.dt.i18n("searchBuilder.button",
this.c.i18n.button,a))};c.prototype._setClearListener=function(){var a=this;w(this.dom.clearAll).unbind("click");w(this.dom.clearAll).on("click",function(){a.s.topGroup=new M(a.s.dt,a.c,void 0);a._build();a.s.dt.draw();a.s.topGroup.setListeners();w(a.dom.clearAll).remove();a._setEmptyListener();a._filterChanged(0);return!1})};c.prototype._setRedrawListener=function(){var a=this;w(this.s.topGroup.dom.container).unbind("dtsb-redrawContents");w(this.s.topGroup.dom.container).on("dtsb-redrawContents",
function(){a._checkClear();a.s.topGroup.redrawContents();a.s.topGroup.setupLogic();a._setEmptyListener();var b=a.s.topGroup.count();a._updateTitle(b);a._filterChanged(b);a.s.dt.state.save()});w(this.s.topGroup.dom.container).unbind("dtsb-clearContents");w(this.s.topGroup.dom.container).on("dtsb-clearContents",function(){a._setUp(!1);a._filterChanged(0);a.s.dt.draw()});w(this.s.topGroup.dom.container).on("dtsb-updateTitle",function(){var b=a.s.topGroup.count();a._updateTitle(b);a._filterChanged(b)})};
c.prototype._setEmptyListener=function(){var a=this;w(this.s.topGroup.dom.add).on("click",function(){a._checkClear()});w(this.s.topGroup.dom.container).on("dtsb-destroy",function(){w(a.dom.clearAll).remove()})};c.version="1.0.1";c.classes={button:"dtsb-button",clearAll:"dtsb-clearAll",container:"dtsb-searchBuilder",inputButton:"dtsb-iptbtn",title:"dtsb-title",titleRow:"dtsb-titleRow"};c.defaults={columns:!0,conditions:{date:x.dateConditions,html:x.stringConditions,"html-num":x.numConditions,"html-num-fmt":x.numFmtConditions,
moment:x.momentDateConditions,num:x.numConditions,"num-fmt":x.numFmtConditions,string:x.stringConditions},depthLimit:!1,filterChanged:void 0,greyscale:!1,i18n:{add:"Add Condition",button:{0:"Search Builder",_:"Search Builder (%d)"},clearAll:"Clear All",condition:"Condition",conditions:{array:{contains:"Contains",empty:"Empty",equals:"Equals",not:"Not",notEmpty:"Not Empty",without:"Without"},date:{after:"After",before:"Before",between:"Between",empty:"Empty",equals:"Equals",not:"Not",notBetween:"Not Between",
notEmpty:"Not Empty"},moment:{after:"After",before:"Before",between:"Between",empty:"Empty",equals:"Equals",not:"Not",notBetween:"Not Between",notEmpty:"Not Empty"},number:{between:"Between",empty:"Empty",equals:"Equals",gt:"Greater Than",gte:"Greater Than Equal To",lt:"Less Than",lte:"Less Than Equal To",not:"Not",notBetween:"Not Between",notEmpty:"Not Empty"},string:{contains:"Contains",empty:"Empty",endsWith:"Ends With",equals:"Equals",not:"Not",notEmpty:"Not Empty",startsWith:"Starts With"}},
data:"Data",deleteTitle:"Delete filtering rule",leftTitle:"Outdent criteria",logicAnd:"And",logicOr:"Or",rightTitle:"Indent criteria",title:{0:"Custom Search Builder",_:"Custom Search Builder (%d)"},value:"Value",valueJoiner:"and"},logic:"AND",orthogonal:{display:"display",search:"filter"},preDefined:!1};return c}();(function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(a){return c(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||
(a=window);b&&b.fn.dataTable||(b=require("datatables.net")(a,b).$);return c(b,a,a.document)}:c(window.jQuery,window,document)})(function(c,a,b){function e(k,d){k=new g.Api(k);d=d?d:k.init().searchBuilder||g.defaults.searchBuilder;return(new O(k,d)).getNode()}t(c);r(c);m(c);var g=c.fn.dataTable;c.fn.dataTable.SearchBuilder=O;c.fn.DataTable.SearchBuilder=O;c.fn.dataTable.Group=M;c.fn.DataTable.Group=M;c.fn.dataTable.Criteria=x;c.fn.DataTable.Criteria=x;a=c.fn.dataTable.Api.register;c.fn.dataTable.ext.searchBuilder=
{conditions:{}};c.fn.dataTable.ext.buttons.searchBuilder={action:function(k,d,h,l){k.stopPropagation();this.popover(l._searchBuilder.getNode(),{align:"dt-container"})},config:{},init:function(k,d,h){var l=new c.fn.dataTable.SearchBuilder(k,c.extend({filterChanged:function(q,p){k.button(d).text(p)}},h.config));k.button(d).text(h.text||k.i18n("searchBuilder.button",l.c.i18n.button,0));h._searchBuilder=l},text:null};a("searchBuilder.getDetails()",function(){return this.context[0]._searchBuilder.getDetails()});
a("searchBuilder.rebuild()",function(k){this.context[0]._searchBuilder.rebuild(k);return this});a("searchBuilder.container()",function(){return this.context[0]._searchBuilder.getNode()});c(b).on("preInit.dt.dtsp",function(k,d,h){"dt"===k.namespace&&(d.oInit.searchBuilder||g.defaults.searchBuilder)&&(d._searchBuilder||e(d))});g.ext.feature.push({cFeature:"Q",fnInit:e});g.ext.features&&g.ext.features.register("searchBuilder",e)})})();


(function(b){"function"===typeof define&&define.amd?define(["jquery","datatables.net-bs4","datatables.net-searchbuilder"],function(a){return b(a,window,document)}):"object"===typeof exports?module.exports=function(a,c){a||(a=window);c&&c.fn.dataTable||(c=require("datatables.net-bs4")(a,c).$);c.fn.dataTable.searchBuilder||require("datatables.net-searchbuilder")(a,c);return b(c,a,a.document)}:b(jQuery,window,document)})(function(b,a,c){a=b.fn.dataTable;b.extend(!0,a.SearchBuilder.classes,{clearAll:"btn btn-light dtsb-clearAll"});
b.extend(!0,a.Group.classes,{add:"btn btn-light dtsb-add",clearGroup:"btn btn-light dtsb-clearGroup",logic:"btn btn-light dtsb-logic"});b.extend(!0,a.Criteria.classes,{condition:"form-control dtsb-condition",data:"form-control dtsb-data","delete":"btn btn-light dtsb-delete",left:"btn btn-light dtsb-left",right:"btn btn-light dtsb-right",value:"form-control dtsb-value"});return a.searchPanes});


/*!
 SearchPanes 1.2.2
 2019-2020 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.getGlobal=function(m){m=["object"==typeof globalThis&&globalThis,m,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var t=0;t<m.length;++t){var h=m[t];if(h&&h.Math==Math)return h}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.checkEs6ConformanceViaProxy=function(){try{var m={},t=Object.create(new $jscomp.global.Proxy(m,{get:function(h,r,v){return h==m&&"q"==r&&v==t}}));return!0===t.q}catch(h){return!1}};$jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS=!1;$jscomp.ES6_CONFORMANCE=$jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS&&$jscomp.checkEs6ConformanceViaProxy();$jscomp.arrayIteratorImpl=function(m){var t=0;return function(){return t<m.length?{done:!1,value:m[t++]}:{done:!0}}};$jscomp.arrayIterator=function(m){return{next:$jscomp.arrayIteratorImpl(m)}};
$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(m,t,h){if(m==Array.prototype||m==Object.prototype)return m;m[t]=h.value;return m};$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;
$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(m,t){var h=$jscomp.propertyToPolyfillSymbol[t];if(null==h)return m[t];h=m[h];return void 0!==h?h:m[t]};$jscomp.polyfill=function(m,t,h,r){t&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(m,t,h,r):$jscomp.polyfillUnisolated(m,t,h,r))};
$jscomp.polyfillUnisolated=function(m,t,h,r){h=$jscomp.global;m=m.split(".");for(r=0;r<m.length-1;r++){var v=m[r];if(!(v in h))return;h=h[v]}m=m[m.length-1];r=h[m];t=t(r);t!=r&&null!=t&&$jscomp.defineProperty(h,m,{configurable:!0,writable:!0,value:t})};
$jscomp.polyfillIsolated=function(m,t,h,r){var v=m.split(".");m=1===v.length;r=v[0];r=!m&&r in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var q=0;q<v.length-1;q++){var A=v[q];if(!(A in r))return;r=r[A]}v=v[v.length-1];h=$jscomp.IS_SYMBOL_NATIVE&&"es6"===h?r[v]:null;t=t(h);null!=t&&(m?$jscomp.defineProperty($jscomp.polyfills,v,{configurable:!0,writable:!0,value:t}):t!==h&&($jscomp.propertyToPolyfillSymbol[v]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(v):$jscomp.POLYFILL_PREFIX+v,v=
$jscomp.propertyToPolyfillSymbol[v],$jscomp.defineProperty(r,v,{configurable:!0,writable:!0,value:t})))};$jscomp.initSymbol=function(){};
$jscomp.polyfill("Symbol",function(m){if(m)return m;var t=function(v,q){this.$jscomp$symbol$id_=v;$jscomp.defineProperty(this,"description",{configurable:!0,writable:!0,value:q})};t.prototype.toString=function(){return this.$jscomp$symbol$id_};var h=0,r=function(v){if(this instanceof r)throw new TypeError("Symbol is not a constructor");return new t("jscomp_symbol_"+(v||"")+"_"+h++,v)};return r},"es6","es3");$jscomp.initSymbolIterator=function(){};
$jscomp.polyfill("Symbol.iterator",function(m){if(m)return m;m=Symbol("Symbol.iterator");for(var t="Array Int8Array Uint8Array Uint8ClampedArray Int16Array Uint16Array Int32Array Uint32Array Float32Array Float64Array".split(" "),h=0;h<t.length;h++){var r=$jscomp.global[t[h]];"function"===typeof r&&"function"!=typeof r.prototype[m]&&$jscomp.defineProperty(r.prototype,m,{configurable:!0,writable:!0,value:function(){return $jscomp.iteratorPrototype($jscomp.arrayIteratorImpl(this))}})}return m},"es6",
"es3");$jscomp.initSymbolAsyncIterator=function(){};$jscomp.iteratorPrototype=function(m){m={next:m};m[Symbol.iterator]=function(){return this};return m};$jscomp.makeIterator=function(m){var t="undefined"!=typeof Symbol&&Symbol.iterator&&m[Symbol.iterator];return t?t.call(m):$jscomp.arrayIterator(m)};$jscomp.owns=function(m,t){return Object.prototype.hasOwnProperty.call(m,t)};
$jscomp.polyfill("WeakMap",function(m){function t(){if(!m||!Object.seal)return!1;try{var a=Object.seal({}),b=Object.seal({}),c=new m([[a,2],[b,3]]);if(2!=c.get(a)||3!=c.get(b))return!1;c.delete(a);c.set(b,4);return!c.has(a)&&4==c.get(b)}catch(d){return!1}}function h(){}function r(a){var b=typeof a;return"object"===b&&null!==a||"function"===b}function v(a){if(!$jscomp.owns(a,A)){var b=new h;$jscomp.defineProperty(a,A,{value:b})}}function q(a){if(!$jscomp.ISOLATE_POLYFILLS){var b=Object[a];b&&(Object[a]=
function(c){if(c instanceof h)return c;Object.isExtensible(c)&&v(c);return b(c)})}}if($jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS){if(m&&$jscomp.ES6_CONFORMANCE)return m}else if(t())return m;var A="$jscomp_hidden_"+Math.random();q("freeze");q("preventExtensions");q("seal");var G=0,k=function(a){this.id_=(G+=Math.random()+1).toString();if(a){a=$jscomp.makeIterator(a);for(var b;!(b=a.next()).done;)b=b.value,this.set(b[0],b[1])}};k.prototype.set=function(a,b){if(!r(a))throw Error("Invalid WeakMap key");
v(a);if(!$jscomp.owns(a,A))throw Error("WeakMap key fail: "+a);a[A][this.id_]=b;return this};k.prototype.get=function(a){return r(a)&&$jscomp.owns(a,A)?a[A][this.id_]:void 0};k.prototype.has=function(a){return r(a)&&$jscomp.owns(a,A)&&$jscomp.owns(a[A],this.id_)};k.prototype.delete=function(a){return r(a)&&$jscomp.owns(a,A)&&$jscomp.owns(a[A],this.id_)?delete a[A][this.id_]:!1};return k},"es6","es3");$jscomp.MapEntry=function(){};
$jscomp.polyfill("Map",function(m){function t(){if($jscomp.ASSUME_NO_NATIVE_MAP||!m||"function"!=typeof m||!m.prototype.entries||"function"!=typeof Object.seal)return!1;try{var k=Object.seal({x:4}),a=new m($jscomp.makeIterator([[k,"s"]]));if("s"!=a.get(k)||1!=a.size||a.get({x:4})||a.set({x:4},"t")!=a||2!=a.size)return!1;var b=a.entries(),c=b.next();if(c.done||c.value[0]!=k||"s"!=c.value[1])return!1;c=b.next();return c.done||4!=c.value[0].x||"t"!=c.value[1]||!b.next().done?!1:!0}catch(d){return!1}}
if($jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS){if(m&&$jscomp.ES6_CONFORMANCE)return m}else if(t())return m;var h=new WeakMap,r=function(k){this.data_={};this.head_=A();this.size=0;if(k){k=$jscomp.makeIterator(k);for(var a;!(a=k.next()).done;)a=a.value,this.set(a[0],a[1])}};r.prototype.set=function(k,a){k=0===k?0:k;var b=v(this,k);b.list||(b.list=this.data_[b.id]=[]);b.entry?b.entry.value=a:(b.entry={next:this.head_,previous:this.head_.previous,head:this.head_,key:k,value:a},b.list.push(b.entry),
this.head_.previous.next=b.entry,this.head_.previous=b.entry,this.size++);return this};r.prototype.delete=function(k){k=v(this,k);return k.entry&&k.list?(k.list.splice(k.index,1),k.list.length||delete this.data_[k.id],k.entry.previous.next=k.entry.next,k.entry.next.previous=k.entry.previous,k.entry.head=null,this.size--,!0):!1};r.prototype.clear=function(){this.data_={};this.head_=this.head_.previous=A();this.size=0};r.prototype.has=function(k){return!!v(this,k).entry};r.prototype.get=function(k){return(k=
v(this,k).entry)&&k.value};r.prototype.entries=function(){return q(this,function(k){return[k.key,k.value]})};r.prototype.keys=function(){return q(this,function(k){return k.key})};r.prototype.values=function(){return q(this,function(k){return k.value})};r.prototype.forEach=function(k,a){for(var b=this.entries(),c;!(c=b.next()).done;)c=c.value,k.call(a,c[1],c[0],this)};r.prototype[Symbol.iterator]=r.prototype.entries;var v=function(k,a){var b=a&&typeof a;"object"==b||"function"==b?h.has(a)?b=h.get(a):
(b=""+ ++G,h.set(a,b)):b="p_"+a;var c=k.data_[b];if(c&&$jscomp.owns(k.data_,b))for(k=0;k<c.length;k++){var d=c[k];if(a!==a&&d.key!==d.key||a===d.key)return{id:b,list:c,index:k,entry:d}}return{id:b,list:c,index:-1,entry:void 0}},q=function(k,a){var b=k.head_;return $jscomp.iteratorPrototype(function(){if(b){for(;b.head!=k.head_;)b=b.previous;for(;b.next!=b.head;)return b=b.next,{done:!1,value:a(b)};b=null}return{done:!0,value:void 0}})},A=function(){var k={};return k.previous=k.next=k.head=k},G=0;
return r},"es6","es3");$jscomp.findInternal=function(m,t,h){m instanceof String&&(m=String(m));for(var r=m.length,v=0;v<r;v++){var q=m[v];if(t.call(h,q,v,m))return{i:v,v:q}}return{i:-1,v:void 0}};$jscomp.polyfill("Array.prototype.find",function(m){return m?m:function(t,h){return $jscomp.findInternal(this,t,h).v}},"es6","es3");
$jscomp.iteratorFromArray=function(m,t){m instanceof String&&(m+="");var h=0,r={next:function(){if(h<m.length){var v=h++;return{value:t(v,m[v]),done:!1}}r.next=function(){return{done:!0,value:void 0}};return r.next()}};r[Symbol.iterator]=function(){return r};return r};$jscomp.polyfill("Array.prototype.keys",function(m){return m?m:function(){return $jscomp.iteratorFromArray(this,function(t){return t})}},"es6","es3");
$jscomp.polyfill("Array.prototype.findIndex",function(m){return m?m:function(t,h){return $jscomp.findInternal(this,t,h).i}},"es6","es3");
(function(){function m(k){h=k;r=k.fn.dataTable}function t(k){q=k;A=k.fn.dataTable}var h,r,v=function(){function k(a,b,c,d,e,g){var f=this;void 0===g&&(g=null);if(!r||!r.versionCheck||!r.versionCheck("1.10.0"))throw Error("SearchPane requires DataTables 1.10 or newer");if(!r.select)throw Error("SearchPane requires Select");a=new r.Api(a);this.classes=h.extend(!0,{},k.classes);this.c=h.extend(!0,{},k.defaults,b);this.customPaneSettings=g;this.s={cascadeRegen:!1,clearing:!1,colOpts:[],deselect:!1,displayed:!1,
dt:a,dtPane:void 0,filteringActive:!1,index:c,indexes:[],lastCascade:!1,lastSelect:!1,listSet:!1,name:void 0,redraw:!1,rowData:{arrayFilter:[],arrayOriginal:[],arrayTotals:[],bins:{},binsOriginal:{},binsTotal:{},filterMap:new Map,totalOptions:0},scrollTop:0,searchFunction:void 0,selectPresent:!1,serverSelect:[],serverSelecting:!1,showFiltered:!1,tableLength:null,updating:!1};b=a.columns().eq(0).toArray().length;this.colExists=this.s.index<b;this.c.layout=d;b=parseInt(d.split("-")[1],10);this.dom=
{buttonGroup:h("<div/>").addClass(this.classes.buttonGroup),clear:h('<button >&#215;</button>').addClass(this.classes.dull).addClass(this.classes.paneButton).addClass(this.classes.clearButton),container:h("<div/>").addClass(this.classes.container).addClass(this.classes.layout+(10>b?d:d.split("-")[0]+"-9")),countButton:h('<button ></button>').addClass(this.classes.paneButton).addClass(this.classes.countButton),dtP:h("<table><thead><tr><th>"+(this.colExists?h(a.column(this.colExists?
this.s.index:0).header()).text():this.customPaneSettings.header||"Custom Pane")+"</th><th/></tr></thead></table>"),lower:h("<div/>").addClass(this.classes.subRow2).addClass(this.classes.narrowButton),nameButton:h('<button ></button>').addClass(this.classes.paneButton).addClass(this.classes.nameButton),panesContainer:e,searchBox:h("<input/>").addClass(this.classes.paneInputButton).addClass(this.classes.search),searchButton:h('<button type = "button" class="'+this.classes.searchIcon+'"></button>').addClass(this.classes.paneButton),
searchCont:h("<div/>").addClass(this.classes.searchCont),searchLabelCont:h("<div/>").addClass(this.classes.searchLabelCont),topRow:h("<div/>").addClass(this.classes.topRow),upper:h("<div/>").addClass(this.classes.subRow1).addClass(this.classes.narrowSearch)};this.s.displayed=!1;a=this.s.dt;this.selections=[];this.s.colOpts=this.colExists?this._getOptions():this._getBonusOptions();var l=this.s.colOpts;d=h('<button >X</button>').addClass(this.classes.paneButton);h(d).text(a.i18n("searchPanes.clearPane",
"X"));this.dom.container.addClass(l.className);this.dom.container.addClass(null!==this.customPaneSettings&&void 0!==this.customPaneSettings.className?this.customPaneSettings.className:"");this.s.name=void 0!==this.s.colOpts.name?this.s.colOpts.name:null!==this.customPaneSettings&&void 0!==this.customPaneSettings.name?this.customPaneSettings.name:this.colExists?h(a.column(this.s.index).header()).text():this.customPaneSettings.header||"Custom Pane";h(e).append(this.dom.container);var p=a.table(0).node();
this.s.searchFunction=function(n,x,z,y){if(0===f.selections.length||n.nTable!==p)return!0;n=null;f.colExists&&(n=x[f.s.index],"filter"!==l.orthogonal.filter&&(n=f.s.rowData.filterMap.get(z),n instanceof h.fn.dataTable.Api&&(n=n.toArray())));return f._search(n,z)};h.fn.dataTable.ext.search.push(this.s.searchFunction);if(this.c.clear)h(d).on("click",function(){f.dom.container.find(f.classes.search).each(function(){h(this).val("");h(this).trigger("input")});f.clearPane()});a.on("draw.dtsp",function(){f._adjustTopRow()});
a.on("buttons-action",function(){f._adjustTopRow()});h(window).on("resize.dtsp",r.util.throttle(function(){f._adjustTopRow()}));a.on("column-reorder.dtsp",function(n,x,z){f.s.index=z.mapping[f.s.index]});return this}k.prototype.clearData=function(){this.s.rowData={arrayFilter:[],arrayOriginal:[],arrayTotals:[],bins:{},binsOriginal:{},binsTotal:{},filterMap:new Map,totalOptions:0}};k.prototype.clearPane=function(){this.s.dtPane.rows({selected:!0}).deselect();this.updateTable();return this};k.prototype.destroy=
function(){h(this.s.dtPane).off(".dtsp");h(this.s.dt).off(".dtsp");h(this.dom.nameButton).off(".dtsp");h(this.dom.countButton).off(".dtsp");h(this.dom.clear).off(".dtsp");h(this.dom.searchButton).off(".dtsp");h(this.dom.container).remove();for(var a=h.fn.dataTable.ext.search.indexOf(this.s.searchFunction);-1!==a;)h.fn.dataTable.ext.search.splice(a,1),a=h.fn.dataTable.ext.search.indexOf(this.s.searchFunction);void 0!==this.s.dtPane&&this.s.dtPane.destroy();this.s.listSet=!1};k.prototype.getPaneCount=
function(){return void 0!==this.s.dtPane?this.s.dtPane.rows({selected:!0}).data().toArray().length:0};k.prototype.rebuildPane=function(a,b,c,d){void 0===a&&(a=!1);void 0===b&&(b=null);void 0===c&&(c=null);void 0===d&&(d=!1);this.clearData();var e=[];this.s.serverSelect=[];var g=null;void 0!==this.s.dtPane&&(d&&(this.s.dt.page.info().serverSide?this.s.serverSelect=this.s.dtPane.rows({selected:!0}).data().toArray():e=this.s.dtPane.rows({selected:!0}).data().toArray()),this.s.dtPane.clear().destroy(),
g=h(this.dom.container).prev(),this.destroy(),this.s.dtPane=void 0,h.fn.dataTable.ext.search.push(this.s.searchFunction));this.dom.container.removeClass(this.classes.hidden);this.s.displayed=!1;this._buildPane(this.s.dt.page.info().serverSide?this.s.serverSelect:e,a,b,c,g);return this};k.prototype.removePane=function(){this.s.displayed=!1;h(this.dom.container).hide()};k.prototype.setCascadeRegen=function(a){this.s.cascadeRegen=a};k.prototype.setClear=function(a){this.s.clearing=a};k.prototype.updatePane=
function(a){void 0===a&&(a=!1);this.s.updating=!0;this._updateCommon(a);this.s.updating=!1};k.prototype.updateTable=function(){this.selections=this.s.dtPane.rows({selected:!0}).data().toArray();this._searchExtras();(this.c.cascadePanes||this.c.viewTotal)&&this.updatePane()};k.prototype._setListeners=function(){var a=this,b=this.s.rowData,c;this.s.dtPane.on("select.dtsp",function(){clearTimeout(c);a.s.dt.page.info().serverSide&&!a.s.updating?a.s.serverSelecting||(a.s.serverSelect=a.s.dtPane.rows({selected:!0}).data().toArray(),
a.s.scrollTop=h(a.s.dtPane.table().node()).parent()[0].scrollTop,a.s.selectPresent=!0,a.s.dt.draw(!1)):(h(a.dom.clear).removeClass(a.classes.dull),a.s.selectPresent=!0,a.s.updating||a._makeSelection(),a.s.selectPresent=!1)});this.s.dtPane.on("deselect.dtsp",function(){c=setTimeout(function(){a.s.dt.page.info().serverSide&&!a.s.updating?a.s.serverSelecting||(a.s.serverSelect=a.s.dtPane.rows({selected:!0}).data().toArray(),a.s.deselect=!0,a.s.dt.draw(!1)):(a.s.deselect=!0,0===a.s.dtPane.rows({selected:!0}).data().toArray().length&&
h(a.dom.clear).addClass(a.classes.dull),a._makeSelection(),a.s.deselect=!1,a.s.dt.state.save())},50)});this.s.dt.on("stateSaveParams.dtsp",function(d,e,g){if(h.isEmptyObject(g))a.s.dtPane.state.clear();else{d=[];if(void 0!==a.s.dtPane){d=a.s.dtPane.rows({selected:!0}).data().map(function(x){return x.filter.toString()}).toArray();var f=h(a.dom.searchBox).val();var l=a.s.dtPane.order();var p=b.binsOriginal;var n=b.arrayOriginal}void 0===g.searchPanes&&(g.searchPanes={});void 0===g.searchPanes.panes&&
(g.searchPanes.panes=[]);for(e=0;e<g.searchPanes.panes.length;e++)g.searchPanes.panes[e].id===a.s.index&&(g.searchPanes.panes.splice(e,1),e--);g.searchPanes.panes.push({arrayFilter:n,bins:p,id:a.s.index,order:l,searchTerm:f,selected:d})}});this.s.dtPane.on("user-select.dtsp",function(d,e,g,f,l){l.stopPropagation()});this.s.dtPane.on("draw.dtsp",function(){a._adjustTopRow()});h(this.dom.nameButton).on("click.dtsp",function(){var d=a.s.dtPane.order()[0][1];a.s.dtPane.order([0,"asc"===d?"desc":"asc"]).draw();
a.s.dt.state.save()});h(this.dom.countButton).on("click.dtsp",function(){var d=a.s.dtPane.order()[0][1];a.s.dtPane.order([1,"asc"===d?"desc":"asc"]).draw();a.s.dt.state.save()});h(this.dom.clear).on("click.dtsp",function(){a.dom.container.find("."+a.classes.search).each(function(){h(this).val("");h(this).trigger("input")});a.clearPane()});h(this.dom.searchButton).on("click.dtsp",function(){h(a.dom.searchBox).focus()});h(this.dom.searchBox).on("input.dtsp",function(){a.s.dtPane.search(h(a.dom.searchBox).val()).draw();
a.s.dt.state.save()});this.s.dt.state.save();return!0};k.prototype._addOption=function(a,b,c,d,e,g){if(Array.isArray(a)||a instanceof r.Api)if(a instanceof r.Api&&(a=a.toArray(),b=b.toArray()),a.length===b.length)for(var f=0;f<a.length;f++)g[a[f]]?g[a[f]]++:(g[a[f]]=1,e.push({display:b[f],filter:a[f],sort:c[f],type:d[f]})),this.s.rowData.totalOptions++;else throw Error("display and filter not the same length");else"string"===typeof this.s.colOpts.orthogonal?(g[a]?g[a]++:(g[a]=1,e.push({display:b,
filter:a,sort:c,type:d})),this.s.rowData.totalOptions++):e.push({display:b,filter:a,sort:c,type:d})};k.prototype._addRow=function(a,b,c,d,e,g,f){for(var l,p=0,n=this.s.indexes;p<n.length;p++){var x=n[p];x.filter===b&&(l=x.index)}void 0===l&&(l=this.s.indexes.length,this.s.indexes.push({filter:b,index:l}));return this.s.dtPane.row.add({className:f,display:""!==a?a:!1!==this.s.colOpts.emptyMessage?this.s.colOpts.emptyMessage:this.c.emptyMessage,filter:b,index:l,shown:c,sort:""!==e?e:!1!==this.s.colOpts.emptyMessage?
this.s.colOpts.emptyMessage:this.c.emptyMessage,total:d,type:g})};k.prototype._adjustTopRow=function(){var a=this.dom.container.find("."+this.classes.subRowsContainer),b=this.dom.container.find(".dtsp-subRow1"),c=this.dom.container.find(".dtsp-subRow2"),d=this.dom.container.find("."+this.classes.topRow);(252>h(a[0]).width()||252>h(d[0]).width())&&0!==h(a[0]).width()?(h(a[0]).addClass(this.classes.narrow),h(b[0]).addClass(this.classes.narrowSub).removeClass(this.classes.narrowSearch),h(c[0]).addClass(this.classes.narrowSub).removeClass(this.classes.narrowButton)):
(h(a[0]).removeClass(this.classes.narrow),h(b[0]).removeClass(this.classes.narrowSub).addClass(this.classes.narrowSearch),h(c[0]).removeClass(this.classes.narrowSub).addClass(this.classes.narrowButton))};k.prototype._buildPane=function(a,b,c,d,e){var g=this;void 0===a&&(a=[]);void 0===b&&(b=!1);void 0===c&&(c=null);void 0===d&&(d=null);void 0===e&&(e=null);this.selections=[];var f=this.s.dt,l=f.column(this.colExists?this.s.index:0),p=this.s.colOpts,n=this.s.rowData,x=f.i18n("searchPanes.count","{total}"),
z=f.i18n("searchPanes.countFiltered","{shown} ({total})"),y=f.state.loaded();this.s.listSet&&(y=f.state());if(this.colExists){var w=-1;if(y&&y.searchPanes&&y.searchPanes.panes)for(var u=0;u<y.searchPanes.panes.length;u++)if(y.searchPanes.panes[u].id===this.s.index){w=u;break}if((!1===p.show||void 0!==p.show&&!0!==p.show)&&-1===w)return this.dom.container.addClass(this.classes.hidden),this.s.displayed=!1;if(!0===p.show||-1!==w)this.s.displayed=!0;if(!this.s.dt.page.info().serverSide&&(null===c||null===
c.searchPanes||null===c.searchPanes.options)){if(0===n.arrayFilter.length){this._populatePane(b);this.s.rowData.totalOptions=0;this._detailsPane();if(y&&y.searchPanes&&y.searchPanes.panes&&-1===w){this.dom.container.addClass(this.classes.hidden);this.s.displayed=!1;return}n.arrayOriginal=n.arrayTotals;n.binsOriginal=n.binsTotal}u=Object.keys(n.binsOriginal).length;b=this._uniqueRatio(u,f.rows()[0].length);if(!1===this.s.displayed&&((void 0===p.show&&null===p.threshold?b>this.c.threshold:b>p.threshold)||
!0!==p.show&&1>=u)){this.dom.container.addClass(this.classes.hidden);this.s.displayed=!1;return}this.c.viewTotal&&0===n.arrayTotals.length?(this.s.rowData.totalOptions=0,this._detailsPane()):n.binsTotal=n.bins;this.dom.container.addClass(this.classes.show);this.s.displayed=!0}else if(null!==c&&null!==c.searchPanes&&null!==c.searchPanes.options){if(void 0!==c.tableLength)this.s.tableLength=c.tableLength,this.s.rowData.totalOptions=this.s.tableLength;else if(null===this.s.tableLength||f.rows()[0].length>
this.s.tableLength)this.s.tableLength=f.rows()[0].length,this.s.rowData.totalOptions=this.s.tableLength;b=f.column(this.s.index).dataSrc();if(void 0!==c.searchPanes.options[b])for(u=0,b=c.searchPanes.options[b];u<b.length;u++)w=b[u],this.s.rowData.arrayFilter.push({display:w.label,filter:w.value,sort:w.label,type:w.label}),this.s.rowData.bins[w.value]=this.c.viewTotal||this.c.cascadePanes?w.count:w.total,this.s.rowData.binsTotal[w.value]=w.total;u=Object.keys(n.binsTotal).length;b=this._uniqueRatio(u,
this.s.tableLength);if(!1===this.s.displayed&&((void 0===p.show&&null===p.threshold?b>this.c.threshold:b>p.threshold)||!0!==p.show&&1>=u)){this.dom.container.addClass(this.classes.hidden);this.s.displayed=!1;return}this.s.rowData.arrayOriginal=this.s.rowData.arrayFilter;this.s.rowData.binsOriginal=this.s.rowData.bins;this.s.displayed=!0}}else this.s.displayed=!0;this._displayPane();if(!this.s.listSet)this.dom.dtP.on("stateLoadParams.dt",function(E,F,D){h.isEmptyObject(f.state.loaded())&&h.each(D,
function(C,I){delete D[C]})});null!==e&&0<h(this.dom.panesContainer).has(e).length?h(this.dom.container).insertAfter(e):h(this.dom.panesContainer).prepend(this.dom.container);u=h.fn.dataTable.ext.errMode;h.fn.dataTable.ext.errMode="none";e=r.Scroller;this.s.dtPane=h(this.dom.dtP).DataTable(h.extend(!0,{columnDefs:[{className:"dtsp-nameColumn",data:"display",render:function(E,F,D){if("sort"===F)return D.sort;if("type"===F)return D.type;var C;(g.s.filteringActive||g.s.showFiltered)&&g.c.viewTotal?C=
z.replace(/{total}/,D.total):C=x.replace(/{total}/,D.total);for(C=C.replace(/{shown}/,D.shown);-1!==C.indexOf("{total}");)C=C.replace(/{total}/,D.total);for(;-1!==C.indexOf("{shown}");)C=C.replace(/{shown}/,D.shown);F='<span class="'+g.classes.pill+'">'+C+"</span>";if(g.c.hideCount||p.hideCount)F="";return'<div class="'+g.classes.nameCont+'"><span title="'+("string"===typeof E&&null!==E.match(/<[^>]*>/)?E.replace(/<[^>]*>/g,""):E)+'" class="'+g.classes.name+'">'+E+"</span>"+F+"</div>"},targets:0,
type:void 0!==f.settings()[0].aoColumns[this.s.index]?f.settings()[0].aoColumns[this.s.index]._sManualType:null},{className:"dtsp-countColumn "+this.classes.badgePill,data:"shown",orderData:[1,2],targets:1,visible:!1},{data:"total",targets:2,visible:!1}],deferRender:!0,dom:"t",info:!1,language:this.s.dt.settings()[0].oLanguage,paging:e?!0:!1,scrollX:!1,scrollY:"200px",scroller:e?!0:!1,select:!0,stateSave:f.settings()[0].oFeatures.bStateSave?!0:!1},this.c.dtOpts,void 0!==p?p.dtOpts:{},void 0===this.s.colOpts.options&&
this.colExists?void 0:{createdRow:function(E,F,D){h(E).addClass(F.className)}},null!==this.customPaneSettings&&void 0!==this.customPaneSettings.dtOpts?this.customPaneSettings.dtOpts:{}));h(this.dom.dtP).addClass(this.classes.table);h(this.dom.searchBox).attr("placeholder",void 0!==p.header?p.header:this.colExists?f.settings()[0].aoColumns[this.s.index].sTitle:this.customPaneSettings.header||"Custom Pane");h.fn.dataTable.select.init(this.s.dtPane);h.fn.dataTable.ext.errMode=u;if(this.colExists){l=
(l=l.search())?l.substr(1,l.length-2).split("|"):[];var B=0;n.arrayFilter.forEach(function(E){""===E.filter&&B++});u=0;for(e=n.arrayFilter.length;u<e;u++){l=!1;w=0;for(var H=this.s.serverSelect;w<H.length;w++)b=H[w],b.filter===n.arrayFilter[u].filter&&(l=!0);if(this.s.dt.page.info().serverSide&&(!this.c.cascadePanes||this.c.cascadePanes&&0!==n.bins[n.arrayFilter[u].filter]||this.c.cascadePanes&&null!==d||l))for(l=this._addRow(n.arrayFilter[u].display,n.arrayFilter[u].filter,d?n.binsTotal[n.arrayFilter[u].filter]:
n.bins[n.arrayFilter[u].filter],this.c.viewTotal||d?String(n.binsTotal[n.arrayFilter[u].filter]):n.bins[n.arrayFilter[u].filter],n.arrayFilter[u].sort,n.arrayFilter[u].type),w=0,H=this.s.serverSelect;w<H.length;w++)b=H[w],b.filter===n.arrayFilter[u].filter&&(this.s.serverSelecting=!0,l.select(),this.s.serverSelecting=!1);else this.s.dt.page.info().serverSide||!n.arrayFilter[u]||void 0===n.bins[n.arrayFilter[u].filter]&&this.c.cascadePanes?this.s.dt.page.info().serverSide||this._addRow("",B,B,"","",
""):this._addRow(n.arrayFilter[u].display,n.arrayFilter[u].filter,n.bins[n.arrayFilter[u].filter],n.binsTotal[n.arrayFilter[u].filter],n.arrayFilter[u].sort,n.arrayFilter[u].type)}}r.select.init(this.s.dtPane);(void 0!==p.options||null!==this.customPaneSettings&&void 0!==this.customPaneSettings.options)&&this._getComparisonRows();this.s.dtPane.draw();this._adjustTopRow();this.s.listSet||(this._setListeners(),this.s.listSet=!0);for(d=0;d<a.length;d++)if(n=a[d],void 0!==n)for(u=0,e=this.s.dtPane.rows().indexes().toArray();u<
e.length;u++)l=e[u],void 0!==this.s.dtPane.row(l).data()&&n.filter===this.s.dtPane.row(l).data().filter&&(this.s.dt.page.info().serverSide?(this.s.serverSelecting=!0,this.s.dtPane.row(l).select(),this.s.serverSelecting=!1):this.s.dtPane.row(l).select());this.s.dt.page.info().serverSide&&this.s.dtPane.search(h(this.dom.searchBox).val()).draw();if(y&&y.searchPanes&&y.searchPanes.panes&&(null===c||1===c.draw))for(this.c.cascadePanes||this._reloadSelect(y),c=0,y=y.searchPanes.panes;c<y.length;c++)a=y[c],
a.id===this.s.index&&(h(this.dom.searchBox).val(a.searchTerm),h(this.dom.searchBox).trigger("input"),this.s.dtPane.order(a.order).draw());this.s.dt.state.save();return!0};k.prototype._detailsPane=function(){var a=this.s.dt;this.s.rowData.arrayTotals=[];this.s.rowData.binsTotal={};var b=this.s.dt.settings()[0];a=a.rows().indexes();if(!this.s.dt.page.info().serverSide)for(var c=0;c<a.length;c++)this._populatePaneArray(a[c],this.s.rowData.arrayTotals,b,this.s.rowData.binsTotal)};k.prototype._displayPane=
function(){var a=this.dom.container,b=this.s.colOpts,c=parseInt(this.c.layout.split("-")[1],10);h(this.dom.topRow).empty();h(this.dom.dtP).empty();h(this.dom.topRow).addClass(this.classes.topRow);3<c&&h(this.dom.container).addClass(this.classes.smallGap);h(this.dom.topRow).addClass(this.classes.subRowsContainer);h(this.dom.upper).appendTo(this.dom.topRow);h(this.dom.lower).appendTo(this.dom.topRow);h(this.dom.searchCont).appendTo(this.dom.upper);h(this.dom.buttonGroup).appendTo(this.dom.lower);(!1===
this.c.dtOpts.searching||void 0!==b.dtOpts&&!1===b.dtOpts.searching||!this.c.controls||!b.controls||null!==this.customPaneSettings&&void 0!==this.customPaneSettings.dtOpts&&void 0!==this.customPaneSettings.dtOpts.searching&&!this.customPaneSettings.dtOpts.searching)&&h(this.dom.searchBox).attr("disabled","disabled").removeClass(this.classes.paneInputButton).addClass(this.classes.disabledButton);h(this.dom.searchBox).appendTo(this.dom.searchCont);this._searchContSetup();this.c.clear&&this.c.controls&&
b.controls&&h(this.dom.clear).appendTo(this.dom.buttonGroup);this.c.orderable&&b.orderable&&this.c.controls&&b.controls&&h(this.dom.nameButton).appendTo(this.dom.buttonGroup);!this.c.hideCount&&!b.hideCount&&this.c.orderable&&b.orderable&&this.c.controls&&b.controls&&h(this.dom.countButton).appendTo(this.dom.buttonGroup);h(this.dom.topRow).prependTo(this.dom.container);h(a).append(this.dom.dtP);h(a).show()};k.prototype._getBonusOptions=function(){return h.extend(!0,{},k.defaults,{orthogonal:{threshold:null},
threshold:null},void 0!==this.c?this.c:{})};k.prototype._getComparisonRows=function(){var a=this.s.colOpts;a=void 0!==a.options?a.options:null!==this.customPaneSettings&&void 0!==this.customPaneSettings.options?this.customPaneSettings.options:void 0;if(void 0!==a){var b=this.s.dt.rows({search:"applied"}).data().toArray(),c=this.s.dt.rows({search:"applied"}),d=this.s.dt.rows().data().toArray(),e=this.s.dt.rows(),g=[];this.s.dtPane.clear();for(var f=0;f<a.length;f++){var l=a[f],p=""!==l.label?l.label:
this.c.emptyMessage,n=l.className,x=p,z="function"===typeof l.value?l.value:[],y=0,w=p,u=0;if("function"===typeof l.value){for(var B=0;B<b.length;B++)l.value.call(this.s.dt,b[B],c[0][B])&&y++;for(B=0;B<d.length;B++)l.value.call(this.s.dt,d[B],e[0][B])&&u++;"function"!==typeof z&&z.push(l.filter)}(!this.c.cascadePanes||this.c.cascadePanes&&0!==y)&&g.push(this._addRow(x,z,y,u,w,p,n))}return g}};k.prototype._getOptions=function(){return h.extend(!0,{},k.defaults,{emptyMessage:!1,orthogonal:{threshold:null},
threshold:null},this.s.dt.settings()[0].aoColumns[this.s.index].searchPanes)};k.prototype._makeSelection=function(){this.updateTable();this.s.updating=!0;this.s.dt.draw();this.s.updating=!1};k.prototype._populatePane=function(a){void 0===a&&(a=!1);var b=this.s.dt;this.s.rowData.arrayFilter=[];this.s.rowData.bins={};var c=this.s.dt.settings()[0];if(!this.s.dt.page.info().serverSide){var d=0;for(a=(!this.c.cascadePanes&&!this.c.viewTotal||this.s.clearing||a?b.rows().indexes():b.rows({search:"applied"}).indexes()).toArray();d<
a.length;d++)this._populatePaneArray(a[d],this.s.rowData.arrayFilter,c)}};k.prototype._populatePaneArray=function(a,b,c,d){void 0===d&&(d=this.s.rowData.bins);var e=this.s.colOpts;if("string"===typeof e.orthogonal)c=c.oApi._fnGetCellData(c,a,this.s.index,e.orthogonal),this.s.rowData.filterMap.set(a,c),this._addOption(c,c,c,c,b,d);else{var g=c.oApi._fnGetCellData(c,a,this.s.index,e.orthogonal.search);null===g&&(g="");"string"===typeof g&&(g=g.replace(/<[^>]*>/g,""));this.s.rowData.filterMap.set(a,
g);d[g]?d[g]++:(d[g]=1,this._addOption(g,c.oApi._fnGetCellData(c,a,this.s.index,e.orthogonal.display),c.oApi._fnGetCellData(c,a,this.s.index,e.orthogonal.sort),c.oApi._fnGetCellData(c,a,this.s.index,e.orthogonal.type),b,d));this.s.rowData.totalOptions++}};k.prototype._reloadSelect=function(a){if(void 0!==a){for(var b,c=0;c<a.searchPanes.panes.length;c++)if(a.searchPanes.panes[c].id===this.s.index){b=c;break}if(void 0!==b){c=this.s.dtPane;var d=c.rows({order:"index"}).data().map(function(f){return null!==
f.filter?f.filter.toString():null}).toArray(),e=0;for(a=a.searchPanes.panes[b].selected;e<a.length;e++){b=a[e];var g=-1;null!==b&&(g=d.indexOf(b.toString()));-1<g&&(this.s.serverSelecting=!0,c.row(g).select(),this.s.serverSelecting=!1)}}}};k.prototype._search=function(a,b){for(var c=this.s.colOpts,d=this.s.dt,e=0,g=this.selections;e<g.length;e++){var f=g[e];"string"===typeof f.filter&&(f.filter=f.filter.replaceAll("&amp;","&"));if(Array.isArray(a)){if(-1!==a.indexOf(f.filter))return!0}else if("function"===
typeof f.filter)if(f.filter.call(d,d.row(b).data(),b)){if("or"===c.combiner)return!0}else{if("and"===c.combiner)return!1}else if(a===f.filter||("string"!==typeof a||0!==a.length)&&a==f.filter||null===f.filter&&"string"===typeof a&&""===a)return!0}return"and"===c.combiner?!0:!1};k.prototype._searchContSetup=function(){this.c.controls&&this.s.colOpts.controls&&h(this.dom.searchButton).appendTo(this.dom.searchLabelCont);!1===this.c.dtOpts.searching||!1===this.s.colOpts.dtOpts.searching||null!==this.customPaneSettings&&
void 0!==this.customPaneSettings.dtOpts&&void 0!==this.customPaneSettings.dtOpts.searching&&!this.customPaneSettings.dtOpts.searching||h(this.dom.searchLabelCont).appendTo(this.dom.searchCont)};k.prototype._searchExtras=function(){var a=this.s.updating;this.s.updating=!0;var b=this.s.dtPane.rows({selected:!0}).data().pluck("filter").toArray(),c=b.indexOf(!1!==this.s.colOpts.emptyMessage?this.s.colOpts.emptyMessage:this.c.emptyMessage),d=h(this.s.dtPane.table().container());-1<c&&(b[c]="");0<b.length?
d.addClass(this.classes.selected):0===b.length&&d.removeClass(this.classes.selected);this.s.updating=a};k.prototype._uniqueRatio=function(a,b){return 0<b&&(0<this.s.rowData.totalOptions&&!this.s.dt.page.info().serverSide||this.s.dt.page.info().serverSide&&0<this.s.tableLength)?a/this.s.rowData.totalOptions:1};k.prototype._updateCommon=function(a){void 0===a&&(a=!1);if(!(this.s.dt.page.info().serverSide||void 0===this.s.dtPane||this.s.filteringActive&&!this.c.cascadePanes&&!0!==a||!0===this.c.cascadePanes&&
!0===this.s.selectPresent||this.s.lastSelect&&this.s.lastCascade)){var b=this.s.colOpts,c=this.s.dtPane.rows({selected:!0}).data().toArray();a=h(this.s.dtPane.table().node()).parent()[0].scrollTop;var d=this.s.rowData;this.s.dtPane.clear();if(this.colExists){0===d.arrayFilter.length?this._populatePane():this.c.cascadePanes&&this.s.dt.rows().data().toArray().length===this.s.dt.rows({search:"applied"}).data().toArray().length?(d.arrayFilter=d.arrayOriginal,d.bins=d.binsOriginal):(this.c.viewTotal||
this.c.cascadePanes)&&this._populatePane();this.c.viewTotal?this._detailsPane():d.binsTotal=d.bins;this.c.viewTotal&&!this.c.cascadePanes&&(d.arrayFilter=d.arrayTotals);for(var e=function(p){if(p&&(void 0!==d.bins[p.filter]&&0!==d.bins[p.filter]&&g.c.cascadePanes||!g.c.cascadePanes||g.s.clearing)){var n=g._addRow(p.display,p.filter,g.c.viewTotal?void 0!==d.bins[p.filter]?d.bins[p.filter]:0:d.bins[p.filter],g.c.viewTotal?String(d.binsTotal[p.filter]):d.bins[p.filter],p.sort,p.type),x=c.findIndex(function(z){return z.filter===
p.filter});-1!==x&&(n.select(),c.splice(x,1))}},g=this,f=0,l=d.arrayFilter;f<l.length;f++)e(l[f])}if(void 0!==b.searchPanes&&void 0!==b.searchPanes.options||void 0!==b.options||null!==this.customPaneSettings&&void 0!==this.customPaneSettings.options)for(e=function(p){var n=c.findIndex(function(x){if(x.display===p.data().display)return!0});-1!==n&&(p.select(),c.splice(n,1))},f=0,l=this._getComparisonRows();f<l.length;f++)b=l[f],e(b);for(e=0;e<c.length;e++)b=c[e],b=this._addRow(b.display,b.filter,0,
this.c.viewTotal?b.total:0,b.display,b.display),this.s.updating=!0,b.select(),this.s.updating=!1;this.s.dtPane.draw();this.s.dtPane.table().node().parentNode.scrollTop=a}};k.version="1.1.0";k.classes={buttonGroup:"dtsp-buttonGroup",buttonSub:"dtsp-buttonSub",clear:"dtsp-clear",clearAll:"dtsp-clearAll",clearButton:"clearButton",container:"dtsp-searchPane",countButton:"dtsp-countButton",disabledButton:"dtsp-disabledButton",dull:"dtsp-dull",hidden:"dtsp-hidden",hide:"dtsp-hide",layout:"dtsp-",name:"dtsp-name",
nameButton:"dtsp-nameButton",nameCont:"dtsp-nameCont",narrow:"dtsp-narrow",paneButton:"dtsp-paneButton",paneInputButton:"dtsp-paneInputButton",pill:"dtsp-pill",search:"dtsp-search",searchCont:"dtsp-searchCont",searchIcon:"dtsp-searchIcon",searchLabelCont:"dtsp-searchButtonCont",selected:"dtsp-selected",smallGap:"dtsp-smallGap",subRow1:"dtsp-subRow1",subRow2:"dtsp-subRow2",subRowsContainer:"dtsp-subRowsContainer",title:"dtsp-title",topRow:"dtsp-topRow"};k.defaults={cascadePanes:!1,clear:!0,combiner:"or",
controls:!0,container:function(a){return a.table().container()},dtOpts:{},emptyMessage:"<i>No Data</i>",hideCount:!1,layout:"columns-3",name:void 0,orderable:!0,orthogonal:{display:"display",filter:"filter",hideCount:!1,search:"filter",show:void 0,sort:"sort",threshold:.6,type:"type"},preSelect:[],threshold:.6,viewTotal:!1};return k}(),q,A,G=function(){function k(a,b,c){var d=this;void 0===c&&(c=!1);this.regenerating=!1;if(!A||!A.versionCheck||!A.versionCheck("1.10.0"))throw Error("SearchPane requires DataTables 1.10 or newer");
if(!A.select)throw Error("SearchPane requires Select");var e=new A.Api(a);this.classes=q.extend(!0,{},k.classes);this.c=q.extend(!0,{},k.defaults,b);this.dom={clearAll:q('<button >Clear All</button>').addClass(this.classes.clearAll),container:q("<div/>").addClass(this.classes.panes).text(e.i18n("searchPanes.loadMessage","Loading Search Panes...")),emptyMessage:q("<div/>").addClass(this.classes.emptyMessage),options:q("<div/>").addClass(this.classes.container),panes:q("<div/>").addClass(this.classes.container),
title:q("<div/>").addClass(this.classes.title),titleRow:q("<div/>").addClass(this.classes.titleRow),wrapper:q("<div/>")};this.s={colOpts:[],dt:e,filterCount:0,filterPane:-1,page:0,panes:[],selectionList:[],serverData:{},stateRead:!1,updating:!1};if(void 0===e.settings()[0]._searchPanes){this._getState();if(this.s.dt.page.info().serverSide)e.on("preXhr.dt",function(g,f,l){void 0===l.searchPanes&&(l.searchPanes={});g=0;for(f=d.s.selectionList;g<f.length;g++){var p=f[g],n=d.s.dt.column(p.index).dataSrc();
void 0===l.searchPanes[n]&&(l.searchPanes[n]={});for(var x=0;x<p.rows.length;x++)l.searchPanes[n][x]=p.rows[x].filter}});e.on("xhr",function(g,f,l,p){l&&l.searchPanes&&l.searchPanes.options&&(d.s.serverData=l,d.s.serverData.tableLength=l.recordsTotal,d._serverTotals())});e.settings()[0]._searchPanes=this;this.dom.clearAll.text(e.i18n("searchPanes.clearMessage","Clear All"));if(this.s.dt.settings()[0]._bInitComplete||c)this._paneDeclare(e,a,b);else e.one("preInit.dt",function(g){d._paneDeclare(e,a,
b)});return this}}k.prototype.clearSelections=function(){this.dom.container.find(this.classes.search).each(function(){q(this).val("");q(this).trigger("input")});for(var a=[],b=0,c=this.s.panes;b<c.length;b++){var d=c[b];void 0!==d.s.dtPane&&a.push(d.clearPane())}this.s.dt.draw();return a};k.prototype.getNode=function(){return this.dom.container};k.prototype.rebuild=function(a,b){void 0===a&&(a=!1);void 0===b&&(b=!1);q(this.dom.emptyMessage).remove();var c=[];!1===a&&q(this.dom.panes).empty();for(var d=
0,e=this.s.panes;d<e.length;d++){var g=e[d];if(!1===a||g.s.index===a)g.clearData(),c.push(g.rebuildPane(void 0!==this.s.selectionList[this.s.selectionList.length-1]?g.s.index===this.s.selectionList[this.s.selectionList.length-1].index:!1,this.s.dt.page.info().serverSide?this.s.serverData:void 0,null,b)),q(this.dom.panes).append(g.dom.container)}this.s.dt.page.info().serverSide||this.s.dt.draw();this.c.cascadePanes||this.c.viewTotal?this.redrawPanes(!0):this._updateSelection();this._updateFilterCount();
this._attachPaneContainer();this.s.dt.draw();return 1===c.length?c[0]:c};k.prototype.redrawPanes=function(a){void 0===a&&(a=!1);var b=this.s.dt;if(!this.s.updating&&!this.s.dt.page.info().serverSide){var c=!0,d=this.s.filterPane;if(b.rows({search:"applied"}).data().toArray().length===b.rows().data().toArray().length)c=!1;else if(this.c.viewTotal)for(var e=0,g=this.s.panes;e<g.length;e++){var f=g[e];if(void 0!==f.s.dtPane){var l=f.s.dtPane.rows({selected:!0}).data().toArray().length;if(0===l)for(var p=
0,n=this.s.selectionList;p<n.length;p++){var x=n[p];x.index===f.s.index&&0!==x.rows.length&&(l=x.rows.length)}0<l&&-1===d?d=f.s.index:0<l&&(d=null)}}g=void 0;e=[];if(this.regenerating){g=-1;1===e.length&&(g=e[0].index);a=0;for(e=this.s.panes;a<e.length;a++)if(f=e[a],void 0!==f.s.dtPane){b=!0;f.s.filteringActive=!0;if(-1!==d&&null!==d&&d===f.s.index||!1===c||f.s.index===g)b=!1,f.s.filteringActive=!1;f.updatePane(b?c:b)}this._updateFilterCount()}else{l=0;for(p=this.s.panes;l<p.length;l++)if(f=p[l],
f.s.selectPresent){this.s.selectionList.push({index:f.s.index,rows:f.s.dtPane.rows({selected:!0}).data().toArray(),protect:!1});b.state.save();break}else f.s.deselect&&(g=f.s.index,n=f.s.dtPane.rows({selected:!0}).data().toArray(),0<n.length&&this.s.selectionList.push({index:f.s.index,rows:n,protect:!0}));if(0<this.s.selectionList.length)for(b=this.s.selectionList[this.s.selectionList.length-1].index,l=0,p=this.s.panes;l<p.length;l++)f=p[l],f.s.lastSelect=f.s.index===b;for(f=0;f<this.s.selectionList.length;f++)if(this.s.selectionList[f].index!==
g||!0===this.s.selectionList[f].protect){b=!1;for(l=f+1;l<this.s.selectionList.length;l++)this.s.selectionList[l].index===this.s.selectionList[f].index&&(b=!0);b||(e.push(this.s.selectionList[f]),this.s.selectionList[f].protect=!1)}g=-1;1===e.length&&(g=e[0].index);l=0;for(p=this.s.panes;l<p.length;l++)if(f=p[l],void 0!==f.s.dtPane){b=!0;f.s.filteringActive=!0;if(-1!==d&&null!==d&&d===f.s.index||!1===c||f.s.index===g)b=!1,f.s.filteringActive=!1;f.updatePane(b?c:!1)}this._updateFilterCount();if(0<
e.length&&(e.length<this.s.selectionList.length||a))for(this._cascadeRegen(e),b=e[e.length-1].index,d=0,a=this.s.panes;d<a.length;d++)f=a[d],f.s.lastSelect=f.s.index===b;else if(0<e.length)for(f=0,a=this.s.panes;f<a.length;f++)if(e=a[f],void 0!==e.s.dtPane){b=!0;e.s.filteringActive=!0;if(-1!==d&&null!==d&&d===e.s.index||!1===c)b=!1,e.s.filteringActive=!1;e.updatePane(b?c:b)}}c||(this.s.selectionList=[])}};k.prototype._attach=function(){var a=this;q(this.dom.container).removeClass(this.classes.hide);
q(this.dom.titleRow).removeClass(this.classes.hide);q(this.dom.titleRow).remove();q(this.dom.title).appendTo(this.dom.titleRow);this.c.clear&&(q(this.dom.clearAll).appendTo(this.dom.titleRow),q(this.dom.clearAll).on("click.dtsps",function(){a.clearSelections()}));q(this.dom.titleRow).appendTo(this.dom.container);for(var b=0,c=this.s.panes;b<c.length;b++)q(c[b].dom.container).appendTo(this.dom.panes);q(this.dom.panes).appendTo(this.dom.container);0===q("div."+this.classes.container).length&&q(this.dom.container).prependTo(this.s.dt);
return this.dom.container};k.prototype._attachExtras=function(){q(this.dom.container).removeClass(this.classes.hide);q(this.dom.titleRow).removeClass(this.classes.hide);q(this.dom.titleRow).remove();q(this.dom.title).appendTo(this.dom.titleRow);this.c.clear&&q(this.dom.clearAll).appendTo(this.dom.titleRow);q(this.dom.titleRow).appendTo(this.dom.container);return this.dom.container};k.prototype._attachMessage=function(){try{var a=this.s.dt.i18n("searchPanes.emptyPanes","No SearchPanes")}catch(b){a=
null}if(null===a)q(this.dom.container).addClass(this.classes.hide),q(this.dom.titleRow).removeClass(this.classes.hide);else return q(this.dom.container).removeClass(this.classes.hide),q(this.dom.titleRow).addClass(this.classes.hide),q(this.dom.emptyMessage).text(a),this.dom.emptyMessage.appendTo(this.dom.container),this.dom.container};k.prototype._attachPaneContainer=function(){for(var a=0,b=this.s.panes;a<b.length;a++)if(!0===b[a].s.displayed)return this._attach();return this._attachMessage()};k.prototype._cascadeRegen=
function(a){this.regenerating=!0;var b=-1;1===a.length&&(b=a[0].index);for(var c=0,d=this.s.panes;c<d.length;c++){var e=d[c];e.setCascadeRegen(!0);e.setClear(!0);(void 0!==e.s.dtPane&&e.s.index===b||void 0!==e.s.dtPane)&&e.clearPane();e.setClear(!1)}this._makeCascadeSelections(a);this.s.selectionList=a;a=0;for(b=this.s.panes;a<b.length;a++)e=b[a],e.setCascadeRegen(!1);this.regenerating=!1};k.prototype._checkMessage=function(){for(var a=0,b=this.s.panes;a<b.length;a++)if(!0===b[a].s.displayed)return;
return this._attachMessage()};k.prototype._getState=function(){var a=this.s.dt.state.loaded();a&&a.searchPanes&&void 0!==a.searchPanes.selectionList&&(this.s.selectionList=a.searchPanes.selectionList)};k.prototype._makeCascadeSelections=function(a){for(var b=0;b<a.length;b++)for(var c=function(f){if(f.s.index===a[b].index&&void 0!==f.s.dtPane){b===a.length-1&&(f.s.lastCascade=!0);0<f.s.dtPane.rows({selected:!0}).data().toArray().length&&void 0!==f.s.dtPane&&(f.setClear(!0),f.clearPane(),f.setClear(!1));
for(var l=function(x){f.s.dtPane.rows().every(function(z){void 0!==f.s.dtPane.row(z).data()&&void 0!==x&&f.s.dtPane.row(z).data().filter===x.filter&&f.s.dtPane.row(z).select()})},p=0,n=a[b].rows;p<n.length;p++)l(n[p]);d._updateFilterCount();f.s.lastCascade=!1}},d=this,e=0,g=this.s.panes;e<g.length;e++)c(g[e]);this.s.dt.state.save()};k.prototype._paneDeclare=function(a,b,c){var d=this;a.columns(0<this.c.columns.length?this.c.columns:void 0).eq(0).each(function(l){d.s.panes.push(new v(b,c,l,d.c.layout,
d.dom.panes))});for(var e=a.columns().eq(0).toArray().length,g=this.c.panes.length,f=0;f<g;f++)this.s.panes.push(new v(b,c,e+f,this.c.layout,this.dom.panes,this.c.panes[f]));if(0<this.c.order.length)for(e=this.c.order.map(function(l,p,n){return d._findPane(l)}),this.dom.panes.empty(),this.s.panes=e,e=0,g=this.s.panes;e<g.length;e++)this.dom.panes.append(g[e].dom.container);this.s.dt.settings()[0]._bInitComplete?this._startup(a):this.s.dt.settings()[0].aoInitComplete.push({fn:function(){d._startup(a)}})};
k.prototype._findPane=function(a){for(var b=0,c=this.s.panes;b<c.length;b++){var d=c[b];if(a===d.s.name)return d}};k.prototype._serverTotals=function(){for(var a=!1,b=!1,c=this.s.dt,d=0,e=this.s.panes;d<e.length;d++){var g=e[d];if(g.s.selectPresent){this.s.selectionList.push({index:g.s.index,rows:g.s.dtPane.rows({selected:!0}).data().toArray(),protect:!1});c.state.save();g.s.selectPresent=!1;a=!0;break}else g.s.deselect&&(b=g.s.dtPane.rows({selected:!0}).data().toArray(),0<b.length&&this.s.selectionList.push({index:g.s.index,
rows:b,protect:!0}),b=a=!0)}if(a){c=[];for(d=0;d<this.s.selectionList.length;d++){g=!1;for(e=d+1;e<this.s.selectionList.length;e++)this.s.selectionList[e].index===this.s.selectionList[d].index&&(g=!0);if(!g){e=!1;a=0;for(var f=this.s.panes;a<f.length;a++)g=f[a],g.s.index===this.s.selectionList[d].index&&0<g.s.dtPane.rows({selected:!0}).data().toArray().length&&(e=!0);e&&c.push(this.s.selectionList[d])}}this.s.selectionList=c}else this.s.selectionList=[];c=-1;if(b&&1===this.s.selectionList.length)for(b=
0,d=this.s.panes;b<d.length;b++)g=d[b],g.s.lastSelect=!1,g.s.deselect=!1,void 0!==g.s.dtPane&&0<g.s.dtPane.rows({selected:!0}).data().toArray().length&&(c=g.s.index);else if(0<this.s.selectionList.length)for(b=this.s.selectionList[this.s.selectionList.length-1].index,d=0,e=this.s.panes;d<e.length;d++)g=e[d],g.s.lastSelect=g.s.index===b,g.s.deselect=!1;else if(0===this.s.selectionList.length)for(b=0,d=this.s.panes;b<d.length;b++)g=d[b],g.s.lastSelect=!1,g.s.deselect=!1;q(this.dom.panes).empty();b=
0;for(d=this.s.panes;b<d.length;b++)g=d[b],g.s.lastSelect?g._setListeners():g.rebuildPane(void 0,this.s.dt.page.info().serverSide?this.s.serverData:void 0,g.s.index===c?!0:null,!0),q(this.dom.panes).append(g.dom.container),void 0!==g.s.dtPane&&(q(g.s.dtPane.table().node()).parent()[0].scrollTop=g.s.scrollTop,q.fn.dataTable.select.init(g.s.dtPane));this.s.dt.page.info().serverSide||this.s.dt.draw()};k.prototype._startup=function(a){var b=this;q(this.dom.container).text("");this._attachExtras();q(this.dom.container).append(this.dom.panes);
q(this.dom.panes).empty();var c=this.s.dt.state.loaded();if(this.c.viewTotal&&!this.c.cascadePanes&&null!==c&&void 0!==c&&void 0!==c.searchPanes&&void 0!==c.searchPanes.panes){for(var d=!1,e=0,g=c.searchPanes.panes;e<g.length;e++){var f=g[e];if(0<f.selected.length){d=!0;break}}if(d)for(d=0,e=this.s.panes;d<e.length;d++)f=e[d],f.s.showFiltered=!0}d=0;for(e=this.s.panes;d<e.length;d++)f=e[d],f.rebuildPane(void 0,0<Object.keys(this.s.serverData).length?this.s.serverData:void 0),q(this.dom.panes).append(f.dom.container);
this.s.dt.page.info().serverSide||this.s.dt.draw();this.s.stateRead||null===c||void 0===c||(this.s.dt.page(c.start/this.s.dt.page.len()),this.s.dt.draw("page"));this.s.stateRead=!0;if(this.c.viewTotal&&!this.c.cascadePanes)for(c=0,d=this.s.panes;c<d.length;c++)f=d[c],f.updatePane();this._updateFilterCount();this._checkMessage();a.on("preDraw.dtsps",function(){b._updateFilterCount();!b.c.cascadePanes&&!b.c.viewTotal||b.s.dt.page.info().serverSide?b._updateSelection():b.redrawPanes();b.s.filterPane=
-1});this.s.dt.on("stateSaveParams.dtsp",function(l,p,n){void 0===n.searchPanes&&(n.searchPanes={});n.searchPanes.selectionList=b.s.selectionList});if(this.s.dt.page.info().serverSide)a.off("page"),a.on("page",function(){b.s.page=b.s.dt.page()}),a.off("preXhr.dt"),a.on("preXhr.dt",function(l,p,n){void 0===n.searchPanes&&(n.searchPanes={});p=l=0;for(var x=b.s.panes;p<x.length;p++){var z=x[p],y=b.s.dt.column(z.s.index).dataSrc();void 0===n.searchPanes[y]&&(n.searchPanes[y]={});if(void 0!==z.s.dtPane){z=
z.s.dtPane.rows({selected:!0}).data().toArray();for(var w=0;w<z.length;w++)n.searchPanes[y][w]=z[w].filter,l++}}b.c.viewTotal&&b._prepViewTotal();0<l&&(l!==b.s.filterCount?(n.start=0,b.s.page=0):n.start=b.s.page*b.s.dt.page.len(),b.s.dt.page(b.s.page),b.s.filterCount=l)});else a.on("preXhr.dt",function(l,p,n){l=0;for(p=b.s.panes;l<p.length;l++)p[l].clearData()});this.s.dt.on("xhr",function(l,p,n,x){var z=!1;if(!b.s.dt.page.info().serverSide)b.s.dt.one("preDraw",function(){if(!z){var y=b.s.dt.page();
z=!0;q(b.dom.panes).empty();for(var w=0,u=b.s.panes;w<u.length;w++){var B=u[w];B.clearData();B.rebuildPane(void 0!==b.s.selectionList[b.s.selectionList.length-1]?B.s.index===b.s.selectionList[b.s.selectionList.length-1].index:!1,void 0,void 0,!0);q(b.dom.panes).append(B.dom.container)}b.s.dt.page.info().serverSide||b.s.dt.draw();b.c.cascadePanes||b.c.viewTotal?b.redrawPanes(b.c.cascadePanes):b._updateSelection();b._checkMessage();b.s.dt.one("draw",function(){b.s.dt.page(y).draw(!1)})}})});c=0;for(d=
this.s.panes;c<d.length;c++)if(f=d[c],void 0!==f&&void 0!==f.s.dtPane&&(void 0!==f.s.colOpts.preSelect&&0<f.s.colOpts.preSelect.length||null!==f.customPaneSettings&&void 0!==f.customPaneSettings.preSelect&&0<f.customPaneSettings.preSelect.length)){e=f.s.dtPane.rows().data().toArray().length;for(g=0;g<e;g++)(-1!==f.s.colOpts.preSelect.indexOf(f.s.dtPane.cell(g,0).data())||null!==f.customPaneSettings&&void 0!==f.customPaneSettings.preSelect&&-1!==f.customPaneSettings.preSelect.indexOf(f.s.dtPane.cell(g,
0).data()))&&f.s.dtPane.row(g).select();f.updateTable()}if(void 0!==this.s.selectionList&&0<this.s.selectionList.length)for(c=this.s.selectionList[this.s.selectionList.length-1].index,d=0,e=this.s.panes;d<e.length;d++)f=e[d],f.s.lastSelect=f.s.index===c;0<this.s.selectionList.length&&this.c.cascadePanes&&this._cascadeRegen(this.s.selectionList);this._updateFilterCount();a.on("destroy.dtsps",function(){for(var l=0,p=b.s.panes;l<p.length;l++)p[l].destroy();a.off(".dtsps");q(b.dom.clearAll).off(".dtsps");
q(b.dom.container).remove();b.clearSelections()});if(this.c.clear)q(this.dom.clearAll).on("click.dtsps",function(){b.clearSelections()});a.settings()[0]._searchPanes=this};k.prototype._prepViewTotal=function(){for(var a=this.s.filterPane,b=!1,c=0,d=this.s.panes;c<d.length;c++){var e=d[c];if(void 0!==e.s.dtPane){var g=e.s.dtPane.rows({selected:!0}).data().toArray().length;0<g&&-1===a?(a=e.s.index,b=!0):0<g&&(a=null)}}c=0;for(d=this.s.panes;c<d.length;c++)if(e=d[c],void 0!==e.s.dtPane&&(e.s.filteringActive=
!0,-1!==a&&null!==a&&a===e.s.index||!1===b))e.s.filteringActive=!1};k.prototype._updateFilterCount=function(){for(var a=0,b=0,c=this.s.panes;b<c.length;b++){var d=c[b];void 0!==d.s.dtPane&&(a+=d.getPaneCount())}b=this.s.dt.i18n("searchPanes.title","Filters Active - %d",a);q(this.dom.title).text(b);void 0!==this.c.filterChanged&&"function"===typeof this.c.filterChanged&&this.c.filterChanged.call(this.s.dt,a)};k.prototype._updateSelection=function(){this.s.selectionList=[];for(var a=0,b=this.s.panes;a<
b.length;a++){var c=b[a];void 0!==c.s.dtPane&&this.s.selectionList.push({index:c.s.index,rows:c.s.dtPane.rows({selected:!0}).data().toArray(),protect:!1})}this.s.dt.state.save()};k.version="1.2.2";k.classes={clear:"dtsp-clear",clearAll:"dtsp-clearAll",container:"dtsp-searchPanes",emptyMessage:"dtsp-emptyMessage",hide:"dtsp-hidden",panes:"dtsp-panesContainer",search:"dtsp-search",title:"dtsp-title",titleRow:"dtsp-titleRow"};k.defaults={cascadePanes:!1,clear:!0,container:function(a){return a.table().container()},
columns:[],filterChanged:void 0,layout:"columns-3",order:[],panes:[],viewTotal:!1};return k}();(function(k){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(a){return k(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||(a=window);b&&b.fn.dataTable||(b=require("datatables.net")(a,b).$);return k(b,a,a.document)}:k(window.jQuery,window,document)})(function(k,a,b){function c(e,g){void 0===g&&(g=!1);e=new d.Api(e);var f=e.init().searchPanes||
d.defaults.searchPanes;return(new G(e,f,g)).getNode()}m(k);t(k);var d=k.fn.dataTable;k.fn.dataTable.SearchPanes=G;k.fn.DataTable.SearchPanes=G;k.fn.dataTable.SearchPane=v;k.fn.DataTable.SearchPane=v;a=k.fn.dataTable.Api.register;a("searchPanes()",function(){return this});a("searchPanes.clearSelections()",function(){return this.iterator("table",function(e){e._searchPanes&&e._searchPanes.clearSelections()})});a("searchPanes.rebuildPane()",function(e,g){return this.iterator("table",function(f){f._searchPanes&&
f._searchPanes.rebuild(e,g)})});a("searchPanes.container()",function(){var e=this.context[0];return e._searchPanes?e._searchPanes.getNode():null});k.fn.dataTable.ext.buttons.searchPanesClear={text:"Clear Panes",action:function(e,g,f,l){g.searchPanes.clearSelections()}};k.fn.dataTable.ext.buttons.searchPanes={action:function(e,g,f,l){e.stopPropagation();this.popover(l._panes.getNode(),{align:"dt-container"});l._panes.rebuild(void 0,!0)},config:{},init:function(e,g,f){var l=new k.fn.dataTable.SearchPanes(e,
k.extend({filterChanged:function(n){e.button(g).text(e.i18n("searchPanes.collapse",{0:"SearchPanes",_:"SearchPanes (%d)"},n))}},f.config)),p=e.i18n("searchPanes.collapse","SearchPanes",0);e.button(g).text(p);f._panes=l},text:"Search Panes"};k(b).on("preInit.dt.dtsp",function(e,g,f){"dt"===e.namespace&&(g.oInit.searchPanes||d.defaults.searchPanes)&&(g._searchPanes||c(g,!0))});d.ext.feature.push({cFeature:"P",fnInit:c});d.ext.features&&d.ext.features.register("searchPanes",c)})})();


(function(c){"function"===typeof define&&define.amd?define(["jquery","datatables.net-bs4","datatables.net-searchpanes"],function(a){return c(a,window,document)}):"object"===typeof exports?module.exports=function(a,b){a||(a=window);b&&b.fn.dataTable||(b=require("datatables.net-bs4")(a,b).$);console.log(b.fn.dataTable);b.fn.dataTable.SearchPanes||(console.log("not present"),require("datatables.net-searchpanes")(a,b));return c(b,a,a.document)}:c(jQuery,window,document)})(function(c,a,b){a=c.fn.dataTable;
c.extend(!0,a.SearchPane.classes,{buttonGroup:"btn-group col justify-content-end",disabledButton:"disabled",dull:"",narrow:"col",pane:{container:"table"},paneButton:"btn btn-light",pill:"pill badge badge-pill badge-secondary",search:"col-sm form-control search",searchCont:"input-group col-sm",searchLabelCont:"input-group-append",subRow1:"dtsp-subRow1",subRow2:"dtsp-subRow2",table:"table table-sm table-borderless",topRow:"dtsp-topRow row"});c.extend(!0,a.SearchPanes.classes,{clearAll:"dtsp-clearAll col-auto btn btn-light",
container:"dtsp-searchPanes",panes:"dtsp-panes dtsp-container",title:"dtsp-title col",titleRow:"dtsp-titleRow row"});return a.searchPanes});


/*!
 * imagesLoaded PACKAGED v4.1.4
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

! function(e, t) { "function" == typeof define && define.amd ? define("ev-emitter/ev-emitter", t) : "object" == typeof module && module.exports ? module.exports = t() : e.EvEmitter = t() }("undefined" != typeof window ? window : this, function() {
    function e() {}
    var t = e.prototype;
    return t.on = function(e, t) {
        if (e && t) {
            var i = this._events = this._events || {},
                n = i[e] = i[e] || [];
            return n.indexOf(t) == -1 && n.push(t), this
        }
    }, t.once = function(e, t) {
        if (e && t) {
            this.on(e, t);
            var i = this._onceEvents = this._onceEvents || {},
                n = i[e] = i[e] || {};
            return n[t] = !0, this
        }
    }, t.off = function(e, t) { var i = this._events && this._events[e]; if (i && i.length) { var n = i.indexOf(t); return n != -1 && i.splice(n, 1), this } }, t.emitEvent = function(e, t) {
        var i = this._events && this._events[e];
        if (i && i.length) {
            i = i.slice(0), t = t || [];
            for (var n = this._onceEvents && this._onceEvents[e], o = 0; o < i.length; o++) {
                var r = i[o],
                    s = n && n[r];
                s && (this.off(e, r), delete n[r]), r.apply(this, t)
            }
            return this
        }
    }, t.allOff = function() { delete this._events, delete this._onceEvents }, e
}),
function(e, t) { "use strict"; "function" == typeof define && define.amd ? define(["ev-emitter/ev-emitter"], function(i) { return t(e, i) }) : "object" == typeof module && module.exports ? module.exports = t(e, require("ev-emitter")) : e.imagesLoaded = t(e, e.EvEmitter) }("undefined" != typeof window ? window : this, function(e, t) {
    function i(e, t) { for (var i in t) e[i] = t[i]; return e }

    function n(e) { if (Array.isArray(e)) return e; var t = "object" == typeof e && "number" == typeof e.length; return t ? d.call(e) : [e] }

    function o(e, t, r) { if (!(this instanceof o)) return new o(e, t, r); var s = e; return "string" == typeof e && (s = document.querySelectorAll(e)), s ? (this.elements = n(s), this.options = i({}, this.options), "function" == typeof t ? r = t : i(this.options, t), r && this.on("always", r), this.getImages(), h && (this.jqDeferred = new h.Deferred), void setTimeout(this.check.bind(this))) : void a.error("Bad element for imagesLoaded " + (s || e)) }

    function r(e) { this.img = e }

    function s(e, t) { this.url = e, this.element = t, this.img = new Image }
    var h = e.jQuery,
        a = e.console,
        d = Array.prototype.slice;
    o.prototype = Object.create(t.prototype), o.prototype.options = {}, o.prototype.getImages = function() { this.images = [], this.elements.forEach(this.addElementImages, this) }, o.prototype.addElementImages = function(e) {
        "IMG" == e.nodeName && this.addImage(e), this.options.background === !0 && this.addElementBackgroundImages(e);
        var t = e.nodeType;
        if (t && u[t]) {
            for (var i = e.querySelectorAll("img"), n = 0; n < i.length; n++) {
                var o = i[n];
                this.addImage(o)
            }
            if ("string" == typeof this.options.background) {
                var r = e.querySelectorAll(this.options.background);
                for (n = 0; n < r.length; n++) {
                    var s = r[n];
                    this.addElementBackgroundImages(s)
                }
            }
        }
    };
    var u = { 1: !0, 9: !0, 11: !0 };
    return o.prototype.addElementBackgroundImages = function(e) {
        var t = getComputedStyle(e);
        if (t)
            for (var i = /url\((['"])?(.*?)\1\)/gi, n = i.exec(t.backgroundImage); null !== n;) {
                var o = n && n[2];
                o && this.addBackground(o, e), n = i.exec(t.backgroundImage)
            }
    }, o.prototype.addImage = function(e) {
        var t = new r(e);
        this.images.push(t)
    }, o.prototype.addBackground = function(e, t) {
        var i = new s(e, t);
        this.images.push(i)
    }, o.prototype.check = function() {
        function e(e, i, n) { setTimeout(function() { t.progress(e, i, n) }) }
        var t = this;
        return this.progressedCount = 0, this.hasAnyBroken = !1, this.images.length ? void this.images.forEach(function(t) { t.once("progress", e), t.check() }) : void this.complete()
    }, o.prototype.progress = function(e, t, i) { this.progressedCount++, this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded, this.emitEvent("progress", [this, e, t]), this.jqDeferred && this.jqDeferred.notify && this.jqDeferred.notify(this, e), this.progressedCount == this.images.length && this.complete(), this.options.debug && a && a.log("progress: " + i, e, t) }, o.prototype.complete = function() {
        var e = this.hasAnyBroken ? "fail" : "done";
        if (this.isComplete = !0, this.emitEvent(e, [this]), this.emitEvent("always", [this]), this.jqDeferred) {
            var t = this.hasAnyBroken ? "reject" : "resolve";
            this.jqDeferred[t](this)
        }
    }, r.prototype = Object.create(t.prototype), r.prototype.check = function() { var e = this.getIsImageComplete(); return e ? void this.confirm(0 !== this.img.naturalWidth, "naturalWidth") : (this.proxyImage = new Image, this.proxyImage.addEventListener("load", this), this.proxyImage.addEventListener("error", this), this.img.addEventListener("load", this), this.img.addEventListener("error", this), void(this.proxyImage.src = this.img.src)) }, r.prototype.getIsImageComplete = function() { return this.img.complete && this.img.naturalWidth }, r.prototype.confirm = function(e, t) { this.isLoaded = e, this.emitEvent("progress", [this, this.img, t]) }, r.prototype.handleEvent = function(e) {
        var t = "on" + e.type;
        this[t] && this[t](e)
    }, r.prototype.onload = function() { this.confirm(!0, "onload"), this.unbindEvents() }, r.prototype.onerror = function() { this.confirm(!1, "onerror"), this.unbindEvents() }, r.prototype.unbindEvents = function() { this.proxyImage.removeEventListener("load", this), this.proxyImage.removeEventListener("error", this), this.img.removeEventListener("load", this), this.img.removeEventListener("error", this) }, s.prototype = Object.create(r.prototype), s.prototype.check = function() {
        this.img.addEventListener("load", this), this.img.addEventListener("error", this), this.img.src = this.url;
        var e = this.getIsImageComplete();
        e && (this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), this.unbindEvents())
    }, s.prototype.unbindEvents = function() { this.img.removeEventListener("load", this), this.img.removeEventListener("error", this) }, s.prototype.confirm = function(e, t) { this.isLoaded = e, this.emitEvent("progress", [this, this.element, t]) }, o.makeJQueryPlugin = function(t) { t = t || e.jQuery, t && (h = t, h.fn.imagesLoaded = function(e, t) { var i = new o(this, e, t); return i.jqDeferred.promise(h(this)) }) }, o.makeJQueryPlugin(), o
});
/*!
 * imagesLoaded PACKAGED v4.1.4
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

!function(e,t){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",t):"object"==typeof module&&module.exports?module.exports=t():e.EvEmitter=t()}("undefined"!=typeof window?window:this,function(){function e(){}var t=e.prototype;return t.on=function(e,t){if(e&&t){var i=this._events=this._events||{},n=i[e]=i[e]||[];return n.indexOf(t)==-1&&n.push(t),this}},t.once=function(e,t){if(e&&t){this.on(e,t);var i=this._onceEvents=this._onceEvents||{},n=i[e]=i[e]||{};return n[t]=!0,this}},t.off=function(e,t){var i=this._events&&this._events[e];if(i&&i.length){var n=i.indexOf(t);return n!=-1&&i.splice(n,1),this}},t.emitEvent=function(e,t){var i=this._events&&this._events[e];if(i&&i.length){i=i.slice(0),t=t||[];for(var n=this._onceEvents&&this._onceEvents[e],o=0;o<i.length;o++){var r=i[o],s=n&&n[r];s&&(this.off(e,r),delete n[r]),r.apply(this,t)}return this}},t.allOff=function(){delete this._events,delete this._onceEvents},e}),function(e,t){"use strict";"function"==typeof define&&define.amd?define(["ev-emitter/ev-emitter"],function(i){return t(e,i)}):"object"==typeof module&&module.exports?module.exports=t(e,require("ev-emitter")):e.imagesLoaded=t(e,e.EvEmitter)}("undefined"!=typeof window?window:this,function(e,t){function i(e,t){for(var i in t)e[i]=t[i];return e}function n(e){if(Array.isArray(e))return e;var t="object"==typeof e&&"number"==typeof e.length;return t?d.call(e):[e]}function o(e,t,r){if(!(this instanceof o))return new o(e,t,r);var s=e;return"string"==typeof e&&(s=document.querySelectorAll(e)),s?(this.elements=n(s),this.options=i({},this.options),"function"==typeof t?r=t:i(this.options,t),r&&this.on("always",r),this.getImages(),h&&(this.jqDeferred=new h.Deferred),void setTimeout(this.check.bind(this))):void a.error("Bad element for imagesLoaded "+(s||e))}function r(e){this.img=e}function s(e,t){this.url=e,this.element=t,this.img=new Image}var h=e.jQuery,a=e.console,d=Array.prototype.slice;o.prototype=Object.create(t.prototype),o.prototype.options={},o.prototype.getImages=function(){this.images=[],this.elements.forEach(this.addElementImages,this)},o.prototype.addElementImages=function(e){"IMG"==e.nodeName&&this.addImage(e),this.options.background===!0&&this.addElementBackgroundImages(e);var t=e.nodeType;if(t&&u[t]){for(var i=e.querySelectorAll("img"),n=0;n<i.length;n++){var o=i[n];this.addImage(o)}if("string"==typeof this.options.background){var r=e.querySelectorAll(this.options.background);for(n=0;n<r.length;n++){var s=r[n];this.addElementBackgroundImages(s)}}}};var u={1:!0,9:!0,11:!0};return o.prototype.addElementBackgroundImages=function(e){var t=getComputedStyle(e);if(t)for(var i=/url\((['"])?(.*?)\1\)/gi,n=i.exec(t.backgroundImage);null!==n;){var o=n&&n[2];o&&this.addBackground(o,e),n=i.exec(t.backgroundImage)}},o.prototype.addImage=function(e){var t=new r(e);this.images.push(t)},o.prototype.addBackground=function(e,t){var i=new s(e,t);this.images.push(i)},o.prototype.check=function(){function e(e,i,n){setTimeout(function(){t.progress(e,i,n)})}var t=this;return this.progressedCount=0,this.hasAnyBroken=!1,this.images.length?void this.images.forEach(function(t){t.once("progress",e),t.check()}):void this.complete()},o.prototype.progress=function(e,t,i){this.progressedCount++,this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded,this.emitEvent("progress",[this,e,t]),this.jqDeferred&&this.jqDeferred.notify&&this.jqDeferred.notify(this,e),this.progressedCount==this.images.length&&this.complete(),this.options.debug&&a&&a.log("progress: "+i,e,t)},o.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";if(this.isComplete=!0,this.emitEvent(e,[this]),this.emitEvent("always",[this]),this.jqDeferred){var t=this.hasAnyBroken?"reject":"resolve";this.jqDeferred[t](this)}},r.prototype=Object.create(t.prototype),r.prototype.check=function(){var e=this.getIsImageComplete();return e?void this.confirm(0!==this.img.naturalWidth,"naturalWidth"):(this.proxyImage=new Image,this.proxyImage.addEventListener("load",this),this.proxyImage.addEventListener("error",this),this.img.addEventListener("load",this),this.img.addEventListener("error",this),void(this.proxyImage.src=this.img.src))},r.prototype.getIsImageComplete=function(){return this.img.complete&&this.img.naturalWidth},r.prototype.confirm=function(e,t){this.isLoaded=e,this.emitEvent("progress",[this,this.img,t])},r.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},r.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindEvents()},r.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindEvents()},r.prototype.unbindEvents=function(){this.proxyImage.removeEventListener("load",this),this.proxyImage.removeEventListener("error",this),this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype=Object.create(r.prototype),s.prototype.check=function(){this.img.addEventListener("load",this),this.img.addEventListener("error",this),this.img.src=this.url;var e=this.getIsImageComplete();e&&(this.confirm(0!==this.img.naturalWidth,"naturalWidth"),this.unbindEvents())},s.prototype.unbindEvents=function(){this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype.confirm=function(e,t){this.isLoaded=e,this.emitEvent("progress",[this,this.element,t])},o.makeJQueryPlugin=function(t){t=t||e.jQuery,t&&(h=t,h.fn.imagesLoaded=function(e,t){var i=new o(this,e,t);return i.jqDeferred.promise(h(this))})},o.makeJQueryPlugin(),o});
/*!
 * Isotope PACKAGED v3.0.5
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * https://isotope.metafizzy.co
 * Copyright 2017 Metafizzy
 */

!function(t,e){"function"==typeof define&&define.amd?define("jquery-bridget/jquery-bridget",["jquery"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("jquery")):t.jQueryBridget=e(t,t.jQuery)}(window,function(t,e){"use strict";function i(i,s,a){function u(t,e,o){var n,s="$()."+i+'("'+e+'")';return t.each(function(t,u){var h=a.data(u,i);if(!h)return void r(i+" not initialized. Cannot call methods, i.e. "+s);var d=h[e];if(!d||"_"==e.charAt(0))return void r(s+" is not a valid method");var l=d.apply(h,o);n=void 0===n?l:n}),void 0!==n?n:t}function h(t,e){t.each(function(t,o){var n=a.data(o,i);n?(n.option(e),n._init()):(n=new s(o,e),a.data(o,i,n))})}a=a||e||t.jQuery,a&&(s.prototype.option||(s.prototype.option=function(t){a.isPlainObject(t)&&(this.options=a.extend(!0,this.options,t))}),a.fn[i]=function(t){if("string"==typeof t){var e=n.call(arguments,1);return u(this,t,e)}return h(this,t),this},o(a))}function o(t){!t||t&&t.bridget||(t.bridget=i)}var n=Array.prototype.slice,s=t.console,r="undefined"==typeof s?function(){}:function(t){s.error(t)};return o(e||t.jQuery),i}),function(t,e){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",e):"object"==typeof module&&module.exports?module.exports=e():t.EvEmitter=e()}("undefined"!=typeof window?window:this,function(){function t(){}var e=t.prototype;return e.on=function(t,e){if(t&&e){var i=this._events=this._events||{},o=i[t]=i[t]||[];return o.indexOf(e)==-1&&o.push(e),this}},e.once=function(t,e){if(t&&e){this.on(t,e);var i=this._onceEvents=this._onceEvents||{},o=i[t]=i[t]||{};return o[e]=!0,this}},e.off=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){var o=i.indexOf(e);return o!=-1&&i.splice(o,1),this}},e.emitEvent=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){i=i.slice(0),e=e||[];for(var o=this._onceEvents&&this._onceEvents[t],n=0;n<i.length;n++){var s=i[n],r=o&&o[s];r&&(this.off(t,s),delete o[s]),s.apply(this,e)}return this}},e.allOff=function(){delete this._events,delete this._onceEvents},t}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("get-size/get-size",[],function(){return e()}):"object"==typeof module&&module.exports?module.exports=e():t.getSize=e()}(window,function(){"use strict";function t(t){var e=parseFloat(t),i=t.indexOf("%")==-1&&!isNaN(e);return i&&e}function e(){}function i(){for(var t={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},e=0;e<h;e++){var i=u[e];t[i]=0}return t}function o(t){var e=getComputedStyle(t);return e||a("Style returned "+e+". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"),e}function n(){if(!d){d=!0;var e=document.createElement("div");e.style.width="200px",e.style.padding="1px 2px 3px 4px",e.style.borderStyle="solid",e.style.borderWidth="1px 2px 3px 4px",e.style.boxSizing="border-box";var i=document.body||document.documentElement;i.appendChild(e);var n=o(e);s.isBoxSizeOuter=r=200==t(n.width),i.removeChild(e)}}function s(e){if(n(),"string"==typeof e&&(e=document.querySelector(e)),e&&"object"==typeof e&&e.nodeType){var s=o(e);if("none"==s.display)return i();var a={};a.width=e.offsetWidth,a.height=e.offsetHeight;for(var d=a.isBorderBox="border-box"==s.boxSizing,l=0;l<h;l++){var f=u[l],c=s[f],m=parseFloat(c);a[f]=isNaN(m)?0:m}var p=a.paddingLeft+a.paddingRight,y=a.paddingTop+a.paddingBottom,g=a.marginLeft+a.marginRight,v=a.marginTop+a.marginBottom,_=a.borderLeftWidth+a.borderRightWidth,I=a.borderTopWidth+a.borderBottomWidth,z=d&&r,x=t(s.width);x!==!1&&(a.width=x+(z?0:p+_));var S=t(s.height);return S!==!1&&(a.height=S+(z?0:y+I)),a.innerWidth=a.width-(p+_),a.innerHeight=a.height-(y+I),a.outerWidth=a.width+g,a.outerHeight=a.height+v,a}}var r,a="undefined"==typeof console?e:function(t){console.error(t)},u=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"],h=u.length,d=!1;return s}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("desandro-matches-selector/matches-selector",e):"object"==typeof module&&module.exports?module.exports=e():t.matchesSelector=e()}(window,function(){"use strict";var t=function(){var t=window.Element.prototype;if(t.matches)return"matches";if(t.matchesSelector)return"matchesSelector";for(var e=["webkit","moz","ms","o"],i=0;i<e.length;i++){var o=e[i],n=o+"MatchesSelector";if(t[n])return n}}();return function(e,i){return e[t](i)}}),function(t,e){"function"==typeof define&&define.amd?define("fizzy-ui-utils/utils",["desandro-matches-selector/matches-selector"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("desandro-matches-selector")):t.fizzyUIUtils=e(t,t.matchesSelector)}(window,function(t,e){var i={};i.extend=function(t,e){for(var i in e)t[i]=e[i];return t},i.modulo=function(t,e){return(t%e+e)%e},i.makeArray=function(t){var e=[];if(Array.isArray(t))e=t;else if(t&&"object"==typeof t&&"number"==typeof t.length)for(var i=0;i<t.length;i++)e.push(t[i]);else e.push(t);return e},i.removeFrom=function(t,e){var i=t.indexOf(e);i!=-1&&t.splice(i,1)},i.getParent=function(t,i){for(;t.parentNode&&t!=document.body;)if(t=t.parentNode,e(t,i))return t},i.getQueryElement=function(t){return"string"==typeof t?document.querySelector(t):t},i.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},i.filterFindElements=function(t,o){t=i.makeArray(t);var n=[];return t.forEach(function(t){if(t instanceof HTMLElement){if(!o)return void n.push(t);e(t,o)&&n.push(t);for(var i=t.querySelectorAll(o),s=0;s<i.length;s++)n.push(i[s])}}),n},i.debounceMethod=function(t,e,i){var o=t.prototype[e],n=e+"Timeout";t.prototype[e]=function(){var t=this[n];t&&clearTimeout(t);var e=arguments,s=this;this[n]=setTimeout(function(){o.apply(s,e),delete s[n]},i||100)}},i.docReady=function(t){var e=document.readyState;"complete"==e||"interactive"==e?setTimeout(t):document.addEventListener("DOMContentLoaded",t)},i.toDashed=function(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()};var o=t.console;return i.htmlInit=function(e,n){i.docReady(function(){var s=i.toDashed(n),r="data-"+s,a=document.querySelectorAll("["+r+"]"),u=document.querySelectorAll(".js-"+s),h=i.makeArray(a).concat(i.makeArray(u)),d=r+"-options",l=t.jQuery;h.forEach(function(t){var i,s=t.getAttribute(r)||t.getAttribute(d);try{i=s&&JSON.parse(s)}catch(a){return void(o&&o.error("Error parsing "+r+" on "+t.className+": "+a))}var u=new e(t,i);l&&l.data(t,n,u)})})},i}),function(t,e){"function"==typeof define&&define.amd?define("outlayer/item",["ev-emitter/ev-emitter","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("ev-emitter"),require("get-size")):(t.Outlayer={},t.Outlayer.Item=e(t.EvEmitter,t.getSize))}(window,function(t,e){"use strict";function i(t){for(var e in t)return!1;return e=null,!0}function o(t,e){t&&(this.element=t,this.layout=e,this.position={x:0,y:0},this._create())}function n(t){return t.replace(/([A-Z])/g,function(t){return"-"+t.toLowerCase()})}var s=document.documentElement.style,r="string"==typeof s.transition?"transition":"WebkitTransition",a="string"==typeof s.transform?"transform":"WebkitTransform",u={WebkitTransition:"webkitTransitionEnd",transition:"transitionend"}[r],h={transform:a,transition:r,transitionDuration:r+"Duration",transitionProperty:r+"Property",transitionDelay:r+"Delay"},d=o.prototype=Object.create(t.prototype);d.constructor=o,d._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},d.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},d.getSize=function(){this.size=e(this.element)},d.css=function(t){var e=this.element.style;for(var i in t){var o=h[i]||i;e[o]=t[i]}},d.getPosition=function(){var t=getComputedStyle(this.element),e=this.layout._getOption("originLeft"),i=this.layout._getOption("originTop"),o=t[e?"left":"right"],n=t[i?"top":"bottom"],s=this.layout.size,r=o.indexOf("%")!=-1?parseFloat(o)/100*s.width:parseInt(o,10),a=n.indexOf("%")!=-1?parseFloat(n)/100*s.height:parseInt(n,10);r=isNaN(r)?0:r,a=isNaN(a)?0:a,r-=e?s.paddingLeft:s.paddingRight,a-=i?s.paddingTop:s.paddingBottom,this.position.x=r,this.position.y=a},d.layoutPosition=function(){var t=this.layout.size,e={},i=this.layout._getOption("originLeft"),o=this.layout._getOption("originTop"),n=i?"paddingLeft":"paddingRight",s=i?"left":"right",r=i?"right":"left",a=this.position.x+t[n];e[s]=this.getXValue(a),e[r]="";var u=o?"paddingTop":"paddingBottom",h=o?"top":"bottom",d=o?"bottom":"top",l=this.position.y+t[u];e[h]=this.getYValue(l),e[d]="",this.css(e),this.emitEvent("layout",[this])},d.getXValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&!e?t/this.layout.size.width*100+"%":t+"px"},d.getYValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&e?t/this.layout.size.height*100+"%":t+"px"},d._transitionTo=function(t,e){this.getPosition();var i=this.position.x,o=this.position.y,n=parseInt(t,10),s=parseInt(e,10),r=n===this.position.x&&s===this.position.y;if(this.setPosition(t,e),r&&!this.isTransitioning)return void this.layoutPosition();var a=t-i,u=e-o,h={};h.transform=this.getTranslate(a,u),this.transition({to:h,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},d.getTranslate=function(t,e){var i=this.layout._getOption("originLeft"),o=this.layout._getOption("originTop");return t=i?t:-t,e=o?e:-e,"translate3d("+t+"px, "+e+"px, 0)"},d.goTo=function(t,e){this.setPosition(t,e),this.layoutPosition()},d.moveTo=d._transitionTo,d.setPosition=function(t,e){this.position.x=parseInt(t,10),this.position.y=parseInt(e,10)},d._nonTransition=function(t){this.css(t.to),t.isCleaning&&this._removeStyles(t.to);for(var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)},d.transition=function(t){if(!parseFloat(this.layout.options.transitionDuration))return void this._nonTransition(t);var e=this._transn;for(var i in t.onTransitionEnd)e.onEnd[i]=t.onTransitionEnd[i];for(i in t.to)e.ingProperties[i]=!0,t.isCleaning&&(e.clean[i]=!0);if(t.from){this.css(t.from);var o=this.element.offsetHeight;o=null}this.enableTransition(t.to),this.css(t.to),this.isTransitioning=!0};var l="opacity,"+n(a);d.enableTransition=function(){if(!this.isTransitioning){var t=this.layout.options.transitionDuration;t="number"==typeof t?t+"ms":t,this.css({transitionProperty:l,transitionDuration:t,transitionDelay:this.staggerDelay||0}),this.element.addEventListener(u,this,!1)}},d.onwebkitTransitionEnd=function(t){this.ontransitionend(t)},d.onotransitionend=function(t){this.ontransitionend(t)};var f={"-webkit-transform":"transform"};d.ontransitionend=function(t){if(t.target===this.element){var e=this._transn,o=f[t.propertyName]||t.propertyName;if(delete e.ingProperties[o],i(e.ingProperties)&&this.disableTransition(),o in e.clean&&(this.element.style[t.propertyName]="",delete e.clean[o]),o in e.onEnd){var n=e.onEnd[o];n.call(this),delete e.onEnd[o]}this.emitEvent("transitionEnd",[this])}},d.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(u,this,!1),this.isTransitioning=!1},d._removeStyles=function(t){var e={};for(var i in t)e[i]="";this.css(e)};var c={transitionProperty:"",transitionDuration:"",transitionDelay:""};return d.removeTransitionStyles=function(){this.css(c)},d.stagger=function(t){t=isNaN(t)?0:t,this.staggerDelay=t+"ms"},d.removeElem=function(){this.element.parentNode.removeChild(this.element),this.css({display:""}),this.emitEvent("remove",[this])},d.remove=function(){return r&&parseFloat(this.layout.options.transitionDuration)?(this.once("transitionEnd",function(){this.removeElem()}),void this.hide()):void this.removeElem()},d.reveal=function(){delete this.isHidden,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("visibleStyle");e[i]=this.onRevealTransitionEnd,this.transition({from:t.hiddenStyle,to:t.visibleStyle,isCleaning:!0,onTransitionEnd:e})},d.onRevealTransitionEnd=function(){this.isHidden||this.emitEvent("reveal")},d.getHideRevealTransitionEndProperty=function(t){var e=this.layout.options[t];if(e.opacity)return"opacity";for(var i in e)return i},d.hide=function(){this.isHidden=!0,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("hiddenStyle");e[i]=this.onHideTransitionEnd,this.transition({from:t.visibleStyle,to:t.hiddenStyle,isCleaning:!0,onTransitionEnd:e})},d.onHideTransitionEnd=function(){this.isHidden&&(this.css({display:"none"}),this.emitEvent("hide"))},d.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},o}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("outlayer/outlayer",["ev-emitter/ev-emitter","get-size/get-size","fizzy-ui-utils/utils","./item"],function(i,o,n,s){return e(t,i,o,n,s)}):"object"==typeof module&&module.exports?module.exports=e(t,require("ev-emitter"),require("get-size"),require("fizzy-ui-utils"),require("./item")):t.Outlayer=e(t,t.EvEmitter,t.getSize,t.fizzyUIUtils,t.Outlayer.Item)}(window,function(t,e,i,o,n){"use strict";function s(t,e){var i=o.getQueryElement(t);if(!i)return void(u&&u.error("Bad element for "+this.constructor.namespace+": "+(i||t)));this.element=i,h&&(this.$element=h(this.element)),this.options=o.extend({},this.constructor.defaults),this.option(e);var n=++l;this.element.outlayerGUID=n,f[n]=this,this._create();var s=this._getOption("initLayout");s&&this.layout()}function r(t){function e(){t.apply(this,arguments)}return e.prototype=Object.create(t.prototype),e.prototype.constructor=e,e}function a(t){if("number"==typeof t)return t;var e=t.match(/(^\d*\.?\d*)(\w*)/),i=e&&e[1],o=e&&e[2];if(!i.length)return 0;i=parseFloat(i);var n=m[o]||1;return i*n}var u=t.console,h=t.jQuery,d=function(){},l=0,f={};s.namespace="outlayer",s.Item=n,s.defaults={containerStyle:{position:"relative"},initLayout:!0,originLeft:!0,originTop:!0,resize:!0,resizeContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}};var c=s.prototype;o.extend(c,e.prototype),c.option=function(t){o.extend(this.options,t)},c._getOption=function(t){var e=this.constructor.compatOptions[t];return e&&void 0!==this.options[e]?this.options[e]:this.options[t]},s.compatOptions={initLayout:"isInitLayout",horizontal:"isHorizontal",layoutInstant:"isLayoutInstant",originLeft:"isOriginLeft",originTop:"isOriginTop",resize:"isResizeBound",resizeContainer:"isResizingContainer"},c._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),o.extend(this.element.style,this.options.containerStyle);var t=this._getOption("resize");t&&this.bindResize()},c.reloadItems=function(){this.items=this._itemize(this.element.children)},c._itemize=function(t){for(var e=this._filterFindItemElements(t),i=this.constructor.Item,o=[],n=0;n<e.length;n++){var s=e[n],r=new i(s,this);o.push(r)}return o},c._filterFindItemElements=function(t){return o.filterFindElements(t,this.options.itemSelector)},c.getItemElements=function(){return this.items.map(function(t){return t.element})},c.layout=function(){this._resetLayout(),this._manageStamps();var t=this._getOption("layoutInstant"),e=void 0!==t?t:!this._isLayoutInited;this.layoutItems(this.items,e),this._isLayoutInited=!0},c._init=c.layout,c._resetLayout=function(){this.getSize()},c.getSize=function(){this.size=i(this.element)},c._getMeasurement=function(t,e){var o,n=this.options[t];n?("string"==typeof n?o=this.element.querySelector(n):n instanceof HTMLElement&&(o=n),this[t]=o?i(o)[e]:n):this[t]=0},c.layoutItems=function(t,e){t=this._getItemsForLayout(t),this._layoutItems(t,e),this._postLayout()},c._getItemsForLayout=function(t){return t.filter(function(t){return!t.isIgnored})},c._layoutItems=function(t,e){if(this._emitCompleteOnItems("layout",t),t&&t.length){var i=[];t.forEach(function(t){var o=this._getItemLayoutPosition(t);o.item=t,o.isInstant=e||t.isLayoutInstant,i.push(o)},this),this._processLayoutQueue(i)}},c._getItemLayoutPosition=function(){return{x:0,y:0}},c._processLayoutQueue=function(t){this.updateStagger(),t.forEach(function(t,e){this._positionItem(t.item,t.x,t.y,t.isInstant,e)},this)},c.updateStagger=function(){var t=this.options.stagger;return null===t||void 0===t?void(this.stagger=0):(this.stagger=a(t),this.stagger)},c._positionItem=function(t,e,i,o,n){o?t.goTo(e,i):(t.stagger(n*this.stagger),t.moveTo(e,i))},c._postLayout=function(){this.resizeContainer()},c.resizeContainer=function(){var t=this._getOption("resizeContainer");if(t){var e=this._getContainerSize();e&&(this._setContainerMeasure(e.width,!0),this._setContainerMeasure(e.height,!1))}},c._getContainerSize=d,c._setContainerMeasure=function(t,e){if(void 0!==t){var i=this.size;i.isBorderBox&&(t+=e?i.paddingLeft+i.paddingRight+i.borderLeftWidth+i.borderRightWidth:i.paddingBottom+i.paddingTop+i.borderTopWidth+i.borderBottomWidth),t=Math.max(t,0),this.element.style[e?"width":"height"]=t+"px"}},c._emitCompleteOnItems=function(t,e){function i(){n.dispatchEvent(t+"Complete",null,[e])}function o(){r++,r==s&&i()}var n=this,s=e.length;if(!e||!s)return void i();var r=0;e.forEach(function(e){e.once(t,o)})},c.dispatchEvent=function(t,e,i){var o=e?[e].concat(i):i;if(this.emitEvent(t,o),h)if(this.$element=this.$element||h(this.element),e){var n=h.Event(e);n.type=t,this.$element.trigger(n,i)}else this.$element.trigger(t,i)},c.ignore=function(t){var e=this.getItem(t);e&&(e.isIgnored=!0)},c.unignore=function(t){var e=this.getItem(t);e&&delete e.isIgnored},c.stamp=function(t){t=this._find(t),t&&(this.stamps=this.stamps.concat(t),t.forEach(this.ignore,this))},c.unstamp=function(t){t=this._find(t),t&&t.forEach(function(t){o.removeFrom(this.stamps,t),this.unignore(t)},this)},c._find=function(t){if(t)return"string"==typeof t&&(t=this.element.querySelectorAll(t)),t=o.makeArray(t)},c._manageStamps=function(){this.stamps&&this.stamps.length&&(this._getBoundingRect(),this.stamps.forEach(this._manageStamp,this))},c._getBoundingRect=function(){var t=this.element.getBoundingClientRect(),e=this.size;this._boundingRect={left:t.left+e.paddingLeft+e.borderLeftWidth,top:t.top+e.paddingTop+e.borderTopWidth,right:t.right-(e.paddingRight+e.borderRightWidth),bottom:t.bottom-(e.paddingBottom+e.borderBottomWidth)}},c._manageStamp=d,c._getElementOffset=function(t){var e=t.getBoundingClientRect(),o=this._boundingRect,n=i(t),s={left:e.left-o.left-n.marginLeft,top:e.top-o.top-n.marginTop,right:o.right-e.right-n.marginRight,bottom:o.bottom-e.bottom-n.marginBottom};return s},c.handleEvent=o.handleEvent,c.bindResize=function(){t.addEventListener("resize",this),this.isResizeBound=!0},c.unbindResize=function(){t.removeEventListener("resize",this),this.isResizeBound=!1},c.onresize=function(){this.resize()},o.debounceMethod(s,"onresize",100),c.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},c.needsResizeLayout=function(){var t=i(this.element),e=this.size&&t;return e&&t.innerWidth!==this.size.innerWidth},c.addItems=function(t){var e=this._itemize(t);return e.length&&(this.items=this.items.concat(e)),e},c.appended=function(t){var e=this.addItems(t);e.length&&(this.layoutItems(e,!0),this.reveal(e))},c.prepended=function(t){var e=this._itemize(t);if(e.length){var i=this.items.slice(0);this.items=e.concat(i),this._resetLayout(),this._manageStamps(),this.layoutItems(e,!0),this.reveal(e),this.layoutItems(i)}},c.reveal=function(t){if(this._emitCompleteOnItems("reveal",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.reveal()})}},c.hide=function(t){if(this._emitCompleteOnItems("hide",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.hide()})}},c.revealItemElements=function(t){var e=this.getItems(t);this.reveal(e)},c.hideItemElements=function(t){var e=this.getItems(t);this.hide(e)},c.getItem=function(t){for(var e=0;e<this.items.length;e++){var i=this.items[e];if(i.element==t)return i}},c.getItems=function(t){t=o.makeArray(t);var e=[];return t.forEach(function(t){var i=this.getItem(t);i&&e.push(i)},this),e},c.remove=function(t){var e=this.getItems(t);this._emitCompleteOnItems("remove",e),e&&e.length&&e.forEach(function(t){t.remove(),o.removeFrom(this.items,t)},this)},c.destroy=function(){var t=this.element.style;t.height="",t.position="",t.width="",this.items.forEach(function(t){t.destroy()}),this.unbindResize();var e=this.element.outlayerGUID;delete f[e],delete this.element.outlayerGUID,h&&h.removeData(this.element,this.constructor.namespace)},s.data=function(t){t=o.getQueryElement(t);var e=t&&t.outlayerGUID;return e&&f[e]},s.create=function(t,e){var i=r(s);return i.defaults=o.extend({},s.defaults),o.extend(i.defaults,e),i.compatOptions=o.extend({},s.compatOptions),i.namespace=t,i.data=s.data,i.Item=r(n),o.htmlInit(i,t),h&&h.bridget&&h.bridget(t,i),i};var m={ms:1,s:1e3};return s.Item=n,s}),function(t,e){"function"==typeof define&&define.amd?define("isotope-layout/js/item",["outlayer/outlayer"],e):"object"==typeof module&&module.exports?module.exports=e(require("outlayer")):(t.Isotope=t.Isotope||{},t.Isotope.Item=e(t.Outlayer))}(window,function(t){"use strict";function e(){t.Item.apply(this,arguments)}var i=e.prototype=Object.create(t.Item.prototype),o=i._create;i._create=function(){this.id=this.layout.itemGUID++,o.call(this),this.sortData={}},i.updateSortData=function(){if(!this.isIgnored){this.sortData.id=this.id,this.sortData["original-order"]=this.id,this.sortData.random=Math.random();var t=this.layout.options.getSortData,e=this.layout._sorters;for(var i in t){var o=e[i];this.sortData[i]=o(this.element,this)}}};var n=i.destroy;return i.destroy=function(){n.apply(this,arguments),this.css({display:""})},e}),function(t,e){"function"==typeof define&&define.amd?define("isotope-layout/js/layout-mode",["get-size/get-size","outlayer/outlayer"],e):"object"==typeof module&&module.exports?module.exports=e(require("get-size"),require("outlayer")):(t.Isotope=t.Isotope||{},t.Isotope.LayoutMode=e(t.getSize,t.Outlayer))}(window,function(t,e){"use strict";function i(t){this.isotope=t,t&&(this.options=t.options[this.namespace],this.element=t.element,this.items=t.filteredItems,this.size=t.size)}var o=i.prototype,n=["_resetLayout","_getItemLayoutPosition","_manageStamp","_getContainerSize","_getElementOffset","needsResizeLayout","_getOption"];return n.forEach(function(t){o[t]=function(){return e.prototype[t].apply(this.isotope,arguments)}}),o.needsVerticalResizeLayout=function(){var e=t(this.isotope.element),i=this.isotope.size&&e;return i&&e.innerHeight!=this.isotope.size.innerHeight},o._getMeasurement=function(){this.isotope._getMeasurement.apply(this,arguments)},o.getColumnWidth=function(){this.getSegmentSize("column","Width")},o.getRowHeight=function(){this.getSegmentSize("row","Height")},o.getSegmentSize=function(t,e){var i=t+e,o="outer"+e;if(this._getMeasurement(i,o),!this[i]){var n=this.getFirstItemSize();this[i]=n&&n[o]||this.isotope.size["inner"+e]}},o.getFirstItemSize=function(){var e=this.isotope.filteredItems[0];return e&&e.element&&t(e.element)},o.layout=function(){this.isotope.layout.apply(this.isotope,arguments)},o.getSize=function(){this.isotope.getSize(),this.size=this.isotope.size},i.modes={},i.create=function(t,e){function n(){i.apply(this,arguments)}return n.prototype=Object.create(o),n.prototype.constructor=n,e&&(n.options=e),n.prototype.namespace=t,i.modes[t]=n,n},i}),function(t,e){"function"==typeof define&&define.amd?define("masonry-layout/masonry",["outlayer/outlayer","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("outlayer"),require("get-size")):t.Masonry=e(t.Outlayer,t.getSize)}(window,function(t,e){var i=t.create("masonry");i.compatOptions.fitWidth="isFitWidth";var o=i.prototype;return o._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns(),this.colYs=[];for(var t=0;t<this.cols;t++)this.colYs.push(0);this.maxY=0,this.horizontalColIndex=0},o.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var t=this.items[0],i=t&&t.element;this.columnWidth=i&&e(i).outerWidth||this.containerWidth}var o=this.columnWidth+=this.gutter,n=this.containerWidth+this.gutter,s=n/o,r=o-n%o,a=r&&r<1?"round":"floor";s=Math[a](s),this.cols=Math.max(s,1)},o.getContainerWidth=function(){var t=this._getOption("fitWidth"),i=t?this.element.parentNode:this.element,o=e(i);this.containerWidth=o&&o.innerWidth},o._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth%this.columnWidth,i=e&&e<1?"round":"ceil",o=Math[i](t.size.outerWidth/this.columnWidth);o=Math.min(o,this.cols);for(var n=this.options.horizontalOrder?"_getHorizontalColPosition":"_getTopColPosition",s=this[n](o,t),r={x:this.columnWidth*s.col,y:s.y},a=s.y+t.size.outerHeight,u=o+s.col,h=s.col;h<u;h++)this.colYs[h]=a;return r},o._getTopColPosition=function(t){var e=this._getTopColGroup(t),i=Math.min.apply(Math,e);return{col:e.indexOf(i),y:i}},o._getTopColGroup=function(t){if(t<2)return this.colYs;for(var e=[],i=this.cols+1-t,o=0;o<i;o++)e[o]=this._getColGroupY(o,t);return e},o._getColGroupY=function(t,e){if(e<2)return this.colYs[t];var i=this.colYs.slice(t,t+e);return Math.max.apply(Math,i)},o._getHorizontalColPosition=function(t,e){var i=this.horizontalColIndex%this.cols,o=t>1&&i+t>this.cols;i=o?0:i;var n=e.size.outerWidth&&e.size.outerHeight;return this.horizontalColIndex=n?i+t:this.horizontalColIndex,{col:i,y:this._getColGroupY(i,t)}},o._manageStamp=function(t){var i=e(t),o=this._getElementOffset(t),n=this._getOption("originLeft"),s=n?o.left:o.right,r=s+i.outerWidth,a=Math.floor(s/this.columnWidth);a=Math.max(0,a);var u=Math.floor(r/this.columnWidth);u-=r%this.columnWidth?0:1,u=Math.min(this.cols-1,u);for(var h=this._getOption("originTop"),d=(h?o.top:o.bottom)+i.outerHeight,l=a;l<=u;l++)this.colYs[l]=Math.max(d,this.colYs[l])},o._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var t={height:this.maxY};return this._getOption("fitWidth")&&(t.width=this._getContainerFitWidth()),t},o._getContainerFitWidth=function(){for(var t=0,e=this.cols;--e&&0===this.colYs[e];)t++;return(this.cols-t)*this.columnWidth-this.gutter},o.needsResizeLayout=function(){var t=this.containerWidth;return this.getContainerWidth(),t!=this.containerWidth},i}),function(t,e){"function"==typeof define&&define.amd?define("isotope-layout/js/layout-modes/masonry",["../layout-mode","masonry-layout/masonry"],e):"object"==typeof module&&module.exports?module.exports=e(require("../layout-mode"),require("masonry-layout")):e(t.Isotope.LayoutMode,t.Masonry)}(window,function(t,e){"use strict";var i=t.create("masonry"),o=i.prototype,n={_getElementOffset:!0,layout:!0,_getMeasurement:!0};for(var s in e.prototype)n[s]||(o[s]=e.prototype[s]);var r=o.measureColumns;o.measureColumns=function(){this.items=this.isotope.filteredItems,r.call(this)};var a=o._getOption;return o._getOption=function(t){return"fitWidth"==t?void 0!==this.options.isFitWidth?this.options.isFitWidth:this.options.fitWidth:a.apply(this.isotope,arguments)},i}),function(t,e){"function"==typeof define&&define.amd?define("isotope-layout/js/layout-modes/fit-rows",["../layout-mode"],e):"object"==typeof exports?module.exports=e(require("../layout-mode")):e(t.Isotope.LayoutMode)}(window,function(t){"use strict";var e=t.create("fitRows"),i=e.prototype;return i._resetLayout=function(){this.x=0,this.y=0,this.maxY=0,this._getMeasurement("gutter","outerWidth")},i._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth+this.gutter,i=this.isotope.size.innerWidth+this.gutter;0!==this.x&&e+this.x>i&&(this.x=0,this.y=this.maxY);var o={x:this.x,y:this.y};return this.maxY=Math.max(this.maxY,this.y+t.size.outerHeight),this.x+=e,o},i._getContainerSize=function(){return{height:this.maxY}},e}),function(t,e){"function"==typeof define&&define.amd?define("isotope-layout/js/layout-modes/vertical",["../layout-mode"],e):"object"==typeof module&&module.exports?module.exports=e(require("../layout-mode")):e(t.Isotope.LayoutMode)}(window,function(t){"use strict";var e=t.create("vertical",{horizontalAlignment:0}),i=e.prototype;return i._resetLayout=function(){this.y=0},i._getItemLayoutPosition=function(t){t.getSize();var e=(this.isotope.size.innerWidth-t.size.outerWidth)*this.options.horizontalAlignment,i=this.y;return this.y+=t.size.outerHeight,{x:e,y:i}},i._getContainerSize=function(){return{height:this.y}},e}),function(t,e){"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size","desandro-matches-selector/matches-selector","fizzy-ui-utils/utils","isotope-layout/js/item","isotope-layout/js/layout-mode","isotope-layout/js/layout-modes/masonry","isotope-layout/js/layout-modes/fit-rows","isotope-layout/js/layout-modes/vertical"],function(i,o,n,s,r,a){return e(t,i,o,n,s,r,a)}):"object"==typeof module&&module.exports?module.exports=e(t,require("outlayer"),require("get-size"),require("desandro-matches-selector"),require("fizzy-ui-utils"),require("isotope-layout/js/item"),require("isotope-layout/js/layout-mode"),require("isotope-layout/js/layout-modes/masonry"),require("isotope-layout/js/layout-modes/fit-rows"),require("isotope-layout/js/layout-modes/vertical")):t.Isotope=e(t,t.Outlayer,t.getSize,t.matchesSelector,t.fizzyUIUtils,t.Isotope.Item,t.Isotope.LayoutMode)}(window,function(t,e,i,o,n,s,r){function a(t,e){return function(i,o){for(var n=0;n<t.length;n++){var s=t[n],r=i.sortData[s],a=o.sortData[s];if(r>a||r<a){var u=void 0!==e[s]?e[s]:e,h=u?1:-1;return(r>a?1:-1)*h}}return 0}}var u=t.jQuery,h=String.prototype.trim?function(t){return t.trim()}:function(t){return t.replace(/^\s+|\s+$/g,"")},d=e.create("isotope",{layoutMode:"masonry",isJQueryFiltering:!0,sortAscending:!0});d.Item=s,d.LayoutMode=r;var l=d.prototype;l._create=function(){this.itemGUID=0,this._sorters={},this._getSorters(),e.prototype._create.call(this),this.modes={},this.filteredItems=this.items,this.sortHistory=["original-order"];for(var t in r.modes)this._initLayoutMode(t)},l.reloadItems=function(){this.itemGUID=0,e.prototype.reloadItems.call(this)},l._itemize=function(){for(var t=e.prototype._itemize.apply(this,arguments),i=0;i<t.length;i++){var o=t[i];o.id=this.itemGUID++}return this._updateItemsSortData(t),t},l._initLayoutMode=function(t){var e=r.modes[t],i=this.options[t]||{};this.options[t]=e.options?n.extend(e.options,i):i,this.modes[t]=new e(this)},l.layout=function(){return!this._isLayoutInited&&this._getOption("initLayout")?void this.arrange():void this._layout()},l._layout=function(){var t=this._getIsInstant();this._resetLayout(),this._manageStamps(),this.layoutItems(this.filteredItems,t),this._isLayoutInited=!0},l.arrange=function(t){this.option(t),this._getIsInstant();var e=this._filter(this.items);this.filteredItems=e.matches,this._bindArrangeComplete(),this._isInstant?this._noTransition(this._hideReveal,[e]):this._hideReveal(e),this._sort(),this._layout()},l._init=l.arrange,l._hideReveal=function(t){this.reveal(t.needReveal),this.hide(t.needHide)},l._getIsInstant=function(){var t=this._getOption("layoutInstant"),e=void 0!==t?t:!this._isLayoutInited;return this._isInstant=e,e},l._bindArrangeComplete=function(){function t(){e&&i&&o&&n.dispatchEvent("arrangeComplete",null,[n.filteredItems])}var e,i,o,n=this;this.once("layoutComplete",function(){e=!0,t()}),this.once("hideComplete",function(){i=!0,t()}),this.once("revealComplete",function(){o=!0,t()})},l._filter=function(t){var e=this.options.filter;e=e||"*";for(var i=[],o=[],n=[],s=this._getFilterTest(e),r=0;r<t.length;r++){var a=t[r];if(!a.isIgnored){var u=s(a);u&&i.push(a),u&&a.isHidden?o.push(a):u||a.isHidden||n.push(a)}}return{matches:i,needReveal:o,needHide:n}},l._getFilterTest=function(t){
return u&&this.options.isJQueryFiltering?function(e){return u(e.element).is(t)}:"function"==typeof t?function(e){return t(e.element)}:function(e){return o(e.element,t)}},l.updateSortData=function(t){var e;t?(t=n.makeArray(t),e=this.getItems(t)):e=this.items,this._getSorters(),this._updateItemsSortData(e)},l._getSorters=function(){var t=this.options.getSortData;for(var e in t){var i=t[e];this._sorters[e]=f(i)}},l._updateItemsSortData=function(t){for(var e=t&&t.length,i=0;e&&i<e;i++){var o=t[i];o.updateSortData()}};var f=function(){function t(t){if("string"!=typeof t)return t;var i=h(t).split(" "),o=i[0],n=o.match(/^\[(.+)\]$/),s=n&&n[1],r=e(s,o),a=d.sortDataParsers[i[1]];return t=a?function(t){return t&&a(r(t))}:function(t){return t&&r(t)}}function e(t,e){return t?function(e){return e.getAttribute(t)}:function(t){var i=t.querySelector(e);return i&&i.textContent}}return t}();d.sortDataParsers={parseInt:function(t){return parseInt(t,10)},parseFloat:function(t){return parseFloat(t)}},l._sort=function(){if(this.options.sortBy){var t=n.makeArray(this.options.sortBy);this._getIsSameSortBy(t)||(this.sortHistory=t.concat(this.sortHistory));var e=a(this.sortHistory,this.options.sortAscending);this.filteredItems.sort(e)}},l._getIsSameSortBy=function(t){for(var e=0;e<t.length;e++)if(t[e]!=this.sortHistory[e])return!1;return!0},l._mode=function(){var t=this.options.layoutMode,e=this.modes[t];if(!e)throw new Error("No layout mode: "+t);return e.options=this.options[t],e},l._resetLayout=function(){e.prototype._resetLayout.call(this),this._mode()._resetLayout()},l._getItemLayoutPosition=function(t){return this._mode()._getItemLayoutPosition(t)},l._manageStamp=function(t){this._mode()._manageStamp(t)},l._getContainerSize=function(){return this._mode()._getContainerSize()},l.needsResizeLayout=function(){return this._mode().needsResizeLayout()},l.appended=function(t){var e=this.addItems(t);if(e.length){var i=this._filterRevealAdded(e);this.filteredItems=this.filteredItems.concat(i)}},l.prepended=function(t){var e=this._itemize(t);if(e.length){this._resetLayout(),this._manageStamps();var i=this._filterRevealAdded(e);this.layoutItems(this.filteredItems),this.filteredItems=i.concat(this.filteredItems),this.items=e.concat(this.items)}},l._filterRevealAdded=function(t){var e=this._filter(t);return this.hide(e.needHide),this.reveal(e.matches),this.layoutItems(e.matches,!0),e.matches},l.insert=function(t){var e=this.addItems(t);if(e.length){var i,o,n=e.length;for(i=0;i<n;i++)o=e[i],this.element.appendChild(o.element);var s=this._filter(e).matches;for(i=0;i<n;i++)e[i].isLayoutInstant=!0;for(this.arrange(),i=0;i<n;i++)delete e[i].isLayoutInstant;this.reveal(s)}};var c=l.remove;return l.remove=function(t){t=n.makeArray(t);var e=this.getItems(t);c.call(this,t);for(var i=e&&e.length,o=0;i&&o<i;o++){var s=e[o];n.removeFrom(this.filteredItems,s)}},l.shuffle=function(){for(var t=0;t<this.items.length;t++){var e=this.items[t];e.sortData.random=Math.random()}this.options.sortBy="random",this._sort(),this._layout()},l._noTransition=function(t,e){var i=this.options.transitionDuration;this.options.transitionDuration=0;var o=t.apply(this,e);return this.options.transitionDuration=i,o},l.getFilteredItemElements=function(){return this.filteredItems.map(function(t){return t.element})},d});
/*! Magnific Popup - v1.1.0 - 2016-02-20
* http://dimsemenov.com/plugins/magnific-popup/
* Copyright (c) 2016 Dmitry Semenov; */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):window.jQuery||window.Zepto)}(function(a){var b,c,d,e,f,g,h="Close",i="BeforeClose",j="AfterClose",k="BeforeAppend",l="MarkupParse",m="Open",n="Change",o="mfp",p="."+o,q="mfp-ready",r="mfp-removing",s="mfp-prevent-close",t=function(){},u=!!window.jQuery,v=a(window),w=function(a,c){b.ev.on(o+a+p,c)},x=function(b,c,d,e){var f=document.createElement("div");return f.className="mfp-"+b,d&&(f.innerHTML=d),e?c&&c.appendChild(f):(f=a(f),c&&f.appendTo(c)),f},y=function(c,d){b.ev.triggerHandler(o+c,d),b.st.callbacks&&(c=c.charAt(0).toLowerCase()+c.slice(1),b.st.callbacks[c]&&b.st.callbacks[c].apply(b,a.isArray(d)?d:[d]))},z=function(c){return c===g&&b.currTemplate.closeBtn||(b.currTemplate.closeBtn=a(b.st.closeMarkup.replace("%title%",b.st.tClose)),g=c),b.currTemplate.closeBtn},A=function(){a.magnificPopup.instance||(b=new t,b.init(),a.magnificPopup.instance=b)},B=function(){var a=document.createElement("p").style,b=["ms","O","Moz","Webkit"];if(void 0!==a.transition)return!0;for(;b.length;)if(b.pop()+"Transition"in a)return!0;return!1};t.prototype={constructor:t,init:function(){var c=navigator.appVersion;b.isLowIE=b.isIE8=document.all&&!document.addEventListener,b.isAndroid=/android/gi.test(c),b.isIOS=/iphone|ipad|ipod/gi.test(c),b.supportsTransition=B(),b.probablyMobile=b.isAndroid||b.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),d=a(document),b.popupsCache={}},open:function(c){var e;if(c.isObj===!1){b.items=c.items.toArray(),b.index=0;var g,h=c.items;for(e=0;e<h.length;e++)if(g=h[e],g.parsed&&(g=g.el[0]),g===c.el[0]){b.index=e;break}}else b.items=a.isArray(c.items)?c.items:[c.items],b.index=c.index||0;if(b.isOpen)return void b.updateItemHTML();b.types=[],f="",c.mainEl&&c.mainEl.length?b.ev=c.mainEl.eq(0):b.ev=d,c.key?(b.popupsCache[c.key]||(b.popupsCache[c.key]={}),b.currTemplate=b.popupsCache[c.key]):b.currTemplate={},b.st=a.extend(!0,{},a.magnificPopup.defaults,c),b.fixedContentPos="auto"===b.st.fixedContentPos?!b.probablyMobile:b.st.fixedContentPos,b.st.modal&&(b.st.closeOnContentClick=!1,b.st.closeOnBgClick=!1,b.st.showCloseBtn=!1,b.st.enableEscapeKey=!1),b.bgOverlay||(b.bgOverlay=x("bg").on("click"+p,function(){b.close()}),b.wrap=x("wrap").attr("tabindex",-1).on("click"+p,function(a){b._checkIfClose(a.target)&&b.close()}),b.container=x("container",b.wrap)),b.contentContainer=x("content"),b.st.preloader&&(b.preloader=x("preloader",b.container,b.st.tLoading));var i=a.magnificPopup.modules;for(e=0;e<i.length;e++){var j=i[e];j=j.charAt(0).toUpperCase()+j.slice(1),b["init"+j].call(b)}y("BeforeOpen"),b.st.showCloseBtn&&(b.st.closeBtnInside?(w(l,function(a,b,c,d){c.close_replaceWith=z(d.type)}),f+=" mfp-close-btn-in"):b.wrap.append(z())),b.st.alignTop&&(f+=" mfp-align-top"),b.fixedContentPos?b.wrap.css({overflow:b.st.overflowY,overflowX:"hidden",overflowY:b.st.overflowY}):b.wrap.css({top:v.scrollTop(),position:"absolute"}),(b.st.fixedBgPos===!1||"auto"===b.st.fixedBgPos&&!b.fixedContentPos)&&b.bgOverlay.css({height:d.height(),position:"absolute"}),b.st.enableEscapeKey&&d.on("keyup"+p,function(a){27===a.keyCode&&b.close()}),v.on("resize"+p,function(){b.updateSize()}),b.st.closeOnContentClick||(f+=" mfp-auto-cursor"),f&&b.wrap.addClass(f);var k=b.wH=v.height(),n={};if(b.fixedContentPos&&b._hasScrollBar(k)){var o=b._getScrollbarSize();o&&(n.marginRight=o)}b.fixedContentPos&&(b.isIE7?a("body, html").css("overflow","hidden"):n.overflow="hidden");var r=b.st.mainClass;return b.isIE7&&(r+=" mfp-ie7"),r&&b._addClassToMFP(r),b.updateItemHTML(),y("BuildControls"),a("html").css(n),b.bgOverlay.add(b.wrap).prependTo(b.st.prependTo||a(document.body)),b._lastFocusedEl=document.activeElement,setTimeout(function(){b.content?(b._addClassToMFP(q),b._setFocus()):b.bgOverlay.addClass(q),d.on("focusin"+p,b._onFocusIn)},16),b.isOpen=!0,b.updateSize(k),y(m),c},close:function(){b.isOpen&&(y(i),b.isOpen=!1,b.st.removalDelay&&!b.isLowIE&&b.supportsTransition?(b._addClassToMFP(r),setTimeout(function(){b._close()},b.st.removalDelay)):b._close())},_close:function(){y(h);var c=r+" "+q+" ";if(b.bgOverlay.detach(),b.wrap.detach(),b.container.empty(),b.st.mainClass&&(c+=b.st.mainClass+" "),b._removeClassFromMFP(c),b.fixedContentPos){var e={marginRight:""};b.isIE7?a("body, html").css("overflow",""):e.overflow="",a("html").css(e)}d.off("keyup"+p+" focusin"+p),b.ev.off(p),b.wrap.attr("class","mfp-wrap").removeAttr("style"),b.bgOverlay.attr("class","mfp-bg"),b.container.attr("class","mfp-container"),!b.st.showCloseBtn||b.st.closeBtnInside&&b.currTemplate[b.currItem.type]!==!0||b.currTemplate.closeBtn&&b.currTemplate.closeBtn.detach(),b.st.autoFocusLast&&b._lastFocusedEl&&a(b._lastFocusedEl).focus(),b.currItem=null,b.content=null,b.currTemplate=null,b.prevHeight=0,y(j)},updateSize:function(a){if(b.isIOS){var c=document.documentElement.clientWidth/window.innerWidth,d=window.innerHeight*c;b.wrap.css("height",d),b.wH=d}else b.wH=a||v.height();b.fixedContentPos||b.wrap.css("height",b.wH),y("Resize")},updateItemHTML:function(){var c=b.items[b.index];b.contentContainer.detach(),b.content&&b.content.detach(),c.parsed||(c=b.parseEl(b.index));var d=c.type;if(y("BeforeChange",[b.currItem?b.currItem.type:"",d]),b.currItem=c,!b.currTemplate[d]){var f=b.st[d]?b.st[d].markup:!1;y("FirstMarkupParse",f),f?b.currTemplate[d]=a(f):b.currTemplate[d]=!0}e&&e!==c.type&&b.container.removeClass("mfp-"+e+"-holder");var g=b["get"+d.charAt(0).toUpperCase()+d.slice(1)](c,b.currTemplate[d]);b.appendContent(g,d),c.preloaded=!0,y(n,c),e=c.type,b.container.prepend(b.contentContainer),y("AfterChange")},appendContent:function(a,c){b.content=a,a?b.st.showCloseBtn&&b.st.closeBtnInside&&b.currTemplate[c]===!0?b.content.find(".mfp-close").length||b.content.append(z()):b.content=a:b.content="",y(k),b.container.addClass("mfp-"+c+"-holder"),b.contentContainer.append(b.content)},parseEl:function(c){var d,e=b.items[c];if(e.tagName?e={el:a(e)}:(d=e.type,e={data:e,src:e.src}),e.el){for(var f=b.types,g=0;g<f.length;g++)if(e.el.hasClass("mfp-"+f[g])){d=f[g];break}e.src=e.el.attr("data-mfp-src"),e.src||(e.src=e.el.attr("href"))}return e.type=d||b.st.type||"inline",e.index=c,e.parsed=!0,b.items[c]=e,y("ElementParse",e),b.items[c]},addGroup:function(a,c){var d=function(d){d.mfpEl=this,b._openClick(d,a,c)};c||(c={});var e="click.magnificPopup";c.mainEl=a,c.items?(c.isObj=!0,a.off(e).on(e,d)):(c.isObj=!1,c.delegate?a.off(e).on(e,c.delegate,d):(c.items=a,a.off(e).on(e,d)))},_openClick:function(c,d,e){var f=void 0!==e.midClick?e.midClick:a.magnificPopup.defaults.midClick;if(f||!(2===c.which||c.ctrlKey||c.metaKey||c.altKey||c.shiftKey)){var g=void 0!==e.disableOn?e.disableOn:a.magnificPopup.defaults.disableOn;if(g)if(a.isFunction(g)){if(!g.call(b))return!0}else if(v.width()<g)return!0;c.type&&(c.preventDefault(),b.isOpen&&c.stopPropagation()),e.el=a(c.mfpEl),e.delegate&&(e.items=d.find(e.delegate)),b.open(e)}},updateStatus:function(a,d){if(b.preloader){c!==a&&b.container.removeClass("mfp-s-"+c),d||"loading"!==a||(d=b.st.tLoading);var e={status:a,text:d};y("UpdateStatus",e),a=e.status,d=e.text,b.preloader.html(d),b.preloader.find("a").on("click",function(a){a.stopImmediatePropagation()}),b.container.addClass("mfp-s-"+a),c=a}},_checkIfClose:function(c){if(!a(c).hasClass(s)){var d=b.st.closeOnContentClick,e=b.st.closeOnBgClick;if(d&&e)return!0;if(!b.content||a(c).hasClass("mfp-close")||b.preloader&&c===b.preloader[0])return!0;if(c===b.content[0]||a.contains(b.content[0],c)){if(d)return!0}else if(e&&a.contains(document,c))return!0;return!1}},_addClassToMFP:function(a){b.bgOverlay.addClass(a),b.wrap.addClass(a)},_removeClassFromMFP:function(a){this.bgOverlay.removeClass(a),b.wrap.removeClass(a)},_hasScrollBar:function(a){return(b.isIE7?d.height():document.body.scrollHeight)>(a||v.height())},_setFocus:function(){(b.st.focus?b.content.find(b.st.focus).eq(0):b.wrap).focus()},_onFocusIn:function(c){return c.target===b.wrap[0]||a.contains(b.wrap[0],c.target)?void 0:(b._setFocus(),!1)},_parseMarkup:function(b,c,d){var e;d.data&&(c=a.extend(d.data,c)),y(l,[b,c,d]),a.each(c,function(c,d){if(void 0===d||d===!1)return!0;if(e=c.split("_"),e.length>1){var f=b.find(p+"-"+e[0]);if(f.length>0){var g=e[1];"replaceWith"===g?f[0]!==d[0]&&f.replaceWith(d):"img"===g?f.is("img")?f.attr("src",d):f.replaceWith(a("<img>").attr("src",d).attr("class",f.attr("class"))):f.attr(e[1],d)}}else b.find(p+"-"+c).html(d)})},_getScrollbarSize:function(){if(void 0===b.scrollbarSize){var a=document.createElement("div");a.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(a),b.scrollbarSize=a.offsetWidth-a.clientWidth,document.body.removeChild(a)}return b.scrollbarSize}},a.magnificPopup={instance:null,proto:t.prototype,modules:[],open:function(b,c){return A(),b=b?a.extend(!0,{},b):{},b.isObj=!0,b.index=c||0,this.instance.open(b)},close:function(){return a.magnificPopup.instance&&a.magnificPopup.instance.close()},registerModule:function(b,c){c.options&&(a.magnificPopup.defaults[b]=c.options),a.extend(this.proto,c.proto),this.modules.push(b)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&#215;</button>',tClose:"Close (Esc)",tLoading:"Loading...",autoFocusLast:!0}},a.fn.magnificPopup=function(c){A();var d=a(this);if("string"==typeof c)if("open"===c){var e,f=u?d.data("magnificPopup"):d[0].magnificPopup,g=parseInt(arguments[1],10)||0;f.items?e=f.items[g]:(e=d,f.delegate&&(e=e.find(f.delegate)),e=e.eq(g)),b._openClick({mfpEl:e},d,f)}else b.isOpen&&b[c].apply(b,Array.prototype.slice.call(arguments,1));else c=a.extend(!0,{},c),u?d.data("magnificPopup",c):d[0].magnificPopup=c,b.addGroup(d,c);return d};var C,D,E,F="inline",G=function(){E&&(D.after(E.addClass(C)).detach(),E=null)};a.magnificPopup.registerModule(F,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){b.types.push(F),w(h+"."+F,function(){G()})},getInline:function(c,d){if(G(),c.src){var e=b.st.inline,f=a(c.src);if(f.length){var g=f[0].parentNode;g&&g.tagName&&(D||(C=e.hiddenClass,D=x(C),C="mfp-"+C),E=f.after(D).detach().removeClass(C)),b.updateStatus("ready")}else b.updateStatus("error",e.tNotFound),f=a("<div>");return c.inlineElement=f,f}return b.updateStatus("ready"),b._parseMarkup(d,{},c),d}}});var H,I="ajax",J=function(){H&&a(document.body).removeClass(H)},K=function(){J(),b.req&&b.req.abort()};a.magnificPopup.registerModule(I,{options:{settings:null,cursor:"mfp-ajax-cur",tError:'<a href="%url%">The content</a> could not be loaded.'},proto:{initAjax:function(){b.types.push(I),H=b.st.ajax.cursor,w(h+"."+I,K),w("BeforeChange."+I,K)},getAjax:function(c){H&&a(document.body).addClass(H),b.updateStatus("loading");var d=a.extend({url:c.src,success:function(d,e,f){var g={data:d,xhr:f};y("ParseAjax",g),b.appendContent(a(g.data),I),c.finished=!0,J(),b._setFocus(),setTimeout(function(){b.wrap.addClass(q)},16),b.updateStatus("ready"),y("AjaxContentAdded")},error:function(){J(),c.finished=c.loadError=!0,b.updateStatus("error",b.st.ajax.tError.replace("%url%",c.src))}},b.st.ajax.settings);return b.req=a.ajax(d),""}}});var L,M=function(c){if(c.data&&void 0!==c.data.title)return c.data.title;var d=b.st.image.titleSrc;if(d){if(a.isFunction(d))return d.call(b,c);if(c.el)return c.el.attr(d)||""}return""};a.magnificPopup.registerModule("image",{options:{markup:'<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',cursor:"mfp-zoom-out-cur",titleSrc:"title",verticalFit:!0,tError:'<a href="%url%">The image</a> could not be loaded.'},proto:{initImage:function(){var c=b.st.image,d=".image";b.types.push("image"),w(m+d,function(){"image"===b.currItem.type&&c.cursor&&a(document.body).addClass(c.cursor)}),w(h+d,function(){c.cursor&&a(document.body).removeClass(c.cursor),v.off("resize"+p)}),w("Resize"+d,b.resizeImage),b.isLowIE&&w("AfterChange",b.resizeImage)},resizeImage:function(){var a=b.currItem;if(a&&a.img&&b.st.image.verticalFit){var c=0;b.isLowIE&&(c=parseInt(a.img.css("padding-top"),10)+parseInt(a.img.css("padding-bottom"),10)),a.img.css("max-height",b.wH-c)}},_onImageHasSize:function(a){a.img&&(a.hasSize=!0,L&&clearInterval(L),a.isCheckingImgSize=!1,y("ImageHasSize",a),a.imgHidden&&(b.content&&b.content.removeClass("mfp-loading"),a.imgHidden=!1))},findImageSize:function(a){var c=0,d=a.img[0],e=function(f){L&&clearInterval(L),L=setInterval(function(){return d.naturalWidth>0?void b._onImageHasSize(a):(c>200&&clearInterval(L),c++,void(3===c?e(10):40===c?e(50):100===c&&e(500)))},f)};e(1)},getImage:function(c,d){var e=0,f=function(){c&&(c.img[0].complete?(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("ready")),c.hasSize=!0,c.loaded=!0,y("ImageLoadComplete")):(e++,200>e?setTimeout(f,100):g()))},g=function(){c&&(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("error",h.tError.replace("%url%",c.src))),c.hasSize=!0,c.loaded=!0,c.loadError=!0)},h=b.st.image,i=d.find(".mfp-img");if(i.length){var j=document.createElement("img");j.className="mfp-img",c.el&&c.el.find("img").length&&(j.alt=c.el.find("img").attr("alt")),c.img=a(j).on("load.mfploader",f).on("error.mfploader",g),j.src=c.src,i.is("img")&&(c.img=c.img.clone()),j=c.img[0],j.naturalWidth>0?c.hasSize=!0:j.width||(c.hasSize=!1)}return b._parseMarkup(d,{title:M(c),img_replaceWith:c.img},c),b.resizeImage(),c.hasSize?(L&&clearInterval(L),c.loadError?(d.addClass("mfp-loading"),b.updateStatus("error",h.tError.replace("%url%",c.src))):(d.removeClass("mfp-loading"),b.updateStatus("ready")),d):(b.updateStatus("loading"),c.loading=!0,c.hasSize||(c.imgHidden=!0,d.addClass("mfp-loading"),b.findImageSize(c)),d)}}});var N,O=function(){return void 0===N&&(N=void 0!==document.createElement("p").style.MozTransform),N};a.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(a){return a.is("img")?a:a.find("img")}},proto:{initZoom:function(){var a,c=b.st.zoom,d=".zoom";if(c.enabled&&b.supportsTransition){var e,f,g=c.duration,j=function(a){var b=a.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),d="all "+c.duration/1e3+"s "+c.easing,e={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},f="transition";return e["-webkit-"+f]=e["-moz-"+f]=e["-o-"+f]=e[f]=d,b.css(e),b},k=function(){b.content.css("visibility","visible")};w("BuildControls"+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.content.css("visibility","hidden"),a=b._getItemToZoom(),!a)return void k();f=j(a),f.css(b._getOffset()),b.wrap.append(f),e=setTimeout(function(){f.css(b._getOffset(!0)),e=setTimeout(function(){k(),setTimeout(function(){f.remove(),a=f=null,y("ZoomAnimationEnded")},16)},g)},16)}}),w(i+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.st.removalDelay=g,!a){if(a=b._getItemToZoom(),!a)return;f=j(a)}f.css(b._getOffset(!0)),b.wrap.append(f),b.content.css("visibility","hidden"),setTimeout(function(){f.css(b._getOffset())},16)}}),w(h+d,function(){b._allowZoom()&&(k(),f&&f.remove(),a=null)})}},_allowZoom:function(){return"image"===b.currItem.type},_getItemToZoom:function(){return b.currItem.hasSize?b.currItem.img:!1},_getOffset:function(c){var d;d=c?b.currItem.img:b.st.zoom.opener(b.currItem.el||b.currItem);var e=d.offset(),f=parseInt(d.css("padding-top"),10),g=parseInt(d.css("padding-bottom"),10);e.top-=a(window).scrollTop()-f;var h={width:d.width(),height:(u?d.innerHeight():d[0].offsetHeight)-g-f};return O()?h["-moz-transform"]=h.transform="translate("+e.left+"px,"+e.top+"px)":(h.left=e.left,h.top=e.top),h}}});var P="iframe",Q="//about:blank",R=function(a){if(b.currTemplate[P]){var c=b.currTemplate[P].find("iframe");c.length&&(a||(c[0].src=Q),b.isIE8&&c.css("display",a?"block":"none"))}};a.magnificPopup.registerModule(P,{options:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',srcAction:"iframe_src",patterns:{youtube:{index:"youtube.com",id:"v=",src:"//www.youtube.com/embed/%id%?autoplay=1"},vimeo:{index:"vimeo.com/",id:"/",src:"//player.vimeo.com/video/%id%?autoplay=1"},gmaps:{index:"//maps.google.",src:"%id%&output=embed"}}},proto:{initIframe:function(){b.types.push(P),w("BeforeChange",function(a,b,c){b!==c&&(b===P?R():c===P&&R(!0))}),w(h+"."+P,function(){R()})},getIframe:function(c,d){var e=c.src,f=b.st.iframe;a.each(f.patterns,function(){return e.indexOf(this.index)>-1?(this.id&&(e="string"==typeof this.id?e.substr(e.lastIndexOf(this.id)+this.id.length,e.length):this.id.call(this,e)),e=this.src.replace("%id%",e),!1):void 0});var g={};return f.srcAction&&(g[f.srcAction]=e),b._parseMarkup(d,g,c),b.updateStatus("ready"),d}}});var S=function(a){var c=b.items.length;return a>c-1?a-c:0>a?c+a:a},T=function(a,b,c){return a.replace(/%curr%/gi,b+1).replace(/%total%/gi,c)};a.magnificPopup.registerModule("gallery",{options:{enabled:!1,arrowMarkup:'<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',preload:[0,2],navigateByImgClick:!0,arrows:!0,tPrev:"Previous (Left arrow key)",tNext:"Next (Right arrow key)",tCounter:"%curr% of %total%"},proto:{initGallery:function(){var c=b.st.gallery,e=".mfp-gallery";return b.direction=!0,c&&c.enabled?(f+=" mfp-gallery",w(m+e,function(){c.navigateByImgClick&&b.wrap.on("click"+e,".mfp-img",function(){return b.items.length>1?(b.next(),!1):void 0}),d.on("keydown"+e,function(a){37===a.keyCode?b.prev():39===a.keyCode&&b.next()})}),w("UpdateStatus"+e,function(a,c){c.text&&(c.text=T(c.text,b.currItem.index,b.items.length))}),w(l+e,function(a,d,e,f){var g=b.items.length;e.counter=g>1?T(c.tCounter,f.index,g):""}),w("BuildControls"+e,function(){if(b.items.length>1&&c.arrows&&!b.arrowLeft){var d=c.arrowMarkup,e=b.arrowLeft=a(d.replace(/%title%/gi,c.tPrev).replace(/%dir%/gi,"left")).addClass(s),f=b.arrowRight=a(d.replace(/%title%/gi,c.tNext).replace(/%dir%/gi,"right")).addClass(s);e.click(function(){b.prev()}),f.click(function(){b.next()}),b.container.append(e.add(f))}}),w(n+e,function(){b._preloadTimeout&&clearTimeout(b._preloadTimeout),b._preloadTimeout=setTimeout(function(){b.preloadNearbyImages(),b._preloadTimeout=null},16)}),void w(h+e,function(){d.off(e),b.wrap.off("click"+e),b.arrowRight=b.arrowLeft=null})):!1},next:function(){b.direction=!0,b.index=S(b.index+1),b.updateItemHTML()},prev:function(){b.direction=!1,b.index=S(b.index-1),b.updateItemHTML()},goTo:function(a){b.direction=a>=b.index,b.index=a,b.updateItemHTML()},preloadNearbyImages:function(){var a,c=b.st.gallery.preload,d=Math.min(c[0],b.items.length),e=Math.min(c[1],b.items.length);for(a=1;a<=(b.direction?e:d);a++)b._preloadItem(b.index+a);for(a=1;a<=(b.direction?d:e);a++)b._preloadItem(b.index-a)},_preloadItem:function(c){if(c=S(c),!b.items[c].preloaded){var d=b.items[c];d.parsed||(d=b.parseEl(c)),y("LazyLoad",d),"image"===d.type&&(d.img=a('<img class="mfp-img" />').on("load.mfploader",function(){d.hasSize=!0}).on("error.mfploader",function(){d.hasSize=!0,d.loadError=!0,y("LazyLoadError",d)}).attr("src",d.src)),d.preloaded=!0}}}});var U="retina";a.magnificPopup.registerModule(U,{options:{replaceSrc:function(a){return a.src.replace(/\.\w+$/,function(a){return"@2x"+a})},ratio:1},proto:{initRetina:function(){if(window.devicePixelRatio>1){var a=b.st.retina,c=a.ratio;c=isNaN(c)?c():c,c>1&&(w("ImageHasSize."+U,function(a,b){b.img.css({"max-width":b.img[0].naturalWidth/c,width:"100%"})}),w("ElementParse."+U,function(b,d){d.src=a.replaceSrc(d,c)}))}}}}),A()});
/*  jQuery Nice Select - v1.0
    https://github.com/hernansartorio/jquery-nice-select
    Made by Hernán Sartorio  */
!function(e){e.fn.niceSelect=function(t){function s(t){t.after(e("<div></div>").addClass("nice-select").addClass(t.attr("class")||"").addClass(t.attr("disabled")?"disabled":"").attr("tabindex",t.attr("disabled")?null:"0").html('<span class="current"></span><ul class="list"></ul>'));var s=t.next(),n=t.find("option"),i=t.find("option:selected");s.find(".current").html(i.data("display")||i.text()),n.each(function(t){var n=e(this),i=n.data("display");s.find("ul").append(e("<li></li>").attr("data-value",n.val()).attr("data-display",i||null).addClass("option"+(n.is(":selected")?" selected":"")+(n.is(":disabled")?" disabled":"")).html(n.text()))})}if("string"==typeof t)return"update"==t?this.each(function(){var t=e(this),n=e(this).next(".nice-select"),i=n.hasClass("open");n.length&&(n.remove(),s(t),i&&t.next().trigger("click"))}):"destroy"==t?(this.each(function(){var t=e(this),s=e(this).next(".nice-select");s.length&&(s.remove(),t.css("display",""))}),0==e(".nice-select").length&&e(document).off(".nice_select")):console.log('Method "'+t+'" does not exist.'),this;this.hide(),this.each(function(){var t=e(this);t.next().hasClass("nice-select")||s(t)}),e(document).off(".nice_select"),e(document).on("click.nice_select",".nice-select",function(t){var s=e(this);e(".nice-select").not(s).removeClass("open"),s.toggleClass("open"),s.hasClass("open")?(s.find(".option"),s.find(".focus").removeClass("focus"),s.find(".selected").addClass("focus")):s.focus()}),e(document).on("click.nice_select",function(t){0===e(t.target).closest(".nice-select").length&&e(".nice-select").removeClass("open").find(".option")}),e(document).on("click.nice_select",".nice-select .option:not(.disabled)",function(t){var s=e(this),n=s.closest(".nice-select");n.find(".selected").removeClass("selected"),s.addClass("selected");var i=s.data("display")||s.text();n.find(".current").text(i),n.prev("select").val(s.data("value")).trigger("change")}),e(document).on("keydown.nice_select",".nice-select",function(t){var s=e(this),n=e(s.find(".focus")||s.find(".list .option.selected"));if(32==t.keyCode||13==t.keyCode)return s.hasClass("open")?n.trigger("click"):s.trigger("click"),!1;if(40==t.keyCode){if(s.hasClass("open")){var i=n.nextAll(".option:not(.disabled)").first();i.length>0&&(s.find(".focus").removeClass("focus"),i.addClass("focus"))}else s.trigger("click");return!1}if(38==t.keyCode){if(s.hasClass("open")){var l=n.prevAll(".option:not(.disabled)").first();l.length>0&&(s.find(".focus").removeClass("focus"),l.addClass("focus"))}else s.trigger("click");return!1}if(27==t.keyCode)s.hasClass("open")&&s.trigger("click");else if(9==t.keyCode&&s.hasClass("open"))return!1});var n=document.createElement("a").style;return n.cssText="pointer-events:auto","auto"!==n.pointerEvents&&e("html").addClass("no-csspointerevents"),this}}(jQuery);
(function($) {
    // USE STRICT
    "use strict";
    // Customer Say Slidere 
    $(window).load(function() {
        var owlSelector = $(".owl-carousel");
        owlSelector.each(function() {
            var option = {
                items: 1,
                margin: 30,
                loop: false,
                slideBy: 1,
                center: false,
                mousedrag: true,
                touchdrag: false,
                pulldrag: true,
                nav: false,
                dots: false,
                dotsdata: false,
                autoplay: false,
                smartspeed: 650,
                animateout: 'fadeOut',
                animatein: null,
                autoHeight: true,
                autoWidth: true,
                xs: 1,
                sm: 1,
                md: 1,
                lg: 1,
                xl: 1,
            };
            for (var k in option) {
                if (option.hasOwnProperty(k)) {
                    if ($(this).attr("data-carousel-" + k) != null) {
                        option[k] = $(this).data("carousel-" + k);
                    }
                }
            }

            $(this).owlCarousel({
                items: option.items,
                slideBy: option.slideBy,
                margin: option.margin,
                loop: option.loop,
                center: option.center,
                mouseDrag: option.mousedrag,
                touchDrag: option.touchdrag,
                pullDrag: option.pulldrag,
                nav: option.nav,
                navText: option.navtext,
                dots: option.dots,
                dotsData: option.dotsdata,
                autoplay: option.autoplay,
                smartSpeed: option.smartspeed,
                animateIn: option.animatein,
                animateOut: option.animateout,
                autoHeight: option.autoHeight,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: option.xs,
                    },
                    // breakpoint from 768 up
                    575: {
                        items: option.sm,
                    },
                    // breakpoint from 768 up
                    768: {
                        items: option.md,
                    },
                    992: {
                        items: option.lg,
                    },
                    1300: {
                        items: option.xl,
                    },
                    1400: {
                        items: option.items,
                    },
                },
                // Go to the next item
            });
            // Go to the next item
            $(".next").click(function() {
                owlSelector.trigger("next.owl.carousel");
            });
            // Go to the previous item
            $(".prev").click(function() {
                owlSelector.trigger("prev.owl.carousel", [300]);
            });
            // if ($('.featured-slider').length) {
            //     $(".featured-slider").owlCarousel({
            //         onInitialized: counter,
            //         onTranslated: counter,
            //         items: 1,
            //         animateout: 'fadeOut',
            //     });
            // }
        });
    });


})(jQuery);
/**
 * Owl Carousel v2.1.6
 * Copyright 2013-2016 David Deutsch
 * Licensed under MIT (https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE)
 */
/**
 * Owl carousel
 * @version 2.1.6
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 * @todo Lazy Load Icon
 * @todo prevent animationend bubling
 * @todo itemsScaleUp
 * @todo Test Zepto
 * @todo stagePadding calculate wrong active classes
 */
;
(function($, window, document, undefined) {

    /**
     * Creates a carousel.
     * @class The Owl Carousel.
     * @public
     * @param {HTMLElement|jQuery} element - The element to create the carousel for.
     * @param {Object} [options] - The options
     */
    function Owl(element, options) {

        /**
         * Current settings for the carousel.
         * @public
         */
        this.settings = null;

        /**
         * Current options set by the caller including defaults.
         * @public
         */
        this.options = $.extend({}, Owl.Defaults, options);

        /**
         * Plugin element.
         * @public
         */
        this.$element = $(element);

        /**
         * Proxied event handlers.
         * @protected
         */
        this._handlers = {};

        /**
         * References to the running plugins of this carousel.
         * @protected
         */
        this._plugins = {};

        /**
         * Currently suppressed events to prevent them from beeing retriggered.
         * @protected
         */
        this._supress = {};

        /**
         * Absolute current position.
         * @protected
         */
        this._current = null;

        /**
         * Animation speed in milliseconds.
         * @protected
         */
        this._speed = null;

        /**
         * Coordinates of all items in pixel.
         * @todo The name of this member is missleading.
         * @protected
         */
        this._coordinates = [];

        /**
         * Current breakpoint.
         * @todo Real media queries would be nice.
         * @protected
         */
        this._breakpoint = null;

        /**
         * Current width of the plugin element.
         */
        this._width = null;

        /**
         * All real items.
         * @protected
         */
        this._items = [];

        /**
         * All cloned items.
         * @protected
         */
        this._clones = [];

        /**
         * Merge values of all items.
         * @todo Maybe this could be part of a plugin.
         * @protected
         */
        this._mergers = [];

        /**
         * Widths of all items.
         */
        this._widths = [];

        /**
         * Invalidated parts within the update process.
         * @protected
         */
        this._invalidated = {};

        /**
         * Ordered list of workers for the update process.
         * @protected
         */
        this._pipe = [];

        /**
         * Current state information for the drag operation.
         * @todo #261
         * @protected
         */
        this._drag = {
            time: null,
            target: null,
            pointer: null,
            stage: {
                start: null,
                current: null
            },
            direction: null
        };

        /**
         * Current state information and their tags.
         * @type {Object}
         * @protected
         */
        this._states = {
            current: {},
            tags: {
                'initializing': ['busy'],
                'animating': ['busy'],
                'dragging': ['interacting']
            }
        };

        $.each(['onResize', 'onThrottledResize'], $.proxy(function(i, handler) {
            this._handlers[handler] = $.proxy(this[handler], this);
        }, this));

        $.each(Owl.Plugins, $.proxy(function(key, plugin) {
            this._plugins[key.charAt(0).toLowerCase() + key.slice(1)] = new plugin(this);
        }, this));

        $.each(Owl.Workers, $.proxy(function(priority, worker) {
            this._pipe.push({
                'filter': worker.filter,
                'run': $.proxy(worker.run, this)
            });
        }, this));

        this.setup();
        this.initialize();
    }

    /**
     * Default options for the carousel.
     * @public
     */
    Owl.Defaults = {
        items: 3,
        loop: false,
        center: false,
        rewind: false,

        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        freeDrag: false,

        margin: 0,
        stagePadding: 0,

        merge: false,
        mergeFit: true,
        autoWidth: false,

        startPosition: 0,
        rtl: false,

        smartSpeed: 250,
        fluidSpeed: false,
        dragEndSpeed: false,

        responsive: {},
        responsiveRefreshRate: 200,
        responsiveBaseElement: window,

        fallbackEasing: 'swing',

        info: false,

        nestedItemSelector: false,
        itemElement: 'div',
        stageElement: 'div',

        refreshClass: 'owl-refresh',
        loadedClass: 'owl-loaded',
        loadingClass: 'owl-loading',
        rtlClass: 'owl-rtl',
        responsiveClass: 'owl-responsive',
        dragClass: 'owl-drag',
        itemClass: 'owl-item',
        stageClass: 'owl-stage',
        stageOuterClass: 'owl-stage-outer',
        grabClass: 'owl-grab'
    };

    /**
     * Enumeration for width.
     * @public
     * @readonly
     * @enum {String}
     */
    Owl.Width = {
        Default: 'default',
        Inner: 'inner',
        Outer: 'outer'
    };

    /**
     * Enumeration for types.
     * @public
     * @readonly
     * @enum {String}
     */
    Owl.Type = {
        Event: 'event',
        State: 'state'
    };

    /**
     * Contains all registered plugins.
     * @public
     */
    Owl.Plugins = {};

    /**
     * List of workers involved in the update process.
     */
    Owl.Workers = [{
        filter: ['width', 'settings'],
        run: function() {
            this._width = this.$element.width();
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function(cache) {
            cache.current = this._items && this._items[this.relative(this._current)];
        }
    }, {
        filter: ['items', 'settings'],
        run: function() {
            this.$stage.children('.cloned').remove();
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function(cache) {
            var margin = this.settings.margin || '',
                grid = !this.settings.autoWidth,
                rtl = this.settings.rtl,
                css = {
                    'width': 'auto',
                    'margin-left': rtl ? margin : '',
                    'margin-right': rtl ? '' : margin
                };

            !grid && this.$stage.children().css(css);

            cache.css = css;
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function(cache) {
            var width = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
                merge = null,
                iterator = this._items.length,
                grid = !this.settings.autoWidth,
                widths = [];

            cache.items = {
                merge: false,
                width: width
            };

            while (iterator--) {
                merge = this._mergers[iterator];
                merge = this.settings.mergeFit && Math.min(merge, this.settings.items) || merge;

                cache.items.merge = merge > 1 || cache.items.merge;

                widths[iterator] = !grid ? this._items[iterator].width() : width * merge;
            }

            this._widths = widths;
        }
    }, {
        filter: ['items', 'settings'],
        run: function() {
            var clones = [],
                items = this._items,
                settings = this.settings,
                view = Math.max(settings.items * 2, 4),
                size = Math.ceil(items.length / 2) * 2,
                repeat = settings.loop && items.length ? settings.rewind ? view : Math.max(view, size) : 0,
                append = '',
                prepend = '';

            repeat /= 2;

            while (repeat--) {
                clones.push(this.normalize(clones.length / 2, true));
                append = append + items[clones[clones.length - 1]][0].outerHTML;
                clones.push(this.normalize(items.length - 1 - (clones.length - 1) / 2, true));
                prepend = items[clones[clones.length - 1]][0].outerHTML + prepend;
            }

            this._clones = clones;

            $(append).addClass('cloned').appendTo(this.$stage);
            $(prepend).addClass('cloned').prependTo(this.$stage);
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function() {
            var rtl = this.settings.rtl ? 1 : -1,
                size = this._clones.length + this._items.length,
                iterator = -1,
                previous = 0,
                current = 0,
                coordinates = [];

            while (++iterator < size) {
                previous = coordinates[iterator - 1] || 0;
                current = this._widths[this.relative(iterator)] + this.settings.margin;
                coordinates.push(previous + current * rtl);
            }

            this._coordinates = coordinates;
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function() {
            var padding = this.settings.stagePadding,
                coordinates = this._coordinates,
                css = {
                    'width': Math.ceil(Math.abs(coordinates[coordinates.length - 1])) + padding * 2,
                    'padding-left': padding || '',
                    'padding-right': padding || ''
                };

            this.$stage.css(css);
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function(cache) {
            var iterator = this._coordinates.length,
                grid = !this.settings.autoWidth,
                items = this.$stage.children();

            if (grid && cache.items.merge) {
                while (iterator--) {
                    cache.css.width = this._widths[this.relative(iterator)];
                    items.eq(iterator).css(cache.css);
                }
            } else if (grid) {
                cache.css.width = cache.items.width;
                items.css(cache.css);
            }
        }
    }, {
        filter: ['items'],
        run: function() {
            this._coordinates.length < 1 && this.$stage.removeAttr('style');
        }
    }, {
        filter: ['width', 'items', 'settings'],
        run: function(cache) {
            cache.current = cache.current ? this.$stage.children().index(cache.current) : 0;
            cache.current = Math.max(this.minimum(), Math.min(this.maximum(), cache.current));
            this.reset(cache.current);
        }
    }, {
        filter: ['position'],
        run: function() {
            this.animate(this.coordinates(this._current));
        }
    }, {
        filter: ['width', 'position', 'items', 'settings'],
        run: function() {
            var rtl = this.settings.rtl ? 1 : -1,
                padding = this.settings.stagePadding * 2,
                begin = this.coordinates(this.current()) + padding,
                end = begin + this.width() * rtl,
                inner, outer, matches = [],
                i, n;

            for (i = 0, n = this._coordinates.length; i < n; i++) {
                inner = this._coordinates[i - 1] || 0;
                outer = Math.abs(this._coordinates[i]) + padding * rtl;

                if ((this.op(inner, '<=', begin) && (this.op(inner, '>', end))) ||
                    (this.op(outer, '<', begin) && this.op(outer, '>', end))) {
                    matches.push(i);
                }
            }

            this.$stage.children('.active').removeClass('active');
            this.$stage.children(':eq(' + matches.join('), :eq(') + ')').addClass('active');

            if (this.settings.center) {
                this.$stage.children('.center').removeClass('center');
                this.$stage.children().eq(this.current()).addClass('center');
            }
        }
    }];

    /**
     * Initializes the carousel.
     * @protected
     */
    Owl.prototype.initialize = function() {
        this.enter('initializing');
        this.trigger('initialize');

        this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl);

        if (this.settings.autoWidth && !this.is('pre-loading')) {
            var imgs, nestedSelector, width;
            imgs = this.$element.find('img');
            nestedSelector = this.settings.nestedItemSelector ? '.' + this.settings.nestedItemSelector : undefined;
            width = this.$element.children(nestedSelector).width();

            if (imgs.length && width <= 0) {
                this.preloadAutoWidthImages(imgs);
            }
        }

        this.$element.addClass(this.options.loadingClass);

        // create stage
        this.$stage = $('<' + this.settings.stageElement + ' class="' + this.settings.stageClass + '"/>')
            .wrap('<div class="' + this.settings.stageOuterClass + '"/>');

        // append stage
        this.$element.append(this.$stage.parent());

        // append content
        this.replace(this.$element.children().not(this.$stage.parent()));

        // check visibility
        if (this.$element.is(':visible')) {
            // update view
            this.refresh();
        } else {
            // invalidate width
            this.invalidate('width');
        }

        this.$element
            .removeClass(this.options.loadingClass)
            .addClass(this.options.loadedClass);

        // register event handlers
        this.registerEventHandlers();

        this.leave('initializing');
        this.trigger('initialized');
    };

    /**
     * Setups the current settings.
     * @todo Remove responsive classes. Why should adaptive designs be brought into IE8?
     * @todo Support for media queries by using `matchMedia` would be nice.
     * @public
     */
    Owl.prototype.setup = function() {
        var viewport = this.viewport(),
            overwrites = this.options.responsive,
            match = -1,
            settings = null;

        if (!overwrites) {
            settings = $.extend({}, this.options);
        } else {
            $.each(overwrites, function(breakpoint) {
                if (breakpoint <= viewport && breakpoint > match) {
                    match = Number(breakpoint);
                }
            });

            settings = $.extend({}, this.options, overwrites[match]);
            if (typeof settings.stagePadding === 'function') {
                settings.stagePadding = settings.stagePadding();
            }
            delete settings.responsive;

            // responsive class
            if (settings.responsiveClass) {
                this.$element.attr('class',
                    this.$element.attr('class').replace(new RegExp('(' + this.options.responsiveClass + '-)\\S+\\s', 'g'), '$1' + match)
                );
            }
        }

        this.trigger('change', { property: { name: 'settings', value: settings } });
        this._breakpoint = match;
        this.settings = settings;
        this.invalidate('settings');
        this.trigger('changed', { property: { name: 'settings', value: this.settings } });
    };

    /**
     * Updates option logic if necessery.
     * @protected
     */
    Owl.prototype.optionsLogic = function() {
        if (this.settings.autoWidth) {
            this.settings.stagePadding = false;
            this.settings.merge = false;
        }
    };

    /**
     * Prepares an item before add.
     * @todo Rename event parameter `content` to `item`.
     * @protected
     * @returns {jQuery|HTMLElement} - The item container.
     */
    Owl.prototype.prepare = function(item) {
        var event = this.trigger('prepare', { content: item });

        if (!event.data) {
            event.data = $('<' + this.settings.itemElement + '/>')
                .addClass(this.options.itemClass).append(item)
        }

        this.trigger('prepared', { content: event.data });

        return event.data;
    };

    /**
     * Updates the view.
     * @public
     */
    Owl.prototype.update = function() {
        var i = 0,
            n = this._pipe.length,
            filter = $.proxy(function(p) { return this[p] }, this._invalidated),
            cache = {};

        while (i < n) {
            if (this._invalidated.all || $.grep(this._pipe[i].filter, filter).length > 0) {
                this._pipe[i].run(cache);
            }
            i++;
        }

        this._invalidated = {};

        !this.is('valid') && this.enter('valid');
    };

    /**
     * Gets the width of the view.
     * @public
     * @param {Owl.Width} [dimension=Owl.Width.Default] - The dimension to return.
     * @returns {Number} - The width of the view in pixel.
     */
    Owl.prototype.width = function(dimension) {
        dimension = dimension || Owl.Width.Default;
        switch (dimension) {
            case Owl.Width.Inner:
            case Owl.Width.Outer:
                return this._width;
            default:
                return this._width - this.settings.stagePadding * 2 + this.settings.margin;
        }
    };

    /**
     * Refreshes the carousel primarily for adaptive purposes.
     * @public
     */
    Owl.prototype.refresh = function() {
        this.enter('refreshing');
        this.trigger('refresh');

        this.setup();

        this.optionsLogic();

        this.$element.addClass(this.options.refreshClass);

        this.update();

        this.$element.removeClass(this.options.refreshClass);

        this.leave('refreshing');
        this.trigger('refreshed');
    };

    /**
     * Checks window `resize` event.
     * @protected
     */
    Owl.prototype.onThrottledResize = function() {
        window.clearTimeout(this.resizeTimer);
        this.resizeTimer = window.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate);
    };

    /**
     * Checks window `resize` event.
     * @protected
     */
    Owl.prototype.onResize = function() {
        if (!this._items.length) {
            return false;
        }

        if (this._width === this.$element.width()) {
            return false;
        }

        if (!this.$element.is(':visible')) {
            return false;
        }

        this.enter('resizing');

        if (this.trigger('resize').isDefaultPrevented()) {
            this.leave('resizing');
            return false;
        }

        this.invalidate('width');

        this.refresh();

        this.leave('resizing');
        this.trigger('resized');
    };

    /**
     * Registers event handlers.
     * @todo Check `msPointerEnabled`
     * @todo #261
     * @protected
     */
    Owl.prototype.registerEventHandlers = function() {
        if ($.support.transition) {
            this.$stage.on($.support.transition.end + '.owl.core', $.proxy(this.onTransitionEnd, this));
        }

        if (this.settings.responsive !== false) {
            this.on(window, 'resize', this._handlers.onThrottledResize);
        }

        if (this.settings.mouseDrag) {
            this.$element.addClass(this.options.dragClass);
            this.$stage.on('mousedown.owl.core', $.proxy(this.onDragStart, this));
            this.$stage.on('dragstart.owl.core selectstart.owl.core', function() { return false });
        }

        if (this.settings.touchDrag) {
            this.$stage.on('touchstart.owl.core', $.proxy(this.onDragStart, this));
            this.$stage.on('touchcancel.owl.core', $.proxy(this.onDragEnd, this));
        }
    };

    /**
     * Handles `touchstart` and `mousedown` events.
     * @todo Horizontal swipe threshold as option
     * @todo #261
     * @protected
     * @param {Event} event - The event arguments.
     */
    Owl.prototype.onDragStart = function(event) {
        var stage = null;

        if (event.which === 3) {
            return;
        }

        if ($.support.transform) {
            stage = this.$stage.css('transform').replace(/.*\(|\)| /g, '').split(',');
            stage = {
                x: stage[stage.length === 16 ? 12 : 4],
                y: stage[stage.length === 16 ? 13 : 5]
            };
        } else {
            stage = this.$stage.position();
            stage = {
                x: this.settings.rtl ?
                    stage.left + this.$stage.width() - this.width() + this.settings.margin : stage.left,
                y: stage.top
            };
        }

        if (this.is('animating')) {
            $.support.transform ? this.animate(stage.x) : this.$stage.stop()
            this.invalidate('position');
        }

        this.$element.toggleClass(this.options.grabClass, event.type === 'mousedown');

        this.speed(0);

        this._drag.time = new Date().getTime();
        this._drag.target = $(event.target);
        this._drag.stage.start = stage;
        this._drag.stage.current = stage;
        this._drag.pointer = this.pointer(event);

        $(document).on('mouseup.owl.core touchend.owl.core', $.proxy(this.onDragEnd, this));

        $(document).one('mousemove.owl.core touchmove.owl.core', $.proxy(function(event) {
            var delta = this.difference(this._drag.pointer, this.pointer(event));

            $(document).on('mousemove.owl.core touchmove.owl.core', $.proxy(this.onDragMove, this));

            if (Math.abs(delta.x) < Math.abs(delta.y) && this.is('valid')) {
                return;
            }

            event.preventDefault();

            this.enter('dragging');
            this.trigger('drag');
        }, this));
    };

    /**
     * Handles the `touchmove` and `mousemove` events.
     * @todo #261
     * @protected
     * @param {Event} event - The event arguments.
     */
    Owl.prototype.onDragMove = function(event) {
        var minimum = null,
            maximum = null,
            pull = null,
            delta = this.difference(this._drag.pointer, this.pointer(event)),
            stage = this.difference(this._drag.stage.start, delta);

        if (!this.is('dragging')) {
            return;
        }

        event.preventDefault();

        if (this.settings.loop) {
            minimum = this.coordinates(this.minimum());
            maximum = this.coordinates(this.maximum() + 1) - minimum;
            stage.x = (((stage.x - minimum) % maximum + maximum) % maximum) + minimum;
        } else {
            minimum = this.settings.rtl ? this.coordinates(this.maximum()) : this.coordinates(this.minimum());
            maximum = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum());
            pull = this.settings.pullDrag ? -1 * delta.x / 5 : 0;
            stage.x = Math.max(Math.min(stage.x, minimum + pull), maximum + pull);
        }

        this._drag.stage.current = stage;

        this.animate(stage.x);
    };

    /**
     * Handles the `touchend` and `mouseup` events.
     * @todo #261
     * @todo Threshold for click event
     * @protected
     * @param {Event} event - The event arguments.
     */
    Owl.prototype.onDragEnd = function(event) {
        var delta = this.difference(this._drag.pointer, this.pointer(event)),
            stage = this._drag.stage.current,
            direction = delta.x > 0 ^ this.settings.rtl ? 'left' : 'right';

        $(document).off('.owl.core');

        this.$element.removeClass(this.options.grabClass);

        if (delta.x !== 0 && this.is('dragging') || !this.is('valid')) {
            this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed);
            this.current(this.closest(stage.x, delta.x !== 0 ? direction : this._drag.direction));
            this.invalidate('position');
            this.update();

            this._drag.direction = direction;

            if (Math.abs(delta.x) > 3 || new Date().getTime() - this._drag.time > 300) {
                this._drag.target.one('click.owl.core', function() { return false; });
            }
        }

        if (!this.is('dragging')) {
            return;
        }

        this.leave('dragging');
        this.trigger('dragged');
    };

    /**
     * Gets absolute position of the closest item for a coordinate.
     * @todo Setting `freeDrag` makes `closest` not reusable. See #165.
     * @protected
     * @param {Number} coordinate - The coordinate in pixel.
     * @param {String} direction - The direction to check for the closest item. Ether `left` or `right`.
     * @return {Number} - The absolute position of the closest item.
     */
    Owl.prototype.closest = function(coordinate, direction) {
        var position = -1,
            pull = 30,
            width = this.width(),
            coordinates = this.coordinates();

        if (!this.settings.freeDrag) {
            // check closest item
            $.each(coordinates, $.proxy(function(index, value) {
                // on a left pull, check on current index
                if (direction === 'left' && coordinate > value - pull && coordinate < value + pull) {
                    position = index;
                    // on a right pull, check on previous index
                    // to do so, subtract width from value and set position = index + 1
                } else if (direction === 'right' && coordinate > value - width - pull && coordinate < value - width + pull) {
                    position = index + 1;
                } else if (this.op(coordinate, '<', value) &&
                    this.op(coordinate, '>', coordinates[index + 1] || value - width)) {
                    position = direction === 'left' ? index + 1 : index;
                }
                return position === -1;
            }, this));
        }

        if (!this.settings.loop) {
            // non loop boundries
            if (this.op(coordinate, '>', coordinates[this.minimum()])) {
                position = coordinate = this.minimum();
            } else if (this.op(coordinate, '<', coordinates[this.maximum()])) {
                position = coordinate = this.maximum();
            }
        }

        return position;
    };

    /**
     * Animates the stage.
     * @todo #270
     * @public
     * @param {Number} coordinate - The coordinate in pixels.
     */
    Owl.prototype.animate = function(coordinate) {
        var animate = this.speed() > 0;

        this.is('animating') && this.onTransitionEnd();

        if (animate) {
            this.enter('animating');
            this.trigger('translate');
        }

        if ($.support.transform3d && $.support.transition) {
            this.$stage.css({
                transform: 'translate3d(' + coordinate + 'px,0px,0px)',
                transition: (this.speed() / 1000) + 's'
            });
        } else if (animate) {
            this.$stage.animate({
                left: coordinate + 'px'
            }, this.speed(), this.settings.fallbackEasing, $.proxy(this.onTransitionEnd, this));
        } else {
            this.$stage.css({
                left: coordinate + 'px'
            });
        }
    };

    /**
     * Checks whether the carousel is in a specific state or not.
     * @param {String} state - The state to check.
     * @returns {Boolean} - The flag which indicates if the carousel is busy.
     */
    Owl.prototype.is = function(state) {
        return this._states.current[state] && this._states.current[state] > 0;
    };

    /**
     * Sets the absolute position of the current item.
     * @public
     * @param {Number} [position] - The new absolute position or nothing to leave it unchanged.
     * @returns {Number} - The absolute position of the current item.
     */
    Owl.prototype.current = function(position) {
        if (position === undefined) {
            return this._current;
        }

        if (this._items.length === 0) {
            return undefined;
        }

        position = this.normalize(position);

        if (this._current !== position) {
            var event = this.trigger('change', { property: { name: 'position', value: position } });

            if (event.data !== undefined) {
                position = this.normalize(event.data);
            }

            this._current = position;

            this.invalidate('position');

            this.trigger('changed', { property: { name: 'position', value: this._current } });
        }

        return this._current;
    };

    /**
     * Invalidates the given part of the update routine.
     * @param {String} [part] - The part to invalidate.
     * @returns {Array.<String>} - The invalidated parts.
     */
    Owl.prototype.invalidate = function(part) {
        if ($.type(part) === 'string') {
            this._invalidated[part] = true;
            this.is('valid') && this.leave('valid');
        }
        return $.map(this._invalidated, function(v, i) { return i });
    };

    /**
     * Resets the absolute position of the current item.
     * @public
     * @param {Number} position - The absolute position of the new item.
     */
    Owl.prototype.reset = function(position) {
        position = this.normalize(position);

        if (position === undefined) {
            return;
        }

        this._speed = 0;
        this._current = position;

        this.suppress(['translate', 'translated']);

        this.animate(this.coordinates(position));

        this.release(['translate', 'translated']);
    };

    /**
     * Normalizes an absolute or a relative position of an item.
     * @public
     * @param {Number} position - The absolute or relative position to normalize.
     * @param {Boolean} [relative=false] - Whether the given position is relative or not.
     * @returns {Number} - The normalized position.
     */
    Owl.prototype.normalize = function(position, relative) {
        var n = this._items.length,
            m = relative ? 0 : this._clones.length;

        if (!this.isNumeric(position) || n < 1) {
            position = undefined;
        } else if (position < 0 || position >= n + m) {
            position = ((position - m / 2) % n + n) % n + m / 2;
        }

        return position;
    };

    /**
     * Converts an absolute position of an item into a relative one.
     * @public
     * @param {Number} position - The absolute position to convert.
     * @returns {Number} - The converted position.
     */
    Owl.prototype.relative = function(position) {
        position -= this._clones.length / 2;
        return this.normalize(position, true);
    };

    /**
     * Gets the maximum position for the current item.
     * @public
     * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
     * @returns {Number}
     */
    Owl.prototype.maximum = function(relative) {
        var settings = this.settings,
            maximum = this._coordinates.length,
            iterator,
            reciprocalItemsWidth,
            elementWidth;

        if (settings.loop) {
            maximum = this._clones.length / 2 + this._items.length - 1;
        } else if (settings.autoWidth || settings.merge) {
            iterator = this._items.length;
            reciprocalItemsWidth = this._items[--iterator].width();
            elementWidth = this.$element.width();
            while (iterator--) {
                reciprocalItemsWidth += this._items[iterator].width() + this.settings.margin;
                if (reciprocalItemsWidth > elementWidth) {
                    break;
                }
            }
            maximum = iterator + 1;
        } else if (settings.center) {
            maximum = this._items.length - 1;
        } else {
            maximum = this._items.length - settings.items;
        }

        if (relative) {
            maximum -= this._clones.length / 2;
        }

        return Math.max(maximum, 0);
    };

    /**
     * Gets the minimum position for the current item.
     * @public
     * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
     * @returns {Number}
     */
    Owl.prototype.minimum = function(relative) {
        return relative ? 0 : this._clones.length / 2;
    };

    /**
     * Gets an item at the specified relative position.
     * @public
     * @param {Number} [position] - The relative position of the item.
     * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
     */
    Owl.prototype.items = function(position) {
        if (position === undefined) {
            return this._items.slice();
        }

        position = this.normalize(position, true);
        return this._items[position];
    };

    /**
     * Gets an item at the specified relative position.
     * @public
     * @param {Number} [position] - The relative position of the item.
     * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
     */
    Owl.prototype.mergers = function(position) {
        if (position === undefined) {
            return this._mergers.slice();
        }

        position = this.normalize(position, true);
        return this._mergers[position];
    };

    /**
     * Gets the absolute positions of clones for an item.
     * @public
     * @param {Number} [position] - The relative position of the item.
     * @returns {Array.<Number>} - The absolute positions of clones for the item or all if no position was given.
     */
    Owl.prototype.clones = function(position) {
        var odd = this._clones.length / 2,
            even = odd + this._items.length,
            map = function(index) { return index % 2 === 0 ? even + index / 2 : odd - (index + 1) / 2 };

        if (position === undefined) {
            return $.map(this._clones, function(v, i) { return map(i) });
        }

        return $.map(this._clones, function(v, i) { return v === position ? map(i) : null });
    };

    /**
     * Sets the current animation speed.
     * @public
     * @param {Number} [speed] - The animation speed in milliseconds or nothing to leave it unchanged.
     * @returns {Number} - The current animation speed in milliseconds.
     */
    Owl.prototype.speed = function(speed) {
        if (speed !== undefined) {
            this._speed = speed;
        }

        return this._speed;
    };

    /**
     * Gets the coordinate of an item.
     * @todo The name of this method is missleanding.
     * @public
     * @param {Number} position - The absolute position of the item within `minimum()` and `maximum()`.
     * @returns {Number|Array.<Number>} - The coordinate of the item in pixel or all coordinates.
     */
    Owl.prototype.coordinates = function(position) {
        var multiplier = 1,
            newPosition = position - 1,
            coordinate;

        if (position === undefined) {
            return $.map(this._coordinates, $.proxy(function(coordinate, index) {
                return this.coordinates(index);
            }, this));
        }

        if (this.settings.center) {
            if (this.settings.rtl) {
                multiplier = -1;
                newPosition = position + 1;
            }

            coordinate = this._coordinates[position];
            coordinate += (this.width() - coordinate + (this._coordinates[newPosition] || 0)) / 2 * multiplier;
        } else {
            coordinate = this._coordinates[newPosition] || 0;
        }

        coordinate = Math.ceil(coordinate);

        return coordinate;
    };

    /**
     * Calculates the speed for a translation.
     * @protected
     * @param {Number} from - The absolute position of the start item.
     * @param {Number} to - The absolute position of the target item.
     * @param {Number} [factor=undefined] - The time factor in milliseconds.
     * @returns {Number} - The time in milliseconds for the translation.
     */
    Owl.prototype.duration = function(from, to, factor) {
        if (factor === 0) {
            return 0;
        }

        return Math.min(Math.max(Math.abs(to - from), 1), 6) * Math.abs((factor || this.settings.smartSpeed));
    };

    /**
     * Slides to the specified item.
     * @public
     * @param {Number} position - The position of the item.
     * @param {Number} [speed] - The time in milliseconds for the transition.
     */
    Owl.prototype.to = function(position, speed) {
        var current = this.current(),
            revert = null,
            distance = position - this.relative(current),
            direction = (distance > 0) - (distance < 0),
            items = this._items.length,
            minimum = this.minimum(),
            maximum = this.maximum();

        if (this.settings.loop) {
            if (!this.settings.rewind && Math.abs(distance) > items / 2) {
                distance += direction * -1 * items;
            }

            position = current + distance;
            revert = ((position - minimum) % items + items) % items + minimum;

            if (revert !== position && revert - distance <= maximum && revert - distance > 0) {
                current = revert - distance;
                position = revert;
                this.reset(current);
            }
        } else if (this.settings.rewind) {
            maximum += 1;
            position = (position % maximum + maximum) % maximum;
        } else {
            position = Math.max(minimum, Math.min(maximum, position));
        }

        this.speed(this.duration(current, position, speed));
        this.current(position);

        if (this.$element.is(':visible')) {
            this.update();
        }
    };

    /**
     * Slides to the next item.
     * @public
     * @param {Number} [speed] - The time in milliseconds for the transition.
     */
    Owl.prototype.next = function(speed) {
        speed = speed || false;
        this.to(this.relative(this.current()) + 1, speed);
    };

    /**
     * Slides to the previous item.
     * @public
     * @param {Number} [speed] - The time in milliseconds for the transition.
     */
    Owl.prototype.prev = function(speed) {
        speed = speed || false;
        this.to(this.relative(this.current()) - 1, speed);
    };

    /**
     * Handles the end of an animation.
     * @protected
     * @param {Event} event - The event arguments.
     */
    Owl.prototype.onTransitionEnd = function(event) {

        // if css2 animation then event object is undefined
        if (event !== undefined) {
            event.stopPropagation();

            // Catch only owl-stage transitionEnd event
            if ((event.target || event.srcElement || event.originalTarget) !== this.$stage.get(0)) {
                return false;
            }
        }

        this.leave('animating');
        this.trigger('translated');
    };

    /**
     * Gets viewport width.
     * @protected
     * @return {Number} - The width in pixel.
     */
    Owl.prototype.viewport = function() {
        var width;
        if (this.options.responsiveBaseElement !== window) {
            width = $(this.options.responsiveBaseElement).width();
        } else if (window.innerWidth) {
            width = window.innerWidth;
        } else if (document.documentElement && document.documentElement.clientWidth) {
            width = document.documentElement.clientWidth;
        } else {
            throw 'Can not detect viewport width.';
        }
        return width;
    };

    /**
     * Replaces the current content.
     * @public
     * @param {HTMLElement|jQuery|String} content - The new content.
     */
    Owl.prototype.replace = function(content) {
        this.$stage.empty();
        this._items = [];

        if (content) {
            content = (content instanceof jQuery) ? content : $(content);
        }

        if (this.settings.nestedItemSelector) {
            content = content.find('.' + this.settings.nestedItemSelector);
        }

        content.filter(function() {
            return this.nodeType === 1;
        }).each($.proxy(function(index, item) {
            item = this.prepare(item);
            this.$stage.append(item);
            this._items.push(item);
            this._mergers.push(item.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
        }, this));

        this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0);

        this.invalidate('items');
    };

    /**
     * Adds an item.
     * @todo Use `item` instead of `content` for the event arguments.
     * @public
     * @param {HTMLElement|jQuery|String} content - The item content to add.
     * @param {Number} [position] - The relative position at which to insert the item otherwise the item will be added to the end.
     */
    Owl.prototype.add = function(content, position) {
        var current = this.relative(this._current);

        position = position === undefined ? this._items.length : this.normalize(position, true);
        content = content instanceof jQuery ? content : $(content);

        this.trigger('add', { content: content, position: position });

        content = this.prepare(content);

        if (this._items.length === 0 || position === this._items.length) {
            this._items.length === 0 && this.$stage.append(content);
            this._items.length !== 0 && this._items[position - 1].after(content);
            this._items.push(content);
            this._mergers.push(content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
        } else {
            this._items[position].before(content);
            this._items.splice(position, 0, content);
            this._mergers.splice(position, 0, content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
        }

        this._items[current] && this.reset(this._items[current].index());

        this.invalidate('items');

        this.trigger('added', { content: content, position: position });
    };

    /**
     * Removes an item by its position.
     * @todo Use `item` instead of `content` for the event arguments.
     * @public
     * @param {Number} position - The relative position of the item to remove.
     */
    Owl.prototype.remove = function(position) {
        position = this.normalize(position, true);

        if (position === undefined) {
            return;
        }

        this.trigger('remove', { content: this._items[position], position: position });

        this._items[position].remove();
        this._items.splice(position, 1);
        this._mergers.splice(position, 1);

        this.invalidate('items');

        this.trigger('removed', { content: null, position: position });
    };

    /**
     * Preloads images with auto width.
     * @todo Replace by a more generic approach
     * @protected
     */
    Owl.prototype.preloadAutoWidthImages = function(images) {
        images.each($.proxy(function(i, element) {
            this.enter('pre-loading');
            element = $(element);
            $(new Image()).one('load', $.proxy(function(e) {
                element.attr('src', e.target.src);
                element.css('opacity', 1);
                this.leave('pre-loading');
                !this.is('pre-loading') && !this.is('initializing') && this.refresh();
            }, this)).attr('src', element.attr('src') || element.attr('data-src') || element.attr('data-src-retina'));
        }, this));
    };

    /**
     * Destroys the carousel.
     * @public
     */
    Owl.prototype.destroy = function() {

        this.$element.off('.owl.core');
        this.$stage.off('.owl.core');
        $(document).off('.owl.core');

        if (this.settings.responsive !== false) {
            window.clearTimeout(this.resizeTimer);
            this.off(window, 'resize', this._handlers.onThrottledResize);
        }

        for (var i in this._plugins) {
            this._plugins[i].destroy();
        }

        this.$stage.children('.cloned').remove();

        this.$stage.unwrap();
        this.$stage.children().contents().unwrap();
        this.$stage.children().unwrap();

        this.$element
            .removeClass(this.options.refreshClass)
            .removeClass(this.options.loadingClass)
            .removeClass(this.options.loadedClass)
            .removeClass(this.options.rtlClass)
            .removeClass(this.options.dragClass)
            .removeClass(this.options.grabClass)
            .attr('class', this.$element.attr('class').replace(new RegExp(this.options.responsiveClass + '-\\S+\\s', 'g'), ''))
            .removeData('owl.carousel');
    };

    /**
     * Operators to calculate right-to-left and left-to-right.
     * @protected
     * @param {Number} [a] - The left side operand.
     * @param {String} [o] - The operator.
     * @param {Number} [b] - The right side operand.
     */
    Owl.prototype.op = function(a, o, b) {
        var rtl = this.settings.rtl;
        switch (o) {
            case '<':
                return rtl ? a > b : a < b;
            case '>':
                return rtl ? a < b : a > b;
            case '>=':
                return rtl ? a <= b : a >= b;
            case '<=':
                return rtl ? a >= b : a <= b;
            default:
                break;
        }
    };

    /**
     * Attaches to an internal event.
     * @protected
     * @param {HTMLElement} element - The event source.
     * @param {String} event - The event name.
     * @param {Function} listener - The event handler to attach.
     * @param {Boolean} capture - Wether the event should be handled at the capturing phase or not.
     */
    Owl.prototype.on = function(element, event, listener, capture) {
        if (element.addEventListener) {
            element.addEventListener(event, listener, capture);
        } else if (element.attachEvent) {
            element.attachEvent('on' + event, listener);
        }
    };

    /**
     * Detaches from an internal event.
     * @protected
     * @param {HTMLElement} element - The event source.
     * @param {String} event - The event name.
     * @param {Function} listener - The attached event handler to detach.
     * @param {Boolean} capture - Wether the attached event handler was registered as a capturing listener or not.
     */
    Owl.prototype.off = function(element, event, listener, capture) {
        if (element.removeEventListener) {
            element.removeEventListener(event, listener, capture);
        } else if (element.detachEvent) {
            element.detachEvent('on' + event, listener);
        }
    };

    /**
     * Triggers a public event.
     * @todo Remove `status`, `relatedTarget` should be used instead.
     * @protected
     * @param {String} name - The event name.
     * @param {*} [data=null] - The event data.
     * @param {String} [namespace=carousel] - The event namespace.
     * @param {String} [state] - The state which is associated with the event.
     * @param {Boolean} [enter=false] - Indicates if the call enters the specified state or not.
     * @returns {Event} - The event arguments.
     */
    Owl.prototype.trigger = function(name, data, namespace, state, enter) {
        var status = {
                item: { count: this._items.length, index: this.current() }
            },
            handler = $.camelCase(
                $.grep(['on', name, namespace], function(v) { return v })
                .join('-').toLowerCase()
            ),
            event = $.Event(
                [name, 'owl', namespace || 'carousel'].join('.').toLowerCase(),
                $.extend({ relatedTarget: this }, status, data)
            );

        if (!this._supress[name]) {
            $.each(this._plugins, function(name, plugin) {
                if (plugin.onTrigger) {
                    plugin.onTrigger(event);
                }
            });

            this.register({ type: Owl.Type.Event, name: name });
            this.$element.trigger(event);

            if (this.settings && typeof this.settings[handler] === 'function') {
                this.settings[handler].call(this, event);
            }
        }

        return event;
    };

    /**
     * Enters a state.
     * @param name - The state name.
     */
    Owl.prototype.enter = function(name) {
        $.each([name].concat(this._states.tags[name] || []), $.proxy(function(i, name) {
            if (this._states.current[name] === undefined) {
                this._states.current[name] = 0;
            }

            this._states.current[name]++;
        }, this));
    };

    /**
     * Leaves a state.
     * @param name - The state name.
     */
    Owl.prototype.leave = function(name) {
        $.each([name].concat(this._states.tags[name] || []), $.proxy(function(i, name) {
            this._states.current[name]--;
        }, this));
    };

    /**
     * Registers an event or state.
     * @public
     * @param {Object} object - The event or state to register.
     */
    Owl.prototype.register = function(object) {
        if (object.type === Owl.Type.Event) {
            if (!$.event.special[object.name]) {
                $.event.special[object.name] = {};
            }

            if (!$.event.special[object.name].owl) {
                var _default = $.event.special[object.name]._default;
                $.event.special[object.name]._default = function(e) {
                    if (_default && _default.apply && (!e.namespace || e.namespace.indexOf('owl') === -1)) {
                        return _default.apply(this, arguments);
                    }
                    return e.namespace && e.namespace.indexOf('owl') > -1;
                };
                $.event.special[object.name].owl = true;
            }
        } else if (object.type === Owl.Type.State) {
            if (!this._states.tags[object.name]) {
                this._states.tags[object.name] = object.tags;
            } else {
                this._states.tags[object.name] = this._states.tags[object.name].concat(object.tags);
            }

            this._states.tags[object.name] = $.grep(this._states.tags[object.name], $.proxy(function(tag, i) {
                return $.inArray(tag, this._states.tags[object.name]) === i;
            }, this));
        }
    };

    /**
     * Suppresses events.
     * @protected
     * @param {Array.<String>} events - The events to suppress.
     */
    Owl.prototype.suppress = function(events) {
        $.each(events, $.proxy(function(index, event) {
            this._supress[event] = true;
        }, this));
    };

    /**
     * Releases suppressed events.
     * @protected
     * @param {Array.<String>} events - The events to release.
     */
    Owl.prototype.release = function(events) {
        $.each(events, $.proxy(function(index, event) {
            delete this._supress[event];
        }, this));
    };

    /**
     * Gets unified pointer coordinates from event.
     * @todo #261
     * @protected
     * @param {Event} - The `mousedown` or `touchstart` event.
     * @returns {Object} - Contains `x` and `y` coordinates of current pointer position.
     */
    Owl.prototype.pointer = function(event) {
        var result = { x: null, y: null };

        event = event.originalEvent || event || window.event;

        event = event.touches && event.touches.length ?
            event.touches[0] : event.changedTouches && event.changedTouches.length ?
            event.changedTouches[0] : event;

        if (event.pageX) {
            result.x = event.pageX;
            result.y = event.pageY;
        } else {
            result.x = event.clientX;
            result.y = event.clientY;
        }

        return result;
    };

    /**
     * Determines if the input is a Number or something that can be coerced to a Number
     * @protected
     * @param {Number|String|Object|Array|Boolean|RegExp|Function|Symbol} - The input to be tested
     * @returns {Boolean} - An indication if the input is a Number or can be coerced to a Number
     */
    Owl.prototype.isNumeric = function(number) {
        return !isNaN(parseFloat(number));
    };

    /**
     * Gets the difference of two vectors.
     * @todo #261
     * @protected
     * @param {Object} - The first vector.
     * @param {Object} - The second vector.
     * @returns {Object} - The difference.
     */
    Owl.prototype.difference = function(first, second) {
        return {
            x: first.x - second.x,
            y: first.y - second.y
        };
    };

    /**
     * The jQuery Plugin for the Owl Carousel
     * @todo Navigation plugin `next` and `prev`
     * @public
     */
    $.fn.owlCarousel = function(option) {
        var args = Array.prototype.slice.call(arguments, 1);

        return this.each(function() {
            var $this = $(this),
                data = $this.data('owl.carousel');

            if (!data) {
                data = new Owl(this, typeof option == 'object' && option);
                $this.data('owl.carousel', data);

                $.each([
                    'next', 'prev', 'to', 'destroy', 'refresh', 'replace', 'add', 'remove'
                ], function(i, event) {
                    data.register({ type: Owl.Type.Event, name: event });
                    data.$element.on(event + '.owl.carousel.core', $.proxy(function(e) {
                        if (e.namespace && e.relatedTarget !== this) {
                            this.suppress([event]);
                            data[event].apply(this, [].slice.call(arguments, 1));
                            this.release([event]);
                        }
                    }, data));
                });
            }

            if (typeof option == 'string' && option.charAt(0) !== '_') {
                data[option].apply(data, args);
            }
        });
    };

    /**
     * The constructor for the jQuery Plugin
     * @public
     */
    $.fn.owlCarousel.Constructor = Owl;

})(window.Zepto || window.jQuery, window, document);

/**
 * AutoRefresh Plugin
 * @version 2.1.0
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function($, window, document, undefined) {

    /**
     * Creates the auto refresh plugin.
     * @class The Auto Refresh Plugin
     * @param {Owl} carousel - The Owl Carousel
     */
    var AutoRefresh = function(carousel) {
        /**
         * Reference to the core.
         * @protected
         * @type {Owl}
         */
        this._core = carousel;

        /**
         * Refresh interval.
         * @protected
         * @type {number}
         */
        this._interval = null;

        /**
         * Whether the element is currently visible or not.
         * @protected
         * @type {Boolean}
         */
        this._visible = null;

        /**
         * All event handlers.
         * @protected
         * @type {Object}
         */
        this._handlers = {
            'initialized.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.autoRefresh) {
                    this.watch();
                }
            }, this)
        };

        // set default options
        this._core.options = $.extend({}, AutoRefresh.Defaults, this._core.options);

        // register event handlers
        this._core.$element.on(this._handlers);
    };

    /**
     * Default options.
     * @public
     */
    AutoRefresh.Defaults = {
        autoRefresh: true,
        autoRefreshInterval: 500
    };

    /**
     * Watches the element.
     */
    AutoRefresh.prototype.watch = function() {
        if (this._interval) {
            return;
        }

        this._visible = this._core.$element.is(':visible');
        this._interval = window.setInterval($.proxy(this.refresh, this), this._core.settings.autoRefreshInterval);
    };

    /**
     * Refreshes the element.
     */
    AutoRefresh.prototype.refresh = function() {
        if (this._core.$element.is(':visible') === this._visible) {
            return;
        }

        this._visible = !this._visible;

        this._core.$element.toggleClass('owl-hidden', !this._visible);

        this._visible && (this._core.invalidate('width') && this._core.refresh());
    };

    /**
     * Destroys the plugin.
     */
    AutoRefresh.prototype.destroy = function() {
        var handler, property;

        window.clearInterval(this._interval);

        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };

    $.fn.owlCarousel.Constructor.Plugins.AutoRefresh = AutoRefresh;

})(window.Zepto || window.jQuery, window, document);

/**
 * Lazy Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function($, window, document, undefined) {

    /**
     * Creates the lazy plugin.
     * @class The Lazy Plugin
     * @param {Owl} carousel - The Owl Carousel
     */
    var Lazy = function(carousel) {

        /**
         * Reference to the core.
         * @protected
         * @type {Owl}
         */
        this._core = carousel;

        /**
         * Already loaded items.
         * @protected
         * @type {Array.<jQuery>}
         */
        this._loaded = [];

        /**
         * Event handlers.
         * @protected
         * @type {Object}
         */
        this._handlers = {
            'initialized.owl.carousel change.owl.carousel resized.owl.carousel': $.proxy(function(e) {
                if (!e.namespace) {
                    return;
                }

                if (!this._core.settings || !this._core.settings.lazyLoad) {
                    return;
                }

                if ((e.property && e.property.name == 'position') || e.type == 'initialized') {
                    var settings = this._core.settings,
                        n = (settings.center && Math.ceil(settings.items / 2) || settings.items),
                        i = ((settings.center && n * -1) || 0),
                        position = (e.property && e.property.value !== undefined ? e.property.value : this._core.current()) + i,
                        clones = this._core.clones().length,
                        load = $.proxy(function(i, v) { this.load(v) }, this);

                    while (i++ < n) {
                        this.load(clones / 2 + this._core.relative(position));
                        clones && $.each(this._core.clones(this._core.relative(position)), load);
                        position++;
                    }
                }
            }, this)
        };

        // set the default options
        this._core.options = $.extend({}, Lazy.Defaults, this._core.options);

        // register event handler
        this._core.$element.on(this._handlers);
    };

    /**
     * Default options.
     * @public
     */
    Lazy.Defaults = {
        lazyLoad: false
    };

    /**
     * Loads all resources of an item at the specified position.
     * @param {Number} position - The absolute position of the item.
     * @protected
     */
    Lazy.prototype.load = function(position) {
        var $item = this._core.$stage.children().eq(position),
            $elements = $item && $item.find('.owl-lazy');

        if (!$elements || $.inArray($item.get(0), this._loaded) > -1) {
            return;
        }

        $elements.each($.proxy(function(index, element) {
            var $element = $(element),
                image,
                url = (window.devicePixelRatio > 1 && $element.attr('data-src-retina')) || $element.attr('data-src');

            this._core.trigger('load', { element: $element, url: url }, 'lazy');

            if ($element.is('img')) {
                $element.one('load.owl.lazy', $.proxy(function() {
                    $element.css('opacity', 1);
                    this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
                }, this)).attr('src', url);
            } else {
                image = new Image();
                image.onload = $.proxy(function() {
                    $element.css({
                        'background-image': 'url(' + url + ')',
                        'opacity': '1'
                    });
                    this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
                }, this);
                image.src = url;
            }
        }, this));

        this._loaded.push($item.get(0));
    };

    /**
     * Destroys the plugin.
     * @public
     */
    Lazy.prototype.destroy = function() {
        var handler, property;

        for (handler in this.handlers) {
            this._core.$element.off(handler, this.handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };

    $.fn.owlCarousel.Constructor.Plugins.Lazy = Lazy;

})(window.Zepto || window.jQuery, window, document);

/**
 * AutoHeight Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function($, window, document, undefined) {

    /**
     * Creates the auto height plugin.
     * @class The Auto Height Plugin
     * @param {Owl} carousel - The Owl Carousel
     */
    var AutoHeight = function(carousel) {
        /**
         * Reference to the core.
         * @protected
         * @type {Owl}
         */
        this._core = carousel;

        /**
         * All event handlers.
         * @protected
         * @type {Object}
         */
        this._handlers = {
            'initialized.owl.carousel refreshed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.autoHeight) {
                    this.update();
                }
            }, this),
            'changed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.autoHeight && e.property.name == 'position') {
                    this.update();
                }
            }, this),
            'loaded.owl.lazy': $.proxy(function(e) {
                if (e.namespace && this._core.settings.autoHeight &&
                    e.element.closest('.' + this._core.settings.itemClass).index() === this._core.current()) {
                    this.update();
                }
            }, this)
        };

        // set default options
        this._core.options = $.extend({}, AutoHeight.Defaults, this._core.options);

        // register event handlers
        this._core.$element.on(this._handlers);
    };

    /**
     * Default options.
     * @public
     */
    AutoHeight.Defaults = {
        autoHeight: false,
        autoHeightClass: 'owl-height'
    };

    /**
     * Updates the view.
     */
    AutoHeight.prototype.update = function() {
        var start = this._core._current,
            end = start + this._core.settings.items,
            visible = this._core.$stage.children().toArray().slice(start, end),
            heights = [],
            maxheight = 0;

        $.each(visible, function(index, item) {
            heights.push($(item).height());
        });

        maxheight = Math.max.apply(null, heights);

        this._core.$stage.parent()
            .height(maxheight)
            .addClass(this._core.settings.autoHeightClass);
    };

    AutoHeight.prototype.destroy = function() {
        var handler, property;

        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };

    $.fn.owlCarousel.Constructor.Plugins.AutoHeight = AutoHeight;

})(window.Zepto || window.jQuery, window, document);

/**
 * Video Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function($, window, document, undefined) {

    /**
     * Creates the video plugin.
     * @class The Video Plugin
     * @param {Owl} carousel - The Owl Carousel
     */
    var Video = function(carousel) {
        /**
         * Reference to the core.
         * @protected
         * @type {Owl}
         */
        this._core = carousel;

        /**
         * Cache all video URLs.
         * @protected
         * @type {Object}
         */
        this._videos = {};

        /**
         * Current playing item.
         * @protected
         * @type {jQuery}
         */
        this._playing = null;

        /**
         * All event handlers.
         * @todo The cloned content removale is too late
         * @protected
         * @type {Object}
         */
        this._handlers = {
            'initialized.owl.carousel': $.proxy(function(e) {
                if (e.namespace) {
                    this._core.register({ type: 'state', name: 'playing', tags: ['interacting'] });
                }
            }, this),
            'resize.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.video && this.isInFullScreen()) {
                    e.preventDefault();
                }
            }, this),
            'refreshed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.is('resizing')) {
                    this._core.$stage.find('.cloned .owl-video-frame').remove();
                }
            }, this),
            'changed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && e.property.name === 'position' && this._playing) {
                    this.stop();
                }
            }, this),
            'prepared.owl.carousel': $.proxy(function(e) {
                if (!e.namespace) {
                    return;
                }

                var $element = $(e.content).find('.owl-video');

                if ($element.length) {
                    $element.css('display', 'none');
                    this.fetch($element, $(e.content));
                }
            }, this)
        };

        // set default options
        this._core.options = $.extend({}, Video.Defaults, this._core.options);

        // register event handlers
        this._core.$element.on(this._handlers);

        this._core.$element.on('click.owl.video', '.owl-video-play-icon', $.proxy(function(e) {
            this.play(e);
        }, this));
    };

    /**
     * Default options.
     * @public
     */
    Video.Defaults = {
        video: false,
        videoHeight: false,
        videoWidth: false
    };

    /**
     * Gets the video ID and the type (YouTube/Vimeo/vzaar only).
     * @protected
     * @param {jQuery} target - The target containing the video data.
     * @param {jQuery} item - The item containing the video.
     */
    Video.prototype.fetch = function(target, item) {
        var type = (function() {
                if (target.attr('data-vimeo-id')) {
                    return 'vimeo';
                } else if (target.attr('data-vzaar-id')) {
                    return 'vzaar'
                } else {
                    return 'youtube';
                }
            })(),
            id = target.attr('data-vimeo-id') || target.attr('data-youtube-id') || target.attr('data-vzaar-id'),
            width = target.attr('data-width') || this._core.settings.videoWidth,
            height = target.attr('data-height') || this._core.settings.videoHeight,
            url = target.attr('href');

        if (url) {

            /*
            		Parses the id's out of the following urls (and probably more):
            		https://www.youtube.com/watch?v=:id
            		https://youtu.be/:id
            		https://vimeo.com/:id
            		https://vimeo.com/channels/:channel/:id
            		https://vimeo.com/groups/:group/videos/:id
            		https://app.vzaar.com/videos/:id

            		Visual example: https://regexper.com/#(http%3A%7Chttps%3A%7C)%5C%2F%5C%2F(player.%7Cwww.%7Capp.)%3F(vimeo%5C.com%7Cyoutu(be%5C.com%7C%5C.be%7Cbe%5C.googleapis%5C.com)%7Cvzaar%5C.com)%5C%2F(video%5C%2F%7Cvideos%5C%2F%7Cembed%5C%2F%7Cchannels%5C%2F.%2B%5C%2F%7Cgroups%5C%2F.%2B%5C%2F%7Cwatch%5C%3Fv%3D%7Cv%5C%2F)%3F(%5BA-Za-z0-9._%25-%5D*)(%5C%26%5CS%2B)%3F
            */

            id = url.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/);

            if (id[3].indexOf('youtu') > -1) {
                type = 'youtube';
            } else if (id[3].indexOf('vimeo') > -1) {
                type = 'vimeo';
            } else if (id[3].indexOf('vzaar') > -1) {
                type = 'vzaar';
            } else {
                throw new Error('Video URL not supported.');
            }
            id = id[6];
        } else {
            throw new Error('Missing video URL.');
        }

        this._videos[url] = {
            type: type,
            id: id,
            width: width,
            height: height
        };

        item.attr('data-video', url);

        this.thumbnail(target, this._videos[url]);
    };

    /**
     * Creates video thumbnail.
     * @protected
     * @param {jQuery} target - The target containing the video data.
     * @param {Object} info - The video info object.
     * @see `fetch`
     */
    Video.prototype.thumbnail = function(target, video) {
        var tnLink,
            icon,
            path,
            dimensions = video.width && video.height ? 'style="width:' + video.width + 'px;height:' + video.height + 'px;"' : '',
            customTn = target.find('img'),
            srcType = 'src',
            lazyClass = '',
            settings = this._core.settings,
            create = function(path) {
                icon = '<div class="owl-video-play-icon"></div>';

                if (settings.lazyLoad) {
                    tnLink = '<div class="owl-video-tn ' + lazyClass + '" ' + srcType + '="' + path + '"></div>';
                } else {
                    tnLink = '<div class="owl-video-tn" style="opacity:1;background-image:url(' + path + ')"></div>';
                }
                target.after(tnLink);
                target.after(icon);
            };

        // wrap video content into owl-video-wrapper div
        target.wrap('<div class="owl-video-wrapper"' + dimensions + '></div>');

        if (this._core.settings.lazyLoad) {
            srcType = 'data-src';
            lazyClass = 'owl-lazy';
        }

        // custom thumbnail
        if (customTn.length) {
            create(customTn.attr(srcType));
            customTn.remove();
            return false;
        }

        if (video.type === 'youtube') {
            path = "//img.youtube.com/vi/" + video.id + "/hqdefault.jpg";
            create(path);
        } else if (video.type === 'vimeo') {
            $.ajax({
                type: 'GET',
                url: '//vimeo.com/api/v2/video/' + video.id + '.json',
                jsonp: 'callback',
                dataType: 'jsonp',
                success: function(data) {
                    path = data[0].thumbnail_large;
                    create(path);
                }
            });
        } else if (video.type === 'vzaar') {
            $.ajax({
                type: 'GET',
                url: '//vzaar.com/api/videos/' + video.id + '.json',
                jsonp: 'callback',
                dataType: 'jsonp',
                success: function(data) {
                    path = data.framegrab_url;
                    create(path);
                }
            });
        }
    };

    /**
     * Stops the current video.
     * @public
     */
    Video.prototype.stop = function() {
        this._core.trigger('stop', null, 'video');
        this._playing.find('.owl-video-frame').remove();
        this._playing.removeClass('owl-video-playing');
        this._playing = null;
        this._core.leave('playing');
        this._core.trigger('stopped', null, 'video');
    };

    /**
     * Starts the current video.
     * @public
     * @param {Event} event - The event arguments.
     */
    Video.prototype.play = function(event) {
        var target = $(event.target),
            item = target.closest('.' + this._core.settings.itemClass),
            video = this._videos[item.attr('data-video')],
            width = video.width || '100%',
            height = video.height || this._core.$stage.height(),
            html;

        if (this._playing) {
            return;
        }

        this._core.enter('playing');
        this._core.trigger('play', null, 'video');

        item = this._core.items(this._core.relative(item.index()));

        this._core.reset(item.index());

        if (video.type === 'youtube') {
            html = '<iframe width="' + width + '" height="' + height + '" src="//www.youtube.com/embed/' +
                video.id + '?autoplay=1&v=' + video.id + '" frameborder="0" allowfullscreen></iframe>';
        } else if (video.type === 'vimeo') {
            html = '<iframe src="//player.vimeo.com/video/' + video.id +
                '?autoplay=1" width="' + width + '" height="' + height +
                '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        } else if (video.type === 'vzaar') {
            html = '<iframe frameborder="0"' + 'height="' + height + '"' + 'width="' + width +
                '" allowfullscreen mozallowfullscreen webkitAllowFullScreen ' +
                'src="//view.vzaar.com/' + video.id + '/player?autoplay=true"></iframe>';
        }

        $('<div class="owl-video-frame">' + html + '</div>').insertAfter(item.find('.owl-video'));

        this._playing = item.addClass('owl-video-playing');
    };

    /**
     * Checks whether an video is currently in full screen mode or not.
     * @todo Bad style because looks like a readonly method but changes members.
     * @protected
     * @returns {Boolean}
     */
    Video.prototype.isInFullScreen = function() {
        var element = document.fullscreenElement || document.mozFullScreenElement ||
            document.webkitFullscreenElement;

        return element && $(element).parent().hasClass('owl-video-frame');
    };

    /**
     * Destroys the plugin.
     */
    Video.prototype.destroy = function() {
        var handler, property;

        this._core.$element.off('click.owl.video');

        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };

    $.fn.owlCarousel.Constructor.Plugins.Video = Video;

})(window.Zepto || window.jQuery, window, document);

/**
 * Animate Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function($, window, document, undefined) {

    /**
     * Creates the animate plugin.
     * @class The Navigation Plugin
     * @param {Owl} scope - The Owl Carousel
     */
    var Animate = function(scope) {
        this.core = scope;
        this.core.options = $.extend({}, Animate.Defaults, this.core.options);
        this.swapping = true;
        this.previous = undefined;
        this.next = undefined;

        this.handlers = {
            'change.owl.carousel': $.proxy(function(e) {
                if (e.namespace && e.property.name == 'position') {
                    this.previous = this.core.current();
                    this.next = e.property.value;
                }
            }, this),
            'drag.owl.carousel dragged.owl.carousel translated.owl.carousel': $.proxy(function(e) {
                if (e.namespace) {
                    this.swapping = e.type == 'translated';
                }
            }, this),
            'translate.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn)) {
                    this.swap();
                }
            }, this)
        };

        this.core.$element.on(this.handlers);
    };

    /**
     * Default options.
     * @public
     */
    Animate.Defaults = {
        animateOut: false,
        animateIn: false
    };

    /**
     * Toggles the animation classes whenever an translations starts.
     * @protected
     * @returns {Boolean|undefined}
     */
    Animate.prototype.swap = function() {

        if (this.core.settings.items !== 1) {
            return;
        }

        if (!$.support.animation || !$.support.transition) {
            return;
        }

        this.core.speed(0);

        var left,
            clear = $.proxy(this.clear, this),
            previous = this.core.$stage.children().eq(this.previous),
            next = this.core.$stage.children().eq(this.next),
            incoming = this.core.settings.animateIn,
            outgoing = this.core.settings.animateOut;

        if (this.core.current() === this.previous) {
            return;
        }

        if (outgoing) {
            left = this.core.coordinates(this.previous) - this.core.coordinates(this.next);
            previous.one($.support.animation.end, clear)
                .css({ 'left': left + 'px' })
                .addClass('animated owl-animated-out')
                .addClass(outgoing);
        }

        if (incoming) {
            next.one($.support.animation.end, clear)
                .addClass('animated owl-animated-in')
                .addClass(incoming);
        }
    };

    Animate.prototype.clear = function(e) {
        $(e.target).css({ 'left': '' })
            .removeClass('animated owl-animated-out owl-animated-in')
            .removeClass(this.core.settings.animateIn)
            .removeClass(this.core.settings.animateOut);
        this.core.onTransitionEnd();
    };

    /**
     * Destroys the plugin.
     * @public
     */
    Animate.prototype.destroy = function() {
        var handler, property;

        for (handler in this.handlers) {
            this.core.$element.off(handler, this.handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };

    $.fn.owlCarousel.Constructor.Plugins.Animate = Animate;

})(window.Zepto || window.jQuery, window, document);

/**
 * Autoplay Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function($, window, document, undefined) {

    /**
     * Creates the autoplay plugin.
     * @class The Autoplay Plugin
     * @param {Owl} scope - The Owl Carousel
     */
    var Autoplay = function(carousel) {
        /**
         * Reference to the core.
         * @protected
         * @type {Owl}
         */
        this._core = carousel;

        /**
         * The autoplay timeout.
         * @type {Timeout}
         */
        this._timeout = null;

        /**
         * Indicates whenever the autoplay is paused.
         * @type {Boolean}
         */
        this._paused = false;

        /**
         * All event handlers.
         * @protected
         * @type {Object}
         */
        this._handlers = {
            'changed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && e.property.name === 'settings') {
                    if (this._core.settings.autoplay) {
                        this.play();
                    } else {
                        this.stop();
                    }
                } else if (e.namespace && e.property.name === 'position') {
                    //console.log('play?', e);
                    if (this._core.settings.autoplay) {
                        this._setAutoPlayInterval();
                    }
                }
            }, this),
            'initialized.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.autoplay) {
                    this.play();
                }
            }, this),
            'play.owl.autoplay': $.proxy(function(e, t, s) {
                if (e.namespace) {
                    this.play(t, s);
                }
            }, this),
            'stop.owl.autoplay': $.proxy(function(e) {
                if (e.namespace) {
                    this.stop();
                }
            }, this),
            'mouseover.owl.autoplay': $.proxy(function() {
                if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
                    this.pause();
                }
            }, this),
            'mouseleave.owl.autoplay': $.proxy(function() {
                if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
                    this.play();
                }
            }, this),
            'touchstart.owl.core': $.proxy(function() {
                if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
                    this.pause();
                }
            }, this),
            'touchend.owl.core': $.proxy(function() {
                if (this._core.settings.autoplayHoverPause) {
                    this.play();
                }
            }, this)
        };

        // register event handlers
        this._core.$element.on(this._handlers);

        // set default options
        this._core.options = $.extend({}, Autoplay.Defaults, this._core.options);
    };

    /**
     * Default options.
     * @public
     */
    Autoplay.Defaults = {
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        autoplaySpeed: false
    };

    /**
     * Starts the autoplay.
     * @public
     * @param {Number} [timeout] - The interval before the next animation starts.
     * @param {Number} [speed] - The animation speed for the animations.
     */
    Autoplay.prototype.play = function(timeout, speed) {
        this._paused = false;

        if (this._core.is('rotating')) {
            return;
        }

        this._core.enter('rotating');

        this._setAutoPlayInterval();
    };

    /**
     * Gets a new timeout
     * @private
     * @param {Number} [timeout] - The interval before the next animation starts.
     * @param {Number} [speed] - The animation speed for the animations.
     * @return {Timeout}
     */
    Autoplay.prototype._getNextTimeout = function(timeout, speed) {
        if (this._timeout) {
            window.clearTimeout(this._timeout);
        }
        return window.setTimeout($.proxy(function() {
            if (this._paused || this._core.is('busy') || this._core.is('interacting') || document.hidden) {
                return;
            }
            this._core.next(speed || this._core.settings.autoplaySpeed);
        }, this), timeout || this._core.settings.autoplayTimeout);
    };

    /**
     * Sets autoplay in motion.
     * @private
     */
    Autoplay.prototype._setAutoPlayInterval = function() {
        this._timeout = this._getNextTimeout();
    };

    /**
     * Stops the autoplay.
     * @public
     */
    Autoplay.prototype.stop = function() {
        if (!this._core.is('rotating')) {
            return;
        }

        window.clearTimeout(this._timeout);
        this._core.leave('rotating');
    };

    /**
     * Stops the autoplay.
     * @public
     */
    Autoplay.prototype.pause = function() {
        if (!this._core.is('rotating')) {
            return;
        }

        this._paused = true;
    };

    /**
     * Destroys the plugin.
     */
    Autoplay.prototype.destroy = function() {
        var handler, property;

        this.stop();

        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };

    $.fn.owlCarousel.Constructor.Plugins.autoplay = Autoplay;

})(window.Zepto || window.jQuery, window, document);

/**
 * Navigation Plugin
 * @version 2.1.0
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function($, window, document, undefined) {
    'use strict';

    /**
     * Creates the navigation plugin.
     * @class The Navigation Plugin
     * @param {Owl} carousel - The Owl Carousel.
     */
    var Navigation = function(carousel) {
        /**
         * Reference to the core.
         * @protected
         * @type {Owl}
         */
        this._core = carousel;

        /**
         * Indicates whether the plugin is initialized or not.
         * @protected
         * @type {Boolean}
         */
        this._initialized = false;

        /**
         * The current paging indexes.
         * @protected
         * @type {Array}
         */
        this._pages = [];

        /**
         * All DOM elements of the user interface.
         * @protected
         * @type {Object}
         */
        this._controls = {};

        /**
         * Markup for an indicator.
         * @protected
         * @type {Array.<String>}
         */
        this._templates = [];

        /**
         * The carousel element.
         * @type {jQuery}
         */
        this.$element = this._core.$element;

        /**
         * Overridden methods of the carousel.
         * @protected
         * @type {Object}
         */
        this._overrides = {
            next: this._core.next,
            prev: this._core.prev,
            to: this._core.to
        };

        /**
         * All event handlers.
         * @protected
         * @type {Object}
         */
        this._handlers = {
            'prepared.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.dotsData) {
                    this._templates.push('<div class="' + this._core.settings.dotClass + '">' +
                        $(e.content).find('[data-dot]').addBack('[data-dot]').attr('data-dot') + '</div>');
                }
            }, this),
            'added.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.dotsData) {
                    this._templates.splice(e.position, 0, this._templates.pop());
                }
            }, this),
            'remove.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.dotsData) {
                    this._templates.splice(e.position, 1);
                }
            }, this),
            'changed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && e.property.name == 'position') {
                    this.draw();
                }
            }, this),
            'initialized.owl.carousel': $.proxy(function(e) {
                if (e.namespace && !this._initialized) {
                    this._core.trigger('initialize', null, 'navigation');
                    this.initialize();
                    this.update();
                    this.draw();
                    this._initialized = true;
                    this._core.trigger('initialized', null, 'navigation');
                }
            }, this),
            'refreshed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._initialized) {
                    this._core.trigger('refresh', null, 'navigation');
                    this.update();
                    this.draw();
                    this._core.trigger('refreshed', null, 'navigation');
                }
            }, this)
        };

        // set default options
        this._core.options = $.extend({}, Navigation.Defaults, this._core.options);

        // register event handlers
        this.$element.on(this._handlers);
    };

    /**
     * Default options.
     * @public
     * @todo Rename `slideBy` to `navBy`
     */
    Navigation.Defaults = {
        nav: false,
        navText: ['prev', 'next'],
        navSpeed: false,
        navElement: 'div',
        navContainer: false,
        navContainerClass: 'owl-nav',
        navClass: ['owl-prev', 'owl-next'],
        slideBy: 1,
        dotClass: 'owl-dot',
        dotsClass: 'owl-dots',
        dots: true,
        dotsEach: false,
        dotsData: false,
        dotsSpeed: false,
        dotsContainer: false
    };

    /**
     * Initializes the layout of the plugin and extends the carousel.
     * @protected
     */
    Navigation.prototype.initialize = function() {
        var override,
            settings = this._core.settings;

        // create DOM structure for relative navigation
        this._controls.$relative = (settings.navContainer ? $(settings.navContainer) :
            $('<div>').addClass(settings.navContainerClass).appendTo(this.$element)).addClass('disabled');

        this._controls.$previous = $('<' + settings.navElement + '>')
            .addClass(settings.navClass[0])
            .html(settings.navText[0])
            .prependTo(this._controls.$relative)
            .on('click', $.proxy(function(e) {
                this.prev(settings.navSpeed);
            }, this));
        this._controls.$next = $('<' + settings.navElement + '>')
            .addClass(settings.navClass[1])
            .html(settings.navText[1])
            .appendTo(this._controls.$relative)
            .on('click', $.proxy(function(e) {
                this.next(settings.navSpeed);
            }, this));

        // create DOM structure for absolute navigation
        if (!settings.dotsData) {
            this._templates = [$('<div>')
                .addClass(settings.dotClass)
                .append($('<span>'))
                .prop('outerHTML')
            ];
        }

        this._controls.$absolute = (settings.dotsContainer ? $(settings.dotsContainer) :
            $('<div>').addClass(settings.dotsClass).appendTo(this.$element)).addClass('disabled');

        this._controls.$absolute.on('click', 'div', $.proxy(function(e) {
            var index = $(e.target).parent().is(this._controls.$absolute) ?
                $(e.target).index() : $(e.target).parent().index();

            e.preventDefault();

            this.to(index, settings.dotsSpeed);
        }, this));

        // override public methods of the carousel
        for (override in this._overrides) {
            this._core[override] = $.proxy(this[override], this);
        }
    };

    /**
     * Destroys the plugin.
     * @protected
     */
    Navigation.prototype.destroy = function() {
        var handler, control, property, override;

        for (handler in this._handlers) {
            this.$element.off(handler, this._handlers[handler]);
        }
        for (control in this._controls) {
            this._controls[control].remove();
        }
        for (override in this.overides) {
            this._core[override] = this._overrides[override];
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };

    /**
     * Updates the internal state.
     * @protected
     */
    Navigation.prototype.update = function() {
        var i, j, k,
            lower = this._core.clones().length / 2,
            upper = lower + this._core.items().length,
            maximum = this._core.maximum(true),
            settings = this._core.settings,
            size = settings.center || settings.autoWidth || settings.dotsData ?
            1 : settings.dotsEach || settings.items;

        if (settings.slideBy !== 'page') {
            settings.slideBy = Math.min(settings.slideBy, settings.items);
        }

        if (settings.dots || settings.slideBy == 'page') {
            this._pages = [];

            for (i = lower, j = 0, k = 0; i < upper; i++) {
                if (j >= size || j === 0) {
                    this._pages.push({
                        start: Math.min(maximum, i - lower),
                        end: i - lower + size - 1
                    });
                    if (Math.min(maximum, i - lower) === maximum) {
                        break;
                    }
                    j = 0, ++k;
                }
                j += this._core.mergers(this._core.relative(i));
            }
        }
    };

    /**
     * Draws the user interface.
     * @todo The option `dotsData` wont work.
     * @protected
     */
    Navigation.prototype.draw = function() {
        var difference,
            settings = this._core.settings,
            disabled = this._core.items().length <= settings.items,
            index = this._core.relative(this._core.current()),
            loop = settings.loop || settings.rewind;

        this._controls.$relative.toggleClass('disabled', !settings.nav || disabled);

        if (settings.nav) {
            this._controls.$previous.toggleClass('disabled', !loop && index <= this._core.minimum(true));
            this._controls.$next.toggleClass('disabled', !loop && index >= this._core.maximum(true));
        }

        this._controls.$absolute.toggleClass('disabled', !settings.dots || disabled);

        if (settings.dots) {
            difference = this._pages.length - this._controls.$absolute.children().length;

            if (settings.dotsData && difference !== 0) {
                this._controls.$absolute.html(this._templates.join(''));
            } else if (difference > 0) {
                this._controls.$absolute.append(new Array(difference + 1).join(this._templates[0]));
            } else if (difference < 0) {
                this._controls.$absolute.children().slice(difference).remove();
            }

            this._controls.$absolute.find('.active').removeClass('active');
            this._controls.$absolute.children().eq($.inArray(this.current(), this._pages)).addClass('active');
        }
    };

    /**
     * Extends event data.
     * @protected
     * @param {Event} event - The event object which gets thrown.
     */
    Navigation.prototype.onTrigger = function(event) {
        var settings = this._core.settings;

        event.page = {
            index: $.inArray(this.current(), this._pages),
            count: this._pages.length,
            size: settings && (settings.center || settings.autoWidth || settings.dotsData ?
                1 : settings.dotsEach || settings.items)
        };
    };

    /**
     * Gets the current page position of the carousel.
     * @protected
     * @returns {Number}
     */
    Navigation.prototype.current = function() {
        var current = this._core.relative(this._core.current());
        return $.grep(this._pages, $.proxy(function(page, index) {
            return page.start <= current && page.end >= current;
        }, this)).pop();
    };

    /**
     * Gets the current succesor/predecessor position.
     * @protected
     * @returns {Number}
     */
    Navigation.prototype.getPosition = function(successor) {
        var position, length,
            settings = this._core.settings;

        if (settings.slideBy == 'page') {
            position = $.inArray(this.current(), this._pages);
            length = this._pages.length;
            successor ? ++position : --position;
            position = this._pages[((position % length) + length) % length].start;
        } else {
            position = this._core.relative(this._core.current());
            length = this._core.items().length;
            successor ? position += settings.slideBy : position -= settings.slideBy;
        }

        return position;
    };

    /**
     * Slides to the next item or page.
     * @public
     * @param {Number} [speed=false] - The time in milliseconds for the transition.
     */
    Navigation.prototype.next = function(speed) {
        $.proxy(this._overrides.to, this._core)(this.getPosition(true), speed);
    };

    /**
     * Slides to the previous item or page.
     * @public
     * @param {Number} [speed=false] - The time in milliseconds for the transition.
     */
    Navigation.prototype.prev = function(speed) {
        $.proxy(this._overrides.to, this._core)(this.getPosition(false), speed);
    };

    /**
     * Slides to the specified item or page.
     * @public
     * @param {Number} position - The position of the item or page.
     * @param {Number} [speed] - The time in milliseconds for the transition.
     * @param {Boolean} [standard=false] - Whether to use the standard behaviour or not.
     */
    Navigation.prototype.to = function(position, speed, standard) {
        var length;

        if (!standard && this._pages.length) {
            length = this._pages.length;
            $.proxy(this._overrides.to, this._core)(this._pages[((position % length) + length) % length].start, speed);
        } else {
            $.proxy(this._overrides.to, this._core)(position, speed);
        }
    };

    $.fn.owlCarousel.Constructor.Plugins.Navigation = Navigation;

})(window.Zepto || window.jQuery, window, document);

/**
 * Hash Plugin
 * @version 2.1.0
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function($, window, document, undefined) {
    'use strict';

    /**
     * Creates the hash plugin.
     * @class The Hash Plugin
     * @param {Owl} carousel - The Owl Carousel
     */
    var Hash = function(carousel) {
        /**
         * Reference to the core.
         * @protected
         * @type {Owl}
         */
        this._core = carousel;

        /**
         * Hash index for the items.
         * @protected
         * @type {Object}
         */
        this._hashes = {};

        /**
         * The carousel element.
         * @type {jQuery}
         */
        this.$element = this._core.$element;

        /**
         * All event handlers.
         * @protected
         * @type {Object}
         */
        this._handlers = {
            'initialized.owl.carousel': $.proxy(function(e) {
                if (e.namespace && this._core.settings.startPosition === 'URLHash') {
                    $(window).trigger('hashchange.owl.navigation');
                }
            }, this),
            'prepared.owl.carousel': $.proxy(function(e) {
                if (e.namespace) {
                    var hash = $(e.content).find('[data-hash]').addBack('[data-hash]').attr('data-hash');

                    if (!hash) {
                        return;
                    }

                    this._hashes[hash] = e.content;
                }
            }, this),
            'changed.owl.carousel': $.proxy(function(e) {
                if (e.namespace && e.property.name === 'position') {
                    var current = this._core.items(this._core.relative(this._core.current())),
                        hash = $.map(this._hashes, function(item, hash) {
                            return item === current ? hash : null;
                        }).join();

                    if (!hash || window.location.hash.slice(1) === hash) {
                        return;
                    }

                    window.location.hash = hash;
                }
            }, this)
        };

        // set default options
        this._core.options = $.extend({}, Hash.Defaults, this._core.options);

        // register the event handlers
        this.$element.on(this._handlers);

        // register event listener for hash navigation
        $(window).on('hashchange.owl.navigation', $.proxy(function(e) {
            var hash = window.location.hash.substring(1),
                items = this._core.$stage.children(),
                position = this._hashes[hash] && items.index(this._hashes[hash]);

            if (position === undefined || position === this._core.current()) {
                return;
            }

            this._core.to(this._core.relative(position), false, true);
        }, this));
    };

    /**
     * Default options.
     * @public
     */
    Hash.Defaults = {
        URLhashListener: false
    };

    /**
     * Destroys the plugin.
     * @public
     */
    Hash.prototype.destroy = function() {
        var handler, property;

        $(window).off('hashchange.owl.navigation');

        for (handler in this._handlers) {
            this._core.$element.off(handler, this._handlers[handler]);
        }
        for (property in Object.getOwnPropertyNames(this)) {
            typeof this[property] != 'function' && (this[property] = null);
        }
    };

    $.fn.owlCarousel.Constructor.Plugins.Hash = Hash;

})(window.Zepto || window.jQuery, window, document);

/**
 * Support Plugin
 *
 * @version 2.1.0
 * @author Vivid Planet Software GmbH
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;
(function($, window, document, undefined) {

    var style = $('<support>').get(0).style,
        prefixes = 'Webkit Moz O ms'.split(' '),
        events = {
            transition: {
                end: {
                    WebkitTransition: 'webkitTransitionEnd',
                    MozTransition: 'transitionend',
                    OTransition: 'oTransitionEnd',
                    transition: 'transitionend'
                }
            },
            animation: {
                end: {
                    WebkitAnimation: 'webkitAnimationEnd',
                    MozAnimation: 'animationend',
                    OAnimation: 'oAnimationEnd',
                    animation: 'animationend'
                }
            }
        },
        tests = {
            csstransforms: function() {
                return !!test('transform');
            },
            csstransforms3d: function() {
                return !!test('perspective');
            },
            csstransitions: function() {
                return !!test('transition');
            },
            cssanimations: function() {
                return !!test('animation');
            }
        };

    function test(property, prefixed) {
        var result = false,
            upper = property.charAt(0).toUpperCase() + property.slice(1);

        $.each((property + ' ' + prefixes.join(upper + ' ') + upper).split(' '), function(i, property) {
            if (style[property] !== undefined) {
                result = prefixed ? property : true;
                return false;
            }
        });

        return result;
    }

    function prefixed(property) {
        return test(property, true);
    }

    if (tests.csstransitions()) {
        /* jshint -W053 */
        $.support.transition = new String(prefixed('transition'))
        $.support.transition.end = events.transition.end[$.support.transition];
    }

    if (tests.cssanimations()) {
        /* jshint -W053 */
        $.support.animation = new String(prefixed('animation'))
        $.support.animation.end = events.animation.end[$.support.animation];
    }

    if (tests.csstransforms()) {
        /* jshint -W053 */
        $.support.transform = new String(prefixed('transform'));
        $.support.transform3d = tests.csstransforms3d();
    }

})(window.Zepto || window.jQuery, window, document);
!function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?exports.AOS=t():e.AOS=t()}(this,function(){return function(e){function t(o){if(n[o])return n[o].exports;var i=n[o]={exports:{},id:o,loaded:!1};return e[o].call(i.exports,i,i.exports,t),i.loaded=!0,i.exports}var n={};return t.m=e,t.c=n,t.p="dist/",t(0)}([function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}var i=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e[o]=n[o])}return e},r=n(1),a=(o(r),n(6)),u=o(a),c=n(7),f=o(c),s=n(8),d=o(s),l=n(9),p=o(l),m=n(10),b=o(m),v=n(11),y=o(v),g=n(14),h=o(g),w=[],k=!1,x={offset:120,delay:0,easing:"ease",duration:400,disable:!1,once:!1,startEvent:"DOMContentLoaded",throttleDelay:99,debounceDelay:50,disableMutationObserver:!1},j=function(){var e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];if(e&&(k=!0),k)return w=(0,y.default)(w,x),(0,b.default)(w,x.once),w},O=function(){w=(0,h.default)(),j()},_=function(){w.forEach(function(e,t){e.node.removeAttribute("data-aos"),e.node.removeAttribute("data-aos-easing"),e.node.removeAttribute("data-aos-duration"),e.node.removeAttribute("data-aos-delay")})},S=function(e){return e===!0||"mobile"===e&&p.default.mobile()||"phone"===e&&p.default.phone()||"tablet"===e&&p.default.tablet()||"function"==typeof e&&e()===!0},z=function(e){x=i(x,e),w=(0,h.default)();var t=document.all&&!window.atob;return S(x.disable)||t?_():(document.querySelector("body").setAttribute("data-aos-easing",x.easing),document.querySelector("body").setAttribute("data-aos-duration",x.duration),document.querySelector("body").setAttribute("data-aos-delay",x.delay),"DOMContentLoaded"===x.startEvent&&["complete","interactive"].indexOf(document.readyState)>-1?j(!0):"load"===x.startEvent?window.addEventListener(x.startEvent,function(){j(!0)}):document.addEventListener(x.startEvent,function(){j(!0)}),window.addEventListener("resize",(0,f.default)(j,x.debounceDelay,!0)),window.addEventListener("orientationchange",(0,f.default)(j,x.debounceDelay,!0)),window.addEventListener("scroll",(0,u.default)(function(){(0,b.default)(w,x.once)},x.throttleDelay)),x.disableMutationObserver||(0,d.default)("[data-aos]",O),w)};e.exports={init:z,refresh:j,refreshHard:O}},function(e,t){},,,,,function(e,t){(function(t){"use strict";function n(e,t,n){function o(t){var n=b,o=v;return b=v=void 0,k=t,g=e.apply(o,n)}function r(e){return k=e,h=setTimeout(s,t),_?o(e):g}function a(e){var n=e-w,o=e-k,i=t-n;return S?j(i,y-o):i}function c(e){var n=e-w,o=e-k;return void 0===w||n>=t||n<0||S&&o>=y}function s(){var e=O();return c(e)?d(e):void(h=setTimeout(s,a(e)))}function d(e){return h=void 0,z&&b?o(e):(b=v=void 0,g)}function l(){void 0!==h&&clearTimeout(h),k=0,b=w=v=h=void 0}function p(){return void 0===h?g:d(O())}function m(){var e=O(),n=c(e);if(b=arguments,v=this,w=e,n){if(void 0===h)return r(w);if(S)return h=setTimeout(s,t),o(w)}return void 0===h&&(h=setTimeout(s,t)),g}var b,v,y,g,h,w,k=0,_=!1,S=!1,z=!0;if("function"!=typeof e)throw new TypeError(f);return t=u(t)||0,i(n)&&(_=!!n.leading,S="maxWait"in n,y=S?x(u(n.maxWait)||0,t):y,z="trailing"in n?!!n.trailing:z),m.cancel=l,m.flush=p,m}function o(e,t,o){var r=!0,a=!0;if("function"!=typeof e)throw new TypeError(f);return i(o)&&(r="leading"in o?!!o.leading:r,a="trailing"in o?!!o.trailing:a),n(e,t,{leading:r,maxWait:t,trailing:a})}function i(e){var t="undefined"==typeof e?"undefined":c(e);return!!e&&("object"==t||"function"==t)}function r(e){return!!e&&"object"==("undefined"==typeof e?"undefined":c(e))}function a(e){return"symbol"==("undefined"==typeof e?"undefined":c(e))||r(e)&&k.call(e)==d}function u(e){if("number"==typeof e)return e;if(a(e))return s;if(i(e)){var t="function"==typeof e.valueOf?e.valueOf():e;e=i(t)?t+"":t}if("string"!=typeof e)return 0===e?e:+e;e=e.replace(l,"");var n=m.test(e);return n||b.test(e)?v(e.slice(2),n?2:8):p.test(e)?s:+e}var c="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},f="Expected a function",s=NaN,d="[object Symbol]",l=/^\s+|\s+$/g,p=/^[-+]0x[0-9a-f]+$/i,m=/^0b[01]+$/i,b=/^0o[0-7]+$/i,v=parseInt,y="object"==("undefined"==typeof t?"undefined":c(t))&&t&&t.Object===Object&&t,g="object"==("undefined"==typeof self?"undefined":c(self))&&self&&self.Object===Object&&self,h=y||g||Function("return this")(),w=Object.prototype,k=w.toString,x=Math.max,j=Math.min,O=function(){return h.Date.now()};e.exports=o}).call(t,function(){return this}())},function(e,t){(function(t){"use strict";function n(e,t,n){function i(t){var n=b,o=v;return b=v=void 0,O=t,g=e.apply(o,n)}function r(e){return O=e,h=setTimeout(s,t),_?i(e):g}function u(e){var n=e-w,o=e-O,i=t-n;return S?x(i,y-o):i}function f(e){var n=e-w,o=e-O;return void 0===w||n>=t||n<0||S&&o>=y}function s(){var e=j();return f(e)?d(e):void(h=setTimeout(s,u(e)))}function d(e){return h=void 0,z&&b?i(e):(b=v=void 0,g)}function l(){void 0!==h&&clearTimeout(h),O=0,b=w=v=h=void 0}function p(){return void 0===h?g:d(j())}function m(){var e=j(),n=f(e);if(b=arguments,v=this,w=e,n){if(void 0===h)return r(w);if(S)return h=setTimeout(s,t),i(w)}return void 0===h&&(h=setTimeout(s,t)),g}var b,v,y,g,h,w,O=0,_=!1,S=!1,z=!0;if("function"!=typeof e)throw new TypeError(c);return t=a(t)||0,o(n)&&(_=!!n.leading,S="maxWait"in n,y=S?k(a(n.maxWait)||0,t):y,z="trailing"in n?!!n.trailing:z),m.cancel=l,m.flush=p,m}function o(e){var t="undefined"==typeof e?"undefined":u(e);return!!e&&("object"==t||"function"==t)}function i(e){return!!e&&"object"==("undefined"==typeof e?"undefined":u(e))}function r(e){return"symbol"==("undefined"==typeof e?"undefined":u(e))||i(e)&&w.call(e)==s}function a(e){if("number"==typeof e)return e;if(r(e))return f;if(o(e)){var t="function"==typeof e.valueOf?e.valueOf():e;e=o(t)?t+"":t}if("string"!=typeof e)return 0===e?e:+e;e=e.replace(d,"");var n=p.test(e);return n||m.test(e)?b(e.slice(2),n?2:8):l.test(e)?f:+e}var u="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},c="Expected a function",f=NaN,s="[object Symbol]",d=/^\s+|\s+$/g,l=/^[-+]0x[0-9a-f]+$/i,p=/^0b[01]+$/i,m=/^0o[0-7]+$/i,b=parseInt,v="object"==("undefined"==typeof t?"undefined":u(t))&&t&&t.Object===Object&&t,y="object"==("undefined"==typeof self?"undefined":u(self))&&self&&self.Object===Object&&self,g=v||y||Function("return this")(),h=Object.prototype,w=h.toString,k=Math.max,x=Math.min,j=function(){return g.Date.now()};e.exports=n}).call(t,function(){return this}())},function(e,t){"use strict";function n(e,t){var n=window.document,r=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver,a=new r(o);i=t,a.observe(n.documentElement,{childList:!0,subtree:!0,removedNodes:!0})}function o(e){e&&e.forEach(function(e){var t=Array.prototype.slice.call(e.addedNodes),n=Array.prototype.slice.call(e.removedNodes),o=t.concat(n).filter(function(e){return e.hasAttribute&&e.hasAttribute("data-aos")}).length;o&&i()})}Object.defineProperty(t,"__esModule",{value:!0});var i=function(){};t.default=n},function(e,t){"use strict";function n(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(){return navigator.userAgent||navigator.vendor||window.opera||""}Object.defineProperty(t,"__esModule",{value:!0});var i=function(){function e(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}return function(t,n,o){return n&&e(t.prototype,n),o&&e(t,o),t}}(),r=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i,a=/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,u=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i,c=/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,f=function(){function e(){n(this,e)}return i(e,[{key:"phone",value:function(){var e=o();return!(!r.test(e)&&!a.test(e.substr(0,4)))}},{key:"mobile",value:function(){var e=o();return!(!u.test(e)&&!c.test(e.substr(0,4)))}},{key:"tablet",value:function(){return this.mobile()&&!this.phone()}}]),e}();t.default=new f},function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=function(e,t,n){var o=e.node.getAttribute("data-aos-once");t>e.position?e.node.classList.add("aos-animate"):"undefined"!=typeof o&&("false"===o||!n&&"true"!==o)&&e.node.classList.remove("aos-animate")},o=function(e,t){var o=window.pageYOffset,i=window.innerHeight;e.forEach(function(e,r){n(e,i+o,t)})};t.default=o},function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var i=n(12),r=o(i),a=function(e,t){return e.forEach(function(e,n){e.node.classList.add("aos-init"),e.position=(0,r.default)(e.node,t.offset)}),e};t.default=a},function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var i=n(13),r=o(i),a=function(e,t){var n=0,o=0,i=window.innerHeight,a={offset:e.getAttribute("data-aos-offset"),anchor:e.getAttribute("data-aos-anchor"),anchorPlacement:e.getAttribute("data-aos-anchor-placement")};switch(a.offset&&!isNaN(a.offset)&&(o=parseInt(a.offset)),a.anchor&&document.querySelectorAll(a.anchor)&&(e=document.querySelectorAll(a.anchor)[0]),n=(0,r.default)(e).top,a.anchorPlacement){case"top-bottom":break;case"center-bottom":n+=e.offsetHeight/2;break;case"bottom-bottom":n+=e.offsetHeight;break;case"top-center":n+=i/2;break;case"bottom-center":n+=i/2+e.offsetHeight;break;case"center-center":n+=i/2+e.offsetHeight/2;break;case"top-top":n+=i;break;case"bottom-top":n+=e.offsetHeight+i;break;case"center-top":n+=e.offsetHeight/2+i}return a.anchorPlacement||a.offset||isNaN(t)||(o=t),n+o};t.default=a},function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=function(e){for(var t=0,n=0;e&&!isNaN(e.offsetLeft)&&!isNaN(e.offsetTop);)t+=e.offsetLeft-("BODY"!=e.tagName?e.scrollLeft:0),n+=e.offsetTop-("BODY"!=e.tagName?e.scrollTop:0),e=e.offsetParent;return{top:n,left:t}};t.default=n},function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=function(e){return e=e||document.querySelectorAll("[data-aos]"),Array.prototype.map.call(e,function(e){return{node:e}})};t.default=n}])});
/*!
 * The Final Countdown for jQuery v2.2.0 (http://hilios.github.io/jQuery.countdown/)
 * Copyright (c) 2016 Edson Hilios
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){"use strict";function b(a){if(a instanceof Date)return a;if(String(a).match(g))return String(a).match(/^[0-9]*$/)&&(a=Number(a)),String(a).match(/\-/)&&(a=String(a).replace(/\-/g,"/")),new Date(a);throw new Error("Couldn't cast `"+a+"` to a date object.")}function c(a){var b=a.toString().replace(/([.?*+^$[\]\\(){}|-])/g,"\\$1");return new RegExp(b)}function d(a){return function(b){var d=b.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);if(d)for(var f=0,g=d.length;f<g;++f){var h=d[f].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),j=c(h[0]),k=h[1]||"",l=h[3]||"",m=null;h=h[2],i.hasOwnProperty(h)&&(m=i[h],m=Number(a[m])),null!==m&&("!"===k&&(m=e(l,m)),""===k&&m<10&&(m="0"+m.toString()),b=b.replace(j,m.toString()))}return b=b.replace(/%%/,"%")}}function e(a,b){var c="s",d="";return a&&(a=a.replace(/(:|;|\s)/gi,"").split(/\,/),1===a.length?c=a[0]:(d=a[0],c=a[1])),Math.abs(b)>1?c:d}var f=[],g=[],h={precision:100,elapse:!1,defer:!1};g.push(/^[0-9]*$/.source),g.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source),g.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source),g=new RegExp(g.join("|"));var i={Y:"years",m:"months",n:"daysToMonth",d:"daysToWeek",w:"weeks",W:"weeksToMonth",H:"hours",M:"minutes",S:"seconds",D:"totalDays",I:"totalHours",N:"totalMinutes",T:"totalSeconds"},j=function(b,c,d){this.el=b,this.$el=a(b),this.interval=null,this.offset={},this.options=a.extend({},h),this.firstTick=!0,this.instanceNumber=f.length,f.push(this),this.$el.data("countdown-instance",this.instanceNumber),d&&("function"==typeof d?(this.$el.on("update.countdown",d),this.$el.on("stoped.countdown",d),this.$el.on("finish.countdown",d)):this.options=a.extend({},h,d)),this.setFinalDate(c),this.options.defer===!1&&this.start()};a.extend(j.prototype,{start:function(){null!==this.interval&&clearInterval(this.interval);var a=this;this.update(),this.interval=setInterval(function(){a.update.call(a)},this.options.precision)},stop:function(){clearInterval(this.interval),this.interval=null,this.dispatchEvent("stoped")},toggle:function(){this.interval?this.stop():this.start()},pause:function(){this.stop()},resume:function(){this.start()},remove:function(){this.stop.call(this),f[this.instanceNumber]=null,delete this.$el.data().countdownInstance},setFinalDate:function(a){this.finalDate=b(a)},update:function(){if(0===this.$el.closest("html").length)return void this.remove();var a,b=new Date;return a=this.finalDate.getTime()-b.getTime(),a=Math.ceil(a/1e3),a=!this.options.elapse&&a<0?0:Math.abs(a),this.totalSecsLeft===a||this.firstTick?void(this.firstTick=!1):(this.totalSecsLeft=a,this.elapsed=b>=this.finalDate,this.offset={seconds:this.totalSecsLeft%60,minutes:Math.floor(this.totalSecsLeft/60)%60,hours:Math.floor(this.totalSecsLeft/60/60)%24,days:Math.floor(this.totalSecsLeft/60/60/24)%7,daysToWeek:Math.floor(this.totalSecsLeft/60/60/24)%7,daysToMonth:Math.floor(this.totalSecsLeft/60/60/24%30.4368),weeks:Math.floor(this.totalSecsLeft/60/60/24/7),weeksToMonth:Math.floor(this.totalSecsLeft/60/60/24/7)%4,months:Math.floor(this.totalSecsLeft/60/60/24/30.4368),years:Math.abs(this.finalDate.getFullYear()-b.getFullYear()),totalDays:Math.floor(this.totalSecsLeft/60/60/24),totalHours:Math.floor(this.totalSecsLeft/60/60),totalMinutes:Math.floor(this.totalSecsLeft/60),totalSeconds:this.totalSecsLeft},void(this.options.elapse||0!==this.totalSecsLeft?this.dispatchEvent("update"):(this.stop(),this.dispatchEvent("finish"))))},dispatchEvent:function(b){var c=a.Event(b+".countdown");c.finalDate=this.finalDate,c.elapsed=this.elapsed,c.offset=a.extend({},this.offset),c.strftime=d(this.offset),this.$el.trigger(c)}}),a.fn.countdown=function(){var b=Array.prototype.slice.call(arguments,0);return this.each(function(){var c=a(this).data("countdown-instance");if(void 0!==c){var d=f[c],e=b[0];j.prototype.hasOwnProperty(e)?d[e].apply(d,b.slice(1)):null===String(e).match(/^[$A-Z_][0-9A-Z_$]*$/i)?(d.setFinalDate.call(d,e),d.start()):a.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi,e))}else new j(this,b[0],b[1])})}});
/*! lightslider - v1.1.6 - 2016-10-25
* https://github.com/sachinchoolur/lightslider
* Copyright (c) 2016 Sachin N; Licensed MIT */
!function(a,b){"use strict";var c={item:3,autoWidth:!1,slideMove:1,slideMargin:10,addClass:"",mode:"slide",useCSS:!0,cssEasing:"ease",easing:"linear",speed:400,auto:!1,pauseOnHover:!1,loop:!1,slideEndAnimation:!0,pause:2e3,keyPress:!1,controls:!0,prevHtml:"",nextHtml:"",rtl:!1,adaptiveHeight:!1,vertical:!1,verticalHeight:500,vThumbWidth:100,thumbItem:10,pager:!0,gallery:!1,galleryMargin:5,thumbMargin:5,currentPagerPosition:"middle",enableTouch:!0,enableDrag:!0,freeMove:!0,swipeThreshold:40,responsive:[],onBeforeStart:function(a){},onSliderLoad:function(a){},onBeforeSlide:function(a,b){},onAfterSlide:function(a,b){},onBeforeNextSlide:function(a,b){},onBeforePrevSlide:function(a,b){}};a.fn.lightSlider=function(b){if(0===this.length)return this;if(this.length>1)return this.each(function(){a(this).lightSlider(b)}),this;var d={},e=a.extend(!0,{},c,b),f={},g=this;d.$el=this,"fade"===e.mode&&(e.vertical=!1);var h=g.children(),i=a(window).width(),j=null,k=null,l=0,m=0,n=!1,o=0,p="",q=0,r=e.vertical===!0?"height":"width",s=e.vertical===!0?"margin-bottom":"margin-right",t=0,u=0,v=0,w=0,x=null,y="ontouchstart"in document.documentElement,z={};return z.chbreakpoint=function(){if(i=a(window).width(),e.responsive.length){var b;if(e.autoWidth===!1&&(b=e.item),i<e.responsive[0].breakpoint)for(var c=0;c<e.responsive.length;c++)i<e.responsive[c].breakpoint&&(j=e.responsive[c].breakpoint,k=e.responsive[c]);if("undefined"!=typeof k&&null!==k)for(var d in k.settings)k.settings.hasOwnProperty(d)&&(("undefined"==typeof f[d]||null===f[d])&&(f[d]=e[d]),e[d]=k.settings[d]);if(!a.isEmptyObject(f)&&i>e.responsive[0].breakpoint)for(var g in f)f.hasOwnProperty(g)&&(e[g]=f[g]);e.autoWidth===!1&&t>0&&v>0&&b!==e.item&&(q=Math.round(t/((v+e.slideMargin)*e.slideMove)))}},z.calSW=function(){e.autoWidth===!1&&(v=(o-(e.item*e.slideMargin-e.slideMargin))/e.item)},z.calWidth=function(a){var b=a===!0?p.find(".lslide").length:h.length;if(e.autoWidth===!1)m=b*(v+e.slideMargin);else{m=0;for(var c=0;b>c;c++)m+=parseInt(h.eq(c).width())+e.slideMargin}return m},d={doCss:function(){var a=function(){for(var a=["transition","MozTransition","WebkitTransition","OTransition","msTransition","KhtmlTransition"],b=document.documentElement,c=0;c<a.length;c++)if(a[c]in b.style)return!0};return e.useCSS&&a()?!0:!1},keyPress:function(){e.keyPress&&a(document).on("keyup.lightslider",function(b){a(":focus").is("input, textarea")||(b.preventDefault?b.preventDefault():b.returnValue=!1,37===b.keyCode?g.goToPrevSlide():39===b.keyCode&&g.goToNextSlide())})},controls:function(){e.controls&&(g.after('<div class="lSAction"><a class="lSPrev">'+e.prevHtml+'</a><a class="lSNext">'+e.nextHtml+"</a></div>"),e.autoWidth?z.calWidth(!1)<o&&p.find(".lSAction").hide():l<=e.item&&p.find(".lSAction").hide(),p.find(".lSAction a").on("click",function(b){return b.preventDefault?b.preventDefault():b.returnValue=!1,"lSPrev"===a(this).attr("class")?g.goToPrevSlide():g.goToNextSlide(),!1}))},initialStyle:function(){var a=this;"fade"===e.mode&&(e.autoWidth=!1,e.slideEndAnimation=!1),e.auto&&(e.slideEndAnimation=!1),e.autoWidth&&(e.slideMove=1,e.item=1),e.loop&&(e.slideMove=1,e.freeMove=!1),e.onBeforeStart.call(this,g),z.chbreakpoint(),g.addClass("lightSlider").wrap('<div class="lSSlideOuter '+e.addClass+'"><div class="lSSlideWrapper"></div></div>'),p=g.parent(".lSSlideWrapper"),e.rtl===!0&&p.parent().addClass("lSrtl"),e.vertical?(p.parent().addClass("vertical"),o=e.verticalHeight,p.css("height",o+"px")):o=g.outerWidth(),h.addClass("lslide"),e.loop===!0&&"slide"===e.mode&&(z.calSW(),z.clone=function(){if(z.calWidth(!0)>o){for(var b=0,c=0,d=0;d<h.length&&(b+=parseInt(g.find(".lslide").eq(d).width())+e.slideMargin,c++,!(b>=o+e.slideMargin));d++);var f=e.autoWidth===!0?c:e.item;if(f<g.find(".clone.left").length)for(var i=0;i<g.find(".clone.left").length-f;i++)h.eq(i).remove();if(f<g.find(".clone.right").length)for(var j=h.length-1;j>h.length-1-g.find(".clone.right").length;j--)q--,h.eq(j).remove();for(var k=g.find(".clone.right").length;f>k;k++)g.find(".lslide").eq(k).clone().removeClass("lslide").addClass("clone right").appendTo(g),q++;for(var l=g.find(".lslide").length-g.find(".clone.left").length;l>g.find(".lslide").length-f;l--)g.find(".lslide").eq(l-1).clone().removeClass("lslide").addClass("clone left").prependTo(g);h=g.children()}else h.hasClass("clone")&&(g.find(".clone").remove(),a.move(g,0))},z.clone()),z.sSW=function(){l=h.length,e.rtl===!0&&e.vertical===!1&&(s="margin-left"),e.autoWidth===!1&&h.css(r,v+"px"),h.css(s,e.slideMargin+"px"),m=z.calWidth(!1),g.css(r,m+"px"),e.loop===!0&&"slide"===e.mode&&n===!1&&(q=g.find(".clone.left").length)},z.calL=function(){h=g.children(),l=h.length},this.doCss()&&p.addClass("usingCss"),z.calL(),"slide"===e.mode?(z.calSW(),z.sSW(),e.loop===!0&&(t=a.slideValue(),this.move(g,t)),e.vertical===!1&&this.setHeight(g,!1)):(this.setHeight(g,!0),g.addClass("lSFade"),this.doCss()||(h.fadeOut(0),h.eq(q).fadeIn(0))),e.loop===!0&&"slide"===e.mode?h.eq(q).addClass("active"):h.first().addClass("active")},pager:function(){var a=this;if(z.createPager=function(){w=(o-(e.thumbItem*e.thumbMargin-e.thumbMargin))/e.thumbItem;var b=p.find(".lslide"),c=p.find(".lslide").length,d=0,f="",h=0;for(d=0;c>d;d++){"slide"===e.mode&&(e.autoWidth?h+=(parseInt(b.eq(d).width())+e.slideMargin)*e.slideMove:h=d*(v+e.slideMargin)*e.slideMove);var i=b.eq(d*e.slideMove).attr("data-thumb");if(f+=e.gallery===!0?'<li style="width:100%;'+r+":"+w+"px;"+s+":"+e.thumbMargin+'px"><a href="#"><img src="'+i+'" /></a></li>':'<li><a href="#">'+(d+1)+"</a></li>","slide"===e.mode&&h>=m-o-e.slideMargin){d+=1;var j=2;e.autoWidth&&(f+='<li><a href="#">'+(d+1)+"</a></li>",j=1),j>d?(f=null,p.parent().addClass("noPager")):p.parent().removeClass("noPager");break}}var k=p.parent();k.find(".lSPager").html(f),e.gallery===!0&&(e.vertical===!0&&k.find(".lSPager").css("width",e.vThumbWidth+"px"),u=d*(e.thumbMargin+w)+.5,k.find(".lSPager").css({property:u+"px","transition-duration":e.speed+"ms"}),e.vertical===!0&&p.parent().css("padding-right",e.vThumbWidth+e.galleryMargin+"px"),k.find(".lSPager").css(r,u+"px"));var l=k.find(".lSPager").find("li");l.first().addClass("active"),l.on("click",function(){return e.loop===!0&&"slide"===e.mode?q+=l.index(this)-k.find(".lSPager").find("li.active").index():q=l.index(this),g.mode(!1),e.gallery===!0&&a.slideThumb(),!1})},e.pager){var b="lSpg";e.gallery&&(b="lSGallery"),p.after('<ul class="lSPager '+b+'"></ul>');var c=e.vertical?"margin-left":"margin-top";p.parent().find(".lSPager").css(c,e.galleryMargin+"px"),z.createPager()}setTimeout(function(){z.init()},0)},setHeight:function(a,b){var c=null,d=this;c=e.loop?a.children(".lslide ").first():a.children().first();var f=function(){var d=c.outerHeight(),e=0,f=d;b&&(d=0,e=100*f/o),a.css({height:d+"px","padding-bottom":e+"%"})};f(),c.find("img").length?c.find("img")[0].complete?(f(),x||d.auto()):c.find("img").on("load",function(){setTimeout(function(){f(),x||d.auto()},100)}):x||d.auto()},active:function(a,b){this.doCss()&&"fade"===e.mode&&p.addClass("on");var c=0;if(q*e.slideMove<l){a.removeClass("active"),this.doCss()||"fade"!==e.mode||b!==!1||a.fadeOut(e.speed),c=b===!0?q:q*e.slideMove;var d,f;b===!0&&(d=a.length,f=d-1,c+1>=d&&(c=f)),e.loop===!0&&"slide"===e.mode&&(c=b===!0?q-g.find(".clone.left").length:q*e.slideMove,b===!0&&(d=a.length,f=d-1,c+1===d?c=f:c+1>d&&(c=0))),this.doCss()||"fade"!==e.mode||b!==!1||a.eq(c).fadeIn(e.speed),a.eq(c).addClass("active")}else a.removeClass("active"),a.eq(a.length-1).addClass("active"),this.doCss()||"fade"!==e.mode||b!==!1||(a.fadeOut(e.speed),a.eq(c).fadeIn(e.speed))},move:function(a,b){e.rtl===!0&&(b=-b),this.doCss()?a.css(e.vertical===!0?{transform:"translate3d(0px, "+-b+"px, 0px)","-webkit-transform":"translate3d(0px, "+-b+"px, 0px)"}:{transform:"translate3d("+-b+"px, 0px, 0px)","-webkit-transform":"translate3d("+-b+"px, 0px, 0px)"}):e.vertical===!0?a.css("position","relative").animate({top:-b+"px"},e.speed,e.easing):a.css("position","relative").animate({left:-b+"px"},e.speed,e.easing);var c=p.parent().find(".lSPager").find("li");this.active(c,!0)},fade:function(){this.active(h,!1);var a=p.parent().find(".lSPager").find("li");this.active(a,!0)},slide:function(){var a=this;z.calSlide=function(){m>o&&(t=a.slideValue(),a.active(h,!1),t>m-o-e.slideMargin?t=m-o-e.slideMargin:0>t&&(t=0),a.move(g,t),e.loop===!0&&"slide"===e.mode&&(q>=l-g.find(".clone.left").length/e.slideMove&&a.resetSlide(g.find(".clone.left").length),0===q&&a.resetSlide(p.find(".lslide").length)))},z.calSlide()},resetSlide:function(a){var b=this;p.find(".lSAction a").addClass("disabled"),setTimeout(function(){q=a,p.css("transition-duration","0ms"),t=b.slideValue(),b.active(h,!1),d.move(g,t),setTimeout(function(){p.css("transition-duration",e.speed+"ms"),p.find(".lSAction a").removeClass("disabled")},50)},e.speed+100)},slideValue:function(){var a=0;if(e.autoWidth===!1)a=q*(v+e.slideMargin)*e.slideMove;else{a=0;for(var b=0;q>b;b++)a+=parseInt(h.eq(b).width())+e.slideMargin}return a},slideThumb:function(){var a;switch(e.currentPagerPosition){case"left":a=0;break;case"middle":a=o/2-w/2;break;case"right":a=o-w}var b=q-g.find(".clone.left").length,c=p.parent().find(".lSPager");"slide"===e.mode&&e.loop===!0&&(b>=c.children().length?b=0:0>b&&(b=c.children().length));var d=b*(w+e.thumbMargin)-a;d+o>u&&(d=u-o-e.thumbMargin),0>d&&(d=0),this.move(c,d)},auto:function(){e.auto&&(clearInterval(x),x=setInterval(function(){g.goToNextSlide()},e.pause))},pauseOnHover:function(){var b=this;e.auto&&e.pauseOnHover&&(p.on("mouseenter",function(){a(this).addClass("ls-hover"),g.pause(),e.auto=!0}),p.on("mouseleave",function(){a(this).removeClass("ls-hover"),p.find(".lightSlider").hasClass("lsGrabbing")||b.auto()}))},touchMove:function(a,b){if(p.css("transition-duration","0ms"),"slide"===e.mode){var c=a-b,d=t-c;if(d>=m-o-e.slideMargin)if(e.freeMove===!1)d=m-o-e.slideMargin;else{var f=m-o-e.slideMargin;d=f+(d-f)/5}else 0>d&&(e.freeMove===!1?d=0:d/=5);this.move(g,d)}},touchEnd:function(a){if(p.css("transition-duration",e.speed+"ms"),"slide"===e.mode){var b=!1,c=!0;t-=a,t>m-o-e.slideMargin?(t=m-o-e.slideMargin,e.autoWidth===!1&&(b=!0)):0>t&&(t=0);var d=function(a){var c=0;if(b||a&&(c=1),e.autoWidth)for(var d=0,f=0;f<h.length&&(d+=parseInt(h.eq(f).width())+e.slideMargin,q=f+c,!(d>=t));f++);else{var g=t/((v+e.slideMargin)*e.slideMove);q=parseInt(g)+c,t>=m-o-e.slideMargin&&g%1!==0&&q++}};a>=e.swipeThreshold?(d(!1),c=!1):a<=-e.swipeThreshold&&(d(!0),c=!1),g.mode(c),this.slideThumb()}else a>=e.swipeThreshold?g.goToPrevSlide():a<=-e.swipeThreshold&&g.goToNextSlide()},enableDrag:function(){var b=this;if(!y){var c=0,d=0,f=!1;p.find(".lightSlider").addClass("lsGrab"),p.on("mousedown",function(b){return o>m&&0!==m?!1:void("lSPrev"!==a(b.target).attr("class")&&"lSNext"!==a(b.target).attr("class")&&(c=e.vertical===!0?b.pageY:b.pageX,f=!0,b.preventDefault?b.preventDefault():b.returnValue=!1,p.scrollLeft+=1,p.scrollLeft-=1,p.find(".lightSlider").removeClass("lsGrab").addClass("lsGrabbing"),clearInterval(x)))}),a(window).on("mousemove",function(a){f&&(d=e.vertical===!0?a.pageY:a.pageX,b.touchMove(d,c))}),a(window).on("mouseup",function(g){if(f){p.find(".lightSlider").removeClass("lsGrabbing").addClass("lsGrab"),f=!1,d=e.vertical===!0?g.pageY:g.pageX;var h=d-c;Math.abs(h)>=e.swipeThreshold&&a(window).on("click.ls",function(b){b.preventDefault?b.preventDefault():b.returnValue=!1,b.stopImmediatePropagation(),b.stopPropagation(),a(window).off("click.ls")}),b.touchEnd(h)}})}},enableTouch:function(){var a=this;if(y){var b={},c={};p.on("touchstart",function(a){c=a.originalEvent.targetTouches[0],b.pageX=a.originalEvent.targetTouches[0].pageX,b.pageY=a.originalEvent.targetTouches[0].pageY,clearInterval(x)}),p.on("touchmove",function(d){if(o>m&&0!==m)return!1;var f=d.originalEvent;c=f.targetTouches[0];var g=Math.abs(c.pageX-b.pageX),h=Math.abs(c.pageY-b.pageY);e.vertical===!0?(3*h>g&&d.preventDefault(),a.touchMove(c.pageY,b.pageY)):(3*g>h&&d.preventDefault(),a.touchMove(c.pageX,b.pageX))}),p.on("touchend",function(){if(o>m&&0!==m)return!1;var d;d=e.vertical===!0?c.pageY-b.pageY:c.pageX-b.pageX,a.touchEnd(d)})}},build:function(){var b=this;b.initialStyle(),this.doCss()&&(e.enableTouch===!0&&b.enableTouch(),e.enableDrag===!0&&b.enableDrag()),a(window).on("focus",function(){b.auto()}),a(window).on("blur",function(){clearInterval(x)}),b.pager(),b.pauseOnHover(),b.controls(),b.keyPress()}},d.build(),z.init=function(){z.chbreakpoint(),e.vertical===!0?(o=e.item>1?e.verticalHeight:h.outerHeight(),p.css("height",o+"px")):o=p.outerWidth(),e.loop===!0&&"slide"===e.mode&&z.clone(),z.calL(),"slide"===e.mode&&g.removeClass("lSSlide"),"slide"===e.mode&&(z.calSW(),z.sSW()),setTimeout(function(){"slide"===e.mode&&g.addClass("lSSlide")},1e3),e.pager&&z.createPager(),e.adaptiveHeight===!0&&e.vertical===!1&&g.css("height",h.eq(q).outerHeight(!0)),e.adaptiveHeight===!1&&("slide"===e.mode?e.vertical===!1?d.setHeight(g,!1):d.auto():d.setHeight(g,!0)),e.gallery===!0&&d.slideThumb(),"slide"===e.mode&&d.slide(),e.autoWidth===!1?h.length<=e.item?p.find(".lSAction").hide():p.find(".lSAction").show():z.calWidth(!1)<o&&0!==m?p.find(".lSAction").hide():p.find(".lSAction").show()},g.goToPrevSlide=function(){if(q>0)e.onBeforePrevSlide.call(this,g,q),q--,g.mode(!1),e.gallery===!0&&d.slideThumb();else if(e.loop===!0){if(e.onBeforePrevSlide.call(this,g,q),"fade"===e.mode){var a=l-1;q=parseInt(a/e.slideMove)}g.mode(!1),e.gallery===!0&&d.slideThumb()}else e.slideEndAnimation===!0&&(g.addClass("leftEnd"),setTimeout(function(){g.removeClass("leftEnd")},400))},g.goToNextSlide=function(){var a=!0;if("slide"===e.mode){var b=d.slideValue();a=b<m-o-e.slideMargin}q*e.slideMove<l-e.slideMove&&a?(e.onBeforeNextSlide.call(this,g,q),q++,g.mode(!1),e.gallery===!0&&d.slideThumb()):e.loop===!0?(e.onBeforeNextSlide.call(this,g,q),q=0,g.mode(!1),e.gallery===!0&&d.slideThumb()):e.slideEndAnimation===!0&&(g.addClass("rightEnd"),setTimeout(function(){g.removeClass("rightEnd")},400))},g.mode=function(a){e.adaptiveHeight===!0&&e.vertical===!1&&g.css("height",h.eq(q).outerHeight(!0)),n===!1&&("slide"===e.mode?d.doCss()&&(g.addClass("lSSlide"),""!==e.speed&&p.css("transition-duration",e.speed+"ms"),""!==e.cssEasing&&p.css("transition-timing-function",e.cssEasing)):d.doCss()&&(""!==e.speed&&g.css("transition-duration",e.speed+"ms"),""!==e.cssEasing&&g.css("transition-timing-function",e.cssEasing))),a||e.onBeforeSlide.call(this,g,q),"slide"===e.mode?d.slide():d.fade(),p.hasClass("ls-hover")||d.auto(),setTimeout(function(){a||e.onAfterSlide.call(this,g,q)},e.speed),n=!0},g.play=function(){g.goToNextSlide(),e.auto=!0,d.auto()},g.pause=function(){e.auto=!1,clearInterval(x)},g.refresh=function(){z.init()},g.getCurrentSlideCount=function(){var a=q;if(e.loop){var b=p.find(".lslide").length,c=g.find(".clone.left").length;a=c-1>=q?b+(q-c):q>=b+c?q-b-c:q-c}return a+1},g.getTotalSlideCount=function(){return p.find(".lslide").length},g.goToSlide=function(a){q=e.loop?a+g.find(".clone.left").length-1:a,g.mode(!1),e.gallery===!0&&d.slideThumb()},g.destroy=function(){g.lightSlider&&(g.goToPrevSlide=function(){},g.goToNextSlide=function(){},g.mode=function(){},g.play=function(){},g.pause=function(){},g.refresh=function(){},g.getCurrentSlideCount=function(){},g.getTotalSlideCount=function(){},g.goToSlide=function(){},g.lightSlider=null,z={init:function(){}},g.parent().parent().find(".lSAction, .lSPager").remove(),g.removeClass("lightSlider lSFade lSSlide lsGrab lsGrabbing leftEnd right").removeAttr("style").unwrap().unwrap(),g.children().removeAttr("style"),h.removeClass("lslide active"),g.find(".clone").remove(),h=null,x=null,n=!1,q=0)},setTimeout(function(){e.onSliderLoad.call(this,g)},10),a(window).on("resize orientationchange",function(a){setTimeout(function(){a.preventDefault?a.preventDefault():a.returnValue=!1,z.init()},200)}),this}}(jQuery);
/*!
 * simpleParallax.min - simpleParallax is a simple JavaScript library that gives your website parallax animations on any images or videos, 
 * @date: 09-06-2020 12:9:37, 
 * @version: 5.5.1,
 * @link: https://simpleparallax.com/
 */
!function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e():"function"==typeof define&&define.amd?define("simpleParallax",[],e):"object"==typeof exports?exports.simpleParallax=e():t.simpleParallax=e()}(window,(function(){return function(t){var e={};function n(i){if(e[i])return e[i].exports;var o=e[i]={i:i,l:!1,exports:{}};return t[i].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=t,n.c=e,n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)n.d(i,o,function(e){return t[e]}.bind(null,o));return i},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=0)}([function(t,e,n){"use strict";n.r(e),n.d(e,"default",(function(){return x}));var i=function(){return Element.prototype.closest&&"IntersectionObserver"in window};function o(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var s=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.positions={top:0,bottom:0,height:0}}var e,n,i;return e=t,(n=[{key:"setViewportTop",value:function(t){return this.positions.top=t?t.scrollTop:window.pageYOffset,this.positions}},{key:"setViewportBottom",value:function(){return this.positions.bottom=this.positions.top+this.positions.height,this.positions}},{key:"setViewportAll",value:function(t){return this.positions.top=t?t.scrollTop:window.pageYOffset,this.positions.height=t?t.clientHeight:document.documentElement.clientHeight,this.positions.bottom=this.positions.top+this.positions.height,this.positions}}])&&o(e.prototype,n),i&&o(e,i),t}()),r=function(t){return NodeList.prototype.isPrototypeOf(t)||HTMLCollection.prototype.isPrototypeOf(t)?Array.from(t):"string"==typeof t||t instanceof String?document.querySelectorAll(t):[t]},a=function(){for(var t,e="transform webkitTransform mozTransform oTransform msTransform".split(" "),n=0;void 0===t;)t=void 0!==document.createElement("div").style[e[n]]?e[n]:void 0,n+=1;return t}(),l=function(t){return"video"===t.tagName.toLowerCase()||!!t&&(!!t.complete&&(void 0===t.naturalWidth||0!==t.naturalWidth))};function u(t){return function(t){if(Array.isArray(t))return c(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return c(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);"Object"===n&&t.constructor&&(n=t.constructor.name);if("Map"===n||"Set"===n)return Array.from(t);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return c(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function c(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,i=new Array(e);n<e;n++)i[n]=t[n];return i}function h(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var f=function(){function t(e,n){var i=this;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.element=e,this.elementContainer=e,this.settings=n,this.isVisible=!0,this.isInit=!1,this.oldTranslateValue=-1,this.init=this.init.bind(this),l(e)?this.init():this.element.addEventListener("load",(function(){setTimeout((function(){i.init(!0)}),50)}))}var e,n,i;return e=t,(n=[{key:"init",value:function(t){var e=this;this.isInit||(t&&(this.rangeMax=null),this.element.closest(".simpleParallax")||(!1===this.settings.overflow&&this.wrapElement(this.element),this.setTransformCSS(),this.getElementOffset(),this.intersectionObserver(),this.getTranslateValue(),this.animate(),this.settings.delay>0&&setTimeout((function(){e.setTransitionCSS()}),10),this.isInit=!0))}},{key:"wrapElement",value:function(){var t=this.settings.customWrapper&&this.element.closest(this.settings.customWrapper),e=this.element.closest("picture")||this.element,n=document.createElement("div");t&&(n=this.element.closest(this.settings.customWrapper)),n.classList.add("simpleParallax"),n.style.overflow="hidden",t||(e.parentNode.insertBefore(n,e),n.appendChild(e)),this.elementContainer=n}},{key:"unWrapElement",value:function(){var t=this.elementContainer;this.settings.customWrapper&&this.element.closest(this.settings.customWrapper)?(t.classList.remove("simpleParallax"),t.style.overflow=""):t.replaceWith.apply(t,u(t.childNodes))}},{key:"setTransformCSS",value:function(){!1===this.settings.overflow&&(this.element.style[a]="scale(".concat(this.settings.scale,")")),this.element.style.willChange="transform"}},{key:"setTransitionCSS",value:function(){this.element.style.transition="transform ".concat(this.settings.delay,"s ").concat(this.settings.transition)}},{key:"unSetStyle",value:function(){this.element.style.willChange="",this.element.style[a]="",this.element.style.transition=""}},{key:"getElementOffset",value:function(){var t=this.elementContainer.getBoundingClientRect();if(this.elementHeight=t.height,this.elementTop=t.top+s.positions.top,this.settings.customContainer){var e=this.settings.customContainer.getBoundingClientRect();this.elementTop=t.top-e.top+s.positions.top}this.elementBottom=this.elementHeight+this.elementTop}},{key:"buildThresholdList",value:function(){for(var t=[],e=1;e<=this.elementHeight;e++){var n=e/this.elementHeight;t.push(n)}return t}},{key:"intersectionObserver",value:function(){var t={root:null,threshold:this.buildThresholdList()};this.observer=new IntersectionObserver(this.intersectionObserverCallback.bind(this),t),this.observer.observe(this.element)}},{key:"intersectionObserverCallback",value:function(t){var e=this;t.forEach((function(t){t.isIntersecting?e.isVisible=!0:e.isVisible=!1}))}},{key:"checkIfVisible",value:function(){return this.elementBottom>s.positions.top&&this.elementTop<s.positions.bottom}},{key:"getRangeMax",value:function(){var t=this.element.clientHeight;this.rangeMax=t*this.settings.scale-t}},{key:"getTranslateValue",value:function(){var t=((s.positions.bottom-this.elementTop)/((s.positions.height+this.elementHeight)/100)).toFixed(1);return t=Math.min(100,Math.max(0,t)),0!==this.settings.maxTransition&&t>this.settings.maxTransition&&(t=this.settings.maxTransition),this.oldPercentage!==t&&(this.rangeMax||this.getRangeMax(),this.translateValue=(t/100*this.rangeMax-this.rangeMax/2).toFixed(0),this.oldTranslateValue!==this.translateValue&&(this.oldPercentage=t,this.oldTranslateValue=this.translateValue,!0))}},{key:"animate",value:function(){var t,e=0,n=0;(this.settings.orientation.includes("left")||this.settings.orientation.includes("right"))&&(n="".concat(this.settings.orientation.includes("left")?-1*this.translateValue:this.translateValue,"px")),(this.settings.orientation.includes("up")||this.settings.orientation.includes("down"))&&(e="".concat(this.settings.orientation.includes("up")?-1*this.translateValue:this.translateValue,"px")),t=!1===this.settings.overflow?"translate3d(".concat(n,", ").concat(e,", 0) scale(").concat(this.settings.scale,")"):"translate3d(".concat(n,", ").concat(e,", 0)"),this.element.style[a]=t}}])&&h(e.prototype,n),i&&h(e,i),t}();function m(t){return function(t){if(Array.isArray(t))return y(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||d(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function p(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){if("undefined"==typeof Symbol||!(Symbol.iterator in Object(t)))return;var n=[],i=!0,o=!1,s=void 0;try{for(var r,a=t[Symbol.iterator]();!(i=(r=a.next()).done)&&(n.push(r.value),!e||n.length!==e);i=!0);}catch(t){o=!0,s=t}finally{try{i||null==a.return||a.return()}finally{if(o)throw s}}return n}(t,e)||d(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function d(t,e){if(t){if("string"==typeof t)return y(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?y(t,e):void 0}}function y(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,i=new Array(e);n<e;n++)i[n]=t[n];return i}function v(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var g,b,w=!1,T=[],x=function(){function t(e,n){if(function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),e&&i()){if(this.elements=r(e),this.defaults={delay:0,orientation:"up",scale:1.3,overflow:!1,transition:"cubic-bezier(0,0,0,1)",customContainer:!1,customWrapper:!1,maxTransition:0},this.settings=Object.assign(this.defaults,n),this.settings.customContainer){var o=p(r(this.settings.customContainer),1);this.customContainer=o[0]}this.lastPosition=-1,this.resizeIsDone=this.resizeIsDone.bind(this),this.refresh=this.refresh.bind(this),this.proceedRequestAnimationFrame=this.proceedRequestAnimationFrame.bind(this),this.init()}}var e,n,o;return e=t,(n=[{key:"init",value:function(){var t=this;s.setViewportAll(this.customContainer),T=[].concat(m(this.elements.map((function(e){return new f(e,t.settings)}))),m(T)),w||(this.proceedRequestAnimationFrame(),window.addEventListener("resize",this.resizeIsDone),w=!0)}},{key:"resizeIsDone",value:function(){clearTimeout(b),b=setTimeout(this.refresh,200)}},{key:"proceedRequestAnimationFrame",value:function(){var t=this;s.setViewportTop(this.customContainer),this.lastPosition!==s.positions.top?(s.setViewportBottom(),T.forEach((function(e){t.proceedElement(e)})),g=window.requestAnimationFrame(this.proceedRequestAnimationFrame),this.lastPosition=s.positions.top):g=window.requestAnimationFrame(this.proceedRequestAnimationFrame)}},{key:"proceedElement",value:function(t){(this.customContainer?t.checkIfVisible():t.isVisible)&&t.getTranslateValue()&&t.animate()}},{key:"refresh",value:function(){s.setViewportAll(this.customContainer),T.forEach((function(t){t.getElementOffset(),t.getRangeMax()})),this.lastPosition=-1}},{key:"destroy",value:function(){var t=this,e=[];T=T.filter((function(n){return t.elements.includes(n.element)?(e.push(n),!1):n})),e.forEach((function(e){e.unSetStyle(),!1===t.settings.overflow&&e.unWrapElement()})),T.length||(window.cancelAnimationFrame(g),window.removeEventListener("resize",this.refresh))}}])&&v(e.prototype,n),o&&v(e,o),t}()}]).default}));
"use strict";var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t};!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"===("undefined"==typeof module?"undefined":_typeof(module))&&module.exports?module.exports=function(i,s){return void 0===s&&(s="undefined"!=typeof window?require("jquery"):require("jquery")(i)),t(s),s}:t(jQuery)}(function(t){return t.fn.tilt=function(i){var s=function(){this.ticking||(requestAnimationFrame(g.bind(this)),this.ticking=!0)},e=function(){var i=this;t(this).on("mousemove",o),t(this).on("mouseenter",a),this.settings.reset&&t(this).on("mouseleave",l),this.settings.glare&&t(window).on("resize",d.bind(i))},n=function(){var i=this;void 0!==this.timeout&&clearTimeout(this.timeout),t(this).css({transition:this.settings.speed+"ms "+this.settings.easing}),this.settings.glare&&this.glareElement.css({transition:"opacity "+this.settings.speed+"ms "+this.settings.easing}),this.timeout=setTimeout(function(){t(i).css({transition:""}),i.settings.glare&&i.glareElement.css({transition:""})},this.settings.speed)},a=function(i){this.ticking=!1,t(this).css({"will-change":"transform"}),n.call(this),t(this).trigger("tilt.mouseEnter")},r=function(i){return"undefined"==typeof i&&(i={pageX:t(this).offset().left+t(this).outerWidth()/2,pageY:t(this).offset().top+t(this).outerHeight()/2}),{x:i.pageX,y:i.pageY}},o=function(t){this.mousePositions=r(t),s.call(this)},l=function(){n.call(this),this.reset=!0,s.call(this),t(this).trigger("tilt.mouseLeave")},h=function(){var i=t(this).outerWidth(),s=t(this).outerHeight(),e=t(this).offset().left,n=t(this).offset().top,a=(this.mousePositions.x-e)/i,r=(this.mousePositions.y-n)/s,o=(this.settings.maxTilt/2-a*this.settings.maxTilt).toFixed(2),l=(r*this.settings.maxTilt-this.settings.maxTilt/2).toFixed(2),h=Math.atan2(this.mousePositions.x-(e+i/2),-(this.mousePositions.y-(n+s/2)))*(180/Math.PI);return{tiltX:o,tiltY:l,percentageX:100*a,percentageY:100*r,angle:h}},g=function(){return this.transforms=h.call(this),this.reset?(this.reset=!1,t(this).css("transform","perspective("+this.settings.perspective+"px) rotateX(0deg) rotateY(0deg)"),void(this.settings.glare&&(this.glareElement.css("transform","rotate(180deg) translate(-50%, -50%)"),this.glareElement.css("opacity","0")))):(t(this).css("transform","perspective("+this.settings.perspective+"px) rotateX("+("x"===this.settings.disableAxis?0:this.transforms.tiltY)+"deg) rotateY("+("y"===this.settings.disableAxis?0:this.transforms.tiltX)+"deg) scale3d("+this.settings.scale+","+this.settings.scale+","+this.settings.scale+")"),this.settings.glare&&(this.glareElement.css("transform","rotate("+this.transforms.angle+"deg) translate(-50%, -50%)"),this.glareElement.css("opacity",""+this.transforms.percentageY*this.settings.maxGlare/100)),t(this).trigger("change",[this.transforms]),void(this.ticking=!1))},c=function(){var i=this.settings.glarePrerender;if(i||t(this).append('<div class="js-tilt-glare"><div class="js-tilt-glare-inner"></div></div>'),this.glareElementWrapper=t(this).find(".js-tilt-glare"),this.glareElement=t(this).find(".js-tilt-glare-inner"),!i){var s={position:"absolute",top:"0",left:"0",width:"100%",height:"100%"};this.glareElementWrapper.css(s).css({overflow:"hidden","pointer-events":"none"}),this.glareElement.css({position:"absolute",top:"50%",left:"50%","background-image":"linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%)",width:""+2*t(this).outerWidth(),height:""+2*t(this).outerWidth(),transform:"rotate(180deg) translate(-50%, -50%)","transform-origin":"0% 0%",opacity:"0"})}},d=function(){this.glareElement.css({width:""+2*t(this).outerWidth(),height:""+2*t(this).outerWidth()})};return t.fn.tilt.destroy=function(){t(this).each(function(){t(this).find(".js-tilt-glare").remove(),t(this).css({"will-change":"",transform:""}),t(this).off("mousemove mouseenter mouseleave")})},t.fn.tilt.getValues=function(){var i=[];return t(this).each(function(){this.mousePositions=r.call(this),i.push(h.call(this))}),i},t.fn.tilt.reset=function(){t(this).each(function(){var i=this;this.mousePositions=r.call(this),this.settings=t(this).data("settings"),l.call(this),setTimeout(function(){i.reset=!1},this.settings.transition)})},this.each(function(){var s=this;this.settings=t.extend({maxTilt:t(this).is("[data-tilt-max]")?t(this).data("tilt-max"):20,perspective:t(this).is("[data-tilt-perspective]")?t(this).data("tilt-perspective"):300,easing:t(this).is("[data-tilt-easing]")?t(this).data("tilt-easing"):"cubic-bezier(.03,.98,.52,.99)",scale:t(this).is("[data-tilt-scale]")?t(this).data("tilt-scale"):"1",speed:t(this).is("[data-tilt-speed]")?t(this).data("tilt-speed"):"400",transition:!t(this).is("[data-tilt-transition]")||t(this).data("tilt-transition"),disableAxis:t(this).is("[data-tilt-disable-axis]")?t(this).data("tilt-disable-axis"):null,axis:t(this).is("[data-tilt-axis]")?t(this).data("tilt-axis"):null,reset:!t(this).is("[data-tilt-reset]")||t(this).data("tilt-reset"),glare:!!t(this).is("[data-tilt-glare]")&&t(this).data("tilt-glare"),maxGlare:t(this).is("[data-tilt-maxglare]")?t(this).data("tilt-maxglare"):1},i),null!==this.settings.axis&&(console.warn("Tilt.js: the axis setting has been renamed to disableAxis. See https://github.com/gijsroge/tilt.js/pull/26 for more information"),this.settings.disableAxis=this.settings.axis),this.init=function(){t(s).data("settings",s.settings),s.settings.glare&&c.call(s),e.call(s)},this.init()})},t("[data-tilt]").tilt(),!0});
(function($) {
    var allfunction = {

        //============== Menu Icon ============== 
        menu_icon: function() {
            $('.main-menu ul li').each(function() {
                if ($(this).children('.sub-menu').length) {
                    $(this).children('a').append('<span></span><span></span>');
                }
            });
        },

        huburger_icon: function() {
            $('.humburger').on('click', function(){
                $(this).toggleClass('opened');
            });
        },

       // =============== Menu ==============
        menu_toggle: function(){
            $('.humburger').on("click", function(e) {
                e.stopPropagation()
                $('.main-menu').toggleClass('active');
                if ($(".main-menu").hasClass('active')) {
                    $('.login-ragister').removeClass('active');
                    $("body").addClass('overlay');
                  } else {
                    $("body").removeClass('overlay');
                  }
            });
            $('.main-menu ul li').click(function(e) {
                e.stopPropagation();
                $(this).siblings().removeClass('active').children('ul').removeClass('active').children('li').removeClass('active').next('ul').removeClass('active');
                $(this).toggleClass('active').children('ul').toggleClass('active');
            });
        },

        // ============== User Icon When Needed ==================
        user_toogle: function(){
            $('.user-icon').on("click", function(e) {
                e.stopPropagation()
                $('.login-ragister').toggleClass('active');
                if ($(".login-ragister").hasClass('active')) {
                    $('.main-menu').removeClass('active');
                    $('.humburger').removeClass('opened');
                    $("body").addClass('overlay');
                  } else {
                    $("body").removeClass('overlay');
                  }
            });
        },

        //================== Search Toogle ======================
        search_toogle: function(){
            $('.header-search').on("click", function(e) {
                e.stopPropagation();
                $('.search-area').addClass('active');
                if ($('.search-area').hasClass('active')) {
                    $('.main-menu,.login-ragister').removeClass('active');
                    $('.humburger').removeClass('opened');
                    $("body").addClass('overlay');
                }
            });
            $('.search-close').on("click", function(e) {
                e.stopPropagation();
                $('.search-area').removeClass('active');
                $("body").removeClass('overlay');
            });
        },

        // ============= Nice Select ===============
        nice_select: function(){
           $('select').niceSelect();
        },

        //============= Counter Up ===============
        counter_up: function(){
            $('.odometer').appear(function (e) {
                var odo = $(".odometer");
                odo.each(function () {
                    var countNumber = $(this).attr("data-count");
                    $(this).html(countNumber);
                });
            });
        },

        // CountDown 
        countdown: function(){
            // jQuery CountDown
            if( $(".countdown-clock").length ){
                $('.countdown-clock').countdown('2027/12/30', function(event) {
                    $('.clock-days').html(event.strftime('%D'));
                    $('.clock-hours').html(event.strftime('%H'));
                    $('.clock-minutes').html(event.strftime('%M'));
                    $('.clock-seconds').html(event.strftime('%S'));
                });
            }
        },

        // Popup Video
        popup_video: function() {
            $('.popup-video').magnificPopup({
                type: 'iframe'
            });
         },

         //================ Accordion =================
        accordion: function() { 
            $('.single-faq').click(function(){
                $(this).toggleClass("active").children('.faq-body').slideToggle("slow").parents('.single-faq').siblings().removeClass('active').children('.faq-body').slideUp();
            });
        },

        // $('.single-faq').click(function(){
        //     $(this).toggleClass("active").children('.faq-body').toggleClass('active').parents('.single-faq').siblings().removeClass('active').children('.faq-body').removeClass('active');
        // });
        // Blog Isotop 
        blog_isotop_galley: function() {
            if ($('.blog-active').length) {
                // init Isotope
                var $grid = $('.blog-active').isotope({
                    itemSelector: '.blog-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.blog-grid-sizer',
                    }
                });
                // filter items on button click
                $('.filter-button-group').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                    $(this).addClass('active').siblings().removeClass('active');
                });

                $grid.imagesLoaded().progress(function() {
                    $grid.isotope('layout')
                });
            }
        },

        // Game List Isotop 
        gamelist_galley: function() {
            if ($('.gamelist-active').length) {
                // init Isotope
                var $grid = $('.gamelist-active').isotope({
                    itemSelector: '.gamelist-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.gamelist-grid-sizer',
                    }
                });
                // filter items on button click
                $('.filter-button-group').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                    $(this).addClass('active').siblings().removeClass('active');
                });

                $grid.imagesLoaded().progress(function() {
                    $grid.isotope('layout')
                });
            }
        },

        // Game Details Slider
        gamedetails_slider: function() {
            $(".gamedetails-slider").owlCarousel({    
                loop:true,
                items:1,
                margin:0,
                stagePadding: 0,
                autoplay:false,
                dots:true,
            });
              
              dotcount = 1;
              
              jQuery('.owl-dot').each(function() {
                jQuery( this ).addClass( 'dotnumber' + dotcount);
                jQuery( this ).attr('data-info', dotcount);
                dotcount=dotcount+1;
              });
              
              slidecount = 1;
              
              jQuery('.owl-item').not('.cloned').each(function() {
                jQuery( this ).addClass( 'slidenumber' + slidecount);
                slidecount=slidecount+1;
              });
              
              jQuery('.owl-dot').each(function() {  
                grab = jQuery(this).data('info');   
                slidegrab = jQuery('.slidenumber'+ grab +' img').attr('src');
                jQuery(this).css("background-image", "url("+slidegrab+")");   
              });
              
              amount = $('.owl-dot').length;
              gotowidth = 100/amount;     
              jQuery('.owl-dot').css("height", gotowidth+"%");
        },

        // all-tournament Slider
        all_tnmnt_slider: function() {
            $('.all-tnmnt-slider').owlCarousel({
                loop:true,
                margin:0,
                nav:true,
                items: 1,
                navText: ['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
            });
        },
        
        // All Tournment Isotop 
        all_tournament: function() {
            if ($('.all-tournament-active').length) {
                // init Isotope
                var $grid = $('.all-tournament-active').isotope({
                    itemSelector: '.all-tournament-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.all-tournament-sizer',
                    }
                });
                // filter items on button click
                $('.filter-button-group').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                    $(this).addClass('active').siblings().removeClass('active');
                });

                $grid.imagesLoaded().progress(function() {
                    $grid.isotope('layout')
                });
            }
        },

        // Stream Slider Slider
        stream_slider: function() {
            $('.stream-slider-active').owlCarousel({
                loop:true,
                margin:30,
                nav:false,
                dots: true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                responsive:{
                    0: {
                        items: 1
                    },
                    575:{
                        items:2
                    },
                    1199:{
                        items:3
                    }
                }
            });
        },


        // Shop Isotop 
        shop_isotop_galley: function() {
            if ($('.shop-active').length) {
                // init Isotope
                var $grid = $('.shop-active').isotope({
                    itemSelector: '.shop-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.shop-grid-sizer',
                    }
                });
                // filter items on button click
                $('.filter-button-group').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                    $(this).addClass('active').siblings().removeClass('active');
                });
            }
        },

        // Review Slider
        review_slider: function() {
            $('.review-wrapper').owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                navText: ['<i class="icofont-rounded-left"></i>','<i class="icofont-rounded-right"></i>'],
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                responsive:{
                    0: {
                        items: 1
                    },
                    575:{
                        items:2
                    },
                    1199:{
                        items:3
                    }
                }
            });
        },

        // Table
        add_cart_table: function(){
            $('#add-cart-table', ).DataTable({
                responsive: true,
                "searching": false,
                "paging": false,
                "info": false,
                "lengthChange":false
                
            });
        },


        // Home V1 Slider
        home_v1_slider: function() {
            $('.home-v1-hero-wrapper').owlCarousel({
                loop:true,
                margin:0,
                nav:true,
                items: 1,
                navText: ['<i class="icofont-long-arrow-left"></i>','<i class="icofont-long-arrow-right"></i>'],
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
            });
        },

        // Review Slider
        brand_slider: function() {
            $('.brand-slider-wrapper').owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                navText: ['<i class="icofont-long-arrow-left"></i>','<i class="icofont-long-arrow-right"></i>'],
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                responsive:{
                    0: {
                        items: 2
                    },
                    575:{
                        items:3
                    },
                    767: {
                        items:4
                    },
                    1199:{
                        items:5
                    }
                }
            });
        },

        // Home V3 hero Slider
        home_v3_hero_slider: function() {
            $('.home-v3-hero-bg-slider').owlCarousel({
                loop:true,
                margin:0,
                nav:false,
                dots: false,
                items: 1,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                animateOut: 'fadeOut',
            });
        },

        // Tournament Isotop 
        tournament_isotop_galley: function() {
            if ($('.home-v3-tournament-active').length) {
                // init Isotope
                var $grid = $('.home-v3-tournament-active').isotope({
                    itemSelector: '.tournament-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.v3-tournament-grid-sizer',
                    }
                });
                // filter items on button click
                $('.filter-button-group').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                    $(this).addClass('active').siblings().removeClass('active');
                });
            }
        },

        //============== IMG to SVG ==================
        imgToSvg: function() {
            function jetix_svg() {
                jQuery('img').each(function() {
                    var jQueryimg = jQuery(this);
                    var imgClass = jQueryimg.attr('class');
                    var imgURL = jQueryimg.attr('src');
                    jQuery.get(imgURL, function(data) {
                        // Get the SVG tag, ignore the rest
                        var jQuerysvg = jQuery(data).find('svg');

                        // Add replaced image's classes to the new SVG
                        if (typeof imgClass !== 'undefined') {
                            jQuerysvg = jQuerysvg.attr('class', imgClass + ' replaced-svg');
                        }
                        jQuerysvg = jQuerysvg.removeAttr('xmlns:a');
                        // Replace image with new SVG
                        jQueryimg.replaceWith(jQuerysvg);

                    }, 'xml');

                });
            }
            $(document).each(function() {
                jetix_svg();
            })
        },

        // aos_aimation
        aos_aimation: function(){
            AOS.init({
                duration: 1000,
                once: true,
            }); 
        },


        //================== StopPropagations elements =================
        stopPropagationElements: () => {
            $('.main-menu, .login-ragister,.search-area').click(function(e) {
                e.stopPropagation()
            })
        },
        

        //================ Document click to hide elements ==================
        elementHide: () => {
            $(document).click(function() {
                $('.main-menu,.login-ragister,.search-area').removeClass('active');
                $('.humburger').removeClass('opened');
                $('.overlay').removeClass('overlay');
            })
        },


        init: function() {
            allfunction.imgToSvg()
            allfunction.stopPropagationElements()
            allfunction.elementHide()

            allfunction.menu_icon()
            allfunction.huburger_icon()
            allfunction.menu_toggle()
            allfunction.user_toogle()
            allfunction.search_toogle()
            allfunction.nice_select()
            allfunction.counter_up()
            allfunction.countdown()
            allfunction.popup_video()
            allfunction.blog_isotop_galley()
            allfunction.gamelist_galley()
            allfunction.gamedetails_slider()
            allfunction.all_tnmnt_slider()
            allfunction.all_tournament()
            allfunction.stream_slider()
            allfunction.shop_isotop_galley()
            allfunction.review_slider()
            allfunction.add_cart_table()
            allfunction.home_v1_slider()
            allfunction.brand_slider()
            allfunction.home_v3_hero_slider()
            allfunction.tournament_isotop_galley()
            allfunction.accordion()
            allfunction.aos_aimation()

        },
    }


    $(document).ready(function() {
        allfunction.init();
    });

})(jQuery);


// Prelax Efect
var image = document.getElementsByClassName('top-bottom');
new simpleParallax(image, {
	delay: .6,
	transition: 'cubic-bezier(0,0,0,1)'
});

var image = document.getElementsByClassName('left-right');
new simpleParallax(image, {
    delay: .6,
	orientation: 'right'
});

// spiners function start here
document.addEventListener('DOMContentLoaded', function() {
    var inputs = document.getElementsByClassName('inc-dec')

    function incInputNumber(input, step) {
        var val = +input.value
        if (isNaN(val)) val = 0
        val += step
        input.value = val > 0 ? val : 0
    }
    Array.prototype.forEach.call(inputs, function(el) {
        var input = el.getElementsByTagName('input')[0]

        el.getElementsByClassName('inc')[0].addEventListener('click', function() { incInputNumber(input, 1) })
        el.getElementsByClassName('dec')[0].addEventListener('click', function() { incInputNumber(input, -1) })
    });
});