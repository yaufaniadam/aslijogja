//----------------------------------------------------/
//
//      POLO - HTML5 Template
//      Author: INSPIRO - Ardian Berisha
//      Version: v5.9.9
//      Update: April 10, 2020
//
//----------------------------------------------------/
//INSPIRO Global var
var INSPIRO = {},
  $ = jQuery.noConflict();
(function ($) {
  "use strict"
  // Predefined Global Variables
  var $window = $(window),
    $theme_color = "#2250fc",
    //Main
    $body = $("body"),
    $bodyInner = $(".body-inner"),
    $section = $("section"),
    //Header
    $topbar = $("#topbar"),
    $header = $("#header"),
    $headerCurrentClasses = $header.attr("class"),
    //Logo
    headerLogo = $("#logo"),
    //Menu
    $mainMenu = $("#mainMenu"),
    $mainMenuTriggerBtn = $("#mainMenu-trigger a, #mainMenu-trigger button"),
    //Slider
    $slider = $("#slider"),
    $inspiroSlider = $(".inspiro-slider"),
    $carousel = $(".carousel"),
    /*Grid Layout*/
    $gridLayout = $(".grid-layout"),
    $gridFilter = $(".grid-filter, .page-grid-filter"),
    windowWidth = $window.width();

  //Check if header exist
  if ($header.length > 0) {
    var $headerOffsetTop = $header.offset().top
  }
  var Events = {
    browser: {
      isMobile: function () {
        if (navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/)) {
          return true
        } else {
          return false
        }
      }
    }
  }
  //Settings
  var Settings = {
    isMobile: Events.browser.isMobile,
    submenuLight: $header.hasClass("submenu-light") == true ? true : false,
    headerHasDarkClass: $header.hasClass("dark") == true ? true : false,
    headerDarkClassRemoved: false,
    sliderDarkClass: false,
    menuIsOpen: false,
    menuOverlayOpened: false,
  }
  //Window breakpoints
  $(window).breakpoints({
    triggerOnInit: true,
    breakpoints: [{
        name: "xs",
        width: 0
      },
      {
        name: "sm",
        width: 576
      },
      {
        name: "md",
        width: 768
      },
      {
        name: "lg",
        width: 1025
      },
      {
        name: "xl",
        width: 1200
      }
    ]
  })
  var currentBreakpoint = $(window).breakpoints("getBreakpoint")
  $body.addClass("breakpoint-" + currentBreakpoint)
  $(window).bind("breakpoint-change", function (breakpoint) {
    $body.removeClass("breakpoint-" + breakpoint.from)
    $body.addClass("breakpoint-" + breakpoint.to)
  });


  $(window).bind("breakpoint-change", function (event) {
    $(window).breakpoints("greaterEqualTo", "lg", function () {
      $body.addClass("b--desktop");
      $body.removeClass("b--responsive");
    });
    $(window).breakpoints("lessThan", "lg", function () {
      $body.removeClass("b--desktop");
      $body.addClass("b--responsive");
    });
  });



  INSPIRO.core = {
    functions: function () {
      INSPIRO.core.scrollTop()
      INSPIRO.core.rtlStatus()
      INSPIRO.core.equalize()
      INSPIRO.core.customHeight()
      INSPIRO.core.darkTheme()
    },
    scrollTop: function () {
      var $scrollTop = $("#scrollTop")
      if ($scrollTop.length > 0) {
        var scrollOffset = $body.attr("data-offset") || 400
        if ($window.scrollTop() > scrollOffset) {
          if ($body.hasClass("frame")) {
            $scrollTop.css({
              "bottom": "46px",
              "opacity": 1,
              "z-index": 199
            })
          } else {
            $scrollTop.css({
              "bottom": "26px",
              "opacity": 1,
              "z-index": 199
            })
          }
        } else {
          $scrollTop.css({
            bottom: "16px",
            opacity: 0
          })
        }
        $scrollTop.off("click").on("click", function () {
          $("body,html")
            .stop(true)
            .animate({
                scrollTop: 0
              },
              1000,
              "easeInOutExpo"
            )
          return false
        })
      }
    },
    rtlStatus: function () {
      var $rtlStatusCheck = $("html").attr("dir")
      if ($rtlStatusCheck == "rtl") {
        return true
      }
      return false
    },
    equalize: function () {
      var $equalize = $(".equalize")
      if ($equalize.length > 0) {
        $equalize.each(function () {
          var elem = $(this),
            selectorItem = elem.find(elem.attr("data-equalize-item")) || "> div",
            maxHeight = 0
          selectorItem.each(function () {
            if ($(this).outerHeight(true) > maxHeight) {
              maxHeight = $(this).outerHeight(true)
            }
          })
          selectorItem.height(maxHeight)
        })
      }
    },
    customHeight: function (setHeight) {
      var $customHeight = $(".custom-height")
      if ($customHeight.length > 0) {
        $customHeight.each(function () {
          var elem = $(this),
            elemHeight = elem.attr("data-height") || 400,
            elemHeightLg = elem.attr("data-height-lg") || elemHeight,
            elemHeightMd = elem.attr("data-height-md") || elemHeightLg,
            elemHeightSm = elem.attr("data-height-sm") || elemHeightMd,
            elemHeightXs = elem.attr("data-height-xs") || elemHeightSm

          function customHeightBreakpoint(setHeight) {
            if (setHeight) {
              elem = setHeight
            }
            switch ($(window).breakpoints("getBreakpoint")) {
              case "xs":
                elem.height(elemHeightXs)
                break
              case "sm":
                elem.height(elemHeightSm)
                break
              case "md":
                elem.height(elemHeightMd)
                break
              case "lg":
                elem.height(elemHeightLg)
                break
              case "xl":
                elem.height(elemHeight)
                break
            }
          }
          customHeightBreakpoint(setHeight)
          $(window).resize(function () {
            setTimeout(function () {
              customHeightBreakpoint(setHeight)
            }, 100)
          })
        })
      }
    },
    darkTheme: function () {
      var $darkElement = $("[data-dark-src]"),
        $lightBtnTrigger = $("#light-mode"),
        $darkBtnTrigger = $("#dark-mode"),
        darkColorScheme = "darkColorScheme",
        defaultDark = $body.hasClass("dark");

      if (typeof Cookies.get(darkColorScheme) !== "undefined") {
        // $body.addClass("dark");
      }


      $darkBtnTrigger.on("click", function (e) {
        darkElemSrc();
        $body.addClass("dark");
        INSPIRO.elements.shapeDivider();
        Cookies.set(darkColorScheme, true, {
          expires: Number(365)
        })
      })

      $lightBtnTrigger.on("click", function (e) {
        lightElemSrc();
        $body.removeClass("dark");
        INSPIRO.elements.shapeDivider();
        Cookies.remove(darkColorScheme);
      })

      if ($body.hasClass("dark")) {
        darkElemSrc();
      }

      function darkElemSrc() {
        $darkElement.each(function () {
          var elem = $(this),
            elemOriginalSrc = elem.attr("src"),
            elemDarkSrc = elem.attr("data-dark-src");

          if (elemDarkSrc) {
            elem.attr("data-original-src", elemOriginalSrc);
            elem.attr("src", elemDarkSrc);
          }
        })
      }

      function lightElemSrc() {
        $darkElement.each(function () {
          var elem = $(this),
            elemLightSrc = elem.attr("data-original-src");

          if (elemLightSrc) {
            elem.attr("src", elemLightSrc);
          }
        })
      }
    }
  }
  INSPIRO.header = {
    functions: function () {
      INSPIRO.header.logoStatus();
      INSPIRO.header.stickyHeader();
      INSPIRO.header.topBar();
      INSPIRO.header.search();
      INSPIRO.header.mainMenu();
      INSPIRO.header.mainMenuOverlay();
      INSPIRO.header.pageMenu();
      INSPIRO.header.sidebarOverlay();
      INSPIRO.header.dotsMenu();
      INSPIRO.header.onepageMenu();
    },
    logoStatus: function (status) {
      var headerLogoDefault = headerLogo.find($(".logo-default")),
        headerLogoDark = headerLogo.find($(".logo-dark")),
        headerLogoFixed = headerLogo.find(".logo-fixed"),
        headerLogoResponsive = headerLogo.find(".logo-responsive");

      if ($header.hasClass("header-sticky") && headerLogoFixed.length > 0) {
        headerLogoDefault.css("display", "none");
        headerLogoDark.css("display", "none");
        headerLogoResponsive.css("display", "none");
        headerLogoFixed.css("display", "block");
      } else {
        headerLogoDefault.removeAttr("style");
        headerLogoDark.removeAttr("style");
        headerLogoResponsive.removeAttr("style");
        headerLogoFixed.removeAttr("style");
      }
      $(window).breakpoints("lessThan", "lg", function () {
        if (headerLogoResponsive.length > 0) {
          headerLogoDefault.css("display", "none");
          headerLogoDark.css("display", "none");
          headerLogoFixed.css("display", "none");
          headerLogoResponsive.css("display", "block");
        }
      })
    },
    stickyHeader: function () {
      var shrinkHeader = $header.attr("data-shrink") || 0,
        shrinkHeaderActive = $header.attr("data-sticky-active") || 200,
        scrollOnTop = $window.scrollTop();
      if ($header.hasClass("header-modern")) {
        shrinkHeader = 300;
      }

      $(window).breakpoints("greaterEqualTo", "lg", function () {
        if (!$header.is(".header-disable-fixed")) {
          if (scrollOnTop > $headerOffsetTop + shrinkHeader) {
            $header.addClass("header-sticky");
            if (scrollOnTop > $headerOffsetTop + shrinkHeaderActive) {
              $header.addClass("sticky-active");
              if (Settings.submenuLight && Settings.headerHasDarkClass) {
                $header.removeClass("dark");
                Settings.headerDarkClassRemoved = true;
              }
              INSPIRO.header.logoStatus();
            }
          } else {
            $header.removeClass().addClass($headerCurrentClasses);
            if (Settings.sliderDarkClass && Settings.headerHasDarkClass) {
              $header.removeClass("dark");
              Settings.headerDarkClassRemoved = true;
            }
            INSPIRO.header.logoStatus();
          }
        }
      });
      $(window).breakpoints("lessThan", "lg", function () {
        if ($header.attr("data-responsive-fixed") == "true") {
          if (scrollOnTop > $headerOffsetTop + shrinkHeader) {
            $header.addClass("header-sticky");
            if (scrollOnTop > $headerOffsetTop + shrinkHeaderActive) {
              $header.addClass("sticky-active");
              if (Settings.submenuLight) {
                $header.removeClass("dark");
                Settings.headerDarkClassRemoved = true;
              }
              INSPIRO.header.logoStatus();
            }
          } else {
            $header.removeClass().addClass($headerCurrentClasses);
            if (Settings.headerDarkClassRemoved == true && $body.hasClass("mainMenu-open")) {
              $header.removeClass("dark");
            }
            INSPIRO.header.logoStatus();
          }
        }
      })
    },
    //chkd
    topBar: function () {
      if ($topbar.length > 0) {
        $("#topbar .topbar-dropdown .topbar-form").each(function (index, element) {
          if ($window.width() - ($(element).width() + $(element).offset().left) < 0) {
            $(element).addClass("dropdown-invert");
          }
        })
      }
    },
    search: function () {
      var $search = $("#search");
      if ($search.length > 0) {
        var searchBtn = $("#btn-search"),
          searchBtnClose = $("#btn-search-close"),
          searchInput = $search.find(".form-control");

        function openSearch() {
          $body.addClass("search-open");
          searchInput.focus();
        }

        function closeSearch() {
          $body.removeClass("search-open");
          searchInput.value = "";
        }
        searchBtn.on("click", function () {
          openSearch();
          return false;
        })
        searchBtnClose.on("click", function () {
          closeSearch();
          return false;
        })
        document.addEventListener("keyup", function (ev) {
          if (ev.keyCode == 27) {
            closeSearch();
          }
        })
      }
    },
    mainMenu: function () {
      if ($mainMenu.length > 0) {
        $mainMenu.find(".dropdown, .dropdown-submenu").prepend('<span class="dropdown-arrow"></span>');

        var $menuItemLinks = $('#mainMenu nav > ul > li.dropdown > a[href="#"], #mainMenu nav > ul > li.dropdown > .dropdown-arrow, .dropdown-submenu > a[href="#"], .dropdown-submenu > .dropdown-arrow, .dropdown-submenu > span, .page-menu nav > ul > li.dropdown > a'),
          $triggerButton = $("#mainMenu-trigger a, #mainMenu-trigger button"),
          processing = false,
          triggerEvent;

        $triggerButton.on("click", function (e) {
          var elem = $(this);
          e.preventDefault();
          $(window).breakpoints("lessThan", "lg", function () {
            var openMenu = function () {
              if (!processing) {
                processing = true;
                Settings.menuIsOpen = true;
                if (Settings.submenuLight && Settings.headerHasDarkClass) {
                  $header.removeClass("dark");
                  Settings.headerDarkClassRemoved = true;
                } else {
                  if (Settings.headerHasDarkClass && Settings.headerDarkClassRemoved) {
                    $header.addClass("dark");
                  }
                }
                elem.addClass("toggle-active");
                $body.addClass("mainMenu-open");
                INSPIRO.header.logoStatus();
                $mainMenu.animate({
                  "min-height": $window.height()
                }, {
                  duration: 500,
                  easing: "easeInOutQuart",
                  start: function () {
                    setTimeout(function () {
                      $mainMenu.addClass("menu-animate");
                    }, 300);
                  },
                  complete: function () {
                    processing = false;
                  }
                })
              }
            }
            var closeMenu = function () {
              if (!processing) {
                processing = true;
                Settings.menuIsOpen = false;
                INSPIRO.header.logoStatus();
                $mainMenu.animate({
                  "min-height": 0
                }, {
                  start: function () {
                    $mainMenu.removeClass("menu-animate");
                  },
                  done: function () {
                    $body.removeClass("mainMenu-open");
                    elem.removeClass("toggle-active");
                    if (Settings.submenuLight && Settings.headerHasDarkClass && Settings.headerDarkClassRemoved && !$header.hasClass("header-sticky")) {
                      $header.addClass("dark");
                    }
                    if (Settings.sliderDarkClass && Settings.headerHasDarkClass && Settings.headerDarkClassRemoved) {
                      $header.removeClass("dark");
                      Settings.headerDarkClassRemoved = true;
                    }
                  },
                  duration: 500,
                  easing: "easeInOutQuart",
                  complete: function () {
                    processing = false;
                  }
                })
              }
            }
            if (!Settings.menuIsOpen) {
              triggerEvent = openMenu();
            } else {
              triggerEvent = closeMenu();
            }
          })
        });

        $menuItemLinks.on("click", function (e) {
          $(this).parent("li").siblings().removeClass("hover-active");
          if ($body.hasClass("b--responsive") || $mainMenu.hasClass("menu-onclick")) {
            $(this).parent("li").toggleClass("hover-active");
          }
          e.stopPropagation();
          e.preventDefault();
        });

        $body.on("click", function (e) {
          $mainMenu.find(".hover-active").removeClass("hover-active");
        });

        $(window).on('resize', function () {
          if ($body.hasClass("mainMenu-open")) {
            if (Settings.menuIsOpen) {
              $mainMenuTriggerBtn.trigger("click");
              $mainMenu.find(".hover-active").removeClass("hover-active");
            }
          }
        });


        /*invert menu fix*/
        $(window).breakpoints("greaterEqualTo", "lg", function () {
          var $menuLastItem = $("nav > ul > li:last-child"),
            $menuLastItemUl = $("nav > ul > li:last-child > ul"),
            $menuLastInvert = $menuLastItemUl.width() - $menuLastItem.width(),
            $menuItems = $("nav > ul > li").find(".dropdown-menu");

          $menuItems.css("display", "block");

          $(".dropdown:not(.mega-menu-item) ul ul").each(function (index, element) {
            if ($window.width() - ($(element).width() + $(element).offset().left) < 0) {
              $(element).addClass("menu-invert");
            }
          })

          if ($menuLastItemUl.length > 0) {
            if ($window.width() - ($menuLastItemUl.width() + $menuLastItem.offset().left) < 0) {
              $menuLastItemUl.addClass("menu-last");
            }
          }
          $menuItems.css("display", "");
        })
      }

    },
    mainMenuOverlay: function () {},
    pageMenu: function () {

      var $pageMenu = $(".page-menu");

      if ($pageMenu.length > 0) {
        $(window).breakpoints("greaterEqualTo", "lg", function () {
          var shrinkPageMenu = $pageMenu.attr("data-shrink") || $pageMenu.offset().top + 200;

          if ($pageMenu.attr('data-sticky') == "true") {
            $window.scroll(function () {
              if ($window.scrollTop() > shrinkPageMenu) {
                $pageMenu.addClass("sticky-active");
                $header.addClass("pageMenu-sticky");
              } else {
                $pageMenu.removeClass("sticky-active");
                $header.removeClass("pageMenu-sticky");
              }
            });

          }
        });

        $pageMenu.each(function () {
          $(this).find("#pageMenu-trigger").on("click", function () {
            $pageMenu.toggleClass("page-menu-active");
            $pageMenu.toggleClass("items-visible");
          })
        });


      }
    },
    sidebarOverlay: function () {
      var sidebarOverlay = $("#side-panel");
      if (sidebarOverlay.length > 0) {
        sidebarOverlay.css("opacity", 1);
        $("#close-panel").on("click", function () {
          $body.removeClass("side-panel-active");
          $("#side-panel-trigger").removeClass("toggle-active");
        })
      }

      var $sidepanel = $("#sidepanel"),
        $sidepanelTrigger = $(".panel-trigger"),
        sidepanelProcessing = false,
        sidepanelEvent;

      $sidepanelTrigger.on("click", function (e) {
        e.preventDefault();
        var panelOpen = function () {
          if (!sidepanelProcessing) {
            sidepanelProcessing = true;
            Settings.panelIsOpen = true;
            $sidepanel.addClass("panel-open");
            sidepanelProcessing = false;
          }
        }
        var panelClose = function () {
          if (!sidepanelProcessing) {
            sidepanelProcessing = true;
            Settings.panelIsOpen = false;
            $sidepanel.removeClass("panel-open");
            sidepanelProcessing = false;
          }
        }
        if (!Settings.panelIsOpen) {
          sidepanelEvent = panelOpen();
        } else {
          sidepanelEvent = panelClose();
        }
      })
    },
    dotsMenu: function () {
      var $dotsMenu = $("#dotsMenu"),
        $dotsMenuItems = $dotsMenu.find("ul > li > a");
      if ($dotsMenu.length > 0) {
        $dotsMenuItems.on("click", function () {
          $dotsMenuItems.parent("li").removeClass("current");
          $(this).parent("li").addClass("current");
          return false;
        })
        $dotsMenuItems.parents("li").removeClass("current");
        $dotsMenu.find('a[href="#' + INSPIRO.header.currentSection() + '"]').parent("li").addClass("current");
      }
    },
    onepageMenu: function () {
      if ($mainMenu.hasClass("menu-one-page")) {
        var $currentMenuItem = "current";

        $(window).on("scroll", function () {
          var $currentSection = INSPIRO.header.currentSection();
          $mainMenu.find("nav > ul > li > a").parents("li").removeClass($currentMenuItem);
          $mainMenu.find('nav > ul > li > a[href="#' + $currentSection + '"]').parent("li").addClass($currentMenuItem);
        })
      }
    },
    currentSection: function () {
      var elemCurrent = "body"
      $section.each(function () {
        var elem = $(this),
          elemeId = elem.attr("id");
        if (elem.offset().top - $window.height() / 3 < $window.scrollTop() && elem.offset().top + elem.height() - $window.height() / 3 > $window.scrollTop()) {
          elemCurrent = elemeId;
        }
      })
      return elemCurrent;
    }
  }
  INSPIRO.slider = {
    functions: function () {
      INSPIRO.slider.inspiroSlider();
      INSPIRO.slider.carousel();
      INSPIRO.slider.carouselAjax();
    },
    inspiroSlider: function () {
      if ($inspiroSlider.length > 0) {
        //Check if flickity plugin is loaded
        if (typeof $.fn.flickity === "undefined") {
          INSPIRO.elements.notification("Warning", "jQuery flickity slider plugin is missing in plugins.js file.", "danger");
          return true;
        }
        var defaultAnimation = "fadeInUp";

        function animate_captions($elem) {
          var $captions = $elem;
          $captions.each(function () {
            var $captionElem = $(this),
              animationDuration = "600ms";
            if ($(this).attr("data-animate-duration")) {
              animationDuration = $(this).attr("data-animate-duration") + "ms";
            }
            $captionElem.css({
              opacity: 0
            })
            $(this).css("animation-duration", animationDuration);
          })
          $captions.each(function (index) {
            var $captionElem = $(this),
              captionDelay = $captionElem.attr("data-caption-delay") || index * 350 + 1000,
              captionAnimation = $captionElem.attr("data-caption-animate") || defaultAnimation;
            var t = setTimeout(function () {
              $captionElem.css({
                opacity: 1
              })
              $captionElem.addClass(captionAnimation)
            }, captionDelay);
          })
        }

        function hide_captions($elem) {
          var $captions = $elem;
          $captions.each(function (caption) {
            var caption = $(this),
              captionAnimation = caption.attr("data-caption-animate") || defaultAnimation;
            caption.removeClass(captionAnimation);
            caption.removeAttr("style");
          })
        }

        function start_kenburn(elem) {
          var currentSlide = elem.find(".slide.is-selected"),
            currentSlideKenburns = currentSlide.hasClass("kenburns");
          if (currentSlideKenburns) {
            setTimeout(function () {
              currentSlide.find(".kenburns-bg").addClass("kenburns-bg-animate");
            }, 500);
          }
        }

        function stop_kenburn(elem) {
          var notCurrentSlide = elem.find(".slide:not(.is-selected)");
          notCurrentSlide.find(".kenburns-bg").removeClass("kenburns-bg-animate");
        }

        function slide_dark(elem) {
          var $sliderClassSlide = elem.find(".slide.is-selected");
          if ($sliderClassSlide.hasClass("slide-dark") && Settings.headerHasDarkClass) {
            $header.removeClass("dark");
            Settings.sliderDarkClass = true;
            Settings.headerDarkClassRemoved = true;
          } else {
            Settings.sliderDarkClass = false;
            if (Settings.headerDarkClassRemoved && Settings.headerHasDarkClass && !$body.hasClass("mainMenu-open") && !$header.hasClass("sticky-active")) {
              $header.addClass("dark");
            }
          }
        }

        function sliderHeight(elem, state) {
          var elem,
            headerHeight = $header.outerHeight(),
            topbarHeight = $topbar.outerHeight() || 0,
            windowHeight = $window.height(),
            sliderCurrentHeight = elem.height(),
            screenHeightExtra = headerHeight + topbarHeight,
            $sliderClassSlide = elem.find(".slide"),
            sliderFullscreen = elem.hasClass("slider-fullscreen"),
            screenRatio = elem.hasClass("slider-halfscreen") ? 1 : 1.2,
            transparentHeader = $header.attr("data-transparent"),
            customHeight = elem.attr("data-height"),
            responsiveHeightXs = elem.attr("data-height-xs"),
            containerFullscreen = elem.find(".container").first().outerHeight(),
            contentCrop;

          if (containerFullscreen >= windowHeight) {
            contentCrop = true;
            var sliderMinHeight = containerFullscreen;
            elem.css("min-height", sliderMinHeight + 100);
            $sliderClassSlide.css("min-height", sliderMinHeight + 100);
            elem.find(".flickity-viewport").css("min-height", sliderMinHeight + 100);
          }

          sliderElementsHeight("null");

          function sliderElementsHeight(height) {
            if (height == "null") {
              elem.css("height", "");
              $sliderClassSlide.css("height", "");
              elem.find(".flickity-viewport").css("height", "");
            } else {
              elem.css("height", height);
              $sliderClassSlide.css("height", height);
              elem.find(".flickity-viewport").css("height", height);
            }
          }
          if (customHeight) {
            $(window).breakpoints("greaterEqualTo", "lg", function () {
              sliderElementsHeight(customHeight + "px");
            });
          }
          if (responsiveHeightXs) {
            $(window).breakpoints("lessThan", "md", function () {
              sliderElementsHeight(responsiveHeightXs + "px");
            });
          }
        }
        $inspiroSlider.each(function () {
          var elem = $(this);
          //Plugin Options
          elem.options = {
            cellSelector: elem.attr("data-item") || ".slide",
            prevNextButtons: elem.data("arrows") == false ? false : true,
            pageDots: elem.data("dots") == false ? false : true,
            fade: elem.data("fade") == true ? true : false,
            draggable: elem.data("drag") == true ? true : false,
            freeScroll: elem.data("free-scroll") == true ? true : false,
            wrapAround: elem.data("loop") == false ? false : true,
            groupCells: elem.data("group-cells") == true ? true : false,
            autoPlay: elem.attr("data-autoplay") || 7000,
            pauseAutoPlayOnHover: elem.data("hoverpause") == true ? true : false,
            adaptiveHeight: elem.data("adaptive-height") == false ? false : false,
            asNavFor: elem.attr("data-navigation") || false,
            selectedAttraction: elem.attr("data-attraction") || 0.07,
            friction: elem.attr("data-friction") || 0.9,
            initialIndex: elem.attr("data-initial-index") || 0,
            accessibility: elem.data("accessibility") == true ? true : false,
            setGallerySize: elem.data("gallery-size") == false ? false : false,
            resize: elem.data("resize") == false ? false : false,
            cellAlign: elem.attr("data-align") || "left",
            playWholeVideo: elem.attr("data-play-whole-video") == false ? false : true
          }
          //Kenburns effect
          elem.find(".slide").each(function () {
            if ($(this).hasClass("kenburns")) {
              var elemChild = $(this),
                elemChildImage = elemChild.css("background-image").replace(/.*\s?url\([\'\"]?/, "").replace(/[\'\"]?\).*/, "")

              if (elemChild.attr("data-bg-image")) {
                elemChildImage = elemChild.attr("data-bg-image");
              }
              elemChild.prepend('<div class="kenburns-bg" style="background-image:url(' + elemChildImage + ')"></div>');
            }
          })
          elem.find(".slide video").each(function () {
            this.pause();
          })
          $(window).breakpoints("lessThan", "lg", function () {
            elem.options.draggable = true;
          });

          if (elem.find(".slide").length <= 1) {
            elem.options.prevNextButtons = false;
            elem.options.pageDots = false;
            elem.options.autoPlay = false;
            elem.options.draggable = false;
          }

          if (!$.isNumeric(elem.options.autoPlay) && elem.options.autoPlay != false) {
            elem.options.autoPlay = Number(7000);
          }

          if (INSPIRO.core.rtlStatus() == true) {
            elem.options.resize = true;

          }

          sliderHeight(elem);

          var inspiroSliderData = elem.flickity({
            cellSelector: elem.options.cellSelector,
            prevNextButtons: elem.options.prevNextButtons,
            pageDots: elem.options.pageDots,
            fade: elem.options.fade,
            draggable: elem.options.draggable,
            freeScroll: elem.options.freeScroll,
            wrapAround: elem.options.wrapAround,
            groupCells: elem.options.groupCells,
            autoPlay: Number(elem.options.autoPlay),
            pauseAutoPlayOnHover: elem.options.pauseAutoPlayOnHover,
            adaptiveHeight: elem.options.adaptiveHeight,
            asNavFor: elem.options.asNavFor,
            selectedAttraction: Number(elem.options.selectedAttraction),
            friction: elem.options.friction,
            initialIndex: elem.options.initialIndex,
            accessibility: elem.options.accessibility,
            setGallerySize: elem.options.setGallerySize,
            resize: elem.options.resize,
            cellAlign: elem.options.cellAlign,
            rightToLeft: INSPIRO.core.rtlStatus(),
            on: {
              ready: function (index) {
                var $captions = elem.find(".slide.is-selected .slide-captions > *");
                slide_dark(elem);
                sliderHeight(elem);
                start_kenburn(elem);
                animate_captions($captions);
                setTimeout(function () {
                  elem.find(".slide:not(.is-selected) video").each(function (i, video) {
                    video.pause();
                    video.currentTime = 0;
                  })
                }, 700);
              }
            }
          });

          var flkty = inspiroSliderData.data("flickity");

          inspiroSliderData.on("change.flickity", function () {
            var $captions = elem.find(".slide.is-selected .slide-captions > *");
            hide_captions($captions);
            setTimeout(function () {
              stop_kenburn(elem);
            }, 1000);
            start_kenburn(elem);
            animate_captions($captions);
            elem.find(".slide video").each(function (i, video) {
              video.currentTime = 0;
            });
          });

          inspiroSliderData.on("select.flickity", function () {
            //  INSPIRO.elements.backgroundImage();
            var $captions = elem.find(".slide.is-selected .slide-captions > *");
            slide_dark(elem);
            sliderHeight(elem);
            start_kenburn(elem);
            animate_captions($captions);
            var video = flkty.selectedElement.querySelector("video");
            if (video) {
              video.play();
              flkty.options.autoPlay = Number(video.duration * 1000);
            } else {
              flkty.options.autoPlay = Number(elem.options.autoPlay);
            }
          });
          inspiroSliderData.on("dragStart.flickity", function () {
            var $captions = elem.find(".slide:not(.is-selected) .slide-captions > *");
            hide_captions($captions);
          });
          $(window).resize(function () {
            sliderHeight(elem);
            elem.flickity("reposition");
          });
        })
      }
    },
    carouselAjax: function () {
      INSPIRO.slider.carousel($(".carousel"));
    },
    carousel: function (elem) {
      if (elem) {
        $carousel = elem;
      }

      if ($carousel.length > 0) {
        //Check if flickity plugin is loaded
        if (typeof $.fn.flickity === "undefined") {
          INSPIRO.elements.notification("Warning", "jQuery flickity plugin is missing in plugins.js file.", "danger");
          return true;
        }
        $carousel.each(function () {
          var elem = $(this)
          //Plugin Options
          elem.options = {
            containerWidth: elem.width(),
            items: elem.attr("data-items") || 4,
            itemsLg: elem.attr("data-items-lg"),
            itemsMd: elem.attr("data-items-md"),
            itemsSm: elem.attr("data-items-sm"),
            itemsXs: elem.attr("data-items-xs"),
            margin: elem.attr("data-margin") || 10,
            cellSelector: elem.attr("data-item") || false,
            prevNextButtons: elem.data("arrows") == false ? false : true,
            pageDots: elem.data("dots") == false ? false : true,
            fade: elem.data("fade") == true ? true : false,
            draggable: elem.data("drag") == false ? false : true,
            freeScroll: elem.data("free-scroll") == true ? true : false,
            wrapAround: elem.data("loop") == false ? false : true,
            groupCells: elem.data("group-cells") == true ? true : false,
            autoPlay: elem.attr("data-autoplay") || 7000,
            pauseAutoPlayOnHover: elem.data("hover-pause") == false ? false : true,
            asNavFor: elem.attr("data-navigation") || false,
            lazyLoad: elem.data("lazy-load") == true ? true : false,
            initialIndex: elem.attr("data-initial-index") || 0,
            accessibility: elem.data("accessibility") == true ? true : false,
            adaptiveHeight: elem.data("adaptive-height") == true ? true : false,
            autoWidth: elem.data("auto-width") == true ? true : false,
            setGallerySize: elem.data("gallery-size") == false ? false : true,
            resize: elem.data("resize") == false ? false : true,
            cellAlign: elem.attr("data-align") || "left",
            rightToLeft: INSPIRO.core.rtlStatus()
          }

          //Calculate min/max on responsive breakpoints
          elem.options.itemsLg = elem.options.itemsLg || Math.min(Number(elem.options.items), Number(4));
          elem.options.itemsMd = elem.options.itemsMd || Math.min(Number(elem.options.itemsLg), Number(3));
          elem.options.itemsSm = elem.options.itemsSm || Math.min(Number(elem.options.itemsMd), Number(2));
          elem.options.itemsXs = elem.options.itemsXs || Math.min(Number(elem.options.itemsSm), Number(1));
          var setResponsiveColumns;

          function getCarouselColumns() {
            switch ($(window).breakpoints("getBreakpoint")) {
              case "xs":
                setResponsiveColumns = Number(elem.options.itemsXs);
                break;
              case "sm":
                setResponsiveColumns = Number(elem.options.itemsSm);
                break;
              case "md":
                setResponsiveColumns = Number(elem.options.itemsMd);
                break;
              case "lg":
                setResponsiveColumns = Number(elem.options.itemsLg);
                break;
              case "xl":
                setResponsiveColumns = Number(elem.options.items);
                break;
            }
          }
          getCarouselColumns();
          var itemWidth;
          elem.find("> *").wrap('<div class="polo-carousel-item">');
          if (elem.hasClass("custom-height")) {
            elem.options.setGallerySize = false;
            INSPIRO.core.customHeight(elem);
            INSPIRO.core.customHeight(elem.find(".polo-carousel-item"));
            var carouselCustomHeightStatus = true;
          }
          if (Number(elem.options.items) !== 1) {
            if (elem.options.autoWidth || carouselCustomHeightStatus) {
              elem.find(".polo-carousel-item").css({
                "padding-right": elem.options.margin + "px"
              })
            } else {
              itemWidth = (elem.options.containerWidth + Number(elem.options.margin)) / setResponsiveColumns;
              elem.find(".polo-carousel-item").css({
                "width": itemWidth,
                "padding-right": elem.options.margin + "px"
              })
            }
          } else {
            elem.find(".polo-carousel-item").css({
              "width": "100%",
              "padding-right": "0 !important;"
            })
          }
          if (elem.options.autoWidth || carouselCustomHeightStatus) {
            elem.options.cellAlign = "center";
          }

          if (elem.options.autoPlay == "false") {
            elem.options.autoPlay = false;
          }

          if (!$.isNumeric(elem.options.autoPlay) && elem.options.autoPlay != false) {
            elem.options.autoPlay = Number(7000);
          }

          //Initializing plugin and passing the options
          var $carouselElem = $(elem);
          $carouselElem.imagesLoaded(function () {
            // init Isotope after all images have loaded
            $carouselElem.flickity({
              cellSelector: elem.options.cellSelector,
              prevNextButtons: elem.options.prevNextButtons,
              pageDots: elem.options.pageDots,
              fade: elem.options.fade,
              draggable: elem.options.draggable,
              freeScroll: elem.options.freeScroll,
              wrapAround: elem.options.wrapAround,
              groupCells: elem.options.groupCells,
              autoPlay: Number(elem.options.autoPlay),
              pauseAutoPlayOnHover: elem.options.pauseAutoPlayOnHover,
              adaptiveHeight: elem.options.adaptiveHeight,
              asNavFor: elem.options.asNavFor,
              initialIndex: elem.options.initialIndex,
              accessibility: elem.options.accessibility,
              setGallerySize: elem.options.setGallerySize,
              resize: elem.options.resize,
              cellAlign: elem.options.cellAlign,
              rightToLeft: elem.options.rightToLeft,
              contain: true
            });
            elem.addClass("carousel-loaded");
          });
          if (elem.hasClass("custom-height")) {
            INSPIRO.core.customHeight(elem);
          }
          if (Number(elem.options.items) !== 1) {
            $(window).on("resize", function () {
              setTimeout(function () {
                getCarouselColumns();
                itemWidth = (elem.width() + Number(elem.options.margin)) / setResponsiveColumns;
                if (elem.options.autoWidth || carouselCustomHeightStatus) {
                  elem.find(".polo-carousel-item").css({
                    "padding-right": elem.options.margin + "px"
                  })
                } else {
                  if (!elem.hasClass("custom-height")) {
                    elem.find(".polo-carousel-item").css({
                      "width": itemWidth,
                      "padding-right": elem.options.margin + "px"
                    })
                  } else {
                    INSPIRO.core.customHeight(elem.find(".polo-carousel-item"));
                    elem.find(".polo-carousel-item").css({
                      "width": itemWidth,
                      "padding-right": elem.options.margin + "px"
                    })
                  }
                }
                elem.find(".flickity-slider").css({
                  "margin-right": -elem.options.margin / setResponsiveColumns + "px"
                })
                elem.flickity("reposition");
              }, 300);
            });
          }
        })
      }
    }
  }
  INSPIRO.elements = {
    functions: function () {
    //  INSPIRO.elements.shapeDivider();
      INSPIRO.elements.naTo();
    //  INSPIRO.elements.morphext();
      INSPIRO.elements.buttons();
      INSPIRO.elements.accordion();
      INSPIRO.elements.animations();
      INSPIRO.elements.parallax();
      INSPIRO.elements.backgroundImage();
      //   INSPIRO.elements.responsiveVideos();
    //  INSPIRO.elements.countdownTimer();
    //  INSPIRO.elements.progressBar();
    //  INSPIRO.elements.pieChart();
    //  INSPIRO.elements.maps();
      INSPIRO.elements.gridLayout();
   //   INSPIRO.elements.tooltip();
    //  INSPIRO.elements.popover();
      INSPIRO.elements.magnificPopup();
    //  INSPIRO.elements.yTPlayer();
    //  INSPIRO.elements.vimeoPlayer();
      INSPIRO.elements.modal();
      INSPIRO.elements.sidebarFixed();
    //  INSPIRO.elements.clipboard();
    //  INSPIRO.elements.bootstrapSwitch();
    //  INSPIRO.elements.countdown();
      INSPIRO.elements.other();
    //  INSPIRO.elements.videoBackground();
    //  INSPIRO.elements.forms();
    //  INSPIRO.elements.formValidation();
    //  INSPIRO.elements.formAjaxProcessing();
      INSPIRO.elements.floatingDiv();
    //  INSPIRO.elements.wizard();
    //  INSPIRO.elements.counters();
    },
   
    floatingDiv: function () {
      var $floatingDiv = $(".floating-div");
      if ($floatingDiv.length > 0) {
        $floatingDiv.each(function () {
          var elem = $(this),
            elemAlign = elem.attr("data-placement") || "bottom",
            elemScrollOffset = elem.attr("data-offset") || 50,
            elemVisible = elem.attr("data-visibile") || "all",
            elemHeight = elem.outerHeight(),
            elemWidth = elem.outerWidth();

          /* if(elemVisible !== "all") {
            
          }else {
            if ($body.hasClass("b--desktop")) {

            }
          } */
          $window.scroll(function () {
            var scrollOffset = $body.attr("data-offset") || 80;
            if ($window.scrollTop() > scrollOffset) {
              elem.css(elemAlign, "20px");
            } else {
              elem.css(elemAlign, -elemHeight + "px");
            }
          });
        });
      }
    },
    other: function (context) {
      //Lazy Load
      var myLazyLoad = new LazyLoad({
        elements_selector: ".lazy",
        class_loaded: "img-loaded"
      });

      if ($(".toggle-item").length > 0) {
        $(".toggle-item").each(function () {
          var elem = $(this),
            toggleItemClass = elem.attr("data-class"),
            toggleItemClassTarget = elem.attr("data-target")
          elem.on("click", function () {
            if (toggleItemClass) {
              if (toggleItemClassTarget) {
                $(toggleItemClassTarget).toggleClass(toggleItemClass)
              } else {
                elem.toggleClass(toggleItemClass)
              }
            }
            elem.toggleClass("toggle-active");
            return false
          })
        })
      }
      /*Dropdown popup invert*/
      var $pDropdown = $(".p-dropdown");
      if ($pDropdown.length > 0) {
        $pDropdown.each(function () {
          var elem = $(this);

          elem.find('> a').on("click", function () {
            elem.toggleClass("dropdown-active");
            return false;
          });


          if ($window.width() / 2 > elem.offset().left) {
            elem.addClass("p-dropdown-invert");
          }
        });
      }

    },
    naTo: function () {
      $("a.scroll-to, #dotsMenu > ul > li > a, .menu-one-page nav > ul > li > a:not([data-lightbox])").on("click", function () {
        var extraPaddingTop = 0,
          extraHeaderHeight = 0
        $(window).breakpoints("lessThan", "lg", function () {
          if (Settings.menuIsOpen) {
            $mainMenuTriggerBtn.trigger("click")
          }
          if ($header.attr("data-responsive-fixed") === true) {
            extraHeaderHeight = $header.height()
          }
        })
        $(window).breakpoints("greaterEqualTo", "lg", function () {
          if ($header.length > 0) {
            extraHeaderHeight = $header.height()
          }
        })
        if ($(".dashboard").length > 0) {
          extraPaddingTop = 30
        }
        var $anchor = $(this)
        $("html, body")
          .stop(true, false)
          .animate({
              scrollTop: $($anchor.attr("href")).offset().top - (extraHeaderHeight + extraPaddingTop)
            },
            1500,
            "easeInOutExpo"
          )
        return false
      })
    },
    
    buttons: function () {
      //Button slide width
      if ($(".btn-slide[data-width]")) {
        $(".btn.btn-slide[data-width]").each(function () {
          var elem = $(this),
            elemWidth = elem.attr("data-width"),
            elemDefaultWidth
          switch (true) {
            case elem.hasClass("btn-lg"):
              elemDefaultWidth = "60"
              break
            case elem.hasClass("btn-sm"):
              elemDefaultWidth = "36"
              break
            case elem.hasClass("btn-xs"):
              elemDefaultWidth = "28"
              break
            default:
              elemDefaultWidth = "48"
              break
          }
          elem.hover(
            function () {
              $(this).css("width", elemWidth + "px")
            },
            function () {
              $(this).css("width", elemDefaultWidth + "px")
            }
          )
        })
      }
    },
    accordion: function () {
      var accordionType = "accordion",
        toogleType = "toggle",
        accordionItem = "ac-item",
        itemActive = "ac-active",
        itemTitle = "ac-title",
        itemContent = "ac-content",
        $accs = $("." + accordionItem)
      $accs.length &&
        ($accs.each(function () {
            var $item = $(this)
            $item.hasClass(itemActive) ? $item.addClass(itemActive) : $item.find("." + itemContent).hide()
          }),
          $("." + itemTitle).on("click", function (e) {
            var $link = $(this),
              $item = $link.parents("." + accordionItem),
              $acc = $item.parents("." + accordionType)
            $item.hasClass(itemActive) ? ($acc.hasClass(toogleType) ? ($item.removeClass(itemActive), $link.next("." + itemContent).slideUp()) : ($acc.find("." + accordionItem).removeClass(itemActive), $acc.find("." + itemContent).slideUp())) : ($acc.hasClass(toogleType) || ($acc.find("." + accordionItem).removeClass(itemActive), $acc.find("." + itemContent).slideUp("fast")), $item.addClass(itemActive), $link.next("." + itemContent).slideToggle("fast")), e.preventDefault()
            return false
          }))
    },
    animations: function () {
      var $animate = $("[data-animate]")
      if ($animate.length > 0) {
        //Check if jQuery Waypoint plugin is loaded
        if (typeof Waypoint === "undefined") {
          INSPIRO.elements.notification("Warning", "jQuery Waypoint plugin is missing in plugins.js file.", "danger")
          return true
        }
        $animate.each(function () {
          var elem = $(this)
          elem.addClass("animated")
          //Plugin Options
          elem.options = {
            animation: elem.attr("data-animate") || "fadeIn",
            delay: elem.attr("data-animate-delay") || 200,
            direction: ~elem.attr("data-animate").indexOf("Out") ? "back" : "forward",
            offsetX: elem.attr("data-animate-offsetX") || 0,
            offsetY: elem.attr("data-animate-offsetY") || -100
          }
          //Initializing jQuery Waypoint plugin and passing the options from data animations attributes
          if (elem.options.direction == "forward") {
            new Waypoint({
              element: elem,
              handler: function () {
                var t = setTimeout(function () {
                  elem.addClass(elem.options.animation + " visible")
                }, elem.options.delay)
                this.destroy()
              },
              offset: "100%"
            })
          } else {
            elem.addClass("visible")
            elem.on("click", function () {
              elem.addClass(elem.options.animation)
              return false
            })
          }
          //Demo play
          if (elem.parents(".demo-play-animations").length) {
            elem.on("click", function () {
              elem.removeClass(elem.options.animation)
              var t = setTimeout(function () {
                elem.addClass(elem.options.animation)
              }, 50)
              return false
            })
          }
        })
      }
    },
    parallax: function () {
      var $parallax = $("[data-bg-parallax]")
      if ($parallax.length > 0) {
        //Check if scrolly plugin is loaded
        if (typeof $.fn.scrolly === "undefined") {
          INSPIRO.elements.notification("Warning", "jQuery scrolly plugin is missing in plugins.js file.", "danger")
          return true
        }
        $parallax.each(function () {
          var $elem = $(this),
            elemImageSrc = $elem.attr("data-bg-parallax"),
            elemImageVelocity = $elem.attr("data-velocity") || "-.140"
          $elem.prepend('<div class="parallax-container" data-bg="' + elemImageSrc + '"  data-velocity="' + elemImageVelocity + '" style="background: url(' + elemImageSrc + ')"></div>')

          var parallaxLazy = new LazyLoad({
            elements_selector: ".parallax-container",
            class_loaded: "img-loaded"
          });

          $elem.find(".parallax-container").scrolly({
            bgParallax: true
          });
        })
      }
    },
    backgroundImage: function () {
      var $backgroundImage = $("[data-bg-image]");

      if ($backgroundImage.length > 0) {
        $backgroundImage.each(function () {
          var $elem = $(this),
            elemImageSrc = $elem.attr("data-bg-image");
          $elem.addClass("lazy-bg");
          $elem.attr("data-bg", elemImageSrc);
        });

        var laazybg = new LazyLoad({
          elements_selector: ".lazy-bg",
          class_loaded: "bg-loaded"
        });

      }
    },
    
    
    gridLayout: function () {
      if ($gridLayout.length > 0) {
        //Check if isotope plugin is loaded
        if (typeof $.fn.isotope === "undefined") {
          INSPIRO.elements.notification("Warning", "jQuery isotope plugin is missing in plugins.js file.", "danger")
          return true
        }

        var isotopeRTL;

        if (INSPIRO.core.rtlStatus() == true) {
          isotopeRTL = false;
        } else {
          isotopeRTL = true;
        }

        $gridLayout.each(function () {
          var elem = $(this)
          elem.options = {
            itemSelector: elem.attr("data-item") || "portfolio-item",
            layoutMode: elem.attr("data-layout") || "masonry",
            filter: elem.attr("data-default-filter") || "*",
            stagger: elem.attr("data-stagger") || 0,
            autoHeight: elem.data("auto-height") == false ? false : true,
            gridMargin: elem.attr("data-margin") || 20,
            gridMarginXs: elem.attr("data-margin-xs"),
            transitionDuration: elem.attr("data-transition") || "0.45s",
            isOriginLeft: isotopeRTL
          }

          $(window).breakpoints("lessThan", "lg", function () {
            elem.options.gridMargin = elem.options.gridMarginXs || elem.options.gridMargin
          })

          elem.css("margin", "0 -" + elem.options.gridMargin + "px -" + elem.options.gridMargin + "px 0")
          elem.find("." + elem.options.itemSelector).css("padding", "0 " + elem.options.gridMargin + "px " + elem.options.gridMargin + "px 0")
          if (elem.attr("data-default-filter")) {
            var elemDefaultFilter = elem.options.filter
            elem.options.filter = "." + elem.options.filter
          }
          elem.append('<div class="grid-loader"></div>');
          var $isotopelayout = $(elem).imagesLoaded(function () {
            // init Isotope after all images have loaded
            $isotopelayout.isotope({
              layoutMode: elem.options.layoutMode,
              transitionDuration: elem.options.transitionDuration,
              stagger: Number(elem.options.stagger),
              resize: true,
              itemSelector: "." + elem.options.itemSelector + ":not(.grid-loader)",
              isOriginLeft: elem.options.isOriginLeft,
              autoHeight: elem.options.autoHeight,
              masonry: {
                columnWidth: elem.find("." + elem.options.itemSelector + ":not(.large-width)")[0]
              },
              filter: elem.options.filter
            })
            elem.remove(".grid-loader").addClass("grid-loaded");
          })

          //Infinity Scroll
          if (elem.next().hasClass("infinite-scroll")) {
            INSPIRO.elements.gridLayoutInfinite(elem, elem.options.itemSelector, elem.options.gridMargin)
          }
          if ($gridFilter.length > 0) {
            $gridFilter.each(function () {
              var elemFilter = $(this),
                $filterItem = elemFilter.find("a"),
                elemFilterLayout = elemFilter.attr("data-layout"),
                $filterItemActiveClass = "active"
              $filterItem.on("click", function () {
                elemFilter.find("li").removeClass($filterItemActiveClass);
                $(this).parent("li").addClass($filterItemActiveClass);

                var filterValue = $(this).attr("data-category");
                $(elemFilterLayout).isotope({
                  filter: filterValue
                }).on("layoutComplete", function () {
                  $window.trigger("scroll");
                  INSPIRO.elements.naTo();
                })
                if ($(".grid-active-title").length > 0) {
                  $(".grid-active-title")
                    .empty()
                    .append($(this).text())
                }
                return false
              })
              if (elemDefaultFilter) {
                var filterDefaultValue = elemFilter.find($('[data-category="' + elem.options.filter + '"]'))
                elemFilter.find("li").removeClass($filterItemActiveClass)
                filterDefaultValue.parent("li").addClass($filterItemActiveClass)
              } else {
                var filterDefaultValue = elemFilter.find($('[data-category="*"]'))
                filterDefaultValue.parent("li").addClass($filterItemActiveClass)
              }
            })
          }
        })
      }
    },
    gridLayoutInfinite: function (element, elementSelector, elemGridMargin) {

      //Check if infiniteScroll plugin is loaded
      if (typeof $.fn.infiniteScroll === 'undefined') {
        INSPIRO.elements.notification("Warning", "jQuery infiniteScroll plugin is missing, please add this code line <b> &lt;script src=&quot;plugins/metafizzy/infinite-scroll.min.js&quot;&gt;&lt;/script&gt;</b>, before <b>plugins.js</b>", "danger");
        return true;
      }
      var elem = element,
        gridItem = elementSelector,
        gridMargin = elemGridMargin,
        loadOnScroll = true,
        threshold = 500,
        prefilli = true,
        pathSelector,
        loadMoreElem = $("#showMore"),
        loadMoreBtn = $("#showMore a.btn"),
        loadMoreBtnText = $("#showMore a.btn").html(),
        loadMoreMessage = $(
          '<div class="infinite-scroll-message"><p class="animated visible fadeIn">No more posts to show</p></div>'
        );

      pathSelector = $(".infinite-scroll > a").attr("href");

      if (pathSelector.indexOf(".html") > -1) {
        pathSelector = pathSelector.replace(/(-\d+)/g, "-{{#}}");
      } else {
        pathSelector = ".infinite-scroll > a";
      }

      if (loadMoreElem.length > 0) {
        loadOnScroll = false;
        threshold = false;
        prefilli = false;
      }

      elem.infiniteScroll({
        path: pathSelector,
        append: '.' + gridItem,
        history: false,
        button: '#showMore a',
        scrollThreshold: threshold,
        loadOnScroll: loadOnScroll,
        prefill: prefilli,
      });

      elem.on('load.infiniteScroll', function (event, response, path, items) {
        var $items = $(response).find('.' + gridItem);
        $items.imagesLoaded(function () {
          elem.append($items);
          elem.isotope('insert', $items);
        });
      });

      elem.on('error.infiniteScroll', function (event, error, path) {
        loadMoreElem.addClass("animated visible fadeOut");
        var t = setTimeout(function () {
          loadMoreElem.hide();
          elem.after(loadMoreMessage);
        }, 500);
        var t = setTimeout(function () {
          $(".infinite-scroll-message").addClass("animated visible fadeOut");
        }, 3000);
      });
      elem.on('append.infiniteScroll', function (event, response, path, items) {
        INSPIRO.slider.carousel($(items).find('.carousel'));
        loadMoreBtn.html(loadMoreBtnText);
        element.css("margin", "0 -" + gridMargin + "px -" + gridMargin + "px 0");
        element.find('.' + gridItem).css("padding", "0 " + gridMargin + "px " + gridMargin + "px 0");
      });
    },

    magnificPopup: function () {
      var $lightbox = $("[data-lightbox]")
      if ($lightbox.length > 0) {
        //Check if magnificPopup plugin is loaded
        if (typeof $.fn.magnificPopup === "undefined") {
          INSPIRO.elements.notification("Warning", "jQuery magnificPopup plugin is missing in plugins.js file.", "danger")
          return true
        }
        //Get lightbox data type
        var getType = {
          image: {
            type: "image",
            closeOnContentClick: true,
            removalDelay: 500,
            image: {
              verticalFit: true
            },
            callbacks: {
              beforeOpen: function () {
                this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim")
                this.st.mainClass = "mfp-zoom-out"
              }
            }
          },
          gallery: {
            delegate: 'a[data-lightbox="gallery-image"], a[data-lightbox="image"]',
            type: "image",
            image: {
              verticalFit: true
            },
            gallery: {
              enabled: true,
              navigateByImgClick: true,
              preload: [0, 1]
            },
            removalDelay: 500,
            callbacks: {
              beforeOpen: function () {
                this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim")
                this.st.mainClass = "mfp-zoom-out"
              }
            }
          },
          iframe: {
            type: "iframe",
            removalDelay: 500,
            callbacks: {
              beforeOpen: function () {
                this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim")
                this.st.mainClass = "mfp-zoom-out"
              }
            }
          },
          ajax: {
            type: "ajax",
            removalDelay: 500,
            callbacks: {
              ajaxContentAdded: function (mfpResponse) {
                INSPIRO.elements.functions();
                INSPIRO.slider.carouselAjax();
              }
            }
          },
          inline: {
            type: "inline",
            removalDelay: 500,
            closeBtnInside: true,
            midClick: true,
            callbacks: {
              beforeOpen: function () {
                this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim")
                this.st.mainClass = "mfp-zoom-out"
              },
              open: function () {
                if ($(this.content).find("video").length > 0) {
                  $(this.content).find("video").get(0).play();
                }
              },
              close: function () {
                if ($(this.content).find("video").length > 0) {
                  $(this.content).find("video").get(0).load();
                }
              }
            },
            fixedContentPos: true,
            overflowY: "scroll"
          }
        }
        //Initializing jQuery magnificPopup plugin and passing the options
        $lightbox.each(function () {
          var elem = $(this),
            elemType = elem.attr("data-lightbox")
          switch (elemType) {
            case "image":
              elem.magnificPopup(getType.image)
              break
            case "gallery":
              elem.magnificPopup(getType.gallery)
              break
            case "iframe":
              elem.magnificPopup(getType.iframe)
              break
            case "ajax":
              elem.magnificPopup(getType.ajax)
              break
            case "inline":
              elem.magnificPopup(getType.inline)
              break
          }
        })
      }
    },
    modal: function () {
      //Check if magnificPopup plugin is loaded
      if (typeof $.fn.magnificPopup === "undefined") {
        INSPIRO.elements.notification("Warning", "jQuery magnificPopup plugin is missing in plugins.js file.", "danger")
        return true
      }
      var $modal = $(".modal"),
        $modalStrip = $(".modal-strip"),
        $btnModal = $(".btn-modal"),
        modalShow = "modal-auto-open",
        modalShowClass = "modal-active",
        modalDecline = $(".modal-close"),
        cookieNotify = $(".cookie-notify"),
        cookieConfirm = cookieNotify.find(".modal-confirm, .mfp-close");

      /*Modal*/
      if ($modal.length > 0) {
        $modal.each(function () {
          var elem = $(this),
            elemDelay = elem.attr("data-delay") || 3000,
            elemCookieExpire = elem.attr("data-cookie-expire") || 365,
            elemCookieName = elem.attr("data-cookie-name") || "cookieModalName2020_3",
            elemCookieEnabled = elem.data("cookie-enabled") == true ? true : false,
            elemModalDismissDelay = elem.attr("data-delay-dismiss")
          /*Modal Auto Show*/
          if (elem.hasClass(modalShow)) {
            var modalElem = $(this)
            var timeout = setTimeout(function () {
              modalElem.addClass(modalShowClass)
            }, elemDelay)
          }
          /*Modal Dissmis Button*/
          elem.find(modalDecline).click(function () {
            elem.removeClass(modalShowClass)
            return false
          });
          /*Modal Auto Show*/
          if (elem.hasClass(modalShow)) {
            if (elemCookieEnabled != true) {
              /*Cookie Notify*/
              var t = setTimeout(function () {
                $.magnificPopup.open({
                    items: {
                      src: elem
                    },
                    type: "inline",
                    closeBtnInside: true,
                    midClick: true,
                    callbacks: {
                      beforeOpen: function () {
                        this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim")
                        this.st.mainClass = "mfp-zoom-out"
                      },
                      open: function () {
                        if ($(this.content).find("video").length > 0) {
                          $(this.content).find("video").get(0).play();
                        }

                      },
                      close: function () {
                        if ($(this.content).find("video").length > 0) {
                          $(this.content).find("video").get(0).load();
                        }
                      }
                    }
                  },
                  0
                )
              }, elemDelay)
            } else {
              if (typeof Cookies.get(elemCookieName) == "undefined") {
                /*Cookie Notify*/
                var t = setTimeout(function () {
                  $.magnificPopup.open({
                      items: {
                        src: elem
                      },
                      type: "inline",
                      closeBtnInside: true,
                      midClick: true,
                      callbacks: {
                        beforeOpen: function () {
                          this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim")
                          this.st.mainClass = "mfp-zoom-out"
                        },
                        open: function () {
                          if ($(this.content).find("video").length > 0) {
                            $(this.content).find("video").get(0).play();
                          }
                          cookieConfirm.click(function () {
                            Cookies.set(elemCookieName, true, {
                              expires: Number(elemCookieExpire)
                            })
                            $.magnificPopup.close();
                            cookieNotify.removeClass(modalShowClass);
                            return false
                          });
                        },
                        close: function () {
                          if ($(this.content).find("video").length > 0) {
                            $(this.content).find("video").get(0).load();
                          };

                          Cookies.set(elemCookieName, true, {
                            expires: Number(elemCookieExpire)
                          })
                        }
                      }
                    },
                    0
                  )
                }, elemDelay)
              }
            }
          }
          /*Modal Dissmis Button*/
          elem.find(modalDecline).click(function () {
            $.magnificPopup.close()
            return false
          })

          if (elemModalDismissDelay) {}
        })
      }
      /*Modal Strip*/
      if ($modalStrip.length > 0) {
        $modalStrip.each(function () {
          var elem = $(this),
            elemDelay = elem.attr("data-delay") || 3000,
            elemCookieExpire = elem.attr("data-cookie-expire") || 365,
            elemCookieName = elem.attr("data-cookie-name") || "cookieName2013",
            elemCookieEnabled = elem.data("cookie-enabled") == true ? true : false,
            elemModalDismissDelay = elem.attr("data-delay-dismiss")
          /*Modal Auto Show*/
          if (elem.hasClass(modalShow)) {
            var modalElem = $(this)
            var timeout = setTimeout(function () {
              modalElem.addClass(modalShowClass)
              if (elemModalDismissDelay) {
                var t = setTimeout(function () {
                  elem.removeClass(modalShowClass)
                }, elemModalDismissDelay)
              }
            }, elemDelay)
          }
          /*Modal Dissmis Button*/
          elem.find(modalDecline).click(function () {
            elem.removeClass(modalShowClass)
            return false
          })
          /*Cookie Notify*/
          if (elem.hasClass("cookie-notify")) {
            var timeout = setTimeout(function () {
              if (elemCookieEnabled != true) {
                cookieNotify.addClass(modalShowClass)
              } else {
                if (typeof Cookies.get(elemCookieName) == "undefined") {
                  cookieNotify.addClass(modalShowClass)
                }
              }
            }, elemDelay)
            cookieConfirm.click(function () {
              Cookies.set(elemCookieName, true, {
                expires: Number(elemCookieExpire)
              })
              $.magnificPopup.close()
              cookieNotify.removeClass(modalShowClass)
              return false
            })
          }
        })
      }
      /*Modal toggles*/
      if ($btnModal.length > 0) {
        $btnModal.each(function () {
          var elem = $(this),
            modalTarget = elem.attr("data-modal")
          elem.click(function () {
            $(modalTarget).toggleClass(modalShowClass, 1000)
            return false
          })
        })
      }
    },
    sidebarFixed: function () {
      if (INSPIRO.core.rtlStatus()) {
        return true
      }
      var $sidebarFixed = $(".sticky-sidebar")
      if ($sidebarFixed.length > 0) {
        //Check if theiaStickySidebar plugin is loaded
        if (typeof $.fn.theiaStickySidebar === "undefined") {
          INSPIRO.elements.notification("Warning", "jQuery theiaStickySidebar plugin is missing in plugins.js file.", "danger")
          return true
        }
        $sidebarFixed.each(function () {
          var elem = $(this)
          elem.options = {
            additionalMarginTop: elem.attr("data-margin-top") || 120,
            additionalMarginBottom: elem.attr("data-margin-bottom") || 50
          }
          //Initialize theiaStickySidebar plugin and passing the options
          elem.theiaStickySidebar({
            additionalMarginTop: Number(elem.options.additionalMarginTop),
            additionalMarginBottom: Number(elem.options.additionalMarginBottom),
            disableOnResponsiveLayouts: true
          })
        })
      }
    },
    
  }
  //Load Functions on document ready
  $(document).ready(function () {
    INSPIRO.core.functions();
    INSPIRO.header.functions();
    INSPIRO.slider.functions();
    INSPIRO.elements.functions();
  })
  //Recall Functions on window scroll
  $window.on("scroll", function () {
    INSPIRO.header.stickyHeader();
    INSPIRO.core.scrollTop();
    INSPIRO.header.dotsMenu();
  })
  //Recall Functions on window resize
  $window.on("resize", function () {
    INSPIRO.header.logoStatus();
    INSPIRO.header.stickyHeader();
  })
})(jQuery)