﻿package com.gfx {
	
	import flash.display.BitmapData;
	import flash.geom.Point;
	import flash.filters.DisplacementMapFilter;
	import flash.filters.BlurFilter;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.display.DisplayObject;
	import flash.display.Bitmap;
	import flash.events.*;
	
	public class PerlinDistort extends MovieClip {
	
		private var baseX:Number = 100;
		private var baseY:Number = 100;	
		private const _zeroPoint:Point = new Point(0,0);
		private const _rndCount:Number = Math.random() * 25;
		private var _nx:int;
		private var _ny:int;
		private var p1:Point = new Point(55, 34);
		private var p2:Point = new Point(20, 33);
		private var perlinOffset:Array = new Array(p1, p2);
		private var bF:BlurFilter = new BlurFilter(2,2,3);
		private var blurMod:Number = 0.25;
		private var nXScale:int;
		private var nYScale:int;
		private var bmp:BitmapData
		private var _theTarget:DisplayObject;
		private var _initialized:Boolean = false;
		
		public function PerlinDistort(_target,xscale:int,yscale:int) {
			_theTarget = _target;
			nXScale = _nx = xscale;
			nYScale = _ny = yscale;
			init();
		};
		
		private function init():void {
			bmp = new BitmapData(_theTarget.width+100,_theTarget.height+100,false);
			bmp.draw(_theTarget);
			_initialized = true;
		};
		
		public function start_noise():void {
			_theTarget.addEventListener(Event.ENTER_FRAME,noiseOn);
		};
		
		public function end_noise():void {
			_theTarget.addEventListener(Event.ENTER_FRAME,noiseOff);
		};
		
		public function noise_reset():void {
			nXScale = _nx;
			nYScale = _ny;
			perlinOffset[0].x=55;
			perlinOffset[0].y=34;
			perlinOffset[1].x=20;
			perlinOffset[1].y=33;
			bF.blurX = 2;
			bF.blurY = 2;			
		};
		
		private function noiseOn(e:Event):void {
			bF.blurX += blurMod;
			bF.blurY += blurMod;
			perlinOffset[0].y-=8;
			perlinOffset[0].x-=5;
			perlinOffset[1].x+=8;
			perlinOffset[1].y+=5;
			bmp.perlinNoise(baseX, baseY, 3, _rndCount, false, true, 1, true, perlinOffset);
			var dmf = new DisplacementMapFilter(bmp,_zeroPoint, 1, 1, nXScale, nYScale, "color", 0xFFFFFF, 0);
			e.target.filters = [dmf,bF];
			e.target.alpha -= 0.05;
			if (e.target.alpha <= 0) {
				_theTarget.removeEventListener(Event.ENTER_FRAME,noiseOn);
				dispatchEvent(new Event("NOISE_ON_COMPLETE",false));
			}
		};
		private function noiseOff(e:Event):void {
			bF.blurX -= blurMod*1.2;
			bF.blurY -= blurMod*1.2;
			perlinOffset[0].y-=8;
			perlinOffset[0].x-=5;
			perlinOffset[1].x+=8;
			perlinOffset[1].y+=5;
			bmp.perlinNoise(baseX, baseY, 3, _rndCount, false, true, 1, true, perlinOffset);
			var dmf = new DisplacementMapFilter(bmp, _zeroPoint, 1, 1, nXScale, nYScale, "color", 0xFFFFFF, 0);
			e.target.filters = [dmf,bF];
			e.target.alpha += 0.05;
			nXScale -= 0.25;
			nYScale -= 0.25;
			if (e.target.alpha >= 1) {
				_theTarget.removeEventListener(Event.ENTER_FRAME,noiseOff);
				dispatchEvent(new Event("NOISE_OFF_COMPLETE",false));
				e.target.filters = null;
			}
			
		};
	};
};