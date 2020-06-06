<html>

<head>
    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                
                var arr = new array();
                arr.push(str);
                xmlhttp.open("GET", "getUsers.php?q=" + arr , true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>

    <form>

        <label><input type="checkbox" name="tip" value="casual" onchange="showUser(this.value)" /> casual</label>
        <label><input type="checkbox" name="tip" value="sport" onchange="showUser(this.value)" /> sport</label>
        <label><input type="checkbox" name="tip" value="business" onchange="showUser(this.value)" /> business</label>
        <label><input type="checkbox" name="tip" value="festival" onchange="showUser(this.value)" /> festival</label>
        <label><input type="checkbox" name="tip" value="cocktail" onchange="showUser(this.value)" /> cocktail</label>
        <label><input type="checkbox" name="tip" value="bal" onchange="showUser(this.value)" /> bal</label>

    </form>

    <br>
    <div id="txtHint"><b>Person info will be listed here...</b></div>

</body>

</html>