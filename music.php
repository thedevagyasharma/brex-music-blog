<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Youtube Music</title>
</head>
    <body>

        <?php include"navbar.php"; ?>

        <div class="container-fluid news-row text-center">

            <div class="news-row-header">
                    <h5>MUSIC</h5>
            </div>
            <div class="news-row-header-line">
                        <h6>__________</h6>
            </div>

        <div class="row">
            <div class="col d-flex justify-content-center">
              <div>
                <form  class="form-inline">
                      <input type='text' id='search' value='' class='form-control' placeholder='Your favourite song...' autocomplete='off'/>
                      <input id='clickButton' type='submit' value='SEARCH' class='login-btn'>
                </form>
              </div>

            </div>
        </div>
        <div class="container" style="min-height:500px;">
            <div  class="row" id="results">

            </div>
        </div>
      </div>

      <?php include"footer.php"; ?>


        <!-- scripts -->
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="app.js"></script>
        <script src="https://apis.google.com/js/client.js?onload=init"></script>

    </body>
</html>
