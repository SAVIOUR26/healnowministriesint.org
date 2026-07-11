(function () {
    "use strict";

    // Mobile nav toggle
    var toggle = document.querySelector(".nav-toggle");
    var nav = document.getElementById("site-nav");
    if (toggle && nav) {
        var closeNav = function () {
            nav.classList.remove("is-open");
            toggle.setAttribute("aria-expanded", "false");
        };
        toggle.addEventListener("click", function () {
            var isOpen = nav.classList.toggle("is-open");
            toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
        });
        nav.querySelectorAll("a").forEach(function (link) {
            link.addEventListener("click", closeNav);
        });
        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") closeNav();
        });
        document.addEventListener("click", function (e) {
            if (nav.classList.contains("is-open") && !nav.contains(e.target) && e.target !== toggle && !toggle.contains(e.target)) {
                closeNav();
            }
        });
    }

    // Sticky header shrink/opacity state
    var header = document.querySelector(".site-header");
    if (header) {
        var updateHeaderState = function () {
            header.classList.toggle("site-header--scrolled", window.scrollY > 12);
        };
        updateHeaderState();
        window.addEventListener("scroll", updateHeaderState, { passive: true });
    }

    // Scroll reveal
    var revealEls = document.querySelectorAll(".reveal");
    if ("IntersectionObserver" in window && revealEls.length) {
        var observer = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-visible");
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.15, rootMargin: "0px 0px -40px 0px" }
        );
        revealEls.forEach(function (el) { observer.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add("is-visible"); });
    }
})();
