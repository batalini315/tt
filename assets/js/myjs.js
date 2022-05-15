$(document).ready(function() {
    // var id = setInterval("myFun1", 1000);
    // var counter = 0;

    // function myFun1() {
    //     counter++;
    //     alert("second = "+counter);
    // }
    var counter = 0;
        const func = () => {
            const span = document.getElementById('seconds');
            const text1 = span.textContent;
            const minutes = document.getElementById('minutes');
            var minutes1 = minutes.textContent;
            

            counter--;
            var sss = $("#seconds").val();
            // alert("second = "+sss);
        // console.log('Hello after '+ counter);
            span.innerHTML= counter;
            if(counter > -1) sec();
            else {
                minutes1 --;
                minutes.innerHTML= minutes1;
                if(minutes1 > -1 ) {
                    counter = 59;
                    span.innerHTML= counter;
                    sec();
                }
                else {
                    $("form").serialize();
                    // console.log($("form").serialize());
                    document.getElementById("myForm").requestSubmit();
                    // document.getElementById("myForm").submit();
                }
            }
    };
    setTimeout(func, 2 * 1000);
    function sec() {setTimeout(func, 2 * 1000);} 
})
// $(document).ready(function() {
//     // window.onbeforeunload = alert('Work');
//     // window.onbeforeunload = function () { 
//     //     return (is_data_changed ? "Измененные данные не сохранены. Закрыть страницу?" : null); 
//     //   }
// });
// window.onbeforeunload = alert('Work');
// window.unload = alert('unload');
let analyticsData = { 'fff': 'ddd'};

window.addEventListener("onbeforeunload", function() {
//   navigator.sendBeacon("/analytics", JSON.stringify(analyticsData));
// console.log('end');
$ajax({
    url:"codeigniter.zzz/users/end",
    data:"user",
    success: function(data) {
        alert('is seccuss');
    }
})
});

window.onblur = function() {
    // $ajax({
    //     url:"codeigniter.zzz/users/end",
    //     data:"user",
    //     success: function(data) {
    //         alert('is seccuss');
    //     }
    // });
    $("form").serialize();
    document.getElementById("myForm").requestSubmit();
    // $.post('/index.php', {text: 'Текст'}, function(data){
    //     alert(data);
    // });
        closeTest();
        alert( 'Фокус то ушел' );    
    }

function closeTest() {
    $("textarea").attr("disabled", "true");
    $("input").attr("disabled", "true");
}



