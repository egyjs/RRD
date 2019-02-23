/*!
 * Font Awesome Icon Picker
 * https://farbelous.github.io/fontawesome-iconpicker/
 *
 * Originally written by (c) 2016 Javi Aguilar
 * Licensed under the MIT License
 * https://github.com/farbelous/fontawesome-iconpicker/blob/master/LICENSE
 *
 */
(function(a) {
    if (typeof define === "function" && define.amd) {
        define([ "jquery" ], a);
    } else {
        a(jQuery);
    }
})(function(a) {
    a.ui = a.ui || {};
    var b = a.ui.version = "1.12.1";
    /*!
     * jQuery UI Position 1.12.1
     * http://jqueryui.com
     *
     * Copyright jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     *
     * http://api.jqueryui.com/position/
     */
    (function() {
        var b, c = Math.max, d = Math.abs, e = /left|center|right/, f = /top|center|bottom/, g = /[\+\-]\d+(\.[\d]+)?%?/, h = /^\w+/, i = /%$/, j = a.fn.pos;
        function k(a, b, c) {
            return [ parseFloat(a[0]) * (i.test(a[0]) ? b / 100 : 1), parseFloat(a[1]) * (i.test(a[1]) ? c / 100 : 1) ];
        }
        function l(b, c) {
            return parseInt(a.css(b, c), 10) || 0;
        }
        function m(b) {
            var c = b[0];
            if (c.nodeType === 9) {
                return {
                    width: b.width(),
                    height: b.height(),
                    offset: {
                        top: 0,
                        left: 0
                    }
                };
            }
            if (a.isWindow(c)) {
                return {
                    width: b.width(),
                    height: b.height(),
                    offset: {
                        top: b.scrollTop(),
                        left: b.scrollLeft()
                    }
                };
            }
            if (c.preventDefault) {
                return {
                    width: 0,
                    height: 0,
                    offset: {
                        top: c.pageY,
                        left: c.pageX
                    }
                };
            }
            return {
                width: b.outerWidth(),
                height: b.outerHeight(),
                offset: b.offset()
            };
        }
        a.pos = {
            scrollbarWidth: function() {
                if (b !== undefined) {
                    return b;
                }
                var c, d, e = a("<div " + "style='display:block;position:absolute;width:50px;height:50px;overflow:hidden;'>" + "<div style='height:100px;width:auto;'></div></div>"), f = e.children()[0];
                a("body").append(e);
                c = f.offsetWidth;
                e.css("overflow", "scroll");
                d = f.offsetWidth;
                if (c === d) {
                    d = e[0].clientWidth;
                }
                e.remove();
                return b = c - d;
            },
            getScrollInfo: function(b) {
                var c = b.isWindow || b.isDocument ? "" : b.element.css("overflow-x"), d = b.isWindow || b.isDocument ? "" : b.element.css("overflow-y"), e = c === "scroll" || c === "auto" && b.width < b.element[0].scrollWidth, f = d === "scroll" || d === "auto" && b.height < b.element[0].scrollHeight;
                return {
                    width: f ? a.pos.scrollbarWidth() : 0,
                    height: e ? a.pos.scrollbarWidth() : 0
                };
            },
            getWithinInfo: function(b) {
                var c = a(b || window), d = a.isWindow(c[0]), e = !!c[0] && c[0].nodeType === 9, f = !d && !e;
                return {
                    element: c,
                    isWindow: d,
                    isDocument: e,
                    offset: f ? a(b).offset() : {
                        left: 0,
                        top: 0
                    },
                    scrollLeft: c.scrollLeft(),
                    scrollTop: c.scrollTop(),
                    width: c.outerWidth(),
                    height: c.outerHeight()
                };
            }
        };
        a.fn.pos = function(b) {
            if (!b || !b.of) {
                return j.apply(this, arguments);
            }
            b = a.extend({}, b);
            var i, n, o, p, q, r, s = a(b.of), t = a.pos.getWithinInfo(b.within), u = a.pos.getScrollInfo(t), v = (b.collision || "flip").split(" "), w = {};
            r = m(s);
            if (s[0].preventDefault) {
                b.at = "left top";
            }
            n = r.width;
            o = r.height;
            p = r.offset;
            q = a.extend({}, p);
            a.each([ "my", "at" ], function() {
                var a = (b[this] || "").split(" "), c, d;
                if (a.length === 1) {
                    a = e.test(a[0]) ? a.concat([ "center" ]) : f.test(a[0]) ? [ "center" ].concat(a) : [ "center", "center" ];
                }
                a[0] = e.test(a[0]) ? a[0] : "center";
                a[1] = f.test(a[1]) ? a[1] : "center";
                c = g.exec(a[0]);
                d = g.exec(a[1]);
                w[this] = [ c ? c[0] : 0, d ? d[0] : 0 ];
                b[this] = [ h.exec(a[0])[0], h.exec(a[1])[0] ];
            });
            if (v.length === 1) {
                v[1] = v[0];
            }
            if (b.at[0] === "right") {
                q.left += n;
            } else if (b.at[0] === "center") {
                q.left += n / 2;
            }
            if (b.at[1] === "bottom") {
                q.top += o;
            } else if (b.at[1] === "center") {
                q.top += o / 2;
            }
            i = k(w.at, n, o);
            q.left += i[0];
            q.top += i[1];
            return this.each(function() {
                var e, f, g = a(this), h = g.outerWidth(), j = g.outerHeight(), m = l(this, "marginLeft"), r = l(this, "marginTop"), x = h + m + l(this, "marginRight") + u.width, y = j + r + l(this, "marginBottom") + u.height, z = a.extend({}, q), A = k(w.my, g.outerWidth(), g.outerHeight());
                if (b.my[0] === "right") {
                    z.left -= h;
                } else if (b.my[0] === "center") {
                    z.left -= h / 2;
                }
                if (b.my[1] === "bottom") {
                    z.top -= j;
                } else if (b.my[1] === "center") {
                    z.top -= j / 2;
                }
                z.left += A[0];
                z.top += A[1];
                e = {
                    marginLeft: m,
                    marginTop: r
                };
                a.each([ "left", "top" ], function(c, d) {
                    if (a.ui.pos[v[c]]) {
                        a.ui.pos[v[c]][d](z, {
                            targetWidth: n,
                            targetHeight: o,
                            elemWidth: h,
                            elemHeight: j,
                            collisionPosition: e,
                            collisionWidth: x,
                            collisionHeight: y,
                            offset: [ i[0] + A[0], i[1] + A[1] ],
                            my: b.my,
                            at: b.at,
                            within: t,
                            elem: g
                        });
                    }
                });
                if (b.using) {
                    f = function(a) {
                        var e = p.left - z.left, f = e + n - h, i = p.top - z.top, k = i + o - j, l = {
                            target: {
                                element: s,
                                left: p.left,
                                top: p.top,
                                width: n,
                                height: o
                            },
                            element: {
                                element: g,
                                left: z.left,
                                top: z.top,
                                width: h,
                                height: j
                            },
                            horizontal: f < 0 ? "left" : e > 0 ? "right" : "center",
                            vertical: k < 0 ? "top" : i > 0 ? "bottom" : "middle"
                        };
                        if (n < h && d(e + f) < n) {
                            l.horizontal = "center";
                        }
                        if (o < j && d(i + k) < o) {
                            l.vertical = "middle";
                        }
                        if (c(d(e), d(f)) > c(d(i), d(k))) {
                            l.important = "horizontal";
                        } else {
                            l.important = "vertical";
                        }
                        b.using.call(this, a, l);
                    };
                }
                g.offset(a.extend(z, {
                    using: f
                }));
            });
        };
        a.ui.pos = {
            _trigger: function(a, b, c, d) {
                if (b.elem) {
                    b.elem.trigger({
                        type: c,
                        position: a,
                        positionData: b,
                        triggered: d
                    });
                }
            },
            fit: {
                left: function(b, d) {
                    a.ui.pos._trigger(b, d, "posCollide", "fitLeft");
                    var e = d.within, f = e.isWindow ? e.scrollLeft : e.offset.left, g = e.width, h = b.left - d.collisionPosition.marginLeft, i = f - h, j = h + d.collisionWidth - g - f, k;
                    if (d.collisionWidth > g) {
                        if (i > 0 && j <= 0) {
                            k = b.left + i + d.collisionWidth - g - f;
                            b.left += i - k;
                        } else if (j > 0 && i <= 0) {
                            b.left = f;
                        } else {
                            if (i > j) {
                                b.left = f + g - d.collisionWidth;
                            } else {
                                b.left = f;
                            }
                        }
                    } else if (i > 0) {
                        b.left += i;
                    } else if (j > 0) {
                        b.left -= j;
                    } else {
                        b.left = c(b.left - h, b.left);
                    }
                    a.ui.pos._trigger(b, d, "posCollided", "fitLeft");
                },
                top: function(b, d) {
                    a.ui.pos._trigger(b, d, "posCollide", "fitTop");
                    var e = d.within, f = e.isWindow ? e.scrollTop : e.offset.top, g = d.within.height, h = b.top - d.collisionPosition.marginTop, i = f - h, j = h + d.collisionHeight - g - f, k;
                    if (d.collisionHeight > g) {
                        if (i > 0 && j <= 0) {
                            k = b.top + i + d.collisionHeight - g - f;
                            b.top += i - k;
                        } else if (j > 0 && i <= 0) {
                            b.top = f;
                        } else {
                            if (i > j) {
                                b.top = f + g - d.collisionHeight;
                            } else {
                                b.top = f;
                            }
                        }
                    } else if (i > 0) {
                        b.top += i;
                    } else if (j > 0) {
                        b.top -= j;
                    } else {
                        b.top = c(b.top - h, b.top);
                    }
                    a.ui.pos._trigger(b, d, "posCollided", "fitTop");
                }
            },
            flip: {
                left: function(b, c) {
                    a.ui.pos._trigger(b, c, "posCollide", "flipLeft");
                    var e = c.within, f = e.offset.left + e.scrollLeft, g = e.width, h = e.isWindow ? e.scrollLeft : e.offset.left, i = b.left - c.collisionPosition.marginLeft, j = i - h, k = i + c.collisionWidth - g - h, l = c.my[0] === "left" ? -c.elemWidth : c.my[0] === "right" ? c.elemWidth : 0, m = c.at[0] === "left" ? c.targetWidth : c.at[0] === "right" ? -c.targetWidth : 0, n = -2 * c.offset[0], o, p;
                    if (j < 0) {
                        o = b.left + l + m + n + c.collisionWidth - g - f;
                        if (o < 0 || o < d(j)) {
                            b.left += l + m + n;
                        }
                    } else if (k > 0) {
                        p = b.left - c.collisionPosition.marginLeft + l + m + n - h;
                        if (p > 0 || d(p) < k) {
                            b.left += l + m + n;
                        }
                    }
                    a.ui.pos._trigger(b, c, "posCollided", "flipLeft");
                },
                top: function(b, c) {
                    a.ui.pos._trigger(b, c, "posCollide", "flipTop");
                    var e = c.within, f = e.offset.top + e.scrollTop, g = e.height, h = e.isWindow ? e.scrollTop : e.offset.top, i = b.top - c.collisionPosition.marginTop, j = i - h, k = i + c.collisionHeight - g - h, l = c.my[1] === "top", m = l ? -c.elemHeight : c.my[1] === "bottom" ? c.elemHeight : 0, n = c.at[1] === "top" ? c.targetHeight : c.at[1] === "bottom" ? -c.targetHeight : 0, o = -2 * c.offset[1], p, q;
                    if (j < 0) {
                        q = b.top + m + n + o + c.collisionHeight - g - f;
                        if (q < 0 || q < d(j)) {
                            b.top += m + n + o;
                        }
                    } else if (k > 0) {
                        p = b.top - c.collisionPosition.marginTop + m + n + o - h;
                        if (p > 0 || d(p) < k) {
                            b.top += m + n + o;
                        }
                    }
                    a.ui.pos._trigger(b, c, "posCollided", "flipTop");
                }
            },
            flipfit: {
                left: function() {
                    a.ui.pos.flip.left.apply(this, arguments);
                    a.ui.pos.fit.left.apply(this, arguments);
                },
                top: function() {
                    a.ui.pos.flip.top.apply(this, arguments);
                    a.ui.pos.fit.top.apply(this, arguments);
                }
            }
        };
        (function() {
            var b, c, d, e, f, g = document.getElementsByTagName("body")[0], h = document.createElement("div");
            b = document.createElement(g ? "div" : "body");
            d = {
                visibility: "hidden",
                width: 0,
                height: 0,
                border: 0,
                margin: 0,
                background: "none"
            };
            if (g) {
                a.extend(d, {
                    position: "absolute",
                    left: "-1000px",
                    top: "-1000px"
                });
            }
            for (f in d) {
                b.style[f] = d[f];
            }
            b.appendChild(h);
            c = g || document.documentElement;
            c.insertBefore(b, c.firstChild);
            h.style.cssText = "position: absolute; left: 10.7432222px;";
            e = a(h).offset().left;
            a.support.offsetFractions = e > 10 && e < 11;
            b.innerHTML = "";
            c.removeChild(b);
        })();
    })();
    var c = a.ui.position;
});

(function(a) {
    "use strict";
    if (typeof define === "function" && define.amd) {
        define([ "jquery" ], a);
    } else if (window.jQuery && !window.jQuery.fn.iconpicker) {
        a(window.jQuery);
    }
})(function(a) {
    "use strict";
    var b = {
        isEmpty: function(a) {
            return a === false || a === "" || a === null || a === undefined;
        },
        isEmptyObject: function(a) {
            return this.isEmpty(a) === true || a.length === 0;
        },
        isElement: function(b) {
            return a(b).length > 0;
        },
        isString: function(a) {
            return typeof a === "string" || a instanceof String;
        },
        isArray: function(b) {
            return a.isArray(b);
        },
        inArray: function(b, c) {
            return a.inArray(b, c) !== -1;
        },
        throwError: function(a) {
            throw "Font Awesome Icon Picker Exception: " + a;
        }
    };
    var c = function(d, e) {
        this._id = c._idCounter++;
        this.element = a(d).addClass("iconpicker-element");
        this._trigger("iconpickerCreate", {
            iconpickerValue: this.iconpickerValue
        });
        this.options = a.extend({}, c.defaultOptions, this.element.data(), e);
        this.options.templates = a.extend({}, c.defaultOptions.templates, this.options.templates);
        this.options.originalPlacement = this.options.placement;
        this.container = b.isElement(this.options.container) ? a(this.options.container) : false;
        if (this.container === false) {
            if (this.element.is(".dropdown-toggle")) {
                this.container = a("~ .dropdown-menu:first", this.element);
            } else {
                this.container = this.element.is("input,textarea,button,.btn") ? this.element.parent() : this.element;
            }
        }
        this.container.addClass("iconpicker-container");
        if (this.isDropdownMenu()) {
            this.options.placement = "inline";
        }
        this.input = this.element.is("input,textarea") ? this.element.addClass("iconpicker-input") : false;
        if (this.input === false) {
            this.input = this.container.find(this.options.input);
            if (!this.input.is("input,textarea")) {
                this.input = false;
            }
        }
        this.component = this.isDropdownMenu() ? this.container.parent().find(this.options.component) : this.container.find(this.options.component);
        if (this.component.length === 0) {
            this.component = false;
        } else {
            this.component.find("i").addClass("iconpicker-component");
        }
        this._createPopover();
        this._createIconpicker();
        if (this.getAcceptButton().length === 0) {
            this.options.mustAccept = false;
        }
        if (this.isInputGroup()) {
            this.container.parent().append(this.popover);
        } else {
            this.container.append(this.popover);
        }
        this._bindElementEvents();
        this._bindWindowEvents();
        this.update(this.options.selected);
        if (this.isInline()) {
            this.show();
        }
        this._trigger("iconpickerCreated", {
            iconpickerValue: this.iconpickerValue
        });
    };
    c._idCounter = 0;
    c.defaultOptions = {
        title: false,
        selected: false,
        defaultValue: false,
        placement: "bottom",
        collision: "none",
        animation: true,
        hideOnSelect: false,
        showFooter: false,
        searchInFooter: false,
        mustAccept: false,
        selectedCustomClass: "bg-primary",
        icons: [],
        fullClassFormatter: function(a) {
            return a;
        },
        input: "input,.iconpicker-input",
        inputSearch: false,
        container: false,
        component: ".input-group-addon,.iconpicker-component",
        templates: {
            popover: '<div class="iconpicker-popover popover"><div class="arrow"></div>' + '<div class="popover-title"></div><div class="popover-content"></div></div>',
            footer: '<div class="popover-footer"></div>',
            buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' + ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
            search: '<input type="search" class="form-control iconpicker-search" placeholder="Type to filter" />',
            iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
            iconpickerItem: '<a role="button" href="#" class="iconpicker-item"><i></i></a>'
        }
    };
    c.batch = function(b, c) {
        var d = Array.prototype.slice.call(arguments, 2);
        return a(b).each(function() {
            var b = a(this).data("iconpicker");
            if (!!b) {
                b[c].apply(b, d);
            }
        });
    };
    c.prototype = {
        constructor: c,
        options: {},
        _id: 0,
        _trigger: function(b, c) {
            c = c || {};
            this.element.trigger(a.extend({
                type: b,
                iconpickerInstance: this
            }, c));
        },
        _createPopover: function() {
            this.popover = a(this.options.templates.popover);
            var c = this.popover.find(".popover-title");
            if (!!this.options.title) {
                c.append(a('<div class="popover-title-text">' + this.options.title + "</div>"));
            }
            if (this.hasSeparatedSearchInput() && !this.options.searchInFooter) {
                c.append(this.options.templates.search);
            } else if (!this.options.title) {
                c.remove();
            }
            if (this.options.showFooter && !b.isEmpty(this.options.templates.footer)) {
                var d = a(this.options.templates.footer);
                if (this.hasSeparatedSearchInput() && this.options.searchInFooter) {
                    d.append(a(this.options.templates.search));
                }
                if (!b.isEmpty(this.options.templates.buttons)) {
                    d.append(a(this.options.templates.buttons));
                }
                this.popover.append(d);
            }
            if (this.options.animation === true) {
                this.popover.addClass("fade");
            }
            return this.popover;
        },
        _createIconpicker: function() {
            var b = this;
            this.iconpicker = a(this.options.templates.iconpicker);
            var c = function(c) {
                var d = a(this);
                if (d.is("i")) {
                    d = d.parent();
                }
                b._trigger("iconpickerSelect", {
                    iconpickerItem: d,
                    iconpickerValue: b.iconpickerValue
                });
                if (b.options.mustAccept === false) {
                    b.update(d.data("iconpickerValue"));
                    b._trigger("iconpickerSelected", {
                        iconpickerItem: this,
                        iconpickerValue: b.iconpickerValue
                    });
                } else {
                    b.update(d.data("iconpickerValue"), true);
                }
                if (b.options.hideOnSelect && b.options.mustAccept === false) {
                    b.hide();
                }
            };
            for (var d in this.options.icons) {
                if (typeof this.options.icons[d].title === "string") {
                    var e = a(this.options.templates.iconpickerItem);
                    e.find("i").addClass(this.options.fullClassFormatter(this.options.icons[d].title));
                    e.data("iconpickerValue", this.options.icons[d].title).on("click.iconpicker", c);
                    this.iconpicker.find(".iconpicker-items").append(e.attr("title", "." + this.options.icons[d].title));
                    if (this.options.icons[d].searchTerms.length > 0) {
                        var f = "";
                        for (var g = 0; g < this.options.icons[d].searchTerms.length; g++) {
                            f = f + this.options.icons[d].searchTerms[g] + " ";
                        }
                        this.iconpicker.find(".iconpicker-items").append(e.attr("data-search-terms", f));
                    }
                }
            }
            this.popover.find(".popover-content").append(this.iconpicker);
            return this.iconpicker;
        },
        _isEventInsideIconpicker: function(b) {
            var c = a(b.target);
            if ((!c.hasClass("iconpicker-element") || c.hasClass("iconpicker-element") && !c.is(this.element)) && c.parents(".iconpicker-popover").length === 0) {
                return false;
            }
            return true;
        },
        _bindElementEvents: function() {
            var c = this;
            this.getSearchInput().on("keyup.iconpicker", function() {
                c.filter(a(this).val().toLowerCase());
            });
            this.getAcceptButton().on("click.iconpicker", function() {
                var a = c.iconpicker.find(".iconpicker-selected").get(0);
                c.update(c.iconpickerValue);
                c._trigger("iconpickerSelected", {
                    iconpickerItem: a,
                    iconpickerValue: c.iconpickerValue
                });
                if (!c.isInline()) {
                    c.hide();
                }
            });
            this.getCancelButton().on("click.iconpicker", function() {
                if (!c.isInline()) {
                    c.hide();
                }
            });
            this.element.on("focus.iconpicker", function(a) {
                c.show();
                a.stopPropagation();
            });
            if (this.hasComponent()) {
                this.component.on("click.iconpicker", function() {
                    c.toggle();
                });
            }
            if (this.hasInput()) {
                this.input.on("keyup.iconpicker", function(d) {
                    if (!b.inArray(d.keyCode, [ 38, 40, 37, 39, 16, 17, 18, 9, 8, 91, 93, 20, 46, 186, 190, 46, 78, 188, 44, 86 ])) {
                        c.update();
                    } else {
                        c._updateFormGroupStatus(c.getValid(this.value) !== false);
                    }
                    if (c.options.inputSearch === true) {
                        c.filter(a(this).val().toLowerCase());
                    }
                });
            }
        },
        _bindWindowEvents: function() {
            var b = a(window.document);
            var c = this;
            var d = ".iconpicker.inst" + this._id;
            a(window).on("resize.iconpicker" + d + " orientationchange.iconpicker" + d, function(a) {
                if (c.popover.hasClass("in")) {
                    c.updatePlacement();
                }
            });
            if (!c.isInline()) {
                b.on("mouseup" + d, function(a) {
                    if (!c._isEventInsideIconpicker(a) && !c.isInline()) {
                        c.hide();
                    }
                });
            }
        },
        _unbindElementEvents: function() {
            this.popover.off(".iconpicker");
            this.element.off(".iconpicker");
            if (this.hasInput()) {
                this.input.off(".iconpicker");
            }
            if (this.hasComponent()) {
                this.component.off(".iconpicker");
            }
            if (this.hasContainer()) {
                this.container.off(".iconpicker");
            }
        },
        _unbindWindowEvents: function() {
            a(window).off(".iconpicker.inst" + this._id);
            a(window.document).off(".iconpicker.inst" + this._id);
        },
        updatePlacement: function(b, c) {
            b = b || this.options.placement;
            this.options.placement = b;
            c = c || this.options.collision;
            c = c === true ? "flip" : c;
            var d = {
                at: "right bottom",
                my: "right top",
                of: this.hasInput() && !this.isInputGroup() ? this.input : this.container,
                collision: c === true ? "flip" : c,
                within: window
            };
            this.popover.removeClass("inline topLeftCorner topLeft top topRight topRightCorner " + "rightTop right rightBottom bottomRight bottomRightCorner " + "bottom bottomLeft bottomLeftCorner leftBottom left leftTop");
            if (typeof b === "object") {
                return this.popover.pos(a.extend({}, d, b));
            }
            switch (b) {
                case "inline":
                {
                    d = false;
                }
                    break;

                case "topLeftCorner":
                {
                    d.my = "right bottom";
                    d.at = "left top";
                }
                    break;

                case "topLeft":
                {
                    d.my = "left bottom";
                    d.at = "left top";
                }
                    break;

                case "top":
                {
                    d.my = "center bottom";
                    d.at = "center top";
                }
                    break;

                case "topRight":
                {
                    d.my = "right bottom";
                    d.at = "right top";
                }
                    break;

                case "topRightCorner":
                {
                    d.my = "left bottom";
                    d.at = "right top";
                }
                    break;

                case "rightTop":
                {
                    d.my = "left bottom";
                    d.at = "right center";
                }
                    break;

                case "right":
                {
                    d.my = "left center";
                    d.at = "right center";
                }
                    break;

                case "rightBottom":
                {
                    d.my = "left top";
                    d.at = "right center";
                }
                    break;

                case "bottomRightCorner":
                {
                    d.my = "left top";
                    d.at = "right bottom";
                }
                    break;

                case "bottomRight":
                {
                    d.my = "right top";
                    d.at = "right bottom";
                }
                    break;

                case "bottom":
                {
                    d.my = "center top";
                    d.at = "center bottom";
                }
                    break;

                case "bottomLeft":
                {
                    d.my = "left top";
                    d.at = "left bottom";
                }
                    break;

                case "bottomLeftCorner":
                {
                    d.my = "right top";
                    d.at = "left bottom";
                }
                    break;

                case "leftBottom":
                {
                    d.my = "right top";
                    d.at = "left center";
                }
                    break;

                case "left":
                {
                    d.my = "right center";
                    d.at = "left center";
                }
                    break;

                case "leftTop":
                {
                    d.my = "right bottom";
                    d.at = "left center";
                }
                    break;

                default:
                {
                    return false;
                }
                    break;
            }
            this.popover.css({
                display: this.options.placement === "inline" ? "" : "block"
            });
            if (d !== false) {
                this.popover.pos(d).css("maxWidth", a(window).width() - this.container.offset().left - 5);
            } else {
                this.popover.css({
                    top: "auto",
                    right: "auto",
                    bottom: "auto",
                    left: "auto",
                    maxWidth: "none"
                });
            }
            this.popover.addClass(this.options.placement);
            return true;
        },
        _updateComponents: function() {
            this.iconpicker.find(".iconpicker-item.iconpicker-selected").removeClass("iconpicker-selected " + this.options.selectedCustomClass);
            if (this.iconpickerValue) {
                this.iconpicker.find("." + this.options.fullClassFormatter(this.iconpickerValue).replace(/ /g, ".")).parent().addClass("iconpicker-selected " + this.options.selectedCustomClass);
            }
            if (this.hasComponent()) {
                var a = this.component.find("i");
                if (a.length > 0) {
                    a.attr("class", this.options.fullClassFormatter(this.iconpickerValue));
                } else {
                    this.component.html(this.getHtml());
                }
            }
        },
        _updateFormGroupStatus: function(a) {
            if (this.hasInput()) {
                if (a !== false) {
                    this.input.parents(".form-group:first").removeClass("has-error");
                } else {
                    this.input.parents(".form-group:first").addClass("has-error");
                }
                return true;
            }
            return false;
        },
        getValid: function(c) {
            if (!b.isString(c)) {
                c = "";
            }
            var d = c === "";
            c = a.trim(c);
            var e = false;
            for (var f = 0; f < this.options.icons.length; f++) {
                if (this.options.icons[f].title === c) {
                    e = true;
                    break;
                }
            }
            if (e || d) {
                return c;
            }
            return false;
        },
        setValue: function(a) {
            var b = this.getValid(a);
            if (b !== false) {
                this.iconpickerValue = b;
                this._trigger("iconpickerSetValue", {
                    iconpickerValue: b
                });
                return this.iconpickerValue;
            } else {
                this._trigger("iconpickerInvalid", {
                    iconpickerValue: a
                });
                return false;
            }
        },
        getHtml: function() {
            return '<i class="' + this.options.fullClassFormatter(this.iconpickerValue) + '"></i>';
        },
        setSourceValue: function(a) {
            a = this.setValue(a);
            if (a !== false && a !== "") {
                if (this.hasInput()) {
                    this.input.val(this.iconpickerValue);
                } else {
                    this.element.data("iconpickerValue", this.iconpickerValue);
                }
                this._trigger("iconpickerSetSourceValue", {
                    iconpickerValue: a
                });
            }
            return a;
        },
        getSourceValue: function(a) {
            a = a || this.options.defaultValue;
            var b = a;
            if (this.hasInput()) {
                b = this.input.val();
            } else {
                b = this.element.data("iconpickerValue");
            }
            if (b === undefined || b === "" || b === null || b === false) {
                b = a;
            }
            return b;
        },
        hasInput: function() {
            return this.input !== false;
        },
        isInputSearch: function() {
            return this.hasInput() && this.options.inputSearch === true;
        },
        isInputGroup: function() {
            return this.container.is(".input-group");
        },
        isDropdownMenu: function() {
            return this.container.is(".dropdown-menu");
        },
        hasSeparatedSearchInput: function() {
            return this.options.templates.search !== false && !this.isInputSearch();
        },
        hasComponent: function() {
            return this.component !== false;
        },
        hasContainer: function() {
            return this.container !== false;
        },
        getAcceptButton: function() {
            return this.popover.find(".iconpicker-btn-accept");
        },
        getCancelButton: function() {
            return this.popover.find(".iconpicker-btn-cancel");
        },
        getSearchInput: function() {
            return this.popover.find(".iconpicker-search");
        },
        filter: function(c) {
            if (b.isEmpty(c)) {
                this.iconpicker.find(".iconpicker-item").show();
                return a(false);
            } else {
                var d = [];
                this.iconpicker.find(".iconpicker-item").each(function() {
                    var b = a(this);
                    var e = b.attr("title").toLowerCase();
                    var f = b.attr("data-search-terms") ? b.attr("data-search-terms").toLowerCase() : "";
                    e = e + " " + f;
                    var g = false;
                    try {
                        g = new RegExp("(^|\\W)" + c, "g");
                    } catch (a) {
                        g = false;
                    }
                    if (g !== false && e.match(g)) {
                        d.push(b);
                        b.show();
                    } else {
                        b.hide();
                    }
                });
                return d;
            }
        },
        show: function() {
            if (this.popover.hasClass("in")) {
                return false;
            }
            a.iconpicker.batch(a(".iconpicker-popover.in:not(.inline)").not(this.popover), "hide");
            this._trigger("iconpickerShow", {
                iconpickerValue: this.iconpickerValue
            });
            this.updatePlacement();
            this.popover.addClass("in");
            setTimeout(a.proxy(function() {
                this.popover.css("display", this.isInline() ? "" : "block");
                this._trigger("iconpickerShown", {
                    iconpickerValue: this.iconpickerValue
                });
            }, this), this.options.animation ? 300 : 1);
        },
        hide: function() {
            if (!this.popover.hasClass("in")) {
                return false;
            }
            this._trigger("iconpickerHide", {
                iconpickerValue: this.iconpickerValue
            });
            this.popover.removeClass("in");
            setTimeout(a.proxy(function() {
                this.popover.css("display", "none");
                this.getSearchInput().val("");
                this.filter("");
                this._trigger("iconpickerHidden", {
                    iconpickerValue: this.iconpickerValue
                });
            }, this), this.options.animation ? 300 : 1);
        },
        toggle: function() {
            if (this.popover.is(":visible")) {
                this.hide();
            } else {
                this.show(true);
            }
        },
        update: function(a, b) {
            a = a ? a : this.getSourceValue(this.iconpickerValue);
            this._trigger("iconpickerUpdate", {
                iconpickerValue: this.iconpickerValue
            });
            if (b === true) {
                a = this.setValue(a);
            } else {
                a = this.setSourceValue(a);
                this._updateFormGroupStatus(a !== false);
            }
            if (a !== false) {
                this._updateComponents();
            }
            this._trigger("iconpickerUpdated", {
                iconpickerValue: this.iconpickerValue
            });
            return a;
        },
        destroy: function() {
            this._trigger("iconpickerDestroy", {
                iconpickerValue: this.iconpickerValue
            });
            this.element.removeData("iconpicker").removeData("iconpickerValue").removeClass("iconpicker-element");
            this._unbindElementEvents();
            this._unbindWindowEvents();
            a(this.popover).remove();
            this._trigger("iconpickerDestroyed", {
                iconpickerValue: this.iconpickerValue
            });
        },
        disable: function() {
            if (this.hasInput()) {
                this.input.prop("disabled", true);
                return true;
            }
            return false;
        },
        enable: function() {
            if (this.hasInput()) {
                this.input.prop("disabled", false);
                return true;
            }
            return false;
        },
        isDisabled: function() {
            if (this.hasInput()) {
                return this.input.prop("disabled") === true;
            }
            return false;
        },
        isInline: function() {
            return this.options.placement === "inline" || this.popover.hasClass("inline");
        }
    };
    a.iconpicker = c;
    a.fn.iconpicker = function(b) {
        return this.each(function() {
            var d = a(this);
            if (!d.data("iconpicker")) {
                d.data("iconpicker", new c(this, typeof b === "object" ? b : {}));
            }
        });
    };
    c.defaultOptions = a.extend(c.defaultOptions, {
        icons: [
            { title: 'icofont-bathtub', searchTerms: [] }, { title: 'icofont-bow', searchTerms: [] }, { title: 'icofont-castle', searchTerms: [] }, { title: 'icofont-circuit', searchTerms: [] }, { title: 'icofont-dart', searchTerms: [] }, { title: 'icofont-love', searchTerms: [] }, { title: 'icofont-phoenix', searchTerms: [] }, { title: 'icofont-snowmobile', searchTerms: [] }, { title: 'icofont-swirl', searchTerms: [] }, { title: 'icofont-throne', searchTerms: [] }, { title: 'icofont-triangle', searchTerms: [] }, { title: 'icofont-weed', searchTerms: [] }, { title: 'icofont-bat', searchTerms: [] }, { title: 'icofont-birds', searchTerms: [] }, { title: 'icofont-bone', searchTerms: [] }, { title: 'icofont-crab', searchTerms: [] }, { title: 'icofont-crocodile', searchTerms: [] }, { title: 'icofont-dolphin', searchTerms: [] }, { title: 'icofont-elk', searchTerms: [] }, { title: 'icofont-froggy', searchTerms: [] }, { title: 'icofont-gorilla', searchTerms: [] }, { title: 'icofont-jellyfish', searchTerms: [] }, { title: 'icofont-kangaroo', searchTerms: [] }, { title: 'icofont-lemur', searchTerms: [] }, { title: 'icofont-panther', searchTerms: [] }, { title: 'icofont-paw', searchTerms: [] }, { title: 'icofont-pelican', searchTerms: [] }, { title: 'icofont-rabbit', searchTerms: [] }, { title: 'icofont-rat', searchTerms: [] }, { title: 'icofont-rooster', searchTerms: [] }, { title: 'icofont-seahorse', searchTerms: [] }, { title: 'icofont-seal', searchTerms: [] }, { title: 'icofont-snake', searchTerms: [] }, { title: 'icofont-squid', searchTerms: [] }, { title: 'icofont-squirrel', searchTerms: [] }, { title: 'icofont-turtle', searchTerms: [] }, { title: 'icofont-whale', searchTerms: [] }, { title: 'icofont-woodpecker', searchTerms: [] }, { title: 'icofont-zebra', searchTerms: [] }, { title: 'icofont-barcode', searchTerms: [] }, { title: 'icofont-billboard', searchTerms: [] }, { title: 'icofont-businessman', searchTerms: [] }, { title: 'icofont-businesswoman', searchTerms: [] }, { title: 'icofont-chair', searchTerms: [] }, { title: 'icofont-coins', searchTerms: [] }, { title: 'icofont-company', searchTerms: [] }, { title: 'icofont-stamp', searchTerms: [] }, { title: 'icofont-barricade', searchTerms: [] }, { title: 'icofont-bolt', searchTerms: [] }, { title: 'icofont-bricks', searchTerms: [] }, { title: 'icofont-calculations', searchTerms: [] }, { title: 'icofont-drill', searchTerms: [] }, { title: 'icofont-engineer', searchTerms: [] }, { title: 'icofont-labour', searchTerms: [] }, { title: 'icofont-mining', searchTerms: [] }, { title: 'icofont-pollution', searchTerms: [] }, { title: 'icofont-saw', searchTerms: [] }, { title: 'icofont-trolley', searchTerms: [] }, { title: 'icofont-trowel', searchTerms: [] }, { title: 'icofont-worker', searchTerms: [] }, { title: 'icofont-wrench', searchTerms: [] }, { title: 'icofont-earphone', searchTerms: [] }, { title: 'icofont-imac', searchTerms: [] }, { title: 'icofont-ipad', searchTerms: [] }, { title: 'icofont-iphone', searchTerms: [] }, { title: 'icofont-macbook', searchTerms: [] }, { title: 'icofont-monitor', searchTerms: [] }, { title: 'icofont-mouse', searchTerms: [] }, { title: 'icofont-nintendo', searchTerms: [] }, { title: 'icofont-psvita', searchTerms: [] }, { title: 'icofont-refrigerator', searchTerms: [] }, { title: 'icofont-collapse', searchTerms: [] }, { title: 'icofont-abc', searchTerms: [] }, { title: 'icofont-atom', searchTerms: [] }, { title: 'icofont-award', searchTerms: [] }, { title: 'icofont-brainstorming', searchTerms: [] }, { title: 'icofont-education', searchTerms: [] }, { title: 'icofont-electron', searchTerms: [] }, { title: 'icofont-instrument', searchTerms: [] }, { title: 'icofont-teacher', searchTerms: [] }, { title: 'icofont-university', searchTerms: [] }, { title: 'icofont-astonished', searchTerms: [] }, { title: 'icofont-confounded', searchTerms: [] }, { title: 'icofont-confused', searchTerms: [] }, { title: 'icofont-crying', searchTerms: [] }, { title: 'icofont-dizzy', searchTerms: [] }, { title: 'icofont-expressionless', searchTerms: [] }, { title: 'icofont-laughing', searchTerms: [] }, { title: 'icofont-rage', searchTerms: [] }, { title: 'icofont-sad', searchTerms: [] }, { title: 'icofont-smirk', searchTerms: [] }, { title: 'icofont-worried', searchTerms: [] }, { title: 'icofont-dumbbell', searchTerms: [] }, { title: 'icofont-dumbbells', searchTerms: [] }, { title: 'icofont-artichoke', searchTerms: [] }, { title: 'icofont-asparagus', searchTerms: [] }, { title: 'icofont-avocado', searchTerms: [] }, { title: 'icofont-banana', searchTerms: [] }, { title: 'icofont-bbq', searchTerms: [] }, { title: 'icofont-beans', searchTerms: [] }, { title: 'icofont-beer', searchTerms: [] }, { title: 'icofont-bread', searchTerms: [] }, { title: 'icofont-broccoli', searchTerms: [] }, { title: 'icofont-burger', searchTerms: [] }, { title: 'icofont-cabbage', searchTerms: [] }, { title: 'icofont-carrot', searchTerms: [] }, { title: 'icofont-cheese', searchTerms: [] }, { title: 'icofont-chef', searchTerms: [] }, { title: 'icofont-cherry', searchTerms: [] }, { title: 'icofont-cocktail', searchTerms: [] }, { title: 'icofont-cola', searchTerms: [] }, { title: 'icofont-corn', searchTerms: [] }, { title: 'icofont-croissant', searchTerms: [] }, { title: 'icofont-cucumber', searchTerms: [] }, { title: 'icofont-culinary', searchTerms: [] }, { title: 'icofont-donut', searchTerms: [] }, { title: 'icofont-fruits', searchTerms: [] }, { title: 'icofont-grapes', searchTerms: [] }, { title: 'icofont-honey', searchTerms: [] }, { title: 'icofont-juice', searchTerms: [] }, { title: 'icofont-ketchup', searchTerms: [] }, { title: 'icofont-kiwi', searchTerms: [] }, { title: 'icofont-lobster', searchTerms: [] }, { title: 'icofont-mango', searchTerms: [] }, { title: 'icofont-milk', searchTerms: [] }, { title: 'icofont-mushroom', searchTerms: [] }, { title: 'icofont-noodles', searchTerms: [] }, { title: 'icofont-onion', searchTerms: [] }, { title: 'icofont-orange', searchTerms: [] }, { title: 'icofont-pear', searchTerms: [] }, { title: 'icofont-peas', searchTerms: [] }, { title: 'icofont-pepper', searchTerms: [] }, { title: 'icofont-pineapple', searchTerms: [] }, { title: 'icofont-plant', searchTerms: [] }, { title: 'icofont-popcorn', searchTerms: [] }, { title: 'icofont-potato', searchTerms: [] }, { title: 'icofont-pumpkin', searchTerms: [] }, { title: 'icofont-raddish', searchTerms: [] }, { title: 'icofont-sandwich', searchTerms: [] }, { title: 'icofont-sausage', searchTerms: [] }, { title: 'icofont-steak', searchTerms: [] }, { title: 'icofont-strawberry', searchTerms: [] }, { title: 'icofont-sushi', searchTerms: [] }, { title: 'icofont-taco', searchTerms: [] }, { title: 'icofont-tomato', searchTerms: [] }, { title: 'icofont-watermelon', searchTerms: [] }, { title: 'icofont-wheat', searchTerms: [] }, { title: 'icofont-candy', searchTerms: [] }, { title: 'icofont-burglar', searchTerms: [] }, { title: 'icofont-gavel', searchTerms: [] }, { title: 'icofont-investigation', searchTerms: [] }, { title: 'icofont-investigator', searchTerms: [] }, { title: 'icofont-jail', searchTerms: [] }, { title: 'icofont-judge', searchTerms: [] }, { title: 'icofont-legal', searchTerms: [] }, { title: 'icofont-pistol', searchTerms: [] }, { title: 'icofont-math', searchTerms: [] }, { title: 'icofont-aids', searchTerms: [] }, { title: 'icofont-autism', searchTerms: [] }, { title: 'icofont-bandage', searchTerms: [] }, { title: 'icofont-blind', searchTerms: [] }, { title: 'icofont-capsule', searchTerms: [] }, { title: 'icofont-crutch', searchTerms: [] }, { title: 'icofont-disabled', searchTerms: [] }, { title: 'icofont-heartbeat', searchTerms: [] }, { title: 'icofont-herbal', searchTerms: [] }, { title: 'icofont-hospital', searchTerms: [] }, { title: 'icofont-icu', searchTerms: [] }, { title: 'icofont-laboratory', searchTerms: [] }, { title: 'icofont-pills', searchTerms: [] }, { title: 'icofont-prescription', searchTerms: [] }, { title: 'icofont-pulse', searchTerms: [] }, { title: 'icofont-stretcher', searchTerms: [] }, { title: 'icofont-tablets', searchTerms: [] }, { title: 'icofont-tooth', searchTerms: [] }, { title: 'icofont-xray', searchTerms: [] }, { title: 'icofont-forward', searchTerms: [] }, { title: 'icofont-guiter', searchTerms: [] }, { title: 'icofont-movie', searchTerms: [] }, { title: 'icofont-multimedia', searchTerms: [] }, { title: 'icofont-pause', searchTerms: [] }, { title: 'icofont-record', searchTerms: [] }, { title: 'icofont-rewind', searchTerms: [] }, { title: 'icofont-stop', searchTerms: [] }, { title: 'icofont-boy', searchTerms: [] }, { title: 'icofont-female', searchTerms: [] }, { title: 'icofont-kid', searchTerms: [] }, { title: 'icofont-people', searchTerms: [] }, { title: 'icofont-500px', searchTerms: [] }, { title: 'icofont-aim', searchTerms: [] }, { title: 'icofont-badoo', searchTerms: [] }, { title: 'icofont-bebo', searchTerms: [] }, { title: 'icofont-behance', searchTerms: [] }, { title: 'icofont-blogger', searchTerms: [] }, { title: 'icofont-bootstrap', searchTerms: [] }, { title: 'icofont-brightkite', searchTerms: [] }, { title: 'icofont-cloudapp', searchTerms: [] }, { title: 'icofont-concrete5', searchTerms: [] }, { title: 'icofont-delicious', searchTerms: [] }, { title: 'icofont-designbump', searchTerms: [] }, { title: 'icofont-designfloat', searchTerms: [] }, { title: 'icofont-deviantart', searchTerms: [] }, { title: 'icofont-digg', searchTerms: [] }, { title: 'icofont-dotcms', searchTerms: [] }, { title: 'icofont-dribbble', searchTerms: [] }, { title: 'icofont-dribble', searchTerms: [] }, { title: 'icofont-dropbox', searchTerms: [] }, { title: 'icofont-ebuddy', searchTerms: [] }, { title: 'icofont-ello', searchTerms: [] }, { title: 'icofont-ember', searchTerms: [] }, { title: 'icofont-envato', searchTerms: [] }, { title: 'icofont-evernote', searchTerms: [] }, { title: 'icofont-feedburner', searchTerms: [] }, { title: 'icofont-flikr', searchTerms: [] }, { title: 'icofont-folkd', searchTerms: [] }, { title: 'icofont-foursquare', searchTerms: [] }, { title: 'icofont-friendfeed', searchTerms: [] }, { title: 'icofont-ghost', searchTerms: [] }, { title: 'icofont-github', searchTerms: [] }, { title: 'icofont-gnome', searchTerms: [] }, { title: 'icofont-instagram', searchTerms: [] }, { title: 'icofont-kakaotalk', searchTerms: [] }, { title: 'icofont-kickstarter', searchTerms: [] }, { title: 'icofont-kik', searchTerms: [] }, { title: 'icofont-kiwibox', searchTerms: [] }, { title: 'icofont-linkedin', searchTerms: [] }, { title: 'icofont-livejournal', searchTerms: [] }, { title: 'icofont-magento', searchTerms: [] }, { title: 'icofont-meetme', searchTerms: [] }, { title: 'icofont-meetup', searchTerms: [] }, { title: 'icofont-mixx', searchTerms: [] }, { title: 'icofont-newsvine', searchTerms: [] }, { title: 'icofont-nimbuss', searchTerms: [] }, { title: 'icofont-odnoklassniki', searchTerms: [] }, { title: 'icofont-opencart', searchTerms: [] }, { title: 'icofont-oscommerce', searchTerms: [] }, { title: 'icofont-pandora', searchTerms: [] }, { title: 'icofont-photobucket', searchTerms: [] }, { title: 'icofont-picasa', searchTerms: [] }, { title: 'icofont-pinterest', searchTerms: [] }, { title: 'icofont-prestashop', searchTerms: [] }, { title: 'icofont-qik', searchTerms: [] }, { title: 'icofont-qq', searchTerms: [] }, { title: 'icofont-readernaut', searchTerms: [] }, { title: 'icofont-reddit', searchTerms: [] }, { title: 'icofont-renren', searchTerms: [] }, { title: 'icofont-shopify', searchTerms: [] }, { title: 'icofont-silverstripe', searchTerms: [] }, { title: 'icofont-skype', searchTerms: [] }, { title: 'icofont-slack', searchTerms: [] }, { title: 'icofont-slashdot', searchTerms: [] }, { title: 'icofont-slidshare', searchTerms: [] }, { title: 'icofont-smugmug', searchTerms: [] }, { title: 'icofont-snapchat', searchTerms: [] }, { title: 'icofont-soundcloud', searchTerms: [] }, { title: 'icofont-spotify', searchTerms: [] }, { title: 'icofont-steam', searchTerms: [] }, { title: 'icofont-stumbleupon', searchTerms: [] }, { title: 'icofont-tagged', searchTerms: [] }, { title: 'icofont-technorati', searchTerms: [] }, { title: 'icofont-telegram', searchTerms: [] }, { title: 'icofont-tinder', searchTerms: [] }, { title: 'icofont-trello', searchTerms: [] }, { title: 'icofont-tumblr', searchTerms: [] }, { title: 'icofont-twitch', searchTerms: [] }, { title: 'icofont-twitter', searchTerms: [] }, { title: 'icofont-typo3', searchTerms: [] }, { title: 'icofont-ubercart', searchTerms: [] }, { title: 'icofont-viber', searchTerms: [] }, { title: 'icofont-viddler', searchTerms: [] }, { title: 'icofont-vimeo', searchTerms: [] }, { title: 'icofont-vine', searchTerms: [] }, { title: 'icofont-virb', searchTerms: [] }, { title: 'icofont-virtuemart', searchTerms: [] }, { title: 'icofont-vk', searchTerms: [] }, { title: 'icofont-wechat', searchTerms: [] }, { title: 'icofont-weibo', searchTerms: [] }, { title: 'icofont-whatsapp', searchTerms: [] }, { title: 'icofont-xing', searchTerms: [] }, { title: 'icofont-yahoo', searchTerms: [] }, { title: 'icofont-yelp', searchTerms: [] }, { title: 'icofont-youku', searchTerms: [] }, { title: 'icofont-zencart', searchTerms: [] }, { title: 'icofont-baseball', searchTerms: [] }, { title: 'icofont-baseballer', searchTerms: [] }, { title: 'icofont-canoe', searchTerms: [] }, { title: 'icofont-climbing', searchTerms: [] }, { title: 'icofont-corner', searchTerms: [] }, { title: 'icofont-foul', searchTerms: [] }, { title: 'icofont-golfer', searchTerms: [] }, { title: 'icofont-helmet', searchTerms: [] }, { title: 'icofont-jumping', searchTerms: [] }, { title: 'icofont-kick', searchTerms: [] }, { title: 'icofont-leg', searchTerms: [] }, { title: 'icofont-offside', searchTerms: [] }, { title: 'icofont-padding', searchTerms: [] }, { title: 'icofont-racer', searchTerms: [] }, { title: 'icofont-referee', searchTerms: [] }, { title: 'icofont-steering', searchTerms: [] }, { title: 'icofont-stopwatch', searchTerms: [] }, { title: 'icofont-substitute', searchTerms: [] }, { title: 'icofont-swimmer', searchTerms: [] }, { title: 'icofont-tracking', searchTerms: [] }, { title: 'icofont-bold', searchTerms: [] }, { title: 'icofont-brush', searchTerms: [] }, { title: 'icofont-cut', searchTerms: [] }, { title: 'icofont-font', searchTerms: [] }, { title: 'icofont-heading', searchTerms: [] }, { title: 'icofont-indent', searchTerms: [] }, { title: 'icofont-outdent', searchTerms: [] }, { title: 'icofont-paragraph', searchTerms: [] }, { title: 'icofont-pin', searchTerms: [] }, { title: 'icofont-printer', searchTerms: [] }, { title: 'icofont-redo', searchTerms: [] }, { title: 'icofont-rotation', searchTerms: [] }, { title: 'icofont-save', searchTerms: [] }, { title: 'icofont-subscript', searchTerms: [] }, { title: 'icofont-superscript', searchTerms: [] }, { title: 'icofont-trash', searchTerms: [] }, { title: 'icofont-underline', searchTerms: [] }, { title: 'icofont-undo', searchTerms: [] }, { title: 'icofont-cab', searchTerms: [] }, { title: 'icofont-helicopter', searchTerms: [] }, { title: 'icofont-rickshaw', searchTerms: [] }, { title: 'icofont-scooter', searchTerms: [] }, { title: 'icofont-taxi', searchTerms: [] }, { title: 'icofont-tractor', searchTerms: [] }, { title: 'icofont-tram', searchTerms: [] }, { title: 'icofont-yacht', searchTerms: [] }, { title: 'icofont-travelling', searchTerms: [] }, { title: 'icofont-breakdown', searchTerms: [] }, { title: 'icofont-celsius', searchTerms: [] }, { title: 'icofont-clouds', searchTerms: [] }, { title: 'icofont-cloudy', searchTerms: [] }, { title: 'icofont-dust', searchTerms: [] }, { title: 'icofont-eclipse', searchTerms: [] }, { title: 'icofont-fahrenheit', searchTerms: [] }, { title: 'icofont-hurricane', searchTerms: [] }, { title: 'icofont-meteor', searchTerms: [] }, { title: 'icofont-night', searchTerms: [] }, { title: 'icofont-tornado', searchTerms: [] }, { title: 'icofont-volcano', searchTerms: [] }, { title: 'icofont-wave', searchTerms: [] }, { title: 'icofont-addons', searchTerms: [] }, { title: 'icofont-adjust', searchTerms: [] }, { title: 'icofont-alarm', searchTerms: [] }, { title: 'icofont-anchor', searchTerms: [] }, { title: 'icofont-archive', searchTerms: [] }, { title: 'icofont-at', searchTerms: [] }, { title: 'icofont-attachment', searchTerms: [] }, { title: 'icofont-audio', searchTerms: [] }, { title: 'icofont-automation', searchTerms: [] }, { title: 'icofont-badge', searchTerms: [] }, { title: 'icofont-ban', searchTerms: [] }, { title: 'icofont-bars', searchTerms: [] }, { title: 'icofont-basket', searchTerms: [] }, { title: 'icofont-beaker', searchTerms: [] }, { title: 'icofont-beard', searchTerms: [] }, { title: 'icofont-bed', searchTerms: [] }, { title: 'icofont-beverage', searchTerms: [] }, { title: 'icofont-bin', searchTerms: [] }, { title: 'icofont-binary', searchTerms: [] }, { title: 'icofont-binoculars', searchTerms: [] }, { title: 'icofont-bluetooth', searchTerms: [] }, { title: 'icofont-bomb', searchTerms: [] }, { title: 'icofont-box', searchTerms: [] }, { title: 'icofont-broken', searchTerms: [] }, { title: 'icofont-bucket', searchTerms: [] }, { title: 'icofont-bucket1', searchTerms: [] }, { title: 'icofont-bucket2', searchTerms: [] }, { title: 'icofont-bug', searchTerms: [] }, { title: 'icofont-bullet', searchTerms: [] }, { title: 'icofont-bullhorn', searchTerms: [] }, { title: 'icofont-bullseye', searchTerms: [] }, { title: 'icofont-calendar', searchTerms: [] }, { title: 'icofont-card', searchTerms: [] }, { title: 'icofont-charging', searchTerms: [] }, { title: 'icofont-chat', searchTerms: [] }, { title: 'icofont-checked', searchTerms: [] }, { title: 'icofont-comment', searchTerms: [] }, { title: 'icofont-computer', searchTerms: [] }, { title: 'icofont-connection', searchTerms: [] }, { title: 'icofont-console', searchTerms: [] }, { title: 'icofont-contacts', searchTerms: [] }, { title: 'icofont-contrast', searchTerms: [] }, { title: 'icofont-copyright', searchTerms: [] }, { title: 'icofont-cube', searchTerms: [] }, { title: 'icofont-cubes', searchTerms: [] }, { title: 'icofont-data', searchTerms: [] }, { title: 'icofont-diamond', searchTerms: [] }, { title: 'icofont-disc', searchTerms: [] }, { title: 'icofont-diskette', searchTerms: [] }, { title: 'icofont-downloaded', searchTerms: [] }, { title: 'icofont-drag', searchTerms: [] }, { title: 'icofont-drag1', searchTerms: [] }, { title: 'icofont-drag2', searchTerms: [] }, { title: 'icofont-drag3', searchTerms: [] }, { title: 'icofont-earth', searchTerms: [] }, { title: 'icofont-ebook', searchTerms: [] }, { title: 'icofont-eject', searchTerms: [] }, { title: 'icofont-email', searchTerms: [] }, { title: 'icofont-error', searchTerms: [] }, { title: 'icofont-excavator', searchTerms: [] }, { title: 'icofont-exchange', searchTerms: [] }, { title: 'icofont-exit', searchTerms: [] }, { title: 'icofont-favourite', searchTerms: [] }, { title: 'icofont-fax', searchTerms: [] }, { title: 'icofont-film', searchTerms: [] }, { title: 'icofont-filter', searchTerms: [] }, { title: 'icofont-flask', searchTerms: [] }, { title: 'icofont-focus', searchTerms: [] }, { title: 'icofont-garbage', searchTerms: [] }, { title: 'icofont-gears', searchTerms: [] }, { title: 'icofont-glass', searchTerms: [] }, { title: 'icofont-graffiti', searchTerms: [] }, { title: 'icofont-grocery', searchTerms: [] }, { title: 'icofont-hanger', searchTerms: [] }, { title: 'icofont-history', searchTerms: [] }, { title: 'icofont-home', searchTerms: [] }, { title: 'icofont-horn', searchTerms: [] }, { title: 'icofont-image', searchTerms: [] }, { title: 'icofont-inbox', searchTerms: [] }, { title: 'icofont-infinite', searchTerms: [] }, { title: 'icofont-institution', searchTerms: [] }, { title: 'icofont-interface', searchTerms: [] }, { title: 'icofont-invisible', searchTerms: [] }, { title: 'icofont-jacket', searchTerms: [] }, { title: 'icofont-jar', searchTerms: [] }, { title: 'icofont-jewlery', searchTerms: [] }, { title: 'icofont-karate', searchTerms: [] }, { title: 'icofont-label', searchTerms: [] }, { title: 'icofont-layers', searchTerms: [] }, { title: 'icofont-layout', searchTerms: [] }, { title: 'icofont-leaf', searchTerms: [] }, { title: 'icofont-leaflet', searchTerms: [] }, { title: 'icofont-learn', searchTerms: [] }, { title: 'icofont-lego', searchTerms: [] }, { title: 'icofont-lens', searchTerms: [] }, { title: 'icofont-letter', searchTerms: [] }, { title: 'icofont-letterbox', searchTerms: [] }, { title: 'icofont-library', searchTerms: [] }, { title: 'icofont-license', searchTerms: [] }, { title: 'icofont-lighter', searchTerms: [] }, { title: 'icofont-like', searchTerms: [] }, { title: 'icofont-list', searchTerms: [] }, { title: 'icofont-listening', searchTerms: [] }, { title: 'icofont-lock', searchTerms: [] }, { title: 'icofont-login', searchTerms: [] }, { title: 'icofont-logout', searchTerms: [] }, { title: 'icofont-lollipop', searchTerms: [] }, { title: 'icofont-look', searchTerms: [] }, { title: 'icofont-loop', searchTerms: [] }, { title: 'icofont-luggage', searchTerms: [] }, { title: 'icofont-lunch', searchTerms: [] }, { title: 'icofont-lungs', searchTerms: [] }, { title: 'icofont-magnet', searchTerms: [] }, { title: 'icofont-male', searchTerms: [] }, { title: 'icofont-maximize', searchTerms: [] }, { title: 'icofont-measure', searchTerms: [] }, { title: 'icofont-medicine', searchTerms: [] }, { title: 'icofont-memorial', searchTerms: [] }, { title: 'icofont-military', searchTerms: [] }, { title: 'icofont-mill', searchTerms: [] }, { title: 'icofont-molecule', searchTerms: [] }, { title: 'icofont-moon', searchTerms: [] }, { title: 'icofont-mop', searchTerms: [] }, { title: 'icofont-muffin', searchTerms: [] }, { title: 'icofont-mustache', searchTerms: [] }, { title: 'icofont-news', searchTerms: [] }, { title: 'icofont-newspaper', searchTerms: [] }, { title: 'icofont-notebook', searchTerms: [] }, { title: 'icofont-notepad', searchTerms: [] }, { title: 'icofont-notification', searchTerms: [] }, { title: 'icofont-numbered', searchTerms: [] }, { title: 'icofont-opposite', searchTerms: [] }, { title: 'icofont-optic', searchTerms: [] }, { title: 'icofont-options', searchTerms: [] }, { title: 'icofont-package', searchTerms: [] }, { title: 'icofont-page', searchTerms: [] }, { title: 'icofont-paperclip', searchTerms: [] }, { title: 'icofont-papers', searchTerms: [] }, { title: 'icofont-pay', searchTerms: [] }, { title: 'icofont-pestle', searchTerms: [] }, { title: 'icofont-picture', searchTerms: [] }, { title: 'icofont-pine', searchTerms: [] }, { title: 'icofont-pixels', searchTerms: [] }, { title: 'icofont-plugin', searchTerms: [] }, { title: 'icofont-polygonal', searchTerms: [] }, { title: 'icofont-price', searchTerms: [] }, { title: 'icofont-print', searchTerms: [] }, { title: 'icofont-puzzle', searchTerms: [] }, { title: 'icofont-queen', searchTerms: [] }, { title: 'icofont-random', searchTerms: [] }, { title: 'icofont-refresh', searchTerms: [] }, { title: 'icofont-repair', searchTerms: [] }, { title: 'icofont-resize', searchTerms: [] }, { title: 'icofont-responsive', searchTerms: [] }, { title: 'icofont-retweet', searchTerms: [] }, { title: 'icofont-road', searchTerms: [] }, { title: 'icofont-royal', searchTerms: [] }, { title: 'icofont-satellite', searchTerms: [] }, { title: 'icofont-server', searchTerms: [] }, { title: 'icofont-signal', searchTerms: [] }, { title: 'icofont-soccer', searchTerms: [] }, { title: 'icofont-spanner', searchTerms: [] }, { title: 'icofont-spreadsheet', searchTerms: [] }, { title: 'icofont-tag', searchTerms: [] }, { title: 'icofont-tags', searchTerms: [] }, { title: 'icofont-telephone', searchTerms: [] }, { title: 'icofont-telescope', searchTerms: [] }, { title: 'icofont-terminal', searchTerms: [] }, { title: 'icofont-ticket', searchTerms: [] }, { title: 'icofont-tie', searchTerms: [] }, { title: 'icofont-touch', searchTerms: [] }, { title: 'icofont-transparent', searchTerms: [] }, { title: 'icofont-unlock', searchTerms: [] }, { title: 'icofont-unlocked', searchTerms: [] }, { title: 'icofont-wallet', searchTerms: [] }, { title: 'icofont-web', searchTerms: [] }, { title: 'icofont-wheelchair', searchTerms: [] }, { title: 'icofont-world', searchTerms: [] }, { title: 'icofont-zigzag', searchTerms: [] }, { title: 'icofont-zipped', searchTerms: [] }, { title: 'icofont-angry-monster', searchTerms: [] }, { title: 'icofont-bird-wings', searchTerms: [] }, { title: 'icofont-crown-king', searchTerms: [] }, { title: 'icofont-crown-queen', searchTerms: [] }, { title: 'icofont-disability-race', searchTerms: [] }, { title: 'icofont-diving-goggle', searchTerms: [] }, { title: 'icofont-eye-open', searchTerms: [] }, { title: 'icofont-flora-flower', searchTerms: [] }, { title: 'icofont-gift-box', searchTerms: [] }, { title: 'icofont-halloween-pumpkin', searchTerms: [] }, { title: 'icofont-hand-power', searchTerms: [] }, { title: 'icofont-hand-thunder', searchTerms: [] }, { title: 'icofont-king-monster', searchTerms: [] }, { title: 'icofont-magician-hat', searchTerms: [] }, { title: 'icofont-native-american', searchTerms: [] }, { title: 'icofont-owl-look', searchTerms: [] }, { title: 'icofont-robot-face', searchTerms: [] }, { title: 'icofont-sand-clock', searchTerms: [] }, { title: 'icofont-shield-alt', searchTerms: [] }, { title: 'icofont-ship-wheel', searchTerms: [] }, { title: 'icofont-skull-danger', searchTerms: [] }, { title: 'icofont-skull-face', searchTerms: [] }, { title: 'icofont-space-shuttle', searchTerms: [] }, { title: 'icofont-star-shape', searchTerms: [] }, { title: 'icofont-tattoo-wing', searchTerms: [] }, { title: 'icofont-tree-alt', searchTerms: [] }, { title: 'icofont-unity-hand', searchTerms: [] }, { title: 'icofont-woman-bird', searchTerms: [] }, { title: 'icofont-bear-face', searchTerms: [] }, { title: 'icofont-bear-tracks', searchTerms: [] }, { title: 'icofont-bird-alt', searchTerms: [] }, { title: 'icofont-bird-flying', searchTerms: [] }, { title: 'icofont-butterfly-alt', searchTerms: [] }, { title: 'icofont-camel-alt', searchTerms: [] }, { title: 'icofont-camel-head', searchTerms: [] }, { title: 'icofont-cat-dog', searchTerms: [] }, { title: 'icofont-cat-face', searchTerms: [] }, { title: 'icofont-cow-head', searchTerms: [] }, { title: 'icofont-deer-head', searchTerms: [] }, { title: 'icofont-dog-alt', searchTerms: [] }, { title: 'icofont-dog-barking', searchTerms: [] }, { title: 'icofont-duck-tracks', searchTerms: [] }, { title: 'icofont-eagle-head', searchTerms: [] }, { title: 'icofont-eaten-fish', searchTerms: [] }, { title: 'icofont-elephant-alt', searchTerms: [] }, { title: 'icofont-fish-1', searchTerms: [] }, { title: 'icofont-fish-2', searchTerms: [] }, { title: 'icofont-fish-3', searchTerms: [] }, { title: 'icofont-fish-4', searchTerms: [] }, { title: 'icofont-fish-5', searchTerms: [] }, { title: 'icofont-fox-alt', searchTerms: [] }, { title: 'icofont-frog-tracks', searchTerms: [] }, { title: 'icofont-goat-head', searchTerms: [] }, { title: 'icofont-hen-tracks', searchTerms: [] }, { title: 'icofont-horse-tracks', searchTerms: [] }, { title: 'icofont-monkey-2', searchTerms: [] }, { title: 'icofont-monkey-3', searchTerms: [] }, { title: 'icofont-monkey-face', searchTerms: [] }, { title: 'icofont-octopus-alt', searchTerms: [] }, { title: 'icofont-panda-face', searchTerms: [] }, { title: 'icofont-parrot-lip', searchTerms: [] }, { title: 'icofont-pig-face', searchTerms: [] }, { title: 'icofont-pigeon-1', searchTerms: [] }, { title: 'icofont-pigeon-2', searchTerms: [] }, { title: 'icofont-rhino-head', searchTerms: [] }, { title: 'icofont-shrimp-alt', searchTerms: [] }, { title: 'icofont-snail-1', searchTerms: [] }, { title: 'icofont-snail-2', searchTerms: [] }, { title: 'icofont-snail-3', searchTerms: [] }, { title: 'icofont-tiger-face', searchTerms: [] }, { title: 'icofont-brand-acer', searchTerms: [] }, { title: 'icofont-brand-adidas', searchTerms: [] }, { title: 'icofont-brand-adobe', searchTerms: [] }, { title: 'icofont-brand-airbnb', searchTerms: [] }, { title: 'icofont-brand-aircell', searchTerms: [] }, { title: 'icofont-brand-airtel', searchTerms: [] }, { title: 'icofont-brand-alcatel', searchTerms: [] }, { title: 'icofont-brand-alibaba', searchTerms: [] }, { title: 'icofont-brand-aliexpress', searchTerms: [] }, { title: 'icofont-brand-alipay', searchTerms: [] }, { title: 'icofont-brand-amazon', searchTerms: [] }, { title: 'icofont-brand-amd', searchTerms: [] }, { title: 'icofont-brand-aol', searchTerms: [] }, { title: 'icofont-brand-apple', searchTerms: [] }, { title: 'icofont-brand-appstore', searchTerms: [] }, { title: 'icofont-brand-asus', searchTerms: [] }, { title: 'icofont-brand-ati', searchTerms: [] }, { title: 'icofont-brand-att', searchTerms: [] }, { title: 'icofont-brand-audi', searchTerms: [] }, { title: 'icofont-brand-axiata', searchTerms: [] }, { title: 'icofont-brand-bada', searchTerms: [] }, { title: 'icofont-brand-bbc', searchTerms: [] }, { title: 'icofont-brand-bing', searchTerms: [] }, { title: 'icofont-brand-blackberry', searchTerms: [] }, { title: 'icofont-brand-bmw', searchTerms: [] }, { title: 'icofont-brand-box', searchTerms: [] }, { title: 'icofont-brand-buzzfeed', searchTerms: [] }, { title: 'icofont-brand-cannon', searchTerms: [] }, { title: 'icofont-brand-casio', searchTerms: [] }, { title: 'icofont-brand-cisco', searchTerms: [] }, { title: 'icofont-brand-citibank', searchTerms: [] }, { title: 'icofont-brand-cnet', searchTerms: [] }, { title: 'icofont-brand-cnn', searchTerms: [] }, { title: 'icofont-brand-compaq', searchTerms: [] }, { title: 'icofont-brand-debian', searchTerms: [] }, { title: 'icofont-brand-delicious', searchTerms: [] }, { title: 'icofont-brand-dell', searchTerms: [] }, { title: 'icofont-brand-designbump', searchTerms: [] }, { title: 'icofont-brand-designfloat', searchTerms: [] }, { title: 'icofont-brand-disney', searchTerms: [] }, { title: 'icofont-brand-dodge', searchTerms: [] }, { title: 'icofont-brand-dove', searchTerms: [] }, { title: 'icofont-brand-drupal', searchTerms: [] }, { title: 'icofont-brand-ebay', searchTerms: [] }, { title: 'icofont-brand-eleven', searchTerms: [] }, { title: 'icofont-brand-emirates', searchTerms: [] }, { title: 'icofont-brand-espn', searchTerms: [] }, { title: 'icofont-brand-etisalat', searchTerms: [] }, { title: 'icofont-brand-etsy', searchTerms: [] }, { title: 'icofont-brand-fastrack', searchTerms: [] }, { title: 'icofont-brand-fedex', searchTerms: [] }, { title: 'icofont-brand-ferrari', searchTerms: [] }, { title: 'icofont-brand-fitbit', searchTerms: [] }, { title: 'icofont-brand-flikr', searchTerms: [] }, { title: 'icofont-brand-forbes', searchTerms: [] }, { title: 'icofont-brand-foursquare', searchTerms: [] }, { title: 'icofont-brand-foxconn', searchTerms: [] }, { title: 'icofont-brand-fujitsu', searchTerms: [] }, { title: 'icofont-brand-gillette', searchTerms: [] }, { title: 'icofont-brand-gizmodo', searchTerms: [] }, { title: 'icofont-brand-gnome', searchTerms: [] }, { title: 'icofont-brand-google', searchTerms: [] }, { title: 'icofont-brand-gopro', searchTerms: [] }, { title: 'icofont-brand-gucci', searchTerms: [] }, { title: 'icofont-brand-hallmark', searchTerms: [] }, { title: 'icofont-brand-hi5', searchTerms: [] }, { title: 'icofont-brand-honda', searchTerms: [] }, { title: 'icofont-brand-hp', searchTerms: [] }, { title: 'icofont-brand-hsbc', searchTerms: [] }, { title: 'icofont-brand-htc', searchTerms: [] }, { title: 'icofont-brand-huawei', searchTerms: [] }, { title: 'icofont-brand-hulu', searchTerms: [] }, { title: 'icofont-brand-hyundai', searchTerms: [] }, { title: 'icofont-brand-ibm', searchTerms: [] }, { title: 'icofont-brand-icofont', searchTerms: [] }, { title: 'icofont-brand-icq', searchTerms: [] }, { title: 'icofont-brand-ikea', searchTerms: [] }, { title: 'icofont-brand-imdb', searchTerms: [] }, { title: 'icofont-brand-indiegogo', searchTerms: [] }, { title: 'icofont-brand-intel', searchTerms: [] }, { title: 'icofont-brand-ipair', searchTerms: [] }, { title: 'icofont-brand-jaguar', searchTerms: [] }, { title: 'icofont-brand-java', searchTerms: [] }, { title: 'icofont-brand-joomla', searchTerms: [] }, { title: 'icofont-brand-kickstarter', searchTerms: [] }, { title: 'icofont-brand-kik', searchTerms: [] }, { title: 'icofont-brand-lastfm', searchTerms: [] }, { title: 'icofont-brand-lego', searchTerms: [] }, { title: 'icofont-brand-lenovo', searchTerms: [] }, { title: 'icofont-brand-levis', searchTerms: [] }, { title: 'icofont-brand-lexus', searchTerms: [] }, { title: 'icofont-brand-lg', searchTerms: [] }, { title: 'icofont-brand-lionix', searchTerms: [] }, { title: 'icofont-brand-loreal', searchTerms: [] }, { title: 'icofont-brand-mashable', searchTerms: [] }, { title: 'icofont-brand-mazda', searchTerms: [] }, { title: 'icofont-brand-mcdonals', searchTerms: [] }, { title: 'icofont-brand-mercedes', searchTerms: [] }, { title: 'icofont-brand-micromax', searchTerms: [] }, { title: 'icofont-brand-microsoft', searchTerms: [] }, { title: 'icofont-brand-mobileme', searchTerms: [] }, { title: 'icofont-brand-mobily', searchTerms: [] }, { title: 'icofont-brand-motorola', searchTerms: [] }, { title: 'icofont-brand-msi', searchTerms: [] }, { title: 'icofont-brand-mts', searchTerms: [] }, { title: 'icofont-brand-myspace', searchTerms: [] }, { title: 'icofont-brand-mytv', searchTerms: [] }, { title: 'icofont-brand-nasa', searchTerms: [] }, { title: 'icofont-brand-natgeo', searchTerms: [] }, { title: 'icofont-brand-nbc', searchTerms: [] }, { title: 'icofont-brand-nescafe', searchTerms: [] }, { title: 'icofont-brand-nestle', searchTerms: [] }, { title: 'icofont-brand-netflix', searchTerms: [] }, { title: 'icofont-brand-nexus', searchTerms: [] }, { title: 'icofont-brand-nike', searchTerms: [] }, { title: 'icofont-brand-nokia', searchTerms: [] }, { title: 'icofont-brand-nvidia', searchTerms: [] }, { title: 'icofont-brand-omega', searchTerms: [] }, { title: 'icofont-brand-opensuse', searchTerms: [] }, { title: 'icofont-brand-oracle', searchTerms: [] }, { title: 'icofont-brand-panasonic', searchTerms: [] }, { title: 'icofont-brand-paypal', searchTerms: [] }, { title: 'icofont-brand-pepsi', searchTerms: [] }, { title: 'icofont-brand-philips', searchTerms: [] }, { title: 'icofont-brand-playstation', searchTerms: [] }, { title: 'icofont-brand-puma', searchTerms: [] }, { title: 'icofont-brand-qvc', searchTerms: [] }, { title: 'icofont-brand-readernaut', searchTerms: [] }, { title: 'icofont-brand-redbull', searchTerms: [] }, { title: 'icofont-brand-reebok', searchTerms: [] }, { title: 'icofont-brand-reuters', searchTerms: [] }, { title: 'icofont-brand-samsung', searchTerms: [] }, { title: 'icofont-brand-sap', searchTerms: [] }, { title: 'icofont-brand-scribd', searchTerms: [] }, { title: 'icofont-brand-shell', searchTerms: [] }, { title: 'icofont-brand-siemens', searchTerms: [] }, { title: 'icofont-brand-slideshare', searchTerms: [] }, { title: 'icofont-brand-snapchat', searchTerms: [] }, { title: 'icofont-brand-soundcloud', searchTerms: [] }, { title: 'icofont-brand-sprint', searchTerms: [] }, { title: 'icofont-brand-squidoo', searchTerms: [] }, { title: 'icofont-brand-starbucks', searchTerms: [] }, { title: 'icofont-brand-stc', searchTerms: [] }, { title: 'icofont-brand-steam', searchTerms: [] }, { title: 'icofont-brand-suzuki', searchTerms: [] }, { title: 'icofont-brand-symbian', searchTerms: [] }, { title: 'icofont-brand-tango', searchTerms: [] }, { title: 'icofont-brand-target', searchTerms: [] }, { title: 'icofont-brand-techcrunch', searchTerms: [] }, { title: 'icofont-brand-telenor', searchTerms: [] }, { title: 'icofont-brand-teliasonera', searchTerms: [] }, { title: 'icofont-brand-tesla', searchTerms: [] }, { title: 'icofont-brand-thenextweb', searchTerms: [] }, { title: 'icofont-brand-toshiba', searchTerms: [] }, { title: 'icofont-brand-toyota', searchTerms: [] }, { title: 'icofont-brand-tribenet', searchTerms: [] }, { title: 'icofont-brand-ubuntu', searchTerms: [] }, { title: 'icofont-brand-unilever', searchTerms: [] }, { title: 'icofont-brand-vaio', searchTerms: [] }, { title: 'icofont-brand-verizon', searchTerms: [] }, { title: 'icofont-brand-viber', searchTerms: [] }, { title: 'icofont-brand-vodafone', searchTerms: [] }, { title: 'icofont-brand-volkswagen', searchTerms: [] }, { title: 'icofont-brand-walmart', searchTerms: [] }, { title: 'icofont-brand-warnerbros', searchTerms: [] }, { title: 'icofont-brand-whatsapp', searchTerms: [] }, { title: 'icofont-brand-wikipedia', searchTerms: [] }, { title: 'icofont-brand-windows', searchTerms: [] }, { title: 'icofont-brand-wire', searchTerms: [] }, { title: 'icofont-brand-wordpress', searchTerms: [] }, { title: 'icofont-brand-xiaomi', searchTerms: [] }, { title: 'icofont-brand-yahoobuzz', searchTerms: [] }, { title: 'icofont-brand-yamaha', searchTerms: [] }, { title: 'icofont-brand-youtube', searchTerms: [] }, { title: 'icofont-brand-zain', searchTerms: [] }, { title: 'icofont-bank-alt', searchTerms: [] }, { title: 'icofont-bill-alt', searchTerms: [] }, { title: 'icofont-briefcase-1', searchTerms: [] }, { title: 'icofont-briefcase-2', searchTerms: [] }, { title: 'icofont-contact-add', searchTerms: [] }, { title: 'icofont-files-stack', searchTerms: [] }, { title: 'icofont-handshake-deal', searchTerms: [] }, { title: 'icofont-id-card', searchTerms: [] }, { title: 'icofont-meeting-add', searchTerms: [] }, { title: 'icofont-money-bag', searchTerms: [] }, { title: 'icofont-pie-chart', searchTerms: [] }, { title: 'icofont-presentation-alt', searchTerms: [] }, { title: 'icofont-stock-mobile', searchTerms: [] }, { title: 'icofont-chart-growth', searchTerms: [] }, { title: 'icofont-architecture-alt', searchTerms: [] }, { title: 'icofont-building-alt', searchTerms: [] }, { title: 'icofont-bull-dozer', searchTerms: [] }, { title: 'icofont-cement-mix', searchTerms: [] }, { title: 'icofont-cement-mixer', searchTerms: [] }, { title: 'icofont-concrete-mixer', searchTerms: [] }, { title: 'icofont-danger-zone', searchTerms: [] }, { title: 'icofont-eco-energy', searchTerms: [] }, { title: 'icofont-eco-environmen', searchTerms: [] }, { title: 'icofont-energy-air', searchTerms: [] }, { title: 'icofont-energy-oil', searchTerms: [] }, { title: 'icofont-energy-savings', searchTerms: [] }, { title: 'icofont-energy-solar', searchTerms: [] }, { title: 'icofont-energy-water', searchTerms: [] }, { title: 'icofont-fix-tools', searchTerms: [] }, { title: 'icofont-fork-lift', searchTerms: [] }, { title: 'icofont-glue-oil', searchTerms: [] }, { title: 'icofont-hammer-alt', searchTerms: [] }, { title: 'icofont-help-robot', searchTerms: [] }, { title: 'icofont-industries-1', searchTerms: [] }, { title: 'icofont-industries-2', searchTerms: [] }, { title: 'icofont-industries-3', searchTerms: [] }, { title: 'icofont-industries-4', searchTerms: [] }, { title: 'icofont-industries-5', searchTerms: [] }, { title: 'icofont-paint-brush', searchTerms: [] }, { title: 'icofont-power-zone', searchTerms: [] }, { title: 'icofont-radio-active', searchTerms: [] }, { title: 'icofont-recycle-alt', searchTerms: [] }, { title: 'icofont-recycling-man', searchTerms: [] }, { title: 'icofont-screw-driver', searchTerms: [] }, { title: 'icofont-tools-1', searchTerms: [] }, { title: 'icofont-tools-bag', searchTerms: [] }, { title: 'icofont-tow-truck', searchTerms: [] }, { title: 'icofont-vehicle-cement', searchTerms: [] }, { title: 'icofont-vehicle-crane', searchTerms: [] }, { title: 'icofont-vehicle-dozer', searchTerms: [] }, { title: 'icofont-vehicle-excavator', searchTerms: [] }, { title: 'icofont-vehicle-trucktor', searchTerms: [] }, { title: 'icofont-vehicle-wrecking', searchTerms: [] }, { title: 'icofont-workers-group', searchTerms: [] }, { title: 'icofont-afghani-false', searchTerms: [] }, { title: 'icofont-afghani-minus', searchTerms: [] }, { title: 'icofont-afghani-plus', searchTerms: [] }, { title: 'icofont-afghani-true', searchTerms: [] }, { title: 'icofont-baht-false', searchTerms: [] }, { title: 'icofont-baht-minus', searchTerms: [] }, { title: 'icofont-baht-plus', searchTerms: [] }, { title: 'icofont-baht-true', searchTerms: [] }, { title: 'icofont-bitcoin-false', searchTerms: [] }, { title: 'icofont-bitcoin-minus', searchTerms: [] }, { title: 'icofont-bitcoin-plus', searchTerms: [] }, { title: 'icofont-bitcoin-true', searchTerms: [] }, { title: 'icofont-dollar-flase', searchTerms: [] }, { title: 'icofont-dollar-minus', searchTerms: [] }, { title: 'icofont-dollar-plus', searchTerms: [] }, { title: 'icofont-dollar-true', searchTerms: [] }, { title: 'icofont-dong-false', searchTerms: [] }, { title: 'icofont-dong-minus', searchTerms: [] }, { title: 'icofont-dong-plus', searchTerms: [] }, { title: 'icofont-dong-true', searchTerms: [] }, { title: 'icofont-euro-false', searchTerms: [] }, { title: 'icofont-euro-minus', searchTerms: [] }, { title: 'icofont-euro-plus', searchTerms: [] }, { title: 'icofont-euro-true', searchTerms: [] }, { title: 'icofont-frank-false', searchTerms: [] }, { title: 'icofont-frank-minus', searchTerms: [] }, { title: 'icofont-frank-plus', searchTerms: [] }, { title: 'icofont-frank-true', searchTerms: [] }, { title: 'icofont-hryvnia-false', searchTerms: [] }, { title: 'icofont-hryvnia-minus', searchTerms: [] }, { title: 'icofont-hryvnia-plus', searchTerms: [] }, { title: 'icofont-hryvnia-true', searchTerms: [] }, { title: 'icofont-lira-false', searchTerms: [] }, { title: 'icofont-lira-minus', searchTerms: [] }, { title: 'icofont-lira-plus', searchTerms: [] }, { title: 'icofont-lira-true', searchTerms: [] }, { title: 'icofont-peseta-false', searchTerms: [] }, { title: 'icofont-peseta-minus', searchTerms: [] }, { title: 'icofont-peseta-plus', searchTerms: [] }, { title: 'icofont-peseta-true', searchTerms: [] }, { title: 'icofont-peso-false', searchTerms: [] }, { title: 'icofont-peso-minus', searchTerms: [] }, { title: 'icofont-peso-plus', searchTerms: [] }, { title: 'icofont-peso-true', searchTerms: [] }, { title: 'icofont-pound-false', searchTerms: [] }, { title: 'icofont-pound-minus', searchTerms: [] }, { title: 'icofont-pound-plus', searchTerms: [] }, { title: 'icofont-pound-true', searchTerms: [] }, { title: 'icofont-renminbi-false', searchTerms: [] }, { title: 'icofont-renminbi-minus', searchTerms: [] }, { title: 'icofont-renminbi-plus', searchTerms: [] }, { title: 'icofont-renminbi-true', searchTerms: [] }, { title: 'icofont-riyal-false', searchTerms: [] }, { title: 'icofont-riyal-minus', searchTerms: [] }, { title: 'icofont-riyal-plus', searchTerms: [] }, { title: 'icofont-riyal-true', searchTerms: [] }, { title: 'icofont-rouble-false', searchTerms: [] }, { title: 'icofont-rouble-minus', searchTerms: [] }, { title: 'icofont-rouble-plus', searchTerms: [] }, { title: 'icofont-rouble-true', searchTerms: [] }, { title: 'icofont-rupee-false', searchTerms: [] }, { title: 'icofont-rupee-minus', searchTerms: [] }, { title: 'icofont-rupee-plus', searchTerms: [] }, { title: 'icofont-rupee-true', searchTerms: [] }, { title: 'icofont-taka-false', searchTerms: [] }, { title: 'icofont-taka-minus', searchTerms: [] }, { title: 'icofont-taka-plus', searchTerms: [] }, { title: 'icofont-taka-true', searchTerms: [] }, { title: 'icofont-won-false', searchTerms: [] }, { title: 'icofont-won-minus', searchTerms: [] }, { title: 'icofont-won-plus', searchTerms: [] }, { title: 'icofont-won-true', searchTerms: [] }, { title: 'icofont-yen-false', searchTerms: [] }, { title: 'icofont-yen-minus', searchTerms: [] }, { title: 'icofont-yen-plus', searchTerms: [] }, { title: 'icofont-yen-true', searchTerms: [] }, { title: 'icofont-android-nexus', searchTerms: [] }, { title: 'icofont-android-tablet', searchTerms: [] }, { title: 'icofont-apple-watch', searchTerms: [] }, { title: 'icofont-drawing-tablet', searchTerms: [] }, { title: 'icofont-flash-drive', searchTerms: [] }, { title: 'icofont-game-console', searchTerms: [] }, { title: 'icofont-game-controller', searchTerms: [] }, { title: 'icofont-game-pad', searchTerms: [] }, { title: 'icofont-htc-one', searchTerms: [] }, { title: 'icofont-ipod-nano', searchTerms: [] }, { title: 'icofont-ipod-touch', searchTerms: [] }, { title: 'icofont-keyboard-alt', searchTerms: [] }, { title: 'icofont-keyboard-wireless', searchTerms: [] }, { title: 'icofont-laptop-alt', searchTerms: [] }, { title: 'icofont-magic-mouse', searchTerms: [] }, { title: 'icofont-micro-chip', searchTerms: [] }, { title: 'icofont-microphone-alt', searchTerms: [] }, { title: 'icofont-mp3-player', searchTerms: [] }, { title: 'icofont-playstation-alt', searchTerms: [] }, { title: 'icofont-radio-mic', searchTerms: [] }, { title: 'icofont-samsung-galaxy', searchTerms: [] }, { title: 'icofont-surface-tablet', searchTerms: [] }, { title: 'icofont-ui-keyboard', searchTerms: [] }, { title: 'icofont-washing-machine', searchTerms: [] }, { title: 'icofont-wifi-router', searchTerms: [] }, { title: 'icofont-wii-u', searchTerms: [] }, { title: 'icofont-windows-lumia', searchTerms: [] }, { title: 'icofont-wireless-mouse', searchTerms: [] }, { title: 'icofont-xbox-360', searchTerms: [] }, { title: 'icofont-arrow-down', searchTerms: [] }, { title: 'icofont-arrow-left', searchTerms: [] }, { title: 'icofont-arrow-right', searchTerms: [] }, { title: 'icofont-arrow-up', searchTerms: [] }, { title: 'icofont-block-down', searchTerms: [] }, { title: 'icofont-block-left', searchTerms: [] }, { title: 'icofont-block-right', searchTerms: [] }, { title: 'icofont-block-up', searchTerms: [] }, { title: 'icofont-bubble-down', searchTerms: [] }, { title: 'icofont-bubble-left', searchTerms: [] }, { title: 'icofont-bubble-right', searchTerms: [] }, { title: 'icofont-bubble-up', searchTerms: [] }, { title: 'icofont-caret-down', searchTerms: [] }, { title: 'icofont-caret-left', searchTerms: [] }, { title: 'icofont-caret-right', searchTerms: [] }, { title: 'icofont-caret-up', searchTerms: [] }, { title: 'icofont-circled-down', searchTerms: [] }, { title: 'icofont-circled-left', searchTerms: [] }, { title: 'icofont-circled-right', searchTerms: [] }, { title: 'icofont-circled-up', searchTerms: [] }, { title: 'icofont-cursor-drag', searchTerms: [] }, { title: 'icofont-curved-down', searchTerms: [] }, { title: 'icofont-curved-left', searchTerms: [] }, { title: 'icofont-curved-right', searchTerms: [] }, { title: 'icofont-curved-up', searchTerms: [] }, { title: 'icofont-dotted-down', searchTerms: [] }, { title: 'icofont-dotted-left', searchTerms: [] }, { title: 'icofont-dotted-right', searchTerms: [] }, { title: 'icofont-dotted-up', searchTerms: [] }, { title: 'icofont-double-left', searchTerms: [] }, { title: 'icofont-double-right', searchTerms: [] }, { title: 'icofont-expand-alt', searchTerms: [] }, { title: 'icofont-hand-down', searchTerms: [] }, { title: 'icofont-hand-drag', searchTerms: [] }, { title: 'icofont-hand-drag1', searchTerms: [] }, { title: 'icofont-hand-drag2', searchTerms: [] }, { title: 'icofont-hand-grippers', searchTerms: [] }, { title: 'icofont-hand-left', searchTerms: [] }, { title: 'icofont-hand-right', searchTerms: [] }, { title: 'icofont-hand-up', searchTerms: [] }, { title: 'icofont-rounded-collapse', searchTerms: [] }, { title: 'icofont-rounded-down', searchTerms: [] }, { title: 'icofont-rounded-expand', searchTerms: [] }, { title: 'icofont-rounded-up', searchTerms: [] }, { title: 'icofont-scroll-down', searchTerms: [] }, { title: 'icofont-scroll-left', searchTerms: [] }, { title: 'icofont-scroll-right', searchTerms: [] }, { title: 'icofont-scroll-up', searchTerms: [] }, { title: 'icofont-simple-down', searchTerms: [] }, { title: 'icofont-simple-up', searchTerms: [] }, { title: 'icofont-square-down', searchTerms: [] }, { title: 'icofont-square-left', searchTerms: [] }, { title: 'icofont-square-right', searchTerms: [] }, { title: 'icofont-square-up', searchTerms: [] }, { title: 'icofont-stylish-down', searchTerms: [] }, { title: 'icofont-stylish-left', searchTerms: [] }, { title: 'icofont-stylish-right', searchTerms: [] }, { title: 'icofont-stylish-up', searchTerms: [] }, { title: 'icofont-swoosh-down', searchTerms: [] }, { title: 'icofont-swoosh-left', searchTerms: [] }, { title: 'icofont-swoosh-right', searchTerms: [] }, { title: 'icofont-swoosh-up', searchTerms: [] }, { title: 'icofont-thin-down', searchTerms: [] }, { title: 'icofont-thin-left', searchTerms: [] }, { title: 'icofont-thin-right', searchTerms: [] }, { title: 'icofont-thin-up', searchTerms: [] }, { title: 'icofont-bell-alt', searchTerms: [] }, { title: 'icofont-black-board', searchTerms: [] }, { title: 'icofont-book-alt', searchTerms: [] }, { title: 'icofont-fountain-pen', searchTerms: [] }, { title: 'icofont-globe-alt', searchTerms: [] }, { title: 'icofont-graduate-alt', searchTerms: [] }, { title: 'icofont-group-students', searchTerms: [] }, { title: 'icofont-hat-alt', searchTerms: [] }, { title: 'icofont-lamp-light', searchTerms: [] }, { title: 'icofont-microscope-alt', searchTerms: [] }, { title: 'icofont-pen-nib', searchTerms: [] }, { title: 'icofont-quill-pen', searchTerms: [] }, { title: 'icofont-school-bag', searchTerms: [] }, { title: 'icofont-school-bus', searchTerms: [] }, { title: 'icofont-student-alt', searchTerms: [] }, { title: 'icofont-test-bulb', searchTerms: [] }, { title: 'icofont-heart-eyes', searchTerms: [] }, { title: 'icofont-nerd-smile', searchTerms: [] }, { title: 'icofont-open-mouth', searchTerms: [] }, { title: 'icofont-rolling-eyes', searchTerms: [] }, { title: 'icofont-simple-smile', searchTerms: [] }, { title: 'icofont-slightly-smile', searchTerms: [] }, { title: 'icofont-wink-smile', searchTerms: [] }, { title: 'icofont-file-alt', searchTerms: [] }, { title: 'icofont-file-audio', searchTerms: [] }, { title: 'icofont-file-bmp', searchTerms: [] }, { title: 'icofont-file-code', searchTerms: [] }, { title: 'icofont-file-css', searchTerms: [] }, { title: 'icofont-file-document', searchTerms: [] }, { title: 'icofont-file-eps', searchTerms: [] }, { title: 'icofont-file-excel', searchTerms: [] }, { title: 'icofont-file-exe', searchTerms: [] }, { title: 'icofont-file-file', searchTerms: [] }, { title: 'icofont-file-flv', searchTerms: [] }, { title: 'icofont-file-gif', searchTerms: [] }, { title: 'icofont-file-html5', searchTerms: [] }, { title: 'icofont-file-image', searchTerms: [] }, { title: 'icofont-file-iso', searchTerms: [] }, { title: 'icofont-file-java', searchTerms: [] }, { title: 'icofont-file-javascript', searchTerms: [] }, { title: 'icofont-file-jpg', searchTerms: [] }, { title: 'icofont-file-midi', searchTerms: [] }, { title: 'icofont-file-mov', searchTerms: [] }, { title: 'icofont-file-mp3', searchTerms: [] }, { title: 'icofont-file-pdf', searchTerms: [] }, { title: 'icofont-file-php', searchTerms: [] }, { title: 'icofont-file-png', searchTerms: [] }, { title: 'icofont-file-powerpoint', searchTerms: [] }, { title: 'icofont-file-presentation', searchTerms: [] }, { title: 'icofont-file-psb', searchTerms: [] }, { title: 'icofont-file-psd', searchTerms: [] }, { title: 'icofont-file-python', searchTerms: [] }, { title: 'icofont-file-ruby', searchTerms: [] }, { title: 'icofont-file-spreadsheet', searchTerms: [] }, { title: 'icofont-file-sql', searchTerms: [] }, { title: 'icofont-file-svg', searchTerms: [] }, { title: 'icofont-file-text', searchTerms: [] }, { title: 'icofont-file-tiff', searchTerms: [] }, { title: 'icofont-file-video', searchTerms: [] }, { title: 'icofont-file-wave', searchTerms: [] }, { title: 'icofont-file-wmv', searchTerms: [] }, { title: 'icofont-file-word', searchTerms: [] }, { title: 'icofont-file-zip', searchTerms: [] }, { title: 'icofont-cycling-alt', searchTerms: [] }, { title: 'icofont-muscle-weight', searchTerms: [] }, { title: 'icofont-arabian-coffee', searchTerms: [] }, { title: 'icofont-baby-food', searchTerms: [] }, { title: 'icofont-birthday-cake', searchTerms: [] }, { title: 'icofont-cauli-flower', searchTerms: [] }, { title: 'icofont-chicken-fry', searchTerms: [] }, { title: 'icofont-coconut-water', searchTerms: [] }, { title: 'icofont-coffee-alt', searchTerms: [] }, { title: 'icofont-coffee-cup', searchTerms: [] }, { title: 'icofont-coffee-mug', searchTerms: [] }, { title: 'icofont-coffee-pot', searchTerms: [] }, { title: 'icofont-crop-plant', searchTerms: [] }, { title: 'icofont-cup-cake', searchTerms: [] }, { title: 'icofont-dining-table', searchTerms: [] }, { title: 'icofont-egg-plant', searchTerms: [] }, { title: 'icofont-egg-poached', searchTerms: [] }, { title: 'icofont-farmer-alt', searchTerms: [] }, { title: 'icofont-fast-food', searchTerms: [] }, { title: 'icofont-food-basket', searchTerms: [] }, { title: 'icofont-food-cart', searchTerms: [] }, { title: 'icofont-french-fries', searchTerms: [] }, { title: 'icofont-hot-dog', searchTerms: [] }, { title: 'icofont-layered-cake', searchTerms: [] }, { title: 'icofont-lemon-alt', searchTerms: [] }, { title: 'icofont-pie-alt', searchTerms: [] }, { title: 'icofont-pizza-slice', searchTerms: [] }, { title: 'icofont-restaurant-menu', searchTerms: [] }, { title: 'icofont-soft-drinks', searchTerms: [] }, { title: 'icofont-soup-bowl', searchTerms: [] }, { title: 'icofont-sub-sandwich', searchTerms: [] }, { title: 'icofont-tea-pot', searchTerms: [] }, { title: 'icofont-baby-backpack', searchTerms: [] }, { title: 'icofont-baby-cloth', searchTerms: [] }, { title: 'icofont-baby-trolley', searchTerms: [] }, { title: 'icofont-holding-hands', searchTerms: [] }, { title: 'icofont-infant-nipple', searchTerms: [] }, { title: 'icofont-kids-scooter', searchTerms: [] }, { title: 'icofont-safety-pin', searchTerms: [] }, { title: 'icofont-teddy-bear', searchTerms: [] }, { title: 'icofont-toy-ball', searchTerms: [] }, { title: 'icofont-toy-cat', searchTerms: [] }, { title: 'icofont-toy-duck', searchTerms: [] }, { title: 'icofont-toy-elephant', searchTerms: [] }, { title: 'icofont-toy-hand', searchTerms: [] }, { title: 'icofont-toy-horse', searchTerms: [] }, { title: 'icofont-toy-lattu', searchTerms: [] }, { title: 'icofont-toy-train', searchTerms: [] }, { title: 'icofont-cannon-firing', searchTerms: [] }, { title: 'icofont-cc-camera', searchTerms: [] }, { title: 'icofont-cop-badge', searchTerms: [] }, { title: 'icofont-court-hammer', searchTerms: [] }, { title: 'icofont-finger-print', searchTerms: [] }, { title: 'icofont-handcuff-alt', searchTerms: [] }, { title: 'icofont-law-book', searchTerms: [] }, { title: 'icofont-law-document', searchTerms: [] }, { title: 'icofont-law-order', searchTerms: [] }, { title: 'icofont-law-protect', searchTerms: [] }, { title: 'icofont-law-scales', searchTerms: [] }, { title: 'icofont-police-badge', searchTerms: [] }, { title: 'icofont-police-cap', searchTerms: [] }, { title: 'icofont-police-hat', searchTerms: [] }, { title: 'icofont-police-van', searchTerms: [] }, { title: 'icofont-thief-alt', searchTerms: [] }, { title: 'icofont-abacus-alt', searchTerms: [] }, { title: 'icofont-angle-180', searchTerms: [] }, { title: 'icofont-angle-45', searchTerms: [] }, { title: 'icofont-angle-90', searchTerms: [] }, { title: 'icofont-golden-ratio', searchTerms: [] }, { title: 'icofont-rulers-alt', searchTerms: [] }, { title: 'icofont-square-root', searchTerms: [] }, { title: 'icofont-ui-calculator', searchTerms: [] }, { title: 'icofont-ambulance-crescent', searchTerms: [] }, { title: 'icofont-ambulance-cross', searchTerms: [] }, { title: 'icofont-blood-drop', searchTerms: [] }, { title: 'icofont-blood-test', searchTerms: [] }, { title: 'icofont-brain-alt', searchTerms: [] }, { title: 'icofont-doctor-alt', searchTerms: [] }, { title: 'icofont-drug-pack', searchTerms: [] }, { title: 'icofont-injection-syringe', searchTerms: [] }, { title: 'icofont-nurse-alt', searchTerms: [] }, { title: 'icofont-nursing-home', searchTerms: [] }, { title: 'icofont-operation-theater', searchTerms: [] }, { title: 'icofont-paralysis-disability', searchTerms: [] }, { title: 'icofont-patient-bed', searchTerms: [] }, { title: 'icofont-patient-file', searchTerms: [] }, { title: 'icofont-stethoscope-alt', searchTerms: [] }, { title: 'icofont-surgeon-alt', searchTerms: [] }, { title: 'icofont-test-bottle', searchTerms: [] }, { title: 'icofont-thermometer-alt', searchTerms: [] }, { title: 'icofont-ui-add', searchTerms: [] }, { title: 'icofont-ui-alarm', searchTerms: [] }, { title: 'icofont-ui-battery', searchTerms: [] }, { title: 'icofont-ui-block', searchTerms: [] }, { title: 'icofont-ui-bluetooth', searchTerms: [] }, { title: 'icofont-ui-brightness', searchTerms: [] }, { title: 'icofont-ui-browser', searchTerms: [] }, { title: 'icofont-ui-calendar', searchTerms: [] }, { title: 'icofont-ui-call', searchTerms: [] }, { title: 'icofont-ui-camera', searchTerms: [] }, { title: 'icofont-ui-cart', searchTerms: [] }, { title: 'icofont-ui-chat', searchTerms: [] }, { title: 'icofont-ui-check', searchTerms: [] }, { title: 'icofont-ui-clock', searchTerms: [] }, { title: 'icofont-ui-close', searchTerms: [] }, { title: 'icofont-ui-copy', searchTerms: [] }, { title: 'icofont-ui-cut', searchTerms: [] }, { title: 'icofont-ui-delete', searchTerms: [] }, { title: 'icofont-ui-edit', searchTerms: [] }, { title: 'icofont-ui-email', searchTerms: [] }, { title: 'icofont-ui-file', searchTerms: [] }, { title: 'icofont-ui-flight', searchTerms: [] }, { title: 'icofont-ui-folder', searchTerms: [] }, { title: 'icofont-ui-game', searchTerms: [] }, { title: 'icofont-ui-handicapped', searchTerms: [] }, { title: 'icofont-ui-home', searchTerms: [] }, { title: 'icofont-ui-image', searchTerms: [] }, { title: 'icofont-ui-laoding', searchTerms: [] }, { title: 'icofont-ui-lock', searchTerms: [] }, { title: 'icofont-ui-map', searchTerms: [] }, { title: 'icofont-ui-message', searchTerms: [] }, { title: 'icofont-ui-messaging', searchTerms: [] }, { title: 'icofont-ui-movie', searchTerms: [] }, { title: 'icofont-ui-mute', searchTerms: [] }, { title: 'icofont-ui-network', searchTerms: [] }, { title: 'icofont-ui-next', searchTerms: [] }, { title: 'icofont-ui-note', searchTerms: [] }, { title: 'icofont-ui-office', searchTerms: [] }, { title: 'icofont-ui-password', searchTerms: [] }, { title: 'icofont-ui-pause', searchTerms: [] }, { title: 'icofont-ui-pointer', searchTerms: [] }, { title: 'icofont-ui-power', searchTerms: [] }, { title: 'icofont-ui-press', searchTerms: [] }, { title: 'icofont-ui-previous', searchTerms: [] }, { title: 'icofont-ui-rating', searchTerms: [] }, { title: 'icofont-ui-record', searchTerms: [] }, { title: 'icofont-ui-remove', searchTerms: [] }, { title: 'icofont-ui-reply', searchTerms: [] }, { title: 'icofont-ui-rotation', searchTerms: [] }, { title: 'icofont-ui-rss', searchTerms: [] }, { title: 'icofont-ui-search', searchTerms: [] }, { title: 'icofont-ui-settings', searchTerms: [] }, { title: 'icofont-ui-tag', searchTerms: [] }, { title: 'icofont-ui-theme', searchTerms: [] }, { title: 'icofont-ui-timer', searchTerms: [] }, { title: 'icofont-ui-travel', searchTerms: [] }, { title: 'icofont-ui-unlock', searchTerms: [] }, { title: 'icofont-ui-volume', searchTerms: [] }, { title: 'icofont-ui-weather', searchTerms: [] }, { title: 'icofont-ui-wifi', searchTerms: [] }, { title: 'icofont-cassette-player', searchTerms: [] }, { title: 'icofont-music-alt', searchTerms: [] }, { title: 'icofont-music-disk', searchTerms: [] }, { title: 'icofont-music-note', searchTerms: [] }, { title: 'icofont-music-notes', searchTerms: [] }, { title: 'icofont-mute-volume', searchTerms: [] }, { title: 'icofont-play-pause', searchTerms: [] }, { title: 'icofont-song-notes', searchTerms: [] }, { title: 'icofont-video-alt', searchTerms: [] }, { title: 'icofont-video-cam', searchTerms: [] }, { title: 'icofont-video-clapper', searchTerms: [] }, { title: 'icofont-volume-bar', searchTerms: [] }, { title: 'icofont-volume-down', searchTerms: [] }, { title: 'icofont-volume-mute', searchTerms: [] }, { title: 'icofont-volume-off', searchTerms: [] }, { title: 'icofont-volume-up', searchTerms: [] }, { title: 'icofont-youtube-play', searchTerms: [] }, { title: 'icofont-2checkout-alt', searchTerms: [] }, { title: 'icofont-amazon-alt', searchTerms: [] }, { title: 'icofont-braintree-alt', searchTerms: [] }, { title: 'icofont-discover-alt', searchTerms: [] }, { title: 'icofont-eway-alt', searchTerms: [] }, { title: 'icofont-jcb-alt', searchTerms: [] }, { title: 'icofont-maestro-alt', searchTerms: [] }, { title: 'icofont-mastercard-alt', searchTerms: [] }, { title: 'icofont-payoneer-alt', searchTerms: [] }, { title: 'icofont-paypal-alt', searchTerms: [] }, { title: 'icofont-sage-alt', searchTerms: [] }, { title: 'icofont-skrill-alt', searchTerms: [] }, { title: 'icofont-stripe-alt', searchTerms: [] }, { title: 'icofont-visa-alt', searchTerms: [] }, { title: 'icofont-visa-electron', searchTerms: [] }, { title: 'icofont-funky-man', searchTerms: [] }, { title: 'icofont-girl-alt', searchTerms: [] }, { title: 'icofont-user-female', searchTerms: [] }, { title: 'icofont-user-male', searchTerms: [] }, { title: 'icofont-user-suited', searchTerms: [] }, { title: 'icofont-users-social', searchTerms: [] }, { title: 'icofont-waiter-alt', searchTerms: [] }, { title: 'icofont-search-1', searchTerms: [] }, { title: 'icofont-search-2', searchTerms: [] }, { title: 'icofont-search-document', searchTerms: [] }, { title: 'icofont-search-folder', searchTerms: [] }, { title: 'icofont-search-job', searchTerms: [] }, { title: 'icofont-search-map', searchTerms: [] }, { title: 'icofont-search-property', searchTerms: [] }, { title: 'icofont-search-restaurant', searchTerms: [] }, { title: 'icofont-search-stock', searchTerms: [] }, { title: 'icofont-search-user', searchTerms: [] }, { title: 'icofont-baidu-tieba', searchTerms: [] }, { title: 'icofont-bbm-messenger', searchTerms: [] }, { title: 'icofont-facebook-messenger', searchTerms: [] }, { title: 'icofont-google-buzz', searchTerms: [] }, { title: 'icofont-google-hangouts', searchTerms: [] }, { title: 'icofont-google-map', searchTerms: [] }, { title: 'icofont-google-plus', searchTerms: [] }, { title: 'icofont-google-talk', searchTerms: [] }, { title: 'icofont-hype-machine', searchTerms: [] }, { title: 'icofont-line-messenger', searchTerms: [] }, { title: 'icofont-linux-mint', searchTerms: [] }, { title: 'icofont-live-messenger', searchTerms: [] }, { title: 'icofont-stack-exchange', searchTerms: [] }, { title: 'icofont-stack-overflow', searchTerms: [] }, { title: 'icofont-badminton-birdie', searchTerms: [] }, { title: 'icofont-basketball-hoop', searchTerms: [] }, { title: 'icofont-billiard-ball', searchTerms: [] }, { title: 'icofont-bowling-alt', searchTerms: [] }, { title: 'icofont-cheer-leader', searchTerms: [] }, { title: 'icofont-field-alt', searchTerms: [] }, { title: 'icofont-football-alt', searchTerms: [] }, { title: 'icofont-football-american', searchTerms: [] }, { title: 'icofont-goal-keeper', searchTerms: [] }, { title: 'icofont-golf-alt', searchTerms: [] }, { title: 'icofont-golf-bag', searchTerms: [] }, { title: 'icofont-golf-cart', searchTerms: [] }, { title: 'icofont-golf-field', searchTerms: [] }, { title: 'icofont-hockey-alt', searchTerms: [] }, { title: 'icofont-ice-skate', searchTerms: [] }, { title: 'icofont-jersey-alt', searchTerms: [] }, { title: 'icofont-match-review', searchTerms: [] }, { title: 'icofont-medal-sport', searchTerms: [] }, { title: 'icofont-olympic-logo', searchTerms: [] }, { title: 'icofont-penalty-card', searchTerms: [] }, { title: 'icofont-racing-car', searchTerms: [] }, { title: 'icofont-racings-wheel', searchTerms: [] }, { title: 'icofont-refree-jersey', searchTerms: [] }, { title: 'icofont-result-sport', searchTerms: [] }, { title: 'icofont-rugby-ball', searchTerms: [] }, { title: 'icofont-rugby-player', searchTerms: [] }, { title: 'icofont-score-board', searchTerms: [] }, { title: 'icofont-skiing-man', searchTerms: [] }, { title: 'icofont-skydiving-goggles', searchTerms: [] }, { title: 'icofont-snow-mobile', searchTerms: [] }, { title: 'icofont-table-tennis', searchTerms: [] }, { title: 'icofont-team-alt', searchTerms: [] }, { title: 'icofont-tennis-player', searchTerms: [] }, { title: 'icofont-trophy-alt', searchTerms: [] }, { title: 'icofont-volleyball-alt', searchTerms: [] }, { title: 'icofont-volleyball-fire', searchTerms: [] }, { title: 'icofont-water-bottle', searchTerms: [] }, { title: 'icofont-whistle-alt', searchTerms: [] }, { title: 'icofont-win-trophy', searchTerms: [] }, { title: 'icofont-align-center', searchTerms: [] }, { title: 'icofont-align-left', searchTerms: [] }, { title: 'icofont-align-right', searchTerms: [] }, { title: 'icofont-all-caps', searchTerms: [] }, { title: 'icofont-clip-board', searchTerms: [] }, { title: 'icofont-code-alt', searchTerms: [] }, { title: 'icofont-color-bucket', searchTerms: [] }, { title: 'icofont-color-picker', searchTerms: [] }, { title: 'icofont-copy-invert', searchTerms: [] }, { title: 'icofont-delete-alt', searchTerms: [] }, { title: 'icofont-edit-alt', searchTerms: [] }, { title: 'icofont-eraser-alt', searchTerms: [] }, { title: 'icofont-italic-alt', searchTerms: [] }, { title: 'icofont-justify-all', searchTerms: [] }, { title: 'icofont-justify-center', searchTerms: [] }, { title: 'icofont-justify-left', searchTerms: [] }, { title: 'icofont-justify-right', searchTerms: [] }, { title: 'icofont-link-broken', searchTerms: [] }, { title: 'icofont-paper-clip', searchTerms: [] }, { title: 'icofont-small-cap', searchTerms: [] }, { title: 'icofont-strike-through', searchTerms: [] }, { title: 'icofont-sub-listing', searchTerms: [] }, { title: 'icofont-text-height', searchTerms: [] }, { title: 'icofont-text-width', searchTerms: [] }, { title: 'icofont-air-balloon', searchTerms: [] }, { title: 'icofont-airplane-alt', searchTerms: [] }, { title: 'icofont-articulated-truck', searchTerms: [] }, { title: 'icofont-auto-mobile', searchTerms: [] }, { title: 'icofont-auto-rickshaw', searchTerms: [] }, { title: 'icofont-cable-car', searchTerms: [] }, { title: 'icofont-delivery-time', searchTerms: [] }, { title: 'icofont-fast-delivery', searchTerms: [] }, { title: 'icofont-free-delivery', searchTerms: [] }, { title: 'icofont-motor-biker', searchTerms: [] }, { title: 'icofont-oil-truck', searchTerms: [] }, { title: 'icofont-sea-plane', searchTerms: [] }, { title: 'icofont-ship-alt', searchTerms: [] }, { title: 'icofont-speed-boat', searchTerms: [] }, { title: 'icofont-train-line', searchTerms: [] }, { title: 'icofont-train-steam', searchTerms: [] }, { title: 'icofont-truck-alt', searchTerms: [] }, { title: 'icofont-truck-loaded', searchTerms: [] }, { title: 'icofont-van-alt', searchTerms: [] }, { title: 'icofont-air-ticket', searchTerms: [] }, { title: 'icofont-beach-bed', searchTerms: [] }, { title: 'icofont-camping-vest', searchTerms: [] }, { title: 'icofont-direction-sign', searchTerms: [] }, { title: 'icofont-hill-side', searchTerms: [] }, { title: 'icofont-island-alt', searchTerms: [] }, { title: 'icofont-sandals-female', searchTerms: [] }, { title: 'icofont-sandals-male', searchTerms: [] }, { title: 'icofont-forest-fire', searchTerms: [] }, { title: 'icofont-full-night', searchTerms: [] }, { title: 'icofont-full-sunny', searchTerms: [] }, { title: 'icofont-hail-night', searchTerms: [] }, { title: 'icofont-hail-sunny', searchTerms: [] }, { title: 'icofont-hill-night', searchTerms: [] }, { title: 'icofont-hill-sunny', searchTerms: [] }, { title: 'icofont-rainy-night', searchTerms: [] }, { title: 'icofont-rainy-sunny', searchTerms: [] }, { title: 'icofont-rainy-thunder', searchTerms: [] }, { title: 'icofont-snow-alt', searchTerms: [] }, { title: 'icofont-snow-flake', searchTerms: [] }, { title: 'icofont-snow-temp', searchTerms: [] }, { title: 'icofont-snowy-hail', searchTerms: [] }, { title: 'icofont-snowy-rainy', searchTerms: [] }, { title: 'icofont-sun-alt', searchTerms: [] }, { title: 'icofont-sun-rise', searchTerms: [] }, { title: 'icofont-sun-set', searchTerms: [] }, { title: 'icofont-thunder-light', searchTerms: [] }, { title: 'icofont-umbrella-alt', searchTerms: [] }, { title: 'icofont-wind-waves', searchTerms: [] }, { title: 'icofont-windy-hail', searchTerms: [] }, { title: 'icofont-windy-night', searchTerms: [] }, { title: 'icofont-windy-raining', searchTerms: [] }, { title: 'icofont-windy-sunny', searchTerms: [] }, { title: 'icofont-address-book', searchTerms: [] }, { title: 'icofont-bag-alt', searchTerms: [] }, { title: 'icofont-bar-code', searchTerms: [] }, { title: 'icofont-battery-empty', searchTerms: [] }, { title: 'icofont-battery-full', searchTerms: [] }, { title: 'icofont-battery-half', searchTerms: [] }, { title: 'icofont-battery-low', searchTerms: [] }, { title: 'icofont-book-mark', searchTerms: [] }, { title: 'icofont-bulb-alt', searchTerms: [] }, { title: 'icofont-camera-alt', searchTerms: [] }, { title: 'icofont-cart-alt', searchTerms: [] }, { title: 'icofont-check-alt', searchTerms: [] }, { title: 'icofont-check-circled', searchTerms: [] }, { title: 'icofont-children-care', searchTerms: [] }, { title: 'icofont-clock-time', searchTerms: [] }, { title: 'icofont-close-circled', searchTerms: [] }, { title: 'icofont-cloud-download', searchTerms: [] }, { title: 'icofont-cloud-refresh', searchTerms: [] }, { title: 'icofont-cloud-upload', searchTerms: [] }, { title: 'icofont-credit-card', searchTerms: [] }, { title: 'icofont-dashboard-web', searchTerms: [] }, { title: 'icofont-database-add', searchTerms: [] }, { title: 'icofont-database-locked', searchTerms: [] }, { title: 'icofont-database-remove', searchTerms: [] }, { title: 'icofont-dice-multiple', searchTerms: [] }, { title: 'icofont-document-folder', searchTerms: [] }, { title: 'icofont-download-alt', searchTerms: [] }, { title: 'icofont-envelope-open', searchTerms: [] }, { title: 'icofont-exclamation-circle', searchTerms: [] }, { title: 'icofont-exclamation-square', searchTerms: [] }, { title: 'icofont-exclamation-tringle', searchTerms: [] }, { title: 'icofont-external-link', searchTerms: [] }, { title: 'icofont-eye-alt', searchTerms: [] }, { title: 'icofont-eye-blocked', searchTerms: [] }, { title: 'icofont-eye-dropper', searchTerms: [] }, { title: 'icofont-file-fill', searchTerms: [] }, { title: 'icofont-fire-alt', searchTerms: [] }, { title: 'icofont-fire-burn', searchTerms: [] }, { title: 'icofont-flame-torch', searchTerms: [] }, { title: 'icofont-flash-light', searchTerms: [] }, { title: 'icofont-folder-open', searchTerms: [] }, { title: 'icofont-foot-print', searchTerms: [] }, { title: 'icofont-gear-alt', searchTerms: [] }, { title: 'icofont-hard-disk', searchTerms: [] }, { title: 'icofont-heart-alt', searchTerms: [] }, { title: 'icofont-hour-glass', searchTerms: [] }, { title: 'icofont-info-circle', searchTerms: [] }, { title: 'icofont-info-square', searchTerms: [] }, { title: 'icofont-key-hole', searchTerms: [] }, { title: 'icofont-life-bouy', searchTerms: [] }, { title: 'icofont-life-buoy', searchTerms: [] }, { title: 'icofont-life-jacket', searchTerms: [] }, { title: 'icofont-life-ring', searchTerms: [] }, { title: 'icofont-light-bulb', searchTerms: [] }, { title: 'icofont-lightning-ray', searchTerms: [] }, { title: 'icofont-line-height', searchTerms: [] }, { title: 'icofont-link-alt', searchTerms: [] }, { title: 'icofont-listine-dots', searchTerms: [] }, { title: 'icofont-listing-box', searchTerms: [] }, { title: 'icofont-listing-number', searchTerms: [] }, { title: 'icofont-live-support', searchTerms: [] }, { title: 'icofont-location-arrow', searchTerms: [] }, { title: 'icofont-location-pin', searchTerms: [] }, { title: 'icofont-long-drive', searchTerms: [] }, { title: 'icofont-magic-alt', searchTerms: [] }, { title: 'icofont-mail-box', searchTerms: [] }, { title: 'icofont-map-pins', searchTerms: [] }, { title: 'icofont-mega-phone', searchTerms: [] }, { title: 'icofont-megaphone-alt', searchTerms: [] }, { title: 'icofont-memory-card', searchTerms: [] }, { title: 'icofont-mic-mute', searchTerms: [] }, { title: 'icofont-minus-circle', searchTerms: [] }, { title: 'icofont-minus-square', searchTerms: [] }, { title: 'icofont-mobile-phone', searchTerms: [] }, { title: 'icofont-navigation-menu', searchTerms: [] }, { title: 'icofont-network-tower', searchTerms: [] }, { title: 'icofont-no-smoking', searchTerms: [] }, { title: 'icofont-not-allowed', searchTerms: [] }, { title: 'icofont-paper-plane', searchTerms: [] }, { title: 'icofont-penguin-linux', searchTerms: [] }, { title: 'icofont-phone-circle', searchTerms: [] }, { title: 'icofont-plus-circle', searchTerms: [] }, { title: 'icofont-plus-square', searchTerms: [] }, { title: 'icofont-qr-code', searchTerms: [] }, { title: 'icofont-question-circle', searchTerms: [] }, { title: 'icofont-question-square', searchTerms: [] }, { title: 'icofont-quote-left', searchTerms: [] }, { title: 'icofont-quote-right', searchTerms: [] }, { title: 'icofont-reply-all', searchTerms: [] }, { title: 'icofont-rss-feed', searchTerms: [] }, { title: 'icofont-sale-discount', searchTerms: [] }, { title: 'icofont-send-mail', searchTerms: [] }, { title: 'icofont-settings-alt', searchTerms: [] }, { title: 'icofont-share-alt', searchTerms: [] }, { title: 'icofont-share-boxed', searchTerms: [] }, { title: 'icofont-shopping-cart', searchTerms: [] }, { title: 'icofont-sign-in', searchTerms: [] }, { title: 'icofont-sign-out', searchTerms: [] }, { title: 'icofont-site-map', searchTerms: [] }, { title: 'icofont-smart-phone', searchTerms: [] }, { title: 'icofont-sort-alt', searchTerms: [] }, { title: 'icofont-speech-comments', searchTerms: [] }, { title: 'icofont-speed-meter', searchTerms: [] }, { title: 'icofont-ssl-security', searchTerms: [] }, { title: 'icofont-street-view', searchTerms: [] }, { title: 'icofont-support-faq', searchTerms: [] }, { title: 'icofont-tack-pin', searchTerms: [] }, { title: 'icofont-tasks-alt', searchTerms: [] }, { title: 'icofont-thumbs-down', searchTerms: [] }, { title: 'icofont-thumbs-up', searchTerms: [] }, { title: 'icofont-tick-boxed', searchTerms: [] }, { title: 'icofont-tick-mark', searchTerms: [] }, { title: 'icofont-toggle-off', searchTerms: [] }, { title: 'icofont-toggle-on', searchTerms: [] }, { title: 'icofont-traffic-light', searchTerms: [] }, { title: 'icofont-unique-idea', searchTerms: [] }, { title: 'icofont-upload-alt', searchTerms: [] }, { title: 'icofont-usb-drive', searchTerms: [] }, { title: 'icofont-vector-path', searchTerms: [] }, { title: 'icofont-verification-check', searchTerms: [] }, { title: 'icofont-wall-clock', searchTerms: [] }, { title: 'icofont-warning-alt', searchTerms: [] }, { title: 'icofont-water-drop', searchTerms: [] }, { title: 'icofont-wifi-alt', searchTerms: [] }, { title: 'icofont-cat-alt-1', searchTerms: [] }, { title: 'icofont-cat-alt-2', searchTerms: [] }, { title: 'icofont-cat-alt-3', searchTerms: [] }, { title: 'icofont-elephant-head-alt', searchTerms: [] }, { title: 'icofont-giraffe-head-1', searchTerms: [] }, { title: 'icofont-giraffe-head-2', searchTerms: [] }, { title: 'icofont-horse-head-1', searchTerms: [] }, { title: 'icofont-horse-head-2', searchTerms: [] }, { title: 'icofont-lion-head-1', searchTerms: [] }, { title: 'icofont-lion-head-2', searchTerms: [] }, { title: 'icofont-brand-american-airlines', searchTerms: [] }, { title: 'icofont-brand-android-robot', searchTerms: [] }, { title: 'icofont-brand-burger-king', searchTerms: [] }, { title: 'icofont-brand-business-insider', searchTerms: [] }, { title: 'icofont-brand-china-mobile', searchTerms: [] }, { title: 'icofont-brand-china-telecom', searchTerms: [] }, { title: 'icofont-brand-china-unicom', searchTerms: [] }, { title: 'icofont-brand-cocal-cola', searchTerms: [] }, { title: 'icofont-brand-etihad-airways', searchTerms: [] }, { title: 'icofont-brand-general-electric', searchTerms: [] }, { title: 'icofont-brand-life-hacker', searchTerms: [] }, { title: 'icofont-brand-linux-mint', searchTerms: [] }, { title: 'icofont-brand-louis-vuitton', searchTerms: [] }, { title: 'icofont-brand-mac-os', searchTerms: [] }, { title: 'icofont-brand-marvel-app', searchTerms: [] }, { title: 'icofont-brand-pizza-hut', searchTerms: [] }, { title: 'icofont-brand-qatar-air', searchTerms: [] }, { title: 'icofont-brand-saudia-airlines', searchTerms: [] }, { title: 'icofont-brand-sk-telecom', searchTerms: [] }, { title: 'icofont-brand-smashing-magazine', searchTerms: [] }, { title: 'icofont-brand-sony-ericsson', searchTerms: [] }, { title: 'icofont-brand-t-mobile', searchTerms: [] }, { title: 'icofont-brand-tata-indicom', searchTerms: [] }, { title: 'icofont-brand-the-verge', searchTerms: [] }, { title: 'icofont-chart-arrows-axis', searchTerms: [] }, { title: 'icofont-chart-bar-graph', searchTerms: [] }, { title: 'icofont-chart-flow-1', searchTerms: [] }, { title: 'icofont-chart-flow-2', searchTerms: [] }, { title: 'icofont-chart-histogram-alt', searchTerms: [] }, { title: 'icofont-chart-line-alt', searchTerms: [] }, { title: 'icofont-chart-pie-alt', searchTerms: [] }, { title: 'icofont-chart-radar-graph', searchTerms: [] }, { title: 'icofont-fire-extinguisher-alt', searchTerms: [] }, { title: 'icofont-safety-hat-light', searchTerms: [] }, { title: 'icofont-under-construction-alt', searchTerms: [] }, { title: 'icofont-vehicle-delivery-van', searchTerms: [] }, { title: 'icofont-turkish-lira-false', searchTerms: [] }, { title: 'icofont-turkish-lira-minus', searchTerms: [] }, { title: 'icofont-turkish-lira-plus', searchTerms: [] }, { title: 'icofont-turkish-lira-true', searchTerms: [] }, { title: 'icofont-headphone-alt-1', searchTerms: [] }, { title: 'icofont-headphone-alt-2', searchTerms: [] }, { title: 'icofont-headphone-alt-3', searchTerms: [] }, { title: 'icofont-ui-head-phone', searchTerms: [] }, { title: 'icofont-curved-double-left', searchTerms: [] }, { title: 'icofont-curved-double-right', searchTerms: [] }, { title: 'icofont-hand-drawn-down', searchTerms: [] }, { title: 'icofont-hand-drawn-left', searchTerms: [] }, { title: 'icofont-hand-drawn-right', searchTerms: [] }, { title: 'icofont-hand-drawn-up', searchTerms: [] }, { title: 'icofont-line-block-down', searchTerms: [] }, { title: 'icofont-line-block-left', searchTerms: [] }, { title: 'icofont-line-block-right', searchTerms: [] }, { title: 'icofont-line-block-up', searchTerms: [] }, { title: 'icofont-long-arrow-down', searchTerms: [] }, { title: 'icofont-long-arrow-left', searchTerms: [] }, { title: 'icofont-long-arrow-right', searchTerms: [] }, { title: 'icofont-long-arrow-up', searchTerms: [] }, { title: 'icofont-rounded-double-left', searchTerms: [] }, { title: 'icofont-rounded-double-right', searchTerms: [] }, { title: 'icofont-rounded-left-down', searchTerms: [] }, { title: 'icofont-rounded-left-up', searchTerms: [] }, { title: 'icofont-rounded-right-down', searchTerms: [] }, { title: 'icofont-rounded-right-up', searchTerms: [] }, { title: 'icofont-scroll-bubble-down', searchTerms: [] }, { title: 'icofont-scroll-bubble-left', searchTerms: [] }, { title: 'icofont-scroll-bubble-right', searchTerms: [] }, { title: 'icofont-scroll-bubble-up', searchTerms: [] }, { title: 'icofont-scroll-double-down', searchTerms: [] }, { title: 'icofont-scroll-double-left', searchTerms: [] }, { title: 'icofont-scroll-double-right', searchTerms: [] }, { title: 'icofont-scroll-double-up', searchTerms: [] }, { title: 'icofont-scroll-long-down', searchTerms: [] }, { title: 'icofont-scroll-long-left', searchTerms: [] }, { title: 'icofont-scroll-long-right', searchTerms: [] }, { title: 'icofont-scroll-long-up', searchTerms: [] }, { title: 'icofont-simple-left-down', searchTerms: [] }, { title: 'icofont-simple-left-up', searchTerms: [] }, { title: 'icofont-simple-right-down', searchTerms: [] }, { title: 'icofont-simple-right-up', searchTerms: [] }, { title: 'icofont-thin-double-left', searchTerms: [] }, { title: 'icofont-thin-double-right', searchTerms: [] }, { title: 'icofont-certificate-alt-1', searchTerms: [] }, { title: 'icofont-certificate-alt-2', searchTerms: [] }, { title: 'icofont-pen-alt-4', searchTerms: [] }, { title: 'icofont-pencil-alt-5', searchTerms: [] }, { title: 'icofont-read-book-alt', searchTerms: [] }, { title: 'icofont-test-tube-alt', searchTerms: [] }, { title: 'icofont-stuck-out-tongue', searchTerms: [] }, { title: 'icofont-file-avi-mp4', searchTerms: [] }, { title: 'icofont-gym-alt-1', searchTerms: [] }, { title: 'icofont-gym-alt-2', searchTerms: [] }, { title: 'icofont-gym-alt-3', searchTerms: [] }, { title: 'icofont-bell-pepper-capsicum', searchTerms: [] }, { title: 'icofont-fork-and-knife', searchTerms: [] }, { title: 'icofont-ice-cream-alt', searchTerms: [] }, { title: 'icofont-salt-and-pepper', searchTerms: [] }, { title: 'icofont-spoon-and-fork', searchTerms: [] }, { title: 'icofont-baby-milk-bottle', searchTerms: [] }, { title: 'icofont-law-alt-1', searchTerms: [] }, { title: 'icofont-law-alt-2', searchTerms: [] }, { title: 'icofont-law-alt-3', searchTerms: [] }, { title: 'icofont-lawyer-alt-1', searchTerms: [] }, { title: 'icofont-lawyer-alt-2', searchTerms: [] }, { title: 'icofont-calculator-alt-1', searchTerms: [] }, { title: 'icofont-calculator-alt-2', searchTerms: [] }, { title: 'icofont-circle-ruler-alt', searchTerms: [] }, { title: 'icofont-compass-alt-1', searchTerms: [] }, { title: 'icofont-compass-alt-2', searchTerms: [] }, { title: 'icofont-compass-alt-3', searchTerms: [] }, { title: 'icofont-compass-alt-4', searchTerms: [] }, { title: 'icofont-marker-alt-1', searchTerms: [] }, { title: 'icofont-marker-alt-2', searchTerms: [] }, { title: 'icofont-marker-alt-3', searchTerms: [] }, { title: 'icofont-mathematical-alt-1', searchTerms: [] }, { title: 'icofont-mathematical-alt-2', searchTerms: [] }, { title: 'icofont-pen-alt-1', searchTerms: [] }, { title: 'icofont-pen-alt-2', searchTerms: [] }, { title: 'icofont-pen-alt-3', searchTerms: [] }, { title: 'icofont-pencil-alt-1', searchTerms: [] }, { title: 'icofont-pencil-alt-2', searchTerms: [] }, { title: 'icofont-pencil-alt-3', searchTerms: [] }, { title: 'icofont-pencil-alt-4', searchTerms: [] }, { title: 'icofont-ruler-alt-1', searchTerms: [] }, { title: 'icofont-ruler-alt-2', searchTerms: [] }, { title: 'icofont-ruler-compass-alt', searchTerms: [] }, { title: 'icofont-dna-alt-1', searchTerms: [] }, { title: 'icofont-dna-alt-2', searchTerms: [] }, { title: 'icofont-first-aid-alt', searchTerms: [] }, { title: 'icofont-heart-beat-alt', searchTerms: [] }, { title: 'icofont-medical-sign-alt', searchTerms: [] }, { title: 'icofont-ui-cell-phone', searchTerms: [] }, { title: 'icofont-ui-clip-board', searchTerms: [] }, { title: 'icofont-ui-contact-list', searchTerms: [] }, { title: 'icofont-ui-dial-phone', searchTerms: [] }, { title: 'icofont-ui-fire-wall', searchTerms: [] }, { title: 'icofont-ui-flash-light', searchTerms: [] }, { title: 'icofont-ui-love-add', searchTerms: [] }, { title: 'icofont-ui-love-broken', searchTerms: [] }, { title: 'icofont-ui-love-remove', searchTerms: [] }, { title: 'icofont-ui-music-player', searchTerms: [] }, { title: 'icofont-ui-play-stop', searchTerms: [] }, { title: 'icofont-ui-rate-add', searchTerms: [] }, { title: 'icofont-ui-rate-blank', searchTerms: [] }, { title: 'icofont-ui-rate-remove', searchTerms: [] }, { title: 'icofont-ui-social-link', searchTerms: [] }, { title: 'icofont-ui-text-chat', searchTerms: [] }, { title: 'icofont-ui-text-loading', searchTerms: [] }, { title: 'icofont-ui-touch-phone', searchTerms: [] }, { title: 'icofont-ui-user-group', searchTerms: [] }, { title: 'icofont-ui-v-card', searchTerms: [] }, { title: 'icofont-ui-video-chat', searchTerms: [] }, { title: 'icofont-ui-video-message', searchTerms: [] }, { title: 'icofont-ui-video-play', searchTerms: [] }, { title: 'icofont-ui-zoom-in', searchTerms: [] }, { title: 'icofont-ui-zoom-out', searchTerms: [] }, { title: 'icofont-play-alt-1', searchTerms: [] }, { title: 'icofont-play-alt-2', searchTerms: [] }, { title: 'icofont-play-alt-3', searchTerms: [] }, { title: 'icofont-retro-music-disk', searchTerms: [] }, { title: 'icofont-sound-wave-alt', searchTerms: [] }, { title: 'icofont-american-express-alt', searchTerms: [] }, { title: 'icofont-apple-pay-alt', searchTerms: [] }, { title: 'icofont-bank-transfer-alt', searchTerms: [] }, { title: 'icofont-western-union-alt', searchTerms: [] }, { title: 'icofont-hotel-boy-alt', searchTerms: [] }, { title: 'icofont-man-in-glasses', searchTerms: [] }, { title: 'icofont-user-alt-1', searchTerms: [] }, { title: 'icofont-user-alt-2', searchTerms: [] }, { title: 'icofont-user-alt-3', searchTerms: [] }, { title: 'icofont-user-alt-4', searchTerms: [] }, { title: 'icofont-user-alt-5', searchTerms: [] }, { title: 'icofont-user-alt-6', searchTerms: [] }, { title: 'icofont-user-alt-7', searchTerms: [] }, { title: 'icofont-users-alt-1', searchTerms: [] }, { title: 'icofont-users-alt-2', searchTerms: [] }, { title: 'icofont-users-alt-3', searchTerms: [] }, { title: 'icofont-users-alt-4', searchTerms: [] }, { title: 'icofont-users-alt-5', searchTerms: [] }, { title: 'icofont-users-alt-6', searchTerms: [] }, { title: 'icofont-woman-in-glasses', searchTerms: [] }, { title: 'icofont-boot-alt-1', searchTerms: [] }, { title: 'icofont-boot-alt-2', searchTerms: [] }, { title: 'icofont-racing-flag-alt', searchTerms: [] }, { title: 'icofont-runner-alt-1', searchTerms: [] }, { title: 'icofont-runner-alt-2', searchTerms: [] }, { title: 'icofont-bicycle-alt-1', searchTerms: [] }, { title: 'icofont-bicycle-alt-2', searchTerms: [] }, { title: 'icofont-bus-alt-1', searchTerms: [] }, { title: 'icofont-bus-alt-2', searchTerms: [] }, { title: 'icofont-bus-alt-3', searchTerms: [] }, { title: 'icofont-car-alt-1', searchTerms: [] }, { title: 'icofont-car-alt-2', searchTerms: [] }, { title: 'icofont-car-alt-3', searchTerms: [] }, { title: 'icofont-car-alt-4', searchTerms: [] }, { title: 'icofont-fire-truck-alt', searchTerms: [] }, { title: 'icofont-motor-bike-alt', searchTerms: [] }, { title: 'icofont-rocket-alt-1', searchTerms: [] }, { title: 'icofont-rocket-alt-2', searchTerms: [] }, { title: 'icofont-5-star-hotel', searchTerms: [] }, { title: 'icofont-hail-rainy-night', searchTerms: [] }, { title: 'icofont-hail-rainy-sunny', searchTerms: [] }, { title: 'icofont-hail-thunder-night', searchTerms: [] }, { title: 'icofont-hail-thunder-sunny', searchTerms: [] }, { title: 'icofont-snowy-night-hail', searchTerms: [] }, { title: 'icofont-snowy-night-rainy', searchTerms: [] }, { title: 'icofont-snowy-sunny-hail', searchTerms: [] }, { title: 'icofont-snowy-sunny-rainy', searchTerms: [] }, { title: 'icofont-snowy-thunder-night', searchTerms: [] }, { title: 'icofont-snowy-thunder-sunny', searchTerms: [] }, { title: 'icofont-snowy-windy-night', searchTerms: [] }, { title: 'icofont-snowy-windy-sunny', searchTerms: [] }, { title: 'icofont-sunny-day-temp', searchTerms: [] }, { title: 'icofont-wind-scale-0', searchTerms: [] }, { title: 'icofont-wind-scale-1', searchTerms: [] }, { title: 'icofont-wind-scale-10', searchTerms: [] }, { title: 'icofont-wind-scale-11', searchTerms: [] }, { title: 'icofont-wind-scale-12', searchTerms: [] }, { title: 'icofont-wind-scale-2', searchTerms: [] }, { title: 'icofont-wind-scale-3', searchTerms: [] }, { title: 'icofont-wind-scale-4', searchTerms: [] }, { title: 'icofont-wind-scale-5', searchTerms: [] }, { title: 'icofont-wind-scale-6', searchTerms: [] }, { title: 'icofont-wind-scale-7', searchTerms: [] }, { title: 'icofont-wind-scale-8', searchTerms: [] }, { title: 'icofont-wind-scale-9', searchTerms: [] }, { title: 'icofont-windy-thunder-raining', searchTerms: [] }, { title: 'icofont-close-line-circled', searchTerms: [] }, { title: 'icofont-close-squared-alt', searchTerms: [] }, { title: 'icofont-code-not-allowed', searchTerms: [] }, { title: 'icofont-flag-alt-1', searchTerms: [] }, { title: 'icofont-flag-alt-2', searchTerms: [] }, { title: 'icofont-spinner-alt-1', searchTerms: [] }, { title: 'icofont-spinner-alt-2', searchTerms: [] }, { title: 'icofont-spinner-alt-3', searchTerms: [] }, { title: 'icofont-spinner-alt-4', searchTerms: [] }, { title: 'icofont-spinner-alt-5', searchTerms: [] }, { title: 'icofont-spinner-alt-6', searchTerms: [] }, { title: 'icofont-star-alt-1', searchTerms: [] }, { title: 'icofont-star-alt-2', searchTerms: [] }, { title: 'icofont-tools-alt-2', searchTerms: [] }, { title: 'icofont-brand-air-new-zealand', searchTerms: [] }, { title: 'icofont-hand-drawn-alt-down', searchTerms: [] }, { title: 'icofont-hand-drawn-alt-left', searchTerms: [] }, { title: 'icofont-hand-drawn-alt-right', searchTerms: [] }, { title: 'icofont-hand-drawn-alt-up', searchTerms: [] }, { title: 'icofont-police-car-alt-1', searchTerms: [] }, { title: 'icofont-police-car-alt-2', searchTerms: [] }, { title: 'icofont-pen-holder-alt-1', searchTerms: [] }, { title: 'icofont-ruler-pencil-alt-1', searchTerms: [] }, { title: 'icofont-ruler-pencil-alt-2', searchTerms: [] }, { title: 'icofont-cash-on-delivery-alt', searchTerms: [] }, { title: 'icofont-diners-club-alt-1', searchTerms: [] }, { title: 'icofont-diners-club-alt-2', searchTerms: [] }, { title: 'icofont-diners-club-alt-3', searchTerms: [] }, { title: 'icofont-google-wallet-alt-1', searchTerms: [] }, { title: 'icofont-google-wallet-alt-2', searchTerms: [] }, { title: 'icofont-google-wallet-alt-3', searchTerms: [] }, { title: 'icofont-business-man-alt-1', searchTerms: [] }, { title: 'icofont-business-man-alt-2', searchTerms: [] }, { title: 'icofont-business-man-alt-3', searchTerms: [] }, { title: 'icofont-sail-boat-alt-1', searchTerms: [] }, { title: 'icofont-sail-boat-alt-2', searchTerms: [] }, { title: 'icofont-close-line-squared-alt', searchTerms: [] },
        ]
    });
});