function chklogin()
            {
                var u,p,xmlhttp;
                u=document.getElementById("email").value;
                p=document.getElementById("pwd").value;
                
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
                            if(xmlhttp.responseText==="1")
                            {
                                window.location="admin.php";
                            }
                            else if(xmlhttp.responseText==="11")
                            {
                                window.location="Home.php";
                            }
                            else if(xmlhttp.responseText==="0"){
                                Materialize.toast('User Not Found',4000);
                            }
                            else if(xmlhttp.responseText==="00"){
                                Materialize.toast('Fields Cannot Be Empty!',4000);
                            }
                            else{
                                Materialize.toast(xmlhttp.responseText,4000);
                                }
                    }
               };
               xmlhttp.open("POST","logic.php?page=login",true);
               xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
               xmlhttp.send("email="+u+"&pass="+p);
             
            }/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


