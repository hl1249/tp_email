(function(e){function t(t){for(var r,i,u=t[0],c=t[1],l=t[2],s=0,p=[];s<u.length;s++)i=u[s],Object.prototype.hasOwnProperty.call(o,i)&&o[i]&&p.push(o[i][0]),o[i]=0;for(r in c)Object.prototype.hasOwnProperty.call(c,r)&&(e[r]=c[r]);d&&d(t);while(p.length)p.shift()();return a.push.apply(a,l||[]),n()}function n(){for(var e,t=0;t<a.length;t++){for(var n=a[t],r=!0,i=1;i<n.length;i++){var c=n[i];0!==o[c]&&(r=!1)}r&&(a.splice(t--,1),e=u(u.s=n[0]))}return e}var r={},o={app:0},a=[];function i(e){return u.p+"js/"+({about:"about"}[e]||e)+"."+{about:"73bca4c8"}[e]+".js"}function u(t){if(r[t])return r[t].exports;var n=r[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,u),n.l=!0,n.exports}u.e=function(e){var t=[],n=o[e];if(0!==n)if(n)t.push(n[2]);else{var r=new Promise((function(t,r){n=o[e]=[t,r]}));t.push(n[2]=r);var a,c=document.createElement("script");c.charset="utf-8",c.timeout=120,u.nc&&c.setAttribute("nonce",u.nc),c.src=i(e);var l=new Error;a=function(t){c.onerror=c.onload=null,clearTimeout(s);var n=o[e];if(0!==n){if(n){var r=t&&("load"===t.type?"missing":t.type),a=t&&t.target&&t.target.src;l.message="Loading chunk "+e+" failed.\n("+r+": "+a+")",l.name="ChunkLoadError",l.type=r,l.request=a,n[1](l)}o[e]=void 0}};var s=setTimeout((function(){a({type:"timeout",target:c})}),12e4);c.onerror=c.onload=a,document.head.appendChild(c)}return Promise.all(t)},u.m=e,u.c=r,u.d=function(e,t,n){u.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},u.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},u.t=function(e,t){if(1&t&&(e=u(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(u.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)u.d(n,r,function(t){return e[t]}.bind(null,r));return n},u.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return u.d(t,"a",t),t},u.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},u.p="/dist/",u.oe=function(e){throw console.error(e),e};var c=window["webpackJsonp"]=window["webpackJsonp"]||[],l=c.push.bind(c);c.push=t,c=c.slice();for(var s=0;s<c.length;s++)t(c[s]);var d=l;a.push([0,"chunk-vendors"]),n()})({0:function(e,t,n){e.exports=n("56d7")},"56d7":function(e,t,n){"use strict";n.r(t);n("e260"),n("e6cf"),n("cca6"),n("a79d");var r=n("2b0e"),o=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{attrs:{id:"app"}},[n("router-view")],1)},a=[],i=n("2877"),u={},c=Object(i["a"])(u,o,a,!1,null,null,null),l=c.exports,s=(n("d3b7"),n("3ca3"),n("ddb0"),n("8c4f")),d=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("div",[n("input",{directives:[{name:"model",rawName:"v-model",value:e.email,expression:"email"}],attrs:{type:"text",name:"",placeholder:"邮箱"},domProps:{value:e.email},on:{input:function(t){t.target.composing||(e.email=t.target.value)}}}),n("button",{on:{click:e.getCode}},[e._v("获取验证码")])]),n("br"),n("div",[n("input",{directives:[{name:"model",rawName:"v-model",value:e.code,expression:"code"}],attrs:{type:"text",name:"",placeholder:"验证"},domProps:{value:e.code},on:{input:function(t){t.target.composing||(e.code=t.target.value)}}}),n("button",{on:{click:e.verification}},[e._v("验证")])])])},p=[],f=n("1da1"),m=(n("96cf"),n("bc3a")),v=n.n(m),g=("".concat(location.origin,"/api"),{routerMode:"history",baseUrl:"".concat(location.origin),credential:!0}),h=g,b=n("5c96"),w=n.n(b),y=v.a.create({baseURL:h.baseUrl,timeout:3e4,withCredentials:h.credential});y.interceptors.request.use((function(e){return e}),(function(e){return Promise.reject(e)})),y.interceptors.response.use((function(e){return console.log(e),"0"==e.data.code?b["Notification"].error({title:"错误",message:e.data.msg}):"200"==e.data.code&&Object(b["Notification"])({title:"成功",message:e.data.msg,type:"success"}),e.data}),(function(e){return e&&e.response&&console.log(e.response),Promise.reject(e)}));var j={get:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};return y.get(e,{params:t,headers:n})},post:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};return y.post(e,t,{headers:n})},put:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};return y.put(e,t,{headers:n})},file:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};return y.post(e,t,{headers:Object.assign({"Content-Type":"multipart/form-data"},n)})},delete:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};return y.delete(e,{param:t,headers:Object.assign({"Content-Type":"multipart/form-data"},n)})}},x=function(e){return j.post("/index/hello",e)},O=function(e){return j.get("/mail/get_code",e)},P=function(e){return j.get("/mail/verification",e)},_={name:"index",data:function(){return{email:null,code:null}},methods:{login:function(){return Object(f["a"])(regeneratorRuntime.mark((function e(){var t,n;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return t={name:"ds"},e.next=3,x(t);case 3:n=e.sent,console.log(n);case 5:case"end":return e.stop()}}),e)})))()},getCode:function(){var e=this;return Object(f["a"])(regeneratorRuntime.mark((function t(){var n,r;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return n={email:e.email},t.next=3,O(n);case 3:r=t.sent,console.log(r);case 5:case"end":return t.stop()}}),t)})))()},verification:function(){var e=this;return Object(f["a"])(regeneratorRuntime.mark((function t(){var n,r;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return n={email:e.email,code:e.code},t.next=3,P(n);case 3:r=t.sent,console.log(r);case 5:case"end":return t.stop()}}),t)})))()}}},k=_,C=Object(i["a"])(k,d,p,!1,null,null,null),R=C.exports;r["default"].use(s["a"]);var T=[{path:"/",name:"index",component:R},{path:"/Login",name:"Login",component:function(){return n.e("about").then(n.bind(null,"d9c9"))}}],S=new s["a"]({mode:"history",base:"/dist/",routes:T}),E=S,L=n("2f62");r["default"].use(L["a"]);var M=new L["a"].Store({state:{},mutations:{},actions:{},modules:{}});n("0fae");r["default"].use(w.a),r["default"].config.productionTip=!1,new r["default"]({router:E,store:M,render:function(e){return e(l)}}).$mount("#app")}});
//# sourceMappingURL=app.ea75bece.js.map