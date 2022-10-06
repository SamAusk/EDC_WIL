<!-- PS. some class or role could be merely a dummy -->
<?php 
    include('config.php');
?>
<!-- Role as main section -->
<main role="main">
    <div data-asset-id="104682" class="slab cssbg  cssbg-middle" style="background-image: url(https://pbs.twimg.com/media/E1-92nSVIAUjqIx?format=jpg&name=4096x4096);
        background-size: contain; background-size: auto;">

        <div class="inner">
            <div class="flex a-bottom a-right v-gu5">
                <div class="banner card gu5 a-left ">
                    <h1>Search your opportunies</h1>
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
                    <p class="intro accent">Build your employability skills and experience beyond the classroom
                    </p>
                </div>
                <div class="gu8 t-gu12">
                    <p> At griffith Univeristy We offer Diverse range of Projects Oppurtutnity for all.</p>
                    <p>Explore the many ways you can improve your employability while you study by searching for
                        opportunities using the Enrich &lsquo;Find Your Opportunity&rsquo; search tool.</p>
                    <p>This project applied for the WIL porject </p>
                    <p>Remember to use your portfolio to record and reflect on these experiences. It will help you to
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
                                            if(isset($_POST['Type']))
                                                $checked = $_POST['Type'];
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
                            $branchecked  = [];
                            $branchecked = $_POST['Type'];
                            $brands = join(",",$branchecked);
                            
                            $products = "SELECT * FROM Primary_Page WHERE Type_ID IN ($brands)";
                            $products_run = mysqli_query($con, $products);
                            if(mysqli_num_rows($products_run) > 0)
                            {
                                foreach($products_run as $proditems){ ?>
                        <div class="card shadow primary opaque remarkable-stories border-light"
                            style="padding-top:15px;">
                            <h5 id="left"><b><?= $proditems['Project_Title']; ?></b></h5>
                            <p id="left"><?= $proditems['Project_Description']; ?></p>
                            <p id="left"><i><?= $proditems['Email']; ?></i></p>
                            <p id="right"><?= $proditems['Location_Name']; ?></p>
                        </div>
                        <?php } ?>
                        <?php   }else{
                                echo "No Items Found";
                            }
                        }else{
                            $products = "SELECT * FROM Primary_Page GROUP BY Project_ID";
                            $products_run = mysqli_query($con, $products);
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



        <!-- here is ADD AN ACTIVITY line -->
        <div class="slab puff secondary">
            <div class="inner gu10">
                <div class="flex a-left">
                    <div class="card cssbg cssbg-middle gu5 v-16-9" style="background-image: url(https://png.pngitem.com/pimgs/s/181-1814313_transparent-umaru-chan-png-himouto-umaru-chan-png.png);
                        background-size: contain; height:300px; width:300px;">
                    </div>
                    <div class="gu1"></div>
                    <div class="gu6">
                        <h2 class="feature">ADVICE GRIFFIH ALUMNI</h2>
                        <p>Stay connect with your university during and after your study journey</p>
                        <p>Acquiring more information from Griffith Alumni is one of the option to solve your delimma regards to project advice</p>
                        <p>These activities must provide opportunities for students to develop their <a
                                href="https://www.griffith.edu.au/the-griffith-graduate"><i>Griffith Graduate</a>.</i>
                        </p>
                        <p>If you have an event you wish to know more information of Griffith's Alumni, the link is down below</p>
                        
                        <p class="btn feature">
                            <a href="https://www.griffith.edu.au/advancement/alumni"
                                class="">Alumni</a>
                        </p>
                    </div>
                    <!--/.gu6-->
                </div>
                <!--/.flex-->
            </div>
            <!--/.inner-->
        </div><!-- /.slab -->
        <div class="slab puff primary">
            <div class="inner gu10">
                <div class="flex a-left ">
                    <div class="card cssbg cssbg-middle gu5 v-16-9"
                        style="background-image: url(https://www.griffith.edu.au/__data/assets/image/0038/88589/varieties/gu5.jpg);">
                    </div>
                    <div class="gu1"></div>
                    <div class="gu6">
                        <h2 class="feature">PREPARING YOUR EPORTFOLIO</h2>
                        <p>Increase your chances of graduate employment by documenting your skills and attributes as you
                            work through your studies.</p>
                        <p>Use your ePortfolio to record your personal and professional achievements.</p>
                        <p class="btn auto feature a-left"><a
                                href="https://www.griffith.edu.au/learning-futures/pebblepad">Discover more</a></p>
                    </div>
                    <!--/.gu6-->
                </div>
                <!--/.flex-->
            </div>
            <!--/.inner-->
        </div><!-- /.slab -->
        <div class="slab puff">
            <div class="inner gu12">
                <div class="flex a-left ">
                    <div class="card cssbg cssbg-middle gu5 v-16-9"
                        style="background-image: url(https://www.griffith.edu.au/__data/assets/image/0017/1150910/varieties/gu5.jpg);">
                    </div>
                    <div class="gu1"></div>
                    <div class="gu6">
                        <h2 class="feature">PUT YOUR KNOWLEDGE INTO PRACTICE</h2>

                        <p>Apply theory to practice with work-integrated learning experiences through work placements,
                            internships and projects.</p>
                        <p>Use your experience to improve your resume, expand your network and find opportunities.</p>
                        <p class="btn auto feature a-left"><a
                                href="https://www.griffith.edu.au/enrich-your-studies/work-integrated-learning">Discover
                                more</a></p>
                    </div>
                    <!--/.gu6-->
                </div>
                <!--/.flex-->
            </div>
            <!--/.inner-->
        </div><!-- /.slab -->
        <div class="slab puff secondary   ">
            <div class="inner gu10">
                <div class="flex a-middle ">
                    <div class="gu4">
                        <h2 class="feature a-left">QUESTIONS</h2>
                    </div>
                    <div class="gu4">
                        <p class="feature a-center">Ask Us has answers to your questions 24/7</p>
                    </div>
                    <div class="gu4">
                        <p class="btn none auto a-center feature">
                            <a href="https://studenthelp.secure.griffith.edu.au/" class="">Find out more</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
</main>