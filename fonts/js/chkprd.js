
            function chkprd(){
                var a=document.getElementById("prod_name").value;
                var b=document.getElementById("prod_category").value;
                var c=document.getElementById("prod_mrp").value;
                var d=document.getElementById("prod_quantity").value;
                var e=document.getElementById("prod_about").value;
                var f=document.getElementById("prod_img").value;
                
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
                        {Materialize.toast(xmlhttp.responseText,4000);
                                
                    }
               };
               xmlhttp.open("POST","../logic.php?page=registerproduct",true);
               xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
               xmlhttp.send("prod_name="+a+"&prod_category="+b+"&prod_mrp="+c+"&prod_quantity="+d+"&prod_about="+e+"&prod_img="+f);
            }
        