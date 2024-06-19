Type.registerNamespace("Sys.Extended.UI"),Sys.Extended.UI.ColorPickerBehavior=function(e){Sys.Extended.UI.ColorPickerBehavior.initializeBase(this,[e]),this._textbox=Sys.Extended.UI.TextBoxWrapper.get_Wrapper(e),this._button=null,this._sample=null,this._cssClass="ajax__colorPicker",this._popupPosition=Sys.Extended.UI.PositioningMode.BottomLeft,this._paletteStyle=Sys.Extended.UI.ColorPickerPaletteStyle.Default,this._selectedColor=null,this._enabled=!0,this._selectedColorChanging=!1,this._popupMouseDown=!1,this._isOpen=!1,this._blur=new Sys.Extended.UI.DeferredOperation(1,this,this._doBlur),this._popupBehavior=null,this._container=null,this._popupDiv=null,this._colorsTable=null,this._colorsBody=null,this._button$delegates={click:Function.createDelegate(this,this._button_onclick),keypress:Function.createDelegate(this,this._button_onkeypress),blur:Function.createDelegate(this,this._button_onblur)},this._element$delegates={change:Function.createDelegate(this,this._element_onchange),keypress:Function.createDelegate(this,this._element_onkeypress),click:Function.createDelegate(this,this._element_onclick),focus:Function.createDelegate(this,this._element_onfocus),blur:Function.createDelegate(this,this._element_onblur)},this._popup$delegates={mousedown:Function.createDelegate(this,this._popup_onmousedown),mouseup:Function.createDelegate(this,this._popup_onmouseup),drag:Function.createDelegate(this,this._popup_onevent),dragstart:Function.createDelegate(this,this._popup_onevent),select:Function.createDelegate(this,this._popup_onevent)},this._cell$delegates={mouseover:Function.createDelegate(this,this._cell_onmouseover),mouseout:Function.createDelegate(this,this._cell_onmouseout),click:Function.createDelegate(this,this._cell_onclick)}},Sys.Extended.UI.ColorPickerBehavior.prototype={initialize:function(){Sys.Extended.UI.ColorPickerBehavior.callBaseMethod(this,"initialize"),Sys.Extended.UI.ColorPickerBehavior._colorRegex||(Sys.Extended.UI.ColorPickerBehavior._colorRegex=new RegExp("^[A-Fa-f0-9]{6}$"));var e=this.get_element();$addHandlers(e,this._element$delegates),this._button&&$addHandlers(this._button,this._button$delegates);var t=this.get_selectedColor();t&&this.set_selectedColor(t),this._restoreSample()},dispose:function(){if(this._sample=null,this._button&&($clearHandlers(this._button),this._button=null),this._popupBehavior&&(this._popupBehavior.dispose(),this._popupBehavior=null),this._container&&(this._container.parentNode&&this._container.parentNode.removeChild(this._container),this._container=null),this._popupDiv&&($clearHandlers(this._popupDiv),this._popupDiv=null),this._colorsBody){for(var e=0;e<this._colorsBody.rows.length;e++)for(var t=this._colorsBody.rows[e],o=0;o<t.cells.length;o++)$clearHandlers(t.cells[o].firstChild);this._colorsBody=null}this._colorsTable=null;var i=this.get_element();i&&$clearHandlers(i),Sys.Extended.UI.ColorPickerBehavior.callBaseMethod(this,"dispose")},get_button:function(){return this._button},set_button:function(e){this._button!==e&&(this._button&&this.get_isInitialized()&&$common.removeHandlers(this._button,this._button$delegates),this._button=e,this._button&&this.get_isInitialized()&&$addHandlers(this._button,this._button$delegates),this.raisePropertyChanged("button"))},get_sample:function(){return this._sample},set_sample:function(e){this._sample!==e&&(this._sample=e,this.raisePropertyChanged("sample"))},get_selectedColor:function(){if(null===this._selectedColor){var e=this._textbox.get_Value();this._validate(e)&&(this._selectedColor=e)}return this._selectedColor},set_selectedColor:function(e){this._selectedColor!==e&&this._validate(e)&&(this._selectedColor=e,this._selectedColorChanging=!0,e!==this._textbox.get_Value()&&this._textbox.set_Value(e),this._showSample(e),this._selectedColorChanging=!1,this.raisePropertyChanged("selectedColor"))},get_enabled:function(){return this._enabled},set_enabled:function(e){this._enabled!==e&&(this._enabled=e,this.raisePropertyChanged("enabled"))},get_popupPosition:function(){return this._popupPosition},set_popupPosition:function(e){this._popupPosition!==e&&(this._popupPosition=e,this.raisePropertyChanged("popupPosition"))},get_paletteStyle:function(){return this._paletteStyle},set_paletteStyle:function(e){this._paletteStyle!==e&&(this._paletteStyle=e,this.raisePropertyChanged("paletteStyle"))},add_colorSelectionChanged:function(e){this.get_events().addHandler("colorSelectionChanged",e)},remove_colorSelectionChanged:function(e){this.get_events().removeHandler("colorSelectionChanged",e)},raise_colorSelectionChanged:function(){var e=this.get_events().getHandler("colorSelectionChanged");e&&e(this,Sys.EventArgs.Empty)},raiseColorSelectionChanged:function(){Sys.Extended.Deprecated("raiseColorSelectionChanged","raise_colorSelectionChanged"),this.raise_colorSelectionChanged()},add_showing:function(e){this.get_events().addHandler("showing",e)},remove_showing:function(e){this.get_events().removeHandler("showing",e)},raise_showing:function(e){var t=this.get_events().getHandler("showing");t&&t(this,e)},raiseShowing:function(e){Sys.Extended.Deprecated("raiseShowing","raise_showing"),this.raise_showing(e)},add_shown:function(e){this.get_events().addHandler("shown",e)},remove_shown:function(e){this.get_events().removeHandler("shown",e)},raise_shown:function(){var e=this.get_events().getHandler("shown");e&&e(this,Sys.EventArgs.Empty)},raiseShown:function(){Sys.Extended.Deprecated("raiseShown","raise_shown"),this.raise_shown()},add_hiding:function(e){this.get_events().addHandler("hiding",e)},remove_hiding:function(e){this.get_events().removeHandler("hiding",e)},raise_hiding:function(e){var t=this.get_events().getHandler("hiding");t&&t(this,e)},raiseHiding:function(e){Sys.Extended.Deprecated("raiseHiding","raise_hiding"),this.raise_hiding(e)},add_hidden:function(e){this.get_events().addHandler("hidden",e)},remove_hidden:function(e){this.get_events().removeHandler("hidden",e)},raise_hidden:function(){var e=this.get_events().getHandler("hidden");e&&e(this,Sys.EventArgs.Empty)},raiseHidden:function(){Sys.Extended.Deprecated("raiseHidden","raise_hidden"),this.raise_hidden()},show:function(){if(this._ensureColorPicker(),!this._isOpen){var e=new Sys.CancelEventArgs;if(this.raise_showing(e),e.get_cancel())return;this._isOpen=!0,this._popupBehavior.show(),this.raise_shown()}},hide:function(){if(this._isOpen){var e=new Sys.CancelEventArgs;if(this.raise_hiding(e),e.get_cancel())return;this._container&&this._popupBehavior.hide(),this._isOpen=!1,this.raise_hidden(),this._popupMouseDown=!1}},_focus:function(){this._button?this._button.focus():this.get_element().focus()},_doBlur:function(e){e||Sys.Browser.agent!==Sys.Browser.Opera?(this._popupMouseDown||this.hide(),this._popupMouseDown=!1):this._blur.post(!0)},_buildColorPicker:function(){var e=this.get_element(),t=this.get_id();this._container=$common.createElementFromTemplate({nodeName:"div",properties:{id:t+"_container"},cssClasses:[this._cssClass]},e.parentNode),this._popupDiv=$common.createElementFromTemplate({nodeName:"div",events:this._popup$delegates,properties:{id:t+"_popupDiv"},cssClasses:["ajax__colorPicker_container"],visible:!1},this._container)},_buildColors:function(){var e=this.get_id();switch(this._colorsTable=$common.createElementFromTemplate({nodeName:"table",properties:{id:e+"_colorsTable",style:{margin:"auto"}}},this._popupDiv),this._colorsBody=$common.createElementFromTemplate({nodeName:"tbody",properties:{id:e+"_colorsBody"}},this._colorsTable),this._paletteStyle){case Sys.Extended.UI.ColorPickerPaletteStyle.Default:for(var t,o=["00","99","33","66","FF","CC"],i=o.length,s=0;s<i;s++)for(var n=$common.createElementFromTemplate({nodeName:"tr"},this._colorsBody),r=0;r<i;r++){3===r&&(n=$common.createElementFromTemplate({nodeName:"tr"},this._colorsBody));for(var l=0;l<i;l++)t=o[s]+o[r]+o[l],this._createColorCell(t,n)}break;case Sys.Extended.UI.ColorPickerPaletteStyle.Continuous:for(var a=100/12,i=0;i<=100;i+=a)for(var n=$common.createElementFromTemplate({nodeName:"tr"},this._colorsBody),h=0;h<360;h+=20)o=this._hslToRgb(h/360,1,i/100),t=this._rgbToHex(o[0],o[1],o[2]),this._createColorCell(t,n)}},_rgbToHex:function(e,t,o){function i(e){var t=e.toString(16);return e<16?"0"+t:t}return i(e)+i(t)+i(o)},_hslToRgb:function(e,t,o){var i=o<.5?o*(1+t):o+t-o*t,s=2*o-i,n=this._hue2rgb(s,i,e+1/3),r=this._hue2rgb(s,i,e),l=this._hue2rgb(s,i,e-1/3);return[Math.round(255*n),Math.round(255*r),Math.round(255*l)]},_hue2rgb:function(e,t,o){return o<0&&(o+=1),o>1&&(o-=1),o<1/6?e+6*(t-e)*o:o<.5?t:o<2/3?e+(t-e)*(2/3-o)*6:e},_createColorCell:function(e,t){var o="#"+e,i=$common.createElementFromTemplate({nodeName:"td"},t);$common.createElementFromTemplate({nodeName:"div",properties:{color:e,title:o,style:{backgroundColor:o},innerHTML:"&nbsp;"},events:this._cell$delegates},i)},_ensureColorPicker:function(){if(!this._container){var e=this.get_element();this._buildColorPicker(),this._buildColors(),this._popupBehavior=new $create(Sys.Extended.UI.PopupBehavior,{parentElement:e},{},{},this._popupDiv),this._popupBehavior.set_positioningMode(this._popupPosition)}},_showSample:function(e){if(this._sample){var t="";e&&(t="#"+e),this._sample.style.backgroundColor=t}},_restoreSample:function(){this._showSample(this._selectedColor)},_validate:function(e){return e&&Sys.Extended.UI.ColorPickerBehavior._colorRegex.test(e)},_element_onfocus:function(e){this._enabled&&(this._button||(this.show(),this._popupMouseDown=!1))},_element_onblur:function(e){this._enabled&&(this._button||this._doBlur())},_element_onchange:function(e){if(!this._selectedColorChanging){var t=this._textbox.get_Value();(this._validate(t)||""===t)&&(this._selectedColor=t,this._restoreSample())}},_element_onkeypress:function(e){this._enabled&&(this._button||e.charCode!==Sys.UI.Key.esc||(e.stopPropagation(),e.preventDefault(),this.hide()))},_element_onclick:function(e){this._enabled&&(this._button||(this.show(),this._popupMouseDown=!1))},_popup_onevent:function(e){e.stopPropagation(),e.preventDefault()},_popup_onmousedown:function(e){this._popupMouseDown=!0},_popup_onmouseup:function(e){Sys.Browser.agent===Sys.Browser.Opera&&this._blur.get_isPending()&&this._blur.cancel(),this._popupMouseDown=!1,this._focus()},_cell_onmouseover:function(e){e.stopPropagation();var t=e.target;this._showSample(t.color)},_cell_onmouseout:function(e){e.stopPropagation(),this._restoreSample()},_cell_onclick:function(e){if(e.stopPropagation(),e.preventDefault(),this._enabled){var t=e.target;this.set_selectedColor(t.color),this._blur.post(!0),this.raise_colorSelectionChanged()}},_button_onclick:function(e){e.preventDefault(),e.stopPropagation(),this._enabled&&(this._isOpen?this.hide():this.show(),this._focus(),this._popupMouseDown=!1)},_button_onblur:function(e){this._enabled&&(this._popupMouseDown||this.hide(),this._popupMouseDown=!1)},_button_onkeypress:function(e){this._enabled&&(e.charCode===Sys.UI.Key.esc&&(e.stopPropagation(),e.preventDefault(),this.hide()),this._popupMouseDown=!1)}},Sys.Extended.UI.ColorPickerBehavior.registerClass("Sys.Extended.UI.ColorPickerBehavior",Sys.Extended.UI.BehaviorBase),Sys.Extended.UI.ColorPickerPaletteStyle={Default:0,Continuous:1};