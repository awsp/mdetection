/**
 * Mobile Detection
 * Re-write in purely JavaScript to accept hashed URL as redirect URL
 * Usage:
 *    new MDetection().exec(); // Redirect to `m/` folder
 *
 * @version  2.0.1
 * @author  Anthony S. Wu <anthonyspwu@gmail.com>
 */

 var MDetection = (function () {

  'use strict';

  function MDetection(redirectURL, expireInDays) {
    this.redirectURL = redirectURL || 'm';
    this.expireInDays = expireInDays || 14;
    this.redirectFlag = false;
  }

  MDetection.prototype.exec = function() {
    if (window.location.href.indexOf('nomobile=true') >= 0) {
      this.redirectFlag = false;
      this.setCookie("redflag", false, this.expireInDays);
    }
    else if (window.location.href.indexOf('nomobile=false') >= 0) {
      this.redirectFlag = true;
      this.setCookie("redflag", true, this.expireInDays);
    }
    else {
      if (typeof this.getCookie("redflag") === "undefined") {
        this.redirectFlag = JSON.parse(this.getCookie("redflag"));
      }
      else {
        this.redirectFlag = true;
        this.setCookie("redflag", true, this.expireInDays);
      }
    }


    if (this.redirectFlag) {
      // Redirect flag has stronger effect.
      document.location.replace(this.redirectURL);
    }
    else if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || Math.min(window.screen.width, window.screen.height) < 500) {
      // Redirect when it is mobile browser or screen size is less than 500
      document.location.replace(this.redirectURL);
    }

  };

  MDetection.prototype.getCookie = function (cookieName) {
    var i, x, y, c, arrCookies = document.cookie.split(";");
    for (i = 0, c = arrCookies.length; i < c; i++) {
      x = arrCookies[i].substr(0, arrCookies[i].indexOf("="));
      y = arrCookies[i].substr(arrCookies[i].indexOf("=")+1);
      x = x.replace(/^\s+|\s+$/g,"");
      if (x == cookieName) {
        return unescape(y);
      }
    }
  };

  MDetection.prototype.setCookie = function (cookieName, value, exDays) {
    var exDate = new Date();
    exDate.setDate(exDate.getDate() + exDays);
    var cookieValue = escape(value) + ((exDays === null) ? "" : "; expires=" + exDate.toUTCString());
    document.cookie = cookieName + "=" + cookieValue;
  };

  return MDetection;

})();