<link rel="stylesheet" href="style.css">
<style>
.spre 
{
  margin-left:900px;
  border: 2px solid white;
  padding: 4px 12px 16px 12px;
  color:indigo;
  background-color:white;
  height: 35px;
  border-radius: 10px;
}

#builder {
  width: 90%;
  height: 900px;
  display: flex;
  flex-wrap: wrap;
  margin: auto;
}

#builder div {
  width: 16.66%;
  height: 50px;
  flex:19%;
  
}

.pick h4
{
  text-align: left;
  margin-bottom: 4px;
  margin-top: 35px;
  
}

.pick hr
{
  background-color:white;
  border: 2px solid white;
  border-radius: 2px;
  margin-top:0px;
}

.pick button{
  margin:10px;
  border: 2px solid white;
  padding:4px;
  color:indigo;
  background-color:white;
}

.icon
{
  width: 10%;
  list-style-type:none;
  margin-top: 30px;
  height:100px;
}

.icon img
{
  height: 110px;
}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PC Builder') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo-900 h-full overflow-hidden shadow-sm sm:rounded-lg">
                <div style="color:white;">

                <?php
                    $username = "root";
                    $password = "root";
                    $database = "cp_db";
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                    $querycpu = "SELECT p.cpu as cid,cpu.model_name as cname,cpu.price as cp FROM `pc_builders` as p inner join `cpus` as cpu on p.cpu = cpu.id";
                    $querymobo = "SELECT p.motherboard as mid,mobo.name as mname,mobo.price as mp FROM `pc_builders` as p inner join `motherboards` as mobo on p.motherboard = mobo.id";  
                    $queryram = "SELECT p.ram as rid,ram.name as rname,ram.price as rp FROM `pc_builders` as p inner join `rams` as ram on p.ram = ram.id";
                    $querygpu = "SELECT p.gpu as gid,gpu.name as gname,gpu.price as gp FROM `pc_builders` as p inner join `gpus` as gpu on p.gpu = gpu.id";
                    $queryhdd = "SELECT p.storage as hid,hdd.name as hname,hdd.price as hp FROM `pc_builders` as p inner join `storages` as hdd on p.storage = hdd.id";
                    $querypsu = "SELECT p.psu as pid,psu.name as pname,psu.price as pp FROM `pc_builders` as p inner join `psus` as psu on p.psu = psu.id";

                if ($result = $mysqli->query($querycpu)) {
                    while ($row = $result->fetch_assoc()) {
                        $cpuid = $row["cid"];
                        $cpuname = $row["cname"];
                        $cpuprice= "RM".$row["cp"];
  
                    }
                    $result->free();
                }
                if ($result = $mysqli->query($querymobo)) {
                  while ($row = $result->fetch_assoc()) {
                        $moboid = $row["mid"];
                        $moboname = $row["mname"];
                        $moboprice= "RM".$row["mp"];
                        
                    }
                    $result->free();
                }
                if ($result = $mysqli->query($queryram)) {
                  while ($row = $result->fetch_assoc()) {
                        $ramid = $row["rid"];
                        $ramname = $row["rname"];
                        $ramprice= "RM".$row["rp"];
                        
                    }
                    $result->free();
                }
                if ($result = $mysqli->query($querygpu)) {
                  while ($row = $result->fetch_assoc()) {
                      $gpuid = $row["gid"];
                      $gpuname = $row["gname"];
                      $gpuprice= "RM".$row["gp"];
                    }
                  }
                else
                  $gpuid = NULL; 
                  $result->free();
                      
                    
                      
                  
                  
              
               
              if ($result = $mysqli->query($queryhdd)) {
                while ($row = $result->fetch_assoc()) {
                    $hddid = $row["hid"];
                    $hddname = $row["hname"];
                    $hddprice= "RM".$row["hp"];
                    
                }
                $result->free();
            }
            if ($result = $mysqli->query($querypsu)) {
              while ($row = $result->fetch_assoc()) {
                  $psuid = $row["pid"];
                  $psuname = $row["pname"];
                  $psuprice= "RM".$row["pp"];
                  
                }
                $result->free();
            }
            ?>

<div class="textBox">
  <p style="text-align:center;margin-top:40px;margin-bottom:40px;">Choose any computer parts that you want to estimate the total prices.</p>
    <center><hr width="80%" style="background-color:white;border: 1.5px solid white;"></center>
    <form action="">
    @csrf
    <div id="builder">
        <div class="pick">
          <h4>CPU</h4>
              <hr>
              <?php
              if( $cpuid ){
                echo "$cpuname &nbsp&nbsp&nbsp $cpuprice";
                echo "<input hidden value=".$cpuid." placeholder=".$cpuname. "&nbsp&nbsp&nbsp" .$cpuprice.">";
              }
              else
            echo "<a href>
              <button>
                Choose a CPU +
              </button>
            </a>";
            ?>
            <h4>Motherboard</h4>
            <hr>
            <?php
              if( $moboid ){
                echo "$moboname &nbsp&nbsp&nbsp $moboprice";
                echo "<input hidden value=".$moboid." placeholder=".$moboname. "&nbsp&nbsp&nbsp" .$moboprice.">";
              }
              else
            echo "<a href>
              <button>
                Choose a Motherboard +
              </button>
            </a>";
            ?>
            <h4>RAM</h4>
              <hr>
            <?php
              if( $ramid ){
                echo "$ramname &nbsp&nbsp&nbsp $ramprice";
                echo "<input hidden value=".$ramid." placeholder=".$ramname. "&nbsp&nbsp&nbsp" .$ramprice.">";
              }
              else
            echo "<a href>
              <button>
                Choose a RAM +
              </button>
            </a>";
            ?>
        </div>
        <div class="icon">
            <center><li><img style="width: 40%;" src="{{ asset('Images/cpu.svg') }}"></li></center>
            <center><li><img style="width: 40%;" src="{{ asset('Images/mobo.svg') }}"> </li></center> 
            <center><li><img style="width: 40%;" src="{{ asset('Images/ram.svg') }}"> </li> </center> 
        </div>
      
      <div>
        <center><img style="width: 80%;margin-top: 35px;" src="{{ asset('Images/PC.svg') }}"></center>
      </div>
      
      <div class="icon">
            <center><li><img style="width: 40%;" src="{{ asset('Images/gpu.svg') }}"></li></center>
            <center><li><img style="width: 40%;" src="{{ asset('Images/hdd.svg') }}"> </li></center> 
            <center><li><img style="width: 40%;" src="{{ asset('Images/psu.svg') }}"> </li> </center>
      </div>

      <div class="pick">
        <h4>GPU</h4>
        <hr>
        <?php
              if( $gpuid ){
                echo "$gpuname &nbsp&nbsp&nbsp $gpuprice";
                echo "<input hidden value=".$gpuid." placeholder=".$gpuname. "&nbsp&nbsp&nbsp" .$gpuprice.">";
              }
              else
            echo "<a href>
              <button>
                Choose a GPU +
              </button>
            </a>";
            ?>
        <h4>Storage</h4>
        <hr>
        <?php
              if( $hddid ){
                echo "$hddname &nbsp&nbsp&nbsp $hddprice";
                echo "<input hidden value=".$hddid." placeholder=".$hddname. "&nbsp&nbsp&nbsp" .$hddprice.">";
              }
              else
            echo "<a href>
              <button>
                Choose a Storage +
              </button>
            </a>";
            ?>
        <h4>PSU</h4>
            <hr>
            <?php
              if( $psuid ){
                echo "$psuname &nbsp&nbsp&nbsp $psuprice";
                echo "<input hidden value=".$psuid." placeholder=".$psuname. "&nbsp&nbsp&nbsp" .$psuprice.">";
              }
              else
            echo "<a href>
              <button>
                Choose a PSU +
              </button>
            </a>";
            ?>
      </div>

      @auth
        
        <a class="spre" href="">
          <button type="button">Save Preset</button>
        </a>
        
        @else
        <a class="spre" href="">
          <button disabled type="button">Save Preset</button>
        </a>
        @endauth

    </div>
    </form>

    
</div>
 
                    

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

