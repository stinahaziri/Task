<?php
session_start();

//kqyre a esht
$uploadedPhoto = isset($_SESSION['uploadedPhoto']) 
    ? "./php/images/" . $_SESSION['uploadedPhoto'] //boje bashk foton e sesionit me linkun
    : null; // qe jo null 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/vv.css" />
    <script
      src="https://kit.fontawesome.com/87caa0afe0.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="abortant icon"
      type="x-icon"
      href="./image/Capture1-removebg-preview (1).png"
    />
    <title>get demo</title>
  </head>
<body>
  <header>
    <div>
      <a href="index.html">
        <img class="logo" src="image/Capture-removebg-preview.png" alt="" />
      </a>
    </div>

    <input type="checkbox" id="check" />
    <label for="check" class="checkInput">
      <i class="fa-solid fa-bars"></i>
    </label>

    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="news1.html">News</a></li>
      <li><a href="cmimore.html">Pricing</a></li>
      <li><a href="contac.html">Contact</a></li>
    </ul>
    <?php if ($uploadedPhoto): ?>
        <!-- Display the uploaded image -->
        <img src="<?php echo htmlspecialchars($uploadedPhoto); ?>" class="acc" alt="Uploaded Photo" >
    <?php else: ?>
        <p>No photo uploaded!</p>
    <?php endif; ?>
    
  </header>


<div class="row">
  
  <div id="colOne">
    <div class="headerOne">
      <h1>Tasks</h1>
      <button id="btnn"><i class="fa-solid fa-plus"></i></i></button>
    </div>
    
    <!-- Task Cards will be added here -->
    <div id="cardContainer" class="checked"></div>
  </div>

  <!-- Modal for adding tasks -->
  <div id="minipage">
    <div id="content">
      <span id="spani">X</span>
      <div class="main">
      
        <form   action="php/task.php" method="post">
        <input id="mainInput"  name="mainInput" type="text" placeholder="Write something" />
        <button type="button"  id="btn">Add daily routine</button>
        <button type="submit" id="kryhet">Regjistro</button>
        </form>
      </div>
    </div>
  </div>

<!-- colTwo -->

<div class="colTwo">
  <div class="headerTwo">
    <h1>In Progress</h1>
    <i class="fa-solid fa-gear"></i>
  </div>
  <a href="infoTask.html">
    <div class="cardtwo">
      <div class="taskName">
        <h2>Attachment viewer</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>03:15:11/04:00:00</p>
      <meter id="file" value="100" max="100"></meter>
      <label class="labelColor" for="file">100%</label>
      <meter id="file" value="33" max="100"></meter>
      <label for="file">33%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/4.jpg" alt="" />
          <img src="image/1.jpg" alt="" />
          <img src="image/2.jpg" alt="" />
        </div>
        
      </div>
    </div>
  </a>
  <a href="infoTask.html">
    <div class="cardtwo">
      <div class="taskName">
        <h2>Table formatting</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>00:56:12/02:00:00</p>
      <meter id="file" value="75" max="100"></meter>
      <label for="file">75%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/3.jpg" alt="" />
          <img src="image/2.jpg" alt="" />
        </div>
      </div>
    </div>
  </a>
  <a href="infoTask.html">
    <div class="cardtwo">
      <div class="taskName">
        <h2>Login page</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>02:30:09/05:00:00</p>
      <meter id="file" value="25" max="100"></meter>
      <label for="file">25%</label>
      <meter id="file" value="32" max="100"></meter>
      <label for="file">32%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/1.jpg" alt="" />
          <img src="image/3.jpg" alt="" />
          <img src="image/4.jpg" alt="" />
        </div>
      </div>
    </div>
  </a>
  <a href="infoTask.html">
    <div class="cardtwo">
      <div class="taskName">
        <h2>Email Report</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>08:33:29/15:00:00</p>
      <meter id="file" value="75" max="100"></meter>
      <label for="file">75%</label>
      <meter id="file" value="56" max="100"></meter>
      <label for="file">56%</label>
      <meter id="file" value="12" max="100"></meter>
      <label for="file">12%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/1.jpg" alt="" />
          <img src="image/2.jpg" alt="" />
          <img src="image/3.jpg" alt="" />
          <img src="image/4.jpg" alt="" />
        </div>
      </div>
    </div>
  </a>
</div>

<!-- colThree -->
<div class="colThree">
  <div class="headerThree">
    <h1>Review</h1>
    <i class="fa-solid fa-magnifying-glass"></i>
  </div>
  <a href="infoTask.html">
    <div class="cardThree">
      <div class="taskName">
        <h2>SVG icons</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>01:00:05/05:00:00</p>
      <meter id="file" value="74" max="100"></meter>
      <label for="file">74%</label>
      <meter id="file" value="20" max="100"></meter>
      <label for="file">20%</label>
      <meter class="progress" id="file" value="33" max="100"></meter>
      <label for="file">33%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/4.jpg" alt="" />
          <img src="image/1.jpg" alt="" />
          <img src="image/2.jpg" alt="" />
          <img src="image/3.jpg" alt="" />
        </div>
      </div>
    </div>
  </a>
  <a href="infoTask.html">
    <div class="cardThree">
      <div class="taskName">
        <h2>Share link</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>00:40:00/01:50:00</p>
      <meter id="file" value="65" max="100"></meter>
      <label for="file">65%</label>
      <meter id="file" value="45" max="100"></meter>
      <label for="file">45%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/4.jpg" alt="" />
          <img src="image/1.jpg" alt="" />
        </div>
      </div>
    </div>
  </a>
  <a href="infoTask.html">
    <div class="cardThree">
      <div class="taskName">
        <h2>"Delete" option</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>00:39:05/01:00:00</p>
      <meter id="file" value="55" max="100"></meter>
      <label for="file">55%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/1.jpg" alt="" />
          <img src="image/3.jpg" alt="" />
        </div>
      </div>
    </div>
  </a>
  <a href="infoTask.html">
    <div class="cardThree">
      <div class="taskName">
        <h2>Data center upgrade</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>03:51:28/06:00:00</p>
      <meter id="file" value="100" max="100"></meter>
      <label class="labelColor" for="file">100%</label>
      <meter id="file" value="60" max="100"></meter>
      <label for="file">60%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/2.jpg" alt="" />
          <img src="image/3.jpg" alt="" />
          <img src="image/4.jpg" alt="" />
        </div>
      </div>
    </div>
  </a>
</div>
<!-- colFour -->
<div class="colFour">
  <div class="headerFour">
    <h1>Finished</h1>
    <i class="fa-solid fa-circle-check"></i>
  </div>
  <a href="infoTask.html">
    <div class="cardFour">
      <div class="taskName">
        <h2>Counter widget</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p><span style="color: #dd1313"> 02:26:08</span>/01:30:00</p>
      <meter id="file" value="100" min="0" max="100"></meter>
      <label class="labelColor" for="file">100%</label>
      <meter id="file" value="100" min="0" max="100"></meter>
      <label class="labelColor" for="file">100%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/2.jpg" alt="" />
          <img src="image/3.jpg" alt="" />
          <img src="image/1.jpg" alt="" />
        </div>
      </div>
    </div>
  </a>
  <a href="infoTask.html">
    <div class="cardFour">
      <div class="taskName">
        <h2>Push notifications</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>11:04:10/12:00:00</p>
      <meter id="file" value="100" max="100">100%</meter>
      <label class="labelColor" for="file">100%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/1.jpg" alt="" />
          <img src="image/4.jpg" alt="" />
        </div>
      </div>
    </div>
  </a>
  <a href="infoTask.html">
    <div class="cardFour">
      <div class="taskName">
        <h2>Resize thumbnails</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>06:32:06/08:00:00</p>
      <meter id="file" value="100" max="100">100%</meter>
      <label class="labelColor" for="file">100%</label>
      <meter id="file" value="100" max="100">100%</meter>
      <label class="labelColor" for="file">100%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/2.jpg" alt="" />
          <img src="image/3.jpg" alt="" />
          <img src="image/1.jpg" alt="" />
        </div>
        <!-- <div class="icon">
          
          <button id="phpButon"><i class="fa-solid fa-plus"></i></i></button>
        </div> -->
      </div>
    </div>
  </a>
  <a href="infoTask.html">
    <div class="cardFour">
      <div class="taskName">
        <h2>Security</h2>
        <details>
          <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
           
          <h4><i class="fa-solid fa-plus"></i>Add task</h4>
          <h4> <i class="fa-solid fa-paperclip"></i>Attach</h4>
          <h4><i class="fa-solid fa-trash-can"></i> Delete</h4>
        </details>
      </div>
      <p>08:33:29/15:00:00</p>
      <meter id="file" value="100" max="100">100%</meter>
      <label class="labelColor" for="file">100%</label>
      <meter id="file" value="100" max="100">100%</meter>
      <label class="labelColor" for="file">100%</label>
      <meter id="file" value="100" max="100">100%</meter>
      <label class="labelColor" for="file">100%</label>
      <div class="works">
        <div class="avatar">
          <img src="image/1.jpg" alt="" />
          <img src="image/2.jpg" alt="" />
          <img src="image/3.jpg" alt="" />
          <img src="image/4.jpg" alt="" />
        </div>
      </div>
    </div>
  </a>
</div>
</div>
  <script src="javaScript/demo.js"></script>
</body>
</html>
