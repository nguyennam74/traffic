<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">

    
    <link href="<?=base_url()?>vendor/css/styleSliders.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>vendor/css/styleTrafficSimulationDe.css" 
          rel="stylesheet" type="text/css"/>
    <script type="text/javascript" 
            src="http://code.jquery.com/jquery-1.5.1.min.js">
    </script>

<title>Uphill</title>
</head>


<body>
  
<!-- ############################################## -->
<!-- outer container                                -->
<!-- ############################################## -->

<div id="container">


<!-- ############################################## -->
<!-- header: title image loaded as background image via css -->
<!-- ############################################## -->

<div id="header"> 
  <img class="title" src="<?=base_url()?>figs/title.png"  width="100%"/>
</div> 


<!-- ############################################## -->
<!-- Buttons                                        -->
<!-- ############################################## -->

<!-- redirects to other scenarios, defines myRedirectX -->
<script src="<?=base_url()?>vendor/js/redirect.js" type="text/javascript"></script>

<div id="startStopDiv"><img id="startStop" width="100%" 
     src="<?=base_url()?>figs/buttonStop3_small.png" onclick="myStartStopFunction()"/>
</div>

<div id="infoDiv"><img width="100%" 
     src="<?=base_url()?>figs/infoBlue.png" onclick="showInfo()"/>
</div>


<div id="lanePlusDiv"><img width="100%" 
     src="<?=base_url()?>figs/autobahn_plus.png" onclick="addOneLane()"/>
</div>

<div id="laneMinusDiv"><img width="100%" 
     src="<?=base_url()?>figs/autobahn_minus.png" onclick="subtractOneLane()"/>
</div>



<!-- redirects to other scenarios, defines myRedirectX -->
<script src="<?=base_url()?>vendor/js/redirect.js" type="text/javascript"></script>

<div id="scenarios">
<center>
 <br>
<img width="18%" src="<?=base_url()?>figs/iconRing_small.jpg" 
                 onclick="myRedirectRing()"/>
<img width="20%" src="<?=base_url()?>figs/iconOnrampFig_small.jpg" 
                 onclick="myRedirectOnramp()"/>
<img width="20%" src="<?=base_url()?>figs/iconOfframpFig_small.jpg" 
                 onclick="myRedirectOfframp()"/>
<img width="20%" src="<?=base_url()?>figs/iconRoadworksFig_small.jpg" 
                 onclick="myRedirectRoadworks()"/>
<img width="20%" src="<?=base_url()?>figs/iconUphillFig_small.jpg" 
                 onclick="myRedirectUphill()"/>
<img width="20%" src="<?=base_url()?>figs/iconRoutingFig_small.jpg" 
                 onclick="myRedirectRouting()"/>
<img width="22%" src="<?=base_url()?>figs/iconRoundabout_small.jpg" 
                 onclick="myRedirectRoundabout()"/>
</center>
</div> 

<!-- ############################################## -->
<!-- the actual simulation canvas -->
<!-- ############################################## -->

<div id="contents">
  <canvas id="canvas"
          onmouseenter="handleMouseEnter(event)"
          onmousemove="handleMouseMove(event)"
          onmousedown="handleMouseDown(event)"
          onmouseup="handleMouseUp(event)" 
          onclick="handleClick(event)"
          onmouseout="cancelActivities(event)"
          style="border:1px solid #d3d3d3;">
 
    Your browser does not support the HTML5 canvas tag.
  </canvas>
</div>


<!-- ################################################# -->
<!-- Copyright/impressum                               -->
<!-- ################################################# -->


<div id="buttonsInsideSimulations">
<center>
  <button id="overtakingBan" class="action" 
    onclick="toggleTruckOvertakingBan()">
    Enforce Truck Overtaking Ban
  </button>
</center>
</div> 


<!-- ################################################# -->
<!-- Sliders
<!-- ################################################# -->

<div id="sliders">
<center>
  <table>
    <td style="width: 150px">
<!-- ######################################################## -->
      <h3>Traffic Flow and General</h3>
      <!-- ######################################################## -->

      <table id="mainTable" border="0" cellspacing="1" cellpadding="0" >

      <tr>
      <td class="important"> Uphill Truck v<sub>0</sub></td>
        <td> <input id="slider_IDM_v0Up" type="range" 
                    min="20" max="80" step="10"></td>
        <td> <div id="slider_IDM_v0UpVal"></div> </td>
      </tr>


      <tr>
        <td>Truck Perc</td>
        <td> <input id="slider_truckFrac" type="range" 
                    min="0" max="50" step="1"></td>
        <td> <div id="slider_truckFracVal"></div> </td>
      </tr>

      <tr>
        <td>Inflow</td>
        <td> <input id="slider_qIn" type="range" 
                    min="0" max="3600" step="10"></td>
        <td> <div id="slider_qInVal"></div> </td>
      </tr>


      <tr>
        <td>Timewarp</td>
        <td> <input id="slider_timewarp" type="range" 
                    min="0.2" max="20" step="0.1"></td>
        <td> <div id="slider_timewarpVal"></div> </td>
      </tr>
      </table>
    </td>
    <td style="width: 150px">
      <!-- ######################################################## -->
      <h3>Car-Following Behavior</h3>
      <!-- ######################################################## -->

      <table id="mainTable" border="0" cellspacing="1" cellpadding="0" >

      <tr>
        <td class="important">Max Accel a</td>
        <td> <input id="slider_IDM_a" type="range" 
                    min="0.3" max="4" step="0.1"></td>
        <td> <div id="slider_IDM_aVal"></div> </td>
      </tr>


      <tr>
        <td>Max Speed v</sub>0</td>
        <td> <input id="slider_IDM_v0" type="range" 
                    min="20" max="160" step="1"></td>
        <td> <div id="slider_IDM_v0Val"></div> </td>
      </tr>

      <tr>
        <td>Time Gap T</td>
        <td> <input id="slider_IDM_T" type="range" 
                    min="0.6" max="3" step="0.1"></td>
        <td> <div id="slider_IDM_TVal"></div> </td>
      </tr>
      </table>
    </td>


<!-- ######################################################## -->
<!--<img src="figs/Lane-Changing_Behavior.png" width="60%"/>-->
    <td style="width: 150px">
      <h3>Lane-Changing Behavior</h3>
      <!-- ######################################################## -->

      <table id="mainTable" border="0" cellspacing="1" cellpadding="0" >
      <tr>
        <td>Politeness</td>
        <td> <input id="slider_MOBIL_p" type="range" 
                    min="-0.2" max="1" step="0.1"></td>
        <td> <div id="slider_MOBIL_pVal"></div> </td>
      </tr>

      <tr>
        <td>LC Threshold</td>
        <td> <input id="slider_MOBIL_bThr" type="range" 
                    min="-0.1" max="1" step="0.1"></td>
        <td> <div id="slider_MOBIL_bThrVal"></div> </td>
      </tr>

      <tr>
        <td>Right Bias Cars</td>
        <td> <input id="slider_MOBIL_bBiasRight_car" type="range" 
                    min="-1" max="2" step="0.1"></td>
        <td> <div id="slider_MOBIL_bBiasRight_carVal"></div> </td>
      </tr>

      <tr>
        <td>Right Bias Trucks</td>
        <td> <input id="slider_MOBIL_bBiasRight_truck" type="range" 
                    min="-1" max="2" step="0.1"></td>
        <td> <div id="slider_MOBIL_bBiasRight_truckVal"></div> </td>
      </tr>
      </table>
    </td>


<br>
</center>
</div>   <!-- id="sliders">-->




</div> <!-- end outer container -->


<script src="<?=base_url()?>vendor/js/control_gui.js"></script> 
<script src="<?=base_url()?>vendor/js/timeView.js" type="text/javascript"></script>
<script src="<?=base_url()?>vendor/js/media.js" type="text/javascript"></script>

<script src="<?=base_url()?>vendor/js/canvas_gui.js"></script> 
<script src="<?=base_url()?>vendor/js/vehicleDepot.js"></script> 
<script src="<?=base_url()?>vendor/js/colormanip.js"></script>

<script src="<?=base_url()?>vendor/js/models.js"></script> 
<script src="<?=base_url()?>vendor/js/vehicle.js"></script>
<!--<script src="js/myMath.js"></script> -->

<script src="<?=base_url()?>vendor/js/paths.js"></script>
<script src="<?=base_url()?>vendor/js/road.js"></script>
<script src="<?=base_url()?>vendor/js/stationaryDetector.js"></script> 

<!-- PROJ--> <script src="<?=base_url()?>vendor/js/uphill.js"></script> 

</body>
</html>
