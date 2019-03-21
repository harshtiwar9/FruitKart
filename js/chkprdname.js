 function chkprdname(str)
            {
                var xmlhttp;
                var xmlhttp=new XMLHttpRequest();
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
                        Materialize.toast(xmlhttp.responseText,4000);
                    }
                
                };
               xmlhttp.open("POST","../logic.php?page=chkprdname",true);
               xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
               xmlhttp.send("prdname="+str);
            }/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


