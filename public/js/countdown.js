    const token = document.querySelector('div[id=examTime]').textContent

    console.log(token);
    // var jobs = JSON.parse("{{ json_encode($jobs) }}");
   
        console.log("dsdsfsdfsdsdfsdf");
        var d1 = new Date ()   
        console.log(d1);
        d1.setSeconds ( d1.getSeconds() + parseInt(token) );
        console.log(d1);
        
        var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = d1 - now;
            

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        
        document.getElementById("displayTime").innerText = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
            

        if (distance < 1) {
            clearInterval(x);
            document.getElementById("examForm").submit();
        }
        }, 1000);
