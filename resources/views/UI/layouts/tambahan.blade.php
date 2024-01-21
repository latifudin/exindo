<style>
    .filterDiv {
        float: left;
        color: #ffffff;
        text-align: center;
        display: none;
    }

    .show {
        display: block;
    }

    .container {
        overflow: hidden;
    }

    .act-btn {
        background: white;
        border-radius: 10px;
        display: block;
        width: auto;
        height: auto;
        text-align: center;
        color: black;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        transition: ease all 0.3s;
        position: fixed;
        right: 15px;
        bottom: 15px;
        padding: 10px;
    }
</style>

<script>
    // Initialize with all products displayed
    filterSelection("all");

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        
        // Remove the "active" class from all buttons
        var btns = document.getElementById("BtnFilter").getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].classList.remove("active");
        }
        
        // Add the "active" class to the clicked button
        var clickedBtn = document.querySelector('[onclick="filterSelection(' + c + ')"]');
        if (clickedBtn) {
            clickedBtn.classList.add("active");
        }

        if (c == "all") {
            c = "";
        }

        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (c === "" || x[i].className.indexOf(c) > -1) {
                w3AddClass(x[i], "show");
            }
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }
</script>
