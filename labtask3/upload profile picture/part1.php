<!DOCTYPE html> 

<html style="box-sizing: border-box;">

<head>

<style>
    .error {color: #FF0000;}
</style>

</head>

<body style="background-color: white;border: 4px solid black;width:300px;margin: 0 auto;padding: 5px;">

    <div class="profilepic">

        <form action="page2/part2.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend><B>PROFILE PICTURE</B></legend> <br>

                <div class="uploadpic">
                    <img src="page2/uploadpicture.png" style="width: 250px; height: 200px;"><br><br>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>

                <br>

                <hr>

                <input type="submit" name="submit">
        </form>

            </fieldset>

    </div>


</body>

</html>