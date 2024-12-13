const PANEL_IDS = {
  fontDefault: ".fontDefault",
  fontMedium: ".fontMedium",
  fontLarge: ".fontLarge",
  hideAccessibilityPanel: "#hideAccessibilityPanel",
  showAccessibilityPanel: "#showAccessibilityPanel",
  accessibilityPanel: "#accessibilityPanel",

  contrastColorsBlue: ".contrastColorsBlue",
  contrastColorsBlack: ".contrastColorsBlack",
  contrastColorsYellow: ".contrastColorsYellow"
};

const DEFAULT_FONT_SIZE = 1;
const MEDIUM_FONT_SIZE = 1.25;
const LARGE_FONT_SIZE = 1.5;

$(document).ready(function () {
  const savedFontSize = localStorage.getItem("accessibilityFontSize");
  const savedContrast = localStorage.getItem("accessibilityContrast");
  const isPanelOpen = localStorage.getItem("accessibilityPanelOpen") === "true";
   
  if (isPanelOpen) {
    openAccessibilityPanel();
  } else {
    closeAccessibilityPanel();
  }

  if (savedFontSize) {
    applyFontSize(savedFontSize);
  } else {
    $(PANEL_IDS.fontDefault).trigger("click");
  }

  if (savedContrast) {
    applyContrast(savedContrast);
  } else {
    $(PANEL_IDS.contrastColorsBlue).trigger("click");
  }

  $(PANEL_IDS.contrastColorsBlue).click(function () {
    applyContrast("blue-contrast");
  });

  $(PANEL_IDS.contrastColorsBlack).click(function () {
    applyContrast("black-contrast");
  });

  $(PANEL_IDS.contrastColorsYellow).click(function () {
    applyContrast("yellow-contrast");
  });

  $(PANEL_IDS.fontDefault).click(function () {
    applyFontSize(DEFAULT_FONT_SIZE);
  });

  $(PANEL_IDS.fontMedium).click(function () {
    applyFontSize(MEDIUM_FONT_SIZE);
  });

  $(PANEL_IDS.fontLarge).click(function () {
    applyFontSize(LARGE_FONT_SIZE);
  });

  $(PANEL_IDS.showAccessibilityPanel).click(function () {
    openAccessibilityPanel();
  });

  $(PANEL_IDS.hideAccessibilityPanel).click(function () {
    closeAccessibilityPanel();
  });

  function applyFontSize(fontSize) {
    $("html").css("font-size", `${fontSize}rem`);
    localStorage.setItem("accessibilityFontSize", fontSize);
    updateActiveButton(getFontButtonSelector(fontSize));
  }

  function applyContrast(contrastClass) {
    $("body")
      .removeClass("blue-contrast black-contrast yellow-contrast")
      .addClass(contrastClass);
    localStorage.setItem("accessibilityContrast", contrastClass);
    updateActiveContrastButton(getContrastButtonSelector(contrastClass));
  }

  function openAccessibilityPanel() {
    $(PANEL_IDS.accessibilityPanel).slideDown();
    $("body").css("margin-top", 100);
    $("body").addClass("accessibility");
    localStorage.setItem("accessibilityPanelOpen", "true");
  }

  function closeAccessibilityPanel() {
    $(PANEL_IDS.accessibilityPanel).slideUp();
    $("body").removeClass(
      "accessibility blue-contrast black-contrast yellow-contrast"
    );
    $("html").css("font-size", `${DEFAULT_FONT_SIZE}rem`);
    $("body").css("margin-top", 0);
    $("img").show();
    localStorage.setItem("accessibilityPanelOpen", "false");
  }

  function getFontButtonSelector(fontSize) {
    switch (parseFloat(fontSize)) {
      case MEDIUM_FONT_SIZE:
        return PANEL_IDS.fontMedium;
      case LARGE_FONT_SIZE:
        return PANEL_IDS.fontLarge;
      default:
        return PANEL_IDS.fontDefault;
    }
  }

  function getContrastButtonSelector(contrastClass) {
    switch (contrastClass) {
      case "black-contrast":
        return PANEL_IDS.contrastColorsBlack;
      case "yellow-contrast":
        return PANEL_IDS.contrastColorsYellow;
      default:
        return PANEL_IDS.contrastColorsBlue;
    }
  }

  function updateActiveButton(activeButton) {
    $(".fontSizes div").removeClass("selected");
    $(activeButton).addClass("selected");
  }

  function updateActiveContrastButton(activeButton) {
    $(".contrastColors div").removeClass("selected");
    $(activeButton).addClass("selected");
  }
});
