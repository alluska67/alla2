
function hideShow(id)  {
    var on_click = document.getElementById(id);

    if (on_click.style.display === 'block') {
        on_click.style.display = 'none';
    } else {
        on_click.style.display = 'block';
    }
}

// function close(id) {
//     var x = document.getElementById(id).onmouseleave;
// }
// r = 0;
// function test () {
//     ++r;
//     console.log('lalala'+ r);
//     if(r == 5) {
//         clearInterval(intervalID); // останавливает интервал
//     }
// }
// // debugger;
// function hide () {
//     document.getElementById('xxx').style.display = 'none';
// }
//
// window.onload = function () {
//
//     setTimeout(
//         hide
//     , 2000);
//
// }
//var intervalID = setInterval(test,2000);


//intervalID = setTimeout(test,2000);









// window.onload = function () {
//     document.getElementById('xxx').style.backgroundColor = 'red';
//
//
//
//     //document.getElementById('click').onclick = hideShow;
//
//     // document.getElementById('click').onclick = function () {
//     //     x = document.getElementById('xxx');
//     //     if (x.style.display == 'block') {
//     //         x.style.display = 'none';
//     //     } else  {
//     //         x.style.display = 'block';
//     //     }
//     // }
// }
//
// function del() {
//     l = document.getElementById('sendtext').value.length;
//     if(l<5) {
//         alert('Вы не заполнили поле. Минимум 5 символов. Вы ввели' + l);
//         return false;
//     } else {
//         return true;
//     }
// }
// function areYouSure () {
//     return confirm('Вы уверенны, что хотите удалить?');//true,false
// }



// x = 0;
// function test() {
//     x++;
//     console.log(x);
//     if(x == 5) {
//         clearInterval(interval);
//     }
//
// }
// interval = setInterval(test,1000);


//intervalId = setTimeout(console.log('lalala'),2000) + 'lalala';