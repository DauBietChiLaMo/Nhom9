function checkregister() {
   var email = document.getElementById("email").value;
   var password = document.getElementById("password").value;
   var repassword = document.getElementById("repassword").value;
   var phone = document.getElementById("phone").value;
   var username = document.getElementById("username").value;

   y = true;
   regex_email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
   regex_password = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
   regex_phone = /^0([0-9]{9})$/;
   regex_username = /^[a-z0-9_-]{3,16}$/;


   if (!username.match(regex_username)) {
      x = document.getElementById("checkusername");
      x.innerHTML = "Tài khoản ít nhất ba ký tự (a-z), số (0-9), dấu gạch dưới hoặc dấu gạch nối!";
      x.style.fontSize = "9pt";
      x.style.color = "red";
      x.style.display = "block";
      y = false;
   } else {
      x = document.getElementById("checkusername");
      x.style.display = "none";
   }

   if (!email.match(regex_email)) {
      x = document.getElementById("checkemail");
      x.innerHTML = "Email không hợp lệ!";
      x.style.fontSize = "9pt";
      x.style.color = "red";
      x.style.display = "block";
      y = false;
   } else {
      x = document.getElementById("checkemail");
      x.style.display = "none";
   }
   if (!password.match(regex_password)) {
      x = document.getElementById("checkpassword");
      x.innerHTML = "Mật khẩu tối thiểu tám ký tự, ít nhất một chữ cái và một số!";
      x.style.fontSize = "9pt";
      x.style.color = "red";
      x.style.display = "block";
      y = false;
   } else {
      x = document.getElementById("checkpassword");
      x.style.display = "none";
   }
   if (password != repassword) {
      x = document.getElementById("checkrepassword");
      x.innerHTML = "Mật khẩu không trùng khớp khớp!";
      x.style.fontSize = "9pt";
      x.style.color = "red";
      x.style.display = "block";
      y = false;
   } else {
      x = document.getElementById("checkrepassword");
      x.style.display = "none";
   }
   if (!phone.match(regex_phone)) {
      x = document.getElementById("checkphone");
      x.innerHTML = "Số điện thoại không hợp lệ!";
      x.style.fontSize = "9pt";
      x.style.color = "red";
      x.style.display = "block";
      y = false;
   } else {
      x = document.getElementById("checkphone");
      x.style.display = "none";
   }
   return y;
}

function checkemail(email) {
   var xmlhttp = new XMLHttpRequest();
   xmlhttp.open("GET","client/main/checkemail.php?email=" + email);
   xmlhttp.send();
   xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("checkemail").innerHTML = this.responseText;
      }
   }
} 
