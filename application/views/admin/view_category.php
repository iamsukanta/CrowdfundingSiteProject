<script type="text/javascript">
<!--
//Create a boolean variable to check for a valid Internet Explorer instance.
    var xmlhttp = false;
//Check if we are using IE.
    try {
//If the Javascript version is greater than 5.
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer.");
    } catch (e) {
//If not, then use the older active x object.
        try {
//If we are using Internet Explorer.
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
        } catch (E) {
//Else we must be using a non-IE browser.
            xmlhttp = false;
        }
    }
//If we are using a non-IE browser, create a javascript instance of the object.
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
    }

    function makeRequest(str, objID)
    {
        //alert(str);
        //var obj = document.getElementById(objID);
        serverPage = "<?php echo base_url(); ?>super_admin/category_ajax_search/" + str;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function()
        {
            //alert(xmlhttp.readyState);
            //alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById(objID).innerHTML = xmlhttp.responseText;
                //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }

    makeRequest('', 'res');

</script>


<h3>View all Category:</h3>
<br/>

<input type="text" name="search_category" placeholder="Search Category......." onkeyup="makeRequest(this.value, 'res')">
<!--<span style=" color:orange; font-style:italic; font-weight: bold;">
    
</span> -->
<br/>

<div id="res"></div>

