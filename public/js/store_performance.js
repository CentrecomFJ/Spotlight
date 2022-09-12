    function store_performance(user_id,user_name2,wpm , correct , incorrect , keystrokes , accuracy)
    {
       // alert("called");
        var xmlhttp;

        if(window.XMLHttpRequest)
         {
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                if(xmlhttp.responseText==1)
                {
                    $('#cover').hide();
                    $('#details').hide();
                }
                else if(xmlhttp.responseText==1)
                {
                    $("#message").html('<div class="alert alert-danger"><p>User Id and Password do not match or no such user exists ...</p></div>');
                }
                else if(xmlhttp.responseText==0)
                {
                    $("#message").html('<div class="alert alert-danger"><p>Fields are left blank ...</p></div>');
                }
            }
          }
    }

    var data ="http://spotlight.local/show-typing-test-submit?&user_id=" + user_id + "&user_name2=" + user_name2 + "&wpm=" + wpm + "&correct=" + correct + "&incorrect=" + incorrect + "&keystrokes=" + keystrokes + "&accuracy=" + accuracy;
    xmlhttp.open("get",data,true);
    xmlhttp.send();
}
