<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <title>Searchable Database Project By CreativeCloud</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://www.griffith.edu.au/_designs/css/plugins.css?v=1.1.6" rel="stylesheet" type="text/css" />
    <link href="https://www.griffith.edu.au/__data/assets/css_file_folder/0008/305/main.css?v=1.0.0" rel="stylesheet"
        type="text/css" />
    <script src="https://www.griffith.edu.au/__data/assets/js_file_folder/0016/367/plugins.js?v=0.22.1" defer></script>
    <script src="https://www.griffith.edu.au/__data/assets/js_file_folder/0015/366/main.js?v=0.86.1" defer></script>
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-52FN5W');
    </script>
</head>

<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-52FN5W" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript><!-- Google Tag Manager (noscript) -->

    <input type="hidden" name="token" value="620d355da1b7461d356d7a9b7a46ea2f723e54e5" class="sq-form-field"
        id="token" /> <!-- crsf -->

    <div class="slab">
        <div class="inner flex">
            <div class="logo">
                <p><a href="https://www.griffith.edu.au/" class="ir" tabindex="21">Griffith University</a></p>
            </div>
            <div class="mobile-menu overlay primary">
                <ul class="flex close">
                    <li><a href="" class="close" tabindex="20">Close</a></li>
                </ul>
            </div>
        </div>
        <main role="main">
            <div data-asset-id="104682" class="slab cssbg cssbg-middle" style="background-image: url(gif2.jpg);">
                <div class="inner">
                    <div class="flex a-bottom a-left v-gu6">
                        <div class="banner card gu5 a-left ">
                            <h1>Search Your Oppurtutnity</h1>
                            <h3>At griffith Univeristy We offer Diverse range of Projects Oppurtutnity for all </h3>

                        </div>
                    </div>
                </div>
                <style>
                .slab.pageinfo h1 {
                    display: none;
                }
                </style>
            </div>
            <div class="slab puff">
                <div class="inner flex a-center">
                    <div class="flex gu10 t-gu12">
                        <div class="gu4 t-gu12">
                            <p class="intro accent">Build your employability skills and experience beyond the
                                classroom</p>
                        </div>
                        <div class="gu8 t-gu12">
                            <p>Explore the many ways you can improve your Skills while you study by searching for
                                opportunities</p>
                        </div>
                    </div>
                    </head>

                    <!--Project Type checkbox display-->

                    <div class="col-md-3">
                        <form action="" method="GET">
                            <div class="card shadow mt-3">
                                <div class="card-header">
                                    <h5>Filter
                                        <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <h6>Project Type</h6>
                                    <hr>
                                    <?php
//Connection To the SQL Database
                            $con = mysqli_connect('localhost','sam','test1234','creative cloud');

// Sql query to fetch the Project Types From the Project_Type table  , and later we show it in checkboxes
                            $Type_query = "SELECT * FROM Project_Type";
                            $Type_query_run  = mysqli_query($con, $Type_query);

                            if(mysqli_num_rows($Type_query_run) > 0)
                            {
                                foreach($Type_query_run as $Typelist)
                                {
// The checked varibale checks what checkboxes has been selected on the pag by the user.
                                    $checked = [];
                                    if(isset($_GET['Type']))
                                    {
                                        $checked = $_GET['Type'];
                                    }
// below we Display all the checkboxes
                                    ?>

                                    <input type="checkbox" name="Type[]" value="<?= $Typelist['Project_ID']; ?>">
                                        <?php if(in_array($Typelist['Project_ID'], $checked)){ echo "checked"; } ?>
                                        <label for="<?= $Typelist['Project_Type']; ?>"><?= $Typelist['Project_Type']; ?>
                                    </label>
                                    <!-- below is just a printing code for what to show next to checkbox -->

                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Brands Found";
                            }
?>

                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Brand Items - Products -->
                    <div class="col-md-9 mt-3">
                        <div class="card ">
                            <div class="card-body row">
                                <?php
                        if(isset($_GET['Type']))
                        {
                            $branchecked  = [];
                            $branchecked = $_GET['Type'];

                            foreach($branchecked as $rowbrand)
                            {
                                $products = "SELECT * FROM Primary_Page WHERE Type_ID IN ($rowbrand)";
                                $products_run = mysqli_query($con, $products);
                                if(mysqli_num_rows($products_run) > 0)
                                {
                                    foreach($products_run as $proditems) :
                                        ?>
                                <div class="col-md-4 mt-3">
                                    <div class="border p-2">
                                        <h5><b><?= $proditems['Project_Title']; ?></b></h5>
                                        <h6><?= $proditems['Project_Description']; ?></h6>
                                        <h6><?= $proditems['Email']; ?></h6>
                                        <h6><?= $proditems['Location_Name']; ?></h6>
                                    </div>
                                </div>
                                <?php
                                    endforeach;
                                }
                            }                                




                        }
                        else
                        {
                            // here we get all the unique values from the primary data, and we have connection with protype
                            $products = "SELECT * FROM Primary_Page GROUP BY Project_ID";
                            $products_run = mysqli_query($con, $products);
                            if(mysqli_num_rows($products_run) > 0)
                            {
                                foreach($products_run as $proditems) :
                                    ?>
                                <div class="col-md-4 mt-3">
                                    <div class="border p-2">
                                        <!-- here we print the list of the primarydata table -->
                                        <h5><b><?= $proditems['Project_Title']; ?></b></h5>
                                        <h6><?= $proditems['Project_Description']; ?></h6>
                                        <h6><?= $proditems['Email']; ?></h6>
                                        <h6><?= $proditems['Location_Name']; ?></h6>
                                    </div>
                                </div>
                                <?php
                                endforeach;
                            }
                            else
                            {
                                echo "No Items Found";
                            }
                        }
                    ?>
                            </div>
                        </div>
                    </div>

                </div>
                <?php include('footer.php') ?>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> -->
            </script>
</body>

</html>