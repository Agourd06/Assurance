<?php

require_once("../controllers/PrimeDashBoard.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <title>Claims</title>


</head>

<body>


    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="images/Logoag.png" class="h-[60px]" alt="Agourd assurance" />
                <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Ago assurance</span> -->
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                    <li>
                        <a href="index.html" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
                    </li>
                    <li>
                        <a href="client.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Clients</a>
                    </li>
                    <li>
                        <a href="Assureure.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Assurances</a>
                    </li>
                    <li>
                        <a href="Article.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Articles</a>
                    </li>
                    <li>
                        <a href="claim.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Claims</a>
                    </li>
                    <li>
                        <a href="prime.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Prime</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="h-[15vh] w-[81%] m-auto flex items-center justify-between">
        <span class="text-transparent bg-clip-text bg-gradient-to-r text-[50px] font-bold to-blue-800 from-sky-400">Primes</span>

        <button type="button" id="adduser" class="text-white gap-[10px] bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add Primes
            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24">
                <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
            </svg>
        </button>

    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <table id="clientTable" class="min-w-full bg-white text-center border border-gray-300 divide-y divide-gray-200">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        ID PRIME
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Amounts
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Update DATE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Claim ID
                    </th>

                    <th scope="col" class="text-center px-6 py-3">
                        Actions
                    </th>

                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($AffichePrime as $affichage) :


                ?>
                    <tr class="bg-white border-b text-center dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="  text-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                            <div class="px-1 py-4">
                                <div class="text-base font-semibold"><?php echo $affichage->getPremium_ID(); ?></div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $affichage->getAmount(); ?> MAD </td>
                        <td class="px-6 py-4">
                            <div class="font-normal text-gray-500"><?php echo $affichage->getDatePrime(); ?> </div>

                        </td>
                        <td class="px-6 py-4">
                            <div class="font-normal text-gray-500"><?php echo $affichage->getClaim_ID(); ?></div>

                        </td>
                        <td class="px-6 py-4 flex justify-center gap-[30px]">
                            <form action="../controllers/PrimeDashBoard.php" method="post">
                                <input type="hidden" name="editing" value="<?php echo $affichage->getPremium_ID(); ?>">
                                <button type="submit" name="edit" id="edit" value="<?php echo $affichage->getPremium_ID(); ?>"><svg class="h-8 w-8 text-blue-500" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                        <line x1="16" y1="5" x2="19" y2="8" />
                                    </svg>
                                </button>
                            </form>


                            <form action="../controllers/ClaimDashBoard.php" method="post"> <button type="submit" name="delete" value="<?php echo $affichage->getPremium_ID(); ?>"> <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg></button></form>


                            <form action="" method="post"> <button type="submit" name="view" value="<?php echo $affichage->getPremium_ID(); ?>"> <svg class="h-8 w-8 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg></button></form>

                        </td>

                    </tr>
                <?php
                endforeach;

                ?>
            </tbody>


        </table>
        <div id="overlay" class="hidden h-screen w-full fixed top-0 left-0 bg-black/10 flex justify-center items-center">

            <?php


            if (isset($_SESSION['editedPrimeData'])) {
                $Primedata = $_SESSION['editedPrimeData'];

                [$Amount] = $Primedata;
            ?>
                <script>
                    document.getElementById("overlay").classList.remove("hidden");
                </script>
            <?php
                unset($_SESSION['editedPrimeData']);
            }
            ?>

            <form action="../controllers/PrimeDashBoard.php" method="post" id="overlay-form" class="w-[50%] bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <?php if (isset($_SESSION['PrimeId'])) {
                        $id = $_SESSION['PrimeId'] ?>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Update Claim</h3>

                    <?php } else { ?>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Add Claim</h3>

                    <?php } ?>
                    <button type="button" id="remove" class=" text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" pointer-events="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>

                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prime Amount</label>
                            <input type="text" name="Amount" id="first-name" value="<?= $Amount ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="xxxxx MAD" required="">
                        </div>

                     

                        <div class="grid md:grid-cols-1 ">
                            <?php if (isset($_SESSION['PrimeId'])) {
                            } else { ?>
                                <select name="ClaimId" class="block w-[100px] py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <option class="text-center" value="">Claims</option>
                                    <?php foreach ($AffichClaims as $Claim) { ?>
                                        <option value="<?php echo $Claim["Claim_ID"] ?>">ID Claim : <?php echo $Claim["Claim_ID"] ?> / Article Title : <?php echo $Claim["Title"] ?> </option>
                                    <?php } ?>
                                </select>
                            <?php } ?>

                        </div>


                    </div>
                </div>


                <div class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                    <?php if (isset($_SESSION['PrimeId'])) {
                        $id = $_SESSION['PrimeId'] ?>
                        <button type="submit" name="update" value="<?= $id ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Edit all
                        </button>

                    <?php } else { ?>
                        <button type="submit" name="addprime" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add all
                        </button>
                    <?php } ?>

                </div>

            </form>

        </div>
    </div>
    <script src="js/main.js">

    </script>

    <script>
        $(document).ready(function() {
            $('#clientTable').DataTable();
        });
    </script>

</body>

</html>