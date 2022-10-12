<!-- PS. some class or role could be merely a dummy -->
<?php 
    include('config.php');
?>
<!-- Role as main section -->
<main role="main">
    <div data-asset-id="104682" class="slab cssbg  cssbg-middle" style="background-image: url(https://s34386.pcdn.co/wp-content/uploads/2022/06/GC-Website-Banner-Applications-Open_NEW.jpg);
        background-size: contain;background-size:cover;">

        <div class="inner">
            <div class="flex a-bottom a-left v-gu5">
                <div class="banner card gu5 a-left ">
                    <h1>Search your opportunities</h1>
                </div>
            </div>
        </div>
        <style>

        /* Here is filter button */
        .button {
            border-radius: 20px;
            color: white;
            padding: 15px 28px;
            text-align: center;
            font-size: 100%;
            cursor: pointer;
            background-color: red;
            margin-left: 35px;
        }

        .button:hover {
            filter: brightness(85%);
        }
        </style>
    </div>
    <div class="slab puff">
        <div class="inner flex a-center">
            <div class="flex gu12 t-gu12">
                <div class="gu4 t-gu12">
                    <p class="intro accent">Find your opputunities to honed your skills.
                    </p>
                </div>
                <div class="gu8 t-gu12">
                    <p> At griffith Univeristy We offer Diverse range of Projects Oppurtutnity for all.</p>
                    <p>This project applied for the WIL porject </p>
                    <p> Remember to use your portfolio to record and reflect on these experiences. It will help you to
                        gain a competitive advantage among other graduates.</p>
                </div>
            </div>
        </div><!-- test -->
    </div>
    <div class="slab primary filter-list">
        <div class="inner">
            <h2 class="accent feature a-center gu12"> Seize Your Opportunity </h2>
            <p class="feature a-center"> Filter available opportunities down below </p>

            <div class="flex col-2">
                <div class="gu3">
                    <!-- filter section -->
                    <div class="filter-options">

                        <!-- Project Type checkbox -->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <!-- style="margin:30px 0 0 0" -->
                            <h3> Project Type
                                <button type="submit" class="button" name="btnSubmit" value="submit"> Search</button>
                            </h3>
                            <hr>
                            <?php 
                            $Type_query = "SELECT * FROM Project_Type";
                            $Type_query_run  = mysqli_query($con, $Type_query);
                            if(mysqli_num_rows($Type_query_run) > 0)
                            { ?>
                            <fieldset class="suppress-legend trim">
                                <ul>
                                    <?php
                                        foreach($Type_query_run as $Typelist)
                                        {
                                            $checked = [];
                                            if(isset($_POST['Type'])){
                                                $checked = $_POST['Type'];
                                            }
                                            ?>
                                    <li class="filter">
                                        <input type="checkbox" class="larger" name="Type[]"
                                            value="<?= $Typelist['Project_ID']; ?>"
                                            <?php if(isset($_POST['Type']) && in_array($Typelist['Project_ID'],$_POST['Type'])) echo 'checked="checked"'; ?>>
                                        <!-- <h3><?= $Typelist['Project_Type']; ?></h3> -->
                                        <label for="<?= $Typelist['Project_Type']; ?>"><?= $Typelist['Project_Type']; ?>
                                        </label>
                                        <!-- <?= $Typelist['Project_Type']; ?> <br /> -->
                                        <!-- ########################################################## -->
                                    </li>
                                    <?php } ?>
                                </ul>
                            </fieldset>
                            <hr>
                            <?php   }    ?>
                        </form>
                    </div>
                </div> <!-- Category Filter ends here.........  -->


                <div class="gu9">
                    <div class="flex col-3 filter-cards a-left">
                        <!-- Brand Item Product-->
                        <?php
                        if(isset($_POST['Type'])){
                            // Brand Item If here
                            $branchecked  = [];
                            $branchecked = $_POST['Type'];
                            $brands = join(",",$branchecked);

                            $products = "SELECT * FROM Primary_Page WHERE Type_ID IN ($brands)";
                            $products_run = mysqli_query($con, $products);
                            // here
                            if(mysqli_num_rows($products_run) > 0)
                            {
                                foreach($products_run as $proditems){ ?>
                        <div class="card shadow primary opaque remarkable-stories border-light"
                            style="padding-top:15px;">
                            <h5 id="left"><b><?= $proditems['Project_Title']; ?></b></h5>
                            <p id="left"><?= $proditems['Project_Description']; ?></p>
                            <p id="left"><i><?= $proditems['Email']; ?></i></p>
                            <h5 id="right"><?= $proditems['Location_Name']; ?></h5>
                        </div>
                        <?php } ?>
                        <?php   }else{
                                echo "No Items Found";
                            }
                        }else{
                            // products query here 
                            $products = "SELECT * FROM Primary_Page GROUP BY Project_ID";
                            $products_run = mysqli_query($con, $products);
                            // products run here
                            if(mysqli_num_rows($products_run) > 0)
                            {   
                                foreach($products_run as $proditems) :
                                    ?>
                        <div class="card shadow primary opaque remarkable-stories border-light"
                            style="padding-top:15px;">
                            <!-- here we print the list of the primarydata table -->
                            <h5 id="left"><b><?= $proditems['Project_Title']; ?></b></h5>
                            <p id="left"><?= $proditems['Project_Description']; ?></p>
                            <p id="left"><i><?= $proditems['Email']; ?></i></p>
                            <h5 id="right"><?= $proditems['Location_Name']; ?></h5>


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

                        <!-- Brand Item product -->
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
        #left {
            text-align: left;

        }

        #right {
            text-align: right;
        }

        .filter {
            padding: 7px;
            margin: auto;
        }

        input.larger {
            transform: scale(1.4);
            margin: 30px;
        }
        </style>



        <?php
            include('info.php');
        ?>
        
</main>