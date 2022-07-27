<?php

function getCountOfDonationsByMonth($year){
    $connection = mysqli_connect('localhost','root','','samadhi');
    $donationCounts = array();

    $januarySql = "SELECT COUNT(id) AS january FROM `donationcashdetails` WHERE MONTH(date)=1 AND YEAR(date)='$year'";
    $februarySql = "SELECT COUNT(id) AS february FROM `donationcashdetails` WHERE MONTH(date)=2 AND YEAR(date)='$year'";
    $marchSql = "SELECT COUNT(id) AS march FROM `donationcashdetails` WHERE MONTH(date)=3 AND YEAR(date)='$year'";
    $aprilSql = "SELECT COUNT(id) AS april FROM `donationcashdetails` WHERE MONTH(date)=4 AND YEAR(date)='$year'";
    $maySql = "SELECT COUNT(id) AS may FROM `donationcashdetails` WHERE MONTH(date)=5 AND YEAR(date)='$year'";
    $juneSql = "SELECT COUNT(id) AS june FROM `donationcashdetails` WHERE MONTH(date)=6 AND YEAR(date)='$year'";
    $julySql = "SELECT COUNT(id) AS july FROM `donationcashdetails` WHERE MONTH(date)=7 AND YEAR(date)='$year'";
    $augustSql = "SELECT COUNT(id) AS august FROM `donationcashdetails` WHERE MONTH(date)=8 AND YEAR(date)='$year'";
    $septemberSql = "SELECT COUNT(id) AS september FROM `donationcashdetails` WHERE MONTH(date)=9 AND YEAR(date)='$year'";
    $octoberSql = "SELECT COUNT(id) AS october FROM `donationcashdetails` WHERE MONTH(date)=10 AND YEAR(date)='$year'";
    $novemberSql = "SELECT COUNT(id) AS november FROM `donationcashdetails` WHERE MONTH(date)=11 AND YEAR(date)='$year'";
    $decemberSql = "SELECT COUNT(id) AS december FROM `donationcashdetails` WHERE MONTH(date)=12 AND YEAR(date)='$year'";


    $result = mysqli_query($connection,$januarySql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['january'] = $totalCashArray['january'];

    $result = mysqli_query($connection,$februarySql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['february'] = $totalCashArray['february'];
    
    $result = mysqli_query($connection,$marchSql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['march'] = $totalCashArray['march'];

    $result = mysqli_query($connection,$aprilSql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['april'] = $totalCashArray['april'];

    $result = mysqli_query($connection,$maySql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['may'] = $totalCashArray['may'];

    $result = mysqli_query($connection,$juneSql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['june'] = $totalCashArray['june'];

    $result = mysqli_query($connection,$julySql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['july'] = $totalCashArray['july'];

    $result = mysqli_query($connection,$augustSql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['august'] = $totalCashArray['august'];
    
    $result = mysqli_query($connection,$septemberSql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['september'] = $totalCashArray['september'];

    $result = mysqli_query($connection,$octoberSql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['october'] = $totalCashArray['october'];

    $result = mysqli_query($connection,$novemberSql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['november'] = $totalCashArray['november'];

    $result = mysqli_query($connection,$decemberSql);
    $totalCashArray = mysqli_fetch_assoc($result);
    $donationCounts['december'] = $totalCashArray['december'];

    return $donationCounts;

}




?>