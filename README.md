# Magento custom options management module
Magento 1.9.2.x custom options manager module

## Description

Module enables dividing large amount of custom options on steps.
Also module has extra features to enable or disable showing option price.
Adds extra field to DB and to product editing with option tooltip text (HTML tags allowed).

<br>
System configuration has options below:
 - set up options qty per step (input);
 - show/hide options price (yes/no dropdown);
 - show/hide options tooltips (yes/no dropdown);
 <br>
 
 On frontend module adds add to cart button in last step.
 If step contains required option(s) and this option(s) not selected
 then this step focused and colored to show user to complete selecting required options.
 If all required option(s) ok, then products adds to cart.
 
 ## Requirements
 jQuery
 
  ## Tests
  Tested on Magento ver. 1.9.2.1 RWD package.
