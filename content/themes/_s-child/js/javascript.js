!function(){function e(){for(var e=this;-1===e.className.indexOf("nav-menu");)"li"===e.tagName.toLowerCase()&&(-1!==e.className.indexOf("focus")?e.className=e.className.replace(" focus",""):e.className+=" focus"),e=e.parentElement}var t,a,n,s,i,r,o;if(t=document.getElementById("site-navigation"),t&&(a=t.getElementsByTagName("button")[0],"undefined"!=typeof a)){if(n=t.getElementsByTagName("ul")[0],"undefined"==typeof n)return void(a.style.display="none");for(n.setAttribute("aria-expanded","false"),-1===n.className.indexOf("nav-menu")&&(n.className+=" nav-menu"),a.onclick=function(){-1!==t.className.indexOf("toggled")?(t.className=t.className.replace(" toggled",""),a.setAttribute("aria-expanded","false"),n.setAttribute("aria-expanded","false")):(t.className+=" toggled",a.setAttribute("aria-expanded","true"),n.setAttribute("aria-expanded","true"))},s=n.getElementsByTagName("a"),i=n.getElementsByTagName("ul"),r=0,o=i.length;o>r;r++)i[r].parentNode.setAttribute("aria-haspopup","true");for(r=0,o=s.length;o>r;r++)s[r].addEventListener("focus",e,!0),s[r].addEventListener("blur",e,!0)}}(),function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,t=navigator.userAgent.toLowerCase().indexOf("opera")>-1,a=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(e||t||a)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t),e&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus()))},!1)}();