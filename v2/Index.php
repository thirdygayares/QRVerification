
<?php

    include ('database.php');


    $statusStud = "";
    $credentials = "";
    if(isset($_POST['scanned'])){
        $text = $_POST['scanned'];
        $sql = "INSERT INTO mmuscanned(scanned) VALUES ('$text')";
        if($conn->query($sql) === TRUE){
            $credentials =  $text;

        }else{
            $credentials =  "Error: " .$sql . "<br>" . conn-> error;
        }
    
    
        $verify = "SELECT INTO mmuscanned(scanned) VALUES ('$text')";
    
    
         $verify= $conn->query("SELECT nameandcollege FROM audiences WHERE qrcode = '$text' ");
            if($verify->num_rows >=1 )
            {
            $statusStud =  "Welcome Heron!";
            }
            else
            {
            $statusStud =  "Invalid QR Code - not registered";
            }
          
    
        // header("location: index.php");
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title> QR Verifier | UMak ComSoc </title>

    <script src='Source/html5-qrcode.min2.js'></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        body {
            background-image: url('Images/OfficialBG.png');
        }

        .eventtextlogo {
            height: 45%;
            width: 45%;
            margin-right: auto;
            margin-left: 51.5%;
            margin-top: -2%;
        }

        .orgpartlogo {
            height: 25%;
            width: 25%;
            margin-right: auto;
            margin-left: 61.30%;
            margin-top: 3%;
            z-index: 1;
        }

        .rectangle {
            background-color: white;
            border-radius: 8%;
            height: 50%;
            width: 30%;
            position: absolute;
            right: 11%;
        }

        .p1 {
            color: blue;
            font-family: 'Poppins', sans-serif;
            position: absolute;
            left: 61%;
            font-size: 30px;
        }

        .p2 {
            color: blue;
            font-family: 'Poppins', sans-serif;
            position: absolute;
            left: 61%;
            font-size: 30px;
            margin-top: 8%;
        }

        .p3 {
            color: blue;
            font-family: 'Poppins', sans-serif;
            position: absolute;
            left: 61%;
            font-size: 30px;
            margin-top: 15%;
        }

        .camera {
            margin-left: 3.75%;
            margin-top: -7%;
        }


        .qrcodenumber {
            margin-left: 63%;
            margin-top: 4.5%;
            font-size: 30px;
            font-family: Poppins;
            z-index: 1;
            position: absolute;
        }

        .credentials {
            margin-left: 63%;
            margin-top: 10.5%;
            font-size: 30px;
            font-family: Poppins;
            z-index: 1;
            position: absolute;
        }

        .statuses {
            margin-left: 61%;
            margin-top: 17.5%;
            font-size: 30px;
            font-family: Poppins;
            z-index: 1;
            position: absolute;
        }

        .watermarkumak {
        height: 8%;
        width: 21%;
        left: 2%;
        margin-top: -17%;
        z-index: 1;
        position: absolute;
        }

        .watermarkcomsoc {
        height: 8%;
        width: 12%;
        right: 1%;
        margin-top: 29%;
        z-index: 1;
        position: absolute;
        }


        .watermarkumak2 {
        height: 8%;
        width: 21%;
        left: 2%;
        margin-top: 1%;
        z-index: 1;
        position: absolute;
        }

        .watermarkcomsoc2 {
        height: 8%;
        width: 12%;
        right: 1%;
        margin-top: 47.5%;
        z-index: 1;
        position: absolute;
        }


        .mmuprelimcomp {
            height: 35%;
            width: 35%;
            margin-right: auto;
            margin-left: 55.5%;
            margin-top: 4%;
            margin-bottom: 1%;
        }

    </style>
    </head>
    
    <body>
        <!-- <div>
            <img src='Images/USC.png' alt="USC Logo" class="orgpartlogo">
            <img src='Images/HeronsWelcomes.png' alt="Herons Welcome Text" class="eventtextlogo">
        </div> -->
        
        
       <div>
            <img src='Images/WATERMARK UMAK.png' alt="UMak" class="watermarkumak2">
            <img src='Images/WATERMARK COMSOC.png' alt="ComSoc" class="watermarkcomsoc2">
        </div>

        <div>
            <img src='Images/MMU PRELIM COMP.png' alt="MMU Prelim Comp" class="mmuprelimcomp">
        </div>
        

        <div class="rectangle"></div>    

        <div>
            <p class="p1"> <b> QRCODE NUMBER: </b></p>
            <p class="p2"> <b> CREDENTIALS: </b></p>
            <p class="p3"> <b> STATUS: </b></p>
        </div>

       <form action="" method="POST">
            <div>
                <input class="qrcodenumber" id="result" name="scanned" placeholder=" " value="<?php echo $credentials; ?>"readonly>
                <input class="credentials" id="rodj" name="scanned" placeholder=" " value="<?php echo $credentials; ?>"readonly>
            </div>

            <div class="statuses">
                        <div id="status" name="status">
                            <?php 
                            echo $statusStud;
                            ?>
                        </div>
                        <!-- <input type="text" name="txt" value="Hello" onchange="myFunction(this.value)"> -->
            </div>
        </form> 

        <div class="row, camera">
            <div class="col">
                <div style="width:45%;" id="reader"></div>
            </div>
            
        <script type="text/javascript">    
            function onScanSuccess(qrCodeMessage) {
                // alert(qrCodeMessage);
                document.getElementById('result').value = qrCodeMessage;
                document.getElementById('rodj').value = qrCodeMessage;
                // document.getElementById('QRScanned').value = qrCodeMessage;
                document.forms[0].submit();
            }

            function onScanError(errorMessage) {
            //handle scan error
            }

            console.log(document.getElementById('result').innerText);

            function check(){
                var cookieValue = document.getElementById('result').getAttribute('value');
                alert(cookieValue);
                // if( document.getElementById('result').innerHTML == '___________________'){
                //     console.log("ito");
                // }
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", { fps: 10, qrbox: 300 });
            html5QrcodeScanner.render(onScanSuccess, onScanError);

            
            // Check browser support
            if (typeof(Storage) !== "undefined") {
                // Store
                localStorage.setItem("stats", "<?php echo $statusStud ;  ?>");
                // Retrieve
                document.getElementById("status").innerHTML = localStorage.getItem("stats");
                } else {
                document.getElementById("status").innerHTML = "Sorry, your browser does not support Web Storage...";
            }

        </script>
    </body>
</html>