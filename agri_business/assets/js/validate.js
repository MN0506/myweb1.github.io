function alphabets(txtid,erorr,lblname)
{
    var name=document.getElementById(txtid).value;

    if(name.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(name.match(/^[a-z A-Z&,. ]+$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (only letters) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}


function amountval(txtid,erorr,lblname)
{
    var number=document.getElementById(txtid).value;

    if(number.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(number.match(/^\d+(\.\d{1,4})?$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (only numbers) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}

function numbers(txtid,erorr,lblname)
{
    var number=document.getElementById(txtid).value;

    if(number.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(number.match(/^\d+$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (only numbers) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}

function phoneno(txtid,erorr,lblname)
{
    var number=document.getElementById(txtid).value;

    if(number.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(number.match(/^[6-9]\d{9}$/i))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (10 numbers start with 6,7,8 or 9) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    } 
}


function emailid(txtid,erorr,lblname)
{
    var email=document.getElementById(txtid).value;

    if(email.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (Ex. example@gmail.com) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    } 
}

function pasword(txtid,erorr,lblname)
{
    var passwordd=document.getElementById(txtid).value;

    if(passwordd.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(passwordd.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;" style="text-align:justify;">'+lblname+' is Invalid ( Password Must Contain Minimum eight characters, at least one uppercase letter, one lowercase letter and one number and no special characters. ) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}

function fieldrequired(txtid,erorr,lblname)
{
    var txtarea=document.getElementById(txtid).value;

    if(txtarea.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }
    else
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
}

function imagename(txtid,erorr,lblname,action)
{
    var image=document.getElementById(txtid).value;
    var extension = image.split('.').pop().toLowerCase();
    if(action!='Confirm' && action!='Edit' && image.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1 && action!='Edit' && action!='Confirm')
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (only gif, png, jpg and jpeg) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }
    else
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    } 
}

function SetDate(txtid)
{
    var value='';
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    var amOrPm = (date.getHours() < 12) ? "AM" : "PM";

    var hour = (date.getHours() <=12) ? date.getHours() : date.getHours() - 12;

    var minutes=date.getMinutes();

    if (hour < 10) hour = "0" + hour;
    if (minutes < 10) minutes = "0" + minutes;

    //var time = hour + ":" + date.getMinutes() + ":" + date.getSeconds()+ ' ' + amOrPm;
    var time = hour + ":" + minutes + ' ' + amOrPm;

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = day + "-" + month + "-" +year ;

    value=today+' '+time;

    display_date(txtid,value)
    //document.getElementById(date_value).value = today+' '+time;
    return 1;
}

function SetDate1()
{
    var value='';
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    var amOrPm = (date.getHours() < 12) ? "AM" : "PM";

    var hour = (date.getHours() <=12) ? date.getHours() : date.getHours() - 12;

    var minutes=date.getMinutes();

    if (hour < 10) hour = "0" + hour;
    if (minutes < 10) minutes = "0" + minutes;

    //var time = hour + ":" + date.getMinutes() + ":" + date.getSeconds()+ ' ' + amOrPm;
    var time = hour + ":" + minutes + ' ' + amOrPm;

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = day + "-" + month + "-" +year ;

    value=today+' '+time;

    //display_date(txtid,value)
    //document.getElementById(date_value).value = today+' '+time;
    return value;
}

function display_date(txtid, value)
{
    document.getElementById(txtid).value=value;  
}

function RemovePrompt(txtid, erorr)
{
    document.getElementById(erorr).innerHTML='';
    document.getElementById(txtid).style.borderColor='';   
}

function ValidatePrompt(message2, txtid, erorr)
{
    document.getElementById(erorr).innerHTML=message2;
    document.getElementById(txtid).style.borderColor="#ff3a00"; 
}

function addcolor(txtid)
{
    document.getElementById(txtid).style.borderColor="#ff3a00"; 
    return 0;
}

function removecolor(txtid)
{
    document.getElementById(txtid).style.borderColor=''; 
    return 1;
}