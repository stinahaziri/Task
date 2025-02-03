let btnn = document.getElementById("btnn");
let minipage = document.getElementById("minipage");
let spani = document.getElementById("spani");
let cardContainer = document.getElementById("cardContainer");
let btn = document.getElementById("btn");
let kryhet = document.getElementById("kryhet");
let writeInput = document.getElementById("mainInput");

//qele miniPage
btnn.addEventListener("click", () => {
  minipage.style.display = "block";
  writeInput.value = "";
  writeInput.disabled = false;
  
  
});

// mshele miniPage
spani.addEventListener("click", () => {
  minipage.style.display = "none";
  writeInput.value = "";
  
});

//krijim i taskes
function createTaskCard(taskName) {
  let thisCard = document.createElement("div");
  thisCard.classList.add("taskCard");
  thisCard.id = "uniqueId";

  thisCard.innerHTML = `
    <div class="taskName">
      <h2>${taskName}</h2>
      <details>
        <summary> <i class="fa-solid fa-ellipsis-vertical"></i></summary>
        <h4 class="edit"> <i class="fa-solid fa-pen-to-square"></i> Edit</h4>
        <h4 class="deleteBtn"><i class="fa-solid fa-trash-can"></i> Delete</h4>
      </details>
    </div>
    <p>00:00:00/00:00:00</p>
    <progress class="progress" value="0" max="100"> 0% </progress>
    <label>0%</label>
    <div class="works">
      <div class="avatar">
        <img src="image/1.jpg" alt="" />
        <img src="image/2.jpg" alt="" />
        <img src="image/3.jpg" alt="" />
        <img src="image/4.jpg" alt="" />
      </div>
      <div class="icon">
        <button id="phpButon"><i class="fa-solid fa-plus"></i></button>
      </div>
    </div>
  `;

  // delete task
  let deleteBtn = thisCard.querySelector(".deleteBtn");
  deleteBtn.addEventListener("click", () => {
    console.log("U hoq: ", taskName);
    thisCard.remove();
  });

  // edit
  let edit = thisCard.querySelector(".edit");
  edit.addEventListener("click", () => {
    writeInput.value = taskName;
    thisCard.remove();
    minipage.style.display = "block";
    console.log("Editing:", taskName);
  });

  return thisCard;
}

// niniPgae
btn.addEventListener("click", () => {
  let taskName = writeInput.value.trim();

  if (taskName === "") {
    alert("Please write something.");
    return;
  }

  // Hiq tasket e meparshme nga miniopage
  const previousTasks = minipage.querySelectorAll(".taskCard");
  previousTasks.forEach(task => task.remove());

  // Krijo dhe shto taskun ne miniPage
  const modalContent = createTaskCard(taskName);
  minipage.appendChild(modalContent);
});

// shto ne beckend nje kart
kryhet.addEventListener("click", (event) => {
  event.preventDefault();

  let taskName = writeInput.value.trim();
  
  if (taskName === "") {
    alert("No task to add.");
    return;
  }


  //i qon te dhenat ne back
  const formData = new FormData();
  formData.append("mainInput", taskName);

  fetch("php/task.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Failed to add task");
      }
      return response.text();
    })
    .then((data) => {
      
      //krijon ni kart te re
      const taskCard = createTaskCard(taskName);
      cardContainer.appendChild(taskCard);

      //mshel modelin
      minipage.style.display = "none";
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
