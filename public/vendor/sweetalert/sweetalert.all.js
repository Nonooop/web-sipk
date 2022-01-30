! function (e, t) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : (e = e || self).Sweetalert2 = t()
}(this, function () {
    "use strict";
    const l = Object.freeze({
            cancel: "cancel",
            backdrop: "backdrop",
            close: "close",
            esc: "esc",
            timer: "timer"
        }),
        t = "SweetAlert2:",
        o = e => e.charAt(0).toUpperCase() + e.slice(1),
        s = e => Array.prototype.slice.call(e),
        a = e => {
            console.warn("".concat(t, " ").concat("object" == typeof e ? e.join(" ") : e))
        },
        r = e => {
            console.error("".concat(t, " ").concat(e))
        },
        n = [],
        i = (e, t) => {
            t = '"'.concat(e, '" is deprecated and will be removed in the next major release. Please use "').concat(t, '" instead.'), n.includes(t) || (n.push(t), a(t))
        },
        c = e => "function" == typeof e ? e() : e,
        u = e => e && "function" == typeof e.toPromise,
        d = e => u(e) ? e.toPromise() : Promise.resolve(e),
        p = e => e && Promise.resolve(e) === e,
        m = e => e instanceof Element || (e => "object" == typeof e && e.jquery)(e);
    var e = e => {
        const t = {};
        for (const n in e) t[e[n]] = "swal2-" + e[n];
        return t
    };
    const g = e(["container", "shown", "height-auto", "iosfix", "popup", "modal", "no-backdrop", "no-transition", "toast", "toast-shown", "show", "hide", "close", "title", "html-container", "actions", "confirm", "deny", "cancel", "default-outline", "footer", "icon", "icon-content", "image", "input", "file", "range", "select", "radio", "checkbox", "label", "textarea", "inputerror", "input-label", "validation-message", "progress-steps", "active-progress-step", "progress-step", "progress-step-line", "loader", "loading", "styled", "top", "top-start", "top-end", "top-left", "top-right", "center", "center-start", "center-end", "center-left", "center-right", "bottom", "bottom-start", "bottom-end", "bottom-left", "bottom-right", "grow-row", "grow-column", "grow-fullscreen", "rtl", "timer-progress-bar", "timer-progress-bar-container", "scrollbar-measure", "icon-success", "icon-warning", "icon-info", "icon-question", "icon-error"]),
        h = e(["success", "warning", "info", "question", "error"]),
        b = () => document.body.querySelector(".".concat(g.container)),
        f = e => {
            const t = b();
            return t ? t.querySelector(e) : null
        },
        y = e => f(".".concat(e)),
        v = () => y(g.popup),
        w = () => y(g.icon),
        C = () => y(g.title),
        k = () => y(g["html-container"]),
        A = () => y(g.image),
        P = () => y(g["progress-steps"]),
        B = () => y(g["validation-message"]),
        x = () => f(".".concat(g.actions, " .").concat(g.confirm)),
        E = () => f(".".concat(g.actions, " .").concat(g.deny));
    const S = () => f(".".concat(g.loader)),
        T = () => f(".".concat(g.actions, " .").concat(g.cancel)),
        L = () => y(g.actions),
        O = () => y(g.footer),
        j = () => y(g["timer-progress-bar"]),
        D = () => y(g.close),
        M = () => {
            const e = s(v().querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])')).sort((e, t) => (e = parseInt(e.getAttribute("tabindex")), (t = parseInt(t.getAttribute("tabindex"))) < e ? 1 : e < t ? -1 : 0));
            var t = s(v().querySelectorAll('\n  a[href],\n  area[href],\n  input:not([disabled]),\n  select:not([disabled]),\n  textarea:not([disabled]),\n  button:not([disabled]),\n  iframe,\n  object,\n  embed,\n  [tabindex="0"],\n  [contenteditable],\n  audio[controls],\n  video[controls],\n  summary\n')).filter(e => "-1" !== e.getAttribute("tabindex"));
            return (t => {
                const n = [];
                for (let e = 0; e < t.length; e++) - 1 === n.indexOf(t[e]) && n.push(t[e]);
                return n
            })(e.concat(t)).filter(e => G(e))
        },
        I = () => !H() && !document.body.classList.contains(g["no-backdrop"]),
        H = () => document.body.classList.contains(g["toast-shown"]);
    const q = {
            previousBodyPadding: null
        },
        V = (t, e) => {
            if (t.textContent = "", e) {
                const n = new DOMParser,
                    o = n.parseFromString(e, "text/html");
                s(o.querySelector("head").childNodes).forEach(e => {
                    t.appendChild(e)
                }), s(o.querySelector("body").childNodes).forEach(e => {
                    t.appendChild(e)
                })
            }
        },
        N = (t, e) => {
            if (!e) return !1;
            var n = e.split(/\s+/);
            for (let e = 0; e < n.length; e++)
                if (!t.classList.contains(n[e])) return !1;
            return !0
        },
        U = (e, t, n) => {
            var o, i;
            if (o = e, i = t, s(o.classList).forEach(e => {
                    Object.values(g).includes(e) || Object.values(h).includes(e) || Object.values(i.showClass).includes(e) || o.classList.remove(e)
                }), t.customClass && t.customClass[n]) {
                if ("string" != typeof t.customClass[n] && !t.customClass[n].forEach) return a("Invalid type of customClass.".concat(n, '! Expected string or iterable object, got "').concat(typeof t.customClass[n], '"'));
                W(e, t.customClass[n])
            }
        },
        F = (e, t) => {
            if (!t) return null;
            switch (t) {
                case "select":
                case "textarea":
                case "file":
                    return K(e, g[t]);
                case "checkbox":
                    return e.querySelector(".".concat(g.checkbox, " input"));
                case "radio":
                    return e.querySelector(".".concat(g.radio, " input:checked")) || e.querySelector(".".concat(g.radio, " input:first-child"));
                case "range":
                    return e.querySelector(".".concat(g.range, " input"));
                default:
                    return K(e, g.input)
            }
        },
        R = e => {
            var t;
            e.focus(), "file" !== e.type && (t = e.value, e.value = "", e.value = t)
        },
        z = (e, t, n) => {
            e && t && (t = "string" == typeof t ? t.split(/\s+/).filter(Boolean) : t).forEach(t => {
                e.forEach ? e.forEach(e => {
                    n ? e.classList.add(t) : e.classList.remove(t)
                }) : n ? e.classList.add(t) : e.classList.remove(t)
            })
        },
        W = (e, t) => {
            z(e, t, !0)
        },
        _ = (e, t) => {
            z(e, t, !1)
        },
        K = (t, n) => {
            for (let e = 0; e < t.childNodes.length; e++)
                if (N(t.childNodes[e], n)) return t.childNodes[e]
        },
        Y = (e, t, n) => {
            (n = n === "".concat(parseInt(n)) ? parseInt(n) : n) || 0 === parseInt(n) ? e.style[t] = "number" == typeof n ? "".concat(n, "px") : n : e.style.removeProperty(t)
        },
        Z = (e, t = "flex") => {
            e.style.display = t
        },
        J = e => {
            e.style.display = "none"
        },
        X = (e, t, n, o) => {
            const i = e.querySelector(t);
            i && (i.style[n] = o)
        },
        $ = (e, t, n) => {
            t ? Z(e, n) : J(e)
        },
        G = e => !(!e || !(e.offsetWidth || e.offsetHeight || e.getClientRects().length)),
        Q = () => !G(x()) && !G(E()) && !G(T()),
        ee = e => !!(e.scrollHeight > e.clientHeight),
        te = e => {
            const t = window.getComputedStyle(e);
            var n = parseFloat(t.getPropertyValue("animation-duration") || "0"),
                e = parseFloat(t.getPropertyValue("transition-duration") || "0");
            return 0 < n || 0 < e
        },
        ne = (e, t = !1) => {
            const n = j();
            G(n) && (t && (n.style.transition = "none", n.style.width = "100%"), setTimeout(() => {
                n.style.transition = "width ".concat(e / 1e3, "s linear"), n.style.width = "0%"
            }, 10))
        },
        oe = () => "undefined" == typeof window || "undefined" == typeof document,
        ie = '\n <div aria-labelledby="'.concat(g.title, '" aria-describedby="').concat(g["html-container"], '" class="').concat(g.popup, '" tabindex="-1">\n   <button type="button" class="').concat(g.close, '"></button>\n   <ul class="').concat(g["progress-steps"], '"></ul>\n   <div class="').concat(g.icon, '"></div>\n   <img class="').concat(g.image, '" />\n   <h2 class="').concat(g.title, '" id="').concat(g.title, '"></h2>\n   <div class="').concat(g["html-container"], '" id="').concat(g["html-container"], '"></div>\n   <input class="').concat(g.input, '" />\n   <input type="file" class="').concat(g.file, '" />\n   <div class="').concat(g.range, '">\n     <input type="range" />\n     <output></output>\n   </div>\n   <select class="').concat(g.select, '"></select>\n   <div class="').concat(g.radio, '"></div>\n   <label for="').concat(g.checkbox, '" class="').concat(g.checkbox, '">\n     <input type="checkbox" />\n     <span class="').concat(g.label, '"></span>\n   </label>\n   <textarea class="').concat(g.textarea, '"></textarea>\n   <div class="').concat(g["validation-message"], '" id="').concat(g["validation-message"], '"></div>\n   <div class="').concat(g.actions, '">\n     <div class="').concat(g.loader, '"></div>\n     <button type="button" class="').concat(g.confirm, '"></button>\n     <button type="button" class="').concat(g.deny, '"></button>\n     <button type="button" class="').concat(g.cancel, '"></button>\n   </div>\n   <div class="').concat(g.footer, '"></div>\n   <div class="').concat(g["timer-progress-bar-container"], '">\n     <div class="').concat(g["timer-progress-bar"], '"></div>\n   </div>\n </div>\n').replace(/(^|\n)\s*/g, ""),
        se = () => {
            mn.isVisible() && mn.resetValidationMessage()
        },
        ae = e => {
            var t = (() => {
                const e = b();
                return !!e && (e.remove(), _([document.documentElement, document.body], [g["no-backdrop"], g["toast-shown"], g["has-column"]]), !0)
            })();
            if (oe()) r("SweetAlert2 requires document to initialize");
            else {
                const n = document.createElement("div");
                n.className = g.container, t && W(n, g["no-transition"]), V(n, ie);
                const o = "string" == typeof (t = e.target) ? document.querySelector(t) : t;
                o.appendChild(n), (e => {
                    const t = v();
                    t.setAttribute("role", e.toast ? "alert" : "dialog"), t.setAttribute("aria-live", e.toast ? "polite" : "assertive"), e.toast || t.setAttribute("aria-modal", "true")
                })(e), e = o, "rtl" === window.getComputedStyle(e).direction && W(b(), g.rtl), (() => {
                    const e = v(),
                        t = K(e, g.input),
                        n = K(e, g.file),
                        o = e.querySelector(".".concat(g.range, " input")),
                        i = e.querySelector(".".concat(g.range, " output")),
                        s = K(e, g.select),
                        a = e.querySelector(".".concat(g.checkbox, " input")),
                        r = K(e, g.textarea);
                    t.oninput = se, n.onchange = se, s.onchange = se, a.onchange = se, r.oninput = se, o.oninput = () => {
                        se(), i.value = o.value
                    }, o.onchange = () => {
                        se(), o.nextSibling.value = o.value
                    }
                })()
            }
        },
        re = (e, t) => {
            e instanceof HTMLElement ? t.appendChild(e) : "object" == typeof e ? ce(e, t) : e && V(t, e)
        },
        ce = (e, t) => {
            e.jquery ? le(t, e) : V(t, e.toString())
        },
        le = (t, n) => {
            if (t.textContent = "", 0 in n)
                for (let e = 0; e in n; e++) t.appendChild(n[e].cloneNode(!0));
            else t.appendChild(n.cloneNode(!0))
        },
        ue = (() => {
            if (oe()) return !1;
            var e = document.createElement("div"),
                t = {
                    WebkitAnimation: "webkitAnimationEnd",
                    OAnimation: "oAnimationEnd oanimationend",
                    animation: "animationend"
                };
            for (const n in t)
                if (Object.prototype.hasOwnProperty.call(t, n) && void 0 !== e.style[n]) return t[n];
            return !1
        })(),
        de = (e, t) => {
            const n = L();
            var o = S(),
                i = x(),
                s = E(),
                a = T();
            (t.showConfirmButton || t.showDenyButton || t.showCancelButton ? Z : J)(n), U(n, t, "actions"), pe(i, "confirm", t), pe(s, "deny", t), pe(a, "cancel", t),
                function (e, t, n, o) {
                    if (!o.buttonsStyling) return _([e, t, n], g.styled);
                    W([e, t, n], g.styled), o.confirmButtonColor && (e.style.backgroundColor = o.confirmButtonColor, W(e, g["default-outline"]));
                    o.denyButtonColor && (t.style.backgroundColor = o.denyButtonColor, W(t, g["default-outline"]));
                    o.cancelButtonColor && (n.style.backgroundColor = o.cancelButtonColor, W(n, g["default-outline"]))
                }(i, s, a, t), t.reverseButtons && (n.insertBefore(a, o), n.insertBefore(s, o), n.insertBefore(i, o)), V(o, t.loaderHtml), U(o, t, "loader")
        };

    function pe(e, t, n) {
        $(e, n["show".concat(o(t), "Button")], "inline-block"), V(e, n["".concat(t, "ButtonText")]), e.setAttribute("aria-label", n["".concat(t, "ButtonAriaLabel")]), e.className = g[t], U(e, n, "".concat(t, "Button")), W(e, n["".concat(t, "ButtonClass")])
    }
    const me = (e, t) => {
        var n, o, i = b();
        i && (o = i, "string" == typeof (n = t.backdrop) ? o.style.background = n : n || W([document.documentElement, document.body], g["no-backdrop"]), o = i, (n = t.position) in g ? W(o, g[n]) : (a('The "position" parameter is not valid, defaulting to "center"'), W(o, g.center)), n = i, !(o = t.grow) || "string" != typeof o || (o = "grow-".concat(o)) in g && W(n, g[o]), U(i, t, "container"))
    };
    var ge = {
        awaitingPromise: new WeakMap,
        promise: new WeakMap,
        innerParams: new WeakMap,
        domCache: new WeakMap
    };
    const he = ["input", "file", "range", "select", "radio", "checkbox", "textarea"],
        be = e => {
            if (!ke[e.input]) return r('Unexpected type of input! Expected "text", "email", "password", "number", "tel", "select", "radio", "checkbox", "textarea", "file" or "url", got "'.concat(e.input, '"'));
            var t = Ce(e.input);
            const n = ke[e.input](t, e);
            Z(n), setTimeout(() => {
                R(n)
            })
        },
        fe = (e, t) => {
            const n = F(v(), e);
            if (n) {
                (t => {
                    for (let e = 0; e < t.attributes.length; e++) {
                        var n = t.attributes[e].name;
                        ["type", "value", "style"].includes(n) || t.removeAttribute(n)
                    }
                })(n);
                for (const o in t) n.setAttribute(o, t[o])
            }
        },
        ye = e => {
            var t = Ce(e.input);
            e.customClass && W(t, e.customClass.input)
        },
        ve = (e, t) => {
            e.placeholder && !t.inputPlaceholder || (e.placeholder = t.inputPlaceholder)
        },
        we = (e, t, n) => {
            if (n.inputLabel) {
                e.id = g.input;
                const i = document.createElement("label");
                var o = g["input-label"];
                i.setAttribute("for", e.id), i.className = o, W(i, n.customClass.inputLabel), i.innerText = n.inputLabel, t.insertAdjacentElement("beforebegin", i)
            }
        },
        Ce = e => {
            e = g[e] || g.input;
            return K(v(), e)
        },
        ke = {};
    ke.text = ke.email = ke.password = ke.number = ke.tel = ke.url = (e, t) => ("string" == typeof t.inputValue || "number" == typeof t.inputValue ? e.value = t.inputValue : p(t.inputValue) || a('Unexpected type of inputValue! Expected "string", "number" or "Promise", got "'.concat(typeof t.inputValue, '"')), we(e, e, t), ve(e, t), e.type = t.input, e), ke.file = (e, t) => (we(e, e, t), ve(e, t), e), ke.range = (e, t) => {
        const n = e.querySelector("input"),
            o = e.querySelector("output");
        return n.value = t.inputValue, n.type = t.input, o.value = t.inputValue, we(n, e, t), e
    }, ke.select = (e, t) => {
        if (e.textContent = "", t.inputPlaceholder) {
            const n = document.createElement("option");
            V(n, t.inputPlaceholder), n.value = "", n.disabled = !0, n.selected = !0, e.appendChild(n)
        }
        return we(e, e, t), e
    }, ke.radio = e => (e.textContent = "", e), ke.checkbox = (e, t) => {
        const n = F(v(), "checkbox");
        n.value = 1, n.id = g.checkbox, n.checked = Boolean(t.inputValue);
        var o = e.querySelector("span");
        return V(o, t.inputPlaceholder), e
    }, ke.textarea = (n, e) => {
        n.value = e.inputValue, ve(n, e), we(n, n, e);
        return setTimeout(() => {
            if ("MutationObserver" in window) {
                const t = parseInt(window.getComputedStyle(v()).width);
                new MutationObserver(() => {
                    var e, e = n.offsetWidth + (e = n, parseInt(window.getComputedStyle(e).marginLeft) + parseInt(window.getComputedStyle(e).marginRight));
                    e > t ? v().style.width = "".concat(e, "px") : v().style.width = null
                }).observe(n, {
                    attributes: !0,
                    attributeFilter: ["style"]
                })
            }
        }), n
    };
    const Ae = (e, t) => {
            const n = k();
            U(n, t, "htmlContainer"), t.html ? (re(t.html, n), Z(n, "block")) : t.text ? (n.textContent = t.text, Z(n, "block")) : J(n), ((e, o) => {
                const i = v();
                e = ge.innerParams.get(e);
                const s = !e || o.input !== e.input;
                he.forEach(e => {
                    var t = g[e];
                    const n = K(i, t);
                    fe(e, o.inputAttributes), n.className = t, s && J(n)
                }), o.input && (s && be(o), ye(o))
            })(e, t)
        },
        Pe = (e, t) => {
            for (const n in h) t.icon !== n && _(e, h[n]);
            W(e, h[t.icon]), Ee(e, t), Be(), U(e, t, "icon")
        },
        Be = () => {
            const e = v();
            var t = window.getComputedStyle(e).getPropertyValue("background-color");
            const n = e.querySelectorAll("[class^=swal2-success-circular-line], .swal2-success-fix");
            for (let e = 0; e < n.length; e++) n[e].style.backgroundColor = t
        },
        xe = (e, t) => {
            var n;
            e.textContent = "", t.iconHtml ? V(e, Se(t.iconHtml)) : "success" === t.icon ? V(e, '\n      <div class="swal2-success-circular-line-left"></div>\n      <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>\n      <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>\n      <div class="swal2-success-circular-line-right"></div>\n    ') : "error" === t.icon ? V(e, '\n      <span class="swal2-x-mark">\n        <span class="swal2-x-mark-line-left"></span>\n        <span class="swal2-x-mark-line-right"></span>\n      </span>\n    ') : (n = {
                question: "?",
                warning: "!",
                info: "i"
            }, V(e, Se(n[t.icon])))
        },
        Ee = (e, t) => {
            if (t.iconColor) {
                e.style.color = t.iconColor, e.style.borderColor = t.iconColor;
                for (const n of [".swal2-success-line-tip", ".swal2-success-line-long", ".swal2-x-mark-line-left", ".swal2-x-mark-line-right"]) X(e, n, "backgroundColor", t.iconColor);
                X(e, ".swal2-success-ring", "borderColor", t.iconColor)
            }
        },
        Se = e => '<div class="'.concat(g["icon-content"], '">').concat(e, "</div>"),
        Te = (e, o) => {
            const i = P();
            if (!o.progressSteps || 0 === o.progressSteps.length) return J(i);
            Z(i), i.textContent = "", o.currentProgressStep >= o.progressSteps.length && a("Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)"), o.progressSteps.forEach((e, t) => {
                var n, e = (n = e, e = document.createElement("li"), W(e, g["progress-step"]), V(e, n), e);
                i.appendChild(e), t === o.currentProgressStep && W(e, g["active-progress-step"]), t !== o.progressSteps.length - 1 && (t = (e => {
                    const t = document.createElement("li");
                    return W(t, g["progress-step-line"]), e.progressStepsDistance && (t.style.width = e.progressStepsDistance), t
                })(o), i.appendChild(t))
            })
        },
        Le = (e, t) => {
            e.className = "".concat(g.popup, " ").concat(G(e) ? t.showClass.popup : ""), t.toast ? (W([document.documentElement, document.body], g["toast-shown"]), W(e, g.toast)) : W(e, g.modal), U(e, t, "popup"), "string" == typeof t.customClass && W(e, t.customClass), t.icon && W(e, g["icon-".concat(t.icon)])
        },
        Oe = (e, t) => {
            var n, o, i;
            (e => {
                var t = b();
                const n = v();
                e.toast ? (Y(t, "width", e.width), n.style.width = "100%", n.insertBefore(S(), w())) : Y(n, "width", e.width), Y(n, "padding", e.padding), e.background && (n.style.background = e.background), J(B()), Le(n, e)
            })(t), me(0, t), Te(0, t), i = e, n = t, o = ge.innerParams.get(i), i = w(), o && n.icon === o.icon ? (xe(i, n), Pe(i, n)) : n.icon || n.iconHtml ? n.icon && -1 === Object.keys(h).indexOf(n.icon) ? (r('Unknown icon! Expected "success", "error", "warning", "info" or "question", got "'.concat(n.icon, '"')), J(i)) : (Z(i), xe(i, n), Pe(i, n), W(i, n.showClass.icon)) : J(i), (e => {
                const t = A();
                if (!e.imageUrl) return J(t);
                Z(t, ""), t.setAttribute("src", e.imageUrl), t.setAttribute("alt", e.imageAlt), Y(t, "width", e.imageWidth), Y(t, "height", e.imageHeight), t.className = g.image, U(t, e, "image")
            })(t), (e => {
                const t = C();
                $(t, e.title || e.titleText, "block"), e.title && re(e.title, t), e.titleText && (t.innerText = e.titleText), U(t, e, "title")
            })(t), (e => {
                const t = D();
                V(t, e.closeButtonHtml), U(t, e, "closeButton"), $(t, e.showCloseButton), t.setAttribute("aria-label", e.closeButtonAriaLabel)
            })(t), Ae(e, t), de(0, t), i = t, e = O(), $(e, i.footer), i.footer && re(i.footer, e), U(e, i, "footer"), "function" == typeof t.didRender && t.didRender(v())
        };
    const je = () => x() && x().click();
    const De = e => {
            let t = v();
            t || mn.fire(), t = v();
            var n = S();
            H() ? J(w()) : Me(t, e), Z(n), t.setAttribute("data-loading", !0), t.setAttribute("aria-busy", !0), t.focus()
        },
        Me = (e, t) => {
            var n = L();
            const o = S();
            !t && G(x()) && (t = x()), Z(n), t && (J(t), o.setAttribute("data-button-to-replace", t.className)), o.parentNode.insertBefore(o, t), W([e, n], g.loading)
        },
        Ie = {},
        He = o => new Promise(e => {
            if (!o) return e();
            var t = window.scrollX,
                n = window.scrollY;
            Ie.restoreFocusTimeout = setTimeout(() => {
                Ie.previousActiveElement && Ie.previousActiveElement.focus ? (Ie.previousActiveElement.focus(), Ie.previousActiveElement = null) : document.body && document.body.focus(), e()
            }, 100), window.scrollTo(t, n)
        });
    const qe = () => {
            if (Ie.timeout) return (() => {
                const e = j();
                var t = parseInt(window.getComputedStyle(e).width);
                e.style.removeProperty("transition"), e.style.width = "100%";
                var n = parseInt(window.getComputedStyle(e).width),
                    n = parseInt(t / n * 100);
                e.style.removeProperty("transition"), e.style.width = "".concat(n, "%")
            })(), Ie.timeout.stop()
        },
        Ve = () => {
            if (Ie.timeout) {
                var e = Ie.timeout.start();
                return ne(e), e
            }
        };
    let Ne = !1;
    const Ue = {};
    const Fe = t => {
            for (let e = t.target; e && e !== document; e = e.parentNode)
                for (const o in Ue) {
                    var n = e.getAttribute(o);
                    if (n) return void Ue[o].fire({
                        template: n
                    })
                }
        },
        Re = {
            title: "",
            titleText: "",
            text: "",
            html: "",
            footer: "",
            icon: void 0,
            iconColor: void 0,
            iconHtml: void 0,
            template: void 0,
            toast: !1,
            showClass: {
                popup: "swal2-show",
                backdrop: "swal2-backdrop-show",
                icon: "swal2-icon-show"
            },
            hideClass: {
                popup: "swal2-hide",
                backdrop: "swal2-backdrop-hide",
                icon: "swal2-icon-hide"
            },
            customClass: {},
            target: "body",
            backdrop: !0,
            heightAuto: !0,
            allowOutsideClick: !0,
            allowEscapeKey: !0,
            allowEnterKey: !0,
            stopKeydownPropagation: !0,
            keydownListenerCapture: !1,
            showConfirmButton: !0,
            showDenyButton: !1,
            showCancelButton: !1,
            preConfirm: void 0,
            preDeny: void 0,
            confirmButtonText: "OK",
            confirmButtonAriaLabel: "",
            confirmButtonColor: void 0,
            denyButtonText: "No",
            denyButtonAriaLabel: "",
            denyButtonColor: void 0,
            cancelButtonText: "Cancel",
            cancelButtonAriaLabel: "",
            cancelButtonColor: void 0,
            buttonsStyling: !0,
            reverseButtons: !1,
            focusConfirm: !0,
            focusDeny: !1,
            focusCancel: !1,
            returnFocus: !0,
            showCloseButton: !1,
            closeButtonHtml: "&times;",
            closeButtonAriaLabel: "Close this dialog",
            loaderHtml: "",
            showLoaderOnConfirm: !1,
            showLoaderOnDeny: !1,
            imageUrl: void 0,
            imageWidth: void 0,
            imageHeight: void 0,
            imageAlt: "",
            timer: void 0,
            timerProgressBar: !1,
            width: void 0,
            padding: void 0,
            background: void 0,
            input: void 0,
            inputPlaceholder: "",
            inputLabel: "",
            inputValue: "",
            inputOptions: {},
            inputAutoTrim: !0,
            inputAttributes: {},
            inputValidator: void 0,
            returnInputValueOnDeny: !1,
            validationMessage: void 0,
            grow: !1,
            position: "center",
            progressSteps: [],
            currentProgressStep: void 0,
            progressStepsDistance: void 0,
            willOpen: void 0,
            didOpen: void 0,
            didRender: void 0,
            willClose: void 0,
            didClose: void 0,
            didDestroy: void 0,
            scrollbarPadding: !0
        },
        ze = ["allowEscapeKey", "allowOutsideClick", "background", "buttonsStyling", "cancelButtonAriaLabel", "cancelButtonColor", "cancelButtonText", "closeButtonAriaLabel", "closeButtonHtml", "confirmButtonAriaLabel", "confirmButtonColor", "confirmButtonText", "currentProgressStep", "customClass", "denyButtonAriaLabel", "denyButtonColor", "denyButtonText", "didClose", "didDestroy", "footer", "hideClass", "html", "icon", "iconColor", "iconHtml", "imageAlt", "imageHeight", "imageUrl", "imageWidth", "preConfirm", "preDeny", "progressSteps", "returnFocus", "reverseButtons", "showCancelButton", "showCloseButton", "showConfirmButton", "showDenyButton", "text", "title", "titleText", "willClose"],
        We = {},
        _e = ["allowOutsideClick", "allowEnterKey", "backdrop", "focusConfirm", "focusDeny", "focusCancel", "returnFocus", "heightAuto", "keydownListenerCapture"],
        Ke = e => Object.prototype.hasOwnProperty.call(Re, e);
    const Ye = e => We[e],
        Ze = e => {
            !e.backdrop && e.allowOutsideClick && a('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`');
            for (const o in e) n = o, Ke(n) || a('Unknown parameter "'.concat(n, '"')), e.toast && (t = o, _e.includes(t) && a('The parameter "'.concat(t, '" is incompatible with toasts'))), t = o, Ye(t) && i(t, Ye(t));
            var t, n
        };
    var Je = Object.freeze({
        isValidParameter: Ke,
        isUpdatableParameter: e => -1 !== ze.indexOf(e),
        isDeprecatedParameter: Ye,
        argsToParams: n => {
            const o = {};
            return "object" != typeof n[0] || m(n[0]) ? ["title", "html", "icon"].forEach((e, t) => {
                t = n[t];
                "string" == typeof t || m(t) ? o[e] = t : void 0 !== t && r("Unexpected type of ".concat(e, '! Expected "string" or "Element", got ').concat(typeof t))
            }) : Object.assign(o, n[0]), o
        },
        isVisible: () => G(v()),
        clickConfirm: je,
        clickDeny: () => E() && E().click(),
        clickCancel: () => T() && T().click(),
        getContainer: b,
        getPopup: v,
        getTitle: C,
        getHtmlContainer: k,
        getImage: A,
        getIcon: w,
        getInputLabel: () => y(g["input-label"]),
        getCloseButton: D,
        getActions: L,
        getConfirmButton: x,
        getDenyButton: E,
        getCancelButton: T,
        getLoader: S,
        getFooter: O,
        getTimerProgressBar: j,
        getFocusableElements: M,
        getValidationMessage: B,
        isLoading: () => v().hasAttribute("data-loading"),
        fire: function (...e) {
            return new this(...e)
        },
        mixin: function (n) {
            class e extends this {
                _main(e, t) {
                    return super._main(e, Object.assign({}, n, t))
                }
            }
            return e
        },
        showLoading: De,
        enableLoading: De,
        getTimerLeft: () => Ie.timeout && Ie.timeout.getTimerLeft(),
        stopTimer: qe,
        resumeTimer: Ve,
        toggleTimer: () => {
            var e = Ie.timeout;
            return e && (e.running ? qe : Ve)()
        },
        increaseTimer: e => {
            if (Ie.timeout) {
                e = Ie.timeout.increase(e);
                return ne(e, !0), e
            }
        },
        isTimerRunning: () => Ie.timeout && Ie.timeout.isRunning(),
        bindClickHandler: function (e = "data-swal-template") {
            Ue[e] = this, Ne || (document.body.addEventListener("click", Fe), Ne = !0)
        }
    });

    function Xe() {
        var e = ge.innerParams.get(this);
        if (e) {
            const t = ge.domCache.get(this);
            J(t.loader), H() ? e.icon && Z(w()) : (e => {
                const t = e.popup.getElementsByClassName(e.loader.getAttribute("data-button-to-replace"));
                if (t.length) Z(t[0], "inline-block");
                else if (Q()) J(e.actions)
            })(t), _([t.popup, t.actions], g.loading), t.popup.removeAttribute("aria-busy"), t.popup.removeAttribute("data-loading"), t.confirmButton.disabled = !1, t.denyButton.disabled = !1, t.cancelButton.disabled = !1
        }
    }
    const $e = () => {
            null === q.previousBodyPadding && document.body.scrollHeight > window.innerHeight && (q.previousBodyPadding = parseInt(window.getComputedStyle(document.body).getPropertyValue("padding-right")), document.body.style.paddingRight = "".concat(q.previousBodyPadding + (() => {
                const e = document.createElement("div");
                e.className = g["scrollbar-measure"], document.body.appendChild(e);
                var t = e.getBoundingClientRect().width - e.clientWidth;
                return document.body.removeChild(e), t
            })(), "px"))
        },
        Ge = () => {
            navigator.userAgent.match(/(CriOS|FxiOS|EdgiOS|YaBrowser|UCBrowser)/i) || v().scrollHeight > window.innerHeight - 44 && (b().style.paddingBottom = "".concat(44, "px"))
        },
        Qe = () => {
            const e = b();
            let t;
            e.ontouchstart = e => {
                t = et(e)
            }, e.ontouchmove = e => {
                t && (e.preventDefault(), e.stopPropagation())
            }
        },
        et = e => {
            var t = e.target,
                n = b();
            return !tt(e) && !nt(e) && (t === n || !(ee(n) || "INPUT" === t.tagName || "TEXTAREA" === t.tagName || ee(k()) && k().contains(t)))
        },
        tt = e => e.touches && e.touches.length && "stylus" === e.touches[0].touchType,
        nt = e => e.touches && 1 < e.touches.length,
        ot = () => {
            const e = s(document.body.children);
            e.forEach(e => {
                e.hasAttribute("data-previous-aria-hidden") ? (e.setAttribute("aria-hidden", e.getAttribute("data-previous-aria-hidden")), e.removeAttribute("data-previous-aria-hidden")) : e.removeAttribute("aria-hidden")
            })
        };
    var it = {
        swalPromiseResolve: new WeakMap,
        swalPromiseReject: new WeakMap
    };

    function st(e, t, n, o) {
        H() ? ut(e, o) : (He(n).then(() => ut(e, o)), Ie.keydownTarget.removeEventListener("keydown", Ie.keydownHandler, {
            capture: Ie.keydownListenerCapture
        }), Ie.keydownHandlerAdded = !1), /^((?!chrome|android).)*safari/i.test(navigator.userAgent) ? (t.setAttribute("style", "display:none !important"), t.removeAttribute("class"), t.innerHTML = "") : t.remove(), I() && (null !== q.previousBodyPadding && (document.body.style.paddingRight = "".concat(q.previousBodyPadding, "px"), q.previousBodyPadding = null), N(document.body, g.iosfix) && (t = parseInt(document.body.style.top, 10), _(document.body, g.iosfix), document.body.style.top = "", document.body.scrollTop = -1 * t), ot()), _([document.documentElement, document.body], [g.shown, g["height-auto"], g["no-backdrop"], g["toast-shown"]])
    }

    function at(e) {
        e = void 0 !== (n = e) ? Object.assign({
            isConfirmed: !1,
            isDenied: !1,
            isDismissed: !1
        }, n) : {
            isConfirmed: !1,
            isDenied: !1,
            isDismissed: !0
        };
        const t = it.swalPromiseResolve.get(this);
        var n = (e => {
            const t = v();
            if (!t) return false;
            const n = ge.innerParams.get(e);
            if (!n || N(t, n.hideClass.popup)) return false;
            _(t, n.showClass.popup), W(t, n.hideClass.popup);
            const o = b();
            return _(o, n.showClass.backdrop), W(o, n.hideClass.backdrop), ct(e, t, n), true
        })(this);
        this.isAwaitingPromise() ? e.isDismissed || (rt(this), t(e)) : n && t(e)
    }
    const rt = e => {
            e.isAwaitingPromise() && (ge.awaitingPromise.delete(e), ge.innerParams.get(e) || e._destroy())
        },
        ct = (e, t, n) => {
            var o = b(),
                i = ue && te(t);
            "function" == typeof n.willClose && n.willClose(t), i ? lt(e, t, o, n.returnFocus, n.didClose) : st(e, o, n.returnFocus, n.didClose)
        },
        lt = (e, t, n, o, i) => {
            Ie.swalCloseEventFinishedCallback = st.bind(null, e, n, o, i), t.addEventListener(ue, function (e) {
                e.target === t && (Ie.swalCloseEventFinishedCallback(), delete Ie.swalCloseEventFinishedCallback)
            })
        },
        ut = (e, t) => {
            setTimeout(() => {
                "function" == typeof t && t.bind(e.params)(), e._destroy()
            })
        };

    function dt(e, t, n) {
        const o = ge.domCache.get(e);
        t.forEach(e => {
            o[e].disabled = n
        })
    }

    function pt(e, t) {
        if (!e) return !1;
        if ("radio" === e.type) {
            const n = e.parentNode.parentNode,
                o = n.querySelectorAll("input");
            for (let e = 0; e < o.length; e++) o[e].disabled = t
        } else e.disabled = t
    }
    class mt {
        constructor(e, t) {
            this.callback = e, this.remaining = t, this.running = !1, this.start()
        }
        start() {
            return this.running || (this.running = !0, this.started = new Date, this.id = setTimeout(this.callback, this.remaining)), this.remaining
        }
        stop() {
            return this.running && (this.running = !1, clearTimeout(this.id), this.remaining -= new Date - this.started), this.remaining
        }
        increase(e) {
            var t = this.running;
            return t && this.stop(), this.remaining += e, t && this.start(), this.remaining
        }
        getTimerLeft() {
            return this.running && (this.stop(), this.start()), this.remaining
        }
        isRunning() {
            return this.running
        }
    }
    var gt = {
        email: (e, t) => /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(e) ? Promise.resolve() : Promise.resolve(t || "Invalid email address"),
        url: (e, t) => /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{1,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(e) ? Promise.resolve() : Promise.resolve(t || "Invalid URL")
    };

    function ht(e) {
        var t, n;
        (t = e).inputValidator || Object.keys(gt).forEach(e => {
            t.input === e && (t.inputValidator = gt[e])
        }), e.showLoaderOnConfirm && !e.preConfirm && a("showLoaderOnConfirm is set to true, but preConfirm is not defined.\nshowLoaderOnConfirm should be used together with preConfirm, see usage example:\nhttps://sweetalert2.github.io/#ajax-request"), (n = e).target && ("string" != typeof n.target || document.querySelector(n.target)) && ("string" == typeof n.target || n.target.appendChild) || (a('Target parameter is not valid, defaulting to "body"'), n.target = "body"), "string" == typeof e.title && (e.title = e.title.split("\n").join("<br />")), ae(e)
    }
    const bt = ["swal-title", "swal-html", "swal-footer"],
        ft = e => {
            e = "string" == typeof e.template ? document.querySelector(e.template) : e.template;
            if (!e) return {};
            e = e.content;
            return Pt(e), Object.assign(yt(e), vt(e), wt(e), Ct(e), kt(e), At(e, bt))
        },
        yt = e => {
            const o = {};
            return s(e.querySelectorAll("swal-param")).forEach(e => {
                Bt(e, ["name", "value"]);
                var t = e.getAttribute("name");
                let n = e.getAttribute("value");
                "boolean" == typeof Re[t] && "false" === n && (n = !1), "object" == typeof Re[t] && (n = JSON.parse(n)), o[t] = n
            }), o
        },
        vt = e => {
            const n = {};
            return s(e.querySelectorAll("swal-button")).forEach(e => {
                Bt(e, ["type", "color", "aria-label"]);
                var t = e.getAttribute("type");
                n["".concat(t, "ButtonText")] = e.innerHTML, n["show".concat(o(t), "Button")] = !0, e.hasAttribute("color") && (n["".concat(t, "ButtonColor")] = e.getAttribute("color")), e.hasAttribute("aria-label") && (n["".concat(t, "ButtonAriaLabel")] = e.getAttribute("aria-label"))
            }), n
        },
        wt = e => {
            const t = {},
                n = e.querySelector("swal-image");
            return n && (Bt(n, ["src", "width", "height", "alt"]), n.hasAttribute("src") && (t.imageUrl = n.getAttribute("src")), n.hasAttribute("width") && (t.imageWidth = n.getAttribute("width")), n.hasAttribute("height") && (t.imageHeight = n.getAttribute("height")), n.hasAttribute("alt") && (t.imageAlt = n.getAttribute("alt"))), t
        },
        Ct = e => {
            const t = {},
                n = e.querySelector("swal-icon");
            return n && (Bt(n, ["type", "color"]), n.hasAttribute("type") && (t.icon = n.getAttribute("type")), n.hasAttribute("color") && (t.iconColor = n.getAttribute("color")), t.iconHtml = n.innerHTML), t
        },
        kt = e => {
            const n = {},
                t = e.querySelector("swal-input");
            t && (Bt(t, ["type", "label", "placeholder", "value"]), n.input = t.getAttribute("type") || "text", t.hasAttribute("label") && (n.inputLabel = t.getAttribute("label")), t.hasAttribute("placeholder") && (n.inputPlaceholder = t.getAttribute("placeholder")), t.hasAttribute("value") && (n.inputValue = t.getAttribute("value")));
            e = e.querySelectorAll("swal-input-option");
            return e.length && (n.inputOptions = {}, s(e).forEach(e => {
                Bt(e, ["value"]);
                var t = e.getAttribute("value"),
                    e = e.innerHTML;
                n.inputOptions[t] = e
            })), n
        },
        At = (e, t) => {
            const n = {};
            for (const o in t) {
                const i = t[o],
                    s = e.querySelector(i);
                s && (Bt(s, []), n[i.replace(/^swal-/, "")] = s.innerHTML.trim())
            }
            return n
        },
        Pt = e => {
            const t = bt.concat(["swal-param", "swal-button", "swal-image", "swal-icon", "swal-input", "swal-input-option"]);
            s(e.children).forEach(e => {
                e = e.tagName.toLowerCase(); - 1 === t.indexOf(e) && a("Unrecognized element <".concat(e, ">"))
            })
        },
        Bt = (t, n) => {
            s(t.attributes).forEach(e => {
                -1 === n.indexOf(e.name) && a(['Unrecognized attribute "'.concat(e.name, '" on <').concat(t.tagName.toLowerCase(), ">."), "".concat(n.length ? "Allowed attributes are: ".concat(n.join(", ")) : "To set the value, use HTML within the element.")])
            })
        },
        xt = e => {
            const t = b(),
                n = v();
            "function" == typeof e.willOpen && e.willOpen(n);
            var o = window.getComputedStyle(document.body).overflowY;
            Lt(t, n, e), setTimeout(() => {
                St(t, n)
            }, 10), I() && (Tt(t, e.scrollbarPadding, o), (() => {
                const e = s(document.body.children);
                e.forEach(e => {
                    e === b() || e.contains(b()) || (e.hasAttribute("aria-hidden") && e.setAttribute("data-previous-aria-hidden", e.getAttribute("aria-hidden")), e.setAttribute("aria-hidden", "true"))
                })
            })()), H() || Ie.previousActiveElement || (Ie.previousActiveElement = document.activeElement), "function" == typeof e.didOpen && setTimeout(() => e.didOpen(n)), _(t, g["no-transition"])
        },
        Et = e => {
            const t = v();
            if (e.target === t) {
                const n = b();
                t.removeEventListener(ue, Et), n.style.overflowY = "auto"
            }
        },
        St = (e, t) => {
            ue && te(t) ? (e.style.overflowY = "hidden", t.addEventListener(ue, Et)) : e.style.overflowY = "auto"
        },
        Tt = (e, t, n) => {
            var o;
            (/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream || "MacIntel" === navigator.platform && 1 < navigator.maxTouchPoints) && !N(document.body, g.iosfix) && (o = document.body.scrollTop, document.body.style.top = "".concat(-1 * o, "px"), W(document.body, g.iosfix), Qe(), Ge()), t && "hidden" !== n && $e(), setTimeout(() => {
                e.scrollTop = 0
            })
        },
        Lt = (e, t, n) => {
            W(e, n.showClass.backdrop), t.style.setProperty("opacity", "0", "important"), Z(t, "grid"), setTimeout(() => {
                W(t, n.showClass.popup), t.style.removeProperty("opacity")
            }, 10), W([document.documentElement, document.body], g.shown), n.heightAuto && n.backdrop && !n.toast && W([document.documentElement, document.body], g["height-auto"])
        },
        Ot = e => e.checked ? 1 : 0,
        jt = e => e.checked ? e.value : null,
        Dt = e => e.files.length ? null !== e.getAttribute("multiple") ? e.files : e.files[0] : null,
        Mt = (t, n) => {
            const o = v(),
                i = e => Ht[n.input](o, qt(e), n);
            u(n.inputOptions) || p(n.inputOptions) ? (De(x()), d(n.inputOptions).then(e => {
                t.hideLoading(), i(e)
            })) : "object" == typeof n.inputOptions ? i(n.inputOptions) : r("Unexpected type of inputOptions! Expected object, Map or Promise, got ".concat(typeof n.inputOptions))
        },
        It = (t, n) => {
            const o = t.getInput();
            J(o), d(n.inputValue).then(e => {
                o.value = "number" === n.input ? parseFloat(e) || 0 : "".concat(e), Z(o), o.focus(), t.hideLoading()
            }).catch(e => {
                r("Error in inputValue promise: ".concat(e)), o.value = "", Z(o), o.focus(), t.hideLoading()
            })
        },
        Ht = {
            select: (e, t, i) => {
                const s = K(e, g.select),
                    a = (e, t, n) => {
                        const o = document.createElement("option");
                        o.value = n, V(o, t), o.selected = Vt(n, i.inputValue), e.appendChild(o)
                    };
                t.forEach(e => {
                    var t = e[0];
                    const n = e[1];
                    if (Array.isArray(n)) {
                        const o = document.createElement("optgroup");
                        o.label = t, o.disabled = !1, s.appendChild(o), n.forEach(e => a(o, e[1], e[0]))
                    } else a(s, n, t)
                }), s.focus()
            },
            radio: (e, t, s) => {
                const a = K(e, g.radio);
                t.forEach(e => {
                    var t = e[0],
                        e = e[1];
                    const n = document.createElement("input"),
                        o = document.createElement("label");
                    n.type = "radio", n.name = g.radio, n.value = t, Vt(t, s.inputValue) && (n.checked = !0);
                    const i = document.createElement("span");
                    V(i, e), i.className = g.label, o.appendChild(n), o.appendChild(i), a.appendChild(o)
                });
                const n = a.querySelectorAll("input");
                n.length && n[0].focus()
            }
        },
        qt = n => {
            const o = [];
            return "undefined" != typeof Map && n instanceof Map ? n.forEach((e, t) => {
                let n = e;
                "object" == typeof n && (n = qt(n)), o.push([t, n])
            }) : Object.keys(n).forEach(e => {
                let t = n[e];
                "object" == typeof t && (t = qt(t)), o.push([e, t])
            }), o
        },
        Vt = (e, t) => t && t.toString() === e.toString(),
        Nt = (e, t) => {
            var n = ge.innerParams.get(e),
                o = ((e, t) => {
                    const n = e.getInput();
                    if (!n) return null;
                    switch (t.input) {
                        case "checkbox":
                            return Ot(n);
                        case "radio":
                            return jt(n);
                        case "file":
                            return Dt(n);
                        default:
                            return t.inputAutoTrim ? n.value.trim() : n.value
                    }
                })(e, n);
            n.inputValidator ? Ut(e, o, t) : e.getInput().checkValidity() ? ("deny" === t ? Ft : Wt)(e, o) : (e.enableButtons(), e.showValidationMessage(n.validationMessage))
        },
        Ut = (t, n, o) => {
            const e = ge.innerParams.get(t);
            t.disableInput();
            const i = Promise.resolve().then(() => d(e.inputValidator(n, e.validationMessage)));
            i.then(e => {
                t.enableButtons(), t.enableInput(), e ? t.showValidationMessage(e) : ("deny" === o ? Ft : Wt)(t, n)
            })
        },
        Ft = (t, n) => {
            const e = ge.innerParams.get(t || void 0);
            if (e.showLoaderOnDeny && De(E()), e.preDeny) {
                ge.awaitingPromise.set(t || void 0, !0);
                const o = Promise.resolve().then(() => d(e.preDeny(n, e.validationMessage)));
                o.then(e => {
                    !1 === e ? t.hideLoading() : t.closePopup({
                        isDenied: !0,
                        value: void 0 === e ? n : e
                    })
                }).catch(e => zt(t || void 0, e))
            } else t.closePopup({
                isDenied: !0,
                value: n
            })
        },
        Rt = (e, t) => {
            e.closePopup({
                isConfirmed: !0,
                value: t
            })
        },
        zt = (e, t) => {
            e.rejectPromise(t)
        },
        Wt = (t, n) => {
            const e = ge.innerParams.get(t || void 0);
            if (e.showLoaderOnConfirm && De(), e.preConfirm) {
                t.resetValidationMessage(), ge.awaitingPromise.set(t || void 0, !0);
                const o = Promise.resolve().then(() => d(e.preConfirm(n, e.validationMessage)));
                o.then(e => {
                    G(B()) || !1 === e ? t.hideLoading() : Rt(t, void 0 === e ? n : e)
                }).catch(e => zt(t || void 0, e))
            } else Rt(t, n)
        },
        _t = (e, t, n) => {
            const o = M();
            if (o.length) return (t += n) === o.length ? t = 0 : -1 === t && (t = o.length - 1), o[t].focus();
            v().focus()
        },
        Kt = ["ArrowRight", "ArrowDown"],
        Yt = ["ArrowLeft", "ArrowUp"],
        Zt = (e, t, n) => {
            var o = ge.innerParams.get(e);
            o && (o.stopKeydownPropagation && t.stopPropagation(), "Enter" === t.key ? Jt(e, t, o) : "Tab" === t.key ? Xt(t, o) : [...Kt, ...Yt].includes(t.key) ? $t(t.key) : "Escape" === t.key && Gt(t, o, n))
        },
        Jt = (e, t, n) => {
            t.isComposing || t.target && e.getInput() && t.target.outerHTML === e.getInput().outerHTML && (["textarea", "file"].includes(n.input) || (je(), t.preventDefault()))
        },
        Xt = (e, t) => {
            var n = e.target,
                o = M();
            let i = -1;
            for (let e = 0; e < o.length; e++)
                if (n === o[e]) {
                    i = e;
                    break
                } e.shiftKey ? _t(0, i, -1) : _t(0, i, 1), e.stopPropagation(), e.preventDefault()
        },
        $t = e => {
            const t = x(),
                n = E(),
                o = T();
            if ([t, n, o].includes(document.activeElement)) {
                e = Kt.includes(e) ? "nextElementSibling" : "previousElementSibling";
                const i = document.activeElement[e];
                i && i.focus()
            }
        },
        Gt = (e, t, n) => {
            c(t.allowEscapeKey) && (e.preventDefault(), n(l.esc))
        },
        Qt = (t, e, n) => {
            e.popup.onclick = () => {
                var e = ge.innerParams.get(t);
                e.showConfirmButton || e.showDenyButton || e.showCancelButton || e.showCloseButton || e.timer || e.input || n(l.close)
            }
        };
    let en = !1;
    const tn = t => {
            t.popup.onmousedown = () => {
                t.container.onmouseup = function (e) {
                    t.container.onmouseup = void 0, e.target === t.container && (en = !0)
                }
            }
        },
        nn = t => {
            t.container.onmousedown = () => {
                t.popup.onmouseup = function (e) {
                    t.popup.onmouseup = void 0, e.target !== t.popup && !t.popup.contains(e.target) || (en = !0)
                }
            }
        },
        on = (n, o, i) => {
            o.container.onclick = e => {
                var t = ge.innerParams.get(n);
                en ? en = !1 : e.target === o.container && c(t.allowOutsideClick) && i(l.backdrop)
            }
        };
    const sn = (e, t, n) => {
            var o = j();
            J(o), t.timer && (e.timeout = new mt(() => {
                n("timer"), delete e.timeout
            }, t.timer), t.timerProgressBar && (Z(o), setTimeout(() => {
                e.timeout && e.timeout.running && ne(t.timer)
            })))
        },
        an = (e, t) => {
            if (!t.toast) return c(t.allowEnterKey) ? void(rn(e, t) || _t(0, -1, 1)) : cn()
        },
        rn = (e, t) => t.focusDeny && G(e.denyButton) ? (e.denyButton.focus(), !0) : t.focusCancel && G(e.cancelButton) ? (e.cancelButton.focus(), !0) : !(!t.focusConfirm || !G(e.confirmButton)) && (e.confirmButton.focus(), !0),
        cn = () => {
            document.activeElement && "function" == typeof document.activeElement.blur && document.activeElement.blur()
        };
    const ln = e => {
            e.isAwaitingPromise() ? (un(ge, e), ge.awaitingPromise.set(e, !0)) : (un(it, e), un(ge, e))
        },
        un = (e, t) => {
            for (const n in e) e[n].delete(t)
        };
    e = Object.freeze({
        hideLoading: Xe,
        disableLoading: Xe,
        getInput: function (e) {
            var t = ge.innerParams.get(e || this);
            return (e = ge.domCache.get(e || this)) ? F(e.popup, t.input) : null
        },
        close: at,
        isAwaitingPromise: function () {
            return !!ge.awaitingPromise.get(this)
        },
        rejectPromise: function (e) {
            const t = it.swalPromiseReject.get(this);
            rt(this), t && t(e)
        },
        closePopup: at,
        closeModal: at,
        closeToast: at,
        enableButtons: function () {
            dt(this, ["confirmButton", "denyButton", "cancelButton"], !1)
        },
        disableButtons: function () {
            dt(this, ["confirmButton", "denyButton", "cancelButton"], !0)
        },
        enableInput: function () {
            return pt(this.getInput(), !1)
        },
        disableInput: function () {
            return pt(this.getInput(), !0)
        },
        showValidationMessage: function (e) {
            const t = ge.domCache.get(this);
            var n = ge.innerParams.get(this);
            V(t.validationMessage, e), t.validationMessage.className = g["validation-message"], n.customClass && n.customClass.validationMessage && W(t.validationMessage, n.customClass.validationMessage), Z(t.validationMessage);
            const o = this.getInput();
            o && (o.setAttribute("aria-invalid", !0), o.setAttribute("aria-describedby", g["validation-message"]), R(o), W(o, g.inputerror))
        },
        resetValidationMessage: function () {
            var e = ge.domCache.get(this);
            e.validationMessage && J(e.validationMessage);
            const t = this.getInput();
            t && (t.removeAttribute("aria-invalid"), t.removeAttribute("aria-describedby"), _(t, g.inputerror))
        },
        getProgressSteps: function () {
            return ge.domCache.get(this).progressSteps
        },
        _main: function (e, t = {}) {
            Ze(Object.assign({}, t, e)), Ie.currentInstance && (Ie.currentInstance._destroy(), I() && ot()), Ie.currentInstance = this, ht(e = ((e, t) => {
                const n = ft(e),
                    o = Object.assign({}, Re, t, n, e);
                return o.showClass = Object.assign({}, Re.showClass, o.showClass), o.hideClass = Object.assign({}, Re.hideClass, o.hideClass), o
            })(e, t)), Object.freeze(e), Ie.timeout && (Ie.timeout.stop(), delete Ie.timeout), clearTimeout(Ie.restoreFocusTimeout);
            var a, r, c, t = (e => {
                const t = {
                    popup: v(),
                    container: b(),
                    actions: L(),
                    confirmButton: x(),
                    denyButton: E(),
                    cancelButton: T(),
                    loader: S(),
                    closeButton: D(),
                    validationMessage: B(),
                    progressSteps: P()
                };
                return ge.domCache.set(e, t), t
            })(this);
            return Oe(this, e), ge.innerParams.set(this, e), a = this, r = t, c = e, new Promise((e, t) => {
                const n = e => {
                    a.closePopup({
                        isDismissed: !0,
                        dismiss: e
                    })
                };
                var o, i, s;
                it.swalPromiseResolve.set(a, e), it.swalPromiseReject.set(a, t), r.confirmButton.onclick = () => (e => {
                    var t = ge.innerParams.get(e);
                    e.disableButtons(), t.input ? Nt(e, "confirm") : Wt(e, !0)
                })(a), r.denyButton.onclick = () => (e => {
                    var t = ge.innerParams.get(e);
                    e.disableButtons(), t.returnInputValueOnDeny ? Nt(e, "deny") : Ft(e, !1)
                })(a), r.cancelButton.onclick = () => ((e, t) => {
                    e.disableButtons(), t(l.cancel)
                })(a, n), r.closeButton.onclick = () => n(l.close), o = a, e = r, t = n, ge.innerParams.get(o).toast ? Qt(o, e, t) : (tn(e), nn(e), on(o, e, t)), i = a, e = Ie, t = c, s = n, e.keydownTarget && e.keydownHandlerAdded && (e.keydownTarget.removeEventListener("keydown", e.keydownHandler, {
                    capture: e.keydownListenerCapture
                }), e.keydownHandlerAdded = !1), t.toast || (e.keydownHandler = e => Zt(i, e, s), e.keydownTarget = t.keydownListenerCapture ? window : v(), e.keydownListenerCapture = t.keydownListenerCapture, e.keydownTarget.addEventListener("keydown", e.keydownHandler, {
                    capture: e.keydownListenerCapture
                }), e.keydownHandlerAdded = !0), t = a, "select" === (e = c).input || "radio" === e.input ? Mt(t, e) : ["text", "email", "number", "tel", "textarea"].includes(e.input) && (u(e.inputValue) || p(e.inputValue)) && (De(x()), It(t, e)), xt(c), sn(Ie, c, n), an(r, c), setTimeout(() => {
                    r.container.scrollTop = 0
                })
            })
        },
        update: function (t) {
            var e = v(),
                n = ge.innerParams.get(this);
            if (!e || N(e, n.hideClass.popup)) return a("You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.");
            const o = {};
            Object.keys(t).forEach(e => {
                mn.isUpdatableParameter(e) ? o[e] = t[e] : a('Invalid parameter to update: "'.concat(e, '". Updatable params are listed here: https://github.com/sweetalert2/sweetalert2/blob/master/src/utils/params.js\n\nIf you think this parameter should be updatable, request it here: https://github.com/sweetalert2/sweetalert2/issues/new?template=02_feature_request.md'))
            }), n = Object.assign({}, n, o), Oe(this, n), ge.innerParams.set(this, n), Object.defineProperties(this, {
                params: {
                    value: Object.assign({}, this.params, t),
                    writable: !1,
                    enumerable: !0
                }
            })
        },
        _destroy: function () {
            var e = ge.domCache.get(this);
            const t = ge.innerParams.get(this);
            t ? (e.popup && Ie.swalCloseEventFinishedCallback && (Ie.swalCloseEventFinishedCallback(), delete Ie.swalCloseEventFinishedCallback), Ie.deferDisposalTimer && (clearTimeout(Ie.deferDisposalTimer), delete Ie.deferDisposalTimer), "function" == typeof t.didDestroy && t.didDestroy(), e = this, ln(e), delete e.params, delete Ie.keydownHandler, delete Ie.keydownTarget, delete Ie.currentInstance) : ln(this)
        }
    });
    let dn;
    class pn {
        constructor(...e) {
            "undefined" != typeof window && (dn = this, e = Object.freeze(this.constructor.argsToParams(e)), Object.defineProperties(this, {
                params: {
                    value: e,
                    writable: !1,
                    enumerable: !0,
                    configurable: !0
                }
            }), e = this._main(this.params), ge.promise.set(this, e))
        }
        then(e) {
            const t = ge.promise.get(this);
            return t.then(e)
        } finally(e) {
            const t = ge.promise.get(this);
            return t.finally(e)
        }
    }
    Object.assign(pn.prototype, e), Object.assign(pn, Je), Object.keys(e).forEach(t => {
        pn[t] = function (...e) {
            if (dn) return dn[t](...e)
        }
    }), pn.DismissReason = l, pn.version = "11.1.9";
    const mn = pn;
    return mn.default = mn, mn
}), void 0 !== this && this.Sweetalert2 && (this.swal = this.sweetAlert = this.Swal = this.SweetAlert = this.Sweetalert2);
"undefined" != typeof document && function (e, t) {
    var n = e.createElement("style");
    if (e.getElementsByTagName("head")[0].appendChild(n), n.styleSheet) n.styleSheet.disabled || (n.styleSheet.cssText = t);
    else try {
        n.innerHTML = t
    } catch (e) {
        n.innerText = t
    }
}(document, ".swal2-popup.swal2-toast{box-sizing:border-box;grid-column:1/4!important;grid-row:1/4!important;grid-template-columns:1fr 99fr 1fr;padding:1em;overflow-y:hidden;background:#fff;box-shadow:0 0 1px rgba(0,0,0,.075),0 1px 2px rgba(0,0,0,.075),1px 2px 4px rgba(0,0,0,.075),1px 3px 8px rgba(0,0,0,.075),2px 4px 16px rgba(0,0,0,.075);pointer-events:all}.swal2-popup.swal2-toast>*{grid-column:2}.swal2-popup.swal2-toast .swal2-title{margin:.5em 1em;padding:0;font-size:1em;text-align:initial}.swal2-popup.swal2-toast .swal2-loading{justify-content:center}.swal2-popup.swal2-toast .swal2-input{height:2em;margin:.5em;font-size:1em}.swal2-popup.swal2-toast .swal2-validation-message{font-size:1em}.swal2-popup.swal2-toast .swal2-footer{margin:.5em 0 0;padding:.5em 0 0;font-size:.8em}.swal2-popup.swal2-toast .swal2-close{grid-column:3/3;grid-row:1/99;align-self:center;width:.8em;height:.8em;margin:0;font-size:2em}.swal2-popup.swal2-toast .swal2-html-container{margin:.5em 1em;padding:0;font-size:1em;text-align:initial}.swal2-popup.swal2-toast .swal2-html-container:empty{padding:0}.swal2-popup.swal2-toast .swal2-loader{grid-column:1;grid-row:1/99;align-self:center;width:2em;height:2em;margin:.25em}.swal2-popup.swal2-toast .swal2-icon{grid-column:1;grid-row:1/99;align-self:center;width:2em;min-width:2em;height:2em;margin:0 .5em 0 0}.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:1.8em;font-weight:700}.swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line]{top:.875em;width:1.375em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:.3125em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:.3125em}.swal2-popup.swal2-toast .swal2-actions{justify-content:flex-start;height:auto;margin:0;margin-top:.5em;padding:0 .5em}.swal2-popup.swal2-toast .swal2-styled{margin:.25em .5em;padding:.4em .6em;font-size:1em}.swal2-popup.swal2-toast .swal2-success{border-color:#a5dc86}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line]{position:absolute;width:1.6em;height:3em;transform:rotate(45deg);border-radius:50%}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.8em;left:-.5em;transform:rotate(-45deg);transform-origin:2em 2em;border-radius:4em 0 0 4em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.25em;left:.9375em;transform-origin:0 1.5em;border-radius:0 4em 4em 0}.swal2-popup.swal2-toast .swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-success .swal2-success-fix{top:0;left:.4375em;width:.4375em;height:2.6875em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line]{height:.3125em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip]{top:1.125em;left:.1875em;width:.75em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long]{top:.9375em;right:.1875em;width:1.375em}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-toast-animate-success-line-tip .75s;animation:swal2-toast-animate-success-line-tip .75s}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-toast-animate-success-line-long .75s;animation:swal2-toast-animate-success-line-long .75s}.swal2-popup.swal2-toast.swal2-show{-webkit-animation:swal2-toast-show .5s;animation:swal2-toast-show .5s}.swal2-popup.swal2-toast.swal2-hide{-webkit-animation:swal2-toast-hide .1s forwards;animation:swal2-toast-hide .1s forwards}.swal2-container{display:grid;position:fixed;z-index:1060;top:0;right:0;bottom:0;left:0;box-sizing:border-box;grid-template-areas:\"top-start     top            top-end\" \"center-start  center         center-end\" \"bottom-start  bottom-center  bottom-end\";grid-template-rows:minmax(-webkit-min-content,auto) minmax(-webkit-min-content,auto) minmax(-webkit-min-content,auto);grid-template-rows:minmax(min-content,auto) minmax(min-content,auto) minmax(min-content,auto);height:100%;padding:.625em;overflow-x:hidden;transition:background-color .1s;-webkit-overflow-scrolling:touch}.swal2-container.swal2-backdrop-show,.swal2-container.swal2-noanimation{background:rgba(0,0,0,.4)}.swal2-container.swal2-backdrop-hide{background:0 0!important}.swal2-container.swal2-bottom-start,.swal2-container.swal2-center-start,.swal2-container.swal2-top-start{grid-template-columns:minmax(0,1fr) auto auto}.swal2-container.swal2-bottom,.swal2-container.swal2-center,.swal2-container.swal2-top{grid-template-columns:auto minmax(0,1fr) auto}.swal2-container.swal2-bottom-end,.swal2-container.swal2-center-end,.swal2-container.swal2-top-end{grid-template-columns:auto auto minmax(0,1fr)}.swal2-container.swal2-top-start>.swal2-popup{align-self:start}.swal2-container.swal2-top>.swal2-popup{grid-column:2;align-self:start;justify-self:center}.swal2-container.swal2-top-end>.swal2-popup,.swal2-container.swal2-top-right>.swal2-popup{grid-column:3;align-self:start;justify-self:end}.swal2-container.swal2-center-left>.swal2-popup,.swal2-container.swal2-center-start>.swal2-popup{grid-row:2;align-self:center}.swal2-container.swal2-center>.swal2-popup{grid-column:2;grid-row:2;align-self:center;justify-self:center}.swal2-container.swal2-center-end>.swal2-popup,.swal2-container.swal2-center-right>.swal2-popup{grid-column:3;grid-row:2;align-self:center;justify-self:end}.swal2-container.swal2-bottom-left>.swal2-popup,.swal2-container.swal2-bottom-start>.swal2-popup{grid-column:1;grid-row:3;align-self:end}.swal2-container.swal2-bottom>.swal2-popup{grid-column:2;grid-row:3;justify-self:center;align-self:end}.swal2-container.swal2-bottom-end>.swal2-popup,.swal2-container.swal2-bottom-right>.swal2-popup{grid-column:3;grid-row:3;align-self:end;justify-self:end}.swal2-container.swal2-grow-fullscreen>.swal2-popup,.swal2-container.swal2-grow-row>.swal2-popup{grid-column:1/4;width:100%}.swal2-container.swal2-grow-column>.swal2-popup,.swal2-container.swal2-grow-fullscreen>.swal2-popup{grid-row:1/4;align-self:stretch}.swal2-container.swal2-no-transition{transition:none!important}.swal2-popup{display:none;position:relative;box-sizing:border-box;grid-template-columns:minmax(0,100%);width:32em;max-width:100%;padding:0 0 1.25em;border:none;border-radius:5px;background:#fff;color:#545454;font-family:inherit;font-size:1rem}.swal2-popup:focus{outline:0}.swal2-popup.swal2-loading{overflow-y:hidden}.swal2-title{position:relative;max-width:100%;margin:0;padding:.8em 1em 0;color:#595959;font-size:1.875em;font-weight:600;text-align:center;text-transform:none;word-wrap:break-word}.swal2-actions{display:flex;z-index:1;box-sizing:border-box;flex-wrap:wrap;align-items:center;justify-content:center;width:auto;margin:1.25em auto 0;padding:0}.swal2-actions:not(.swal2-loading) .swal2-styled[disabled]{opacity:.4}.swal2-actions:not(.swal2-loading) .swal2-styled:hover{background-image:linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1))}.swal2-actions:not(.swal2-loading) .swal2-styled:active{background-image:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2))}.swal2-loader{display:none;align-items:center;justify-content:center;width:2.2em;height:2.2em;margin:0 1.875em;-webkit-animation:swal2-rotate-loading 1.5s linear 0s infinite normal;animation:swal2-rotate-loading 1.5s linear 0s infinite normal;border-width:.25em;border-style:solid;border-radius:100%;border-color:#2778c4 transparent #2778c4 transparent}.swal2-styled{margin:.3125em;padding:.625em 1.1em;transition:box-shadow .1s;box-shadow:0 0 0 3px transparent;font-weight:500}.swal2-styled:not([disabled]){cursor:pointer}.swal2-styled.swal2-confirm{border:0;border-radius:.25em;background:initial;background-color:#f56e14;color:#fff;font-size:1em}.swal2-styled.swal2-confirm:focus{box-shadow:0 0 0 3px rgba(115,103,240,.5)}.swal2-styled.swal2-deny{border:0;border-radius:.25em;background:initial;background-color:#ea5455;color:#fff;font-size:1em}.swal2-styled.swal2-deny:focus{box-shadow:0 0 0 3px rgba(234,84,85,.5)}.swal2-styled.swal2-cancel{border:0;border-radius:.25em;background:initial;background-color:#6e7d88;color:#fff;font-size:1em}.swal2-styled.swal2-cancel:focus{box-shadow:0 0 0 3px rgba(110,125,136,.5)}.swal2-styled.swal2-default-outline:focus{box-shadow:0 0 0 3px rgba(100,150,200,.5)}.swal2-styled:focus{outline:0}.swal2-styled::-moz-focus-inner{border:0}.swal2-footer{justify-content:center;margin:1em 0 0;padding:1em 1em 0;border-top:1px solid #eee;color:#545454;font-size:1em}.swal2-timer-progress-bar-container{position:absolute;right:0;bottom:0;left:0;grid-column:auto!important;height:.25em;overflow:hidden;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.swal2-timer-progress-bar{width:100%;height:.25em;background:rgba(0,0,0,.2)}.swal2-image{max-width:100%;margin:2em auto 1em}.swal2-close{z-index:2;align-items:center;justify-content:center;width:1.2em;height:1.2em;margin-top:0;margin-right:0;margin-bottom:-1.2em;padding:0;overflow:hidden;transition:color .1s,box-shadow .1s;border:none;border-radius:5px;background:0 0;color:#ccc;font-family:serif;font-family:monospace;font-size:2.5em;cursor:pointer;justify-self:end}.swal2-close:hover{transform:none;background:0 0;color:#f27474}.swal2-close:focus{outline:0;box-shadow:inset 0 0 0 3px rgba(100,150,200,.5)}.swal2-close::-moz-focus-inner{border:0}.swal2-html-container{z-index:1;justify-content:center;margin:1em 1.6em .3em;padding:0;overflow:auto;color:#545454;font-size:1.125em;font-weight:400;line-height:normal;text-align:center;word-wrap:break-word;word-break:break-word}.swal2-checkbox,.swal2-file,.swal2-input,.swal2-radio,.swal2-select,.swal2-textarea{margin:1em 2em 0}.swal2-file,.swal2-input,.swal2-textarea{box-sizing:border-box;width:auto;transition:border-color .1s,box-shadow .1s;border:1px solid #d9d9d9;border-radius:.1875em;background:inherit;box-shadow:inset 0 1px 1px rgba(0,0,0,.06),0 0 0 3px transparent;color:inherit;font-size:1.125em}.swal2-file.swal2-inputerror,.swal2-input.swal2-inputerror,.swal2-textarea.swal2-inputerror{border-color:#f27474!important;box-shadow:0 0 2px #f27474!important}.swal2-file:focus,.swal2-input:focus,.swal2-textarea:focus{border:1px solid #b4dbed;outline:0;box-shadow:inset 0 1px 1px rgba(0,0,0,.06),0 0 0 3px rgba(100,150,200,.5)}.swal2-file::-moz-placeholder,.swal2-input::-moz-placeholder,.swal2-textarea::-moz-placeholder{color:#ccc}.swal2-file:-ms-input-placeholder,.swal2-input:-ms-input-placeholder,.swal2-textarea:-ms-input-placeholder{color:#ccc}.swal2-file::placeholder,.swal2-input::placeholder,.swal2-textarea::placeholder{color:#ccc}.swal2-range{margin:1em 2em 0;background:#fff}.swal2-range input{width:80%}.swal2-range output{width:20%;color:inherit;font-weight:600;text-align:center}.swal2-range input,.swal2-range output{height:2.625em;padding:0;font-size:1.125em;line-height:2.625em}.swal2-input{height:2.625em;padding:0 .75em}.swal2-file{width:75%;margin-right:auto;margin-left:auto;background:inherit;font-size:1.125em}.swal2-textarea{height:6.75em;padding:.75em}.swal2-select{min-width:50%;max-width:100%;padding:.375em .625em;background:inherit;color:inherit;font-size:1.125em}.swal2-checkbox,.swal2-radio{align-items:center;justify-content:center;background:#fff;color:inherit}.swal2-checkbox label,.swal2-radio label{margin:0 .6em;font-size:1.125em}.swal2-checkbox input,.swal2-radio input{flex-shrink:0;margin:0 .4em}.swal2-input-label{display:flex;justify-content:center;margin:1em auto 0}.swal2-validation-message{align-items:center;justify-content:center;margin:1em 0 0;padding:.625em;overflow:hidden;background:#f0f0f0;color:#666;font-size:1em;font-weight:300}.swal2-validation-message::before{content:\"!\";display:inline-block;width:1.5em;min-width:1.5em;height:1.5em;margin:0 .625em;border-radius:50%;background-color:#f27474;color:#fff;font-weight:600;line-height:1.5em;text-align:center}.swal2-icon{position:relative;box-sizing:content-box;justify-content:center;width:5em;height:5em;margin:2.5em auto .6em;border:.25em solid transparent;border-radius:50%;border-color:#000;font-family:inherit;line-height:5em;cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:3.75em}.swal2-icon.swal2-error{border-color:#f27474;color:#f27474}.swal2-icon.swal2-error .swal2-x-mark{position:relative;flex-grow:1}.swal2-icon.swal2-error [class^=swal2-x-mark-line]{display:block;position:absolute;top:2.3125em;width:2.9375em;height:.3125em;border-radius:.125em;background-color:#f27474}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:1.0625em;transform:rotate(45deg)}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:1em;transform:rotate(-45deg)}.swal2-icon.swal2-error.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-error.swal2-icon-show .swal2-x-mark{-webkit-animation:swal2-animate-error-x-mark .5s;animation:swal2-animate-error-x-mark .5s}.swal2-icon.swal2-warning{border-color:#facea8;color:#f8bb86}.swal2-icon.swal2-info{border-color:#9de0f6;color:#3fc3ee}.swal2-icon.swal2-question{border-color:#c9dae1;color:#87adbd}.swal2-icon.swal2-success{border-color:#a5dc86;color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-circular-line]{position:absolute;width:3.75em;height:7.5em;transform:rotate(45deg);border-radius:50%}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.4375em;left:-2.0635em;transform:rotate(-45deg);transform-origin:3.75em 3.75em;border-radius:7.5em 0 0 7.5em}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.6875em;left:1.875em;transform:rotate(-45deg);transform-origin:0 3.75em;border-radius:0 7.5em 7.5em 0}.swal2-icon.swal2-success .swal2-success-ring{position:absolute;z-index:2;top:-.25em;left:-.25em;box-sizing:content-box;width:100%;height:100%;border:.25em solid rgba(165,220,134,.3);border-radius:50%}.swal2-icon.swal2-success .swal2-success-fix{position:absolute;z-index:1;top:.5em;left:1.625em;width:.4375em;height:5.625em;transform:rotate(-45deg)}.swal2-icon.swal2-success [class^=swal2-success-line]{display:block;position:absolute;z-index:2;height:.3125em;border-radius:.125em;background-color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-line][class$=tip]{top:2.875em;left:.8125em;width:1.5625em;transform:rotate(45deg)}.swal2-icon.swal2-success [class^=swal2-success-line][class$=long]{top:2.375em;right:.5em;width:2.9375em;transform:rotate(-45deg)}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-animate-success-line-tip .75s;animation:swal2-animate-success-line-tip .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-animate-success-line-long .75s;animation:swal2-animate-success-line-long .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-circular-line-right{-webkit-animation:swal2-rotate-success-circular-line 4.25s ease-in;animation:swal2-rotate-success-circular-line 4.25s ease-in}.swal2-progress-steps{flex-wrap:wrap;align-items:center;max-width:100%;margin:1.25em auto;padding:0;background:inherit;font-weight:600}.swal2-progress-steps li{display:inline-block;position:relative}.swal2-progress-steps .swal2-progress-step{z-index:20;flex-shrink:0;width:2em;height:2em;border-radius:2em;background:#2778c4;color:#fff;line-height:2em;text-align:center}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step{background:#2778c4}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step{background:#add8e6;color:#fff}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line{background:#add8e6}.swal2-progress-steps .swal2-progress-step-line{z-index:10;flex-shrink:0;width:2.5em;height:.4em;margin:0 -1px;background:#2778c4}[class^=swal2]{-webkit-tap-highlight-color:transparent}.swal2-show{-webkit-animation:swal2-show .3s;animation:swal2-show .3s}.swal2-hide{-webkit-animation:swal2-hide .15s forwards;animation:swal2-hide .15s forwards}.swal2-noanimation{transition:none}.swal2-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}.swal2-rtl .swal2-close{margin-right:initial;margin-left:0}.swal2-rtl .swal2-timer-progress-bar{right:0;left:auto}@-webkit-keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@-webkit-keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@-webkit-keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@-webkit-keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@-webkit-keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@-webkit-keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@-webkit-keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@-webkit-keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@-webkit-keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@-webkit-keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@-webkit-keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@-webkit-keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow:hidden}body.swal2-height-auto{height:auto!important}body.swal2-no-backdrop .swal2-container{background-color:transparent!important;pointer-events:none}body.swal2-no-backdrop .swal2-container .swal2-popup{pointer-events:all}body.swal2-no-backdrop .swal2-container .swal2-modal{box-shadow:0 0 10px rgba(0,0,0,.4)}@media print{body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow-y:scroll!important}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown)>[aria-hidden=true]{display:none}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container{position:static!important}}body.swal2-toast-shown .swal2-container{box-sizing:border-box;width:360px;max-width:100%;background-color:transparent;pointer-events:none}body.swal2-toast-shown .swal2-container.swal2-top{top:0;right:auto;bottom:auto;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-top-end,body.swal2-toast-shown .swal2-container.swal2-top-right{top:0;right:0;bottom:auto;left:auto}body.swal2-toast-shown .swal2-container.swal2-top-left,body.swal2-toast-shown .swal2-container.swal2-top-start{top:0;right:auto;bottom:auto;left:0}body.swal2-toast-shown .swal2-container.swal2-center-left,body.swal2-toast-shown .swal2-container.swal2-center-start{top:50%;right:auto;bottom:auto;left:0;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-center{top:50%;right:auto;bottom:auto;left:50%;transform:translate(-50%,-50%)}body.swal2-toast-shown .swal2-container.swal2-center-end,body.swal2-toast-shown .swal2-container.swal2-center-right{top:50%;right:0;bottom:auto;left:auto;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-left,body.swal2-toast-shown .swal2-container.swal2-bottom-start{top:auto;right:auto;bottom:0;left:0}body.swal2-toast-shown .swal2-container.swal2-bottom{top:auto;right:auto;bottom:0;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-end,body.swal2-toast-shown .swal2-container.swal2-bottom-right{top:auto;right:0;bottom:0;left:auto}");