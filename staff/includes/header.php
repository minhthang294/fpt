<!DOCTYPE html>
<html>

<head>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FPT</title>
    <link rel="icon" href="src/img/icon.png">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font-awesome -->
    <link rel="stylesheet" href="src/css/font-awesome-4.6.3/css/font-awesome.min.css">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="src/css/materialize.min.css" media="screen,projection" />
    <!-- animate css -->
    <link rel="stylesheet" href="src/css/animate.css-master/animate.min.css">
    <!-- Progress bar -->
    <link rel='stylesheet' href='src/css/nprogress.css' />
    <!-- My own style -->
    <link rel="stylesheet" href="src/css/style.css">
    <style>
      /* The side navigation menu */
      .sidenav {
        height: 100%;
        /* 100% Full-height */
        width: 0;
        /* 0 width - change this with JavaScript */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Stay on top */
        top: 0;
        /* Stay at the top */
        left: 0;
        background-color: #111;
        /* Black*/
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 60px;
        /* Place content 60px from the top */
        transition: 0.5s;
        /* 0.5 second transition effect to slide in the sidenav */
      }

      /* The navigation menu links */
      .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
      }

      /* When you mouse over the navigation links, change their color */
      .sidenav a:hover {
        color: #f1f1f1;
      }

      /* Position and style the close button (top right corner) */
      .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
      }

      /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
      #main {
        transition: margin-left .5s;
        padding: 20px;
      }

      /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
      @media screen and (max-height: 450px) {
        .sidenav {
          padding-top: 15px;
        }

        .sidenav a {
          font-size: 18px;
        }
      }
    </style>

  </head>

<body>