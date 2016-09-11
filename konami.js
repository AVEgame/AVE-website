/*
 * Konami-JS ~ 
 * :: Now with support for touch events and multiple instances for 
 * :: those situations that call for multiple easter eggs!
 * Code: http://konami-js.googlecode.com/
 * Examples: http://www.snaptortoise.com/konami-js
 * Copyright (c) 2009 George Mandis (georgemandis.com, snaptortoise.com)
 * Version: 1.4.2 (9/2/2013)
 * Licensed under the MIT License (http://opensource.org/licenses/MIT)
 * Tested in: Safari 4+, Google Chrome 4+, Firefox 3+, IE7+, Mobile Safari 2.2.1 and Dolphin Browser
 */

var Konami = function (callback) {
	var konami = {
		addEvent: function (obj, type, fn, ref_obj) {
			if (obj.addEventListener)
				obj.addEventListener(type, fn, false);
			else if (obj.attachEvent) {
				// IE
				obj["e" + type + fn] = fn;
				obj[type + fn] = function () {
					obj["e" + type + fn](window.event, ref_obj);
				}
				obj.attachEvent("on" + type, obj[type + fn]);
			}
		},
		input: "",
		pattern: "38384040373937396665",
		load: function (link) {
			this.addEvent(document, "keydown", function (e, ref_obj) {
				if (ref_obj) konami = ref_obj; // IE
				konami.input += e ? e.keyCode : event.keyCode;
				if (konami.input.length > konami.pattern.length)
					konami.input = konami.input.substr((konami.input.length - konami.pattern.length));
				if (konami.input == konami.pattern) {
					konami.code(link);
					konami.input = "";
					e.preventDefault();
					return false;
				}
			}, this);
			this.iphone.load(link);
		},
		code: function (link) {
			window.location = link
		},
		iphone: {
			start_x: 0,
			start_y: 0,
			stop_x: 0,
			stop_y: 0,
			tap: false,
			capture: false,
			orig_keys: "",
			keys: ["UP", "UP", "DOWN", "DOWN", "LEFT", "RIGHT", "LEFT", "RIGHT", "TAP", "TAP"],
			code: function (link) {
				konami.code(link);
			},
			load: function (link) {
				this.orig_keys = this.keys;
				konami.addEvent(document, "touchmove", function (e) {
					if (e.touches.length == 1 && konami.iphone.capture == true) {
						var touch = e.touches[0];
						konami.iphone.stop_x = touch.pageX;
						konami.iphone.stop_y = touch.pageY;
						konami.iphone.tap = false;
						konami.iphone.capture = false;
						konami.iphone.check_direction();
					}
				});
				konami.addEvent(document, "touchend", function (evt) {
					if (konami.iphone.tap == true) konami.iphone.check_direction(link);
				}, false);
				konami.addEvent(document, "touchstart", function (evt) {
					konami.iphone.start_x = evt.changedTouches[0].pageX;
					konami.iphone.start_y = evt.changedTouches[0].pageY;
					konami.iphone.tap = true;
					konami.iphone.capture = true;
				});
			},
			check_direction: function (link) {
				x_magnitude = Math.abs(this.start_x - this.stop_x);
				y_magnitude = Math.abs(this.start_y - this.stop_y);
				x = ((this.start_x - this.stop_x) < 0) ? "RIGHT" : "LEFT";
				y = ((this.start_y - this.stop_y) < 0) ? "DOWN" : "UP";
				result = (x_magnitude > y_magnitude) ? x : y;
				result = (this.tap == true) ? "TAP" : result;

				if (result == this.keys[0]) this.keys = this.keys.slice(1, this.keys.length);
				if (this.keys.length == 0) {
					this.keys = this.orig_keys;
					this.code(link);
				}
			}
		}
	}

	typeof callback === "string" && konami.load(callback);
	if (typeof callback === "function") {
		konami.code = callback;
		konami.load();
	}

	return konami;
};



easter_egg = new Konami(function() {
    score = 0
    f = document.getElementById("foot")
    f.style.background= "transparent"
    f.style.height= "45px"
    f.style.lineHeight= "74px"
    f.style.backgroundImage = "url('/img/skyline.png')"
    f.style.backgroundRepeat = "repeat-x"
    f.style.backgroundPosition = "bottom left"
    document.body.style.marginBottom = "50px"

    scorediv = document.createElement('div')
    scorediv.style.position = 'absolute'
    scorediv.style.top = 105
    scorediv.style.textAlign = "right"
    scorediv.style.right = 5
    scorediv.style.backgroundColor = "#2F0923"
    scorediv.style.color = "#FFFFFF"
    scorediv.style.paddingLeft = 5
    scorediv.style.paddingRight = 5
    scorediv.style.paddingTop = 2
    scorediv.style.paddingBottom = 2
    scorediv.innerHTML = "Pop the balloons before they reach the top.<br />Score: 0"
    document.body.appendChild(scorediv)
    posA=Array()
    for(i=0;i<10;i++){
        posA[i]=Array(document.createElement('img'),0,0,1,1,0)//-100-Math.floor(Math.random()*500),Math.random())
        resetballoon(i)
        posA[i][0].style.position='absolute'
        posA[i][0].style.top=-100
        document.body.appendChild(posA[i][0])
        posA[i][0].setAttribute("onClick","pop("+i+")")
        //posA[i][0].addEventListener('click', function (i,j) {
        //    alert(i)
        ////    //e.src='/img/balloonpop.png'
        //});
    }
    setInterval(function(){
        moveballoon()
    }, 100);

});
function resetballoon(i){
    if(Math.random()<0.9){
        posA[i][0].src='/img/balloon.png'
        posA[i][5] = 1
    } else {
        posA[i][0].src='/img/balloonave.png'
        posA[i][5] = 10
    }
    w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    posA[i][1] = Math.floor(Math.random()*(w-30)+15)
    posA[i][2] = h-50
    posA[i][3] = 1+Math.floor(7*Math.random())
    posA[i][4] = 0
}

function pop(i){
    if(posA[i][5]==1){
        posA[i][0].src = '/img/balloonpop.png'
    } else {
        posA[i][0].src = '/img/balloonavepop.png'
    }
    posA[i][4] = 1
    score += posA[i][5]
}

function moveballoon(){
    for(i=0;i<posA.length;i++){
        //if(posA[i][0].src==test.src){
        if(posA[i][4]==0){
            posA[i][2]-=posA[i][3]
        } else {
            posA[i][4] += 1
        }
        if(posA[i][4] > 10 || posA[i][2]<=-50 || isNaN(posA[i][1])){
            if(posA[i][4] == 0){score -= 1}
            resetballoon(i)
        }
        posA[i][0].style.top  = posA[i][2]
        posA[i][0].style.left = posA[i][1]
    }
    scorediv.innerHTML = "Pop the balloons before they reach the top.<br />Score: "+score
}
