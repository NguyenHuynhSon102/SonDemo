<!DOCTYPE html>
<html>
    <head>
        <title>Lab 8</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <head>
    <body>
        <div class = "container mt-3 mb-3">
            <h2>Simple basic operation</h2>
        <?php
        //var_dump($_GET);
        $result ='';
        if (isset($_GET['calculate']))
        {
            // Step 1: Get data from your Form
                $a = isset($_GET['a']) ? (float)trim($_GET['a']) : '';
                $b = isset($_GET['b']) ? (float)trim($_GET['b']) : '';
                $op = $_GET['operation'];

            // Step 2: Validate into
            if($a == '')
            {
                $result = 'You did not enter the first number';
            }
            else if ($b == '')
            {
                $result = 'You did not enter the second number';
            }
            else
            {
                if($op=="sum")
                {
                    $result = $a.'+'.$b.'='.($a+$b);
                }
            }
        }
        else
        {
            $result = 'Nothing';
        }
        ?>
            <form class="form-group" method="get">
                <div class = "mb-3">
                    <select class = "form-select" name="operation">
                        <option select>Operation</option>
                        <option value = "sum">Sum</option>
                        <option value = "sub">Subtract</option>
                    </select>
                </div>
                <div class = "form-floating mb-3">
                    <input type = "number" class ="form-control" id="a" name="a" value="">
                    <label for="floatingInput">First Number</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" id="b" name="b" value="">
                    <label for="floatingPassword">Second Number</label>
                </div>
                <br>
                <h4>
                    <span class="badge bg-success"><?php echo $result; ?></span>
                </h4>
                <div class="mb-3">
                    <input type ="text" disabled="disabled" readonly
                    class="form-control" id="re" name="re" value="<?= $result ?>">
                </div>                
                <button type="submit" class="btn btn-primary btn-md" name="calculate">Calculate</button>

            </form>
        </div>
    <body>
</html>