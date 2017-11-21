<?php

        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operators = $_POST['operators'];
        echo $operators;

            function calculate($num1, $num2, $operators) {

                switch($operators) {
                    case "+":
                        $total = $num1 + $num2;
                        break;
                    case "-":
                        $total = $num1 - $num2;
                        break;
                    case "*":
                        $total = $num1 * $num2;
                        break;
                    case "/":
                        $total = $num1 / $num2;
                        break;
                }


                return $total;

            }




        ?>

        <form action="machine.php" method="post">
             <input type="text" name="num1" size="10" />

             <select name="operators" required>
                 <option value="+">+</option>
                 <option value="-">-</option>
                 <option value=""></option>
                 <option value="/">/</option>
             </select>
             <input type="text" name="num2" size="10" />
             <input type="submit" name="submit" value="Calculate"/>
         </form>



        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (is_numeric($_POST['num1']) AND is_numeric($_POST['num2'])) {
                    $total = calculate($_POST['num1'], $_POST['num2'],$_POST["operators"]);
                    echo "<p>Total = $total</p>";
                }
            }

        ?>

    </body>