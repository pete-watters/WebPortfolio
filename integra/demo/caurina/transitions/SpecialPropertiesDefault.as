/**
 * SpecialPropertiesDefault
 * List of default special property modifiers for the Tweener class
 * The function names are strange/inverted because it makes for easier debugging (alphabetic order). They're only for internal use (on this class) anyways.
 *
 * @author		Zeh Fernando, Nate Chatellier
 * @version		1.0.2
 */

import caurina.transitions.Tweener;
import caurina.transitions.AuxFunctions;
import flash.filters.BitmapFilter;
import flash.filters.BlurFilter;

class caurina.transitions.SpecialPropertiesDefault {

	/**
	 * There's no constructor.
	 */
	public function SpecialPropertiesDefault () {
		trace ("SpecialProperties is an static class and should not be instantiated.")
	}

	/**
	 * Registers all the modifiers to the Tweener class, so the Tweener knows what to do with them.
	 */
	public static function init():Void {

		// Normal properties
		Tweener.registerSpecialProperty("_frame", _frame_get, _frame_set);
		Tweener.registerSpecialProperty("_sound_volume", _sound_volume_get, _sound_volume_set);
		Tweener.registerSpecialProperty("_sound_pan", _sound_pan_get, _sound_pan_set);
		Tweener.registerSpecialProperty("_color_ra", _color_property_get, _color_property_set, ["ra"]);
		Tweener.registerSpecialProperty("_color_rb", _color_property_get, _color_property_set, ["rb"]);
		Tweener.registerSpecialProperty("_color_ga", _color_property_get, _color_property_set, ["ga"]);
		Tweener.registerSpecialProperty("_color_gb", _color_property_get, _color_property_set, ["gb"]);
		Tweener.registerSpecialProperty("_color_ba", _color_property_get, _color_property_set, ["ba"]);
		Tweener.registerSpecialProperty("_color_bb", _color_property_get, _color_property_set, ["bb"]);
		Tweener.registerSpecialProperty("_color_aa", _color_property_get, _color_property_set, ["aa"]);
		Tweener.registerSpecialProperty("_color_ab", _color_property_get, _color_property_set, ["ab"]);
		Tweener.registerSpecialProperty("_autoAlpha", _autoAlpha_get, _autoAlpha_set);

		// Normal splitter properties
		Tweener.registerSpecialPropertySplitter("_color", _color_splitter);
		Tweener.registerSpecialPropertySplitter("_colorTransform", _colorTransform_splitter);

		// Filter tweening properties - BlurFilter
		Tweener.registerSpecialProperty("_blur_blurX", _filter_property_get, _filter_property_set, [BlurFilter, "blurX"]);
		Tweener.registerSpecialProperty("_blur_blurY", _filter_property_get, _filter_property_set, [BlurFilter, "blurY"]);
		Tweener.registerSpecialProperty("_blur_quality", _filter_property_get, _filter_property_set, [BlurFilter, "quality"]);

		// Filter tweening splitter properties
		Tweener.registerSpecialPropertySplitter("_filter", _filter_splitter);
	}

	// ----------------------------------------------------------------------------------------------------------------------------------
	// filters

	/**
	 * (filters)
	 * Generic function for the properties of filter objects
	 */
	public static function _filter_property_get (p_obj:Object, p_parameters:Array):Number {
		var f:Array = p_obj.filters;
		var i:Number;
		var filterClass:Object = p_parameters[0];
		var propertyName:String = p_parameters[1];
		for (i = 0; i < f.length; i++) {
			if (f[i] instanceof filterClass) return (f[i][propertyName]);
		}
		
		// No value found for this property - no filter instance found using this class!
		// Must return default desired values
		var defaultValues:Object;
		switch (filterClass) {
			case BlurFilter:
				defaultValues = {blurX:0, blurY:0, quality:NaN};
				break;
		}
		// When returning NaN, the Tweener engine sets the starting value as being the same as the final value
		// When returning null, the Tweener engine doesn't tween it at all, just setting it to the final value
		return defaultValues[propertyName];
	}

	public static function _filter_property_set (p_obj:Object, p_value:Number, p_parameters:Array):Void {
		var f:Array = p_obj.filters;
		var i:Number;
		var filterClass:Object = p_parameters[0];
		var propertyName:String = p_parameters[1];
		for (i = 0; i < f.length; i++) {
			if (f[i] instanceof filterClass) {
				f[i][propertyName] = p_value;
				p_obj.filters = f;
				return;
			}
		}

		// The correct filter class wasn't found - create a new one
		if (f == undefined) f = new Array();
		var fi:BitmapFilter;
		switch (filterClass) {
			case BlurFilter:
				fi = new BlurFilter(0, 0);
				break;
		}
		fi[propertyName] = p_value;
		f.push(fi);
		p_obj.filters = f;
	}

	/**
	 * Splits the _filter, _blur, etc parameter into specific filter variables
	 *
	 * @param		p_value				BitmapFilter	A BitmapFilter instance
	 * @return							Array			An array containing the .name and .value of all new properties
	 */
	public static function _filter_splitter (p_value:BitmapFilter):Array {
		var nArray:Array = new Array();
		if (p_value instanceof BlurFilter) {
			nArray.push({name:"_blur_blurX",		value:BlurFilter(p_value).blurX});
			nArray.push({name:"_blur_blurY",		value:BlurFilter(p_value).blurY});
			nArray.push({name:"_blur_quality",		value:BlurFilter(p_value).quality});
		} else {
			// ?
			trace ("??");
		}
		return nArray;
	}


	// ==================================================================================================================================
	// PROPERTY GROUPING/SPLITTING functions --------------------------------------------------------------------------------------------

	// ----------------------------------------------------------------------------------------------------------------------------------
	// _color

	/**
	 * Splits the _color parameter into specific color variables
	 *
	 * @param		p_value				Number		The original _color value
	 * @return							Array		An array containing the .name and .value of all new properties
	 */
	public static function _color_splitter (p_value):Array {
		var nArray:Array = new Array();
		if (p_value == null) {
			// No parameter passed, so just resets the color
			nArray.push({name:"_color_ra", value:100});
			nArray.push({name:"_color_rb", value:0});
			nArray.push({name:"_color_ga", value:100});
			nArray.push({name:"_color_gb", value:0});
			nArray.push({name:"_color_ba", value:100});
			nArray.push({name:"_color_bb", value:0});
		} else {
			// A color tinting is passed, so converts it to the object values
			nArray.push({name:"_color_ra", value:0});
			nArray.push({name:"_color_rb", value:AuxFunctions.numberToR(p_value)});
			nArray.push({name:"_color_ga", value:0});
			nArray.push({name:"_color_gb", value:AuxFunctions.numberToG(p_value)});
			nArray.push({name:"_color_ba", value:0});
			nArray.push({name:"_color_bb", value:AuxFunctions.numberToB(p_value)});
		}
		return nArray;
	}

	// ----------------------------------------------------------------------------------------------------------------------------------
	// _colorTransform

	/**
	 * Splits the _colorTransform parameter into specific color variables
	 *
	 * @param		p_value				Number		The original _colorTransform value
	 * @return							Array		An array containing the .name and .value of all new properties
	 */
	public static function _colorTransform_splitter (p_value:Object):Array {
		var nArray:Array = new Array();
		if (p_value == null) {
			// No parameter passed, so just resets the color
			nArray.push({name:"_color_ra", value:100});
			nArray.push({name:"_color_rb", value:0});
			nArray.push({name:"_color_ga", value:100});
			nArray.push({name:"_color_gb", value:0});
			nArray.push({name:"_color_ba", value:100});
			nArray.push({name:"_color_bb", value:0});
		} else {
			// A color tinting is passed, so converts it to the object values
			if (p_value.ra != undefined) nArray.push({name:"_color_ra", value:p_value.ra});
			if (p_value.rb != undefined) nArray.push({name:"_color_rb", value:p_value.rb});
			if (p_value.ga != undefined) nArray.push({name:"_color_ba", value:p_value.ba});
			if (p_value.gb != undefined) nArray.push({name:"_color_bb", value:p_value.bb});
			if (p_value.ba != undefined) nArray.push({name:"_color_ga", value:p_value.ga});
			if (p_value.bb != undefined) nArray.push({name:"_color_gb", value:p_value.gb});
			if (p_value.aa != undefined) nArray.push({name:"_color_aa", value:p_value.aa});
			if (p_value.ab != undefined) nArray.push({name:"_color_ab", value:p_value.ab});
		}
		return nArray;
	}

	// ==================================================================================================================================
	// PROPERTY MODIFICATION functions --------------------------------------------------------------------------------------------------

	// ----------------------------------------------------------------------------------------------------------------------------------
	// _frame

	/**
	 * Returns the current frame number from the movieclip timeline
	 *
	 * @param		p_obj				Object		MovieClip object
	 * @return							Number		The current frame
	 */
	public static function _frame_get (p_obj:Object):Number {
		return p_obj._currentFrame;
	}

	/**
	 * Sets the timeline frame
	 *
	 * @param		p_obj				Object		MovieClip object
	 * @param		p_value				Number		New frame number
	 */
	public static function _frame_set (p_obj:Object, p_value:Number):Void {
		p_obj.gotoAndStop(Math.round(p_value));
	}

	
	// ----------------------------------------------------------------------------------------------------------------------------------
	// _sound_volume

	/**
	 * Returns the current sound volume
	 *
	 * @param		p_obj				Object		Sound object
	 * @return							Number		The current volume
	 */
	public static function _sound_volume_get (p_obj:Object):Number {
		return p_obj.getVolume();
	}

	/**
	 * Sets the sound volume
	 *
	 * @param		p_obj				Object		Sound object
	 * @param		p_value				Number		New volume
	 */
	public static function _sound_volume_set (p_obj:Object, p_value:Number):Void {
		p_obj.setVolume(p_value);
	}


	// ----------------------------------------------------------------------------------------------------------------------------------
	// _sound_pan

	/**
	 * Returns the current sound pan
	 *
	 * @param		p_obj				Object		Sound object
	 * @return							Number		The current pan
	 */
	public static function _sound_pan_get (p_obj:Object):Number {
		return p_obj.getPan();
	}

	/**
	 * Sets the sound volume
	 *
	 * @param		p_obj				Object		Sound object
	 * @param		p_value				Number		New pan
	 */
	public static function _sound_pan_set (p_obj:Object, p_value:Number):Void {
		p_obj.setPan(p_value);
	}


	// ----------------------------------------------------------------------------------------------------------------------------------
	// _color_*

	/**
	 * _color_*
	 * Generic function for the ra/rb/ga/gb/ba/bb/aa/ab components of the colorTransform object
	 */
	public static function _color_property_get (p_obj:Object, p_parameters:Array):Number {
		return (new Color(p_obj)).getTransform()[p_parameters[0]];
	}
	public static function _color_property_set (p_obj:Object, p_value:Number, p_parameters:Array):Void {
		var cfObj:Object = new Object();
		cfObj[p_parameters[0]] = Math.round(p_value);
		(new Color(p_obj)).setTransform(cfObj);
	}

	// ----------------------------------------------------------------------------------------------------------------------------------
	// _autoAlpha

	/**
	 * Returns the current alpha
	 *
	 * @param		p_obj				Object		MovieClip or Textfield object
	 * @return							Number		The current alpha
	 */
	public static function _autoAlpha_get (p_obj:Object):Number {
		return p_obj._alpha;
	}

	/**
	 * Sets the current autoAlpha 
	 *
	 * @param		p_obj				Object		MovieClip or Textfield object
	 * @param		p_value				Number		New alpha
	 */
	public static function _autoAlpha_set (p_obj:Object, p_value:Number):Void {
		p_obj._alpha = p_value;
		p_obj._visible = p_value > 0;
	}
}
