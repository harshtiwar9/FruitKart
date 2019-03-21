function deleteprd()
{
    var id=document.getElementById("prd_id").innerHTML;
    var xmlhttp;
    if(window.XMLHttpRequest)
    {
        xmlhttp= new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {  
        if(xmlhttp.readyState===4 && xmlhttp.status===200)
        {
            alert(xmlhttp.responseText);
        }
    };
    xmlhttp.open("POST","../logic.php?page=deleteprd",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("id="+id);
    
}