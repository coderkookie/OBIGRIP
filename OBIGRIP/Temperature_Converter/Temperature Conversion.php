<?php 
    $area = $html = $infotext = $sel1 = $sel2 = $sel3 = "";
    $num1 = isset($_POST['txtNum1']) ? floatval($_POST['txtNum1']) : "";
    $visibility = "visibility_off";
    $frmArea = isset($_GET['selectArea']) ? $_GET['selectArea'] : '';
    if(isset($_GET['selectArea'])) {
        $visibility = "visibility_on";
        switch ($frmArea) {
            case "ctof":
                $sel1 = "selected";
                $html = '<h2>Celsius &#8594; Fahrenheit Converter</h2>
                        <label for="txtNum1"><b>Input Temparature in &#8451;:</b></label>
                        <input type="number" name="txtNum1" id="txtNum1" value="'.$num1.'" required>';
                if(isset($_POST['btnConvert'])) {
                    $temp = round((($num1 * (9/5))+32), 2);
                    $infotext = '<div class="answer">(<span class="blueText">'.$num1.'</span> x <sup>9</sup>&#8260;<sub>5</sub>) + 32 = '.$temp.' &#8457;</div>';
                }
                break;
            case "ftoc":
                $sel2 = "selected";
                $html = '<h2>Fahrenheit &#8594; Celsius Converter</h2>
                        <label for="txtNum1"><b>Input Temparature in &#8457;:</b></label>
                        <input type="number" name="txtNum1" id="txtNum1" value="'.$num1.'" required>';
                if(isset($_POST['btnConvert'])) {
                    $temp = round((($num1 - 32) * (5/9)), 2);
                    $infotext = '<div class="answer">(<span class="blueText">'.$num1.'</span> - 32) x <sup>5</sup>&#8260;<sub>9</sub> = '.$temp.' &#8451;</div>';
                }
                break;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Temperature Converter in PHP</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <div class="container">
                <h1>Temperature Converter</h1>
            </div>

            <div class="container">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="frmTempSelect">
                    <label for="selectArea"><b>Select Unit of Temperature:</b></label>
                    <select name="selectArea" id="selectArea" value="<?php echo $oper; ?>" required>
                        <option value="ctof" <?php echo $sel1; ?>>Celsius &#8594; Fahrenheit</option>
                        <option value="ftoc" <?php echo $sel2; ?>>Fahrenheit &#8594; Celsius</option>
                    </select>

                    <button type="submit" class="btnSelectShape">Select</button>
                </form>
            </div>

            
            <div class="container <?php echo $visibility; ?>">
                <form action="" method="post" class="frmAreaCalculate">
                    <?php echo $html; ?>
                    
                    <div class="btnWrapper">
                        <a href="Temperature Conversion.php" type="button" name="btnReset" class="btnReset">Reset</a>
                        <button type="submit" name="btnConvert" class="btnConvert">Convert</button>
                    </div>

                    <?php echo $infotext; ?>
                </form>
            </div>
        </main>
    </body>
</html>