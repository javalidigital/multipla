/**
 * Isotope v1.5.25
 * An exquisite jQuery plugin for magical layouts
 * http://isotope.metafizzy.co
 *
 * Commercial use requires one-time purchase of a commercial license
 * http://isotope.metafizzy.co/docs/license.html
 *
 * Non-commercial use is licensed under the MIT License
 *
 * Copyright 2013 Metafizzy
 */

/*jshint asi: true, browser: true, curly: true, eqeqeq: true, forin: false, immed: false, newcap: true, noempty: true, strict: true, undef: true */
/*global jQuery: false */

(function(e,t,n){"use strict";var r=e.document;var i=e.Modernizr;var s=function(e){return e.charAt(0).toUpperCase()+e.slice(1)};var o="Moz Webkit O Ms".split(" ");var u=function(e){var t=r.documentElement.style,n;if(typeof t[e]==="string"){return e}e=s(e);for(var i=0,u=o.length;i<u;i++){n=o[i]+e;if(typeof t[n]==="string"){return n}}};var a=u("transform"),f=u("transitionProperty");var l={csstransforms:function(){return!!a},csstransforms3d:function(){var e=!!u("perspective");if(e){var n=" -o- -moz- -ms- -webkit- -khtml- ".split(" "),r="@media ("+n.join("transform-3d),(")+"modernizr)",i=t("<style>"+r+"{#modernizr{height:3px}}"+"</style>").appendTo("head"),s=t('<div id="modernizr" />').appendTo("html");e=s.height()===3;s.remove();i.remove()}return e},csstransitions:function(){return!!f}};var c;if(i){for(c in l){if(!i.hasOwnProperty(c)){i.addTest(c,l[c])}}}else{i=e.Modernizr={_version:"1.6ish: miniModernizr for Isotope"};var h=" ";var p;for(c in l){p=l[c]();i[c]=p;h+=" "+(p?"":"no-")+c}t("html").addClass(h)}if(i.csstransforms){var d=i.csstransforms3d?{translate:function(e){return"translate3d("+e[0]+"px, "+e[1]+"px, 0) "},scale:function(e){return"scale3d("+e+", "+e+", 1) "}}:{translate:function(e){return"translate("+e[0]+"px, "+e[1]+"px) "},scale:function(e){return"scale("+e+") "}};var v=function(e,n,r){var i=t.data(e,"isoTransform")||{},s={},o,u={},f;s[n]=r;t.extend(i,s);for(o in i){f=i[o];u[o]=d[o](f)}var l=u.translate||"",c=u.scale||"",h=l+c;t.data(e,"isoTransform",i);e.style[a]=h};t.cssNumber.scale=true;t.cssHooks.scale={set:function(e,t){v(e,"scale",t)},get:function(e,n){var r=t.data(e,"isoTransform");return r&&r.scale?r.scale:1}};t.fx.step.scale=function(e){t.cssHooks.scale.set(e.elem,e.now+e.unit)};t.cssNumber.translate=true;t.cssHooks.translate={set:function(e,t){v(e,"translate",t)},get:function(e,n){var r=t.data(e,"isoTransform");return r&&r.translate?r.translate:[0,0]}}}var m,g;if(i.csstransitions){m={WebkitTransitionProperty:"webkitTransitionEnd",MozTransitionProperty:"transitionend",OTransitionProperty:"oTransitionEnd otransitionend",transitionProperty:"transitionend"}[f];g=u("transitionDuration")}var y=t.event,b=t.event.handle?"handle":"dispatch",w;y.special.smartresize={setup:function(){t(this).bind("resize",y.special.smartresize.handler)},teardown:function(){t(this).unbind("resize",y.special.smartresize.handler)},handler:function(e,t){var n=this,r=arguments;e.type="smartresize";if(w){clearTimeout(w)}w=setTimeout(function(){y[b].apply(n,r)},t==="execAsap"?0:100)}};t.fn.smartresize=function(e){return e?this.bind("smartresize",e):this.trigger("smartresize",["execAsap"])};t.Isotope=function(e,n,r){this.element=t(n);this._create(e);this._init(r)};var E=["width","height"];var S=t(e);t.Isotope.settings={resizable:true,layoutMode:"masonry",containerClass:"isotope",itemClass:"isotope-item",hiddenClass:"isotope-hidden",hiddenStyle:{opacity:0,scale:.001},visibleStyle:{opacity:1,scale:1},containerStyle:{position:"relative",overflow:"hidden"},animationEngine:"best-available",animationOptions:{queue:false,duration:800},sortBy:"original-order",sortAscending:true,resizesContainer:true,transformsEnabled:true,itemPositionDataEnabled:false};t.Isotope.prototype={_create:function(e){this.options=t.extend({},t.Isotope.settings,e);this.styleQueue=[];this.elemCount=0;var n=this.element[0].style;this.originalStyle={};var r=E.slice(0);for(var i in this.options.containerStyle){r.push(i)}for(var s=0,o=r.length;s<o;s++){i=r[s];this.originalStyle[i]=n[i]||""}this.element.css(this.options.containerStyle);this._updateAnimationEngine();this._updateUsingTransforms();var u={"original-order":function(e,t){t.elemCount++;return t.elemCount},random:function(){return Math.random()}};this.options.getSortData=t.extend(this.options.getSortData,u);this.reloadItems();this.offset={left:parseInt(this.element.css("padding-left")||0,10),top:parseInt(this.element.css("padding-top")||0,10)};var a=this;setTimeout(function(){a.element.addClass(a.options.containerClass)},0);if(this.options.resizable){S.bind("smartresize.isotope",function(){a.resize()})}this.element.delegate("."+this.options.hiddenClass,"click",function(){return false})},_getAtoms:function(e){var t=this.options.itemSelector,n=t?e.filter(t).add(e.find(t)):e,r={position:"absolute"};n=n.filter(function(e,t){return t.nodeType===1});if(this.usingTransforms){r.left=0;r.top=0}n.css(r).addClass(this.options.itemClass);this.updateSortData(n,true);return n},_init:function(e){this.$filteredAtoms=this._filter(this.$allAtoms);this._sort();this.reLayout(e)},option:function(e){if(t.isPlainObject(e)){this.options=t.extend(true,this.options,e);var n;for(var r in e){n="_update"+s(r);if(this[n]){this[n]()}}}},_updateAnimationEngine:function(){var e=this.options.animationEngine.toLowerCase().replace(/[ _\-]/g,"");var t;switch(e){case"css":case"none":t=false;break;case"jquery":t=true;break;default:t=!i.csstransitions}this.isUsingJQueryAnimation=t;this._updateUsingTransforms()},_updateTransformsEnabled:function(){this._updateUsingTransforms()},_updateUsingTransforms:function(){var e=this.usingTransforms=this.options.transformsEnabled&&i.csstransforms&&i.csstransitions&&!this.isUsingJQueryAnimation;if(!e){delete this.options.hiddenStyle.scale;delete this.options.visibleStyle.scale}this.getPositionStyles=e?this._translate:this._positionAbs},_filter:function(e){var t=this.options.filter===""?"*":this.options.filter;if(!t){return e}var n=this.options.hiddenClass,r="."+n,i=e.filter(r),s=i;if(t!=="*"){s=i.filter(t);var o=e.not(r).not(t).addClass(n);this.styleQueue.push({$el:o,style:this.options.hiddenStyle})}this.styleQueue.push({$el:s,style:this.options.visibleStyle});s.removeClass(n);return e.filter(t)},updateSortData:function(e,n){var r=this,i=this.options.getSortData,s,o;e.each(function(){s=t(this);o={};for(var e in i){if(!n&&e==="original-order"){o[e]=t.data(this,"isotope-sort-data")[e]}else{o[e]=i[e](s,r)}}t.data(this,"isotope-sort-data",o)})},_sort:function(){var e=this.options.sortBy,t=this._getSorter,n=this.options.sortAscending?1:-1,r=function(r,i){var s=t(r,e),o=t(i,e);if(s===o&&e!=="original-order"){s=t(r,"original-order");o=t(i,"original-order")}return(s>o?1:s<o?-1:0)*n};this.$filteredAtoms.sort(r)},_getSorter:function(e,n){return t.data(e,"isotope-sort-data")[n]},_translate:function(e,t){return{translate:[e,t]}},_positionAbs:function(e,t){return{left:e,top:t}},_pushPosition:function(e,t,n){t=Math.round(t+this.offset.left);n=Math.round(n+this.offset.top);var r=this.getPositionStyles(t,n);this.styleQueue.push({$el:e,style:r});if(this.options.itemPositionDataEnabled){e.data("isotope-item-position",{x:t,y:n})}},layout:function(e,t){var n=this.options.layoutMode;this["_"+n+"Layout"](e);if(this.options.resizesContainer){var r=this["_"+n+"GetContainerSize"]();this.styleQueue.push({$el:this.element,style:r})}this._processStyleQueue(e,t);this.isLaidOut=true},_processStyleQueue:function(e,n){var r=!this.isLaidOut?"css":this.isUsingJQueryAnimation?"animate":"css",s=this.options.animationOptions,o=this.options.onLayout,u,a,f,l;a=function(e,t){t.$el[r](t.style,s)};if(this._isInserting&&this.isUsingJQueryAnimation){a=function(e,t){u=t.$el.hasClass("no-transition")?"css":r;t.$el[u](t.style,s)}}else if(n||o||s.complete){var c=false,h=[n,o,s.complete],p=this;f=true;l=function(){if(c){return}var t;for(var n=0,r=h.length;n<r;n++){t=h[n];if(typeof t==="function"){t.call(p.element,e,p)}}c=true};if(this.isUsingJQueryAnimation&&r==="animate"){s.complete=l;f=false}else if(i.csstransitions){var d=0,v=this.styleQueue[0],y=v&&v.$el,b;while(!y||!y.length){b=this.styleQueue[d++];if(!b){return}y=b.$el}var w=parseFloat(getComputedStyle(y[0])[g]);if(w>0){a=function(e,t){t.$el[r](t.style,s).one(m,l)};f=false}}}t.each(this.styleQueue,a);if(f){l()}this.styleQueue=[]},resize:function(){if(this["_"+this.options.layoutMode+"ResizeChanged"]()){this.reLayout()}},reLayout:function(e){this["_"+this.options.layoutMode+"Reset"]();this.layout(this.$filteredAtoms,e)},addItems:function(e,t){var n=this._getAtoms(e);this.$allAtoms=this.$allAtoms.add(n);if(t){t(n)}},insert:function(e,t){this.element.append(e);var n=this;this.addItems(e,function(e){var r=n._filter(e);n._addHideAppended(r);n._sort();n.reLayout();n._revealAppended(r,t)})},appended:function(e,t){var n=this;this.addItems(e,function(e){n._addHideAppended(e);n.layout(e);n._revealAppended(e,t)})},_addHideAppended:function(e){this.$filteredAtoms=this.$filteredAtoms.add(e);e.addClass("no-transition");this._isInserting=true;this.styleQueue.push({$el:e,style:this.options.hiddenStyle})},_revealAppended:function(e,t){var n=this;setTimeout(function(){e.removeClass("no-transition");n.styleQueue.push({$el:e,style:n.options.visibleStyle});n._isInserting=false;n._processStyleQueue(e,t)},10)},reloadItems:function(){this.$allAtoms=this._getAtoms(this.element.children())},remove:function(e,t){this.$allAtoms=this.$allAtoms.not(e);this.$filteredAtoms=this.$filteredAtoms.not(e);var n=this;var r=function(){e.remove();if(t){t.call(n.element)}};if(e.filter(":not(."+this.options.hiddenClass+")").length){this.styleQueue.push({$el:e,style:this.options.hiddenStyle});this._sort();this.reLayout(r)}else{r()}},shuffle:function(e){this.updateSortData(this.$allAtoms);this.options.sortBy="random";this._sort();this.reLayout(e)},destroy:function(){var e=this.usingTransforms;var t=this.options;this.$allAtoms.removeClass(t.hiddenClass+" "+t.itemClass).each(function(){var t=this.style;t.position="";t.top="";t.left="";t.opacity="";if(e){t[a]=""}});var n=this.element[0].style;for(var r in this.originalStyle){n[r]=this.originalStyle[r]}this.element.unbind(".isotope").undelegate("."+t.hiddenClass,"click").removeClass(t.containerClass).removeData("isotope");S.unbind(".isotope")},_getSegments:function(e){var t=this.options.layoutMode,n=e?"rowHeight":"columnWidth",r=e?"height":"width",i=e?"rows":"cols",o=this.element[r](),u,a=this.options[t]&&this.options[t][n]||this.$filteredAtoms["outer"+s(r)](true)||o;u=Math.floor(o/a);u=Math.max(u,1);this[t][i]=u;this[t][n]=a},_checkIfSegmentsChanged:function(e){var t=this.options.layoutMode,n=e?"rows":"cols",r=this[t][n];this._getSegments(e);return this[t][n]!==r},_masonryReset:function(){this.masonry={};this._getSegments();var e=this.masonry.cols;this.masonry.colYs=[];while(e--){this.masonry.colYs.push(0)}},_masonryLayout:function(e){var n=this,r=n.masonry;e.each(function(){var e=t(this),i=Math.ceil(e.outerWidth(true)/r.columnWidth);i=Math.min(i,r.cols);if(i===1){n._masonryPlaceBrick(e,r.colYs)}else{var s=r.cols+1-i,o=[],u,a;for(a=0;a<s;a++){u=r.colYs.slice(a,a+i);o[a]=Math.max.apply(Math,u)}n._masonryPlaceBrick(e,o)}})},_masonryPlaceBrick:function(e,t){var n=Math.min.apply(Math,t),r=0;for(var i=0,s=t.length;i<s;i++){if(t[i]===n){r=i;break}}var o=this.masonry.columnWidth*r,u=n;this._pushPosition(e,o,u);var a=n+e.outerHeight(true),f=this.masonry.cols+1-s;for(i=0;i<f;i++){this.masonry.colYs[r+i]=a}},_masonryGetContainerSize:function(){var e=Math.max.apply(Math,this.masonry.colYs);return{height:e}},_masonryResizeChanged:function(){return this._checkIfSegmentsChanged()},_fitRowsReset:function(){this.fitRows={x:0,y:0,height:0}},_fitRowsLayout:function(e){var n=this,r=this.element.width(),i=this.fitRows;e.each(function(){var e=t(this),s=e.outerWidth(true),o=e.outerHeight(true);if(i.x!==0&&s+i.x>r){i.x=0;i.y=i.height}n._pushPosition(e,i.x,i.y);i.height=Math.max(i.y+o,i.height);i.x+=s})},_fitRowsGetContainerSize:function(){return{height:this.fitRows.height}},_fitRowsResizeChanged:function(){return true},_cellsByRowReset:function(){this.cellsByRow={index:0};this._getSegments();this._getSegments(true)},_cellsByRowLayout:function(e){var n=this,r=this.cellsByRow;e.each(function(){var e=t(this),i=r.index%r.cols,s=Math.floor(r.index/r.cols),o=(i+.5)*r.columnWidth-e.outerWidth(true)/2,u=(s+.5)*r.rowHeight-e.outerHeight(true)/2;n._pushPosition(e,o,u);r.index++})},_cellsByRowGetContainerSize:function(){return{height:Math.ceil(this.$filteredAtoms.length/this.cellsByRow.cols)*this.cellsByRow.rowHeight+this.offset.top}},_cellsByRowResizeChanged:function(){return this._checkIfSegmentsChanged()},_straightDownReset:function(){this.straightDown={y:0}},_straightDownLayout:function(e){var n=this;e.each(function(e){var r=t(this);n._pushPosition(r,0,n.straightDown.y);n.straightDown.y+=r.outerHeight(true)})},_straightDownGetContainerSize:function(){return{height:this.straightDown.y}},_straightDownResizeChanged:function(){return true},_masonryHorizontalReset:function(){this.masonryHorizontal={};this._getSegments(true);var e=this.masonryHorizontal.rows;this.masonryHorizontal.rowXs=[];while(e--){this.masonryHorizontal.rowXs.push(0)}},_masonryHorizontalLayout:function(e){var n=this,r=n.masonryHorizontal;e.each(function(){var e=t(this),i=Math.ceil(e.outerHeight(true)/r.rowHeight);i=Math.min(i,r.rows);if(i===1){n._masonryHorizontalPlaceBrick(e,r.rowXs)}else{var s=r.rows+1-i,o=[],u,a;for(a=0;a<s;a++){u=r.rowXs.slice(a,a+i);o[a]=Math.max.apply(Math,u)}n._masonryHorizontalPlaceBrick(e,o)}})},_masonryHorizontalPlaceBrick:function(e,t){var n=Math.min.apply(Math,t),r=0;for(var i=0,s=t.length;i<s;i++){if(t[i]===n){r=i;break}}var o=n,u=this.masonryHorizontal.rowHeight*r;this._pushPosition(e,o,u);var a=n+e.outerWidth(true),f=this.masonryHorizontal.rows+1-s;for(i=0;i<f;i++){this.masonryHorizontal.rowXs[r+i]=a}},_masonryHorizontalGetContainerSize:function(){var e=Math.max.apply(Math,this.masonryHorizontal.rowXs);return{width:e}},_masonryHorizontalResizeChanged:function(){return this._checkIfSegmentsChanged(true)},_fitColumnsReset:function(){this.fitColumns={x:0,y:0,width:0}},_fitColumnsLayout:function(e){var n=this,r=this.element.height(),i=this.fitColumns;e.each(function(){var e=t(this),s=e.outerWidth(true),o=e.outerHeight(true);if(i.y!==0&&o+i.y>r){i.x=i.width;i.y=0}n._pushPosition(e,i.x,i.y);i.width=Math.max(i.x+s,i.width);i.y+=o})},_fitColumnsGetContainerSize:function(){return{width:this.fitColumns.width}},_fitColumnsResizeChanged:function(){return true},_cellsByColumnReset:function(){this.cellsByColumn={index:0};this._getSegments();this._getSegments(true)},_cellsByColumnLayout:function(e){var n=this,r=this.cellsByColumn;e.each(function(){var e=t(this),i=Math.floor(r.index/r.rows),s=r.index%r.rows,o=(i+.5)*r.columnWidth-e.outerWidth(true)/2,u=(s+.5)*r.rowHeight-e.outerHeight(true)/2;n._pushPosition(e,o,u);r.index++})},_cellsByColumnGetContainerSize:function(){return{width:Math.ceil(this.$filteredAtoms.length/this.cellsByColumn.rows)*this.cellsByColumn.columnWidth}},_cellsByColumnResizeChanged:function(){return this._checkIfSegmentsChanged(true)},_straightAcrossReset:function(){this.straightAcross={x:0}},_straightAcrossLayout:function(e){var n=this;e.each(function(e){var r=t(this);n._pushPosition(r,n.straightAcross.x,0);n.straightAcross.x+=r.outerWidth(true)})},_straightAcrossGetContainerSize:function(){return{width:this.straightAcross.x}},_straightAcrossResizeChanged:function(){return true}};t.fn.imagesLoaded=function(e){function u(){e.call(n,r)}function a(e){var n=e.target;if(n.src!==s&&t.inArray(n,o)===-1){o.push(n);if(--i<=0){setTimeout(u);r.unbind(".imagesLoaded",a)}}}var n=this,r=n.find("img").add(n.filter("img")),i=r.length,s="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",o=[];if(!i){u()}r.bind("load.imagesLoaded error.imagesLoaded",a).each(function(){var e=this.src;this.src=s;this.src=e});return n};var x=function(t){if(e.console){e.console.error(t)}};t.fn.isotope=function(e,n){if(typeof e==="string"){var r=Array.prototype.slice.call(arguments,1);this.each(function(){var n=t.data(this,"isotope");if(!n){x("cannot call methods on isotope prior to initialization; "+"attempted to call method '"+e+"'");return}if(!t.isFunction(n[e])||e.charAt(0)==="_"){x("no such method '"+e+"' for isotope instance");return}n[e].apply(n,r)})}else{this.each(function(){var r=t.data(this,"isotope");if(r){r.option(e);r._init(n)}else{t.data(this,"isotope",new t.Isotope(e,this,n))}})}return this}})(window,jQuery)