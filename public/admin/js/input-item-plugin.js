"use strict";
(function($) {
    // NAMESPACE
    var lcd = lcd || {};
    lcd.makeForm = lcd.makeForm || {};
    lcd.makeForm.template = lcd.makeForm.template || {};
    // Default value
    var container = '<div class="lcd-container form-horizontal"><div class="lcd-list"></div></div>';
    var elements = '<div class="form-group"><div class="col-sm-4"><input class="form-control" name="demo[] type="text" /></div></div>';
//    var controll = '<button class="btn lcd_up">Up</button> | <button class="btn lcd_down">Down</button> | <button class="btn lcd_delete">Delete</button>';
    var controll = '<button class="btn lcd_delete">Delete</button>';
    lcd.makeForm.template.default = {
        "elements": elements,
        "container": container,
        "container_id": 'lcd-item',
        "button_add": {
            "active": true,
            "lable": "Add"
        },
        "minRow": "2",
        "maxRow": "10",
        "currentRow": "0",
        "controll": {
            "active": true,
            "action": controll
        },
        "data": {}, // key and value data default at render form
        "mapData": {} // Map name input field with key data default at render form
    };
    // Contain construct function, var,...
    lcd.makeForm.init = function() {
        lcd.makeForm.render();
        lcd.makeForm.events();
    }
    // Render function
    lcd.makeForm.render = function() {
        var self = this;
        var config = lcd.makeForm.config;
        // Make id distinct
        if ($("#" + config.container_id).length) {
            config.container_id += Math.floor(Math.random() * 99999);
        }
        if (!$(config.container_id).length) {
            lcd.makeForm.elm.html(config.container);
            lcd.makeForm.elm.find('.lcd-container').attr('id', config.container_id);
            if (config.button_add.active == true) {
                var button = '<button type="button" class="btn btn-info btn_add_item">' + config.button_add.lable + '</button>';
                lcd.makeForm.elm.append(button);
            }
        }
        // Add config value
        config.itemList = lcd.makeForm.elm.find(".lcd-list").first();
        config.addBtn = lcd.makeForm.elm.find(".btn_add_item").first();
        var defaultData = new Object();
        var dataLength = 0;
        //render base on template
        if (config.data.value) {
            defaultData = config.data.value;
            dataLength = defaultData.length;
        }
        var numberOfRow = config.minRow > dataLength ? config.minRow : dataLength;
        var i = 0;
        // Render element fill data
        if (dataLength > 0) {
            $.each(defaultData, function(key, value) {
                if (i < numberOfRow) {
                    self.renderElement(config, value);
                    i++;
                }
            });
        }
        // Render element null
        for (i; i < numberOfRow; i++) {
            self.renderElement(config);
        }
        // Listen event
        config.addBtn.on('click', function() {
            self.renderElement(config);
        });
    }
    lcd.makeForm.renderElement = function(config, data) {
        var self = this;
        var currentRow = config.itemList.children("div").length;
        //add Row
        if (currentRow < config.maxRow) {
            currentRow++;
            var html = config.elements;
            config.itemList.append(html)
            // Validate button
            self.bindingButtonAdd(config);
            // Get last row
            var lastRow = config.itemList.children("div").last();
            if (lastRow) {
                self.bindingIndexElement(config);
                if (data) {
                    self.bindingElement(lastRow, data);
                }
                if (config.controll.active == true) {
                    lastRow.append(lcd.makeForm.config.controll.action);
                }
            }
        }
    }
    // Binding function
    lcd.makeForm.bindingElement = function(lastRow, data) {
        $.each(data, function(key, value) {
            var mapData = lcd.makeForm.config.mapData;
            if (typeof mapData[key] !== "undefined") {
                key = mapData[key];
            }
            lastRow.find("input[name='" + key + "']").val(value);
        });
    }
    lcd.makeForm.bindingIndexElement = function(config) {
        if (config.itemList.find(".lcd-current-row")) {
            var objCurrentRow = config.itemList.find(".lcd-current-row");
            var number = 1;
            $.each(objCurrentRow, function() {
                $(this).html('Link hình ' + number);
                number++;
            });
        }
    }
    lcd.makeForm.bindingButtonAdd = function(config) {
        var currentRow = config.itemList.children("div").length;
        if (currentRow >= config.maxRow) {
            config.addBtn.prop('disabled', true);
        } else {
            config.addBtn.prop('disabled', false);
        }
    }
    // Event function
    lcd.makeForm.events = function() {
        var self = this;
        var config = lcd.makeForm.config;
        var id = "#" + config.container_id;
        // Delete element
        $(id).on("click", ".lcd_delete", function() {
            $(this).parent().remove();
            self.bindingIndexElement(config);
            // Validate button
            self.bindingButtonAdd(config);
        });
        // Move up element
        $(id).on("click", ".lcd_up", function() {
            $(this).parent().insertBefore($(this).parent().prev());
            self.bindingIndexElement(config);
        });
        // Move down element
        $(id).on("click", ".lcd_down", function() {
            $(this).parent().insertAfter($(this).parent().next());
            self.bindingIndexElement(config);
        });
    }
    $.fn.makeInputForm = function(opts) {
        // OBJECT
        lcd.makeForm.elm = this;
        lcd.makeForm.config = jQuery.extend({}, lcd.makeForm.template.default, opts);
        lcd.makeForm.init();
    }
})(jQuery);
