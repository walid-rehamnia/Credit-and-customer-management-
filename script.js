var mainArray = ['الزبــائن', 'الحسـابات', 'الـمـزيـد', 'حــــــول'];
var navIl = document.getElementsByClassName("normalNavMain");
var form = document.getElementsByClassName("sign_in")[0];
var nav = document.getElementById('navnav');
//Navigation bar events
var ch = ['<ul class="subNavigationBar"><li class="a"><a href="http://localhost/credit/add_client.php" target="_blank">إضــــافة زبــون </a></li>' +
    '<li class="a"><a href="http://localhost/credit/admin_client.php" target="_blank">قـــائمة الزبـــائن</a></li></ul>', '<ul class="subNavigationBar"><li class="a"><a href="add_account.php" target="_blank">إضــــافة حساب</a></li>' +
'<li class="a"><a href="" target="_blank">قـائمة الحسـابـات</a></li></ul>', "   قريبا", "تم بفضل الله من طرف رحامنية وليد"];

var sub = document.getElementById("subList");
sub.setAttribute("margin", "10%");

for (let i = 0; i < 4; i++) {
    navIl[i].onmouseover = function () {
        this.setAttribute("class", "overNavMain");
        //this.innerHTML=mainArray[i]+ch;
        sub.innerHTML = '<ul class="subNavigationBar">' + ch[i] + '</ul>';
        form.setAttribute("style", "margin-top: -0.5%;");
    }
    navIl[i].onmouseleave = function () {
        this.setAttribute("class", "normalNavMain");
        alert(this.childNodes[1].innerHTML);
        alert(this.nextSibling.innerHTML);
        alert(this.lastChild.innerHTML);
    }

    nav.onmouseleave = function () {
        navIl[i].setAttribute("class", "normalNavMain");
        //this.innerHTML=mainArray[i];
        form.setAttribute("style", "margin-top: 5%;");
        sub.innerHTML = "";
        //myInterval2 = setTimeout('sub.innerHTML="";form.setAttribute("style","margin-top: 5%;");',1200);
    }

}

//Events for tables 
var tab = document.getElementsByTagName("td");
let n = tab.length;
for (let i = 0; i < n; i++) {
    tab[i].onmouseover = function () {
        this.setAttribute("class", "overNavMain");
    }
    tab[i].onmouseleave = function () {
        this.setAttribute("class", "normalNavMain");
    }
}//end of for loop

/*if (confirm('Je vais dire sur quel bouton vous avez appuyé : '))
 {alert(' Sur OK \n Continuez avec :') }
 else {alert(' Sur Annuler \n Sortez avec Ok !') };
 */
/*fille=open('', '', 'height=50, width=300, status=yes');
 fille.document.write('<title>' + 'Titre fenetre fille' +
 '</title>');
 fille.document.write('Texte dans la fenêtre fille');*/
/*
 var search = document.getElementById("search");
 let users = document.getElementById("users");
 search.onclick=function() {
 choices = ['walid','youness','ali'];
 let n = choices.length;
 var i =0;
 for(i=0;i<n;i++)
 {
 users.innerHTML+="<li>"+choices[i]+"</li>";
 }
 };

document.body.onclick=function(event) {
    if(event.target!=input)
      options.style.display='none';
}


input.onclick=function() {
    this.value='';
      options.style.display='block';
}


for(i=0;i<choices.length;i++) {
   options.getElementsByTagName('li')[i].onclick = function(){

       input.value= this.textContent;

    }


}
 /*
 var selectedVal = "";
 var selected = $("input[type='radio'][name='s_2_1_6_0']:checked");
 if (selected . length > 0) {
 selectedVal = selected . val();
 }
 document.writeln(selectedVal);
 */

//Event for the page title
//var title = document.getElementById("title");
//alert("wal");
//myInterval = setInterval('document.writeln("walid")',1000);

if (i < n) item.innerText += arr[i++]; else clearInterval(t);