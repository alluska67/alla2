

function hide (id){
    var x = document.getElementById(id);

    console.log(x);
    if (x.style.display === 'block') {
        x.style.display = 'none';
    } else {
        x.style.display = 'block';

    }
}
//
// window.onload = function () {
//     alert(document.getElementById('xxx').style.display);
// }


function del() {
    var l = document.getElementById('key').value.length;
    if(l <5 ) {
        alert('Вы ввели меньше' + l);
        return false;
    }
}

function areYouSure(){
    return confirm('Вы уверены, что хотите удалить?');
}


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