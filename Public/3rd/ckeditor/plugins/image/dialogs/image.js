﻿! function() {
    var a = function(a, b) {
        function c() {
            var a = arguments,
                b = this.getContentElement("advanced", "txtdlgGenStyle");
            b && b.commit.apply(b, a), this.foreach(function(b) {
                b.commit && "txtdlgGenStyle" != b.id && b.commit.apply(b, a)
            })
        }

        function d(a) {
            if (!e) {
                e = 1;
                var b = this.getDialog(),
                    c = b.imageElement;
                if (c) {
                    this.commit(g, c);
                    for (var d, a = [].concat(a), f = a.length, h = 0; f > h; h++)(d = b.getContentElement.apply(b, a[h].split(":"))) && d.setup(g, c)
                }
                e = 0
            }
        }
        var e, f, g = 1,
            h = /^\s*(\d+)((px)|\%)?\s*$/i,
            i = /(^\s*(\d+)((px)|\%)?\s*$)|^$/i,
            j = /^\d+px$/,
            k = function() {
                var a = this.getValue(),
                    b = this.getDialog(),
                    c = a.match(h);
                c && ("%" == c[2] && m(b, !1), a = c[1]), b.lockRatio && (c = b.originalElement, "true" == c.getCustomData("isReady") && ("txtHeight" == this.id ? (a && "0" != a && (a = Math.round(c.$.width * (a / c.$.height))), isNaN(a) || b.setValueOf("info", "txtWidth", a)) : (a && "0" != a && (a = Math.round(c.$.height * (a / c.$.width))), isNaN(a) || b.setValueOf("info", "txtHeight", a)))), l(b)
            },
            l = function(a) {
                return a.originalElement && a.preview ? (a.commitContent(4, a.preview), 0) : 1
            },
            m = function(a, b) {
                if (!a.getContentElement("info", "ratioLock")) return null;
                var c = a.originalElement;
                if (!c) return null;
                if ("check" == b) {
                    if (!a.userlockRatio && "true" == c.getCustomData("isReady")) {
                        var d = a.getValueOf("info", "txtWidth"),
                            e = a.getValueOf("info", "txtHeight"),
                            c = 1e3 * c.$.width / c.$.height,
                            f = 1e3 * d / e;
                        a.lockRatio = !1, d || e ? !isNaN(c) && !isNaN(f) && Math.round(c) == Math.round(f) && (a.lockRatio = !0) : a.lockRatio = !0
                    }
                } else void 0 !== b ? a.lockRatio = b : (a.userlockRatio = 1, a.lockRatio = !a.lockRatio);
                return d = CKEDITOR.document.getById(s), a.lockRatio ? d.removeClass("cke_btn_unlocked") : d.addClass("cke_btn_unlocked"), d.setAttribute("aria-checked", a.lockRatio), CKEDITOR.env.hc && d.getChild(0).setHtml(a.lockRatio ? CKEDITOR.env.ie ? "\u25a0" : "\u25a3" : CKEDITOR.env.ie ? "\u25a1" : "\u25a2"), a.lockRatio
            },
            n = function(a, b) {
                var c = a.originalElement;
                if ("true" == c.getCustomData("isReady")) {
                    var d, e = a.getContentElement("info", "txtWidth"),
                        f = a.getContentElement("info", "txtHeight");
                    b ? c = d = 0 : (d = c.$.width, c = c.$.height), e && e.setValue(d), f && f.setValue(c)
                }
                l(a)
            },
            o = function(a, b) {
                function c(a, b) {
                    var c = a.match(h);
                    return c ? ("%" == c[2] && (c[1] += "%", m(d, !1)), c[1]) : b
                }
                if (a == g) {
                    var d = this.getDialog(),
                        e = "",
                        f = "txtWidth" == this.id ? "width" : "height",
                        i = b.getAttribute(f);
                    i && (e = c(i, e)), e = c(b.getStyle(f), e), this.setValue(e)
                }
            },
            p = function() {
                var b = this.originalElement,
                    c = CKEDITOR.document.getById(u);
                b.setCustomData("isReady", "true"), b.removeListener("load", p), b.removeListener("error", q), b.removeListener("abort", q), c && c.setStyle("display", "none"), this.dontResetSize || n(this, !1 === a.config.image_prefillDimensions), this.firstLoad && CKEDITOR.tools.setTimeout(function() {
                    m(this, "check")
                }, 0, this), this.dontResetSize = this.firstLoad = !1, l(this)
            },
            q = function() {
                var a = this.originalElement,
                    b = CKEDITOR.document.getById(u);
                a.removeListener("load", p), a.removeListener("error", q), a.removeListener("abort", q), a = CKEDITOR.getUrl(CKEDITOR.plugins.get("image").path + "images/noimage.png"), this.preview && this.preview.setAttribute("src", a), b && b.setStyle("display", "none"), m(this, !1)
            },
            r = function(a) {
                return CKEDITOR.tools.getNextId() + "_" + a
            },
            s = r("btnLockSizes"),
            t = r("btnResetSize"),
            u = r("ImagePreviewLoader"),
            v = r("previewLink"),
            w = r("previewImage");
        return {
            title: a.lang.image["image" == b ? "title" : "titleButton"],
            minWidth: 420,
            minHeight: 360,
            onShow: function() {
                this.linkEditMode = this.imageEditMode = this.linkElement = this.imageElement = !1, this.lockRatio = !0, this.userlockRatio = 0, this.dontResetSize = !1, this.firstLoad = !0, this.addLink = !1;
                var a = this.getParentEditor(),
                    c = a.getSelection(),
                    d = (c = c && c.getSelectedElement()) && a.elementPath(c).contains("a", 1),
                    e = CKEDITOR.document.getById(u);
                e && e.setStyle("display", "none"), f = new CKEDITOR.dom.element("img", a.document), this.preview = CKEDITOR.document.getById(w), this.originalElement = a.document.createElement("img"), this.originalElement.setAttribute("alt", ""), this.originalElement.setCustomData("isReady", "false"), d && (this.linkElement = d, this.addLink = this.linkEditMode = !0, a = d.getChildren(), 1 == a.count() && (e = a.getItem(0), e.type == CKEDITOR.NODE_ELEMENT && (e.is("img") || e.is("input"))) && (this.imageElement = a.getItem(0), this.imageElement.is("img") ? this.imageEditMode = "img" : this.imageElement.is("input") && (this.imageEditMode = "input")), "image" == b && this.setupContent(2, d)), this.customImageElement ? (this.imageEditMode = "img", this.imageElement = this.customImageElement, delete this.customImageElement) : (c && "img" == c.getName() && !c.data("cke-realelement") || c && "input" == c.getName() && "image" == c.getAttribute("type")) && (this.imageEditMode = c.getName(), this.imageElement = c), this.imageEditMode && (this.cleanImageElement = this.imageElement, this.imageElement = this.cleanImageElement.clone(!0, !0), this.setupContent(g, this.imageElement)), m(this, !0), CKEDITOR.tools.trim(this.getValueOf("info", "txtUrl")) || (this.preview.removeAttribute("src"), this.preview.setStyle("display", "none"))
            },
            onOk: function() {
                if (this.imageEditMode) {
                    var c = this.imageEditMode;
                    "image" == b && "input" == c && confirm(a.lang.image.button2Img) ? (this.imageElement = a.document.createElement("img"), this.imageElement.setAttribute("alt", ""), a.insertElement(this.imageElement)) : "image" != b && "img" == c && confirm(a.lang.image.img2Button) ? (this.imageElement = a.document.createElement("input"), this.imageElement.setAttributes({
                        type: "image",
                        alt: ""
                    }), a.insertElement(this.imageElement)) : (this.imageElement = this.cleanImageElement, delete this.cleanImageElement)
                } else "image" == b ? this.imageElement = a.document.createElement("img") : (this.imageElement = a.document.createElement("input"), this.imageElement.setAttribute("type", "image")), this.imageElement.setAttribute("alt", "");
                this.linkEditMode || (this.linkElement = a.document.createElement("a")), this.commitContent(g, this.imageElement), this.commitContent(2, this.linkElement), this.imageElement.getAttribute("style") || this.imageElement.removeAttribute("style"), this.imageEditMode ? !this.linkEditMode && this.addLink ? (a.insertElement(this.linkElement), this.imageElement.appendTo(this.linkElement)) : this.linkEditMode && !this.addLink && (a.getSelection().selectElement(this.linkElement), a.insertElement(this.imageElement)) : this.addLink ? this.linkEditMode ? this.linkElement.equals(a.getSelection().getSelectedElement()) ? (this.linkElement.setHtml(""), this.linkElement.append(this.imageElement, !1)) : a.insertElement(this.imageElement) : (a.insertElement(this.linkElement), this.linkElement.append(this.imageElement, !1)) : a.insertElement(this.imageElement)
            },
            onLoad: function() {
                "image" != b && this.hidePage("Link");
                var a = this._.element.getDocument();
                this.getContentElement("info", "ratioLock") && (this.addFocusable(a.getById(t), 5), this.addFocusable(a.getById(s), 5)), this.commitContent = c
            },
            onHide: function() {
                this.preview && this.commitContent(8, this.preview), this.originalElement && (this.originalElement.removeListener("load", p), this.originalElement.removeListener("error", q), this.originalElement.removeListener("abort", q), this.originalElement.remove(), this.originalElement = !1), delete this.imageElement
            },
            contents: [{
                id: "info",
                label: a.lang.image.infoTab,
                accessKey: "I",
                elements: [{
                    type: "vbox",
                    padding: 0,
                    children: [{
                        type: "hbox",
                        widths: ["280px", "110px"],
                        align: "right",
                        children: [{
                            id: "txtUrl",
                            type: "text",
                            label: a.lang.common.url,
                            required: !0,
                            onChange: function() {
                                var a = this.getDialog(),
                                    b = this.getValue();
                                if (0 < b.length) {
                                    var a = this.getDialog(),
                                        c = a.originalElement;
                                    a.preview && a.preview.removeStyle("display"), c.setCustomData("isReady", "false");
                                    var d = CKEDITOR.document.getById(u);
                                    d && d.setStyle("display", ""), c.on("load", p, a), c.on("error", q, a), c.on("abort", q, a), c.setAttribute("src", b), a.preview && (f.setAttribute("src", b), a.preview.setAttribute("src", f.$.src), l(a))
                                } else a.preview && (a.preview.removeAttribute("src"), a.preview.setStyle("display", "none"))
                            },
                            setup: function(a, b) {
                                if (a == g) {
                                    var c = b.data("cke-saved-src") || b.getAttribute("src");
                                    this.getDialog().dontResetSize = !0, this.setValue(c), this.setInitValue()
                                }
                            },
                            commit: function(a, b) {
                                a == g && (this.getValue() || this.isChanged()) ? (b.data("cke-saved-src", this.getValue()), b.setAttribute("src", this.getValue())) : 8 == a && (b.setAttribute("src", ""), b.removeAttribute("src"))
                            },
                            validate: CKEDITOR.dialog.validate.notEmpty(a.lang.image.urlMissing)
                        }, {
                            type: "button",
                            id: "browse",
                            style: "display:inline-block;margin-top:14px;",
                            align: "center",
                            label: a.lang.common.browseServer,
                            hidden: !0,
                            filebrowser: "info:txtUrl"
                        }]
                    }]
                }, {
                    id: "txtAlt",
                    type: "text",
                    label: a.lang.image.alt,
                    accessKey: "T",
                    "default": "",
                    onChange: function() {
                        l(this.getDialog())
                    },
                    setup: function(a, b) {
                        a == g && this.setValue(b.getAttribute("alt"))
                    },
                    commit: function(a, b) {
                        a == g ? (this.getValue() || this.isChanged()) && b.setAttribute("alt", this.getValue()) : 4 == a ? b.setAttribute("alt", this.getValue()) : 8 == a && b.removeAttribute("alt")
                    }
                }, {
                    type: "hbox",
                    children: [{
                        id: "basic",
                        type: "vbox",
                        children: [{
                            type: "hbox",
                            requiredContent: "img{width,height}",
                            widths: ["50%", "50%"],
                            children: [{
                                type: "vbox",
                                padding: 1,
                                children: [{
                                    type: "text",
                                    width: "45px",
                                    id: "txtWidth",
                                    label: a.lang.common.width,
                                    onKeyUp: k,
                                    onChange: function() {
                                        d.call(this, "advanced:txtdlgGenStyle")
                                    },
                                    validate: function() {
                                        var b = this.getValue().match(i);
                                        return (b = !(!b || 0 === parseInt(b[1], 10))) || alert(a.lang.common.invalidWidth), b
                                    },
                                    setup: o,
                                    commit: function(b, c) {
                                        var d = this.getValue();
                                        b == g ? (d && a.activeFilter.check("img{width,height}") ? c.setStyle("width", CKEDITOR.tools.cssLength(d)) : c.removeStyle("width"), c.removeAttribute("width")) : 4 == b ? d.match(h) ? c.setStyle("width", CKEDITOR.tools.cssLength(d)) : (d = this.getDialog().originalElement, "true" == d.getCustomData("isReady") && c.setStyle("width", d.$.width + "px")) : 8 == b && (c.removeAttribute("width"), c.removeStyle("width"))
                                    }
                                }, {
                                    type: "text",
                                    id: "txtHeight",
                                    width: "45px",
                                    label: a.lang.common.height,
                                    onKeyUp: k,
                                    onChange: function() {
                                        d.call(this, "advanced:txtdlgGenStyle")
                                    },
                                    validate: function() {
                                        var b = this.getValue().match(i);
                                        return (b = !(!b || 0 === parseInt(b[1], 10))) || alert(a.lang.common.invalidHeight), b
                                    },
                                    setup: o,
                                    commit: function(b, c) {
                                        var d = this.getValue();
                                        b == g ? (d && a.activeFilter.check("img{width,height}") ? c.setStyle("height", CKEDITOR.tools.cssLength(d)) : c.removeStyle("height"), c.removeAttribute("height")) : 4 == b ? d.match(h) ? c.setStyle("height", CKEDITOR.tools.cssLength(d)) : (d = this.getDialog().originalElement, "true" == d.getCustomData("isReady") && c.setStyle("height", d.$.height + "px")) : 8 == b && (c.removeAttribute("height"), c.removeStyle("height"))
                                    }
                                }]
                            }, {
                                id: "ratioLock",
                                type: "html",
                                style: "margin-top:30px;width:40px;height:40px;",
                                onLoad: function() {
                                    var a = CKEDITOR.document.getById(t),
                                        b = CKEDITOR.document.getById(s);
                                    a && (a.on("click", function(a) {
                                        n(this), a.data && a.data.preventDefault()
                                    }, this.getDialog()), a.on("mouseover", function() {
                                        this.addClass("cke_btn_over")
                                    }, a), a.on("mouseout", function() {
                                        this.removeClass("cke_btn_over")
                                    }, a)), b && (b.on("click", function(a) {
                                        m(this);
                                        var b = this.originalElement,
                                            c = this.getValueOf("info", "txtWidth");
                                        "true" == b.getCustomData("isReady") && c && (b = b.$.height / b.$.width * c, isNaN(b) || (this.setValueOf("info", "txtHeight", Math.round(b)), l(this))), a.data && a.data.preventDefault()
                                    }, this.getDialog()), b.on("mouseover", function() {
                                        this.addClass("cke_btn_over")
                                    }, b), b.on("mouseout", function() {
                                        this.removeClass("cke_btn_over")
                                    }, b))
                                },
                                html: '<div><a href="javascript:void(0)" tabindex="-1" title="' + a.lang.image.lockRatio + '" class="cke_btn_locked" id="' + s + '" role="checkbox"><span class="cke_icon"></span><span class="cke_label">' + a.lang.image.lockRatio + '</span></a><a href="javascript:void(0)" tabindex="-1" title="' + a.lang.image.resetSize + '" class="cke_btn_reset" id="' + t + '" role="button"><span class="cke_label">' + a.lang.image.resetSize + "</span></a></div>"
                            }]
                        }, {
                            type: "vbox",
                            padding: 1,
                            children: [{
                                type: "text",
                                id: "txtBorder",
                                requiredContent: "img{border-width}",
                                width: "60px",
                                label: a.lang.image.border,
                                "default": "",
                                onKeyUp: function() {
                                    l(this.getDialog())
                                },
                                onChange: function() {
                                    d.call(this, "advanced:txtdlgGenStyle")
                                },
                                validate: CKEDITOR.dialog.validate.integer(a.lang.image.validateBorder),
                                setup: function(a, b) {
                                    if (a == g) {
                                        var c;
                                        c = (c = (c = b.getStyle("border-width")) && c.match(/^(\d+px)(?: \1 \1 \1)?$/)) && parseInt(c[1], 10), isNaN(parseInt(c, 10)) && (c = b.getAttribute("border")), this.setValue(c)
                                    }
                                },
                                commit: function(a, b) {
                                    var c = parseInt(this.getValue(), 10);
                                    a == g || 4 == a ? (isNaN(c) ? !c && this.isChanged() && b.removeStyle("border") : (b.setStyle("border-width", CKEDITOR.tools.cssLength(c)), b.setStyle("border-style", "solid")), a == g && b.removeAttribute("border")) : 8 == a && (b.removeAttribute("border"), b.removeStyle("border-width"), b.removeStyle("border-style"), b.removeStyle("border-color"))
                                }
                            }, {
                                type: "text",
                                id: "txtHSpace",
                                requiredContent: "img{margin-left,margin-right}",
                                width: "60px",
                                label: a.lang.image.hSpace,
                                "default": "",
                                onKeyUp: function() {
                                    l(this.getDialog())
                                },
                                onChange: function() {
                                    d.call(this, "advanced:txtdlgGenStyle")
                                },
                                validate: CKEDITOR.dialog.validate.integer(a.lang.image.validateHSpace),
                                setup: function(a, b) {
                                    if (a == g) {
                                        var c, d;
                                        c = b.getStyle("margin-left"), d = b.getStyle("margin-right"), c = c && c.match(j), d = d && d.match(j), c = parseInt(c, 10), d = parseInt(d, 10), c = c == d && c, isNaN(parseInt(c, 10)) && (c = b.getAttribute("hspace")), this.setValue(c)
                                    }
                                },
                                commit: function(a, b) {
                                    var c = parseInt(this.getValue(), 10);
                                    a == g || 4 == a ? (isNaN(c) ? !c && this.isChanged() && (b.removeStyle("margin-left"), b.removeStyle("margin-right")) : (b.setStyle("margin-left", CKEDITOR.tools.cssLength(c)), b.setStyle("margin-right", CKEDITOR.tools.cssLength(c))), a == g && b.removeAttribute("hspace")) : 8 == a && (b.removeAttribute("hspace"), b.removeStyle("margin-left"), b.removeStyle("margin-right"))
                                }
                            }, {
                                type: "text",
                                id: "txtVSpace",
                                requiredContent: "img{margin-top,margin-bottom}",
                                width: "60px",
                                label: a.lang.image.vSpace,
                                "default": "",
                                onKeyUp: function() {
                                    l(this.getDialog())
                                },
                                onChange: function() {
                                    d.call(this, "advanced:txtdlgGenStyle")
                                },
                                validate: CKEDITOR.dialog.validate.integer(a.lang.image.validateVSpace),
                                setup: function(a, b) {
                                    if (a == g) {
                                        var c, d;
                                        c = b.getStyle("margin-top"), d = b.getStyle("margin-bottom"), c = c && c.match(j), d = d && d.match(j), c = parseInt(c, 10), d = parseInt(d, 10), c = c == d && c, isNaN(parseInt(c, 10)) && (c = b.getAttribute("vspace")), this.setValue(c)
                                    }
                                },
                                commit: function(a, b) {
                                    var c = parseInt(this.getValue(), 10);
                                    a == g || 4 == a ? (isNaN(c) ? !c && this.isChanged() && (b.removeStyle("margin-top"), b.removeStyle("margin-bottom")) : (b.setStyle("margin-top", CKEDITOR.tools.cssLength(c)), b.setStyle("margin-bottom", CKEDITOR.tools.cssLength(c))), a == g && b.removeAttribute("vspace")) : 8 == a && (b.removeAttribute("vspace"), b.removeStyle("margin-top"), b.removeStyle("margin-bottom"))
                                }
                            }, {
                                id: "cmbAlign",
                                requiredContent: "img{float}",
                                type: "select",
                                widths: ["35%", "65%"],
                                style: "width:90px",
                                label: a.lang.common.align,
                                "default": "",
                                items: [
                                    [a.lang.common.notSet, ""],
                                    [a.lang.common.alignLeft, "left"],
                                    [a.lang.common.alignRight, "right"]
                                ],
                                onChange: function() {
                                    l(this.getDialog()), d.call(this, "advanced:txtdlgGenStyle")
                                },
                                setup: function(a, b) {
                                    if (a == g) {
                                        var c = b.getStyle("float");
                                        switch (c) {
                                            case "inherit":
                                            case "none":
                                                c = ""
                                        }!c && (c = (b.getAttribute("align") || "").toLowerCase()), this.setValue(c)
                                    }
                                },
                                commit: function(a, b) {
                                    var c = this.getValue();
                                    if (a == g || 4 == a) {
                                        if (c ? b.setStyle("float", c) : b.removeStyle("float"), a == g) switch (c = (b.getAttribute("align") || "").toLowerCase()) {
                                            case "left":
                                            case "right":
                                                b.removeAttribute("align")
                                        }
                                    } else 8 == a && b.removeStyle("float")
                                }
                            }]
                        }]
                    }, {
                        type: "vbox",
                        height: "250px",
                        children: [{
                            type: "html",
                            id: "htmlPreview",
                            style: "width:95%;",
                            html: "<div>" + CKEDITOR.tools.htmlEncode(a.lang.common.preview) + '<br><div id="' + u + '" class="ImagePreviewLoader" style="display:none"><div class="loading">&nbsp;</div></div><div class="ImagePreviewBox"><table><tr><td><a href="javascript:void(0)" target="_blank" onclick="return false;" id="' + v + '"><img id="' + w + '" alt="" /></a>' + (a.config.image_previewText || "") + "</td></tr></table></div></div>"
                        }]
                    }]
                }]
            }, {
                id: "Link",
                requiredContent: "a[href]",
                label: a.lang.image.linkTab,
                padding: 0,
                elements: [{
                    id: "txtUrl",
                    type: "text",
                    label: a.lang.common.url,
                    style: "width: 100%",
                    "default": "",
                    setup: function(a, b) {
                        if (2 == a) {
                            var c = b.data("cke-saved-href");
                            c || (c = b.getAttribute("href")), this.setValue(c)
                        }
                    },
                    commit: function(b, c) {
                        if (2 == b && (this.getValue() || this.isChanged())) {
                            var d = this.getValue();
                            c.data("cke-saved-href", d), c.setAttribute("href", d), this.getValue() || !a.config.image_removeLinkByEmptyURL ? this.getDialog().addLink = !0 : this.getDialog().addLink = !1
                        }
                    }
                }, {
                    type: "button",
                    id: "browse",
                    filebrowser: {
                        action: "Browse",
                        target: "Link:txtUrl",
                        url: a.config.filebrowserImageBrowseLinkUrl
                    },
                    style: "float:right",
                    hidden: !0,
                    label: a.lang.common.browseServer
                }, {
                    id: "cmbTarget",
                    type: "select",
                    requiredContent: "a[target]",
                    label: a.lang.common.target,
                    "default": "",
                    items: [
                        [a.lang.common.notSet, ""],
                        [a.lang.common.targetNew, "_blank"],
                        [a.lang.common.targetTop, "_top"],
                        [a.lang.common.targetSelf, "_self"],
                        [a.lang.common.targetParent, "_parent"]
                    ],
                    setup: function(a, b) {
                        2 == a && this.setValue(b.getAttribute("target") || "")
                    },
                    commit: function(a, b) {
                        2 == a && (this.getValue() || this.isChanged()) && b.setAttribute("target", this.getValue())
                    }
                }]
            }, {
                id: "Upload",
                hidden: !0,
                filebrowser: "uploadButton",
                label: a.lang.image.upload,
                elements: [{
                    type: "file",
                    id: "upload",
                    label: a.lang.image.btnUpload,
                    style: "height:40px",
                    size: 38
                }, {
                    type: "fileButton",
                    id: "uploadButton",
                    filebrowser: "info:txtUrl",
                    label: a.lang.image.btnUpload,
                    "for": ["Upload", "upload"]
                }]
            }, {
                id: "advanced",
                label: a.lang.common.advancedTab,
                elements: [{
                    type: "hbox",
                    widths: ["50%", "25%", "25%"],
                    children: [{
                        type: "text",
                        id: "linkId",
                        requiredContent: "img[id]",
                        label: a.lang.common.id,
                        setup: function(a, b) {
                            a == g && this.setValue(b.getAttribute("id"))
                        },
                        commit: function(a, b) {
                            a == g && (this.getValue() || this.isChanged()) && b.setAttribute("id", this.getValue())
                        }
                    }, {
                        id: "cmbLangDir",
                        type: "select",
                        requiredContent: "img[dir]",
                        style: "width : 100px;",
                        label: a.lang.common.langDir,
                        "default": "",
                        items: [
                            [a.lang.common.notSet, ""],
                            [a.lang.common.langDirLtr, "ltr"],
                            [a.lang.common.langDirRtl, "rtl"]
                        ],
                        setup: function(a, b) {
                            a == g && this.setValue(b.getAttribute("dir"))
                        },
                        commit: function(a, b) {
                            a == g && (this.getValue() || this.isChanged()) && b.setAttribute("dir", this.getValue())
                        }
                    }, {
                        type: "text",
                        id: "txtLangCode",
                        requiredContent: "img[lang]",
                        label: a.lang.common.langCode,
                        "default": "",
                        setup: function(a, b) {
                            a == g && this.setValue(b.getAttribute("lang"))
                        },
                        commit: function(a, b) {
                            a == g && (this.getValue() || this.isChanged()) && b.setAttribute("lang", this.getValue())
                        }
                    }]
                }, {
                    type: "text",
                    id: "txtGenLongDescr",
                    requiredContent: "img[longdesc]",
                    label: a.lang.common.longDescr,
                    setup: function(a, b) {
                        a == g && this.setValue(b.getAttribute("longDesc"))
                    },
                    commit: function(a, b) {
                        a == g && (this.getValue() || this.isChanged()) && b.setAttribute("longDesc", this.getValue())
                    }
                }, {
                    type: "hbox",
                    widths: ["50%", "50%"],
                    children: [{
                        type: "text",
                        id: "txtGenClass",
                        requiredContent: "img(cke-xyz)",
                        label: a.lang.common.cssClass,
                        "default": "",
                        setup: function(a, b) {
                            a == g && this.setValue(b.getAttribute("class"))
                        },
                        commit: function(a, b) {
                            a == g && (this.getValue() || this.isChanged()) && b.setAttribute("class", this.getValue())
                        }
                    }, {
                        type: "text",
                        id: "txtGenTitle",
                        requiredContent: "img[title]",
                        label: a.lang.common.advisoryTitle,
                        "default": "",
                        onChange: function() {
                            l(this.getDialog())
                        },
                        setup: function(a, b) {
                            a == g && this.setValue(b.getAttribute("title"))
                        },
                        commit: function(a, b) {
                            a == g ? (this.getValue() || this.isChanged()) && b.setAttribute("title", this.getValue()) : 4 == a ? b.setAttribute("title", this.getValue()) : 8 == a && b.removeAttribute("title")
                        }
                    }]
                }, {
                    type: "text",
                    id: "txtdlgGenStyle",
                    requiredContent: "img{cke-xyz}",
                    label: a.lang.common.cssStyle,
                    validate: CKEDITOR.dialog.validate.inlineStyle(a.lang.common.invalidInlineStyle),
                    "default": "",
                    setup: function(a, b) {
                        if (a == g) {
                            var c = b.getAttribute("style");
                            !c && b.$.style.cssText && (c = b.$.style.cssText), this.setValue(c);
                            var d = b.$.style.height,
                                c = b.$.style.width,
                                d = (d ? d : "").match(h),
                                c = (c ? c : "").match(h);
                            this.attributesInStyle = {
                                height: !!d,
                                width: !!c
                            }
                        }
                    },
                    onChange: function() {
                        d.call(this, "info:cmbFloat info:cmbAlign info:txtVSpace info:txtHSpace info:txtBorder info:txtWidth info:txtHeight".split(" ")), l(this)
                    },
                    commit: function(a, b) {
                        a == g && (this.getValue() || this.isChanged()) && b.setAttribute("style", this.getValue())
                    }
                }]
            }]
        }
    };
    CKEDITOR.dialog.add("image", function(b) {
        return a(b, "image")
    }), CKEDITOR.dialog.add("imagebutton", function(b) {
        return a(b, "imagebutton")
    })
}();
