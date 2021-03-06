﻿/**
 * 
 * @authors ChenMingxuan (849651526@qq.com)
 * @date    2018-06-08 09:10:06
 * @version $Id$
 */

/* 登录界面的记住密码的响应函数 */

window.onload = function() {
  var oForm = document.getElementById('form');
  var oUser = document.getElementById('name');
  var oPswd = document.getElementById('pwd');
  var oRemember = document.getElementById('remember');

  // 页面初始化时，如果帐号密码cookie存在则填充
  if (getCookie('name') && getCookie('pwd')) {
    oUser.value = getCookie('name');
    oPswd.value = getCookie('pwd');
    oRemember.checked = true;
  }

  // 复选框勾选状态发生改变时，如果未勾选则清除cookie
  oRemember.onchange = function() {
    if (!this.checked) {
      delCookie('name');
      delCookie('pwd');
    }
  };

  // 表单提交事件触发时，如果复选框是勾选状态则保存cookie
  oForm.onsubmit = function() {
    if (remember.checked) {
      setCookie('name', oUser.value, 7); // 保存帐号到cookie，有效期7天
      setCookie('pwd', oPswd.value, 7); // 保存密码到cookie，有效期7天
    }
  };
};

// 设置cookie
function setCookie(name, value, day) {
  var date = new Date();
  date.setDate(date.getDate() + day);
  document.cookie = name + '=' + value + ';expires=' + date;
};

// 获取cookie
function getCookie(name) {
  var reg = RegExp(name + '=([^;]+)');
  var arr = document.cookie.match(reg);
  if (arr) {
    return arr[1];
  } else {
    return '';
  }
};

// 删除cookie
function delCookie(name) {
  setCookie(name, null, -1);
};
