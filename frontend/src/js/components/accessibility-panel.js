import $ from "../vendors/jquery.min";

const PANEL_IDS = {
    toggleContrast: '#toggleContrast',
    fontLarger: '#fontLarger',
    fontSmaller: '#fontSmaller',
    hideAccessibilityPanel: '#hideAccessibilityPanel',
    showAccessibilityPanel: '#showAccessibilityPanel',
    accessibilityPanel:'#accessibilityPanel'
}

const DEFAULT_FONT_SIZE = 1;



$(document).ready(function() {
    $(PANEL_IDS.toggleContrast).click(function() {
      $('body').toggleClass('high-contrast');
      $('img').hide();
    });

  
    let fontSize = 1;
    $(PANEL_IDS.fontLarger).click(function() {
      if (fontSize < 2.2) {
        fontSize += 0.2;
        $('body').css('font-size', fontSize + 'em');
      }
    });
  
    $(PANEL_IDS.fontSmaller).click(function() {
      if (fontSize > DEFAULT_FONT_SIZE) {
        fontSize -= 0.2;
        $('body').css('font-size', fontSize + 'em');
      }
    });

    $(PANEL_IDS.showAccessibilityPanel).click(function() {
      $(PANEL_IDS.accessibilityPanel).show();
      $('body').css('margin-top', 40);
    });

    $(PANEL_IDS.hideAccessibilityPanel).click(function() {
        $(PANEL_IDS.accessibilityPanel).hide();
        $('body').css('font-size', DEFAULT_FONT_SIZE + 'em');
        $('body').removeClass('high-contrast');
        $('body').css('margin-top', 0);
      });
  });
